@extends('layouts.landing')
@section('content')
<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <div class="bg-white rounded-4 shadow-sm p-4 p-lg-5">
            <div class="row g-5">
                <div class="col-lg-2">
                    <div class="rounded-4 d-flex align-items-center justify-content-center mx-auto" style="width:110px;height:110px;background:#eef3ff;color:#24458f;">
                        <i class="bi bi-megaphone-fill" style="font-size:3rem;"></i>
                    </div>
                </div>
                <div class="col-lg-10">
                    <span class="text-primary fw-semibold text-uppercase small">Informasi Sekolah</span>
                    <h1 class="fw-bold text-dark mt-2 mb-3">{{ $pengumuman->judul }}</h1>
                    @if (!empty($pengumuman->tanggal))
                        <p class="text-primary fw-semibold mb-4">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}
                        </p>
                    @endif
                    <div class="border-top pt-4">
                        <p class="text-secondary lh-lg mb-0">{!! nl2br(e($pengumuman->isi)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
