<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Admin Croppy',
            'email' => 'admin@croppy.co',
            'password' => bcrypt('password'), // passwordnya: password
            'role' => 'admin',
        ]);

        // 2. Buat Akun Customer (Buat ngetes login nanti)
        User::create([
            'name' => 'Pembeli Setia',
            'email' => 'pembeli@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);

        // 3. Buat Kategori
        $cat1 = Category::create(['name' => 'Boneka Hewan', 'slug' => 'boneka-hewan']);
        $cat2 = Category::create(['name' => 'Gantungan Kunci', 'slug' => 'gantungan-kunci']);

        // 4. Buat Produk Contoh
        Product::create([
            'category_id' => $cat1->id,
            'name' => 'Amigurumi Kucing Oren',
            'slug' => 'amigurumi-kucing-oren',
            'price' => 45000,
            'stock' => 10,
            'description' => 'Boneka rajut kucing oren lucu, bahan milk cotton halus.',
            'image' => 'kucing.jpg' 
        ]);

        Product::create([
            'category_id' => $cat2->id,
            'name' => 'Ganci Alpukat',
            'slug' => 'ganci-alpukat',
            'price' => 15000,
            'stock' => 50,
            'description' => 'Gantungan kunci bentuk alpukat imut.',
            'image' => 'alpukat.jpg'
        ]);
    }
}