<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // Kita ambil data Order BESERTA data User dan Items-nya (Eager Loading)
        $orders = Order::with(['user', 'items.product'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order) {
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Status pesanan berhasil diupdate!');
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

    public function updateResi(Request $request, $id)
{
    $request->validate([
        'resi' => 'required|string|max:50|min:5',
    ]);

    $order = Order::findOrFail($id);

    // Update resi DAN ubah status jadi 'Shipped' otomatis
    $order->update([
        'resi' => $request->resi,
        'status' => 'Shipped' // Pastikan status ini konsisten
    ]);

    return back()->with('success', 'Resi berhasil diinput! Status berubah jadi Dikirim 🚚');
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
