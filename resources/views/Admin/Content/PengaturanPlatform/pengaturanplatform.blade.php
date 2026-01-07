@extends('Admin.Layout.app')

@section('title', 'Pengaturan Platform - CAMAR Admin')

@section('page-title', 'Pengaturan Platform')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengaturan Platform</li>
@endsection

@section('Admin.Content')
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="settings-nav">
                <div class="settings-nav-item active" data-section="general">
                    <i class="bi bi-gear me-2"></i> Pengaturan Umum
                </div>
                <div class="settings-nav-item" data-section="appearance">
                    <i class="bi bi-palette me-2"></i> Tampilan
                </div>
                <div class="settings-nav-item" data-section="notifications">
                    <i class="bi bi-bell me-2"></i> Notifikasi
                </div>
                <div class="settings-nav-item" data-section="security">
                    <i class="bi bi-shield-lock me-2"></i> Keamanan
                </div>
                <div class="settings-nav-item" data-section="api">
                    <i class="bi bi-plug me-2"></i> API & Integrasi
                </div>
                <div class="settings-nav-item" data-section="carbon">
                    <i class="bi bi-tree me-2"></i> Standar Karbon
                </div>
                <div class="settings-nav-item" data-section="backup">
                    <i class="bi bi-database me-2"></i> Backup & Recovery
                </div>
                <div class="settings-nav-item" data-section="advanced">
                    <i class="bi bi-lightning me-2"></i> Advanced
                </div>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="col-lg-9 col-md-8">
            <!-- General Settings -->
            <div class="settings-section active" id="general">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-gear me-2"></i>Pengaturan Umum
                    </h3>
                    <p class="text-muted mb-4">Konfigurasi dasar platform CAMAR</p>

                    <div class="alert alert-success" role="alert">
                        <h6 class="alert-heading mb-2">
                            <i class="bi bi-check-circle me-2"></i>Platform Status: Aktif
                        </h6>
                        <p class="mb-0 small">Semua sistem berjalan normal. Terakhir diperbarui: 24 Des 2024, 14:30 WIB</p>
                    </div>

                    <div class="mb-3">
                        <label for="platformName" class="form-label fw-semibold">Nama Platform</label>
                        <input type="text" class="form-control" id="platformName" value="CAMAR - Carbon Market Indonesia">
                    </div>

                    <div class="mb-3">
                        <label for="tagline" class="form-label fw-semibold">Tagline</label>
                        <input type="text" class="form-control" id="tagline" value="Marketplace Offset Karbon Terpercaya">
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="contactEmail" class="form-label fw-semibold">Email Kontak</label>
                            <input type="email" class="form-control" id="contactEmail" value="contact@camar.id">
                        </div>
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label fw-semibold">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="phoneNumber" value="+62 21 1234 5678">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="officeAddress" class="form-label fw-semibold">Alamat Kantor</label>
                        <textarea class="form-control" id="officeAddress" rows="3">Jl. Sudirman No. 123, Jakarta Selatan 12190, Indonesia</textarea>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="timezone" class="form-label fw-semibold">Zona Waktu</label>
                            <select class="form-select" id="timezone">
                                <option selected>WIB - Jakarta (UTC+7)</option>
                                <option>WITA - Makassar (UTC+8)</option>
                                <option>WIT - Jayapura (UTC+9)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="language" class="form-label fw-semibold">Bahasa Default</label>
                            <select class="form-select" id="language">
                                <option selected>Bahasa Indonesia</option>
                                <option>English</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Reset ke Default
                        </button>
                    </div>
                </div>
            </div>

            <!-- Appearance Settings -->
            <div class="settings-section" id="appearance">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-palette me-2"></i>Tampilan
                    </h3>
                    <p class="text-muted mb-4">Personalisasi tampilan dan branding platform</p>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Logo Platform</label>
                        <div class="file-upload-zone">
                            <i class="bi bi-image file-upload-icon"></i>
                            <div>
                                <strong>Klik untuk upload logo</strong><br>
                                <small class="text-muted">Format: PNG, JPG, SVG | Max: 2MB</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Favicon</label>
                        <div class="file-upload-zone">
                            <i class="bi bi-star file-upload-icon"></i>
                            <div>
                                <strong>Klik untuk upload favicon</strong><br>
                                <small class="text-muted">Format: ICO, PNG | Ukuran: 32x32px atau 64x64px</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Palet Warna</label>
                        <small class="d-block text-muted mb-3">Sesuaikan warna utama platform</small>
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <label class="form-label small">Primary</label>
                                <input type="color" class="form-control form-control-color" value="#DDF4E7">
                                <input type="text" class="form-control form-control-sm mt-2" value="#DDF4E7">
                            </div>
                            <div class="col-md-3 col-6">
                                <label class="form-label small">Secondary</label>
                                <input type="color" class="form-control form-control-color" value="#67C090">
                                <input type="text" class="form-control form-control-sm mt-2" value="#67C090">
                            </div>
                            <div class="col-md-3 col-6">
                                <label class="form-label small">Tertiary</label>
                                <input type="color" class="form-control form-control-color" value="#26667F">
                                <input type="text" class="form-control form-control-sm mt-2" value="#26667F">
                            </div>
                            <div class="col-md-3 col-6">
                                <label class="form-label small">Accent</label>
                                <input type="color" class="form-control form-control-color" value="#124170">
                                <input type="text" class="form-control form-control-sm mt-2" value="#124170">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="fontFamily" class="form-label fw-semibold">Font Utama</label>
                        <select class="form-select" id="fontFamily">
                            <option selected>Ubuntu</option>
                            <option>Inter</option>
                            <option>Roboto</option>
                            <option>Open Sans</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-eye me-2"></i>Preview Perubahan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="settings-section" id="notifications">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-bell me-2"></i>Notifikasi
                    </h3>
                    <p class="text-muted mb-4">Atur preferensi notifikasi sistem</p>

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Notifikasi Email</label>
                        
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Proyek Baru Diajukan</div>
                                <div class="toggle-desc">Kirim email saat ada proyek baru yang perlu direview</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="notifNewProject" checked>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Transaksi Baru</div>
                                <div class="toggle-desc">Notifikasi untuk setiap transaksi offset karbon</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="notifTransaction" checked>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Laporan Harian</div>
                                <div class="toggle-desc">Ringkasan aktivitas platform setiap hari</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="notifDaily">
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Aktivitas Mencurigakan</div>
                                <div class="toggle-desc">Alert untuk aktivitas tidak biasa atau potensial fraud</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="notifSuspicious" checked>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="notifEmails" class="form-label fw-semibold">Email Penerima Notifikasi</label>
                        <small class="d-block text-muted mb-2">Email akan dikirim ke alamat berikut (pisahkan dengan koma)</small>
                        <textarea class="form-control" id="notifEmails" rows="3">admin@camar.id, supervisor@camar.id</textarea>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-envelope me-2"></i>Kirim Test Email
                        </button>
                    </div>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="settings-section" id="security">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-shield-lock me-2"></i>Keamanan
                    </h3>
                    <p class="text-muted mb-4">Konfigurasi keamanan dan akses platform</p>

                    <div class="alert alert-warning" role="alert">
                        <h6 class="alert-heading mb-2">
                            <i class="bi bi-exclamation-triangle me-2"></i>Perhatian
                        </h6>
                        <p class="mb-0 small">Perubahan pengaturan keamanan dapat mempengaruhi akses pengguna. Pastikan Anda memahami implikasi dari setiap perubahan.</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Kebijakan Password</label>
                        
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Wajib Kompleksitas Password</div>
                                <div class="toggle-desc">Minimal 8 karakter, huruf besar, kecil, angka, dan simbol</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="securityComplex" checked>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Wajib Ganti Password Berkala</div>
                                <div class="toggle-desc">Pengguna harus mengganti password setiap 90 hari</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="securityPeriodic">
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Two-Factor Authentication (2FA)</div>
                                <div class="toggle-desc">Wajibkan 2FA untuk semua admin</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="security2FA" checked>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="loginAttempts" class="form-label fw-semibold">Batas Login Gagal</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="loginAttempts" value="5" min="3" max="10">
                                <span class="input-group-text">percobaan</span>
                            </div>
                            <small class="text-muted">Akun akan dikunci setelah melebihi batas</small>
                        </div>
                        <div class="col-md-6">
                            <label for="sessionTimeout" class="form-label fw-semibold">Durasi Session Timeout</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="sessionTimeout" value="30" min="15" max="120">
                                <span class="input-group-text">menit</span>
                            </div>
                            <small class="text-muted">Session akan otomatis logout setelah tidak aktif</small>
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Force Logout All Users
                        </button>
                    </div>
                </div>
            </div>

            <!-- API Settings -->
            <div class="settings-section" id="api">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-plug me-2"></i>API & Integrasi
                    </h3>
                    <p class="text-muted mb-4">Manajemen API keys dan integrasi eksternal</p>

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Status API</label>
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Enable Public API</div>
                                <div class="toggle-desc">Izinkan akses API untuk developer eksternal</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="apiPublic" checked>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="apiDocUrl" class="form-label fw-semibold">API Documentation URL</label>
                        <input type="url" class="form-control" id="apiDocUrl" value="https://api.camar.id/docs">
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-key me-2"></i>Generate New API Key
                        </button>
                    </div>
                </div>
            </div>

            <!-- Carbon Standards -->
            <div class="settings-section" id="carbon">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-tree me-2"></i>Standar Karbon
                    </h3>
                    <p class="text-muted mb-4">Konfigurasi standar dan metodologi karbon</p>

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Standar yang Didukung</label>
                        
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Verra (VCS)</div>
                                <div class="toggle-desc">Verified Carbon Standard</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="carbonVerra" checked>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Gold Standard</div>
                                <div class="toggle-desc">Gold Standard for the Global Goals</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="carbonGold" checked>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">CAR</div>
                                <div class="toggle-desc">Climate Action Reserve</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="carbonCAR">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Backup Settings -->
            <div class="settings-section" id="backup">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-database me-2"></i>Backup & Recovery
                    </h3>
                    <p class="text-muted mb-4">Pengaturan backup otomatis dan recovery data</p>

                    <div class="alert alert-success" role="alert">
                        <h6 class="alert-heading mb-2">
                            <i class="bi bi-check-circle me-2"></i>Backup Terakhir
                        </h6>
                        <p class="mb-0 small">24 Des 2024, 03:00 WIB - Semua data berhasil di-backup (2.4 GB)</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Backup Otomatis</label>
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Enable Auto Backup</div>
                                <div class="toggle-desc">Backup otomatis setiap hari pukul 03:00 WIB</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="backupAuto" checked>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-download me-2"></i>Backup Sekarang
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Restore dari Backup
                        </button>
                    </div>
                </div>
            </div>

            <!-- Advanced Settings -->
            <div class="settings-section" id="advanced">
                <div class="content-section">
                    <h3 class="section-title mb-3">
                        <i class="bi bi-lightning me-2"></i>Advanced
                    </h3>
                    <p class="text-muted mb-4">Pengaturan lanjutan untuk developer</p>

                    <div class="alert alert-warning" role="alert">
                        <h6 class="alert-heading mb-2">
                            <i class="bi bi-exclamation-triangle me-2"></i>Zona Berbahaya
                        </h6>
                        <p class="mb-0 small">Pengaturan di bagian ini dapat mempengaruhi performa dan stabilitas platform. Hanya ubah jika Anda mengerti konsekuensinya.</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Mode Khusus</label>
                        
                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Enable Debug Mode</div>
                                <div class="toggle-desc">Tampilkan error messages detail (tidak disarankan untuk production)</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="advDebug">
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-title">Enable Maintenance Mode</div>
                                <div class="toggle-desc">Matikan akses platform sementara untuk maintenance</div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="advMaintenance">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary">
                            <i class="bi bi-save me-2"></i>Simpan Perubahan
                        </button>
                        <button class="btn btn-danger">
                            <i class="bi bi-trash me-2"></i>Clear All Cache
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Settings Navigation
        const navItems = document.querySelectorAll('.settings-nav-item');
        const sections = document.querySelectorAll('.settings-section');
        
        navItems.forEach(item => {
            item.addEventListener('click', function() {
                const sectionId = this.getAttribute('data-section');
                
                // Remove active class from all items
                navItems.forEach(nav => nav.classList.remove('active'));
                sections.forEach(section => section.classList.remove('active'));
                
                // Add active class to clicked item
                this.classList.add('active');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    });
</script>
@endpush