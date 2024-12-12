<?php

include "conexao.php";

$conn = new mysqli($server, $user, $pass, $bd);



if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
session_start();

$id_cpf = $_POST['id_cpf'];
$comentario = $_POST['comentario'];
$img = $_FILES['img']['tmp_name'];
$tamanho = $_FILES['img']['size'];
$tipo = $_FILES['img']['type'];
$nome = $_FILES['img']['name'];

if (!empty($img)) {

    $fp = fopen($img, "rb");
    $conteudo = fread($fp, $tamanho);
    fclose($fp);

    $queryInsercao = "INSERT INTO post (id_cpf, img, comentario, tamanho, tipo, nome) 
                      VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($queryInsercao)) {

        $stmt->bind_param("sbssss", $id_cpf, $conteudo, $comentario, $tamanho, $tipo, $nome);

        $stmt->send_long_data(1, $conteudo);
        if ($stmt->execute()) {
            // Mensagem de sucesso
            $statusMessage = "Registro inserido com sucesso!";
        } else {
            // Mensagem de erro ao inserir
            $statusMessage = "Algo deu errado ao inserir o registro. Tente novamente.";
        }

        // Fechar o statement
        $stmt->close();
    }
} else {
    // Mensagem caso a imagem não seja carregada
    $statusMessage = "Não foi possível carregar a imagem.";
}

// Fechar a conexão com o banco de dados
$conn->close();

// Exibir a mensagem de status antes de redirecionar
if ($statusMessage) {
    echo "<script>window.location = 'post_img.php';</script>";
    echo "<script>alert('$statusMessage');</script>";
    // Redirecionar para a página 'post_img.php' após 1 segundo
    
    exit();
}

?>