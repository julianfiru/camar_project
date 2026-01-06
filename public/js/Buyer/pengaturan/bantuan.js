// ========================================
// PUSAT BANTUAN - JavaScript Functions
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize Bootstrap Accordion
    initializeAccordion();
    
    // Smooth scroll for internal links
    initializeSmoothScroll();
    
    // Contact email validation
    initializeEmailValidation();
    
});

// Function: Initialize Accordion with custom behavior
function initializeAccordion() {
    const accordionButtons = document.querySelectorAll('.accordion-button');
    
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Add smooth transition
            const target = this.getAttribute('data-bs-target');
            const collapse = document.querySelector(target);
            
            if (collapse) {
                // Log for analytics (optional)
                const faqTitle = this.querySelector('span').textContent;
                console.log('FAQ opened:', faqTitle);
                
                // You can send analytics here
                // trackFAQClick(faqTitle);
            }
        });
    });
}

// Function: Smooth scroll for anchor links
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

// Function: Email validation for contact
function initializeEmailValidation() {
    const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
    
    emailLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const email = this.getAttribute('href').replace('mailto:', '');
            console.log('Opening email client for:', email);
            
            // You can add additional tracking or confirmation here
            // For example, show a toast notification
            showContactToast('Membuka aplikasi email Anda...');
        });
    });
}

// Function: Show contact toast notification
function showContactToast(message) {
    // Check if Bootstrap Toast is available
    if (typeof bootstrap === 'undefined') return;
    
    // Create toast element if doesn't exist
    let toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
        document.body.appendChild(toastContainer);
    }
    
    // Create toast
    const toastHTML = `
        <div class="toast align-items-center text-white bg-primary border-0" role="alert">
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

// Function: Track FAQ interactions (for analytics)
function trackFAQClick(faqTitle) {
    // Example: Send to Google Analytics
    /*
    if (typeof gtag !== 'undefined') {
        gtag('event', 'faq_click', {
            'event_category': 'FAQ',
            'event_label': faqTitle
        });
    }
    */
    
    // Example: Send to backend analytics
    /*
    fetch('/api/analytics/faq-click', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            faq_title: faqTitle,
            timestamp: new Date().toISOString()
        })
    }).catch(error => console.error('Analytics error:', error));
    */
}

// Function: Search FAQ (untuk future feature)
function searchFAQ(searchTerm) {
    const accordionItems = document.querySelectorAll('.accordion-item');
    const normalizedSearch = searchTerm.toLowerCase().trim();
    
    if (!normalizedSearch) {
        // Show all items if search is empty
        accordionItems.forEach(item => {
            item.style.display = 'block';
        });
        return;
    }
    
    let matchCount = 0;
    
    accordionItems.forEach(item => {
        const button = item.querySelector('.accordion-button');
        const body = item.querySelector('.accordion-body');
        
        const titleText = button.textContent.toLowerCase();
        const bodyText = body.textContent.toLowerCase();
        
        if (titleText.includes(normalizedSearch) || bodyText.includes(normalizedSearch)) {
            item.style.display = 'block';
            matchCount++;
        } else {
            item.style.display = 'none';
        }
    });
    
    // Show "no results" message if needed
    if (matchCount === 0) {
        console.log('No FAQ results found for:', searchTerm);
        // You can show a "no results" message here
    }
}

// Function: Export FAQ data (untuk future feature)
function exportFAQData() {
    const faqData = [];
    const accordionItems = document.querySelectorAll('.accordion-item');
    
    accordionItems.forEach((item, index) => {
        const button = item.querySelector('.accordion-button');
        const body = item.querySelector('.accordion-body');
        
        faqData.push({
            id: index + 1,
            question: button.querySelector('span').textContent.trim(),
            answer: body.textContent.trim()
        });
    });
    
    console.log('FAQ Data:', faqData);
    return faqData;
}

// Function: Print page
function printHelpPage() {
    window.print();
}

// Function: Copy email to clipboard
function copyEmailToClipboard(email) {
    navigator.clipboard.writeText(email).then(() => {
        showContactToast('✓ Email berhasil disalin: ' + email);
    }).catch(err => {
        console.error('Failed to copy email:', err);
        showContactToast('❌ Gagal menyalin email');
    });
}

// Export functions for external use
window.BantuanHelpers = {
    searchFAQ,
    exportFAQData,
    printHelpPage,
    copyEmailToClipboard,
    trackFAQClick
};