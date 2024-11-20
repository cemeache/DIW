<?php
    //Incluimos el fichero de configuración
    require_once("./conexion.php");

    $isbn = '9781234567890';

    //Recibir datos del formulario [idReserva de los seleccionados para asignar]
    if(isset($_POST["seleccionados"]))
        print_r($_POST["seleccionados"]);

    //Mostrar Stock de Libro con X ISBN
    $consulta = "SELECT stock FROM libro WHERE isbn = '".$isbn."'";
    $resultado = $mysqli->query($consulta);

    $fila = $resultado->fetch_assoc();

    echo "<br> Stock - Actual [Before Asig]: ".$fila["stock"];
    $stock = $fila["stock"];

   // $estdUpd = array(); // Array para almacenar los resultados de las actualizaciones

    // Transactions | Actualización libro_reserva.asignado + libro.stock
    for ($i=0; $i < count($_POST["seleccionados"]) && $stock > 0; $i++) { 
        $mysqli->begin_transaction();
        $updLibRes = "UPDATE reserva_libro SET asignado=1 WHERE idReserva = ".$_POST['seleccionados'][$i]." AND isbn= '".$isbn."';";
        $updStock = "UPDATE libro SET stock=stock-1 WHERE isbn= '".$isbn."';";
        
        if ($mysqli->query($updLibRes) === true && $mysqli->query($updStock) === true) {
            $mysqli->commit();
            $stock--;
            $estdUpd[$_POST['seleccionados'][$i]] = true;
        } else{ 
            $mysqli->rollback();
            $estdUpd[$_POST['seleccionados'][$i]] = false;
        }
    }

    // Mostrar resultados de las actualizaciones
    echo "<br>Resultados de las actualizaciones:<br>";
    foreach ($estdUpd as $idReserva => $estado) {
        if ($estado)
            echo "Reserva ID $idReserva: Asignado correctamente.<br>";
        else
            echo "Reserva ID $idReserva: No se pudo asignar.<br>";
    }

    //Avisar al tutor + usuarios que realizaron la reserva

    //Funcion Enviar Correo [Header Personalizado]
    function enviarCorreo($destinatario, $asunto, $mensaje) {
        $headers = 'From: celiamerroji@gmail.com' . "\r\n" . // From -> Quien Envia
                   'Reply-To: escuelavirgendeguadalupe@fundacionloyola.es' . "\r\n" . // Reply-To -> A quién hay que responder
                   'X-Mailer: PHP/' . phpversion(); // X-Mailer -> Software Utilizado para generar el correo
        mail($destinatario, $asunto, $mensaje, $headers);
    }
    foreach ($estdUpd as $idReserva => $estado) {
        if($estado){
            $selctCorreos = "SELECT correo, correoTutor FROM reserva 
	                                INNER JOIN clase ON clase.idClase = reserva.idClase AND clase.codCurso = reserva.codCurso
	                                INNER JOIN tutor ON clase.idTutor = tutor.idTutor
	                                WHERE reserva.idReserva = ".$idReserva.";";
            $resultado = $mysqli->query($selctCorreos);
            $fila = $resultado->fetch_assoc();
            $correoTutor = $fila["correoTutor"];
            $correoResrv = $fila["correo"];
            
            //NO FUNCIONA YA QUE HAY QUE CONFIGURAR EL SERVICIO DE CORREO
            $asunto = "Reserva de libros";
            $mensaje = "Su libro con ISBN: ".$isbn." está listo para su recogida";
            enviarCorreo($correoResrv, $asunto, $mensaje);

            $mensaje = "El alumno x debe pasarse a recoger el libro con isbn: ".$isbn;
            enviarCorreo($correoTutor, $asunto, $mensaje);
            
        }   
    }

?>