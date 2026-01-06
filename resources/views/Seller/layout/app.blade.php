<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CAMAR')</title>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/seller/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/seller/performa.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
</head>
    <body data-theme="">
        <div class="container">
            <aside class="sidebar d-flex flex-column flex-shrink-0 vh-100 fixed-top" id="sidebar">
                <div class="logo p-4 mb-3" onclick="navigateTo('dashboard')">
                    CAMAR
                </div>
                <ul class="nav nav-pills flex-column mb-auto w-100 p-0">
                    <li class="nav-item mb-2">
                        <a href="{{ url('/Dashboard') }}" class="nav-link d-flex align-items-center" data-page="dashboard">
                            <svg class="bi me-3" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/Profil') }}" class="nav-link d-flex align-items-center" data-page="profile">
                            <svg class="bi me-3" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            <span>Profil Perusahaan</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/Proyek') }}" class="nav-link d-flex align-items-center" data-page="projects">
                            <svg class="bi me-3" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                            <span>Proyek</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/Penjualan') }}" class="nav-link d-flex align-items-center" data-page="sales">
                            <svg class="bi me-3" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                            <span>Penjualan Offset</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/Customer') }}" class="nav-link d-flex align-items-center" data-page="sales">
                                <svg class="bi me-3" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4 0 1 1 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.037 1.06-2.825.137-.156.286-.293.43-.414zM2 13a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            <span>Customer</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/Performa') }}" class="nav-link d-flex align-items-center" data-page="performance">
                            <svg class="bi me-3" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Performa</span>
                        </a>
                    </li>
                </ul>
            </aside>
            <main class="main-content {{ Request::is('Proyek') ? 'ProyekCard' : '' }}">
                <div class="container-fluid p-0">
                    <div class="d-flex justify-content-between align-items-center mb-4 bs">
                        <div >
                            <h2 class="fw-bold mb-1">@yield('page-title', 'Dashboard Seller')</h2>
                            <p class="mb-0">@yield('page-subtitle', 'Selamat datang kembali! 👋')</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-end d-none d-sm-block">
                                <p class="fw-bold mb-2">{{ $companyName }}</p>
                                <span class="badge rounded-pill px-3 py-2 fw-bold" style="{{ $badgeStyle }}"> 
                                    {{ $badgeLevel }}
                                </span>
                            </div>
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold company-logo overflow-hidden bg-secondary" 
                                style="width: 45px; height: 45px; min-width: 45px;">
                                
                                <img src="{{ asset($photoUrl) }}" 
                                    alt="Profile" 
                                    class="w-100 h-100" 
                                    style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function navigateTo(page) {
                document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                
                document.getElementById(page).classList.add('active');
                document.querySelector(`[data-page="${page}"]`).classList.add('active');
            }
            document.addEventListener("DOMContentLoaded", function() {
                const currentLocation = window.location.href;
                const menuItems = document.querySelectorAll('.nav-link');
                menuItems.forEach(link => {
                    if (link.href === currentLocation) {
                        link.classList.add('active');
                    }
                });
            });
        </script>
        @stack('scripts')
    </body>
</html>