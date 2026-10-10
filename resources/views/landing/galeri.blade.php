@extends('layouts.landing')
@section('content')
<style>
    .galeri-card{transition:transform .3s ease,box-shadow .3s ease}
    .galeri-card:hover{transform:translateY(-7px);box-shadow:0 1rem 2rem rgba(36,69,143,.15)!important}
    .galeri-foto-wrapper{height:220px;overflow:hidden;background:#f5f7fb}
    .galeri-foto{width:100%;height:100%;object-fit:cover;object-position:center;transition:transform .5s ease}
    .galeri-card:hover .galeri-foto{transform:scale(1.05)}
    .galeri-link{color:#24458f;transition:color .3s ease}
    .galeri-link i{display:inline-block;transition:transform .3s ease}
    .galeri-card:hover .galeri-link{color:#17213b}
    .galeri-card:hover .galeri-link i{transform:translateX(5px)}
</style>
<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">Dokumentasi</span>
        <h2 class="fw-bold mb-2">Galeri {{ $profil->nama_sekolah ?? 'Sekolah' }}</h2>
        <p class="text-muted mb-0">Dokumentasi kegiatan dan aktivitas sekolah.</p>
    </div>
    <div class="row g-4">
        @forelse($galeri as $item)
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="galeri-card card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                    @if($item->file)
                        <div class="galeri-foto-wrapper">
                            @if($item->kategori == 'Foto')
                                <img src="{{ asset('storage/' . $item->file) }}" class="galeri-foto" alt="{{ $item->judul }}" loading="lazy">
                            @else
                                <video class="galeri-foto" controls preload="metadata">
                                    <source src="{{ asset('storage/' . $item->file) }}">
                                    Browser kamu tidak mendukung video.
                                </video>
                            @endif
                        </div>
                    @else
                        <div class="galeri-foto-wrapper d-flex align-items-center justify-content-center">
                            <i class="bi bi-images fs-1 text-secondary"></i>
                        </div>
                    @endif
                    <div class="card-body p-3 d-flex flex-column">
                        <h6 class="fw-bold mb-3">{{ $item->judul }}</h6>
                        <div class="small text-secondary mb-3">
                            <i class="bi bi-calendar3 me-2 text-primary"></i>
                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d F Y') : '-' }}
                        </div>
                        <div class="mt-auto">
                            <a href="{{ route('landing.galeri.detail', \Illuminate\Support\Facades\Crypt::encryptString($item->id_galeri)) }}" class="galeri-link text-decoration-none fw-semibold">
                                Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-images fs-1 text-secondary mb-3 d-block"></i>
                    <h5 class="fw-semibold">Belum Ada Galeri</h5>
                    <p class="text-muted mb-0">Belum ada dokumentasi kegiatan sekolah.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
