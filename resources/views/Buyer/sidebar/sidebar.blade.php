<aside class="sidebar">
    <div class="sidebar-content">
        <!-- Logo -->
        <div class="sidebar-logo text-center mb-5">
            <h1 class="sidebar-brand">
                CAM<span class="brand-highlight">AR</span>
            </h1>
        </div>

        <!-- Navigation Menu -->
        <nav>
            <ul class="nav flex-column sidebar-nav">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('buyer.dashboard') }}" class="nav-link {{ request()->routeIs('buyer.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Profil Perusahaan -->
                <li class="nav-item">
                    <a href="{{ route('buyer.profil') }}" class="nav-link {{ request()->routeIs('buyer.profil') ? 'active' : '' }}">
                        <i class="bi bi-building"></i>
                        <span>Profil Perusahaan</span>
                    </a>
                </li>

                <!-- Emisi (Dropdown) -->
                <li class="nav-item">
                    <a href="#emisiSubmenu" class="nav-link {{ request()->routeIs('buyer.hitung', 'buyer.catatan') ? 'active' : '' }}" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('buyer.hitung', 'buyer.catatan') ? 'true' : 'false' }}">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-calculator"></i>
                            <span>Emisi</span>
                        </div>
                        <i class="bi bi-chevron-down collapse-icon"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('buyer.hitung', 'buyer.catatan') ? 'show' : '' }}" id="emisiSubmenu">
                        <ul class="nav flex-column submenu">
                            <li class="nav-item">
                                <a href="{{ route('buyer.hitung') }}" class="nav-link {{ request()->routeIs('buyer.hitung') ? 'active' : '' }}">
                                    Hitung Emisi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.catatan') }}" class="nav-link {{ request()->routeIs('buyer.catatan') ? 'active' : '' }}">
                                    Catatan Perhitungan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Laporan -->
                <li class="nav-item">
                    <a href="{{ route('buyer.laporan') }}" class="nav-link {{ request()->routeIs('buyer.laporan') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <!-- Sertifikat -->
                <li class="nav-item">
                    <a href="{{ route('buyer.sertifikat') }}" class="nav-link {{ request()->routeIs('buyer.sertifikat') ? 'active' : '' }}">
                        <i class="bi bi-award"></i>
                        <span>Sertifikat</span>
                    </a>
                </li>

                <!-- Riwayat Transaksi -->
                <li class="nav-item">
                    <a href="{{ route('buyer.riwayat') }}" class="nav-link {{ request()->routeIs('buyer.riwayat') ? 'active' : '' }}">
                        <i class="bi bi-clock-history"></i>
                        <span>Riwayat Transaksi</span>
                    </a>
                </li>

                <!-- Pengaturan (Dropdown) -->
                <li class="nav-item">
                    <a href="#pengaturanSubmenu" class="nav-link {{ request()->routeIs('buyer.keamanan','buyer.pembayaran','buyer.notifikasi','buyer.bantuan','buyer.kebijakan','buyer.hapusakun') ? 'active' : '' }}" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('buyer.keamanan','buyer.pembayaran','buyer.notifikasi','buyer.bantuan','buyer.kebijakan','buyer.hapusakun') ? 'true' : 'false' }}">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-gear"></i>
                            <span>Pengaturan</span>
                        </div>
                        <i class="bi bi-chevron-down collapse-icon"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('buyer.keamanan','buyer.pembayaran','buyer.notifikasi','buyer.bantuan','buyer.kebijakan','buyer.hapusakun') ? 'show' : '' }}" id="pengaturanSubmenu">
                        <ul class="nav flex-column submenu">
                            <li class="nav-item">
                                <a href="{{ route('buyer.keamanan') }}" class="nav-link {{ request()->routeIs('buyer.keamanan') ? 'active' : '' }}">
                                    Keamanan & Akun
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.pembayaran') }}" class="nav-link {{ request()->routeIs('buyer.pembayaran') ? 'active' : '' }}">
                                    Metode Pembayaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.notifikasi') }}" class="nav-link {{ request()->routeIs('buyer.notifikasi') ? 'active' : '' }}">
                                    Notifikasi & Bahasa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.bantuan') }}" class="nav-link {{ request()->routeIs('buyer.bantuan') ? 'active' : '' }}">
                                    Pusat Bantuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.kebijakan') }}" class="nav-link {{ request()->routeIs('buyer.kebijakan') ? 'active' : '' }}">
                                    Kebijakan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.hapusakun') }}" class="nav-link {{ request()->routeIs('buyer.hapusakun') ? 'active' : '' }}">
                                    Ajukan Penghapusan Akun
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Keluar -->
                <li class="nav-item logout-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();" class="nav-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                    <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Mobile Toggle Button -->
<button class="sidebar-toggle d-lg-none" id="sidebarToggle">
    <i class="bi bi-list"></i>
</button>