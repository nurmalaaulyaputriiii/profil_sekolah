@extends('layouts.landing')

@section('title', $profil->nama_sekolah ?? 'Profil Sekolah')

@section('content')

<link href="{{ asset('assets/libs/aos-master/dist/aos.css') }}" rel="stylesheet">

<style>
.stat-item {
    background: white;
    min-height: 160px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
    color: #24458f;
    transition: none;
}
</style>

<section class="position-relative overflow-hidden" style="height:78vh;">
    <img src="{{ asset('assets/images/smandas.png') }}"
         alt="SMAN 2 Singaparna"
         class="position-absolute top-0 start-0 w-100 h-100"
         style="object-fit:cover;">
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background:linear-gradient(90deg,rgba(20,55,110,.85),rgba(20,55,110,.58),rgba(20,55,110,.20));">
    </div>
    <div class="container h-100 position-relative d-flex align-items-center">
        <div class="row">
            <div class="col-lg-8 col-xl-7 text-white">
                <div class="fw-bold mb-3"
                     data-aos="fade-up"
                     style="color:#ffb45c;font-size:17px;letter-spacing:.5px;">
                    SMAN 2 Singaparna
                </div>
                <h1 class="fw-bold lh-1 mb-4"
                    data-aos="fade-up"
                    data-aos-delay="150"
                    style="font-size:clamp(38px,4.5vw,58px);">
                    Mewujudkan Generasi Unggul, Berkarakter, dan Berprestasi
                </h1>
                <p class="text-white-50 lh-base mb-4"
                   data-aos="fade-up"
                   data-aos-delay="300"
                   style="font-size:18px;max-width:680px;">
                    SMAN 2 Singaparna berkomitmen menyelenggarakan pendidikan berkualitas untuk membentuk peserta didik yang berakhlak mulia, berprestasi, kreatif, mandiri, dan siap menghadapi tantangan masa depan.
                </p>
                <div data-aos="fade-up" data-aos-delay="450">
                    <a href="#profil"
                       class="btn btn-profil fw-bold px-4 py-3 rounded-3 text-white">
                        Profil Sekolah
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid px-2 px-md-3 position-relative" style="margin-top:-76px;z-index:5;">
    <div class="row g-0 overflow-hidden rounded-4 shadow">
        <div class="col-6 col-lg-3">
            <div class="stat-item text-center py-4 px-3 h-100"
                 data-aos="fade-up"
                 data-aos-delay="100">
                <div class="stat-content">
                    <div class="fw-bold display-6 mb-1">
                        {{ number_format($siswa) }}+
                    </div>
                    <div class="fs-5 fw-medium">
                        Siswa
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-item text-center py-4 px-3 h-100"
                 data-aos="fade-up"
                 data-aos-delay="200">
                <div class="stat-content">
                    <div class="fw-bold display-6 mb-1">
                        {{ number_format($jumlahGuru) }}+
                    </div>
                    <div class="fs-5 fw-medium">
                        Guru
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-item text-center py-4 px-3 h-100"
                 data-aos="fade-up"
                 data-aos-delay="300">
                <div class="stat-content">
                    <div class="fw-bold display-6 mb-1">
                        {{ number_format($jumlahPrestasi) }}+
                    </div>
                    <div class="fs-5 fw-medium">
                        Prestasi
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-item text-center py-4 px-3 h-100"
                 data-aos="fade-up"
                 data-aos-delay="400">
                <div class="stat-content">
                    <div class="fw-bold display-6 mb-1">
                        {{ number_format($jumlahEkstrakurikuler) }}+
                    </div>
                    <div class="fs-5 fw-medium">
                        Ekstrakurikuler
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="text-center">
                    <img src="{{ asset('assets/images/kpla.png') }}"
                         class="img-fluid rounded-4 shadow-sm"
                         style="width:100%; max-width:430px; height:auto; max-height:520px; object-fit:contain; object-position:center;"
                         alt="Kepala Sekolah SMAN 2 Singaparna">
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="150">
                <span class="fw-semibold text-uppercase small"
                      style="color:#24458f;"
                      data-aos="fade-down" data-aos-delay="250">
                    Sambutan
                </span>

                <h2 class="fw-bold mt-2 mb-4"
                    style="color:#17213b;"
                    data-aos="fade-up" data-aos-delay="300">
                    Sambutan Kepala Sekolah
                </h2>

                <p class="text-secondary lh-lg mb-3"
                   data-aos="fade-up" data-aos-delay="400">
                    Selamat datang di website resmi SMAN 2 Singaparna.
                    Puji dan syukur kita panjatkan ke hadirat Allah SWT atas
                    terwujudnya website resmi SMAN 2 Singaparna ini. Media digital
                    ini hadir sebagai sarana informasi, komunikasi, dan silaturahmi
                    bagi seluruh warga sekolah, orang tua, alumni, serta masyarakat luas.
                </p>

                <p class="text-secondary lh-lg mb-3"
                   data-aos="fade-up" data-aos-delay="450">
                    Di era digital ini, SMAN 2 Singaparna berkomitmen untuk terus
                    beradaptasi dan memberikan pelayanan pendidikan terbaik. Kami
                    fokus membentuk generasi yang tidak hanya unggul secara akademik
                    dan menguasai teknologi, tetapi juga memiliki karakter luhur
                    serta iman yang kokoh.
                </p>

                <p class="text-secondary lh-lg mb-4"
                   data-aos="fade-up" data-aos-delay="500">
                    Melalui website ini, kami berharap masyarakat dapat dengan mudah
                    mengakses informasi mengenai program, prestasi, dan perkembangan
                    sekolah. Kami juga terbuka menerima kritik dan saran yang
                    membangun demi kemajuan SMAN 2 Singaparna.
                </p>

                <p class="text-secondary lh-lg mb-4"
                   data-aos="fade-up" data-aos-delay="550">
                    Terima kasih atas kepercayaan dan dukungan yang diberikan kepada
                    kami. Mari bersama-sama bersinergi demi mengantarkan putra-putri
                    kita menuju masa depan yang gemilang. Semoga website ini dapat
                    menjadi sarana komunikasi yang baik antara sekolah, siswa,
                    orang tua, dan masyarakat.
                </p>

                <div data-aos="fade-up" data-aos-delay="600">
                    <h5 class="fw-bold mb-1" style="color:#17213b;">
                        {{ $profil->kepala_sekolah ?? 'Kepala Sekolah' }}
                    </h5>
                    <p class="text-secondary mb-0">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="profil" class="py-5" style="background:#f7f8fa;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">Profil Sekolah</span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">
                Tentang {{ $profil->nama_sekolah ?? 'Sekolah' }}
            </h2>
            <p class="text-secondary mb-0">Mengenal lebih dekat sekolah kami.</p>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                @if(!empty($profil->foto))
                    <img src="{{ asset('storage/' . $profil->foto) }}" class="img-fluid rounded-4 shadow-sm w-100" style="height:400px;object-fit:cover;" alt="{{ $profil->nama_sekolah }}">
                @else
                    <img src="{{ asset('assets/images/sekolah.png') }}" class="img-fluid rounded-4 shadow-sm w-100" style="height:400px;object-fit:cover;" alt="Sekolah">
                @endif
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <h3 class="fw-bold mb-3" style="color:#17213b;" data-aos="fade-up" data-aos-delay="300">
                    {{ $profil->nama_sekolah ?? 'Sekolah' }}
                </h3>

                <p class="text-secondary lh-lg" data-aos="fade-up" data-aos-delay="400">
                    {{ $profil->deskripsi ?? 'Informasi profil sekolah belum tersedia.' }}
                </p>

                <div class="row g-3 mt-4">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                            <small class="text-secondary d-block mb-1">Kepala Sekolah</small>
                            <div class="fw-semibold" style="color:#17213b;">
                                {{ $profil->kepala_sekolah ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                            <small class="text-secondary d-block mb-1">Tahun Berdiri</small>
                            <div class="fw-semibold" style="color:#17213b;">
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="700">
                        <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                            <small class="text-secondary d-block mb-1">NPSN</small>
                            <div class="fw-semibold" style="color:#17213b;">
                                {{ $profil->npsn ?? '-' }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="800">
                        <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                            <small class="text-secondary d-block mb-1">Kontak</small>
                            <div class="fw-semibold" style="color:#17213b;">
                                {{ $profil->kontak ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="guru" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">
                Tenaga Pendidik
            </span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">
                Guru {{ $profil->nama_sekolah ?? 'Sekolah' }}
            </h2>
            <p class="text-secondary mb-0">
                Guru dan tenaga pendidik yang mendukung proses pembelajaran.
            </p>
        </div>

        @php
            $guruChunks = $guru->chunk(3);
        @endphp

        <div id="guruCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($guruChunks as $index => $guruChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($guruChunk as $cardIndex => $dataGuru)
                                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="{{ ($cardIndex + 1) * 100 }}">
                                    <div class="bg-white rounded-4 shadow-sm overflow-hidden h-100 card-hover">
                                        @if($dataGuru->foto)
                                            <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden" style="height:320px;">
                                                <img
                                                    src="{{ asset('storage/' . $dataGuru->foto) }}"
                                                    class="w-100 h-100"
                                                    style="object-fit:contain;object-position:center;pointer-events:none;"
                                                    alt="{{ $dataGuru->nama_guru }}"
                                                    loading="lazy"
                                                    draggable="false"
                                                >
                                            </div>
                                        @else
                                            <div class="bg-light d-flex flex-column align-items-center justify-content-center text-secondary" style="height:320px;">
                                                <i class="bi bi-person-circle" style="font-size:4rem;"></i>
                                                <span class="small mt-2">Foto Guru Belum Tersedia</span>
                                            </div>
                                        @endif

                                        <div class="p-4">
                                            <h5 class="fw-bold mb-2" style="color:#17213b;">
                                                {{ $dataGuru->nama_guru }}
                                            </h5>
                                            <p class="text-primary small mb-1">
                                                <i class="bi bi-book me-1"></i>
                                                {{ $dataGuru->mapel ?? '-' }}
                                            </p>
                                            <p class="text-secondary small mb-0">
                                                <i class="bi bi-person-vcard me-1"></i>
                                                NIP: {{ $dataGuru->nip ?? '-' }}
                                            </p>
                                            <div class="mt-3">
                                                <a
                                                    href="{{ route('landing.guru.detail', ['id' => \Illuminate\Support\Facades\Crypt::encryptString((string) $dataGuru->id_guru)]) }}"
                                                    class="guru-detail-link text-primary fw-semibold small text-decoration-none"
                                                >
                                                    Lihat Selengkapnya
                                                    <span class="ms-1">→</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="bi bi-people text-secondary" style="font-size:3rem;"></i>
                        <p class="text-secondary mt-3 mb-0">
                            Belum ada data guru.
                        </p>
                    </div>
                @endforelse
            </div>

            @if($guruChunks->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#guruCarousel" data-bs-slide="prev" aria-label="Guru sebelumnya" style="width:5%;">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#guruCarousel" data-bs-slide="next" aria-label="Guru berikutnya" style="width:5%;">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                </button>
            @endif
        </div>

        <div class="text-end mt-4" data-aos="fade-left">
            <a href="{{ route('landing.guru') }}" class="btn btn-outline-primary rounded-pill px-4">
                Tampilkan Semua Guru
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<section id="prestasi" class="py-5" style="background:#f7f8fa;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">Pencapaian</span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">
                Prestasi {{ $profil->nama_sekolah ?? 'Sekolah' }}
            </h2>
            <p class="text-secondary mb-0">
                Berbagai pencapaian yang telah diraih oleh sekolah dan siswa.
            </p>
        </div>
        @php
            $prestasiChunks = $prestasi->chunk(3);
        @endphp
        <div id="prestasiCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($prestasiChunks as $index => $prestasiChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($prestasiChunk as $cardIndex => $dataPrestasi)
                                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="{{ ($cardIndex + 1) * 100 }}">
                                    <div class="bg-white rounded-4 shadow-sm overflow-hidden h-100 card-hover d-flex flex-column">
                                        @if($dataPrestasi->foto)
                                            <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden" style="height:320px;">
                                                <img
                                                    src="{{ asset('storage/' . $dataPrestasi->foto) }}"
                                                    class="w-100 h-100"
                                                    style="object-fit:contain;object-position:center;pointer-events:none;"
                                                    alt="{{ $dataPrestasi->nama_prestasi }}"
                                                    loading="lazy"
                                                    draggable="false"
                                                >
                                            </div>
                                        @else
                                            <div class="bg-light d-flex flex-column align-items-center justify-content-center text-secondary" style="height:320px;">
                                                <i class="bi bi-trophy" style="font-size:4rem;"></i>
                                                <span class="small mt-2">Foto Prestasi Belum Tersedia</span>
                                            </div>
                                        @endif
                                        <div class="p-4 d-flex flex-column flex-grow-1">
                                            <div class="mb-3">
                                                <span class="badge rounded-pill px-3 py-2" style="background:#eef3ff;color:#24458f;">
                                                    {{ $dataPrestasi->tahun_ajaran ?? 'Prestasi' }}
                                                </span>
                                            </div>
                                            <h5 class="fw-bold mb-2" style="color:#17213b;">
                                                {{ $dataPrestasi->nama_prestasi }}
                                            </h5>
                                            <p class="text-secondary small lh-lg mb-0">
                                                {{ \Illuminate\Support\Str::limit($dataPrestasi->deskripsi ?? '', 120) }}
                                            </p>
                                            <div class="mt-auto pt-3">
                                                <a
                                                    href="{{ route('landing.prestasi.detail', $dataPrestasi->slug) }}"
                                                    class="text-primary fw-semibold small text-decoration-none"
                                                >
                                                    Lihat Selengkapnya
                                                    <span class="ms-1">→</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5" data-aos="fade-up">
                        <i class="bi bi-trophy text-secondary" style="font-size:3rem;"></i>
                        <p class="text-secondary mt-3 mb-0">Belum ada data prestasi.</p>
                    </div>
                @endforelse
            </div>
            @if($prestasiChunks->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#prestasiCarousel" data-bs-slide="prev" aria-label="Prestasi sebelumnya" style="width:5%;">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#prestasiCarousel" data-bs-slide="next" aria-label="Prestasi berikutnya" style="width:5%;">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                </button>
            @endif
        </div>
        <div class="text-end mt-4" data-aos="fade-left">
            <a href="{{ route('landing.prestasi') }}" class="btn btn-outline-primary rounded-pill px-4">
                Tampilkan Semua Prestasi
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<section id="ekstrakurikuler" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">Kegiatan Siswa</span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">
                Ekstrakurikuler {{ $profil->nama_sekolah ?? 'Sekolah' }}
            </h2>
            <p class="text-secondary mb-0">
                Berbagai kegiatan untuk mengembangkan minat, bakat, dan kreativitas siswa.
            </p>
        </div>
        @php
            $ekskulChunks = $ekstrakurikuler->chunk(3);
        @endphp
        <div id="ekskulCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($ekskulChunks as $index => $ekskulChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($ekskulChunk as $cardIndex => $dataEkskul)
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($cardIndex + 1) * 100 }}">
                                    <div class="bg-white rounded-4 shadow-sm overflow-hidden h-100 card-hover d-flex flex-column">
                                        <div class="d-flex align-items-center justify-content-center bg-light" style="height:320px;overflow:hidden;">
                                            @if($dataEkskul->gambar)
                                                <img src="{{ asset('storage/' . $dataEkskul->gambar) }}" class="w-100 h-100" style="object-fit:contain;object-position:center;pointer-events:none;" alt="{{ $dataEkskul->nama_ekskul }}" loading="lazy" draggable="false">
                                            @else
                                                <div class="d-flex flex-column align-items-center justify-content-center text-secondary">
                                                    <i class="bi bi-people fs-1 mb-2"></i>
                                                    <span>Foto Ekstrakurikuler</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-4 d-flex flex-column flex-grow-1">
                                            <h5 class="fw-bold mb-3" style="color:#17213b;">
                                                {{ $dataEkskul->nama_ekskul }}
                                            </h5>
                                            @if($dataEkskul->jadwal_latihan)
                                                <p class="text-secondary small mb-2">
                                                    Jadwal: {{ $dataEkskul->jadwal_latihan }}
                                                </p>
                                            @endif
                                            @if($dataEkskul->pembina)
                                                <p class="text-secondary small mb-3">
                                                    Pembina: {{ $dataEkskul->pembina }}
                                                </p>
                                            @endif
                                            <p class="text-secondary small lh-lg mb-0">
                                                {{ Str::limit($dataEkskul->deskripsi ?? '', 110) }}
                                            </p>
                                            <div class="mt-auto pt-3">
                                                <a href="{{ route('landing.ekstrakurikuler.detail', $dataEkskul->slug) }}" class="text-primary fw-semibold small text-decoration-none">
                                                    Lihat Selengkapnya
                                                    <span class="arrow-hover ms-1">→</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5" data-aos="fade-up">
                        <p class="text-secondary mb-0">Belum ada data ekstrakurikuler.</p>
                    </div>
                @endforelse
            </div>
            @if($ekskulChunks->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#ekskulCarousel" data-bs-slide="prev" aria-label="Sebelumnya" style="width:5%;">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#ekskulCarousel" data-bs-slide="next" aria-label="Berikutnya" style="width:5%;">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3"></span>
                </button>
            @endif
        </div>
        <div class="text-end mt-4" data-aos="fade-left">
            <a href="{{ route('landing.ekstrakurikuler') }}" class="btn btn-outline-primary rounded-pill px-4">
                Tampilkan Semua Ekstrakurikuler
                <span class="ms-1">→</span>
            </a>
        </div>
    </div>
</section>

<section id="berita" class="py-5" style="background:#f7f8fa;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">Informasi</span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">Berita Terbaru</h2>
            <p class="text-secondary mb-0">
                Informasi dan kegiatan terbaru dari sekolah.
            </p>
        </div>
        @php
            $beritaChunks = $berita->chunk(3);
        @endphp
        <div id="beritaCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($beritaChunks as $index => $beritaChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($beritaChunk as $cardIndex => $dataBerita)
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($cardIndex + 1) * 100 }}">
                                    <div class="bg-white rounded-4 shadow-sm overflow-hidden h-100 card-hover d-flex flex-column">
                                        <div class="d-flex align-items-center justify-content-center bg-light" style="height:320px;overflow:hidden;">
                                            @if($dataBerita->gambar)
                                                <img src="{{ asset('storage/' . $dataBerita->gambar) }}" class="w-100 h-100" style="object-fit:contain;object-position:center;pointer-events:none;" alt="{{ $dataBerita->judul }}" loading="lazy" draggable="false">
                                            @else
                                                <div class="d-flex flex-column align-items-center justify-content-center text-secondary">
                                                    <i class="bi bi-newspaper fs-1 mb-2"></i>
                                                    <span>Foto Berita</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-4 d-flex flex-column flex-grow-1">
                                            <p class="text-secondary small mb-2">
                                                {{ $dataBerita->tanggal ? \Carbon\Carbon::parse($dataBerita->tanggal)->translatedFormat('d F Y') : '-' }}
                                            </p>
                                            <h5 class="fw-bold mb-3" style="color:#17213b;">
                                                {{ $dataBerita->judul }}
                                            </h5>
                                            <p class="text-secondary small lh-lg mb-0">
                                                {{ Str::limit(strip_tags($dataBerita->isi ?? ''), 120) }}
                                            </p>
                                            <div class="mt-auto pt-3">
                                                <a href="{{ route('landing.berita.detail', $dataBerita->slug) }}" class="text-primary fw-semibold small text-decoration-none">
                                                    Lihat Selengkapnya
                                                    <span class="arrow-hover ms-1">→</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5" data-aos="fade-up">
                        <p class="text-secondary mb-0">Belum ada berita.</p>
                    </div>
                @endforelse
            </div>
            @if($beritaChunks->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev" aria-label="Berita sebelumnya" style="width:5%;">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next" aria-label="Berita berikutnya" style="width:5%;">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3"></span>
                </button>
            @endif
        </div>
        <div class="text-end mt-4" data-aos="fade-left">
            <a href="{{ route('landing.berita') }}" class="btn btn-outline-primary rounded-pill px-4">
                Tampilkan Semua Berita
                <span class="ms-1">→</span>
            </a>
        </div>
    </div>
</section>

<section id="galeri" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">Dokumentasi</span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">Galeri Sekolah</h2>
            <p class="text-secondary mb-0">Dokumentasi kegiatan dan aktivitas sekolah.</p>
        </div>
        @php
            $galeriChunks = $galeri->chunk(3);
        @endphp
        <div id="galeriCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($galeriChunks as $index => $galeriChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($galeriChunk as $cardIndex => $dataGaleri)
                                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="{{ ($cardIndex + 1) * 100 }}">
                                    <div class="bg-white rounded-4 shadow-sm overflow-hidden h-100 card-hover d-flex flex-column">
                                        <div class="d-flex align-items-center justify-content-center bg-light" style="height:320px;overflow:hidden;">
                                            @if($dataGaleri->file && $dataGaleri->kategori === 'Foto')
                                                <img src="{{ asset('storage/' . $dataGaleri->file) }}" class="w-100 h-100" style="object-fit:contain;object-position:center;" alt="{{ $dataGaleri->judul }}" loading="lazy" draggable="false">
                                            @elseif($dataGaleri->file && $dataGaleri->kategori === 'Video')
                                                <video class="w-100 h-100" controls preload="metadata" style="object-fit:contain;object-position:center;background:#17213b;">
                                                    <source src="{{ asset('storage/' . $dataGaleri->file) }}">
                                                    Browser kamu tidak mendukung video.
                                                </video>
                                            @else
                                                <div class="d-flex flex-column align-items-center justify-content-center text-secondary">
                                                    <i class="bi bi-images fs-1 mb-2"></i>
                                                    <span>Dokumentasi</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-4 d-flex flex-column flex-grow-1">
                                            <div class="mb-2">
                                                <span class="badge rounded-pill" style="background:#eef3ff;color:#24458f;">{{ $dataGaleri->kategori ?? 'Galeri' }}</span>
                                            </div>
                                            <h5 class="fw-bold mb-3" style="color:#17213b;">{{ $dataGaleri->judul }}</h5>
                                            <p class="text-secondary small lh-lg mb-0">{{ \Illuminate\Support\Str::limit($dataGaleri->keterangan ?? '', 100) }}</p>
                                            <div class="mt-auto pt-3">
                                                <a href="{{ route('landing.galeri.detail', \Illuminate\Support\Facades\Crypt::encryptString((string) $dataGaleri->id_galeri)) }}" class="text-primary fw-semibold small text-decoration-none">Lihat Galeri <span class="arrow-hover ms-1">→</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5" data-aos="fade-up">
                        <p class="text-secondary mb-0">Belum ada dokumentasi galeri.</p>
                    </div>
                @endforelse
            </div>
            @if($galeriChunks->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#galeriCarousel" data-bs-slide="prev" aria-label="Galeri sebelumnya" style="width:5%;">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galeriCarousel" data-bs-slide="next" aria-label="Galeri berikutnya" style="width:5%;">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3"></span>
                </button>
            @endif
        </div>
        <div class="text-end mt-4" data-aos="fade-left">
            <a href="{{ route('landing.galeri') }}" class="btn btn-outline-primary rounded-pill px-4">Tampilkan Semua Galeri <span class="ms-1">→</span></a>
        </div>
    </div>
</section>


<section id="pengumuman" class="py-5" style="background:#f7f8fa;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="fw-semibold text-uppercase small" style="color:#24458f;">Informasi Sekolah</span>
            <h2 class="fw-bold mt-2 mb-2" style="color:#17213b;">Pengumuman</h2>
            <p class="text-secondary mb-0">
                Informasi dan pengumuman terbaru dari sekolah.
            </p>
        </div>
        @php
            $pengumumanChunks = $pengumuman->chunk(3);
        @endphp
        <div id="pengumumanCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($pengumumanChunks as $index => $pengumumanChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($pengumumanChunk as $cardIndex => $dataPengumuman)
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($cardIndex + 1) * 100 }}">
                                    <div class="bg-white rounded-4 shadow-sm h-100 p-4 card-hover d-flex flex-column">
                                        <div class="d-flex align-items-start gap-3 flex-grow-1">
                                            <div class="rounded-3 p-3 flex-shrink-0" style="background:#eef3ff;color:#24458f;">
                                                <i class="bi bi-megaphone-fill fs-5"></i>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1">
                                                @if(!empty($dataPengumuman->tanggal))
                                                    <div class="text-secondary small mb-2">
                                                        {{ \Carbon\Carbon::parse($dataPengumuman->tanggal)->translatedFormat('d F Y') }}
                                                    </div>
                                                @endif
                                                <h5 class="fw-bold mb-3" style="color:#17213b;">
                                                    {{ $dataPengumuman->judul }}
                                                </h5>
                                                <p class="text-secondary small lh-lg mb-0">
                                                    {{ Str::limit(strip_tags($dataPengumuman->isi ?? $dataPengumuman->deskripsi ?? ''), 110) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-auto pt-3">
                                            <a href="{{ route('landing.pengumuman.detail', $dataPengumuman->slug) }}" class="text-primary fw-semibold small text-decoration-none">
                                                Lihat Selengkapnya
                                                <span class="arrow-hover ms-1">→</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5" data-aos="fade-up">
                        <p class="text-secondary mb-0">Belum ada pengumuman.</p>
                    </div>
                @endforelse
            </div>
            @if($pengumumanChunks->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#pengumumanCarousel" data-bs-slide="prev" aria-label="Pengumuman sebelumnya" style="width:5%;">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#pengumumanCarousel" data-bs-slide="next" aria-label="Pengumuman berikutnya" style="width:5%;">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3"></span>
                </button>
            @endif
        </div>
        <div class="text-end mt-4" data-aos="fade-left">
            <a href="{{ route('landing.pengumuman') }}" class="btn btn-outline-primary rounded-pill px-4">
                Tampilkan Semua Pengumuman
                <span class="ms-1">→</span>
            </a>
        </div>
    </div>
</section>

<script src="{{ asset('assets/libs/aos-master/dist/aos.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 700,
        once: true,
        offset: 80
    });
});
</script>

@endsection
