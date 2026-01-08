// ========================================
// PROFIL PERUSAHAAN - JAVASCRIPT
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    console.log('Halaman Profil Perusahaan berhasil dimuat');
    
});

// Function to edit company profile (if needed)
function editProfile() {
    window.location.href = '/buyer/profil/edit';
}