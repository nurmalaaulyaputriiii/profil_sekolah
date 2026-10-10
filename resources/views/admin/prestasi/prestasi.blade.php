@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Prestasi</h4>
            <p class="text-muted mb-0">Kelola data prestasi siswa sekolah</p>
        </div>
        <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Prestasi
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">
                <h5 class="mb-0 fw-bold"></h5>
                <form action="{{ route('admin.prestasi.prestasi') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" name="search" class="form-control" placeholder="Cari" value="{{ $search ?? '' }}">
                        @if(!empty($search))
                            <a href="{{ route('admin.prestasi.prestasi') }}" class="btn btn-outline-secondary" title="Hapus pencarian">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="15%">Foto</th>
                            <th>Nama Prestasi</th>
                            <th>Deskripsi</th>
                            <th>Tahun Ajaran</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prestasis as $prestasi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($prestasi->foto)
                                        <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto Prestasi" width="90" height="70" style="object-fit: cover; border-radius: 8px;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>{{ $prestasi->nama_prestasi }}</td>
                                <td>{{ $prestasi->deskripsi }}</td>
                                <td class="text-center">{{ $prestasi->tahun_ajaran }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.prestasi.edit', ['id' => Crypt::encryptString($prestasi->id_prestasi)]) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.prestasi.destroy', ['id' => Crypt::encryptString($prestasi->id_prestasi)]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Belum ada data prestasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
