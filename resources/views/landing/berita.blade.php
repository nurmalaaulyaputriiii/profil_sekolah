@extends('layouts.landing')

@section('content')

<style>
    .berita-card {
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .berita-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(36, 69, 143, .15) !important;
    }

    .berita-foto-wrapper {
        height: 250px;
        overflow: hidden;
        background: #f5f7fb;
    }

    .berita-foto {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .5s ease;
    }

    .berita-card:hover .berita-foto {
        transform: scale(1.06);
    }

    .berita-link {
        color: #24458f;
        transition: color .3s ease;
    }

    .berita-link i {
        display: inline-block;
        transition: transform .3s ease;
    }

    .berita-card:hover .berita-link {
        color: #17213b;
    }

    .berita-card:hover .berita-link i {
        transform: translateX(5px);
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
            Informasi
        </span>

        <h2 class="fw-bold mb-2" style="color:#17213b;">
            Berita {{ $profil->nama_sekolah ?? 'Sekolah' }}
        </h2>

        <p class="text-muted">
            Informasi dan berita terbaru dari sekolah.
        </p>
    </div>

    <div class="row g-4">
        @forelse($berita as $item)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card berita-card border-0 shadow-sm rounded-4 h-100 overflow-hidden">

                    @if($item->gambar)
                        <div class="berita-foto-wrapper">
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                 class="berita-foto"
                                 alt="{{ $item->judul }}"
                                 loading="lazy">
                        </div>
                    @else
                        <div class="berita-foto-wrapper d-flex align-items-center justify-content-center">
                            <div class="text-center text-secondary">
                                <i class="bi bi-newspaper" style="font-size:4rem;"></i>
                                <p class="small mt-2 mb-0">Gambar belum tersedia</p>
                            </div>
                        </div>
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-secondary small mb-3">
                            <i class="bi bi-calendar3 me-2 text-primary"></i>
                            {{ $item->tanggal ? $item->tanggal->format('d F Y') : '-' }}
                        </div>

                        <h5 class="fw-bold text-dark mb-3">
                            {{ $item->judul }}
                        </h5>

                        <p class="text-secondary small mb-4">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                        </p>

                        <a href="{{ route('landing.berita.detail', $item->slug) }}"
                           class="berita-link text-decoration-none fw-semibold mt-auto">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-newspaper fs-1 text-muted"></i>
                <p class="text-muted mt-3 mb-0">
                    Belum ada berita.
                </p>
            </div>
        @endforelse
    </div>
</div>

@endsection
