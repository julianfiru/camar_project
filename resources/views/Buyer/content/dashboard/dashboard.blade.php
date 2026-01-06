@extends('Buyer.layout.app')

@section('title', 'Dashboard Buyer - CAMAR')

@section('page-title', 'Dashboard Buyer')
@section('page-subtitle', 'Ringkasan aktivitas carbon offset Anda')

@section('Buyer.content')
<!-- STATISTICS SECTION -->
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="stat-card">
            <div class="stat-label">Emisi Tahunan</div>
            <div class="stat-value">{{ number_format($emisiTahunan ?? 1250) }}</div>
            <div class="stat-unit">ton CO₂e / tahun</div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="stat-card secondary">
            <div class="stat-label">Offset Direalisasi</div>
            <div class="stat-value">{{ number_format($offsetRealisasi ?? 600) }}</div>
            <div class="stat-unit">ton CO₂e</div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="stat-card tertiary">
            <div class="stat-label">Sisa Emisi (Net Emission)</div>
            <div class="stat-value">{{ number_format($sisaEmisi ?? 650) }}</div>
            <div class="stat-unit">ton CO₂e</div>
        </div>
    </div>
</div>

<!-- CHART SECTION -->
<div class="content-section">
    <h2 class="section-title">Tren Emisi & Offset</h2>
    <div class="chart-placeholder">
        📊 Grafik Emisi vs Offset akan ditampilkan di sini
    </div>
</div>

<!-- CERTIFICATE SECTION -->
<div class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title mb-0">Sertifikat Carbon Offset</h2>
        <button class="btn btn-primary">+ Beli Offset Baru</button>
    </div>
    
    @forelse($sertifikats ?? [] as $sertifikat)
    <div class="certificate-item">
        <div>
            <h3 class="certificate-title">{{ $sertifikat->title }}</h3>
            <p class="certificate-desc">{{ $sertifikat->amount }} ton CO₂e | {{ $sertifikat->project }}</p>
        </div>
        <button class="btn btn-secondary">Lihat Detail</button>
    </div>
    @empty
    <div class="certificate-item">
        <div>
            <h3 class="certificate-title">Sertifikat Carbon Offset 2025</h3>
            <p class="certificate-desc">200 ton CO₂e | Proyek Energi Terbarukan Jawa Timur</p>
        </div>
        <button class="btn btn-secondary">Lihat Detail</button>
    </div>
    <div class="certificate-item">
        <div>
            <h3 class="certificate-title">Sertifikat Carbon Offset 2026</h3>
            <p class="certificate-desc">200 ton CO₂e | Proyek Reboisasi Kalimantan</p>
        </div>
        <button class="btn btn-secondary">Lihat Detail</button>
    </div>
    <div class="certificate-item">
        <div>
            <h3 class="certificate-title">Sertifikat Carbon Offset 2027</h3>
            <p class="certificate-desc">200 ton CO₂e | Proyek Mangrove Sulawesi</p>
        </div>
        <button class="btn btn-secondary">Lihat Detail</button>
    </div>
    @endforelse
</div>

<!-- QUICK ACTIONS SECTION -->
<div class="content-section">
    <h2 class="section-title">Aksi Cepat</h2>
    <div class="d-flex gap-3 flex-wrap">
        <a href="{{ route('buyer.hitung') }}" class="btn btn-primary">🧮 Hitung Emisi Baru</a>
        <a href="#" class="btn btn-primary">🌱 Jelajahi Marketplace</a>
        <a href="{{ route('buyer.laporan') }}" class="btn btn-primary">📄 Unduh Laporan</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Animation for statistics
    window.addEventListener('load', () => {
        const statValues = document.querySelectorAll('.stat-value');
        statValues.forEach(stat => {
            const value = parseInt(stat.textContent.replace(/,/g, ''));
            if (isNaN(value)) return;
            let current = 0;
            const increment = value / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= value) {
                    stat.textContent = value.toLocaleString();
                    clearInterval(timer);
                } else {
                    stat.textContent = Math.floor(current).toLocaleString();
                }
            }, 20);
        });
    });
</script>
@endpush