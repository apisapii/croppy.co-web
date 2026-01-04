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
    }
}