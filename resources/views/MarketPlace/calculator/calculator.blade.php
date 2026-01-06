@extends('MarketPlace.layout.app')

@section('title', 'Kalkulator Karbon')
@section('description', 'Kalkulator Emisi Karbon - Hitung jejak karbon perusahaan Anda berdasarkan GHG Protocol')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/MarketPlace/calculator.css') }}">
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="calculator-hero" id="calculator">
        <div class="calculator-hero-bg">
            <img src="{{ asset('images/MarketPlace/gunung0.png') }}" alt="Hero Background">
        </div>
        <div class="container">
            <div class="calculator-hero-content">
                <h1 class="calculator-hero-title">Kalkulator Emisi Karbon</h1>
                <p class="calculator-hero-description">
                    Hitung jejak karbon perusahaan Anda berdasarkan GHG Protocol untuk Scope 1, 2, dan 3. 
                    Dapatkan hasil akurat untuk menentukan strategi offset karbon yang tepat.
                </p>
            </div>
        </div>
    </section>

    <!-- Calculator Main Content -->
    <main class="calculator-page">
        <div class="container">

            <!-- Scope 1 Module -->
            <div class="calc-module scope-1-module">
                <div class="module-header" onclick="toggleModule('scope1')">
                    <div class="module-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z"/>
                        </svg>
                    </div>
                    <div class="module-info">
                        <div class="module-badge">Scope 1</div>
                        <h2 class="module-title">Emisi Langsung</h2>
                        <p class="module-subtitle">Sumber yang dimiliki atau dikendalikan langsung</p>
                    </div>
                    <div class="module-toggle">
                        <svg class="toggle-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,10L12,15L17,10H7Z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="module-content" id="scope1-content">
                    <div class="input-row">
                        <div class="input-group">
                            <label class="input-label">Konsumsi Bensin (Liter)</label>
                            <input type="number" class="input-field" id="bensin" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 2.31 kg CO₂/Liter</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Konsumsi Solar (Liter)</label>
                            <input type="number" class="input-field" id="solar" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 2.68 kg CO₂/Liter</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Konsumsi Gas/LPG (kg)</label>
                            <input type="number" class="input-field" id="gas" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 2.0 kg CO₂/kg</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📊</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Emisi = (Bensin × 2.31) + (Solar × 2.68) + (Gas × 2.0) ÷ 1000</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scope 2 Module -->
            <div class="calc-module scope-2-module">
                <div class="module-header" onclick="toggleModule('scope2')">
                    <div class="module-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,2V13H10V22L17,10H13L17,2H7Z"/>
                        </svg>
                    </div>
                    <div class="module-info">
                        <div class="module-badge">Scope 2</div>
                        <h2 class="module-title">Emisi Tidak Langsung (Energi)</h2>
                        <p class="module-subtitle">Konsumsi listrik dan energi yang dibeli</p>
                    </div>
                    <div class="module-toggle">
                        <svg class="toggle-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,10L12,15L17,10H7Z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="module-content" id="scope2-content">
                    <div class="input-row">
                        <div class="input-group">
                            <label class="input-label">Konsumsi Listrik (kWh)</label>
                            <input type="number" class="input-field" id="listrik" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 0.85 kg CO₂/kWh</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Konsumsi Steam/Panas (kg)</label>
                            <input type="number" class="input-field" id="steam" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 0.3 kg CO₂/kg</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📊</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Emisi = (Listrik × 0.85) + (Steam × 0.3) ÷ 1000</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scope 3 Module -->
            <div class="calc-module scope-3-module">
                <div class="module-header" onclick="toggleModule('scope3')">
                    <div class="module-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.92,6.01C18.72,5.42,18.16,5,17.5,5H15V3H9V5H6.5C5.84,5,5.29,5.42,5.08,6.01L3,12V20C3,20.55,3.45,21,4,21H5C5.55,21,6,20.55,6,20V19H18V20C18,20.55,18.45,21,19,21H20C20.55,21,21,20.55,21,20V12L18.92,6.01ZM6.5,16C5.67,16,5,15.33,5,14.5S5.67,13,6.5,13S8,13.67,8,14.5S7.33,16,6.5,16ZM17.5,16C16.67,16,16,15.33,16,14.5S16.67,13,17.5,13S19,13.67,19,14.5S18.33,16,17.5,16ZM5,11L6.5,6.5H17.5L19,11H5Z"/>
                        </svg>
                    </div>
                    <div class="module-info">
                        <div class="module-badge">Scope 3</div>
                        <h2 class="module-title">Emisi Tidak Langsung Lainnya</h2>
                        <p class="module-subtitle">Rantai nilai: transportasi, limbah, perjalanan</p>
                    </div>
                    <div class="module-toggle">
                        <svg class="toggle-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,10L12,15L17,10H7Z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="module-content" id="scope3-content">
                    <div class="input-row">
                        <div class="input-group">
                            <label class="input-label">Transportasi Produk (km)</label>
                            <input type="number" class="input-field" id="transport" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 0.1 kg CO₂/km</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Perjalanan Bisnis (km)</label>
                            <input type="number" class="input-field" id="travel" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 0.25 kg CO₂/km</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Limbah (kg)</label>
                            <input type="number" class="input-field" id="waste" placeholder="0" step="0.01" min="0">
                            <span class="input-hint">Faktor Emisi: 0.5 kg CO₂/kg</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📊</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Emisi = (Transport × 0.1) + (Travel × 0.25) + (Limbah × 0.5) ÷ 1000</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Target Offset Section -->
            <div class="calc-module offset-module">
                <div class="module-header" onclick="toggleModule('offset')">
                    <div class="module-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                        </svg>
                    </div>
                    <div class="module-info">
                        <div class="module-badge">Offset Target</div>
                        <h2 class="module-title">Target Pengurangan Emisi</h2>
                        <p class="module-subtitle">Tentukan persentase offset yang diinginkan</p>
                    </div>
                    <div class="module-toggle">
                        <svg class="toggle-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7,10L12,15L17,10H7Z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="module-content" id="offset-content">
                    <div class="input-row">
                        <div class="input-group">
                            <label class="input-label">Target Offset (%)</label>
                            <input type="number" class="input-field" id="targetOffset" placeholder="0" min="0" max="100" step="1">
                            <span class="input-hint">Masukkan persentase offset (0-100%)</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📊</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Offset Dibutuhkan = Total Emisi × (Target Offset / 100)</div>
                            <div class="formula-text">Emisi Bersih = Total Emisi - Offset Dibutuhkan</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calculate Button -->
            <button class="btn-calculate" onclick="calculateEmissions()">
                Hitung Total Emisi Karbon
            </button>

            <!-- Result Box -->
            <div class="result-box" id="resultBox" style="display: none;">
                <h3 class="result-title">Hasil Kalkulasi Emisi</h3>
                
                <div class="result-grid">
                    <div class="result-item">
                        <div class="result-label">Scope 1</div>
                        <div class="result-value" id="resultScope1">0</div>
                        <div class="result-unit">ton CO₂e</div>
                    </div>
                    <div class="result-item">
                        <div class="result-label">Scope 2</div>
                        <div class="result-value" id="resultScope2">0</div>
                        <div class="result-unit">ton CO₂e</div>
                    </div>
                    <div class="result-item">
                        <div class="result-label">Scope 3</div>
                        <div class="result-value" id="resultScope3">0</div>
                        <div class="result-unit">ton CO₂e</div>
                    </div>
                </div>

                <div class="result-grid">
                    <div class="result-item result-item-total">
                        <div class="result-label">Total Emisi</div>
                        <div class="result-value result-value-total" id="resultTotal">0</div>
                        <div class="result-unit">ton CO₂e/tahun</div>
                    </div>
                    <div class="result-item">
                        <div class="result-label">Offset Dibutuhkan</div>
                        <div class="result-value" id="resultOffset">0</div>
                        <div class="result-unit">ton CO₂e</div>
                    </div>
                    <div class="result-item">
                        <div class="result-label">Emisi Bersih</div>
                        <div class="result-value" id="resultNet">0</div>
                        <div class="result-unit">ton CO₂e/tahun</div>
                    </div>
                </div>

                <div class="result-actions">
                    <a href="{{ route('projects') }}" class="btn-view-projects">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                            <path d="M17,8C8,10,5.9,16.17,3.82,21.34L5.71,22L6.66,19.7C7.14,19.87,7.64,20,8,20C19,20,22,3,22,3C21,5,14,5.25,9,6.25C4,7.25,2,11.5,2,13.5C2,15.5,3.75,17.25,3.75,17.25C7,8,17,8,17,8Z"/>
                        </svg>
                        Lihat Proyek Carbon Offset
                    </a>
                </div>
            </div>

            <!-- Emission Factors Reference -->
            <div class="factors-reference">
                <h3>📌 Sumber Faktor Emisi</h3>
                <div class="factor-list">
                    <div class="factor-item">
                        <strong>IPCC</strong>
                        <span>Intergovernmental Panel on Climate Change</span>
                    </div>
                    <div class="factor-item">
                        <strong>KLHK</strong>
                        <span>Kementerian Lingkungan Hidup dan Kehutanan RI</span>
                    </div>
                    <div class="factor-item">
                        <strong>IEA</strong>
                        <span>International Energy Agency</span>
                    </div>
                    <div class="factor-item">
                        <strong>PLN</strong>
                        <span>Grid Emission Factor Indonesia</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
<script>
    function toggleModule(moduleId) {
        const module = document.querySelector(`#${moduleId}-content`).closest('.calc-module');
        module.classList.toggle('expanded');
    }

    function calculateEmissions() {
        // Scope 1 - Direct Emissions
        const bensin = parseFloat(document.getElementById('bensin').value) || 0;
        const solar = parseFloat(document.getElementById('solar').value) || 0;
        const gas = parseFloat(document.getElementById('gas').value) || 0;
        
        const scope1 = (bensin * 2.31 + solar * 2.68 + gas * 2.0) / 1000; // Convert to tons

        // Scope 2 - Indirect Emissions (Energy)
        const listrik = parseFloat(document.getElementById('listrik').value) || 0;
        const steam = parseFloat(document.getElementById('steam').value) || 0;
        
        const scope2 = (listrik * 0.85 + steam * 0.3) / 1000; // Convert to tons

        // Scope 3 - Value Chain Emissions
        const transport = parseFloat(document.getElementById('transport').value) || 0;
        const travel = parseFloat(document.getElementById('travel').value) || 0;
        const waste = parseFloat(document.getElementById('waste').value) || 0;
        
        const scope3 = (transport * 0.1 + travel * 0.25 + waste * 0.5) / 1000; // Convert to tons

        // Total Emissions
        const totalEmissions = scope1 + scope2 + scope3;

        // Offset Calculation
        const targetOffset = parseFloat(document.getElementById('targetOffset').value) || 0;
        const offsetNeeded = totalEmissions * (targetOffset / 100);
        const netEmissions = totalEmissions - offsetNeeded;

        // Calculate tree equivalent (1 tree absorbs ~21.77 kg CO2 per year = 0.02177 ton)
        const treeEquivalent = Math.ceil(totalEmissions / 0.02177);

        // Display Results
        document.getElementById('resultScope1').textContent = scope1.toFixed(2);
        document.getElementById('resultScope2').textContent = scope2.toFixed(2);
        document.getElementById('resultScope3').textContent = scope3.toFixed(2);
        document.getElementById('resultTotal').textContent = totalEmissions.toFixed(2);
        document.getElementById('resultOffset').textContent = offsetNeeded.toFixed(2);
        document.getElementById('resultNet').textContent = netEmissions.toFixed(2);

        // Save to localStorage
        const emissionData = {
            scope1: scope1.toFixed(2),
            scope2: scope2.toFixed(2),
            scope3: scope3.toFixed(2),
            totalEmissions: totalEmissions.toFixed(2),
            offsetNeeded: offsetNeeded.toFixed(2),
            netEmissions: netEmissions.toFixed(2),
            treeEquivalent: treeEquivalent.toLocaleString('id-ID'),
            timestamp: new Date().toISOString(),
            inputs: {
                bensin, solar, gas,
                listrik, steam,
                transport, travel, waste,
                targetOffset
            }
        };
        
        localStorage.setItem('carbonEmissionData', JSON.stringify(emissionData));

        // Show result box
        document.getElementById('resultBox').style.display = 'block';
        document.getElementById('resultBox').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Initialize - modules closed by default
    document.addEventListener('DOMContentLoaded', function() {
        // Modules start closed, no initialization needed
    });

    // Enter key support
    document.querySelectorAll('.input-field').forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                calculateEmissions();
            }
        });
    });

    // Prevent negative numbers
    document.querySelectorAll('.input-field[type="number"]').forEach(input => {
        input.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    });
</script>
@endpush