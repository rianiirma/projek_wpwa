@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Kehadiran</h1>
    <a href="{{ route('admn.kehadiran.create') }}" class="btn btn-primary mb-2">Tambah Kehadiran</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Nama Kegiatan</th>
                <th>Hadir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kehadiran as $k)
            <tr>
                <td>{{ $k->id }}</td>
                <td>{{ $k->anggota->nama }}</td>
                <td>{{ $k->kegiatan->nama_kegiatan }}</td>
                <td>{{ $k->hadir ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('admn.kehadiran.edit', $k->id) }}" class="btn btn-warning btn-icon" title="Edit">
                        <i class="bx bx-edit"></i>
                    </a>
                    <form action="{{ route('admn.kehadiran.destroy', $k->id) }}" method="POST" style="display:inline-block;">
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

