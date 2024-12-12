<?php
session_start();
$user = $_SESSION['usuario'];
echo $user;

?>

<!DOCTYPE html>
<html>

<head lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTAR</title>
    <link rel="stylesheet" href="css/post.css">
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

    <img src="img/publicar.png" class="comentario">

    <form enctype="multipart/form-data" action="upload.php" method="POST" class="form">
        <input type="text" name="id_cpf" id="id_cpf" value="<?php echo $user; ?>" readonly required
            style="display: none;">

        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea>

        <input class="img" type="hidden" name="MAX_FILE_SIZE" value="99999999" />

        <input class="imagem" name="img" type="file" required />

        <div class="salvar"><a href="post_img.php"><input type="submit" value="Salvar" /></a></div>

    </form>

    <a href="post_img.php"><button class="voltar">Voltar</button></a>


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