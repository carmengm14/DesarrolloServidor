<?php
$productos = ["1" => "Producto 1", 
                "2" => "Producto 2", 
                "3" => "Producto 3"];
generarCSV($productos);

function generarCSV($array){
    foreach ($array as $key => $productos) {
        echo $key," ", $productos, " , ";
    }
}
?>