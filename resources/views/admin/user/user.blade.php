@extends('layouts.admin')

@section('content')

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data User</h4>
            <p class="text-muted mb-0">Kelola data pengguna sistem profil sekolah</p>
        </div>

        @if (auth()->user()->role == 'Admin')
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah User
            </a>
        @endif
    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-semibold">
                <i class="bi bi-people-fill me-2 text-primary"></i>
                Daftar User
            </h5>
        </div>

        <div class="card-body">

            {{-- TABLE --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr class="text-center">
                            <th width="60">No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status Role</th>

                            @if (auth()->user()->role == 'Admin')
                                <th width="150">Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $user)

                            <tr>

                                {{-- NO --}}
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- USERNAME --}}
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div
                                            class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
                                            style="width:40px;height:40px;"
                                        >
                                            <i class="bi bi-person-fill text-primary"></i>
                                        </div>

                                        <div class="fw-semibold">
                                            {{ $user->username }}
                                        </div>

                                    </div>
                                </td>

                                {{-- ROLE --}}
                                <td class="text-center">
                                    {{ $user->role }}
                                </td>

                                {{-- STATUS --}}
                                <td class="text-center">

                                    @if ($user->role == 'Admin')

                                        <span class="badge bg-primary">
                                            <i class="bi bi-shield-fill-check me-1"></i>
                                            Admin
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ ucfirst($user->role) }}
                                        </span>

                                    @endif

                                </td>

                                {{-- AKSI --}}
                                @if (auth()->user()->role == 'Admin')

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('admin.user.edit', ['id' => Crypt::encryptString($user->id_user)]) }}"
                                                class="btn btn-warning btn-sm"
                                                title="Edit"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('admin.user.destroy', ['id' => Crypt::encryptString($user->id_user)]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Hapus"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                @endif

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="{{ auth()->user()->role == 'Admin' ? 5 : 4 }}"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted">

                                        <i class="bi bi-person-x fs-1 d-block mb-2"></i>

                                        <h6 class="fw-semibold">
                                            Belum Ada Data User
                                        </h6>

                                        <p class="mb-0">
                                            Silakan tambahkan user baru.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

@endsection
