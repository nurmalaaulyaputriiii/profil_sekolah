@extends('layouts.landing')
@section('title', $galeri->judul . ' - ' . ($profil->nama_sekolah ?? 'Profil Sekolah'))
@section('content')
<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <article class="bg-white rounded-4 shadow-sm overflow-hidden">
            <div class="p-3 p-lg-4 pb-0">
                @if (!empty($galeri->file))
                    @if ($galeri->kategori === 'Video')
                        <video class="w-100 rounded-4" style="height:500px; object-fit:cover;" controls>
                            <source src="{{ asset('storage/' . $galeri->file) }}">
                            Browser Anda tidak mendukung pemutaran video.
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $galeri->file) }}" alt="{{ $galeri->judul }}" class="w-100 rounded-4 object-fit-cover" style="height:500px;">
                    @endif
                @else
                    <div class="w-100 rounded-4 bg-light d-flex align-items-center justify-content-center" style="height:500px;">
                        <i class="bi bi-images text-secondary" style="font-size:6rem;"></i>
                    </div>
                @endif
            </div>
            <div class="p-4 p-lg-5">
                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                    @if (!empty($galeri->kategori))
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="bi {{ $galeri->kategori === 'Video' ? 'bi-play-circle' : 'bi-image' }} me-1"></i>
                            {{ $galeri->kategori }}
                        </span>
                    @endif
                    @if (!empty($galeri->tanggal))
                        <span class="text-primary fw-semibold">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                        </span>
                    @endif
                </div>
                <h1 class="fw-bold text-dark mb-4" style="font-size:clamp(2rem, 4vw, 3rem); line-height:1.2;">
                    {{ $galeri->judul }}
                </h1>
                <div class="border-top mb-4"></div>
                @if (!empty($galeri->keterangan))
                    <div class="text-secondary lh-lg" style="font-size:1.05rem;">
                        {!! nl2br(e($galeri->keterangan)) !!}
                    </div>
                @endif
            </div>
        </article>
    </div>
</section>
@endsection
