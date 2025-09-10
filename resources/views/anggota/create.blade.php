@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Anggota</h1>
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp">
        </div>

        <div class="mb-3">
            <label for="tanggal_gabung" class="form-label">Tanggal Gabung</label>
            <input type="date" class="form-control" id="tanggal_gabung" name="tanggal_gabung">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="aktif">Aktif</option>
                <option value="pasif">Pasif</option>
                <option value="tidak">Tidak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

