<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->paginate(10);
        return view('pengurus.anggota.index', compact('anggota'));
    }

    public function show(Anggota $anggota)
    {
        return view('pengurus.anggota.show', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        return view('pengurus.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'status' => 'required|in:aktif,tidak',
        ]);

        $anggota->update([
            'status' => $request->status,
        ]);

        return redirect()->route('pengurus.anggota.index')->with('success', 'Status anggota berhasil diperbarui.');
    }
}
