-- Insertar datos en la tabla administrativo
INSERT INTO administrativo (usuario, contrasenia, correoAdmin) 
VALUES 
('admin1', 'password123', 'admin1@colegio.com'),
('admin2', 'password456', 'admin2@colegio.com');

-- Insertar datos en la tabla etapa
INSERT INTO etapa (nombreEtapa) 
VALUES 
('Infantil'),
('Ciclos Formativos'),
('Bachillerato');

-- Insertar datos en la tabla tutor
INSERT INTO tutor (nombreTutor, correoTutor) 
VALUES 
('María López', 'maria.lopez@colegio.com'),
('Juan Pérez', 'juan.perez@colegio.com'),
('Laura Martínez', 'laura.martinez@colegio.com');

-- Insertar datos en la tabla curso
INSERT INTO curso (codCurso, nombreCurso, idEtapa) 
VALUES 
('1INF', '1º Infantil', 1),
('2INF', '2º Infantil', 1),
('1DAW', '1º Desarrollo de Aplicaciones Web', 2),
('2DAW', '2º Desarrollo de Aplicaciones Web', 2),
('1BACH', '1º Bachillerato', 3);

-- Insertar datos en la tabla clase
INSERT INTO clase (codCurso, idClase, nombreClase, idTutor) 
VALUES 
('1INF', 'A', '1º Infantil-A', 1),
('2INF', 'B', '2º Infantil-B', 2),
('1DAW', 'A', '1º Desarrollo de Aplicaciones Web-A', 3),
('1BACH', 'A', '1º Bachillerato-A', 1);

-- Insertar datos en la tabla reserva
INSERT INTO reserva (fechaReserva, metodoPago, estadoPago, nombre, apellidos, correo, codCurso, idClase) 
VALUES 
('2024-11-19 10:00:00', 'Transferencia', 1, 'Carlos', 'Gómez', 'carlos.gomez@correo.com', '1INF', 'A'),
('2024-11-20 12:00:00', 'Efectivo', 0, 'Lucía', 'Hernández', 'lucia.hernandez@correo.com', '2INF', 'B'),
('2024-11-21 15:00:00', 'TPV', 1, 'Miguel', 'Ruiz', 'miguel.ruiz@correo.com', '1DAW', 'A'),

-- V2
('2024-12-01 09:00:00', 'Transferencia', 1, 'Raúl', 'Jiménez', 'raul.jimenez@correo.com', '2INF', 'B'),
('2024-12-02 10:30:00', 'Efectivo', 0, 'Sandra', 'Molina', 'sandra.molina@correo.com', '1DAW', 'A'),
('2024-12-03 11:45:00', 'TPV', 1, 'Diego', 'Vargas', 'diego.vargas@correo.com', '1BACH', 'A'),
('2024-12-04 12:15:00', 'Transferencia', 1, 'Eva', 'Flores', 'eva.flores@correo.com', '1DAW', 'A'),
('2024-11-25 09:30:00', 'TPV', 1, 'Sofía', 'Martínez', 'sofia.martinez@correo.com', '1INF', 'A'),
('2024-11-25 11:45:00', 'Efectivo', 1, 'Fernando', 'Núñez', 'fernando.nunez@colegio.com', '1DAW', 'A'),
('2024-11-26 13:15:00', 'Transferencia', 1, 'Isabel', 'Ramírez', 'isabel.ramirez@colegio.com', '1DAW', 'A'),
('2024-11-26 15:00:00', 'Efectivo', 1, 'Javier', 'Sánchez', 'javier.sanchez@colegio.com', '2INF', 'B'),
('2024-11-27 10:00:00', 'TPV', 1, 'Beatriz', 'González', 'beatriz.gonzalez@colegio.com', '1INF', 'A'),
('2024-11-27 12:30:00', 'Transferencia', 1, 'Antonio', 'López', 'antonio.lopez@colegio.com', '1BACH', 'A');

-- Insertar datos en la tabla editorial
INSERT INTO editorial (nombreEditorial) 
VALUES 
('Santillana'),
('Anaya'),
('McGraw-Hill');

-- Insertar datos en la tabla libro
INSERT INTO libro (isbn, titulo, stock, precio, idEditorial) 
VALUES 
('9781234567890', 'Matemáticas 1º Infantil', 10, 25.50, 1),
('9780987654321', 'Lengua 1º Infantil', 15, 23.75, 2),
('9781122334455', 'Programación 1º DAW', 20, 50.00, 3);

-- Insertar datos en la tabla curso_libro
INSERT INTO curso_libro (codCurso, isbn) 
VALUES 
('1INF', '9781234567890'),
('1INF', '9780987654321'),
('1DAW', '9781122334455');

-- Insertar datos en la tabla reserva_libros
INSERT INTO reserva_libro (idReserva, isbn, fechaEntrega, asignado) 
VALUES 
(1, '9781234567890', '2024-11-22 09:00:00', 1),
(2, '9780987654321', NULL, 0),
(3, '9781122334455', NULL, 0);

-- Inserciones V2
INSERT INTO reserva_libro (idReserva, isbn, fechaEntrega, asignado) 
VALUES 
-- Reserva de Raúl Jiménez: Un libro entregado y dos no asignados
(14, '9781234567890', '2024-12-05 09:00:00', 1),
(14, '9780987654321', NULL, 0),
(14, '9781122334455', NULL, 0),

-- Reserva de Sandra Molina: Ningún libro asignado
(15, '9781234567890', NULL, 0),
(15, '9780987654321', NULL, 0),

-- Reserva de Diego Vargas: Dos libros asignados y dos sin entregar
(16, '9781234567890', '2024-12-06 11:00:00', 1),
(16, '9780987654321', '2024-12-07 12:00:00', 1),
(16, '9781122334455', NULL, 0),

-- Reserva de Eva Flores: Un libro asignado y entregado, dos no asignados
(17, '9781234567890', '2024-12-08 13:00:00', 1),
(17, '9780987654321', NULL, 0),
(17, '9781122334455', NULL, 0);

-- Inserciones V3
INSERT INTO reserva_libro (idReserva, isbn, fechaEntrega, asignado) 
VALUES 
(18, '9781234567890', NULL, 0),
(19, '9781122334455', '2024-11-25 12:00:00', 1),
(20, '9780987654321', NULL, 0),
(21, '9781234567890', '2024-11-26 16:00:00', 1),
(22, '9780987654321', '2024-11-28 11:00:00', 1),
(23, '9781122334455', NULL, 0);