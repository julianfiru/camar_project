// =====================================
// MENUNGGU VERIFIKASI - JAVASCRIPT
// =====================================

// =====================================
// FILTER BY TYPE
// =====================================
document.getElementById('filterType')?.addEventListener('change', function() {
    const selectedType = this.value;
    const cards = document.querySelectorAll('.project-card');
    
    cards.forEach(card => {
        const cardType = card.dataset.type;
        
        if (selectedType === 'Semua Tipe' || cardType === selectedType) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});

// =====================================
// FILTER BY DURATION
// =====================================
document.getElementById('filterDuration')?.addEventListener('change', function() {
    const selectedDuration = this.value;
    const cards = document.querySelectorAll('.project-card');
    
    cards.forEach(card => {
        const cardDuration = card.dataset.duration;
        
        if (selectedDuration === 'Semua Durasi') {
            card.style.display = 'block';
        } else {
            const durationYear = selectedDuration.split(' ')[0]; // Get "1", "2", or "3"
            if (cardDuration === durationYear) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }
    });
});

// =====================================
// SEARCH FUNCTIONALITY
// =====================================
document.getElementById('searchBox')?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const cards = document.querySelectorAll('.project-card');
    
    cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        card.style.display = text.includes(searchTerm) ? 'block' : 'none';
    });
});

// =====================================
// MODAL FUNCTIONS
// =====================================
let selectedProjectData = null;

function openVerificationModal(projectName, projectCard) {
    const modal = document.getElementById('verificationModal');
    if (modal) {
        // Store project data for later use
        if (projectCard) {
            selectedProjectData = {
                name: projectCard.querySelector('.project-name')?.textContent || projectName || '',
                type: projectCard.dataset.type || '',
                seller: projectCard.querySelector('.meta-item span:nth-child(2)')?.textContent || '',
                capacity: projectCard.querySelector('.detail-value.highlight')?.textContent || ''
            };
        }
        
        // Update modal subtitle with project name
        const subtitle = modal.querySelector('.modal-subtitle');
        if (subtitle && selectedProjectData) {
            subtitle.textContent = `Anda akan memulai verifikasi untuk proyek: ${selectedProjectData.name}`;
        }
        
        modal.classList.add('active');
    }
}

function closeVerificationModal() {
    const modal = document.getElementById('verificationModal');
    if (modal) {
        modal.classList.remove('active');
    }
}

function goToVerificationForm() {
    // Show notification
    if (typeof showNotification === 'function') {
        showNotification('info', '🔄 Membuka form verifikasi...');
    }
    
    // Close modal
    closeVerificationModal();
    
    // Redirect to verification page
    setTimeout(() => {
        window.location.href = '/auditor/verifikasi-proyek';
    }, 300);
}

// Close modal when clicking outside
document.getElementById('verificationModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeVerificationModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVerificationModal();
    }
});

// =====================================
// CAPACITY BAR ANIMATION ON LOAD
// =====================================
window.addEventListener('load', () => {
    const capacityBars = document.querySelectorAll('.capacity-fill');
    
    capacityBars.forEach(bar => {
        const targetWidth = bar.style.width;
        bar.style.width = '0%';
        
        setTimeout(() => {
            bar.style.width = targetWidth;
        }, 100);
    });
});

// =====================================
// PROJECT CARD CLICK (OPTIONAL)
// =====================================
document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('click', function(e) {
        // Don't trigger if clicking on buttons or links
        if (e.target.closest('.btn') || e.target.closest('.document-link')) {
            return;
        }
        
        // Optional: Navigate to detail page or expand card
        console.log('Project card clicked:', this.querySelector('.project-name').textContent);
    });
});

// =====================================
// DOCUMENT LINK HANDLER
// =====================================
document.querySelectorAll('.document-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        // TODO: Open document in new tab or modal
        console.log('Opening document...');
        alert('Document viewer will open here');
    });
});

// =====================================
// CONSOLE INFO
// =====================================
console.log('🌊 CAMAR Menunggu Verifikasi - JavaScript Loaded');
console.log('Available functions: openVerificationModal, closeVerificationModal, goToVerificationForm');

// =====================================
// NOTIFICATION SYSTEM
// =====================================
function showNotification(type, message) {
    // Remove existing notifications
    const existing = document.querySelector('.notification');
    if (existing) {
        existing.remove();
    }
    
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            ${message}
        </div>
    `;
    
    // Add styles if not already added
    if (!document.getElementById('notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'notification-styles';
        styles.textContent = `
            .notification {
                position: fixed;
                top: 2rem;
                right: 2rem;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                background: var(--gradient-card);
                border: 1px solid var(--glass-border);
                backdrop-filter: blur(10px);
                z-index: 9999;
                animation: slideInRight 0.3s ease;
                max-width: 400px;
            }
            
            .notification-success {
                border-color: var(--green);
            }
            
            .notification-error {
                border-color: #EF5350;
            }
            
            .notification-info {
                border-color: var(--teal);
            }
            
            .notification-content {
                color: var(--text-main);
                font-weight: 500;
            }
            
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(styles);
    }
    
    // Add to document
    document.body.appendChild(notification);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideInRight 0.3s ease reverse';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// =====================================
// BUTTON HANDLERS - Update onclick events
// =====================================
window.addEventListener('load', function() {
    // Handle "Mulai Verifikasi" buttons
    document.querySelectorAll('.btn-primary').forEach(btn => {
        if (btn.textContent.includes('Mulai Verifikasi')) {
            btn.onclick = function(e) {
                e.stopPropagation();
                const card = this.closest('.project-card');
                openVerificationModal(null, card);
            };
        } else if (btn.textContent.includes('Lanjut ke Form')) {
            btn.onclick = function(e) {
                e.preventDefault();
                goToVerificationForm();
            };
        }
    });
    
    // Handle "Detail Lengkap" buttons
    document.querySelectorAll('.btn-secondary').forEach(btn => {
        if (btn.textContent.includes('Detail Lengkap')) {
            btn.onclick = function(e) {
                e.stopPropagation();
                const card = this.closest('.project-card');
                const projectName = card.querySelector('.project-name')?.textContent || '';
                
                showNotification('info', `📋 Membuka detail proyek "${projectName}"...`);
                
                // You can either:
                // 1. Open a detail modal (implement openDetailModal function)
                // 2. Redirect to detail page
                setTimeout(() => {
                    // For now, redirect to menunggu-verifikasi (same page)
                    // In production, redirect to actual detail page
                    console.log('Opening detail for:', projectName);
                }, 300);
            };
        }
    });
});