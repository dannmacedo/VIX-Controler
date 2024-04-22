<?php
// Verifica se foi enviado um ID válido via método DELETE
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com o banco de dados
    $enderecoBD = "localhost";
    $banco = "vix_control";
    $usuarioBD = "root";
    $senhaBD = "";

    $conexao = new mysqli($enderecoBD, $usuarioBD, $senhaBD, $banco);

    // Verifica se a conexão foi bem-sucedida
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Query para excluir o registro com o ID fornecido
    $query = "DELETE FROM operacao WHERE ID = $id";

    if ($conexao->query($query) === TRUE) {
        // Se a exclusão foi bem-sucedida, retorna uma resposta em formato JSON
        echo json_encode(array('success' => true, 'message' => 'Registro excluído com sucesso.'));
    } else {
        // Se houver algum erro na exclusão
        echo json_encode(array('success' => false, 'message' => 'Erro ao excluir o registro.'));
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
} else {
    // Se o ID não for válido
    echo json_encode(array('success' => false, 'message' => 'ID inválido.'));
}
?>