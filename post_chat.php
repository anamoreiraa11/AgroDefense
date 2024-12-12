<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
    <link rel="stylesheet" href="css/post_chat.css">
    <link rel="icon" href="img/logo2 (1).png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <img src="img/fundo.png" class="fundo">
    <img src="img/logo1.png" class="logo">

    <div class="rodape">
        <a href="clima.html" class="clima">CLIMA</a>
        <a href="post_img.php" class="publicacoes">PUBLICAÇÕES</a>
        <a href="api.php" class="embrapa">EMBRAPA</a>
    </div>

    <a href="postc.php" class="publicar">
        <p class="text">+</p>
    </a>

    <div class="images-container">
        <?php

        include "conexao.php";

        $conn = new mysqli($server, $user, $pass, $bd);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $query = "SELECT id_cpf, comentario FROM chat";
        $resultado = mysqli_query($conn, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                $id_cpf = $linha['id_cpf'];  // Pegando o CPF de cada linha
        
                // Consulta para pegar o nome do usuário baseado no CPF
                $queryNome = "SELECT nome FROM cadastro  WHERE id_cpf = ?";
                $stmt = $conn->prepare($queryNome);
                $stmt->bind_param("s", $id_cpf);  // Vincula o CPF para a consulta
                $stmt->execute();
                $stmt->bind_result($nome);  // Armazena o nome do usuário
                $stmt->fetch();  // Executa a consulta e preenche a variável $nome
                $stmt->close();  // Fecha a consulta
        
                ?>


                <div class="card">
                    <div class="card-content">
                        <p class="card-comment"><?php echo htmlspecialchars($nome); ?></p>
                        <p class="card-comment"><?php echo htmlspecialchars($linha['comentario']); ?></p>
                    </div>
                </div>
                <?php
            }
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<!-- V-libars -->
<div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
          <div class="vw-plugin-top-wrapper"></div>
        </div>
      </div>
      <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
      <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
      </script>
</body>

</html>