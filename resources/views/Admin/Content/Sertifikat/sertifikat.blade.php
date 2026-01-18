@extends('Admin.Layout.app')

@section('title', 'Sertifikat - CAMAR Admin')

@section('page-title', 'Sertifikat')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Sertifikat</li>
@endsection

@section('header-actions')
    <button class="btn btn-primary">
        <i class="bi bi-download me-2"></i>Export Laporan
    </button>
@endsection

@section('Admin.Content')
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <div class="stat-value">8</div>
                <div class="stat-label">Siap Diterbitkan</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div class="stat-value">152</div>
                <div class="stat-label">Total Sertifikat</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon teal">
                    <i class="bi bi-globe"></i>
                </div>
                <div class="stat-value">487,500</div>
                <div class="stat-label">Total Ton CO₂ Offset</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="stat-value">45</div>
                <div class="stat-label">Proyek Tersertifikasi</div>
            </div>
        </div>
    </div>

    <!-- Ready to Issue Section -->
    <div class="content-section mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-clipboard-check me-2"></i>Proyek Siap Diterbitkan Sertifikat
            </h2>
        </div>

        <!-- Search & Filter -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Cari proyek atau penerima...">
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option>Semua Kategori</option>
                    <option>Reforestasi</option>
                    <option>Energi Terbarukan</option>
                    <option>Konservasi Laut</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select">
                    <option>Urut: Terbaru</option>
                    <option>Urut: Nilai Tertinggi</option>
                    <option>Urut: Proyek A-Z</option>
                </select>
            </div>
        </div>

        <!-- Certificate Card 1 -->
        <div class="certificate-card mb-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5 class="certificate-title mb-1">Instalasi Turbin Angin Pesisir Selatan</h5>
                    <p class="certificate-id mb-0">Proyek ID: PRJ-2022-032 | Pengelola: WindPower Indonesia</p>
                </div>
                <span class="badge pending">Siap Diterbitkan</span>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Total Offset Tercapai</span>
                        <span class="info-value">25,000 ton CO₂</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Periode Proyek</span>
                        <span class="info-value">Jan 2022 - Des 2024</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Lokasi</span>
                        <span class="info-value">Gunungkidul, Yogyakarta</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Status Verifikasi</span>
                        <span class="info-value"><i class="bi bi-check-circle-fill text-success me-1"></i>Terverifikasi Auditor</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Tanggal Verifikasi</span>
                        <span class="info-value">20 Des 2024</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Auditor</span>
                        <span class="info-value">PT Carbon Audit Indonesia</span>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 pt-3 border-top">
                <button class="btn btn-primary" onclick="issueCertificateModal('WindPower Indonesia', 'Instalasi Turbin Angin Pesisir Selatan', '25,000', 'PRJ-2022-032')">
                    <i class="bi bi-file-earmark-check me-1"></i>Terbitkan Sertifikat
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-graph-up me-1"></i>Lihat Laporan Audit
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-file-text me-1"></i>Detail Proyek
                </button>
            </div>
        </div>

        <!-- Certificate Card 2 -->
        <div class="certificate-card mb-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5 class="certificate-title mb-1">Program Tanam 1000 Pohon Hutan Lindung - Fase 1</h5>
                    <p class="certificate-id mb-0">Proyek ID: PRJ-2023-045 | Pengelola: PT Hijau Lestari</p>
                </div>
                <span class="badge pending">Siap Diterbitkan</span>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Total Offset Tercapai</span>
                        <span class="info-value">12,500 ton CO₂</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Periode Proyek</span>
                        <span class="info-value">Mar 2023 - Des 2024</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Lokasi</span>
                        <span class="info-value">Bogor, Jawa Barat</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Status Verifikasi</span>
                        <span class="info-value"><i class="bi bi-check-circle-fill text-success me-1"></i>Terverifikasi Auditor</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Tanggal Verifikasi</span>
                        <span class="info-value">18 Des 2024</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Auditor</span>
                        <span class="info-value">Green Verify Consultant</span>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 pt-3 border-top">
                <button class="btn btn-primary" onclick="issueCertificateModal('PT Hijau Lestari', 'Program Tanam 1000 Pohon Hutan Lindung - Fase 1', '12,500', 'PRJ-2023-045')">
                    <i class="bi bi-file-earmark-check me-1"></i>Terbitkan Sertifikat
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-graph-up me-1"></i>Lihat Laporan Audit
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-file-text me-1"></i>Detail Proyek
                </button>
            </div>
        </div>

        <!-- Certificate Card 3 -->
        <div class="certificate-card mb-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h5 class="certificate-title mb-1">Biogas dari Limbah Organik Industri Pangan</h5>
                    <p class="certificate-id mb-0">Proyek ID: PRJ-2023-089 | Pengelola: EcoGas Solutions</p>
                </div>
                <span class="badge pending">Siap Diterbitkan</span>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Total Offset Tercapai</span>
                        <span class="info-value">8,750 ton CO₂</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Periode Proyek</span>
                        <span class="info-value">Jun 2023 - Nov 2024</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Lokasi</span>
                        <span class="info-value">Tangerang, Banten</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Status Verifikasi</span>
                        <span class="info-value"><i class="bi bi-check-circle-fill text-success me-1"></i>Terverifikasi Auditor</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Tanggal Verifikasi</span>
                        <span class="info-value">22 Des 2024</span>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="info-item">
                        <span class="info-label">Auditor</span>
                        <span class="info-value">PT Carbon Audit Indonesia</span>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 pt-3 border-top">
                <button class="btn btn-primary" onclick="issueCertificateModal('EcoGas Solutions', 'Biogas dari Limbah Organik Industri Pangan', '8,750', 'PRJ-2023-089')">
                    <i class="bi bi-file-earmark-check me-1"></i>Terbitkan Sertifikat
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-graph-up me-1"></i>Lihat Laporan Audit
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-file-text me-1"></i>Detail Proyek
                </button>
@extends('Admin.Layout.app')

@section('title', 'Sertifikat - CAMAR Admin')

@section('page-title', 'Manajemen Sertifikat')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-muted">Dashboard</a></li>
    <li class="breadcrumb-item active">Sertifikat</li>
@endsection

@push('styles')
<style>
    /* Modern Card & Layout */
    .card-modern {
        background: white;
        border-radius: 16px;
        border: none;
        box-shadow: 0 4px 20px -2px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    /* Modern Tabs */
    .nav-tabs-modern {
        border-bottom: 2px solid #f0f0f0;
        padding: 0 1.5rem;
    }

    .nav-tabs-modern .nav-link {
        border: none;
        color: #999;
        font-weight: 600;
        padding: 1rem 1.5rem;
        position: relative;
        background: transparent;
        transition: all 0.2s;
    }

    .nav-tabs-modern .nav-link:hover {
        color: var(--color-quaternary);
    }

    .nav-tabs-modern .nav-link.active {
        color: var(--color-quaternary);
        background: transparent;
    }

    .nav-tabs-modern .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: var(--color-secondary);
        border-radius: 2px 2px 0 0;
    }

    /* Certificate Cards */
    .cert-card {
        background: #fff;
        border: 1px solid #f0f0f0;
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.2s;
        position: relative;
        overflow: hidden;
    }

    .cert-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.05);
        border-color: var(--color-secondary);
    }

    .cert-icon {
        width: 48px;
        height: 48px;
        background: rgba(103, 192, 144, 0.1);
        color: var(--color-secondary);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .cert-header {
        display: flex;
        justify-content: space-between;
        align-items: start;
        margin-bottom: 1rem;
    }

    .cert-title {
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--color-quaternary);
        margin-bottom: 0.25rem;
    }
    
    .cert-subtitle {
        font-size: 0.85rem;
        color: #6c757d;
    }

    .cert-meta {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .meta-row {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    .meta-row:last-child { margin-bottom: 0; }
    
    .meta-label { color: #999; }
    .meta-value { font-weight: 600; color: #333; }

    /* Modern Table */
    .table-modern thead th {
        background-color: #f8f9fa;
        font-size: 0.75rem;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .table-modern tbody td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        font-size: 0.95rem;
    }
    
    .badge-modern {
        padding: 0.5em 0.8em;
        font-weight: 600;
        font-size: 0.75rem;
        border-radius: 6px;
    }
    
    .badge-soft-success { background-color: rgba(25, 135, 84, 0.1); color: #198754; }
    .badge-soft-warning { background-color: rgba(255, 193, 7, 0.1); color: #997404; }
</style>
@endpush

@section('Admin.Content')
    <div class="card-modern">
        <ul class="nav nav-tabs nav-tabs-modern" id="sertifikatTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="ready-tab" data-bs-toggle="tab" href="#ready-content" role="tab">
                    <i class="bi bi-file-earmark-check me-2"></i>Siap Terbit
                    <span class="badge bg-danger rounded-pill ms-2" style="font-size: 0.6rem;">2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="issued-tab" data-bs-toggle="tab" href="#issued-content" role="tab">
                    <i class="bi bi-clock-history me-2"></i>Riwayat Penerbitan
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Ready to Issue -->
            <div class="tab-pane fade show active p-4" id="ready-content" role="tabpanel">
                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="cert-card">
                            <div class="cert-header">
                                <div class="cert-icon">
                                    <i class="bi bi-award"></i>
                                </div>
                                <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill small">Menunggu Penerbitan</span>
                            </div>
                            <div>
                                <h5 class="cert-title">PT Industri Hijau Indonesia</h5>
                                <div class="cert-subtitle mb-3">Order ID: ORD-2026-001</div>
                            </div>
                            
                            <div class="cert-meta">
                                <div class="meta-row">
                                    <span class="meta-label">Proyek</span>
                                    <span class="meta-value text-end" style="max-width: 60%;">Reforestasi Kalimantan</span>
                                </div>
                                <div class="meta-row">
                                    <span class="meta-label">Offset</span>
                                    <span class="meta-value text-success">500 tCO2e</span>
                                </div>
                                <div class="meta-row">
                                    <span class="meta-label">Vintage</span>
                                    <span class="meta-value">2025</span>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary" style="background-color: var(--color-quaternary);">
                                    <i class="bi bi-magic me-2"></i>Terbitkan Sertifikat
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="cert-card">
                            <div class="cert-header">
                                <div class="cert-icon">
                                    <i class="bi bi-award"></i>
                                </div>
                                <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill small">Menunggu Penerbitan</span>
                            </div>
                            <div>
                                <h5 class="cert-title">CV Karbon Nusantara</h5>
                                <div class="cert-subtitle mb-3">Order ID: ORD-2026-002</div>
                            </div>
                            
                            <div class="cert-meta">
                                <div class="meta-row">
                                    <span class="meta-label">Proyek</span>
                                    <span class="meta-value text-end" style="max-width: 60%;">Solar Farm Bali</span>
                                </div>
                                <div class="meta-row">
                                    <span class="meta-label">Offset</span>
                                    <span class="meta-value text-success">1,200 tCO2e</span>
                                </div>
                                <div class="meta-row">
                                    <span class="meta-label">Vintage</span>
                                    <span class="meta-value">2025</span>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary" style="background-color: var(--color-quaternary);">
                                    <i class="bi bi-magic me-2"></i>Terbitkan Sertifikat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Issued History -->
            <div class="tab-pane fade" id="issued-content" role="tabpanel">
                <div class="filter-section d-flex gap-3 align-items-center flex-wrap p-4 bg-light border-bottom">
                    <div class="flex-grow-1">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Cari sertifikat...">
                        </div>
                    </div>
                    <button class="btn btn-light btn-sm border"><i class="bi bi-filter me-1"></i>Filters</button>
                    <button class="btn btn-light btn-sm border"><i class="bi bi-download me-1"></i>Export</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th>No. Sertifikat</th>
                                <th>Order ID</th>
                                <th>Penerima</th>
                                <th>Proyek</th>
                                <th>Jumlah Offset</th>
                                <th>Tanggal Terbit</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Issue Certificate Modal
    function issueCertificateModal(recipient, project, amount, projectId) {
        if (confirm(`Terbitkan sertifikat untuk ${project}?\n\nPenerima: ${recipient}\nOffset: ${amount} ton CO₂\nProyek ID: ${projectId}`)) {
            // TODO: Implement AJAX call to backend
            console.log('Issuing certificate for project:', projectId);
            alert('Sertifikat telah diterbitkan dan akan dikirim ke penerima.');
        }
    }

    // Download Certificate
    function downloadCertificate(certId) {
        // TODO: Implement download functionality
        console.log('Downloading certificate:', certId);
        alert('Mengunduh sertifikat ' + certId + '...');
    }

    console.log('Sertifikat page loaded successfully');
</script>
@endpush