@extends('Buyer.layout.app')

@section('title', 'Pusat Bantuan - CAMAR')

@section('page-title', 'Pusat Bantuan')
@section('page-subtitle', 'Pusat Bantuan carbon offset Anda')

@section('Buyer.content')
<div class="container-fluid py-4">
    
    <!-- SECTION 1: PERTANYAAN UMUM (FAQ) -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="card-title h4 fw-bold mb-3">
                <i class="bi bi-question-circle me-2"></i>Pertanyaan Umum (FAQ)
            </h2>
            <p class="text-muted mb-4">
                Pertanyaan yang paling sering ditanyakan oleh pengguna CAMAR
            </p>

            <div class="accordion" id="faqAccordion">
                
                <!-- FAQ 1 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            <i class="bi bi-chevron-right faq-icon me-3"></i>
                            <span class="fw-bold">Apa itu carbon offset?</span>
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Carbon offset adalah pengurangan emisi gas rumah kaca (CO₂e) yang dilakukan di satu tempat untuk mengkompensasi emisi yang dihasilkan di tempat lain. Dalam praktiknya, perusahaan atau individu dapat membeli carbon offset untuk menyeimbangkan jejak karbon mereka dengan mendukung proyek-proyek yang mengurangi atau menyerap emisi, seperti proyek energi terbarukan, reboisasi, atau konservasi hutan.</p>
                            <p class="mb-0"><strong>Contoh:</strong> Jika perusahaan Anda menghasilkan 100 ton CO₂e per tahun, Anda dapat membeli 100 ton carbon offset untuk menjadi "carbon neutral".</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            <i class="bi bi-chevron-right faq-icon me-3"></i>
                            <span class="fw-bold">Bagaimana cara membeli carbon offset?</span>
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Anda dapat membeli carbon offset melalui langkah-langkah berikut:</p>
                            <ol>
                                <li>Hitung emisi tahunan perusahaan Anda menggunakan fitur <strong>"Hitung Emisi"</strong> di menu Emisi</li>
                                <li>Jelajahi proyek carbon offset yang tersedia di <strong>Marketplace</strong></li>
                                <li>Pilih proyek yang sesuai dengan kebutuhan dan nilai perusahaan Anda</li>
                                <li>Tentukan jumlah ton CO₂e yang ingin Anda beli</li>
                                <li>Lakukan pembayaran dan tunggu konfirmasi transaksi</li>
                            </ol>
                            <div class="alert alert-success mb-0">
                                <i class="bi bi-lightbulb me-2"></i><strong>Tip:</strong> Pilih proyek yang sudah terverifikasi oleh standar internasional seperti VCS atau Gold Standard.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            <i class="bi bi-chevron-right faq-icon me-3"></i>
                            <span class="fw-bold">Bagaimana cara melihat laporan realisasi?</span>
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Untuk melihat laporan realisasi proyek carbon offset yang Anda beli:</p>
                            <ol>
                                <li>Buka menu <strong>"Riwayat Transaksi"</strong> di sidebar</li>
                                <li>Pilih transaksi yang ingin Anda lihat laporannya</li>
                                <li>Scroll ke bagian <strong>"Laporan Perkembangan Proyek"</strong></li>
                                <li>Klik tombol <strong>"📥 Unduh"</strong> untuk mengunduh laporan dalam format PDF</li>
                            </ol>
                            <p class="mb-0">Anda juga bisa mengakses semua laporan melalui menu <strong>"Laporan"</strong> untuk melihat daftar lengkap laporan dari semua transaksi Anda.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            <i class="bi bi-chevron-right faq-icon me-3"></i>
                            <span class="fw-bold">Kapan sertifikat diterbitkan?</span>
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Sertifikat carbon offset diterbitkan setelah proyek carbon offset yang Anda beli telah <strong>direalisasikan</strong> dan <strong>diverifikasi</strong> oleh auditor independen. Prosesnya meliputi:</p>
                            <ul>
                                <li><strong>Realisasi Proyek:</strong> Proyek berjalan dan menghasilkan pengurangan emisi nyata (umumnya 3-12 bulan)</li>
                                <li><strong>Verifikasi:</strong> Auditor independen memverifikasi data realisasi (1-2 bulan)</li>
                                <li><strong>Penerbitan Sertifikat:</strong> Setelah verifikasi selesai, sertifikat diterbitkan dan dapat Anda unduh</li>
                            </ul>
                            <div class="alert alert-warning mb-0">
                                <i class="bi bi-exclamation-triangle me-2"></i><strong>Penting:</strong> Carbon offset tidak langsung tersertifikasi setelah pembelian. Dibutuhkan waktu untuk proyek berjalan dan diverifikasi.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            <i class="bi bi-chevron-right faq-icon me-3"></i>
                            <span class="fw-bold">Apakah offset langsung mengurangi emisi?</span>
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Carbon offset <strong>tidak langsung mengurangi emisi</strong> perusahaan Anda secara fisik. Sebaliknya, offset bekerja dengan cara:</p>
                            <ul>
                                <li><strong>Mengkompensasi emisi:</strong> Anda mendukung proyek yang mengurangi atau menyerap emisi di tempat lain dalam jumlah yang setara</li>
                                <li><strong>Mencapai net-zero:</strong> Emisi Anda dikompensasi sehingga total dampak terhadap lingkungan menjadi nol (carbon neutral)</li>
                            </ul>
                            <div class="alert alert-info mb-0">
                                <i class="bi bi-lightbulb-fill me-2"></i><strong>Praktik Terbaik:</strong><br>
                                1. <strong>Reduce</strong> - Kurangi emisi langsung dari operasional Anda<br>
                                2. <strong>Offset</strong> - Kompensasi emisi yang tidak dapat dihindari dengan carbon offset<br><br>
                                Carbon offset adalah solusi untuk emisi yang tidak bisa dieliminasi, bukan pengganti pengurangan emisi langsung.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SECTION 2: PANDUAN PENGGUNAAN -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="card-title h4 fw-bold mb-3">
                <i class="bi bi-book me-2"></i>Panduan Penggunaan
            </h2>
            <p class="text-muted mb-4">
                Panduan step-by-step menggunakan fitur-fitur CAMAR
            </p>

            <div class="row g-4">
                
                <!-- Guide 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="guide-card">
                        <div class="guide-icon">🧮</div>
                        <h5 class="guide-title">Cara Menghitung Emisi</h5>
                        <ol class="guide-steps">
                            <li>Buka menu <strong>Emisi → Hitung Emisi</strong></li>
                            <li>Pilih tahun perhitungan dan metodologi</li>
                            <li>Masukkan data Scope 1 (bahan bakar) dan Scope 2 (listrik)</li>
                            <li>Opsional: Aktifkan Scope 3 jika ada data transportasi/limbah</li>
                            <li>Klik <strong>"✓ Simpan Perhitungan"</strong></li>
                        </ol>
                        <div class="guide-tip">
                            <i class="bi bi-lightbulb me-2"></i>Hasil perhitungan otomatis tersimpan di Catatan Perhitungan
                        </div>
                    </div>
                </div>

                <!-- Guide 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="guide-card">
                        <div class="guide-icon">🛒</div>
                        <h5 class="guide-title">Cara Membeli Carbon Offset</h5>
                        <ol class="guide-steps">
                            <li>Dari Dashboard, klik <strong>"+ Beli Offset Baru"</strong></li>
                            <li>Jelajahi proyek yang tersedia di Marketplace</li>
                            <li>Pilih proyek yang sesuai dengan kebutuhan Anda</li>
                            <li>Tentukan jumlah ton CO₂e yang ingin dibeli</li>
                            <li>Lakukan pembayaran dan tunggu konfirmasi</li>
                        </ol>
                        <div class="guide-tip">
                            <i class="bi bi-lightbulb me-2"></i>Pilih proyek dengan standar verifikasi VCS atau Gold Standard
                        </div>
                    </div>
                </div>

                <!-- Guide 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="guide-card">
                        <div class="guide-icon">📊</div>
                        <h5 class="guide-title">Cara Membaca Laporan Realisasi</h5>
                        <ol class="guide-steps">
                            <li>Buka menu <strong>Riwayat Transaksi</strong></li>
                            <li>Pilih transaksi yang ingin dilihat</li>
                            <li>Cek bagian <strong>"Progres Realisasi Offset"</strong></li>
                            <li>Lihat persentase realisasi dan jumlah yang sudah direalisasi</li>
                            <li>Unduh laporan detail dengan klik tombol <strong>"📥 Unduh"</strong></li>
                        </ol>
                        <div class="guide-tip">
                            <i class="bi bi-lightbulb me-2"></i>Realisasi dilakukan bertahap sesuai jalannya proyek
                        </div>
                    </div>
                </div>

                <!-- Guide 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="guide-card">
                        <div class="guide-icon">📜</div>
                        <h5 class="guide-title">Cara Mengunduh Sertifikat</h5>
                        <ol class="guide-steps">
                            <li>Buka menu <strong>Sertifikat</strong> di sidebar</li>
                            <li>Pilih sertifikat yang ingin diunduh</li>
                            <li>Klik tombol <strong>"📥 Unduh Sertifikat PDF"</strong></li>
                            <li>Sertifikat akan terdownload dalam format PDF</li>
                            <li>Anda dapat mencetak atau membagikan sertifikat tersebut</li>
                        </ol>
                        <div class="guide-tip">
                            <i class="bi bi-lightbulb me-2"></i>Sertifikat hanya tersedia setelah offset diverifikasi
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SECTION 3: ISTILAH CARBON OFFSET (GLOSARIUM) -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body p-4">
            <h2 class="card-title h4 fw-bold mb-3">
                <i class="bi bi-journal-text me-2"></i>Istilah Carbon Offset (Glosarium)
            </h2>
            <p class="text-muted mb-4">
                Memahami istilah-istilah dasar dalam carbon offset
            </p>

            <div class="row g-3">
                
                <!-- Term 1 -->
                <div class="col-12">
                    <div class="glossary-item">
                        <div class="glossary-term">
                            <span class="glossary-icon">🌱</span>
                            Carbon Offset
                        </div>
                        <div class="glossary-definition">
                            Pengurangan emisi gas rumah kaca yang dilakukan untuk mengkompensasi emisi yang dihasilkan di tempat lain. Satu carbon offset setara dengan pengurangan satu ton CO₂e. Carbon offset dapat dibeli untuk mencapai carbon neutrality.
                        </div>
                    </div>
                </div>

                <!-- Term 2 -->
                <div class="col-12">
                    <div class="glossary-item">
                        <div class="glossary-term">
                            <span class="glossary-icon">💨</span>
                            Emisi CO₂e (Carbon Dioxide Equivalent)
                        </div>
                        <div class="glossary-definition">
                            Satuan standar untuk mengukur jejak karbon dari berbagai gas rumah kaca. CO₂e mengkonversi dampak dari berbagai gas (CO₂, CH₄, N₂O, dll.) menjadi satu satuan setara CO₂ untuk memudahkan perhitungan dan perbandingan.
                            <div class="mt-2">
                                <span class="badge bg-info">Contoh: 1 ton metana (CH₄) = 25 ton CO₂e</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Term 3 -->
                <div class="col-12">
                    <div class="glossary-item">
                        <div class="glossary-term">
                            <span class="glossary-icon">⚙️</span>
                            Realisasi
                        </div>
                        <div class="glossary-definition">
                            Proses pelaksanaan proyek carbon offset yang menghasilkan pengurangan emisi nyata. Realisasi dilakukan secara bertahap sesuai dengan timeline proyek. Setelah direalisasikan, carbon offset dapat diverifikasi dan disertifikasi.
                            <div class="mt-2">
                                <span class="badge bg-secondary">Timeline: Biasanya membutuhkan 3-12 bulan tergantung jenis proyek</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Term 4 -->
                <div class="col-12">
                    <div class="glossary-item">
                        <div class="glossary-term">
                            <span class="glossary-icon">🔒</span>
                            Retired Offset
                        </div>
                        <div class="glossary-definition">
                            Carbon offset yang sudah "dipensiunkan" atau ditarik dari pasar untuk digunakan sebagai kompensasi emisi. Setelah di-retire, offset tidak dapat diperjualbelikan lagi dan secara resmi diklaim oleh pembeli sebagai pengurangan emisi mereka.
                            <div class="alert alert-success mt-2 mb-0">
                                <i class="bi bi-check-circle me-2"></i><strong>Status Retired</strong> menunjukkan offset telah digunakan dan tidak bisa double-counted
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Term 5 -->
                <div class="col-12">
                    <div class="glossary-item">
                        <div class="glossary-term">
                            <span class="glossary-icon">📜</span>
                            Sertifikat Offset
                        </div>
                        <div class="glossary-definition">
                            Dokumen resmi yang diterbitkan setelah carbon offset direalisasikan dan diverifikasi oleh auditor independen. Sertifikat berisi informasi detail tentang proyek, jumlah CO₂e yang dikompensasi, periode realisasi, dan standar verifikasi yang digunakan (VCS, Gold Standard, dll.).
                            <div class="mt-2">
                                <span class="badge bg-warning text-dark">Fungsi: Bukti sah bahwa perusahaan telah melakukan carbon offset</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- SECTION 4: HUBUNGI KAMI -->
    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, var(--color-light) 0%, #E8F5E9 100%);">
        <div class="card-body p-4">
            <h2 class="card-title h4 fw-bold mb-3">
                <i class="bi bi-telephone me-2"></i>Hubungi Kami
            </h2>
            <p class="text-muted mb-4">
                Tidak menemukan jawaban yang Anda cari? Tim kami siap membantu Anda
            </p>

            <div class="row g-4">
                
                <!-- Email Support -->
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">📧</div>
                        <h5 class="contact-title">Email Bantuan</h5>
                        <a href="mailto:support@camar.co.id" class="contact-link">support@camar.co.id</a>
                        <p class="contact-desc">
                            Kirim pertanyaan Anda via email dan kami akan merespons dalam 1-2 hari kerja
                        </p>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">🕐</div>
                        <h5 class="contact-title">Jam Operasional</h5>
                        <div class="operational-hours">
                            <div class="hour-item">
                                <span class="fw-bold">Senin - Jumat</span>
                                <span>09:00 - 17:00 WIB</span>
                            </div>
                            <div class="hour-item">
                                <span class="fw-bold">Sabtu</span>
                                <span>09:00 - 13:00 WIB</span>
                            </div>
                            <div class="hour-item">
                                <span class="fw-bold">Minggu & Libur</span>
                                <span class="text-danger">Tutup</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Waktu Respon -->
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">⏱️</div>
                        <h5 class="contact-title">Waktu Respon</h5>
                        <div class="response-times">
                            <div class="response-item">
                                <i class="bi bi-envelope me-2"></i>
                                <div>
                                    <div class="fw-bold">Email</div>
                                    <small>1-2 hari kerja</small>
                                </div>
                            </div>
                            <div class="response-item">
                                <i class="bi bi-bell me-2"></i>
                                <div>
                                    <div class="fw-bold">Notifikasi Platform</div>
                                    <small>Real-time</small>
                                </div>
                            </div>
                        </div>
                        <p class="contact-desc text-muted fst-italic">
                            Kami berusaha merespons secepat mungkin
                        </p>
                    </div>
                </div>

            </div>

            <!-- Tips -->
            <div class="alert alert-info mt-4 mb-0">
                <div class="d-flex">
                    <div class="me-3">
                        <i class="bi bi-lightbulb-fill fs-3"></i>
                    </div>
                    <div>
                        <h6 class="alert-heading fw-bold">Tips Menghubungi Kami</h6>
                        <ul class="mb-0">
                            <li>Sertakan <strong>nomor transaksi</strong> atau <strong>ID akun</strong> untuk respon lebih cepat</li>
                            <li>Jelaskan masalah Anda dengan detail dan lampirkan screenshot jika perlu</li>
                            <li>Cek folder spam jika tidak menerima balasan email dari kami</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
