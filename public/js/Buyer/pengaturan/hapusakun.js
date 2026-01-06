// ========================================
// HAPUS AKUN - JavaScript Functions
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize modal and step handlers
    initializeDeleteModal();
    initializeReasonHandler();
    initializeVerificationHandler();
    initializeOTPHandler();
    
});

// ========================================
// MODAL & STEP MANAGEMENT
// ========================================

let currentStep = 1;
const totalSteps = 4;

function initializeDeleteModal() {
    const btnStartDelete = document.getElementById('btnStartDelete');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
    const btnNextStep = document.getElementById('btnNextStep');
    const btnPrevStep = document.getElementById('btnPrevStep');
    const btnFinalSubmit = document.getElementById('btnFinalSubmit');
    
    // Start delete process
    if (btnStartDelete) {
        btnStartDelete.addEventListener('click', function() {
            currentStep = 1;
            showStep(1);
            deleteModal.show();
        });
    }
    
    // Next step
    if (btnNextStep) {
        btnNextStep.addEventListener('click', function() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });
    }
    
    // Previous step
    if (btnPrevStep) {
        btnPrevStep.addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    }
    
    // Final submit
    if (btnFinalSubmit) {
        btnFinalSubmit.addEventListener('click', function() {
            handleFinalSubmit();
        });
    }
}

function showStep(stepNumber) {
    // Hide all step contents
    document.querySelectorAll('.step-content').forEach(content => {
        content.classList.remove('active');
        content.style.display = 'none';
    });
    
    // Show current step content
    const currentContent = document.getElementById('step' + stepNumber);
    if (currentContent) {
        currentContent.style.display = 'block';
        setTimeout(() => {
            currentContent.classList.add('active');
        }, 50);
    }
    
    // Update step indicators
    document.querySelectorAll('.step').forEach((step, index) => {
        const stepNum = index + 1;
        step.classList.remove('active', 'completed');
        
        if (stepNum < stepNumber) {
            step.classList.add('completed');
        } else if (stepNum === stepNumber) {
            step.classList.add('active');
        }
    });
    
    // Update step lines
    document.querySelectorAll('.step-line').forEach((line, index) => {
        line.classList.remove('completed');
        if (index < stepNumber - 1) {
            line.classList.add('completed');
        }
    });
    
    // Update buttons visibility
    const btnPrevStep = document.getElementById('btnPrevStep');
    const btnNextStep = document.getElementById('btnNextStep');
    const btnFinalSubmit = document.getElementById('btnFinalSubmit');
    
    if (btnPrevStep) {
        btnPrevStep.style.display = stepNumber > 1 ? 'inline-block' : 'none';
    }
    
    if (btnNextStep) {
        btnNextStep.style.display = stepNumber < totalSteps ? 'inline-block' : 'none';
    }
    
    if (btnFinalSubmit) {
        btnFinalSubmit.style.display = stepNumber === totalSteps ? 'inline-block' : 'none';
    }
}

function validateCurrentStep() {
    switch(currentStep) {
        case 1: // Konfirmasi Identitas
            return validateIdentity();
        case 2: // Alasan Penghapusan
            return validateReason();
        case 3: // Persetujuan
            return validateAgreement();
        default:
            return true;
    }
}

function validateIdentity() {
    const verifyMethod = document.querySelector('input[name="konfirmasiIdentitas"]:checked').value;
    
    if (verifyMethod === 'password') {
        const password = document.getElementById('passwordConfirm').value;
        if (password.trim() === '') {
            showToast('❌ Mohon masukkan password Anda', 'error');
            document.getElementById('passwordConfirm').focus();
            return false;
        }
    } else {
        const otp = document.getElementById('otpCode').value;
        if (otp.trim().length !== 6) {
            showToast('❌ Kode OTP harus 6 digit', 'error');
            document.getElementById('otpCode').focus();
            return false;
        }
    }
    
    return true;
}

function validateReason() {
    const reasonSelected = document.querySelector('input[name="alasanHapus"]:checked');
    if (!reasonSelected) {
        showToast('❌ Mohon pilih alasan penghapusan akun', 'error');
        return false;
    }
    
    const reasonOther = document.getElementById('reasonOther');
    const otherReasonText = document.getElementById('otherReasonText');
    if (reasonOther.checked && otherReasonText.value.trim().length < 20) {
        showToast('❌ Alasan harus minimal 20 karakter', 'error');
        otherReasonText.focus();
        return false;
    }
    
    return true;
}

function validateAgreement() {
    const agreements = ['agree1', 'agree2', 'agree3', 'agree4'];
    for (let i = 0; i < agreements.length; i++) {
        if (!document.getElementById(agreements[i]).checked) {
            showToast('❌ Mohon centang semua persetujuan', 'error');
            return false;
        }
    }
    return true;
}

// ========================================
// REASON HANDLER
// ========================================

function initializeReasonHandler() {
    const reasonRadios = document.querySelectorAll('input[name="alasanHapus"]');
    const otherReasonContainer = document.getElementById('otherReasonContainer');
    const otherReasonText = document.getElementById('otherReasonText');
    const reasonOther = document.getElementById('reasonOther');
    
    reasonRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (reasonOther.checked) {
                otherReasonContainer.style.display = 'block';
            } else {
                otherReasonContainer.style.display = 'none';
                otherReasonText.value = '';
            }
        });
    });
}

// ========================================
// VERIFICATION HANDLER
// ========================================

function initializeVerificationHandler() {
    const verifyRadios = document.querySelectorAll('input[name="konfirmasiIdentitas"]');
    const passwordVerification = document.getElementById('passwordVerification');
    const otpVerification = document.getElementById('otpVerification');
    const passwordConfirm = document.getElementById('passwordConfirm');
    const otpCode = document.getElementById('otpCode');
    
    verifyRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'password') {
                passwordVerification.style.display = 'block';
                otpVerification.style.display = 'none';
                passwordConfirm.value = '';
            } else {
                passwordVerification.style.display = 'none';
                otpVerification.style.display = 'block';
                otpCode.value = '';
            }
        });
    });
}

// ========================================
// OTP HANDLER
// ========================================

function initializeOTPHandler() {
    const sendOtpBtn = document.getElementById('sendOtpBtn');
    
    if (sendOtpBtn) {
        sendOtpBtn.addEventListener('click', function() {
            // Disable button
            this.disabled = true;
            this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Mengirim...';
            
            // Simulate OTP sending
            setTimeout(() => {
                this.innerHTML = '<i class="bi bi-check-circle me-2"></i>Kode Terkirim';
                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-success');
                
                showToast('✓ Kode OTP telah dikirim ke email Anda', 'success');
                
                // Enable OTP input
                document.getElementById('otpCode').focus();
            }, 2000);
        });
    }
}

// ========================================
// FINAL SUBMIT
// ========================================

function handleFinalSubmit() {
    const btnFinalSubmit = document.getElementById('btnFinalSubmit');
    
    // Disable button
    btnFinalSubmit.disabled = true;
    btnFinalSubmit.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Memproses...';
    
    // Get form data
    const formData = {
        reason: document.querySelector('input[name="alasanHapus"]:checked').value,
        reasonText: document.getElementById('otherReasonText').value,
        verifyMethod: document.querySelector('input[name="konfirmasiIdentitas"]:checked').value,
        password: document.getElementById('passwordConfirm').value,
        otp: document.getElementById('otpCode').value
    };
    
    // Simulate submission
    setTimeout(() => {
        // Close delete modal
        const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteAccountModal'));
        deleteModal.hide();
        
        // Show success modal
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
        
        // Log for analytics
        console.log('Delete account request submitted:', formData);
        
        // In production, send to backend:
        // submitDeleteRequest(formData);
    }, 2000);
}

// ========================================
// BACKEND SUBMISSION (Template)
// ========================================

function submitDeleteRequest(formData) {
    /*
    fetch('/api/account/delete-request', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close delete modal
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteAccountModal'));
            deleteModal.hide();
            
            // Show success modal
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        } else {
            showToast('❌ Terjadi kesalahan. Silakan coba lagi.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('❌ Terjadi kesalahan koneksi', 'error');
    });
    */
}

// ========================================
// TOAST NOTIFICATION
// ========================================

function showToast(message, type = 'info') {
    // Check if Bootstrap Toast is available
    if (typeof bootstrap === 'undefined') {
        alert(message);
        return;
    }
    
    // Create toast container if doesn't exist
    let toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
    }
    
    // Determine background color
    let bgClass = 'bg-primary';
    if (type === 'success') bgClass = 'bg-success';
    if (type === 'error') bgClass = 'bg-danger';
    if (type === 'warning') bgClass = 'bg-warning';
    
    // Create toast
    const toastHTML = `
        <div class="toast align-items-center text-white ${bgClass} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    toastContainer.insertAdjacentHTML('beforeend', toastHTML);
    
    const toastElement = toastContainer.lastElementChild;
    const toast = new bootstrap.Toast(toastElement, {
        autohide: true,
        delay: 3000
    });
    
    toast.show();
    
    // Remove toast element after it's hidden
    toastElement.addEventListener('hidden.bs.toast', function() {
        this.remove();
    });
}

// Export functions for external use
window.HapusAkunHelpers = {
    showToast,
    submitDeleteRequest
};