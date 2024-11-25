<?php
    /*Conectar BBDD*/
    class Conectar{
        protected $pdo;

        public function __construct() {
            require_once('configdb.php');
            try {
                $this->pdo = new PDO('mysql:host=' . $servidor . ';dbname=' . $basedatos, $usuario, $contrasenia);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error en la conexión: " . $e->getMessage());
            }
        }
    }
?>