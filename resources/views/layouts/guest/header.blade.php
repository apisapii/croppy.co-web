<header class="header">
    <div class="container">
        <div class="logo">
            <span class="logo-icon"><img src="{{asset('assets-guest/img/Logo.png')}}" alt="logo-site" width="240"></span>
            <span class="logo-text">Croppy.co</span>
        </div>
        <nav class="nav" style="display: flex; align-items: center; gap: 18px;">
            <a href="/" class="nav-link">Home</a>
            <a href="/produk" class="nav-link">Produk</a>
            
            @auth
                <a href="{{ route('carts.index') }}" class="nav-link" style="color: #e91e63; font-weight: bold; position: relative;">
                    Keranjang 🛒
                    @php
                        $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                    @endphp
                    @if($cartCount > 0)
                        <span style="
                            background-color: white; 
                            color: #e91e63; 
                            border-radius: 50%; 
                            padding: 2px 6px; 
                            font-size: 12px; 
                            font-weight: bold;
                            margin-left: 5px;
                            border: 1px solid #e91e63;
                            vertical-align: text-top;
                        ">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                <!-- Dropdown User Menu -->
                <div class="dropdown" style="display:inline-block; position:relative;">
                    <button class="nav-link" style="background:none; border:none; cursor:pointer;display: flex;align-items: center;gap:4px; font-size: 1rem;" id="userDropdownBtn">
                        {{ Auth::user()->name ?? 'User' }}
                        <svg style="height:1em;width:1em;" viewBox="0 0 20 20"><path fill="#111" d="M5.25 8.5L10 13.25L14.75 8.5H5.25Z"></path></svg>
                    </button>
                    <ul class="dropdown-menu" id="userDropdownMenu" style="min-width:130px;position:absolute;right:0;top:100%;background:#fff;border:1px solid #eee; box-shadow: 0 3px 14px rgba(0,0,0,0.07);padding:0;margin:0;list-style:none;display:none;z-index:9;border-radius: 7px;overflow:hidden;">
                        <li style="border-bottom:1px solid #f2f2f2;">
                            <span style="display:block;padding:10px 18px; color: #555;">
                                👤 <b>{{ Auth::user()->name ?? 'User' }}</b>
                            </span>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                                @csrf
                                <button type="submit" style="background:none; border:none; width:100%; text-align:left; padding:10px 18px; color:#e91e63; cursor:pointer; font-weight: bold;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const btn = document.getElementById('userDropdownBtn');
                        const menu = document.getElementById('userDropdownMenu');
                        document.addEventListener('click', function(e) {
                            if (btn && btn.contains(e.target)) {
                                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
                            } else if(menu && !menu.contains(e.target)) {
                                menu.style.display = 'none';
                            }
                        });
                    });
                </script>
            @else
                <div class="dropdown" style="display:inline-block; position:relative;">
                    <button class="nav-link" style="background:none; border:none; cursor:pointer;display: flex;align-items: center;gap:4px; font-size: 1rem;" id="guestDropdownBtn">
                        Akun
                        <svg style="height:1em;width:1em;" viewBox="0 0 20 20"><path fill="#111" d="M5.25 8.5L10 13.25L14.75 8.5H5.25Z"></path></svg>
                    </button>
                    <ul class="dropdown-menu" id="guestDropdownMenu" style="min-width:130px;position:absolute;right:0;top:100%;background:#fff;border:1px solid #eee; box-shadow: 0 3px 14px rgba(0,0,0,0.07);padding:0;margin:0;list-style:none;display:none;z-index:9;border-radius: 7px;overflow:hidden;">
                        <li>
                            <a href="{{ route('login') }}" class="nav-link" style="display:block;padding:10px 18px; color: #555; text-decoration:none;">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="nav-link" style="display:block;padding:10px 18px; color: #e91e63; text-decoration:none; font-weight: bold;">Daftar</a>
                        </li>
                    </ul>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const btnGuest = document.getElementById('guestDropdownBtn');
                        const menuGuest = document.getElementById('guestDropdownMenu');
                        document.addEventListener('click', function(e) {
                            if (btnGuest && btnGuest.contains(e.target)) {
                                menuGuest.style.display = (menuGuest.style.display === 'block') ? 'none' : 'block';
                            } else if(menuGuest && !menuGuest.contains(e.target)) {
                                menuGuest.style.display = 'none';
                            }
                        });
                    });
                </script>
            @endauth
        </nav>
    </div>
</header>