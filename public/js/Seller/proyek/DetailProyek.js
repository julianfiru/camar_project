let projectModalInstance;
function format_angka_singkat(angka, presisi = 1) {
    angka = parseFloat(angka);
    if (isNaN(angka)) return 0;
    let hasil = 0;
    let suffix = '';
    if (angka >= 1000000000000) {
        hasil = angka / 1000000000000;
        suffix = 'T';
    } else if (angka >= 1000000000) {
        hasil = angka / 1000000000;
        suffix = 'M';
    } else if (angka >= 1000000) {
        hasil = angka / 1000000;
        suffix = 'Jt';
    } else if (angka >= 1000) {
        hasil = angka / 1000;
        suffix = 'Rb';
    } else {
        return new Intl.NumberFormat('id-ID').format(angka);
    }
    let formatted = hasil.toFixed(presisi).replace('.', ',');
    return formatted + suffix;
}
function format_ukuran_kb(kb, presisi = 1) {
    kb = parseFloat(kb);
    if (isNaN(kb)) return '0 KB';
    let hasil = kb;
    let satuan = ' KB';
    if (kb >= 1048576) { 
        hasil = kb / 1048576;
        satuan = ' GB';
    } else if (kb >= 1024) {
        hasil = kb / 1024;
        satuan = ' MB';
    } else {
        hasil = kb;
        presisi = 0;
    }
    let formatted = new Intl.NumberFormat('id-ID', {
        minimumFractionDigits: presisi,
        maximumFractionDigits: presisi
    }).format(hasil);

    return formatted + satuan;
}
function showProjectDetail(element) {
    let url = element.getAttribute('data-url');
    document.getElementById('modal_project_name').innerText = 'Loading...';
    if (typeof hideUploadCard === 'function') {
        hideUploadCard(); 
    }
    fetch(url) 
        .then(response => response.json())
        .then(data => {
            const modalElement = document.getElementById('projectModal');
            if (modalElement.parentElement !== document.body) {
                document.body.appendChild(modalElement);
            }
            if (!projectModalInstance) {
                projectModalInstance = new bootstrap.Modal(modalElement);
            }
            const inputIdUpload = document.getElementById('input_project_id_upload');
            if (inputIdUpload) {
                inputIdUpload.value = data.id; 
            }
            document.getElementById('modal_project_name').innerText = data.project_name;
            document.getElementById('modal_project_type').innerText = data.category ? data.category.category_name : '-';
            document.getElementById('modal_project_location').innerText = data.location;
            let capacity = new Intl.NumberFormat('id-ID').format(data.total_capacity_ton);
            document.getElementById('modal_project_capacity').innerText = capacity;
            let available = new Intl.NumberFormat('id-ID').format(data.available_capacity_ton);
            document.getElementById('modal_project_available').innerText = available;
            let soldAmount = 0;
            if (data.available_capacity_ton <= 0) {
                soldAmount = 0;
            } else {
                soldAmount = data.total_capacity_ton - data.available_capacity_ton;
            }
            let soldStr = new Intl.NumberFormat('id-ID').format(soldAmount);
            document.getElementById('modal_project_order').innerText = soldStr;
            let revenueSingkat = typeof format_angka_singkat === 'function' ? format_angka_singkat(data.revenue) : data.revenue;
            document.getElementById('modal_revenue').innerText = revenueSingkat;
            let dateObj = new Date(data.created_at);
            let formattedDate = dateObj.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
            document.getElementById('modal_project_date').innerText = formattedDate;
            const statusBadge = document.getElementById('modal_project_status');
            if(data.status === 2) {
                statusBadge.style.background = 'var(--green)';
                statusBadge.innerText = 'Active';
            } else if(data.status === 1) {
                statusBadge.style.background = 'var(--yellow)';
                statusBadge.innerText = 'Pending';
            } else {
                statusBadge.style.background = 'var(--red)';
                statusBadge.innerText = 'Cancelled';
            }
            statusBadge.style.color = 'var(--text-primary)';

            // --- BAGIAN MRV / REPORTS ---
            const listContainer = document.getElementById('modal_mrv_list');
            const template = document.getElementById('mrv_card_template');
            listContainer.innerHTML = '';
            let mrvList = [];
            if (data.projectdocuments) {
                if (Array.isArray(data.projectdocuments)) {
                    mrvList = data.projectdocuments;
                } else {
                    mrvList = [data.projectdocuments];
                }
            }

            if (mrvList.length > 0) {
                mrvList.forEach(doc => {
                    const clone = template.content.cloneNode(true);
                    let docDate = '-';
                    if(doc.submitted_at || doc.created_at) {
                        docDate = new Date(doc.submitted_at || doc.created_at).toLocaleDateString('id-ID', {
                            day: 'numeric', month: 'short', year: 'numeric'
                        });
                    }
                    let size = typeof format_ukuran_kb === 'function' ? format_ukuran_kb(doc.size) : doc.size + ' B';
                    let badgeClass = 'bg-secondary';
                    let badgeText = 'Pending';
                    if (doc.status === 2) {
                        badgeClass = 'bg-opacity-10 border bgc-green';
                        badgeText = 'Disetujui';
                    } else if (doc.status === 1) {
                        badgeClass = 'bg-opacity-10 border bgc-yellow';
                        badgeText = 'Pending';
                    } else if (doc.status === 0) {
                        badgeClass = 'bg-opacity-10 border bgc-red';
                        badgeText = 'Ditolak';
                    }
                    clone.querySelector('.mrv-name').innerText = doc.document_name || doc.mrv_name;
                    clone.querySelector('.mrv-info').innerText = `${docDate} • ${size}`;
                    const badgeElem = clone.querySelector('.mrv-badge');
                    badgeElem.innerText = badgeText;
                    badgeElem.className = `badge mrv-badge me-2 ${badgeClass}`;
                    listContainer.appendChild(clone);
                });
            } else {
                listContainer.innerHTML = '<div class="text-center text-muted p-3 small">Belum ada dokumen laporan yang diunggah.</div>';
            }
            // --- END MRV ---
            projectModalInstance.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal mengambil data project.');
        });
}