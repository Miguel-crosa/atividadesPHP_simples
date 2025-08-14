<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples</title>
    <link rel="stylesheet" href="./_css/ex3.css">
</head>

<body>
    <h1 style="text-align: center;"> Calculadora Simples </h1>

    <form method="post">
        Digite o primeiro numero: <input type="number" name="numero" required placeholder="numero"> <br>
        Digite o operador matemático: <input type="text" name="simbolo" required placeholder="símbolo"> <br>
        Digite o segundo numero: <input type="number" name="numero2" required placeholder="numero"> <br>
        <input type="submit" value="Clique para enviar">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $numero2 = $_POST["numero2"];
        $simbolo = $_POST["simbolo"];
        $conta = 0;

        if ($simbolo == "*") {
            $conta = $numero * $numero2;
        } elseif ($simbolo == "+") {
            $conta = $numero + $numero2;
        } elseif ($simbolo == "-") {
            $conta = $numero - $numero2;
        } elseif ($simbolo == "/") {
            if ($numero == 0 && $simbolo == "/" || $numero2 == 0 && $simbolo == "/") {
                $numero = 1;
                $numero2 = 1;
                echo "<br>(Operação dividida por 0 invalida, ajustando para 1/1 para evitar erros)";
            }
            $conta = $numero / $numero2;
        } else {
            $numero = 0;
            $numero2 = 0;
            $simbolo = "+";
        }

        echo "<h3> A conta desejada com o resultado é :</h3>" . "<h2> $numero $simbolo $numero2 = $conta <h2>";
    }

    ?>

</body>

</html>