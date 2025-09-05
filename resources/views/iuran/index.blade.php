@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Iuran</h1>
    <a href="{{ route('iuran.create') }}" class="btn btn-primary mb-2">Tambah Iuran</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($iuran as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->anggota->nama }}</td>
                <td>{{ $i->tanggal }}</td>
                <td>{{ $i->jenis }}</td>
                <td>{{ $i->jumlah }}</td>
                <td>{{ $i->keterangan }}</td>
                <td>
                    <a href="{{ route('iuran.edit', $i->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('iuran.destroy', $i->id) }}" method="POST" style="display:inline-block;">
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

