<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data keranjang, TAPI cuma milik user yang sedang login (Auth::id())
        $carts = Cart::with('product')
                    ->where('user_id', Auth::id()) 
                    ->get();

        return view('guest.cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $productId)
    {
        // Cek dulu, user ini udah pernah masukin produk ini belum?
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $productId)
                            ->first();

        if ($existingCart) {
            // Kalau udah ada, tambah jumlahnya aja (+1)
            $existingCart->increment('quantity');
        } else {
            // Kalau belum ada, bikin baris baru
            Cart::create([
                'user_id' => Auth::id(), // KUNCI: Simpan ID user A/B
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Masuk keranjang!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);
        
        // Pastikan yang menghapus adalah pemilik keranjang itu sendiri
        if ($cart->user_id == Auth::id()) {
            $cart->delete();
        }

        return redirect()->back();
    }
}
