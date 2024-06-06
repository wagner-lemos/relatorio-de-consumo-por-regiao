<?php
//Configuração de um servidor PHP para contornar problemas de CORS.
header("Access-Control-Allow-Origin: *");
$url = $_GET['url'];
echo file_get_contents($url);
?>
