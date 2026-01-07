// =====================================
// UPLOAD LAPORAN - JAVASCRIPT
// =====================================

// =====================================
// PROJECT DATA
// =====================================
const projects = {
    '1': {
        name: 'Reforestasi Kalimantan Timur',
        duration: 3,
        startDate: new Date('2025-01-01'),
        periods: []
    },
    '2': {
        name: 'Solar Farm Nusa Tenggara',
        duration: 2,
        startDate: new Date('2025-01-01'),
        periods: []
    },
    '3': {
        name: 'Mangrove Restoration Sulawesi',
        duration: 3,
        startDate: new Date('2025-01-01'),
        periods: []
    },
    '4': {
        name: 'Wind Power Papua',
        duration: 1,
        startDate: new Date('2025-01-01'),
        periods: []
    }
};

// =====================================
// GENERATE PERIODS DYNAMICALLY
// =====================================
function generatePeriods(projectId) {
    const project = projects[projectId];
    const totalPeriods = project.duration * 2; // 2 periods per year (6 months each)
    const periods = [];
    
    for (let i = 0; i < totalPeriods; i++) {
        const periodStart = new Date(project.startDate);
        periodStart.setMonth(periodStart.getMonth() + (i * 6));
        
        const periodEnd = new Date(periodStart);
        periodEnd.setMonth(periodEnd.getMonth() + 6);
        periodEnd.setDate(periodEnd.getDate() - 1);
        
        // Determine status (for demo purposes)
        let status = 'pending';
        if (i < 2) status = 'completed';
        else if (i === 2) status = 'current';
        
        periods.push({
            number: i + 1,
            start: periodStart,
            end: periodEnd,
            status: status,
            uploaded: status === 'completed',
            emission: status === 'completed' ? (Math.random() * 5000 + 3000).toFixed(2) : null
        });
    }
    
    return periods;
}

// =====================================
// FORMAT DATE
// =====================================
function formatDate(date) {
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
    return `${months[date.getMonth()]} ${date.getFullYear()}`;
}

// =====================================
// RENDER TIMELINE
// =====================================
function renderTimeline(projectId) {
    const project = projects[projectId];
    project.periods = generatePeriods(projectId);
    
    const timelineContent = document.getElementById('timelineContent');
    const timelineSubtitle = document.getElementById('timelineSubtitle');
    
    if (!timelineContent || !timelineSubtitle) return;
    
    timelineSubtitle.textContent = `Durasi Proyek: ${project.duration} Tahun (${project.periods.length} Periode Laporan)`;
    timelineContent.innerHTML = '';
    
    project.periods.forEach(period => {
        const markerClass = period.status === 'completed' ? 'completed' : 
                          period.status === 'current' ? 'current' : 'pending';
        const badgeClass = period.status === 'completed' ? 'completed' : 
                          period.status === 'current' ? 'current' : 'pending';
        
        const markerIcon = period.status === 'completed' ? '✓' : 
                         period.status === 'current' ? '⏳' : `${period.number}`;
        
        const badgeText = period.status === 'completed' ? '✓ Uploaded' : 
                        period.status === 'current' ? '⏳ Pending' : 'Belum Waktunya';
        
        const uploadButton = period.status === 'current' ? 
            `<button class="btn btn-primary" onclick="openUploadModal(${period.number}, '${formatDate(period.start)} - ${formatDate(period.end)}')">
                📤 Upload Laporan
            </button>` : '';
        
        const viewButton = period.uploaded ? 
            `<button class="btn btn-secondary" onclick="viewReport(${period.number})">
                👁️ Lihat Laporan
            </button>` : '';
        
        const emissionInfo = period.uploaded ? 
            `<div class="detail-item">
                <div class="detail-label">Emisi Terverifikasi</div>
                <div class="detail-value">${period.emission} ton CO₂</div>
            </div>` : '';
        
        const statusText = period.status === 'completed' ? 'Selesai' : 
                          period.status === 'current' ? 'Sedang Berjalan' : 'Menunggu';
        
        const timelineItem = `
            <div class="timeline-item">
                <div class="timeline-marker ${markerClass}">${markerIcon}</div>
                <div class="timeline-content">
                    <div class="timeline-period">
                        <div class="period-info">
                            <div class="period-label">Periode ${period.number}</div>
                            <div class="period-date">${formatDate(period.start)} - ${formatDate(period.end)}</div>
                        </div>
                        <div class="status-badge ${badgeClass}">${badgeText}</div>
                    </div>
                    <div class="timeline-details">
                        <div class="detail-item">
                            <div class="detail-label">Status</div>
                            <div class="detail-value">${statusText}</div>
                        </div>
                        ${emissionInfo}
                        <div class="detail-item">
                            <div class="detail-label">Deadline</div>
                            <div class="detail-value">${formatDate(period.end)}</div>
                        </div>
                    </div>
                    ${uploadButton || viewButton ? `<div class="timeline-actions">${uploadButton}${viewButton}</div>` : ''}
                </div>
            </div>
        `;
        
        timelineContent.innerHTML += timelineItem;
    });
}

// =====================================
// PROJECT SELECTOR CHANGE
// =====================================
document.getElementById('projectSelect')?.addEventListener('change', function() {
    const projectId = this.value;
    const timelineSection = document.getElementById('timelineSection');
    
    if (!timelineSection) return;
    
    if (projectId) {
        renderTimeline(projectId);
        timelineSection.style.display = 'block';
        
        // Smooth scroll to timeline
        setTimeout(() => {
            timelineSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 100);
    } else {
        timelineSection.style.display = 'none';
    }
});

// =====================================
// MODAL FUNCTIONS
// =====================================
function openUploadModal(periodNumber, periodDate) {
    const modalSubtitle = document.getElementById('modalSubtitle');
    const modal = document.getElementById('uploadModal');
    
    if (modalSubtitle) {
        modalSubtitle.textContent = `Periode ${periodNumber}: ${periodDate}`;
    }
    
    if (modal) {
        modal.classList.add('active');
    }
}

function closeUploadModal() {
    const modal = document.getElementById('uploadModal');
    const form = document.getElementById('uploadForm');
    const uploadedReport = document.getElementById('uploadedReport');
    
    if (modal) {
        modal.classList.remove('active');
    }
    
    if (form) {
        form.reset();
    }
    
    if (uploadedReport) {
        uploadedReport.innerHTML = '';
    }
}

// View report function
function viewReport(periodNumber) {
    // TODO: Open report viewer or download report
    console.log('Viewing report for period:', periodNumber);
    alert(`🔍 Membuka laporan Periode ${periodNumber}...`);
}

// =====================================
// FILE UPLOAD HANDLING
// =====================================
document.getElementById('reportFile')?.addEventListener('change', function() {
    const display = document.getElementById('uploadedReport');
    
    if (!display) return;
    
    display.innerHTML = '';
    
    if (this.files.length > 0) {
        const file = this.files[0];
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        
        // Check file size (max 10MB)
        if (file.size > 10 * 1024 * 1024) {
            alert('❌ File terlalu besar! Maksimal 10 MB.');
            this.value = '';
            return;
        }
        
        // Check file type
        if (file.type !== 'application/pdf') {
            alert('❌ Format file harus PDF!');
            this.value = '';
            return;
        }
        
        const fileDiv = document.createElement('div');
        fileDiv.className = 'uploaded-file';
        fileDiv.innerHTML = `
            <div class="file-icon">📄</div>
            <div class="file-info">
                <div class="file-name">${file.name}</div>
                <div class="file-size">${fileSize} MB</div>
            </div>
            <button type="button" class="remove-file" onclick="removeUploadedFile()">×</button>
        `;
        display.appendChild(fileDiv);
    }
});

function removeUploadedFile() {
    const fileInput = document.getElementById('reportFile');
    const display = document.getElementById('uploadedReport');
    
    if (fileInput) {
        fileInput.value = '';
    }
    
    if (display) {
        display.innerHTML = '';
    }
}

// =====================================
// FORM SUBMISSION
// =====================================
document.getElementById('uploadForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    const fileInput = document.getElementById('reportFile');
    const emissionInput = document.getElementById('emissionInput');
    const notesInput = document.getElementById('notesInput');
    
    if (!fileInput?.files.length) {
        alert('❌ Silakan upload file laporan PDF!');
        return;
    }
    
    if (!emissionInput?.value) {
        alert('❌ Silakan masukkan jumlah emisi terverifikasi!');
        return;
    }
    
    // Get form data
    const formData = {
        file: fileInput.files[0],
        emission: parseFloat(emissionInput.value),
        notes: notesInput?.value || '',
        period: document.getElementById('modalSubtitle')?.textContent || ''
    };
    
    console.log('Form data:', formData);
    
    // Confirm upload
    if (confirm('📤 Apakah Anda yakin ingin upload laporan ini?')) {
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '⏳ Uploading...';
        submitBtn.disabled = true;
        
        // Simulate upload (replace with actual API call)
        setTimeout(() => {
            // TODO: Send to backend
            // const formDataToSend = new FormData();
            // formDataToSend.append('report', formData.file);
            // formDataToSend.append('emission', formData.emission);
            // formDataToSend.append('notes', formData.notes);
            // 
            // fetch('/auditor/upload-laporan/store', {
            //     method: 'POST',
            //     headers: {
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: formDataToSend
            // })
            
            // Success
            showNotification('success', '✅ Laporan berhasil diupload! Seller akan menerima notifikasi.');
            
            // Close modal
            closeUploadModal();
            
            // Refresh timeline
            const projectId = document.getElementById('projectSelect')?.value;
            if (projectId) {
                renderTimeline(projectId);
            }
            
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 1500);
    }
});

// =====================================
// CLOSE MODAL ON OUTSIDE CLICK
// =====================================
document.getElementById('uploadModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeUploadModal();
    }
});

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeUploadModal();
    }
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
// DRAG & DROP FILE UPLOAD
// =====================================
const uploadArea = document.querySelector('.file-upload-area');

if (uploadArea) {
    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });
    
    // Highlight drop area when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });
    
    // Handle dropped files
    uploadArea.addEventListener('drop', handleDrop, false);
}

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

function highlight(e) {
    uploadArea.style.borderColor = 'var(--green)';
    uploadArea.style.background = 'var(--surface-hover)';
}

function unhighlight(e) {
    uploadArea.style.borderColor = '';
    uploadArea.style.background = '';
}

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    const fileInput = document.getElementById('reportFile');
    if (fileInput && files.length > 0) {
        fileInput.files = files;
        
        // Trigger change event
        const event = new Event('change', { bubbles: true });
        fileInput.dispatchEvent(event);
    }
}

// =====================================
// CONSOLE INFO
// =====================================
console.log('🌊 CAMAR Upload Laporan - JavaScript Loaded');
console.log('Available functions: openUploadModal, closeUploadModal, viewReport, showNotification');