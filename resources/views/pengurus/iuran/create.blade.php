@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class='bx bx-plus-circle'></i> Catat Iuran Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.iuran.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="anggota_id" class="form-label">Nama Anggota</label>
                    <select name="anggota_id" class="form-select @error('anggota_id') is-invalid @enderror">
                        <option value="">-- Pilih Anggota --</option>
                        @foreach($anggota as $a)
                        <option value="{{ $a->id }}" {{ old('anggota_id') == $a->id ? 'selected' : '' }}>
                            {{ $a->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('anggota_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Iuran (Rp)</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" placeholder="Contoh: 50000">
                    @error('jumlah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Setor</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
                    @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class='bx bx-save'></i> Simpan</button>
                <a href="{{ route('pengurus.iuran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

