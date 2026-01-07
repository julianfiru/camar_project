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
            </div>
        </div>
    </div>

    <!-- Issued Certificates Section -->
    <div class="content-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-check-circle me-2"></i>Sertifikat yang Telah Diterbitkan
            </h2>
        </div>

        <!-- Nav Tabs -->
        <ul class="nav nav-tabs mb-4" id="certificateTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent-cert" type="button" role="tab">
                    <i class="bi bi-clock-history me-2"></i>Terbaru
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-cert" type="button" role="tab">
                    <i class="bi bi-list-ul me-2"></i>Semua Sertifikat
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="certificateTabContent">
            <!-- Recent Certificates Tab -->
            <div class="tab-pane fade show active" id="recent-cert" role="tabpanel">
                <!-- Certificate Card 1 -->
                <div class="certificate-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="certificate-title mb-1">Konservasi Terumbu Karang Kepulauan Seribu</h5>
                            <p class="certificate-id mb-0">Sertifikat ID: CERT-2024-089 | Proyek: PRJ-2023-067</p>
                        </div>
                        <span class="badge approved">Terbit</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Penerima</span>
                                <span class="info-value">Ocean Conservation ID</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Jumlah Offset</span>
                                <span class="info-value">18,000 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Tanggal Terbit</span>
                                <span class="info-value">23 Des 2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary" onclick="downloadCertificate('CERT-2024-089')">
                            <i class="bi bi-download me-1"></i>Download Sertifikat
                        </button>
                        <button class="btn btn-secondary btn-sm">
                            <i class="bi bi-eye me-1"></i>Preview
                        </button>
                        <button class="btn btn-secondary btn-sm">
                            <i class="bi bi-envelope me-1"></i>Kirim Email
                        </button>
                    </div>
                </div>

                <!-- Certificate Card 2 -->
                <div class="certificate-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="certificate-title mb-1">Pembangkit Listrik Tenaga Surya Komunitas</h5>
                            <p class="certificate-id mb-0">Sertifikat ID: CERT-2024-088 | Proyek: PRJ-2023-054</p>
                        </div>
                        <span class="badge approved">Terbit</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Penerima</span>
                                <span class="info-value">Solar Community Indonesia</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Jumlah Offset</span>
                                <span class="info-value">14,200 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Tanggal Terbit</span>
                                <span class="info-value">21 Des 2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary" onclick="downloadCertificate('CERT-2024-088')">
                            <i class="bi bi-download me-1"></i>Download Sertifikat
                        </button>
                        <button class="btn btn-secondary btn-sm">
                            <i class="bi bi-eye me-1"></i>Preview
                        </button>
                        <button class="btn btn-secondary btn-sm">
                            <i class="bi bi-envelope me-1"></i>Kirim Email
                        </button>
                    </div>
                </div>
            </div>

            <!-- All Certificates Tab -->
            <div class="tab-pane fade" id="all-cert" role="tabpanel">
                <!-- Search & Filter -->
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari sertifikat...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select">
                            <option>Semua Bulan</option>
                            <option>Desember 2024</option>
                            <option>November 2024</option>
                            <option>Oktober 2024</option>
                        </select>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID Sertifikat</th>
                                <th>Proyek</th>
                                <th>Penerima</th>
                                <th>Jumlah Offset</th>
                                <th>Tanggal Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CERT-2024-089</td>
                                <td>Konservasi Terumbu Karang</td>
                                <td>Ocean Conservation ID</td>
                                <td>18,000 ton CO₂</td>
                                <td>23 Des 2024</td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" onclick="downloadCertificate('CERT-2024-089')">
                                        <i class="bi bi-download"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>CERT-2024-088</td>
                                <td>Pembangkit Listrik Tenaga Surya</td>
                                <td>Solar Community Indonesia</td>
                                <td>14,200 ton CO₂</td>
                                <td>21 Des 2024</td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" onclick="downloadCertificate('CERT-2024-088')">
                                        <i class="bi bi-download"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>CERT-2024-087</td>
                                <td>Reforestasi Hutan Mangrove</td>
                                <td>PT Green Indonesia</td>
                                <td>22,500 ton CO₂</td>
                                <td>15 Des 2024</td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" onclick="downloadCertificate('CERT-2024-087')">
                                        <i class="bi bi-download"></i>
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