<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagens</title>
    <link rel="stylesheet" href="css/pagina_inicial.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">CLIMA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ALERTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CHAT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NOTÍCIAS</a>
                    </li>
            </div>
        </div>
    </nav>

    <a href="post_chat.php"><button class="publicar">+</button></a>


    <div class="images-container">
        <?php
        include "conexao.php";

        $conn = new mysqli($server, $user, $pass, $bd);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $query = "SELECT id_cpf, img, comentario FROM post";
        $resultado = mysqli_query($conn, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado)) {
                ?>

                <p class="card-comment"><?php echo htmlspecialchars($linha['id_cpf']); ?></p>
                <div class="card">

                    <div class="card-content">
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


</body>

</html>