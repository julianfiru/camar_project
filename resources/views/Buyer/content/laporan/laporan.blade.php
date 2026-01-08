@extends('Buyer.layout.app')

@section('title', 'Laporan - CAMAR')

@section('page-title', 'Laporan')
@section('page-subtitle', 'Kelola laporan carbon offset Anda')

@section('Buyer.content')
<div class="laporan-container-page">
    <!-- Quick Stats -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="laporan-stat-card">
                <div class="laporan-stat-label">TOTAL LAPORAN</div>
                <div class="laporan-stat-value">12</div>
                <div class="laporan-stat-unit">laporan tersedia</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="laporan-stat-card laporan-stat-card-secondary">
                <div class="laporan-stat-label">LAPORAN BULAN INI</div>
                <div class="laporan-stat-value">3</div>
                <div class="laporan-stat-unit">laporan baru</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="laporan-stat-card laporan-stat-card-tertiary">
                <div class="laporan-stat-label">TOTAL DOWNLOAD</div>
                <div class="laporan-stat-value">48</div>
                <div class="laporan-stat-unit">kali diunduh</div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="laporan-form-label fw-semibold">Jenis Laporan</label>
                    <select class="form-select laporan-form-select" id="filterJenis">
                        <option value="">Semua Jenis</option>
                        <option value="emisi">Laporan Emisi</option>
                        <option value="offset">Laporan Offset</option>
                        <option value="sertifikat">Laporan Sertifikat</option>
                        <option value="tahunan">Laporan Tahunan</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="laporan-form-label fw-semibold">Periode</label>
                    <select class="form-select laporan-form-select" id="filterPeriode">
                        <option value="">Semua Periode</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="laporan-form-label fw-semibold">Urutkan</label>
                    <select class="form-select laporan-form-select" id="filterSort">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="type">Jenis Laporan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports List -->
    <div class="card">
        <div class="card-body">
            <h5 class="laporan-section-title mb-4">Daftar Laporan (5)</h5>
            
            <div id="laporanList">
                
                <!-- Report 1 -->
                <div class="laporan-report-item" data-type="progress" data-year="2025">
                    <div class="laporan-report-header">
                        <div>
                            <div class="laporan-report-title">Laporan Progress Proyek Energi Terbarukan - Januari 2025</div>
                            <div class="laporan-report-meta">PT Solar Energy Nusantara • 25 Januari 2025</div>
                        </div>
                        <span class="laporan-badge-report laporan-badge-progress">Laporan Progress</span>
                    </div>
                    
                    <div class="laporan-report-info-grid">
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">PROYEK</span>
                            <span class="laporan-report-info-value">Energi Terbarukan Jawa Timur</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">TANGGAL</span>
                            <span class="laporan-report-info-value">20 Januari 2025</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">UKURAN FILE</span>
                            <span class="laporan-report-info-value">2.8 MB (32 hal)</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">STATUS</span>
                            <span class="laporan-report-info-value text-success">✓ Terverifikasi</span>
                        </div>
                    </div>
                    
                    <div class="laporan-report-actions">
                        <button class="btn laporan-btn-download">
                            <i class="bi bi-download"></i> Download PDF
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-preview">
                            <i class="bi bi-eye"></i> Preview
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-share">
                            <i class="bi bi-share"></i> Bagikan
                        </button>
                    </div>
                </div>

                <!-- Report 2 -->
                <div class="laporan-report-item" data-type="realisasi" data-year="2024">
                    <div class="laporan-report-header">
                        <div>
                            <div class="laporan-report-title">Laporan Realisasi Offset Semester 2 - 2024</div>
                            <div class="laporan-report-meta">PT Solar Energy Nusantara • 20 Desember 2024</div>
                        </div>
                        <span class="laporan-badge-report laporan-badge-realisasi">Laporan Realisasi</span>
                    </div>
                    
                    <div class="laporan-report-info-grid">
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">PROYEK</span>
                            <span class="laporan-report-info-value">Energi Terbarukan Jawa Timur</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">TANGGAL</span>
                            <span class="laporan-report-info-value">Juli - Desember 2024</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">UKURAN FILE</span>
                            <span class="laporan-report-info-value">3.5 MB (48 hal)</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">STATUS</span>
                            <span class="laporan-report-info-value text-success">✓ Terverifikasi</span>
                        </div>
                    </div>
                    
                    <div class="laporan-report-actions">
                        <button class="btn laporan-btn-download">
                            <i class="bi bi-download"></i> Download PDF
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-preview">
                            <i class="bi bi-eye"></i> Preview
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-share">
                            <i class="bi bi-share"></i> Bagikan
                        </button>
                    </div>
                </div>

                <!-- Report 3 -->
                <div class="laporan-report-item" data-type="verifikasi" data-year="2024">
                    <div class="laporan-report-header">
                        <div>
                            <div class="laporan-report-title">Laporan Verifikasi Proyek Reboisasi Kalimantan</div>
                            <div class="laporan-report-meta">PT Hutan Hijau Indonesia • 15 Desember 2024</div>
                        </div>
                        <span class="laporan-badge-report laporan-badge-verifikasi">Laporan Verifikasi</span>
                    </div>
                    
                    <div class="laporan-report-info-grid">
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">PROYEK</span>
                            <span class="laporan-report-info-value">Reboisasi Kalimantan</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">TANGGAL</span>
                            <span class="laporan-report-info-value">14 Oktober 2024</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">UKURAN FILE</span>
                            <span class="laporan-report-info-value">4.2 MB (56 hal)</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">STATUS</span>
                            <span class="laporan-report-info-value text-success">✓ Terverifikasi</span>
                        </div>
                    </div>
                    
                    <div class="laporan-report-actions">
                        <button class="btn laporan-btn-download">
                            <i class="bi bi-download"></i> Download PDF
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-preview">
                            <i class="bi bi-eye"></i> Preview
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-share">
                            <i class="bi bi-share"></i> Bagikan
                        </button>
                    </div>
                </div>

                <!-- Report 4 -->
                <div class="laporan-report-item" data-type="monitoring" data-year="2024">
                    <div class="laporan-report-header">
                        <div>
                            <div class="laporan-report-title">Laporan Monitoring Bulanan Mangrove - November 2024</div>
                            <div class="laporan-report-meta">PT Ekosistem Lestari • 10 Desember 2024</div>
                        </div>
                        <span class="laporan-badge-report laporan-badge-monitoring">Laporan Monitoring</span>
                    </div>
                    
                    <div class="laporan-report-info-grid">
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">PROYEK</span>
                            <span class="laporan-report-info-value">Konservasi Mangrove Sulawesi</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">TANGGAL</span>
                            <span class="laporan-report-info-value">15 November 2024</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">UKURAN FILE</span>
                            <span class="laporan-report-info-value">1.9 MB (24 hal)</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">STATUS</span>
                            <span class="laporan-report-info-value text-success">✓ Terverifikasi</span>
                        </div>
                    </div>
                    
                    <div class="laporan-report-actions">
                        <button class="btn laporan-btn-download">
                            <i class="bi bi-download"></i> Download PDF
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-preview">
                            <i class="bi bi-eye"></i> Preview
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-share">
                            <i class="bi bi-share"></i> Bagikan
                        </button>
                    </div>
                </div>

                <!-- Report 5 -->
                <div class="laporan-report-item" data-type="realisasi" data-year="2024">
                    <div class="laporan-report-header">
                        <div>
                            <div class="laporan-report-title">Laporan Realisasi Offset Q3 2024</div>
                            <div class="laporan-report-meta">PT Hutan Hijau Indonesia • 25 Oktober 2024</div>
                        </div>
                        <span class="laporan-badge-report laporan-badge-realisasi">Laporan Realisasi</span>
                    </div>
                    
                    <div class="laporan-report-info-grid">
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">PROYEK</span>
                            <span class="laporan-report-info-value">Reboisasi Kalimantan</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">TANGGAL</span>
                            <span class="laporan-report-info-value">Juli - September 2024</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">UKURAN FILE</span>
                            <span class="laporan-report-info-value">3.1 MB (42 hal)</span>
                        </div>
                        <div class="laporan-report-info-item">
                            <span class="laporan-report-info-label">STATUS</span>
                            <span class="laporan-report-info-value text-success">✓ Terverifikasi</span>
                        </div>
                    </div>
                    
                    <div class="laporan-report-actions">
                        <button class="btn laporan-btn-download">
                            <i class="bi bi-download"></i> Download PDF
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-preview">
                            <i class="bi bi-eye"></i> Preview
                        </button>
                        <button class="btn btn-outline-secondary laporan-btn-share">
                            <i class="bi bi-share"></i> Bagikan
                        </button>
                    </div>
                </div>

            </div>

            <!-- No Data State -->
            <div id="noDataMessage" class="text-center py-5 d-none">
                <div class="mb-3" style="font-size: 72px; color: #ccc;">📋</div>
                <h5 class="text-muted">Tidak ada laporan ditemukan</h5>
                <p class="text-muted">Coba ubah filter pencarian Anda</p>
            </div>
        </div>
    </div>
</div>
@endsection