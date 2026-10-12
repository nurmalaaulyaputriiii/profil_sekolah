@extends('layouts.landing')

@section('title', 'Data Siswa')

@section('content')
<section id="siswa" class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="text-uppercase fw-semibold small" style="color:#24458f;">Data Peserta Didik</span>
            <h2 class="fw-bold mt-2">Daftar Siswa</h2>
            <p class="text-secondary mb-0">Data siswa {{ $profil->nama_sekolah ?? 'sekolah' }}.</p>
        </div>

        <div class="bg-white rounded-4 shadow-sm overflow-hidden">
            <div class="p-4 border-bottom">
                <h5 class="fw-bold mb-1">Data Siswa</h5>
                <small class="text-secondary">Total {{ number_format($jumlahSiswa) }} siswa</small>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background:#24458f;color:white;">
                        <tr>
                            <th class="px-4 py-3">No.</th>
                            <th class="py-3">NISN</th>
                            <th class="py-3">Nama Siswa</th>
                            <th class="py-3">Jenis Kelamin</th>
                            <th class="py-3">Tahun Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <td class="px-4">{{ $siswa->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tahun_masuk }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-secondary">
                                    Belum ada data siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($siswa->hasPages())
                <div class="p-4 border-top d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <small class="text-secondary">
                        Menampilkan {{ $siswa->firstItem() }}–{{ $siswa->lastItem() }} dari {{ $siswa->total() }} siswa
                    </small>
                    {{ $siswa->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
