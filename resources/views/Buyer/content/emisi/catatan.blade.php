@extends('Buyer.layout.app')

@section('title', 'Catatan Emisi - CAMAR')

@section('page-title', 'Catatan Emisi')
@section('page-subtitle', 'Catatan perhitungan emisi carbon offset Anda')

@section('Buyer.content')

<div class="emission-records-wrapper">
    <!-- Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="emission-records-summary-card">
                <div class="emission-records-summary-icon">📊</div>
                <div class="emission-records-summary-content">
                    <div class="emission-records-summary-label">Total Catatan</div>
                    <div class="emission-records-summary-value" id="totalRecords">0</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="emission-records-summary-card">
                <div class="emission-records-summary-icon">🌍</div>
                <div class="emission-records-summary-content">
                    <div class="emission-records-summary-label">Total Emisi</div>
                    <div class="emission-records-summary-value" id="totalEmisi">0 <span class="emission-records-summary-unit">ton</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="emission-records-summary-card">
                <div class="emission-records-summary-icon">📈</div>
                <div class="emission-records-summary-content">
                    <div class="emission-records-summary-label">Rata-rata Emisi</div>
                    <div class="emission-records-summary-value" id="avgEmisi">0 <span class="emission-records-summary-unit">ton</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="emission-records-summary-card">
                <div class="emission-records-summary-icon">🌱</div>
                <div class="emission-records-summary-content">
                    <div class="emission-records-summary-label">Total Offset</div>
                    <div class="emission-records-summary-value" id="totalOffset">0 <span class="emission-records-summary-unit">ton</span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="emission-records-filter-section">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="emission-records-form-label">Cari Catatan</label>
                <input type="text" class="emission-records-form-control" id="searchInput" placeholder="Cari berdasarkan tanggal atau keterangan...">
            </div>
            <div class="col-md-3">
                <label class="emission-records-form-label">Filter Periode</label>
                <select class="emission-records-form-control" id="filterPeriode">
                    <option value="all">Semua Periode</option>
                    <option value="today">Hari Ini</option>
                    <option value="week">Minggu Ini</option>
                    <option value="month">Bulan Ini</option>
                    <option value="year">Tahun Ini</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="emission-records-form-label">Urutkan</label>
                <select class="emission-records-form-control" id="sortBy">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="highest">Emisi Tertinggi</option>
                    <option value="lowest">Emisi Terendah</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="emission-records-btn emission-records-btn-primary w-100" id="addNewBtn">
                    Tambah Baru
                </button>
            </div>
        </div>
    </div>

    <!-- Records Table -->
    <div class="emission-records-section mt-4">
        <div class="emission-records-header">
            <h3>Daftar Catatan Emisi</h3>
            <div class="emission-records-delete-controls">
                <button class="emission-records-btn emission-records-btn-delete" id="deleteBtn">
                    🗑️ Hapus Catatan
                </button>
                <div id="deleteActions" class="emission-records-delete-actions">
                    <div class="emission-records-delete-info">
                        ✓ <span id="selectedCount">0</span> dipilih
                    </div>
                    <button class="emission-records-btn emission-records-btn-delete-selected" id="deleteSelectedBtn" disabled>
                        Hapus Yang Dipilih
                    </button>
                    <button class="emission-records-btn emission-records-btn-cancel" id="cancelDeleteBtn">
                        Batal
                    </button>
                </div>
            </div>
        </div>
        
        <div class="emission-records-table-responsive">
            <table class="emission-records-table" id="recordsTable">
                <thead>
                    <tr id="tableHeader">
                        <th width="5%">No</th>
                        <th width="12%">Tanggal</th>
                        <th width="25%">Keterangan</th>
                        <th width="10%">Scope 1</th>
                        <th width="10%">Scope 2</th>
                        <th width="10%">Scope 3</th>
                        <th width="12%">Total Emisi</th>
                        <th width="10%">Offset</th>
                    </tr>
                </thead>
                <tbody id="recordsBody">
                    <!-- Data akan dimuat via JavaScript -->
                    <tr class="emission-records-empty-state">
                        <td colspan="8" class="text-center py-5">
                            <div class="emission-records-empty-icon">📋</div>
                            <p class="emission-records-empty-text">Belum ada catatan emisi</p>
                            <p class="emission-records-empty-subtext">Klik "Tambah Baru" untuk membuat catatan pertama Anda</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="emission-records-pagination-section" id="paginationSection" style="display: none;">
            <div class="emission-records-pagination-info">
                Menampilkan <strong id="showingStart">0</strong> - <strong id="showingEnd">0</strong> dari <strong id="totalEntries">0</strong> catatan
            </div>
            <div class="emission-records-pagination-controls" id="paginationControls">
                <!-- Pagination buttons akan dimuat via JavaScript -->
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content emission-records-modal-content">
                <div class="modal-header emission-records-modal-header">
                    <h5 class="modal-title emission-records-modal-title">Detail Catatan Emisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body emission-records-modal-body">
                    <div class="emission-records-detail-grid">
                        <div class="emission-records-detail-item">
                            <label>Tanggal</label>
                            <div class="emission-records-detail-value" id="detailTanggal">-</div>
                        </div>
                        <div class="emission-records-detail-item">
                            <label>Keterangan</label>
                            <div class="emission-records-detail-value" id="detailKeterangan">-</div>
                        </div>
                    </div>
                    
                    <h6 class="mt-4 mb-3">Rincian Emisi</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="emission-records-detail-card emission-records-scope-1-bg">
                                <div class="emission-records-detail-card-label">SCOPE 1</div>
                                <div class="emission-records-detail-card-value" id="detailScope1">0</div>
                                <div class="emission-records-detail-card-unit">ton CO₂e</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="emission-records-detail-card emission-records-scope-2-bg">
                                <div class="emission-records-detail-card-label">SCOPE 2</div>
                                <div class="emission-records-detail-card-value" id="detailScope2">0</div>
                                <div class="emission-records-detail-card-unit">ton CO₂e</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="emission-records-detail-card emission-records-scope-3-bg">
                                <div class="emission-records-detail-card-label">SCOPE 3</div>
                                <div class="emission-records-detail-card-value" id="detailScope3">0</div>
                                <div class="emission-records-detail-card-unit">ton CO₂e</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3 mt-2">
                        <div class="col-md-4">
                            <div class="emission-records-detail-card emission-records-total-bg">
                                <div class="emission-records-detail-card-label">TOTAL EMISI</div>
                                <div class="emission-records-detail-card-value" id="detailTotal">0</div>
                                <div class="emission-records-detail-card-unit">ton CO₂e/tahun</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="emission-records-detail-card emission-records-offset-bg">
                                <div class="emission-records-detail-card-label">OFFSET</div>
                                <div class="emission-records-detail-card-value" id="detailOffset">0</div>
                                <div class="emission-records-detail-card-unit">ton CO₂e</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="emission-records-detail-card emission-records-net-bg">
                                <div class="emission-records-detail-card-label">EMISI BERSIH</div>
                                <div class="emission-records-detail-card-value" id="detailBersih">0</div>
                                <div class="emission-records-detail-card-unit">ton CO₂e/tahun</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer emission-records-modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content emission-records-modal-content">
                <div class="modal-header emission-records-modal-header">
                    <h5 class="modal-title emission-records-modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body emission-records-modal-body">
                    <p>Apakah Anda yakin ingin menghapus catatan ini?</p>
                    <p class="text-muted mb-0">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer emission-records-modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Confirm Delete Multiple -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content emission-records-modal-content">
                <div class="modal-header emission-records-modal-header emission-records-modal-header-danger">
                    <h5 class="modal-title emission-records-modal-title">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Konfirmasi Hapus
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body emission-records-modal-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-trash3" style="font-size: 3rem; color: #dc3545;"></i>
                    </div>
                    <h5 class="mb-3">Apakah Anda yakin ingin menghapus <span id="deleteCount" class="text-danger fw-bold">0</span> catatan yang dipilih?</h5>
                    <p class="text-muted mb-0">Data yang sudah dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer emission-records-modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger px-4" id="confirmDeleteMultipleBtn">
                        <i class="bi bi-trash3 me-2"></i>Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Success Delete -->
    <div class="modal fade" id="successDeleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content emission-records-modal-content">
                <div class="modal-header emission-records-modal-header emission-records-modal-header-success">
                    <h5 class="modal-title emission-records-modal-title">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Berhasil
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body emission-records-modal-body text-center py-4">
                    <div class="mb-3">
                        <i class="bi bi-check-circle" style="font-size: 3rem; color: #28a745;"></i>
                    </div>
                    <h5 class="mb-3"><span id="successDeleteCount" class="text-success fw-bold">0</span> catatan berhasil dihapus!</h5>
                    <p class="text-muted mb-0">Data telah dihapus dari sistem.</p>
                </div>
                <div class="modal-footer emission-records-modal-footer justify-content-center">
                    <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection