@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class='bx bx-check-square text-primary'></i> Data Kehadiran</h3>
        <a href="{{ route('admin.kehadiran.create') }}" class="btn btn-primary">
            <i class='bx bx-plus'></i> Tambah Kehadiran
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                   <tr>
                       <th>No</th>
                       <th>Nama Anggota</th>
                       <th>Nama Kegiatan</th>
                       <th>Hadir</th>
                       <th>Aksi</th>
                   </tr>
                   </thead>
                   <tbody>
                       @foreach($kehadiran as $k)
                       <tr>
                           <td>{{ $k->id }}</td>
                           <td>{{ $k->anggota->nama }}</td>
                           <td>{{ $k->kegiatan->nama_kegiatan }}</td>
                           <td>{{ $k->hadir ? 'Ya' : 'Tidak' }}</td>
                           <td>
                               <a href="{{ route('admin.kehadiran.edit', $k->id) }}" class="btn btn-warning btn-icon" title="Edit">
                                   <i class="bx bx-edit"></i>
                               </a>
                               <form action="{{ route('admin.kehadiran.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                                   @csrf
                                   @method('DELETE')
                                   <button class="btn btn-danger btn-icon" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                       <i class="bx bx-trash"></i>
                                   </button>

                               </form>
                           </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

