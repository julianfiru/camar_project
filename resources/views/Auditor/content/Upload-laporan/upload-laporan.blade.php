@extends('Auditor.layouts.app')

@section('title', 'Upload Laporan Verifikasi - CAMAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Auditor/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Auditor/upload-laporan.css') }}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Upload Laporan Verifikasi</h1>
        <p class="page-subtitle">Kelola dan upload laporan untuk setiap periode MRV (6 bulanan)</p>
    </div>

    <!-- Info Cards -->
    <div class="info-cards">
        <div class="info-card">
            <div class="card-header">
                <div class="card-icon info">📊</div>
            </div>
            <div class="card-value">8</div>
            <div class="card-label">Proyek Aktif</div>
        </div>

        <div class="info-card">
            <div class="card-header">
                <div class="card-icon success">✅</div>
            </div>
            <div class="card-value">34</div>
            <div class="card-label">Laporan Submitted</div>
        </div>

        <div class="info-card">
            <div class="card-header">
                <div class="card-icon warning">⏳</div>
            </div>
            <div class="card-value">5</div>
            <div class="card-label">Menunggu Upload</div>
        </div>
    </div>

    <!-- Project Selector -->
    <div class="project-selector">
        <div class="selector-header">
            🔍 Pilih Proyek
        </div>
        <div class="form-group">
            <label class="form-label">Proyek yang akan di-upload laporannya</label>
            <select class="form-select" id="projectSelect">
                <option value="">-- Pilih Proyek --</option>
                <option value="1" data-duration="3">Reforestasi Kalimantan Timur (3 Tahun)</option>
                <option value="2" data-duration="2">Solar Farm Nusa Tenggara (2 Tahun)</option>
                <option value="3" data-duration="3">Mangrove Restoration Sulawesi (3 Tahun)</option>
                <option value="4" data-duration="1">Wind Power Papua (1 Tahun)</option>
            </select>
        </div>
    </div>

    <!-- Timeline (Hidden by default, shown when project selected) -->
    <div id="timelineSection" style="display: none;">
        <div class="alert alert-info">
            <div class="alert-icon">ℹ️</div>
            <div>
                <strong>Periode MRV:</strong> Laporan harus diupload setiap 6 bulan sesuai jadwal proyek. Timeline di bawah otomatis disesuaikan berdasarkan durasi proyek yang dipilih.
            </div>
        </div>

        <div class="timeline-container">
            <div class="timeline-header">
                📅 Timeline Laporan MRV
            </div>
            <div class="timeline-subtitle" id="timelineSubtitle">
                Durasi Proyek: 3 Tahun (6 Periode Laporan)
            </div>

            <div class="timeline" id="timelineContent">
                <!-- Timeline items will be generated dynamically by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Upload Modal -->
    <div class="modal" id="uploadModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeUploadModal()">×</button>
            <div class="modal-header">
                <h2 class="modal-title">Upload Laporan Verifikasi</h2>
                <p class="modal-subtitle" id="modalSubtitle">Periode 1: Jan 2025 - Jun 2025</p>
            </div>

            <form id="uploadForm">
                <div class="form-group">
                    <label class="form-label">Laporan Verifikasi (PDF) *</label>
                    <div class="file-upload-area" onclick="document.getElementById('reportFile').click()">
                        <div class="upload-icon">📄</div>
                        <div class="upload-text">Klik atau drag & drop file di sini</div>
                        <div class="upload-hint">Format: PDF, Maksimal 10 MB</div>
                    </div>
                    <input type="file" id="reportFile" class="file-input" accept=".pdf" required>
                    <div id="uploadedReport"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Emisi Terverifikasi (ton CO₂) *</label>
                    <input type="number" id="emissionInput" class="form-select" placeholder="Masukkan jumlah emisi" required step="0.01">
                </div>

                <div class="form-group">
                    <label class="form-label">Catatan Tambahan</label>
                    <textarea id="notesInput" class="form-select" style="min-height: 100px; resize: vertical;" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                </div>

                <div class="timeline-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeUploadModal()">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        📤 Upload Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/Auditor/upload-laporan.js') }}"></script>
@endpush