@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Iuran</h1>
    <form action="{{ route('iuran.store') }}" method="POST">
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
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Jenis</label>
            <select name="jenis" class="form-control" required>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

