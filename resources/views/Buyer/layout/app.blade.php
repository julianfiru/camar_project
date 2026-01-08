<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CAMAR - Carbon Market Dashboard')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Ubuntu:wght@300;400;500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS - Order matters! -->
    <link href="{{ asset('css/Buyer/global/global.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/header/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/sidebar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/dashboard/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/profil/profil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/emisi/hitung.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/emisi/catatan.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/laporan/laporan.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/sertifikat/sertifikat.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/riwayat/riwayat.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/pengaturan/keamanan.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/pengaturan/notifikasi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/pengaturan/bantuan.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/pengaturan/kebijakan.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Buyer/pengaturan/hapusakun.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    @include('Buyer.sidebar.sidebar')
    
    <!-- Main Content Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('Buyer.header.header')
        
        <!-- Page Content -->
        <main class="main-content">
            @yield('Buyer.content')
        </main>
    </div>
    
    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery (optional, jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/Buyer/dashboard/dashboard.js') }}"></script>
    <script src="{{ asset('js/Buyer/profil/profil.js') }}"></script>
    <script src="{{ asset('js/Buyer/emisi/hitung.js') }}"></script>
    <script src="{{ asset('js/Buyer/emisi/catatan.js') }}"></script>
    <script src="{{ asset('js/Buyer/laporan/laporan.js') }}"></script>
    <script src="{{ asset('js/Buyer/riwayat/riwayat.js') }}"></script>
    <script src="{{ asset('js/Buyer/pengaturan/keamanan.js') }}"></script>
    <script src="{{ asset('js/Buyer/pengaturan/notifikasi.js') }}"></script>
    <script src="{{ asset('js/Buyer/pengaturan/bantuan.js') }}"></script>
    <script src="{{ asset('js/Buyer/pengaturan/kebijakan.js') }}"></script>
    <script src="{{ asset('js/Buyer/pengaturan/hapusakun.js') }}"></script>
    
    @stack('scripts')
</body>
</html>