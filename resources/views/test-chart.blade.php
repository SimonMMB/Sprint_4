<!DOCTYPE html>
<html>
<head>
    <title>Prueba Gráfico Directa</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        body { padding: 20px; }
        #testCanvas { 
            border: 3px solid red !important;
            width: 600px !important;
            height: 300px !important;
        }
    </style>
</head>
<body>
    <h1>Prueba DIRECTA de Chart.js</h1>
    
    <!-- Canvas con estilos forzados -->
    <canvas id="testCanvas"></canvas>
    
    <script>
    // Código auto-ejecutable
    (function() {
        const ctx = document.getElementById('testCanvas');
        
        // Gráfico IMPOSIBLE de no ver
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['GATO', 'PERRO', 'ELEFANTE'],
                datasets: [{
                    label: 'Prueba',
                    data: [50, 80, 120],
                    backgroundColor: [
                        '#FF0000', // Rojo
                        '#00FF00', // Verde
                        '#0000FF'  // Azul
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                plugins: {
                    title: {
                        display: true,
                        text: '¡DEBES VER ESTO!',
                        font: { size: 20 }
                    }
                }
            }
        });
        
        console.log("¡PRUEBA EXITOSA! Si no ves el gráfico, hay un bloqueo externo");
    })();
    </script>
</body>
</html>