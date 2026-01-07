{{-- Global Header - Fixed di bagian atas --}}
<header class="global-header">
    <div class="container-fluid h-100 px-4">
        <div class="row h-100 align-items-center">
            {{-- Left Side - Page Title & Subtitle --}}
            <div class="col-lg-4 col-md-5">
                <div class="header-left">
                    <h1 class="header-title">
                        @yield('page-title', 'Dashboard Buyer')
                    </h1>
                    <p class="header-subtitle">
                        @yield('page-subtitle', 'Ringkasan aktivitas carbon offset Anda')
                    </p>
                </div>
            </div>

            {{-- Right Side - Search, Notifications, User Menu --}}
            <div class="col-lg-8 col-md-7">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    
                    {{-- Search Bar --}}
                    <div class="header-search position-relative d-none d-lg-block">
                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" class="form-control search-input" placeholder="Cari proyek, transaksi, laporan...">
                    </div>

                    {{-- Notifications Dropdown --}}
                    <div class="dropdown">
                        <button class="btn header-icon-btn" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="notification-badge">3</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow notification-dropdown">
                            <li class="dropdown-header d-flex justify-content-between align-items-center">
                                <strong>Notifikasi</strong>
                                <span class="badge bg-primary rounded-pill">3</span>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item notification-item" href="#">
                                    <div class="d-flex gap-2">
                                        <i class="bi bi-check-circle text-success notification-icon"></i>
                                        <div class="flex-grow-1">
                                            <strong class="notification-title">Sertifikat Diterbitkan</strong>
                                            <small class="notification-text">Sertifikat untuk Proyek Energi Terbarukan telah tersedia</small>
                                            <small class="notification-time">2 jam yang lalu</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item notification-item" href="#">
                                    <div class="d-flex gap-2">
                                        <i class="bi bi-file-earmark-text text-primary notification-icon"></i>
                                        <div class="flex-grow-1">
                                            <strong class="notification-title">Laporan Baru</strong>
                                            <small class="notification-text">Laporan progress proyek Reboisasi Kalimantan</small>
                                            <small class="notification-time">1 hari yang lalu</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item notification-item" href="#">
                                    <div class="d-flex gap-2">
                                        <i class="bi bi-cart-check text-warning notification-icon"></i>
                                        <div class="flex-grow-1">
                                            <strong class="notification-title">Transaksi Berhasil</strong>
                                            <small class="notification-text">Pembelian 250 ton CO₂e berhasil diproses</small>
                                            <small class="notification-time">3 hari yang lalu</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item text-center notification-view-all" href="#">
                                    <strong>Lihat Semua Notifikasi</strong>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- User Menu Dropdown --}}
                    <div class="dropdown">
                        <button class="btn user-menu" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-info-header">
                                <div class="user-text d-none d-md-block text-end">
                                    <div class="user-name fs-5 fw-bold">{{ $displayName ?? explode('@', auth()->user()->email)[0] }}</div>
                                    <div class="user-role small text-muted fw-semibold">{{ $roleLabel ?? '' }}</div>
                                </div>
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold company-logo overflow-hidden bg-secondary" 
                                    style="width: 45px; height: 45px; min-width: 45px;">
                                    <img src="{{ $photoUrl ?? asset('urlProfil/User1.gif') }}" 
                                        alt="Profile" 
                                        class="w-100 h-100" 
                                        style="object-fit: cover;">
                                </div>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow user-dropdown" aria-labelledby="userDropdown">
                            <li class="dropdown-header user-dropdown-header">
                                <strong class="d-block mb-1">{{ $displayName ?? explode('@', auth()->user()->email)[0] }}</strong>
                                <small class="text-muted">{{ auth()->user()->email }}</small>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('buyer.dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('buyer.keamanan') }}">
                                    <i class="bi bi-gear me-2"></i> Pengaturan
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>