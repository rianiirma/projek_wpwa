@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pengurus</h1>
    <a href="{{ route('pengurus.create') }}" class="btn btn-primary mb-2">Tambah Pengurus</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
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
                    <a href="{{ route('pengurus.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

