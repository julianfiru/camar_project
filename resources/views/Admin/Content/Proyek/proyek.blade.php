@extends('Admin.Layout.app')

@section('title', 'Proyek - CAMAR Admin')

@section('page-title', 'Proyek')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Proyek</li>
@endsection

@section('header-actions')
    <button class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Proyek
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
                <div class="stat-value">12</div>
                <div class="stat-label">Menunggu Review</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="bi bi-rocket-takeoff"></i>
                </div>
                <div class="stat-value">45</div>
                <div class="stat-label">Proyek Aktif</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon teal">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="stat-value">28</div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="stat-value">3</div>
                <div class="stat-label">Perlu Perhatian</div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="content-section">
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs mb-4" id="proyekTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab">
                    <i class="bi bi-clipboard-check me-2"></i>Review Proyek Baru
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="status-tab" data-bs-toggle="tab" data-bs-target="#status" type="button" role="tab">
                    <i class="bi bi-graph-up me-2"></i>Status Proyek
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="proyekTabContent">
            <!-- Review Proyek Baru Tab -->
            <div class="tab-pane fade show active" id="review" role="tabpanel">
                <!-- Search & Filter -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari proyek...">
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
                            <option>Urut: Terlama</option>
                            <option>Urut: Nilai Tertinggi</option>
                        </select>
                    </div>
                </div>

                <!-- Project Cards -->
                <div class="project-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="project-title mb-1">Reforestasi Hutan Mangrove Pantai Utara</h5>
                            <p class="project-id text-muted mb-0">ID: PRJ-2024-001</p>
                        </div>
                        <span class="badge pending">Pending Review</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Pengaju</span>
                                <span class="info-value">PT Green Indonesia</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Lokasi</span>
                                <span class="info-value">Demak, Jawa Tengah</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Estimasi Offset</span>
                                <span class="info-value">15,000 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Durasi Proyek</span>
                                <span class="info-value">5 tahun</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Tanggal Pengajuan</span>
                                <span class="info-value">15 Des 2024</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Kategori</span>
                                <span class="info-value">Reforestasi</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary btn-sm" onclick="viewProjectDetail(1)">
                            <i class="bi bi-file-text me-1"></i>Detail
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="approveProject(1)">
                            <i class="bi bi-check-lg me-1"></i>Approve
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="rejectProject(1)">
                            <i class="bi bi-x-lg me-1"></i>Tolak
                        </button>
                    </div>
                </div>

                <div class="project-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="project-title mb-1">Konversi Energi Solar Panel Komunitas</h5>
                            <p class="project-id text-muted mb-0">ID: PRJ-2024-002</p>
                        </div>
                        <span class="badge pending">Pending Review</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Pengaju</span>
                                <span class="info-value">Yayasan Energi Hijau</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Lokasi</span>
                                <span class="info-value">Bandung, Jawa Barat</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Estimasi Offset</span>
                                <span class="info-value">8,500 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Durasi Proyek</span>
                                <span class="info-value">3 tahun</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Tanggal Pengajuan</span>
                                <span class="info-value">18 Des 2024</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Kategori</span>
                                <span class="info-value">Energi Terbarukan</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary btn-sm" onclick="viewProjectDetail(2)">
                            <i class="bi bi-file-text me-1"></i>Detail
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="approveProject(2)">
                            <i class="bi bi-check-lg me-1"></i>Approve
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="rejectProject(2)">
                            <i class="bi bi-x-lg me-1"></i>Tolak
                        </button>
                    </div>
                </div>

                <div class="project-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="project-title mb-1">Konservasi Terumbu Karang Kepulauan Seribu</h5>
                            <p class="project-id text-muted mb-0">ID: PRJ-2024-003</p>
                        </div>
                        <span class="badge pending">Pending Review</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Pengaju</span>
                                <span class="info-value">Ocean Conservation ID</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Lokasi</span>
                                <span class="info-value">Kepulauan Seribu, Jakarta</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Estimasi Offset</span>
                                <span class="info-value">12,000 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Durasi Proyek</span>
                                <span class="info-value">7 tahun</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Tanggal Pengajuan</span>
                                <span class="info-value">20 Des 2024</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Kategori</span>
                                <span class="info-value">Konservasi Laut</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary btn-sm" onclick="viewProjectDetail(3)">
                            <i class="bi bi-file-text me-1"></i>Detail
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="approveProject(3)">
                            <i class="bi bi-check-lg me-1"></i>Approve
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="rejectProject(3)">
                            <i class="bi bi-x-lg me-1"></i>Tolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Status Proyek Tab -->
            <div class="tab-pane fade" id="status" role="tabpanel">
                <!-- Search & Filter -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari proyek...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option>Semua Status</option>
                            <option>Aktif</option>
                            <option>Selesai</option>
                            <option>Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select">
                            <option>Semua Kategori</option>
                            <option>Reforestasi</option>
                            <option>Energi Terbarukan</option>
                            <option>Konservasi Laut</option>
                        </select>
                    </div>
                </div>

                <!-- Active Project Cards -->
                <div class="project-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="project-title mb-1">Program Tanam 1000 Pohon Hutan Lindung</h5>
                            <p class="project-id text-muted mb-0">ID: PRJ-2023-045</p>
                        </div>
                        <span class="badge active">Aktif</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Pengelola</span>
                                <span class="info-value">PT Hijau Lestari</span>
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
                                <span class="info-label">Offset Tercapai</span>
                                <span class="info-value">8,200 / 20,000 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Progress</span>
                                <span class="info-value">41%</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Mulai Proyek</span>
                                <span class="info-value">Mar 2023</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Target Selesai</span>
                                <span class="info-value">Mar 2028</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 41%; background-color: var(--color-secondary);" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary btn-sm" onclick="viewProjectReport(1)">
                            <i class="bi bi-graph-up me-1"></i>Lihat Laporan
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="contactManager(1)">
                            <i class="bi bi-person me-1"></i>Hubungi Pengelola
                        </button>
                    </div>
                </div>

                <div class="project-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="project-title mb-1">Instalasi Turbin Angin Pesisir Selatan</h5>
                            <p class="project-id text-muted mb-0">ID: PRJ-2022-032</p>
                        </div>
                        <span class="badge approved">Selesai</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Pengelola</span>
                                <span class="info-value">WindPower Indonesia</span>
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
                                <span class="info-label">Offset Tercapai</span>
                                <span class="info-value">25,000 / 25,000 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Progress</span>
                                <span class="info-value">100%</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Mulai Proyek</span>
                                <span class="info-value">Jan 2022</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Selesai</span>
                                <span class="info-value">Des 2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%; background-color: var(--color-secondary);" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-primary btn-sm" onclick="issueCertificate(1)">
                            <i class="bi bi-award me-1"></i>Terbitkan Sertifikat
                        </button>
                        <button class="btn btn-secondary btn-sm" onclick="viewProjectReport(2)">
                            <i class="bi bi-graph-up me-1"></i>Lihat Laporan
                        </button>
                    </div>
                </div>

                <div class="project-card mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="project-title mb-1">Biogas dari Limbah Organik Pasar Tradisional</h5>
                            <p class="project-id text-muted mb-0">ID: PRJ-2023-067</p>
                        </div>
                        <span class="badge active">Aktif</span>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Pengelola</span>
                                <span class="info-value">Green Energy Coop</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Lokasi</span>
                                <span class="info-value">Surabaya, Jawa Timur</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Offset Tercapai</span>
                                <span class="info-value">5,800 / 10,000 ton CO₂</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Progress</span>
                                <span class="info-value">58%</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Mulai Proyek</span>
                                <span class="info-value">Jun 2023</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="info-item">
                                <span class="info-label">Target Selesai</span>
                                <span class="info-value">Jun 2026</span>
                            </div>
                        </div>
                    </div>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar" role="progressbar" style="width: 58%; background-color: var(--color-secondary);" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex gap-2 pt-3 border-top">
                        <button class="btn btn-secondary btn-sm" onclick="viewProjectReport(3)">
                            <i class="bi bi-graph-up me-1"></i>Lihat Laporan
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="contactManager(3)">
                            <i class="bi bi-person me-1"></i>Hubungi Pengelola
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Project Actions
    function approveProject(id) {
        if (confirm('Apakah Anda yakin ingin menyetujui proyek ini?')) {
            // TODO: Implement AJAX call to backend
            console.log('Approving project:', id);
            alert('Proyek telah disetujui dan akan masuk ke daftar proyek aktif.');
        }
    }

    function rejectProject(id) {
        if (confirm('Apakah Anda yakin ingin menolak proyek ini?')) {
            // TODO: Implement AJAX call to backend
            console.log('Rejecting project:', id);
            alert('Proyek telah ditolak. Notifikasi akan dikirim ke pengaju.');
        }
    }

    function viewProjectDetail(id) {
        // TODO: Redirect to project detail page
        console.log('Viewing project detail:', id);
        window.location.href = `/admin/proyek/${id}`;
    }

    function viewProjectReport(id) {
        // TODO: Redirect to project report page
        console.log('Viewing project report:', id);
        window.location.href = `/admin/proyek/${id}/laporan`;
    }

    function contactManager(id) {
        // TODO: Open contact modal or redirect to messaging
        console.log('Contacting manager for project:', id);
        alert('Menghubungi pengelola proyek dengan ID ' + id);
    }

    function issueCertificate(id) {
        if (confirm('Apakah Anda yakin ingin menerbitkan sertifikat untuk proyek ini?')) {
            // TODO: Implement AJAX call to backend
            console.log('Issuing certificate for project:', id);
            alert('Sertifikat offset karbon telah diterbitkan.');
        }
    }

    console.log('Proyek page loaded successfully');
</script>
@endpush