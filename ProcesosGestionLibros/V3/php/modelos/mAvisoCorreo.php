<?php
    require_once('../config/conectar.php');

    class MAvisoCorreo extends Conectar{

        public function __construct() {
            // Llamar Constructor Padre [Conectar]
            parent::__construct();
        }

        public function selectCorreos($idReserva){
            // SELECT | Destinatarios [Correo Reserva + Correo Tutor]
            $consulta = "SELECT nombre, apellidos, correo, correoTutor FROM reserva 
	                        INNER JOIN clase ON clase.idClase = reserva.idClase
	                        INNER JOIN tutor ON clase.idTutor = tutor.idTutor
	                        WHERE reserva.idReserva = :idReserva AND clase.codCurso = reserva.codCurso;";
            
            // Preparar la consulta
            $cnsltPrep = $this->pdo->prepare($consulta);

            // Vincular el parámetro :idResesrva
            $cnsltPrep ->bindParam(':idReserva', $idReserva);

            // Ejecutar la consulta
            $cnsltPrep ->execute();
            
            // Retornar resultados como un array associativo por filas
            return $cnsltPrep ->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>