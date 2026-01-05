// ====================================
// LOAD EMISSION DATA FROM CALCULATOR
// ====================================

document.addEventListener('DOMContentLoaded', function() {
    loadEmissionData();
    loadProjects();
    initializePagination();
});

function loadEmissionData() {
    // Get calculator results from localStorage
    const emissionData = localStorage.getItem('carbonEmissionData');
    
    if (emissionData) {
        try {
            const data = JSON.parse(emissionData);
            
            // Display emission stats
            document.getElementById('total-emissions').textContent = data.totalEmissions || '-';
            document.getElementById('tree-equivalent').textContent = data.treeEquivalent || '-';
            document.getElementById('offset-needed').textContent = data.offsetNeeded || '-';
            
            // Hide calculation notice
            const noticeElement = document.getElementById('calculation-notice');
            if (noticeElement) {
                noticeElement.style.display = 'none';
            }
            
        } catch (error) {
            console.error('Error loading emission data:', error);
            showCalculationNotice();
        }
    } else {
        showCalculationNotice();
    }
}

function showCalculationNotice() {
    // Show notice
    const noticeElement = document.getElementById('calculation-notice');
    if (noticeElement) {
        noticeElement.style.display = 'block';
    }
    
    // Set default values
    document.getElementById('total-emissions').textContent = '-';
    document.getElementById('tree-equivalent').textContent = '-';
    document.getElementById('offset-needed').textContent = '-';
}

// ====================================
// PROJECTS DATA
// ====================================

const projectsData = [
    {
        id: 1,
        name: "Rehabilitasi Mangrove Pesisir Jawa",
        company: "PT Konservasi Hijau",
        category: "Blue Carbon",
        subcategory: "Mangroves",
        duration: "24 Bulan",
        description: "Restorasi ekosistem mangrove seluas 500 hektar di pesisir utara Jawa untuk mitigasi abrasi dan penyerapan karbon.",
        price: 250000,
        capacity: 500,
        image: "project-mangrove.jpg"
    },
    {
        id: 2,
        name: "Konservasi Hutan Kalimantan",
        company: "Yayasan Rimba Lestari",
        category: "Forestry & Nature-Based",
        subcategory: "REDD+",
        duration: "36 Bulan",
        description: "Perlindungan dan pemulihan hutan hujan tropis Kalimantan seluas 1000 hektar untuk habitat orangutan.",
        price: 180000,
        capacity: 1000,
        image: "project-forest.jpg"
    },
    {
        id: 3,
        name: "Pembangkit Listrik Tenaga Surya",
        company: "Indonesia Green Energy",
        category: "Renewable Energy",
        subcategory: "Solar Energy",
        duration: "60 Bulan",
        description: "Instalasi sistem PLTS skala komunitas dengan kapasitas 5MW untuk mengurangi emisi dari pembangkit fosil.",
        price: 320000,
        capacity: 5000,
        image: "project-energy.jpg"
    },
    {
        id: 4,
        name: "Restorasi Lahan Gambut Sumatra",
        company: "Gambut Lestari Foundation",
        category: "Forestry & Nature-Based",
        subcategory: "Peatland Restoration",
        duration: "48 Bulan",
        description: "Pemulihan dan rewetting lahan gambut terdegradasi seluas 800 hektar untuk mencegah kebakaran.",
        price: 290000,
        capacity: 800,
        image: "project-peat.jpg"
    },
    {
        id: 5,
        name: "Sistem Biogas Desa Mandiri",
        company: "Bio Energy Indonesia",
        category: "Renewable Energy",
        subcategory: "Biomass Energy",
        duration: "30 Bulan",
        description: "Pembangunan 500 unit biogas rumah tangga dari limbah ternak untuk mengurangi penggunaan LPG.",
        price: 210000,
        capacity: 500,
        image: "project-biogas.jpg"
    },
    {
        id: 6,
        name: "Agroforestri Kopi Berkelanjutan",
        company: "Petani Hijau Nusantara",
        category: "Agriculture & Land Use",
        subcategory: "Sustainable Agriculture",
        duration: "36 Bulan",
        description: "Sistem agroforestri terpadu dengan tanaman kopi dan pohon pelindung di 300 hektar lahan.",
        price: 195000,
        capacity: 300,
        image: "project-agroforestry.jpg"
    },
    {
        id: 7,
        name: "Konservasi Terumbu Karang Bali",
        company: "Ocean Conservation ID",
        category: "Blue Carbon",
        subcategory: "Seagrass Restoration",
        duration: "24 Bulan",
        description: "Rehabilitasi terumbu karang dan blue carbon di perairan Bali untuk ekosistem laut yang sehat.",
        price: 275000,
        capacity: 200,
        image: "project-coral.jpg"
    },
    {
        id: 8,
        name: "Energi Angin Offshore Sulawesi",
        company: "Wind Power Indonesia",
        category: "Renewable Energy",
        subcategory: "Wind Power",
        duration: "60 Bulan",
        description: "Pembangunan wind farm offshore dengan kapasitas 10MW untuk energi bersih Sulawesi.",
        price: 350000,
        capacity: 10000,
        image: "project-wind.jpg"
    },
    {
        id: 9,
        name: "Reforestasi Gunung Merapi",
        company: "Green Mountain Initiative",
        category: "Forestry & Nature-Based",
        subcategory: "Afforestation & Reforestation",
        duration: "48 Bulan",
        description: "Penanaman 100,000 pohon endemik di lereng Gunung Merapi untuk konservasi tanah dan air.",
        price: 220000,
        capacity: 600,
        image: "project-mountain.jpg"
    },
    {
        id: 10,
        name: "Pengelolaan Limbah Organik Kota",
        company: "Urban Waste Solutions",
        category: "Waste Management",
        subcategory: "Composting",
        duration: "36 Bulan",
        description: "Sistem pengolahan limbah organik menjadi kompos dan biogas untuk 50,000 rumah tangga.",
        price: 240000,
        capacity: 750,
        image: "project-waste.jpg"
    },
    {
        id: 11,
        name: "Konservasi Savana Nusa Tenggara",
        company: "Savana Conservation Trust",
        category: "Forestry & Nature-Based",
        subcategory: "Grassland Management",
        duration: "36 Bulan",
        description: "Perlindungan ekosistem savana dan habitat komodo di NTT seluas 400 hektar.",
        price: 265000,
        capacity: 400,
        image: "project-savana.jpg"
    },
    {
        id: 12,
        name: "PLTA Mikro Hidro Papua",
        company: "Hydro Power Papua",
        category: "Renewable Energy",
        subcategory: "Hydropower",
        duration: "48 Bulan",
        description: "Pembangunan 10 unit PLTA mikro hidro untuk desa terpencil di Papua tanpa listrik.",
        price: 310000,
        capacity: 3000,
        image: "project-hydro.jpg"
    },
    {
        id: 13,
        name: "Restorasi Danau Toba",
        company: "Lake Toba Foundation",
        category: "Forestry & Nature-Based",
        subcategory: "Improved Forest Management",
        duration: "60 Bulan",
        description: "Program pemulihan kualitas air Danau Toba melalui reboisasi catchment area 1500 hektar.",
        price: 285000,
        capacity: 1500,
        image: "project-lake.jpg"
    },
    {
        id: 14,
        name: "Urban Forest Jakarta",
        company: "Jakarta Green City",
        category: "Forestry & Nature-Based",
        subcategory: "Afforestation & Reforestation",
        duration: "24 Bulan",
        description: "Pembangunan hutan kota seluas 50 hektar di Jakarta untuk carbon sink dan udara bersih.",
        price: 300000,
        capacity: 250,
        image: "project-urban.jpg"
    },
    {
        id: 15,
        name: "Konservasi Satwa Langka Kalimantan",
        company: "Wildlife Conservation Society",
        category: "Forestry & Nature-Based",
        subcategory: "REDD+",
        duration: "60 Bulan",
        description: "Perlindungan habitat orangutan, gajah pygmy, dan badak sumatera di Kalimantan Timur.",
        price: 330000,
        capacity: 2000,
        image: "project-wildlife.jpg"
    },
    {
        id: 16,
        name: "Solar Panel Sekolah Nasional",
        company: "Solar Education ID",
        category: "Renewable Energy",
        subcategory: "Solar Energy",
        duration: "36 Bulan",
        description: "Instalasi panel surya di 200 sekolah untuk mengurangi biaya listrik dan edukasi energi bersih.",
        price: 270000,
        capacity: 1000,
        image: "project-school.jpg"
    },
    {
        id: 17,
        name: "Reklamasi Tambang Berkelanjutan",
        company: "Mine Restoration Corp",
        category: "Forestry & Nature-Based",
        subcategory: "Afforestation & Reforestation",
        duration: "48 Bulan",
        description: "Reklamasi dan reforestasi lahan bekas tambang seluas 600 hektar di Kalimantan Selatan.",
        price: 295000,
        capacity: 600,
        image: "project-mine.jpg"
    },
    {
        id: 18,
        name: "Pertanian Organik Ramah Lingkungan",
        company: "Organic Farming Alliance",
        category: "Agriculture & Land Use",
        subcategory: "Sustainable Agriculture",
        duration: "36 Bulan",
        description: "Konversi 500 hektar sawah konvensional menjadi pertanian organik dengan emisi rendah.",
        price: 175000,
        capacity: 500,
        image: "project-organic.jpg"
    },
    {
        id: 19,
        name: "Efisiensi Energi Gedung Perkantoran",
        company: "Green Building Solutions",
        category: "Energy Efficiency",
        subcategory: "Building Energy Efficiency",
        duration: "36 Bulan",
        description: "Retrofit 50 gedung perkantoran dengan sistem HVAC efisien dan LED untuk hemat energi 40%.",
        price: 340000,
        capacity: 4000,
        image: "project-building.jpg"
    },
    {
        id: 20,
        name: "Mangrove Blue Carbon Riau",
        company: "Riau Mangrove Project",
        category: "Blue Carbon",
        subcategory: "Mangroves",
        duration: "48 Bulan",
        description: "Penanaman dan perlindungan mangrove seluas 700 hektar di pesisir Riau untuk blue carbon.",
        price: 255000,
        capacity: 700,
        image: "project-riau.jpg"
    }
];

// ====================================
// RENDER PROJECTS
// ====================================

let currentPage = 1;
const projectsPerPage = 20;
let filteredProjects = [...projectsData];

function loadProjects() {
    renderProjects();
}

function renderProjects() {
    const grid = document.getElementById('projects-grid');
    const startIndex = (currentPage - 1) * projectsPerPage;
    const endIndex = startIndex + projectsPerPage;
    const projectsToShow = filteredProjects.slice(startIndex, endIndex);
    
    grid.innerHTML = projectsToShow.map(project => `
        <div class="project-card" onclick="viewProjectDetail(${project.id})">
            <div class="project-image">
                <img src="${project.image}" alt="${project.name}" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22300%22 height=%22160%22><rect width=%22300%22 height=%22160%22 fill=%22%2326667F%22/></svg>'">
                <span class="project-category">${project.category}</span>
            </div>
            <div class="project-info">
                <div class="project-company">${project.company}</div>
                <h3 class="project-name">${project.name}</h3>
                <div class="project-duration">
                    <span>📅</span>
                    <span>${project.duration}</span>
                </div>
                <p class="project-description">${project.description}</p>
                <div class="project-footer">
                    <div class="project-price">
                        Rp ${(project.price / 1000).toFixed(0)}K<span>/ton CO₂</span>
                    </div>
                    <button class="btn-detail">Detail</button>
                </div>
            </div>
        </div>
    `).join('');
}

// ====================================
// PAGINATION
// ====================================

function initializePagination() {
    updatePaginationButtons();
    renderPaginationNumbers();
}

function updatePaginationButtons() {
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const totalPages = Math.ceil(filteredProjects.length / projectsPerPage);
    
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === totalPages;
}

function renderPaginationNumbers() {
    const numbersContainer = document.getElementById('pagination-numbers');
    const totalPages = Math.ceil(filteredProjects.length / projectsPerPage);
    
    numbersContainer.innerHTML = '';
    
    for (let i = 1; i <= totalPages; i++) {
        const pageBtn = document.createElement('div');
        pageBtn.className = `page-number ${i === currentPage ? 'active' : ''}`;
        pageBtn.textContent = i;
        pageBtn.onclick = () => goToPage(i);
        numbersContainer.appendChild(pageBtn);
    }
}

function goToPage(page) {
    currentPage = page;
    renderProjects();
    updatePaginationButtons();
    renderPaginationNumbers();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

document.getElementById('prev-btn').onclick = function() {
    if (currentPage > 1) {
        goToPage(currentPage - 1);
    }
};

document.getElementById('next-btn').onclick = function() {
    const totalPages = Math.ceil(filteredProjects.length / projectsPerPage);
    if (currentPage < totalPages) {
        goToPage(currentPage + 1);
    }
};

// ====================================
// SEARCH & SORT
// ====================================

document.getElementById('search-input').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    
    filteredProjects = projectsData.filter(project => 
        project.name.toLowerCase().includes(searchTerm) ||
        project.company.toLowerCase().includes(searchTerm) ||
        project.category.toLowerCase().includes(searchTerm) ||
        project.description.toLowerCase().includes(searchTerm)
    );
    
    currentPage = 1;
    renderProjects();
    initializePagination();
});

document.getElementById('sort-select').addEventListener('change', function(e) {
    const sortBy = e.target.value;
    
    switch(sortBy) {
        case 'price-low':
            filteredProjects.sort((a, b) => a.price - b.price);
            break;
        case 'price-high':
            filteredProjects.sort((a, b) => b.price - a.price);
            break;
        case 'capacity':
            filteredProjects.sort((a, b) => b.capacity - a.capacity);
            break;
        case 'newest':
            filteredProjects.sort((a, b) => b.id - a.id);
            break;
        default: // relevant
            filteredProjects = [...projectsData];
    }
    
    currentPage = 1;
    renderProjects();
    initializePagination();
});

// ====================================
// VIEW PROJECT DETAIL
// ====================================

function viewProjectDetail(projectId) {
    if (projectId === 1) {
        window.location.href = '/product/mangrove';
    } else {
        alert('Detail proyek akan segera tersedia!');
    }
}
