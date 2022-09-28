<?php
$productos = ["1" => "Producto 1", 
                "2" => "Producto 2", 
                "3" => "Producto 3"];
generarCSV($productos);

function generarCSV($array){
    foreach ($array as $key => $productos) {
        echo $key," ", $productos, "\n";
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="author" content="Víctor Ponz">
</head>    
<body>
    <h1>DESCARGAR CSV</h1>
    
</body>
</html>