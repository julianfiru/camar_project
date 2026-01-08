@extends('Buyer.layout.app')

@section('title', 'Keamanan Akun - CAMAR')

@section('page-title', 'Keamanan Akun')
@section('page-subtitle', 'Kelola keamanan akun carbon offset Anda')

@section('Buyer.content')
<!-- Informasi Login -->
<div class="content-section mb-4">
    <h2 class="section-title">Informasi Login</h2>
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="info-card info-card-primary">
                <div class="info-card-body">
                    <div class="info-label">Email Login</div>
                    <div class="info-value">contact@greenenergy.co.id</div>
                    <div class="info-description">Email ini digunakan untuk login ke akun Anda</div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="info-card info-card-warning">
                <div class="info-card-body">
                    <div class="info-label">Role Akun</div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge role-badge">
                            <i class="bi bi-cart-check me-1"></i>BUYER
                        </span>
                        <span class="role-description">Akun Pembeli Carbon Offset</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Password -->
<div class="content-section mb-4">
    <h2 class="section-title">Password</h2>
    <div class="row">
        <div class="col-lg-8">
            <!-- Password Display Mode (Default) -->
            <div id="passwordDisplayMode">
                <div class="password-display-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="password-label">Password Saat Ini</div>
                            <div class="password-masked">••••••••••••</div>
                            <div class="password-info">
                                <i class="bi bi-check-circle-fill text-success me-1"></i>
                                Password terakhir diubah: 15 Desember 2024
                            </div>
                        </div>
                        <button class="btn btn-outline-primary" onclick="openPasswordModal()">
                            <i class="bi bi-pencil-square me-2"></i>Ubah Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Password -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">
                    <i class="bi bi-shield-lock me-2"></i>Ubah Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm" onsubmit="return changePassword(event)">
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">
                            Password Saat Ini <span class="text-danger">*</span>
                        </label>
                        <div class="password-input-wrapper">
                            <span class="input-icon-left">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control ps-5 pe-5" id="currentPassword" 
                                   placeholder="Masukkan password saat ini" required>
                            <button class="input-toggle-btn" type="button" onclick="togglePassword('currentPassword')">
                                <i class="bi bi-eye" id="currentPasswordIcon"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">
                            Password Baru <span class="text-danger">*</span>
                        </label>
                        <div class="password-input-wrapper">
                            <span class="input-icon-left">
                                <i class="bi bi-lock-fill"></i>
                            </span>
                            <input type="password" class="form-control ps-5 pe-5" id="newPassword" 
                                   placeholder="Masukkan password baru" required minlength="8">
                            <button class="input-toggle-btn" type="button" onclick="togglePassword('newPassword')">
                                <i class="bi bi-eye" id="newPasswordIcon"></i>
                            </button>
                        </div>
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Password minimal 8 karakter, kombinasi huruf dan angka
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">
                            Konfirmasi Password Baru <span class="text-danger">*</span>
                        </label>
                        <div class="password-input-wrapper">
                            <span class="input-icon-left">
                                <i class="bi bi-check-circle"></i>
                            </span>
                            <input type="password" class="form-control ps-5 pe-5" id="confirmPassword" 
                                   placeholder="Masukkan ulang password baru" required minlength="8">
                            <button class="input-toggle-btn" type="button" onclick="togglePassword('confirmPassword')">
                                <i class="bi bi-eye" id="confirmPasswordIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Password Strength Indicator -->
                    <div class="password-strength-container mb-4">
                        <div class="strength-label">Kekuatan Password:</div>
                        <div class="strength-bars">
                            <div class="strength-bar" id="bar1"></div>
                            <div class="strength-bar" id="bar2"></div>
                            <div class="strength-bar" id="bar3"></div>
                            <div class="strength-bar" id="bar4"></div>
                        </div>
                        <div class="strength-text" id="strengthText">
                            Masukkan password untuk melihat kekuatan
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Batal
                </button>
                <button type="submit" form="changePasswordForm" class="btn btn-primary">
                    <i class="bi bi-check-circle me-2"></i>Simpan Password Baru
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Aktivitas Login -->
<div class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="section-title mb-1">Aktivitas Login</h2>
            <p class="text-muted small mb-0">
                <i class="bi bi-exclamation-triangle text-warning me-1"></i>
                <strong>SANGAT DISARANKAN:</strong> Periksa aktivitas login Anda secara berkala untuk keamanan akun
            </p>
        </div>
        <button class="btn btn-outline-primary btn-sm" onclick="refreshLoginActivity()">
            <i class="bi bi-arrow-clockwise me-2"></i>Refresh
        </button>
    </div>

    <div id="loginActivityList" class="activity-list">
        <!-- Current Session -->
        <div class="activity-item activity-current" data-device="current">
            <div class="activity-badge">
                <i class="bi bi-circle-fill"></i> SESI AKTIF
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-laptop me-2"></i>Perangkat
                        </div>
                        <div class="activity-value">Windows PC - Chrome</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-geo-alt me-2"></i>Lokasi
                        </div>
                        <div class="activity-value">Jakarta, Indonesia</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-clock me-2"></i>Waktu Login
                        </div>
                        <div class="activity-value">Hari ini, 14:23 WIB</div>
                    </div>
                </div>
            </div>
            
            <div class="activity-details">
                <strong>IP Address:</strong> 103.127.132.45 • 
                <strong>Browser:</strong> Chrome 120.0.6099.129
            </div>
        </div>

        <!-- Other Sessions -->
        <div class="activity-item" data-device="iphone">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-phone me-2"></i>Perangkat
                        </div>
                        <div class="activity-value">iPhone 14 - Safari</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-geo-alt me-2"></i>Lokasi
                        </div>
                        <div class="activity-value">Jakarta, Indonesia</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-clock me-2"></i>Waktu Login
                        </div>
                        <div class="activity-value">2 Jan 2026, 09:15 WIB</div>
                    </div>
                </div>
            </div>
            
            <div class="activity-footer">
                <div class="activity-details">
                    <strong>IP Address:</strong> 103.127.132.45 • 
                    <strong>Browser:</strong> Safari 17.1
                </div>
                <button class="btn btn-outline-danger btn-sm" onclick="logoutDevice('iPhone 14', 'iphone')">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout Perangkat
                </button>
            </div>
        </div>

        <div class="activity-item" data-device="macbook">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-laptop me-2"></i>Perangkat
                        </div>
                        <div class="activity-value">MacBook Pro - Safari</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-geo-alt me-2"></i>Lokasi
                        </div>
                        <div class="activity-value">Bandung, Indonesia</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-clock me-2"></i>Waktu Login
                        </div>
                        <div class="activity-value">28 Des 2025, 16:42 WIB</div>
                    </div>
                </div>
            </div>
            
            <div class="activity-footer">
                <div class="activity-details">
                    <strong>IP Address:</strong> 114.79.54.21 • 
                    <strong>Browser:</strong> Safari 17.0
                </div>
                <button class="btn btn-outline-danger btn-sm" onclick="logoutDevice('MacBook Pro', 'macbook')">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout Perangkat
                </button>
            </div>
        </div>

        <div class="activity-item" data-device="samsung">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-phone me-2"></i>Perangkat
                        </div>
                        <div class="activity-value">Samsung Galaxy S23 - Chrome</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-geo-alt me-2"></i>Lokasi
                        </div>
                        <div class="activity-value">Surabaya, Indonesia</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-info">
                        <div class="activity-label">
                            <i class="bi bi-clock me-2"></i>Waktu Login
                        </div>
                        <div class="activity-value">20 Des 2025, 11:30 WIB</div>
                    </div>
                </div>
            </div>
            
            <div class="activity-footer">
                <div class="activity-details">
                    <strong>IP Address:</strong> 180.252.89.14 • 
                    <strong>Browser:</strong> Chrome Mobile 120.0
                </div>
                <button class="btn btn-outline-danger btn-sm" onclick="logoutDevice('Samsung Galaxy S23', 'samsung')">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout Perangkat
                </button>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <button class="btn btn-outline-danger" onclick="logoutAllDevices()">
            <i class="bi bi-box-arrow-right me-2"></i>Logout Dari Semua Perangkat
        </button>
    </div>
</div>

<!-- Alert Modal for Notifications -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content alert-modal-content">
            <div class="modal-body text-center p-4">
                <div class="alert-icon mb-3" id="alertIcon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <h5 class="alert-title mb-3" id="alertTitle">Notifikasi</h5>
                <p class="alert-message" id="alertMessage">Pesan notifikasi akan muncul di sini</p>
                <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

@endsection