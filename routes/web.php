<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Admin\OrderAdminController;

// =========================
// GUEST ROUTES (Public)
// =========================

Route::get('/', function () {
    // Ambil data produk terbaru dari database
    $products = Product::latest()->get();
    // Kirim ke welcome.blade.php
    return view('guest.welcome', compact('products'));
});

// (Tambahkan jika ada guest/public lain, misal katalog depan)
Route::get('/produk', [FrontProductController::class, 'index'])->name('front.products');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// =========================
// AUTHENTICATED USER ROUTES
// =========================
Route::middleware(['auth'])->group(function () {
    // Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Keranjang Belanja
    Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');

    // Proses Checkout (Dari tombol keranjang)
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Pesanan (order) User
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // Ganti route payment yang lama dengan ini:
Route::get('/pembayaran/{order}', function ($orderId) {
    $order = \App\Models\Order::findOrFail($orderId);
    return view('guest.payment', compact('order'));
})->name('payment.show');
});

// =========================
// ADMIN ROUTES
// =========================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Arahkan ke folder admin/dashboard kamu
    })->middleware('verified')->name('dashboard');
    // Daftar order untuk admin
    Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index');
    // Update status order oleh admin
    Route::patch('/orders/{order}/update-status', [OrderAdminController::class, 'updateStatus'])->name('admin.orders.update');
    // (di sini bisa ditambah route admin lain)

    // Master Data (biasanya untuk admin):
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
