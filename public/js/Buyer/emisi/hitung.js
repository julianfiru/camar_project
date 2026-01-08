// Faktor emisi constants
const FAKTOR_EMISI = {
    bensin: 2.31,      // kg CO2/Liter
    solar: 2.68,       // kg CO2/Liter
    gas: 2.0,          // kg CO2/kg
    listrik: 0.85,     // kg CO2/kWh
    steam: 0.3,        // kg CO2/kg
    transport: 0.1,    // kg CO2/km
    travel: 0.25,      // kg CO2/km
    limbah: 0.5        // kg CO2/kg
};

// Event listener untuk tombol hitung
document.addEventListener('DOMContentLoaded', function() {
    console.log('Emission Calculator - DOM loaded');
    
    const hitungBtn = document.getElementById('hitungBtn');
    console.log('Tombol hitung:', hitungBtn);
    
    if (hitungBtn) {
        hitungBtn.addEventListener('click', function() {
            console.log('Tombol diklik!');
            hitungEmisi();
        });
    }

    // Event listener untuk Enter key pada semua input
    const inputs = document.querySelectorAll('.emission-calculator-form-control');
    console.log('Total input found:', inputs.length);
    
    inputs.forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                hitungEmisi();
            }
        });

        // Validasi input real-time
        input.addEventListener('input', function() {
            if (this.value < 0) {
                this.value = 0;
            }
            
            // Khusus untuk offset, max 100
            if (this.id === 'offset' && this.value > 100) {
                this.value = 100;
            }
        });
    });
});

function hitungEmisi() {
    console.log('Fungsi hitungEmisi dipanggil');
    
    // Ambil nilai input
    const bensin = parseFloat(document.getElementById('bensin').value) || 0;
    const solar = parseFloat(document.getElementById('solar').value) || 0;
    const gas = parseFloat(document.getElementById('gas').value) || 0;
    const listrik = parseFloat(document.getElementById('listrik').value) || 0;
    const steam = parseFloat(document.getElementById('steam').value) || 0;
    const transport = parseFloat(document.getElementById('transport').value) || 0;
    const travel = parseFloat(document.getElementById('travel').value) || 0;
    const limbah = parseFloat(document.getElementById('limbah').value) || 0;
    const offsetPercent = parseFloat(document.getElementById('offset').value) || 0;

    console.log('Input values:', { bensin, solar, gas, listrik, steam, transport, travel, limbah, offsetPercent });

    // Validasi input
    if (bensin < 0 || solar < 0 || gas < 0 || listrik < 0 || steam < 0 || 
        transport < 0 || travel < 0 || limbah < 0 || offsetPercent < 0 || offsetPercent > 100) {
        alert('Mohon masukkan nilai yang valid (tidak boleh negatif dan offset maksimal 100%)');
        return;
    }

    // Cek apakah semua input kosong
    if (bensin === 0 && solar === 0 && gas === 0 && listrik === 0 && steam === 0 && 
        transport === 0 && travel === 0 && limbah === 0) {
        alert('Mohon masukkan setidaknya satu nilai untuk menghitung emisi');
        return;
    }

    // Hitung emisi Scope 1 (kg CO2)
    const scope1Kg = (bensin * FAKTOR_EMISI.bensin) + 
                     (solar * FAKTOR_EMISI.solar) + 
                     (gas * FAKTOR_EMISI.gas);
    const scope1 = scope1Kg / 1000; // Convert to ton

    // Hitung emisi Scope 2 (kg CO2)
    const scope2Kg = (listrik * FAKTOR_EMISI.listrik) + 
                     (steam * FAKTOR_EMISI.steam);
    const scope2 = scope2Kg / 1000; // Convert to ton

    // Hitung emisi Scope 3 (kg CO2)
    const scope3Kg = (transport * FAKTOR_EMISI.transport) + 
                     (travel * FAKTOR_EMISI.travel) + 
                     (limbah * FAKTOR_EMISI.limbah);
    const scope3 = scope3Kg / 1000; // Convert to ton

    // Total emisi
    const totalEmisi = scope1 + scope2 + scope3;

    // Hitung offset
    const offsetDibutuhkan = totalEmisi * (offsetPercent / 100);
    const emisiBersih = totalEmisi - offsetDibutuhkan;

    console.log('Hasil kalkulasi:', { scope1, scope2, scope3, totalEmisi, offsetDibutuhkan, emisiBersih });

    // Tampilkan hasil dengan animasi
    tampilkanHasil(scope1, scope2, scope3, totalEmisi, offsetDibutuhkan, emisiBersih);
}

function tampilkanHasil(scope1, scope2, scope3, total, offset, bersih) {
    console.log('Menampilkan hasil...');
    
    // Tampilkan section hasil
    const hasilSection = document.getElementById('hasilSection');
    
    if (!hasilSection) {
        console.error('Element hasilSection tidak ditemukan!');
        return;
    }
    
    // Hide terlebih dahulu untuk reset animasi
    hasilSection.style.display = 'none';
    
    // Trigger reflow untuk restart animasi
    void hasilSection.offsetWidth;
    
    // Tampilkan dengan animasi
    hasilSection.style.display = 'block';

    // Scroll ke hasil setelah sedikit delay
    setTimeout(() => {
        hasilSection.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'center' 
        });
    }, 150);

    // Animasi angka dengan delay untuk efek cascade
    setTimeout(() => animateValue('hasilScope1', 0, scope1, 1000), 200);
    setTimeout(() => animateValue('hasilScope2', 0, scope2, 1000), 300);
    setTimeout(() => animateValue('hasilScope3', 0, scope3, 1000), 400);
    setTimeout(() => animateValue('hasilTotal', 0, total, 1200), 500);
    setTimeout(() => animateValue('hasilOffset', 0, offset, 1000), 600);
    setTimeout(() => animateValue('hasilBersih', 0, bersih, 1000), 700);
}

function animateValue(id, start, end, duration) {
    const element = document.getElementById(id);
    
    if (!element) {
        console.error('Element tidak ditemukan:', id);
        return;
    }
    
    const startTime = performance.now();
    
    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function untuk animasi yang lebih smooth
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = start + (end - start) * easeOutQuart;
        
        element.textContent = current.toFixed(2);
        
        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            element.textContent = end.toFixed(2);
        }
    }
    
    requestAnimationFrame(update);
}

// Fungsi untuk format number dengan comma separator (opsional untuk future use)
function formatNumber(num) {
    return num.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Reset button functionality (opsional)
function resetForm() {
    const inputs = document.querySelectorAll('.emission-calculator-form-control');
    inputs.forEach(input => {
        input.value = '';
    });
    
    const hasilSection = document.getElementById('hasilSection');
    if (hasilSection) {
        hasilSection.style.display = 'none';
    }
}