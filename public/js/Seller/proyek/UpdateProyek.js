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
function showProjectUpdate(element) {
    let url = element.getAttribute('data-url');
    document.getElementById('modal_project_name').innerText = 'Loading...';
    fetch(url) 
        .then(response => response.json())
        .then(data => {
            const modalElement = document.getElementById('updateModal');
            if (modalElement.parentElement !== document.body) {
                document.body.appendChild(modalElement);
            }
            if (!projectModalInstance) {
                projectModalInstance = new bootstrap.Modal(modalElement);
            }
            document.getElementById('input_project_id_upload').value = data.project_id;
            document.getElementById('modal_project_name').innerText = data.project_name;
            document.getElementById('modal_project_name1').innerText = data.project_name;
            document.getElementById('modal_project_sku').value = data.sku;
            document.getElementById('modal_project_type').value = data.category_id;
            let price = new Intl.NumberFormat('id-ID').format(data.price);
            document.getElementById('modal_project_price').value = price;
            document.getElementById('modal_project_desc').value = data.desc;
            projectModalInstance.show();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal mengambil data project.');
        });
}