<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link href="css/cadastro.css" rel="stylesheet">
    <link rel="icon" href="img/logo2 (1).png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <img src="img/fundo.png" class="fundo">
    <img src="img/logo1.png" class="logo">

    <div class="form-container">

        <img src="img/textcadastro.png" class="textcadastro">

        <form id="formCadastro" class="form" action="cadastro_script.php" method="POST">

            <div class="mb-3">
                <input type="nunber" id="id_cpf" maxlength="14" name="id_cpf" placeholder="CPF" required>
            </div>

            <div class="mb-3">
                <input type="text" id="nome" name="nome" placeholder="NOME COMPLETO" required>
            </div>

            <div class="mb-3">
                <input type="password" id="senha" name="senha" placeholder="SENHA" required>
            </div>

            <div class="mb-3">
                <select name="status" class="status">
                    <option value="Agronomo">Agronomo</option>
                    <option value="Produtor">Produtor</option>
                </select>

                <button type="submit" class="cadastrar">CADASTRAR</button>
            </div>

            <a href="index.php" class="voltar" type="button">Voltar</a>


        </form>
    </div>

    <div class="termos">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
                Aceito os termos
            </label>
            <a href="termos.html">Termos de privasidade</a>
        </div>
    </div>

    <script>
        const cpfInput = document.getElementById('id_cpf');
        const form = document.getElementById('formCadastro');

        cpfInput.addEventListener('input', function () {
            let cpf = cpfInput.value;
            cpf = cpf.replace(/\D/g, '');

            if (cpf.length <= 11) {
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
                cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            }

            cpfInput.value = cpf;
        });

        function validarCPF(cpf) {
            cpf = cpf.replace(/\D/g, '');

            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
                return false;
            }

            let soma = 0;
            let resto;

            for (let i = 1; i <= 9; i++) {
                soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
            }
            resto = (soma * 10) % 11;
            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(9, 10))) return false;

            soma = 0;
            for (let i = 1; i <= 10; i++) {
                soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
            }
            resto = (soma * 10) % 11;
            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(10, 11))) return false;

            return true;
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const cpf = cpfInput.value;

            if (!validarCPF(cpf)) {
                alert("CPF inválido! Digite um CPF válido.");
            } else {
                alert("CPF válido! Formulário enviado com sucesso.");
                form.submit();
            }
        });
    </script>

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