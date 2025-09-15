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
    <a href="{{ route('admin.iuran.create') }}" class="btn btn-primary mb-3">Tambah Iuran</a>

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
@endsection

