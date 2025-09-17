<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Iuran;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        // ringkasan data
        $totalKegiatan = Kegiatan::count();
        $totalIuran    = Iuran::sum('jumlah');
        $totalAnggota  = Anggota::count();

        // ambil kegiatan terdekat
        $kegiatanTerdekat = Kegiatan::where('tanggal', '>=', now())
            ->orderBy('tanggal', 'asc')
            ->first();

        // ambil anggota yang belum bayar iuran bulan ini
        $belumBayar = Anggota::whereDoesntHave('iuran', function ($q) {
            $q->whereMonth('tanggal', now()->month)
                ->whereYear('tanggal', now()->year);
        })->get();

        return view('pengurus.dashboard', compact(
            'totalKegiatan',
            'totalIuran',
            'totalAnggota',
            'kegiatanTerdekat',
            'belumBayar'
        ));
    }
}
