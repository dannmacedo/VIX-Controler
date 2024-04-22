<?php
session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário de login
    $email = $_POST['user'];
    $senha = $_POST['senha'];

    // Conexão com o banco de dados (substitua com suas credenciais)
    $enderecoBD = "localhost";
    $banco = "vix_control";
    $usuarioBD = "root";
    $senhaBD = "";

    try {
        $conexao = new PDO("mysql:host=$enderecoBD;dbname=$banco", $usuarioBD, $senhaBD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta usando prepared statement para verificar as credenciais do usuário
        $stmt = $conexao->prepare("SELECT * FROM cadastro_usuarios WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $senha === $row['Senha']) {
            // Inicia a sessão e define a variável 'logged_in' para true
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $row['Email']; // Salva o e-mail na sessão

            // Retorna uma resposta de sucesso
            echo json_encode(['success' => true]);
            exit;
        } else {
            // Retorna uma resposta de erro
            echo json_encode(['success' => false, 'message' => 'E-mail ou senha incorretos']);
            exit;
        }
    } catch (PDOException $e) {
        // Retorna uma resposta de erro
        echo json_encode(['success' => false, 'message' => 'Erro na conexão com o banco de dados']);
        exit;
    }
}
?>