@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Kegiatan</h1>
    <a href="{{ route('kegiatan.create') }}" class="btn btn-primary mb-2">Tambah Kegiatan</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kegiatan</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>Tempat</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kegiatan as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->nama_kegiatan }}</td>
                <td>{{ $k->jenis }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>{{ $k->tempat }}</td>
                <td>{{ $k->keterangan }}</td>
                <td>
                    <a href="{{ route('kegiatan.edit', $k->id) }}" class="btn btn-warning btn-icon" title="Edit">
                        <i class="bx bx-edit"></i>
                    </a>
                    <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-icon" onclick="return confirm('Yakin hapus?')" title="Hapus">
                        <i class="bx bx-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

