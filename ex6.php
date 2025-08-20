<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Funcionario</title>
    <link rel="stylesheet" href="./_css/ex6.css">
</head>

<body>

    <h1>Formulário do Funcionario</h1>
    <br>

    <section id="formulario">

        <form method="post" enctype="multipart/form-data">
            <div id="quadrado">
                <br>
                <p>Digite seu nome completo</p>
                <input type="text" name="nome" required><br><br>
                <p>Digite seu endereço</p>
                <input type="text" name="endereco" required><br><br>
                <p>Digite seu cpf </p>
                <input type="number" name="cpf" required><br><br>
                <p>Insira sua data de nascimento </p>
                <input type="date" name="dataNasc" required><br><br>
                <p>Digite a quantidade de horas trabalhadas no mês</p>
                <input type="number" name="horasTrab" required><br><br>
                <p>Digite o quanto é recebido por hora</p>
                <input type="number" name="dpht" required><br><br>
                <p>Anexe seu curriculo</p>
                <input type="file" name="curriculo" required><br><br>

                <input type="submit" value="Enviar Informações">
            </div>
        </form>

    </section>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $cpf = $_POST["cpf"];
        $nasc = $_POST["dataNasc"];
        $horasTb = $_POST["horasTrab"];
        $recph = $_POST["dpht"];
        $arquivo = $_FILES["curriculo"];
        $pasta_destino = "../arquivoMedia/";

        if ($arquivo["error"] === UPLOAD_ERR_OK) {
            $nome_temp = $arquivo["tmp_name"];
            $nome_final = $pasta_destino . basename($arquivo["name"]);
            $nomeArquivo = basename($arquivo["name"]);

            if (!file_exists($pasta_destino)) {
                mkdir($pasta_destino, 0755, true);
            }

            if (move_uploaded_file($nome_temp, $nome_final)) {
                echo "Arquivo enviado com successo";
            } else {
                echo "Falha ao mover o arquivo";
            }
        } else {
            echo " Erro no upload" . basename($arquivo["name"]);
        }

        $info = "$nome|$endereco|$cpf|$nasc|$horasTb|$recph|$nomeArquivo\n";

        file_put_contents("../arquivosTxt/dadosTrabalhador.txt", $info, FILE_APPEND);
    }

    ?>

</body>

</html>