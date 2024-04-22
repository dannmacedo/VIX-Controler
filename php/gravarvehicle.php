<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$placa = $_POST["placa"] ?? '';
$modelo = $_POST["modelo"] ?? '';
$cor = $_POST["cor"] ?? '';
$anoFabricacao = $_POST["anoFabricacao"] ?? '';
$anoModelo = $_POST["anoModelo"] ?? '';
$renavan = $_POST["renavan"] ?? '';
$tipoVeiculo = $_POST["tipoVeiculo"] ?? '';
$validadeLicenciamento = $_POST["validadeLicenciamento"] ?? '';

include "conexao.php";

$sql = "INSERT INTO cadastro_veiculos (placa, modelo, cor, anoFabricacao, anoModelo, renavan, tipoVeiculo, validadeLicenciamento) VALUES (:placa, :modelo, :cor, :anoFabricacao, :anoModelo, :renavan, :tipoVeiculo, :validadeLicenciamento)";
$stm = $conexao->prepare($sql);
$stm->bindValue(':placa', $placa);
$stm->bindValue(':modelo', $modelo);
$stm->bindValue(':cor', $cor);
$stm->bindValue(':anoFabricacao', $anoFabricacao);
$stm->bindValue(':anoModelo', $anoModelo);
$stm->bindValue(':renavan', $renavan);
$stm->bindValue(':tipoVeiculo', $tipoVeiculo);
$stm->bindValue(':validadeLicenciamento', $validadeLicenciamento);

$resultado = $stm->execute();

if ($resultado) {
    echo "Veículo cadastrado com sucesso";
} else {
    echo "Erro ao cadastrar Veículo";
}
exit(); // Garante que nada mais será enviado após a mensagem


?>


     