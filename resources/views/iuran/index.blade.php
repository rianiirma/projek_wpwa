@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">Data Iuran</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Tombol tambah --}}
    <a href="{{ route('iuran.create') }}" class="btn btn-primary mb-3">Tambah Iuran</a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
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
                    <td class="text-center">
                        <a href="{{ route('iuran.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="bx bx-edit-alt"></i>
                        </a>
                        <form action="{{ route('iuran.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
@endsection

