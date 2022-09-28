<?php
$idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
echo $idioma;

if ($comparacion = str_contains($idioma,"es")) {
    $content = "Esta página está en Castellano (Idioma por defecto)";
    $title = "Cambiar el idioma de la página";
}else if($comparacion = str_contains($idioma,"en")){
    $content = "This page is in English";
        $title = "Change the language of the page";
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
    <h1>IDIOMA</h1>
    <?= $title ?> <br>
    <?= $content ?>
</body>
</html>