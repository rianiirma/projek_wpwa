<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PengurusController;
use Illuminate\Support\Facades\Route;

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Auth routes (login, register, logout, dll)
Auth::routes();

// Halaman home setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes WPWA (CRUD lengkap) – hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pengurus', PengurusController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kehadiran', KehadiranController::class);
    Route::resource('iuran', IuranController::class);
});
