<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal (public)
Route::get('/', function () {
    return view('welcome');
});

// Auth bawaan Laravel (login, register, logout, dll)
Auth::routes();

// Semua route di bawah ini butuh login
Route::middleware(['auth'])->group(function () {

    // Dashboard utama WPWA
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Resource CRUD WPWA
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pengurus', PengurusController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kehadiran', KehadiranController::class);
    Route::resource('iuran', IuranController::class);

    // ✅ Resource CRUD User
    Route::resource('users', UserController::class);
});
