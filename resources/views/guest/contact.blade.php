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
                    <div style="background: #e7fbe7; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                        <i class="fab fa-whatsapp" style="font-size: 24px; color: #25D366;"></i>
                    </div>
                    <div>
                        <h6 style="font-weight: bold; margin: 0;">WhatsApp</h6>
                        <p style="color: #666; margin: 5px 0;">0823-6436-8541</p>
                        <a href="https://wa.me/6282364368541?text=Halo%20Admin%20Croppy,%20saya%20mau%20tanya%20produk..." target="_blank" style="color: #25D366; font-weight: bold; text-decoration: none;">
                            Chat Sekarang &rarr;
                        </a>
                    </div>
                </div>

                <div style="display: flex; align-items: start; margin-bottom: 25px;">
                    <div style="background: #e3f2fd; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                        <i class="fas fa-envelope" style="font-size: 24px; color: #2196F3;"></i>
                    </div>
                    <div>
                        <h6 style="font-weight: bold; margin: 0;">Email</h6>
                        <p style="color: #666; margin: 5px 0;">halo@croppy.co.id</p>
                    </div>
                </div>

                <div style="display: flex; align-items: start;">
                    <div style="background: #ffebee; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                        <i class="fas fa-map-marker-alt" style="font-size: 24px; color: #e91e63;"></i>
                    </div>
                    <div>
                        <h6 style="font-weight: bold; margin: 0;">Lokasi Workshop</h6>
                        <p style="color: #666; margin: 5px 0;">
                            Politeknik Caltex Riau, Jl. Umban Sari (Patin) No.1, Rumbai, Pekanbaru, Riau 28265.
                        </p>
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

    <div class="row justify-content-center mt-5">
        <div class="col-md-8 text-center">
            <h4 style="font-weight: bold; margin-bottom: 20px;">Kirim Pesan Cepat 🚀</h4>
            <form action="#" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" placeholder="Nama Kamu" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" placeholder="Email Kamu" style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                </div>
                <textarea rows="4" class="form-control mb-3" placeholder="Tulis pesanmu di sini..." style="padding: 12px; border-radius: 8px; border: 1px solid #ddd;"></textarea>
                <button type="button" class="btn btn-primary" style="background: #e91e63; border: none; padding: 12px 30px; font-weight: bold; border-radius: 50px; width: 100%;">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>

</div>
@endsection