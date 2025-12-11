<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Croppy.co</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(135deg, #e8f4f8 0%, #ffe0e9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Pakai min-height biar aman kalau di HP */
            margin: 0;
            padding: 20px;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(33, 150, 243, 0.15); /* Bayangan agak biru dikit */
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo { font-size: 2rem; font-weight: bold; color: #e91e63; margin-bottom: 10px; display: block; text-decoration: none;}
        h2 { color: #333; margin-bottom: 30px; font-size: 1.2rem; }
        .form-group { margin-bottom: 15px; text-align: left; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; font-size: 0.9rem; }
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 10px;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
            transition: 0.3s;
        }
        input:focus { border-color: #e91e63; outline: none; }
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #e91e63;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-login:hover { background: #d81b60; transform: translateY(-2px); }
        .links { margin-top: 20px; font-size: 0.9rem; }
        .links a { color: #e91e63; text-decoration: none; font-weight: bold; }
        .error-msg { color: red; font-size: 0.8rem; margin-top: 5px; }
    </style>
</head>
<body>

    <div class="login-card">
        <a href="/" class="logo">Croppy.co ✨</a>
        <h2>Buat Akun Baru</h2>

        {{-- Tampilkan semua error utama --}}
        @if ($errors->any())
            <div class="error-msg" style="margin-bottom:15px;">
                <ul style="padding-left:18px;margin:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" required autofocus placeholder="Contoh: Kak Gem">
                @error('name') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required placeholder="nama@email.com">
                @error('email') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Minimal 8 karakter">
                @error('password') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" name="password_confirmation" required placeholder="Ketik ulang password">
            </div>

            <button type="submit" class="btn-login">Daftar Sekarang</button>
        </form>

        <div class="links">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>

</body>
</html>