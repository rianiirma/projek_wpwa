<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = Pengurus::with('anggota')->get();
        return view('pengurus.index', compact('pengurus'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('pengurus.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'jabatan'    => 'required|in:ketua,sekretaris,bendahara,anggota',
            'periode'    => 'required|string|max:50',
        ]);

        Pengurus::create($request->all());
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil ditambahkan');
    }

    public function edit(Pengurus $penguru)
    {
        $anggota = Anggota::all();
        return view('pengurus.edit', ['pengurus' => $penguru, 'anggota' => $anggota]);
    }

    public function update(Request $request, Pengurus $penguru)
    {
        $request->validate([
            'jabatan' => 'required|in:ketua,sekretaris,bendahara,anggota',
            'periode' => 'required|string|max:50',
        ]);

        $penguru->update($request->all());
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil diupdate');
    }

    public function destroy(Pengurus $penguru)
    {
        $penguru->delete();
        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil dihapus');
    }
}
