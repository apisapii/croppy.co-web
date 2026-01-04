@extends('layouts.guest.app') 
@section('content')
<style>
    .order-history-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 36px rgba(0,0,0,0.06), 0 1.5px 10px #f8bbd0;
        margin-top: 25px;
    }
    .order-history-table th {
        background: linear-gradient(90deg, #e91e63 0%, #64b5f6 100%);
        color: #fff;
        text-align: left;
        padding: 18px;
        font-weight: 600;
        letter-spacing: .01rem;
        font-size: 1.05rem;
    }
    .order-history-table td {
        padding: 18px 18px 10px 18px;
        vertical-align: top;
        border-bottom: 1.5px solid #f5e9f7;
        background: #fff6fb;
    }
    .order-info-main {
        margin-bottom: 10px;
    }
    .status-label-custom {
        display: inline-block;
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 0.93em;
        font-weight: 700;
        letter-spacing: .02em;
        box-shadow: 0 1px 5px rgba(233,30,99,0.03);
        margin-bottom: 7px;
        margin-top: 2px;
        background: #fce4ec;
        color: #ad1457;
        transition: .25s;
    }
    .status-label-custom.pending {
        background: #fff3cd;
        color: #b88300;
        border: 1.5px solid #ffe082;
    }
    .status-label-custom.paid {
        background: #e8fff2;
        color: #11896a;
        border: 1.5px solid #bbf2d0;
    }
    .status-label-custom.shipped {
        background: #e3f0ff;
        color: #1e88e5;
        border: 1.5px solid #90caf9;
    }
    .adv-status-row {
        margin-top: 11px;
        margin-bottom: 8px;
        font-size: 0.97em;
        align-items: center;
        display: flex;
        gap: 8px;
    }
    .adv-status-row .mini-badge {
        padding: 6px 14px;
        border-radius: 25px;
        font-weight: 600;
        font-size: .97em;
        background: #f5f5f5;
        color: #616161;
        border: 1px solid #e0e0e0;
        display: inline-block;
        box-shadow: 0 2px 8px #eee2;
    }
    .adv-status-row .badge-warning {
        background: #fff8e1; color: #ffa000; border: 1px solid #ffe082;
    }
    .adv-status-row .badge-info {
        background: #e3f2fd; color: #1976d2; border: 1px solid #90caf9;
    }
    .adv-status-row .badge-success {
        background: #e8f5e9; color: #388e3c; border: 1px solid #81c784;
    }
    .resi-container {
        margin-top: 10px;
        background: linear-gradient(93deg, #f1f8e9 60%, #f8bbd0 100%);
        padding: 14px;
        border: 1.5px dashed #8bc34a;
        border-radius: 10px;
        margin-bottom: 6px;
        animation: fadeIn 1s;
    }
    .resi-no {
        font-family: 'Fira Mono', 'monospace';
        font-size: 18px;
        color: #333;
        letter-spacing: 0.12em;
        user-select: all;
        display: inline-block;
        background: #f5f5f5;
        padding: 5px 12px;
        border-radius: 5px;
        margin-top: 8px;
    }
    .check-resi-btn {
        background: #e91e63;
        color: #fff;
        border: none;
        padding: 5px 13px;
        border-radius: 7px;
        font-size: .93em;
        margin: 8px 0 0 0;
        cursor: pointer;
        display: inline-block;
        transition: background .22s;
    }
    .check-resi-btn:hover {
        background: #ad1457;
    }
    /* Responsive */
    @media (max-width: 900px) {
        .order-history-table th, .order-history-table td { padding: 10px 7px 8px 7px; font-size: 0.92rem; }
    }
</style>
<div class="container" style="padding: 80px 6vw 45px 6vw;">
    <h2 style="color: #e91e63; margin-bottom: 20px; letter-spacing:.03em; font-family: 'Montserrat', sans-serif; font-weight: 700;">
        <span style="vertical-align:-3px;">🛒</span> Riwayat Pesanan Saya ✨
    </h2>

    <table class="order-history-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Status & Info</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>
                    <div class="order-info-main">
                        <span style="font-weight:700; color:#e91e63;">#{{ $order->id }}</span>
                    </div>
                    <span style="font-family:monospace; font-size:0.93em; color:#8e24aa; background:#f3e5f5; padding:3px 9px; border-radius:6px;">
                        {{ strtoupper(substr($order->status,0,1)) }}{{ strtolower(substr($order->status,1)) }}
                    </span>
                </td>
                <td>
                    <span style="font-weight:500; color:#333;">{{ $order->created_at->format('d M Y') }}</span>
                    <br>
                    <small style="color:#888;">{{ $order->created_at->format('H:i') }} WIB</small>
                </td>
                <td>
                    <strong style="font-size: 1rem; color:#2e7d32;">Rp {{ number_format($order->total_price) }}</strong>
                </td>
                <td>
                    {{-- Main Status (colorful) --}}
                    <span class="status-label-custom 
                        {{ $order->status == 'Pending' ? 'pending' : ($order->status == 'Paid' ? 'paid' : ($order->status == 'Shipped' ? 'shipped' : '')) }}">
                        @if($order->status == 'Pending')
                            <i class="far fa-clock" style="margin-right:4px;"></i> Menunggu Pembayaran
                        @elseif($order->status == 'Paid')
                            <i class="fas fa-money-check-alt" style="margin-right:4px;"></i> Lunas
                        @elseif($order->status == 'Shipped')
                            <i class="fas fa-truck" style="margin-right:4px;"></i> Dikirim 🚚
                        @else
                            {{ $order->status }}
                        @endif
                    </span>
                    
                    {{-- Informative Row --}}
                    <div class="adv-status-row">
                        Status:
                        @if($order->status == 'Pending')
                            <span class="mini-badge badge-warning">Menunggu Pembayaran</span>
                        @elseif($order->status == 'Paid')
                            <span class="mini-badge badge-info">Lunas</span>
                        @elseif($order->status == 'Shipped')
                            <span class="mini-badge badge-success">Dikirim 🚚</span>
                        @endif
                    </div>

                    {{-- Upload & Konfirmasi Bukti Pembayaran --}}
                    @if($order->status == 'Pending' && !$order->payment_proof)
                        <div style="margin-top: 15px; border-top: 1px dashed #eee; padding-top: 10px;">
                            <p style="font-size: 13px; color: #666; margin-bottom: 5px;">Belum bayar? Upload bukti transfer di sini:</p>
                            <form action="{{ route('orders.uploadProof', $order->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div style="display: flex; gap: 10px;">
                                    <input type="file" name="payment_proof" required style="font-size: 12px;">
                                    <button type="submit" class="btn btn-sm btn-primary">Kirim Bukti 📤</button>
                                </div>
                            </form>
                        </div>
                    @elseif($order->status == 'Pending' && $order->payment_proof)
                        <div style="margin-top: 15px; background: #e3f2fd; padding: 10px; border-radius: 5px;">
                            <span style="color: #0d47a1; font-size: 13px;">✅ Mohon tunggu sampai admin mengkonfirmasi pesanan anda.</span>
                            <br>
                            <a href="{{ $order->payment_proof }}" target="_blank" style="font-size: 12px; text-decoration: underline;">Lihat Bukti Saya</a>
                        </div>
                    @endif
                    
                    @if($order->resi)
                        <div class="resi-container">
                            <strong style="color:#33691e;">Nomor Resi:</strong> <br>
                            <span class="resi-no">
                                {{ $order->resi }}
                            </span>
                            <br>
                            <small style="color:#388e3c;">Silakan cek di website ekspedisi terkait.</small>
                            <br>
                            <button class="check-resi-btn"
                                onclick="window.open('https://cek.resi.id/?no={{ urlencode($order->resi) }}', '_blank')">
                                Cek Resi Online
                            </button>
                        </div>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="padding: 38px 9px; text-align: center; background: #f8bbd0; color: #7b1fa2; font-size: 1.14rem; border-radius: 0 0 20px 20px;">
                    <i class="fas fa-clipboard-list" style="font-size:2em; color: #e91e63;"></i>
                    <br>
                    Belum ada pesanan nih. Yuk belanja! 🧶
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection