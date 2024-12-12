<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_cpf = $_POST['id_cpf'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $status = $_POST['status'] ?? null;

    // Validação dos campos
    if (empty($id_cpf) || empty($nome) || empty($senha) || empty($status)) {
        die("Todos os campos são obrigatórios!");
    }


    // Criptografar a senha com password_hash
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Inserir os dados no banco
    $sql = "INSERT INTO cadastro (id_cpf, nome, senha, status) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $con->error);
    }

    $stmt->bind_param('ssss', $id_cpf, $nome, $senha, $status);

    if ($stmt->execute()) {
        // Redireciona para a página após o cadastro
        header("Location: login.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>
