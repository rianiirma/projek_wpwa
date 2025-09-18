@extends('layouts.pengurus')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0"><i class='bx bx-edit-alt'></i> Edit Iuran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pengurus.iuran.update', $iuran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="anggota_id" class="form-label">Nama Anggota</label>
                    <select name="anggota_id" class="form-select">
                        @foreach($anggota as $a)
                        <option value="{{ $a->id }}" {{ $iuran->anggota_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Iuran (Rp)</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $iuran->jumlah }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Setor</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $iuran->tanggal }}">
                </div>

                <button type="submit" class="btn btn-primary"><i class='bx bx-refresh'></i> Update</button>
                <a href="{{ route('pengurus.iuran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

