/**
 * Register Page JavaScript - Complete
 */

(function() {
    'use strict';

    let currentStep = 1;
    const totalSteps = 4;
    let selectedRole = '';

    // Role Selection
    window.selectRole = function(role, element) {
        selectedRole = role;
        document.getElementById('accountType').value = role;
        
        // Remove selected from all cards
        document.querySelectorAll('.role-card').forEach(card => {
            card.classList.remove('selected');
        });
        
        // Add selected to clicked card
        element.classList.add('selected');
        
        // Show/hide seller-specific documents
        const sellerDocs = document.querySelector('.seller-only');
        if (sellerDocs) {
            if (role === 'seller') {
                sellerDocs.style.display = 'block';
            } else {
                sellerDocs.style.display = 'none';
            }
        }
    };

    // Toggle Password Visibility
    window.togglePassword = function(inputId) {
        const input = document.getElementById(inputId);
        const button = event.currentTarget;
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    };

    // File Upload Handler
    const fileInputs = ['akta', 'npwp', 'nib', 'iso', 'gold_standard', 'vcs'];
    fileInputs.forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                const nameDisplay = document.getElementById(id + 'Name');
                if (nameDisplay && fileName) {
                    nameDisplay.textContent = '📄 ' + fileName;
                }
            });
        }
    });

    // Next Step
    window.nextStep = function() {
        if (!validateStep(currentStep)) {
            return;
        }

        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        } else {
            submitForm();
        }
    };

    // Previous Step
    window.prevStep = function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    };

    // Show Step
    function showStep(step) {
        // Hide all steps
        document.querySelectorAll('.form-step').forEach(s => {
            s.classList.remove('active');
        });

        // Remove active from all progress steps
        document.querySelectorAll('.step').forEach(s => {
            s.classList.remove('active');
            if (s.dataset.step < step) {
                s.classList.add('completed');
            } else {
                s.classList.remove('completed');
            }
        });

        // Show current step
        document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');
        document.querySelector(`.step[data-step="${step}"]`).classList.add('active');

        // Update progress bar
        const progress = ((step - 1) / (totalSteps - 1)) * 100;
        document.getElementById('progressFill').style.width = progress + '%';

        // Update buttons
        updateButtons(step);

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Update Buttons
    function updateButtons(step) {
        const prevBtn = document.querySelector('.btn-prev');
        const nextBtn = document.querySelector('.btn-next');

        if (step === 1) {
            prevBtn.style.display = 'none';
        } else {
            prevBtn.style.display = 'flex';
        }

        if (step === totalSteps) {
            nextBtn.innerHTML = '<i class="fas fa-check"></i> Submit Registrasi';
        } else {
            nextBtn.innerHTML = 'Lanjut <i class="fas fa-arrow-right"></i>';
        }
    }

    // Validate Step
    function validateStep(step) {
        if (step === 1) {
            if (!selectedRole) {
                alert('Silakan pilih tipe akun terlebih dahulu');
                return false;
            }
        } else if (step === 2) {
            const companyName = document.querySelector('input[name="company_name"]').value;
            const email = document.querySelector('input[name="company_email"]').value;
            const phone = document.querySelector('input[name="phone"]').value;
            const industry = document.querySelector('select[name="industry"]').value;
            const address = document.querySelector('textarea[name="address"]').value;
            const fullName = document.querySelector('input[name="full_name"]').value;
            const position = document.querySelector('input[name="position"]').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!companyName || !email || !phone || !industry || !address || !fullName || !position) {
                alert('Silakan lengkapi semua field yang wajib diisi');
                return false;
            }

            if (!validateEmail(email)) {
                alert('Format email tidak valid');
                return false;
            }

            if (password.length < 8) {
                alert('Password minimal 8 karakter');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Password dan konfirmasi password tidak cocok');
                return false;
            }
        } else if (step === 3) {
            const akta = document.getElementById('akta').files[0];
            const npwp = document.getElementById('npwp').files[0];
            const nib = document.getElementById('nib').files[0];

            if (!akta) {
                alert('Akta Pendirian wajib diupload');
                return false;
            }

            if (!npwp) {
                alert('NPWP Perusahaan wajib diupload');
                return false;
            }

            if (!nib) {
                alert('NIB / SIUP wajib diupload');
                return false;
            }

            // Validate file size (5MB max)
            if (akta && akta.size > 5 * 1024 * 1024) {
                alert('Ukuran file Akta maksimal 5MB');
                return false;
            }

            if (npwp && npwp.size > 5 * 1024 * 1024) {
                alert('Ukuran file NPWP maksimal 5MB');
                return false;
            }

            if (nib && nib.size > 5 * 1024 * 1024) {
                alert('Ukuran file NIB/SIUP maksimal 5MB');
                return false;
            }

            // Seller-specific validation
            if (selectedRole === 'seller') {
                const goldStandard = document.getElementById('gold_standard').files[0];
                const vcs = document.getElementById('vcs').files[0];

                if (!goldStandard && !vcs) {
                    alert('Seller harus mengupload minimal salah satu: Gold Standard Certification atau VCS Verification Report');
                    return false;
                }

                if (goldStandard && goldStandard.size > 5 * 1024 * 1024) {
                    alert('Ukuran file Gold Standard maksimal 5MB');
                    return false;
                }

                if (vcs && vcs.size > 5 * 1024 * 1024) {
                    alert('Ukuran file VCS maksimal 5MB');
                    return false;
                }
            }
        } else if (step === 4) {
            const terms = document.getElementById('terms').checked;
            if (!terms) {
                alert('Anda harus menyetujui Syarat & Ketentuan');
                return false;
            }
        }

        return true;
    }

    // Validate Email
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Submit Form
    function submitForm() {
        const form = document.getElementById('regForm');
        const formData = new FormData(form);

        // Show loading
        const nextBtn = document.querySelector('.btn-next');
        nextBtn.disabled = true;
        nextBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';

        // Simulate API call (replace with actual submission)
        setTimeout(() => {
            // Success
            alert('Registrasi berhasil! Akun Anda akan diverifikasi dalam 1-2 hari kerja.');
            
            // Store user data
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('userName', formData.get('full_name'));
            localStorage.setItem('userRole', formData.get('account_type'));

            // Redirect to homepage
            window.location.href = '/';
        }, 2000);
    }

    // Initialize
    showStep(currentStep);

})();