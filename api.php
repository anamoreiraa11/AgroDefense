<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/api.css">
  <link rel="icon" href="img/logo2 (1).png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>INFORMAÇÕES</title>
</head>

<body>
  <img src="img/fundo.png" class="fundo">
  <img src="img/logo1.png" class="logo">

  <div class="rodape">
    <a href="clima.html" class="clima">CLIMA</a>
    <a href="post_img.php" class="publicacoes">PUBLICAÇÕES</a>
    <a href="post_chat.php" class="chat">CHAT</a>
  </div>

    <img src="img/informacoes.png" class="informacoes">
    <img src="img/embrapa.png" class="embrapa">

    <div class="tudo">
      <a href="inoculante.php"><button>INOCULANTE</button></a>
      <a href="planta_daninha.php"><button>PLANTAS DANINHAS</button></a>
      <a href="pragas.php"><button>PRAGAS</button></a>
      <a href="produtos.php"><button>BIOINSUMOS</button></a>
    </div>

   


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