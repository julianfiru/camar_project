<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'CAMAR - Admin Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@700;800&family=Ubuntu:wght@300;400;500;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Admin/style/css-AdminDashboard/AdminDashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/navbar/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/style/css-ManajemenAkun/ManajemenAkun.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/style/css-Proyek/Proyek.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/style/css-Sertifikat/Sertifikat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/style/css-AuditLog/AuditLog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/style/css-PengaturanPlatform/PengaturanPlatform.css') }}">

    
    <style>
        :root {
            --color-primary: #DDF4E7;
            --color-secondary: #67C090;
            --color-tertiary: #26667F;
            --color-quaternary: #124170;
            --font-logo: 'Manrope', sans-serif;
            --font-main: 'Ubuntu', sans-serif;
            --font-sub: 'Inter', sans-serif;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Top Navbar - Background Putih -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white; border: none;">
        <div class="container-fluid px-4">
            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Search -->
                    <li class="nav-item me-3">
                        <form class="d-flex">
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="search" placeholder="Cari..." aria-label="Search" style="border-color: #e0e0e0; background: #f8f9fa; color: #333;">
                                <button class="btn btn-outline-secondary btn-sm" type="submit" style="border-color: #e0e0e0;">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>

                    <!-- Notifications -->
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-bell fs-5" style="color: #333;"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Notifikasi</h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-check me-2"></i>Akun baru menunggu approval</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark me-2"></i>Proyek baru diajukan</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-award me-2"></i>Sertifikat telah diterbitkan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center text-primary" href="#">Lihat Semua</a></li>
                        </ul>
                    </li>

                    <!-- User Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" style="color: #333;">
                            <img src="{{ $photoUrl ?? asset('urlProfil/User1.gif') }}" 
                                alt="Profile" 
                                class="rounded-circle me-2" 
                                style="width: 35px; height: 35px; object-fit: cover;">
                            <div class="d-none d-md-inline">
                                <div style="line-height: 1.2;">
                                    <div style="font-size: 14px; font-weight: 600; color: #333;">{{ $displayName ?? 'Admin' }}</div>
                                    <div style="font-size: 11px; font-weight: 700; color: #67C090;">{{ $roleLabel ?? 'Admin' }}</div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">{{ Auth::user()->email ?? 'admin@camar.id' }}</h6></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.pengaturan.platform') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger" style="border: none; background: none; cursor: pointer;">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex" style="padding-top: 70px;">
        <!-- Sidebar -->
        <div class="position-fixed start-0 d-flex flex-column" style="width: 260px; height: 100vh; background-color: var(--color-quaternary); top: 0; overflow-y: auto; z-index: 1040; padding-top: 70px;">
            <!-- Logo CAMAR di Sidebar -->
            <div class="text-center py-4 border-bottom border-secondary" style="background-color: rgba(103, 192, 144, 0.1);">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <h2 class="fw-bold mb-0" style="font-family: var(--font-logo); color: var(--color-secondary); letter-spacing: 3px; font-size: 32px;">
                        CAMAR
                    </h2>
                </a>
            </div>
            
            <ul class="list-unstyled px-0 py-3">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-white text-decoration-none px-4 py-3 {{ Request::is('admin/dashboard') ? 'active-menu' : '' }}" style="border-left: 4px solid {{ Request::is('admin/dashboard') ? 'var(--color-secondary)' : 'transparent' }}; background: {{ Request::is('admin/dashboard') ? 'rgba(103, 192, 144, 0.2)' : 'transparent' }};">
                        <i class="bi bi-speedometer2 me-3 fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.manajemen.akun') }}" class="d-flex align-items-center text-white text-decoration-none px-4 py-3 {{ Request::is('admin/manajemen-akun') ? 'active-menu' : '' }}" style="border-left: 4px solid {{ Request::is('admin/manajemen-akun') ? 'var(--color-secondary)' : 'transparent' }}; background: {{ Request::is('admin/manajemen-akun') ? 'rgba(103, 192, 144, 0.2)' : 'transparent' }};">
                        <i class="bi bi-people me-3 fs-5"></i>
                        <span>Manajemen Akun</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.proyek') }}" class="d-flex align-items-center text-white text-decoration-none px-4 py-3 {{ Request::is('admin/proyek') ? 'active-menu' : '' }}" style="border-left: 4px solid {{ Request::is('admin/proyek') ? 'var(--color-secondary)' : 'transparent' }}; background: {{ Request::is('admin/proyek') ? 'rgba(103, 192, 144, 0.2)' : 'transparent' }};">
                        <i class="bi bi-folder me-3 fs-5"></i>
                        <span>Proyek</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sertifikat') }}" class="d-flex align-items-center text-white text-decoration-none px-4 py-3 {{ Request::is('admin/sertifikat') ? 'active-menu' : '' }}" style="border-left: 4px solid {{ Request::is('admin/sertifikat') ? 'var(--color-secondary)' : 'transparent' }}; background: {{ Request::is('admin/sertifikat') ? 'rgba(103, 192, 144, 0.2)' : 'transparent' }};">
                        <i class="bi bi-award me-3 fs-5"></i>
                        <span>Sertifikat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.audit.log') }}" class="d-flex align-items-center text-white text-decoration-none px-4 py-3 {{ Request::is('admin/audit-log') ? 'active-menu' : '' }}" style="border-left: 4px solid {{ Request::is('admin/audit-log') ? 'var(--color-secondary)' : 'transparent' }}; background: {{ Request::is('admin/audit-log') ? 'rgba(103, 192, 144, 0.2)' : 'transparent' }};">
                        <i class="bi bi-clock-history me-3 fs-5"></i>
                        <span>Audit Log</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pengaturan.platform') }}" class="d-flex align-items-center text-white text-decoration-none px-4 py-3 {{ Request::is('admin/pengaturan-platform') ? 'active-menu' : '' }}" style="border-left: 4px solid {{ Request::is('admin/pengaturan-platform') ? 'var(--color-secondary)' : 'transparent' }}; background: {{ Request::is('admin/pengaturan-platform') ? 'rgba(103, 192, 144, 0.2)' : 'transparent' }};">
                        <i class="bi bi-gear me-3 fs-5"></i>
                        <span>Pengaturan Platform</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div class="flex-grow-1" style="margin-left: 260px; min-height: calc(100vh - 70px);">
            <!-- Page Header -->
            <div class="bg-white border-bottom py-4 mb-4">
                <div class="container-fluid px-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="h3 mb-1 fw-bold" style="color: var(--color-quaternary);">@yield('page-title', 'Dashboard')</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 small">
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-end">
                            @yield('header-actions')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="container-fluid px-4 py-4">
                @yield('Admin.Content')
            </div>

            <!-- Footer -->
            <footer class="bg-light border-top mt-5 py-3">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-muted small">&copy; 2025 CAMAR. All rights reserved.</span>
                        </div>
                        <div class="col-md-6 text-end">
                            <span class="text-muted small">Version 1.0.0</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar hover effects
        document.querySelectorAll('.list-unstyled a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                if (!this.classList.contains('active-menu')) {
                    this.style.background = 'rgba(255, 255, 255, 0.1)';
                    this.style.borderLeftColor = 'var(--color-secondary)';
                }
            });
            link.addEventListener('mouseleave', function() {
                if (!this.classList.contains('active-menu')) {
                    this.style.background = 'transparent';
                    this.style.borderLeftColor = 'transparent';
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>