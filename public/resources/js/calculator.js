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
    // Get input values
    const fuelConsumption = parseFloat(document.getElementById('fuel-consumption').value) || 0;
    const fuelFactor = parseFloat(document.getElementById('fuel-factor').value) || 2.68;
    
    const electricityConsumption = parseFloat(document.getElementById('electricity-consumption').value) || 0;
    const electricityFactor = parseFloat(document.getElementById('electricity-factor').value) || 0.85;
    
    const transportDistance = parseFloat(document.getElementById('transport-distance').value) || 0;
    const transportFactor = parseFloat(document.getElementById('transport-factor').value) || 0.21;
    
    const wasteAmount = parseFloat(document.getElementById('waste-amount').value) || 0;
    const wasteFactor = parseFloat(document.getElementById('waste-factor').value) || 0.5;
    
    // Calculate emissions
    const scope1 = fuelConsumption * fuelFactor;
    const scope2 = electricityConsumption * electricityFactor;
    const scope3 = (transportDistance * transportFactor) + (wasteAmount * wasteFactor);
    const total = scope1 + scope2 + scope3;
    
    // Calculate tree equivalent (1 tree absorbs ~21.77 kg CO2 per year)
    const treeEquivalent = Math.ceil(total / 21.77);
    
    // Display results
    document.getElementById('result-scope1').textContent = scope1.toFixed(2);
    document.getElementById('result-scope2').textContent = scope2.toFixed(2);
    document.getElementById('result-scope3').textContent = scope3.toFixed(2);
    document.getElementById('result-total').textContent = total.toFixed(2);
    document.getElementById('tree-equivalent').textContent = treeEquivalent.toLocaleString('id-ID');
    
    // Show result box
    const resultBox = document.getElementById('result-box');
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
        if (input.id !== 'fuel-factor' && 
            input.id !== 'electricity-factor' && 
            input.id !== 'transport-factor' && 
            input.id !== 'waste-factor') {
            input.value = '';
        }
    });
    
    document.getElementById('result-box').style.display = 'none';
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