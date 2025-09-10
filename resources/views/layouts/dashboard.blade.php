@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="text-center mb-4">
        <img src="{{ Auth::user()->foto ? asset('storage/'.Auth::user()->foto) : asset('admin/assets/img/avatars/1.png') }}" class="rounded-circle" width="100" height="100" alt="Admin Foto">
        <h3 class="mt-3">Selamat Datang di Halaman Admin 👋</h3>
        <p>{{ Auth::user()->name }}</p>
    </div>



    <div class="row">
        <!-- Users -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-user-circle fs-1 text-secondary"></i>
                    <h5 class="mt-2">Users</h5>
                    <p class="text-muted">{{ $jumlahUsers ?? 0 }} akun</p>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-secondary">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Anggota -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-group fs-1 text-success"></i>
                    <h5 class="mt-2">Anggota</h5>
                    <p class="text-muted">{{ $jumlahAnggota ?? 0 }} orang</p>
                    <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-outline-success">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Pengurus -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-user-voice fs-1 text-primary"></i>
                    <h5 class="mt-2">Pengurus</h5>
                    <p class="text-muted">{{ $jumlahPengurus ?? 0 }} orang</p>
                    <a href="{{ route('pengurus.index') }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Kegiatan -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-calendar fs-1 text-info"></i>
                    <h5 class="mt-2">Kegiatan</h5>
                    <p class="text-muted">{{ $jumlahKegiatan ?? 0 }} kegiatan</p>
                    <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-outline-info">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Kehadiran -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-check-square fs-1 text-warning"></i>
                    <h5 class="mt-2">Kehadiran</h5>
                    <p class="text-muted">{{ $jumlahKehadiran ?? 0 }}</p>
                    <a href="{{ route('kehadiran.index') }}" class="btn btn-sm btn-outline-warning">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Iuran -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bx bx-wallet fs-1 text-danger"></i>
                    <h5 class="mt-2">Iuran</h5>
                    <p class="text-muted">Rp {{ number_format($jumlahIuran ?? 0) }}</p>
                    <a href="{{ route('iuran.index') }}" class="btn btn-sm btn-outline-danger">Lihat</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

