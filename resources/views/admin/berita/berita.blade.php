@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Berita</h4>
            <p class="text-muted mb-0">Kelola berita dan informasi sekolah</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Berita
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
                <form action="{{ url('/berita') }}" method="GET" class="d-flex berita-search">
                    <div class="input-group">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" name="search" class="form-control" placeholder="Cari" value="{{ $search ?? '' }}">
                        @if(!empty($search))
                            <a href="{{ url('/berita') }}" class="btn btn-outline-secondary" title="Hapus pencarian">
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
                            <th width="12%">Gambar</th>
                            <th>Judul</th>
                            <th>Isi Berita</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berita as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" width="70" height="55" class="rounded" style="object-fit: cover;" alt="Gambar berita">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $item->judul }}</div>
                                </td>
                                <td style="min-width: 300px;">
                                    @if($item->isi)
                                        {{ $item->isi }}
                                    @else
                                        <span class="text-muted">Tidak ada isi berita</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $item->tanggal->format('d-m-Y') }}
                                </td>
                                <td>
                                    {{ $item->user->username ?? '-' }}
                                </td>
                                <td class="text-center">
                                    @if($item->status == 'Publish')
                                        <span class="badge bg-success">Publish</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.berita.edit', \Illuminate\Support\Facades\Crypt::encryptString($item->id_berita)) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.berita.destroy', \Illuminate\Support\Facades\Crypt::encryptString($item->id_berita)) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
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
                                <td colspan="8" class="text-center py-4 text-muted">
                                    <i class="bi bi-newspaper fs-1 d-block mb-2"></i>
                                    <h6 class="fw-semibold">Belum Ada Data Berita</h6>
                                    <p class="mb-0">Silakan tambahkan berita baru.</p>
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
