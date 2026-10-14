@extends('layouts.landing')

@section('content')

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                Informasi Sekolah
            </span>

            <h2 class="fw-bold mb-2">
                Pengumuman {{ $profil->nama_sekolah ?? 'Sekolah' }}
            </h2>

            <p class="text-muted mb-0">
                Informasi dan pengumuman terbaru dari sekolah.
            </p>
        </div>

        <div class="row g-4">
            @forelse($pengumuman as $item)
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 flex-shrink-0">
                                    <i class="bi bi-megaphone-fill fs-4"></i>
                                </div>

                                <div class="flex-grow-1 d-flex flex-column">
                                    <h5 class="fw-bold text-dark mb-2">
                                        {{ $item->judul }}
                                    </h5>

                                    @if($item->tanggal)
                                        <div class="text-secondary small mb-3">
                                            <i class="bi bi-calendar3 me-2 text-primary"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                        </div>
                                    @endif

                                    <p class="text-secondary mb-4">
                                        {{ \Illuminate\Support\Str::limit($item->isi ?? $item->deskripsi ?? '', 140) }}
                                    </p>

                                    <div class="mt-auto">
                                        <a href="{{ route('landing.pengumuman.detail', $item->slug) }}"
                                           class="text-primary text-decoration-none fw-semibold">
                                            Baca Selengkapnya
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-megaphone fs-1 text-secondary"></i>
                        <h5 class="fw-semibold mt-3">Belum Ada Pengumuman</h5>
                        <p class="text-muted mb-0">
                            Informasi dan pengumuman sekolah belum tersedia.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
