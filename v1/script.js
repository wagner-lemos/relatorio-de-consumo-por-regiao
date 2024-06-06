// Função para obter os dados da API
function obterDadosAPI() {
    fetch('proxy.php?url=http://dados.cultura.gov.br/dataset/72d4e4e0-6506-49ee-be75-cb4ce46844f2/resource/ab517acf-3001-44b5-8e70-ccb297c62bed/download/total-consumo-por-cnaeregiao-uf-ano-mes.json')
    .then(response => response.json())
    .then(data => processarDados(data.benf_autorizadas_completo))
    .catch(error => console.error('Erro ao obter dados:', error));
}

// Função para processar os dados e calcular a soma da quantidade de vezes que cada região é retornada
function processarDados(dados) {
    const somaRegioes = {};
    dados.forEach(item => {
        const regiao = item['REGIÃO'];
        somaRegioes[regiao] = (somaRegioes[regiao] || 0) + 1;
    });
    criarGrafico(somaRegioes);
}

// Função para criar e exibir o gráfico de barras
function criarGrafico(dados) {
    const labels = Object.keys(dados);
    const values = Object.values(dados);

    const ctx = document.getElementById('grafico').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Quantidade de Ocorrências por Região',
                data: values,
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
}

// Chamar a função para obter os dados quando a página carregar
window.onload = obterDadosAPI;
