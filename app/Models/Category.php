<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = []; // Ini biar kita bisa simpan data dengan cepat

    // Satu kategori bisa punya banyak produk
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
