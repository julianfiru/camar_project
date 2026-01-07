// =====================================
// SHARED NAVIGATION SCRIPT
// =====================================
// File ini bisa di-include di app.blade.php
// untuk handle navigasi di semua halaman

/**
 * IMPORTANT: 
 * Kita TIDAK menggunakan JavaScript untuk handle active state
 * karena sudah di-handle oleh Laravel di sidebar.blade.php
 * 
 * Active state menggunakan:
 * - Request::is('auditor/dashboard') untuk URL-based routing
 * - Request::routeIs('auditor.dashboard') untuk named routing
 */

// =====================================
// MOBILE MENU TOGGLE (untuk responsive)
// =====================================
function initMobileMenu() {
    const menuButton = document.getElementById('mobile-menu-btn');
    const sidebar = document.querySelector('.sidebar');
    
    if (menuButton && sidebar) {
        menuButton.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
        
        // Close sidebar when clicking outside
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !menuButton.contains(e.target)) {
                sidebar.classList.remove('open');
            }
        });
    }
}

// Initialize on load
if (window.innerWidth <= 1024) {
    initMobileMenu();
}

// =====================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// =====================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#') {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});

// =====================================
// PAGE TRANSITION EFFECT
// =====================================
window.addEventListener('beforeunload', () => {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
});

// =====================================
// LOADING INDICATOR
// =====================================
function showLoadingIndicator() {
    const loader = document.createElement('div');
    loader.id = 'page-loader';
    loader.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--green);
        transform-origin: left;
        animation: loadProgress 2s ease-out;
        z-index: 9999;
    `;
    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes loadProgress {
            0% { transform: scaleX(0); }
            50% { transform: scaleX(0.7); }
            100% { transform: scaleX(1); opacity: 0; }
        }
    `;
    
    document.head.appendChild(style);
    document.body.appendChild(loader);
    
    setTimeout(() => {
        loader.remove();
        style.remove();
    }, 2000);
}

// Show loader on navigation
window.addEventListener('load', showLoadingIndicator);