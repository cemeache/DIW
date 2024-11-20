<?php
    require_once("configdb.php");

    /*Conectarnos al servidor de bases de datos*/
    class Conectar{

        public function __construct($servidor,$basedatos,$usuario,$contrasenia) {
            $pdo = new PDO('mysql:host=' . $servidor . ';dbname=' . $basedatos, $usuario, $contrasenia);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }
?>