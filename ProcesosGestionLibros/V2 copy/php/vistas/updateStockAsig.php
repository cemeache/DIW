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
        <h1>ASIGNACIÓN REALIZADA</h1>
        <hr>
        <?php
            require_once('../controladores/cUpdateStockAsig.php');
            require_once('../controladores/cAvisoCorreo.php');

            // Comprobar si ha rellenado algo y si no, enviar array vacío
            $seleccionados = isset($_POST["seleccionados"]) ? $_POST["seleccionados"] : [];
            // Instancia Controlador Update
            $objCUpdate = new CUpdateStockAsig($seleccionados, $_GET["isbn"]);

            $datosVld = $objCUpdate->validarTransactionUpdates();

            if(is_array($datosVld)) {
                // Instancia Controlador AvisoCorreo
                $objCAvisoCorreo = new CAvisoCorreo($datosVld);
                $resultsEmails = $objCAvisoCorreo->enviarCorreo($_GET['isbn']);

                foreach ($datosVld as $i => $asig) {
                    /*La combinación de ternarias equivale a este conjunto de if - else
                        Creo que de la otra forma queda más limpio
                    
                    if (isset($resultsEmails[$i])) {
                        if ($resultsEmails[$i][0] && $resultsEmails[$i][1])
                            $emailStatus = "Correos Enviados";
                        else
                            $emailStatus = "Correos No Enviados";
                    else
                            $emailStatus = "Correos No Enviados";
                    */

                    $emailStatus = isset($resultsEmails[$i]) ? (($resultsEmails[$i][0] && $resultsEmails[$i][1]) ? "Correos Enviados" : "Correos No Enviados") : 
                        "Correos No Enviados";
                    
                    echo "<p class='error'>Reserva ID: ".$i." - ".($asig ? "Asignado" : "No Asignado")." - ".$emailStatus."</p>";
                }
            } else {
                echo "<p class='msjError'>".$datosVld."</p>";
            }
        ?>
        <a href="./listarStock.php">Volver</a>
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
