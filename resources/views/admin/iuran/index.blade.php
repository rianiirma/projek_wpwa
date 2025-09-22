@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-wallet text-primary'></i> Data Iuran</h3>
        <a href="{{ route('admin.iuran.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Tambah Iuran
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
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($iuran as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->anggota->nama ?? '-' }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>
                                Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="{{ route('admin.iuran.edit', $item->id) }}" class="btn btn-warning btn-icon" title="Edit">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('admin.iuran.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-icon" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                        <i class="bx bx-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data iuran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

