@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Prestasi</h4>
            <p class="text-muted mb-0">
                Kelola data prestasi siswa sekolah
            </p>
        </div>

        <a href="{{ route('admin.prestasi.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Prestasi
        </a>
    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- TABEL PRESTASI --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Daftar Prestasi</h5>
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
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="text-center">
                                    @if($prestasi->foto)
                                        <img
                                            src="{{ asset('storage/' . $prestasi->foto) }}"
                                            alt="Foto Prestasi"
                                            width="90"
                                            height="70"
                                            style="object-fit: cover; border-radius: 8px;"
                                        >
                                    @else
                                        <span class="text-muted">
                                            Tidak ada foto
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $prestasi->nama_prestasi }}
                                </td>

                                <td>
                                    {{ $prestasi->deskripsi }}
                                </td>

                                <td class="text-center">
                                    {{ $prestasi->tahun_ajaran }}
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.prestasi.edit', $prestasi->id_prestasi) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.prestasi.destroy', $prestasi->id_prestasi) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">

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
                                <td colspan="6" class="text-center py-4">
                                    Belum ada data prestasi.
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
