@extends('Auditor.layouts.app')

@section('title', 'Pengaturan - CAMAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Auditor/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Auditor/pengaturan.css') }}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Pengaturan</h1>
        <p class="page-subtitle">Personalisasi tampilan dan preferensi dashboard Anda</p>
    </div>

    <div class="settings-grid">
        <!-- Appearance Settings -->
        <div class="settings-section">
            <div class="section-header">
                <div class="section-icon">🎨</div>
                <div>
                    <div class="section-title">Tampilan & Tema</div>
                    <div class="section-subtitle">Sesuaikan tema dan warna interface</div>
                </div>
            </div>

            <div class="settings-options">
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Mode Gelap</div>
                        <div class="setting-description">Aktifkan mode gelap untuk tampilan yang lebih nyaman di mata</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="darkMode" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Warna Aksen</div>
                        <div class="setting-description">Pilih warna utama untuk dashboard</div>
                    </div>
                    <div class="color-options">
                        <div class="color-option active" style="background: #67C090;" data-color="green"></div>
                        <div class="color-option" style="background: #26667F;" data-color="teal"></div>
                        <div class="color-option" style="background: #3B82F6;" data-color="blue"></div>
                        <div class="color-option" style="background: #8B5CF6;" data-color="purple"></div>
                        <div class="color-option" style="background: #F59E0B;" data-color="amber"></div>
                    </div>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Animasi Interface</div>
                        <div class="setting-description">Efek transisi dan animasi halus</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="animations" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Display Settings -->
        <div class="settings-section">
            <div class="section-header">
                <div class="section-icon">📱</div>
                <div>
                    <div class="section-title">Tampilan Dashboard</div>
                    <div class="section-subtitle">Atur layout dan informasi yang ditampilkan</div>
                </div>
            </div>

            <div class="settings-options">
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Kepadatan Informasi</div>
                        <div class="setting-description">Atur seberapa banyak informasi yang ditampilkan</div>
                    </div>
                    <select class="form-select" id="density">
                        <option value="compact">Compact</option>
                        <option value="comfortable" selected>Comfortable</option>
                        <option value="spacious">Spacious</option>
                    </select>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Ukuran Font</div>
                        <div class="setting-description">Perbesar atau perkecil ukuran teks</div>
                    </div>
                    <select class="form-select" id="fontSize">
                        <option value="small">Kecil</option>
                        <option value="medium" selected>Sedang</option>
                        <option value="large">Besar</option>
                    </select>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Tampilkan Sidebar</div>
                        <div class="setting-description">Sidebar navigasi selalu terlihat</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="showSidebar" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Tampilkan Grafik Animasi</div>
                        <div class="setting-description">Animasi pada chart dan statistik</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="chartAnimations" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="settings-section">
            <div class="section-header">
                <div class="section-icon">🔔</div>
                <div>
                    <div class="section-title">Notifikasi</div>
                    <div class="section-subtitle">Kelola pemberitahuan dan pengingat</div>
                </div>
            </div>

            <div class="settings-options">
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Proyek Baru Masuk</div>
                        <div class="setting-description">Notifikasi saat ada proyek baru untuk diverifikasi</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="notifNewProject" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Deadline Mendekati</div>
                        <div class="setting-description">Peringatan 3 hari sebelum deadline verifikasi</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="notifDeadline" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Laporan MRV Baru</div>
                        <div class="setting-description">Notifikasi saat seller upload laporan MRV</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="notifMRV" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Email Notifikasi</div>
                        <div class="setting-description">Kirim notifikasi juga ke email</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="notifEmail">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Data & Privacy -->
        <div class="settings-section">
            <div class="section-header">
                <div class="section-icon">🔒</div>
                <div>
                    <div class="section-title">Data & Privasi</div>
                    <div class="section-subtitle">Kelola data dan keamanan akun</div>
                </div>
            </div>

            <div class="settings-options">
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Auto-save Draft</div>
                        <div class="setting-description">Simpan draft verifikasi otomatis setiap 5 menit</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="autoSave" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Session Timeout</div>
                        <div class="setting-description">Waktu logout otomatis saat tidak aktif</div>
                    </div>
                    <select class="form-select" id="sessionTimeout">
                        <option value="15">15 menit</option>
                        <option value="30" selected>30 menit</option>
                        <option value="60">1 jam</option>
                        <option value="120">2 jam</option>
                    </select>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Two-Factor Authentication</div>
                        <div class="setting-description">Keamanan tambahan untuk login</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="twoFactor">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Advanced Settings -->
        <div class="settings-section">
            <div class="section-header">
                <div class="section-icon">⚙️</div>
                <div>
                    <div class="section-title">Lanjutan</div>
                    <div class="section-subtitle">Pengaturan untuk pengguna advanced</div>
                </div>
            </div>

            <div class="settings-options">
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Bahasa Interface</div>
                        <div class="setting-description">Pilih bahasa tampilan dashboard</div>
                    </div>
                    <select class="form-select" id="language">
                        <option value="id" selected>Bahasa Indonesia</option>
                        <option value="en">English</option>
                    </select>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Format Tanggal</div>
                        <div class="setting-description">Format tampilan tanggal</div>
                    </div>
                    <select class="form-select" id="dateFormat">
                        <option value="dd-mm-yyyy" selected>DD/MM/YYYY</option>
                        <option value="mm-dd-yyyy">MM/DD/YYYY</option>
                        <option value="yyyy-mm-dd">YYYY-MM-DD</option>
                    </select>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Format Angka</div>
                        <div class="setting-description">Pemisah ribuan dan desimal</div>
                    </div>
                    <select class="form-select" id="numberFormat">
                        <option value="id" selected>1.234,56 (ID)</option>
                        <option value="en">1,234.56 (US)</option>
                    </select>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">Developer Mode</div>
                        <div class="setting-description">Tampilkan informasi debug</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" id="developerMode">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Buttons -->
    <div class="settings-section">
        <div class="alert">
            <div class="alert-icon">💡</div>
            <div>Perubahan akan disimpan dan langsung diterapkan setelah Anda klik tombol "Simpan Pengaturan"</div>
        </div>
        <div class="btn-group">
            <button class="btn btn-secondary" id="resetBtn">Reset ke Default</button>
            <button class="btn btn-primary" id="saveBtn">💾 Simpan Pengaturan</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/Auditor/pengaturan.js') }}"></script>
@endpush