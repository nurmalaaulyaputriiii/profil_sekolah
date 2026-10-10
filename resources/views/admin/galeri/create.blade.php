@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

<div class="mb-4">
    <h4 class="fw-bold mb-1">Tambah Galeri</h4>
    <p class="text-muted mb-0">
        Tambahkan foto atau video baru
    </p>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form action="{{ route('admin.galeri.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Judul
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul') }}"
                       maxlength="50"
                       required>

                @error('judul')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Keterangan
                </label>

                <textarea name="keterangan"
                          rows="5"
                          class="form-control"
                          required>{{ old('keterangan') }}</textarea>

                @error('keterangan')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    File
                </label>

                <input type="file"
                       name="file"
                       class="form-control"
                       accept="image/*,video/*"
                       required>

                <small class="text-muted">
                    Foto: JPG, JPEG, PNG, WEBP.
                    Video: MP4, MOV, AVI.
                    Maksimal 20 MB.
                </small>

                @error('file')
                    <small class="text-danger d-block">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Kategori
                </label>

                <select name="kategori"
                        class="form-select"
                        required>

                    <option value="">
                        -- Pilih Kategori --
                    </option>

                    <option value="Foto"
                        {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                        Foto
                    </option>

                    <option value="Video"
                        {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                        Video
                    </option>

                </select>

                @error('kategori')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Tanggal
                </label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       value="{{ old('tanggal') }}"
                       required>

                @error('tanggal')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="d-flex gap-2">

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Simpan

                </button>

                <a href="{{ route('admin.galeri.galeri') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

</div>

@endsection
