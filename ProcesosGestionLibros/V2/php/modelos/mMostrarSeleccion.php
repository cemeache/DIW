<?php
    require_once('../config/conectar.php');

    class MmostrarSeleccion extends Conectar{

        public function __construct() {
            //Llama al constructor padre [conectar]
            parent::__construct();
        }

        public function selectCampos($isbn){
            // Consulta para seleccionar los campos necesarios de las tablas relacionadas
            $consulta = "SELECT reserva.idReserva, nombre, apellidos, correo, codCurso, idClase, fechaReserva FROM reserva 
                    INNER JOIN reserva_libro ON reserva.idReserva = reserva_libro.idReserva 
                    INNER JOIN libro ON libro.isbn = reserva_libro.isbn
                    WHERE libro.isbn = :isbn AND reserva.estadoPago = 1 AND reserva_libro.asignado = 0
                    ORDER BY reserva.fechaReserva ASC;";
            
            // Preparar la consulta
            $cnsltPrep = $this->pdo->prepare($consulta);
            // Vincular el parámetro :isbn
            $cnsltPrep ->bindParam(':isbn', $isbn);
            // Ejecutar la consulta
            $cnsltPrep ->execute();
            // Retornar resultados como un array associativo por filas
            return $cnsltPrep ->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>