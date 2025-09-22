@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-check-square text-warning'></i> Daftar Kehadiran</h3>
        <a href="{{ route('pengurus.kehadiran.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Tambah Kehadiran
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success"><i class='bx bx-check-circle'></i> {{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Nama Kegiatan</th>
                        <th>Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kehadiran as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->anggota->nama }}</td>
                        <td>{{ $item->kegiatan->nama_kegiatan }}</td>
                        <td>{{ $item->hadir ? 'Hadir' : 'Tidak' }}</td>
                        <td>
                            <a href="{{ route('pengurus.kehadiran.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class='bx bx-edit'></i>
                            </a>
                            <form action="{{ route('pengurus.kehadiran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data kehadiran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $kehadiran->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

