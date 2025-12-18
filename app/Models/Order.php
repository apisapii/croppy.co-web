<?php

namespace App\Models;

// 👇 INI BARIS YANG TADI HILANG (PENYEBAB ERROR)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Pastikan daftar ini lengkap biar gak error "Field name doesn't have default value"
    protected $fillable = [
        'user_id',
        'name',   
        'phone',  
        'address',     // <--- Kolom nama wajib ada di sini
        'total_price',
        'status',
        'payment_method',
    ];

    // Hubungan ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Hubungan ke Item Barang
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}