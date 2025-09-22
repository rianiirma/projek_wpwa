@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-wallet text-success'></i> Daftar Iuran</h3>
        <a href="{{ route('pengurus.iuran.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Catat Iuran
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
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Jumlah Iuran</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($iuran as $item)
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
                            <a href="{{ route('pengurus.iuran.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class='bx bx-edit'></i>
                            </a>
                            <form action="{{ route('pengurus.iuran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data iuran ini?')">
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
                        <td colspan="5" class="text-center text-muted">Belum ada data iuran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $iuran->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

