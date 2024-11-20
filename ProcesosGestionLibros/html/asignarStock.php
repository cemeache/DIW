<?php
    //Incluimos el fichero de configuración
    require_once("./conexion.php");

    $isbn = '9781122334455';

    //Recibir datos del formulario [idReserva de los seleccionados para asignar]
    if(isset($_POST["seleccionados"]))
        print_r($_POST["seleccionados"]);

    //Mostrar Stock de Libro con X ISBN
    $consulta = "SELECT stock FROM libro WHERE isbn = '".$isbn."'";
    $resultado = $mysqli->query($consulta);

    $fila = $resultado->fetch_assoc();

    echo "<br> Stock: ".$fila["stock"];
    $stock = $fila["stock"];

    for ($i=0; $i < count($_POST["seleccionados"]) && $stock > 0; $i++) { 
        $mysqli->begin_transaction();
        $updLibRes = "UPDATE libro_reserva SET asignado=1 WHERE idReserva = ".$_POST['seleccionados'][$i]." AND isbn= '".$isbn."';";
        $updStock = "UPDATE libro SET stock=stock-1 WHERE isbn= '".$isbn."';";
        
        if ($mysqli->query($updLibRes) === TRUE && $mysqli->query($updStock) === TRUE) {
            $mysqli->commit();
            $stock--;
        } else 
            $mysqli->rollback();
    }
?>