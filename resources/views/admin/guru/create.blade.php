@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-dark fw-bold">Tambah Guru</h1>
            <p class="text-muted mb-0">
                Tambahkan data guru pengajar sekolah.
            </p>
        </div>

        <div>
            <a href="{{ route('admin.guru.guru') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>
        </div>
    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NAMA GURU --}}
                <div class="mb-3">
                    <label for="nama_guru" class="form-label fw-semibold">
                        Nama Guru
                    </label>

                    <input
                        type="text"
                        name="nama_guru"
                        id="nama_guru"
                        class="form-control"
                        value="{{ old('nama_guru') }}"
                        placeholder="Masukkan nama guru"
                        required
                    >
                </div>

                {{-- NIP --}}
                <div class="mb-3">
                    <label for="nip" class="form-label fw-semibold">
                        NIP
                    </label>

                    <input
                        type="text"
                        name="nip"
                        id="nip"
                        class="form-control"
                        value="{{ old('nip') }}"
                        placeholder="Masukkan NIP"
                    >
                </div>

                {{-- MATA PELAJARAN --}}
                <div class="mb-3">
                    <label for="mapel" class="form-label fw-semibold">
                        Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        name="mapel"
                        id="mapel"
                        class="form-control"
                        value="{{ old('mapel') }}"
                        placeholder="Masukkan mata pelajaran"
                        required
                    >
                </div>

                {{-- FOTO --}}
                <div class="mb-4">
                    <label for="foto" class="form-label fw-semibold">
                        Foto Guru
                    </label>

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        Format JPG, JPEG, atau PNG.
                    </small>
                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.guru.guru') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Guru
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
