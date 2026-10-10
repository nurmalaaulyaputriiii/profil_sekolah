@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data Guru</h4>
            <p class="text-muted mb-0">Kelola informasi data guru pengajar sekolah.</p>
        </div>

        {{-- TOMBOL TAMBAH KHUSUS ADMIN --}}
        @if (auth()->user()->role == 'Admin')
            <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Tambah Guru
            </a>
        @endif
    </div>

    {{-- NOTIFIKASI SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    {{-- NOTIFIKASI ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- TABEL DATA GURU --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">

                <h5 class="mb-0 fw-bold"></h5>

                <form action="{{ url('/guru') }}"
                      method="GET"
                      class="d-flex guru-search">

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari"
                               value="{{ $search ?? '' }}">

                        @if(!empty($search))
                            <a href="{{ url('/guru') }}"
                               class="btn btn-outline-secondary"
                               title="Hapus pencarian">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>

                    </div>
                </form>

            </div>
        </div>

        <div class="card-body">

            <div class="guru-table-wrapper">

                <table class="table table-bordered table-hover align-middle guru-table">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="12%">Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>

                            {{-- KOLOM AKSI KHUSUS ADMIN --}}
                            @if (auth()->user()->role == 'Admin')
                                <th width="15%">Aksi</th>
                            @endif
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

                                        <img src="{{ asset('storage/' . $guru->foto) }}"
                                             alt="{{ $guru->nama_guru }}"
                                             width="90"
                                             height="70"
                                             style="object-fit: cover; border-radius: 8px;">

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

                                {{-- AKSI KHUSUS ADMIN --}}
                                @if (auth()->user()->role == 'Admin')

                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.guru.edit', ['id' => Crypt::encryptString($guru->id_guru)]) }}"
                                               class="btn btn-warning btn-sm"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            {{-- HAPUS --}}
                                            <form action="{{ route('admin.guru.destroy', ['id' => Crypt::encryptString($guru->id_guru)]) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                @endif

                            </tr>

                        @empty

                            <tr>
                                <td colspan="{{ auth()->user()->role == 'Admin' ? 6 : 5 }}"
                                    class="text-center py-4 text-muted">

                                    <i class="bi bi-person-workspace fs-1 d-block mb-2"></i>

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
