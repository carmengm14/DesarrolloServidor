<?php
$acceso = $_GET['dejameEntrar'] ?? '0';
if ($acceso == 1) {
    echo "BIENVENIDO";
}else{
    header('Location: login.php');
    exit();
}
?>