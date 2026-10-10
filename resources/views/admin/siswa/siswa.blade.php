@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Data Siswa</h4>
        <p class="text-muted mb-0">Kelola data siswa sekolah.</p>
    </div>

    {{-- TAMBAH SISWA: ADMIN SAJA --}}
    @if(auth()->user()->role == 'Admin')
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Siswa
        </a>
    @endif
</div>

{{-- ALERT SUCCESS --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

{{-- ALERT ERROR --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- TABEL DATA SISWA --}}
<div class="card border-0 shadow-sm">

    {{-- HEADER TABEL --}}
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">

            <h5 class="mb-0 fw-bold"></h5>

            {{-- SEARCH --}}
            <form action="{{ url('/siswa') }}" method="GET">
                <div class="input-group">

                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari"
                           value="{{ $search ?? '' }}">

                    @if(!empty($search))
                        <a href="{{ url('/siswa') }}"
                           class="btn btn-outline-secondary"
                           title="Hapus pencarian">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>

                </div>
            </form>

        </div>
    </div>

    {{-- BODY TABEL --}}
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Masuk</th>

                        {{-- AKSI: ADMIN SAJA --}}
                        @if(auth()->user()->role == 'Admin')
                            <th width="15%">Aksi</th>
                        @endif
                    </tr>
                </thead>

                <tbody>

                    @forelse($siswa as $index => $item)

                        <tr>

                            {{-- NOMOR --}}
                            <td class="text-center">
                                {{ $siswa->firstItem() + $index }}
                            </td>

                            {{-- NISN --}}
                            <td>
                                {{ $item->nisn }}
                            </td>

                            {{-- NAMA SISWA --}}
                            <td class="fw-semibold">
                                {{ $item->nama_siswa }}
                            </td>

                            {{-- JENIS KELAMIN --}}
                            <td class="text-center">

                                @if($item->jenis_kelamin == 'L')
                                    <span class="badge bg-primary-subtle text-primary px-2 py-2">
                                        Laki-laki
                                    </span>
                                @elseif($item->jenis_kelamin == 'P')
                                    <span class="badge bg-danger-subtle text-danger px-2 py-2">
                                        Perempuan
                                    </span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary px-2 py-2">
                                        {{ $item->jenis_kelamin }}
                                    </span>
                                @endif

                            </td>

                            {{-- TAHUN MASUK --}}
                            <td class="text-center">
                                <span class="badge bg-primary-subtle text-primary px-2 py-2">
                                    {{ $item->tahun_masuk }}
                                </span>
                            </td>

                            {{-- AKSI: ADMIN SAJA --}}
                            @if(auth()->user()->role == 'Admin')
                                <td class="text-center">

                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.siswa.edit', ['id' => Crypt::encryptString($item->id_siswa)]) }}"
                                           class="btn btn-warning btn-sm"
                                           title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('admin.siswa.destroy', ['id' => Crypt::encryptString($item->id_siswa)]) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data siswa ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>
                            @endif

                        </tr>

                    @empty

                        <tr>
                            <td colspan="{{ auth()->user()->role == 'Admin' ? 6 : 5 }}"
                                class="text-center py-4 text-muted">

                                <i class="bi bi-people fs-1 d-block mb-2"></i>

                                @if(!empty($search))
                                    Data siswa dengan pencarian
                                    "<strong>{{ $search }}</strong>"
                                    tidak ditemukan.
                                @else
                                    Belum ada data siswa yang ditambahkan.
                                @endif

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        @if($siswa->hasPages())
            <div class="mt-4">
                {{ $siswa->appends(['search' => $search ?? ''])->links() }}
            </div>
        @endif

    </div>

</div>


</div>

@endsection
