<?php
    /*Conectarnos al servidor de bases de datos*/
    class Conectar{

        public function __construct() {
            require_once('configdb.php');

            $pdo = new PDO('mysql:host=' . $servidor . ';dbname=' . $basedatos, $usuario, $contrasenia);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>