@extends('layouts.pengurus')

@section('content')
<h4 class="fw-bold py-3 mb-4">Dashboard Pengurus</h4>

<div class="row">
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <i class="bx bx-calendar fs-1 text-info"></i>
                <h5 class="mt-2">Kegiatan</h5>
                <p class="text-muted">{{ $jumlahKegiatan ?? 0 }} kegiatan</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <i class="bx bx-check-square fs-1 text-warning"></i>
                <h5 class="mt-2">Kehadiran</h5>
                <p class="text-muted">{{ $jumlahKehadiran ?? 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card text-center shadow-sm border-0">
            <div class="card-body">
                <i class="bx bx-wallet fs-1 text-danger"></i>
                <h5 class="mt-2">Iuran</h5>
                <p class="text-muted">Rp {{ number_format($jumlahIuran ?? 0) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

