// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const statusFilter = document.getElementById('rt-statusFilter');
    const yearFilter = document.getElementById('rt-yearFilter');
    const transactionsList = document.getElementById('rt-transactionsList');
    const noDataMessage = document.getElementById('rt-noDataMessage');

    function applyFilters() {
        const status = statusFilter.value;
        const year = yearFilter.value;
        const cards = document.querySelectorAll('.rt-transaction-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardStatus = card.getAttribute('data-status');
            const cardYear = card.getAttribute('data-year');
            
            let show = true;
            
            if (status && cardStatus !== status) {
                show = false;
            }
            
            if (year && cardYear !== year) {
                show = false;
            }
            
            if (show) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Show/hide no data message
        if (visibleCount === 0) {
            transactionsList.style.display = 'none';
            noDataMessage.style.display = 'flex';
        } else {
            transactionsList.style.display = 'block';
            noDataMessage.style.display = 'none';
        }
    }

    // Event listeners
    statusFilter?.addEventListener('change', applyFilters);
    yearFilter?.addEventListener('change', applyFilters);
});

// Action functions
function downloadReport(txId, reportTitle) {
    alert(`📥 Mengunduh laporan:\n"${reportTitle}"\n\nUntuk transaksi: ${txId}`);
}

function viewCertificate(certId) {
    alert(`👁️ Membuka sertifikat: ${certId}`);
}

function viewDetails(txId) {
    alert(`📄 Membuka detail lengkap transaksi: ${txId}`);
}