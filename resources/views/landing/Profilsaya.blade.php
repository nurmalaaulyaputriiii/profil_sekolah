@extends('layouts.landing')

@section('title', 'Profil Saya')

@section('content')
<section class="py-5" style="background:#f4f7fc;min-height:100vh;">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color:#24458f;">Profil Saya</h2>
            <p class="text-secondary">Mengenal lebih dekat tentang diri saya</p>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 text-center p-4 h-100">
                    <img src="{{ asset('assets/images/saya.jpeg') }}" alt="Foto Nurmala Aulya Putri" class="rounded-circle mx-auto mb-3" style="width:170px;height:170px;object-fit:cover;">
                    <h4 class="fw-bold mb-1" style="color:#17213b;">Nurmala Aulya Putri</h4>
                    <p class="mb-3" style="color:#24458f;">Pelajar Rekayasa Perangkat Lunak</p>
                    <p class="text-secondary mb-0">Saya tertarik pada teknologi, pemrograman, dan pengembangan aplikasi.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 h-100">
                    <h5 class="fw-bold mb-4" style="color:#24458f;">Biodata Diri</h5>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <small class="text-secondary">Nama Lengkap</small>
                            <p class="fw-semibold mb-0">Nurmala Aulya Putri</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Tempat, Tanggal Lahir</small>
                            <p class="fw-semibold mb-0">Tasikmalaya, 23 April 2008</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Jenis Kelamin</small>
                            <p class="fw-semibold mb-0">Perempuan</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Agama</small>
                            <p class="fw-semibold mb-0">Islam</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Alamat</small>
                            <p class="fw-semibold mb-0">Kp. Sindangsari</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Status</small>
                            <p class="fw-semibold mb-0">Pelajar</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Email</small>
                            <p class="fw-semibold mb-0 text-break">nurmalaaulyaputriiii@gmaail.com</p>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-secondary">Nomor HP</small>
                            <p class="fw-semibold mb-0">081573260316</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h5 class="fw-bold mb-3" style="color:#24458f;">Tentang Saya</h5>
                    <p class="text-secondary mb-0" style="line-height:1.8;">Saya adalah seorang pelajar yang memiliki minat dalam bidang teknologi informasi, khususnya pengembangan perangkat lunak. Saya senang mempelajari hal baru, mencoba membuat aplikasi, dan mengembangkan kemampuan pemrograman agar menjadi pribadi yang kreatif, kompeten, dan bertanggung jawab.</p>
                    <h5 class="fw-bold mt-4 mb-2" style="color:#24458f;">Moto Hidup</h5>
                    <p class="text-secondary fst-italic mb-0">"Terus belajar, berani mencoba, dan jangan menyerah untuk meraih impian."</p>
                </div>
            </div>
        </div>
        <p class="text-center text-secondary small mt-5 mb-0">© {{ date('Y') }} Nurmala Aulya Putri</p>
    </div>
</section>
@endsection
