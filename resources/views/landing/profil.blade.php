@extends('layouts.landing')


@section('content')

<section class="py-5 bg-light">
    <div class="container py-lg-4">

        <div class="text-center mb-5">
            @if (!empty($profil->logo))
                <img src="{{ asset('storage/' . $profil->logo) }}"
                    alt="Logo {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                    width="80"
                    height="80"
                    class="object-fit-contain mb-3">
            @endif

            <div class="small fw-semibold text-primary text-uppercase mb-2">
                Profil Sekolah
            </div>

            <h1 class="fw-bold text-dark mb-2">
                {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
            </h1>

            <p class="text-secondary mb-0">
                Mengenal lebih dekat profil dan informasi sekolah.
            </p>
        </div>

        <div class="row align-items-center g-5 mb-5">

            <div class="col-lg-6">
                @if (!empty($profil->foto))
                    <img src="{{ asset('storage/' . $profil->foto) }}"
                        alt="{{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        class="img-fluid w-100 rounded-4 object-fit-cover"
                        style="height: 430px;">
                @else
                    <img src="{{ asset('assets/images/sekolah.png') }}"
                        alt="{{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        class="img-fluid w-100 rounded-4 object-fit-cover"
                        style="height: 430px;">
                @endif
            </div>

            <div class="col-lg-6">
                <div class="ps-lg-3">

                    <div class="small fw-semibold text-primary text-uppercase mb-2">
                        Tentang Sekolah
                    </div>

                    <h2 class="fw-bold text-dark mb-3">
                        {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                    </h2>

                    @if (!empty($profil->deskripsi))
                        <p class="text-secondary lh-lg mb-4">
                            {{ $profil->deskripsi }}
                        </p>
                    @endif

                    <div class="border-top pt-4">

                        <div class="row g-4">

                            @if (!empty($profil->kepala_sekolah))
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="text-primary fs-4">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">
                                                Kepala Sekolah
                                            </small>
                                            <div class="fw-semibold text-dark">
                                                {{ $profil->kepala_sekolah }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($profil->tahun_berdiri))
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="text-primary fs-4">
                                            <i class="bi bi-calendar3"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">
                                                Tahun Berdiri
                                            </small>
                                            <div class="fw-semibold text-dark">
                                                {{ $profil->tahun_berdiri }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($profil->npsn))
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="text-primary fs-4">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">
                                                NPSN
                                            </small>
                                            <div class="fw-semibold text-dark">
                                                {{ $profil->npsn }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($profil->kontak))
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="text-primary fs-4">
                                            <i class="bi bi-telephone"></i>
                                        </div>
                                        <div>
                                            <small class="text-secondary d-block mb-1">
                                                Kontak
                                            </small>
                                            <div class="fw-semibold text-dark">
                                                {{ $profil->kontak }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

        </div>

        @if (!empty($profil->alamat))
            <div class="mb-5">
                <div class="border-top pt-5">

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="text-primary fs-3">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div>
                            <div class="small fw-semibold text-primary text-uppercase">
                                Lokasi Sekolah
                            </div>

                            <h4 class="fw-bold text-dark mb-0">
                                Alamat Sekolah
                            </h4>
                        </div>
                    </div>

                    <p class="text-secondary lh-lg mb-0">
                        {{ $profil->alamat }}
                    </p>

                </div>
            </div>
        @endif

        @if (!empty($profil->visi_misi))
            <div class="mb-4">
                <div class="border-top pt-5">

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="text-primary fs-3">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <div>
                            <div class="small fw-semibold text-primary text-uppercase">
                                Arah Pendidikan
                            </div>

                            <h4 class="fw-bold text-dark mb-0">
                                Visi & Misi
                            </h4>
                        </div>
                    </div>

                    <div class="text-secondary lh-lg">
                        {!! nl2br(e($profil->visi_misi)) !!}
                    </div>

                </div>
            </div>
        @endif

    </div>
</section>

@endsection
 