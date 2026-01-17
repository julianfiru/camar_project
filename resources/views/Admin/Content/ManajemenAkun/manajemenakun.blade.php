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
    <div class="card-modern">
        <!-- Tabs Header -->
        <ul class="nav nav-tabs nav-tabs-modern" id="accountTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="buyer-tab" data-bs-toggle="tab" href="#buyer-content" role="tab">
                    <i class="bi bi-cart-check me-2"></i>Buyer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="seller-tab" data-bs-toggle="tab" href="#seller-content" role="tab">
                    <i class="bi bi-shop me-2"></i>Seller
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="auditor-tab" data-bs-toggle="tab" href="#auditor-content" role="tab">
                    <i class="bi bi-shield-check me-2"></i>Auditor
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Buyer Tab -->
            <div class="tab-pane fade show active" id="buyer-content" role="tabpanel">
                <div class="filter-section d-flex gap-3 align-items-center flex-wrap">
                    <div class="flex-grow-1">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Cari buyer...">
                        </div>
                    </div>
                    <select class="form-select w-auto">
                        <option value="">Semua Status</option>
                        <option value="pending">Menunggu</option>
                        <option value="approved">Disetujui</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Kontak</th>
                                <th>Verified At</th>
                                <th>Daftar</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="fw-bold">PT Industri Hijau Indonesia</div>
                                    <div class="small text-muted">budi@industrihijau.co.id</div>
                                </td>
                                <td>Budi Santoso</td>
                                <td><span class="text-muted">-</span></td>
                                <td>22 Des 2025</td>
                                <td><span class="badge badge-modern badge-soft-warning">Menunggu</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-icon btn-light text-primary" title="Detail"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-success" title="Approve"><i class="bi bi-check-lg"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-danger" title="Tolak"><i class="bi bi-x-lg"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">CV Karbon Nusantara</div>
                                    <div class="small text-muted">siti@karbonnusantara.id</div>
                                </td>
                                <td>Siti Nurhaliza</td>
                                <td><span class="text-muted">-</span></td>
                                <td>21 Des 2025</td>
                                <td><span class="badge badge-modern badge-soft-warning">Menunggu</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-icon btn-light text-primary" title="Detail"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-success" title="Approve"><i class="bi bi-check-lg"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-danger" title="Tolak"><i class="bi bi-x-lg"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">PT Manufaktur Berkelanjutan</div>
                                    <div class="small text-muted">ahmad@manufaktur.co.id</div>
                                </td>
                                <td>Ahmad Hidayat</td>
                                <td><i class="bi bi-check-circle-fill text-success me-1"></i>21 Des 2025</td>
                                <td>20 Des 2025</td>
                                <td><span class="badge badge-modern badge-soft-success">Disetujui</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-icon btn-light text-primary" title="Detail"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Seller Tab -->
            <div class="tab-pane fade" id="seller-content" role="tabpanel">
                <div class="filter-section d-flex gap-3 align-items-center flex-wrap">
                    <div class="flex-grow-1">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Cari seller...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th>Perusahaan</th>
                                <th>Bisnis</th>
                                <th>Badges</th>
                                <th>Verified At</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="fw-bold">PT Green Energy Solutions</div>
                                    <div class="small text-muted">eko@greenenergy.co.id</div>
                                </td>
                                <td>Energi</td>
                                <td><span class="badge badge-modern badge-soft-secondary">New</span></td>
                                <td><span class="text-muted">-</span></td>
                                <td><span class="badge badge-modern badge-soft-warning">Menunggu</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-icon btn-light text-primary"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-success"><i class="bi bi-check-lg"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-danger"><i class="bi bi-x-lg"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">CV Hutan Lestari Nusantara</div>
                                    <div class="small text-muted">bambang@hutanlestari.id</div>
                                </td>
                                <td>Kehutanan</td>
                                <td><span class="badge badge-modern badge-soft-gold"><i class="bi bi-star-fill me-1"></i>Gold</span></td>
                                <td><span class="text-muted">-</span></td>
                                <td><span class="badge badge-modern badge-soft-warning">Menunggu</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-icon btn-light text-primary"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-success"><i class="bi bi-check-lg"></i></button>
                                    <button class="btn btn-sm btn-icon btn-light text-danger"><i class="bi bi-x-lg"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Auditor Tab -->
            <div class="tab-pane fade" id="auditor-content" role="tabpanel">
                <div class="filter-section d-flex justify-content-between align-items-center">
                    <div style="width: 300px;">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Cari auditor...">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm d-flex align-items-center" style="background-color: var(--color-quaternary);">
                        <i class="bi bi-plus-lg me-2"></i>Tambah Auditor
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th>Auditor</th>
                                <th>Posisi</th>
                                <th>Spesialisasi</th>
                                <th>Sertifikasi</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="fw-bold">Dr. Hartono Wijaya</div>
                                    <div class="small text-muted">hartono.wijaya@auditor.camar.id</div>
                                </td>
                                <td>Senior Auditor</td>
                                <td>Energi Terbarukan</td>
                                <td><span class="badge badge-modern badge-soft-info">ISO 14064</span></td>
                                <td><span class="badge badge-modern badge-soft-success">Aktif</span></td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon btn-light" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                            <li><a class="dropdown-item" href="#">Edit Profil</a></li>
                                            <li><a class="dropdown-item text-danger" href="#">Suspend</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="fw-bold">Ir. Siti Rahmawati, M.Sc</div>
                                    <div class="small text-muted">siti.rahmawati@auditor.camar.id</div>
                                </td>
                                <td>Junior Auditor</td>
                                <td>Kehutanan & REDD+</td>
                                <td><span class="badge badge-modern badge-soft-info">VCS</span></td>
                                <td><span class="badge badge-modern badge-soft-success">Aktif</span></td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon btn-light" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                            <li><a class="dropdown-item" href="#">Edit Profil</a></li>
                                            <li><a class="dropdown-item text-danger" href="#">Suspend</a></li>
                                        </ul>
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
    console.log('Manajemen Akun modernized loaded');
</script>
@endpush