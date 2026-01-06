@extends('Buyer.layout.app')

@section('title', 'Kebijakan - CAMAR')

@section('page-title', 'Kebijakan')
@section('page-subtitle', 'Kebijakan carbon offset Anda')

@section('Buyer.content')
<div class="container-fluid py-4">
    
    <!-- PAGE HEADER -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="card-title h4 fw-bold mb-3">
                <i class="bi bi-shield-check me-2"></i>Kebijakan Platform
            </h2>
            <p class="text-muted mb-0">
                Halaman ini menjelaskan ketentuan penggunaan, kebijakan privasi, serta disclaimer terkait
                layanan carbon offset yang tersedia di platform CAMAR.
            </p>
        </div>
    </div>

    <!-- 1. KETENTUAN PENGGUNAAN -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h3 class="section-title">
                <i class="bi bi-file-text text-primary me-2"></i>Ketentuan Penggunaan
            </h3>
            
            <div class="policy-content">
                <p class="policy-intro">
                    Dengan menggunakan platform CAMAR, Anda menyetujui untuk mematuhi ketentuan-ketentuan berikut:
                </p>

                <ul class="policy-list">
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Platform ini digunakan untuk melakukan perhitungan, pembelian, dan pengelolaan carbon offset.
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Pengguna bertanggung jawab penuh atas kebenaran dan keakuratan data yang dimasukkan ke dalam sistem.
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Dilarang menggunakan platform untuk aktivitas yang melanggar hukum, menyesatkan, atau merugikan pihak lain.
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Platform berhak menangguhkan atau menghentikan akses akun apabila ditemukan pelanggaran ketentuan penggunaan.
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Pengguna wajib menjaga kerahasiaan kredensial akun dan bertanggung jawab atas semua aktivitas yang terjadi di bawah akun mereka.
                    </li>
                    <li>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Platform dapat melakukan perubahan terhadap layanan, fitur, atau kebijakan dengan pemberitahuan sebelumnya kepada pengguna.
                    </li>
                </ul>

                <div class="alert alert-info d-flex align-items-start mt-4">
                    <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                    <div>
                        <strong>Catatan Penting:</strong> Dengan melanjutkan penggunaan platform, Anda dianggap telah membaca, memahami, dan menyetujui seluruh ketentuan yang berlaku.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. KEBIJAKAN PRIVASI -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h3 class="section-title">
                <i class="bi bi-lock text-primary me-2"></i>Kebijakan Privasi
            </h3>
            
            <div class="policy-content">
                <p class="policy-intro">
                    CAMAR berkomitmen untuk melindungi privasi dan keamanan data pengguna. Berikut adalah kebijakan kami terkait pengumpulan dan penggunaan data:
                </p>

                <div class="privacy-section mb-4">
                    <h5 class="privacy-subtitle">
                        <i class="bi bi-database text-info me-2"></i>Data yang Kami Kumpulkan
                    </h5>
                    <ul class="policy-list">
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Informasi akun perusahaan (nama, NIB, NPWP, alamat, kontak)
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Data transaksi pembelian carbon offset
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Data perhitungan emisi dan laporan yang diunggah
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Log aktivitas dan penggunaan platform
                        </li>
                    </ul>
                </div>

                <div class="privacy-section mb-4">
                    <h5 class="privacy-subtitle">
                        <i class="bi bi-gear text-info me-2"></i>Penggunaan Data
                    </h5>
                    <ul class="policy-list">
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Data digunakan untuk keperluan operasional platform dan pelaporan carbon offset
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Meningkatkan kualitas layanan dan pengalaman pengguna
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Komunikasi terkait transaksi, laporan proyek, dan pembaruan sistem
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Analisis statistik untuk pengembangan platform (data teranonim)
                        </li>
                    </ul>
                </div>

                <div class="privacy-section mb-4">
                    <h5 class="privacy-subtitle">
                        <i class="bi bi-shield-lock text-info me-2"></i>Keamanan Data
                    </h5>
                    <ul class="policy-list">
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Platform tidak menjual atau membagikan data pengguna kepada pihak ketiga tanpa persetujuan
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Data pengguna disimpan dengan sistem keamanan yang wajar untuk melindungi dari akses tidak sah
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Enkripsi data sensitif menggunakan standar industri (SSL/TLS)
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            Akses ke data pengguna dibatasi hanya untuk personel yang berwenang
                        </li>
                    </ul>
                </div>

                <div class="alert alert-success d-flex align-items-start">
                    <i class="bi bi-shield-check fs-4 me-3"></i>
                    <div>
                        <strong>Komitmen Privasi:</strong> Kami menghormati hak privasi Anda dan memastikan data Anda dikelola sesuai dengan peraturan perlindungan data yang berlaku di Indonesia.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. DISCLAIMER CARBON OFFSET -->
    <div class="card mb-4 border-0 shadow-sm disclaimer-card">
        <div class="card-body p-4">
            <h3 class="section-title text-danger">
                <i class="bi bi-exclamation-triangle me-2"></i>Disclaimer Carbon Offset
            </h3>
            
            <div class="policy-content">
                <div class="alert alert-danger mb-4">
                    <div class="d-flex align-items-start">
                        <i class="bi bi-exclamation-octagon-fill fs-3 me-3"></i>
                        <div>
                            <h5 class="alert-heading fw-bold mb-2">PERNYATAAN PENTING</h5>
                            <p class="mb-0">
                                Harap membaca dan memahami disclaimer berikut dengan seksama sebelum melakukan pembelian carbon offset.
                            </p>
                        </div>
                    </div>
                </div>

                <ul class="policy-list disclaimer-list">
                    <li>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Carbon offset <strong>tidak menghilangkan emisi secara langsung</strong> pada saat transaksi dilakukan.
                    </li>
                    <li>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Realisasi pengurangan emisi dilakukan <strong>secara bertahap</strong> sesuai dengan ketentuan dan progres proyek.
                    </li>
                    <li>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Sertifikat carbon offset diterbitkan <strong>berdasarkan realisasi dan verifikasi</strong> proyek terkait, bukan saat pembelian.
                    </li>
                    <li>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Platform tidak menjamin pencapaian klaim <em>net-zero</em> secara instan atau langsung setelah pembelian.
                    </li>
                    <li>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Waktu realisasi dapat bervariasi tergantung jenis proyek dan kondisi lapangan (umumnya 3-12 bulan atau lebih).
                    </li>
                    <li>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Carbon offset adalah alat <strong>kompensasi</strong>, bukan pengganti untuk mengurangi emisi langsung dari operasional perusahaan.
                    </li>
                </ul>

                <div class="best-practice-box">
                    <h5 class="text-primary mb-3">
                        <i class="bi bi-lightbulb-fill me-2"></i>Praktik Terbaik (Best Practice)
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="practice-item">
                                <div class="practice-number">1</div>
                                <div>
                                    <h6 class="fw-bold mb-1">REDUCE</h6>
                                    <p class="mb-0 small">Kurangi emisi langsung dari operasional perusahaan Anda sebagai prioritas utama</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="practice-item">
                                <div class="practice-number">2</div>
                                <div>
                                    <h6 class="fw-bold mb-1">OFFSET</h6>
                                    <p class="mb-0 small">Kompensasi emisi yang tidak dapat dihindari dengan carbon offset terverifikasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-4">
                    <div class="d-flex align-items-start">
                        <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                        <div>
                            <strong>Catatan:</strong> Carbon offset adalah solusi untuk emisi yang tidak bisa dieliminasi, bukan pengganti pengurangan emisi langsung. Pendekatan terbaik adalah kombinasi dari pengurangan emisi (reduce) dan kompensasi emisi (offset).
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. HAK DAN KEWAJIBAN -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h3 class="section-title">
                <i class="bi bi-balance-scale text-primary me-2"></i>Hak dan Kewajiban Pengguna
            </h3>
            
            <div class="policy-content">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="rights-box">
                            <h5 class="mb-3">
                                <i class="bi bi-hand-thumbs-up text-success me-2"></i>Hak Pengguna
                            </h5>
                            <ul class="policy-list">
                                <li>
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Mendapatkan informasi yang jelas dan transparan tentang proyek carbon offset
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Menerima laporan berkala tentang realisasi proyek yang dibeli
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Mendapatkan sertifikat setelah offset diverifikasi dan direalisasikan
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Mengakses data dan riwayat transaksi kapan saja
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-success me-2"></i>
                                    Mendapatkan dukungan teknis dari tim CAMAR
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="obligations-box">
                            <h5 class="mb-3">
                                <i class="bi bi-clipboard-check text-warning me-2"></i>Kewajiban Pengguna
                            </h5>
                            <ul class="policy-list">
                                <li>
                                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                    Memberikan data yang akurat dan benar saat perhitungan emisi
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                    Melakukan pembayaran sesuai dengan jumlah yang telah disepakati
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                    Menjaga kerahasiaan akun dan tidak membagikan kredensial login
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                    Menggunakan platform sesuai dengan ketentuan yang berlaku
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                    Memahami bahwa offset bukan pengganti pengurangan emisi langsung
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5. PERUBAHAN KEBIJAKAN -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h3 class="section-title">
                <i class="bi bi-arrow-repeat text-primary me-2"></i>Perubahan Kebijakan
            </h3>
            
            <div class="policy-content">
                <p class="policy-intro">
                    CAMAR berhak untuk mengubah, menambah, atau mengurangi ketentuan dalam kebijakan ini sewaktu-waktu. Perubahan akan diberitahukan kepada pengguna melalui:
                </p>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="notification-method">
                            <i class="bi bi-envelope-fill text-primary fs-3 mb-2"></i>
                            <h6 class="fw-bold">Email</h6>
                            <p class="small text-muted mb-0">Notifikasi ke email terdaftar</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="notification-method">
                            <i class="bi bi-bell-fill text-primary fs-3 mb-2"></i>
                            <h6 class="fw-bold">Notifikasi Platform</h6>
                            <p class="small text-muted mb-0">Alert di dashboard pengguna</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="notification-method">
                            <i class="bi bi-megaphone-fill text-primary fs-3 mb-2"></i>
                            <h6 class="fw-bold">Pengumuman</h6>
                            <p class="small text-muted mb-0">Banner informasi di website</p>
                        </div>
                    </div>
                </div>

                <div class="alert alert-secondary mt-4 mb-0">
                    <i class="bi bi-calendar-check me-2"></i>
                    <strong>Terakhir Diperbarui:</strong> 1 Januari 2025 | 
                    <strong>Versi:</strong> 1.0
                </div>
            </div>
        </div>
    </div>

</div>
@endsection