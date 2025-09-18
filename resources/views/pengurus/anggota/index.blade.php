@extends('layouts.pengurus')

@section('content')
<div class="container">
    <h3 class="mb-4"><i class='bx bx-group text-primary'></i> Data Anggota</h3>

    @if(session('success'))
    <div class="alert alert-success"><i class='bx bx-check-circle'></i> {{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggota as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->email }}</td>
                        <td>
                            @if($a->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pengurus.anggota.show', $a->id) }}" class="btn btn-sm btn-info">
                                <i class='bx bx-show'></i>
                            </a>
                            <a href="{{ route('pengurus.anggota.edit', $a->id) }}" class="btn btn-sm btn-warning">
                                <i class='bx bx-edit'></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data anggota.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $anggota->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

