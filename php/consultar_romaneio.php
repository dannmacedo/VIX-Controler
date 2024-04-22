<?php
// Conexão com o banco de dados
$enderecoBD = "localhost";
$banco = "vix_control";
$usuarioBD = "root";
$senhaBD = "";

try {
    $conexao = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe o número do romaneio enviado via POST
    $numeroRomaneio = $_POST['numeroRomaneio'];

    // Consulta SQL para buscar os detalhes do romaneio
    $sql = "SELECT ID, DataOp, Romaneio, Rota, KM, Placa, Tipo, Motorista FROM operacao WHERE Romaneio = :numeroRomaneio";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':numeroRomaneio', $numeroRomaneio);
    $statement->execute();

    $dadosRomaneio = $statement->fetch(PDO::FETCH_ASSOC);

    if ($dadosRomaneio) {
        // Retorna os dados do romaneio em formato JSON
        echo json_encode($dadosRomaneio);
    } else {
        // Se o romaneio não for encontrado, retorna um erro
        echo json_encode(array('error' => 'Romaneio não encontrado'));
    }
} catch (PDOException $e) {
    // Se ocorrer um erro na conexão ou na consulta
    echo json_encode(array('error' => 'Erro: ' . $e->getMessage()));
}
?>
