<!DOCTYPE html>
<link rel="stylesheet" href="{{ asset('css/regis.css') }}">
<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <div class="register-card">
        <div class="register-header">
            <h1>Register SevShop</h1>
            <p>Silakan isi data untuk membuat akun baru.</p>
        </div>
        <form action="{{ route('register.store') }}" method="POST">
            <div class="register-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name"
                    placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="register-group">
                <label>Email</label>
                <input type="email" name="email"
                    placeholder="Masukkan email" required>
            </div>
            <div class="register-group">
                <label>Password</label>
                <input type="password" name="password"
                    placeholder="Masukkan password" required>
            </div>
            <div class="register-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    placeholder="Masukkan ulang password" required>
            </div>
            <button type="submit">Daftar</button>
        </form>
        <p class="register-footer">
            Sudah memiliki akun? Silakan <a href={{ route('login') }}>login</a>
        </p>
        
    </div>
</body>