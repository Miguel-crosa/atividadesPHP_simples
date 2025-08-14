<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Pessoais</title>
    <link rel="stylesheet" href="./_css/ex4.css">
</head>

<body>
    <!-- form com 6 dados pessoais -->

    <h1>Formulário </h1>

    <form method="post">

        <input type="text" name="nome" placeholder="Digite seu nome" required> <br><br>
        <input type="text" name="cpf" placeholder="Digite seu cpf" required> <br><br>
        <input type="number" name="idade" placeholder="Digite sua idade" required> <br><br>
        <input type="tel" name="telefone" placeholder="Digite seu numero de tel." required> <br><br>
        <input type="text" name="endereco" placeholder="Digite seu endereço" required> <br><br>
        <input type="number" name="cep" placeholder="Digite seu cep" required> <br><br>
        <input type="submit" value="Clique para enviar" id="enviar">

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $idade = $_POST["idade"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];

        //MONTE A LINHA DE REGISTRO
        $linha = "$nome | $cpf | $idade | $telefone | $endereco | $cep\n";

        //GRAVA NO ARQUIVO
        file_put_contents("Dados formulário.txt", $linha, FILE_APPEND);

        //GRAVA EM UMA PASTA
        file_put_contents("../arquivosTxt/relatorio.txt", $linha, FILE_APPEND);

        echo "<br><br> <h2> Nome: $nome <br> Cpf: $cpf <br> Idade: $idade <br> Telefone: $telefone <br> Endereço: $endereco <br> Cep: $cep </h2>";
    }

    ?>

</body>

</html>