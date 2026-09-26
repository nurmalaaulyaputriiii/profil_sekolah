@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah Pengumuman</h4>
        <p class="text-muted mb-0">
            Buat pengumuman baru untuk sekolah
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold">
                Form Tambah Pengumuman
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.pengumuman.store') }}"
                  method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Judul Pengumuman
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control @error('judul') is-invalid @enderror"
                           value="{{ old('judul') }}"
                           maxlength="50"
                           placeholder="Masukkan judul pengumuman"
                           required>

                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Isi Pengumuman
                    </label>

                    <textarea name="isi"
                              rows="6"
                              class="form-control @error('isi') is-invalid @enderror"
                              placeholder="Masukkan isi pengumuman"
                              required>{{ old('isi') }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tanggal
                    </label>

                    <input type="date"
                           name="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', date('Y-m-d')) }}"
                           required>

                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Status
                    </label>

                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih Status --</option>

                        <option value="Publish"
                            {{ old('status') == 'Publish' ? 'selected' : '' }}>
                            Publish
                        </option>

                        <option value="Draft"
                            {{ old('status') == 'Draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Dibuat Oleh
                    </label>

                    <select name="id_user"
                            class="form-select @error('id_user') is-invalid @enderror"
                            required>

                        <option value="">-- Pilih User --</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id_user }}"
                                {{ old('id_user') == $user->id_user ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach

                    </select>

                    @error('id_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.pengumuman.pengumuman') }}"
                       class="btn btn-light border">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Pengumuman
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
