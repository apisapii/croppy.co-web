@extends('layouts.guest.app')
@section('content')
<div class="container" style="margin-top: 50px; margin-bottom: 80px;">
    <div class="text-center mb-5">
        <h2 style="color: #e91e63; font-weight: 800; font-size: 2.5rem;">Hubungi Kami 📞</h2>
        <p style="color: #666; font-size: 1.1rem;">Ada pertanyaan soal produk? Tim Croppy siap membantu!</p>
    </div>

    <div class="row">
        <div class="col-md-5 mb-4">
            <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%;">
                <h4 style="font-weight: bold; margin-bottom: 25px; color: #333;">Informasi Kontak</h4>

                <div style="display: flex; align-items: start; margin-bottom: 25px;">
                    <div style="background: #e7fbe7; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 17px; margin-top: 2px; font-size: 22px;">
                        🟢
                        <span style="position: absolute; font-size: 18px; margin-top: 2px; color: #25D366;">📱</span>
                    </div>
                    <div>
                        <div style="font-size: 12px; color: #444; font-weight: 600; margin-bottom:2px;">WhatsApp</div>
                        <div style="font-size: 16px; color: #25D366; line-height: 1.2;">0823-6436-8541</div>
                        <div>
                            <a href="https://wa.me/6282364368541?text=Halo%20Admin%20Croppy,%20saya%20mau%20tanya%20produk..." target="_blank"
                                style="color: #25D366; font-weight: bold; text-decoration: none; font-size: 15px; display:inline-block; margin-top:8px;">
                                Chat Sekarang &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <div style="display: flex; align-items: start; margin-bottom: 25px;">
                    <div style="background: #e3f2fd; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 17px; margin-top: 2px; font-size: 19px;">
                        ✉️
                    </div>
                    <div>
                        <div style="font-size: 12px; color: #444; font-weight: 600; margin-bottom:2px;">Email</div>
                        <div style="font-size: 16px; color: #989898; line-height: 1.2;">crochet.happy.croppy@gmail.com</div>
                    </div>
                </div>

                <div style="display: flex; align-items: start;">
                    <div style="background: #ffebee; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 17px; margin-top: 2px; font-size: 19px;">
                        📍
                    </div>
                    <div>
                        <div style="font-size: 12px; color: #F06292; font-weight: 600; margin-bottom:2px;">Lokasi</div>
                        <div style="font-size: 15px; color: #444; line-height: 1.65;">
                            Politeknik Caltex Riau, Jl. Umban Sari (Patin) No.1, Rumbai, Pekanbaru, Riau 28265.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-7 mb-4">
            <div style="background: white; padding: 10px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); height: 100%; overflow: hidden;">
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.510941174844!2d101.41489094052277!3d0.5600247405335554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab67086f2e89%3A0x65a24264fec306bb!2sPoliteknik%20Caltex%20Riau!5e0!3m2!1sid!2sid!4v1767198939715!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                width="100%" 
                    height="100%" 
                    style="border:0; border-radius: 10px; min-height: 350px;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection