@extends('main_page.layout.app')

@section('title', 'Rehabilitasi Mangrove Pesisir Jawa | CAMAR Carbon Offset')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="product-hero">
        <div class="product-hero-bg">
            <img src="{{ asset('images/mangrove-hero.jpg') }}" alt="Rehabilitasi Mangrove">
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span>›</span>
                <a href="{{ route('projects') }}">Proyek</a>
                <span>›</span>
                <span class="current">Rehabilitasi Mangrove Pesisir Jawa</span>
            </div>
            <div class="hero-content">
                <h1 class="hero-title">Rehabilitasi Mangrove Pesisir Jawa</h1>
                <p class="hero-subtitle">Blue Carbon - Mangroves • Pesisir Utara Jawa</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="product-page">
        <div class="container">
            
            <div class="product-container">
                
                <!-- Left: Image Gallery -->
                <div class="product-image-section">
                    <div class="main-image">
                        <div class="image-placeholder">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M21,19V5c0-1.1-0.9-2-2-2H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14C20.1,21,21,20.1,21,19z M8.5,13.5l2.5,3.01L14.5,12 l4.5,6H5L8.5,13.5z"/>
                            </svg>
                            <p>Mangrove Restoration</p>
                        </div>
                    </div>
                    
                    <div class="thumbnail-gallery">
                        <div class="thumbnail active">Image 1</div>
                        <div class="thumbnail">Image 2</div>
                        <div class="thumbnail">Image 3</div>
                        <div class="thumbnail">Image 4</div>
                    </div>

                    <!-- Stats -->
                    <div class="project-stats">
                        <div class="stat-card">
                            <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2C8.13,2,5,5.13,5,9c0,5.25,7,13,7,13s7-7.75,7-13C19,5.13,15.87,2,12,2z"/>
                            </svg>
                            <div class="stat-value">Pesisir Jawa</div>
                            <div class="stat-label">Lokasi</div>
                        </div>
                        <div class="stat-card">
                            <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z"/>
                            </svg>
                            <div class="stat-value">500</div>
                            <div class="stat-label">Total Kapasitas (ton)</div>
                        </div>
                        <div class="stat-card">
                            <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9,11H7v2h2V11z M13,11h-2v2h2V11z M17,11h-2v2h2V11z"/>
                            </svg>
                            <div class="stat-value">24 Bulan</div>
                            <div class="stat-label">Durasi Proyek</div>
                        </div>
                        <div class="stat-card">
                            <svg class="stat-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z"/>
                            </svg>
                            <div class="stat-value">500</div>
                            <div class="stat-label">Tersedia (ton)</div>
                        </div>
                    </div>

                    <!-- Certifications -->
                    <div class="certifications-section">
                        <h3 class="section-subtitle">Sertifikasi & Standar</h3>
                        <div class="cert-badges">
                            <div class="cert-badge">
                                <div class="cert-icon">VCS</div>
                                <div class="cert-name">Verified Carbon Standard</div>
                            </div>
                            <div class="cert-badge">
                                <div class="cert-icon">GS</div>
                                <div class="cert-name">Gold Standard</div>
                            </div>
                            <div class="cert-badge">
                                <div class="cert-icon">KLHK</div>
                                <div class="cert-name">Kementerian LHK</div>
                            </div>
                        </div>
                    </div>

                    <!-- SDG -->
                    <div class="sdg-section">
                        <h3 class="section-subtitle">SDG Alignment</h3>
                        <div class="sdg-grid">
                            <div class="sdg-item">
                                <div class="sdg-number">13</div>
                                <div class="sdg-label">Aksi Iklim</div>
                            </div>
                            <div class="sdg-item">
                                <div class="sdg-number">14</div>
                                <div class="sdg-label">Kehidupan Laut</div>
                            </div>
                            <div class="sdg-item">
                                <div class="sdg-number">15</div>
                                <div class="sdg-label">Kehidupan Darat</div>
                            </div>
                        </div>
                    </div>

                    <!-- Co-benefits -->
                    <div class="cobenefits-section">
                        <h3 class="section-subtitle">Co-benefits</h3>
                        <div class="cobenefit-list">
                            <div class="cobenefit-item">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                    <path d="M9,16.17L4.83,12l-1.42,1.41L9,19L21,7l-1.41-1.41L9,16.17z"/>
                                </svg>
                                <span>Pelestarian Keanekaragaman Hayati Laut</span>
                            </div>
                            <div class="cobenefit-item">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                    <path d="M9,16.17L4.83,12l-1.42,1.41L9,19L21,7l-1.41-1.41L9,16.17z"/>
                                </svg>
                                <span>Pemberdayaan Masyarakat Pesisir</span>
                            </div>
                            <div class="cobenefit-item">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                    <path d="M9,16.17L4.83,12l-1.42,1.41L9,19L21,7l-1.41-1.41L9,16.17z"/>
                                </svg>
                                <span>Pencegahan Abrasi Pantai</span>
                            </div>
                            <div class="cobenefit-item">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                    <path d="M9,16.17L4.83,12l-1.42,1.41L9,19L21,7l-1.41-1.41L9,16.17z"/>
                                </svg>
                                <span>Peningkatan Hasil Perikanan</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Info -->
                <div class="product-info-section">
                    
                    <div class="product-header">
                        <div class="product-title">
                            <div class="store-info">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20" style="margin-right: 0.5rem;">
                                    <path d="M12,12c2.21,0,4-1.79,4-4s-1.79-4-4-4S8,5.79,8,8S9.79,12,12,12z M12,14c-2.67,0-8,1.34-8,4v2h16v-2 C20,15.34,14.67,14,12,14z"/>
                                </svg>
                                <span style="color: rgba(18,65,112,0.6);">Penjual: </span>
                                <a href="#" style="color: var(--color-green); margin-left: 0.5rem; font-weight: 600;">PT Konservasi Hijau</a>
                            </div>

                            <h1>Rehabilitasi Mangrove Pesisir Jawa</h1>
                            <p class="product-subtitle">Blue Carbon - Mangroves</p>
                            
                            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; margin-top: 1rem;">
                                <span class="verified-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z"/>
                                    </svg>
                                    Verified Project
                                </span>
                                <span class="vintage-badge">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M9,11H7v2h2V11z M13,11h-2v2h2V11z"/>
                                    </svg>
                                    2024
                                </span>
                                <span class="status-badge status-active">ACTIVE</span>
                            </div>
                        </div>
                    </div>

                    <!-- Info Cards -->
                    <div class="info-cards">
                        <div class="info-card">
                            <div class="info-card-label">Harga per Ton CO₂e</div>
                            <div class="info-card-value price">
                                Rp 250.000
                                <span class="unit">/ton</span>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="info-card-label">Kapasitas Tersedia</div>
                            <div class="info-card-value">500 ton</div>
                        </div>
                        <div class="info-card">
                            <div class="info-card-label">Periode Proyek</div>
                            <div class="info-card-value">Jan 2024 - Des 2025</div>
                        </div>
                        <div class="info-card">
                            <div class="info-card-label">Progress</div>
                            <div class="info-card-value">
                                35%
                                <span class="unit">completed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="product-details">
                        <h3 class="section-subtitle">Detail Proyek</h3>
                        <div class="detail-item">
                            <span class="detail-label">Tipe Proyek</span>
                            <span class="detail-value">Blue Carbon - Mangroves</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Lokasi</span>
                            <span class="detail-value">Pesisir Utara Jawa</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Luas Area</span>
                            <span class="detail-value">500 Hektar</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Total Kapasitas</span>
                            <span class="detail-value">500 ton CO₂e</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Status</span>
                            <span class="detail-value">
                                <span class="status-badge status-active">ACTIVE</span>
                            </span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Verifikasi</span>
                            <span class="detail-value">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16" style="color: var(--color-green); vertical-align: middle; margin-right: 0.5rem;">
                                    <path d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z"/>
                                </svg>
                                Verified by Admin
                            </span>
                        </div>
                    </div>

                    <!-- Purchase -->
                    <div class="purchase-section">
                        <h3 class="section-subtitle">Beli Carbon Offset</h3>
                        <form>
                            <div class="quantity-selector">
                                <label>Jumlah (ton CO₂e)</label>
                                <div class="quantity-controls">
                                    <button type="button" class="quantity-btn" onclick="decreaseQuantity()">−</button>
                                    <input type="number" class="quantity-input" id="quantity" value="1" min="1" max="500" onchange="updateTotal()">
                                    <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
                                </div>
                                <p class="quantity-hint">Maksimal: 500 ton tersedia</p>
                            </div>

                            <div class="total-calculation">
                                <div class="total-row">
                                    <span class="total-label">Subtotal</span>
                                    <span class="total-value" id="subtotal">Rp 250.000</span>
                                </div>
                                <div class="total-row">
                                    <span class="total-label">PPN (11%)</span>
                                    <span class="total-value" id="tax">Rp 27.500</span>
                                </div>
                                <div class="total-row" style="margin-top: 1rem; padding-top: 1rem; border-top: 2px solid rgba(0,0,0,0.1);">
                                    <span class="total-label" style="font-size: 1.2rem; font-weight: 700;">Total</span>
                                    <span class="total-value" id="total" style="font-size: 1.5rem; font-weight: 800; color: var(--color-green);">Rp 277.500</span>
                                </div>
                            </div>

                            <button type="button" class="btn-purchase" onclick="alert('Fitur pembelian akan segera hadir!')">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                    <path d="M17,8C8,10,5.9,16.17,3.82,21.34L5.71,22L6.66,19.7C7.14,19.87,7.64,20,8,20C19,20,22,3,22,3C21,5,14,5.25,9,6.25C4,7.25,2,11.5,2,13.5C2,15.5,3.75,17.25,3.75,17.25C7,8,17,8,17,8Z"/>
                                </svg>
                                Beli Sekarang
                            </button>
                            <button type="button" class="btn-add-cart" onclick="alert('Ditambahkan ke keranjang!')">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                                    <path d="M7,18c-1.1,0-1.99,0.9-1.99,2S5.9,22,7,22s2-0.9,2-2S8.1,18,7,18z M1,2v2h2l3.6,7.59L5.25,14.04 C5.09,14.32,5,14.65,5,15c0,1.1,0.9,2,2,2h12v-2H7.42c-0.14,0-0.25-0.11-0.25-0.25l0.03-0.12l0.9-1.63h7.45 c0.75,0,1.41-0.41,1.75-1.03l3.58-6.49C22.94,5.26,23,5.13,23,5c0-0.55-0.45-1-1-1H5.21l-0.94-2H1z M17,18c-1.1,0-1.99,0.9-1.99,2 s0.89,2,1.99,2s2-0.9,2-2S18.1,18,17,18z"/>
                                </svg>
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <!-- Description -->
            <section class="project-description-section">
                <h2 class="section-title">Tentang Proyek</h2>
                <div class="description-content">
                    <p>Proyek Rehabilitasi Mangrove Pesisir Jawa merupakan inisiatif restorasi ekosistem mangrove seluas 500 hektar di pesisir utara Jawa untuk mitigasi abrasi dan penyerapan karbon.</p>
                    <h3>Metodologi</h3>
                    <p>Menggunakan metodologi Blue Carbon untuk mengukur penyerapan karbon di ekosistem pesisir. Setiap hektar menyerap rata-rata 1 ton CO₂ per tahun.</p>
                    <h3>Dampak Lingkungan</h3>
                    <p>Merehabilitasi 500 hektar mangrove yang menyerap 500 ton CO₂e per tahun, mencegah abrasi pantai, dan menyediakan habitat bagi spesies laut.</p>
                </div>
            </section>

            <!-- Timeline -->
            <section class="project-timeline-section">
                <h2 class="section-title">Timeline Proyek</h2>
                <div class="timeline">
                    <div class="timeline-item completed">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4>Perencanaan & Persetujuan</h4>
                            <p class="timeline-date">Okt 2023</p>
                            <p>Fase perencanaan proyek dan survei lokasi</p>
                        </div>
                    </div>
                    <div class="timeline-item active">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4>Penanaman & Implementasi</h4>
                            <p class="timeline-date">Jan 2024</p>
                            <p>Pelaksanaan penanaman bibit mangrove</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4>Monitoring & Verifikasi</h4>
                            <p class="timeline-date">Des 2025</p>
                            <p>Pemantauan dan verifikasi hasil</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection

@push('scripts')
<script>
    const pricePerTon = 250000;

    function updateTotal() {
        const quantity = parseInt(document.getElementById('quantity').value) || 1;
        const subtotal = pricePerTon * quantity;
        const tax = subtotal * 0.11;
        const total = subtotal + tax;

        document.getElementById('subtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
        document.getElementById('tax').textContent = 'Rp ' + tax.toLocaleString('id-ID');
        document.getElementById('total').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
        updateTotal();
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            updateTotal();
        }
    }

    document.addEventListener('DOMContentLoaded', updateTotal);
</script>
@endpush