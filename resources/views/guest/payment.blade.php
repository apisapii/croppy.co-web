<!DOCTYPE html>
<html lang="id">
<head>
    <title>Bayar Pesanan #{{ $order->id }}</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; background: #fdfdfd; }
        .box { max-width: 500px; margin: 0 auto; border: 2px dashed #e91e63; padding: 30px; border-radius: 20px; background: white; }
        h1 { color: #e91e63; }
        .rek { font-size: 1.5rem; font-weight: bold; background: #eee; padding: 10px; margin: 20px 0; display: inline-block; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Menunggu Pembayaran ⏳</h1>
        <p>Terima kasih sudah memesan! Silakan transfer sebesar:</p>

        <h2 style="font-size: 2rem;">Rp {{ number_format($order->total_price) }}</h2>

        <p>Ke Rekening BCA:</p>
        <div class="rek">123 - 456 - 7890</div>
        <p>a.n <strong>Croppy Official</strong></p>

        <hr>
        <p style="font-size: 0.9rem; color: #666;">
            Admin kami akan memverifikasi pembayaranmu secara manual.<br>
            Cek status pesananmu di menu "Akun Saya > Pesanan".
        </p>

        <a href="/" style="background: #e91e63; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Kembali ke Home</a>
    </div>
</body>
</html>