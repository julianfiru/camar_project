@extends('Auditor.layouts.app')

@section('title', 'Menunggu Verifikasi - CAMAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Auditor/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Auditor/menunggu-verifikasi.css') }}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Menunggu Verifikasi</h1>
            <p class="page-subtitle">12 proyek memerlukan verifikasi auditor</p>
        </div>
        <div class="header-actions">
            <span class="status-badge pending">⏳ 12 Pending</span>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <div class="filter-group">
            <span class="filter-label">Tipe Proyek:</span>
            <select class="select-box" id="filterType">
                <option>Semua Tipe</option>
                <option>Reforestation & Afforestation</option>
                <option>Renewable Energy</option>
                <option>Blue Carbon</option>
                <option>Peatland Conservation</option>
                <option>Waste Management</option>
            </select>
        </div>

        <div class="filter-group">
            <span class="filter-label">Durasi:</span>
            <select class="select-box" id="filterDuration">
                <option>Semua Durasi</option>
                <option>1 Tahun</option>
                <option>2 Tahun</option>
                <option>3 Tahun</option>
            </select>
        </div>

        <input type="text" class="search-box" id="searchBox" placeholder="🔍 Cari proyek atau seller...">
    </div>

    <!-- Projects Grid -->
    <div class="projects-grid">
        <!-- Project Card 1 -->
        <div class="project-card" data-type="Reforestation & Afforestation" data-duration="3">
            <div class="project-header">
                <div class="project-info">
                    <div class="project-name">Reforestasi Kalimantan Timur</div>
                    <div class="project-meta">
                        <div class="meta-item">
                            <span class="meta-icon">🏢</span>
                            <span>PT Hijau Lestari</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">🌱</span>
                            <span>Reforestation & Afforestation</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">📅</span>
                            <span>Diajukan: 20 Des 2025</span>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; align-items: flex-end;">
                    <div class="status-badge pending">Pending</div>
                    <div class="priority-badge">🔥 Prioritas Tinggi</div>
                </div>
            </div>

            <div class="project-details">
                <div class="detail-item">
                    <div class="detail-label">Total Kapasitas</div>
                    <div class="detail-value highlight">25,000 ton CO₂</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Kapasitas Tersedia</div>
                    <div class="detail-value">18,750 ton</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Durasi Proyek</div>
                    <div class="detail-value">3 Tahun</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Periode MRV</div>
                    <div class="detail-value">6 Bulan</div>
                </div>
            </div>

            <div class="capacity-visual">
                <div class="capacity-bar">
                    <div class="capacity-fill" style="width: 75%;"></div>
                </div>
                <div class="capacity-label">
                    <span>Terpakai: 6,250 ton (25%)</span>
                    <span>Tersisa: 75%</span>
                </div>
            </div>

            <div class="mrv-timeline">
                <div class="timeline-header">
                    📋 Timeline Laporan MRV (6 Bulanan)
                </div>
                <div class="timeline-list">
                    <div class="timeline-item submitted">
                        <div class="timeline-period">
                            <div class="period-label">Periode 1</div>
                            <div class="period-date">Jan 2025 - Jun 2025</div>
                        </div>
                        <div class="timeline-status submitted">✓ Submitted</div>
                        <a href="#" class="document-link">📄 Lihat Dokumen</a>
                    </div>
                    <div class="timeline-item pending">
                        <div class="timeline-period">
                            <div class="period-label">Periode 2</div>
                            <div class="period-date">Jul 2025 - Des 2025</div>
                        </div>
                        <div class="timeline-status pending">⏳ Menunggu</div>
                    </div>
                    <div class="timeline-item pending">
                        <div class="timeline-period">
                            <div class="period-label">Periode 3</div>
                            <div class="period-date">Jan 2026 - Jun 2026</div>
                        </div>
                        <div class="timeline-status pending">⏳ Menunggu</div>
                    </div>
                </div>
            </div>

            <div class="project-actions">
                <button class="btn btn-primary">
                    ✅ Mulai Verifikasi
                </button>
                <button class="btn btn-secondary">
                    📄 Detail Lengkap
                </button>
            </div>
        </div>

        <!-- Project Card 2 -->
        <div class="project-card" data-type="Renewable Energy" data-duration="2">
            <div class="project-header">
                <div class="project-info">
                    <div class="project-name">Solar Farm Nusa Tenggara</div>
                    <div class="project-meta">
                        <div class="meta-item">
                            <span class="meta-icon">🏢</span>
                            <span>CV Energi Matahari</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">☀️</span>
                            <span>Renewable Energy</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">📅</span>
                            <span>Diajukan: 18 Des 2025</span>
                        </div>
                    </div>
                </div>
                <div class="status-badge pending">Pending</div>
            </div>

            <div class="project-details">
                <div class="detail-item">
                    <div class="detail-label">Total Kapasitas</div>
                    <div class="detail-value highlight">15,000 ton CO₂</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Kapasitas Tersedia</div>
                    <div class="detail-value">9,000 ton</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Durasi Proyek</div>
                    <div class="detail-value">2 Tahun</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Periode MRV</div>
                    <div class="detail-value">6 Bulan</div>
                </div>
            </div>

            <div class="capacity-visual">
                <div class="capacity-bar">
                    <div class="capacity-fill" style="width: 60%;"></div>
                </div>
                <div class="capacity-label">
                    <span>Terpakai: 6,000 ton (40%)</span>
                    <span>Tersisa: 60%</span>
                </div>
            </div>

            <div class="mrv-timeline">
                <div class="timeline-header">
                    📋 Timeline Laporan MRV (6 Bulanan)
                </div>
                <div class="timeline-list">
                    <div class="timeline-item submitted">
                        <div class="timeline-period">
                            <div class="period-label">Periode 1</div>
                            <div class="period-date">Jan 2025 - Jun 2025</div>
                        </div>
                        <div class="timeline-status submitted">✓ Submitted</div>
                        <a href="#" class="document-link">📄 Lihat Dokumen</a>
                    </div>
                    <div class="timeline-item pending">
                        <div class="timeline-period">
                            <div class="period-label">Periode 2</div>
                            <div class="period-date">Jul 2025 - Des 2025</div>
                        </div>
                        <div class="timeline-status pending">⏳ Menunggu</div>
                    </div>
                </div>
            </div>

            <div class="project-actions">
                <button class="btn btn-primary">
                    ✅ Mulai Verifikasi
                </button>
                <button class="btn btn-secondary">
                    📄 Detail Lengkap
                </button>
            </div>
        </div>

        <!-- Project Card 3 -->
        <div class="project-card" data-type="Blue Carbon" data-duration="3">
            <div class="project-header">
                <div class="project-info">
                    <div class="project-name">Mangrove Restoration Sulawesi</div>
                    <div class="project-meta">
                        <div class="meta-item">
                            <span class="meta-icon">🏢</span>
                            <span>Yayasan Pesisir Hijau</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">🌊</span>
                            <span>Blue Carbon</span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-icon">📅</span>
                            <span>Diajukan: 15 Des 2025</span>
                        </div>
                    </div>
                </div>
                <div class="status-badge pending">Pending</div>
            </div>

            <div class="project-details">
                <div class="detail-item">
                    <div class="detail-label">Total Kapasitas</div>
                    <div class="detail-value highlight">12,500 ton CO₂</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Kapasitas Tersedia</div>
                    <div class="detail-value">10,625 ton</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Durasi Proyek</div>
                    <div class="detail-value">3 Tahun</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Periode MRV</div>
                    <div class="detail-value">6 Bulan</div>
                </div>
            </div>

            <div class="capacity-visual">
                <div class="capacity-bar">
                    <div class="capacity-fill" style="width: 85%;"></div>
                </div>
                <div class="capacity-label">
                    <span>Terpakai: 1,875 ton (15%)</span>
                    <span>Tersisa: 85%</span>
                </div>
            </div>

            <div class="mrv-timeline">
                <div class="timeline-header">
                    📋 Timeline Laporan MRV (6 Bulanan)
                </div>
                <div class="timeline-list">
                    <div class="timeline-item submitted">
                        <div class="timeline-period">
                            <div class="period-label">Periode 1</div>
                            <div class="period-date">Jan 2025 - Jun 2025</div>
                        </div>
                        <div class="timeline-status submitted">✓ Submitted</div>
                        <a href="#" class="document-link">📄 Lihat Dokumen</a>
                    </div>
                    <div class="timeline-item pending">
                        <div class="timeline-period">
                            <div class="period-label">Periode 2</div>
                            <div class="period-date">Jul 2025 - Des 2025</div>
                        </div>
                        <div class="timeline-status pending">⏳ Menunggu</div>
                    </div>
                    <div class="timeline-item pending">
                        <div class="timeline-period">
                            <div class="period-label">Periode 3</div>
                            <div class="period-date">Jan 2026 - Jun 2026</div>
                        </div>
                        <div class="timeline-status pending">⏳ Menunggu</div>
                    </div>
                </div>
            </div>

            <div class="project-actions">
                <button class="btn btn-primary">
                    ✅ Mulai Verifikasi
                </button>
                <button class="btn btn-secondary">
                    📄 Detail Lengkap
                </button>
            </div>
        </div>
    </div>

    <!-- Verification Modal -->
    <div class="modal" id="verificationModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeVerificationModal()">×</button>
            <div class="modal-header">
                <h2 class="modal-title">Mulai Verifikasi Proyek</h2>
                <p class="modal-subtitle">Silakan lengkapi form verifikasi di halaman berikutnya</p>
            </div>
            <div class="project-actions">
                <button class="btn btn-primary" style="flex: 1;">
                    Lanjut ke Form Verifikasi →
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/Auditor/menunggu-verifikasi.js') }}"></script>
@endpush