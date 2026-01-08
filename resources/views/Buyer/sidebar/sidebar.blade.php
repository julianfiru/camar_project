<aside class="sb-sidebar">
    <div class="sb-sidebar-content">
        <!-- Logo -->
        <div class="sb-sidebar-logo text-center mb-5">
            <h1 class="sb-sidebar-brand">
                CAM<span class="sb-brand-highlight">AR</span>
            </h1>
        </div>

        <!-- Navigation Menu -->
        <nav>
            <ul class="nav flex-column sb-sidebar-nav">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('buyer.dashboard') }}" class="sb-nav-link {{ request()->routeIs('buyer.dashboard') ? 'sb-active' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Profil Perusahaan -->
                <li class="nav-item">
                    <a href="{{ route('buyer.profil') }}" class="sb-nav-link {{ request()->routeIs('buyer.profil') ? 'sb-active' : '' }}">
                        <i class="bi bi-building"></i>
                        <span>Profil Perusahaan</span>
                    </a>
                </li>

                <!-- Emisi (Dropdown) -->
                <li class="nav-item">
                    <a href="#sb-emisiSubmenu" class="sb-nav-link {{ request()->routeIs('buyer.emisi.*') ? 'sb-active' : '' }}" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('buyer.emisi.*') ? 'true' : 'false' }}">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-calculator"></i>
                            <span>Emisi</span>
                        </div>
                        <i class="bi bi-chevron-down sb-collapse-icon"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('buyer.emisi.*') ? 'show' : '' }}" id="sb-emisiSubmenu">
                        <ul class="nav flex-column sb-submenu">
                            <li class="nav-item">
                                <a href="{{ route('buyer.emisi.hitung') }}" class="sb-nav-link {{ request()->routeIs('buyer.emisi.hitung') ? 'sb-active' : '' }}">
                                    Hitung Emisi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.emisi.catatan') }}" class="sb-nav-link {{ request()->routeIs('buyer.emisi.catatan') ? 'sb-active' : '' }}">
                                    Catatan Perhitungan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Laporan -->
                <li class="nav-item">
                    <a href="{{ route('buyer.laporan') }}" class="sb-nav-link {{ request()->routeIs('buyer.laporan') ? 'sb-active' : '' }}">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <!-- Sertifikat -->
                <li class="nav-item">
                    <a href="{{ route('buyer.sertifikat') }}" class="sb-nav-link {{ request()->routeIs('buyer.sertifikat') ? 'sb-active' : '' }}">
                        <i class="bi bi-award"></i>
                        <span>Sertifikat</span>
                    </a>
                </li>

                <!-- Riwayat Transaksi -->
                <li class="nav-item">
                    <a href="{{ route('buyer.riwayat') }}" class="sb-nav-link {{ request()->routeIs('buyer.riwayat') ? 'sb-active' : '' }}">
                        <i class="bi bi-clock-history"></i>
                        <span>Riwayat Transaksi</span>
                    </a>
                </li>

                <!-- Pengaturan (Dropdown) -->
                <li class="nav-item">
                    <a href="#sb-pengaturanSubmenu" class="sb-nav-link {{ request()->routeIs('buyer.pengaturan.*') ? 'sb-active' : '' }}" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('buyer.pengaturan.*') ? 'true' : 'false' }}">
                        <div class="d-flex align-items-center flex-grow-1">
                            <i class="bi bi-gear"></i>
                            <span>Pengaturan</span>
                        </div>
                        <i class="bi bi-chevron-down sb-collapse-icon"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('buyer.pengaturan.*') ? 'show' : '' }}" id="sb-pengaturanSubmenu">
                        <ul class="nav flex-column sb-submenu">
                            <li class="nav-item">
                                <a href="{{ route('buyer.pengaturan.keamanan') }}" class="sb-nav-link {{ request()->routeIs('buyer.pengaturan.keamanan') ? 'sb-active' : '' }}">
                                    Keamanan & Akun
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.pengaturan.notifikasi') }}" class="sb-nav-link {{ request()->routeIs('buyer.pengaturan.notifikasi') ? 'sb-active' : '' }}">
                                    Notifikasi & Bahasa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.pengaturan.bantuan') }}" class="sb-nav-link {{ request()->routeIs('buyer.pengaturan.bantuan') ? 'sb-active' : '' }}">
                                    Pusat Bantuan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.pengaturan.kebijakan') }}" class="sb-nav-link {{ request()->routeIs('buyer.pengaturan.kebijakan') ? 'sb-active' : '' }}">
                                    Kebijakan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buyer.pengaturan.hapusakun') }}" class="sb-nav-link {{ request()->routeIs('buyer.pengaturan.hapusakun') ? 'sb-active' : '' }}">
                                    Ajukan Penghapusan Akun
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Keluar -->
                <li class="nav-item sb-logout-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('sb-logout-form-sidebar').submit();" class="sb-nav-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                    <form id="sb-logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- Mobile Toggle Button -->
<button class="sb-sidebar-toggle d-lg-none" id="sb-sidebarToggle">
    <i class="bi bi-list"></i>
</button>