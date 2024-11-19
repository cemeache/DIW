-- 4. Relleno de tablas

INSERT INTO etapa (nombreEtapa) VALUES ("Ciclos"); 
INSERT INTO etapa (nombreEtapa) VALUES ("Bachillerato"); 
INSERT INTO etapa (nombreEtapa) VALUES ("Infantil"); 

INSERT INTO tutor (nombreTutor, correoTutor) VALUES ("Ernesto","ernesto@gmail.com");
INSERT INTO tutor (nombreTutor, correoTutor) VALUES ("Isa","isa@gmail.com");
INSERT INTO tutor (nombreTutor, correoTutor) VALUES ("Paco","paco@gmail.com");
INSERT INTO tutor (nombreTutor, correoTutor) VALUES ("Alberto","alberto@gmail.com");

INSERT INTO curso (nombreCurso, idTutor, idEtapa) VALUES ("1DAW", 2, 1);
INSERT INTO curso (nombreCurso, idTutor, idEtapa) VALUES ("1BACH", 3, 2);
INSERT INTO curso (nombreCurso, idTutor, idEtapa) VALUES ("1INFANTIL", 1, 3);

INSERT INTO reserva (fechaReserva, metodoPago, estadoPago, nombre, apellidos, correo, codCurso) VALUES ();

INSERT INTO editorial (nombreEditorial) VALUES ("ANAYA");
INSERT INTO editorial (nombreEditorial) VALUES ("Santillana");