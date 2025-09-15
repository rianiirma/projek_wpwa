@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Kehadiran</h1>
    <form action="{{ route('admin.kehadiran.update', $kehadiran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label>Nama Anggota</label>
            <select name="anggota_id" class="form-control">
                @foreach($anggota as $a)
                <option value="{{ $a->id }}" {{ $kehadiran->anggota_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Nama Kegiatan</label>
            <select name="kegiatan_id" class="form-control">
                @foreach($kegiatan as $k)
                <option value="{{ $k->id }}" {{ $kehadiran->kegiatan_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kegiatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Hadir</label>
            <select name="hadir" class="form-control">
                <option value="1" {{ $kehadiran->hadir ? 'selected' : '' }}>Ya</option>
                <option value="0" {{ !$kehadiran->hadir ? 'selected' : '' }}>Tidak</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

