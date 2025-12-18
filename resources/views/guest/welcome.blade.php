@extends('layouts.guest.app')
@section('content')
<style>
    .hero {
        min-height: 80vh;
        display: flex;
        align-items: center;
        background: linear-gradient(120deg, #ffe0ef 0%, #fff 100%);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .hero-wave {
        position: absolute;
        bottom: 0; left: 0; width: 100%; height: 70px;
        background: url('https://svgshare.com/i/15jy.svg') repeat-x;
        background-size: cover;
    }
    .hero-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        z-index: 1;
    }
    .hero-text {
        flex: 1;
        padding-left: 3vw;
        animation: fadeInLeft 1.1s;
    }
    .hero-title {
        font-size: 3.2rem;
        color: #e91e63;
        margin-bottom: 10px;
        font-family: 'Quicksand', sans-serif;
        letter-spacing: 2px;
        text-shadow: 1px 1px 9px rgba(233,30,99,0.1);
    }
    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #c2185b;
        font-weight: 500;
    }
    .hero-description {
        font-size: 1.08rem;
        color: #444;
        margin-bottom: 24px;
        max-width: 430px;
    }
    .btn-primary {
        background: linear-gradient(90deg, #e91e63 70%, #fd9f6e 100%);
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 30px;
        padding: 13px 36px;
        font-size: 1.1rem;
        cursor: pointer;
        box-shadow: 0 5px 30px 0 #e91e636e;
        transition: background 0.3s, transform 0.2s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #fd9f6e 25%, #e91e63 100%);
        transform: translateY(-2px) scale(1.04);
    }
    .hero-image {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: end;
        padding-right: 4vw;
        position: relative;
        z-index: 2;
    }
    .hero-image img {
        border-radius: 30px;
        box-shadow: 0px 8px 45px 6px #e91e6321;
        border: 6px solid #fff;
        transition: transform 0.3s;
        width: 400px;
        max-width: 95vw;
    }
    .hero-image img:hover {
        transform: scale(1.06) rotate(-2deg);
        box-shadow: 0px 16px 90px 14px #e91e6347;
    }
    .image-decoration {
        position: absolute;
        width: 140px; height: 140px;
        border-radius: 50%;
        background: radial-gradient(circle, #ffe0ef85 60%, transparent 85%);
        left: 50%; top: -40px; z-index: -1;
        animation: floating 4s ease-in-out infinite;
    }
    @keyframes fadeInLeft {
        0% { opacity: 0; transform: translateX(-60px);}
        100%{ opacity: 1; transform: translateX(0);}
    }
    @keyframes floating {
        0%,100% { transform: translateY(0);}
        50% { transform: translateY(25px);}
    }
    .produk {
        background: #fff;
        padding: 70px 0 50px 0;
    }
    .section-title {
        color: #e91e63;
        font-family: 'Quicksand', sans-serif;
        font-size: 2.1rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 10px;
    }
    .section-subtitle {
        text-align: center;
        color: #797979;
        font-size: 1.08rem;
        margin-bottom: 40px;
    }
    .produk-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px,1fr));
        gap:28px;
        margin: 0 auto;
        max-width: 1150px;
    }
    .produk-card {
        background: #fff6fa;
        border-radius: 18px;
        box-shadow: 0 7px 30px 0 #ffacd51a;
        overflow: hidden;
        transition: transform .20s, box-shadow .25s;
        position: relative;
        will-change: transform;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 12px;
    }
    .produk-card:hover {
        transform: translateY(-7px) scale(1.045);
        box-shadow: 0 18px 45px 0 #e91e6357;
    }
    .card-image {
        width: 100%;
        display: flex; justify-content: center; align-items: center;
        background: #fff;
        padding: 18px 0 12px 0;
    }
    .card-image img {
        width: 130px; height: 135px; object-fit: cover; border-radius: 10px;
        transition: transform .23s;
        box-shadow: 0 3px 14px #e91e6340;
        background: #f9f9f9;
    }
    .produk-card:hover .card-image img {
        transform: scale(1.12) rotate(-5deg);
    }
    .card-content {
        text-align: center;
        margin-top: 4px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-title {
        color: #e91e63;
        font-family: 'Quicksand', sans-serif;
        font-size: 1.28rem;
        font-weight: 700;
        margin-bottom: 4px;
        min-height: 40px;
    }
    .card-price {
        color: #ff9800;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 12px;
    }
    .card-action {
        display: flex;
        gap: 10px;
        margin-top: 8px;
        justify-content: center;
    }
    .btn-card {
        border-radius: 30px;
        border: none;
        padding: 7px 18px;
        font-size: 1.08rem;
        font-family: 'Quicksand', sans-serif;
        background: #ff9800;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        transition: background .2s, transform .2s;
    }
    .btn-card:active, .btn-card:hover {
        background: #e91e63;
        color: #fff;
        transform: scale(1.06);
    }
    .btn-card.added {
        background: #25D366;
        color: #fff;
        cursor: default;
    }
    .produk-card .added-message {
        color: #25D366;
        font-weight: 600;
        margin-top: 5px;
        font-size: .97rem;
        animation: fadeIn .32s;
    }
    @keyframes fadeIn {0%{opacity:0;}100%{opacity:1;}}
    .tentang {
        background: linear-gradient(100deg, #fffced 70%, #ffe9f2 100%);
        padding: 68px 0 58px 0;
    }
    .tentang-content {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 38px;
        max-width: 1100px;
        margin: 0 auto;
    }
    .tentang-image {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .tentang-image img {
        width: 240px;
        border-radius: 24px;
        box-shadow: 0 8px 48px #c5b6a655;
        transition:transform .3s;
        background: #fff;
    }
    .tentang-image:hover img {
        transform: scale(1.04) rotate(2deg);
    }
    .tentang-text {
        flex: 2;
        min-width: 220px;
    }
    .tentang-description {
        font-size: 1.08rem;
        margin-bottom: 28px;
        color: #623145;
        font-weight: 500;
    }
    .features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 17px;
    }
    .feature-item {
        display: flex; align-items: center;
        background: #fff;
        border-radius: 11px;
        box-shadow: 0 3px 15px #ec87b83d;
        gap: 10px;
        padding: 10px 15px;
        font-weight: 600;
        color: #d81b60;
        transition:transform .19s, box-shadow .18s;
    }
    .feature-item:hover {
        transform: scale(1.06);
        box-shadow: 0 8px 30px #e91e6349;
    }
    .feature-icon {
        width: 23px; height: 23px;
        background: url('https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f496.svg') center/contain no-repeat;
        display: inline-block;
        flex-shrink: 0;
    }
    .feature-item:nth-child(2) .feature-icon {
        background-image: url('https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f4aa.svg');
    }
    .feature-item:nth-child(3) .feature-icon {
        background-image: url('https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f60d.svg');
    }
    .feature-item:nth-child(4) .feature-icon {
        background-image: url('https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f511.svg');
    }
    /* Kontak Section */
    .kontak {
        background: #fff;
        padding: 73px 0 65px 0;
    }
    .contact-form {
        max-width: 440px;
        background: #fff9fa;
        padding: 28px 25px 23px 25px;
        border-radius: 16px;
        box-shadow: 0 8px 46px #ec87b822;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap:17px;
        animation: fadeInLeft .7s;
    }
    .contact-form .form-group {
        margin-bottom: 11px;
        display: flex; flex-direction: column;
        gap:3px;
    }
    .contact-form label {
        color: #e91e63;
        font-weight: 500;
        font-size: 1.01rem;
    }
    .contact-form input, .contact-form textarea {
        border-radius: 6px;
        border: 1.3px solid #ffd6e7;
        padding: 11px 8px;
        font-size: 1.07rem;
        font-family: 'Quicksand',sans-serif;
        margin-top: 2px;
        background: #fff;
        transition: border .19s;
    }
    .contact-form input:focus, .contact-form textarea:focus {
        outline: none;
        border-color: #e91e63;
        background: #fffdef;
    }
    .contact-form textarea {
        min-height: 60px;
        resize: vertical;
    }
    .form-success,
    .form-error {
        border-radius: 8px;
        color: #fff;
        padding: 8px 9px;
        margin-bottom: 9px;
        font-weight: 600;
        display: none;
    }
    .form-success { background: #25D366;  }
    .form-error   { background: #e91e63; }
    .animated-heart {
        position: absolute;
        top: 15px; left: 18px;
        pointer-events: none;
        z-index: 3;
    }
    .animated-heart svg {
        width: 46px; height: 46px;
        animation: heartBeat 1.16s infinite alternate cubic-bezier(.4,.2,.6,1.0);
    }
    @keyframes heartBeat {
        0%{transform:scale(.96);}
        90%{transform: scale(1.15);}
        100%{transform: scale(1.22);}
    }
    @media(max-width:980px){
        .hero-content, .tentang-content {flex-direction:column;gap:28px;}
        .hero-image,.tentang-image {padding: 0;}
        .hero, .produk, .tentang, .kontak {padding-left:0; padding-right:0;}
    }
    @media(max-width:800px){
        .hero-title{font-size:1.9rem}
        .section-title{font-size:1.23rem;}
        .produk-grid{gap:10px;}
        .produk-card{padding-bottom:5px;}
        .contact-form{padding:16px 8px;}
    }
</style>

<!-- Animated Heart Overlay on Hero -->
<div class="animated-heart">
    <svg viewBox="0 0 48 48"><g><path fill="#e91e63" d="M24 44s-18-10.55-18-24C6 8.24 13.33 2 24 14.33C34.67 2 42 8.24 42 20c0 13.45-18 24-18 24Z"></path></g></svg>
</div>

<section id="home" class="hero"> 
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title">Croppy.co Amigurumi</h1>
            <p class="hero-subtitle" id="typed-subtitle"></p>

            <p class="hero-description">
                Kami menyediakan boneka rajut (amigurumi) dan gantungan kunci 
                handmade yang lucu, estetik, dan cocok buat kado orang tersayang.
            </p>

            <a href="{{ route('front.products') }}" class="btn-primary" id="lihatKoleksiBtn">Lihat Koleksi</a>
        </div>
        <div class="hero-image">
            <div class="image-decoration"></div>
            <img src="{{asset('assets-guest/img/Gambar1.jpg')}}" alt="Croppy Amigurumi">
        </div>
    </div>
    <div class="hero-wave"></div>
</section>

<!-- Produk Section -->
<section id="produk" class="produk">
    <div class="container"> 
        <h2 class="section-title" data-aos="fade-up">Koleksi Kami</h2>
        <p class="section-subtitle" data-aos="fade-up">Pilih Gantungan Kunci favoritmu!</p>
        <div class="produk-grid" id="produkGrid">

        @foreach($products->take(3) as $product)
        <div class="produk-card" data-aos="zoom-in">
            <div class="card-image">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('img/default.jpg') }}" alt="No Image">
                @endif
            </div>
            <div class="card-content">
                <h3 class="card-title">{{ $product->name }}</h3>
                <p class="card-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="card-action">

                    @auth
                    <form action="{{ route('carts.store', $product->id) }}" method="POST" class="add-cart-form">
                        @csrf
                        <button type="submit" class="btn-card" data-product="{{ $product->id }}">+ Keranjang</button>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-card" style="background: #ffe2ee; color: #e91e63; border: 1px solid #e91e63;">
                            Login dulu yuk
                        </a>
                    @endauth

                    <a href="https://wa.me/6281234567890?text=Halo%20Croppy%2C%20saya%20mau%20order%20produk:%20{{ urlencode($product->name) }}%20harga%20Rp%20{{ number_format($product->price, 0, ',', '.') }}" 
                        class="btn-card" style="background:#25D366;border:none;"
                        target="_blank">
                        Chat WA
                    </a>
                </div>
                <div class="added-message" style="display:none;">✓ Ditambahkan!</div>
            </div>
        </div>
        @endforeach

        </div>
        <div style="text-align:center; margin-top: 22px;">
            <a href="{{ route('front.products') }}" class="btn-primary" style="background:#fff;color:#e91e63;border:1px solid #e91e63;">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<script>
    // AJAX tambah keranjang (agar tidak reload halaman)
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.add-cart-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var btn = form.querySelector('.btn-card');
                var msg = form.closest('.card-content').querySelector('.added-message');

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: new FormData(form)
                })
                .then(async response => {
                    if (response.ok) {
                        msg.style.display = 'block';
                        btn.disabled = true;
                        setTimeout(function() {
                            msg.style.display = 'none';

<!-- Tentang Section -->
<section id="tentang" class="tentang">
    <div class="container">
        <div class="tentang-content">
            <div class="tentang-image" data-aos="fade-right">
                <img src="{{asset('assets-guest/img/Gambar4.jpg')}}" alt="logo-site">
            </div>
            <div class="tentang-text" data-aos="fade-left">
                <h2 class="section-title">Tentang Croppy.co✨</h2>
                <p class="tentang-description">Kami membuat gantungan kunci rajut kecil dengan penuh cinta. Setiap rajutan dijahit dengan detail dan bahan lembut, cocok untuk tas, kunci, atau hadiah spesial.</p>
                <div class="features">
                    <div class="feature-item">
                        <span class="feature-icon"></span>
                        <span class="feature-text">Handmade dengan Cinta</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"></span>
                        <span class="feature-text">Bahan Berkualitas</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"></span>
                        <span class="feature-text">Desain Eksklusif</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"></span>
                        <span class="feature-text">Multifungsi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="kontak">
    <div class="container">
        <h2 class="section-title">Pesan Disini</h2>
        <p class="section-subtitle">Silahkan isi pesanan sesuai keinginan Anda</p>
        <form class="contact-form" id="kontakForm" autocomplete="off">
            <div class="form-success" id="formSuccess"></div>
            <div class="form-error" id="formError"></div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="cf_nama" name="nama" placeholder="Nama lengkap Anda" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="cf_email" name="email" placeholder="email@example.com" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="cf_alamat" name="alamat" rows="3" placeholder="Tulis alamat Anda di sini..." required></textarea>
            </div>
            <div class="form-group">
                <label for="pesanan">Pesanan</label>
                <textarea id="cf_pesanan" name="pesanan" rows="4" placeholder="Tulis pesanan Anda di sini..." required></textarea>
            </div>
            <button type="submit" class="btn-primary">Kirim</button>
        </form>
    </div>
</section>

<!-- Loader Modal -->
<div id="modalLoader" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:99;background:rgba(255,255,255,0.7);align-items:center;justify-content:center;">
    <div style="background:#fff;box-shadow:0 6px 32px #e91e6339;border-radius:18px;padding:34px 24px;display:flex;align-items:center;gap:16px;">
        <svg width="52" height="52" style="animation:spin 1s linear infinite"><circle cx="26" cy="26" r="20" fill="none" stroke="#e91e63" stroke-width="5" stroke-linecap="round" stroke-dasharray="94" stroke-dashoffset="0"></circle></svg>
        <span style="color:#e91e63;font-size:1.13rem;font-weight:600;">Mengirim ...</span>
    </div>
</div>
<script>
if (typeof AOS === 'undefined') {
    let aosScript=document.createElement('script');
    aosScript.src='https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js';
    document.head.appendChild(aosScript);
    let aosCSS=document.createElement('link');
    aosCSS.rel='stylesheet';
    aosCSS.href='https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css';
    document.head.appendChild(aosCSS);
    aosScript.onload=function(){AOS.init();}
}else{
    AOS.init();
}
// Typing effect
document.addEventListener('DOMContentLoaded',function(){
    // Hero subtitle typing
    let subtitle = "Teman Kecil Rajutan Tangan yang Penuh Cinta ✨";
    let el = document.getElementById('typed-subtitle');
    let i=0;
    function typeEffect(){
        if(i<subtitle.length){
            el.innerHTML += subtitle.charAt(i);
            i++;
            setTimeout(typeEffect,42);
        }
    }
    typeEffect();

    // Smooth scroll "Lihat Koleksi"
    document.getElementById('lihatKoleksiBtn').addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('produk').scrollIntoView({behavior:'smooth'});
    });

    // Produk Card interactive add to cart
    let forms = document.querySelectorAll('.produk-grid .add-cart-form');
    forms.forEach(function(form){
        form.addEventListener('submit', function(e){
            e.preventDefault();
            let btn = form.querySelector('button.btn-card');
            let msg = form.parentNode.parentNode.querySelector('.added-message');
            // Fake AJAX
            btn.disabled = true;
            btn.classList.add('added');
            btn.innerHTML = '<span style="font-size:1rem;vertical-align:middle;">✓</span> Ditambahkan!';
            msg.style.display = 'block';
            setTimeout(function(){
                btn.disabled = false;
                btn.classList.remove('added');
                btn.innerHTML = '+ Keranjang';
                msg.style.display = 'none';
            }, 1600);

            // Sebenarnya di sini bisa dipanggil ajax ke backend, tp untuk demo cukup efek saja
        });
    });

    // Kontak form AJAX with fake loader, optionally kirim ke WA?
    let kontakForm = document.getElementById('kontakForm');
    let loaderModal = document.getElementById('modalLoader');
    let sMsg = document.getElementById('formSuccess');
    let eMsg = document.getElementById('formError');
    kontakForm.addEventListener('submit',function(e){
        e.preventDefault();
        sMsg.style.display = 'none';
        eMsg.style.display = 'none';
        loaderModal.style.display='flex';
        // Data
        var nama = document.getElementById('cf_nama').value.trim();
        var email = document.getElementById('cf_email').value.trim();
        var alamat = document.getElementById('cf_alamat').value.trim();
        var pesanan = document.getElementById('cf_pesanan').value.trim();

        // Simulasi submit
        setTimeout(function(){
            loaderModal.style.display='none';
            if(nama && email && alamat && pesanan){
                sMsg.innerText = 'Terima kasih '+nama+'! Pesanan kamu sudah masuk. Kami akan menghubungi ke email/nomor WhatsApp kamu 🥰';
                sMsg.style.display='block';
                kontakForm.reset();
            }else{
                eMsg.innerText = 'Gagal mengirim. Mohon isi semua kolom dengan benar.';
                eMsg.style.display='block';
            }
        }, 1250);

        // Jika ingin auto-redirect ke WhatsApp setelah submit:
        //window.open('https://wa.me/6281234567890?text=' + encodeURIComponent("Pesan dari: "+nama+"\nEmail: "+email+"\nAlamat: "+alamat+"\nPesanan: "+pesanan),'_blank');
    });

    // Optional: Parallax effect di hero
    window.addEventListener('mousemove',function(e){
        var img = document.querySelector('.hero-image img');
        if(!img) return;
        let x = (e.clientX/window.innerWidth-0.5)*12; 
        let y = (e.clientY/window.innerHeight-0.5)*12; 
        img.style.transform = 'translate('+x+'px,'+y+'px) scale(1.02) rotate(-2deg)';
        setTimeout(function(){img.style.transform='';}, 800);
    });
});
</script>
<!-- End JS -->
@endsection