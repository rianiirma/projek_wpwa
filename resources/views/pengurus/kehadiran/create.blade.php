@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class='bx bx-plus-circle'></i> Tambah Kehadiran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.kehadiran.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kegiatan_id" class="form-label">Kegiatan</label>
                    <select name="kegiatan_id" class="form-select @error('kegiatan_id') is-invalid @enderror">
                        <option value="">-- Pilih Kegiatan --</option>
                        @foreach($kegiatan as $k)
                        <option value="{{ $k->id }}" {{ old('kegiatan_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('kegiatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="anggota_id" class="form-label">Anggota</label>
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
                    <label class="form-label">Status Kehadiran</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="Hadir" {{ old('status') == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Tidak Hadir" {{ old('status') == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class='bx bx-save'></i> Simpan</button>
                <a href="{{ route('pengurus.kehadiran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

