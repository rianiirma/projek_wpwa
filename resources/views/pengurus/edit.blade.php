@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Pengurus</h1>
    <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label>Nama Anggota</label>
            <select name="anggota_id" class="form-control">
                @foreach($anggota as $a)
                <option value="{{ $a->id }}" {{ $pengurus->anggota_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Jabatan</label>
            <select name="jabatan" class="form-control">
                <option value="ketua" {{ $pengurus->jabatan=='ketua'?'selected':'' }}>Ketua</option>
                <option value="sekretaris" {{ $pengurus->jabatan=='sekretaris'?'selected':'' }}>Sekretaris</option>
                <option value="bendahara" {{ $pengurus->jabatan=='bendahara'?'selected':'' }}>Bendahara</option>
                <option value="anggota" {{ $pengurus->jabatan=='anggota'?'selected':'' }}>Anggota</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Periode</label>
            <input type="text" name="periode" class="form-control" value="{{ $pengurus->periode }}">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

