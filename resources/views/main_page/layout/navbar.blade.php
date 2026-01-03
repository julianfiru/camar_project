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
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            </div>
        </div>
    </div>
</nav>