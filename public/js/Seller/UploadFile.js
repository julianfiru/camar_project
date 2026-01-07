
let selectedFile = null;
function showUploadCard() {
    document.getElementById('uploadForm').style.display = 'block';
}
function hideUploadCard() {
    document.getElementById('uploadForm').style.display = 'none';
}
function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
        selectedFile = file;
        displayFileInfo(file);
    }
}
function displayFileInfo(file) {
    const fileInfo = document.getElementById('fileInfo');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const fileExtension = document.getElementById('fileExtension');
    const btnLanjutkan = document.getElementById('btnLanjutkan');
    const ext = file.name.split('.').pop().toUpperCase();
    fileExtension.textContent = ext;
    const size = formatFileSize(file.size);
    fileName.textContent = file.name;
    fileSize.textContent = size;
    fileInfo.classList.add('show');
    btnLanjutkan.disabled = false;
}
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round((bytes / Math.pow(k, i)) * 100) / 100 + ' ' + sizes[i];
}
function handleSubmit() {
    if (selectedFile) {
        alert(`File "${selectedFile.name}" siap diupload!`);
    }
}
const uploadArea = document.getElementById('uploadArea');
uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('dragging');
});
uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragging');
});
uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('dragging');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];
        const validTypes = ['.pdf', '.doc', '.docx'];
        const fileExt = '.' + file.name.split('.').pop().toLowerCase();
        if (validTypes.includes(fileExt)) {
            selectedFile = file;
            displayFileInfo(file);
        } else {
            alert('Format file tidak didukung. Gunakan PDF, DOC, atau DOCX.');
        }
    }
});
function handleFileSelect(event) {
    const file = event.target.files[0]; 
    const uploadArea = document.getElementById('uploadArea');
    const btn = document.getElementById('btnLanjutkan');
    if (file) {
        uploadArea.innerHTML = `
            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                <i class="fas fa-file-check text-success fa-2x mb-2"></i>
                <h6 class="fw-bold text-dark mb-0">${file.name}</h6>
                <small class="text-muted">${format_ukuran_kb(file.size)}</small>
                <div class="text-success mt-2 small"><i class="fas fa-check-circle me-1"></i>Siap diupload</div>
            </div>
        `;
        uploadArea.style.borderColor = 'var(--green)';
        uploadArea.style.backgroundColor = 'rgba(103, 192, 144, 0.1)';
        if(btn) btn.disabled = false;
    }
}
function handleFileSelect(event) {
    const file = event.target.files[0];
    const btn = document.getElementById('btnLanjutkan');
    const uploadArea = document.getElementById('uploadArea');
    if (file) {
        uploadArea.innerHTML = `
            <div class="text-success fw-bold"><i class="fas fa-file-alt me-2"></i>${file.name}</div>
            <small class="text-muted">${(file.size / 1024).toFixed(1)} KB</small>
            <p class="small text-muted mt-2">Klik lagi untuk ganti file</p>
        `;
        btn.disabled = false;
        btn.classList.add('btn-primary');
    }
}
function handleSubmit() {
    const form = document.getElementById('uploadForm');
    const url = form.getAttribute('action'); 
    const formData = new FormData(form);
    const btn = document.getElementById('btnLanjutkan');
    btn.disabled = true;
    btn.innerText = 'Mengupload...';
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal menghubungi server');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            hideUploadCard();
            location.reload(); 
        } else {
            alert('Gagal: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan sistem.');
    })
    .finally(() => {
        btn.disabled = false;
        btn.innerText = 'Lanjutkan';
    });
}