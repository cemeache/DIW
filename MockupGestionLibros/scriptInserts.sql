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
('2024-11-21 15:00:00', 'TPV', 1, 'Miguel', 'Ruiz', 'miguel.ruiz@correo.com', '1DAW', 'A');

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

-- Insertar datos en la tabla reserva_libro
INSERT INTO reserva_libro (idReserva, isbn, fechaEntrega, asignado) 
VALUES 
(1, '9781234567890', '2024-11-22 09:00:00', 1),
(2, '9780987654321', NULL, 0),
(3, '9781122334455', '2024-11-23 14:30:00', 1);