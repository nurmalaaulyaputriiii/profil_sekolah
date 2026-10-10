@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4" style="max-width: 1150px; margin: auto;">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                {{ $profil ? 'Edit Profil Sekolah' : 'Tambah Profil Sekolah' }}
            </h4>
            <p class="text-muted mb-0">Kelola informasi profil sekolah dengan mudah dan cepat</p>
        </div>
        <a href="{{ route('admin.profil.profil') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-2"></i> Kembali
        </a>
    </div>

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data berikut:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h5 class="fw-bold mb-3 text-primary">Informasi Sekolah</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" maxlength="40" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah" class="form-control" value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}" maxlength="40" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">NPSN</label>
                    <input type="text" name="npsn" class="form-control" value="{{ old('npsn', $profil->npsn ?? '') }}" maxlength="10" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tahun Berdiri</label>
                    <input type="number" name="tahun_berdiri" class="form-control" value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}" min="1900" max="{{ date('Y') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat Sekolah</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kontak Sekolah</label>
                    <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $profil->kontak ?? '') }}" maxlength="15" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Visi dan Misi</label>
                    <textarea name="visi_misi" class="form-control" rows="5" required>{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Deskripsi Sekolah</label>
                    <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3 text-primary">Media (Foto & Logo)</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        @if(!empty($profil?->foto))
                            <div class="mb-2">
                                <label class="form-label d-block text-muted small">Foto Saat Ini</label>
                                <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto" style="width: 100%; max-height: 150px; object-fit: cover;" class="rounded border">
                            </div>
                        @endif
                        <label class="form-label fw-semibold">Ganti Foto Sekolah</label>
                        <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png,image/jpg">
                        <small class="text-muted">Format JPG/PNG, maks 2MB.</small>
                    </div>

                    <div class="col-md-6 mb-4">
                        @if(!empty($profil?->logo))
                            <div class="mb-2">
                                <label class="form-label d-block text-muted small">Logo Saat Ini</label>
                                <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" style="width: 100px; height: 100px; object-fit: contain;" class="rounded border p-1">
                            </div>
                        @endif
                        <label class="form-label fw-semibold">Ganti Logo Sekolah</label>
                        <input type="file" name="logo" class="form-control" accept="image/jpeg,image/png,image/jpg">
                        <small class="text-muted">Format JPG/PNG, maks 2MB.</small>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('admin.profil.profil') }}" class="btn btn-secondary px-4">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-2"></i> Simpan Profil
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
