// ========================================
// KEBIJAKAN PLATFORM - JavaScript Functions
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize smooth scroll
    initializeSmoothScroll();
    
    // Track policy section views
    trackPolicySectionViews();
    
    // Print policy functionality
    initializePrintButton();
    
    // Copy policy link
    initializeCopyLink();
    
    // Log page view for analytics
    logPolicyPageView();
    
});

// Function: Initialize smooth scroll for navigation
function initializeSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Function: Track which policy sections user views
function trackPolicySectionViews() {
    const sections = document.querySelectorAll('.card');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5 // Section must be 50% visible
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const sectionTitle = entry.target.querySelector('.section-title')?.textContent.trim();
                if (sectionTitle) {
                    console.log('User viewed section:', sectionTitle);
                    // You can send this to analytics
                    // trackSectionView(sectionTitle);
                }
            }
        });
    }, observerOptions);
    
    sections.forEach(section => {
        observer.observe(section);
    });
}

// Function: Initialize print button (if added to page)
function initializePrintButton() {
    const printButton = document.getElementById('printPolicyBtn');
    
    if (printButton) {
        printButton.addEventListener('click', function() {
            window.print();
        });
    }
}

// Function: Copy policy page link to clipboard
function initializeCopyLink() {
    const copyLinkButtons = document.querySelectorAll('[data-copy-link]');
    
    copyLinkButtons.forEach(button => {
        button.addEventListener('click', function() {
            const url = window.location.href;
            
            navigator.clipboard.writeText(url).then(() => {
                showToast('✓ Link halaman berhasil disalin');
            }).catch(err => {
                console.error('Failed to copy link:', err);
                showToast('❌ Gagal menyalin link');
            });
        });
    });
}

// Function: Log policy page view for compliance tracking
function logPolicyPageView() {
    const viewData = {
        timestamp: new Date().toISOString(),
        page: 'kebijakan',
        userAgent: navigator.userAgent,
        url: window.location.href
    };
    
    console.log('Policy page viewed:', viewData);
    
    // Example: Send to backend for compliance tracking
    /*
    fetch('/api/compliance/policy-view', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(viewData)
    }).catch(error => console.error('Error logging policy view:', error));
    */
}

// Function: Show toast notification
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

// Function: Check if user has accepted policy (for compliance)
function checkPolicyAcceptance() {
    const acceptedDate = localStorage.getItem('policy_accepted_date');
    const policyVersion = localStorage.getItem('policy_version');
    const currentVersion = '1.0'; // Should match version in page
    
    if (!acceptedDate || policyVersion !== currentVersion) {
        // User needs to accept updated policy
        console.log('User needs to accept policy version', currentVersion);
        // You can show a modal here
        // showPolicyAcceptanceModal();
    }
}

// Function: Mark policy as accepted
function acceptPolicy() {
    const currentVersion = '1.0';
    localStorage.setItem('policy_accepted_date', new Date().toISOString());
    localStorage.setItem('policy_version', currentVersion);
    
    console.log('Policy accepted, version:', currentVersion);
    
    // Send to backend
    /*
    fetch('/api/compliance/accept-policy', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            version: currentVersion,
            accepted_at: new Date().toISOString()
        })
    }).catch(error => console.error('Error recording policy acceptance:', error));
    */
}

// Function: Export policy as PDF (future feature)
function exportPolicyAsPDF() {
    // This would require a PDF generation library like jsPDF or html2pdf
    console.log('Export as PDF functionality - to be implemented');
    showToast('Fitur ekspor PDF akan segera tersedia', 'info');
}

// Function: Search within policy (future feature)
function searchPolicy(searchTerm) {
    const normalizedSearch = searchTerm.toLowerCase().trim();
    
    if (!normalizedSearch) {
        // Clear highlights
        clearPolicyHighlights();
        return;
    }
    
    // Find and highlight matching text
    const cards = document.querySelectorAll('.card');
    let matchCount = 0;
    
    cards.forEach(card => {
        const content = card.textContent.toLowerCase();
        if (content.includes(normalizedSearch)) {
            matchCount++;
            // Add highlight or scroll to match
            card.classList.add('search-match');
        } else {
            card.classList.remove('search-match');
        }
    });
    
    console.log(`Found ${matchCount} matches for "${searchTerm}"`);
    return matchCount;
}

// Function: Clear policy search highlights
function clearPolicyHighlights() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.classList.remove('search-match');
    });
}

// Export functions for external use
window.KebijakanHelpers = {
    showToast,
    acceptPolicy,
    checkPolicyAcceptance,
    exportPolicyAsPDF,
    searchPolicy,
    clearPolicyHighlights
};