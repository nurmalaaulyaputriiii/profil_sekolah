<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 2 Singaparna</title>
    <meta name="author" content="SMAN 2 Singaparna">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo2.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        .sidebar-brand img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="sidebar-wrapper bg-dark" id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand text-decoration-none text-white">
            <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo">
            <span>SMAN 2 Singaparna</span>
        </a>
        <div class="flex-grow-1 overflow-y-auto">
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">MENU</div>
                <ul class="sidebar-menu-list">
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">MASTER DATA</div>
                <ul class="sidebar-menu-list">
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.guru.guru') }}" class="sidebar-menu-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                            <i class="bi bi-person-workspace"></i>
                            <span>Guru</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.siswa.siswa') }}" class="sidebar-menu-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                            <i class="bi bi-people-fill"></i>
                            <span>Siswa</span>
                        </a>
                    </li>
                    @if (session('role') == 'Admin')
                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.user.user') }}" class="sidebar-menu-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                                <i class="bi bi-person-gear"></i>
                                <span>Manajemen Pengguna</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">KESISWAAN</div>
                <ul class="sidebar-menu-list">
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.prestasi.prestasi') }}" class="sidebar-menu-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">
                            <i class="bi bi-award-fill"></i>
                            <span>Prestasi</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.ektrakurikuler.ektrakurikuler') }}" class="sidebar-menu-link {{ request()->routeIs('admin.ektrakurikuler.*') ? 'active' : '' }}">
                            <i class="bi bi-trophy-fill"></i>
                            <span>Ekstrakurikuler</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">PUBLIKASI</div>
                <ul class="sidebar-menu-list">
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.pengumuman.pengumuman') }}" class="sidebar-menu-link {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
                            <i class="bi bi-megaphone-fill"></i>
                            <span>Pengumuman</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.berita.berita') }}" class="sidebar-menu-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                            <i class="bi bi-newspaper"></i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.galeri.galeri') }}" class="sidebar-menu-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                            <i class="bi bi-images"></i>
                            <span>Galeri</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">PENGATURAN</div>
                <ul class="sidebar-menu-list">
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.profil.profil') }}" class="sidebar-menu-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                            <i class="bi bi-building-fill"></i>
                            <span>Profil Sekolah</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <header class="navbar-custom bg-white">
            <div class="navbar-left">
                <button class="sidebar-toggle-btn me-3" id="sidebar-toggle" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <button class="btn-desktop-toggle d-none d-xl-flex" id="desktop-sidebar-toggle" type="button">
                    <i class="bi bi-chevron-bar-left"></i>
                </button>
            </div>
            <div class="navbar-actions ms-auto">
                <div class="dropdown">
                    <button class="navbar-profile-btn dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            id="profile-dropdown">
                        <span class="navbar-profile-icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        {{-- NAMA USER LOGIN --}}
                        <span class="navbar-profile-name d-none d-md-inline">
                            {{ session('username', Auth::user()->username ?? 'Pengguna') }}
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile-dropdown">
                        {{-- INFORMASI USER --}}
                        <li class="dropdown-header">
                            <strong>
                                {{ session('username', Auth::user()->username ?? 'Pengguna') }}
                            </strong>
                            <br>
                            <small>
                                {{ session('role', Auth::user()->role ?? 'Pengguna') }}
                                Sekolah
                            </small>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.profil.profil') }}">
                                <i class="bi bi-building me-2"></i>
                                Profil Sekolah
                            </a>
                        </li>
                        @if (session('role') == 'Admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.user.user') }}">
                                    <i class="bi bi-people me-2"></i>
                                    Manajemen Pengguna
                                </a>
                            </li>
                        @endif
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>

{{--
landing
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
</html> --}}
