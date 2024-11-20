<?php
    require_once('../config/conectar.php');

    class mMostrarSeleccion{
        private $conexion;

        public function __construct() {
            $this->conexion = require_once('');
        }

        public function selectCampos($isbn){
            //Consulta SQL
            $consulta = "SELECT reserva.idReserva, nombre, apellidos, correo, codCurso, idClase, fechaReserva FROM reserva 
                INNER JOIN reserva_libro ON reserva.idReserva = reserva_libro.idReserva AND reserva.estadoPago = 1 AND reserva_libro.asignado = 0
                INNER JOIN libro ON libro.isbn = reserva_libro.isbn AND libro.isbn = :isbn
                ORDER BY reserva.fechaReserva ASC;";
            
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>