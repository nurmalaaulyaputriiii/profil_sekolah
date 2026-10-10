@extends('layouts.admin')

@section('content')

<style>
.profil-page {
    background: #f4f6f9;
    min-height: 100vh;
    padding: 25px 15px 50px;
}

.profil-container {
    width: 100%;
    max-width: 1150px;
    margin: 0 auto;
}

.profil-hero {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 25px;
    box-shadow: 0 1px 3px rgba(0,0,0,.05);
}

.profil-hero-content {
    display: grid;
    grid-template-columns: 1fr 320px;
    align-items: center;
    gap: 30px;
}

.profil-hero-text {
    min-width: 0;
}

.profil-hero-header {
    display: flex;
    align-items: center;
    gap: 15px;
}

.profil-logo-small {
    width: 65px;
    height: 65px;
    object-fit: contain;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 5px;
    flex-shrink: 0;
}

.profil-hero-label {
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.profil-hero-title {
    color: #1e293b;
    font-size: 28px;
    font-weight: 700;
    line-height: 1.2;
    margin: 0;
}

.profil-photo {
    width: 320px;
    height: 220px;
    border-radius: 10px;
    overflow: hidden;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
}

.profil-photo img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: contain;
}

.profil-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}

.profil-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 1px 3px rgba(0,0,0,.05);
    min-width: 0;
}

.profil-card-full {
    grid-column: 1 / -1;
}

.profil-card-title {
    color: #1e293b;
    font-size: 18px;
    font-weight: 700;
    margin: 0 0 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 8px;
}

.profil-card-text {
    color: #475569;
    font-size: 14px;
    line-height: 1.7;
    margin: 0;
    white-space: pre-line;
    word-break: break-word;
}

.profil-visi {
    background: #f8fafc;
    border-left: 4px solid #3b82f6;
    border-radius: 6px;
    padding: 18px;
    color: #334155;
    font-size: 14px;
    line-height: 1.8;
    white-space: pre-line;
    word-break: break-word;
}

.profil-contact-label {
    color: #94a3b8;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .5px;
    text-transform: uppercase;
    margin-bottom: 3px;
}

.profil-contact-value {
    color: #334155;
    font-size: 14px;
    font-weight: 500;
    word-break: break-word;
}

@media (max-width: 992px) {
    .profil-hero-content {
        grid-template-columns: 1fr 260px;
        gap: 20px;
    }

    .profil-photo {
        width: 260px;
        height: 200px;
    }
}

@media (max-width: 768px) {
    .profil-page {
        padding: 15px 10px 30px;
    }

    .profil-hero {
        padding: 20px;
    }

    .profil-hero-content {
        grid-template-columns: 1fr;
    }

    .profil-photo {
        width: 100%;
        height: 220px;
    }

    .profil-grid {
        grid-template-columns: 1fr;
    }

    .profil-card-full {
        grid-column: 1;
    }
}
</style>

<div class="profil-page">
    <div class="profil-container">

        <div class="d-flex justify-content-end mb-3">
            @if($profil)
                <a href="{{ route('admin.profil.edit') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                    <i class="bi bi-pencil-square me-1"></i>
                    Edit Profil
                </a>
            @else
                <a href="{{ route('admin.profil.edit') }}" class="btn btn-success btn-sm px-3 shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i>
                    Tambah Profil
                </a>
            @endif
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($profil)

            {{-- HEADER PROFIL --}}
            <div class="profil-hero">
                <div class="profil-hero-content">

                    <div class="profil-hero-text">
                        <div class="profil-hero-header">

                            @if(!empty($profil->logo))
                                <img src="{{ asset('storage/' . $profil->logo) }}"
                                     alt="Logo Sekolah"
                                     class="profil-logo-small">
                            @endif

                            <div>
                                <div class="profil-hero-label">
                                    Profil Sekolah
                                </div>

                                <h1 class="profil-hero-title">
                                    {{ $profil->nama_sekolah }}
                                </h1>
                            </div>

                        </div>
                    </div>

                    <div class="profil-photo shadow-sm">
                        <img src="{{ !empty($profil->foto) ? asset('storage/' . $profil->foto) : asset('assets/images/sekolah.png') }}"
                             alt="Foto Sekolah">
                    </div>

                </div>
            </div>

            <div class="profil-grid">
                <div class="profil-card">
                    <h2 class="profil-card-title">
                        <i class="bi bi-info-circle text-primary"></i>
                        Tentang Sekolah
                    </h2>

                    <p class="profil-card-text">
                        {{ $profil->deskripsi }}
                    </p>
                </div>

                <div class="profil-card">
                    <h2 class="profil-card-title">
                        <i class="bi bi-clock-history text-primary"></i>
                        Sejarah & Pimpinan
                    </h2>

                    <p class="profil-card-text mb-3">
                        {{ $profil->nama_sekolah }}
                        didirikan pada tahun
                        <strong>{{ $profil->tahun_berdiri }}</strong>.
                    </p>

                    <p class="profil-card-text">
                        Kepala sekolah saat ini dipimpin oleh
                        <strong>{{ $profil->kepala_sekolah }}</strong>.
                    </p>
                </div>

                <div class="profil-card profil-card-full">
                    <h2 class="profil-card-title">
                        <i class="bi bi-bullseye text-primary"></i>
                        Visi & Misi
                    </h2>

                    <div class="profil-visi">
                        {{ $profil->visi_misi }}
                    </div>
                </div>

                <div class="profil-card profil-card-full">
                    <h2 class="profil-card-title">
                        <i class="bi bi-geo-alt text-primary"></i>
                        Alamat & Kontak Resmi
                    </h2>

                    <div class="row mt-3">

                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="profil-contact-label">
                                Alamat Sekolah
                            </div>

                            <div class="profil-contact-value">
                                {{ $profil->alamat }}
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 mb-md-0">
                            <div class="profil-contact-label">
                                Kontak / Telepon
                            </div>

                            <div class="profil-contact-value">
                                {{ $profil->kontak }}
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="profil-contact-label">
                                NPSN
                            </div>

                            <div class="profil-contact-value">
                                {{ $profil->npsn }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        @else

            <div class="profil-card text-center py-5 shadow-sm">
                <div class="py-4">

                    <i class="bi bi-building text-primary" style="font-size: 60px;"></i>

                    <h4 class="fw-bold mt-3">
                        Profil Sekolah Belum Tersedia
                    </h4>

                    <p class="text-muted mt-2">
                        Silakan tambahkan data profil sekolah terlebih dahulu agar tampil di halaman ini.
                    </p>

                    <a href="{{ route('admin.profil.edit') }}" class="btn btn-primary mt-3 px-4">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Profil Sekolah
                    </a>

                </div>
            </div>

        @endif

    </div>
</div>

@endsection
