@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Edit User</h4>
            <p class="text-muted mb-0">
                Perbarui data pengguna sistem profil sekolah
            </p>
        </div>

        <a href="{{ route('admin.user.user') }}" class="btn btn-light">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">Form Edit User</h5>
        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.user.update', $user->id_user) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- USERNAME --}}
                <div class="mb-3">
                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="{{ old('username', $user->username) }}"
                        class="form-control @error('username') is-invalid @enderror"
                        placeholder="Masukkan username"
                        maxlength="30"
                    >

                    @error('username')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- ROLE --}}
                <div class="mb-3">
                    <label class="form-label">
                        Role
                    </label>

                    <select
                        name="role"
                        class="form-select @error('role') is-invalid @enderror"
                    >

                        <option value="Admin"
                            {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="Operator"
                            {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>
                            Operator
                        </option>

                    </select>

                    @error('role')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-4">
                    <label class="form-label">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Kosongkan jika tidak ingin mengubah password"
                    >

                    <small class="text-muted">
                        Kosongkan jika password tidak ingin diubah.
                    </small>

                    @error('password')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.user.user') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Update User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
