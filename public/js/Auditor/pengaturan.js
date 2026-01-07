// =====================================
// PENGATURAN - JAVASCRIPT
// =====================================

// =====================================
// COLOR PICKER
// =====================================
document.querySelectorAll('.color-option').forEach(option => {
    option.addEventListener('click', function() {
        // Remove active from all options
        document.querySelectorAll('.color-option').forEach(opt => opt.classList.remove('active'));
        
        // Add active to clicked option
        this.classList.add('active');
        
        const color = this.dataset.color;
        console.log('Color selected:', color);
        
        // TODO: Apply color theme to dashboard
        // applyColorTheme(color);
    });
});

// =====================================
// TOGGLE SWITCHES
// =====================================
document.querySelectorAll('.toggle-switch input').forEach(toggle => {
    toggle.addEventListener('change', function() {
        const settingLabel = this.closest('.setting-item')
            .querySelector('.setting-label').textContent;
        
        console.log('Toggle changed:', settingLabel, 'Enabled:', this.checked);
        
        // Handle specific toggles
        const toggleId = this.id;
        
        switch(toggleId) {
            case 'darkMode':
                handleDarkMode(this.checked);
                break;
            case 'animations':
                handleAnimations(this.checked);
                break;
            case 'showSidebar':
                handleSidebar(this.checked);
                break;
            case 'chartAnimations':
                handleChartAnimations(this.checked);
                break;
            case 'notifNewProject':
            case 'notifDeadline':
            case 'notifMRV':
            case 'notifEmail':
                handleNotifications(toggleId, this.checked);
                break;
            case 'autoSave':
                handleAutoSave(this.checked);
                break;
            case 'twoFactor':
                handleTwoFactor(this.checked);
                break;
            case 'developerMode':
                handleDeveloperMode(this.checked);
                break;
        }
    });
});

// =====================================
// SELECT DROPDOWNS
// =====================================
document.querySelectorAll('.form-select').forEach(select => {
    select.addEventListener('change', function() {
        const settingLabel = this.closest('.setting-item')
            .querySelector('.setting-label').textContent;
        
        console.log('Select changed:', settingLabel, 'Value:', this.value);
        
        // Handle specific selects
        const selectId = this.id;
        
        switch(selectId) {
            case 'density':
                handleDensity(this.value);
                break;
            case 'fontSize':
                handleFontSize(this.value);
                break;
            case 'sessionTimeout':
                handleSessionTimeout(this.value);
                break;
            case 'language':
                handleLanguage(this.value);
                break;
            case 'dateFormat':
                handleDateFormat(this.value);
                break;
            case 'numberFormat':
                handleNumberFormat(this.value);
                break;
        }
    });
});

// =====================================
// SAVE SETTINGS
// =====================================
document.getElementById('saveBtn')?.addEventListener('click', function() {
    saveSettings();
});

function saveSettings() {
    // Show loading state
    const btn = document.getElementById('saveBtn');
    const originalText = btn.innerHTML;
    btn.innerHTML = '⏳ Menyimpan...';
    btn.disabled = true;
    
    // Collect all settings
    const settings = {
        // Appearance
        darkMode: document.getElementById('darkMode')?.checked || false,
        accentColor: document.querySelector('.color-option.active')?.dataset.color || 'green',
        animations: document.getElementById('animations')?.checked || false,
        
        // Display
        density: document.getElementById('density')?.value || 'comfortable',
        fontSize: document.getElementById('fontSize')?.value || 'medium',
        showSidebar: document.getElementById('showSidebar')?.checked || false,
        chartAnimations: document.getElementById('chartAnimations')?.checked || false,
        
        // Notifications
        notifNewProject: document.getElementById('notifNewProject')?.checked || false,
        notifDeadline: document.getElementById('notifDeadline')?.checked || false,
        notifMRV: document.getElementById('notifMRV')?.checked || false,
        notifEmail: document.getElementById('notifEmail')?.checked || false,
        
        // Data & Privacy
        autoSave: document.getElementById('autoSave')?.checked || false,
        sessionTimeout: document.getElementById('sessionTimeout')?.value || '30',
        twoFactor: document.getElementById('twoFactor')?.checked || false,
        
        // Advanced
        language: document.getElementById('language')?.value || 'id',
        dateFormat: document.getElementById('dateFormat')?.value || 'dd-mm-yyyy',
        numberFormat: document.getElementById('numberFormat')?.value || 'id',
        developerMode: document.getElementById('developerMode')?.checked || false
    };
    
    console.log('Saving settings:', settings);
    
    // Simulate API call
    setTimeout(() => {
        // TODO: Send to backend
        // fetch('/auditor/pengaturan/update', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //     },
        //     body: JSON.stringify(settings)
        // })
        
        // Save to localStorage for now
        localStorage.setItem('auditor_settings', JSON.stringify(settings));
        
        // Show success notification
        showNotification('success', '✅ Pengaturan berhasil disimpan!');
        
        // Restore button
        btn.innerHTML = originalText;
        btn.disabled = false;
    }, 1000);
}

// =====================================
// RESET SETTINGS
// =====================================
document.getElementById('resetBtn')?.addEventListener('click', function() {
    if (confirm('Apakah Anda yakin ingin reset semua pengaturan ke default?')) {
        resetToDefault();
    }
});

function resetToDefault() {
    // Reset all toggles to default
    document.getElementById('darkMode').checked = true;
    document.getElementById('animations').checked = true;
    document.getElementById('showSidebar').checked = true;
    document.getElementById('chartAnimations').checked = true;
    document.getElementById('notifNewProject').checked = true;
    document.getElementById('notifDeadline').checked = true;
    document.getElementById('notifMRV').checked = true;
    document.getElementById('notifEmail').checked = false;
    document.getElementById('autoSave').checked = true;
    document.getElementById('twoFactor').checked = false;
    document.getElementById('developerMode').checked = false;
    
    // Reset selects
    document.getElementById('density').value = 'comfortable';
    document.getElementById('fontSize').value = 'medium';
    document.getElementById('sessionTimeout').value = '30';
    document.getElementById('language').value = 'id';
    document.getElementById('dateFormat').value = 'dd-mm-yyyy';
    document.getElementById('numberFormat').value = 'id';
    
    // Reset color to green
    document.querySelectorAll('.color-option').forEach(opt => opt.classList.remove('active'));
    document.querySelector('.color-option[data-color="green"]').classList.add('active');
    
    // Clear localStorage
    localStorage.removeItem('auditor_settings');
    
    showNotification('success', '🔄 Pengaturan berhasil di-reset ke default!');
}

// =====================================
// HANDLER FUNCTIONS
// =====================================

function handleDarkMode(enabled) {
    if (enabled) {
        console.log('Dark mode enabled');
        // document.body.classList.add('dark-mode');
    } else {
        console.log('Dark mode disabled');
        // document.body.classList.remove('dark-mode');
    }
}

function handleAnimations(enabled) {
    if (enabled) {
        console.log('Animations enabled');
        // document.body.classList.add('animations-enabled');
    } else {
        console.log('Animations disabled');
        // document.body.classList.remove('animations-enabled');
    }
}

function handleSidebar(visible) {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        if (visible) {
            sidebar.style.display = 'flex';
        } else {
            sidebar.style.display = 'none';
        }
    }
}

function handleChartAnimations(enabled) {
    console.log('Chart animations:', enabled);
}

function handleNotifications(type, enabled) {
    console.log('Notification setting:', type, enabled);
}

function handleAutoSave(enabled) {
    console.log('Auto-save:', enabled);
    // TODO: Start/stop auto-save timer
}

function handleTwoFactor(enabled) {
    if (enabled) {
        // TODO: Show 2FA setup modal
        console.log('2FA enabled - show setup modal');
    } else {
        console.log('2FA disabled');
    }
}

function handleDeveloperMode(enabled) {
    if (enabled) {
        console.log('Developer mode enabled');
        // Show debug info
    } else {
        console.log('Developer mode disabled');
    }
}

function handleDensity(value) {
    console.log('Density changed to:', value);
    // TODO: Apply density class to body or main container
}

function handleFontSize(value) {
    console.log('Font size changed to:', value);
    // TODO: Apply font size class
}

function handleSessionTimeout(value) {
    console.log('Session timeout set to:', value, 'minutes');
}

function handleLanguage(value) {
    console.log('Language changed to:', value);
    // TODO: Reload page with new language or update i18n
}

function handleDateFormat(value) {
    console.log('Date format changed to:', value);
}

function handleNumberFormat(value) {
    console.log('Number format changed to:', value);
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
// LOAD SAVED SETTINGS ON PAGE LOAD
// =====================================
window.addEventListener('load', function() {
    const savedSettings = localStorage.getItem('auditor_settings');
    
    if (savedSettings) {
        try {
            const settings = JSON.parse(savedSettings);
            console.log('Loading saved settings:', settings);
            
            // Apply saved settings
            // TODO: Apply each setting to the form
            
        } catch (e) {
            console.error('Error loading settings:', e);
        }
    }
});

// =====================================
// KEYBOARD SHORTCUTS
// =====================================
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + S to save
    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
        e.preventDefault();
        saveSettings();
    }
    
    // Ctrl/Cmd + R to reset (disabled to prevent page reload)
    if ((e.ctrlKey || e.metaKey) && e.key === 'r' && e.shiftKey) {
        e.preventDefault();
        if (confirm('Reset to default settings?')) {
            resetToDefault();
        }
    }
});

// =====================================
// CONSOLE INFO
// =====================================
console.log('🌊 CAMAR Pengaturan - JavaScript Loaded');
console.log('Available functions: saveSettings, resetToDefault, showNotification');
console.log('Keyboard shortcuts:');
console.log('  - Ctrl/Cmd + S: Save settings');
console.log('  - Ctrl/Cmd + Shift + R: Reset to default');