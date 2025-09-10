@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Pengurus</h1>
    <form action="{{ route('pengurus.store') }}" method="POST">
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
            <label>Jabatan</label>
            <select name="jabatan" class="form-control">
                <option value="ketua">Ketua</option>
                <option value="sekretaris">Sekretaris</option>
                <option value="bendahara">Bendahara</option>
                <option value="anggota">Anggota</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Periode</label>
            <input type="text" name="periode" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

