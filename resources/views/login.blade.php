<!DOCTYPE html>
<html lang="id">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <div class="login-page">
        <div class="login-card">

            <div class="login-header">
                <h1>Login</h1>
                <p>Masuk untuk mengelola data ekspedisi.</p>
            </div>

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button type="submit">Login</button>

                <p>
                    Belum punya akun?
                    <a href={{ route('register') }}>Daftar</a>
                </p>
            </form>

        </div>
    </div>

</body>
</html>