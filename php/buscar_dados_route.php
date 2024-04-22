<?php
$enderecoBD = "localhost";
$banco = "vix_control";
$usuarioBD = "root";
$senhaBD = "";

$conexao = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);

// Buscar dados de placas
$queryPlacas = "SELECT DISTINCT placa FROM cadastro_veiculos";
$statementPlacas = $conexao->query($queryPlacas);
$placas = $statementPlacas->fetchAll(PDO::FETCH_COLUMN);

// Buscar dados de motoristas
$queryMotoristas = "SELECT DISTINCT nome FROM cadastro_motorista";
$statementMotoristas = $conexao->query($queryMotoristas);
$motoristas = $statementMotoristas->fetchAll(PDO::FETCH_COLUMN);
// Aqui supondo que 'nome_motorista' seja a coluna com os nomes dos motoristas

echo json_encode(array("placas" => $placas, "motoristas" => $motoristas));
?>
