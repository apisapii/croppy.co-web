<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\Cart;
    use Illuminate\Support\Facades\DB; 
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

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
        // Ambil data user yang sedang login
        $user = Auth::user();
    
        // 1. CEK DATA DIRI USER (Validasi Manual) 🛑
        // Kalau HP kosong ATAU Alamat kosong, tolak ordernya & suruh isi profil dulu
        if (empty($user->phone) || empty($user->address)) {
            return redirect()->route('guest.profile.index')
                ->with('error', 'Eits, tunggu dulu! 🛑 Harap lengkapi Alamat dan No. HP di profil sebelum memesan ya.');
        }
    
        // 2. Ambil Keranjang User
        $carts = Cart::with('product')->where('user_id', $user->id)->get();
    
        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }
    
        // 3. Hitung Total
        $totalPrice = $carts->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        // 4. Simpan ke Database (Pakai Transaction biar aman)
        DB::transaction(function () use ($carts, $totalPrice, $user) {
            
            // A. Bikin Order Utama (Kepalanya)
            $order = Order::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,     // Aman, karena sudah dicek di atas
                'address' => $user->address, // Aman, karena sudah dicek di atas
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
            Cart::where('user_id', $user->id)->delete();
        });
    
        // 5. Ambil ID Order barusan buat redirect
        $latestOrder = Order::where('user_id', $user->id)->latest()->first();
    
        // Lempar ke halaman instruksi bayar
        if ($latestOrder) {
            return redirect()->route('payment.show', $latestOrder->id);
        }
    
        return redirect()->route('products.index')->with('error', 'Gagal memproses pesanan.');
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

    public function uploadProof(Request $request, $id)
{
    $request->validate([
        'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
    ]);

    $order = Order::where('user_id', auth()->id())->findOrFail($id);

    // Simpan foto ke folder public/payment_proofs
    if ($request->hasFile('payment_proof')) {
        $path = $request->file('payment_proof')->store('payment_proofs', 'public');
        
        $order->update([
            'payment_proof' => '/storage/' . $path
        ]);
    }

    return back()->with('success', 'Bukti pembayaran berhasil dikirim! Tunggu konfirmasi Admin ya. ⏳');
}
}
