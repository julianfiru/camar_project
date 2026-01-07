// =====================================
// ARSIP VERIFIKASI - JAVASCRIPT
// =====================================

// =====================================
// FILTER BY PERIOD
// =====================================
document.getElementById('filterPeriod')?.addEventListener('change', function() {
    filterTable();
});

// =====================================
// FILTER BY TYPE
// =====================================
document.getElementById('filterType')?.addEventListener('change', function() {
    filterTable();
});

// =====================================
// FILTER BY AUDITOR
// =====================================
document.getElementById('filterAuditor')?.addEventListener('change', function() {
    filterTable();
});

// =====================================
// SEARCH FUNCTIONALITY
// =====================================
document.getElementById('searchBox')?.addEventListener('input', function() {
    filterTable();
});

// =====================================
// FILTER TABLE FUNCTION
// =====================================
function filterTable() {
    const periodFilter = document.getElementById('filterPeriod')?.value || '';
    const typeFilter = document.getElementById('filterType')?.value || '';
    const auditorFilter = document.getElementById('filterAuditor')?.value || '';
    const searchTerm = document.getElementById('searchBox')?.value.toLowerCase() || '';
    
    const rows = document.querySelectorAll('.archive-table tbody tr');
    let visibleCount = 0;
    
    rows.forEach(row => {
        const year = row.dataset.year || '';
        const type = row.dataset.type || '';
        const auditor = row.dataset.auditor || '';
        const text = row.textContent.toLowerCase();
        
        let show = true;
        
        // Filter by period
        if (periodFilter && year !== periodFilter) {
            show = false;
        }
        
        // Filter by type
        if (typeFilter && type !== typeFilter) {
            show = false;
        }
        
        // Filter by auditor
        if (auditorFilter && auditor !== auditorFilter) {
            show = false;
        }
        
        // Filter by search
        if (searchTerm && !text.includes(searchTerm)) {
            show = false;
        }
        
        row.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });
    
    // Update pagination info
    updatePaginationInfo(visibleCount);
}

// =====================================
// UPDATE PAGINATION INFO
// =====================================
function updatePaginationInfo(visibleCount) {
    const showingEnd = document.getElementById('showingEnd');
    const totalRecords = document.getElementById('totalRecords');
    
    if (showingEnd) {
        showingEnd.textContent = visibleCount;
    }
    
    // In production, totalRecords would be the actual total from backend
}

// =====================================
// VIEW DETAILS
// =====================================
function viewDetails(verificationId) {
    console.log('Viewing details for verification:', verificationId);
    
    // TODO: Fetch actual data from backend
    // fetch(`/auditor/arsip-verifikasi/${verificationId}`)
    //     .then(response => response.json())
    //     .then(data => {
    //         populateModal(data);
    //         openDetailModal();
    //     });
    
    // For now, just open modal with static data
    openDetailModal();
}

// =====================================
// OPEN DETAIL MODAL
// =====================================
function openDetailModal() {
    const modal = document.getElementById('detailModal');
    if (modal) {
        modal.classList.add('active');
    }
}

// =====================================
// CLOSE DETAIL MODAL
// =====================================
function closeDetailModal() {
    const modal = document.getElementById('detailModal');
    if (modal) {
        modal.classList.remove('active');
    }
}

// Close modal on outside click
document.getElementById('detailModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetailModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDetailModal();
    }
});

// =====================================
// DOWNLOAD REPORT
// =====================================
function downloadReport(verificationId) {
    console.log('Downloading report for verification:', verificationId);
    
    // Show notification
    showNotification('success', '📥 Downloading verification report...');
    
    // TODO: Actual download from backend
    // window.location.href = `/auditor/arsip-verifikasi/${verificationId}/download`;
    
    // Simulate download
    setTimeout(() => {
        showNotification('success', '✅ Report downloaded successfully!');
    }, 1000);
}

// =====================================
// DOWNLOAD DOCUMENT
// =====================================
function downloadDocument(documentType) {
    console.log('Downloading document:', documentType);
    
    showNotification('success', `📥 Downloading ${documentType}...`);
    
    // TODO: Actual download
    setTimeout(() => {
        showNotification('success', '✅ Document downloaded!');
    }, 1000);
}

// =====================================
// EXPORT DATA
// =====================================
document.getElementById('exportBtn')?.addEventListener('click', function() {
    console.log('Exporting archive data...');
    
    // Show options dialog
    const format = prompt('Export format (excel/csv/pdf):', 'excel');
    
    if (format && ['excel', 'csv', 'pdf'].includes(format.toLowerCase())) {
        showNotification('success', `📊 Exporting data as ${format.toUpperCase()}...`);
        
        // TODO: Actual export to backend
        // fetch('/auditor/arsip-verifikasi/export', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //     },
        //     body: JSON.stringify({
        //         format: format,
        //         filters: {
        //             period: document.getElementById('filterPeriod')?.value,
        //             type: document.getElementById('filterType')?.value,
        //             auditor: document.getElementById('filterAuditor')?.value
        //         }
        //     })
        // });
        
        setTimeout(() => {
            showNotification('success', '✅ Export completed! File downloaded.');
        }, 2000);
    } else if (format !== null) {
        showNotification('error', '❌ Invalid format. Please choose: excel, csv, or pdf');
    }
});

// =====================================
// PAGINATION
// =====================================
let currentPage = 1;
const rowsPerPage = 5;

document.getElementById('prevBtn')?.addEventListener('click', function() {
    if (currentPage > 1) {
        currentPage--;
        updateTableDisplay();
    }
});

document.getElementById('nextBtn')?.addEventListener('click', function() {
    const totalRows = document.querySelectorAll('.archive-table tbody tr').length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    
    if (currentPage < totalPages) {
        currentPage++;
        updateTableDisplay();
    }
});

function updateTableDisplay() {
    const rows = document.querySelectorAll('.archive-table tbody tr');
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    
    rows.forEach((row, index) => {
        if (index >= start && index < end) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
    
    // Update pagination info
    document.getElementById('showingStart').textContent = start + 1;
    document.getElementById('showingEnd').textContent = Math.min(end, rows.length);
    document.getElementById('totalRecords').textContent = rows.length;
    
    // Update button states
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    
    if (prevBtn) {
        prevBtn.disabled = currentPage === 1;
    }
    
    if (nextBtn) {
        nextBtn.disabled = currentPage === totalPages;
    }
}

// Initialize table display
window.addEventListener('load', function() {
    updateTableDisplay();
});

// =====================================
// POPULATE MODAL WITH DATA
// =====================================
function populateModal(data) {
    // Project Info
    document.getElementById('modalProjectName').textContent = data.project_name || '';
    document.getElementById('detailProjectId').textContent = data.project_id || '';
    document.getElementById('detailSeller').textContent = data.seller_name || '';
    document.getElementById('detailType').textContent = data.project_type || '';
    document.getElementById('detailLocation').textContent = data.location || '';
    
    // Verification Results
    document.getElementById('detailClaimedEmission').textContent = data.claimed_emission + ' ton CO₂' || '';
    document.getElementById('detailVerifiedEmission').textContent = data.verified_emission + ' ton CO₂' || '';
    document.getElementById('detailConfidence').textContent = data.confidence_level || '';
    document.getElementById('detailUncertainty').textContent = '±' + data.uncertainty_range + '%' || '';
    
    // Auditor Info
    document.getElementById('detailAuditor').textContent = data.auditor_name || '';
    document.getElementById('detailDate').textContent = data.verification_date || '';
    document.getElementById('detailPeriod').textContent = data.mrv_period || '';
}

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
// TABLE SORTING (OPTIONAL)
// =====================================
function sortTable(columnIndex, direction = 'asc') {
    const table = document.querySelector('.archive-table tbody');
    const rows = Array.from(table.querySelectorAll('tr'));
    
    rows.sort((a, b) => {
        const aValue = a.cells[columnIndex].textContent.trim();
        const bValue = b.cells[columnIndex].textContent.trim();
        
        if (direction === 'asc') {
            return aValue.localeCompare(bValue);
        } else {
            return bValue.localeCompare(aValue);
        }
    });
    
    // Clear and re-append sorted rows
    rows.forEach(row => table.appendChild(row));
}

// Add click handlers to table headers for sorting
document.querySelectorAll('.archive-table th').forEach((th, index) => {
    th.style.cursor = 'pointer';
    th.addEventListener('click', function() {
        const currentDirection = this.dataset.sortDirection || 'asc';
        const newDirection = currentDirection === 'asc' ? 'desc' : 'asc';
        
        // Update arrow indicator
        document.querySelectorAll('.archive-table th').forEach(header => {
            header.textContent = header.textContent.replace(' ↑', '').replace(' ↓', '');
        });
        this.textContent += newDirection === 'asc' ? ' ↑' : ' ↓';
        
        this.dataset.sortDirection = newDirection;
        sortTable(index, newDirection);
    });
});

// =====================================
// CONSOLE INFO
// =====================================
console.log('🌊 CAMAR Arsip Verifikasi - JavaScript Loaded');
console.log('Available functions: viewDetails, downloadReport, downloadDocument, filterTable, showNotification');