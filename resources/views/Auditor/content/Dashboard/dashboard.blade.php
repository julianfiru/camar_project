@extends('Auditor.layouts.app')

@section('title', 'Dashboard - Camar Indonesia')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Auditor/dashboard.css') }}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Dashboard Auditor</h1>
        <p class="page-subtitle">Kelola dan verifikasi proyek offset karbon secara menyeluruh</p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon pending">⏳</div>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Menunggu Verifikasi</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon verified">✅</div>
            </div>
            <div class="stat-value">34</div>
            <div class="stat-label">Terverifikasi Bulan Ini</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon total">📊</div>
            </div>
            <div class="stat-value">156</div>
            <div class="stat-label">Total Proyek Audit</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div class="stat-icon archived">📁</div>
            </div>
            <div class="stat-value">89,450</div>
            <div class="stat-label">Total Emisi Terverifikasi (ton)</div>
        </div>
    </div>

    <!-- Projects Section -->
    <div class="projects-section">
        <div class="section-header">
            <h2 class="section-title">Proyek Menunggu Verifikasi</h2>
            <div class="filter-group">
                <button class="filter-btn active">Semua</button>
                <button class="filter-btn">Prioritas Tinggi</button>
                <input type="text" class="search-box" placeholder="Cari proyek...">
            </div>
        </div>

        <div class="table-wrapper">
            <table class="projects-table">
                <thead>
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Seller</th>
                        <th>Total Kapasitas</th>
                        <th>Tersedia</th>
                        <th>Status</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="project-name">Reforestasi Kalimantan Timur</div>
                            <div class="project-type">Reforestation & Afforestation</div>
                        </td>
                        <td>PT Hijau Lestari</td>
                        <td>
                            <div>25,000 ton</div>
                            <div class="capacity-bar">
                                <div class="capacity-fill" style="width: 75%;"></div>
                            </div>
                        </td>
                        <td>18,750 ton</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>3 tahun</td>
                        <td>
                            <button class="action-btn primary">Verifikasi</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="project-name">Solar Farm Nusa Tenggara</div>
                            <div class="project-type">Renewable Energy</div>
                        </td>
                        <td>CV Energi Matahari</td>
                        <td>
                            <div>15,000 ton</div>
                            <div class="capacity-bar">
                                <div class="capacity-fill" style="width: 60%;"></div>
                            </div>
                        </td>
                        <td>9,000 ton</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>2 tahun</td>
                        <td>
                            <button class="action-btn primary">Verifikasi</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="project-name">Mangrove Restoration Sulawesi</div>
                            <div class="project-type">Blue Carbon</div>
                        </td>
                        <td>Yayasan Pesisir Hijau</td>
                        <td>
                            <div>12,500 ton</div>
                            <div class="capacity-bar">
                                <div class="capacity-fill" style="width: 85%;"></div>
                            </div>
                        </td>
                        <td>10,625 ton</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>3 tahun</td>
                        <td>
                            <button class="action-btn primary">Verifikasi</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="project-name">Wind Power Papua</div>
                            <div class="project-type">Renewable Energy</div>
                        </td>
                        <td>PT Angin Nusantara</td>
                        <td>
                            <div>30,000 ton</div>
                            <div class="capacity-bar">
                                <div class="capacity-fill" style="width: 45%;"></div>
                            </div>
                        </td>
                        <td>13,500 ton</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>3 tahun</td>
                        <td>
                            <button class="action-btn primary">Verifikasi</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="project-name">Peat Restoration Riau</div>
                            <div class="project-type">Peatland Conservation</div>
                        </td>
                        <td>PT Gambut Lestari</td>
                        <td>
                            <div>20,000 ton</div>
                            <div class="capacity-bar">
                                <div class="capacity-fill" style="width: 90%;"></div>
                            </div>
                        </td>
                        <td>18,000 ton</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>2 tahun</td>
                        <td>
                            <button class="action-btn primary">Verifikasi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recently Verified Section -->
    <div class="projects-section">
        <div class="section-header">
            <h2 class="section-title">Proyek Terverifikasi Terbaru</h2>
            <button class="filter-btn">Lihat Semua</button>
        </div>

        <div class="table-wrapper">
            <table class="projects-table">
                <thead>
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Seller</th>
                        <th>Emisi Terverifikasi</th>
                        <th>Status</th>
                        <th>Tanggal Verifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="project-name">Biogas Plant Jawa Tengah</div>
                            <div class="project-type">Waste Management</div>
                        </td>
                        <td>PT Bio Energi</td>
                        <td>8,500 ton</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>25 Des 2025</td>
                        <td>
                            <button class="action-btn">Lihat Laporan</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="project-name">Hydro Power Sumatra</div>
                            <div class="project-type">Renewable Energy</div>
                        </td>
                        <td>CV Air Bersih</td>
                        <td>22,000 ton</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>23 Des 2025</td>
                        <td>
                            <button class="action-btn">Lihat Laporan</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="project-name">Agroforestry Bali</div>
                            <div class="project-type">Sustainable Agriculture</div>
                        </td>
                        <td>Koperasi Tani Hijau</td>
                        <td>5,750 ton</td>
                        <td><span class="status-badge completed">Completed</span></td>
                        <td>20 Des 2025</td>
                        <td>
                            <button class="action-btn">Lihat Laporan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/Auditor/dashboard.js') }}"></script>
@endpush