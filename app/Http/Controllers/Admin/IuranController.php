<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Iuran;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function index()
    {
        $iuran = Iuran::with('anggota')->get();
        return view('admin.iuran.index', compact('iuran'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('admin.iuran.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'tanggal'    => 'required|date',
            'jenis'      => 'required|in:masuk,keluar',
            'jumlah'     => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Iuran::create($request->all());
        return redirect()->route('admin.iuran.index')->with('success', 'Data iuran berhasil ditambahkan');
    }

    public function edit(Iuran $iuran)
    {
        $anggota = Anggota::all();
        return view('admin.iuran.edit', compact('iuran', 'anggota'));
    }

    public function update(Request $request, Iuran $iuran)
    {
        $request->validate([
            'tanggal'    => 'required|date',
            'jenis'      => 'required|in:masuk,keluar',
            'jumlah'     => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $iuran->update($request->all());
        return redirect()->route('admin.iuran.index')->with('success', 'Data iuran berhasil diupdate');
    }

    public function destroy(Iuran $iuran)
    {
        $iuran->delete();
        return redirect()->route('admin.iuran.index')->with('success', 'Data iuran berhasil dihapus');
    }
}
