@extends('layouts.guest.app')
@section('content')
@push('head')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&family=Fredoka:wght@700&display=swap">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
@endpush
<style>
    /* -- IMUT ENHANCED STYLES -- */
    .animated-heart {
        position: absolute;
        top: 18px; left: 24px;
        z-index: 11;
        animation: heartPulse 2.9s infinite;
        opacity: 0.7;
    }
    @keyframes heartPulse {
        0% { transform: scale(1);}
        20% {transform: scale(1.14);}
        40% {transform: scale(1);}
        100% {transform: scale(1);}
    }
    .hero {
        background: radial-gradient(circle at 70% 90%,#ffcde4 23%,#fffafc 62%);
        position: relative;
        overflow: hidden;
        min-height: 530px;
        border-bottom-left-radius: 3rem;
        border-bottom-right-radius: 3rem;
        margin-bottom: 0.7rem;
        box-shadow: 0 12px 48px #ffd3eb42;
    }
    .hero-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1050px;
        margin: 0 auto;
        padding: 62px 6vw 38px 6vw;
        position: relative;
        z-index: 4;
    }
    .hero-text {
        max-width: 420px;
    }
    .hero-title {
        font-family: 'Fredoka', 'Quicksand', cursive, sans-serif;
        font-weight: bold;
        font-size: 2.28rem;
        margin-bottom: 8px;
        background: linear-gradient(90deg, #e91e63, #ff80ab, #ffaec5 90%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 0.5px;
        text-shadow: 1px 1px 12px #fff1f688;
        position: relative;
    }
    .hero-title::after {
        content: "✨";
        position: absolute;
        right: -36px;
        top: 8px;
        font-size: 1.13rem;
        animation: sparkle .9s infinite alternate;
    }
    @keyframes sparkle {
        0%{opacity:0.9;transform:rotate(-12deg);}
        100%{opacity:0.4;transform:rotate(10deg);}
    }
    .hero-subtitle {
        color: #ec4699;
        font-family: 'Quicksand', sans-serif;
        font-weight: 700;
        font-size: 1.11rem;
        margin-bottom: 7px;
        min-height: 28px;
        letter-spacing:0.02em;
        background: linear-gradient(to right, #e91e63 90%, #ffeaea 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display:inline-block;
    }
    .hero-description {
        color: #5c3564;
        font-size: 1.04rem;
        margin-bottom: 19px;
        background: #fffbfa4c;
        padding: 8px 19px 10px 10px;
        border-radius: 16px;
        font-family: 'Quicksand', sans-serif;
        box-shadow: 0 1px 8px #ffd3e33a;
        letter-spacing: 0.01em;
    }
    .btn-primary {
        background: linear-gradient(95deg,#e91e63 60%, #f7a9c5 100%);
        color: white !important;
        padding: 11px 32px;
        font-size: 1.05rem;
        font-weight: 700;
        border: none;
        border-radius: 50px;
        transition: background .27s,transform .16s;
        box-shadow: 0 4px 20px #e91e634d;
        letter-spacing: 0.04em;
        cursor: pointer;
        outline: none;
        position:relative;
        z-index:2;
    }
    .btn-primary:hover, .btn-primary:focus {
        background: linear-gradient(80deg,#f462be 70%, #fbb9d9 100%);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 9px 32px #ffcde4cc;
    }
    .hero-image {
        position: relative;
        max-width: 323px;
        aspect-ratio: 1/1;
        flex-shrink:0;
        margin-left: 36px;
        z-index:2;
        display:flex;align-items:center;justify-content:center;
    }
    .hero-image .image-decoration {
        position: absolute;
        z-index: 1;
        inset: 0;
        border-radius: 50%;
        background: radial-gradient(circle, #fffbee70 17%, #ffe3f8 62%, transparent 100%);
        filter: blur(5px);
    }
    .hero-image img {
        max-width: 270px;
        border-radius: 23px 44px 29px 39px / 45px 23px 40px 19px;
        box-shadow: 0 8px 40px #e89eb852, 0 2px 12px #e91e6366;
        object-fit: cover;
        display: block;
        border: 5px solid #fff5f7;
        position:relative;
        background: #fff6fa;
        transition: box-shadow .17s, transform .2s;
    }
    .hero-image img:hover {
        box-shadow: 0 12px 52px #f39dc133, 0 3px 26px #e91e6377;
        transform: scale(1.03) rotate(-3deg);
    }
    .hero-wave {
        position: absolute;
        left: 0; right: 0; bottom: -1.2rem;
        height: 40px;
        background: url('https://svgshare.com/i/13iw.svg') bottom repeat-x;
        background-size: auto 41px;
        z-index: 2;
        pointer-events:none;
        opacity: 0.73;
    }
    /* Produk Section - Cute Cards, Animation, Shadow */
    .produk {
        background: linear-gradient(180deg,#fff4fa 22%,#fff 74%);
        padding: 62px 0 38px 0;
    }
    .section-title {
        font-family: 'Fredoka', 'Quicksand', cursive, sans-serif;
        color: #e91e63;
        font-size: 1.87rem;
        letter-spacing: .05em;
        text-align: center;
        margin-bottom: 7px;
        text-shadow: 0 1px 9px #ffc9e9ee;
        font-weight: bold;
        position:relative;
    }
    .section-title::before {
        content:'💖';
        font-size:1.04em;
        position:relative;
        margin-right:9px;
        vertical-align: middle;
        opacity:.82;
        animation:bounceHeart 1.4s infinite alternate;
    }
    @keyframes bounceHeart {
        0%{transform:translateY(0);}
        70%{transform:translateY(-6px);}
        100%{transform:translateY(0);}
    }
    .section-subtitle {
        text-align: center;
        font-family: 'Quicksand',sans-serif;
        color: #a3698e;
        margin-bottom: 21px;
        font-size: 1.01rem;
        letter-spacing:.01em;
    }
    .produk-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(237px, 1fr));
        gap: 26px 24px;
        max-width: 900px;
        margin: 0 auto;
    }
    .produk-card {
        background: #fff;
        border-radius: 30px 18px 38px 16px / 26px 33px 18px 30px;
        box-shadow: 0 7px 36px #e981b61c, 0 1.5px 9px #e868b01e;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 23px 18px 18px 18px;
        transition: transform .10s, box-shadow .17s;
        position: relative;
        overflow: visible;
    }
    .produk-card:hover {
        transform: translateY(-8px) scale(1.035) rotate(-1.5deg)!important;
        box-shadow: 0 16px 44px #ffd9ef77;
    }
    .card-image {
        width: 116px; height: 116px;
        background: radial-gradient(circle closest-side, #fff, #ffe6f5 68%);
        border-radius: 50%;
        box-shadow: 0 2.5px 22px #ffe5e9af;
        overflow: hidden;
        display: flex;
        align-items:center;justify-content:center;
        margin-bottom: 13px;
        position:relative;
        border: 2.5px dashed #e78aad38;
    }
    .card-image img {
        width: 92px; height: 92px;
        border-radius: 24px 38px 22px 32px/28px 14px 32px 20px;
        object-fit: cover;
        box-shadow: 0 5px 18px #ed85c355;
        border: 2.2px solid #fff9;
        background: #fffbe0;
        margin: 0 auto;
        transition: transform .17s;
    }
    .produk-card:hover .card-image img {
        transform: scale(1.08) rotate(6deg);
        box-shadow: 0 8px 40px #f9b3cc99;
    }
    .card-title {
        font-family: 'Quicksand',sans-serif;
        font-weight: 800;
        font-size: 1.13rem;
        color: #e6628a;
        margin-bottom: 6px;
        text-align: center;
        position: relative;
        letter-spacing:.011em;
        text-shadow: 0 1px 9px #fff2f4ab;
    }
    .card-price {
        font-size: 1.07rem;
        color: #985b7a;
        font-weight: 700;
        margin-bottom: 8px;
        text-align: center;
    }
    .card-action {
        display: flex; align-items: center;justify-content:center; gap: 8px;
        margin-bottom:6px;
    }
    .btn-card {
        background: linear-gradient(92deg,#ffd2df73,#ffe9f6 89%);
        color: #e91e63;
        font-family: 'Quicksand',sans-serif;
        font-weight: 700;
        border-radius: 40px;
        border: 2px solid #e9aed2;
        font-size:0.97rem;
        padding: 7px 19px;
        margin:0;
        cursor:pointer;
        box-shadow:0 1.5px 9px #ffd0ec54;
        transition: all .10s;
        display: inline-flex; align-items: center;gap:2px;
        position: relative;
        outline: none;
    }
    .btn-card:active, .btn-card.added {
        background: linear-gradient(92deg,#f9eeef,#ffeaff 81%);
        color: #e91e63;
        border-color: #e76fb0;
        transform: scale(0.991);
    }
    .btn-card[disabled] {
        opacity: .7;
        cursor: not-allowed;
        background: #ffe2ef!important;
    }
    .btn-card.wa {
        background:linear-gradient(99deg,#d2ffee,#eafff8 b9%);
        color:#1cba64 !important;
        border: 2px solid #53e6a7;
        font-weight:800;
        transition:.14s;
    }
    .btn-card.wa:hover {
        color:#1fab68;background:#e6fff4 !important;
        border:2.2px solid #87e7c6;
    }
    .added-message {
        font-size: 0.94rem;
        color: #4bb45b;
        font-weight: 700;
        margin-top: 3px;
        text-align: center;
        animation: popIn .38s;
        letter-spacing:0;
    }
    @keyframes popIn {
        from {opacity:0; transform: scale(.75);}
        to {opacity:1; transform: scale(1);}
    }
    .produk-card::after {
        content: "🧸";
        position: absolute;
        top: -21px; right: -19px;
        font-size: 2rem;
        opacity: 0.17;
        pointer-events:none;
        filter: blur(1.2px);
        z-index:1;
        transform: rotate(-13deg);
        animation: bouncify 1.8s infinite alternate;
    }
    @keyframes bouncify {
        0%{top:-21px;}
        60%{top:-32px;}
        100%{top:-21px;}
    }
    /* Tentang */
    .tentang {
        background: linear-gradient(184deg,#fff 55%,#ffe9fa 100%);
        padding: 70px 0 59px 0;
    }
    .tentang-content {
        display: flex;
        align-items: center;
        max-width: 950px;
        margin:0 auto;
        gap: 45px;
        flex-wrap: wrap-reverse;
    }
    .tentang-image {
        flex-basis: 40%;
        text-align: center;
    }
    .tentang-image img {
        max-width: 220px;
        border-radius: 36px 80px 29px 22px / 60px 21px 60px 20px;
        box-shadow: 0 7px 45px #fcb9de77;
        transition:.18s;
        background:#fff1f5;
        border: 4px solid #fff8fb;
    }
    .tentang-image img:hover {
        transform: scale(1.05) rotate(-5deg);
        box-shadow: 0 18px 62px #fbb7e999;
    }
    .tentang-text {flex:1;}
    .tentang-description {
        color:#96527e;
        background:#ffe2f365;
        border-radius:17px;
        padding:18px;
        font-size:1.11rem;
        margin-bottom:10px;font-family:'Quicksand',sans-serif;
        font-weight: 600;
        text-shadow: 0 2px 18px #fff1f1b9;
    }
    .features {
        display:flex;gap:19px;flex-wrap:wrap;
        margin-top:20px;
    }
    .feature-item {
        background:linear-gradient(107deg,#ffeef4 50%,#fff 100%);
        border-radius:15px;
        padding:6px 15px 7px 13px;
        display:flex;align-items:center;gap:7px;
        font-weight:700;
        box-shadow:0 1.5px 8px #ffd8ef33;
        font-size:0.97rem;
        color:#e91e63;
    }
    .feature-icon {
        width:22px;height:22px;
        display:inline-block;
        background: url('https://cdn-icons-png.flaticon.com/512/869/869869.png') no-repeat center;
        background-size: contain;
        margin-right:5px;
        filter:brightness(1.1) drop-shadow(0 1px 4px #ffecf3aa);
    }
    .feature-item:nth-child(2) .feature-icon {
        background-image: url('https://cdn-icons-png.flaticon.com/512/1823/1823485.png');
    }
    .feature-item:nth-child(3) .feature-icon {
        background-image: url('https://cdn-icons-png.flaticon.com/512/3211/3211064.png');
    }
    .feature-item:nth-child(4) .feature-icon {
        background-image: url('https://cdn-icons-png.flaticon.com/512/743/743007.png');
    }
    /* Testimoni Section - Bubble Carousel & Cute Avatars */
    .testimoni-section {
        background: linear-gradient(0deg,#fff9fc 70%,#ffeef8 100%);
        padding: 78px 0 70px 0;
        position: relative;
        overflow: visible;
    }
    .testimoni-title {
        color: #ee4a8d;
        font-family: 'Fredoka', 'Quicksand', cursive, sans-serif;
        font-size: 2.18rem;
        font-weight: 800;
        text-align: center;
        margin-bottom: 7px;
        letter-spacing:.05em;
        text-shadow: 0 1.5px 10px #ffd4ed77;
        position: relative;
    }
    .testimoni-title::before {
        content:'🐰';
        font-size:1.13em;
        margin-right:8px;
        filter:blur(.3px);
        opacity:.74;
        vertical-align:middle;
        animation: bunnyJump 1.4s infinite alternate;
    }
    @keyframes bunnyJump { 0%{transform:translateY(0);} 100%{transform:translateY(-7px);} }
    .testimoni-subtitle {
        text-align: center;
        color: #ae6399;
        font-size: 1.097rem;
        margin-bottom: 37px;
        font-family:'Quicksand',sans-serif;
        background: #ffe4f640;
        padding:5px 0;
        border-radius:10px;
        text-shadow:0 1px 8px #ffd6eb88;
    }
    .testimoni-list {
        display: flex;
        gap: 26px;
        max-width: 900px;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
        overflow-x: auto;
        position: relative;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling:touch;
    }
    .testimoni-card {
        background: linear-gradient(120deg, #fff8fb 65%, #ffe3ed 100%);
        border-radius: 21px 22px 26px 21px / 21px 38px 21px 34px;
        box-shadow: 0 8px 30px #ffaddd2e;
        padding: 36px 32px 26px 32px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
        font-family: 'Quicksand', sans-serif;
        min-width: 265px;
        min-height: 175px;
        max-width: 330px;
        position: relative;
        animation: popIn .7s;
        scroll-snap-align:center;
        border: 2px solid #ffe5f0;
        transition:.17s;
        cursor:pointer;
    }
    .testimoni-card.active, .testimoni-card:hover {
        border-color: #e91e63;
        box-shadow: 0 3.5px 23px #fa78be2c, 0 12px 44px #ffcde444;
        background: linear-gradient(138deg, #fff9fd 67%, #ffd3f0 100%);
        transform: scale(1.065) rotate(-2.3deg);
    }
    .testimoni-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .testimoni-user-img {
        width: 53px;
        height: 53px;
        border-radius: 50%;
        object-fit: cover;
        border: 2.5px solid #e91e63;
        background: #fff;
        box-shadow: 0 1.5px 8px #ffd4e454;
        position:relative;
        z-index:2;
        transition:.12s;
        margin-right:0;
    }
    .testimoni-card:hover .testimoni-user-img, .testimoni-card.active .testimoni-user-img{
        border:3.4px solid #ff69b4;
        box-shadow:0 4px 15px #ffaadd63;
        transform: scale(1.08) rotate(-3deg);
    }
    .testimoni-user-info {
        display: flex;
        flex-direction: column;
    }
    .testimoni-username {
        font-weight: 900;
        color: #e91e63;
        font-size: 1.15rem;
        font-family:'Quicksand',sans-serif;
        text-shadow:0 1px 8px #ffd4e9cc;
    }
    .testimoni-rating {
        color: #ffd700;
        font-size: 1.09rem;
        letter-spacing: .06em;
        margin-top:0px;
        text-shadow: 0 1.5px 11px #fffedcb9;
        filter: drop-shadow(0 2px 6px #ffe7c7e8);
        font-weight:800;
        font-family:'Fredoka',sans-serif;
    }
    .testimoni-text {
        color: #79486c;
        font-size: 1.09rem;
        line-height: 1.5;
        letter-spacing:.01em;
        padding:8px 0 4px 0;
        font-family:'Quicksand',sans-serif;
        text-shadow: 0 1.5px 12px #f8d4e4cc;
        min-height:54px;
    }
    .testimoni-card::before {
        content:"";
        position:absolute;
        top:10px;left:-12px;
        width:28px;height:28px;
        background:url('https://cdn-icons-png.flaticon.com/512/616/616490.png') no-repeat center/contain;
        opacity:0.19;
        z-index:1;
        pointer-events:none;
        animation: swingStar .9s infinite alternate;
    }
    @keyframes swingStar {
        0%{transform:rotate(-9deg);}
        100%{transform:rotate(9deg);}
    }
    .testimoni-card.active::after {
        content: "✨";
        position: absolute;
        right: -11px; top: -19px;
        font-size: 1.89rem; opacity:0.36;
        pointer-events:none;
        animation: sparkle 1.2s infinite alternate;
    }
    @media(max-width:1050px){
        .hero-content{flex-direction:column;align-items:center;text-align:center;gap:33px;}
        .hero-image{margin:0;}
    }
    @media(max-width:900px){
        .produk-grid, .testimoni-list {gap:17px;}
        .hero-title{font-size:1.54rem;}
        .section-title{font-size:1.29rem;}
        .testimoni-title{font-size:1.06rem;}
    }
    @media(max-width:650px){
        .hero-content, .tentang-content{
            flex-direction:column;
            gap:16px;
            padding-left:0; padding-right:0;
        }
        .produk-grid {grid-template-columns:1fr;}
        .testimoni-list{gap:11px;}
        .testimoni-card{padding:23px 11px;}
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
                handmade yang <b style="color:#ea73ba;">lucu</b>, <b style="color: #f59ad1;">estetik</b>, dan cocok buat kado orang tersayang.<br>
                <span style="font-size:0.97em;color:#e58fad;">Setiap pesanan dibuat khusus dengan sentuhan cinta!</span>
            </p>
            <a href="{{ route('front.products') }}" class="btn-primary" id="lihatKoleksiBtn">
                <span style="font-size:1.1em;">&#128147;</span> Lihat Koleksi
            </a>
        </div>
        <div class="hero-image">
            <div class="image-decoration"></div>
            <img src="{{asset('assets-guest/img/Gambar1.jpg')}}" alt="Croppy Amigurumi" draggable="false">
        </div>
    </div>
    <div class="hero-wave"></div>
</section>

<!-- Produk Section -->
<section id="produk" class="produk">
    <div class="container"> 
        <h2 class="section-title" data-aos="fade-up">Koleksi Kami</h2>
        <p class="section-subtitle" data-aos="fade-up">Pilih Gantungan Kunci favoritmu!<span style="margin-left:10px;font-size:1.22em;">🧵🧸</span></p>
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
                <h3 class="card-title" title="{{ $product->name }}">{{ $product->name }}</h3>
                <p class="card-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="card-action">
                    @auth
                    <form action="{{ route('carts.store', $product->id) }}" method="POST" class="add-cart-form">
                        @csrf
                        <button type="submit" class="btn-card" data-product="{{ $product->id }}">
                            <span style="font-size:1.09em;">🛒</span> + Keranjang
                        </button>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-card" style="background: #ffe2ee; color: #e91e63; border: 1px solid #e91e63;">
                            <span style="font-size:1.05em;">🔒</span> Login dulu yuk
                        </a>
                    @endauth
                    <a href="https://wa.me/6281234567890?text=Halo%20Croppy%2C%20saya%20mau%20order%20produk:%20{{ urlencode($product->name) }}%20harga%20Rp%20{{ number_format($product->price, 0, ',', '.') }}" 
                        class="btn-card wa" target="_blank"
                        title="Chat WhatsApp">
                        <span style="font-size:1.05em;">💬</span> Chat WA
                    </a>
                </div>
                <div class="added-message" style="display:none;">&#10003; Ditambahkan!</div>
            </div>
        </div>
        @endforeach
        </div>
        <div style="text-align:center; margin-top: 22px;">
            <a href="{{ route('front.products') }}" class="btn-primary" 
            style="background:#fff;color:#e91e63;border:1px solid #e91e63;">
            <span style="font-size:1.1em;">🧺</span> Lihat Semua Produk</a>
        </div>
    </div>
</section>
<!-- Tentang Section -->
<section id="tentang" class="tentang">
    <div class="container">
        <div class="tentang-content">
            <div class="tentang-image" data-aos="fade-right">
                <img src="{{asset('assets-guest/img/Gambar4.jpg')}}" alt="logo-site">
            </div>
            <div class="tentang-text" data-aos="fade-left">
                <h2 class="section-title">Tentang Croppy.co✨</h2>
                <p class="tentang-description">
                    Kami membuat gantungan kunci rajut kecil dengan penuh <b style="color:#e91e63;">cinta</b>.
                    Setiap rajutan dijahit dengan <b style="color:#c764a7;">detail</b> dan bahan lembut, cocok untuk tas, kunci, maupun hadiah spesial. <span style="font-size:1.08em;">💝</span>
                </p>
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

<!-- Testimoni Section - Bubble carousel & interaktiv -->
<section id="testimoni" class="testimoni-section">
    <div class="container">
        <h2 class="testimoni-title">Testimoni Pelanggan</h2>
        <p class="testimoni-subtitle">Apa kata mereka tentang Croppy.co?</p>
        <div class="testimoni-list" id="testimoniList">
            <div class="testimoni-card active" data-aos="fade-up">
                <div class="testimoni-user">
                    <img class="testimoni-user-img" src="https://i.pravatar.cc/150?img=36" alt="user1">
                    <div class="testimoni-user-info">
                        <span class="testimoni-username">Siti Nurhasanah</span>
                        <span class="testimoni-rating" title="5 bintang">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </span>
                    </div>
                </div>
                <div class="testimoni-text">
                    Sangat puas! Boneka topp banget dan pengiriman cepat.
                    Ownernya ramah juga, pesanan bisa custom.<span> 💖</span>
                </div>
            </div>
            <div class="testimoni-card" data-aos="fade-up" data-aos-delay="80">
                <div class="testimoni-user">
                    <img class="testimoni-user-img" src="https://i.pravatar.cc/150?img=11" alt="user2">
                    <div class="testimoni-user-info">
                        <span class="testimoni-username">Agus Prabowo</span>
                        <span class="testimoni-rating" title="5 bintang">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </span>
                    </div>
                </div>
                <div class="testimoni-text">
                    Hasil rajutan rapi dan lucu, anakku senang banget. Terima kasih, Croppy! <span>🧶</span>
                </div>
            </div>
            <div class="testimoni-card" data-aos="fade-up" data-aos-delay="160">
                <div class="testimoni-user">
                    <img class="testimoni-user-img" src="https://i.pravatar.cc/150?img=7" alt="user3">
                    <div class="testimoni-user-info">
                        <span class="testimoni-username">Maria Putri</span>
                        <span class="testimoni-rating" title="5 bintang">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </span>
                    </div>
                </div>
                <div class="testimoni-text">
                    Lucuuu parah! Cocok banget buat hadiah dan kualitas benangnya bagus. <span>😍</span>
                </div>
            </div>
            <div class="testimoni-card" data-aos="fade-up" data-aos-delay="240">
                <div class="testimoni-user">
                    <img class="testimoni-user-img" src="https://i.pravatar.cc/150?img=25" alt="user4">
                    <div class="testimoni-user-info">
                        <span class="testimoni-username">Indra Maulana</span>
                        <span class="testimoni-rating" title="4 bintang">★ ★ ★ ★ ☆</span>
                    </div>
                </div>
                <div class="testimoni-text">
                    Packaging aman, barang sampai mulus. Akan repeat order lagi pasti! <span>🧸</span>
                </div>
            </div>
        </div>
        <div style="text-align:center;margin-top:19px;">
            <button id="prevTesti" class="btn-primary" style="background:#fff;border:1.5px solid #e91e63;color:#e91e63;padding:8px 19px;font-size:1rem;border-radius:41px;margin-right:12px;">&#60; </button>
            <button id="nextTesti" class="btn-primary" style="background:#fff;border:1.5px solid #e91e63;color:#e91e63;padding:8px 19px;font-size:1rem;border-radius:41px;"> &#62;</button>
        </div>
    </div>
</section>

<!-- Loader Modal tetap ada, walau tidak dipakai untuk testimoni -->
<div id="modalLoader" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:99;background:rgba(255,255,255,0.7);align-items:center;justify-content:center;">
    <div style="background:#fff;box-shadow:0 6px 32px #e91e6339;border-radius:18px;padding:34px 24px;display:flex;align-items:center;gap:16px;">
        <svg width="52" height="52" style="animation:spin 1s linear infinite"><circle cx="26" cy="26" r="20" fill="none" stroke="#e91e63" stroke-width="5" stroke-linecap="round" stroke-dasharray="94" stroke-dashoffset="0"></circle></svg>
        <span style="color:#e91e63;font-size:1.13rem;font-weight:600;">Mengirim ...</span>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof AOS !== 'undefined') { AOS.init(); }

    // Typing effect untuk hero subtitle - lebih manis
    let subtitle = "Teman Kecil Rajutan Tangan yang Penuh Cinta ✨";
    let el = document.getElementById('typed-subtitle');
    if(el){
        let i = 0;
        el.innerHTML = "";
        function typeEffect(){
            if(i < subtitle.length){
                el.innerHTML += subtitle.charAt(i);
                i++;
                setTimeout(typeEffect, 39 + Math.random()*17);
            }
        }
        setTimeout(typeEffect, 800);
    }

    // AJAX add to cart (interaktif)
    document.querySelectorAll('.add-cart-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var btn = form.querySelector('.btn-card');
            var msg = form.closest('.card-content').querySelector('.added-message');
            btn.disabled = true;
            btn.classList.add('added');
            btn.innerHTML = '<span style="font-size:1em;vertical-align:middle;">&#10004;</span> Ditambahkan!';
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
                    setTimeout(function() {
                        btn.disabled = false;
                        btn.classList.remove('added');
                        btn.innerHTML = '<span style="font-size:1.09em;">🛒</span> + Keranjang';
                        msg.style.display = 'none';
                    }, 1450);
                } else {
                    msg.style.display = 'none';
                    btn.disabled = false;
                    btn.classList.remove('added');
                    btn.innerHTML = '<span style="font-size:1.09em;">🛒</span> + Keranjang';
                    alert('Gagal menambah ke keranjang');
                }
            })
            .catch(function() {
                msg.style.display = 'none';
                btn.disabled = false;
                btn.classList.remove('added');
                btn.innerHTML = '<span style="font-size:1.09em;">🛒</span> + Keranjang';
                alert('Terjadi kesalahan saat menambah ke keranjang');
            });
        });
    });

    // Smooth scroll "Lihat Koleksi"
    document.getElementById('lihatKoleksiBtn').addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('produk').scrollIntoView({behavior:'smooth'});
    });

    // Testimoni Carousel/Bubble Interaktiv
    const testiCards = Array.from(document.querySelectorAll('#testimoniList .testimoni-card'));
    let testiIndex = 0;
    function setTestimoniActive(idx) {
        testiCards.forEach(card => card.classList.remove('active'));
        if (testiCards[idx]) testiCards[idx].classList.add('active');
        // Scroll to active
        testiCards[idx].scrollIntoView({behavior: 'smooth', inline: 'center', block: 'nearest'});
    }
    document.getElementById('nextTesti').addEventListener('click', function(){
        testiIndex = (testiIndex + 1) % testiCards.length;
        setTestimoniActive(testiIndex);
    });
    document.getElementById('prevTesti').addEventListener('click', function(){
        testiIndex = (testiIndex - 1 + testiCards.length) % testiCards.length;
        setTestimoniActive(testiIndex);
    });
    // Click on bubble to set active
    testiCards.forEach((card, idx) => {
        card.addEventListener('click', function(){
            testiIndex = idx;
            setTestimoniActive(testiIndex);
        });
    });

    // Parallax effect di hero (lebih lembut/imut)
    window.addEventListener('mousemove',function(e){
        var img = document.querySelector('.hero-image img');
        if(!img) return;
        let x = (e.clientX/window.innerWidth-0.5)*16; 
        let y = (e.clientY/window.innerHeight-0.5)*9; 
        img.style.transform = 'translate('+x+'px,'+y+'px) scale(1.04) rotate(-3deg)';
        setTimeout(function(){img.style.transform='';}, 900);
    });
});
</script>
@endsection