@extends('layouts.admin')
@section('content')
@php
use Illuminate\Support\Facades\Crypt;
@endphp

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Ekstrakurikuler</h4>
            <p class="text-muted mb-0">Kelola data kegiatan ekstrakurikuler sekolah</p>
        </div>
        <a href="{{ route('admin.ektrakurikuler.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Ekstrakurikuler
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
                <form action="{{ url('/ektrakurikuler') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" name="search" class="form-control" placeholder="Cari" value="{{ $search ?? '' }}">
                        @if(!empty($search))
                            <a href="{{ url('/ektrakurikuler') }}" class="btn btn-outline-secondary" title="Hapus pencarian">
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
                            <th width="15%">Gambar</th>
                            <th>Nama Ekskul</th>
                            <th>Pembina</th>
                            <th>Jadwal Latihan</th>
                            <th>Deskripsi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ekstrakurikuler as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Ekskul" width="90" height="70" style="object-fit: cover; border-radius: 8px;">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $item->nama_ekskul }}</div>
                                </td>
                                <td>{{ $item->pembina }}</td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $item->jadwal_latihan }}
                                    </span>
                                </td>
                                <td>
                                    @if($item->deskripsi)
                                        {{ $item->deskripsi }}
                                    @else
                                        <span class="text-muted">Tidak ada deskripsi</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.ektrakurikuler.edit', Crypt::encryptString($item->id_ekskul)) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.ektrakurikuler.destroy', Crypt::encryptString($item->id_ekskul)) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ekstrakurikuler ini?')">
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
                                <td colspan="7" class="text-center py-4">
                                    <i class="bi bi-trophy fs-1 text-muted d-block mb-2"></i>
                                    <h6 class="fw-semibold">Belum Ada Data Ekstrakurikuler</h6>
                                    <p class="text-muted mb-0">Silakan tambahkan kegiatan ekstrakurikuler baru.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
