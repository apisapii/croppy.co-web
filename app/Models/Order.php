<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Satu order punya banyak item barang
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
