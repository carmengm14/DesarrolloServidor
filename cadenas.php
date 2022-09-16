<?php
    /*
    PARA RELLENAR EL NOMBRE EN EL BUSCADOR PONDREMOS:
    http://127.0.0.1:8080/cadenas.php?nombre=JUAN
    y nos saldria de nombre JUAN en vez de Victor.
    */
    $nombre = $_GET['nombre'] ?? 'Victor';
    echo trim($nombre, '/');
    echo '<br>';
    echo strlen($nombre);
    echo '<br>';
    echo strtoupper($nombre);
    echo '<br>';
    echo strtolower($nombre);
    echo '<br>';

    $prefijo = $_GET['prefijo'] ?? '';
    $igual = strpos($nombre, $prefijo);
    if ($prefijo != ''){
        if ($igual === false) {
            echo "El prefijo ' $prefijo ' NO coincide con ' $nombre";
        }else{
            echo "El prefijo ' $prefijo ' coincide con ' $nombre";
    }
    }

    echo '<br>';
    $contador = 0;
    $contamosmin = substr_count($nombre, 'a');
    $contamosmay = substr_count($nombre, 'A');
    $total = $contamosmay + $contamosmin;
    echo "Hay un total de '$total', a en el nombre";

    echo '<br>';

    $primeraPos = stripos(strtolower($nombre), 'a');
    if ($primeraPos == 0){
        echo "SÍ esta en la primera posicion";
    }else{
        echo "NO esta en la primera posicion";
    }

    echo '<br>';

    $contieneO = str_ireplace("o", "0", $nombre);
    echo $contieneO;

    echo '<br>';

    $url = 'http://username:password@hostname:9090/path?arg=value';

    echo parse_url($url, PHP_URL_SCHEME);
    echo '<br>';
    echo parse_url($url, PHP_URL_USER);
    echo '<br>';
    echo parse_url($url, PHP_URL_PATH);
    echo '<br>';
    echo parse_url($url, PHP_URL_QUERY);
?>
