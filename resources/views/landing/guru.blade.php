@extends('layouts.landing')

@section('content')

<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
            Tenaga Pendidik
        </span>
        <h2 class="fw-bold mb-2" style="color:#17213b;">
            Guru {{ $profil->nama_sekolah ?? 'Sekolah' }}
        </h2>
        <p class="text-muted mb-0">
            Tenaga pendidik profesional yang siap mendampingi perkembangan siswa.
        </p>
    </div>

    <div class="row g-4">
        @forelse($guru as $dataGuru)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">

                    @if($dataGuru->foto)
                        <div style="height:350px; overflow:hidden; background:#f5f7fb;">
                            <img src="{{ asset('storage/' . $dataGuru->foto) }}"
                                 alt="{{ $dataGuru->nama_guru }}"
                                 class="w-100 h-100"
                                 style="object-fit:cover; object-position:center top;"
                                 loading="lazy">
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center"
                             style="height:350px; background:#f5f7fb;">
                            <div class="text-center text-secondary">
                                <i class="bi bi-person-circle" style="font-size:4rem;"></i>
                                <div class="small mt-2">Foto belum tersedia</div>
                            </div>
                        </div>
                    @endif

                    <div class="card-body p-4 d-flex flex-column">
                        <h5 class="fw-bold text-dark mb-2">
                            {{ $dataGuru->nama_guru }}
                        </h5>

                        <p class="text-primary fw-semibold mb-2">
                            {{ $dataGuru->mapel ?? 'Guru' }}
                        </p>

                        @if($dataGuru->nip)
                            <p class="text-secondary small mb-4">
                                NIP. {{ $dataGuru->nip }}
                            </p>
                        @else
                            <p class="text-secondary small mb-4">
                                Tenaga Pendidik
                            </p>
                        @endif

                        <a href="{{ route('landing.guru.detail', \Illuminate\Support\Facades\Crypt::encryptString($dataGuru->id_guru)) }}"
                           class="text-primary text-decoration-none fw-semibold mt-auto">
                            Lihat Selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-person-x fs-1 text-muted"></i>
                    <p class="text-muted mt-3 mb-0">
                        Belum ada data guru.
                    </p>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection
