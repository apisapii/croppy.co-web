<footer style="background: linear-gradient(to bottom, #fff0f6, #fce4ec); padding-top: 60px; margin-top: 80px; border-top: 3px solid #f8bbd0;">
    <div class="container">
        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 30px;">
            
            <div class="col-md-4" style="flex: 1; min-width: 250px;">
                <h3 style="color: #e91e63; font-family: 'Montserrat', sans-serif; font-weight: 800; margin-bottom: 15px;">
                    Croppy.co 🧶
                </h3>
                <p style="color: #555; line-height: 1.6; font-size: 0.95rem;">
                    Sahabat rajut terbaikmu! Menyediakan boneka rajut handmade yang penuh cinta dan kehangatan untuk menemani hari-harimu.
                </p>
            </div>

            <div class="col-md-3" style="flex: 1; min-width: 200px;">
                <h5 style="color: #ad1457; font-weight: 700; margin-bottom: 20px;">Jelajahi</h5>
                <ul style="list-style: none; padding: 0; line-height: 2;">
                    <li><a href="{{ url('/') }}" style="color: #666; text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#666'">Beranda</a></li>
                    <li><a href="{{ route('products.index') }}" style="color: #666; text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#666'">Katalog Produk</a></li>
                    <li><a href="{{ url('/about') }}" style="color: #666; text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#666'">Tentang Kami</a></li>
                    <li><a href="{{ route('orders.index') }}" style="color: #666; text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='#e91e63'" onmouseout="this.style.color='#666'">Lacak Pesanan</a></li>
                </ul>
            </div>

            <div class="col-md-4" style="flex: 1; min-width: 250px;">
                <h5 style="color: #ad1457; font-weight: 700; margin-bottom: 20px;">Temukan Kami di</h5>
                
                <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                    
                    <a href="https://tk.tokopedia.com/ZS5U3nSKN/" target="_blank" title="Tokopedia" 
                       style="background: white; padding: 10px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s; display: inline-flex; align-items: center; justify-content: center; width: 50px; height: 50px;"
                       onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kratos/60450917.png" alt="Tokopedia" style="width: 32px;">
                    </a>

                    <a href="https://shopee.co.id/croppy.co" target="_blank" title="Shopee" 
                       style="background: white; padding: 10px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s; display: inline-flex; align-items: center; justify-content: center; width: 50px; height: 50px;"
                       onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Shopee.svg/1024px-Shopee.svg.png" alt="Shopee" style="width: 32px;">
                    </a>

                    <a href="https://www.instagram.com/hey_croppy?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" title="Instagram"
                       style="background: white; color: #E1306C; font-size: 26px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s; display: inline-flex; align-items: center; justify-content: center; width: 50px; height: 50px; text-decoration: none;"
                       onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://www.tiktok.com/@croppy.co?is_from_webapp=1&sender_device=pc" target="_blank" title="TikTok"
                       style="background: white; color: #000; font-size: 24px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s; display: inline-flex; align-items: center; justify-content: center; width: 50px; height: 50px; text-decoration: none;"
                       onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="fab fa-tiktok"></i>
                    </a>

                </div>
                
                <p style="margin-top: 20px; font-size: 0.9rem; color: #777;">
                    Jangan lupa follow untuk update terbaru ya! ✨
                </p>
            </div>
        </div>
        
        <div style="border-top: 1px solid #f0bbd0; margin-top: 40px; padding: 25px 0; text-align: center; color: #888; font-size: 0.9rem;">
            &copy; {{ date('Y') }} <strong>Croppy.co</strong>. All rights reserved. <br>
            <span style="font-size: 0.8rem;">Made with ❤️ by Kelompok Croppy</span>
        </div>
    </div>
</footer>