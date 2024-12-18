<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirmado']) && $_POST['confirmado'] === '1') {
        // Acción confirmada
        $nombre = $_POST['nombre'];
        echo "<p>Se registró correctamente.</p>";
    } else if (isset($_POST['nombre'])) {
        // Mostrar mensaje de confirmación
        $nombre = $_POST['nombre'];
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Confirmación de Acción</title>
        </head>
        <body>
            <form method="POST" action="">
                <p>¿Estás seguro de registrar esta categoría: <strong><?php echo $nombre; ?></strong>?</p>
                <input type="hidden" name="confirmado" value="1">
                <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
                <button type="submit">Sí</button>
                <a href="./confirm.php?nombre=<?php $_POST['nombre'];?>">No</a>
            </form>
        </body>
        </html>
        <?php
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Introducir Nombre</title>
</head>
<body>
    <form method="POST">
        <label for="nombre">Introduce tu nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>