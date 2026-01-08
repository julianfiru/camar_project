// ========================================
// LAPORAN PAGE - JAVASCRIPT (MATCHED)
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Filter Elements
    const filterJenis = document.getElementById('filterJenis');
    const filterPeriode = document.getElementById('filterPeriode');
    const filterSort = document.getElementById('filterSort');
    const laporanList = document.getElementById('laporanList');
    const noDataMessage = document.getElementById('noDataMessage');

    // Download Buttons - menggunakan class yang sesuai dengan blade
    const downloadButtons = document.querySelectorAll('.laporan-btn-download');
    const previewButtons = document.querySelectorAll('.laporan-btn-preview');
    const shareButtons = document.querySelectorAll('.laporan-btn-share');

    // ========================================
    // FILTER FUNCTIONALITY
    // ========================================
    
    function applyFilters() {
        const jenisValue = filterJenis.value.toLowerCase();
        const periodeValue = filterPeriode.value;
        const sortValue = filterSort.value;
        
        const reportItems = Array.from(document.querySelectorAll('.laporan-report-item'));
        let visibleCount = 0;

        // Filter reports
        reportItems.forEach(item => {
            const itemType = item.getAttribute('data-type');
            const itemYear = item.getAttribute('data-year');
            
            let showItem = true;

            // Filter by type
            if (jenisValue && itemType !== jenisValue) {
                showItem = false;
            }

            // Filter by period
            if (periodeValue && itemYear !== periodeValue) {
                showItem = false;
            }

            // Show/hide item
            if (showItem) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Sort visible reports
        sortReports(reportItems.filter(item => item.style.display !== 'none'), sortValue);

        // Show/hide no data message
        if (visibleCount === 0) {
            laporanList.classList.add('d-none');
            noDataMessage.classList.remove('d-none');
        } else {
            laporanList.classList.remove('d-none');
            noDataMessage.classList.add('d-none');
        }

        // Update count
        updateReportCount(visibleCount);
    }

    function sortReports(items, sortBy) {
        const parent = laporanList;
        
        items.sort((a, b) => {
            const titleA = a.querySelector('.laporan-report-title').textContent;
            const titleB = b.querySelector('.laporan-report-title').textContent;
            const dateA = a.querySelector('.laporan-report-meta').textContent;
            const dateB = b.querySelector('.laporan-report-meta').textContent;

            switch(sortBy) {
                case 'newest':
                    return dateB.localeCompare(dateA);
                case 'oldest':
                    return dateA.localeCompare(dateB);
                case 'type':
                    return titleA.localeCompare(titleB);
                default:
                    return 0;
            }
        });

        // Reorder DOM
        items.forEach(item => parent.appendChild(item));
    }

    function updateReportCount(count) {
        const titleElement = document.querySelector('.laporan-section-title');
        if (titleElement) {
            titleElement.textContent = `Daftar Laporan (${count})`;
        }
    }

    // ========================================
    // EVENT LISTENERS - FILTERS
    // ========================================
    
    if (filterJenis) {
        filterJenis.addEventListener('change', applyFilters);
    }

    if (filterPeriode) {
        filterPeriode.addEventListener('change', applyFilters);
    }

    if (filterSort) {
        filterSort.addEventListener('change', applyFilters);
    }

    // ========================================
    // DOWNLOAD FUNCTIONALITY
    // ========================================
    
    downloadButtons.forEach(button => {
        button.addEventListener('click', function() {
            const reportItem = this.closest('.laporan-report-item');
            const reportTitle = reportItem.querySelector('.laporan-report-title').textContent;
            
            // Show loading state
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mengunduh...';
            this.disabled = true;

            // Simulate download delay
            setTimeout(() => {
                showLaporanToast('success', `Laporan "${reportTitle}" berhasil diunduh!`);
                this.innerHTML = originalText;
                this.disabled = false;
            }, 1500);
        });
    });

    // ========================================
    // PREVIEW FUNCTIONALITY
    // ========================================
    
    previewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const reportItem = this.closest('.laporan-report-item');
            const reportTitle = reportItem.querySelector('.laporan-report-title').textContent;
            
            showLaporanToast('info', `Membuka preview "${reportTitle}"...`);
            
            // Here you would typically open a modal or new window
            console.log('Preview:', reportTitle);
        });
    });

    // ========================================
    // SHARE FUNCTIONALITY
    // ========================================
    
    shareButtons.forEach(button => {
        button.addEventListener('click', function() {
            const reportItem = this.closest('.laporan-report-item');
            const reportTitle = reportItem.querySelector('.laporan-report-title').textContent;
            
            // Simple share functionality
            if (navigator.share) {
                navigator.share({
                    title: reportTitle,
                    text: `Lihat laporan: ${reportTitle}`,
                    url: window.location.href
                }).then(() => {
                    showLaporanToast('success', 'Laporan berhasil dibagikan!');
                }).catch(err => {
                    console.log('Share failed:', err);
                });
            } else {
                // Fallback: copy link to clipboard
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    showLaporanToast('success', 'Link laporan berhasil disalin ke clipboard!');
                }).catch(err => {
                    console.log('Copy failed:', err);
                });
            }
        });
    });

    // ========================================
    // TOAST NOTIFICATION
    // ========================================
    
    function showLaporanToast(type, message) {
        // Remove existing toasts
        const existingToasts = document.querySelectorAll('.laporan-custom-toast');
        existingToasts.forEach(toast => toast.remove());

        // Create toast
        const toast = document.createElement('div');
        toast.className = `laporan-custom-toast laporan-toast-${type}`;
        
        const icons = {
            success: '✓',
            error: '✕',
            info: 'ℹ',
            warning: '⚠'
        };

        toast.innerHTML = `
            <span class="laporan-toast-icon">${icons[type] || 'ℹ'}</span>
            <span class="laporan-toast-message">${message}</span>
        `;

        document.body.appendChild(toast);

        // Auto remove after 3 seconds
        setTimeout(() => {
            toast.style.animation = 'laporanSlideOut 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // ========================================
    // STATISTICS ANIMATION
    // ========================================
    
    function animateLaporanStats() {
        const statValues = document.querySelectorAll('.laporan-stat-value');
        
        statValues.forEach(stat => {
            const value = parseInt(stat.textContent);
            if (isNaN(value)) return;
            
            let current = 0;
            const increment = value / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= value) {
                    stat.textContent = value;
                    clearInterval(timer);
                } else {
                    stat.textContent = Math.floor(current);
                }
            }, 20);
        });
    }

    // Run animation on page load
    animateLaporanStats();

});