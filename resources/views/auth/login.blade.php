
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Profil Sekolah</title>

    <!-- SEO Optimization -->
    <meta name="description" content="Halaman Login Admin Profil Sekolah">
    <meta name="author" content="Profil Sekolah">

    <!-- Favicon -->
    <link rel="icon" type="image/png"
          href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Local Third-Party Libraries -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Main Design System -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/main.css') }}">

</head>

<body>

    <!-- ==========================================
         START: Authentication Container & Login Card
         ========================================== -->

    <div class="login-wrapper">

        <!-- Background Shapes -->
        <div class="login-bg-shape login-bg-shape-1"></div>
        <div class="login-bg-shape login-bg-shape-2"></div>

        <!-- Main Login Card -->
        <div class="login-card">

            <!-- Brand Identity -->
            <a href="{{ route('login') }}"
               class="login-brand text-decoration-none">

                <i class="bi bi-mortarboard-fill"></i>

                <span>Profil Sekolah</span>

            </a>

            <p class="login-subtitle">
                Silakan login untuk mengakses dashboard sekolah
            </p>

            <!-- Pesan Error Login -->
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    Username dan password wajib diisi dengan benar.
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login.process') }}"
                  method="POST"
                  id="loginForm"
                  class="needs-validation"
                  novalidate>

                @csrf

                <!-- Username Input Group -->
                <div class="login-form-group">

                    <label for="username"
                           class="login-form-label">
                        Username
                    </label>

                    <div class="login-input-group">

                        <i class="bi bi-person input-icon"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="login-input"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            required
                            autocomplete="username"
                        >

                    </div>

                    @error('username')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <!-- Password Input Group -->
                <div class="login-form-group">

                    <label for="password"
                           class="login-form-label">
                        Password
                    </label>

                    <div class="login-input-group">

                        <i class="bi bi-shield-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="login-input login-input-password"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="password-toggle-btn"
                            id="toggle-password"
                            aria-label="Tampilkan password">

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <!-- Options (Remember Me & Forgot Password) -->
                <div class="login-options">

                    <label class="custom-control-label">

                        <input
                            type="checkbox"
                            class="custom-checkbox-input"
                            id="rememberMe"
                            name="remember"
                            value="1"
                        >

                        <span>Ingat Saya</span>

                    </label>

                    <a href="#"
                       class="forgot-password-link">
                        Lupa Password?
                    </a>

                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="btn-login"
                    id="btn-submit">

                    <span>Masuk ke Dashboard</span>

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>

            <!-- Divider -->
            <div class="login-divider">
                Atau masuk dengan
            </div>

            <!-- Social Logins -->
            <div class="social-login-grid">

                <button
                    class="btn-social"
                    type="button"
                    id="btn-google">

                    <i class="bi bi-google text-danger"></i>

                    <span>Google</span>

                </button>

                <button
                    class="btn-social"
                    type="button"
                    id="btn-github">

                    <i class="bi bi-github"></i>

                    <span>GitHub</span>

                </button>

            </div>

            <!-- Footer Link -->
            <p class="login-footer-text">

                Belum memiliki akun?

                <a href="#"
                   id="link-register">
                    Hubungi Administrator
                </a>

            </p>

        </div>

    </div>

    <!-- END: Authentication Container -->

    <!-- Local Bootstrap Bundle -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom Authentication Interactions -->
    <script src="{{ asset('assets/js/auth.js') }}"></script>

</body>
</html>
