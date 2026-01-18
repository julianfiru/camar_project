@extends('Admin.Layout.app')

@section('title', 'Audit Log - CAMAR Admin')

@section('page-title', 'Audit Log')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Audit Log</li>
@endsection

@section('header-actions')
    <button class="btn btn-primary">
        <i class="bi bi-download me-2"></i>Export Log
    </button>
@endsection

@section('Admin.Content')
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-value">1,247</div>
                <div class="stat-label">Total Aktivitas</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="bi bi-person-check"></i>
                </div>
                <div class="stat-value">89</div>
                <div class="stat-label">Login Hari Ini</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon teal">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div class="stat-value">34</div>
                <div class="stat-label">Aktivitas Admin</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="stat-value">5</div>
                <div class="stat-label">Aktivitas Mencurigakan</div>
            </div>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="content-section mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Cari aktivitas, user, atau IP address...">
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Semua User</option>
                    <option value="admin">Admin</option>
                    <option value="auditor">Auditor</option>
                    <option value="seller">Seller</option>
                    <option value="buyer">Buyer</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select">
                    <option value="">Semua Aktivitas</option>
                    <option value="login">Login</option>
                    <option value="logout">Logout</option>
                    <option value="create">Create</option>
        <div class="col-md-3">
            <div class="log-stat-card">
                <div class="log-icon-wrapper bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-activity"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">1,248</h4>
                    <span class="text-muted small">Total Aktivitas</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="log-stat-card">
                <div class="log-icon-wrapper bg-success bg-opacity-10 text-success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">98.5%</h4>
                    <span class="text-muted small">Success Rate</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="log-stat-card">
                <div class="log-icon-wrapper bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-shield-exclamation"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">12</h4>
                    <span class="text-muted small">Suspicious</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="log-stat-card">
                <div class="log-icon-wrapper bg-info bg-opacity-10 text-info">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <h4 class="mb-0 fw-bold">45</h4>
                    <span class="text-muted small">Active Users</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card-modern">
        <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
            <h5 class="fw-bold mb-0 text-dark">Aktivitas Terbaru</h5>
            <div class="d-flex gap-2">
                <div class="input-group" style="width: 250px;">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" class="form-control border-start-0 bg-light" placeholder="Search logs...">
                </div>
                <button class="btn btn-outline-secondary"><i class="bi bi-filter"></i></button>
                <button class="btn btn-outline-secondary"><i class="bi bi-download"></i></button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 25%;">User / Actor</th>
                        <th>Action</th>
                        <th>Entity Type</th>
                        <th>Entity ID</th>
                        <th>IP Address</th>
                        <th>Timestamp</th>
                        <th class="text-end">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                                Login
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Auth</span></td>
                        <td><code>-</code></td>
                        <td>Login berhasil ke sistem</td>
                        <td><code>114.79.45.201</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">13:45:18</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Unknown User</div>
                            <div class="small text-muted">-</div>
                        </td>
                        <td><span class="badge bg-secondary">Guest</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-x-circle text-danger me-2"></i>
                                Login Gagal
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Auth</span></td>
                        <td><code>-</code></td>
                        <td>Percobaan login dengan kredensial salah</td>
                        <td><code>45.123.67.89</code></td>
                        <td><span class="badge pending">Gagal</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">13:30:05</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Admin Super</div>
                            <div class="small text-muted">admin@camar.id</div>
                        </td>
                        <td><span class="badge bg-danger">Admin</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-award text-warning me-2"></i>
                                Terbitkan Sertifikat
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Certificate</span></td>
                        <td><code>CERT-2025-001</code></td>
                        <td>Menerbitkan sertifikat untuk proyek #CR-2025-001</td>
                        <td><code>192.168.1.100</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">12:15:33</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Budi Santoso</div>
                            <div class="small text-muted">budi@industrihijau.co.id</div>
                        </td>
                        <td><span class="badge bg-primary">Buyer</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-file-earmark-plus text-success me-2"></i>
                                Buat Transaksi
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Order</span></td>
                        <td><code>ORD-2025-156</code></td>
                        <td>Membuat transaksi pembelian 500 ton CO2</td>
                        <td><code>180.247.92.15</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">11:48:20</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Admin Super</div>
                            <div class="small text-muted">admin@camar.id</div>
                        </td>
                        <td><span class="badge bg-danger">Admin</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-trash text-danger me-2"></i>
                                Hapus Data
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">User</span></td>
                        <td><code>USR-2025-099</code></td>
                        <td>Menghapus akun spam user@spam.com</td>
                        <td><code>192.168.1.100</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">11:20:45</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Ir. Siti Rahmawati</div>
                            <div class="small text-muted">siti@auditor.camar.id</div>
                        </td>
                        <td><span class="badge bg-info">Auditor</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clipboard-check text-success me-2"></i>
                                Verifikasi Proyek
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Project</span></td>
                        <td><code>PRJ-2025-045</code></td>
                        <td>Menyelesaikan verifikasi proyek Mangrove Conservation</td>
                        <td><code>125.164.33.78</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">10:55:12</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Unknown User</div>
                            <div class="small text-muted">-</div>
                        </td>
                        <td><span class="badge bg-secondary">Guest</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-shield-exclamation text-danger me-2"></i>
                                Akses Ditolak
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">Security</span></td>
                        <td><code>-</code></td>
                        <td>Percobaan akses ke halaman admin tanpa otorisasi</td>
                        <td><code>67.89.123.45</code></td>
                        <td><span class="badge pending">Gagal</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">10:30:00</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Admin Super</div>
                            <div class="small text-muted">admin@camar.id</div>
                        </td>
                        <td><span class="badge bg-danger">Admin</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-gear text-primary me-2"></i>
                                Update Settings
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">System</span></td>
                        <td><code>SYS-CONF</code></td>
                        <td>Mengubah konfigurasi sistem notifikasi</td>
                        <td><code>192.168.1.100</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted small">
                Menampilkan 1-10 dari 1,247 aktivitas
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">125</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    console.log('Audit Log loaded successfully');
</script>
@endpush