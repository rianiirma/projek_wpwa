@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Anggota</h1>
    <form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
        </div>
        <div class="mb-2">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $anggota->alamat }}">
        </div>
        <div class="mb-2">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}">
        </div>
        <div class="mb-2">
            <label>Tanggal Gabung</label>
            <input type="date" name="tanggal_gabung" class="form-control" value="{{ $anggota->tanggal_gabung }}">
        </div>
        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif" {{ $anggota->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="pasif" {{ $anggota->status == 'pasif' ? 'selected' : '' }}>Pasif</option>
                <option value="tidak" {{ $anggota->status == 'tidak' ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

