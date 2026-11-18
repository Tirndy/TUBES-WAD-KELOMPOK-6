<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

// Tempelkan route berikut ke routes/web.php yang sudah ada.
// Jangan mengganti seluruh isi web.php jika project kamu sudah punya route lain.

Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
