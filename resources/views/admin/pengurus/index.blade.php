@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-user-check text-primary'></i> Data Pengurus</h3>
        <a href="{{ route('admin.pengurus.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Tambah Pengurus
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
                        <th>Nama Anggota</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengurus as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->anggota->nama }}</td>
                        <td>{{ $p->jabatan }}</td>
                        <td>{{ $p->periode }}</td>
                        <td>
                            <a href="{{ route('admin.pengurus.edit', $p->id) }}" class="btn btn-warning btn-icon" title="Edit">
                                <i class="bx bx-edit"></i>
                            </a>
                            <form action="{{ route('admin.pengurus.destroy', $p->id) }}" method="POST" style="display:inline-block;">
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