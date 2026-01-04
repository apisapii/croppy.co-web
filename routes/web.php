<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Order;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\GuestProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderAdminController;

// ==============================
//           GUEST ROUTES 
//           (Public Area)
// ==============================

// Beranda (menampilkan produk terbaru)
Route::get('/', function () {
    $products = Product::latest()->get();
    return view('guest.welcome', compact('products'));
});

// Upload bukti pembayaran
Route::post('/orders/{id}/payment-proof', [OrderController::class, 'uploadProof'])->name('orders.uploadProof');

// Halaman About
Route::get('/about', [PageController::class, 'about'])->name('pages.about');

// Daftar Produk (Katalog)
Route::get('/produk', [FrontProductController::class, 'index'])->name('front.products');

// Kontak
Route::get('/kontak', [PageController::class, 'contact'])->name('pages.contact');

// Tambah Review Produk (hanya untuk yang sudah login)
Route::post('/reviews', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('reviews.store');

// Login Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Update resi oleh admin
Route::post('/admin/orders/{id}/resi', [OrderAdminController::class, 'updateResi'])->name('admin.orders.updateResi');


// ==============================
//      USER LOGIN (AUTH)
// ==============================
Route::middleware(['auth'])->group(function () {
    // Profil tamu (khusus guest, agar user bisa update data pribadi yang lebih sederhana)
    Route::get('/my-profile', [GuestProfileController::class, 'index'])->name('guest.profile.index');
    Route::post('/my-profile', [GuestProfileController::class, 'update'])->name('guest.profile.update');
    
    // Profil lengkap (fitur Laravel)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Keranjang belanja
    Route::get('/cart', [CartController::class, 'index'])->name('carts.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('carts.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');

    // Checkout dari keranjang
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Daftar Pesanan user
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // Halaman Pembayaran order (show metode pembayaran, keterangan transfer, dsb.)
    Route::get('/pembayaran/{order}', function ($orderId) {
        $order = Order::findOrFail($orderId);
        return view('guest.payment', compact('order'));
    })->name('payment.show');
});


// ==============================
//         ADMIN AREA
// ==============================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Manajemen Order Admin
    Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index');
    Route::patch('/orders/{order}/update-status', [OrderAdminController::class, 'updateStatus'])->name('admin.orders.update');
    
    // Master Data: Kategori & Produk
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    // (Tambahkan route admin lainnya di sini jika diperlukan)
});

require __DIR__.'/auth.php';
