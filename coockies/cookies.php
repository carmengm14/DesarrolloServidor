<?php
    $language = "";
    //Crea aquí tu script para seleccionar el idioma
    $language = $_GET['setLanguage'] ?? "es";
    if ($language == "en"){
        $content = "This page is in English";
        $title = "Change the language of the page";
    }else{
        $content = "Esta página está en Castellano (Idioma por defecto)";
        $title = "Cambiar el idioma de la página";
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
    <h1>COOKIES</h1>
    <ul><?= $title ?>
        <li><a href='cookies.php?setLanguage=es'>Español</a></li>
        <li><a href='cookies.php?setLanguage=en'>Inglés</a></li>
    </ul>

    <?= $content ?>
</body>
</html>