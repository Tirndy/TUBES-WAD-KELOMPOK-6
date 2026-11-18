<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EkspedisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Authentication
Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'store'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Route Ekspedisi (hanya bisa dibuka setelah login)
Route::middleware('auth')->group(function () {

    // Customer dan admin: hanya melihat daftar
    Route::resource('ekspedisi', EkspedisiController::class)
        ->only(['index']);

    // Admin saja: tambah, edit, hapus
    Route::middleware('role:admin')->group(function () {
        Route::get('ekspedisi/{ekspedisi}/hapus', [EkspedisiController::class, 'hapus'])
            ->name('ekspedisi.hapus');

        Route::resource('ekspedisi', EkspedisiController::class)
            ->only(['store', 'edit', 'update', 'destroy']);
    });
});