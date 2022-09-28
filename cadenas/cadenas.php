<?php
    /*
    PARA RELLENAR EL NOMBRE EN EL BUSCADOR PONDREMOS:
    http://127.0.0.1:8080/cadenas.php?nombre=JUAN
    y nos saldria de nombre JUAN en vez de Victor.
    */

    /*
    Muestra el valor de un parámetro llamado nombre recibido por querystring eliminando los caracteres
    '/' del principio y el final si los hubiera (función trim ). Si no se pasa un parámetro nombre se utilizará
    tu nombre de pila.
    Muestra la longitud del parámetro nombre (función strlen )
    Muestra el nombre en mayúsculas (función strtoupper )
    Muestra el nombre en minúsculas (función strtolower )
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

    /**Pasa un segundo parámetro por querystring llamado prefijo (para pasar más de un parámetro por la
    querystring debes separarlos utilizando el carácter &). Después indica si el nombre comienza por el
    prefijo pasado o no (función strpos ), se distinguirá entre mayúsculas y minúsculas. Si no se pasa el
    prefijo no se realizará esta operación. */
    
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

    /**Muestra el número de veces que aparece la letra a (mayúscula o minúscula) en el parámetro nombre
    (funciones substr_count + ( strtoupper o strtolower )). */
    
    $nom = strtolower($nombre);
    $contador= substr_count($nom, 'a');
    echo "Hay un total de '$contador', a en el nombre";

    echo '<br>';

    /**Muestra la posición de la primera a existente en el nombre (sea mayúscula o minúscula). Si no hay
    ninguna mostrará un texto indicándolo (función stripos ). */
    
    $primeraPos = stripos(strtolower($nombre), 'a');
    if ($primeraPos == 0){
        echo "SÍ esta en la primera posicion";
    }else{
        echo "NO esta en la primera posicion";
    }

    echo '<br>';

    /**Muestra el nombre sustituyendo las letras ‘o’ por el número cero (sea mayúscula o minúscula) (función
    str_ireplace ). */
    
    $contieneO = str_ireplace("o", "0", $nombre);
    echo $contieneO;

    echo '<br>';

    /** La función parse_url nos permite extraer distintas partes de una url. A partir de una variable que 
     * contenga una url, por ejemplo: $url = 'http://username:password@hostname:9090/path?arg=value'; Utiliza la 
     * función parse_url para extraer y mostrar por pantalla las siguientes partes de la variable url del ejemplo:
     * El protocolo utilizado (en el ejemplo http).
     * El nombre de usuario (en el ejemplo username).
     * El path de la url (en el ejemplo /path)
     * El querystring de la url (en el ejemplo arg=value) 
     * */

    $url = 'http://username:password@hostname:9090/path?arg=value';

    echo parse_url($url, PHP_URL_SCHEME);
    echo '<br>';
    echo parse_url($url, PHP_URL_USER);
    echo '<br>';
    echo parse_url($url, PHP_URL_PATH);
    echo '<br>';
    echo parse_url($url, PHP_URL_QUERY);
?>
