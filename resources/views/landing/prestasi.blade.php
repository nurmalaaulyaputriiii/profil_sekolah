@extends('layouts.landing')

@section('content')

<style>
    .prestasi-card {
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .prestasi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(36, 69, 143, .15) !important;
    }

    .prestasi-foto-wrapper {
        height: 250px;
        overflow: hidden;
        background: #f5f7fb;
    }

    .prestasi-foto {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .5s ease;
    }

    .prestasi-card:hover .prestasi-foto {
        transform: scale(1.06);
    }

    .prestasi-link {
        color: #24458f;
        transition: color .3s ease;
    }

    .prestasi-link i {
        display: inline-block;
        transition: transform .3s ease;
    }

    .prestasi-card:hover .prestasi-link {
        color: #17213b;
    }

    .prestasi-card:hover .prestasi-link i {
        transform: translateX(5px);
    }
</style>

<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
            Prestasi
        </span>

        <h2 class="fw-bold mb-2" style="color:#17213b;">
            Prestasi {{ $profil->nama_sekolah ?? 'Sekolah' }}
        </h2>

        <p class="text-muted">
            Berbagai pencapaian dan prestasi yang telah diraih oleh siswa.
        </p>
    </div>

    <div class="row g-4">
        @forelse($prestasi as $item)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card prestasi-card border-0 shadow-sm rounded-4 h-100 overflow-hidden">

                    @if($item->foto)
                        <div class="prestasi-foto-wrapper">
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 class="prestasi-foto"
                                 alt="{{ $item->nama_prestasi }}"
                                 loading="lazy">
                        </div>
                    @else
                        <div class="prestasi-foto-wrapper d-flex align-items-center justify-content-center">
                            <div class="text-center text-secondary">
                                <i class="bi bi-trophy text-primary" style="font-size:4rem;"></i>
                                <p class="small mt-2 mb-0">Foto belum tersedia</p>
                            </div>
                        </div>
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <small class="text-primary fw-semibold mb-2">
                            <i class="bi bi-calendar-event me-1"></i>
                            {{ $item->tahun_ajaran ?? '-' }}
                        </small>

                        <h5 class="fw-bold text-dark mb-2">
                            {{ $item->nama_prestasi }}
                        </h5>

                        <p class="text-secondary small mb-4">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}
                        </p>

                        <a href="{{ route('landing.prestasi.detail', $item->slug) }}"
                           class="prestasi-link text-decoration-none fw-semibold mt-auto">
                            Lihat Selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-trophy fs-1 text-muted"></i>
                <p class="text-muted mt-3 mb-0">
                    Belum ada data prestasi.
                </p>
            </div>
        @endforelse
    </div>
</div>

@endsection
