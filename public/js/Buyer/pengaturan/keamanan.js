// ========================================
// KEAMANAN & AKUN - JAVASCRIPT
// ========================================

// Ubah Email
function ubahEmail() {
    const newEmail = prompt('Masukkan email baru:\n\n(Email saat ini: contact@greenenergy.co.id)');
    
    if (newEmail && newEmail.includes('@')) {
        showToast(
            `✓ Permintaan ubah email berhasil!\n\nEmail baru: ${newEmail}\n\nLink verifikasi telah dikirim ke email lama dan baru Anda. Silakan cek inbox untuk menyelesaikan proses verifikasi.`,
            'success'
        );
    } else if (newEmail) {
        showToast('❌ Format email tidak valid. Silakan coba lagi.', 'danger');
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
        showToast('❌ Password baru minimal 8 karakter!', 'danger');
        return false;
    }
    
    // Cek kombinasi huruf dan angka
    const hasLetter = /[a-zA-Z]/.test(newPass);
    const hasNumber = /[0-9]/.test(newPass);
    
    if (!hasLetter || !hasNumber) {
        showToast('❌ Password harus mengandung kombinasi huruf dan angka!', 'danger');
        return false;
    }
    
    // Cek konfirmasi password
    if (newPass !== confirmPass) {
        showToast('❌ Konfirmasi password tidak cocok!', 'danger');
        return false;
    }
    
    // Simulasi sukses - Tutup modal
    const modalElement = document.getElementById('passwordModal');
    const modal = bootstrap.Modal.getInstance(modalElement);
    modal.hide();
    
    // Tampilkan toast sukses
    showToast('✓ Password berhasil diubah!\n\nAnda akan diminta login ulang di semua perangkat untuk keamanan.', 'success');
    
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
function logoutDevice(deviceName) {
    if (confirm(`Logout dari perangkat "${deviceName}"?\n\nPerangkat ini akan diminta login ulang saat digunakan kembali.`)) {
        showToast(`✓ Berhasil logout dari perangkat "${deviceName}"`, 'success');
        
        // Refresh activity list after 1 second
        setTimeout(() => {
            refreshLoginActivity();
        }, 1000);
    }
}

// Logout All Devices
function logoutAllDevices() {
    if (confirm('⚠️ PERINGATAN!\n\nAnda akan logout dari SEMUA perangkat kecuali perangkat ini.\n\nAnda harus login ulang di semua perangkat lain.\n\nLanjutkan?')) {
        showToast('✓ Berhasil logout dari semua perangkat!\n\nSemua sesi lain telah diakhiri. Anda tetap login di perangkat ini.', 'success');
        
        // Refresh activity list after 1 second
        setTimeout(() => {
            refreshLoginActivity();
        }, 1000);
    }
}

// Refresh Login Activity
function refreshLoginActivity() {
    showToast('🔄 Memperbarui daftar aktivitas login...', 'info');
    
    // Simulate refresh delay
    setTimeout(() => {
        showToast('✓ Daftar aktivitas login telah diperbarui.', 'success');
    }, 1000);
}

// Show Toast Notification
function showToast(message, type = 'success') {
    const colors = {
        success: '#67C090',
        danger: '#EF4444',
        warning: '#F59E0B',
        info: '#26667F'
    };
    
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.style.background = colors[type];
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    // Remove after 3 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 3000);
}

// Initialize tooltips (Bootstrap 5)
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});