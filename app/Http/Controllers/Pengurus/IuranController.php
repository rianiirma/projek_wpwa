<?php
namespace App\Http\Controllers\Pengurus;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Iuran;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function index()
    {
        $iuran = Iuran::with('anggota')->latest()->paginate(10);
        return view('pengurus.iuran.index', compact('iuran'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('pengurus.iuran.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'jumlah'     => 'required|numeric|min:1000',
            'tanggal'    => 'required|date',
        ]);

        Iuran::create($request->all());

        return redirect()->route('pengurus.iuran.index')->with('success', 'Iuran berhasil dicatat.');
    }

    public function edit(Iuran $iuran)
    {
        $anggota = Anggota::all();
        return view('pengurus.iuran.edit', compact('iuran', 'anggota'));
    }

    public function update(Request $request, Iuran $iuran)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'jumlah'     => 'required|numeric|min:1000',
            'tanggal'    => 'required|date',
        ]);

        $iuran->update($request->all());

        return redirect()->route('pengurus.iuran.index')->with('success', 'Iuran berhasil diperbarui.');
    }

    public function destroy(Iuran $iuran)
    {
        $iuran->delete();
        return redirect()->route('pengurus.iuran.index')->with('success', 'Iuran berhasil dihapus.');
    }
}
