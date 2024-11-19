<?php
    //Incluimos el fichero de configuración
    require_once("./conexion.php");

    //Recibir datos del formulario [idReserva de los seleccionados para asignar]
    if(isset($_POST["seleccionados"]))
        print_r($_POST["seleccionados"]);

    $consulta = "SELECT stock FROM libro WHERE isbn = '9781122334455'";
    $resultado = $mysqli->query($consulta);

    $fila = $resultado->fetch_assoc();

    echo "<br> Stock: ".$fila["stock"];
?>