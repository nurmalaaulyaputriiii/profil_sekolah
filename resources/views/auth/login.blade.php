<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Profil Sekolah</title>
    <meta name="description" content="Halaman Login Admin Profil Sekolah">
    <meta name="author" content="Profil Sekolah">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo2.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center position-relative overflow-hidden" style="background:linear-gradient(rgba(36,69,143,.82),rgba(36,69,143,.82)),url('{{ asset('assets/images/smandas.png') }}') center/cover no-repeat;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-5">
                    <div class="bg-white rounded-4 shadow-lg p-4 p-md-5">
                        <div class="text-center mb-4">
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo Sekolah" width="42" height="42" class="object-fit-contain">
                            </div>
                            <h3 class="fw-bold mb-1" style="color:#24458f;">SMAN 2 Singaparna</h3>
                            <p class="text-secondary mb-0">Silakan login untuk mengakses dashboard sekolah</p>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger d-flex align-items-center">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger d-flex align-items-center">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                <span>Username dan password wajib diisi dengan benar.</span>
                            </div>
                        @endif
                        <form action="{{ route('login.process') }}" method="POST" id="loginForm" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-person" style="color:#24458f;"></i>
                                    </span>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" value="{{ old('username') }}" required autocomplete="username">
                                </div>
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-shield-lock" style="color:#24458f;"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required autocomplete="current-password">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-password" aria-label="Tampilkan password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn text-white w-100 py-2 fw-semibold rounded-3" id="btn-submit" style="background:#24458f;">
                                Masuk ke Dashboard
                                <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
</body>
</html>
