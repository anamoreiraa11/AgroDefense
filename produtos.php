<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo2 (1).png">
    <title>BIOINSUMOS</title>
</head>

<body>

    <a href="api.php" class="voltar">Voltar</a>

    <div class="container mt-4">
        <div class="row">
            <?php

            // Definindo a URL da API
            $url = "https://api.cnptia.embrapa.br/bioinsumos/v2/produtos-biologicos?page=1";

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
                foreach ($data as $produto) {
                    echo '<div class="col-md-4 mb-4">';  // Coluna do Bootstrap para cards
                    echo '<div class="card" style="width: 100%;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($produto['numero_registro']) . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . implode(", ", $produto['marca_comercial']) . '</h6>';

                    // Classe/Categoria Agronômica
                    echo '<p class="card-text"><strong>Classe/Categoria Agronômica:</strong> ' . implode(", ", $produto['classe_categoria_agronomica']) . '</p>';

                    // Ingrediente Ativo
                    $ingredientesAtivos = implode(", ", $produto['ingrediente_ativo']);
                    echo '<p class="card-text"><strong>Ingrediente Ativo:</strong> ' . htmlspecialchars($ingredientesAtivos) . '</p>';

                    // Técnica de Aplicação
                    echo '<p class="card-text"><strong>Técnica de Aplicação:</strong> ' . implode(", ", $produto['tecnica_aplicacao']) . '</p>';

                    // Indicação de Uso
                    $indicacoesUso = [];
                    foreach ($produto['indicacao_uso'] as $indicacao) {
                        $indicacoesUso[] = 'Cultura: ' . htmlspecialchars($indicacao['cultura']) . '<br>Praga Científica: ' . htmlspecialchars($indicacao['praga_nome_cientifico']) . '<br>Praga Comum: ' . implode(", ", $indicacao['praga_nome_comum']);
                    }
                    echo '<p class="card-text"><strong>Indicação de Uso:</strong><br>' . implode("<br><br>", $indicacoesUso) . '</p>';

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