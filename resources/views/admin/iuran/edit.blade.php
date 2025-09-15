@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Iuran</h1>
    <form action="{{ route('admin.iuran.update', $iuran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label>Nama Anggota</label>
            <select name="anggota_id" class="form-control">
                @foreach($anggota as $a)
                <option value="{{ $a->id }}" {{ $iuran->anggota_id==$a->id?'selected':'' }}>{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $iuran->tanggal }}">
        </div>
        <div class="mb-2">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
                <option value="masuk" {{ $iuran->jenis=='masuk'?'selected':'' }}>Masuk</option>
                <option value="keluar" {{ $iuran->jenis=='keluar'?'selected':'' }}>Keluar</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $iuran->jumlah }}">
        </div>
        <div class="mb-2">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $iuran->keterangan }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

