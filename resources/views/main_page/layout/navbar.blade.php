<!-- Navbar Component -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-camar.svg') }}" alt="CAMAR Logo" class="logo-img">
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
                    <div class="user-profile-section">
                        <span class="user-display-name">
                            @if(auth()->user()->role === 'buyer' && auth()->user()->buyer)
                                {{ auth()->user()->buyer->company_name }}
                            @elseif(auth()->user()->role === 'seller' && auth()->user()->seller)
                                {{ auth()->user()->seller->company_name }}
                            @else
                                {{ explode('@', auth()->user()->email)[0] }}
                            @endif
                        </span>
                        <div class="dropdown">
                            <a class="profile-avatar" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->role === 'buyer' && auth()->user()->buyer && auth()->user()->buyer->profile_photo)
                                    <img src="{{ asset('storage/' . auth()->user()->buyer->profile_photo) }}" alt="Profile">
                                @elseif(auth()->user()->role === 'seller' && auth()->user()->seller && auth()->user()->seller->profile_photo)
                                    <img src="{{ asset('storage/' . auth()->user()->seller->profile_photo) }}" alt="Profile">
                                @else
                                    <div class="avatar-placeholder">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i> Profil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
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
                @else
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>