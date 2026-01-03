<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CAMAR - Carbon Market Indonesia, Platform Perdagangan Karbon untuk Masa Depan Berkelanjutan">
    <title>CAMAR - Carbon Market Indonesia</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resources/css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/footer.css') }}">
</head>
<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-background">
            <img src="{{ asset('resources/images/mangrove0.png') }}" alt="Mangrove Background">
        </div>
        
        <div class="container">
            <div class="row align-items-end min-vh-100">
                <div class="col-lg-7 mx-auto text-center hero-content">
                    <h1 class="hero-title animate-fade-in">
                        Wujudkan Masa Depan Hijau <br>
                        <span class="highlight">Bersama Indonesia</span>
                    </h1>
                    <p class="hero-description animate-fade-in-delay">
                        CAMAR (Carbon Market Indonesia) adalah platform perdagangan karbon yang menghubungkan 
                        pelaku industri dengan proyek konservasi untuk menciptakan ekosistem berkelanjutan. 
                        Platform ini khusus dirancang untuk memfasilitasi penebusan karbon perusahaan-perusahaan 
                        di Indonesia, mendukung komitmen nasional terhadap pengurangan emisi dan ekonomi hijau.
                    </p>
                    
                    <div class="hero-stats animate-fade-in-delay-2">
                        <div class="stat-item">
                            <h3 class="stat-number">10K+</h3>
                            <p class="stat-label">Ton CO₂ Offset</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="stat-number">150+</h3>
                            <p class="stat-label">Proyek Hijau</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="stat-number">500+</h3>
                            <p class="stat-label">Mitra Bergabung</p>
                        </div>
                    </div>
                    
                    <div class="hero-cta animate-fade-in-delay-3">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Mulai Sekarang</a>
                        <a href="#studi" class="btn btn-outline-dark btn-lg">Kenapa Carbon Offset?</a>
                        <a href="#tentang" class="btn btn-outline-dark btn-lg">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <p>Scroll untuk menjelajah</p>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- Proyek Terbaru Section -->
    <section class="projects-section py-5" id="proyek">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Proyek Terbaru</h2>
                    <p class="section-subtitle">
                        Dukung proyek-proyek konservasi dan offset karbon terbaik di Indonesia
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ asset('resources/images/project-mangrove.jpg') }}" alt="Rehabilitasi Mangrove">
                            <span class="project-category">Mangrove</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">PT Konservasi Hijau</div>
                            <h3 class="project-name">Rehabilitasi Mangrove Pesisir Jawa</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>24 Bulan</span>
                            </div>
                            <p class="project-description">
                                Restorasi ekosistem mangrove seluas 500 hektar di pesisir utara Jawa untuk mitigasi abrasi dan penyerapan karbon.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 250K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ asset('resources/images/project-forest.jpg') }}" alt="Hutan Tropis">
                            <span class="project-category">Hutan Tropis</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Yayasan Rimba Lestari</div>
                            <h3 class="project-name">Konservasi Hutan Kalimantan</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>36 Bulan</span>
                            </div>
                            <p class="project-description">
                                Perlindungan dan pemulihan hutan hujan tropis Kalimantan seluas 1000 hektar untuk habitat orangutan dan penyimpanan karbon.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 180K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ asset('resources/images/project-energy.jpg') }}" alt="Energi Terbarukan">
                            <span class="project-category">Energi Bersih</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Indonesia Green Energy</div>
                            <h3 class="project-name">Pembangkit Listrik Tenaga Surya</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>60 Bulan</span>
                            </div>
                            <p class="project-description">
                                Instalasi sistem PLTS skala komunitas dengan kapasitas 5MW untuk mengurangi emisi dari pembangkit fosil.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 320K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ asset('resources/images/project-peat.jpg') }}" alt="Gambut">
                            <span class="project-category">Lahan Gambut</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Gambut Lestari Foundation</div>
                            <h3 class="project-name">Restorasi Lahan Gambut Sumatra</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>48 Bulan</span>
                            </div>
                            <p class="project-description">
                                Pemulihan dan rewetting lahan gambut terdegradasi seluas 800 hektar untuk mencegah kebakaran dan emisi CO₂.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 290K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ asset('resources/images/project-biogas.jpg') }}" alt="Biogas">
                            <span class="project-category">Bioenergi</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Bio Energy Indonesia</div>
                            <h3 class="project-name">Sistem Biogas Desa Mandiri</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>30 Bulan</span>
                            </div>
                            <p class="project-description">
                                Pembangunan 500 unit biogas rumah tangga dari limbah ternak untuk mengurangi penggunaan LPG dan emisi metana.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 210K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="project-card">
                        <div class="project-image">
                            <img src="{{ asset('resources/images/project-agroforestry.jpg') }}" alt="Agroforestry">
                            <span class="project-category">Agroforestri</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Petani Hijau Nusantara</div>
                            <h3 class="project-name">Agroforestri Kopi Berkelanjutan</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>36 Bulan</span>
                            </div>
                            <p class="project-description">
                                Sistem agroforestri terpadu dengan tanaman kopi dan pohon pelindung di 300 hektar lahan untuk carbon sequestration.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 195K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- Why Carbon Offset Section -->
    <section class="why-carbon-section py-5" id="studi">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-10 mx-auto text-center">
                    <h2 class="section-title-alt">Mengapa Carbon Offset?</h2>
                    <p class="section-subtitle-alt">
                        Memahami urgensi dan solusi sistematis untuk krisis iklim
                    </p>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <div class="problem-card">
                        <div class="problem-icon-wrapper">
                            <svg class="problem-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M12,20c-4.41,0-8-3.59-8-8s3.59-8,8-8s8,3.59,8,8 S16.41,20,12,20z M12,6c-3.31,0-6,2.69-6,6s2.69,6,6,6s6-2.69,6-6S15.31,6,12,6z"/>
                            </svg>
                        </div>
                        <h3 class="problem-title">Krisis Iklim Global</h3>
                        <p class="problem-text">
                            Emisi CO₂ global mencapai 36.8 miliar ton/tahun, menyebabkan peningkatan suhu 1.1°C. 
                            Indonesia berkontribusi 615 juta ton CO₂e per tahun.
                        </p>
                        <div class="problem-stat">
                            <span class="stat-big">615 Jt</span>
                            <span class="stat-label">Ton CO₂e/tahun</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="problem-card">
                        <div class="problem-icon-wrapper">
                            <svg class="problem-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2l-5.5,9h11L12,2z M12,5.84L13.93,9h-3.87L12,5.84z M17.5,13c-2.49,0-4.5,2.01-4.5,4.5s2.01,4.5,4.5,4.5 s4.5-2.01,4.5-4.5S19.99,13,17.5,13z M17.5,20c-1.38,0-2.5-1.12-2.5-2.5s1.12-2.5,2.5-2.5s2.5,1.12,2.5,2.5S18.88,20,17.5,20z M3,21.5h8v-8H3V21.5z M5,15.5h4v4H5V15.5z"/>
                            </svg>
                        </div>
                        <h3 class="problem-title">Sektor Industri & Energi</h3>
                        <p class="problem-text">
                            Sektor energi dan industri menyumbang 35% dari total emisi nasional. Pembangkit fosil 
                            dan manufaktur menjadi kontributor utama.
                        </p>
                        <div class="problem-stat">
                            <span class="stat-big">35%</span>
                            <span class="stat-label">Kontribusi industri</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="solution-container">
                <div class="solution-header">
                    <div class="solution-badge">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9,21c0,0.55,0.45,1,1,1h4c0.55,0,1-0.45,1-1v-1H9V21z M12,2C8.14,2,5,5.14,5,9c0,2.38,1.19,4.47,3,5.74V17 c0,0.55,0.45,1,1,1h6c0.55,0,1-0.45,1-1v-2.26c1.81-1.27,3-3.36,3-5.74C19,5.14,15.86,2,12,2z"/>
                        </svg>
                        Solusi
                    </div>
                    <h3 class="solution-title">Carbon Offset: Jembatan Menuju Net Zero</h3>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="solution-step">
                            <div class="step-number">01</div>
                            <h4 class="step-title">Hitung Emisi</h4>
                            <p class="step-text">
                                Perusahaan menghitung jejak karbon menggunakan metodologi GHG Protocol terstandarisasi.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="solution-step">
                            <div class="step-number">02</div>
                            <h4 class="step-title">Reduksi Internal</h4>
                            <p class="step-text">
                                Implementasi efisiensi energi dan peralihan ke energi terbarukan untuk reduksi langsung.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="solution-step">
                            <div class="step-number">03</div>
                            <h4 class="step-title">Offset Residu</h4>
                            <p class="step-text">
                                Emisi residual dioffset melalui kredit karbon dari proyek verified reforestasi dan energi bersih.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="impact-showcase">
                    <div class="impact-item">
                        <div class="impact-value">2.6M</div>
                        <div class="impact-label">Hektar hutan</div>
                    </div>
                    <div class="impact-divider"></div>
                    <div class="impact-item">
                        <div class="impact-value">450K</div>
                        <div class="impact-label">Ton CO₂</div>
                    </div>
                    <div class="impact-divider"></div>
                    <div class="impact-item">
                        <div class="impact-value">150+</div>
                        <div class="impact-label">Perusahaan</div>
                    </div>
                </div>
            </div>

            <div class="commitment-box">
                <div class="commitment-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M10,17l-5-5l1.41-1.41L10,14.17l7.59-7.59L19,8 L10,17z"/>
                    </svg>
                </div>
                <div class="commitment-content">
                    <h4 class="commitment-title">Komitmen Indonesia: Net Zero 2060</h4>
                    <p class="commitment-text">
                        Indonesia berkomitmen mencapai net zero emission pada 2060 dan mengurangi emisi 29-41% pada 2030. 
                        Carbon offset menjadi instrumen kunci mencapai target ini.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- Layanan Kami Section -->
    <section class="services-section py-5" id="tentang">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">Layanan Kami</h2>
                    <p class="section-subtitle">
                        Solusi lengkap untuk pengelolaan karbon kredit perusahaan Anda
                    </p>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon-wrapper">
                            <svg class="service-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M9,17H7v-7h2V17z M13,17h-2V7h2V17z M17,17h-2v-4h2V17z"/>
                            </svg>
                        </div>
                        <h3 class="service-title">Trading Platform</h3>
                        <p class="service-text">
                            Platform trading karbon kredit yang aman, transparan, dan terintegrasi
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon-wrapper">
                            <svg class="service-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10s10-4.48,10-10S17.52,2,12,2z M10,17l-5-5l1.41-1.41L10,14.17l7.59-7.59L19,8 L10,17z"/>
                            </svg>
                        </div>
                        <h3 class="service-title">Verifikasi Proyek</h3>
                        <p class="service-text">
                            Sistem verifikasi proyek karbon dengan standar internasional
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon-wrapper">
                            <svg class="service-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16,6l2.29,2.29l-4.88,4.88l-4-4L2,16.59L3.41,18l6-6l4,4l6.3-6.29L22,12V6H16z"/>
                            </svg>
                        </div>
                        <h3 class="service-title">Monitoring Real-time</h3>
                        <p class="service-text">
                            Pantau dampak pengurangan emisi karbon secara real-time
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="service-icon-wrapper">
                            <svg class="service-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z"/>
                            </svg>
                        </div>
                        <h3 class="service-title">Laporan & Analitik</h3>
                        <p class="service-text">
                            Dashboard analitik komprehensif untuk pengambilan keputusan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('resources/js/landing.js') }}"></script>
</body>
</html>