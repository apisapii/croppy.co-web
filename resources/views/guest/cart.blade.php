@extends('layouts.guest.app')
@section('content')
<style>
        body { font-family: 'Quicksand', sans-serif; background: #f9f9f9; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #e91e63; text-align: center; }
        table { w-full; width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #ddd; }
        .btn-delete { color: red; text-decoration: none; font-weight: bold; }
        .total-box { text-align: right; margin-top: 20px; font-size: 1.2rem; font-weight: bold; }
        .btn-checkout { display: inline-block; background: #25D366; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-top: 10px; }
        .btn-back { display: inline-block; color: #555; text-decoration: none; margin-top: 20px; }
    </style>
<div class="container">
        <h1>Keranjang Belanja 🛒</h1>
        
        @if($carts->isEmpty())
            <p style="text-align: center;">Keranjangmu masih kosong nih.</p>
            <center><a href="/" class="btn-back">Belanja Dulu Yuk</a></center>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($carts as $cart)
                    @php 
                        $subtotal = $cart->product->price * $cart->quantity;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $cart->product->name }}</td>
                        <td>Rp {{ number_format($cart->product->price) }}</td>
                        <td>{{ $cart->quantity }} pcs</td>
                        <td>Rp {{ number_format($subtotal) }}</td>
                        <td>
                            <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-box">
                Total Belanja: Rp {{ number_format($total) }} <br>
                
                @php
                    $waText = "Halo Croppy, saya mau checkout pesanan:%0A";
                    foreach($carts as $cart) {
                        $waText .= "- " . $cart->product->name . " (" . $cart->quantity . " pcs)%0A";
                    }
                    $waText .= "Total: Rp " . number_format($total);
                @endphp
                
                <form action="{{ route('checkout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn-checkout" style="cursor: pointer; border: none; font-family: inherit; font-size: 1rem;">
        Bayar Sekarang (Transfer) 💳
    </button>
</form>
            </div>
        @endif
    </div>
@endsection