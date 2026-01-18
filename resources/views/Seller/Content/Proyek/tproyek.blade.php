
<div id="projectModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-bottom px-4 py-3">
                <div>
                    <h4 class="modal-title fw-bold" style="color: var(--navy);"><span id="modal_project_name"></span></h4>
                    <span class="badge px-3 ftc-white" id="modal_project_status"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <ul class="nav nav-tabs nav-justified px-3 pt-3 border-bottom-0 mb-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-semibold" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports" type="button" role="tab">Laporan MRV</button>
                    </li>
                </ul>
                <div class="tab-content p-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                        <div class="mb-4">
                            <h6 class="fw-bold border-start border-4 ps-2 mb-3" style="border-color: var(--green) !important; color: var(--navy);">Informasi Proyek</h6>
                            <div class="row g-3">
                                <div class="col-6 col-md-3">
                                    <div class="p-3 rounded-3 h-100" style="background-color: var(--gray-light);">
                                        <small class="text-muted d-block mb-1">Tipe Proyek</small>
                                        <span class="fw-bold" style="color: var(--navy);"><span id="modal_project_type"></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 rounded-3 h-100" style="background-color: var(--gray-light);">
                                        <small class="text-muted d-block mb-1">Lokasi</small>
                                        <span class="fw-bold" style="color: var(--navy);"><span id="modal_project_location"></span></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 rounded-3 h-100" style="background-color: var(--gray-light);">
                                        <small class="text-muted d-block mb-1">Mulai</small>
                                        <span class="fw-bold" style="color: var(--navy);"><span id="modal_project_date"></span></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="p-3 rounded-3 h-100" style="background-color: var(--gray-light);">
                                        <small class="text-muted d-block mb-1">Berakhir</small>
                                        <span class="fw-bold" style="color: var(--navy);">31 Des 2030</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6 class="fw-bold border-start border-4 ps-2 mb-3" style="border-color: var(--green) !important; color: var(--navy);">Kapasitas & Status</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="p-3 rounded-3 border border-1">
                                        <small class="text-muted">Total Carbon Credit</small>
                                        <div class="h5 mb-0 fw-bold mt-1" style="color: var(--navy);"><span id="modal_project_capacity"></span> tCO2e</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 rounded-3 border border-1" style="background: var(--mint);">
                                        <small style="color: var(--teal);">Credit Tersedia</small>
                                        <div class="h5 mb-0 fw-bold mt-1"><span id="modal_project_available"></span> tCO2e</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 rounded-3 border border-1" style="background: var(--mint);">
                                        <small style="color: var(--teal);">Credit Terjual</small>
                                        <div class="h5 mb-0 fw-bold mt-1" style="color: var(--green);"><span id="modal_project_order"></span> tCO2e</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 rounded-3 border border-1">
                                        <small class="text-muted">Total Revenue</small>
                                        <div class="h5 mb-0 fw-bold mt-1" style="color: var(--navy);">Rp <span id="modal_revenue"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reports" role="tabpanel">
                        <div id="modal_mrv_list">
                            </div>
                        <template id="mrv_card_template">
                            <div class="card mb-3 border shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded p-2" style="background: var(--mint); color: var(--teal);">
                                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path></svg>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold mrv-name" style="color: var(--navy);"></h6>
                                            <small class="text-muted mrv-info"></small>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge mrv-badge me-2"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>