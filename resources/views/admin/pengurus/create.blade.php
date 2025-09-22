@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white">
            <h5 class="mb-0"><i class='bx bx-plus'></i> Tambah Pengurus</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengurus.store') }}" method="POST">
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
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

