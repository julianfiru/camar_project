@extends('Admin.Layout.app')

@section('title', 'Dashboard - CAMAR Admin')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('header-actions')
    <div class="d-flex gap-2">
        <button class="btn btn-secondary">
            <i class="bi bi-arrow-clockwise me-2"></i>Refresh Data
        </button>
        <button class="btn btn-primary">
            <i class="bi bi-download me-2"></i>Export Report
        </button>
    </div>
@endsection

@section('Admin.Content')
    <!-- Main Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="stat-value">{{ $pendingApprovals ?? 24 }}</div>
                <div class="stat-label">Pending Approval</div>
                <small class="text-muted">Buyer & Seller</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div class="stat-value">{{ $activeProjects ?? 156 }}</div>
                <div class="stat-label">Total Proyek Aktif</div>
                <small class="text-muted">Sedang berjalan</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon teal">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <div class="stat-value">{{ $totalCertificates ?? 89 }}</div>
                <div class="stat-label">Sertifikat Diterbitkan</div>
                <small class="text-muted">Total retired</small>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <div class="stat-value">{{ number_format($totalRevenue ?? 1250000000, 0, ',', '.') }}</div>
                <div class="stat-label">Total Transaksi (Rp)</div>
                <small class="text-muted">Dari payments</small>
            </div>
        </div>
    </div>

    <!-- Carbon Offset Statistics -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-8">
            <div class="content-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0">
                        <i class="bi bi-graph-up-arrow me-2"></i>Statistik Offset Karbon
                    </h2>
                    <select class="form-select" style="width: auto;" id="periodFilter">
                        <option value="6months">6 Bulan Terakhir</option>
                        <option value="1year" selected>1 Tahun Terakhir</option>
                        <option value="all">Semua Waktu</option>
                    </select>
                </div>

                <!-- Key Metrics -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="metric-box">
                            <div class="metric-label">Total Emisi Buyer (Terhitung)</div>
                            <div class="metric-value text-danger">{{ number_format($totalEmissions ?? 487500, 0, ',', '.') }} <small>ton CO₂</small></div>
                            <small class="text-muted">Dari emission_calculations</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric-box">
                            <div class="metric-label">Total Offset Terealisasi</div>
                            <div class="metric-value text-success">{{ number_format($totalRealized ?? 325800, 0, ',', '.') }} <small>ton CO₂</small></div>
                            <small class="text-muted">Dari offset_realizations</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric-box">
                            <div class="metric-label">Tingkat Offset</div>
                            <div class="metric-value text-primary">{{ number_format($offsetRate ?? 66.8, 1) }}%</div>
                            <small class="text-muted">Realisasi vs Emisi</small>
                        </div>
                    </div>
                </div>

                <!-- Chart Area -->
                <div class="chart-container" style="height: 300px; position: relative;">
                    <canvas id="offsetChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="content-section h-100">
                <h2 class="section-title mb-4">
                    <i class="bi bi-pie-chart me-2"></i>Kategori Proyek
                </h2>
                
                <!-- Project Categories -->
                <div class="category-list">
                    @php
                        $categories = [
                            ['name' => 'Reforestasi', 'count' => 45, 'percentage' => 35, 'color' => '#67C090'],
                            ['name' => 'Energi Terbarukan', 'count' => 38, 'percentage' => 30, 'color' => '#26667F'],
                            ['name' => 'Konservasi Laut', 'count' => 32, 'percentage' => 25, 'color' => '#124170'],
                            ['name' => 'Lainnya', 'count' => 13, 'percentage' => 10, 'color' => '#DDF4E7']
                        ];
                    @endphp

                    @foreach($categories as $category)
                    <div class="category-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">{{ $category['name'] }}</span>
                            <span class="badge" style="background-color: {{ $category['color'] }}">{{ $category['count'] }} proyek</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ $category['percentage'] }}%; background-color: {{ $category['color'] }}" 
                                 aria-valuenow="{{ $category['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">{{ $category['percentage'] }}% dari total</small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Orders & Transactions -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-6">
            <div class="content-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0">
                        <i class="bi bi-cart-check me-2"></i>Transaksi Terbaru
                    </h2>
                    <a href="/admin/transaksi" class="btn btn-sm btn-secondary">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Buyer</th>
                                <th>Proyek</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $orders = [
                                    ['id' => 'ORD-2024-157', 'buyer' => 'PT Industri Hijau', 'project' => 'Reforestasi Kalimantan', 'amount' => '500 ton', 'status' => 'PAID'],
                                    ['id' => 'ORD-2024-156', 'buyer' => 'CV Karbon Nusantara', 'project' => 'Solar Farm Bandung', 'amount' => '350 ton', 'status' => 'ACTIVE'],
                                    ['id' => 'ORD-2024-155', 'buyer' => 'PT Manufaktur Hijau', 'project' => 'Konservasi Mangrove', 'amount' => '750 ton', 'status' => 'COMPLETED'],
                                    ['id' => 'ORD-2024-154', 'buyer' => 'PT Eco Industry', 'project' => 'Biogas Komunitas', 'amount' => '200 ton', 'status' => 'PAID'],
                                ];
                            @endphp

                            @foreach($orders as $order)
                            <tr>
                                <td><code>{{ $order['id'] }}</code></td>
                                <td>{{ $order['buyer'] }}</td>
                                <td>{{ $order['project'] }}</td>
                                <td><strong>{{ $order['amount'] }}</strong></td>
                                <td>
                                    @if($order['status'] == 'PAID')
                                        <span class="badge bg-info">Paid</span>
                                    @elseif($order['status'] == 'ACTIVE')
                                        <span class="badge active">Active</span>
                                    @else
                                        <span class="badge approved">Completed</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="content-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0">
                        <i class="bi bi-wallet2 me-2"></i>Status Pembayaran
                    </h2>
                    <a href="/admin/pembayaran" class="btn btn-sm btn-secondary">Detail</a>
                </div>

                <!-- Payment Stats -->
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="payment-stat">
                            <div class="payment-stat-icon bg-success">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div>
                                <div class="payment-stat-label">Lunas</div>
                                <div class="payment-stat-value">Rp {{ number_format($paidPayments ?? 850000000, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="payment-stat">
                            <div class="payment-stat-icon bg-warning">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <div>
                                <div class="payment-stat-label">Pending</div>
                                <div class="payment-stat-value">Rp {{ number_format($pendingPayments ?? 125000000, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods Distribution -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Metode Pembayaran</label>
                    <div class="payment-method-item">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Transfer Bank</span>
                            <span class="fw-semibold">65%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-primary" style="width: 65%"></div>
                        </div>
                    </div>
                    <div class="payment-method-item">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Virtual Account</span>
                            <span class="fw-semibold">25%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-info" style="width: 25%"></div>
                        </div>
                    </div>
                    <div class="payment-method-item">
                        <div class="d-flex justify-content-between mb-1">
                            <span>E-Wallet</span>
                            <span class="fw-semibold">10%</span>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 10%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Emission Calculations by Buyer -->
    <div class="content-section mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-calculator me-2"></i>Top Emisi Buyer (Tahun Ini)
            </h2>
            <a href="/admin/emisi-buyer" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Buyer</th>
                        <th>Industri</th>
                        <th>Total Emisi</th>
                        <th>Sudah Offset</th>
                        <th>Sisa</th>
                        <th>Progress</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $buyers = [
                            ['rank' => 1, 'name' => 'PT Industri Hijau Indonesia', 'industry' => 'Manufaktur', 'emission' => 85000, 'offset' => 65000, 'remaining' => 20000],
                            ['rank' => 2, 'name' => 'CV Karbon Nusantara', 'industry' => 'Tekstil', 'emission' => 72000, 'offset' => 58000, 'remaining' => 14000],
                            ['rank' => 3, 'name' => 'PT Manufaktur Berkelanjutan', 'industry' => 'Kimia', 'emission' => 68000, 'offset' => 45000, 'remaining' => 23000],
                            ['rank' => 4, 'name' => 'PT Eco Industry', 'industry' => 'Food & Beverage', 'emission' => 54000, 'offset' => 48000, 'remaining' => 6000],
                            ['rank' => 5, 'name' => 'PT Green Manufacturing', 'industry' => 'Otomotif', 'emission' => 51000, 'offset' => 42000, 'remaining' => 9000],
                        ];
                    @endphp

                    @foreach($buyers as $buyer)
                    <tr>
                        <td>
                            @if($buyer['rank'] <= 3)
                                <span class="badge bg-warning">{{ $buyer['rank'] }}</span>
                            @else
                                {{ $buyer['rank'] }}
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $buyer['name'] }}</div>
                        </td>
                        <td>{{ $buyer['industry'] }}</td>
                        <td>
                            <span class="text-danger fw-semibold">{{ number_format($buyer['emission'], 0, ',', '.') }}</span>
                            <small class="text-muted">ton CO₂</small>
                        </td>
                        <td>
                            <span class="text-success fw-semibold">{{ number_format($buyer['offset'], 0, ',', '.') }}</span>
                            <small class="text-muted">ton CO₂</small>
                        </td>
                        <td>
                            <span class="text-warning fw-semibold">{{ number_format($buyer['remaining'], 0, ',', '.') }}</span>
                            <small class="text-muted">ton CO₂</small>
                        </td>
                        <td style="min-width: 150px;">
                            @php
                                $progress = ($buyer['offset'] / $buyer['emission']) * 100;
                            @endphp
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar {{ $progress >= 80 ? 'bg-success' : ($progress >= 50 ? 'bg-warning' : 'bg-danger') }}" 
                                     style="width: {{ $progress }}%" 
                                     role="progressbar">
                                </div>
                            </div>
                            <small class="text-muted">{{ number_format($progress, 1) }}%</small>
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-sm">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Offset Realizations (6 Bulanan) -->
    <div class="content-section mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-calendar-check me-2"></i>Realisasi Offset 6 Bulanan
            </h2>
            <a href="/admin/realisasi-offset" class="btn btn-sm btn-secondary">Detail Lengkap</a>
        </div>

        <div class="alert alert-info mb-4">
            <i class="bi bi-info-circle me-2"></i>
            Data realisasi diperbarui setiap 6 bulan berdasarkan MRV Report dan verifikasi auditor
        </div>

        <div class="row g-3">
            @php
                $realizations = [
                    ['period' => 'H2 2024', 'target' => 120000, 'realized' => 118500, 'projects' => 34],
                    ['period' => 'H1 2024', 'target' => 110000, 'realized' => 108200, 'projects' => 32],
                    ['period' => 'H2 2023', 'target' => 95000, 'realized' => 92800, 'projects' => 28],
                    ['period' => 'H1 2023', 'target' => 88000, 'realized' => 86400, 'projects' => 25],
                ];
            @endphp

            @foreach($realizations as $realization)
            <div class="col-md-6 col-lg-3">
                <div class="realization-card">
                    <div class="realization-period">{{ $realization['period'] }}</div>
                    <div class="realization-values">
                        <div class="realization-value">
                            <small class="text-muted">Target</small>
                            <div class="fw-semibold">{{ number_format($realization['target'], 0, ',', '.') }} ton</div>
                        </div>
                        <div class="realization-value">
                            <small class="text-muted">Terealisasi</small>
                            <div class="fw-semibold text-success">{{ number_format($realization['realized'], 0, ',', '.') }} ton</div>
                        </div>
                    </div>
                    @php
                        $achievementRate = ($realization['realized'] / $realization['target']) * 100;
                    @endphp
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: {{ $achievementRate }}%"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">{{ $realization['projects'] }} proyek</small>
                        <small class="fw-semibold {{ $achievementRate >= 95 ? 'text-success' : 'text-warning' }}">
                            {{ number_format($achievementRate, 1) }}%
                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pending Approvals Section -->
    <div class="content-section mb-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-clock-history me-2"></i>Pending Approvals
            </h2>
            <a href="/admin/manajemen-akun" class="btn btn-primary">Kelola Semua</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PT Green Energy Indonesia</td>
                        <td><span class="badge bg-success">Seller</span></td>
                        <td>20 Des 2025</td>
                        <td><span class="badge pending">Menunggu</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm">Approve</button>
                                <button class="btn btn-secondary btn-sm">Review</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>CV Karbon Nusantara</td>
                        <td><span class="badge bg-primary">Buyer</span></td>
                        <td>19 Des 2025</td>
                        <td><span class="badge pending">Menunggu</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm">Approve</button>
                                <button class="btn btn-secondary btn-sm">Review</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>PT Eco Solutions</td>
                        <td><span class="badge bg-success">Seller</span></td>
                        <td>18 Des 2025</td>
                        <td><span class="badge pending">Menunggu</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary btn-sm">Approve</button>
                                <button class="btn btn-secondary btn-sm">Review</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Projects Section -->
    <div class="content-section">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">
                <i class="bi bi-folder me-2"></i>Proyek Terbaru
            </h2>
            <a href="/admin/proyek" class="btn btn-secondary">Kelola Proyek</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Proyek</th>
                        <th>Pemilik</th>
                        <th>Lokasi</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Reforestasi Hutan Kalimantan</td>
                        <td>PT Green Energy</td>
                        <td>Kalimantan Timur</td>
                        <td>15,000 ton CO₂</td>
                        <td><span class="badge active">Aktif</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Energi Terbarukan Solar Farm</td>
                        <td>PT Solar Indonesia</td>
                        <td>Jawa Barat</td>
                        <td>25,000 ton CO₂</td>
                        <td><span class="badge approved">Disetujui</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Konservasi Mangrove</td>
                        <td>Yayasan Laut Hijau</td>
                        <td>Sulawesi Selatan</td>
                        <td>12,000 ton CO₂</td>
                        <td><span class="badge pending">Review</span></td>
                        <td>
                            <button class="btn btn-secondary btn-sm">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .metric-box {
        background: var(--color-primary);
        padding: 1.25rem;
        border-radius: 8px;
        border: 1px solid var(--color-secondary);
    }

    .metric-label {
        font-size: 0.875rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .metric-value {
        font-size: 1.75rem;
        font-weight: 700;
        line-height: 1;
    }

    .metric-value small {
        font-size: 1rem;
        font-weight: 400;
    }

    .category-item {
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #eee;
    }

    .category-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .payment-stat {
        display: flex;
        gap: 1rem;
        align-items: center;
        padding: 1rem;
        background: var(--color-primary);
        border-radius: 8px;
        border: 1px solid var(--color-secondary);
    }

    .payment-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .payment-stat-label {
        font-size: 0.875rem;
        color: #666;
    }

    .payment-stat-value {
        font-size: 1.125rem;
        font-weight: 700;
    }

    .payment-method-item {
        margin-bottom: 1rem;
    }

    .realization-card {
        background: var(--color-primary);
        padding: 1.25rem;
        border-radius: 8px;
        border: 1px solid var(--color-secondary);
    }

    .realization-period {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--color-tertiary);
        margin-bottom: 1rem;
    }

    .realization-values {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .realization-value {
        text-align: center;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Offset Chart
    const ctx = document.getElementById('offsetChart');
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                    label: 'Total Emisi Buyer',
                    data: [35000, 38000, 42000, 45000, 48000, 52000, 55000, 58000, 62000, 65000, 68000, 72000],
                    borderColor: '#dc3545',
                    backgroundColor: 'rgba(220, 53, 69, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Total Offset Terealisasi',
                    data: [22000, 25000, 28000, 31000, 34000, 37000, 40000, 43000, 46000, 49000, 52000, 55000],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Target Offset',
                    data: [25000, 27000, 30000, 33000, 36000, 39000, 42000, 45000, 48000, 51000, 54000, 57000],
                    borderColor: '#ffc107',
                    backgroundColor: 'rgba(255, 193, 7, 0.1)',
                    borderWidth: 2,
                    borderDash: [5, 5],
                    fill: false,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 15
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += new Intl.NumberFormat('id-ID').format(context.parsed.y) + ' ton CO₂';
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('id-ID', { 
                                notation: 'compact',
                                compactDisplay: 'short'
                            }).format(value);
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            }
        }
    });

    // Period Filter
    document.getElementById('periodFilter').addEventListener('change', function() {
        const period = this.value;
        console.log('Filter changed to:', period);
        // TODO: Implement AJAX call to fetch data based on selected period
        // Example: fetchDashboardData(period);
    });

    // Refresh Data Button
    const refreshBtn = document.querySelector('.btn-secondary');
    if (refreshBtn && refreshBtn.textContent.includes('Refresh')) {
        refreshBtn.addEventListener('click', function() {
            console.log('Refreshing dashboard data...');
            // TODO: Implement AJAX call to refresh all dashboard data
            this.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Loading...';
            this.disabled = true;
            
            setTimeout(() => {
                this.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Refresh Data';
                this.disabled = false;
                alert('Data berhasil diperbarui!');
            }, 1500);
        });
    }

    // Export Report Button
    const exportBtn = document.querySelector('.btn-primary');
    if (exportBtn && exportBtn.textContent.includes('Export')) {
        exportBtn.addEventListener('click', function() {
            console.log('Exporting dashboard report...');
            // TODO: Implement export functionality
            alert('Mengunduh laporan dashboard...');
        });
    }

    console.log('Dashboard loaded successfully');
</script>
@endpush