@extends('Admin.Layout.app')

@section('title', 'Manajemen Akun - CAMAR Admin')

@section('page-title', 'Manajemen Akun')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Manajemen Akun</li>
@endsection

@section('header-actions')
    <button class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Tambah Akun
    </button>
@endsection

@section('Admin.Content')
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-person"></i>
                </div>
                <div class="stat-value">15</div>
                <div class="stat-label">Buyer Pending</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="bi bi-building"></i>
                </div>
                <div class="stat-value">9</div>
                <div class="stat-label">Seller Pending</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon teal">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-label">Auditor Aktif</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div class="stat-value">234</div>
                <div class="stat-label">Total Akun</div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="content-section">
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs mb-4" id="accountTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="buyer-tab" data-bs-toggle="tab" data-bs-target="#buyer" type="button" role="tab">
                    <i class="bi bi-person me-2"></i>Approve Buyer
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="seller-tab" data-bs-toggle="tab" data-bs-target="#seller" type="button" role="tab">
                    <i class="bi bi-building me-2"></i>Approve Seller
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="auditor-tab" data-bs-toggle="tab" data-bs-target="#auditor" type="button" role="tab">
                    <i class="bi bi-shield-check me-2"></i>Kelola Auditor
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="accountTabContent">
            <!-- Approve Buyer Tab -->
            <div class="tab-pane fade show active" id="buyer" role="tabpanel">
                <!-- Search & Filter -->
                <div class="row g-3 mb-4">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari nama buyer, email, atau perusahaan...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Urutkan</option>
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="name">Nama A-Z</option>
                        </select>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Kontak Person</th>
                                <th>Email</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PT Industri Hijau Indonesia</td>
                                <td>Budi Santoso</td>
                                <td>budi@industrihijau.co.id</td>
                                <td>22 Des 2025</td>
                                <td><span class="badge pending">Menunggu</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                        <button class="btn btn-primary btn-sm">Approve</button>
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>CV Karbon Nusantara</td>
                                <td>Siti Nurhaliza</td>
                                <td>siti@karbonnusantara.id</td>
                                <td>21 Des 2025</td>
                                <td><span class="badge pending">Menunggu</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                        <button class="btn btn-primary btn-sm">Approve</button>
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>PT Manufaktur Berkelanjutan</td>
                                <td>Ahmad Hidayat</td>
                                <td>ahmad@manufaktur.co.id</td>
                                <td>20 Des 2025</td>
                                <td><span class="badge approved">Disetujui</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Approve Seller Tab -->
            <div class="tab-pane fade" id="seller" role="tabpanel">
                <!-- Search & Filter -->
                <div class="row g-3 mb-4">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari nama seller, email, atau perusahaan...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Urutkan</option>
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="name">Nama A-Z</option>
                        </select>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Kontak Person</th>
                                <th>Email</th>
                                <th>Jenis Proyek</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PT Green Energy Solutions</td>
                                <td>Eko Prasetyo</td>
                                <td>eko@greenenergy.co.id</td>
                                <td>Energi Terbarukan</td>
                                <td>23 Des 2025</td>
                                <td><span class="badge pending">Menunggu</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                        <button class="btn btn-primary btn-sm">Approve</button>
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>CV Hutan Lestari Nusantara</td>
                                <td>Bambang Wijaya</td>
                                <td>bambang@hutanlestari.id</td>
                                <td>Konservasi Hutan</td>
                                <td>22 Des 2025</td>
                                <td><span class="badge pending">Menunggu</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                        <button class="btn btn-primary btn-sm">Approve</button>
                                        <button class="btn btn-danger btn-sm">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kelola Auditor Tab -->
            <div class="tab-pane fade" id="auditor" role="tabpanel">
                <!-- Search & Filter -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari nama auditor...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Semua Spesialisasi</option>
                            <option value="energi">Energi Terbarukan</option>
                            <option value="kehutanan">Kehutanan</option>
                            <option value="pertanian">Pertanian</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle me-2"></i>Tambah
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Auditor</th>
                                <th>Email</th>
                                <th>Spesialisasi</th>
                                <th>Sertifikasi</th>
                                <th>Proyek</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dr. Hartono Wijaya</td>
                                <td>hartono.wijaya@auditor.camar.id</td>
                                <td>Energi Terbarukan</td>
                                <td>ISO 14064, GHG Protocol</td>
                                <td>23</td>
                                <td><span class="badge active">Aktif</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Ir. Siti Rahmawati, M.Sc</td>
                                <td>siti.rahmawati@auditor.camar.id</td>
                                <td>Kehutanan & REDD+</td>
                                <td>VCS, Gold Standard</td>
                                <td>18</td>
                                <td><span class="badge active">Aktif</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary btn-sm">Detail</button>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Suspend</button>
                                    </div>
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
    console.log('Manajemen Akun loaded successfully');
</script>
@endpush