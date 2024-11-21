<?php
    $servidor = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $basedatos = "bdgestionlibros";
    $pdo = new PDO('mysql:host=' . $servidor . ';dbname=' . $basedatos, $usuario, $contrasenia);
?>