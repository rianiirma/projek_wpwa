@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-info text-white">
            <h5><i class='bx bx-user'></i> Detail Anggota</h5>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
            <p><strong>Email:</strong> {{ $anggota->email }}</p>
            <p><strong>Status:</strong>
                @if($anggota->status == 'aktif')
                <span class="badge bg-success">Aktif</span>
                @else
                <span class="badge bg-secondary">Tidak Aktif</span>
                @endif
            </p>
            <a href="{{ route('pengurus.anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection

