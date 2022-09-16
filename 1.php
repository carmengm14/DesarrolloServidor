<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTRODUCCIÓN PRUEBA</title>
</head>
<body>
    <h1>Hola mundo</h1>
    <?php
        echo date("l");
        $parrafo = "Esto es una prueba";
        $nombre = "Pepe";

    ?>
    <br>
    <?= $parrafo ?>
    <br>
    <?= $nombre ?>
    <br><br>
    <?php 
    echo "PRUEBA DE TABLA";
    echo "<table border = 1>";
    $contador = 1;
    for ($n1 = 1; $n1 <= 10; $n1++) { 
        echo "<tr>";
        for ($n2 = 1; $n2 <= 10; $n2++) { 
            echo "<td>", $contador, "</td>";
            $contador++;
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <br>
    <?php 
        $primerValor = $_GET['x'];
        $segundoValor = $_GET['y'];
        echo "El mundo es " . $primerValor * $segundoValor;
    ?>
    <br>
    <?php 
        $meteors = array(
            'Hoba' => 60000000,
            'Cape York' => 58200000,
            'Campo del Cielo' => 50000000,
            'Canyon Diablo' => 30000000
        );
        print_r($meteors);
        echo "<hr>";
        foreach ($meteors as $nombre => $peso) {
            echo "$nombre pesa $peso gramos <br>";
        }
    ?>
</body>
</html>
