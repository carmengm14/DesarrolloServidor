<?php
    /*
    PARA RELLENAR EL NOMBRE EN EL BUSCADOR PONDREMOS:
    http://127.0.0.1:8080/cadenas.php?nombre=JUAN
    y nos saldria de nombre JUAN en vez de Victor.
    */
    $nombre = $_GET['nombre'] ?? 'Victor';
    echo trim($nombre, '/');
?>

<br>

<?php

?>
