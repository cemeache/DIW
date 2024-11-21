<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gst Stock | Listar</title>

    <link rel="stylesheet" href="../../css/merged.css" type="text/css">
</head>
<body>
    <header>
        <div>
            <img src="../../img/logotipo.png" alt="Logo de la escuela">
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
                require_once('../controladores/cMostrarSeleccion.php');
                $objControlador = new CMostrarSeleccion('9780987654321');
                // Obtener los resultados
                $datosVld = $objControlador->validarResultSelect();

                // Verificar y contar los resultados
                if (count($datosVld) > 0) {
                    for ($i = 0; $i < count($datosVld); $i++) {
                        echo "<input type='checkbox' name='seleccionados[]' value='" . $datosVld[$i]["idReserva"] . "'>";
                        echo "<label>" . $datosVld[$i]['nombre'] . ' ' . $datosVld[$i]['apellidos'] . ' - ' . $datosVld[$i]["correo"] . ' - ' . $datosVld[$i]['codCurso'] . ' ' . $datosVld[$i]['idClase'] . "</label><br>";
                    }
                } else {
                    echo "No se encontraron resultados.";
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
