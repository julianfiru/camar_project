@extends('Buyer.layout.app')

@section('title', 'Riwayat Transaksi - CAMAR')

@section('page-title', 'Riwayat Transaksi')
@section('page-subtitle', 'Kelola dan pantau semua transaksi carbon offset Anda')

@section('Buyer.content')

@php
    // Data dummy untuk testing (nanti akan diganti dengan data dari database)
    $transactionsData = collect([
        (object) [
            'id' => 'TRX-2024-001',
            'date' => '15 Maret 2024',
            'project' => 'Proyek Energi Terbarukan Jawa Timur',
            'company' => 'PT Solar Energy Nusantara',
            'purchased' => 400,
            'realized' => 200,
            'pending' => 200,
            'status' => 'Aktif',
            'statusType' => 'active',
            'year' => 2024,
            'reports' => [
                (object) ['title' => 'Laporan Realisasi Periode 1', 'date' => '15 Juli 2024', 'verified' => true],
                (object) ['title' => 'Laporan Realisasi Periode 2', 'date' => '15 Januari 2025', 'verified' => true]
            ],
            'certificates' => [
                (object) ['id' => 'CERT-2025-001', 'amount' => 200, 'period' => 'Januari - Juni 2025']
            ]
        ],
        (object) [
            'id' => 'TRX-2023-002',
            'date' => '20 Juni 2023',
            'project' => 'Proyek Reboisasi Kalimantan',
            'company' => 'PT Hutan Hijau Indonesia',
            'purchased' => 400,
            'realized' => 400,
            'pending' => 0,
            'status' => 'Selesai',
            'statusType' => 'completed',
            'year' => 2023,
            'reports' => [
                (object) ['title' => 'Laporan Realisasi Periode 1', 'date' => '20 Desember 2023', 'verified' => true],
                (object) ['title' => 'Laporan Realisasi Periode 2', 'date' => '20 Juni 2024', 'verified' => true],
                (object) ['title' => 'Laporan Realisasi Final', 'date' => '20 Desember 2024', 'verified' => true]
            ],
            'certificates' => [
                (object) ['id' => 'CERT-2024-002', 'amount' => 200, 'period' => 'Juli - Desember 2024'],
                (object) ['id' => 'CERT-2024-001', 'amount' => 200, 'period' => 'Januari - Juni 2024']
            ]
        ],
        (object) [
            'id' => 'TRX-2024-003',
            'date' => '10 Agustus 2024',
            'project' => 'Proyek Konservasi Mangrove Sulawesi',
            'company' => 'PT Ekosistem Lestari',
            'purchased' => 250,
            'realized' => 0,
            'pending' => 250,
            'status' => 'Aktif',
            'statusType' => 'active',
            'year' => 2024,
            'reports' => [
                (object) ['title' => 'Laporan Progress Awal Proyek', 'date' => '10 Oktober 2024', 'verified' => true]
            ],
            'certificates' => []
        ]
    ]);

    // Calculate totals
    $totalPurchased = $transactionsData->sum('purchased');
    $totalRealized = $transactionsData->sum('realized');
    $totalPending = $transactionsData->sum('pending');
@endphp

<!-- Statistics Overview -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="rt-stat-card">
            <div class="rt-stat-icon rt-stat-icon-primary">
                <i class="bi bi-cart-check-fill"></i>
            </div>
            <div class="rt-stat-content">
                <div class="rt-stat-label">Total Pembelian</div>
                <div class="rt-stat-value">{{ number_format($totalPurchased) }}</div>
                <div class="rt-stat-unit">ton CO₂e dibeli</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="rt-stat-card rt-stat-card-secondary">
            <div class="rt-stat-icon rt-stat-icon-secondary">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="rt-stat-content">
                <div class="rt-stat-label">Sudah Direalisasikan</div>
                <div class="rt-stat-value">{{ number_format($totalRealized) }}</div>
                <div class="rt-stat-unit">ton CO₂e tersertifikasi</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="rt-stat-card rt-stat-card-tertiary">
            <div class="rt-stat-icon rt-stat-icon-tertiary">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div class="rt-stat-content">
                <div class="rt-stat-label">Dalam Proses Realisasi</div>
                <div class="rt-stat-value">{{ number_format($totalPending) }}</div>
                <div class="rt-stat-unit">ton CO₂e (proyek berjalan)</div>
            </div>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="content-section mb-4">
    <h2 class="section-title mb-3">Filter Transaksi</h2>
    <form id="rt-filterForm" class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Status Transaksi</label>
            <select class="form-select" id="rt-statusFilter" name="status">
                <option value="">Semua Status</option>
                <option value="active">Aktif</option>
                <option value="completed">Selesai</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Tahun Pembelian</label>
            <select class="form-select" id="rt-yearFilter" name="year">
                <option value="">Semua Tahun</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Urutkan Berdasarkan</label>
            <select class="form-select" id="rt-sortFilter" name="sort">
                <option value="newest">Terbaru</option>
                <option value="oldest">Terlama</option>
                <option value="amount">Jumlah Terbesar</option>
            </select>
        </div>
    </form>
</div>

<!-- Transactions List -->
<div id="rt-transactionsList">
    @forelse($transactionsData as $tx)
        @php
            $percentage = ($tx->purchased > 0) ? round(($tx->realized / $tx->purchased) * 100) : 0;
        @endphp
        
        <div class="rt-transaction-card" data-status="{{ $tx->statusType }}" data-year="{{ $tx->year }}">
            <!-- Transaction Header -->
            <div class="rt-transaction-card-header">
                <div class="rt-transaction-info">
                    <h4 class="rt-transaction-title">{{ $tx->project }}</h4>
                    <p class="rt-transaction-company">{{ $tx->company }}</p>
                    <div class="rt-transaction-meta">
                        <span class="rt-meta-badge">
                            <i class="bi bi-calendar3"></i> {{ $tx->date }}
                        </span>
                        <span class="rt-meta-badge">
                            <i class="bi bi-hash"></i> {{ $tx->id }}
                        </span>
                    </div>
                </div>
                <div class="rt-transaction-status">
                    <span class="rt-status-badge rt-status-{{ $tx->statusType }}">
                        @if($tx->statusType === 'active')
                            ● {{ $tx->status }}
                        @else
                            ✓ {{ $tx->status }}
                        @endif
                    </span>
                </div>
            </div>

            <div class="rt-transaction-card-body">
                <!-- Progress Section -->
                <div class="rt-progress-section">
                    <h5 class="rt-progress-title">
                        <i class="bi bi-graph-up-arrow"></i> Progres Realisasi Offset
                    </h5>
                    
                    <div class="rt-progress-stats">
                        <div class="rt-progress-stat">
                            <span class="rt-progress-stat-label">Total Dibeli</span>
                            <span class="rt-progress-stat-value">{{ number_format($tx->purchased) }} <small>ton</small></span>
                        </div>
                        <div class="rt-progress-stat">
                            <span class="rt-progress-stat-label">Direalisasikan</span>
                            <span class="rt-progress-stat-value rt-progress-stat-success">{{ number_format($tx->realized) }} <small>ton</small></span>
                        </div>
                        <div class="rt-progress-stat">
                            <span class="rt-progress-stat-label">Menunggu</span>
                            <span class="rt-progress-stat-value rt-progress-stat-warning">{{ number_format($tx->pending) }} <small>ton</small></span>
                        </div>
                    </div>

                    <div class="rt-progress-bar-container">
                        <div class="rt-progress-bar-fill" style="width: {{ $percentage }}%;">
                            <span class="rt-progress-bar-text">{{ $percentage }}%</span>
                        </div>
                    </div>

                    <p class="rt-progress-note">
                        <i class="bi bi-info-circle"></i> 
                        Realisasi offset dilakukan secara bertahap sesuai dengan jalannya proyek dan tidak terjadi secara langsung setelah pembelian.
                    </p>
                </div>

                <!-- Reports Section -->
                <div class="rt-reports-section">
                    <h5 class="rt-reports-title">
                        <i class="bi bi-file-earmark-text"></i> 
                        Laporan Perkembangan Proyek ({{ count($tx->reports) }})
                    </h5>
                    
                    <div class="rt-reports-list">
                        @foreach($tx->reports as $report)
                        <div class="rt-report-item">
                            <div class="rt-report-info">
                                <h6 class="rt-report-title-text">{{ $report->title }}</h6>
                                <div class="rt-report-meta">
                                    <i class="bi bi-calendar3"></i> {{ $report->date }}
                                    @if($report->verified)
                                        <span class="rt-report-badge rt-report-badge-verified">
                                            <i class="bi bi-check-circle"></i> Terverifikasi
                                        </span>
                                    @else
                                        <span class="rt-report-badge rt-report-badge-pending">
                                            <i class="bi bi-clock"></i> Menunggu Verifikasi
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button class="rt-btn-download" onclick="downloadReport('{{ $tx->id }}', '{{ $report->title }}')">
                                <i class="bi bi-download"></i> Unduh
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Certificates Section -->
                @if(count($tx->certificates) > 0)
                <div class="rt-certificates-section">
                    <h5 class="rt-certificates-title">
                        <i class="bi bi-award"></i> 
                        Sertifikat Diterbitkan ({{ count($tx->certificates) }})
                    </h5>
                    
                    <div class="rt-certificates-grid">
                        @foreach($tx->certificates as $cert)
                        <div class="rt-certificate-item">
                            <div class="rt-certificate-icon">
                                <i class="bi bi-patch-check-fill"></i>
                            </div>
                            <div class="rt-certificate-info">
                                <h6 class="rt-certificate-amount">{{ number_format($cert->amount) }} ton CO₂e</h6>
                                <p class="rt-certificate-details">{{ $cert->id }} • Periode: {{ $cert->period }}</p>
                                <button class="rt-btn-view-cert" onclick="viewCertificate('{{ $cert->id }}')">
                                    <i class="bi bi-eye"></i> Lihat Sertifikat
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Action Button -->
                <div class="rt-transaction-actions">
                    <button class="rt-btn-detail" onclick="viewDetails('{{ $tx->id }}')">
                        <i class="bi bi-file-text"></i> Lihat Detail Lengkap Transaksi
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="rt-no-data">
            <div class="rt-no-data-icon">📋</div>
            <h5 class="rt-no-data-title">Belum ada transaksi</h5>
            <p class="rt-no-data-text">Transaksi Anda akan muncul di sini</p>
        </div>
    @endforelse
</div>

<!-- No Data Message (Hidden by default) -->
<div id="rt-noDataMessage" class="rt-no-data" style="display: none;">
    <div class="rt-no-data-icon">📋</div>
    <h5 class="rt-no-data-title">Tidak ada transaksi ditemukan</h5>
    <p class="rt-no-data-text">Coba ubah filter pencarian Anda</p>
</div>

@endsection
