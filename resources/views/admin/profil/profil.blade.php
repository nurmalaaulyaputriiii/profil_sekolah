@extends('layouts.admin')
@section('content')
<style>
    .profil-page {
        background: #f5f6f8;
        min-height: 100vh;
        padding: 30px 20px 60px;
    }

    .profil-container {
        max-width: 1150px;
        margin: auto;
    }

    /* =========================
       HERO
    ========================= */

    .profil-hero {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 45px;
        margin-bottom: 25px;
    }

    .hero-content {
        display: flex;
        align-items: center;
        gap: 45px;
    }

    .hero-text {
        flex: 1;
    }

    .hero-label {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .hero-text h1 {
        color: #1f2937;
        font-size: 36px;
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 15px;
    }

    .hero-text p {
        color: #6b7280;
        font-size: 15px;
        line-height: 1.8;
        margin: 0;
    }

    .hero-image {
        width: 47%;
        height: 300px;
        flex-shrink: 0;
        border-radius: 10px;
        overflow: hidden;
        background: #e5e7eb;
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* =========================
       CONTENT
    ========================= */

    .profil-content {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 50px;
    }

    .profil-section {
        padding-bottom: 40px;
        margin-bottom: 40px;
        border-bottom: 1px solid #e5e7eb;
    }

    .profil-section:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: none;
    }

    .profil-section h2 {
        color: #1f2937;
        font-size: 23px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .profil-section p {
        color: #596273;
        font-size: 15px;
        line-height: 2;
        margin-bottom: 16px;
    }

    /* =========================
       VISI
    ========================= */

    .visi-text {
        background: #f5f6f8;
        border-left: 4px solid #6b7280;
        border-radius: 5px;
        padding: 22px 25px;
        color: #4b5563;
        font-size: 16px;
        line-height: 1.9;
        font-style: italic;
    }

    /* =========================
       MISI
    ========================= */

    .misi-list {
        padding-left: 22px;
        margin: 0;
    }

    .misi-list li {
        color: #596273;
        font-size: 15px;
        line-height: 2;
        padding-left: 8px;
        margin-bottom: 5px;
    }

    /* =========================
       CONTACT
    ========================= */

    .contact-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
    }

    .contact-title {
        color: #374151;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .contact-text {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.9;
    }

    /* =========================
       FOOTER
    ========================= */

    .profil-footer {
        text-align: center;
        margin-top: 25px;
        color: #9ca3af;
        font-size: 13px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .profil-page {
            padding: 15px 10px 40px;
        }

        .profil-hero {
            padding: 25px;
        }

        .hero-content {
            flex-direction: column;
            gap: 25px;
        }

        .hero-text {
            width: 100%;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 28px;
        }

        .hero-image {
            width: 100%;
            height: 240px;
        }

        .profil-content {
            padding: 30px 25px;
        }

        .contact-wrapper {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .profil-section h2 {
            font-size: 21px;
        }
    }
</style>


<div class="profil-page">

    <div class="profil-container">

        {{-- =========================
             HERO PROFIL
        ========================== --}}
        <div class="profil-hero">

            <div class="hero-content">

                <div class="hero-text">

                    <div class="hero-label">
                        Profil Sekolah
                    </div>

                    <h1>
                        SMAN 2 SINGAPARNA
                    </h1>

                    <p>
                        Teguh dalam Keimanan dan Ketakwaan, Unggul dalam Prestasi, Kreatif dan Berbudaya
                    </p>

                </div>


                <div class="hero-image">

                    {{-- GANTI FOTO DI SINI --}}
                    <img
                        src="{{ asset('assets/images/sekolah.png') }}"
                        alt="Foto Sekolah"
                    >

                </div>

            </div>

        </div>


        {{-- =========================
             ISI PROFIL
        ========================== --}}
        <div class="profil-content">


            {{-- TENTANG SEKOLAH --}}
            <div class="profil-section">

                <h2>
                    Tentang Sekolah
                </h2>

                <p>
                    SMA Negeri 2 Singaparna merupakan lembaga pendidikan
                    menengah atas yang berfokus pada pengembangan potensi
                    peserta didik melalui pendidikan akademis dan non-akademis
                    yang unggul. Sekolah berkomitmen untuk memberikan pendidikan
                    yang berkualitas serta membentuk peserta didik yang memiliki
                    kompetensi luas sesuai dengan perkembangan zaman.
                </p>

                <p>
                    Dalam proses pendidikan, sekolah tidak hanya mengembangkan kemampuan sains dan humaniora, tetapi juga menanamkan nilai-nilai karakter, kedisiplinan, tanggung jawab, kreativitas, serta kekuatan spiritual dalam kehidupan sehari-hari.
                </p>

                <p>
                    Dengan didukung oleh tenaga pendidik yang kompeten, sarana dan prasarana yang memadai, serta lingkungan belajar yang kondusif, SMA Negeri 2 Singaparna terus berupaya memberikan pelayanan pendidikan terbaik dan mencetak generasi berprestasi bagi seluruh peserta didik.
                </p>

            </div>


            {{-- SEJARAH --}}
            <div class="profil-section">

                <h2>
                    Sejarah Sekolah
                </h2>

                <p>
                    SMA Negeri 2 Singaparna (SMANDAS) resmi mulai berdiri pada tanggal 8 Juni 2013. Kehadiran sekolah ini berawal dari tingginya kebutuhan masyarakat di pusat Ibu Kota Kabupaten Tasikmalaya (Singaparna) akan akses pendidikan jenjang menengah atas negeri yang berkualitas.
                </p>

            </div>


            {{-- VISI --}}
            <div class="profil-section">

                <h2>
                    Visi
                </h2>

                <div class="visi-text">

                    Teguh dalam Keimanan dan Ketakwaan, Unggul dalam Prestasi, Kreatif dan Berbudaya

                </div>

            </div>


            {{-- MISI --}}
            <div class="profil-section">

                <h2>
                    Misi
                </h2>

                <ol class="misi-list">

                    <li>
                        Membina dan meningkatkan keimanan dan ketakwaan terhadap Tuhan yang Maha Esa kepada seluruh peserta didik.
                    </li>

                    <li>
                        Melaksanakan proses belajar mengajar yang aktif, kreatif, inovatif, dan menyenangkan;
                        Memperluas wawasan pengetahuan peserta didik guna melanjutkan ke jenjang pendidikan yang lebih tinggi.
                    </li>

                    <li>
                        Menggali dan mengembangkan potensi peserta didik dalam bidang karya ilmiah remaja, IRMA, seni, dan olahraga dengan disiplin tinggi.
                    </li>

                    <li>
                        Meningkatkan kebutuhan sarana dan prasarana pendidikan.
                    </li>

                    <li>
                        Menciptakan lingkungan belajar yang kondusif dan ramah lingkungan.
                    </li>

                    <li>
                        Meningkatkan kepedulian peserta didik dalam berinteraksi dengan lingkungan sosial, budaya, budaya, dan alam sekitar.
                    </li>
                </ol>

            </div>


            {{-- ALAMAT & KONTAK --}}
            <div class="profil-section">

                <h2>
                    Alamat & Kontak
                </h2>

                <div class="contact-wrapper">

                    <div>

                        <div class="contact-title">
                            Alamat Sekolah
                        </div>

                        <div class="contact-text">

                            Jl. Pameungpeuk Kp. Pojokdedes<br>
                            Desa/Kelurahan Cikunir<br>
                            Kecamatan Singaparna<br>
                            Kabupaten Tasikmalaya<br>
                            Provinsi Jawa Barat<br>
                            Kode Pos 46418

                        </div>

                    </div>


                    <div>

                        <div class="contact-title">
                            Kontak Sekolah
                        </div>

                        <div class="contact-text">

                            Telepon : 08139486422<br>
                            Email :sman2spa@gmail.com<br>
                            Website : www.smandas.sch.id

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}
            <div class="profil-footer">

                © 2026 SMK IT Nama Sekolah

            </div>

        </div>

    </div>

</div>

@endsection
