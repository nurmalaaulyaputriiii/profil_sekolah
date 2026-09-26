@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah Ekstrakurikuler</h4>
        <p class="text-muted mb-0">
            Tambahkan kegiatan ekstrakurikuler sekolah
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold">
                Form Tambah Ekstrakurikuler
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.ektrakurikuler.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- NAMA EKSKUL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama Ekstrakurikuler
                    </label>

                    <input type="text"
                           name="nama_ekskul"
                           class="form-control @error('nama_ekskul') is-invalid @enderror"
                           value="{{ old('nama_ekskul') }}"
                           placeholder="Masukkan nama ekstrakurikuler"
                           required>

                    @error('nama_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PEMBINA --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama Pembina
                    </label>

                    <input type="text"
                           name="pembina"
                           class="form-control @error('pembina') is-invalid @enderror"
                           value="{{ old('pembina') }}"
                           placeholder="Masukkan nama pembina"
                           required>

                    @error('pembina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- JADWAL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Jadwal Latihan
                    </label>

                    <input type="text"
                           name="jadwal_latihan"
                           class="form-control @error('jadwal_latihan') is-invalid @enderror"
                           value="{{ old('jadwal_latihan') }}"
                           placeholder="Contoh: Jumat, 15.00 - 17.00"
                           required>

                    @error('jadwal_latihan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Masukkan deskripsi ekstrakurikuler"
                              required>{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- GAMBAR --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Gambar Ekstrakurikuler
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/png,image/jpeg">

                    <small class="text-muted">
                        Format JPG atau PNG, maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.ektrakurikuler.ektrakurikuler') }}"
                       class="btn btn-light border">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
