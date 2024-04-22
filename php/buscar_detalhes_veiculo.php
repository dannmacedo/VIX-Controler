<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['placa'])) {
    // Recebe a placa enviada via POST
    $placaSelecionada = $_POST['placa'];

    $enderecoBD = "localhost";
    $banco = "vix_control";
    $usuarioBD = "root";
    $senhaBD = "";

    try {
        // Conexão com o banco de dados usando PDO
        $conexao = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);

        // Definir o modo de erro do PDO como exceção
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para buscar o tipo de veículo correspondente à placa no banco de dados
        $sql = "SELECT tipoVeiculo FROM cadastro_veiculos WHERE placa = :placa";

        // Preparar a consulta
        $statement = $conexao->prepare($sql);

        // Vincular o parâmetro
        $statement->bindParam(':placa', $placaSelecionada);

        // Executar a consulta
        $statement->execute();

        // Obter o resultado
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Retorne os detalhes do veículo como um JSON
            echo json_encode(array('tipoVeiculo' => $resultado['tipoVeiculo']));
        } else {
            // Se nenhum resultado for encontrado
            echo json_encode(array('tipoVeiculo' => 'Não encontrado'));
        }
    } catch (PDOException $e) {
        // Se ocorrer um erro na conexão ou na consulta
        echo json_encode(array('tipoVeiculo' => 'Erro: ' . $e->getMessage()));
    }
} else {
    // Se não foi enviado o parâmetro 'placa'
    echo json_encode(array('tipoVeiculo' => 'Placa não fornecida'));
}
?>
