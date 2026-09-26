@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah Prestasi</h4>
        <p class="text-muted mb-0">
            Tambahkan data prestasi siswa
        </p>
    </div>

    {{-- FORM TAMBAH --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Form Tambah Prestasi</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.prestasi.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- NAMA PRESTASI --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama Prestasi
                    </label>

                    <input type="text"
                           name="nama_prestasi"
                           class="form-control"
                           value="{{ old('nama_prestasi') }}"
                           placeholder="Masukkan nama prestasi"
                           maxlength="100"
                           required>

                    @error('nama_prestasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="4"
                              placeholder="Masukkan deskripsi prestasi"
                              required>{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FOTO --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Foto Prestasi
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/jpg">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG. Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- TAHUN AJARAN --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Tahun Ajaran
                    </label>

                    <input type="text"
                           name="tahun_ajaran"
                           class="form-control"
                           value="{{ old('tahun_ajaran') }}"
                           placeholder="Contoh: 2025/2026"
                           maxlength="20"
                           required>

                    @error('tahun_ajaran')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.prestasi.prestasi') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Prestasi
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
