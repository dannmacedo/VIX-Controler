<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
//var_dump($_POST);// Verifique os dados recebidos do formulário

// Recebendo os dados do formulário
$name = $_POST["name"];
$birthdate = $_POST["birthdate"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$cnh = $_POST["cnh"];
$cnh_category = $_POST["cnh_category"];
$cnh_validity = $_POST["cnh_validity"];
$cep = $_POST["cep"];
$address = $_POST["address"];
$address_number = $_POST["address_number"];
$complement = $_POST["complement"];
$neighborhood = $_POST["neighborhood"];
$city = $_POST["city"];
$state = $_POST["state"];

// Incluindo o arquivo de conexão com o banco de dados
include "conexao.php";

// Preparando e executando a query de inserção
$sql = "INSERT INTO cadastro_motorista (Nome, DataNascimento, Telefone, Email, CPF, CNH, CategoriaCNH, ValidadeCNH, CEP, Endereco, NumEndereco, Complemento, Bairro, Cidade, UF) 
        VALUES (:nome, :birthdate, :phone, :email, :cpf, :cnh, :cnh_category, :cnh_validity, :cep, :address, :address_number, :complement, :neighborhood, :city, :state)";
$stm = $conexao->prepare($sql);
$stm->bindValue(':nome', $name);
$stm->bindValue(':birthdate', $birthdate);
$stm->bindValue(':phone', $phone);
$stm->bindValue(':email', $email);
$stm->bindValue(':cpf', $cpf);
$stm->bindValue(':cnh', $cnh);
$stm->bindValue(':cnh_category', $cnh_category);
$stm->bindValue(':cnh_validity', $cnh_validity);
$stm->bindValue(':cep', $cep);
$stm->bindValue(':address', $address);
$stm->bindValue(':address_number', $address_number);
$stm->bindValue(':complement', $complement);
$stm->bindValue(':neighborhood', $neighborhood);
$stm->bindValue(':city', $city);
$stm->bindValue(':state', $state);

$resultado = $stm->execute();

// Verificando se a inserção foi bem-sucedida e exibindo mensagem correspondente
if ($resultado) {
    echo "Motorista cadastrado com sucesso!!!";
} else {
    echo "Erro ao gravar";
}
?>
