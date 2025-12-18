@extends('layouts.admin.app')
@section('content')
<style>
    .orders-container {
        padding: 70px 10px 50px 10px;
        max-width: 1150px;
        margin: 0 auto;
        background: linear-gradient(120deg, #f5e9f7 0%, #e0f7fa 100%);
        min-height: 90vh;
        border-radius: 18px;
        box-shadow: 0 8px 36px rgba(0,0,0,0.07), 0 1.5px 14px #f48fb1;
    }
    .orders-title {
        color: #6d0974;
        margin-bottom: 18px;
        font-size: 2.1rem;
        font-family: 'Montserrat', sans-serif;
        display: flex;
        align-items: center;
    }
    .orders-title i {
        margin-right: 12px;
        color: #06b6d4;
        font-size: 2.1rem;
    }
    .orders-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        margin-top: 10px;
        box-shadow: 0 4px 22px rgba(171,71,188,0.12);
        border-radius: 18px;
        overflow: hidden;
    }
    .orders-table th {
        background: linear-gradient(90deg, #8d32cb 0%, #06b6d4 100%);
        color: #fff;
        text-align: left;
        padding: 18px;
        font-weight: 600;
        letter-spacing: .01rem;
        font-size: 1rem;
    }
    .orders-table td {
        padding: 16px;
        vertical-align: top;
    }
    .orders-table tr {
        border-bottom: 1.5px solid #faf1fa;
    }
    .order-items-list {
        font-size: 0.98rem;
        color: #474747;
    }
    .status-badge {
        padding: 7px 16px;
        border-radius: 50px;
        font-size: 1em;
        font-weight: 700;
        display: inline-block;
        transition: .25s;
    }
    .status-pending {
        background: #fff6e5;
        color: #ea9907;
        border: 1.5px solid #ffe3b2;
    }
    .status-paid {
        background: #e8fff2;
        color: #0f9865;
        border: 1.5px solid #bbf2d0;
    }
    .status-shipped {
        background: #e3f0ff;
        color: #174caa;
        border: 1.5px solid #b9d7ff;
    }
    .action-form select {
        width: 115px;
        padding: 6px 14px;
        border-radius: 7px;
        border: 1.2px solid #e0e0e0;
        font-weight: 600;
        color: #555;
        background: #fafbfc;
        margin-bottom: 0;
        box-shadow: 0 2px 7px rgba(171,71,188,0.02);
        outline: none;
        transition: border .2s;
    }
    .action-form select:focus {
        border: 1.5px solid #8d32cb;
    }
    .action-form {
        margin: 0;
        display: flex;
        align-items: center;
    }
    .empty-orders {
        padding: 48px 8px;
        text-align: center;
        color: #888;
        font-size: 1.15rem;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .orders-container { padding: 36px 2px 24px 2px; }
        .orders-table th, .orders-table td { padding: 8px; font-size: 0.92rem; }
        .orders-title { font-size: 1.2rem; }
    }
</style>

<div class="orders-container">
    <div class="orders-title">
        <i class="fas fa-cube"></i>
        Panel Kelola Pesanan
        <span style="font-size: 1.2rem; margin-left:.5em;">🛒</span>
    </div>

    @if(session('success'))
        <div style="
            background: linear-gradient(90deg, #dcf9e8, #e2f2ff);
            color: #198754;
            padding: 18px 25px;
            border-radius: 9px;
            box-shadow: 0 3px 8px rgba(152, 255, 200, 0.08);
            margin-bottom: 22px;
            font-weight: 500;
            ">
            <i class="fas fa-check-circle" style="margin-right:10px; color:#32cc6a;"></i>
            {{ session('success') }}
        </div>
    @endif

    <table class="orders-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Waktu Pemesanan</th>
                <th>Pelanggan</th>
                <th>Rincian Barang</th>
                <th>Total Bayar</th>
                <th>Status Saat Ini</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>
                    {{ $order->created_at->format('d M Y, H:i') }} WIB
                </td>
                <td>
                    <span style="font-weight:600; color:#7b1fa2;">
                        {{ $order->user->name }}
                    </span>
                </td>
                <td>
                    <ul class="order-items-list" style="padding-left:8px; margin:0;">
                        @foreach($order->items as $item)
                            <li>
                                <span style="font-weight:500;">
                                    {{ $item->product->name }}
                                </span>
                                <span style="opacity:0.7">(x{{ $item->quantity }})</span>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td><strong>Rp {{ number_format($order->total_price) }}</strong></td>
                <td>
                    @php
                        $badgeClass = $order->status === 'Pending'
                            ? 'status-badge status-pending'
                            : ($order->status === 'Paid'
                                ? 'status-badge status-paid'
                                : 'status-badge status-shipped');
                        $displayStatus = $order->status === 'Paid' ? 'Lunas' : ($order->status === 'Shipped' ? 'Dikirim' : 'Pending');
                        $statusIcon = $order->status === 'Pending' ? 'far fa-clock' : ($order->status === 'Paid' ? 'fas fa-money-check-alt' : 'fas fa-shipping-fast');
                    @endphp
                    <span class="{{ $badgeClass }}">
                        <i class="{{ $statusIcon }}" style="margin-right:6px;"></i>
                        {{ $displayStatus }}
                    </span>
                </td>
                <td>
                    <form class="action-form" action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" onchange="this.form.submit()">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ $order->status == 'Paid' ? 'selected' : '' }}>Lunas</option>
                            <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Dikirim</option>
                        </select>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="empty-orders">
                    <i class="fas fa-clipboard-list" style="font-size:2.2em; color: #d1aeeb;"></i>
                    <br>
                    Belum ada pesanan baru. Semangat berjualan! 🚀
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{-- Pastikan font awesome sudah di-include di layout/main. --}}
@endsection