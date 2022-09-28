<?php
$navegador = $_SERVER['HTTP_USER_AGENT'];
echo $navegador;
if ($comparacion = str_contains($navegador,"Firefox")) {
    $content = "Esta página está en Castellano (Idioma por defecto)";
    $title = "Cambiar el idioma de la página";
}else {
    $content = "NO SE PUEDE MOSTRAR LA PÁGINA";
    $title = "CAMBIA DE NAVEGADOR PARA ACCEDER";
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
    <h1>NAVEGADOR</h1>
    <?= $title ?> <br>
    <?= $content ?>
</body>
</html>