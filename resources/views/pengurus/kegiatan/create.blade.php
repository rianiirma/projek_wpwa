@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white">
            <h5 class="mb-0"><i class='bx bx-plus'></i> Tambah Kegiatan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.kegiatan.store') }}" method="POST">
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
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-2">
                    <label>Tempat</label>
                    <input type="text" name="tempat" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pengurus.kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

