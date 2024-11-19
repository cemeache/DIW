<?php
    //Incluimos el fichero de configuración
    require_once("./conexion.php");

    //Consulta SQL
    $consulta = "SELECT nombre, apellidos, correo, codCurso, idClase, fechaReserva FROM reserva 
                    INNER JOIN reserva_libro ON reserva.idReserva = reserva_libro.idReserva AND reserva.estadoPago = 1 AND reserva_libro.asignado = 0
                    INNER JOIN libro ON libro.isbn = reserva_libro.isbn AND libro.isbn = '9781122334455'
                    ORDER BY reserva.fechaReserva ASC;";

    //Ejecutar Consulta
    $resultado = $mysqli->query($consulta);

    //Extracción de datos
    for ($i = 0; $fila = $resultado->fetch_assoc(); $i++) { 
        $nombre[$i] = $fila["nombre"];
        $apellidos[$i] = $fila["apellidos"];
        $correo[$i] = $fila["correo"];
        $codCurso[$i] = $fila["codCurso"];
        $idClase[$i] = $fila["idClase"];
        $fechaReserva[$i] = $fila["fechaReserva"];
    }

    for ($i = 0; $i < count($nombre); $i++) { 
        echo "Nombre: " . $nombre[$i] . "<br>";
        echo "Apellidos: " . $apellidos[$i] . "<br>";
        echo "Correo: " . $correo[$i] . "<br>";
        echo "Código del curso: " . $codCurso[$i] . "<br>";
        echo "ID de la clase: " . $idClase[$i] . "<br>";
        echo "Fecha de reserva: " . $fechaReserva[$i] . "<hr>";
    }
?>