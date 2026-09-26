@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Guru</h4>
            <p class="text-muted mb-0">
                Kelola informasi data guru pengajar sekolah.
            </p>
        </div>

        <a href="{{ route('admin.guru.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Guru
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show"
             role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    {{-- TABEL DATA GURU --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Daftar Guru</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="12%">Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($gurus as $guru)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            {{-- FOTO --}}
                            <td class="text-center">
                                @if($guru->foto)

                                    <img
                                        src="{{ asset('storage/' . $guru->foto) }}"
                                        alt="{{ $guru->nama_guru }}"
                                        width="70"
                                        height="70"
                                        style="object-fit: cover; border-radius: 8px;"
                                    >

                                @else

                                    <div class="d-flex justify-content-center">
                                        <div style="width: 70px; height: 70px; background: #f1f1f1; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person fs-3 text-secondary"></i>
                                        </div>
                                    </div>

                                @endif
                            </td>

                            {{-- NAMA GURU --}}
                            <td class="fw-semibold">
                                {{ $guru->nama_guru }}
                            </td>

                            {{-- NIP --}}
                            <td>
                                {{ $guru->nip }}
                            </td>

                            {{-- MATA PELAJARAN --}}
                            <td>
                                <span class="badge bg-primary-subtle text-primary px-2 py-2">
                                    {{ $guru->mapel }}
                                </span>
                            </td>

                            {{-- AKSI --}}
                            <td class="text-center">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                                   class="btn btn-sm btn-warning text-white me-1"
                                   title="Edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6"
                                class="text-center py-4 text-muted">
                                Belum ada data guru yang ditambahkan.
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
