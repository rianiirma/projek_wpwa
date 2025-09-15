<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis'         => 'required|in:harian,mingguan,bulanan',
            'tanggal'       => 'nullable|date',
            'tempat'        => 'nullable|string',
            'keterangan'    => 'nullable|string',
        ]);

        Kegiatan::create($request->all());
        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil ditambahkan');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'jenis'         => 'required|in:harian,mingguan,bulanan',
            'tanggal'       => 'nullable|date',
            'tempat'        => 'nullable|string',
            'keterangan'    => 'nullable|string',
        ]);

        $kegiatan->update($request->all());
        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil diupdate');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil dihapus');
    }
}
