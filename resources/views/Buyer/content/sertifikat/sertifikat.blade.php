@extends('Buyer.layout.app')

@section('title', 'Sertifikat Buyer - CAMAR')

@section('page-title', 'Sertifikat Buyer')
@section('page-subtitle', 'Kumpulan Sertifikat Carbon Offset Anda')

@section('Buyer.content')

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Offset Terverifikasi</div>
                <div class="stat-value" id="totalOffset">0</div>
                <div class="stat-unit">ton CO₂e</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-secondary">
            <div class="stat-icon">
                <i class="bi bi-award-fill"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Jumlah Sertifikat</div>
                <div class="stat-value" id="jumlahSertifikat">0</div>
                <div class="stat-unit">sertifikat diterbitkan</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-tertiary">
            <div class="stat-icon">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div class="stat-content">
                <div class="stat-label">Offset Dalam Proses</div>
                <div class="stat-value" id="offsetProses">0</div>
                <div class="stat-unit">ton CO₂e (belum tersertifikasi)</div>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="content-section mb-4">
    <h2 class="section-title mb-3">Filter Sertifikat</h2>
    <div class="row g-3">
        <div class="col-md-3">
            <label class="form-label">Filter Tahun</label>
            <select class="form-select" id="filterTahun">
                <option value="">Semua Tahun</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Filter Proyek</label>
            <select class="form-select" id="filterProyek">
                <option value="">Semua Proyek</option>
                <option value="energi">Energi Terbarukan</option>
                <option value="reboisasi">Reboisasi</option>
                <option value="mangrove">Mangrove</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Status</label>
            <select class="form-select" id="filterStatus">
                <option value="">Semua Status</option>
                <option value="retired">Retired</option>
                <option value="active">Active</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Urutkan</label>
            <select class="form-select" id="filterSort">
                <option value="terbaru">Terbaru</option>
                <option value="terlama">Terlama</option>
                <option value="jumlah">Jumlah Offset</option>
            </select>
        </div>
    </div>
</div>

<!-- Certificate List -->
<div id="certificateList">
    
    <!-- Certificate 1 -->
    <div class="certificate-card" 
         data-year="2025" 
         data-project="energi"
         data-status="retired"
         data-date="2025-07-25"
         data-amount="200">
        <div class="certificate-container">
            <div class="certificate-header">
                <div class="certificate-header-left">
                    <h3 class="certificate-title">Sertifikat Carbon Offset</h3>
                    <p class="certificate-id">ID: CERT-2025-001</p>
                </div>
                <div class="certificate-header-right">
                    <span class="badge-status badge-retired">
                        <i class="bi bi-check-circle-fill"></i> RETIRED
                    </span>
                </div>
            </div>

            <div class="certificate-body">
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Nama Proyek</div>
                            <div class="info-value">Proyek Energi Terbarukan Jawa Timur</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Perusahaan</div>
                            <div class="info-value">PT Solar Energy Nusantara</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Periode Realisasi</div>
                            <div class="info-value">Januari - Juni 2025</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Standar Verifikasi</div>
                            <div class="info-value">VCS (Verified Carbon Standard)</div>
                        </div>
                    </div>
                </div>

                <div class="offset-highlight">
                    <div class="offset-icon">
                        <i class="bi bi-leaf-fill"></i>
                    </div>
                    <div class="offset-content">
                        <div class="offset-amount">200 ton CO₂e</div>
                        <div class="offset-description">Total carbon offset yang telah direalisasikan dan diverifikasi</div>
                    </div>
                </div>

                <div class="verification-details">
                    <div class="verification-header">
                        <i class="bi bi-shield-fill-check"></i>
                        DETAIL VERIFIKASI
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-check"></i>
                                <div>
                                    <div class="verification-label">Tanggal Verifikasi</div>
                                    <div class="verification-value">15 Juli 2025</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-x"></i>
                                <div>
                                    <div class="verification-label">Tanggal Retirement</div>
                                    <div class="verification-value">20 Juli 2025</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-building"></i>
                                <div>
                                    <div class="verification-label">Auditor</div>
                                    <div class="verification-value">PT Verifikasi Karbon Indonesia</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-event"></i>
                                <div>
                                    <div class="verification-label">Tanggal Terbit</div>
                                    <div class="verification-value">25 Juli 2025</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="certificate-footer">
                <button class="btn btn-primary" onclick="downloadCertificate('CERT-2025-001', '200 ton CO₂e')">
                    <i class="bi bi-download"></i> Unduh Sertifikat PDF
                </button>
                <button class="btn btn-secondary" onclick="viewDetails('CERT-2025-001')">
                    <i class="bi bi-eye"></i> Lihat Detail
                </button>
            </div>
        </div>
    </div>

    <!-- Certificate 2 -->
    <div class="certificate-card" 
         data-year="2024" 
         data-project="reboisasi"
         data-status="retired"
         data-date="2025-01-20"
         data-amount="200">
        <div class="certificate-container">
            <div class="certificate-header">
                <div class="certificate-header-left">
                    <h3 class="certificate-title">Sertifikat Carbon Offset</h3>
                    <p class="certificate-id">ID: CERT-2024-002</p>
                </div>
                <div class="certificate-header-right">
                    <span class="badge-status badge-retired">
                        <i class="bi bi-check-circle-fill"></i> RETIRED
                    </span>
                </div>
            </div>

            <div class="certificate-body">
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Nama Proyek</div>
                            <div class="info-value">Proyek Reboisasi Kalimantan</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Perusahaan</div>
                            <div class="info-value">PT Hutan Hijau Indonesia</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Periode Realisasi</div>
                            <div class="info-value">Juli - Desember 2024</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Standar Verifikasi</div>
                            <div class="info-value">Gold Standard</div>
                        </div>
                    </div>
                </div>

                <div class="offset-highlight">
                    <div class="offset-icon">
                        <i class="bi bi-tree-fill"></i>
                    </div>
                    <div class="offset-content">
                        <div class="offset-amount">200 ton CO₂e</div>
                        <div class="offset-description">Total carbon offset yang telah direalisasikan dan diverifikasi</div>
                    </div>
                </div>

                <div class="verification-details">
                    <div class="verification-header">
                        <i class="bi bi-shield-fill-check"></i>
                        DETAIL VERIFIKASI
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-check"></i>
                                <div>
                                    <div class="verification-label">Tanggal Verifikasi</div>
                                    <div class="verification-value">10 Januari 2025</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-x"></i>
                                <div>
                                    <div class="verification-label">Tanggal Retirement</div>
                                    <div class="verification-value">15 Januari 2025</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-building"></i>
                                <div>
                                    <div class="verification-label">Auditor</div>
                                    <div class="verification-value">PT Verifikasi Karbon Indonesia</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-event"></i>
                                <div>
                                    <div class="verification-label">Tanggal Terbit</div>
                                    <div class="verification-value">20 Januari 2025</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="certificate-footer">
                <button class="btn btn-primary" onclick="downloadCertificate('CERT-2024-002', '200 ton CO₂e')">
                    <i class="bi bi-download"></i> Unduh Sertifikat PDF
                </button>
                <button class="btn btn-secondary" onclick="viewDetails('CERT-2024-002')">
                    <i class="bi bi-eye"></i> Lihat Detail
                </button>
            </div>
        </div>
    </div>

    <!-- Certificate 3 -->
    <div class="certificate-card" 
         data-year="2024" 
         data-project="mangrove"
         data-status="retired"
         data-date="2024-07-18"
         data-amount="200">
        <div class="certificate-container">
            <div class="certificate-header">
                <div class="certificate-header-left">
                    <h3 class="certificate-title">Sertifikat Carbon Offset</h3>
                    <p class="certificate-id">ID: CERT-2024-001</p>
                </div>
                <div class="certificate-header-right">
                    <span class="badge-status badge-retired">
                        <i class="bi bi-check-circle-fill"></i> RETIRED
                    </span>
                </div>
            </div>

            <div class="certificate-body">
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Nama Proyek</div>
                            <div class="info-value">Proyek Konservasi Mangrove Sulawesi</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Perusahaan</div>
                            <div class="info-value">PT Ekosistem Lestari</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Periode Realisasi</div>
                            <div class="info-value">Januari - Juni 2024</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <div class="info-label">Standar Verifikasi</div>
                            <div class="info-value">VCS (Verified Carbon Standard)</div>
                        </div>
                    </div>
                </div>

                <div class="offset-highlight">
                    <div class="offset-icon">
                        <i class="bi bi-water"></i>
                    </div>
                    <div class="offset-content">
                        <div class="offset-amount">200 ton CO₂e</div>
                        <div class="offset-description">Total carbon offset yang telah direalisasikan dan diverifikasi</div>
                    </div>
                </div>

                <div class="verification-details">
                    <div class="verification-header">
                        <i class="bi bi-shield-fill-check"></i>
                        DETAIL VERIFIKASI
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-check"></i>
                                <div>
                                    <div class="verification-label">Tanggal Verifikasi</div>
                                    <div class="verification-value">8 Juli 2024</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-x"></i>
                                <div>
                                    <div class="verification-label">Tanggal Retirement</div>
                                    <div class="verification-value">12 Juli 2024</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-building"></i>
                                <div>
                                    <div class="verification-label">Auditor</div>
                                    <div class="verification-value">PT Verifikasi Karbon Indonesia</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="verification-item">
                                <i class="bi bi-calendar-event"></i>
                                <div>
                                    <div class="verification-label">Tanggal Terbit</div>
                                    <div class="verification-value">18 Juli 2024</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="certificate-footer">
                <button class="btn btn-primary" onclick="downloadCertificate('CERT-2024-001', '200 ton CO₂e')">
                    <i class="bi bi-download"></i> Unduh Sertifikat PDF
                </button>
                <button class="btn btn-secondary" onclick="viewDetails('CERT-2024-001')">
                    <i class="bi bi-eye"></i> Lihat Detail
                </button>
            </div>
        </div>
    </div>

</div>

<!-- No Data Message -->
<div id="noDataMessage" class="no-data-section" style="display: none;">
    <div class="no-data-icon">📜</div>
    <h5 class="no-data-title">Tidak ada sertifikat ditemukan</h5>
    <p class="no-data-text">Coba ubah filter pencarian Anda</p>
</div>

@endsection

@push('scripts')
<script>
    // Calculate and update statistics
    function updateStatistics() {
        const visibleCertificates = document.querySelectorAll('.certificate-card[style="display: block;"], .certificate-card:not([style*="display: none"])');
        
        let totalOffset = 0;
        let jumlahSertifikat = 0;
        
        visibleCertificates.forEach(cert => {
            jumlahSertifikat++;
            const amount = parseInt(cert.getAttribute('data-amount')) || 0;
            totalOffset += amount;
        });
        
        const offsetProses = 450;
        
        animateValue('totalOffset', parseInt(document.getElementById('totalOffset').textContent) || 0, totalOffset, 300);
        animateValue('jumlahSertifikat', parseInt(document.getElementById('jumlahSertifikat').textContent) || 0, jumlahSertifikat, 300);
        animateValue('offsetProses', parseInt(document.getElementById('offsetProses').textContent) || 0, offsetProses, 300);
    }
    
    function animateValue(elementId, start, end, duration) {
        const element = document.getElementById(elementId);
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                element.textContent = end;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }
    
    document.getElementById('filterTahun')?.addEventListener('change', filterCertificates);
    document.getElementById('filterProyek')?.addEventListener('change', filterCertificates);
    document.getElementById('filterStatus')?.addEventListener('change', filterCertificates);
    document.getElementById('filterSort')?.addEventListener('change', filterCertificates);
    
    function filterCertificates() {
        const yearFilter = document.getElementById('filterTahun').value;
        const projectFilter = document.getElementById('filterProyek').value;
        const statusFilter = document.getElementById('filterStatus').value;
        const sortFilter = document.getElementById('filterSort').value;
        
        const certificates = document.querySelectorAll('.certificate-card');
        let visibleCount = 0;
        
        certificates.forEach(cert => {
            const year = cert.getAttribute('data-year');
            const project = cert.getAttribute('data-project');
            const status = cert.getAttribute('data-status');
            
            let showCert = true;
            
            if (yearFilter && year !== yearFilter) showCert = false;
            if (projectFilter && project !== projectFilter) showCert = false;
            if (statusFilter && status !== statusFilter) showCert = false;
            
            cert.style.display = showCert ? 'block' : 'none';
            if (showCert) visibleCount++;
        });
        
        const noDataMessage = document.getElementById('noDataMessage');
        const certificateList = document.getElementById('certificateList');
        
        if (visibleCount === 0) {
            certificateList.style.display = 'none';
            noDataMessage.style.display = 'flex';
        } else {
            certificateList.style.display = 'block';
            noDataMessage.style.display = 'none';
        }
        
        updateStatistics();
        
        if (sortFilter !== 'terbaru') {
            sortCertificates(sortFilter);
        }
    }
    
    function sortCertificates(sortType) {
        const container = document.getElementById('certificateList');
        const certificates = Array.from(container.querySelectorAll('.certificate-card'));
        
        certificates.sort((a, b) => {
            if (sortType === 'terlama') {
                return new Date(a.getAttribute('data-date')) - new Date(b.getAttribute('data-date'));
            } else if (sortType === 'jumlah') {
                return parseInt(b.getAttribute('data-amount')) - parseInt(a.getAttribute('data-amount'));
            }
            return 0;
        });
        
        certificates.forEach(cert => container.appendChild(cert));
    }
    
    function downloadCertificate(certId, amount) {
        showNotification(`📥 Mengunduh sertifikat ${certId} (${amount})`, 'success');
    }
    
    function viewDetails(certId) {
        showNotification(`👁️ Membuka detail sertifikat ${certId}`, 'info');
    }
    
    function showNotification(message, type = 'success') {
        const colors = {
            success: 'var(--color-primary)',
            info: 'var(--color-secondary)',
            warning: '#F59E0B'
        };
        
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: ${colors[type]};
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 9999;
            animation: slideInNotif 0.3s ease;
        `;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOutNotif 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 2500);
    }
    
    window.addEventListener('load', () => {
        updateStatistics();
    });
</script>
@endpush