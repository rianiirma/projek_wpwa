<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::latest()->paginate(10);
        return view('pengurus.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('pengurus.kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('pengurus.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('pengurus.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('pengurus.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('pengurus.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
