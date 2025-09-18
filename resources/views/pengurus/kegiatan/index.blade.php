@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-calendar-event text-primary'></i> Daftar Kegiatan</h3>
        <a href="{{ route('pengurus.kegiatan.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Tambah Kegiatan
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
                        <th>#</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kegiatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('pengurus.kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class='bx bx-edit'></i>
                            </a>
                            <form action="{{ route('pengurus.kegiatan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
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
                        <td colspan="4" class="text-center text-muted">Belum ada kegiatan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $kegiatan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

