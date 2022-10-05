<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lOG IN FORMULARIO</title>
</head>
<body>
    <form method="POST">
    Nombre de Usuario : 
    <input type="text" name="username"><br><br>
    Contraseña : 
    <input type="password" name="passwd"><br><br>
    <br>
        <input type="submit" value="Enviar" name="submit"/>
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();

    $opciones = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    );

    $pdo = new PDO(
        'mysql:host=localhost;dbname=logs;charset=utf8',
        'root',
        'sa',
        $opciones
    );

    $username = $_POST['username'] ?? "";
    $passwd = $_POST['passwd'] ?? "";

    $consulta = $pdo->query("SELECT username FROM usuarios WHERE username = '$username' AND passwd = '$passwd'");

    //Si existe el usuario
    if ($registro = $consulta -> fetch()) {
        $_SESSION['username'] = $registro['username'];
        echo( "<br>" . "TE HAS LOGEADO");
    }else{
        echo("<br>" . "ERES FEKA");
    }
}
?>