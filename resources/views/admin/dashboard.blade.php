@extends('layouts.admin')

@section('content')
<div class="dashboard-page">
    <div class="dashboard-hero mb-4">
        <div class="hero-content">
            <span class="hero-label">
                <i class="bi bi-grid-1x2-fill"></i>
                DASHBOARD ADMINISTRASI
            </span>
            <h2 class="hero-title">
                Selamat Datang, {{ session('username', Auth::user()->username ?? 'Pengguna') }} 👋
            </h2>
            <p class="hero-description">
                Kelola dan pantau seluruh informasi sekolah dengan mudah melalui dashboard.
            </p>
            <div class="hero-user">
                <div class="hero-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <span class="hero-user-name">
                        {{ session('username', Auth::user()->username ?? 'Pengguna') }}
                    </span>
                    <span class="hero-user-role">
                        {{ Auth::user()->role ?? 'Administrator' }}
                    </span>
                </div>
            </div>
        </div>
        <div class="hero-decoration">
            <span class="hero-circle"></span>
            <span class="hero-circle"></span>
            <i class="bi bi-mortarboard-fill hero-big-icon"></i>
        </div>
    </div>

    <div class="section-heading">
        <div>
            <h5>Ringkasan Data</h5>
            <p>Jumlah data yang tersedia di sistem</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/guru') }}" class="dashboard-stat stat-blue">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-person-workspace"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahGuru }}</div>
                <div class="stat-label">Data Guru</div>
                <div class="stat-bottom">
                    <span>Lihat data guru</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/siswa') }}" class="dashboard-stat stat-green">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahSiswa }}</div>
                <div class="stat-label">Data Siswa</div>
                <div class="stat-bottom">
                    <span>Lihat data siswa</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/user') }}" class="dashboard-stat stat-purple">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-person-gear"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahUser }}</div>
                <div class="stat-label">Manajemen Pengguna</div>
                <div class="stat-bottom">
                    <span>Kelola pengguna</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/prestasi') }}" class="dashboard-stat stat-orange">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-trophy-fill"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahPrestasi }}</div>
                <div class="stat-label">Prestasi</div>
                <div class="stat-bottom">
                    <span>Lihat prestasi</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/ektrakurikuler') }}" class="dashboard-stat stat-blue">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-dribbble"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahEkstrakurikuler }}</div>
                <div class="stat-label">Ekstrakurikuler</div>
                <div class="stat-bottom">
                    <span>Lihat ekstrakurikuler</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/pengumuman') }}" class="dashboard-stat stat-orange">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-megaphone-fill"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahPengumuman }}</div>
                <div class="stat-label">Pengumuman</div>
                <div class="stat-bottom">
                    <span>Lihat pengumuman</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/berita') }}" class="dashboard-stat stat-purple">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-newspaper"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahBerita }}</div>
                <div class="stat-label">Berita</div>
                <div class="stat-bottom">
                    <span>Lihat berita</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">
            <a href="{{ url('/galeri') }}" class="dashboard-stat stat-green">
                <div class="stat-top">
                    <div class="stat-icon"><i class="bi bi-images"></i></div>
                    <span class="stat-arrow"><i class="bi bi-arrow-up-right"></i></span>
                </div>
                <div class="stat-number">{{ $jumlahGaleri }}</div>
                <div class="stat-label">Galeri</div>
                <div class="stat-bottom">
                    <span>Lihat galeri</span>
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-xl-6">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <div class="panel-title-wrapper">
                        <div class="panel-icon blue">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <h6>Guru Terbaru</h6>
                    </div>
                    <a href="{{ url('/guru') }}" class="panel-link">Lihat Semua</a>
                </div>
                <div class="panel-body">
                    @forelse($guruTerbaru as $guru)
                        <div class="teacher-item">
                            <div class="teacher-photo">
                                @if($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}">
                                @else
                                    <i class="bi bi-person-fill"></i>
                                @endif
                            </div>
                            <div class="teacher-info">
                                <span class="teacher-name">{{ $guru->nama_guru }}</span>
                                <span class="teacher-mapel">{{ $guru->mapel ?: 'Mata pelajaran belum diisi' }}</span>
                            </div>
                            <span class="teacher-badge">Guru</span>
                        </div>
                    @empty
                        <div class="dashboard-empty">
                            <div class="empty-icon"><i class="bi bi-person-x"></i></div>
                            <p>Belum ada data guru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <div class="panel-title-wrapper">
                        <div class="panel-icon green">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h6>Akses Cepat</h6>
                    </div>
                </div>
                <div class="quick-grid">
                    <a href="{{ url('/guru') }}" class="quick-card">
                        <div class="quick-icon blue"><i class="bi bi-person-workspace"></i></div>
                        <span>Data Guru</span>
                        <i class="bi bi-chevron-right quick-arrow"></i>
                    </a>
                    <a href="{{ url('/siswa') }}" class="quick-card">
                        <div class="quick-icon green"><i class="bi bi-people-fill"></i></div>
                        <span>Data Siswa</span>
                        <i class="bi bi-chevron-right quick-arrow"></i>
                    </a>
                    <a href="{{ url('/prestasi') }}" class="quick-card">
                        <div class="quick-icon orange"><i class="bi bi-trophy-fill"></i></div>
                        <span>Prestasi</span>
                        <i class="bi bi-chevron-right quick-arrow"></i>
                    </a>
                    <a href="{{ url('/berita') }}" class="quick-card">
                        <div class="quick-icon purple"><i class="bi bi-newspaper"></i></div>
                        <span>Berita</span>
                        <i class="bi bi-chevron-right quick-arrow"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <div class="panel-title-wrapper">
                        <div class="panel-icon orange">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h6>Berita Terbaru</h6>
                    </div>
                    <a href="{{ url('/berita') }}" class="panel-link">Lihat Semua</a>
                </div>
                <div class="panel-body">
                    @forelse($beritaTerbaru as $index => $berita)
                        <div class="news-item">
                            <div class="news-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <div class="news-content">
                                <strong>{{ $berita->judul }}</strong>
                                <small>Berita sekolah terbaru</small>
                            </div>
                            <i class="bi bi-chevron-right news-arrow"></i>
                        </div>
                    @empty
                        <div class="dashboard-empty">
                            <div class="empty-icon"><i class="bi bi-newspaper"></i></div>
                            <p>Belum ada berita.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="dashboard-panel">
                <div class="panel-header">
                    <div class="panel-title-wrapper">
                        <div class="panel-icon orange">
                            <i class="bi bi-megaphone-fill"></i>
                        </div>
                        <h6>Pengumuman Terbaru</h6>
                    </div>
                    <a href="{{ url('/pengumuman') }}" class="panel-link">Lihat Semua</a>
                </div>
                <div class="panel-body">
                    @forelse($pengumumanTerbaru as $pengumuman)
                        <div class="announcement-item">
                            <div class="announcement-icon">
                                <i class="bi bi-megaphone-fill"></i>
                            </div>
                            <div class="announcement-content">
                                <strong>{{ $pengumuman->judul }}</strong>
                                <small>Pengumuman sekolah</small>
                            </div>
                            <i class="bi bi-chevron-right announcement-arrow"></i>
                        </div>
                    @empty
                        <div class="dashboard-empty">
                            <div class="empty-icon"><i class="bi bi-megaphone"></i></div>
                            <p>Belum ada pengumuman.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
