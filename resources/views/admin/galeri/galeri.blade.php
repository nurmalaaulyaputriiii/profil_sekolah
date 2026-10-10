@extends('layouts.admin')
@section('content')
@php
use Illuminate\Support\Facades\Crypt;
@endphp
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Galeri</h4>
            <p class="text-muted mb-0">Kelola foto dan video sekolah</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>Tambah Galeri
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
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
                <form action="{{ route('admin.galeri.galeri') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Cari" value="{{ $search ?? '' }}">
                        @if(!empty($search))
                            <a href="{{ route('admin.galeri.galeri') }}" class="btn btn-outline-secondary" title="Hapus pencarian"><i class="bi bi-x-lg"></i></a>
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
                            <th width="15%">File</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeri as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($item->file)
                                        @if($item->kategori == 'Foto')
                                            <img src="{{ asset('storage/' . $item->file) }}" width="80" height="60" class="rounded" style="object-fit:cover;" alt="{{ $item->judul }}">
                                        @else
                                            <video width="100" height="60" controls preload="metadata" class="rounded" style="object-fit:cover;">
                                                <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                                                Browser kamu tidak mendukung video.
                                            </video>
                                        @endif
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td><div class="fw-semibold">{{ $item->judul }}</div></td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">
                                    @if($item->kategori == 'Foto')
                                        <span class="badge bg-primary">Foto</span>
                                    @else
                                        <span class="badge bg-danger">Video</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') : '-' }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.galeri.edit', Crypt::encryptString($item->id_galeri)) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.galeri.destroy', Crypt::encryptString($item->id_galeri)) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data galeri ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="bi bi-images fs-1 d-block mb-2"></i>
                                    <h6 class="fw-semibold">Belum Ada Data Galeri</h6>
                                    <p class="mb-0">Silakan tambahkan galeri baru.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($galeri, 'links'))
                <div class="mt-3">{{ $galeri->links() }}</div>
            @endif
        </div>
    </div>
</div>
@endsection
