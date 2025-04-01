<div wire:ignore class="space-y-3">
    <!-- Selector compacto -->
    <div class="flex justify-center">
        <select wire:model.live="timeRange" 
                class="text-xs border-0 bg-white/80 dark:bg-gray-700/80 rounded-full shadow px-3 py-1 focus:ring-1 focus:ring-orange-500 transition-all">
            <option value="week">Última semana</option>
            <option value="month">Último mes</option>
            <option value="all">Todo el historial</option>
        </select>
    </div>
    
    <!-- Gráfico compacto -->
    <div class="relative" style="height: 220px;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
let chart;
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('myChart');
    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartData['labels']).map((label, index) => 
                `Sesión ${index + 1}\n${label}`), // Añade número de sesión
            datasets: [{
                data: @json($chartData['weights']),
                backgroundColor: '#f97316aa',
                borderColor: '#f97316',
                borderWidth: 0.5,
                borderRadius: 3,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        title: (context) => {
                            const labelParts = context[0].label.split('\n');
                            return [`Sesión: ${labelParts[0].replace('Sesión ', '')}`, 
                                    `Fecha: ${labelParts[1]}`];
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { 
                        display: false,
                        color: 'rgba(255, 255, 255, 0.1)' 
                    },
                    ticks: { 
                        font: { size: 10 },
                        color: 'white' // Texto eje Y blanco
                    },
                    border: {
                        color: 'white' // Línea eje Y blanca
                    }
                },
                x: {
                    grid: { 
                        display: false,
                        color: 'rgba(255, 255, 255, 0.1)' 
                    },
                    ticks: { 
                        font: { size: 9 },
                        color: 'white', // Texto eje X blanco
                        maxRotation: 30,
                        minRotation: 30,
                        callback: function(value) {
                            // Muestra "Sesión X - Fecha" en el eje
                            const parts = this.getLabelForValue(value).split('\n');
                            return `${parts[0]} - ${parts[1]}`;
                        }
                    },
                    border: {
                        color: 'white' // Línea eje X blanca
                    }
                }
            },
            datasets: {
                bar: {
                    barThickness: 25,
                    categoryPercentage: 0.4,
                    barPercentage: 0.8
                }
            }
        }
    });
});

// Livewire (sin cambios)
document.addEventListener('livewire:init', () => {
    Livewire.on('updateChart', (chartData) => {
        if (chart) {
            // Actualiza labels incluyendo número de sesión
            chart.data.labels = chartData.labels.map((label, index) => 
                `Sesión ${index + 1}\n${label}`);
            chart.data.datasets[0].data = chartData.weights;
            chart.update();
        }
    });
});
</script>