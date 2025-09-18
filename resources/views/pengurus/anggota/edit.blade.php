@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h5><i class='bx bx-edit-alt'></i> Ubah Status Anggota</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.anggota.update', $anggota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" value="{{ $anggota->nama }}" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status Anggota</label>
                    <select name="status" class="form-select">
                        <option value="aktif" {{ $anggota->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak" {{ $anggota->status == 'tidak' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"><i class='bx bx-save'></i> Simpan</button>
                <a href="{{ route('pengurus.anggota.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

