<?php
    require_once('../config/conectar.php');

    class MSelectDatos extends Conectar{

        public function __construct() {
            // Llamar Constructor Padre [Conectar]
            parent::__construct();
        }

        public function selectCampos(){
            // Consulta para seleccionar los campos necesarios de las tablas relacionadas
            $consulta = "SELECT libro.isbn,titulo,stock,precio,codCurso FROM libro
                            INNER JOIN curso_libro ON libro.isbn = curso_libro.isbn
                            ORDER BY codCurso;";
            
            // Preparar la consulta
            $cnsltPrep = $this->pdo->prepare($consulta);

            // Ejecutar la consulta
            $cnsltPrep ->execute();
            
            // Retornar resultados como un array associativo por filas
            return $cnsltPrep ->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>