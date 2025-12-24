<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Mulai Query Produk
        $query = Product::with('category');

        // 2. Logika Search (Kalau ada ketikan di kolom cari)
        if ($request->has('search') && $request->search != null) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 3. Logika Filter Kategori (Kalau ada kategori yang diklik)
        if ($request->has('category') && $request->category != null) {
            $query->where('category_id', $request->category);
        }

        // 4. Ambil datanya (Terbaru di atas)
        $products = $query->latest()->get();

        // 5. Ambil semua kategori buat tombol filter
        $categories = Category::all();

        // 6. Cek produk yang sudah pernah dibeli user (untuk izin review)
        $hasPurchasedProductIds = collect();
        if (Auth::check() && $products->isNotEmpty()) {
            $productIds = $products->pluck('id');
            $hasPurchasedProductIds = Order::where('user_id', Auth::id())
                ->where('status', 'Paid')
                ->whereHas('items', function ($query) use ($productIds) {
                    $query->whereIn('product_id', $productIds);
                })
                ->with('items')
                ->get()
                ->flatMap->items
                ->pluck('product_id')
                ->unique();
        }

        return view('guest.products', compact('products', 'categories', 'hasPurchasedProductIds'));
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
    public function store(Request $request)
    {
        //
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
        //
    }
}
