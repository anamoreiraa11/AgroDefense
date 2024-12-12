<?php
session_start();
$user = $_SESSION['usuario'];
echo $user;

?>

<!DOCTYPE html>
<html>

<head lang="pt-br">
    <meta charset="UTF-8">
    <title>COMENTAR</title>
    <link rel="stylesheet" href="css/postc.css">
    <link rel="icon" href="img/logo2 (1).png">
</head>

<body>
    <img src="img/fundo.png" class="fundo">
    <img src="img/logo1.png" class="logo">

    <div class="rodape">
        <a href="clima.html" class="clima">CLIMA</a>
        <a href="post_img.php" class="publicacoes">PUBLICAÇÕES</a>
        <a href="api.php" class="embrapa">EMBRAPA</a>
    </div>

    <img src="img/comentar.png" class="comentar">

    <form enctype="multipart/form-data" action="upload_chat.php" method="POST" class="form">
        <input type="text" name="id_cpf" id="id_cpf" value="<?php echo $user; ?>" readonly required
            style="display: none;">

        <textarea name="comentario" id="comentario" rows="4" cols="50" required></textarea>

        <div class="salvar"><input type="submit" value="Salvar" /></div>
    </form>



    <a href="post_chat.php"><button class="voltar">Voltar</button></a>

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