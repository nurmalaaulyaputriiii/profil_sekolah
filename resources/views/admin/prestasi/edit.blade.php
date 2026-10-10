@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Prestasi</h4>
        <p class="text-muted mb-0">Perbarui data prestasi siswa</p>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold">Form Edit Prestasi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.prestasi.update', ['id' => Crypt::encryptString($prestasi->id_prestasi)]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Prestasi</label>
                    <input type="text" name="nama_prestasi" class="form-control @error('nama_prestasi') is-invalid @enderror" value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}" maxlength="100" required>
                    @error('nama_prestasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Saat Ini</label>
                    <div>
                        @if($prestasi->foto)
                            <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="Foto Prestasi" width="150" height="110" style="object-fit: cover; border-radius: 8px;">
                        @else
                            <p class="text-muted mb-0">Belum ada foto.</p>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto. Format JPG, JPEG, PNG. Maksimal 2 MB.</small>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control @error('tahun_ajaran') is-invalid @enderror" value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}" maxlength="20" required>
                    @error('tahun_ajaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.prestasi.prestasi') }}" class="btn btn-secondary">Kembali</a>
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
