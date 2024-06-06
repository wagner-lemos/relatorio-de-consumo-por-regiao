<?php require_once("acesso.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Consumo por Região</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Relatório de Consumo por Região</h1>
    <div class="chart-container">
        <canvas id="grafico"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var labels = <?php echo json_encode(array_keys($somaRegioes)); ?>;
        var data = <?php echo json_encode(array_values($somaRegioes)); ?>;
        
        var ctx = document.getElementById('grafico').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Quantidade de Ocorrências por Região',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
