<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung statistik
        $totalOmset = Order::sum('total_price');
        $totalPesanan = Order::count();
        $totalProduk = Product::count();
        $totalUser = User::count();
        
        return view('admin.dashboard', compact(
            'totalOmset',
            'totalPesanan',
            'totalProduk',
            'totalUser'
        ));
    }
}




