@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Prestasi</h4>
        <p class="text-muted mb-0">
            Perbarui data prestasi siswa
        </p>
    </div>

    {{-- FORM EDIT --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Form Edit Prestasi</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.prestasi.update', $prestasi->id_prestasi) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- NAMA PRESTASI --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama Prestasi
                    </label>

                    <input type="text"
                           name="nama_prestasi"
                           class="form-control"
                           value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}"
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
                              required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>

                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FOTO LAMA --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Foto Saat Ini
                    </label>

                    <div>
                        @if($prestasi->foto)
                            <img
                                src="{{ asset('storage/' . $prestasi->foto) }}"
                                alt="Foto Prestasi"
                                width="150"
                                height="110"
                                style="object-fit: cover; border-radius: 8px;"
                            >
                        @else
                            <p class="text-muted">
                                Belum ada foto.
                            </p>
                        @endif
                    </div>
                </div>

                {{-- FOTO BARU --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Ganti Foto (Opsional)
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept="image/jpeg,image/png,image/jpg">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
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
                           value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}"
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
                        Update Prestasi
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
