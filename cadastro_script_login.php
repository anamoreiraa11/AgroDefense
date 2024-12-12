<?php
include "conexao.php";


$id_cpf = $_POST['id_cpf'];
$senha = $_POST['senha'];

$sql = "INSERT INTO `usuario` ( `id_cpf`, `senha`)
                VALUES ('$id_cpf', '$senha')";



$sql = "SELECT * FROM  WHERE id_cpf = ? AND senha = ?"; // Ajuste para a tabela correta



if (mysqli_query($con, $sql)) {
    echo "Login efetuado com sucesso!";
} else{
    echo "Login ou senha incorreto!";
}



?>