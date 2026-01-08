// ========================================
// KEAMANAN & AKUN - JAVASCRIPT
// ========================================

// Ubah Email
function ubahEmail() {
    const newEmail = prompt('Masukkan email baru:\n\n(Email saat ini: contact@greenenergy.co.id)');
    
    if (newEmail && newEmail.includes('@')) {
        showAlert(
            'success',
            'Email Berhasil Diubah',
            `Email baru: ${newEmail}\n\nLink verifikasi telah dikirim ke email lama dan baru Anda. Silakan cek inbox untuk menyelesaikan proses verifikasi.`
        );
    } else if (newEmail) {
        showAlert('danger', 'Format Email Tidak Valid', 'Silakan masukkan format email yang benar.');
    }
}

// Open Password Modal
function openPasswordModal() {
    const modalElement = document.getElementById('passwordModal');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();
    
    // Reset form when modal opens
    setTimeout(() => {
        resetPasswordForm();
    }, 100);
    
    // Focus on first input after modal is shown
    modalElement.addEventListener('shown.bs.modal', function () {
        document.getElementById('currentPassword').focus();
    });
}

// Change Password
function changePassword(event) {
    event.preventDefault();
    
    const currentPass = document.getElementById('currentPassword').value;
    const newPass = document.getElementById('newPassword').value;
    const confirmPass = document.getElementById('confirmPassword').value;
    
    // Validasi password baru
    if (newPass.length < 8) {
        showAlert('danger', 'Password Terlalu Pendek', 'Password baru minimal 8 karakter!');
        return false;
    }
    
    // Cek kombinasi huruf dan angka
    const hasLetter = /[a-zA-Z]/.test(newPass);
    const hasNumber = /[0-9]/.test(newPass);
    
    if (!hasLetter || !hasNumber) {
        showAlert('danger', 'Password Tidak Valid', 'Password harus mengandung kombinasi huruf dan angka!');
        return false;
    }
    
    // Cek konfirmasi password
    if (newPass !== confirmPass) {
        showAlert('danger', 'Password Tidak Cocok', 'Konfirmasi password tidak cocok dengan password baru!');
        return false;
    }
    
    // Simulasi sukses - Tutup modal
    const modalElement = document.getElementById('passwordModal');
    const modal = bootstrap.Modal.getInstance(modalElement);
    modal.hide();
    
    // Tampilkan alert sukses
    showAlert(
        'success',
        'Password Berhasil Diubah',
        'Anda akan diminta login ulang di semua perangkat untuk keamanan.'
    );
    
    // Update tanggal terakhir diubah setelah modal tertutup
    setTimeout(() => {
        const today = new Date();
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        const formattedDate = today.toLocaleDateString('id-ID', options);
        
        const passwordInfo = document.querySelector('.password-info');
        if (passwordInfo) {
            passwordInfo.innerHTML = `
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                Password terakhir diubah: ${formattedDate}
            `;
        }
        
        // Reset form
        resetPasswordForm();
    }, 500);
    
    return false;
}

// Reset Password Form
function resetPasswordForm() {
    const form = document.getElementById('changePasswordForm');
    if (form) {
        form.reset();
        resetPasswordStrength();
        
        // Reset toggle password icons
        ['currentPassword', 'newPassword', 'confirmPassword'].forEach(id => {
            const input = document.getElementById(id);
            const icon = document.getElementById(id + 'Icon');
            if (input && icon) {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    }
}

// Toggle Password Visibility
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(inputId + 'Icon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}

// Password Strength Checker
document.addEventListener('DOMContentLoaded', function() {
    const newPasswordInput = document.getElementById('newPassword');
    
    if (newPasswordInput) {
        newPasswordInput.addEventListener('input', function() {
            const password = this.value;
            const bars = [
                document.getElementById('bar1'),
                document.getElementById('bar2'),
                document.getElementById('bar3'),
                document.getElementById('bar4')
            ];
            const strengthText = document.getElementById('strengthText');
            
            // Reset all bars
            bars.forEach(bar => {
                bar.className = 'strength-bar';
            });
            
            if (password.length === 0) {
                strengthText.textContent = 'Masukkan password untuk melihat kekuatan';
                strengthText.style.color = '#666';
                return;
            }
            
            let strength = 0;
            
            // Check length
            if (password.length >= 8) strength++;
            if (password.length >= 12) strength++;
            
            // Check for numbers and letters
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^a-zA-Z0-9]/.test(password)) strength++;
            
            // Update bars and text
            if (strength <= 2) {
                bars[0].classList.add('weak');
                strengthText.textContent = '❌ Lemah - Tambahkan karakter dan variasi';
                strengthText.style.color = '#EF4444';
            } else if (strength === 3) {
                bars[0].classList.add('medium');
                bars[1].classList.add('medium');
                strengthText.textContent = '⚠️ Sedang - Bisa lebih kuat';
                strengthText.style.color = '#F59E0B';
            } else if (strength === 4) {
                bars[0].classList.add('strong');
                bars[1].classList.add('strong');
                bars[2].classList.add('strong');
                strengthText.textContent = '✓ Kuat - Password baik';
                strengthText.style.color = '#10B981';
            } else {
                bars.forEach(bar => bar.classList.add('very-strong'));
                strengthText.textContent = '✓ Sangat Kuat - Password excellent!';
                strengthText.style.color = '#059669';
            }
        });
    }
});

// Reset Password Strength
function resetPasswordStrength() {
    const bars = [
        document.getElementById('bar1'),
        document.getElementById('bar2'),
        document.getElementById('bar3'),
        document.getElementById('bar4')
    ];
    
    bars.forEach(bar => {
        bar.className = 'strength-bar';
    });
    
    const strengthText = document.getElementById('strengthText');
    if (strengthText) {
        strengthText.textContent = 'Masukkan password untuk melihat kekuatan';
        strengthText.style.color = '#666';
    }
}

// Logout Device
function logoutDevice(deviceName, deviceId) {
    showConfirmAlert(
        'warning',
        'PERINGATAN!',
        `Anda akan logout dari perangkat "${deviceName}"?\n\nPerangkat ini akan diminta login ulang saat digunakan kembali.\n\nLanjutkan?`,
        function() {
            // Remove device from DOM
            const deviceElement = document.querySelector(`[data-device="${deviceId}"]`);
            if (deviceElement) {
                // Add fade out animation
                deviceElement.style.transition = 'all 0.3s ease';
                deviceElement.style.opacity = '0';
                deviceElement.style.transform = 'translateX(30px)';
                
                setTimeout(() => {
                    deviceElement.remove();
                    showAlert('success', 'Logout Berhasil', `Berhasil logout dari perangkat "${deviceName}"`);
                }, 300);
            }
        }
    );
}

// Logout All Devices
function logoutAllDevices() {
    showConfirmAlert(
        'warning',
        'PERINGATAN!',
        'Anda akan logout dari SEMUA perangkat kecuali perangkat ini.\n\nAnda harus login ulang di semua perangkat lain.\n\nLanjutkan?',
        function() {
            // Remove all devices except current
            const allDevices = document.querySelectorAll('.activity-item:not(.activity-current)');
            
            allDevices.forEach((device, index) => {
                setTimeout(() => {
                    device.style.transition = 'all 0.3s ease';
                    device.style.opacity = '0';
                    device.style.transform = 'translateX(30px)';
                    
                    setTimeout(() => {
                        device.remove();
                    }, 300);
                }, index * 100);
            });
            
            setTimeout(() => {
                showAlert(
                    'success',
                    'Logout Berhasil',
                    'Berhasil logout dari semua perangkat!\n\nSemua sesi lain telah diakhiri. Anda tetap login di perangkat ini.'
                );
            }, allDevices.length * 100 + 300);
        }
    );
}

// Refresh Login Activity
function refreshLoginActivity() {
    showAlert('info', 'Memperbarui Data', 'Memperbarui daftar aktivitas login...');
    
    // Simulate refresh delay
    setTimeout(() => {
        showAlert('success', 'Data Diperbarui', 'Daftar aktivitas login telah diperbarui.');
    }, 1000);
}

// Show Alert Modal
function showAlert(type, title, message) {
    const alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
    const alertIcon = document.getElementById('alertIcon');
    const alertTitle = document.getElementById('alertTitle');
    const alertMessage = document.getElementById('alertMessage');
    
    // Set icon based on type
    alertIcon.className = `alert-icon ${type} mb-3`;
    
    let iconHTML = '';
    switch(type) {
        case 'success':
            iconHTML = '<i class="bi bi-check-circle-fill"></i>';
            break;
        case 'danger':
            iconHTML = '<i class="bi bi-x-circle-fill"></i>';
            break;
        case 'warning':
            iconHTML = '<i class="bi bi-exclamation-triangle-fill"></i>';
            break;
        case 'info':
            iconHTML = '<i class="bi bi-info-circle-fill"></i>';
            break;
    }
    
    alertIcon.innerHTML = iconHTML;
    alertTitle.textContent = title;
    alertMessage.textContent = message;
    
    alertModal.show();
}

// Show Confirm Alert (for logout actions)
function showConfirmAlert(type, title, message, onConfirm) {
    // Create custom confirm modal
    const confirmModalHTML = `
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content alert-modal-content">
                    <div class="modal-body text-center p-4">
                        <div class="alert-icon ${type} mb-3">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <h5 class="alert-title mb-3">${title}</h5>
                        <p class="alert-message">${message}</p>
                        <div class="d-flex gap-2 justify-content-center mt-4">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" id="confirmBtn">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Remove existing confirm modal if any
    const existingModal = document.getElementById('confirmModal');
    if (existingModal) {
        existingModal.remove();
    }
    
    // Add to body
    document.body.insertAdjacentHTML('beforeend', confirmModalHTML);
    
    // Show modal
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
    confirmModal.show();
    
    // Handle confirm button
    document.getElementById('confirmBtn').addEventListener('click', function() {
        confirmModal.hide();
        if (onConfirm) {
            onConfirm();
        }
    });
    
    // Clean up after modal is hidden
    document.getElementById('confirmModal').addEventListener('hidden.bs.modal', function() {
        this.remove();
    });
}

// Initialize tooltips (Bootstrap 5)
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});