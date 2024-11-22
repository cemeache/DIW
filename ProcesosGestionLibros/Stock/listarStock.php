<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gst Stock | Listar</title>

    <link rel="stylesheet" href="../V2/css/merged.css" type="text/css">
</head>
<body>
    <header>
        <div>
            <img src="../V2/img/logotipo.png" alt="Logo de la escuela">
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
        <h1>LISTADO DE LIBROS</h1>
        <hr>
        <section id="stock">
            <?php
                require_once('./cSelectDatos.php');

                $objControlador = new CSelectDatos();

                $datos = $objControlador->validarResultSelect();

                foreach ($datos as $i => $value) {
                    echo "<article>";
                    echo '<img src="../V2/img/libro.png" alt="Portada">';
                    echo "<div class='bbdd'>";
                    echo "<p>".$datos[$i]["titulo"]."</p>";
                    echo "<p>".$datos[$i]["isbn"]."</p>";
                    echo "<p>".$datos[$i]["precio"]." €</p>";
                    echo "<p>".$datos[$i]["codCurso"]."</p>";
                    echo "</div>";
                    echo '<a href="../V2/php/vistas/mostrarSeleccion.php?isbn='.$datos[$i]["isbn"].'">Asignación Manual</a>';
                    echo '<a href="">Asignación Automática</a>';
                    echo "<p id='infoStock'>".$datos[$i]["stock"]."</p>";
                    echo '<p id="titleStock">LIBROS</p>';
                    echo '<p>ACTUALIZACIÓN DE STOCK</p>';
                    echo '<input type="text" name="stockAct">';
                    echo '<figure class="botones">
                            <a href="#">
                                <img src="../V2/img/modificar.png" alt="actualizar">
                                <figcaption>ACTUALIZAR</figcaption>
                            </a>
                        </figure>
                        <figure class="botones">
                            <a href="#">
                                <img src="../V2/img/eliminar.png" alt="restablecer">
                                <figcaption>RESTABLECER</figcaption>
                            </a>
                        </figure>
                    </article>';
                }
                    
            ?>                
                
                
                
                
        </section>
        <a href="./Buscar.html">VOLVER</a>
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
