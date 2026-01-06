// ========================================
// PROFIL PERUSAHAAN - JAVASCRIPT
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // File Upload Preview
    const fileInput = document.querySelector('.file-input');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
                const fileName = file.name;
                const fileType = file.type;
                
                // Validasi ukuran file (max 5MB)
                if (fileSize > 5) {
                    alert('⚠️ Ukuran file terlalu besar!\n\nMaksimal ukuran file: 5MB\nUkuran file Anda: ' + fileSize + 'MB');
                    fileInput.value = '';
                    return;
                }
                
                // Validasi tipe file
                const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (!allowedTypes.includes(fileType)) {
                    alert('⚠️ Tipe file tidak didukung!\n\nHanya file PDF, DOC, dan DOCX yang diperbolehkan.');
                    fileInput.value = '';
                    return;
                }
                
                console.log('File dipilih:', fileName, '(' + fileSize + 'MB)');
                
                // Update form text
                const formText = document.querySelector('.form-text');
                if (formText) {
                    formText.textContent = '✓ File terpilih: ' + fileName + ' (' + fileSize + 'MB)';
                    formText.style.color = 'var(--color-primary)';
                    formText.style.fontWeight = '600';
                }
            }
        });
    }
    
    // Form Submit Handler
    const uploadForm = document.querySelector('form[action*="upload-dokumen"]');
    if (uploadForm) {
        uploadForm.addEventListener('submit', function(e) {
            const jenisDokumen = uploadForm.querySelector('select[name="jenis_dokumen"]').value;
            const fileInput = uploadForm.querySelector('input[type="file"]');
            
            // Validasi jenis dokumen
            if (!jenisDokumen) {
                e.preventDefault();
                alert('⚠️ Pilih jenis dokumen terlebih dahulu!');
                return false;
            }
            
            // Validasi file
            if (!fileInput.files || fileInput.files.length === 0) {
                e.preventDefault();
                alert('⚠️ Pilih file yang akan diupload!');
                return false;
            }
            
            // Konfirmasi upload
            const confirmation = confirm(
                'Upload dokumen ini?\n\n' +
                'Jenis: ' + uploadForm.querySelector('select[name="jenis_dokumen"] option:checked').text + '\n' +
                'File: ' + fileInput.files[0].name + '\n\n' +
                'Dokumen akan diverifikasi oleh admin dalam 1-3 hari kerja.'
            );
            
            if (!confirmation) {
                e.preventDefault();
                return false;
            }
        });
    }
    
    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Animate badges on hover
    const badges = document.querySelectorAll('.company-badges span, .badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.2s ease';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // Document item hover effect
    const documentItems = document.querySelectorAll('.document-item');
    documentItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.borderLeftWidth = '8px';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.borderLeftWidth = '5px';
        });
    });
    
});

// Function to handle document download (if needed)
function downloadDocument(documentId) {
    console.log('Downloading document:', documentId);
    // Implement download logic here
    alert('Mengunduh dokumen ID: ' + documentId);
}

// Function to edit company profile (if needed)
function editProfile() {
    window.location.href = '/buyer/profil/edit';
}

// Function to verify document status
function checkDocumentStatus(documentId) {
    // Implement status check logic
    console.log('Checking status for document:', documentId);
}