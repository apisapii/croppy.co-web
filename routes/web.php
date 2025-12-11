<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontProductController;

Route::get('/', function () {
    // Ambil data produk terbaru dari database
    $products = Product::latest()->get();
    
    // Kirim ke welcome.blade.php
    return view('guest.welcome', compact('products'));
});

Route::get('/dashboard', function () {
    return view('admin.dashboard'); // Arahkan ke folder admin/dashboard kamu
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // 1. Menampilkan isi keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
    
    // 2. Menambah barang ke keranjang
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('carts.store');
    
    // 3. Hapus barang dari keranjang
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');

    Route::get('/produk', [FrontProductController::class, 'index'])->name('front.products');
});

require __DIR__.'/auth.php';
