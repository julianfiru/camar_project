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

// Show Alert in UI
function showAlert(message) {
    const alertBox = document.getElementById('step-alert');
    const alertMsg = document.getElementById('step-alert-msg');

    if (alertBox && alertMsg) {
        alertMsg.textContent = message;
        alertBox.style.display = 'block';

        // Auto scroll to alert
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Hide after 5 seconds
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 5000);
    } else {
        alert(message); // Fallback
    }
}

// Validate Step
function validateStep(step) {
    const alertBox = document.getElementById('step-alert');
    if (alertBox) alertBox.style.display = 'none'; // Hide previous alerts

    switch (step) {
        case 1:
            if (!selectedAccountType) {
                showAlert('Pilih tipe akun terlebih dahulu');
                return false;
            }
            return true;

        case 2:
            const requiredFields = document.querySelectorAll('.form-step[data-step="2"] [required]');
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    showAlert('Mohon lengkapi semua field yang wajib diisi');
                    field.focus();
                    return false;
                }
            }

            // Validate password
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password.length < 8) {
                showAlert('Password minimal 8 karakter');
                return false;
            }

            if (password !== confirmPassword) {
                showAlert('Password tidak cocok');
                return false;
            }

            return true;

        case 3:
            return true;

        case 4:
            // 1. Mandatory Documents for ALL Users (Akta, NPWP, NIB)
            const commonDocs = ['akta', 'npwp', 'nib'];
            const docNames = {
                'akta': 'Akta Pendirian',
                'npwp': 'NPWP Perusahaan',
                'nib': 'NIB / SIUP'
            };

            for (let doc of commonDocs) {
                const fileInput = document.querySelector(`input[name="${doc}"]`);
                const driveInput = document.querySelector(`input[name="${doc}_drive_url"]`);

                // Check if File is uploaded OR Drive Link is set
                const hasFile = fileInput && fileInput.files.length > 0;
                const hasDrive = driveInput && driveInput.value.trim() !== '';

                if (!hasFile && !hasDrive) {
                    showAlert(`Dokumen Wajib: Mohon upload ${docNames[doc]}`);
                    return false;
                }
            }

            // 2. Mandatory Documents for SELLER Only (Min 1 of Carbon Standard)
            if (selectedAccountType === 'seller') {
                const sellerDocs = ['gold_standard', 'vcs'];
                let hasSellerDoc = false;

                for (let doc of sellerDocs) {
                    const fileInput = document.querySelector(`input[name="${doc}"]`);
                    const driveInput = document.querySelector(`input[name="${doc}_drive_url"]`);

                    if ((fileInput && fileInput.files.length > 0) || (driveInput && driveInput.value.trim() !== '')) {
                        hasSellerDoc = true;
                        break; // Found at least one
                    }
                }

                if (!hasSellerDoc) {
                    showAlert('Dokumen Wajib Seller: Mohon upload minimal satu standar karbon (Gold Standard atau VCS)');
                    return false;
                }
            }

            return true;

        case 5:
            const termsCheck = document.getElementById('termsCheck');
            if (!termsCheck || !termsCheck.checked) {
                showAlert('Anda harus menyetujui Syarat & Ketentuan');
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
// GOOGLE DRIVE LINK HANDLER
// ====================================
function setGoogleDriveLink(inputId, docName) {
    const driveUrl = prompt(`Masukkan Link Google Drive untuk ${docName}:`);

    if (driveUrl) {
        // Basic validation
        if (driveUrl.includes('drive.google.com')) {
            // Save to hidden input
            const hiddenInput = document.getElementById(inputId + '_drive_url');
            if (hiddenInput) hiddenInput.value = driveUrl;

            // Update indicator
            const indicator = document.getElementById('indicator-' + inputId);
            indicator.className = 'file-indicator uploaded';
            indicator.innerHTML = `
                <i class="fab fa-google-drive"></i> Link Drive Terlampir
                <button type="button" class="btn-remove-doc" onclick="removeDriveLink('${inputId}')" title="Hapus Link">
                    <i class="fas fa-times"></i>
                </button>
            `;
        } else {
            showAlert('Link tidak valid! Harap masukkan link Google Drive yang benar.');
        }
    }
}

function removeDriveLink(inputId) {
    const hiddenInput = document.getElementById(inputId + '_drive_url');
    if (hiddenInput) hiddenInput.value = '';

    // Clear indicator
    const indicator = document.getElementById('indicator-' + inputId);
    indicator.className = 'file-indicator';
    indicator.innerHTML = '';
}

// ====================================
// PHOTO CROP FUNCTIONALITY
// ====================================
if (profilePhotoInput) {
    profilePhotoInput.addEventListener('change', function (e) {
        // ... (existing photo logic) ...
        const file = e.target.files[0];
        if (!file) return;

        if (file.size > 5 * 1024 * 1024) {
            showAlert('Ukuran file maksimal 5MB');
            this.value = '';
            return;
        }

        if (!file.type.match('image.*')) {
            showAlert('File harus berupa gambar');
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function (event) {
            const imageElement = document.getElementById('cropImage');
            imageElement.src = event.target.result;
            document.getElementById('cropModal').style.display = 'flex';
            initCropper(imageElement);
        };
        reader.readAsDataURL(file);
    });
}

// Initialize Cropper
function initCropper(imageElement) {
    if (cropper) cropper.destroy();
    cropper = new Cropper(imageElement, {
        aspectRatio: 1, viewMode: 1, dragMode: 'move', autoCropArea: 1, restore: false,
        guides: true, center: true, highlight: false, cropBoxMovable: true, cropBoxResizable: true, toggleDragModeOnDblclick: false,
    });
}

function closeCropModal() {
    document.getElementById('cropModal').style.display = 'none';
    if (cropper) { cropper.destroy(); cropper = null; }
    document.getElementById('profilePhotoInput').value = '';
}

function saveCroppedImage() {
    if (!cropper) return;
    const canvas = cropper.getCroppedCanvas({ width: 400, height: 400, imageSmoothingEnabled: true, imageSmoothingQuality: 'high' });
    const croppedImageData = canvas.toDataURL('image/jpeg', 0.9);

    const hiddenInput = document.getElementById('croppedImage');
    if (hiddenInput) hiddenInput.value = croppedImageData;

    const photoPreview = document.getElementById('photoPreview');
    if (photoPreview) photoPreview.innerHTML = `<img src="${croppedImageData}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">`;

    closeCropModal();
}

function submitRegisterForm() {
    if (!validateStep(5)) return;
    const form = document.getElementById('registerForm');
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mendaftar...';
    }
    form.submit();
}

function updateFileIndicator(inputId) {
    const input = document.getElementById(inputId);
    const indicator = document.getElementById('indicator-' + inputId);

    if (input.files && input.files.length > 0) {
        const file = input.files[0];
        const fileName = file.name;
        const fileSize = (file.size / 1024).toFixed(1); // KB

        indicator.className = 'file-indicator uploaded';
        indicator.innerHTML = `
            ${fileName.length > 20 ? fileName.substring(0, 20) + '...' : fileName}
            <button type="button" class="btn-remove-doc" onclick="removeDocument('${inputId}')" title="Hapus file">
                <i class="fas fa-times"></i>
            </button>
        `;
        indicator.title = fileName + ' (' + fileSize + ' KB)';
    } else {
        indicator.className = 'file-indicator';
        indicator.innerHTML = '';
        indicator.title = '';
    }
}

// Remove Document Function
function removeDocument(inputId) {
    const input = document.getElementById(inputId);
    if (input) {
        input.value = ''; // Clear file input
        // Trigger change event to ensure any listeners update
        const event = new Event('change');
        input.dispatchEvent(event);
    }
}

updateButtons();