<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO FORMULARIO</title>
</head>
<body>
    <form method="POST">
    Nombre de Usuario : 
    <input type="text" name="username"><br><br>
    Mail:  
        <input type="email" name="email"><br><br>
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
    $email = $_POST['email'] ?? "";
    $passwd = $_POST['passwd'] ?? "";

    $existe = $pdo->query("SELECT username FROM usuarios WHERE username = '$username' AND passwd = '$passwd'");

    if ( $existe === false) {
        $consulta = $pdo->exec("INSERT INTO usuarios (username,email,passwd) VALUES ('$username','$email','$passwd')");
        echo("<br>" . "USER CREADO");
    }else{
        echo("<br>" . "YA ESTAS REGISTRADO");
    }


}
?>