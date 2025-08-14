<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Pessoais</title>
    <link rel="stylesheet" href="./_css/ex5.css">
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
        <input type="submit" value="Clique para enviar" id="enviar"><br><br>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $idade = $_POST["idade"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];

        $linha = "$nome | $cpf | $idade | $telefone | $endereco | $cep\n";

        file_put_contents("../arquivosTxt/relatorio2.txt", $linha, FILE_APPEND);
    }

    $arquivo = '../arquivosTxt/relatorio2.txt';

    if (file_exists($arquivo)) {

        $linhas = file($arquivo);
        $dados_linhas = [];
        $max_campos = 0;

        //PROCESSA TODAS AS LINHAS
        foreach ($linhas as $linha) {
            $dados = explode('|', trim($linha));
            $dados_linhas[] = $dados;
            if (count($dados) > $max_campos) {
                $max_campos = count($dados);
            }
        }

        //GERA A TABElA UNICA
        echo "<table border='1' cellpadding ='8' cellspacing='0'>";

        //CABEÇALHOS GENÉRICOS
        echo "<tr>";
        for ($i = 1; $i <= $max_campos; $i++) {
            echo "<th>Campo $i</th>";
        }
        echo "</tr>";

        //LINHAS DE DADOS
        foreach ($dados_linhas as $linha_dados) {
            echo "<tr>";
            for ($i = 0; $i < $max_campos; $i++) {
                $valor = isset($linha_dados[$i]) ? htmlspecialchars($linha_dados[$i]) : ' ';
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Arquivo não encontrado";
    }
    ?>


</body>

</html>