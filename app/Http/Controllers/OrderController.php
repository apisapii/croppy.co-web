<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\Cart;
    use Illuminate\Support\Facades\DB; 
    use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Ambil data pesanan milik user yang sedang login
        // 'latest()' biar yang paling baru muncul paling atas
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        // 2. Kirim data '$orders' ke tampilan
        // JANGAN ada 'totalPrice' di sini ya!
        return view('guest.order_history', compact('orders'));
    }

public function checkout(Request $request)
    {
        // 1. Ambil Keranjang User
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        // 2. Hitung Total
        $totalPrice = $carts->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // 3. Simpan ke Database (Pakai Transaction biar aman)
        DB::transaction(function () use ($carts, $totalPrice) {
            
            // A. Bikin Order Utama (Kepalanya)
            $order = Order::create([
                'user_id' => Auth::id(),
                
                // TAMBAHKAN BARIS INI 👇
                'name' => Auth::user()->name, 
                'phone' => '08123456789',
                'address' => 'Alamat Belum Diisi',
                
                'total_price' => $totalPrice,
                'status' => 'Pending',
                'payment_method' => 'Transfer Bank',
            ]);

            // B. Pindahkan Item Keranjang ke OrderItems (Rinciannya)
            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ]);
            }

            // C. Kosongkan Keranjang
            Cart::where('user_id', Auth::id())->delete();
        });

        // 4. Ambil ID Order barusan buat redirect
        $latestOrder = Order::where('user_id', Auth::id())->latest()->first();

        // Lempar ke halaman instruksi bayar
        return redirect()->route('payment.show', $latestOrder->id);
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
