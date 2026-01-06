@extends('Seller.layout.app')
@section('title', 'CAMAR - Penjualan')
@section('page-title', 'Penjualan Carbon Offset')
@section('page-subtitle', 'Kelola produk carbon offset yang dijual di marketplace')
@section('content')
    <div class="bs mb-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex flex-wrap gap-3">
                <button class="btn fw-bold btn-sm bdc-green active" data-filter="all">Semua (145)</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="active">Peluang Produk Baru (2)</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="pending">Tinjau Rincian Produk (126)</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="completed">Tambah Stok (26)</button>
                <button class="btn fw-bold btn-sm bdc-green" data-filter="cancelled">Dibatalkan (1)</button>
            </div>
        </div>
    </div>
    <div class="bs mb-4">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <button class="btn fw-bold btn-sm bdc-green" data-filter="all">Atur ulang</button>
            <button class="btn fw-bold btn-sm bdc-green" data-filter="active">Selengkapnya</button>
        </div>
        <div class="d-flex flex-wrap gap-3">
            <input type="text" class="form-input input" placeholder="Cari Nama Produk, SKU Induk, Kode Variasi...">
            <select class="form-input stat-value w-25">
                <option class="stat-value">Kategori</option>
                <option class="stat-value">Solar Energy</option>
                <option class="stat-value">Wind Power</option>
                <option class="stat-value">Hydropower</option>
                <option class="stat-value">Forestry</option>
            </select>
            <select class="form-input stat-value w-25">
                <option class="stat-value">Performa Produk</option>
                <option class="stat-value">Penjualan Tinggi</option>
                <option class="stat-value">Penjualan Rendah</option>
            </select>
            <button class="btn text-white basefont fw-bold btn-sm px-3 bgc-green">Terapkan</button>
        </div>
    </div>
                <!-- Products List -->
                <div class="bs">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <h3 style="color: var(--navy); font-size: 1.1rem;">145 Produk Carbon Offset</h3>
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <span style="color: var(--gray); font-size: 0.875rem;">Urutkan berdasarkan Rekomendasi</span>
                            <button class="bdc-green border-0 rounded-3">
                                <svg class="mb-1" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </button>
                            <button class="bdc-green border-0 rounded-3">
                                <svg class="mb-1" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h12a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Performa</th>
                                <th>Analisis Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="salesTableBody">
                            <tr data-product-id="1">
                                <td>
                                    <div style="display: flex; gap: 1rem; align-items: center;">
                                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Crect fill='%2367C090' width='60' height='60'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='24' font-family='Arial'%3E☀️%3C/text%3E%3C/svg%3E" style="width: 60px; height: 60px; border-radius: 8px;">
                                        <div>
                                            <h4 style="color: var(--navy); margin-bottom: 0.25rem;">Solar Farm Jawa Barat - Batch A</h4>
                                            <p style="color: var(--gray); font-size: 0.875rem; margin-bottom: 0.25rem;">SKU: SFJB-2024-A</p>
                                            <p style="color: var(--gray); font-size: 0.875rem;">ID Produk: 51651960737</p>
                                            <span class="status-badge" style="font-size: 0.75rem; padding: 0.25rem 0.5rem; margin-top: 0.25rem;">Perlu Dilakukan</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: var(--navy);">Rp 180,000</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">per tCO2e</div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: var(--navy);">2,450</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">tCO2e</div>
                                </td>
                                <td>
                                    <div style="margin-bottom: 0.25rem;">
                                        <span style="font-size: 0.875rem; color: var(--gray);">Penjualan:</span>
                                        <span style="font-weight: 600; color: var(--navy);"> 850 tCO2e</span>
                                    </div>
                                    <div style="margin-bottom: 0.25rem;">
                                        <span style="font-size: 0.875rem; color: var(--gray);">Kunjungan:</span>
                                        <span style="font-weight: 600; color: var(--navy);"> 2.1k</span>
                                    </div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">Penjualan 30 Hari: 0</div>
                                </td>
                                <td>
                                    <div style="color: #f39c12; font-weight: 600; margin-bottom: 0.25rem;">Peluang Produk Baru</div>
                                    <div style="display: flex; align-items: center; gap: 0.25rem; margin-bottom: 0.25rem;">
                                        <span style="width: 8px; height: 8px; background: var(--green); border-radius: 50%;"></span>
                                        <span style="font-size: 0.875rem; color: var(--gray);">Perlu Dilakukan</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 0.25rem;">
                                        <span style="width: 8px; height: 8px; background: var(--green); border-radius: 50%;"></span>
                                        <span style="font-size: 0.875rem; color: var(--gray);">Kunjungan Produk Baru Ditingkatkan</span>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem; width: 100%; margin-bottom: 0.5rem;" onclick="showProductDetail(1)">Ubah</button>
                                    <button class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem; width: 100%; color: var(--teal); border-color: var(--teal);" onclick="showProductHistory(1)">Lainnya</button>
                                </td>
                            </tr>
                            <tr data-product-id="2">
                                <td>
                                    <div style="display: flex; gap: 1rem; align-items: center;">
                                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Crect fill='%2326667F' width='60' height='60'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='24' font-family='Arial'%3E💨%3C/text%3E%3C/svg%3E" style="width: 60px; height: 60px; border-radius: 8px;">
                                        <div>
                                            <h4 style="color: var(--navy); margin-bottom: 0.25rem;">Wind Energy Sulawesi - Batch B</h4>
                                            <p style="color: var(--gray); font-size: 0.875rem; margin-bottom: 0.25rem;">SKU: WESUL-2024-B</p>
                                            <p style="color: var(--gray); font-size: 0.875rem;">ID Produk: 51651960738</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: var(--navy);">Rp 195,000</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">per tCO2e</div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: var(--navy);">3,200</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">tCO2e</div>
                                </td>
                                <td>
                                    <div style="margin-bottom: 0.25rem;">
                                        <span style="font-size: 0.875rem; color: var(--gray);">Penjualan:</span>
                                        <span style="font-weight: 600; color: var(--navy);"> 1,200 tCO2e</span>
                                    </div>
                                    <div style="margin-bottom: 0.25rem;">
                                        <span style="font-size: 0.875rem; color: var(--gray);">Kunjungan:</span>
                                        <span style="font-weight: 600; color: var(--navy);"> 3.5k</span>
                                    </div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">Penjualan 30 Hari: 0</div>
                                </td>
                                <td>
                                    <div style="color: var(--green); font-weight: 600; margin-bottom: 0.25rem;">Performa Baik</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">Penjualan stabil</div>
                                </td>
                                <td>
                                    <button class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem; width: 100%; margin-bottom: 0.5rem;" onclick="showProductDetail(2)">Ubah</button>
                                    <button class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem; width: 100%; color: var(--teal); border-color: var(--teal);" onclick="showProductHistory(2)">Lainnya</button>
                                </td>
                            </tr>
                            <tr data-product-id="3">
                                <td>
                                    <div style="display: flex; gap: 1rem; align-items: center;">
                                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60'%3E%3Crect fill='%23124170' width='60' height='60'/%3E%3Ctext x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' fill='white' font-size='24' font-family='Arial'%3E💧%3C/text%3E%3C/svg%3E" style="width: 60px; height: 60px; border-radius: 8px;">
                                        <div>
                                            <h4 style="color: var(--navy); margin-bottom: 0.25rem;">Hydro Power Sumatra - Batch C</h4>
                                            <p style="color: var(--gray); font-size: 0.875rem; margin-bottom: 0.25rem;">SKU: HPSUM-2024-C</p>
                                            <p style="color: var(--gray); font-size: 0.875rem;">ID Produk: 51651960739</p>
                                            <span class="status-badge" style="font-size: 0.75rem; padding: 0.25rem 0.5rem; margin-top: 0.25rem; background: #e74c3c;">Stok Rendah</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: var(--navy);">Rp 190,000</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">per tCO2e</div>
                                </td>
                                <td>
                                    <div style="font-weight: 600; color: #e74c3c;">450</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">tCO2e</div>
                                </td>
                                <td>
                                    <div style="margin-bottom: 0.25rem;">
                                        <span style="font-size: 0.875rem; color: var(--gray);">Penjualan:</span>
                                        <span style="font-weight: 600; color: var(--navy);"> 2,550 tCO2e</span>
                                    </div>
                                    <div style="margin-bottom: 0.25rem;">
                                        <span style="font-size: 0.875rem; color: var(--gray);">Kunjungan:</span>
                                        <span style="font-weight: 600; color: var(--navy);"> 5.2k</span>
                                    </div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">Penjualan 30 Hari: 0</div>
                                </td>
                                <td>
                                    <div style="color: #e74c3c; font-weight: 600; margin-bottom: 0.25rem;">Perlu Tambah Stok</div>
                                    <div style="font-size: 0.875rem; color: var(--gray);">Permintaan tinggi</div>
                                </td>
                                <td>
                                    <button class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem; width: 100%; margin-bottom: 0.5rem;" onclick="showProductDetail(3)">Ubah</button>
                                    <button class="btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem; width: 100%; color: var(--teal); border-color: var(--teal);" onclick="showProductHistory(3)">Lainnya</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div style="display: flex; justify-content: center; align-items: center; gap: 0.5rem; margin-top: 2rem; padding-top: 1.5rem; border-top: 2px solid var(--gray-light);">
                        <button class="btn-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <button class="btn-icon" style="background: var(--green); color: var(--white);">1</button>
                        <button class="btn-icon">2</button>
                        <button class="btn-icon">3</button>
                        <button class="btn-icon">...</button>
                        <button class="btn-icon">15</button>
                        <button class="btn-icon">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
@endsection
@push('scripts')
@endpush