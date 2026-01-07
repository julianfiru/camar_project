{{-- Sidebar Component for Auditor Dashboard --}}
<aside class="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">🌊</div>
            CAMAR
        </div>
    </div>

    <div class="user-profile">
        <img src="{{ $photoUrl }}" alt="Profile" class="user-avatar-img">
        <div class="user-info">
            <div class="user-name">{{ $displayName }}</div>
            <div class="user-role">{{ $roleLabel }}</div>
        </div>
    </div>

    <nav class="sidebar-nav">
        <a href="{{ route('auditor.dashboard') }}" class="nav-item {{ Request::routeIs('auditor.dashboard') ? 'active' : '' }}">
            <span class="nav-icon">📊</span>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('auditor.menunggu-verifikasi') }}" class="nav-item {{ Request::routeIs('auditor.menunggu-verifikasi') ? 'active' : '' }}">
            <span class="nav-icon">⏳</span>
            <span>Menunggu Verifikasi</span>
            <span class="nav-badge">12</span>
        </a>
        
        <a href="{{ route('auditor.verifikasi-proyek') }}" class="nav-item {{ Request::routeIs('auditor.verifikasi-proyek') ? 'active' : '' }}">
            <span class="nav-icon">✅</span>
            <span>Verifikasi Proyek</span>
        </a>
        
        <a href="{{ route('auditor.upload-laporan') }}" class="nav-item {{ Request::routeIs('auditor.upload-laporan') ? 'active' : '' }}">
            <span class="nav-icon">📤</span>
            <span>Upload Laporan</span>
        </a>
        
        <a href="{{ route('auditor.arsip-verifikasi') }}" class="nav-item {{ Request::routeIs('auditor.arsip-verifikasi') ? 'active' : '' }}">
            <span class="nav-icon">📁</span>
            <span>Arsip Verifikasi</span>
        </a>
        
        <a href="{{ route('auditor.pengaturan') }}" class="nav-item {{ Request::routeIs('auditor.pengaturan') ? 'active' : '' }}" style="margin-top: auto;">
            <span class="nav-icon">⚙️</span>
            <span>Pengaturan</span>
        </a>
        
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="nav-item" style="background: none; border: none; width: 100%; text-align: left; padding: .75rem 1rem; color: inherit;">
                <span class="nav-icon">🚪</span>
                <span>Keluar</span>
            </button>
        </form>
    </nav>
</aside>