@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Pengumuman</h4>
            <p class="text-muted mb-0">
                Kelola informasi dan pengumuman sekolah
            </p>
        </div>

        <a href="{{ route('admin.pengumuman.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Pengumuman
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold">
                Daftar Pengumuman
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="60">No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Dibuat Oleh</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($pengumuman as $index => $item)

                            <tr>

                                <td class="text-center">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $item->judul }}
                                    </div>

                                    <small class="text-muted">
                                        ID: {{ $item->id_pengumuman }}
                                    </small>
                                </td>

                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ $item->user->username ?? '-' }}
                                </td>

                                <td class="text-center">

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
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.pengumuman.edit', $item->id_pengumuman) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.pengumuman.destroy', $item->id_pengumuman) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-megaphone fs-1 text-muted d-block mb-2"></i>

                                    <h6 class="fw-semibold">
                                        Belum Ada Pengumuman
                                    </h6>

                                    <p class="text-muted mb-0">
                                        Silakan tambahkan pengumuman baru.
                                    </p>
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
