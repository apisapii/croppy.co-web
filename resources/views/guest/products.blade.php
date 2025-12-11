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