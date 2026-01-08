// ========================================
// NOTIFIKASI & BAHASA - JavaScript Functions (NAMESPACED)
// Prefix: nb- (notifikasi-bahasa)
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Save Bahasa Settings
    const nbSaveBahasaBtn = document.getElementById('nb-saveBahasaBtn');
    if (nbSaveBahasaBtn) {
        nbSaveBahasaBtn.addEventListener('click', nbSaveBahasaSettings);
    }

    // Toggle Notifications
    const nbNotifSwitches = [
        { id: 'nb-notif-transaksi', name: 'Notifikasi Transaksi' },
        { id: 'nb-notif-laporan', name: 'Notifikasi Laporan Proyek' },
        { id: 'nb-notif-sertifikat', name: 'Notifikasi Sertifikat' },
        { id: 'nb-notif-sistem', name: 'Notifikasi Pembaruan Sistem' },
        { id: 'nb-notif-email', name: 'Notifikasi Email' }
    ];

    nbNotifSwitches.forEach(item => {
        const switchElement = document.getElementById(item.id);
        if (switchElement) {
            switchElement.addEventListener('change', function() {
                nbToggleNotif(item.name, this.checked);
            });
        }
    });

});

// Function: Save Bahasa Settings
function nbSaveBahasaSettings() {
    const selectedLang = document.querySelector('input[name="nb-language"]:checked');
    
    if (!selectedLang) {
        nbShowToast('Pilih bahasa terlebih dahulu', false);
        return;
    }

    const langValue = selectedLang.value;
    const langName = langValue === 'id' ? 'Bahasa Indonesia' : 'English';
    
    // Show confirmation
    if (confirm(`Ubah bahasa tampilan ke ${langName}?\n\nPerubahan akan diterapkan ke seluruh platform.`)) {
        
        // Simulate saving (in real app, send AJAX request to backend)
        setTimeout(() => {
            nbShowToast(`✓ Bahasa berhasil diubah ke ${langName}`, true);
            
            // Optional: Reload page after 2 seconds
            // setTimeout(() => {
            //     window.location.reload();
            // }, 2000);
            
        }, 500);
    }
}

// Function: Toggle Notification
function nbToggleNotif(notifName, isEnabled) {
    const status = isEnabled ? 'diaktifkan' : 'dinonaktifkan';
    
    // Show toast notification
    nbShowToast(`${notifName} ${status}`, isEnabled);
    
    // Log untuk debugging
    console.log(`${notifName} ${status}`);
    
    // Simulate saving to backend
    // nbSaveNotificationPreference(notifName, isEnabled);
}

// Function: Show Toast Notification
function nbShowToast(message, isSuccess = true) {
    const toastElement = document.getElementById('nb-notifToast');
    const toastBody = document.getElementById('nb-toastMessage');
    
    if (!toastElement || !toastBody) return;
    
    // Set message
    toastBody.textContent = message;
    
    // Set toast color
    if (isSuccess) {
        toastBody.style.background = 'linear-gradient(135deg, var(--color-primary), var(--color-secondary))';
        toastElement.classList.remove('nb-toast-off');
    } else {
        toastBody.style.background = '#6C757D';
        toastElement.classList.add('nb-toast-off');
    }
    
    // Show toast using Bootstrap
    const toast = new bootstrap.Toast(toastElement, {
        autohide: true,
        delay: 3000
    });
    
    toast.show();
}

// Function: Save Notification Preference (untuk integrasi backend nanti)
function nbSaveNotificationPreference(notifType, isEnabled) {
    // Example AJAX call
    /*
    fetch('/api/settings/notifications', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            type: notifType,
            enabled: isEnabled
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Preference saved:', data);
    })
    .catch(error => {
        console.error('Error saving preference:', error);
        nbShowToast('Gagal menyimpan pengaturan', false);
    });
    */
}