<?php
    require_once("./config.php");

    /*Conectarnos al servidor de bases de datos*/
    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    /*Comprobar el error de la última conexión
	$mysqli->connect_errno;
    $mysqli->connect_error;*/
?>