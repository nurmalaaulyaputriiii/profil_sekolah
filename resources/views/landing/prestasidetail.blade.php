@extends('layouts.landing')
@section('title', $prestasi->nama_prestasi . ' - ' . ($profil->nama_sekolah ?? 'Profil Sekolah'))
@section('content')
<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                @if (!empty($prestasi->foto))
                    <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->nama_prestasi }}" class="w-100 rounded-4 object-fit-cover" style="height:480px;">
                @else
                    <div class="w-100 rounded-4 bg-white d-flex align-items-center justify-content-center" style="height:480px;">
                        <i class="bi bi-trophy text-secondary" style="font-size:6rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-lg-7">
                <span class="text-primary fw-semibold text-uppercase small">Prestasi Sekolah</span>
                <h1 class="fw-bold text-dark mt-2 mb-3">{{ $prestasi->nama_prestasi }}</h1>
                @if (!empty($prestasi->tahun_ajaran))
                    <p class="text-primary fw-semibold fs-5 mb-4">{{ $prestasi->tahun_ajaran }}</p>
                @endif
                <div class="border-top pt-4">
                    @if (!empty($prestasi->deskripsi))
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;background:#eef3ff;color:#24458f;">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1">Deskripsi Prestasi</small>
                                <p class="text-dark lh-lg mb-0">{{ $prestasi->deskripsi }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
