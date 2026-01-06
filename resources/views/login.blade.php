<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CAMAR</title>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #0f0f0f 50%, #1a1a1a 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Gradient Overlays */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            right: 0;
            width: 60%;
            height: 100%;
            background: radial-gradient(ellipse at top right, rgba(103, 192, 144, 0.1), transparent 60%);
            z-index: 0;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: 0;
            left: 0;
            width: 50%;
            height: 80%;
            background: radial-gradient(ellipse at bottom left, rgba(38, 102, 127, 0.12), transparent 70%);
            z-index: 0;
            pointer-events: none;
        }

        /* Pine Trees Background */
        .bg-trees {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            opacity: 0.12;
        }

        .pine-tree {
            position: absolute;
            bottom: 0;
        }

        .pine-1 { left: 5%; width: 180px; height: 280px; opacity: 0.8; }
        .pine-2 { left: 15%; width: 150px; height: 240px; opacity: 0.6; }
        .pine-3 { right: 20%; width: 160px; height: 260px; opacity: 0.65; }
        .pine-4 { right: 8%; width: 190px; height: 300px; opacity: 0.75; }

        /* Login Container */
        .login-container {
            background: rgba(15, 15, 15, 0.85);
            backdrop-filter: blur(30px);
            border: 2px solid rgba(103, 192, 144, 0.3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 100px rgba(103, 192, 144, 0.1);
            position: relative;
            z-index: 10;
        }

        .logo-text {
            font-family: 'Manrope', sans-serif;
            font-weight: 900;
            background: linear-gradient(135deg, var(--mint), var(--green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 3px;
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
        }

        .login-header h2 {
            font-family: 'Manrope', sans-serif;
            font-weight: 700;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-label {
            color: var(--mint);
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: var(--green);
            z-index: 1;
        }

        .form-control {
            padding-left: 3rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(103, 192, 144, 0.2);
            color: white;
            font-family: 'Ubuntu', sans-serif;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--green);
            box-shadow: 0 0 20px rgba(103, 192, 144, 0.2);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--green);
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.3s;
        }

        .password-toggle:hover {
            color: var(--mint);
        }

        .form-check-input:checked {
            background-color: var(--green);
            border-color: var(--green);
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.7);
        }

        .forgot-password {
            color: var(--green);
            transition: all 0.3s;
        }

        .forgot-password:hover {
            color: var(--mint);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--green), var(--teal));
            border: none;
            font-family: 'Manrope', sans-serif;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(103, 192, 144, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(103, 192, 144, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .divider-text {
            color: rgba(255, 255, 255, 0.4);
        }

        .register-link p {
            color: rgba(255, 255, 255, 0.6);
        }

        .btn-register {
            background: transparent;
            border: 2px solid var(--green);
            color: var(--green);
            font-weight: 700;
            font-family: 'Manrope', sans-serif;
        }

        .btn-register:hover {
            background: var(--green);
            color: var(--darker);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(103, 192, 144, 0.3);
        }

        .back-home a {
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s;
        }

        .back-home a:hover {
            color: var(--green);
        }
    </style>
</head>
<body>
    <div class="bg-trees">
        <svg class="pine-tree pine-1" viewBox="0 0 100 160" fill="none">
            <path d="M50 10 L30 50 L35 50 L20 80 L28 80 L15 110 L25 110 L10 145 L90 145 L75 110 L85 110 L72 80 L80 80 L65 50 L70 50 Z" fill="rgba(103, 192, 144, 0.4)"/>
            <rect x="45" y="145" width="10" height="15" fill="rgba(103, 192, 144, 0.3)"/>
        </svg>
        <svg class="pine-tree pine-2" viewBox="0 0 100 160" fill="none">
            <path d="M50 10 L30 50 L35 50 L20 80 L28 80 L15 110 L25 110 L10 145 L90 145 L75 110 L85 110 L72 80 L80 80 L65 50 L70 50 Z" fill="rgba(67, 162, 110, 0.35)"/>
            <rect x="45" y="145" width="10" height="15" fill="rgba(67, 162, 110, 0.25)"/>
        </svg>
        <svg class="pine-tree pine-3" viewBox="0 0 100 160" fill="none">
            <path d="M50 10 L30 50 L35 50 L20 80 L28 80 L15 110 L25 110 L10 145 L90 145 L75 110 L85 110 L72 80 L80 80 L65 50 L70 50 Z" fill="rgba(38, 102, 127, 0.4)"/>
            <rect x="45" y="145" width="10" height="15" fill="rgba(38, 102, 127, 0.3)"/>
        </svg>
        <svg class="pine-tree pine-4" viewBox="0 0 100 160" fill="none">
            <path d="M50 10 L30 50 L35 50 L20 80 L28 80 L15 110 L25 110 L10 145 L90 145 L75 110 L85 110 L72 80 L80 80 L65 50 L70 50 Z" fill="rgba(103, 192, 144, 0.42)"/>
            <rect x="45" y="145" width="10" height="15" fill="rgba(103, 192, 144, 0.32)"/>
        </svg>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="login-container rounded-4 p-4 p-md-5">
                    <div class="text-center mb-5">
                        <h1 class="logo-text display-3 mb-2">CAMAR</h1>
                        <p class="logo-subtitle small">CArbon MARket</p>
                    </div>

                    <div class="login-header text-center mb-4">
                        <h2 class="h3 text-white mb-2">Selamat Datang Kembali</h2>
                            @if (session('loginError'))
                                <p class="small ftc-red">
                                    {{ session('loginError') }}
                                </p>
                            @else
                                <p class="small">
                                    Masuk ke akun Anda untuk melanjutkan
                                </p>
                            @endif
                    </div>

                    <form action="{{ url('/LoginConfirmed') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <polyline points="22,6 12,13 2,6"/>
                                </svg>
                                <input type="email" id="email" name="email" class="form-control rounded-3" placeholder="nama@perusahaan.com" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-wrapper">
                                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                                </svg>
                                <input type="password" id="password" name="password" class="form-control rounded-3" placeholder="Masukkan password" required>
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <svg id="eyeIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label small" for="remember">Ingat saya</label>
                            </div>
                            <a href="#" class="forgot-password text-decoration-none small">Lupa password?</a>
                        </div>
                        <button type="submit" class="btn btn-login btn-lg w-100 rounded-3 mb-3">Masuk</button>
                    </form>

                    <div class="register-link text-center mt-4 pt-4 border-top border-secondary border-opacity-25">
                        <p class="mb-3">Belum punya akun?</p>
                        <a href="registrasi.html" class="btn btn-register rounded-3 px-4">Daftar Sekarang</a>
                    </div>

                    <div class="back-home text-center mt-4">
                        <a href="index.html" class="text-decoration-none d-inline-flex align-items-center gap-2 small">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 12H5M12 19l-7-7 7-7"/>
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>