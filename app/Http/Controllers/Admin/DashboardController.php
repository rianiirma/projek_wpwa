<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Iuran;
use App\Models\Kegiatan;
use App\Models\Kehadiran;
use App\Models\Pengurus;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard
     */
    public function index()
    {
        // Hitung semua data
        $jumlahUsers     = User::count();
        $jumlahAnggota   = Anggota::count();
        $jumlahPengurus  = Pengurus::count();
        $jumlahKegiatan  = Kegiatan::count();
        $jumlahKehadiran = Kehadiran::count();
        $jumlahIuran = Iuran::sum('jumlah');

        // Kirim ke view
        return view('layouts.dashboard', compact(
            'jumlahUsers',
            'jumlahAnggota',
            'jumlahPengurus',
            'jumlahKegiatan',
            'jumlahKehadiran',
            'jumlahIuran'
        ));
    }
}
