// Sample data - Ganti dengan data dari database
let emissionRecords = [
    {
        id: 1,
        tanggal: '2025-01-06',
        keterangan: 'Emisi Bulanan Kantor Jakarta',
        scope1: 670.87,
        scope2: 11.33,
        scope3: 19.66,
        total: 701.86,
        offset: 140.37,
        bersih: 561.49
    },
    {
        id: 2,
        tanggal: '2025-01-05',
        keterangan: 'Emisi Produksi Januari',
        scope1: 450.25,
        scope2: 85.50,
        scope3: 120.75,
        total: 656.50,
        offset: 131.30,
        bersih: 525.20
    },
    {
        id: 3,
        tanggal: '2025-01-04',
        keterangan: 'Emisi Operasional Gudang',
        scope1: 320.50,
        scope2: 45.30,
        scope3: 78.20,
        total: 444.00,
        offset: 88.80,
        bersih: 355.20
    }
];

let currentPage = 1;
let recordsPerPage = 10;
let filteredRecords = [...emissionRecords];
let deleteId = null;
let deleteMode = false;
let selectedRecords = new Set();

document.addEventListener('DOMContentLoaded', function() {
    // Initialize
    loadRecords();
    updateSummary();
    
    // Event Listeners
    document.getElementById('searchInput').addEventListener('input', filterRecords);
    document.getElementById('filterPeriode').addEventListener('change', filterRecords);
    document.getElementById('sortBy').addEventListener('change', sortRecords);
    document.getElementById('addNewBtn').addEventListener('click', () => {
        window.location.href = '/buyer/hitung';
    });
    document.getElementById('deleteBtn').addEventListener('click', toggleDeleteMode);
    document.getElementById('confirmDeleteBtn').addEventListener('click', confirmDelete);
    document.getElementById('cancelDeleteBtn').addEventListener('click', cancelDeleteMode);
    document.getElementById('deleteSelectedBtn').addEventListener('click', deleteSelectedRecords);
    document.getElementById('confirmDeleteMultipleBtn').addEventListener('click', confirmDeleteMultiple);
});

function toggleDeleteMode() {
    deleteMode = !deleteMode;
    selectedRecords.clear();
    
    const deleteBtn = document.getElementById('deleteBtn');
    const deleteActions = document.getElementById('deleteActions');
    
    if (deleteMode) {
        deleteBtn.classList.add('hidden');
        deleteActions.style.display = 'flex';
    } else {
        deleteBtn.classList.remove('hidden');
        deleteActions.style.display = 'none';
    }
    
    loadRecords();
}

function cancelDeleteMode() {
    deleteMode = false;
    selectedRecords.clear();
    
    document.getElementById('deleteBtn').classList.remove('hidden');
    document.getElementById('deleteActions').style.display = 'none';
    
    loadRecords();
}

function toggleSelectRecord(id) {
    if (selectedRecords.has(id)) {
        selectedRecords.delete(id);
    } else {
        selectedRecords.add(id);
    }
    
    updateDeleteButton();
    updateCheckboxes();
}

function updateCheckboxes() {
    document.querySelectorAll('.emission-records-checkbox').forEach(checkbox => {
        const id = parseInt(checkbox.dataset.id);
        checkbox.checked = selectedRecords.has(id);
        
        const row = checkbox.closest('tr');
        if (selectedRecords.has(id)) {
            row.classList.add('emission-records-selected');
        } else {
            row.classList.remove('emission-records-selected');
        }
    });
}

function updateDeleteButton() {
    const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
    const selectedCount = document.getElementById('selectedCount');
    
    if (selectedRecords.size > 0) {
        deleteSelectedBtn.disabled = false;
        selectedCount.textContent = selectedRecords.size;
    } else {
        deleteSelectedBtn.disabled = true;
        selectedCount.textContent = '0';
    }
}

function deleteSelectedRecords() {
    if (selectedRecords.size === 0) return;
    
    // Set jumlah catatan yang akan dihapus
    document.getElementById('deleteCount').textContent = selectedRecords.size;
    
    // Tampilkan modal konfirmasi
    const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    modal.show();
}

function loadRecords() {
    const tbody = document.getElementById('recordsBody');
    const thead = document.getElementById('tableHeader');
    
    // Update table header based on delete mode
    thead.innerHTML = `
        <th width="5%">No</th>
        <th width="12%">Tanggal</th>
        <th width="25%">Keterangan</th>
        <th width="10%">Scope 1</th>
        <th width="10%">Scope 2</th>
        <th width="10%">Scope 3</th>
        <th width="12%">Total Emisi</th>
        <th width="10%">Offset</th>
    `;
    
    if (filteredRecords.length === 0) {
        tbody.innerHTML = `
            <tr class="emission-records-empty-state">
                <td colspan="8" class="text-center py-5">
                    <div class="emission-records-empty-icon">📋</div>
                    <p class="emission-records-empty-text">Tidak ada catatan ditemukan</p>
                    <p class="emission-records-empty-subtext">Coba ubah filter pencarian Anda</p>
                </td>
            </tr>
        `;
        document.getElementById('paginationSection').style.display = 'none';
        return;
    }
    
    const start = (currentPage - 1) * recordsPerPage;
    const end = start + recordsPerPage;
    const paginatedRecords = filteredRecords.slice(start, end);
    
    let html = '';
    paginatedRecords.forEach((record, index) => {
        const isSelected = selectedRecords.has(record.id);
        const rowClasses = [];
        
        if (deleteMode) {
            rowClasses.push('emission-records-delete-mode');
        }
        if (isSelected) {
            rowClasses.push('emission-records-selected');
        }
        
        html += `
            <tr class="${rowClasses.join(' ')}" ${deleteMode ? `onclick="toggleSelectRecord(${record.id})"` : ''}>
                <td class="emission-records-no-column">
                    ${deleteMode ? `
                        <div class="d-flex align-items-center gap-2">
                            <input type="checkbox" 
                                   class="emission-records-checkbox" 
                                   data-id="${record.id}"
                                   ${isSelected ? 'checked' : ''}
                                   onclick="event.stopPropagation(); toggleSelectRecord(${record.id})">
                            <span>${start + index + 1}</span>
                        </div>
                    ` : `${start + index + 1}`}
                </td>
                <td>${formatDate(record.tanggal)}</td>
                <td>${record.keterangan}</td>
                <td>${record.scope1.toFixed(2)}</td>
                <td>${record.scope2.toFixed(2)}</td>
                <td>${record.scope3.toFixed(2)}</td>
                <td><strong>${record.total.toFixed(2)}</strong></td>
                <td>${record.offset.toFixed(2)}</td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html;
    updatePagination();
    
    if (deleteMode) {
        updateDeleteButton();
    }
}

function updateSummary() {
    document.getElementById('totalRecords').textContent = emissionRecords.length;
    
    const totalEmisi = emissionRecords.reduce((sum, r) => sum + r.total, 0);
    document.getElementById('totalEmisi').innerHTML = `${totalEmisi.toFixed(2)} <span class="emission-records-summary-unit">ton</span>`;
    
    const avgEmisi = emissionRecords.length > 0 ? totalEmisi / emissionRecords.length : 0;
    document.getElementById('avgEmisi').innerHTML = `${avgEmisi.toFixed(2)} <span class="emission-records-summary-unit">ton</span>`;
    
    const totalOffset = emissionRecords.reduce((sum, r) => sum + r.offset, 0);
    document.getElementById('totalOffset').innerHTML = `${totalOffset.toFixed(2)} <span class="emission-records-summary-unit">ton</span>`;
}

function filterRecords() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const periode = document.getElementById('filterPeriode').value;
    
    filteredRecords = emissionRecords.filter(record => {
        const matchSearch = record.keterangan.toLowerCase().includes(searchTerm) || 
                          record.tanggal.includes(searchTerm);
        
        let matchPeriode = true;
        if (periode !== 'all') {
            const recordDate = new Date(record.tanggal);
            const today = new Date();
            
            if (periode === 'today') {
                matchPeriode = recordDate.toDateString() === today.toDateString();
            } else if (periode === 'week') {
                const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
                matchPeriode = recordDate >= weekAgo;
            } else if (periode === 'month') {
                matchPeriode = recordDate.getMonth() === today.getMonth() && 
                              recordDate.getFullYear() === today.getFullYear();
            } else if (periode === 'year') {
                matchPeriode = recordDate.getFullYear() === today.getFullYear();
            }
        }
        
        return matchSearch && matchPeriode;
    });
    
    currentPage = 1;
    sortRecords();
}

function sortRecords() {
    const sortBy = document.getElementById('sortBy').value;
    
    filteredRecords.sort((a, b) => {
        if (sortBy === 'newest') {
            return new Date(b.tanggal) - new Date(a.tanggal);
        } else if (sortBy === 'oldest') {
            return new Date(a.tanggal) - new Date(b.tanggal);
        } else if (sortBy === 'highest') {
            return b.total - a.total;
        } else if (sortBy === 'lowest') {
            return a.total - b.total;
        }
    });
    
    loadRecords();
}

function updatePagination() {
    const totalPages = Math.ceil(filteredRecords.length / recordsPerPage);
    const paginationSection = document.getElementById('paginationSection');
    
    if (totalPages <= 1) {
        paginationSection.style.display = 'none';
        return;
    }
    
    paginationSection.style.display = 'flex';
    
    const start = (currentPage - 1) * recordsPerPage + 1;
    const end = Math.min(currentPage * recordsPerPage, filteredRecords.length);
    
    document.getElementById('showingStart').textContent = start;
    document.getElementById('showingEnd').textContent = end;
    document.getElementById('totalEntries').textContent = filteredRecords.length;
    
    let paginationHTML = '';
    
    // Previous button
    const prevDisabled = currentPage === 1;
    paginationHTML += `
        <button class="emission-records-pagination-btn ${prevDisabled ? 'emission-records-pagination-btn-disabled' : ''}" 
                onclick="changePage(${currentPage - 1})" 
                ${prevDisabled ? 'disabled' : ''}>
            ‹ Prev
        </button>
    `;
    
    // Page numbers
    for (let i = 1; i <= totalPages; i++) {
        if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
            paginationHTML += `
                <button class="emission-records-pagination-btn ${i === currentPage ? 'emission-records-pagination-btn-active' : ''}" 
                        onclick="changePage(${i})">
                    ${i}
                </button>
            `;
        } else if (i === currentPage - 2 || i === currentPage + 2) {
            paginationHTML += `<span class="emission-records-pagination-dots">...</span>`;
        }
    }
    
    // Next button
    const nextDisabled = currentPage === totalPages;
    paginationHTML += `
        <button class="emission-records-pagination-btn ${nextDisabled ? 'emission-records-pagination-btn-disabled' : ''}" 
                onclick="changePage(${currentPage + 1})" 
                ${nextDisabled ? 'disabled' : ''}>
            Next ›
        </button>
    `;
    
    document.getElementById('paginationControls').innerHTML = paginationHTML;
}

function changePage(page) {
    const totalPages = Math.ceil(filteredRecords.length / recordsPerPage);
    if (page < 1 || page > totalPages) return;
    currentPage = page;
    loadRecords();
}

function viewDetail(id) {
    const record = emissionRecords.find(r => r.id === id);
    if (!record) return;
    
    document.getElementById('detailTanggal').textContent = formatDate(record.tanggal);
    document.getElementById('detailKeterangan').textContent = record.keterangan;
    document.getElementById('detailScope1').textContent = record.scope1.toFixed(2);
    document.getElementById('detailScope2').textContent = record.scope2.toFixed(2);
    document.getElementById('detailScope3').textContent = record.scope3.toFixed(2);
    document.getElementById('detailTotal').textContent = record.total.toFixed(2);
    document.getElementById('detailOffset').textContent = record.offset.toFixed(2);
    document.getElementById('detailBersih').textContent = record.bersih.toFixed(2);
    
    const modal = new bootstrap.Modal(document.getElementById('detailModal'));
    modal.show();
}

function deleteRecord(id) {
    deleteId = id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function confirmDelete() {
    if (deleteId) {
        emissionRecords = emissionRecords.filter(r => r.id !== deleteId);
        filteredRecords = filteredRecords.filter(r => r.id !== deleteId);
        loadRecords();
        updateSummary();
        
        const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
        modal.hide();
        
        alert('Catatan berhasil dihapus!');
        deleteId = null;
    }
}

function confirmDeleteMultiple() {
    const deletedCount = selectedRecords.size;
    
    // Hapus records yang dipilih
    emissionRecords = emissionRecords.filter(r => !selectedRecords.has(r.id));
    filteredRecords = filteredRecords.filter(r => !selectedRecords.has(r.id));
    
    // Reset
    selectedRecords.clear();
    
    // Tutup modal konfirmasi
    const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
    confirmModal.hide();
    
    // Reload data
    cancelDeleteMode();
    loadRecords();
    updateSummary();
    
    // Tampilkan modal success
    document.getElementById('successDeleteCount').textContent = deletedCount;
    const successModal = new bootstrap.Modal(document.getElementById('successDeleteModal'));
    successModal.show();
}

function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return date.toLocaleDateString('id-ID', options);
}