<form id="uploadForm" action="{{ route('seller.upload.document') }}" method="POST" enctype="multipart/form-data" style="display: none;">
    @csrf
    <div class="upload-card p-4">
        <h5 class="fw-bold mb-3" style="color: var(--navy);">Upload Laporan</h5>
        <div class="mb-3 text-start">
            <label for="document_category" class="form-label small fw-bold" style="color: var(--navy);">Jenis Dokumen</label>
            <select class="form-select" name="document_category" id="document_category" required>
                <option value="" selected disabled>-- Pilih Jenis Dokumen --</option>
                @foreach(getDocumentCategories() as $groupKey => $group)
                    <optgroup label="{{ $group['label'] }}">
                        @foreach($group['items'] as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="upload-area text-center p-4 mb-3" 
            id="uploadArea" 
            onclick="document.getElementById('fileInput').click()" 
            style="cursor: pointer;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin: 0 auto 12px;">
                <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#67C090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17 8L12 3L7 8" stroke="#67C090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 3V15" stroke="#67C090" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h6 class="fw-semibold mb-2" style="color: var(--navy);">Pilih file atau drag & drop</h6>
            <p class="small text-muted mb-0">Format: PDF, DOC, DOCX (Maks. 10MB)</p>
        </div>
        <input type="file" 
            id="fileInput" 
            name="document_file" 
            class="d-none" 
            accept=".pdf,.doc,.docx" 
            onchange="handleFileSelect(event)">
        <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-keluar" onclick="hideUploadCard()">
                Keluar
            </button>
            <button type="button" class="btn btn-lanjutkan" id="btnLanjutkan" onclick="handleSubmit()" disabled>
                Lanjutkan
            </button>
        </div>
    </div>
</form>