@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white">
            <h5 class="mb-0"><i class='bx bx-plus'></i> Tambah kehadiran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kehadiran.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Nama Anggota</label>
                    <select name="anggota_id" class="form-control" required>
                        @foreach($anggota as $a)
                        <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label>Nama Kegiatan</label>
                    <select name="kegiatan_id" class="form-control" required>
                        @foreach($kegiatan as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kegiatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label>Hadir</label>
                    <select name="hadir" class="form-control">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.kehadiran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

