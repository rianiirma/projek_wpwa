@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header text-dark">
            <h5 class="mb-0"><i class='bx bx-edit-alt'></i> Edit Pengurus</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengurus.update', $pengurus->id) }}" method="POST">
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

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

