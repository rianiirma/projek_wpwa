<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = Kehadiran::with(['kegiatan', 'anggota'])->latest()->paginate(10);
        return view('pengurus.kehadiran.index', compact('kehadiran'));
    }

    public function create()
    {
        $kegiatan = Kegiatan::all();
        $anggota  = Anggota::all();
        return view('pengurus.kehadiran.create', compact('kegiatan', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'anggota_id'  => 'required|exists:anggota,id',
            'status'      => 'required|in:Hadir,Tidak Hadir',
        ]);

        Kehadiran::create($request->all());

        return redirect()->route('pengurus.kehadiran.index')->with('success', 'Kehadiran berhasil dicatat.');
    }

    public function edit(Kehadiran $kehadiran)
    {
        $kegiatan = Kegiatan::all();
        $anggota  = Anggota::all();
        return view('pengurus.kehadiran.edit', compact('kehadiran', 'kegiatan', 'anggota'));
    }

    public function update(Request $request, Kehadiran $kehadiran)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'anggota_id'  => 'required|exists:anggota,id',
            'status'      => 'required|in:Hadir,Tidak Hadir',
        ]);

        $kehadiran->update($request->all());

        return redirect()->route('pengurus.kehadiran.index')->with('success', 'Data kehadiran berhasil diperbarui.');
    }

    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('pengurus.kehadiran.index')->with('success', 'Data kehadiran berhasil dihapus.');
    }
}
