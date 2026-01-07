// =====================================
// VERIFIKASI PROYEK - JAVASCRIPT
// =====================================

// =====================================
// SITE VISIT TOGGLE
// =====================================
document.getElementById('siteVisitSelect')?.addEventListener('change', function() {
    const show = this.value === 'yes';
    const dateField = document.getElementById('siteVisitDate');
    const notesField = document.getElementById('siteVisitNotes');
    
    if (dateField) {
        dateField.style.display = show ? 'block' : 'none';
    }
    
    if (notesField) {
        notesField.style.display = show ? 'block' : 'none';
    }
});

// =====================================
// FILE UPLOAD HANDLING
// =====================================
function handleFileUpload(inputId, displayId) {
    const input = document.getElementById(inputId);
    const display = document.getElementById(displayId);
    
    if (!input || !display) return;

    input.addEventListener('change', function() {
        display.innerHTML = '';
        
        if (this.files.length === 0) return;
        
        Array.from(this.files).forEach((file, index) => {
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            
            // Validate file size
            if (file.size > 10 * 1024 * 1024 && inputId === 'verificationReport') {
                alert(`❌ File "${file.name}" terlalu besar! Maksimal 10 MB.`);
                return;
            }
            
            if (file.size > 5 * 1024 * 1024 && inputId === 'supportingDocs') {
                alert(`❌ File "${file.name}" terlalu besar! Maksimal 5 MB per file.`);
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
                <button type="button" class="remove-file" onclick="removeFile(this, '${inputId}', ${index})">×</button>
            `;
            display.appendChild(fileDiv);
        });
    });
}

function removeFile(button, inputId, fileIndex) {
    const input = document.getElementById(inputId);
    const display = button.closest('.uploaded-file').parentElement;
    
    // Remove the display element
    button.closest('.uploaded-file').remove();
    
    // For single file input, clear it
    if (inputId === 'verificationReport') {
        input.value = '';
    }
    
    // For multiple files, we need to reconstruct the FileList
    // Note: FileList is readonly, so we can't directly remove items
    // In production, you'd handle this differently
}

// Initialize file upload handlers
handleFileUpload('verificationReport', 'uploadedVerification');
handleFileUpload('supportingDocs', 'uploadedSupporting');

// =====================================
// DRAG AND DROP
// =====================================
document.querySelectorAll('.file-upload-area').forEach(area => {
    area.addEventListener('dragover', (e) => {
        e.preventDefault();
        area.classList.add('dragover');
    });

    area.addEventListener('dragleave', () => {
        area.classList.remove('dragover');
    });

    area.addEventListener('drop', (e) => {
        e.preventDefault();
        area.classList.remove('dragover');
        
        // Find the associated input
        const input = area.parentElement.querySelector('.file-input');
        
        if (input && e.dataTransfer.files.length > 0) {
            input.files = e.dataTransfer.files;
            
            // Trigger change event
            const event = new Event('change', { bubbles: true });
            input.dispatchEvent(event);
        }
    });
});

// =====================================
// SAVE DRAFT
// =====================================
document.getElementById('saveDraftBtn')?.addEventListener('click', function() {
    const formData = new FormData(document.getElementById('verificationForm'));
    
    console.log('Saving draft...');
    
    // TODO: Send to backend
    // fetch('/auditor/verifikasi-proyek/save-draft', {
    //     method: 'POST',
    //     headers: {
    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //     },
    //     body: formData
    // })
    
    showNotification('success', '💾 Draft berhasil disimpan!');
});

// =====================================
// REJECT VERIFICATION
// =====================================
document.getElementById('rejectBtn')?.addEventListener('click', function() {
    const reason = prompt('Masukkan alasan penolakan verifikasi:');
    
    if (reason && reason.trim()) {
        if (confirm('❌ Apakah Anda yakin ingin menolak verifikasi ini?')) {
            console.log('Rejecting verification with reason:', reason);
            
            // TODO: Send to backend
            // fetch('/auditor/verifikasi-proyek/reject', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: JSON.stringify({ reason: reason })
            // })
            
            showNotification('success', '❌ Verifikasi ditolak. Seller akan menerima notifikasi.');
            
            // Redirect after delay
            setTimeout(() => {
                window.location.href = '/auditor/menunggu-verifikasi';
            }, 2000);
        }
    } else if (reason !== null) {
        alert('⚠️ Alasan penolakan harus diisi!');
    }
});

// =====================================
// FORM SUBMISSION
// =====================================
document.getElementById('verificationForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Check if all checkboxes are checked
    const allCheckboxes = document.querySelectorAll('.custom-checkbox');
    const allChecked = Array.from(allCheckboxes).every(cb => cb.checked);
    
    if (!allChecked) {
        showNotification('error', '⚠️ Mohon lengkapi semua checklist verifikasi dokumen!');
        
        // Scroll to first unchecked checkbox
        const firstUnchecked = Array.from(allCheckboxes).find(cb => !cb.checked);
        if (firstUnchecked) {
            firstUnchecked.closest('.checklist-item').scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }
        return;
    }
    
    // Validate file upload
    const fileInput = document.getElementById('verificationReport');
    if (!fileInput?.files.length) {
        showNotification('error', '❌ Laporan verifikasi (PDF) harus diupload!');
        fileInput?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
    }
    
    // Confirm submission
    if (confirm('✅ Apakah Anda yakin ingin submit verifikasi ini?')) {
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '⏳ Submitting...';
        submitBtn.disabled = true;
        
        // Prepare form data
        const formData = new FormData(this);
        
        console.log('Submitting verification...');
        console.log('Form data:', Object.fromEntries(formData));
        
        // Simulate submission
        setTimeout(() => {
            // TODO: Send to backend
            // fetch('/auditor/verifikasi-proyek/store', {
            //     method: 'POST',
            //     headers: {
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: formData
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         showNotification('success', '✅ Verifikasi berhasil disubmit!');
            //         setTimeout(() => {
            //             window.location.href = '/auditor/dashboard';
            //         }, 2000);
            //     }
            // })
            
            showNotification('success', '✅ Verifikasi berhasil disubmit! Laporan akan dikirim ke seller dan buyer terkait.');
            
            // Redirect after delay
            setTimeout(() => {
                window.location.href = '/auditor/dashboard';
            }, 2000);
            
            // Restore button (won't be visible due to redirect)
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 1500);
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
// AUTO-SAVE DRAFT (OPTIONAL)
// =====================================
let autoSaveTimer;
const AUTOSAVE_INTERVAL = 60000; // 1 minute

function startAutoSave() {
    autoSaveTimer = setInterval(() => {
        const formData = new FormData(document.getElementById('verificationForm'));
        
        // Only save if form has data
        const hasData = Array.from(formData.entries()).some(([key, value]) => {
            return value && value !== '';
        });
        
        if (hasData) {
            console.log('Auto-saving draft...');
            // TODO: Silent save to backend
            localStorage.setItem('verification_draft', JSON.stringify(Object.fromEntries(formData)));
        }
    }, AUTOSAVE_INTERVAL);
}

// Load draft on page load
window.addEventListener('load', function() {
    const draft = localStorage.getItem('verification_draft');
    
    if (draft && confirm('💾 Ditemukan draft tersimpan. Mau dilanjutkan?')) {
        try {
            const data = JSON.parse(draft);
            
            // Populate form with draft data
            Object.entries(data).forEach(([name, value]) => {
                const input = document.querySelector(`[name="${name}"]`);
                if (input) {
                    if (input.type === 'checkbox') {
                        input.checked = value === 'on';
                    } else {
                        input.value = value;
                    }
                }
            });
            
            showNotification('success', '📋 Draft berhasil dimuat!');
        } catch (e) {
            console.error('Error loading draft:', e);
        }
    }
    
    // Start auto-save
    // startAutoSave();
});

// Clear draft after successful submission
function clearDraft() {
    localStorage.removeItem('verification_draft');
    if (autoSaveTimer) {
        clearInterval(autoSaveTimer);
    }
}

// =====================================
// CONSOLE INFO
// =====================================
console.log('🌊 CAMAR Verifikasi Proyek - JavaScript Loaded');
console.log('Available functions: showNotification, clearDraft, removeFile');