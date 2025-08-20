<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados escritos</title>
    <style>
        body {
            background-color: bisque;
        }

        table {
            margin: 0 auto;
            background-color: white;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Todos os Dados!</h1>

    <form method="post">
        <input type="search" name="nome" placeholder="Nome">
        <input type="search" name="endereco" placeholder="Digite o endereço">
        <input type="search" name="quantH" placeholder="quant. horas trabalhadas">
        <input type="search" name="salarioTot" placeholder="Salário > 5000">
        <input type="submit" value="Buscar">
        <br><br>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $buscar = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $quantH = $_POST["quantH"];
        $salarioTot = $_POST["salarioTot"];
        $arquivo = '../arquivosTxt/dadosTrabalhador.txt';


        if (file_exists($arquivo)) {

            $linhas = file($arquivo);
            $dados_linhas = [];
            $max_campos = 0;
            $var_temp1 = 0;
            $var_temp2 = 0;

            //PROCESSA TODAS AS LINHAS
            foreach ($linhas as $linha) {
                $dados = explode('|', trim($linha));

                $dados_linhas[] = $dados;
                if (count($dados) > $max_campos) {
                    $max_campos = 7;
                }
            }

            //GERA A TABElA UNICA

            //nome + quantidade de hora + salario + de 5000 (3 condições)//

            //LINHAS DE DADOS
            foreach ($dados_linhas as $linha_dados) {

                $salario = $linha_dados[4] * $linha_dados[5];

                if ($buscar == $linha_dados[0] && $endereco == $linha_dados[1] && $quantH == $linha_dados[4] >= 40 && $salarioTot == $salario >= 5000 || $buscar == null) {

                    echo "<table border='4px' cellpadding ='8' cellspacing='0' width=80% style='text-align:center'>";

                    //CABEÇALHOS GENÉRICOS
                    echo "<tr>";
                    for ($i = 0; $i <= $max_campos; $i++) {
                        echo "<th>Campo $i</th>";
                    }
                    echo "</tr>";


                    echo "<tr>";
                    for ($i = 0; $i < $max_campos; $i++) {
                        $valor = isset($linha_dados[$i]) ? htmlspecialchars($linha_dados[$i]) : ' ';

                        if ($i == 6) {
                            echo "<td><img src='../arquivoMedia/$valor' width='20%'></td>";
                            echo "<td  width='10%'>$salario</td>";
                        } else {
                            echo "<td width = '10%'>$valor</td>";
                        }
                    }

                    echo "</tr>";

                    echo "</table>";
                }
            }
        } else {
            echo "Arquivo não encontrado";
        }
    }

    ?>

</body>

</html>