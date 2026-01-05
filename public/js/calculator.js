// ====================================
// EXPANDABLE SECTIONS
// ====================================

function toggleSection(header) {
    const section = header.closest('.calc-section');
    section.classList.toggle('expanded');
}

// Open first section by default
document.addEventListener('DOMContentLoaded', function() {
    const firstSection = document.querySelector('.calc-section');
    if (firstSection) {
        firstSection.classList.add('expanded');
    }
});

// ====================================
// MODULE TOGGLE FUNCTIONALITY
// ====================================

function toggleModule(scopeId) {
    const module = document.querySelector(`#${scopeId}-content`).closest('.calc-module');
    module.classList.toggle('expanded');
}

// Modules closed by default - no initialization needed

// ====================================
// CALCULATOR FUNCTIONALITY
// ====================================

function calculateEmissions() {
    // Scope 1 - Direct Emissions
    const bensin = parseFloat(document.getElementById('bensin').value) || 0;
    const solar = parseFloat(document.getElementById('solar').value) || 0;
    const gas = parseFloat(document.getElementById('gas').value) || 0;
    
    const scope1 = (bensin * 2.31 + solar * 2.68 + gas * 2.0) / 1000; // Convert to tons

    // Scope 2 - Indirect Emissions (Energy)
    const listrik = parseFloat(document.getElementById('listrik').value) || 0;
    const steam = parseFloat(document.getElementById('steam').value) || 0;
    
    const scope2 = (listrik * 0.85 + steam * 0.3) / 1000; // Convert to tons

    // Scope 3 - Value Chain Emissions
    const transport = parseFloat(document.getElementById('transport').value) || 0;
    const travel = parseFloat(document.getElementById('travel').value) || 0;
    const waste = parseFloat(document.getElementById('waste').value) || 0;
    
    const scope3 = (transport * 0.1 + travel * 0.25 + waste * 0.5) / 1000; // Convert to tons

    // Total Emissions
    const totalEmissions = scope1 + scope2 + scope3;

    // Offset Calculation
    const targetOffset = parseFloat(document.getElementById('targetOffset').value) || 0;
    const offsetNeeded = totalEmissions * (targetOffset / 100);
    const netEmissions = totalEmissions - offsetNeeded;

    // Display Results
    document.getElementById('resultScope1').textContent = scope1.toFixed(2);
    document.getElementById('resultScope2').textContent = scope2.toFixed(2);
    document.getElementById('resultScope3').textContent = scope3.toFixed(2);
    document.getElementById('resultTotal').textContent = totalEmissions.toFixed(2);
    document.getElementById('resultOffset').textContent = offsetNeeded.toFixed(2);
    document.getElementById('resultNet').textContent = netEmissions.toFixed(2);

    // Show result box
    const resultBox = document.getElementById('resultBox');
    resultBox.style.display = 'block';
    
    // Smooth scroll to result
    resultBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

// ====================================
// NUMBER FORMATTING
// ====================================

// Format numbers with thousand separators
function formatNumber(num) {
    return num.toLocaleString('id-ID', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// ====================================
// INPUT VALIDATION
// ====================================

// Prevent negative numbers
document.querySelectorAll('.input-field[type="number"]').forEach(input => {
    input.addEventListener('input', function() {
        if (this.value < 0) {
            this.value = 0;
        }
    });
});

// ====================================
// ENTER KEY SUPPORT
// ====================================

document.querySelectorAll('.input-field').forEach(input => {
    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            calculateEmissions();
        }
    });
});

// ====================================
// RESET FUNCTIONALITY (Optional)
// ====================================

function resetCalculator() {
    document.querySelectorAll('.input-field').forEach(input => {
        input.value = '';
    });
    
    document.getElementById('resultBox').style.display = 'none';
}

// ====================================
// AUTO-SAVE TO LOCAL STORAGE (Optional)
// ====================================

function saveInputs() {
    const inputs = {};
    document.querySelectorAll('.input-field').forEach(input => {
        inputs[input.id] = input.value;
    });
    localStorage.setItem('calculatorInputs', JSON.stringify(inputs));
}

function loadInputs() {
    const saved = localStorage.getItem('calculatorInputs');
    if (saved) {
        const inputs = JSON.parse(saved);
        Object.keys(inputs).forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.value = inputs[id];
            }
        });
    }
}

// Auto-save on input change
document.querySelectorAll('.input-field').forEach(input => {
    input.addEventListener('change', saveInputs);
});

// Load saved inputs on page load
document.addEventListener('DOMContentLoaded', loadInputs);