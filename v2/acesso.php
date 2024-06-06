<?php
// URL da API
$url = "http://dados.cultura.gov.br/dataset/72d4e4e0-6506-49ee-be75-cb4ce46844f2/resource/ab517acf-3001-44b5-8e70-ccb297c62bed/download/total-consumo-por-cnaeregiao-uf-ano-mes.json";

// Inicializar o cURL
$curl = curl_init();

// Definir as opções do cURL
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Executar a solicitação e obter a resposta
$dados_json = curl_exec($curl);

// Verificar se houve erro
if ($dados_json === false) {
    echo "Erro ao obter os dados da API.";
    exit;
}

// Decodificar os dados JSON
$dados = json_decode($dados_json, true);

// Verificar se houve erro ao decodificar os dados
if ($dados === null) {
    echo "Erro ao decodificar os dados JSON.";
    exit;
}

// Processar os dados para calcular a soma da quantidade de vezes que cada região é retornada
$somaRegioes = array();
foreach ($dados['benf_autorizadas_completo'] as $item) {
    $regiao = $item['REGIÃO'];
    if (!isset($somaRegioes[$regiao])) {
        $somaRegioes[$regiao] = 0;
    }
    $somaRegioes[$regiao]++;
}

// Fechar o cURL
curl_close($curl);
?>