<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo2 (1).png">
    <title>PLANTAS DANINHAS</title>
</head>

<body>
    
    <a href="api.php" class="voltar">Voltar</a>

    <div class="container mt-4">
        <div class="row">
            <?php

            // Definindo a URL da API
            $url = "https://api.cnptia.embrapa.br/bioinsumos/v2/plantas-daninhas?page=1";

            // Definindo o token de acesso
            $accessToken = "83d81ef1-9f9c-380d-adf5-6f85284ebd51";

            // Inicializando o cURL
            $ch = curl_init();

            // Configurando as opções do cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Accept: application/json",
                "Authorization: Bearer $accessToken"
            ]);

            // Executando a requisição
            $response = curl_exec($ch);

            // Verificando se ocorreu algum erro
            if (curl_errno($ch)) {
                echo 'Erro na requisição: ' . curl_error($ch);
            } else {
                // Decodificando a resposta JSON
                $data = json_decode($response, true);

                // Exibindo os dados em cards
                foreach ($data as $praga) {
                    echo '<div class="col-md-4 mb-4">';  // Coluna do Bootstrap para cards
                    echo '<div class="card" style="width: 100%;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($praga['nome_cientifico']) . '</h5>';

                    // Nomes comuns
                    $nomesComuns = implode(", ", $praga['nome_comum']);
                    echo '<p class="card-text"><strong>Nomes Comuns:</strong> ' . htmlspecialchars($nomesComuns) . '</p>';

                    echo '</div>'; // Fecha o card-body
                    echo '</div>'; // Fecha o card
                    echo '</div>'; // Fecha a coluna
                }
            }

            // Fechando o cURL
            curl_close($ch);
            ?>
        </div>
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