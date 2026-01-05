@extends('main_page.layout.app')

@section('title', 'Proyek Carbon Offset')
@section('description', 'Proyek Carbon Offset - Pilih proyek verified carbon offset untuk mengurangi jejak karbon perusahaan Anda')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="projects-hero" id="projects">
        <div class="projects-hero-bg">
            <img src="{{ asset('images/pabrik0.png') }}" alt="Hero Background">
        </div>
        <div class="container">
            <div class="projects-hero-content">
                <h1 class="projects-hero-title">Proyek Carbon Offset</h1>
                <p class="projects-hero-description">
                    Pilih proyek verified carbon offset untuk mengurangi jejak karbon perusahaan Anda. 
                    Dukung proyek reforestasi, energi bersih, dan konservasi di seluruh Indonesia.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="projects-page">
        <div class="container">
            
            <!-- Emission Stats Section -->
            <section class="emission-stats">
                <div class="stats-card">
                    <div class="stats-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M9,17H7v-7h2V17z M13,17h-2V7h2V17z M17,17h-2v-4h2V17z"/>
                        </svg>
                    </div>
                    <div class="stats-content">
                        <div class="stats-label">Total Emisi Anda</div>
                        <div class="stats-value" id="total-emissions">-</div>
                        <div class="stats-unit">ton CO₂e</div>
                    </div>
                </div>
                
                <div class="stats-card">
                    <div class="stats-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,2C8.13,2,5,5.13,5,9c0,5.25,7,13,7,13s7-7.75,7-13C19,5.13,15.87,2,12,2z M12,11.5c-1.38,0-2.5-1.12-2.5-2.5 s1.12-2.5,2.5-2.5s2.5,1.12,2.5,2.5S13.38,11.5,12,11.5z"/>
                        </svg>
                    </div>
                    <div class="stats-content">
                        <div class="stats-label">Pohon Setara</div>
                        <div class="stats-value" id="tree-equivalent">-</div>
                        <div class="stats-unit">Pohon</div>
                    </div>
                </div>
                
                <div class="stats-card stats-card-highlight">
                    <div class="stats-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17,8C8,10,5.9,16.17,3.82,21.34L5.71,22L6.66,19.7C7.14,19.87,7.64,20,8,20C19,20,22,3,22,3C21,5,14,5.25,9,6.25C4,7.25,2,11.5,2,13.5C2,15.5,3.75,17.25,3.75,17.25C7,8,17,8,17,8Z"/>
                        </svg>
                    </div>
                    <div class="stats-content">
                        <div class="stats-label">Offset Dibutuhkan</div>
                        <div class="stats-value" id="offset-needed">-</div>
                        <div class="stats-unit">ton CO₂e</div>
                    </div>
                </div>
            </section>

            <!-- Calculation Notice -->
            <div class="calculation-notice" id="calculation-notice" style="display: none;">
                <div class="notice-content">
                    <svg class="notice-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M13,17h-2v-6h2V17z M13,9h-2V7h2V9z"/>
                    </svg>
                    <p>Belum ada data emisi. <a href="{{ route('calculator') }}" class="notice-link">Hitung emisi Anda</a> terlebih dahulu untuk mendapatkan rekomendasi proyek yang sesuai.</p>
                </div>
            </div>

            <!-- Search & Sort Section -->
            <section class="search-sort-section">
                <div class="search-box">
                    <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.5,14H14.71L14.43,13.73C15.41,12.59,16,11.11,16,9.5C16,5.91,13.09,3,9.5,3S3,5.91,3,9.5S5.91,16,9.5,16 C11.11,16,12.59,15.41,13.73,14.43L14,14.71V15.5L19,20.49L20.49,19L15.5,14z M9.5,14C7.01,14,5,11.99,5,9.5S7.01,5,9.5,5 S14,7.01,14,9.5S11.99,14,9.5,14z"/>
                    </svg>
                    <input type="text" class="search-input" id="search-input" placeholder="Cari proyek berdasarkan nama, lokasi, atau kategori...">
                </div>
                <div class="sort-box">
                    <select class="sort-select" id="sort-select">
                        <option value="relevant">Paling Relevan</option>
                        <option value="price-low">Harga Terendah</option>
                        <option value="price-high">Harga Tertinggi</option>
                        <option value="newest">Terbaru</option>
                        <option value="capacity">Kapasitas Terbesar</option>
                    </select>
                </div>
            </section>

            <!-- Projects Grid Section -->
            <section class="projects-grid-section">
                <div class="projects-grid" id="projects-grid">
                    <!-- Project cards will be dynamically generated -->
                </div>
            </section>

            <!-- Pagination Section -->
            <section class="pagination-section">
                <button class="pagination-btn" id="prev-btn" disabled>
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.41,16.59L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.59Z"/>
                    </svg>
                </button>
                <div class="pagination-numbers" id="pagination-numbers"></div>
                <button class="pagination-btn" id="next-btn">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8.59,16.59L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.59Z"/>
                    </svg>
                </button>
            </section>

        </div>
    </main>

    <!-- Include Footer -->

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@push('scripts')
<script>
    // Load emission data from localStorage
    document.addEventListener('DOMContentLoaded', function() {
        loadEmissionData();
    });

    function loadEmissionData() {
        const emissionData = localStorage.getItem('carbonEmissionData');
        
        if (emissionData) {
            try {
                const data = JSON.parse(emissionData);
                
                // Display emission stats
                document.getElementById('total-emissions').textContent = data.totalEmissions || '-';
                document.getElementById('tree-equivalent').textContent = data.treeEquivalent || '-';
                document.getElementById('offset-needed').textContent = data.offsetNeeded || '-';
                
                // Hide calculation notice
                document.getElementById('calculation-notice').style.display = 'none';
                
            } catch (error) {
                console.error('Error loading emission data:', error);
                showCalculationNotice();
            }
        } else {
            showCalculationNotice();
        }
    }

    function showCalculationNotice() {
        // Show notice
        document.getElementById('calculation-notice').style.display = 'block';
        
        // Set default values
        document.getElementById('total-emissions').textContent = '-';
        document.getElementById('tree-equivalent').textContent = '-';
        document.getElementById('offset-needed').textContent = '-';
    }
</script>
<script src="{{ asset('js/projects.js') }}"></script>
@endpush