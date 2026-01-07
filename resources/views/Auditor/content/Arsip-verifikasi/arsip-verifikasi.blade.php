@extends('Auditor.layouts.app')

@section('title', 'Arsip Verifikasi - CAMAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Auditor/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Auditor/arsip-verifikasi.css') }}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Arsip Verifikasi</h1>
            <p class="page-subtitle">Riwayat lengkap verifikasi proyek yang telah diselesaikan</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-secondary" id="exportBtn">
                📥 Export Data
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📊</div>
            <div class="stat-content">
                <div class="stat-value">156</div>
                <div class="stat-label">Total Verifikasi</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">✅</div>
            <div class="stat-content">
                <div class="stat-value">89,450</div>
                <div class="stat-label">Total Emisi Terverifikasi (ton CO₂)</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">🏢</div>
            <div class="stat-content">
                <div class="stat-value">42</div>
                <div class="stat-label">Proyek Terverifikasi</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📅</div>
            <div class="stat-content">
                <div class="stat-value">8</div>
                <div class="stat-label">Verifikasi Bulan Ini</div>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <div class="filter-group">
            <span class="filter-label">Periode:</span>
            <select class="form-select" id="filterPeriod">
                <option value="">Semua Periode</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
        </div>

        <div class="filter-group">
            <span class="filter-label">Tipe Proyek:</span>
            <select class="form-select" id="filterType">
                <option value="">Semua Tipe</option>
                <option value="reforestation">Reforestation & Afforestation</option>
                <option value="renewable">Renewable Energy</option>
                <option value="blue-carbon">Blue Carbon</option>
                <option value="waste">Waste Management</option>
            </select>
        </div>

        <div class="filter-group">
            <span class="filter-label">Auditor:</span>
            <select class="form-select" id="filterAuditor">
                <option value="">Semua Auditor</option>
                <option value="1">Auditor Utama</option>
                <option value="2">Senior Auditor</option>
                <option value="3">Junior Auditor</option>
            </select>
        </div>

        <input type="text" class="search-box" id="searchBox" placeholder="🔍 Cari proyek atau seller...">
    </div>

    <!-- Archive Table -->
    <div class="archive-container">
        <div class="table-wrapper">
            <table class="archive-table" id="archiveTable">
                <thead>
                    <tr>
                        <th>Tanggal Verifikasi</th>
                        <th>Proyek</th>
                        <th>Seller</th>
                        <th>Tipe</th>
                        <th>Periode MRV</th>
                        <th>Emisi Terverifikasi</th>
                        <th>Auditor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr data-type="reforestation" data-auditor="1" data-year="2025">
                        <td>
                            <div class="date-cell">
                                <div class="date-primary">20 Des 2025</div>
                                <div class="date-secondary">14:30 WIB</div>
                            </div>
                        </td>
                        <td>
                            <div class="project-cell">
                                <div class="project-name">Reforestasi Kalimantan Timur</div>
                                <div class="project-id">PRJ-2025-001</div>
                            </div>
                        </td>
                        <td>
                            <div class="seller-name">PT Hijau Lestari</div>
                        </td>
                        <td>
                            <span class="type-badge reforestation">🌱 Reforestation</span>
                        </td>
                        <td>
                            <div class="period-cell">
                                <div class="period-main">Periode 1</div>
                                <div class="period-date">Jan - Jun 2025</div>
                            </div>
                        </td>
                        <td>
                            <div class="emission-value">4,250 ton</div>
                        </td>
                        <td>
                            <div class="auditor-name">Auditor Utama</div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" onclick="viewDetails(1)" title="Lihat Detail">
                                    👁️
                                </button>
                                <button class="btn-icon" onclick="downloadReport(1)" title="Download Laporan">
                                    📥
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr data-type="renewable" data-auditor="1" data-year="2025">
                        <td>
                            <div class="date-cell">
                                <div class="date-primary">18 Des 2025</div>
                                <div class="date-secondary">10:15 WIB</div>
                            </div>
                        </td>
                        <td>
                            <div class="project-cell">
                                <div class="project-name">Solar Farm Nusa Tenggara</div>
                                <div class="project-id">PRJ-2025-002</div>
                            </div>
                        </td>
                        <td>
                            <div class="seller-name">CV Energi Matahari</div>
                        </td>
                        <td>
                            <span class="type-badge renewable">☀️ Renewable Energy</span>
                        </td>
                        <td>
                            <div class="period-cell">
                                <div class="period-main">Periode 1</div>
                                <div class="period-date">Jan - Jun 2025</div>
                            </div>
                        </td>
                        <td>
                            <div class="emission-value">3,800 ton</div>
                        </td>
                        <td>
                            <div class="auditor-name">Auditor Utama</div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" onclick="viewDetails(2)" title="Lihat Detail">
                                    👁️
                                </button>
                                <button class="btn-icon" onclick="downloadReport(2)" title="Download Laporan">
                                    📥
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr data-type="blue-carbon" data-auditor="2" data-year="2025">
                        <td>
                            <div class="date-cell">
                                <div class="date-primary">15 Des 2025</div>
                                <div class="date-secondary">16:45 WIB</div>
                            </div>
                        </td>
                        <td>
                            <div class="project-cell">
                                <div class="project-name">Mangrove Restoration Sulawesi</div>
                                <div class="project-id">PRJ-2025-003</div>
                            </div>
                        </td>
                        <td>
                            <div class="seller-name">Yayasan Pesisir Hijau</div>
                        </td>
                        <td>
                            <span class="type-badge blue-carbon">🌊 Blue Carbon</span>
                        </td>
                        <td>
                            <div class="period-cell">
                                <div class="period-main">Periode 1</div>
                                <div class="period-date">Jan - Jun 2025</div>
                            </div>
                        </td>
                        <td>
                            <div class="emission-value">2,950 ton</div>
                        </td>
                        <td>
                            <div class="auditor-name">Senior Auditor</div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" onclick="viewDetails(3)" title="Lihat Detail">
                                    👁️
                                </button>
                                <button class="btn-icon" onclick="downloadReport(3)" title="Download Laporan">
                                    📥
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr data-type="renewable" data-auditor="3" data-year="2024">
                        <td>
                            <div class="date-cell">
                                <div class="date-primary">10 Des 2024</div>
                                <div class="date-secondary">09:20 WIB</div>
                            </div>
                        </td>
                        <td>
                            <div class="project-cell">
                                <div class="project-name">Wind Power Papua</div>
                                <div class="project-id">PRJ-2024-045</div>
                            </div>
                        </td>
                        <td>
                            <div class="seller-name">PT Angin Nusantara</div>
                        </td>
                        <td>
                            <span class="type-badge renewable">💨 Wind Energy</span>
                        </td>
                        <td>
                            <div class="period-cell">
                                <div class="period-main">Periode 2</div>
                                <div class="period-date">Jul - Des 2024</div>
                            </div>
                        </td>
                        <td>
                            <div class="emission-value">5,120 ton</div>
                        </td>
                        <td>
                            <div class="auditor-name">Junior Auditor</div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" onclick="viewDetails(4)" title="Lihat Detail">
                                    👁️
                                </button>
                                <button class="btn-icon" onclick="downloadReport(4)" title="Download Laporan">
                                    📥
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr data-type="waste" data-auditor="2" data-year="2024">
                        <td>
                            <div class="date-cell">
                                <div class="date-primary">05 Des 2024</div>
                                <div class="date-secondary">13:00 WIB</div>
                            </div>
                        </td>
                        <td>
                            <div class="project-cell">
                                <div class="project-name">Biogas Plant Jawa Tengah</div>
                                <div class="project-id">PRJ-2024-038</div>
                            </div>
                        </td>
                        <td>
                            <div class="seller-name">PT Bio Energi</div>
                        </td>
                        <td>
                            <span class="type-badge waste">♻️ Waste Management</span>
                        </td>
                        <td>
                            <div class="period-cell">
                                <div class="period-main">Periode 2</div>
                                <div class="period-date">Jul - Des 2024</div>
                            </div>
                        </td>
                        <td>
                            <div class="emission-value">6,780 ton</div>
                        </td>
                        <td>
                            <div class="auditor-name">Senior Auditor</div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon" onclick="viewDetails(5)" title="Lihat Detail">
                                    👁️
                                </button>
                                <button class="btn-icon" onclick="downloadReport(5)" title="Download Laporan">
                                    📥
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="pagination-btn" id="prevBtn">
                ← Previous
            </button>
            <div class="pagination-info">
                Showing <span id="showingStart">1</span>-<span id="showingEnd">5</span> of <span id="totalRecords">156</span>
            </div>
            <button class="pagination-btn" id="nextBtn">
                Next →
            </button>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal" id="detailModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeDetailModal()">×</button>
            <div class="modal-header">
                <h2 class="modal-title">Detail Verifikasi</h2>
                <p class="modal-subtitle" id="modalProjectName">Reforestasi Kalimantan Timur</p>
            </div>

            <div class="modal-body">
                <div class="detail-section">
                    <h3 class="detail-section-title">📋 Informasi Proyek</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">ID Proyek</div>
                            <div class="detail-value" id="detailProjectId">PRJ-2025-001</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Seller</div>
                            <div class="detail-value" id="detailSeller">PT Hijau Lestari</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Tipe Proyek</div>
                            <div class="detail-value" id="detailType">Reforestation & Afforestation</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Lokasi</div>
                            <div class="detail-value" id="detailLocation">Kalimantan Timur, Indonesia</div>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3 class="detail-section-title">🔬 Hasil Verifikasi</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Emisi yang Diklaim</div>
                            <div class="detail-value" id="detailClaimedEmission">4,500 ton CO₂</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Emisi Terverifikasi</div>
                            <div class="detail-value highlight" id="detailVerifiedEmission">4,250 ton CO₂</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Confidence Level</div>
                            <div class="detail-value" id="detailConfidence">High (>95%)</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Uncertainty Range</div>
                            <div class="detail-value" id="detailUncertainty">±3.5%</div>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3 class="detail-section-title">👤 Informasi Auditor</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Auditor</div>
                            <div class="detail-value" id="detailAuditor">Auditor Utama</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Tanggal Verifikasi</div>
                            <div class="detail-value" id="detailDate">20 Desember 2025</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Periode MRV</div>
                            <div class="detail-value" id="detailPeriod">Periode 1 (Jan - Jun 2025)</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Status</div>
                            <div class="detail-value">
                                <span class="status-badge completed">✓ Completed</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3 class="detail-section-title">📄 Dokumen</h3>
                    <div class="document-list">
                        <div class="document-item">
                            <div class="document-icon">📄</div>
                            <div class="document-info">
                                <div class="document-name">Verification_Report_PRJ-2025-001_P1.pdf</div>
                                <div class="document-size">2.4 MB</div>
                            </div>
                            <button class="btn-download" onclick="downloadDocument('report')">
                                📥 Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-actions">
                <button class="btn btn-secondary" onclick="closeDetailModal()">
                    Tutup
                </button>
                <button class="btn btn-primary" onclick="downloadReport()">
                    📥 Download Laporan
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/Auditor/arsip-verifikasi.js') }}"></script>
@endpush