<?php
// Conexão com o banco de dados
$enderecoBD = "localhost";
$banco = "vix_control";
$usuarioBD = "root";
$senhaBD = "";

try {
    $conexao = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para recuperar os dados da tabela operacao
    $sql = "SELECT ID, DataOp, Romaneio, Rota, KM, Placa, TipoVeiculo, Motorista FROM operacao";
    $statement = $conexao->prepare($sql);
    $statement->execute();

    $operacoes = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os dados em formato JSON
    echo json_encode($operacoes);
} catch (PDOException $e) {
    // Se ocorrer um erro na conexão ou na consulta
    echo json_encode(array('error' => 'Erro: ' . $e->getMessage()));
}
?>
