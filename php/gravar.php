<?php

$name = $_POST["name"] ?? '';
$cpf = $_POST["cpf"] ?? '';
$phone = $_POST["phone"] ?? '';
$email = $_POST["email"] ?? '';

include "conexao.php";

$sql = "INSERT INTO cadastro_usuarios (nome, cpf, telefone, email) VALUES (:nome, :cpf, :phone, :email)";
$stm = $conexao->prepare($sql);
$stm->bindValue(':nome', $name);
$stm->bindValue(':cpf', $cpf);
$stm->bindValue(':phone', $phone);
$stm->bindValue(':email', $email);

$resultado = $stm->execute();

if ($resultado) {
    echo "Usuário cadastrado com sucesso";
} else {
    echo "Erro ao cadastrar usuário";
}
exit(); // Garante que nada mais será enviado após a mensagem


?>