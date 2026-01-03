<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kalkulator Emisi Karbon - CAMAR">
    <title>Kalkulator Karbon - CAMAR</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resources/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/calculator.css') }}">
</head>
<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="calculator-hero" id="calculator">
        <div class="calculator-hero-bg">
            <img src="{{ asset('resources/images/gunung0.png') }}" alt="Hero Background">
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
                            <label class="input-label">Konsumsi Bahan Bakar (Liter)</label>
                            <input type="number" class="input-field" id="fuel-consumption" placeholder="0">
                            <span class="input-hint">Solar, Bensin, Gas</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Faktor Emisi (kg CO₂/Liter)</label>
                            <input type="number" class="input-field" id="fuel-factor" value="2.68" step="0.01">
                            <span class="input-hint">Default: 2.68</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📐</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Emisi = Konsumsi × Faktor Emisi</div>
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
                            <input type="number" class="input-field" id="electricity-consumption" placeholder="0">
                            <span class="input-hint">Per bulan atau tahun</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Faktor Emisi (kg CO₂/kWh)</label>
                            <input type="number" class="input-field" id="electricity-factor" value="0.85" step="0.01">
                            <span class="input-hint">Indonesia: 0.85</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📐</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Emisi = Konsumsi Listrik × Faktor Grid</div>
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
                            <label class="input-label">Transportasi (km)</label>
                            <input type="number" class="input-field" id="transport-distance" placeholder="0">
                            <span class="input-hint">Jarak tempuh kendaraan</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Faktor Emisi (kg CO₂/km)</label>
                            <input type="number" class="input-field" id="transport-factor" value="0.21" step="0.01">
                            <span class="input-hint">Mobil: 0.21</span>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label class="input-label">Limbah (kg)</label>
                            <input type="number" class="input-field" id="waste-amount" placeholder="0">
                            <span class="input-hint">Total limbah dihasilkan</span>
                        </div>
                        <div class="input-group">
                            <label class="input-label">Faktor Emisi Limbah (kg CO₂/kg)</label>
                            <input type="number" class="input-field" id="waste-factor" value="0.5" step="0.01">
                            <span class="input-hint">Default: 0.5</span>
                        </div>
                    </div>
                    <div class="formula-box">
                        <div class="formula-icon">📐</div>
                        <div class="formula-content">
                            <h4>Formula</h4>
                            <div class="formula-text">Emisi = (Transportasi × FE) + (Limbah × FE)</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calculate Button -->
            <button class="btn-calculate" onclick="calculateEmissions()">
                Hitung Total Emisi Karbon
            </button>

            <!-- Result Box -->
            <div class="result-box" id="result-box" style="display: none;">
                <h3 class="result-title">Hasil Kalkulasi</h3>
                <div class="result-grid">
                    <div class="result-item">
                        <div class="result-label">Scope 1</div>
                        <div class="result-value" id="result-scope1">0</div>
                        <div class="result-unit">kg CO₂</div>
                    </div>
                    <div class="result-item">
                        <div class="result-label">Scope 2</div>
                        <div class="result-value" id="result-scope2">0</div>
                        <div class="result-unit">kg CO₂</div>
                    </div>
                    <div class="result-item">
                        <div class="result-label">Scope 3</div>
                        <div class="result-value" id="result-scope3">0</div>
                        <div class="result-unit">kg CO₂</div>
                    </div>
                    <div class="result-item result-item-total">
                        <div class="result-label">Total Emisi</div>
                        <div class="result-value result-value-total" id="result-total">0</div>
                        <div class="result-unit">kg CO₂</div>
                    </div>
                </div>
                <div class="result-footer">
                    <p class="result-info">
                        Setara dengan <span id="tree-equivalent">0</span> pohon yang harus ditanam untuk offset selama 1 tahun
                    </p>
                </div>
            </div>

            <!-- Emission Factors Reference -->
            <div class="factors-reference">
                <h3>Referensi Faktor Emisi</h3>
                <div class="factors-grid">
                    <div class="factor-item">
                        <h4>Bahan Bakar</h4>
                        <ul>
                            <li>Solar: 2.68 kg CO₂/L</li>
                            <li>Bensin: 2.31 kg CO₂/L</li>
                            <li>LPG: 3.00 kg CO₂/kg</li>
                        </ul>
                    </div>
                    <div class="factor-item">
                        <h4>Listrik</h4>
                        <ul>
                            <li>Indonesia: 0.85 kg CO₂/kWh</li>
                            <li>Grid Mix: 0.85 kg CO₂/kWh</li>
                        </ul>
                    </div>
                    <div class="factor-item">
                        <h4>Transportasi</h4>
                        <ul>
                            <li>Mobil: 0.21 kg CO₂/km</li>
                            <li>Motor: 0.08 kg CO₂/km</li>
                            <li>Pesawat: 0.25 kg CO₂/km</li>
                        </ul>
                    </div>
                    <div class="factor-item">
                        <h4>Limbah</h4>
                        <ul>
                            <li>Organik: 0.5 kg CO₂/kg</li>
                            <li>Plastik: 0.7 kg CO₂/kg</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Include Footer -->
    @include('partials.footer')

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('resources/js/navbar.js') }}"></script>
    <script src="{{ asset('resources/js/calculator.js') }}"></script>
</body>
</html>