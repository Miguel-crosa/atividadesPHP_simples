<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador Tabuada</title>
</head>

<body>
    <h2>Gerador de Tabuada</h2>
    <form method="post">
        Digite um número: <input type="number" name="numero" required>
        <input type="submit" value="Gerar resultado">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        echo "<h3> Tabuada do $numero: </h3>";
        echo "<ul>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "<li> $numero x $i = $resultado </li>";
        }
        echo "</ul>";
    }

    ?>

</body>

</html>