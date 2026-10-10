@extends('layouts.admin')
@section('content')
@php
use Illuminate\Support\Facades\Crypt;
@endphp

<div class="container-fluid py-4">
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Ekstrakurikuler</h4>
        <p class="text-muted mb-0">Perbarui informasi kegiatan ekstrakurikuler</p>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold">Form Edit Ekstrakurikuler</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ektrakurikuler.update', Crypt::encryptString($ekstrakurikuler->id_ekskul)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_ekskul" class="form-control @error('nama_ekskul') is-invalid @enderror" value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul) }}" maxlength="40" required>
                    @error('nama_ekskul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pembina</label>
                    <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina', $ekstrakurikuler->pembina) }}" maxlength="40" required>
                    @error('pembina')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror" value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan) }}" maxlength="40" required>
                    @error('jadwal_latihan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @if($ekstrakurikuler->gambar)
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Saat Ini</label>
                        <div>
                            <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="Gambar Ekstrakurikuler" class="rounded border" style="width: 150px; height: 110px; object-fit: cover;">
                        </div>
                    </div>
                @endif
                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/png,image/jpeg">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar. Format JPG atau PNG, maksimal 2 MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.ektrakurikuler.ektrakurikuler') }}" class="btn btn-light border">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
