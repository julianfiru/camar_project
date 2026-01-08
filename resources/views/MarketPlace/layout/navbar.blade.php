<!-- Navbar Component -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/MarketPlace/logo-camar.svg') }}" alt="CAMAR Logo" class="logo-img">
            <span class="brand-text">CAMAR</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kalkulator') ? 'active' : '' }}" href="{{ route('calculator') }}">Kalkulator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('proyek') ? 'active' : '' }}" href="{{ route('projects') }}">Proyek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('edukasi') ? 'active' : '' }}" href="{{ route('edukasi') }}">Edukasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                </li>
            </ul>
            
            <div class="d-flex">
                @auth
                    <!-- User Profile Section -->
                    <div class="user-profile-section d-flex align-items-center">
                        <div class="me-3 text-end d-none d-lg-block">
                            <div class="user-display-name fs-5 fw-bold">{{ $displayName ?? explode('@', auth()->user()->email)[0] }}</div>
                            <div class="user-role small text-muted fw-semibold">{{ $roleLabel ?? '' }}</div>
                        </div>

                        <div class="dropdown">
                            <a class="profile-avatar" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="rounded-circle d-flex align-items-center justify-content-center overflow-hidden bg-secondary" 
                                    style="width: 45px; height: 45px; min-width: 45px;">
                                    <img src="{{ $photoUrl ?? asset('urlProfil/User1.gif') }}" 
                                        alt="Profile" 
                                        class="w-100 h-100" 
                                        style="object-fit: cover;">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    @if(isset($roleSlug) && $roleSlug === 'buyer')
                                        <a class="dropdown-item" href="{{ route('buyer.dashboard') }}"><i class="fas fa-user-circle"></i> Dashboard</a>
                                    @elseif(isset($roleSlug) && $roleSlug === 'seller')
                                        <a class="dropdown-item" href="{{ route('seller.dashboard') }}"><i class="fas fa-user-circle"></i> Dashboard</a>
                                    @elseif(isset($roleSlug) && $roleSlug === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-user-circle"></i> Dashboard</a>
                                    @elseif(isset($roleSlug) && $roleSlug === 'auditor')
                                        <a class="dropdown-item" href="{{ route('auditor.dashboard') }}"><i class="fas fa-user-circle"></i> Dashboard</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('account.status') }}"><i class="fas fa-user-circle"></i> Dashboard</a>
                                    @endif
                                </li>
                                <li>
                                    @if(isset($roleSlug) && $roleSlug === 'buyer')
                                        <a class="dropdown-item" href="{{ route('buyer.pengaturan.keamanan') }}"><i class="fas fa-cog"></i> Pengaturan</a>
                                    @elseif(isset($roleSlug) && $roleSlug === 'seller')
                                        <a class="dropdown-item" href="{{ route('seller.profil') }}"><i class="fas fa-cog"></i> Pengaturan</a>
                                    @else
                                        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Pengaturan</a>
                                    @endif
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>