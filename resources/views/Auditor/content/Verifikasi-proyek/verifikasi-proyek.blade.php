@extends('Auditor.layouts.app')

@section('title', 'Verifikasi Proyek - CAMAR')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Auditor/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Auditor/verifikasi-proyek.css') }}">
@endpush

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('auditor.dashboard') }}">Dashboard</a>
        <span>›</span>
        <a href="{{ route('auditor.menunggu-verifikasi') }}">Menunggu Verifikasi</a>
        <span>›</span>
        <span>Verifikasi Proyek</span>
    </div>

    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Verifikasi Proyek</h1>
        <p class="page-subtitle">Reforestasi Kalimantan Timur - PT Hijau Lestari</p>
    </div>

    <!-- Progress Indicator -->
    <div class="progress-indicator">
        <div class="progress-step completed">
            <div class="step-number"></div>
            <div class="step-label">Review Dokumen</div>
        </div>
        <div class="progress-step active">
            <div class="step-number">2</div>
            <div class="step-label">Verifikasi Data</div>
        </div>
        <div class="progress-step">
            <div class="step-number">3</div>
            <div class="step-label">Upload Laporan</div>
        </div>
    </div>

    <!-- Project Info -->
    <div class="project-info-card">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Nama Proyek</div>
                <div class="info-value">Reforestasi Kalimantan Timur</div>
            </div>
            <div class="info-item">
                <div class="info-label">Tipe Proyek</div>
                <div class="info-value">Reforestation & Afforestation</div>
            </div>
            <div class="info-item">
                <div class="info-label">Seller</div>
                <div class="info-value">PT Hijau Lestari</div>
            </div>
            <div class="info-item">
                <div class="info-label">Total Kapasitas</div>
                <div class="info-value highlight">25,000 ton CO₂</div>
            </div>
            <div class="info-item">
                <div class="info-label">Durasi</div>
                <div class="info-value">3 Tahun (2025-2028)</div>
            </div>
            <div class="info-item">
                <div class="info-label">Periode MRV</div>
                <div class="info-value">6 Bulanan</div>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <div class="alert alert-info">
        <div class="alert-icon">ℹ️</div>
        <div>
            <strong>Periode Verifikasi:</strong> Jan 2025 - Jun 2025 (Periode 1 dari 6)
        </div>
    </div>

    <!-- Verification Form -->
    <form class="verification-form" id="verificationForm">
        @csrf
        
        <!-- Section 1: Document Review -->
        <div class="form-section">
            <h2 class="section-title">
                <span class="section-icon">📄</span>
                Review Dokumen MRV
            </h2>
            
            <div class="verification-checklist">
                <label class="checklist-item">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="custom-checkbox" name="check_methodology" required>
                    </div>
                    <div class="checklist-content">
                        <div class="checklist-title">Metodologi sesuai standar</div>
                        <div class="checklist-desc">Verifikasi bahwa metodologi yang digunakan sesuai dengan standar internasional (VCS, Gold Standard, dll)</div>
                    </div>
                </label>

                <label class="checklist-item">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="custom-checkbox" name="check_baseline" required>
                    </div>
                    <div class="checklist-content">
                        <div class="checklist-title">Data baseline lengkap</div>
                        <div class="checklist-desc">Pastikan data baseline dan perhitungan emission reduction terdokumentasi dengan baik</div>
                    </div>
                </label>

                <label class="checklist-item">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="custom-checkbox" name="check_monitoring" required>
                    </div>
                    <div class="checklist-content">
                        <div class="checklist-title">Bukti monitoring tersedia</div>
                        <div class="checklist-desc">Verifikasi ketersediaan bukti monitoring seperti foto, GPS coordinates, dan data sensor</div>
                    </div>
                </label>

                <label class="checklist-item">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="custom-checkbox" name="check_permanence" required>
                    </div>
                    <div class="checklist-content">
                        <div class="checklist-title">Permanence assurance</div>
                        <div class="checklist-desc">Cek mekanisme untuk memastikan permanence dari carbon sequestration</div>
                    </div>
                </label>

                <label class="checklist-item">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" class="custom-checkbox" name="check_leakage" required>
                    </div>
                    <div class="checklist-content">
                        <div class="checklist-title">Leakage assessment</div>
                        <div class="checklist-desc">Pastikan ada assessment terhadap potensi leakage dan strategi mitigasinya</div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Section 2: Emission Verification -->
        <div class="form-section">
            <h2 class="section-title">
                <span class="section-icon">🔬</span>
                Verifikasi Emisi
            </h2>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">
                        Emisi yang Diklaim (ton CO₂) <span class="required">*</span>
                    </label>
                    <input type="number" name="claimed_emission" class="form-input" placeholder="Masukkan jumlah" required step="0.01">
                    <span class="form-hint">Sesuai dengan laporan MRV seller</span>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Emisi Terverifikasi (ton CO₂) <span class="required">*</span>
                    </label>
                    <input type="number" name="verified_emission" class="form-input" placeholder="Masukkan jumlah" required step="0.01">
                    <span class="form-hint">Hasil verifikasi auditor</span>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Confidence Level <span class="required">*</span>
                    </label>
                    <select name="confidence_level" class="form-select" required>
                        <option value="">Pilih level</option>
                        <option value="high">High (>95%)</option>
                        <option value="reasonable">Reasonable (90-95%)</option>
                        <option value="limited">Limited (<90%)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Uncertainty Range (%) <span class="required">*</span>
                    </label>
                    <input type="number" name="uncertainty_range" class="form-input" placeholder="Contoh: 5" required step="0.1">
                    <span class="form-hint">±% dari emisi terverifikasi</span>
                </div>

                <div class="form-group full-width">
                    <label class="form-label">
                        Catatan Verifikasi <span class="required">*</span>
                    </label>
                    <textarea name="verification_notes" class="form-textarea" placeholder="Jelaskan temuan, metodologi verifikasi, dan perbedaan (jika ada) antara emisi yang diklaim dengan hasil verifikasi..." required></textarea>
                </div>

                <div class="form-group full-width">
                    <label class="form-label">
                        Rekomendasi & Tindak Lanjut
                    </label>
                    <textarea name="recommendations" class="form-textarea" placeholder="Berikan rekomendasi untuk periode berikutnya atau perbaikan yang diperlukan..."></textarea>
                </div>
            </div>
        </div>

        <!-- Section 3: Site Verification -->
        <div class="form-section">
            <h2 class="section-title">
                <span class="section-icon">📍</span>
                Verifikasi Lapangan (Opsional)
            </h2>

            <div class="alert alert-warning">
                <div class="alert-icon">⚠️</div>
                <div>Verifikasi lapangan direkomendasikan untuk proyek dengan kapasitas >20,000 ton atau yang pertama kali submit MRV</div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">
                        Verifikasi Lapangan Dilakukan?
                    </label>
                    <select name="site_visit" class="form-select" id="siteVisitSelect">
                        <option value="no">Tidak</option>
                        <option value="yes">Ya</option>
                    </select>
                </div>

                <div class="form-group" id="siteVisitDate" style="display: none;">
                    <label class="form-label">
                        Tanggal Kunjungan
                    </label>
                    <input type="date" name="site_visit_date" class="form-input">
                </div>

                <div class="form-group full-width" id="siteVisitNotes" style="display: none;">
                    <label class="form-label">
                        Catatan Kunjungan Lapangan
                    </label>
                    <textarea name="site_visit_notes" class="form-textarea" placeholder="Jelaskan temuan dari kunjungan lapangan, kondisi proyek, dan validasi terhadap data yang dilaporkan..."></textarea>
                </div>
            </div>
        </div>

        <!-- Section 4: Upload Verification Report -->
        <div class="form-section">
            <h2 class="section-title">
                <span class="section-icon">📤</span>
                Upload Laporan Verifikasi
            </h2>

            <div class="form-group full-width">
                <label class="form-label">
                    Laporan Verifikasi (PDF) <span class="required">*</span>
                </label>
                <div class="file-upload-area" onclick="document.getElementById('verificationReport').click()">
                    <div class="upload-icon">📄</div>
                    <div class="upload-text">Klik atau drag & drop file di sini</div>
                    <div class="upload-hint">Format: PDF, Maksimal 10 MB</div>
                </div>
                <input type="file" name="verification_report" id="verificationReport" class="file-input" accept=".pdf" required>
                <div id="uploadedVerification"></div>
            </div>

            <div class="form-group full-width">
                <label class="form-label">
                    Dokumen Pendukung (Opsional)
                </label>
                <div class="file-upload-area" onclick="document.getElementById('supportingDocs').click()">
                    <div class="upload-icon">📎</div>
                    <div class="upload-text">Upload dokumen pendukung</div>
                    <div class="upload-hint">Format: PDF, Excel, Gambar. Maksimal 5 file @ 5 MB</div>
                </div>
                <input type="file" name="supporting_docs[]" id="supportingDocs" class="file-input" accept=".pdf,.xlsx,.xls,.jpg,.jpeg,.png" multiple>
                <div id="uploadedSupporting"></div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="button" class="btn btn-secondary" id="saveDraftBtn">
                💾 Simpan Draft
            </button>
            <button type="button" class="btn btn-danger" id="rejectBtn">
                ❌ Tolak Verifikasi
            </button>
            <button type="submit" class="btn btn-primary">
                ✅ Submit Verifikasi
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/Auditor/verifikasi-proyek.js') }}"></script>
@endpush