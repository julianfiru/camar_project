@extends('Buyer.layout.app')

@section('title', 'Hitung Emisi - CAMAR')

@section('page-title', 'Hitung Emisi')
@section('page-subtitle', 'Hitung Emisi carbon offset Anda')

@section('Buyer.content')

<!-- Scope 1 - Emisi Langsung -->
<div class="scope-card scope-1">
    <div class="scope-header">
        <div>
            <span class="badge">SCOPE 1</span>
            <h3>Emisi Langsung</h3>
            <p class="mb-0">Sumber yang dimiliki atau dikendalikan langsung</p>
        </div>
    </div>
    <div class="scope-body">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Konsumsi Bensin (Liter)</label>
                <input type="number" class="form-control" id="bensin" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 2.31 kg CO₂/Liter</small>
            </div>
            <div class="col-md-4">
                <label class="form-label">Konsumsi Solar (Liter)</label>
                <input type="number" class="form-control" id="solar" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 2.68 kg CO₂/Liter</small>
            </div>
            <div class="col-md-4">
                <label class="form-label">Konsumsi Gas/LPG (kg)</label>
                <input type="number" class="form-control" id="gas" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 2.0 kg CO₂/kg</small>
            </div>
        </div>
        <div class="formula-box mt-3">
            <div class="formula-icon">📊</div>
            <div>
                <strong>FORMULA</strong>
                <div class="formula-text">Emisi = (Bensin × 2.31) + (Solar × 2.68) + (Gas × 2.0) ÷ 1000</div>
            </div>
        </div>
    </div>
</div>

<!-- Scope 2 - Emisi Tidak Langsung (Energi) -->
<div class="scope-card scope-2">
    <div class="scope-header">
        <div>
            <span class="badge">SCOPE 2</span>
            <h3>Emisi Tidak Langsung (Energi)</h3>
            <p class="mb-0">Konsumsi listrik dan energi yang dibeli</p>
        </div>
    </div>
    <div class="scope-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Konsumsi Listrik (kWh)</label>
                <input type="number" class="form-control" id="listrik" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 0.85 kg CO₂/kWh</small>
            </div>
            <div class="col-md-6">
                <label class="form-label">Konsumsi Steam/Panas (kg)</label>
                <input type="number" class="form-control" id="steam" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 0.3 kg CO₂/kg</small>
            </div>
        </div>
        <div class="formula-box mt-3">
            <div class="formula-icon">📊</div>
            <div>
                <strong>FORMULA</strong>
                <div class="formula-text">Emisi = (Listrik × 0.85) + (Steam × 0.3) ÷ 1000</div>
            </div>
        </div>
    </div>
</div>

<!-- Scope 3 - Emisi Tidak Langsung Lainnya -->
<div class="scope-card scope-3">
    <div class="scope-header">
        <div>
            <span class="badge">SCOPE 3</span>
            <h3>Emisi Tidak Langsung Lainnya</h3>
            <p class="mb-0">Rantai nilai: transportasi, limbah, perjalanan</p>
        </div>
    </div>
    <div class="scope-body">
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Transportasi Produk (km)</label>
                <input type="number" class="form-control" id="transport" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 0.1 kg CO₂/km</small>
            </div>
            <div class="col-md-4">
                <label class="form-label">Perjalanan Bisnis (km)</label>
                <input type="number" class="form-control" id="travel" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 0.25 kg CO₂/km</small>
            </div>
            <div class="col-md-4">
                <label class="form-label">Limbah (kg)</label>
                <input type="number" class="form-control" id="limbah" step="0.01" min="0" placeholder="0">
                <small class="text-muted">Faktor Emisi: 0.5 kg CO₂/kg</small>
            </div>
        </div>
        <div class="formula-box mt-3">
            <div class="formula-icon">📊</div>
            <div>
                <strong>FORMULA</strong>
                <div class="formula-text">Emisi = (Transport × 0.1) + (Travel × 0.25) + (Limbah × 0.5) ÷ 1000</div>
            </div>
        </div>
    </div>
</div>

<!-- Offset Target -->
<div class="scope-card offset-card">
    <div class="scope-header">
        <div>
            <span class="badge bg-success">OFFSET TARGET</span>
            <h3>Target Pengurangan Emisi</h3>
            <p class="mb-0">Tentukan persentase offset yang diinginkan</p>
        </div>
    </div>
    <div class="scope-body">
        <div class="row">
            <div class="col-md-12">
                <label class="form-label">Target Offset (%)</label>
                <input type="number" class="form-control" id="offset" step="1" min="0" max="100" placeholder="0">
                <small class="text-muted">Masukkan persentase offset (0-100%)</small>
            </div>
        </div>
        <div class="formula-box mt-3">
            <div class="formula-icon">📊</div>
            <div>
                <strong>FORMULA</strong>
                <div class="formula-text">Offset Dibutuhkan = Total Emisi × (Target Offset / 100)</div>
                <div class="formula-text">Emisi Bersih = Total Emisi - Offset Dibutuhkan</div>
            </div>
        </div>
    </div>
</div>

<!-- Tombol Hitung -->
<div class="text-center mt-4">
    <button type="button" class="btn btn-primary btn-lg px-5" id="hitungBtn">
        <span class="me-2">🔢</span> Hitung Emisi
    </button>
</div>

<!-- Hasil Kalkulasi -->
<div id="hasilSection" class="hasil-section mt-5" style="display: none;">
    <div class="hasil-container">
        <h2 class="text-center mb-4">Hasil Kalkulasi Emisi</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="hasil-card scope-1-result">
                    <div class="hasil-label">SCOPE 1</div>
                    <div class="hasil-value" id="hasilScope1">0</div>
                    <div class="hasil-unit">ton CO₂e</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hasil-card scope-2-result">
                    <div class="hasil-label">SCOPE 2</div>
                    <div class="hasil-value" id="hasilScope2">0</div>
                    <div class="hasil-unit">ton CO₂e</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hasil-card scope-3-result">
                    <div class="hasil-label">SCOPE 3</div>
                    <div class="hasil-value" id="hasilScope3">0</div>
                    <div class="hasil-unit">ton CO₂e</div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <div class="hasil-card total-result">
                    <div class="hasil-label">TOTAL EMISI</div>
                    <div class="hasil-value" id="hasilTotal">0</div>
                    <div class="hasil-unit">ton CO₂e/tahun</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hasil-card offset-result">
                    <div class="hasil-label">OFFSET DIBUTUHKAN</div>
                    <div class="hasil-value" id="hasilOffset">0</div>
                    <div class="hasil-unit">ton CO₂e</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hasil-card net-result">
                    <div class="hasil-label">EMISI BERSIH</div>
                    <div class="hasil-value" id="hasilBersih">0</div>
                    <div class="hasil-unit">ton CO₂e/tahun</div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-success btn-lg px-5">
                <span class="me-2">🌱</span> Lihat Proyek Carbon Offset
            </button>
        </div>
    </div>
</div>

@endsection