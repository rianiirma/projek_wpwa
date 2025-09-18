@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class='bx bx-edit-alt'></i> Edit Kehadiran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.kehadiran.update', $kehadiran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kegiatan_id" class="form-label">Kegiatan</label>
                    <select name="kegiatan_id" class="form-select">
                        @foreach($kegiatan as $k)
                        <option value="{{ $k->id }}" {{ $kehadiran->kegiatan_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="anggota_id" class="form-label">Anggota</label>
                    <select name="anggota_id" class="form-select">
                        @foreach($anggota as $a)
                        <option value="{{ $a->id }}" {{ $kehadiran->anggota_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Kehadiran</label>
                    <select name="status" class="form-select">
                        <option value="Hadir" {{ $kehadiran->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Tidak Hadir" {{ $kehadiran->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"><i class='bx bx-refresh'></i> Update</button>
                <a href="{{ route('pengurus.kehadiran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

