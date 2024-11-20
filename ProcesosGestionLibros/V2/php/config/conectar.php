<?php
    require_once("./configdb.php");

    /*Conectarnos al servidor de bases de datos*/
    class Conectar{
        public $pdo;

        public function __construct($servidor,$database,$usuario,$contrasenia) {
            $this->pdo = new PDO('mysql:host=' . $servidor . ';dbname=' . $basedatos, $usuario, $contrasenia);
            //$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
?>