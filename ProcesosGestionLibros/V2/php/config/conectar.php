<?php
    require_once("./configdb.php");

    /*Conectarnos al servidor de bases de datos*/
    try {
        $pdo = new PDO('mysql:host=' . $servidor . ';dbname=' . $basedatos, $usuario, $contraseña);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) 
        echo "Error al conectar a la base de datos: " . $e->getMessage();
?>