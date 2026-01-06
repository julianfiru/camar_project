@extends('main_page.layout.app')

@section('title', 'Beranda')
@section('description', 'CAMAR - Carbon Market Indonesia, Platform Perdagangan Karbon untuk Masa Depan Berkelanjutan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-background">
            <img src="{{ asset('images/mangrove0.png') }}" alt="Mangrove Background">
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

    <!-- Section 2: Apa itu Carbon Offset - Apa dan Mengapa -->
    <section class="what-carbon-section" id="studi">
        <div class="container">
            <!-- Header -->
            <div class="row mb-5">
                <div class="col-lg-10 mx-auto text-center">
                    <div class="what-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2c1.103 0 2 .897 2 2v2c0 1.103-.897 2-2 2s-2-.897-2-2v-2c0-1.103.897-2 2-2zm0 12c1.103 0 2-.897 2-2v-2c0-1.103-.897-2-2-2s-2 .897-2 2v2c0 1.103.897 2 2 2z"/>
                        </svg>
                        Carbon Offset
                    </div>
                    <h2 class="what-title">Apa itu Carbon Offset?</h2>
                    <p class="what-lead">
                        Carbon offset adalah mekanisme pengurangan emisi gas rumah kaca untuk mengompensasi emisi yang dihasilkan di tempat lain, mendukung transisi menuju Net-Zero emissions
                    </p>
                </div>
            </div>

            <!-- What is Carbon Offset -->
            <div class="row align-items-center g-5 mb-5">
                <!-- Left: Single Image -->
                <div class="col-lg-5 order-lg-1 order-2">
                    <div class="what-visual-single">
                        <img src="{{ asset('images/what-carbon-offset.png') }}" alt="Apa itu Carbon Offset" class="img-fluid rounded-4">
                    </div>
                </div>
                
                <!-- Right: Content -->
                <div class="col-lg-7 order-lg-2 order-1">
                    <div class="what-content">
                        <h3 class="what-subtitle">Apa itu Carbon Offset?</h3>
                        <p class="what-text">
                            <strong>Carbon offset</strong> adalah kredit karbon yang mewakili pengurangan satu ton CO₂ atau gas rumah kaca setara dari atmosfer. Ketika perusahaan atau individu tidak dapat menghilangkan semua emisi mereka, mereka dapat membeli carbon offset untuk mengkompensasi jejak karbon mereka.
                        </p>
                        <p class="what-text">
                            Setiap kredit carbon offset didapatkan dari proyek-proyek terverifikasi seperti:
                        </p>
                        <div class="offset-types">
                            <div class="offset-type-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3z"/>
                                </svg>
                                <span><strong>Reforestasi:</strong> Penanaman hutan baru untuk menyerap CO₂</span>
                            </div>
                            <div class="offset-type-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3z"/>
                                </svg>
                                <span><strong>Energi Terbarukan:</strong> Solar, wind, hydro yang mengganti fosil</span>
                            </div>
                            <div class="offset-type-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3z"/>
                                </svg>
                                <span><strong>Konservasi Hutan:</strong> Melindungi hutan dari deforestasi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Carbon Offset -->
            <div class="why-section-wrapper">
                <div class="row mb-4">
                    <div class="col-lg-10 mx-auto text-center">
                        <h3 class="why-subtitle">Mengapa Carbon Offset Penting?</h3>
                        <p class="why-description">Solusi terukur untuk mencapai target Net-Zero dalam menghadapi krisis iklim global</p>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <!-- Problem Card -->
                    <div class="col-lg-6">
                        <div class="why-card problem-why-card">
                            <div class="why-card-header">
                                <div class="why-icon problem-why-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z"/>
                                    </svg>
                                </div>
                                <h4 class="why-card-title">Tantangan</h4>
                            </div>
                            <div class="why-card-body">
                                <div class="challenge-stats">
                                    <div class="challenge-row">
                                        <span class="challenge-number">+1.2°C</span>
                                        <span class="challenge-text">Peningkatan suhu global sejak era pra-industri</span>
                                    </div>
                                    <div class="challenge-row">
                                        <span class="challenge-number">33 Gt</span>
                                        <span class="challenge-text">Emisi CO₂ global per tahun dan terus meningkat</span>
                                    </div>
                                    <div class="challenge-row">
                                        <span class="challenge-number">29-41%</span>
                                        <span class="challenge-text">Target pengurangan emisi Indonesia pada 2030</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Solution Card -->
                    <div class="col-lg-6">
                        <div class="why-card solution-why-card">
                            <div class="why-card-header">
                                <div class="why-icon solution-why-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/>
                                    </svg>
                                </div>
                                <h4 class="why-card-title">Solusi</h4>
                            </div>
                            <div class="why-card-body">
                                <div class="solution-process">
                                    <div class="process-step">
                                        <div class="process-badge">01</div>
                                        <span>Hitung jejak karbon menggunakan GHG Protocol</span>
                                    </div>
                                    <div class="process-step">
                                        <div class="process-badge">02</div>
                                        <span>Reduksi internal melalui efisiensi operasional</span>
                                    </div>
                                    <div class="process-step">
                                        <div class="process-badge">03</div>
                                        <span>Offset emisi residual dengan kredit karbon verified</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Impact & Net Zero -->
                <div class="impact-netzero-wrapper">
                    <div class="impact-stats-banner">
                        <div class="impact-stat">
                            <div class="impact-stat-number">2.6M</div>
                            <div class="impact-stat-label">Hektar Hutan Terlindungi</div>
                        </div>
                        <div class="impact-stat-divider"></div>
                        <div class="impact-stat">
                            <div class="impact-stat-number">450K</div>
                            <div class="impact-stat-label">Ton CO₂ Dikurangi</div>
                        </div>
                        <div class="impact-stat-divider"></div>
                        <div class="impact-stat">
                            <div class="impact-stat-number">150+</div>
                            <div class="impact-stat-label">Perusahaan Berpartisipasi</div>
                        </div>
                    </div>

                    <div class="netzero-banner-final">
                        <div class="netzero-icon-final">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z"/>
                            </svg>
                        </div>
                        <div class="netzero-content-final">
                            <h4 class="netzero-title-final">Indonesia Berkomitmen: Net Zero 2060</h4>
                            <p class="netzero-text-final">Target Indonesia mencapai net zero emission membutuhkan kontribusi semua sektor. Carbon offset menjadi jembatan penting menuju ekonomi rendah karbon yang berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-line"></div>
    </div>

    <!-- Section 3: Apa itu CAMAR - Centered Title -->
    <section class="about-camar-dynamic" id="tentang">
        <div class="container">
            <!-- Centered Header -->
            <div class="row mb-5">
                <div class="col-lg-10 mx-auto text-center">
                    <div class="content-badge-center">
                        <span class="badge-dot"></span>
                        Platform Terpercaya
                    </div>
                    <h2 class="content-title-center">Apa itu CAMAR?</h2>
                </div>
            </div>

            <!-- Content Row with Divider -->
            <div class="row g-5 align-items-start position-relative">
                <!-- Left Content -->
                <div class="col-lg-6 order-lg-1 order-1">
                    <div class="about-content-main">
                        <div class="content-text">
                            <p class="lead-text">
                                <strong>CAMAR (CArbon MARket Indonesia)</strong> adalah platform marketplace carbon offset terpercaya yang menghubungkan perusahaan dengan proyek pengurangan emisi terverifikasi untuk masa depan berkelanjutan.
                            </p>
                            
                            <p>
                                Kami memfasilitasi aksi iklim nyata melalui platform yang transparan dan mudah diakses. Setiap proyek di CAMAR telah diverifikasi oleh standar internasional seperti <strong>Gold Standard</strong> dan <strong>Verra VCS</strong>, memastikan dampak nyata dalam pengurangan emisi karbon.
                            </p>
                            
                            <p>
                                Dengan teknologi terkini, kami memberikan transparansi penuh mulai dari pembelian hingga monitoring dampak carbon offset secara real-time. Platform kami mendukung berbagai jenis proyek berkelanjutan di seluruh Indonesia, dari reforestasi hingga energi terbarukan.
                            </p>
                        </div>

                        <!-- Key Points -->
                        <div class="key-points">
                            <div class="key-point-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z"/>
                                </svg>
                                <span>100% Proyek Terverifikasi Internasional</span>
                            </div>
                            <div class="key-point-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z"/>
                                </svg>
                                <span>Dashboard Monitoring Real-time</span>
                            </div>
                            <div class="key-point-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z"/>
                                </svg>
                                <span>Mendukung Target Net-Zero 2060 Indonesia</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: 2 Images Stacked -->
                <div class="col-lg-6 order-lg-2 order-2">
                    <div class="camar-images-stacked">
                        <div class="camar-image-top">
                            <img src="{{ asset('images/camar-about-1.png') }}" alt="CAMAR Platform" class="img-fluid rounded-4">
                        </div>
                        <div class="camar-image-bottom">
                            <img src="{{ asset('images/camar-about-2.png') }}" alt="CAMAR Features" class="img-fluid rounded-4">
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons Below (Mobile: after images) -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="content-cta-center">
                        <a href="{{ route('register') }}" class="btn-dynamic-primary">
                            Mulai Sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/>
                            </svg>
                        </a>
                        <a href="#proyek" class="btn-dynamic-outline">Lihat Proyek</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-line"></div>
    </div>

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
                            <img src="{{ asset('images/project-mangrove.jpg') }}" alt="Rehabilitasi Mangrove">
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
                            <img src="{{ asset('images/project-forest.jpg') }}" alt="Hutan Tropis">
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
                            <img src="{{ asset('images/project-energy.jpg') }}" alt="Energi Terbarukan">
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
                            <img src="{{ asset('images/project-peat.jpg') }}" alt="Gambut">
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
                                Pemulihan ekosistem lahan gambut yang terdegradasi seluas 300 hektar untuk mencegah kebakaran dan emisi karbon.
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
                            <img src="{{ asset('images/project-community.jpg') }}" alt="Community">
                            <span class="project-category">Pemberdayaan</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Komunitas Hijau Indonesia</div>
                            <h3 class="project-name">Agroforestri Berbasis Komunitas</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>30 Bulan</span>
                            </div>
                            <p class="project-description">
                                Program agroforestri yang melibatkan 500 petani untuk meningkatkan tutupan hijau sekaligus kesejahteraan ekonomi.
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
                            <img src="{{ asset('images/project-ocean.jpg') }}" alt="Ocean">
                            <span class="project-category">Laut Biru</span>
                        </div>
                        <div class="project-info">
                            <div class="project-company">Ocean Conservation Network</div>
                            <h3 class="project-name">Konservasi Terumbu Karang</h3>
                            <div class="project-duration">
                                <span>📅</span>
                                <span>36 Bulan</span>
                            </div>
                            <p class="project-description">
                                Restorasi dan perlindungan terumbu karang di kawasan Kepulauan Seribu untuk biodiversitas laut dan carbon sink.
                            </p>
                            <div class="project-footer">
                                <div class="project-price">Rp 340K<span>/ton CO₂</span></div>
                                <button class="btn-project-detail">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider">
        <div class="divider-line"></div>
    </div>

    <!-- Section 5: Layanan Kami -->
    <section class="services-section py-5" id="layanan">
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

@endsection

@push('scripts')
<script src="{{ asset('js/landing.js') }}"></script>
@endpush