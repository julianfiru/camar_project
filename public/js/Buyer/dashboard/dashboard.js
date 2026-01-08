// Dashboard Animation Module - CBD (Carbon Buyer Dashboard)
(function() {
    'use strict';
    
    // Namespace untuk dashboard
    const CBD = {
        // Konfigurasi
        config: {
            animationDuration: 20,
            animationSteps: 50,
            selector: '.cbd-stat-value',
            chartInstance: null
        },
        
        // Animasi untuk statistics
        animateStatValues: function() {
            const statValues = document.querySelectorAll(this.config.selector);
            
            statValues.forEach(stat => {
                const value = parseInt(stat.textContent.replace(/,/g, ''));
                
                // Skip jika bukan angka
                if (isNaN(value)) return;
                
                let current = 0;
                const increment = value / this.config.animationSteps;
                
                const timer = setInterval(() => {
                    current += increment;
                    
                    if (current >= value) {
                        stat.textContent = value.toLocaleString();
                        clearInterval(timer);
                    } else {
                        stat.textContent = Math.floor(current).toLocaleString();
                    }
                }, this.config.animationDuration);
            });
        },
        
        // Animasi progress bar
        animateProgressBar: function() {
            const progressFills = document.querySelectorAll('.cbd-progress-fill');
            
            progressFills.forEach(fill => {
                const targetProgress = fill.getAttribute('data-progress');
                
                setTimeout(() => {
                    fill.style.width = targetProgress + '%';
                }, 500);
            });
        },
        
        // Inisialisasi Chart.js untuk Emisi vs Offset
        initEmissionChart: function() {
            const canvas = document.getElementById('emissionOffsetChart');
            if (!canvas) return;
            
            // Data dummy untuk grafik - nanti bisa diganti dengan data dari controller
            const data = [
                { "year": 2023, "emission": 1100, "offset": 0 },
                { "year": 2024, "emission": 1200, "offset": 150 },
                { "year": 2025, "emission": 1250, "offset": 200 },
                { "year": 2026, "emission": 1300, "offset": 400 },
                { "year": 2027, "emission": 1350, "offset": 600 }
            ];
            
            const years = data.map(d => d.year);
            const emissions = data.map(d => d.emission);
            const offsets = data.map(d => d.offset);
            
            // Hitung gap
            const gaps = emissions.map((emission, idx) => emission - offsets[idx]);
            
            const ctx = canvas.getContext('2d');
            
            // Destroy chart sebelumnya jika ada
            if (this.config.chartInstance) {
                this.config.chartInstance.destroy();
            }
            
            this.config.chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: years,
                    datasets: [
                        {
                            label: 'Emisi Aktual',
                            data: emissions,
                            borderColor: '#ef4444',
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            borderWidth: 3,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: '#ef4444',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Offset Direalisasi',
                            data: offsets,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3,
                            pointRadius: 6,
                            pointHoverRadius: 8,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Gap (Net Emission)',
                            data: gaps,
                            borderColor: '#f59e0b',
                            backgroundColor: 'rgba(245, 158, 11, 0.05)',
                            borderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            pointBackgroundColor: '#f59e0b',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            borderDash: [5, 5],
                            tension: 0.3,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        title: {
                            display: false
                        },
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: {
                                    size: 13,
                                    family: "'Inter', sans-serif",
                                    weight: '600'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleFont: {
                                size: 14,
                                family: "'Inter', sans-serif"
                            },
                            bodyFont: {
                                size: 13,
                                family: "'Inter', sans-serif"
                            },
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed.y.toLocaleString() + ' ton CO₂e';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                                drawBorder: false
                            },
                            ticks: {
                                font: {
                                    size: 12,
                                    family: "'Inter', sans-serif"
                                },
                                callback: function(value) {
                                    return value.toLocaleString() + ' ton';
                                }
                            },
                            title: {
                                display: true,
                                text: 'Ton CO₂e',
                                font: {
                                    size: 13,
                                    family: "'Inter', sans-serif",
                                    weight: '600'
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                font: {
                                    size: 12,
                                    family: "'Inter', sans-serif"
                                }
                            },
                            title: {
                                display: true,
                                text: 'Tahun',
                                font: {
                                    size: 13,
                                    family: "'Inter', sans-serif",
                                    weight: '600'
                                }
                            }
                        }
                    }
                }
            });
        },
        
        // Inisialisasi
        init: function() {
            // Jalankan animasi setelah halaman load
            window.addEventListener('load', () => {
                this.animateStatValues();
                this.animateProgressBar();
                
                // Delay sedikit untuk chart agar smooth
                setTimeout(() => {
                    this.initEmissionChart();
                }, 300);
            });
            
            // Re-init chart saat window resize untuk responsiveness
            let resizeTimer;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    if (this.config.chartInstance) {
                        this.config.chartInstance.resize();
                    }
                }, 250);
            });
        }
    };
    
    // Auto initialize
    CBD.init();
    
    // Expose ke window untuk akses global jika diperlukan
    window.CarbonBuyerDashboard = CBD;
    
})();