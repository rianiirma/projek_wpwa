@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-group text-primary'></i> Daftar Anggota</h3>
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Tambah Kegiatan
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Tanggal Gabung</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->alamat }}</td>
                        <td>{{ $a->no_hp }}</td>
                        <td>{{ $a->tanggal_gabung }}</td>
                        <td>{{ $a->status }}</td>
                        <td>
                            <a href="{{ route('admin.anggota.edit', $a->id) }}" class="btn btn-warning btn-icon" title="Edit">
                                <i class="bx bx-edit"></i>
                            </a>
                            <form action="{{ route('admin.anggota.destroy', $a->id) }}" method="POST" style="display:inline-block;">
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
    </div>
</div>
@endsection


