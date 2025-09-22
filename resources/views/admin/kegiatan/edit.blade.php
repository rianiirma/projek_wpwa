@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header text-dark">
            <h5 class="mb-0"><i class='bx bx-edit-alt'></i> Edit Kegiatan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST">
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
                <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

