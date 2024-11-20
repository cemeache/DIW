<?php
    require_once('../config/conectar.php');

    class MmostrarSeleccion{
        private $pdo;

        public function __construct() {
            $this->pdo = new Conectar($servidor, $basedatos,$usuario,$contrasenia);
        }

        public function selectCampos($isbn){
            $consulta = "SELECT reserva.idReserva, nombre, apellidos, correo, codCurso, idClase, fechaReserva FROM reserva 
                INNER JOIN reserva_libro ON reserva.idReserva = reserva_libro.idReserva AND reserva.estadoPago = 1 AND reserva_libro.asignado = 0
                INNER JOIN libro ON libro.isbn = reserva_libro.isbn AND libro.isbn = :isbn
                ORDER BY reserva.fechaReserva ASC;";
            
            $stmt = $this->pdo->prepare($consulta);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>