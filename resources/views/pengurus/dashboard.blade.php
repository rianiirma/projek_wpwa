@extends('layouts.pengurus')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="text-center mb-5">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Pengurus Icon" width="100" class="rounded-circle shadow-sm mb-3">
        <h2>Selamat Datang di Halaman Pengurus 👋</h2>
        <p class="text-muted">Pengurus WPWA</p>
    </div>

    <!-- Card Statistik -->
    <div class="row g-4">
        <!-- Kegiatan -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 h-100">
                <i class='bx bx-calendar-event fs-1 text-primary mb-3'></i>
                <h5 class="fw-bold">Kegiatan</h5>
                <p class="text-muted mb-1">{{ $totalKegiatan }} kegiatan</p>
                <a href="{{ route('pengurus.kegiatan.index') }}" class="btn btn-sm btn-outline-primary">Lihat</a>
            </div>
        </div>

        <!-- Kehadiran -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 h-100">
                <i class='bx bx-check-square fs-1 text-warning mb-3'></i>
                <h5 class="fw-bold">Kehadiran</h5>
                <p class="text-muted mb-1">Input & Rekap</p>
                <a href="{{ route('pengurus.kehadiran.index') }}" class="btn btn-sm btn-outline-warning">Lihat</a>
            </div>
        </div>

        <!-- Iuran -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 h-100">
                <i class='bx bx-wallet fs-1 text-success mb-3'></i>
                <h5 class="fw-bold">Iuran</h5>
                <p class="text-muted mb-1">Rp {{ number_format($totalIuran, 0, ',', '.') }}</p>
                <a href="{{ route('pengurus.iuran.index') }}" class="btn btn-sm btn-outline-success">Lihat</a>
            </div>
        </div>

        <!-- Anggota -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center p-3 h-100">
                <i class='bx bx-group fs-1 text-info mb-3'></i>
                <h5 class="fw-bold">Anggota</h5>
                <p class="text-muted mb-1">{{ $totalAnggota }} orang</p>
                <a href="{{ route('pengurus.anggota.index') }}" class="btn btn-sm btn-outline-info">Lihat</a>
            </div>
        </div>
    </div>

    <!-- Extra Info -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-3">
                <h5><i class='bx bx-calendar-check text-primary me-2'></i>Kegiatan Terdekat</h5>
                @if($kegiatanTerdekat)
                <p class="mb-0"><strong>{{ $kegiatanTerdekat->nama }}</strong><br>
                    <span class="text-muted">{{ $kegiatanTerdekat->tanggal }}</span></p>
                @else
                <p class="text-muted">Tidak ada kegiatan terdekat.</p>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-3">
                <h5><i class='bx bx-exclamation-circle text-danger me-2'></i>Belum Bayar Iuran Bulan Ini</h5>
                @if($belumBayar->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach($belumBayar as $anggota)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $anggota->nama }}
                        <span class="badge bg-danger">Belum</span>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-success">Semua anggota sudah bayar 🎉</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

