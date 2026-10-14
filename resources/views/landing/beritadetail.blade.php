@extends('layouts.landing')
@section('content')
<section class="py-5 bg-light">
    <div class="container py-lg-4">
        <article class="bg-white rounded-4 shadow-sm overflow-hidden">
            @if (!empty($berita->gambar))
                <div class="p-3 p-lg-4 pb-0">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100 rounded-4 object-fit-cover" style="height: 500px;">
                </div>
            @else
                <div class="p-3 p-lg-4 pb-0">
                    <div class="w-100 rounded-4 bg-light d-flex align-items-center justify-content-center" style="height: 500px;">
                        <i class="bi bi-newspaper text-secondary" style="font-size: 6rem;"></i>
                    </div>
                </div>
            @endif
            <div class="p-4 p-lg-5">
                @if (!empty($berita->tanggal))
                    <div class="mb-3">
                        <span class="text-primary fw-semibold">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                        </span>
                    </div>
                @endif
                <h1 class="fw-bold text-dark mb-4" style="font-size: clamp(2rem, 4vw, 3rem); line-height: 1.2;">
                    {{ $berita->judul }}
                </h1>
                <div class="border-top mb-4"></div>
                <div class="text-secondary lh-lg" style="font-size: 1.05rem;">
                    {!! nl2br(e($berita->isi)) !!}
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
