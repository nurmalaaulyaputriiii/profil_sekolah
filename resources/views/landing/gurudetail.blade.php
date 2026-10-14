@extends('layouts.landing')
@section('content')
<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                @if (!empty($guru->foto))
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="w-100 rounded-4 object-fit-cover" style="height:480px;">
                @else
                    <img src="{{ asset('assets/images/guru.png') }}" alt="{{ $guru->nama_guru }}" class="w-100 rounded-4 object-fit-cover" style="height:480px;">
                @endif
            </div>
            <div class="col-lg-7">
                <span class="text-primary fw-semibold text-uppercase small">Tenaga Pendidik</span>
                <h1 class="fw-bold text-dark mt-2 mb-3">{{ $guru->nama_guru }}</h1>
                @if (!empty($guru->mapel))
                    <p class="text-primary fw-semibold fs-5 mb-4">{{ $guru->mapel }}</p>
                @endif
                <div class="border-top pt-4">
                    @if (!empty($guru->nip))
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;background:#eef3ff;color:#24458f;">
                                <i class="bi bi-person-vcard-fill"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1">NIP</small>
                                <span class="fw-semibold text-dark">{{ $guru->nip }}</span>
                            </div>
                        </div>
                    @endif
                    @if (!empty($guru->mapel))
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width:48px;height:48px;background:#eef3ff;color:#24458f;">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <div>
                                <small class="text-secondary d-block mb-1">Mata Pelajaran</small>
                                <span class="fw-semibold text-dark">{{ $guru->mapel }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
