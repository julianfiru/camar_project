<div id="updateModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header px-4 py-3">
                <div>
                    <h5 class="modal-title fw-bold">Edit Produk Carbon Offset</h5>
                    <small class="text-muted" id="modal_project_name"></small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('seller.project.updating') }}" class="modal-body px-4 py-3" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="input_project_id_upload">
                <div class="detail-section mb-4">
                    <h6 class="fw-semibold mb-3">Informasi Produk</h6>

                    <div class="form-group">
                        <label class="form-label">Nama Produk:</label>
                        <span class="form-input ms-2 w-100" id="modal_project_name1"></span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-input bg-light" id="modal_project_sku" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Kategori</label>
                                <select class="form-input" id="modal_project_type">
                                    @foreach($categories as $cat)
                                        {{-- Ganti $cat->id menjadi $cat->category_id --}}
                                        <option value="{{ $cat->category_id }}">
                                            {{ $cat->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Harga -->
                <div class="detail-section mb-4">
                    <h6 class="fw-semibold mb-3">Harga</h6>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Harga per tCO2e (Rp)</label>
                                <input type="number" class="form-input" id="modal_project_price">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea class="form-textarea" id="modal_project_desc" rows="4"></textarea>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Keluar
                    </button>
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
