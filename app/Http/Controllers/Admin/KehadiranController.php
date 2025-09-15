<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadiran = Kehadiran::with(['anggota', 'kegiatan'])->get();
        return view('admin.kehadiran.index', compact('kehadiran'));
    }

    public function create()
    {
        $anggota  = Anggota::all();
        $kegiatan = Kegiatan::all();
        return view('admin.kehadiran.create', compact('anggota', 'kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id'  => 'required|exists:anggota,id',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'hadir'       => 'boolean',
        ]);

        Kehadiran::create($request->all());
        return redirect()->route('admin.kehadiran.index')->with('success', 'Data kehadiran berhasil ditambahkan');
    }

    public function edit(Kehadiran $kehadiran)
    {
        $anggota  = Anggota::all();
        $kegiatan = Kegiatan::all();
        return view('admin.kehadiran.edit', compact('kehadiran', 'anggota', 'kegiatan'));
    }

    public function update(Request $request, Kehadiran $kehadiran)
    {
        $request->validate([
            'anggota_id'  => 'required|exists:anggota,id',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'hadir'       => 'boolean',
        ]);

        $kehadiran->update($request->all());
        return redirect()->route('admin.kehadiran.index')->with('success', 'Data kehadiran berhasil diupdate');
    }

    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('admin.kehadiran.index')->with('success', 'Data kehadiran berhasil dihapus');
    }
}
