@extends('Buyer.layout.app')

@section('title', 'Laporan Emisi - CAMAR')

@section('Buyer.content')
<div class="laporan-container">
    <!-- Page Header -->
    <div class="laporan-header">
        <div class="header-content">
            <h1 class="page-title">Laporan Emisi Karbon</h1>
            <p class="page-subtitle">Kelola dan pantau laporan emisi karbon perusahaan Anda</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-outline-primary" id="btnFilter">
                <i class="bi bi-funnel"></i> Filter
            </button>
            <button class="btn btn-primary" id="btnBuatLaporan">
                <i class="bi bi-plus-lg"></i> Buat Laporan
            </button>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-primary-subtle">
                    <i class="bi bi-file-earmark-text text-primary"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">24</h3>
                    <p class="stat-label">Total Laporan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-success-subtle">
                    <i class="bi bi-check-circle text-success"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">18</h3>
                    <p class="stat-label">Terverifikasi</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-warning-subtle">
                    <i class="bi bi-clock-history text-warning"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">4</h3>
                    <p class="stat-label">Menunggu Review</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-danger-subtle">
                    <i class="bi bi-x-circle text-danger"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-value">2</h3>
                    <p class="stat-label">Ditolak</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section (Initially Hidden) -->
    <div class="filter-section mb-4" id="filterSection" style="display: none;">
        <div class="card">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Periode</label>
                        <select class="form-select">
                            <option selected>Semua Periode</option>
                            <option>Januari 2024</option>
                            <option>Februari 2024</option>
                            <option>Maret 2024</option>
                            <option>Q1 2024</option>
                            <option>Q2 2024</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option selected>Semua Status</option>
                            <option>Terverifikasi</option>
                            <option>Menunggu Review</option>
                            <option>Draft</option>
                            <option>Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select">
                            <option selected>Semua Kategori</option>
                            <option>Scope 1</option>
                            <option>Scope 2</option>
                            <option>Scope 3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Terapkan Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs laporan-tabs mb-4" id="laporanTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab">
                <i class="bi bi-grid"></i> Semua Laporan
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="terverifikasi-tab" data-bs-toggle="tab" data-bs-target="#terverifikasi" type="button" role="tab">
                <i class="bi bi-check-circle"></i> Terverifikasi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab">
                <i class="bi bi-clock-history"></i> Menunggu Review
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="draft-tab" data-bs-toggle="tab" data-bs-target="#draft" type="button" role="tab">
                <i class="bi bi-file-earmark"></i> Draft
            </button>
        </li>
    </ul>

    <!-- Tabs Content -->
    <div class="tab-content" id="laporanTabsContent">
        <!-- Tab Semua Laporan -->
        <div class="tab-pane fade show active" id="semua" role="tabpanel">
            <div class="laporan-list">
                <!-- Laporan Card 1 -->
                <div class="laporan-card">
                    <div class="laporan-card-header">
                        <div class="laporan-info">
                            <h3 class="laporan-title">Laporan Emisi Q1 2024</h3>
                            <p class="laporan-meta">
                                <i class="bi bi-calendar3"></i> Periode: Januari - Maret 2024
                                <span class="separator">•</span>
                                <i class="bi bi-clock"></i> Dibuat: 15 April 2024
                            </p>
                        </div>
                        <span class="badge badge-verified">
                            <i class="bi bi-check-circle-fill"></i> Terverifikasi
                        </span>
                    </div>
                    <div class="laporan-card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Total Emisi</span>
                                    <span class="info-value">2,456.8 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 1</span>
                                    <span class="info-value">856.2 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 2</span>
                                    <span class="info-value">1,245.3 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 3</span>
                                    <span class="info-value">355.3 tCO2e</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="laporan-card-footer">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </button>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-download"></i> Unduh PDF
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-share"></i> Bagikan
                        </button>
                    </div>
                </div>

                <!-- Laporan Card 2 -->
                <div class="laporan-card">
                    <div class="laporan-card-header">
                        <div class="laporan-info">
                            <h3 class="laporan-title">Laporan Emisi Februari 2024</h3>
                            <p class="laporan-meta">
                                <i class="bi bi-calendar3"></i> Periode: Februari 2024
                                <span class="separator">•</span>
                                <i class="bi bi-clock"></i> Dibuat: 5 Maret 2024
                            </p>
                        </div>
                        <span class="badge badge-pending">
                            <i class="bi bi-clock-history"></i> Menunggu Review
                        </span>
                    </div>
                    <div class="laporan-card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Total Emisi</span>
                                    <span class="info-value">784.5 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 1</span>
                                    <span class="info-value">287.3 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 2</span>
                                    <span class="info-value">412.7 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 3</span>
                                    <span class="info-value">84.5 tCO2e</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="laporan-card-footer">
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </button>
                        <button class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>
                </div>

                <!-- Laporan Card 3 -->
                <div class="laporan-card">
                    <div class="laporan-card-header">
                        <div class="laporan-info">
                            <h3 class="laporan-title">Laporan Emisi Januari 2024</h3>
                            <p class="laporan-meta">
                                <i class="bi bi-calendar3"></i> Periode: Januari 2024
                                <span class="separator">•</span>
                                <i class="bi bi-clock"></i> Dibuat: 2 Februari 2024
                            </p>
                        </div>
                        <span class="badge badge-draft">
                            <i class="bi bi-file-earmark"></i> Draft
                        </span>
                    </div>
                    <div class="laporan-card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Total Emisi</span>
                                    <span class="info-value">892.1 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 1</span>
                                    <span class="info-value">312.4 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 2</span>
                                    <span class="info-value">478.2 tCO2e</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-item">
                                    <span class="info-label">Scope 3</span>
                                    <span class="info-value">101.5 tCO2e</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="laporan-card-footer">
                        <button class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil"></i> Lanjutkan Edit
                        </button>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-send"></i> Submit untuk Review
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Pagination" class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Tab Terverifikasi -->
        <div class="tab-pane fade" id="terverifikasi" role="tabpanel">
            <div class="laporan-list">
                <div class="empty-state">
                    <i class="bi bi-check-circle empty-icon"></i>
                    <h3>Belum Ada Laporan Terverifikasi</h3>
                    <p>Laporan yang telah diverifikasi akan muncul di sini</p>
                </div>
            </div>
        </div>

        <!-- Tab Menunggu Review -->
        <div class="tab-pane fade" id="review" role="tabpanel">
            <div class="laporan-list">
                <div class="empty-state">
                    <i class="bi bi-clock-history empty-icon"></i>
                    <h3>Tidak Ada Laporan Menunggu Review</h3>
                    <p>Laporan yang menunggu review akan muncul di sini</p>
                </div>
            </div>
        </div>

        <!-- Tab Draft -->
        <div class="tab-pane fade" id="draft" role="tabpanel">
            <div class="laporan-list">
                <div class="empty-state">
                    <i class="bi bi-file-earmark empty-icon"></i>
                    <h3>Tidak Ada Draft Laporan</h3>
                    <p>Draft laporan Anda akan muncul di sini</p>
                    <button class="btn btn-primary mt-3">
                        <i class="bi bi-plus-lg"></i> Buat Laporan Baru
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Buat Laporan -->
<div class="modal fade" id="modalBuatLaporan" tabindex="-1" aria-labelledby="modalBuatLaporanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuatLaporanLabel">Buat Laporan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formBuatLaporan">
                    <div class="mb-3">
                        <label for="judulLaporan" class="form-label">Judul Laporan</label>
                        <input type="text" class="form-control" id="judulLaporan" placeholder="Contoh: Laporan Emisi Q1 2024" required>
                    </div>
                    <div class="mb-3">
                        <label for="periodeLaporan" class="form-label">Periode Laporan</label>
                        <select class="form-select" id="periodeLaporan" required>
                            <option value="">Pilih periode</option>
                            <option value="januari">Januari 2024</option>
                            <option value="februari">Februari 2024</option>
                            <option value="maret">Maret 2024</option>
                            <option value="q1">Q1 2024</option>
                            <option value="q2">Q2 2024</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kategoriLaporan" class="form-label">Kategori Emisi</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="scope1" id="scope1">
                            <label class="form-check-label" for="scope1">
                                Scope 1 - Emisi Langsung
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="scope2" id="scope2">
                            <label class="form-check-label" for="scope2">
                                Scope 2 - Emisi Tidak Langsung (Energi)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="scope3" id="scope3">
                            <label class="form-check-label" for="scope3">
                                Scope 3 - Emisi Rantai Nilai
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiLaporan" class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="deskripsiLaporan" rows="3" placeholder="Tambahkan deskripsi laporan..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSimpanLaporan">Buat Laporan</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/Buyer/laporan/laporan.js') }}"></script>
@endpush
@endsection