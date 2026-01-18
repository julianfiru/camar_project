const uploadForm = document.getElementById('uploadForm');
const fileInput = document.getElementById('fileInput');
const categorySelect = document.getElementById('document_category');
const btnLanjutkan = document.getElementById('btnLanjutkan');
const uploadArea = document.getElementById('uploadArea');
const uploadText = uploadArea.querySelector('h6');
function showUploadCard() {
    if(uploadForm) {
        uploadForm.style.display = 'block';
        uploadForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}
function hideUploadCard() {
    if(uploadForm) {
        uploadForm.style.display = 'none';
        uploadForm.reset();
        uploadText.innerText = "Pilih file atau drag & drop";
        uploadText.style.color = "var(--navy)";
        btnLanjutkan.disabled = true;
    }
}
function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
        if (file.size > 10 * 1024 * 1024) {
            alert("Ukuran file terlalu besar! Maksimal 10MB.");
            fileInput.value = ""; 
            return;
        }
        uploadText.innerText = "File terpilih: " + file.name;
        uploadText.style.color = "var(--green)";
    } else {
        uploadText.innerText = "Pilih file atau drag & drop";
        uploadText.style.color = "var(--navy)";
    }

    checkValidation();
}
function checkValidation() {
    if (categorySelect.value !== "" && fileInput.files.length > 0) {
        btnLanjutkan.disabled = false;
    } else {
        btnLanjutkan.disabled = true;
    }
}
if(categorySelect) {
    categorySelect.addEventListener('change', checkValidation);
}
function handleSubmit() {
    if (!btnLanjutkan.disabled) {
        btnLanjutkan.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengupload...';
        uploadForm.submit();
    }
}