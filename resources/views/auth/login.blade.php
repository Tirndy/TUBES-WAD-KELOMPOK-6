@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="header">
        <h1>Login</h1>
        <p>Masuk untuk mengelola data ekspedisi.</p>
    </div>

    <div class="card">
        @if (session('success'))
            <div class="alert" style="background-color: #dcfce7; color: #166534;">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Password">
            </div>

            <button type="submit">Login</button>
            <a href="{{ route('register') }}" class="btn-batal">Belum punya akun?</a>
        </form>
    </div>
@endsection