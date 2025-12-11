<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    // Keranjang ini punya siapa?
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Isinya produk apa?
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
