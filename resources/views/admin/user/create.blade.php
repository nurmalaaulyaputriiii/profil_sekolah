@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">

    {{-- Header Halaman --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Tambah User Baru</h4>
        <p class="text-muted mb-3">Tambahkan akun pengguna baru untuk mengelola sistem Profil Sekolah.</p>
        <a href="{{ route('admin.user.user') }}" class="btn btn-light btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar User
        </a>
    </div>

    {{-- Card Form --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                {{-- Input Username --}}
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror"
                        placeholder="Masukkan username"
                        required
                    >
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Input Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukkan password"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Pilih Role --}}
                <div class="mb-4">
                    <label for="role" class="form-label fw-semibold">Role Pengguna</label>
                    <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Operator" {{ old('role') == 'Operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.user.user') }}" class="btn btn-light px-4">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-dark px-4">
                        <i class="bi bi-save me-1"></i> Simpan User
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
