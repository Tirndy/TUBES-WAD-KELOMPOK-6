
@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="card">
        <h1>Daftar Akun SevShop</h1>
        @if (session('success'))
    <div class="alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div>
                <label>Nama</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit">Daftar</button>
        </form>
    </div>
@endsection
