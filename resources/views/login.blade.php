<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login - CAMAR">
    <title>Login - CAMAR</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resources/css/login.css') }}">
</head>
<body>
    <!-- Background Image -->
    <div class="login-bg">
        <img src="{{ asset('resources/images/mangrove0.png') }}" alt="Background">
    </div>

    <!-- Login Container -->
    <div class="login-wrapper">
        <div class="login-card">
            <!-- Logo Section -->
            <div class="login-logo">
                <img src="{{ asset('resources/images/logo-camar.svg') }}" alt="CAMAR Logo" class="logo-img">
                <h1 class="logo-text">CAMAR</h1>
            </div>

            <!-- Login Header -->
            <div class="login-header">
                <h2>Masuk ke Akun Anda</h2>
            </div>

            <!-- Login Form -->
            <form id="loginForm" class="login-form">
                @csrf
                
                <!-- Email Input -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i>
                        Email
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="form-input" 
                            placeholder="nama@perusahaan.com" 
                            required
                        >
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input" 
                            placeholder="Masukkan password" 
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="form-footer">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat saya</label>
                    </div>
                    <a href="#" class="forgot-link">Lupa password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-login">
                    <span>Masuk</span>
                    <i class="fas fa-arrow-right"></i>
                </button>

                <!-- Divider -->
                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">atau</span>
                    <div class="divider-line"></div>
                </div>

                <!-- Register Link -->
                <div class="register-section">
                    <p>Belum punya akun?</p>
                    <a href="{{ route('register') }}" class="btn-register">
                        Daftar Sekarang
                    </a>
                </div>
            </form>

            <!-- Back to Home -->
            <div class="back-home">
                <a href="{{ route('home') }}">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('resources/js/login.js') }}"></script>
</body>
</html>