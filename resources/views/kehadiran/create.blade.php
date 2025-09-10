@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Kehadiran</h1>
    <form action="{{ route('kehadiran.store') }}" method="POST">
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
    </form>
</div>
@endsection

