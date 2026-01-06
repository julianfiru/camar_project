// ========================================
// SIDEBAR MOBILE TOGGLE FUNCTIONALITY
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    
    // Toggle sidebar on mobile
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 992) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = sidebarToggle && sidebarToggle.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('mobile-open')) {
                sidebar.classList.remove('mobile-open');
            }
        }
    });
    
    // Close sidebar when clicking on a link (on mobile)
    const sidebarLinks = document.querySelectorAll('.sidebar .nav-link:not([data-bs-toggle="collapse"])');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 992) {
                sidebar.classList.remove('mobile-open');
            }
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            sidebar.classList.remove('mobile-open');
        }
    });
});