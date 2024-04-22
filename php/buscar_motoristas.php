<?php
// Conexão com o banco de dados (substitua com suas próprias credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vix_control";

// Conexão com o MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    // Consulta para obter os motoristas
    $sql = "SELECT Nome FROM cadastro_motoristas";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Erro na consulta: " . $conn->error);
    } else {
        // Restante do seu código para exibir os resultados
    }
}


// Consulta para obter os motoristas
$sql = "SELECT Nome FROM cadastro_motoristas";
$result = $conn->query($sql);

// Verificação e preenchimento do campo de seleção
if ($result->num_rows > 0) {
    echo '<label for="motorista"><img src="imagem/driver.png"> Selecione o Motorista:</label>';
    echo '<select id="motorista" name="motorista" required>';
    echo '<option value="">Selecione um motorista</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["Nome"] . '">' . $row["Nome"] . '</option>';
    }
    echo '</select>';
} else {
    echo "Nenhum motorista encontrado";
}

// Fechando a conexão
$conn->close();
?>
