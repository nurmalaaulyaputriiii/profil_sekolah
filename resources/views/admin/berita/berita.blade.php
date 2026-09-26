@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Berita</h4>
            <p class="text-muted mb-0">
                Kelola berita dan informasi sekolah
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h6 class="fw-bold mb-0">Daftar Berita</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="text-center">
                                    @if($item->gambar)
                                        <img
                                            src="{{ asset('storage/'.$item->gambar) }}"
                                            width="70"
                                            height="55"
                                            class="rounded"
                                            style="object-fit: cover;"
                                            alt="Gambar berita">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>

                                <td>{{ $item->judul }}</td>

                                <td>
                                    {{ $item->tanggal->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ $item->user->username ?? '-' }}
                                </td>

                                <td>
                                    @if($item->status == 'Publish')
                                        <span class="badge bg-success">
                                            Publish
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.berita.edit', $item->id_berita) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.berita.destroy', $item->id_berita) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"
                                    class="text-center py-4 text-muted">
                                    Belum ada data berita.
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
