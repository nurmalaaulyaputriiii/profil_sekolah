<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo2.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $profil->nama_sekolah ?? 'Profil Sekolah')</title>
    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
</head>
<style>
    .navbar .nav-link.active { color: #24458f !important; }
</style>
<body class="bg-white d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container py-2">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ url('/') }}">
            @if (!empty($profil?->logo))
                <img src="{{ asset('storage/' . $profil->logo) }}" alt="{{ $profil->nama_sekolah ?? 'Sekolah' }}" width="55" height="55" class="object-fit-contain">
            @else
                <i class="bi bi-buildings-fill fs-1" style="color:#24458f;"></i>
            @endif
            <div>
                <div class="fw-bold fs-5" style="color:#24458f;">{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</div>
                <div class="small text-secondary">SEKOLAH UNGGUL DAN BERPRESTASI</div>
            </div>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLanding" aria-controls="navbarLanding" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-2" style="color:#24458f;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarLanding">
        <ul class="navbar-nav ms-auto align-items-lg-center">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link fw-semibold px-3 {{ request()->is('/') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.profil') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.profil*') ? 'active' : '' }}">
                    Profil
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.guru') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.guru*') ? 'active' : '' }}">
                    Guru &amp; Staf
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.prestasi') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.prestasi*') ? 'active' : '' }}">
                    Prestasi
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.ekstrakurikuler') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.ekstrakurikuler*') ? 'active' : '' }}">
                    Ekstrakurikuler
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.berita') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.berita*') ? 'active' : '' }}">
                    Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.galeri') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.galeri*') ? 'active' : '' }}">
                    Galeri
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.pengumuman') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.pengumuman*') ? 'active' : '' }}">
                    Pengumuman
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('landing.siswa') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.siswa*') ? 'active' : '' }}">
                    Siswa
                </a>
            </li>
            <li class="nav-item">
    <a href="{{ route('landing.profil-saya') }}" class="nav-link fw-semibold px-3 {{ request()->routeIs('landing.profil-saya') ? 'active' : '' }}">
        Profil Saya
    </a>
</li>
        </ul>
        </div>
    </div>
</nav>
<main class="flex-grow-1">
    @yield('content')
</main>
<footer class="text-white mt-5" style="background:#24458f;">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo SMAN 2 Singaparna" width="60" height="60" class="object-fit-contain flex-shrink-0">
                    <h4 class="fw-bold mb-0">{{ $profil?->nama_sekolah ?? 'SMAN 2 Singaparna' }}</h4>
                </div>
                <p class="text-white-50 lh-lg mb-0">{{ $profil?->deskripsi ?? 'Lembaga pendidikan yang berkomitmen membentuk generasi berkarakter, kreatif, dan berprestasi.' }}</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4">TAUTAN PENTING</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-3"><a href="{{ route('landing') }}#profil" class="text-white-50 text-decoration-none">Profil Sekolah</a></li>
                    <li class="mb-3"><a href="{{ route('landing.guru') }}" class="text-white-50 text-decoration-none">Guru & Staf</a></li>
                    <li class="mb-3"><a href="{{ route('landing.prestasi') }}" class="text-white-50 text-decoration-none">Prestasi</a></li>
                    <li class="mb-3"><a href="{{ route('landing.ekstrakurikuler') }}" class="text-white-50 text-decoration-none">Ekstrakurikuler</a></li>
                    <li class="mb-3"><a href="{{ route('landing.pengumuman') }}" class="text-white-50 text-decoration-none">Pengumuman</a></li>
                    <li><a href="{{ route('landing.berita') }}" class="text-white-50 text-decoration-none">Berita Terbaru</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4">HUBUNGI KAMI</h6>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="border border-secondary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;">
                        <i class="bi bi-geo-alt-fill text-white-50"></i>
                    </div>
                    <span class="text-white-50">{{ $profil?->alamat ?? 'Alamat sekolah belum tersedia.' }}</span>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="border border-secondary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;">
                        <i class="bi bi-telephone-fill text-white-50"></i>
                    </div>
                    <span class="text-white-50">{{ $profil?->kontak ?? 'Kontak sekolah belum tersedia.' }}</span>
                </div>
                @if(!empty($profil?->email))
                    <div class="d-flex align-items-center gap-3">
                        <div class="border border-secondary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width:38px;height:38px;">
                            <i class="bi bi-envelope-fill text-white-50"></i>
                        </div>
                        <a href="mailto:{{ $profil->email }}" class="text-white-50 text-decoration-none">{{ $profil->email }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="border-top border-secondary">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <span class="text-white-50 small">&copy; {{ date('Y') }} {{ $profil?->nama_sekolah ?? 'SMAN 2 Singaparna' }}. Hak Cipta Dilindungi.</span>
                <span class="text-white-50 small">Website Resmi {{ $profil?->nama_sekolah ?? 'SMAN 2 Singaparna' }}</span>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
