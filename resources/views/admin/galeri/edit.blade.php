@extends('layouts.admin')

@section('content')

@php
use Illuminate\Support\Facades\Crypt;
@endphp

<div class="container-fluid py-4">

<div class="mb-4">
    <h4 class="fw-bold mb-1">Edit Galeri</h4>
    <p class="text-muted mb-0">
        Perbarui foto atau video kegiatan sekolah
    </p>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form action="{{ route('admin.galeri.update', Crypt::encryptString($galeri->id_galeri)) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Judul
                </label>

                <input type="text"
                       name="judul"
                       class="form-control"
                       value="{{ old('judul', $galeri->judul) }}"
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
                          required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                @error('keterangan')
                    <small class="text-danger">
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

                    <option value="Foto"
                        {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                        Foto
                    </option>

                    <option value="Video"
                        {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                        Video
                    </option>

                </select>

                @error('kategori')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    File Saat Ini
                </label>

                <div class="mb-3">

                    @if($galeri->file)

                        @if($galeri->kategori == 'Foto')

                            <img src="{{ asset('storage/' . $galeri->file) }}"
                                 width="180"
                                 class="rounded"
                                 alt="Foto galeri">

                        @else

                            <video width="250"
                                   controls>

                                <source src="{{ asset('storage/' . $galeri->file) }}">

                                Browser Anda tidak mendukung video.

                            </video>

                        @endif

                    @else

                        <p class="text-muted mb-0">
                            Tidak ada file.
                        </p>

                    @endif

                </div>

                <label class="form-label fw-semibold">
                    Ganti File (Opsional)
                </label>

                <input type="file"
                       name="file"
                       class="form-control"
                       accept="image/*,video/mp4,video/quicktime,video/x-msvideo">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti file.
                    Maksimal 20 MB.
                </small>

                @error('file')
                    <small class="text-danger d-block">
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
                       value="{{ old('tanggal', $galeri->tanggal->format('Y-m-d')) }}"
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
                    Simpan Perubahan

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
