<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'nullable|string',
            'no_hp'          => 'nullable|string|max:15',
            'tanggal_gabung' => 'nullable|date',
            'status'         => 'required|in:aktif,pasif,tidak',
        ]);

        // otomatis ambil user yang login
        Anggota::create([
            'user_id'        => Auth::id(),
            'nama'           => $request->nama,
            'alamat'         => $request->alamat,
            'no_hp'          => $request->no_hp,
            'tanggal_gabung' => $request->tanggal_gabung,
            'status'         => $request->status,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'nullable|string',
            'no_hp'          => 'nullable|string|max:15',
            'tanggal_gabung' => 'nullable|date',
            'status'         => 'required|in:aktif,pasif,tidak',
        ]);

        $anggota->update([
            'nama'           => $request->nama,
            'alamat'         => $request->alamat,
            'no_hp'          => $request->no_hp,
            'tanggal_gabung' => $request->tanggal_gabung,
            'status'         => $request->status,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diupdate');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus');
    }
}
