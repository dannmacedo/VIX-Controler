<?php
$enderecoBD = "localhost";
$banco = "vix_control";
$usuarioBD = "root";
$senhaBD = "";

$conexao = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);

$message = ""; // Variável para armazenar a mensagem

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataOp = $_POST["dataOp"];
    $romaneio = $_POST["romaneio"];
    $rota = $_POST["rota"];
    $km = $_POST["km"];
    $placa = $_POST["placa"];
    $tipoVeiculo = $_POST["tipoVeiculo"];
    $motorista = $_POST["motorista"];

    // Preparando a consulta SQL para inserção dos dados
    $query = "INSERT INTO operacao (dataOp, romaneio, rota, km, placa, tipoVeiculo, motorista) 
              VALUES (:dataOp, :romaneio, :rota, :km, :placa, :tipoVeiculo, :motorista)";

    // Preparando e executando a declaração
    $statement = $conexao->prepare($query);

    // Ligando os parâmetros
    $statement->bindParam(':dataOp', $dataOp);
    $statement->bindParam(':romaneio', $romaneio);
    $statement->bindParam(':rota', $rota);
    $statement->bindParam(':km', $km);
    $statement->bindParam(':placa', $placa);
    $statement->bindParam(':tipoVeiculo', $tipoVeiculo);
    $statement->bindParam(':motorista', $motorista);

    // Executando a consulta preparada
    if ($statement->execute()) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir os dados.";
    }
}

header("Location: ../new_route.html?message=$message");
?>