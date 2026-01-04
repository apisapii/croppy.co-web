@extends('layouts.guest.app') 
@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f7e7f8 0%, #fae3e6 100%);
    }
    .profile-container {
        max-width: 940px;
        background: linear-gradient(120deg, #fff 80%, #f8bbd0 120%);
        margin: 50px auto 70px auto;
        border-radius: 24px;
        box-shadow: 0 12px 40px rgba(233,30,99,0.07), 0 1.5px 25px rgba(97,97,97,0.06);
        padding: 40px 30px;
        animation: fadeIn 0.7s cubic-bezier(0.7,0,0.3,1);
        min-height: 520px;
    }
    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(35px);}
        to {opacity: 1; transform: translateY(0);}
    }
    .profile-avatar-outer {
        display:flex; flex-direction: column; align-items:center; gap: 18px;
    }
    .profile-avatar-outer:hover .edit-overlay {
        opacity: 1;
        pointer-events: auto;
    }
    .profile-avatar-img, .profile-avatar-initial {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        transition: box-shadow 0.3s;
        position: relative;
        margin: 0 auto 0 auto;
        border: 5px solid #f8bbd0;
        box-shadow: 0 7px 25px rgba(233,30,99,0.07);
        object-fit: cover;
    }
    .profile-avatar-initial {
        background: linear-gradient(135deg, #ec407a 70%, #ffffff 100%);
        color: white;
        font-size: 64px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        text-shadow: 0 2px 10px #e91e6327;
    }
    .edit-overlay {
        position: absolute;
        left: 0;top: 0;width: 150px;height: 150px;display: flex;align-items: center;justify-content: center;background: rgba(233,30,99,0.15);
        border-radius:50%;
        color: #fff;
        font-size: 40px;
        opacity: 0;
        pointer-events: none;
        cursor: pointer;
        font-weight: bold;
        transition: opacity 0.32s cubic-bezier(.62,0,.58,1);
        z-index: 2;
    }
    .profile-form label {
        font-weight: 600; color: #333; letter-spacing: 0.2px;
    }
    .profile-form input[type="text"], .profile-form input[type="number"], .profile-form textarea {
        background: #fff8fd;
        border: 1.5px solid #f8bbd0;
        border-radius: 12px;
        margin-top:6px;
        padding: 12px;
        font-size:15px;
        transition: border 0.25s;
    }
    .profile-form input:focus, .profile-form textarea:focus {
        outline: none;
        border-color: #e91e63;
        background: #fff;
        box-shadow: 0 0 0 2px #f8bbd050;
    }
    .profile-btn {
        background: linear-gradient(87deg, #e91e63 55%, #f06292 100%);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 10px;
        font-weight: bold;
        font-size: 17px;
        margin-top: 5px;
        cursor: pointer;
        box-shadow: 0 2px 8px #e91e6322;
        letter-spacing: 0.5px;
        transition: background 0.23s, box-shadow 0.2s, transform 0.15s;
    }
    .profile-btn:hover { background: #c2185b; box-shadow: 0 4px 18px #f8bbd033; transform:translateY(-1px);}
    .floating-anim {
        animation: floating 2.8s infinite ease-in-out alternate;
    }
    @keyframes floating {
        from {transform: translateY(0);}
        to {transform: translateY(-8px);}
    }
    @media (max-width: 900px) {
        .profile-container { padding: 30px 6vw; }
        .profile-form-flex { flex-direction:column; gap:38px;}
    }
    @media (max-width: 540px) {
        .profile-avatar-img, .profile-avatar-initial, .edit-overlay { width:110px; height:110px; }
        .profile-container {padding: 18px 3vw;}
    }
</style>

<div class="profile-container">
    <div style="margin-bottom: 24px; border-bottom: 2px solid #eee; padding-bottom: 12px; display:flex; align-items:center; gap:15px;">
        <div>
            <h2 style="color: #e91e63; font-weight: 800; font-size: 1.7rem; margin-bottom:2px;">Pengaturan Profil <span class="floating-anim">⚙️</span></h2>
            <p style="color: #8e29a8; font-size: 15px;">Kelola informasi profile, kontak, & alamat kirim kamu secara mudah & aman 🎨</p>
        </div>
    </div>

    @if(session('success'))
    <div style="background: #e7fff0; color: #1b5736; padding: 15px; border-radius: 10px; margin-bottom: 25px; border: 1px solid #b9f4c4; display:flex;align-items:center;gap:12px;">
        <span style="font-size: 22px;">✅</span> <span style="font-weight: bold;">{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
<div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

    <form action="{{ route('guest.profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form" autocomplete="off">
        @csrf
        <div class="profile-form-flex" style="display: flex; flex-wrap: wrap; gap: 36px 36px; align-items: flex-start;">
            <div style="flex: 1.1; min-width:230px; padding: 27px 15px 27px 15px; background: rgba(255,255,255,0.95); border-radius: 18px; box-shadow: 0 6px 18px #f8bbd022;">
                <h4 style="margin-bottom: 15px; color: #812; font-weight: bold; font-size: 1.12rem;"><span style="color:#e91e63">👤</span> Foto Profil</h4>
                <div class="profile-avatar-outer" style="position:relative">
                    @if($user->avatar)
                        <div style="position:relative;">
                            <img src="{{ $user->avatar }}" id="avatarPreview" class="profile-avatar-img" style="background: #fff0f6;">
                            <div class="edit-overlay" onclick="triggerChooseFile()" title="Ganti Foto"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" style="vertical-align:middle;"><path fill="#fff" d="M12 9.85A2.15 2.15 0 1 0 12 14.15 2.15 2.15 0 1 0 12 9.85ZM5.66 5.66A8 8 0 1 1 18.34 18.34 8 8 0 0 1 5.66 5.66ZM12 4.5A7.5 7.5 0 1 0 19.5 12 7.508 7.508 0 0 0 12 4.5Zm.75 7.75h-1.5V18h1.5z"/></svg></div>
                        </div>
                    @else
                        <div style="position:relative;">
                            <div id="initialAvatar" class="profile-avatar-initial" style="">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                            <img src="" id="avatarPreview" class="profile-avatar-img" style="display:none">
                            <div class="edit-overlay" onclick="triggerChooseFile()" title="Ganti Foto"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" style="vertical-align:middle;"><path fill="#fff" d="M12 9.85A2.15 2.15 0 1 0 12 14.15 2.15 2.15 0 1 0 12 9.85ZM5.66 5.66A8 8 0 1 1 18.34 18.34 8 8 0 0 1 5.66 5.66ZM12 4.5A7.5 7.5 0 1 0 19.5 12 7.508 7.508 0 0 0 12 4.5Zm.75 7.75h-1.5V18h1.5z"/></svg></div>
                        </div>
                    @endif
                </div>
                <div style="margin-top:22px; text-align:center;">
                    <label for="avatarInput" style="font-size: 14px; font-weight: 600; color: #e91e63; cursor:pointer; display: block; margin-bottom:5px; ">
                        <span style="display:inline-block;letter-spacing:0.2px;">📸 Pilih Foto Baru</span>
                    </label>
                    <input type="file" id="avatarInput" name="avatar" accept="image/*" onchange="previewImage(this)" style="width: 0.1px; height:0.1px; opacity:0; position:absolute; z-index:-1;">
                    <small style="color: #888; font-size: 11px; display: block; margin-top: 8px;">
                        Format: JPG, PNG, JPEG. Max: 2MB.<br>(Rasio 1:1 lebih bagus! 😉)
                    </small>
                </div>
            </div>

            <div style="flex: 2; min-width: 320px; background: rgba(255,255,255,0.98); padding: 35px 33px; border-radius: 18px; box-shadow: 0 6px 18px #f8bbd022;">
                <h4 style="margin-bottom: 18px; color: #4b0b4e; font-weight: bold;">Biodata <span style="color:#e91e63">&</span> Alamat Kirim</h4>
                <div class="mb-3" style="margin-bottom: 19px;">
                    <label>Nama Lengkap</label>
                    <div style="display:flex;align-items:center;">
                        <input type="text" value="{{ $user->name }}" disabled style="width: 100%; padding: 12px; border: 1px solid #ffe0ef; background: #fce4ec; border-radius: 8px; color: #9e31a4; font-weight: 600;">
                        <span style="margin-left:12px; color:#ad1457;" title="Nama akun">
                            <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M12 13.5C15.0317 13.5 17.5051 10.9494 17.5051 8C17.5051 5.0506 15.0317 2.5 12 2.5C8.9683 2.5 6.49487 5.0506 6.49487 8C6.49487 10.9494 8.9683 13.5 12 13.5ZM12 15.5C8.18323 15.5 2 17.4292 2 21V22.25C2 22.3881 2.11193 22.5 2.25 22.5H21.75C21.8881 22.5 22 22.3881 22 22.25V21C22 17.4292 15.8168 15.5 12 15.5Z" stroke="#e91e63" stroke-width="1.5"/></svg>
                        </span>
                    </div>
                </div>

                <div class="mb-3" style="margin-bottom: 19px;">
                    <label>Email</label>
                    <div style="display:flex;align-items:center;">
                        <input type="text" value="{{ $user->email }}" disabled style="width: 100%; padding: 12px; border: 1px solid #ffe0ef; background: #fce4ec; border-radius: 8px; color: #9e31a4; font-weight: 600;">
                        <span style="margin-left:12px; color:#ad1457;" title="Email akun">
                            <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M19.5 3.75H4.5C3.25736 3.75 2.25 4.75736 2.25 6V18C2.25 19.2426 3.25736 20.25 4.5 20.25H19.5C20.7426 20.25 21.75 19.2426 21.75 18V6C21.75 4.75736 20.7426 3.75 19.5 3.75ZM12 13.5C13.7951 13.5 15.2589 12.0361 15.2589 10.25H8.74108C8.74108 12.0361 10.2049 13.5 12 13.5Z" stroke="#e91e63" stroke-width="1.5"/></svg>
                        </span>
                    </div>
                </div>

                <div class="mb-3" style="margin-bottom: 22px;">
                    <label>No. WhatsApp / HP <span style="color:#e91e63;">*</span></label>
                    <input type="tel" name="phone" value="{{ $user->phone }}" required placeholder="Contoh: 08123456789" pattern="08[0-9]{8,13}" 
                        style="width: 100%; padding: 12px; border-radius: 9px; border: 1.4px solid #f8bbd0;" title="Nomor HP wajib diawali 08">
                    <small style="color: #888; font-size: 11px; display: block; margin-top: 3px;">Pastikan nomor WhatsApp aktif ya.</small>
                </div>
                <div class="mb-3" style="margin-bottom: 30px;">
                    <label>Alamat Lengkap <span style="color:#e91e63;">*</span></label>
                    <textarea name="address" rows="4" required placeholder="Jalan, Rumah, RT/RW, Kelurahan, Kecamatan, dll" 
                        style="width: 100%; padding: 13px; border-radius: 9px; border: 1.4px solid #f8bbd0;">{{ $user->address }}</textarea>
                </div>

                <button type="submit" class="profile-btn">
                    <span style="margin-right:6px;">💾</span> Simpan Perubahan
                </button>
            </div>
        </div>
    </form>

    <!-- Fun fact & tips -->
    <div style="margin-top: 35px; background: linear-gradient(110deg, #fff3f7 60%, #ffe6e6 120%); border-radius: 14px; padding:20px 28px; display:flex; align-items:center; gap:17px; box-shadow:0 1px 9px #e91e6333;">
        <div style="font-size:15px; color:#7c3760;">
            <b>Tips: </b> Foto profil dengan gambar asli bikin admin lebih mudah mengenali pesananmu! Data pengiriman <span style="color:#e91e63;font-weight:600;">WAJIB benar</span> agar pesananmu sampai tanpa hambatan 😊
        </div>
    </div>
</div>

<script>
    // Tombol overlay/edit PNG
    function triggerChooseFile() {
        document.getElementById('avatarInput').click();
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            if(!file.type.match("image.*")) {
                alert("File bukan gambar!");
                input.value = "";
                return;
            }
            if(file.size > 2*1024*1024) {
                alert("Ukuran foto max 2MB!");
                input.value = "";
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var initialDiv = document.getElementById('initialAvatar');
                if (initialDiv) initialDiv.style.display = 'none';
                var img = document.getElementById('avatarPreview');
                img.style.display = 'block';
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Drag & Drop ke avatar
    document.addEventListener('DOMContentLoaded', function() {
        var avatarZone = document.querySelector('.profile-avatar-outer');
        var fileInput = document.getElementById('avatarInput');
        if(avatarZone) {
            ['dragover', 'dragenter'].forEach(function(ev){
                avatarZone.addEventListener(ev, function(e){e.preventDefault();avatarZone.style.boxShadow="0 0 0 4px #e91e6332";}, false);
            });
            ['dragleave', 'drop'].forEach(function(ev){
                avatarZone.addEventListener(ev, function(e){e.preventDefault();avatarZone.style.boxShadow="";}, false);
            });
            avatarZone.addEventListener('drop', function(e){
                e.preventDefault();
                if(e.dataTransfer.files && e.dataTransfer.files[0]){
                    fileInput.files = e.dataTransfer.files;
                    previewImage(fileInput);
                }
            });
        }
    });
</script>
@endsection