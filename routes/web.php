<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// =======================
// ADMIN CONTROLLERS
// =======================
use App\Http\Controllers\Admin\IuranController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\KehadiranController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Anggota\DashboardController as AnggotaDashboardController;
use App\Http\Controllers\Anggota\IuranController as AnggotaIuranController;

// =======================
// PENGURUS CONTROLLERS
// =======================
use App\Http\Controllers\Pengurus\AnggotaController as PengurusAnggotaController;
use App\Http\Controllers\Pengurus\DashboardController as PengurusDashboardController;
use App\Http\Controllers\Pengurus\IuranController as PengurusIuranController;
use App\Http\Controllers\Pengurus\KegiatanController as PengurusKegiatanController;
use App\Http\Controllers\Pengurus\KehadiranController as PengurusKehadiranController;

// =======================
// ANGGOTA CONTROLLERS
// =======================
use App\Http\Controllers\Anggota\KegiatanController as AnggotaKegiatanController;
use App\Http\Controllers\Anggota\KehadiranController as AnggotaKehadiranController;

use Illuminate\Support\Facades\Auth;
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

// Auth bawaan Laravel (login, register, dll)
Auth::routes();

// =======================
// REDIRECT GLOBAL (auto arahkan ke role masing-masing)
// =======================
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'pengurus') {
        return redirect()->route('pengurus.dashboard');
    } else {
        return redirect()->route('anggota.dashboard');
    }
})->middleware(['auth'])->name('dashboard');

// =======================
// WPWA - ADMIN
// =======================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD Master Data
        Route::resource('users', UserController::class);
        Route::resource('pengurus', PengurusController::class);
        Route::resource('anggota', AnggotaController::class);
        Route::resource('kegiatan', KegiatanController::class);
        Route::resource('kehadiran', KehadiranController::class);
        Route::resource('iuran', IuranController::class);
    });

// =======================
// WPWA - PENGURUS
// =======================
Route::middleware(['auth', 'role:pengurus'])->prefix('pengurus')->name('pengurus.')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Pengurus\DashboardController::class, 'index'])->name('dashboard');
   
        Route::resource('kegiatan', App\Http\Controllers\Pengurus\KegiatanController::class);
        Route::resource('kehadiran', App\Http\Controllers\Pengurus\KehadiranController::class);
        Route::resource('iuran', App\Http\Controllers\Pengurus\IuranController::class);
        Route::resource('anggota', App\Http\Controllers\Pengurus\AnggotaController::class)->only(['index', 'show', 'edit', 'update']);

    });

// =======================
// WPWA - ANGGOTA
// =======================
Route::middleware(['auth', 'role:anggota'])
    ->prefix('anggota')
    ->name('anggota.')
    ->group(function () {
        Route::get('/dashboard', [AnggotaDashboardController::class, 'index'])->name('dashboard');

        // CRUD khusus anggota (lihat data miliknya saja)
        Route::get('/kegiatan', [AnggotaKegiatanController::class, 'index'])->name('kegiatan.index');
        Route::get('/kehadiran', [AnggotaKehadiranController::class, 'index'])->name('kehadiran.index');
        Route::get('/iuran', [AnggotaIuranController::class, 'index'])->name('iuran.index');
    });
