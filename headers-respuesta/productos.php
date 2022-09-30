<?php
$productos = ["1" => "Producto 1", 
                "2" => "Producto 2", 
                "3" => "Producto 3"];


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename = "download.csv"');
foreach($productos as $key => $value){ 
    echo $key . " = " .$value . "\n";
}

?>