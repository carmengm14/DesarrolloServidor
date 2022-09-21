<?php
    // Crea un array llamado nombres que contenga varios nombres.
    $nombres = ["Maria", "Carmen" , "Manolo", "Alberto"];

    // Muestra el número de elementos que tiene el array (función count) 
    echo count($nombres);


    echo'<br>';
    /* Crea una cadena que contenga los nombres de los alumnos existentes en
     el array separados por un espacio y muéstrala (función de strings implode) */
     $cadena = implode(", ",$nombres);
     echo($cadena);


     echo'<br>';
    /** Muestra el array ordenado alfabéticamente (función asort)*/
    $nombresOrdenados = $nombres;
    asort($nombresOrdenados);
    print_r($nombresOrdenados);


    echo'<br>';
    /** Muestra el array en el orden inverso al que se creó (función array_reverse) */
    $nombresReversa = $nombres;
    print_r(array_reverse($nombresReversa));


    echo'<br>';
    /** Muestra la posición que tiene tu nombre en el array (función array_search) */
    $nombre = $_GET['nombre'] ?? 'sin nombre';
    $encontrado = array_search($nombre, $nombres);
    print_r($encontrado);


    echo'<br>';
    /** Crea un array de alumnos donde cada elemento sea otro array que contenga el id, nombre y edad del alumno.*/
    $alumnos = [

        ["id" => 0,"nombre" => " Carmen ", "edad" => 20],

        ["id" => 1,"nombre" => " Alberto ", "edad" => 21],

        ["id" => 2,"nombre" => " Maria ", "edad" => 22],

        ["id" => 3,"nombre" => " Manolo ", "edad" => 23]

    ];

    
    /** Crea una tabla html en la que se muestren todos los datos de los alumnos.*/
    echo "<table border=1>";
    foreach ($alumnos as $alumno) {
        echo "<tr>";
        foreach ($alumno as $key => $value ) {
            echo "<td>",  $value , "</td>";  
        }
        echo "</tr>";
    }
    echo "</table>";


    echo '<br>';
    /** Utiliza la función array_column para obtener un array indexado que contenga únicamente los nombres de los alumnos y muéstralo por pantalla. */
    $nombresitos = array_column($alumnos, 'nombre');
    print_r($nombresitos);


    echo '<br>';
    /** Crea un array con 10 números y utiliza la función array_sum para obtener la suma de los 10 números.  */

    $numeros = array('1', '5', '14', '19' );
    echo array_sum($numeros);
    

    echo '<br>';
    /**Escribe un script en PHP que muestre un array de colores como una lista desordenada. */
    $colores = array('blanco', 'verde', 'rojo');

    foreach ($colores as $color) {
        echo "<ul>";
        echo "<li>", $color , "</li>";  
        echo "</ul>";
    }


    echo'<br>';
    /**Escribe un script en PHP que muestre un array de colores como una lista desordenada y con un enlace a la página indicada en el valor. */

    $colorines = array("blanco"=>"blanco.html", "verde" => "verde.html", "rojo" => "rojo.html");

    foreach ($colorines as $color1 => $indice) {
        echo "<ul>";
            echo "<li>","<a href='$indice'>$color1</a>", "</li>";   
        echo "</ul>";
    }


    echo '<br>';
    /** Escribe un script PHP para ordenar un array asociativo. Por ejemplo:
     * Ordenado por Nombre, ascendente
     * Ordenado por Edad, ascendente
     * Ordenado por Nombre, descendente
     * Ordenado por Edad, descendente
    */
    $edades = array("Juan"=>"31","María"=>"41","Andrés"=>"39","Berta"=>"40");

    $edadesOrdenadas = $edades;
    ksort($edadesOrdenadas);
    print_r($edadesOrdenadas);

    echo'<br>';

    asort($edadesOrdenadas);
    print_r($edadesOrdenadas);

    echo'<br>';
    krsort($edadesOrdenadas);
    print_r($edadesOrdenadas);

    echo'<br>';

    arsort($edadesOrdenadas);
    print_r($edadesOrdenadas);


    echo '<br>';
    echo '<br>';
    /** A partir de una cadena con las temperaturas de un mes, realiza la media e imprime las 5 temperaturas mínimas y las 5 máximas. Funciones a utilizar: 
     * explode — Divide un string en varios string
     * count — Cuenta todos los elementos de un array print_r — Imprime información legible para humanos sobre una variable  */
    $temperaturas = [21, 32, 17, 14, 20, 25, 19, 39, 8, 16];
    $cadena1 = implode(" ",$temperaturas);
    explode(" ", $cadena1);
    echo count($temperaturas);
    
    $temperaturaBAJA = 0;
    $temperaturaALTA = 0; 
    

    echo '<br>';
    /**Tenemos un array asociativo con nombre => descripción Realiza un script php que ordene el array por la longitud de la descripción.
    Funciones a utilizar: uasort — Ordena un array con una función de comparación definida por el usuario y mantiene la asociación de índices */

    function orden($a, $b){
        if (strlen($a) == strlen($b)) {
            return 0;
        }
        return (strlen($a) > strlen($b)) ? -1 : 1;
    }

    $descripciones = ["Carmen" => "Persona del mundo", "Maria" => "Gymbro de confianza, esta fuerte  es divertida, buena acompañante para sesiones de musculacion", "Marta" => "Jugadora de futbol, es medio-centro tiene buen toque de balon y vision de juego"];
    uasort($descripciones, 'orden');
    print_r($descripciones);
?>