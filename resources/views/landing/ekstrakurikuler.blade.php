@extends('layouts.landing')

@section('content')

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                Kegiatan Siswa
            </span>

            <h2 class="fw-bold mb-2" style="color:#17213b;">
                Ekstrakurikuler {{ $profil->nama_sekolah ?? 'Sekolah' }}
            </h2>

            <p class="text-muted mb-0">
                Berbagai kegiatan ekstrakurikuler untuk mengembangkan minat, bakat, dan kreativitas siswa.
            </p>
        </div>

        <div class="row g-4">
            @forelse($ekstrakurikuler as $item)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                        @if($item->gambar)
                            <div style="height:250px; overflow:hidden; background:#f5f7fb;">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     class="w-100 h-100"
                                     style="object-fit:cover; object-position:center;"
                                     alt="{{ $item->nama_ekskul }}"
                                     loading="lazy">
                            </div>
                        @else
                            <div class="d-flex align-items-center justify-content-center"
                                 style="height:250px; background:#f5f7fb;">
                                <div class="text-center text-secondary">
                                    <i class="bi bi-people text-primary" style="font-size:4rem;"></i>
                                    <p class="small mt-2 mb-0">Foto belum tersedia</p>
                                </div>
                            </div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold text-dark mb-3">
                                {{ $item->nama_ekskul }}
                            </h5>

                            @if($item->pembina)
                                <p class="mb-2 text-secondary">
                                    <i class="bi bi-person me-2 text-primary"></i>
                                    {{ $item->pembina }}
                                </p>
                            @endif

                            @if($item->jadwal_latihan)
                                <p class="mb-3 text-secondary">
                                    <i class="bi bi-calendar3 me-2 text-primary"></i>
                                    {{ $item->jadwal_latihan }}
                                </p>
                            @endif

                            @if($item->deskripsi)
                                <p class="text-secondary small mb-4">
                                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 120) }}
                                </p>
                            @endif

                            <a href="{{ route('landing.ekstrakurikuler.detail', $item->slug) }}"
                               class="text-primary text-decoration-none fw-semibold mt-auto">
                                Lihat Selengkapnya
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-people fs-1 text-muted"></i>
                    <p class="text-muted mt-3 mb-0">
                        Belum ada data ekstrakurikuler.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
