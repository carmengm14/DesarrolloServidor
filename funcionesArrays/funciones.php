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
    
?>