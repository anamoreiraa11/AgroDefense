<?php

include "conexao.php";  

$conn = new mysqli($server, $user, $pass, $bd);  
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

session_start();  


$id_cpf = $_POST['id_cpf'];
$comentario = $_POST['comentario'];


if (!empty($id_cpf) && !empty($comentario)) {

    $queryInsercao = "INSERT INTO chat (id_cpf, comentario) VALUES (?, ?)";

    if ($stmt = $conn->prepare($queryInsercao)) {

        $stmt->bind_param("ss", $id_cpf, $comentario);

        if ($stmt->execute()) {
            $statusMessage = "Registro inserido com sucesso!";
        } else {
            $statusMessage = "Algo deu errado ao inserir o registro. Tente novamente.";
        }

        $stmt->close();
    } else {
        $statusMessage = "Erro ao preparar o comando SQL. Tente novamente.";
    }
} else {
    $statusMessage = "Por favor, preencha todos os campos!";
}

$conn->close();

if ($statusMessage) {
    echo "<script>window.location = 'post_chat.php';</script>";
    echo "<script>alert('$statusMessage');</script>";
   
    exit();
}

?>
