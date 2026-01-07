// =====================================
// DASHBOARD - JAVASCRIPT COMPLETE
// =====================================

// =====================================
// NAVIGATION - FIXED VERSION
// =====================================
// Catatan: Active state di-handle oleh Laravel di sidebar.blade.php
// menggunakan Request::is() atau Request::routeIs()

// =====================================
// FILTER BUTTONS
// =====================================
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const parent = this.closest('.filter-group');
        if (parent) {
            parent.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter logic untuk "Prioritas Tinggi"
            if (this.textContent.includes('Prioritas')) {
                filterByPriority();
            } else if (this.textContent.includes('Lihat Semua')) {
                // Redirect ke Arsip Verifikasi
                window.location.href = '/auditor/arsip-verifikasi';
            } else {
                showAllProjects();
            }
        }
    });
});

function filterByPriority() {
    const rows = document.querySelectorAll('.projects-table tbody tr');
    rows.forEach(row => {
        // Logic: Prioritas tinggi jika kapasitas > 20,000 ton
        const capacityText = row.cells[2]?.textContent || '';
        const capacity = parseInt(capacityText.replace(/[^0-9]/g, ''));
        row.style.display = capacity > 20000 ? '' : 'none';
    });
}

function showAllProjects() {
    const rows = document.querySelectorAll('.projects-table tbody tr');
    rows.forEach(row => {
        row.style.display = '';
    });
}

// =====================================
// TABLE ROW CLICK - SHOW PROJECT DETAIL
// =====================================
document.querySelectorAll('.projects-table tbody tr').forEach(row => {
    row.addEventListener('click', function(e) {
        // Jangan open modal jika klik action button
        if (!e.target.closest('.action-btn')) {
            const projectName = this.querySelector('.project-name')?.textContent || '';
            const projectType = this.querySelector('.project-type')?.textContent || '';
            const seller = this.cells[1]?.textContent || '';
            const capacity = this.cells[2]?.querySelector('div')?.textContent || '';
            const available = this.cells[3]?.textContent || '';
            const status = this.querySelector('.status-badge')?.textContent || '';
            const duration = this.cells[5]?.textContent || '';
            
            openProjectDetailModal({
                name: projectName,
                type: projectType,
                seller: seller,
                capacity: capacity,
                available: available,
                status: status,
                duration: duration
            });
        }
    });
});

// =====================================
// ACTION BUTTONS
// =====================================
document.querySelectorAll('.action-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.stopPropagation(); // Stop event bubbling
        
        const action = this.textContent.trim();
        const row = this.closest('tr');
        const projectName = row.querySelector('.project-name')?.textContent || '';
        
        if (action === 'Verifikasi') {
            // Redirect ke halaman Verifikasi Proyek
            // Dalam production, gunakan project_id dari data attribute
            showNotification('info', `🔄 Membuka halaman verifikasi untuk "${projectName}"...`);
            
            setTimeout(() => {
                window.location.href = '/auditor/verifikasi-proyek';
            }, 500);
            
        } else if (action === 'Lihat Laporan') {
            // Open modal untuk lihat detail verifikasi
            openVerificationReportModal(projectName, row);
        }
    });
});

// =====================================
// PROJECT DETAIL MODAL
// =====================================
function openProjectDetailModal(data) {
    // Create modal if not exists
    let modal = document.getElementById('projectDetailModal');
    if (!modal) {
        modal = createProjectDetailModal();
        document.body.appendChild(modal);
    }
    
    // Populate data
    modal.querySelector('#modalProjectName').textContent = data.name;
    modal.querySelector('#modalProjectType').textContent = data.type;
    modal.querySelector('#modalSeller').textContent = data.seller;
    modal.querySelector('#modalCapacity').textContent = data.capacity;
    modal.querySelector('#modalAvailable').textContent = data.available;
    modal.querySelector('#modalStatus').innerHTML = `<span class="status-badge ${data.status.toLowerCase()}">${data.status}</span>`;
    modal.querySelector('#modalDuration').textContent = data.duration;
    
    // Show modal
    modal.classList.add('active');
}

function createProjectDetailModal() {
    const modal = document.createElement('div');
    modal.id = 'projectDetailModal';
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <button class="modal-close" onclick="closeProjectDetailModal()">×</button>
            <div class="modal-header">
                <h2 class="modal-title" id="modalProjectName">Project Name</h2>
                <p class="modal-subtitle" id="modalProjectType">Project Type</p>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">Seller</div>
                        <div class="detail-value" id="modalSeller">-</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Total Kapasitas</div>
                        <div class="detail-value" id="modalCapacity">-</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Tersedia</div>
                        <div class="detail-value" id="modalAvailable">-</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value" id="modalStatus">-</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Durasi</div>
                        <div class="detail-value" id="modalDuration">-</div>
                    </div>
                </div>
            </div>
            <div class="modal-actions">
                <button class="btn btn-secondary" onclick="closeProjectDetailModal()">Tutup</button>
                <button class="btn btn-primary" onclick="goToVerification()">
                    ✅ Mulai Verifikasi
                </button>
            </div>
        </div>
    `;
    return modal;
}

function closeProjectDetailModal() {
    const modal = document.getElementById('projectDetailModal');
    if (modal) {
        modal.classList.remove('active');
    }
}

function goToVerification() {
    closeProjectDetailModal();
    showNotification('info', '🔄 Membuka halaman verifikasi...');
    setTimeout(() => {
        window.location.href = '/auditor/verifikasi-proyek';
    }, 500);
}

// =====================================
// VERIFICATION REPORT MODAL
// =====================================
function openVerificationReportModal(projectName, row) {
    // Create modal if not exists
    let modal = document.getElementById('reportModal');
    if (!modal) {
        modal = createReportModal();
        document.body.appendChild(modal);
    }
    
    // Get data from row
    const projectType = row.querySelector('.project-type')?.textContent || '';
    const seller = row.cells[1]?.textContent || '';
    const emission = row.cells[2]?.textContent || '';
    const status = row.querySelector('.status-badge')?.textContent || '';
    const date = row.cells[4]?.textContent || '';
    
    // Populate modal
    modal.querySelector('#reportProjectName').textContent = projectName;
    modal.querySelector('#reportProjectType').textContent = projectType;
    modal.querySelector('#reportSeller').textContent = seller;
    modal.querySelector('#reportEmission').textContent = emission;
    modal.querySelector('#reportStatus').innerHTML = `<span class="status-badge ${status.toLowerCase()}">${status}</span>`;
    modal.querySelector('#reportDate').textContent = date;
    
    // Show modal
    modal.classList.add('active');
}

function createReportModal() {
    const modal = document.createElement('div');
    modal.id = 'reportModal';
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <button class="modal-close" onclick="closeReportModal()">×</button>
            <div class="modal-header">
                <h2 class="modal-title">📄 Detail Laporan Verifikasi</h2>
                <p class="modal-subtitle" id="reportProjectName">Project Name</p>
            </div>
            <div class="modal-body">
                <div class="detail-section">
                    <h3 class="detail-section-title">📋 Informasi Proyek</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Tipe Proyek</div>
                            <div class="detail-value" id="reportProjectType">-</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Seller</div>
                            <div class="detail-value" id="reportSeller">-</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Status</div>
                            <div class="detail-value" id="reportStatus">-</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Tanggal Verifikasi</div>
                            <div class="detail-value" id="reportDate">-</div>
                        </div>
                    </div>
                </div>
                
                <div class="detail-section">
                    <h3 class="detail-section-title">🔬 Hasil Verifikasi</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <div class="detail-label">Emisi Terverifikasi</div>
                            <div class="detail-value highlight" id="reportEmission">-</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Confidence Level</div>
                            <div class="detail-value">High (>95%)</div>
                        </div>
                    </div>
                </div>
                
                <div class="detail-section">
                    <h3 class="detail-section-title">📄 Dokumen</h3>
                    <div class="document-item">
                        <div class="document-icon">📄</div>
                        <div class="document-info">
                            <div class="document-name">Verification_Report.pdf</div>
                            <div class="document-size">2.4 MB</div>
                        </div>
                        <button class="btn-download" onclick="downloadReport()">
                            📥 Download
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-actions">
                <button class="btn btn-secondary" onclick="closeReportModal()">Tutup</button>
                <button class="btn btn-primary" onclick="viewFullReport()">
                    👁️ Lihat Detail Lengkap
                </button>
            </div>
        </div>
    `;
    return modal;
}

function closeReportModal() {
    const modal = document.getElementById('reportModal');
    if (modal) {
        modal.classList.remove('active');
    }
}

function downloadReport() {
    showNotification('success', '📥 Downloading verification report...');
    // TODO: Actual download from backend
    setTimeout(() => {
        showNotification('success', '✅ Report downloaded successfully!');
    }, 1000);
}

function viewFullReport() {
    closeReportModal();
    showNotification('info', '🔄 Membuka detail lengkap...');
    setTimeout(() => {
        window.location.href = '/auditor/arsip-verifikasi';
    }, 500);
}

// =====================================
// SEARCH FUNCTIONALITY
// =====================================
document.querySelectorAll('.search-box').forEach(search => {
    search.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const table = this.closest('.projects-section').querySelector('tbody');
        
        if (table) {
            table.querySelectorAll('tr').forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        }
    });
});

// =====================================
// STAT CARDS - Click to Navigate
// =====================================
document.querySelectorAll('.stat-card').forEach((card, index) => {
    card.style.cursor = 'pointer';
    card.addEventListener('click', function() {
        const label = this.querySelector('.stat-label').textContent;
        
        if (label.includes('Menunggu Verifikasi')) {
            window.location.href = '/auditor/menunggu-verifikasi';
        } else if (label.includes('Pengajuan Stok')) {
            window.location.href = '/auditor/kelola-stok';
        } else if (label.includes('Terverifikasi') || label.includes('Total Proyek')) {
            window.location.href = '/auditor/arsip-verifikasi';
        }
    });
});

// =====================================
// STAT VALUE ANIMATION
// =====================================
window.addEventListener('load', () => {
    document.querySelectorAll('.stat-value').forEach((stat) => {
        const finalValue = parseInt(stat.textContent.replace(/,/g, ''));
        
        // Skip jika bukan angka
        if (isNaN(finalValue)) return;
        
        let currentValue = 0;
        const increment = finalValue / 50;
        
        const timer = setInterval(() => {
            currentValue += increment;
            if (currentValue >= finalValue) {
                stat.textContent = finalValue.toLocaleString();
                clearInterval(timer);
            } else {
                stat.textContent = Math.floor(currentValue).toLocaleString();
            }
        }, 30);
    });
});

// =====================================
// CAPACITY BAR ANIMATION
// =====================================
window.addEventListener('load', () => {
    document.querySelectorAll('.capacity-fill').forEach(bar => {
        const targetWidth = bar.style.width;
        bar.style.width = '0%';
        
        setTimeout(() => {
            bar.style.width = targetWidth;
        }, 300);
    });
});

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
// MODAL - Close on outside click & ESC
// =====================================
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
        e.target.classList.remove('active');
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal.active').forEach(modal => {
            modal.classList.remove('active');
        });
    }
});

// =====================================
// CONSOLE INFO
// =====================================
console.log('🌊 CAMAR Dashboard - JavaScript Loaded');
console.log('Available functions: openProjectDetailModal, openVerificationReportModal, showNotification');