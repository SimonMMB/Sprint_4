<div wire:ignore style="border: 2px solid red; padding: 20px;">
    <h2 class="text-xl font-bold">Progreso: {{ $exercise->name }}</h2>
    <select wire:model.live="timeRange" class="mb-4 border rounded px-3 py-2">
        <option value="week">Última semana</option>
        <option value="month">Último mes</option>
        <option value="all">Todo el historial</option>
    </select>
    <canvas id="myChart" width="600" height="300"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
// 1. Inicialización
let chart;

// 2. Cargar gráfico con datos INICIALES (desde PHP)
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('myChart');
    if (!ctx) return console.error("No hay canvas");
    
    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Peso (kg)',
                data: @json($chartData['weights']),
                borderColor: '#3b82f6',
                fill: false
            }]
        }
    });
});

// 3. Actualización desde Livewire (filtros)
document.addEventListener('livewire:init', () => {
    Livewire.on('updateChart', (chartData) => {
        if (!chart) return;
        chart.data.labels = chartData.labels;
        chart.data.datasets[0].data = chartData.weights;
        chart.update();
    });
});
</script>