@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h1 class="h3 mb-1 text-dark fw-bold">Edit Data Guru</h1>
        <p class="text-muted mb-0">Perbarui informasi data guru.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.guru.update', ['id' => Crypt::encryptString($guru->id_guru)]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_guru" class="form-label fw-semibold">Nama Guru</label>
                    <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}" maxlength="40" required>
                    @error('nama_guru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label fw-semibold">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $guru->nip) }}" maxlength="15" required>
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_mapel" class="form-label fw-semibold">Mata Pelajaran</label>
                    <select class="form-select @error('id_mapel') is-invalid @enderror" id="id_mapel" name="id_mapel" required>
                        <option value="">-- Pilih Mata Pelajaran --</option>
                        @foreach ($mataPelajaran as $mapel)
                            <option value="{{ $mapel->id_mapel }}" {{ old('id_mapel', $guru->id_mapel) == $mapel->id_mapel ? 'selected' : '' }}>
                                {{ $mapel->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_mapel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if ($mataPelajaran->isEmpty())
                        <small class="text-danger">Belum ada data mata pelajaran. Tambahkan data mata pelajaran terlebih dahulu.</small>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Saat Ini</label>
                    <div>
                        @if ($guru->foto)
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" width="120" height="120" style="object-fit: cover; border-radius: 6px;">
                        @else
                            <div style="width: 120px; height: 120px; background: #eee; display: flex; align-items: center; justify-content: center; border-radius: 6px;">
                                <i class="bi bi-person fs-1 text-muted"></i>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label for="foto" class="form-label fw-semibold">Ganti Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept=".jpg,.jpeg,.png">
                    <small class="text-muted">Format JPG, JPEG, atau PNG. Maksimal 5 MB.</small>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('admin.guru.guru') }}" class="btn btn-secondary">
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
