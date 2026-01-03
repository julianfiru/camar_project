<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tentang Kami - CAMAR">
    <title>Tentang Kami - CAMAR</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('resources/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/tentang.css') }}">
</head>
<body>
    <!-- Include Navbar -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <section class="tentang-hero">
        <div class="tentang-hero-bg">
            <img src="{{ asset('resources/images/forest0.png') }}" alt="About Us">
        </div>
        <div class="container">
            <div class="tentang-hero-content">
                <h1 class="tentang-hero-title">Tentang CAMAR</h1>
                <p class="tentang-hero-description">
                    Platform Carbon Offset terpercaya yang menghubungkan perusahaan dengan proyek pengurangan emisi terverifikasi untuk masa depan berkelanjutan
                </p>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- Mission & Vision Section -->
    <section class="mission-vision-section">
        <div class="container">
            <div class="row g-4">
                <!-- Mission -->
                <div class="col-lg-6">
                    <div class="mv-card mission-card">
                        <div class="mv-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h2 class="mv-title">Misi Kami</h2>
                        <p class="mv-text">
                            Memfasilitasi aksi iklim nyata melalui platform marketplace carbon offset yang transparan, terverifikasi, dan mudah diakses untuk perusahaan di Indonesia mencapai target Net-Zero emissions.
                        </p>
                        <ul class="mv-list">
                            <li><i class="fas fa-check-circle"></i> Menyediakan kredit karbon terverifikasi internasional</li>
                            <li><i class="fas fa-check-circle"></i> Mendukung proyek berkelanjutan lokal Indonesia</li>
                            <li><i class="fas fa-check-circle"></i> Transparansi penuh dalam setiap transaksi</li>
                        </ul>
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-lg-6">
                    <div class="mv-card vision-card">
                        <div class="mv-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h2 class="mv-title">Visi Kami</h2>
                        <p class="mv-text">
                            Menjadi platform carbon offset terdepan di Indonesia yang mengakselerasi transisi menuju ekonomi rendah karbon melalui solusi berbasis teknologi dan kemitraan strategis.
                        </p>
                        <ul class="mv-list">
                            <li><i class="fas fa-check-circle"></i> Indonesia Net-Zero 2060</li>
                            <li><i class="fas fa-check-circle"></i> Ekosistem karbon yang adil dan inklusif</li>
                            <li><i class="fas fa-check-circle"></i> Leadership dalam aksi iklim regional</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Nilai-Nilai Kami</h2>
                <p class="section-subtitle">Prinsip yang memandu setiap langkah kami</p>
            </div>

            <div class="values-grid">
                <!-- Value 1 -->
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="value-title">Integritas</h3>
                    <p class="value-text">
                        Hanya menyediakan kredit karbon yang terverifikasi oleh lembaga internasional (Verra, Gold Standard) dengan additionality terbukti.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="value-title">Transparansi</h3>
                    <p class="value-text">
                        Platform marketplace dengan pricing transparan, monitoring data real-time, dan full traceability dari proyek hingga retirement.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="value-title">Dampak Nyata</h3>
                    <p class="value-text">
                        Fokus pada proyek dengan co-benefits tinggi: biodiversity conservation, community empowerment, dan sustainable livelihoods.
                    </p>
                </div>

                <!-- Value 4 -->
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="value-title">Inovasi</h3>
                    <p class="value-text">
                        Menggunakan teknologi untuk streamline carbon market: AI-powered matching, blockchain registry, automated compliance.
                    </p>
                </div>

                <!-- Value 5 -->
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="value-title">Inklusivitas</h3>
                    <p class="value-text">
                        Melayani perusahaan segala ukuran, dari SME hingga korporasi, dengan minimum purchase mulai 1 ton CO₂.
                    </p>
                </div>

                <!-- Value 6 -->
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="value-title">Kolaborasi</h3>
                    <p class="value-text">
                        Partnership dengan project developers, verification bodies, regulators untuk membangun ekosistem carbon market yang robust.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Mengapa Memilih CAMAR?</h2>
                <p class="section-subtitle">Keunggulan platform kami untuk perjalanan Net-Zero Anda</p>
            </div>

            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="feature-number">01</div>
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="feature-title">Verified Carbon Credits</h3>
                        <p class="feature-text">
                            Semua kredit karbon telah diverifikasi oleh third-party verification bodies (VVB) terakreditasi dan terdaftar di registry internasional seperti Verra VCS dan Gold Standard.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="feature-number">02</div>
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Real-Time Dashboard</h3>
                        <p class="feature-text">
                            Pantau jejak karbon, track offset purchases, dan monitor impact metrics melalui dashboard interaktif dengan data visualization dan automated reporting.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="feature-number">03</div>
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h3 class="feature-title">Competitive Pricing</h3>
                        <p class="feature-text">
                            Transparent pricing ($5-50/ton CO₂) dengan comparison tools. Bulk discount tersedia untuk large purchases dan long-term contracts.
                        </p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="feature-number">04</div>
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-globe-asia"></i>
                        </div>
                        <h3 class="feature-title">Proyek Lokal Indonesia</h3>
                        <p class="feature-text">
                            Portfolio mencakup reforestation di Kalimantan, peatland restoration di Sumatera, renewable energy di Jawa, dan community-based conservation.
                        </p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="feature-number">05</div>
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <h3 class="feature-title">Compliance Support</h3>
                        <p class="feature-text">
                            Assistance untuk carbon accounting sesuai GHG Protocol, CDP disclosure, TCFD reporting, dan compliance dengan regulasi IDXCarbon.
                        </p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box">
                        <div class="feature-number">06</div>
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="feature-title">Dedicated Support</h3>
                        <p class="feature-text">
                            Tim expert siap membantu strategy development, project selection, dan ongoing support untuk memastikan carbon offset program sukses.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Divider -->
    <div class="section-divider-90"></div>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Pertanyaan umum tentang carbon offset dan platform CAMAR</p>
            </div>

            <div class="faq-accordion">
                <!-- FAQ 1 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Apa itu carbon offset dan bagaimana cara kerjanya?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Carbon offset adalah pengurangan emisi Gas Rumah Kaca (GRK) di satu tempat untuk mengkompensasi emisi yang dihasilkan di tempat lain. 1 kredit karbon = 1 ton CO₂ ekuivalen (tCO₂e) yang dikurangi atau diserap dari atmosfer melalui proyek seperti reforestasi, renewable energy, atau energy efficiency.</p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Berapa harga kredit karbon?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Harga bervariasi $5-50/ton CO₂ tergantung jenis proyek, co-benefits, lokasi, dan vintage. Proyek dengan high-quality verification dan SDG co-benefits (biodiversity, community jobs) cenderung premium. Platform kami menyediakan transparent pricing dan comparison tools.</p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Apakah kredit bisa kadaluarsa?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Kredit karbon tidak kadaluarsa, tetapi "vintage year" (tahun emission reduction terjadi) penting untuk reporting. Beberapa pembeli prefer recent vintages. Setelah dibeli, kredit harus di-retire (tidak bisa dijual lagi) untuk avoid double-counting.</p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Bagaimana memastikan no greenwashing?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pilih proyek dengan: (1) Third-party verification dari VVB terakreditasi, (2) Listing di registry internasional (Verra, Gold Standard), (3) Clear additionality proof, (4) Transparent monitoring data, (5) Stakeholder testimonials. Hindari proyek dengan claims tidak terverifikasi.</p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Bisakah SME/UKM beli offset?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Absolutely! Kami melayani perusahaan segala ukuran. Minimum purchase bisa serendah 1 ton CO₂ (~$10-20). Small businesses dapat offset emisi dari operasi kantor, business travel, atau product lifecycle untuk demonstrate climate leadership.</p>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Apakah offset cukup untuk Net-Zero?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Tidak. Science-Based Targets mengharuskan perusahaan reduce emisi min 90-95% melalui decarbonization. Offset hanya untuk remaining 5-10% residual emissions yang truly unavoidable. "Net-Zero" = deep cuts + high-quality offsets.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section-tentang">
        <div class="container text-center">
            <h2 class="cta-title">Siap Memulai Perjalanan Net-Zero?</h2>
            <p class="cta-description">
                Bergabunglah dengan ratusan perusahaan yang telah mempercayai CAMAR untuk offset carbon footprint mereka dan berkontribusi pada Indonesia yang lebih berkelanjutan.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('calculator') }}" class="btn btn-primary btn-cta">
                    <i class="fas fa-calculator"></i>
                    Hitung Emisi Anda
                </a>
                <a href="{{ route('projects') }}" class="btn btn-outline-light btn-cta">
                    <i class="fas fa-shopping-cart"></i>
                    Jelajahi Marketplace
                </a>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('resources/js/navbar.js') }}"></script>
    <script src="{{ asset('resources/js/tentang.js') }}"></script>
</body>
</html>