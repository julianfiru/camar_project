/**
 * Register Page - Revised (Photo Optional)
 */

let currentStep = 1;
let cropper = null;
let selectedAccountType = null;

// Account Type Selection
function selectAccountType(type, element) {
    selectedAccountType = type;
    document.getElementById('accountType').value = type;
    
    // Remove selected class from all cards
    document.querySelectorAll('.account-card').forEach(card => {
        card.classList.remove('selected');
    });
    
    // Add selected class to clicked card
    element.classList.add('selected');
    
    // Show/hide seller documents
    const sellerDocs = document.getElementById('sellerDocs');
    if (type === 'seller') {
        sellerDocs.style.display = 'block';
    } else {
        sellerDocs.style.display = 'none';
    }
}

// Change Step
function changeStep(direction) {
    // Validate current step before proceeding
    if (direction === 1 && !validateStep(currentStep)) {
        return;
    }
    
    // Hide current step
    document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('active');
    document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('active');
    document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('completed');
    
    // Update current step
    currentStep += direction;
    
    // Show new step
    document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add('active');
    document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('active');
    
    // Update progress bar
    updateProgressBar();
    
    // Update buttons
    updateButtons();
}

function updateProgressBar() {
    const progressFill = document.getElementById('progressFill');
    const progress = ((currentStep - 1) / 4) * 100;
    progressFill.style.width = progress + '%';
}

function updateButtons() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');
    
    if (!prevBtn || !nextBtn || !submitBtn) return;
    
    // Show/hide prev button
    if (currentStep === 1) {
        prevBtn.style.display = 'none';
    } else {
        prevBtn.style.display = 'inline-flex';
    }
    
    // Show/hide next/submit button
    if (currentStep === 5) {
        nextBtn.style.display = 'none';
        submitBtn.style.display = 'inline-flex';
    } else {
        nextBtn.style.display = 'inline-flex';
        submitBtn.style.display = 'none';
    }
}

// Validate Step
function validateStep(step) {
    switch(step) {
        case 1:
            if (!selectedAccountType) {
                alert('Pilih tipe akun terlebih dahulu');
                return false;
            }
            return true;
            
        case 2:
            const requiredFields = document.querySelectorAll('.form-step[data-step="2"] [required]');
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    alert('Mohon lengkapi semua field yang wajib diisi');
                    field.focus();
                    return false;
                }
            }
            
            // Validate password
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password.length < 8) {
                alert('Password minimal 8 karakter');
                return false;
            }
            
            if (password !== confirmPassword) {
                alert('Password tidak cocok');
                return false;
            }
            
            return true;
            
        case 3:
            // FOTO PROFIL OPSIONAL - tidak perlu validasi
            // User bisa skip step ini tanpa upload foto
            return true;
            
        case 4:
            // Documents are optional in validation, just proceed
            return true;
            
        case 5:
            const termsCheck = document.getElementById('termsCheck');
            if (!termsCheck || !termsCheck.checked) {
                alert('Anda harus menyetujui Syarat & Ketentuan');
                return false;
            }
            return true;
            
        default:
            return true;
    }
}

// Password Toggle
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// ====================================
// PHOTO CROP FUNCTIONALITY
// ====================================

// Photo Upload Handler
const profilePhotoInput = document.getElementById('profilePhotoInput');
if (profilePhotoInput) {
    profilePhotoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (!file) return;
        
        // Validate file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran file maksimal 5MB');
            return;
        }
        
        // Validate file type
        if (!file.type.match('image.*')) {
            alert('File harus berupa gambar');
            return;
        }
        
        // Read file and show crop modal
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('cropImage').src = event.target.result;
            document.getElementById('cropModal').style.display = 'flex';
            
            // Initialize cropper
            initCropper();
        };
        reader.readAsDataURL(file);
    });
}

// Initialize Cropper
function initCropper() {
    const image = document.getElementById('cropImage');
    
    // Destroy previous cropper if exists
    if (cropper) {
        cropper.destroy();
    }
    
    // Create new cropper
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 1,
        dragMode: 'move',
        autoCropArea: 1,
        restore: false,
        guides: true,
        center: true,
        highlight: false,
        cropBoxMovable: true,
        cropBoxResizable: true,
        toggleDragModeOnDblclick: false,
    });
}

// Close Crop Modal
function closeCropModal() {
    document.getElementById('cropModal').style.display = 'none';
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
    // Reset input
    document.getElementById('profilePhotoInput').value = '';
}

// Save Cropped Image
function saveCroppedImage() {
    if (!cropper) return;
    
    // Get cropped canvas
    const canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });
    
    // Convert to base64
    const croppedImageData = canvas.toDataURL('image/jpeg', 0.9);
    
    // Store in hidden input
    document.getElementById('croppedImage').value = croppedImageData;
    
    // Update preview
    const photoPreview = document.getElementById('photoPreview');
    photoPreview.innerHTML = `<img src="${croppedImageData}" alt="Profile Photo">`;
    
    // Close modal
    closeCropModal();
}

// Form submit dibiarkan default HTML (tanpa JS intercept)

// Submit form secara manual dari tombol "Daftar Sekarang"
function submitRegisterForm() {
    // Pastikan sudah di step 5 dan terms dicentang
    if (!validateStep(5)) {
        return;
    }

    const form = document.getElementById('registerForm');
    if (!form) return;

    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mendaftar...';
    }

    // Bypass native validation (karena multi-step), gunakan validasi custom kita
    form.submit();
}

// Update File Indicator
function updateFileIndicator(inputId) {
    const input = document.getElementById(inputId);
    const indicator = document.getElementById('indicator-' + inputId);
    
    if (input.files && input.files.length > 0) {
        const file = input.files[0];
        const fileName = file.name;
        const fileSize = (file.size / 1024).toFixed(1); // KB
        
        indicator.className = 'file-indicator uploaded';
        indicator.textContent = fileName.length > 15 ? fileName.substring(0, 15) + '...' : fileName;
        indicator.title = fileName + ' (' + fileSize + ' KB)';
    } else {
        indicator.className = 'file-indicator';
        indicator.textContent = '';
        indicator.title = '';
    }
}

// Initialize
updateButtons();
updateButtons();