/**
 * Login Page JavaScript
 */

(function() {
    'use strict';

    // Toggle Password Visibility
    window.togglePassword = function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    };

    // Form Submission
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            
            // Show loading state
            const submitBtn = this.querySelector('.btn-login');
            const btnText = submitBtn.querySelector('span');
            const btnIcon = submitBtn.querySelector('i');
            
            btnText.textContent = 'Memproses...';
            btnIcon.classList.remove('fa-arrow-right');
            btnIcon.classList.add('fa-spinner', 'fa-spin');
            submitBtn.disabled = true;
            
            // Simulate API call (replace with actual authentication)
            setTimeout(() => {
                // In production, replace this with actual authentication logic
                if (email && password) {
                    // Store login state
                    if (remember) {
                        localStorage.setItem('rememberMe', 'true');
                        localStorage.setItem('userEmail', email);
                    }
                    
                    localStorage.setItem('isLoggedIn', 'true');
                    localStorage.setItem('userName', email.split('@')[0]);
                    
                    // Success state
                    btnText.textContent = 'Berhasil!';
                    btnIcon.classList.remove('fa-spinner', 'fa-spin');
                    btnIcon.classList.add('fa-check');
                    
                    // Redirect to homepage
                    setTimeout(() => {
                        window.location.href = '/';
                    }, 500);
                } else {
                    // Error state
                    btnText.textContent = 'Masuk';
                    btnIcon.classList.remove('fa-spinner', 'fa-spin');
                    btnIcon.classList.add('fa-arrow-right');
                    submitBtn.disabled = false;
                    
                    alert('Email atau password salah!');
                }
            }, 1500);
        });
    }

    // Check if user has remembered credentials
    const rememberMe = localStorage.getItem('rememberMe');
    const userEmail = localStorage.getItem('userEmail');
    
    if (rememberMe === 'true' && userEmail) {
        const emailInput = document.getElementById('email');
        const rememberCheckbox = document.getElementById('remember');
        
        if (emailInput) emailInput.value = userEmail;
        if (rememberCheckbox) rememberCheckbox.checked = true;
    }

    // Input Focus Animation
    const inputs = document.querySelectorAll('.form-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });

    // Prevent form submission on Enter in password field (optional)
    const passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                loginForm.dispatchEvent(new Event('submit'));
            }
        });
    }

})();