@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class='bx bx-edit-alt'></i> Edit Kegiatan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.kegiatan.update', $kegiatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $kegiatan->nama) }}">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $kegiatan->tanggal) }}">
                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class='bx bx-refresh'></i> Update</button>
                <a href="{{ route('pengurus.kegiatan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

