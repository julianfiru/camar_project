{{-- Global Header - Fixed di bagian atas --}}
<header class="cbh-global-header">
    <div class="container-fluid h-100 px-4">
        <div class="row h-100 align-items-center">
            {{-- Left Side - Page Title & Subtitle --}}
            <div class="col-lg-4 col-md-5">
                <div class="cbh-header-left">
                    <h1 class="cbh-header-title">
                        @yield('page-title', 'Dashboard Buyer')
                    </h1>
                    <p class="cbh-header-subtitle">
                        @yield('page-subtitle', 'Ringkasan aktivitas carbon offset Anda')
                    </p>
                </div>
            </div>

            {{-- Right Side - Search, Notifications, User Menu --}}
            <div class="col-lg-8 col-md-7">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    


                    {{-- Notifications Dropdown --}}
                    <div class="dropdown">
                        <button class="btn cbh-header-icon-btn" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="cbh-notification-badge">3</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow cbh-notification-dropdown">
                            <li class="dropdown-header d-flex justify-content-between align-items-center">
                                <strong>Notifikasi</strong>
                                <span class="badge bg-primary rounded-pill">3</span>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item cbh-notification-item" href="#">
                                    <div class="d-flex gap-2">
                                        <i class="bi bi-check-circle text-success cbh-notification-icon"></i>
                                        <div class="flex-grow-1">
                                            <strong class="cbh-notification-title">Sertifikat Diterbitkan</strong>
                                            <small class="cbh-notification-text">Sertifikat untuk Proyek Energi Terbarukan telah tersedia</small>
                                            <small class="cbh-notification-time">2 jam yang lalu</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item cbh-notification-item" href="#">
                                    <div class="d-flex gap-2">
                                        <i class="bi bi-file-earmark-text text-primary cbh-notification-icon"></i>
                                        <div class="flex-grow-1">
                                            <strong class="cbh-notification-title">Laporan Baru</strong>
                                            <small class="cbh-notification-text">Laporan progress proyek Reboisasi Kalimantan</small>
                                            <small class="cbh-notification-time">1 hari yang lalu</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item cbh-notification-item" href="#">
                                    <div class="d-flex gap-2">
                                        <i class="bi bi-cart-check text-warning cbh-notification-icon"></i>
                                        <div class="flex-grow-1">
                                            <strong class="cbh-notification-title">Transaksi Berhasil</strong>
                                            <small class="cbh-notification-text">Pembelian 250 ton CO₂e berhasil diproses</small>
                                            <small class="cbh-notification-time">3 hari yang lalu</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item text-center cbh-notification-view-all" href="#">
                                    <strong>Lihat Semua Notifikasi</strong>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- User Menu Dropdown --}}
                    <div class="dropdown">
                        <button class="btn cbh-user-menu" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="cbh-user-info-header">
                                <div class="cbh-user-text d-none d-md-block">
                                    <div class="cbh-user-name">PT Green Energy Indonesia</div>
                                    <div class="cbh-user-role">Akun Pembeli</div>
                                </div>
                                <div class="cbh-user-avatar">GE</div>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow cbh-user-dropdown">
                            <li class="dropdown-header cbh-user-dropdown-header">
                                <strong class="d-block mb-1">PT Green Energy Indonesia</strong>
                                <small class="text-muted">contact@greenenergy.co.id</small>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('buyer.profil') }}">
                                    <i class="bi bi-building me-2"></i> Profil Perusahaan
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('buyer.pengaturan.keamanan') }}">
                                    <i class="bi bi-shield-lock me-2"></i> Keamanan & Akun
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('buyer.pengaturan.notifikasi') }}">
                                    <i class="bi bi-bell me-2"></i> Notifikasi & Bahasa
                                </a>
                            </li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> Keluar
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