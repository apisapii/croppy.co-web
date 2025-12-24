@extends('layouts.guest.app')
@section('content')
<style>
    body { font-family: 'Quicksand', sans-serif; background-color: #fcfcfc; }
    .products-hero {
        background: linear-gradient(120deg, #ffe8f1 0%, #f7fff6 100%);
        padding: 60px 0 30px;
        text-align: center;
    }
    .products-hero-title {
        font-size: 2.4rem;
        color: #e91e63;
        font-weight: bold;
        letter-spacing: 2px;
        margin-bottom: 0.3em;
        text-shadow: 0 0 8px #fff5f9;
        font-family: 'Quicksand', cursive;
    }
    .products-hero-desc {
        font-size: 1.15rem;
        color: #888;
        margin-bottom: 2em;
    }
    @media (max-width: 600px) {
        .products-hero-title { font-size: 1.4rem; }
    }
    .filterbar-wrap {
        max-width: 1200px;
        margin: 40px auto 20px;
        padding: 0 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 16px 32px;
        justify-content: space-between;
        align-items: center;
    }
    .search-box {
        flex: 2;
        display: flex;
        gap: 8px;
        min-width: 240px;
    }
    .search-input {
        flex: 1;
        padding: 12px 20px;
        border: 2px solid #ffc1e3;
        border-radius: 50px;
        font-family: 'Quicksand', sans-serif;
        font-size: 1rem;
        outline: none;
        transition: 0.3s;
        background: white;
    }
    .search-input:focus { border-color: #e91e63; box-shadow: 0 0 10px rgba(233, 30, 99, 0.10); }
    .search-btn {
        background: #e91e63;
        color: white;
        border: none;
        padding: 0 25px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        letter-spacing: 0.5px;
        transition: 0.2s;
    }
    .search-btn:hover { background: #ce2055; }

    .filterbar-select {
        display: flex;
        align-items: center;
    }
    .sort-label {
        font-size: 1rem;
        margin-right: 6px;
        color: #888;
        font-weight: 500;
    }
    .sort-select {
        padding: 8px 16px;
        border-radius: 20px;
        border: 1.5px solid #ffd6ed;
        background: #fff9fa;
        color: #e91e63;
        font-weight: 500;
        font-size: 0.97rem;
        outline: none;
        transition: 0.2s;
    }
    .sort-select:focus { border-color: #e91e63; }

    .category-filter {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 32px 0 40px;
        flex-wrap: wrap;
    }
    .cat-pill {
        text-decoration: none;
        color: #555;
        background: white;
        padding: 10px 28px;
        border-radius: 24px;
        border: 1.7px solid #ffd0ea;
        font-size: 1rem;
        font-weight: 500;
        transition: 0.3s;
        box-shadow: 0 2px 7px rgba(255,201,228,0.11);
    }
    .cat-pill:hover, .cat-pill.active {
        background: #e91e63;
        color: white;
        border-color: #e91e63;
        box-shadow: 0 3px 12px rgba(233,30,99,0.12);
    }

    .catalog-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 60px;
    }
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
        gap: 36px;
        margin-top: 10px;
    }
    .product-card {
        background: linear-gradient(135deg, #fff 90%, #ffe2ec 100%);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(226, 77, 173, 0.07);
        display: flex;
        flex-direction: column;
        position: relative;
        transition: 0.23s;
        border: 1.6px solid #ffe4ec;
    }
    .product-card:hover { transform: translateY(-6px) scale(1.02); box-shadow: 0 14px 35px rgba(233,30,99,0.14);}
    .card-image { width: 100%; background: #fff6fa; min-height: 220px; display: flex; align-items: center; justify-content: center;}
    .card-image img {
        width: 170px;
        height: 170px;
        object-fit: cover;
        margin: 28px 0 0 0;
        border-radius: 21px;
        box-shadow: 0 4px 18px #fdebf6;
        background: white;
    }
    .card-content {
        padding: 18px 20px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        border-top: 1.2px solid #ffe2ec;
        text-align: left;
    }
    .card-cat {
        font-size: 0.93rem;
        color: #e91e63;
        margin-bottom: 4px;
        font-weight: 500;
        letter-spacing: 0.2px;
    }
    .card-title {
        font-size: 1.22rem;
        font-weight: 700;
        margin: 0 0 6px 0;
        color: #3d2556;
        line-height: 1.28;
    }
    .card-price {
        font-size: 1.17rem;
        color: #ee197d;
        font-weight: bold;
        margin-bottom: 18px;
        letter-spacing: 0.2px;
    }
    .btn-card {
        width: 100%;
        padding: 12px;
        background: #e91e63;
        color: white;
        text-align: center;
        border-radius: 12px;
        text-decoration: none;
        font-weight: bold;
        border: none;
        cursor: pointer;
        font-size: 1.025rem;
        box-shadow: 0 2px 7px #ffe6f0;
        transition: 0.2s;
        margin-bottom: 5px;
    }
    .btn-card:hover { background: #be1751; }
    .card-actions {
        display: flex;
        gap: 10px;
    }
    .chat-wa-btn {
        background: #25d366;
        color: white;
        border-radius: 12px;
        padding: 10px 0;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        border: none;
        width: 100%;
        font-size: 1rem;
        transition: 0.18s;
        letter-spacing: 0.2px;
        box-shadow: 0 1px 5px #ddfbe9;
    }
    .chat-wa-btn:hover { background: #128c7e; }

    /* --- Review Section Minimalis --- */
    .card-review-wrap {
        margin-top:40px; 
        border-top: 1px solid #eee; 
        padding-top: 13px;
        padding-bottom: 5px;
    }
    .review-summary {
        display: flex;
        align-items: center;
        gap: 7px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #e91e63;
        font-size: 1.05rem;
    }
    .review-star {
        color: #ffd81c;
        font-size: 1.2em;
    }
    .reviews-list-min {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }
    .review-item {
        background: #fff7fc;
        border-radius: 9px;
        padding: 11px 13px;
        font-size: 0.97em;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 2px 8px #ffe4f02a;
    }
    .review-avatar {
        background: #ffe7f5;
        color: #e91e63;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1em;
    }
    .review-content {
        flex: 1;
    }
    .review-user {
        font-weight: 600;
        font-size: 0.98em;
        color: #e91e63;
        margin-right: 5px;
    }
    .review-date {
        font-size: 0.87em;
        color: #aaa;
        margin-left: 8px;
        font-weight: 400;
    }
    .review-rating {
        color: #ffd600;
        font-size: 0.91em;
        margin-right: 5px;
    }
    .no-review-hint {
        color: #aaa;
        font-size: 0.97em;
        margin-bottom: 7px;
        text-align: center;
    }
    .review-form-minimal {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 13px;
        margin-top: 6px;
    }
    .review-form-minimal select,
    .review-form-minimal textarea {
        font-family: inherit;
        border: 1.2px solid #ffd0ea;
        border-radius: 21px;
        padding: 8px 11px;
        font-size: 0.99em;
    }
    .review-form-minimal textarea {
        resize: none;
        min-width: 90px;
        width: 100%;
        min-height: 30px;
        max-height: 60px;
    }
    .review-form-minimal button {
        background: #e91e63;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 7px 17px;
        font-weight: 700;
        font-size: 1em;
        cursor: pointer;
        transition: 0.2s;
    }
    .review-form-minimal button:hover {
        background: #be1751;
    }
    .review-lock {
        background: #fff7d2;
        color: #9a8300;
        font-size: 0.98em;
        border-radius: 7px;
        padding: 8px 12px;
        text-align: center;
        margin-bottom: 8px;
        margin-top: 4px;
    }
    @media (max-width: 950px) {
        .product-grid { grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); }
    }
    @media (max-width: 660px) {
        .product-grid { grid-template-columns: 1fr; }
        .filterbar-wrap { flex-direction: column; align-items: stretch; gap: 15px 5px;}
        .search-box { min-width: 0; }
        .catalog-container { padding: 0 4vw 20vw; }
    }
    .no-products {
        text-align: center; padding: 60px 0 30px;
    }
    .no-products img { width: 140px; opacity: 0.5; margin-bottom: 16px;}
    .no-products h3 { color: #888; margin-bottom: 14px;}
</style>

<section class="products-hero">
    <h1 class="products-hero-title">Koleksi Produk Croppy.co</h1>
    <div class="products-hero-desc">Pilih gantungan kunci rajut handmade favoritmu dan temukan teman kecil yang menggemaskan! ✨</div>
</section>

<form action="{{ route('front.products') }}" method="GET" style="margin-bottom: 0;">
    <div class="filterbar-wrap">
        <div class="search-box">
            <input type="text" name="search" class="search-input" placeholder="Cari boneka lucu..." value="{{ request('search') }}">
            <button type="submit" class="search-btn">🔍 Cari</button>
        </div>
        <div class="filterbar-select">
            <label for="sort" class="sort-label">Urutkan:</label>
            <select name="sort" id="sort" class="sort-select" onchange="this.form.submit()">
                <option value="" {{ request('sort') == ''?'selected':'' }}>Paling Sesuai</option>
                <option value="az" {{ request('sort') == 'az'?'selected':'' }}>Nama A-Z</option>
                <option value="za" {{ request('sort') == 'za'?'selected':'' }}>Nama Z-A</option>
                <option value="low" {{ request('sort') == 'low'?'selected':'' }}>Harga Terendah</option>
                <option value="high" {{ request('sort') == 'high'?'selected':'' }}>Harga Tertinggi</option>
                <option value="custom" {{ request('sort') == 'custom'?'selected':'' }}>Urutan Sesuai Buatan Admin</option>
            </select>
        </div>
    </div>

    <div class="category-filter">
        <a href="{{ route('front.products', array_merge(request()->except('category', 'page'))) }}" class="cat-pill {{ !request('category') ? 'active' : '' }}">
            Semua
        </a>
        @foreach($categories as $cat)
          <a href="{{ route('front.products', array_merge(request()->except('category', 'page'), ['category' => $cat->id])) }}"
            class="cat-pill {{ request('category') == $cat->id ? 'active' : '' }}">
            {{ $cat->name }}
          </a>
        @endforeach
    </div>
</form>

<div class="catalog-container">
    @php
        $sort = request('sort');
        $sortedProducts = $products;
        // Sorting array manual jika sort=custom dan ada attribute order/by_order_index di model Product
        if ($sort == 'custom' && $products instanceof \Illuminate\Contracts\Support\Arrayable) {
            // Eloquent Collection
            $sortedProducts = $products->sortBy(function($item){
                return $item->order ?? ($item->by_order_index ?? 10000);
            })->values();
        } elseif ($sort == 'az') {
            $sortedProducts = $products->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE)->values();
        } elseif ($sort == 'za') {
            $sortedProducts = $products->sortByDesc('name', SORT_NATURAL|SORT_FLAG_CASE)->values();
        } elseif ($sort == 'low') {
            $sortedProducts = $products->sortBy('price')->values();
        } elseif ($sort == 'high') {
            $sortedProducts = $products->sortByDesc('price')->values();
        }
    @endphp
    @if($sortedProducts->count() > 0)
        <div class="product-grid">
            @foreach($sortedProducts as $product)
                <div class="product-card">
                    <div class="card-image">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('img/default.jpg') }}" alt="No Image">
                        @endif
                    </div>
                    <!-- Review Section Minimalis dan Menarik -->
                    <div class="card-review-wrap">
                        <div class="review-summary">
                            @php
                                $reviewAvg = $product->reviews->avg('rating');
                                $reviewCount = $product->reviews->count();
                            @endphp
                            <span class="review-star">★</span>
                            <span>
                                {{ number_format($reviewAvg,1) ?: '0' }}
                            </span>
                            <span style="color:#b39ddb;font-size:0.98em;">({{ $reviewCount }} ulasan)</span>
                        </div>
                        @auth
                            @php
                                $hasPurchased = isset($hasPurchasedProductIds)
                                    ? $hasPurchasedProductIds->contains($product->id)
                                    : false;
                            @endphp
                            @if($hasPurchased)
                                <form action="{{ route('reviews.store') }}" method="POST" class="review-form-minimal">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <select name="rating" style="min-width:48px;">
                                        <option value="5">5★</option>
                                        <option value="4">4★</option>
                                        <option value="3">3★</option>
                                        <option value="2">2★</option>
                                        <option value="1">1★</option>
                                    </select>
                                    <textarea name="comment" rows="1" maxlength="150" placeholder="Tulis ulasan singkat..."></textarea>
                                    <button type="submit">Kirim</button>
                                </form>
                            @else
                                <div class="review-lock">
                                    🔒 <b>Kamu harus beli dulu untuk review</b>
                                </div>
                            @endif
                        @else
                            <div class="no-review-hint"><a href="{{ route('login') }}" style="color:#e91e63;font-weight:600;">Login</a> untuk kasih ulasan</div>
                        @endauth

                        <div class="reviews-list-min">
                            @forelse($product->reviews->sortByDesc('created_at')->take(2) as $review)
                                <div class="review-item">
                                    <div class="review-avatar">
                                        {{ strtoupper(substr($review->user->name,0,1)) }}
                                    </div>
                                    <div class="review-content">
                                        <span class="review-user">{{ strtok($review->user->name,' ') }}</span>
                                        <span class="review-rating">{{ str_repeat('★', $review->rating) }}</span>
                                        <span style="color:#666;">{{ $review->comment }}</span>
                                        <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @empty
                                <div class="no-review-hint">Belum ada ulasan, yuk jadi yang pertama!</div>
                            @endforelse
                            @if($product->reviews->count() > 2)
                                <div style="text-align: right; margin-top:2px;">
                                    <span style="font-size:0.98em;color:#888;">dan {{ $product->reviews->count()-2 }} ulasan lainnya</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- End Review Section -->

                    <div class="card-content">
                        <div>
                            <div class="card-cat">{{ $product->category->name }}</div>
                            <div class="card-title">{{ $product->name }}</div>
                            <div class="card-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="card-actions" style="gap:10px; margin-top:10px; flex-direction:column;">
                            <form action="{{ route('carts.store', $product->id) }}" method="POST" style="margin-bottom:0;">
                                @csrf
                                <button type="submit" class="btn-card"><span style="font-size:1.05em;">+ Keranjang</span> 🛒</button>
                            </form>
                            <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20dengan:%20{{ urlencode($product->name) }}" 
                               target="_blank" class="chat-wa-btn">
                               Chat WA
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-products">
            <img src="{{ asset('img/empty.png') }}" alt="">
            <h3>Yah, produk yang kamu cari nggak ketemu :(</h3>
            <a href="{{ route('front.products') }}" style="color: #e91e63; font-weight:600; text-decoration: underline;">Lihat semua produk aja</a>
        </div>
    @endif
</div>
@endsection