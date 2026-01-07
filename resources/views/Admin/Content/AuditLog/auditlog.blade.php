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
                    <option value="update">Update</option>
                    <option value="delete">Delete</option>
                    <option value="approve">Approve</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control" placeholder="Tanggal Mulai">
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control" placeholder="Tanggal Akhir">
            </div>
        </div>
    </div>

    <!-- Audit Log Table -->
    <div class="content-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Riwayat Aktivitas</h2>
            <div class="d-flex gap-2">
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-funnel me-2"></i>Filter Lanjutan
                </button>
                <button class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-clockwise me-2"></i>Refresh
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Aktivitas</th>
                        <th>Detail</th>
                        <th>IP Address</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">14:23:15</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Admin Super</div>
                            <div class="small text-muted">admin@camar.id</div>
                        </td>
                        <td><span class="badge bg-danger">Admin</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-check text-success me-2"></i>
                                Approve Akun
                            </div>
                        </td>
                        <td>Menyetujui akun PT Green Energy Indonesia</td>
                        <td><code>192.168.1.100</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">14:15:42</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Dr. Hartono Wijaya</div>
                            <div class="small text-muted">hartono@auditor.camar.id</div>
                        </td>
                        <td><span class="badge bg-info">Auditor</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-file-earmark-check text-primary me-2"></i>
                                Update Proyek
                            </div>
                        </td>
                        <td>Memperbarui status proyek Reforestasi Kalimantan</td>
                        <td><code>103.45.78.120</code></td>
                        <td><span class="badge approved">Berhasil</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="fw-semibold">05 Jan 2026</div>
                            <div class="small text-muted">13:58:30</div>
                        </td>
                        <td>
                            <div class="fw-semibold">Eko Prasetyo</div>
                            <div class="small text-muted">eko@greenenergy.co.id</div>
                        </td>
                        <td><span class="badge bg-success">Seller</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-box-arrow-in-right text-primary me-2"></i>
                                Login
                            </div>
                        </td>
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