<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Iuran;
use App\Models\Kegiatan;
use App\Models\Kehadiran;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung data untuk ringkasan dashboard pengurus
        $jumlahAnggota   = Anggota::count();
        $jumlahKegiatan  = Kegiatan::count();
        $jumlahKehadiran = Kehadiran::count();
        $totalIuran      = Iuran::sum('jumlah');

        return view('pengurus.dashboard', compact(
            'jumlahAnggota',
            'jumlahKegiatan',
            'jumlahKehadiran',
            'totalIuran'
        ));
    }
}
