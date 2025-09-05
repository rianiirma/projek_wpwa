@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Anggota</h1>
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="mb-2">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>
        <div class="mb-2">
            <label>Tanggal Gabung</label>
            <input type="date" name="tanggal_gabung" class="form-control">
        </div>
        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="pasif">Pasif</option>
                <option value="tidak">Tidak</option>
            </select>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

