@extends('layouts.guest.app')

@section('content')
<style>
    /* Styling Khusus Halaman About */
    .about-header {
        text-align: center;
        padding: 60px 20px 40px 20px;
        background: linear-gradient(120deg, #fce4ec 0%, #f3e5f5 100%);
        border-radius: 0 0 50% 50% / 20px;
        margin-bottom: 50px;
        overflow: hidden;
        position: relative;
    }

    /* Animasi Confetti (Pelengkap Interaksi) */
    .confetti {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        pointer-events: none;
        z-index: 1;
    }
    .confetti-piece {
        position: absolute;
        width: 12px;
        height: 12px;
        background: #fce4ec;
        border-radius: 50%;
        opacity: 0.85;
        animation: confetti-fall 2s linear infinite;
    }
    .confetti-piece.c1 { background: #f8bbd0; left: 15%; animation-delay: 0s;}
    .confetti-piece.c2 { background: #f3e5f5; left: 33%; animation-delay: .5s;}
    .confetti-piece.c3 { background: #ffe082; left: 58%; animation-delay: .9s;}
    .confetti-piece.c4 { background: #b2ebf2; left: 77%; animation-delay: .3s;}
    .confetti-piece.c5 { background: #c8e6c9; left: 88%; animation-delay: .7s;}
    @keyframes confetti-fall {
        0% { top: -20px; transform: rotate(0deg);}
        100% { top: 110%; transform: rotate(380deg);}
    }
    
    .about-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        color: #e91e63;
        font-size: 2.7rem;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
        animation: popin 0.9s cubic-bezier(.72,1.66,.64,1) both;
    }

    @keyframes popin {
        0% { transform: scale(0.7); opacity: 0;}
        100% { transform: scale(1); opacity: 1;}
    }

    .about-desc {
        max-width: 700px;
        margin: 0 auto;
        color: #555;
        font-size: 1.15rem;
        line-height: 1.7;
        position: relative;
        z-index: 2;
        animation: fadein 1s 0.3s backwards;
    }

    @keyframes fadein {
        0% { opacity: 0; transform: translateY(20px);}
        100% { opacity: 1; transform: none;}
    }

    /* Team Section */
    .team-section {
        padding: 20px 20px 80px 20px;
        text-align: center;
        background: linear-gradient(110deg, #fffde7 0%, #e1bee7 100%);
        border-radius: 30px;
        box-shadow: 0 8px 45px rgba(233, 30, 99, 0.07);
        position: relative;
        margin-top: -30px;
        z-index: 3;
    }

    .section-title {
        color: #333;
        font-weight: 700;
        letter-spacing: 1.2px;
        font-size: 2rem;
        margin-bottom: 40px;
        position: relative;
        display: inline-block;
        background: linear-gradient(90deg,#e91e63 0%,#f8bbd0 130%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #e91e63;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* Penyesuaian agar team sejajar (1 baris, 5 orang) */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 35px 25px;
        max-width: 1200px;
        margin: 0 auto;
        margin-top: 18px;
        justify-items: center;
        align-items: stretch;
    }

    .team-card {
        background: white;
        border-radius: 22px;
        padding: 36px 25px 28px 25px;
        box-shadow: 0 10px 36px rgba(233,30,99,0.13);
        transition: transform 0.32s cubic-bezier(.6,1.64,.64,1), box-shadow 0.29s;
        border: 2px dashed #fce4ec;
        position: relative;
        overflow: visible;
        cursor: pointer;
        animation: team-up 0.6s both;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%; /* agar tinggi semua sama */
        box-sizing: border-box;
    }
    .team-card:hover {
        transform: translateY(-14px) scale(1.04) rotate(-2deg);
        box-shadow: 0 20px 52px rgba(233,30,99,0.28);
        border-color: #e91e63;
    }
    @keyframes team-up {
        0% { opacity: 0; transform: translateY(30px);}
        100% { opacity: 1; transform: none;}
    }

    /* Tooltip pop up BIO */
    .bio-tooltip {
        display: none;
        position: absolute;
        left: 50%;
        bottom: 110%;
        transform: translateX(-50%);
        background: #fff8fb;
        color: #d81b60;
        border: 1px solid #fce4ec;
        padding: 16px 18px;
        border-radius: 12px;
        box-shadow: 0 6px 16px #e91e6321;
        font-size: 0.98rem;
        min-width: 180px;
        z-index: 12;
        opacity: 0;
        transition: 0.25s;
        pointer-events: none;
        animation: bio-fade .42s cubic-bezier(.53,1.86,.59,1.75);
    }
    @keyframes bio-fade {
        0% { opacity: 0; transform: translateY(24px) scale(0.95);}
        100% { opacity: 1; transform: translateY(0) scale(1);}
    }
    .team-card:hover .bio-tooltip, 
    .team-card:focus-within .bio-tooltip {
        display: block;
        opacity: 1;
    }

    .member-photo-wrap {
        position: relative;
        width: 124px;
        height: 124px;
        margin: 0 auto 17px auto;
        transition: 0.3s;
    }
    .team-card:hover .member-photo-wrap {
        scale: 1.08;
    }
    .member-photo {
        width: 124px;
        height: 124px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #fce4ec;
        padding: 3px;
        position: relative;
        z-index: 2;
        box-shadow: 0 3px 15px #e91e6322;
        background: white;
        transition: 0.25s;
    }
    .member-badge {
        position: absolute;
        bottom: -7px;
        right: 10px;
        background: #ffc107;
        color: #fff;
        border-radius: 50%;
        border: 2px solid #fff8fb;
        padding: 5px 7px;
        font-size: 1.2rem;
        box-shadow: 0 2px 8px #e91e6335;
        z-index: 3;
        font-family: "Montserrat", sans-serif;
        animation: badge-pop .6s;
    }
    @keyframes badge-pop {
        0% { transform: scale(0.6);}
        80% { transform: scale(1.2);}
        100% { transform: scale(1);}
    }
    .member-name {
        font-weight: 700;
        color: #e91e63;
        font-size: 1.21rem;
        margin-bottom: 6px;
        letter-spacing: .8px;
    }

    .member-role {
        color: #888;
        font-size: 1.05rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1.1px;
        margin-bottom: 6px;
    }

    .social-links {
        margin-top: 15px;
    }

    .social-links a {
        color: #e91e63;
        margin: 0 7px;
        font-size: 1.35rem;
        transition: 0.22s;
        vertical-align: middle;
        text-decoration: none;
        opacity: 0.87;
    }

    .social-links a:hover {
        color: #673ab7;
        opacity: 1;
    }

    .social-links a:focus {
        outline: 2px solid #f8bbd0;
        border-radius: 3px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .team-grid { grid-template-columns: repeat(3, 1fr);}
    }
    @media (max-width: 900px) {
        .team-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 650px) {
        .about-title { font-size: 2rem; }
        .section-title { font-size: 1.45rem; }
        .team-grid { grid-template-columns: 1fr; gap: 30px;}
        .about-header { font-size: .98rem;}
    }
</style>
{{-- Confetti effect, purely decorative --}}
<div class="about-header">
    <div class="confetti">
        <div class="confetti-piece c1"></div>
        <div class="confetti-piece c2"></div>
        <div class="confetti-piece c3"></div>
        <div class="confetti-piece c4"></div>
        <div class="confetti-piece c5"></div>
    </div>
    <h1 class="about-title">Tentang Croppy ✨</h1>
    <p class="about-desc">
        Croppy adalah tempat di mana benang dirajut menjadi kebahagiaan.<br>
        Kami percaya setiap boneka punya ceritanya sendiri.<br>
        Dibuat dengan cinta, ketelatenan, dan senyuman untuk menemani hari-harimu.<br>
        <span style="font-weight: 600; color: #d81b60;">Mari berkreasi, berinovasi, dan membagikan kebahagiaan bersama Croppy!</span>
    </p>
</div>

<div class="container team-section">
    <h2 class="section-title">Meet The Team 🚀</h2>
    <div class="team-grid">
        <div class="team-card" tabindex="0">
            <div class="member-photo-wrap">
                <img src="{{asset('assets-guest/img/Fira.jpeg')}}" alt="Budi Santoso" class="member-photo">
                <span class="member-badge" title="Ketua Tim"><i class="fas fa-crown"></i></span>
            </div>
            <h3 class="member-name">Ghania Zafira Eryo</h3>
            <p class="member-role">Team Leader</p>
            <div class="social-links">
                <a href="https://www.instagram.com/gniazfr_?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==o" target="_blank" aria-label="Instagram Budi"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="bio-tooltip">Pemimpin tim yang penuh semangat, pengatur visi dan strategi, serta penghubung inspirasi antara anggota satu sama lain.</div>
        </div>
        <div class="team-card" tabindex="0">
            <div class="member-photo-wrap">
                <img src="{{asset('assets-guest/img/Neza.jpeg')}}" alt="Siti Aminah" class="member-photo">
                <span class="member-badge" style="background:#388e3c;" title="UI Stars"><i class="fas fa-paint-brush"></i></span>
            </div>
            <h3 class="member-name">Haifa Neza Tama</h3>
            <p class="member-role">UI/UX Designer</p>
            <div class="social-links">
                <a href="https://www.instagram.com/haifanezaa?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" aria-label="Instagram Siti"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="bio-tooltip">Mendesain pengalaman dan interface yang asyik & mudah, agar Croppy selalu nyaman digunakan.Ahli logika dan backend, membangun pondasi aplikasi Croppy agar selalu stabil dan handal!</div>
        </div>
        <div class="team-card" tabindex="0">
            <div class="member-photo-wrap">
            <img src="{{asset('assets-guest/img/Dewo 2.jpeg')}}" alt="Rina Putri" class="member-photo">
                
                <span class="member-badge" style="background: #ff9800;" title="UI/UX Expert"><i class="fas fa-lightbulb"></i></span>
            </div>
            <h3 class="member-name">Dewo Gabriel Purba</h3>
            <p class="member-role">Social Media & E-Commerce</p>
            <div class="social-links">
                <a href="https://www.instagram.com/dewo_1506?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" aria-label="Instagram Dewo"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="bio-tooltip">Mengelola seluruh media sosial & toko online Croppy. Bertanggung jawab atas strategi konten, interaksi, dan menjaga agar Croppy selalu hadir di hati pelanggan, baik di Instagram, Shopee, Tokopedia, maupun TikTok!</div>
        </div>
        <div class="team-card" tabindex="0">
            <div class="member-photo-wrap">
            <img src="{{asset('assets-guest/img/Hafiz.jpeg')}}" alt="Doni Tata" class="member-photo">
                <span class="member-badge" style="background: #1976d2;" title="Back-End Master"><i class="fas fa-server"></i></span>
                
            </div>
            <h3 class="member-name">Muhammad Hafiz Ramadhan</h3>
            <p class="member-role">Back-End Dev</p>
            <div class="social-links">
                <a href="https://www.instagram.com/imnottfiz/" target="_blank" aria-label="Instagram siti"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="bio-tooltip">Ahli logika dan backend, membangun pondasi aplikasi Croppy agar selalu stabil dan handal!</div>
        </div>
        <div class="team-card" tabindex="0">
            <div class="member-photo-wrap">
            <img src="{{asset('assets-guest/img/Yoga.jpeg')}}" alt="Rafi Hidayat" class="member-photo">
                <span class="member-badge" style="background:#ffb300;" title="Marketing Guru"><i class="fas fa-bullhorn"></i></span>
            </div>
            <h3 class="member-name">Muhammad Rizqi Prayoga</h3>
            <p class="member-role">Marketing & Content</p>
            <div class="social-links">

            </div>
            <div class="bio-tooltip">Si jago storytelling & promosi, membawakan Croppy ke lebih banyak orang dengan konten kreatif dan strategi pemasaran yang unik!</div>
        </div>
    </div>
    <div style="margin-top: 36px; color: #8e24aa; font-size:1.07rem; font-weight: 600;">
        Klik atau arahkan kursor ke setiap anggota tim untuk lihat profil singkat mereka! 🎉
    </div>
</div>
{{-- Untuk interaksi lebih lanjut, semua interaktivitas dihandle via hover/focus (pure CSS) --}}
@endsection