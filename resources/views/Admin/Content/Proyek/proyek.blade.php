@extends('Admin.Layout.app')

@section('title', 'Manajemen Proyek - CAMAR Admin')

@section('page-title', 'Manajemen Proyek')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Proyek</li>
@endsection

@section('Admin.Content')
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="nav nav-tabs mb-4" id="projectTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review-proyek" type="button" role="tab">
                        Review Proyek Baru <span class="badge bg-danger ms-2">2</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="active-tab" data-bs-toggle="tab" data-bs-target="#status-proyek" type="button" role="tab">
                        Status Proyek
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Review Proyek Tab -->
                <div class="tab-pane fade show active" id="review-proyek" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">Antrian Proyek</h5>
                        <div class="input-group w-auto">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari proyek...">
                        </div>
                    </div>
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