@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Kegiatan</h1>
    <form action="{{ route('kegiatan.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
                <option value="harian">Harian</option>
                <option value="mingguan">Mingguan</option>
                <option value="bulanan">Bulanan</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="mb-2">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control">
        </div>
        <div class="mb-2">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

