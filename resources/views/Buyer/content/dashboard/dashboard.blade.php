@extends('Buyer.layout.app')

@section('title', 'Dashboard Buyer - CAMAR')

@section('page-title', 'Dashboard Buyer')
@section('page-subtitle', 'Ringkasan aktivitas carbon offset Anda')

@section('Buyer.content')
<!-- STATISTICS SECTION -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="cbd-stat-card">
            <div class="cbd-stat-label">Emisi Tahunan</div>
            <div class="cbd-stat-value">{{ number_format($emisiTahunan ?? 1250) }}</div>
            <div class="cbd-stat-unit">ton CO₂e / tahun</div>
            <div class="cbd-progress-wrapper">
                <div class="cbd-progress-bar">
                    <div class="cbd-progress-fill cbd-progress-fill--primary" data-progress="100"></div>
                </div>
                <div class="cbd-progress-text">Total emisi tahun ini</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="cbd-stat-card cbd-stat-card--secondary">
            <div class="cbd-stat-label">Offset Direalisasi</div>
            <div class="cbd-stat-value">{{ number_format($offsetRealisasi ?? 600) }}</div>
            <div class="cbd-stat-unit">ton CO₂e</div>
            <div class="cbd-progress-wrapper">
                <div class="cbd-progress-bar">
                    <div class="cbd-progress-fill cbd-progress-fill--secondary" data-progress="{{ round((($offsetRealisasi ?? 600) / ($emisiTahunan ?? 1250)) * 100) }}"></div>
                </div>
                <div class="cbd-progress-text">{{ round((($offsetRealisasi ?? 600) / ($emisiTahunan ?? 1250)) * 100) }}% dari total emisi</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="cbd-stat-card cbd-stat-card--target">
            <div class="cbd-stat-label">Target Offset</div>
            <div class="cbd-stat-value">{{ number_format($targetOffset ?? 1250) }}</div>
            <div class="cbd-stat-unit">ton CO₂e</div>
            <div class="cbd-progress-wrapper">
                <div class="cbd-progress-bar">
                    <div class="cbd-progress-fill cbd-progress-fill--target" data-progress="{{ round((($offsetRealisasi ?? 600) / ($targetOffset ?? 1250)) * 100) }}"></div>
                </div>
                <div class="cbd-progress-text">{{ round((($offsetRealisasi ?? 600) / ($targetOffset ?? 1250)) * 100) }}% tercapai</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="cbd-stat-card cbd-stat-card--tertiary">
            <div class="cbd-stat-label">Sisa Emisi (Net Emission)</div>
            <div class="cbd-stat-value">{{ number_format($sisaEmisi ?? 650) }}</div>
            <div class="cbd-stat-unit">ton CO₂e</div>
            <div class="cbd-progress-wrapper">
                <div class="cbd-progress-bar">
                    <div class="cbd-progress-fill cbd-progress-fill--tertiary" data-progress="{{ round((($sisaEmisi ?? 650) / ($emisiTahunan ?? 1250)) * 100) }}"></div>
                </div>
                <div class="cbd-progress-text">{{ round((($sisaEmisi ?? 650) / ($emisiTahunan ?? 1250)) * 100) }}% belum dioffset</div>
            </div>
        </div>
    </div>
</div>

<!-- CHART SECTION -->
<div class="cbd-content-section">
    <h2 class="cbd-section-title">Tren Emisi & Offset</h2>
    <canvas id="emissionOffsetChart" class="cbd-chart-canvas"></canvas>
</div>

<!-- CERTIFICATE SECTION -->
<div class="cbd-content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="cbd-section-title mb-0">Sertifikat Carbon Offset</h2>
        <button class="btn cbd-btn-primary">+ Beli Offset Baru</button>
    </div>
    
    @forelse($sertifikats ?? [] as $sertifikat)
    <div class="cbd-certificate-item">
        <div>
            <h3 class="cbd-certificate-title">{{ $sertifikat->title }}</h3>
            <p class="cbd-certificate-desc">{{ $sertifikat->amount }} ton CO₂e | {{ $sertifikat->project }}</p>
        </div>
        <button class="btn cbd-btn-secondary">Lihat Detail</button>
    </div>
    @empty
    <div class="cbd-certificate-item">
        <div>
            <h3 class="cbd-certificate-title">Sertifikat Carbon Offset 2025</h3>
            <p class="cbd-certificate-desc">200 ton CO₂e | Proyek Energi Terbarukan Jawa Timur</p>
        </div>
        <button class="btn cbd-btn-secondary">Lihat Detail</button>
    </div>
    <div class="cbd-certificate-item">
        <div>
            <h3 class="cbd-certificate-title">Sertifikat Carbon Offset 2026</h3>
            <p class="cbd-certificate-desc">200 ton CO₂e | Proyek Reboisasi Kalimantan</p>
        </div>
        <button class="btn cbd-btn-secondary">Lihat Detail</button>
    </div>
    <div class="cbd-certificate-item">
        <div>
            <h3 class="cbd-certificate-title">Sertifikat Carbon Offset 2027</h3>
            <p class="cbd-certificate-desc">200 ton CO₂e | Proyek Mangrove Sulawesi</p>
        </div>
        <button class="btn cbd-btn-secondary">Lihat Detail</button>
    </div>
    @endforelse
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endpush