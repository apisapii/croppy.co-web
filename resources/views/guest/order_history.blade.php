@extends('layouts.guest.app') 
@section('content')
<div class="container" style="padding: 100px 20px;">
    <h2 style="color: #e91e63; margin-bottom: 20px;">Riwayat Pesanan Saya ✨</h2>

    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <thead>
            <tr style="background: #e91e63; color: white; text-align: left;">
                <th style="padding: 15px;">Order ID</th>
                <th style="padding: 15px;">Tanggal</th>
                <th style="padding: 15px;">Total Harga</th>
                <th style="padding: 15px;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 15px;">#{{ $order->id }}</td>
                <td style="padding: 15px;">{{ $order->created_at->format('d M Y') }}</td>
                <td style="padding: 15px;">Rp {{ number_format($order->total_price) }}</td>
                <td style="padding: 15px;">
                    <span style="padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; 
                        background: {{ $order->status == 'Pending' ? '#fff3cd' : ($order->status == 'Paid' ? '#d4edda' : '#f8d7da') }};
                        color: {{ $order->status == 'Pending' ? '#856404' : ($order->status == 'Paid' ? '#155724' : '#721c24') }};">
                        {{ $order->status }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="padding: 20px; text-align: center;">Belum ada pesanan nih. Yuk belanja! 🧶</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection