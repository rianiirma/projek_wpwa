@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Kegiatan</h1>
    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama_kegiatan" class="form-control" value="{{ $kegiatan->nama_kegiatan }}" required>
        </div>
        <div class="mb-2">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
                <option value="harian" {{ $kegiatan->jenis=='harian'?'selected':'' }}>Harian</option>
                <option value="mingguan" {{ $kegiatan->jenis=='mingguan'?'selected':'' }}>Mingguan</option>
                <option value="bulanan" {{ $kegiatan->jenis=='bulanan'?'selected':'' }}>Bulanan</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $kegiatan->tanggal }}">
        </div>
        <div class="mb-2">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="{{ $kegiatan->tempat }}">
        </div>
        <div class="mb-2">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $kegiatan->keterangan }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

