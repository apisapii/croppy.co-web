<header class="header" style="background: white; border-bottom: 1px solid #eee; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 20px; max-width: 1200px; margin: 0 auto;">
        
        <div style="display: flex; align-items: center; gap: 40px;">
            <a href="/" class="logo" style="text-decoration: none; display: flex; align-items: center;">
                <img src="{{asset('assets-guest/img/Logo.png')}}" alt="Croppy Logo" style="height: 45px; width: auto;">
            </a>

            <nav class="nav-links d-none d-md-flex" style="display: flex; gap: 25px;">
                <a href="/" style="color: #333; text-decoration: none; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; transition: color 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#333'">
                    Home
                </a>
                <a href="/produk" style="color: #333; text-decoration: none; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; transition: color 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#333'">
                    Produk
                </a>
                <a href="{{ route('pages.about') }}" style="color: #333; text-decoration: none; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; transition: color 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#333'">
                    About Us
                </a>
                <a href="{{ route('pages.contact') }}" style="color: #333; text-decoration: none; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; transition: color 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#333'">
                    Kontak
                </a>
            </nav>
        </div>

        <div class="nav-icons" style="display: flex; align-items: center; gap: 20px;">
            
            @auth
                <a href="{{ route('orders.index') }}" title="Pesanan Saya" style="color: #333; transition: 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#333'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width: 24px; height: 24px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </a>

                <div class="dropdown" style="position:relative;">
                    <button id="userDropdownBtn" style="background:none; border:none; cursor:pointer; padding: 0; display: flex; align-items: center;">
                        @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="Profil" 
                                 style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 1px solid #ddd;">
                        @else
                            <div style="width: 32px; height: 32px; background: #333; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                    </button>

                    <ul class="dropdown-menu" id="userDropdownMenu" style="min-width:180px; position:absolute; right:0; top:130%; background:#fff; border:1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.1); padding:0; margin:0; list-style:none; display:none; z-index:999; border-radius: 10px; overflow:hidden;">
                        <li style="border-bottom:1px solid #f5f5f5; padding: 15px;">
                            <span style="display: block; font-weight: bold; font-size: 14px; color: #333;">{{ Str::limit(Auth::user()->name, 15) }}</span>
                            <span style="font-size: 11px; color: #888;">{{ Str::limit(Auth::user()->email, 20) }}</span>
                        </li>
                        <li><a href="{{ route('guest.profile.index') }}" style="display:block; padding:12px 15px; color:#555; text-decoration:none; font-size: 14px;">👤 Profil Saya</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                                @csrf
                                <button type="submit" style="background:none; border:none; width:100%; text-align:left; padding:12px 15px; color:#e91e63; cursor:pointer; font-weight: 600; font-size: 13px;">🚪 Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('carts.index') }}" title="Keranjang" style="color: #333; position: relative; margin-left: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width: 24px; height: 24px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    @php $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity'); @endphp
                    @if($cartCount > 0)
                        <span style="position: absolute; top: -5px; right: -8px; background: #e91e63; color: white; border-radius: 50%; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: bold; border: 2px solid white;">{{ $cartCount }}</span>
                    @endif
                </a>

            @else
                <div style="display: flex; gap: 15px; align-items: center;">
                    <a href="{{ route('login') }}" style="color: #333; text-decoration: none; font-weight: 600; font-size: 14px;">Masuk</a>
                    <span style="color: #ddd;">|</span>
                    <a href="{{ route('register') }}" style="color: #333; text-decoration: none; font-weight: 600; font-size: 14px;">Daftar</a>
                </div>
            @endauth

        </div>
    </div>
</header>

<style>
    @media (max-width: 768px) {
        .d-none { display: none !important; } /* Sembunyikan menu teks di HP */
        .container { padding: 15px; } /* Padding lebih kecil di HP */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('userDropdownBtn');
        const menu = document.getElementById('userDropdownMenu');

        if(btn && menu){
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            });
            document.addEventListener('click', function(e) {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.style.display = 'none';
                }
            });
        }
    });
</script>