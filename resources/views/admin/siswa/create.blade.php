@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4 py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah Siswa</h4>
        <p class="text-muted mb-0">
            Tambahkan data siswa baru
        </p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.siswa.store') }}" method="POST">

                @csrf

                {{-- NISN --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        NISN
                    </label>

                    <input type="text"
                           name="nisn"
                           class="form-control @error('nisn') is-invalid @enderror"
                           value="{{ old('nisn') }}"
                           maxlength="10"
                           required>

                    @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- NAMA --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Nama Siswa
                    </label>

                    <input type="text"
                           name="nama_siswa"
                           class="form-control @error('nama_siswa') is-invalid @enderror"
                           value="{{ old('nama_siswa') }}"
                           maxlength="40"
                           required>

                    @error('nama_siswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Jenis Kelamin --</option>

                        <option value="Laki-Laki"
                            {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- TAHUN MASUK --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Tahun Masuk
                    </label>

                    <input type="number"
                           name="tahun_masuk"
                           class="form-control @error('tahun_masuk') is-invalid @enderror"
                           value="{{ old('tahun_masuk') }}"
                           min="1900"
                           max="2100"
                           required>

                    @error('tahun_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.siswa.siswa') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
