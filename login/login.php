<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="formulario.php"
          method="post">
    Nombre de Usuario : 
    <input type="text" name="username"><br><br>
    Mail:  
        <input type="email" name="email"><br><br>
    Contraseña : 
    <input type="text" name="username"><br><br>
    <br>
        <input type="submit" value="Enviar" name="submit"/>
</form>
</body>
</html>

<?php
$opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => true
);

$pdo = new PDO(
    'mysql:host=localhost;dbname=usuarios;charset=utf8',
    'root',
    'sa',
$opciones);

$comprobarNombre = $pdo->query("SELECT username FROM usuarios");
while ($registro = $resultado->fetch())

{

    echo "Producto ".$registro['producto'].": ";

    echo $registro['unidades']."<br />";

}
/*if ($_POST['username'] == ) {
    # code...
}*/
?>