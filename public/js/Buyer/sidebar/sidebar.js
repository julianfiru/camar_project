// ========================================
// SIDEBAR MOBILE TOGGLE FUNCTIONALITY (NAMESPACED)
// Prefix: sb- (sidebar)
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    const sbSidebar = document.querySelector('.sb-sidebar');
    const sbSidebarToggle = document.getElementById('sb-sidebarToggle');
    
    // Toggle sidebar on mobile
    if (sbSidebarToggle) {
        sbSidebarToggle.addEventListener('click', function() {
            sbSidebar.classList.toggle('sb-mobile-open');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 992) {
            const isClickInsideSbSidebar = sbSidebar.contains(event.target);
            const isClickOnSbToggle = sbSidebarToggle && sbSidebarToggle.contains(event.target);
            
            if (!isClickInsideSbSidebar && !isClickOnSbToggle && sbSidebar.classList.contains('sb-mobile-open')) {
                sbSidebar.classList.remove('sb-mobile-open');
            }
        }
    });
    
    // Close sidebar when clicking on a link (on mobile)
    const sbSidebarLinks = document.querySelectorAll('.sb-sidebar .sb-nav-link:not([data-bs-toggle="collapse"])');
    sbSidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 992) {
                sbSidebar.classList.remove('sb-mobile-open');
            }
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 992) {
            sbSidebar.classList.remove('sb-mobile-open');
        }
    });
});