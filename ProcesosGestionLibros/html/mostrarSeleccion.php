<?php
    //Incluimos el fichero de configuración
    require_once("./conexion.php");

    //Consulta SQL
    $consulta = "SELECT reserva.idReserva, nombre, apellidos, correo, codCurso, idClase, fechaReserva FROM reserva 
                    INNER JOIN reserva_libro ON reserva.idReserva = reserva_libro.idReserva AND reserva.estadoPago = 1 AND reserva_libro.asignado = 0
                    INNER JOIN libro ON libro.isbn = reserva_libro.isbn AND libro.isbn = '9781122334455'
                    ORDER BY reserva.fechaReserva ASC;";

    //Ejecutar Consulta
    $resultado = $mysqli->query($consulta);

    //Extracción de datos
    for ($i = 0; $fila = $resultado->fetch_assoc(); $i++) { 
        $idReserva[$i] = $fila["idReserva"]; 
        $nombre[$i] = $fila["nombre"];
        $apellidos[$i] = $fila["apellidos"];
        $correo[$i] = $fila["correo"];
        $codCurso[$i] = $fila["codCurso"];
        $idClase[$i] = $fila["idClase"];
        $fechaReserva[$i] = $fila["fechaReserva"];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gst Stock | Listar</title>

    <link rel="stylesheet" href="../css/merged.css" type="text/css">
</head>
<body>
    <header>
        <div>
            <img src="../img/logotipo.png" alt="Logo de la escuela">
        </div>
        <nav>
            <a href="">HOME</a>
            <a href="">RESERVAS</a>
            <p id="gestion">GESTIÓN LIBROS</p>
            <div id="submenu">
                <a href="../GestionLibros/Añadir.html">LIBROS</a>
                <a href="../GestionStock/Buscar.html">STOCK</a>
            </div>
        </nav>
    </header>
    <main>
        <h1>LISTADO DE RESERVAS A ASIGNAR</h1>
        <hr>
        <form action="./asignarStock.php" method="POST" id="asigStock">
            <?php
                for ($i=0; $i < count($nombre); $i++) { 
                    echo "<input type='checkbox' name='seleccionados[]' value='".$idReserva[$i]."'>";
                    echo "<label>".$nombre[$i].' '.$apellidos[$i].' - '.$correo[$i].' - '.$codCurso[$i].' '.$idClase[$i]."</label><br>";
                }
            ?>
            <input type="submit" value="Asignar">
        </form>
    </main>
    <footer>
        <div class="lineaFooter">
            <h3>Contactar</h3>
            <p>C/ Corte de Peleas, 79 06009 Badajoz</p>
            <p>+34 924 25 17 61</p>
        </div>
        <div class="lineaFooter">
            <h3>Colaboradores</h3>
            <ul>
                <li>Álvaro Gómez</li>
                <li>Celia Moruno</li>
                <li>Joaquín Telo</li>
                <li>Miriam López</li>
            </ul>        
        </div>
        <div>
            <a href="https://fundacionloyola.com/vguadalupe/politica-de-cookies/">Políticas Cookies</a>
            <a href="https://fundacionloyola.com/vguadalupe/politica-de-privacidad/">Políticas Privacidad</a>
        </div>
    </footer>
</body>
</html>
