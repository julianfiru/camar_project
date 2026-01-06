// ========================================
// NOTIFIKASI & BAHASA - JavaScript Functions
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Save Bahasa Settings
    const saveBahasaBtn = document.getElementById('saveBahasaBtn');
    if (saveBahasaBtn) {
        saveBahasaBtn.addEventListener('click', saveBahasaSettings);
    }

    // Toggle Notifications
    const notifSwitches = [
        { id: 'notif-transaksi', name: 'Notifikasi Transaksi' },
        { id: 'notif-laporan', name: 'Notifikasi Laporan Proyek' },
        { id: 'notif-sertifikat', name: 'Notifikasi Sertifikat' },
        { id: 'notif-sistem', name: 'Notifikasi Pembaruan Sistem' },
        { id: 'notif-email', name: 'Notifikasi Email' }
    ];

    notifSwitches.forEach(item => {
        const switchElement = document.getElementById(item.id);
        if (switchElement) {
            switchElement.addEventListener('change', function() {
                toggleNotif(item.name, this.checked);
            });
        }
    });

});

// Function: Save Bahasa Settings
function saveBahasaSettings() {
    const selectedLang = document.querySelector('input[name="language"]:checked');
    
    if (!selectedLang) {
        showToast('Pilih bahasa terlebih dahulu', false);
        return;
    }

    const langValue = selectedLang.value;
    const langName = langValue === 'id' ? 'Bahasa Indonesia' : 'English';
    
    // Show confirmation
    if (confirm(`Ubah bahasa tampilan ke ${langName}?\n\nPerubahan akan diterapkan ke seluruh platform.`)) {
        
        // Simulate saving (in real app, send AJAX request to backend)
        setTimeout(() => {
            showToast(`✓ Bahasa berhasil diubah ke ${langName}`, true);
            
            // Optional: Reload page after 2 seconds
            // setTimeout(() => {
            //     window.location.reload();
            // }, 2000);
            
        }, 500);
    }
}

// Function: Toggle Notification
function toggleNotif(notifName, isEnabled) {
    const status = isEnabled ? 'diaktifkan' : 'dinonaktifkan';
    
    // Show toast notification
    showToast(`${notifName} ${status}`, isEnabled);
    
    // Log untuk debugging
    console.log(`${notifName} ${status}`);
    
    // Simulate saving to backend
    // saveNotificationPreference(notifName, isEnabled);
}

// Function: Show Toast Notification
function showToast(message, isSuccess = true) {
    const toastElement = document.getElementById('notifToast');
    const toastBody = document.getElementById('toastMessage');
    
    if (!toastElement || !toastBody) return;
    
    // Set message
    toastBody.textContent = message;
    
    // Set toast color
    if (isSuccess) {
        toastBody.style.background = 'linear-gradient(135deg, var(--color-primary), var(--color-secondary))';
        toastElement.classList.remove('toast-off');
    } else {
        toastBody.style.background = '#6C757D';
        toastElement.classList.add('toast-off');
    }
    
    // Show toast using Bootstrap
    const toast = new bootstrap.Toast(toastElement, {
        autohide: true,
        delay: 3000
    });
    
    toast.show();
}

// Function: Save Notification Preference (untuk integrasi backend nanti)
function saveNotificationPreference(notifType, isEnabled) {
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
        showToast('Gagal menyimpan pengaturan', false);
    });
    */
}