<?php require_once('acesso.php');?>

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
    <div class="chart">
        <?php 
        // Calcular o total de ocorrências
        $totalOcorrencias = array_sum($somaRegioes);

        // Iterar sobre as regiões para exibir as barras
        foreach ($somaRegioes as $regiao => $quantidade)
		{
            // Calcular a porcentagem
            $porcentagem = ceil(($quantidade / $totalOcorrencias) * 100);
        ?>
		<div class="bar" style="<?php echo $regiao == "" ? 'order: 6' : ''; ?>; height: <?php echo $porcentagem; ?>%;">
			<?php echo $regiao != "" ? $regiao : 'Outras';?>
			<span class="bar-quantity"><?php echo $quantidade; ?></span>
		</div>
            
        <?php } ?>
    </div>
</body>
</html>

