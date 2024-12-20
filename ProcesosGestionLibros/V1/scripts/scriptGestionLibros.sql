-- 1. Crear la base de datos 
CREATE DATABASE IF NOT EXISTS bdGestionLibros;

-- 2. Seleccionar la base de datos para trabajar en ella
USE bdGestionLibros;

-- 3. Creación de tablas

CREATE TABLE IF NOT EXISTS administrativo (
    idAdmin INT UNSIGNED AUTO_INCREMENT,
    usuario VARCHAR(30) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL,
    correoAdmin VARCHAR(255) NOT NULL,
    CONSTRAINT pk_administrativo PRIMARY KEY (idAdmin),
    CONSTRAINT uq_usuario UNIQUE (usuario)
);

CREATE TABLE IF NOT EXISTS etapa (
    idEtapa TINYINT UNSIGNED AUTO_INCREMENT, 
    nombreEtapa VARCHAR(30) NOT NULL, -- Infantil, Ciclos y Bachillerato
    CONSTRAINT pk_etapa PRIMARY KEY (idEtapa),
    CONSTRAINT uq_nombreEtapa UNIQUE (nombreEtapa)
);

CREATE TABLE IF NOT EXISTS tutor (
    idTutor INT UNSIGNED AUTO_INCREMENT,
    nombreTutor VARCHAR(30) NOT NULL,
    correoTutor VARCHAR(255) NOT NULL,
    CONSTRAINT pk_tutor PRIMARY KEY (idTutor),
    CONSTRAINT uq_correoTutor UNIQUE (correoTutor)
);

CREATE TABLE IF NOT EXISTS curso (
    codCurso CHAR(10) NOT NULL, -- 1DAW, 2SMR, 1BACH, ...
    nombreCurso VARCHAR(120) NOT NULL, -- 1º Desarrollo de Aplicaciones Web
    idEtapa TINYINT UNSIGNED NOT NULL, 
    CONSTRAINT pk_curso PRIMARY KEY (codCurso),
    CONSTRAINT uq_nombreCurso UNIQUE (nombreCurso),
    CONSTRAINT fk_idEtapa FOREIGN KEY (idEtapa) REFERENCES etapa(idEtapa)
);

CREATE TABLE IF NOT EXISTS clase (
    codCurso CHAR(10) NOT NULL, -- 1DAW, 2SMR, 1BACH, ...
    idClase CHAR(1) NOT NULL, -- A,B,C ...
    nombreClase VARCHAR(100) NOT NULL, -- 1º Infantil-A, 1º Infantil-B, 1º Bachillerato-A, ...
    idTutor INT UNSIGNED NOT NULL,
    CONSTRAINT pk_clase PRIMARY KEY (codCurso, idClase),
    CONSTRAINT fk_codCurso FOREIGN KEY (codCurso) REFERENCES curso(codCurso),
    CONSTRAINT fk_idTutor FOREIGN KEY (idTutor) REFERENCES tutor(idTutor)
);

CREATE TABLE IF NOT EXISTS reserva (
    idReserva INT UNSIGNED AUTO_INCREMENT,
    fechaReserva DATETIME NOT NULL,
    metodoPago CHAR(15) NOT NULL, -- Transferencia, Efectivo, TPV
    estadoPago BIT DEFAULT 0, -- 0 -> No pagado, 1 -> Pagado
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(255) NOT NULL, -- Pueden realizar varias reservas con el mismo correo
    codCurso CHAR(10) NOT NULL, -- 1DAW, 2SMR, 1BACH, ...
    idClase CHAR(1) NOT NULL, -- A,B,C ...
    CONSTRAINT pk_reserva PRIMARY KEY (idReserva),
    CONSTRAINT fk_resClase FOREIGN KEY (codCurso, idClase) REFERENCES clase (codCurso, idClase)
);

CREATE TABLE IF NOT EXISTS editorial (
    idEditorial TINYINT UNSIGNED AUTO_INCREMENT,
    nombreEditorial VARCHAR(100) NOT NULL,
    CONSTRAINT pk_editorial PRIMARY KEY (idEditorial),
    CONSTRAINT uq_nombreEditorial UNIQUE (nombreEditorial)
);

CREATE TABLE IF NOT EXISTS libro (
    isbn CHAR(13) NOT NULL, -- ISBN 2 estándares - ISBN-10 (10 caract) e ISBN-13 (13 caract)
    titulo VARCHAR(100) NOT NULL,
    stock INT DEFAULT 0,
    precio DECIMAL(5,2) NOT NULL,
    idEditorial TINYINT UNSIGNED NOT NULL,
    CONSTRAINT pk_libro PRIMARY KEY (isbn),
    CONSTRAINT fk_idEditorial FOREIGN KEY (idEditorial) REFERENCES editorial(idEditorial) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS curso_libro (
    codCurso CHAR(10) NOT NULL,
    isbn CHAR(13) NOT NULL,
    CONSTRAINT pk_cursoLibro PRIMARY KEY (codCurso, isbn),
    CONSTRAINT fk_CLcodCurso FOREIGN KEY (codCurso) REFERENCES curso(codCurso) ON UPDATE CASCADE ON DELETE CASCADE, 
    CONSTRAINT fk_CLisbn FOREIGN KEY (isbn) REFERENCES libro(isbn) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS reserva_libro (
    idReserva INT UNSIGNED NOT NULL,
    isbn CHAR(13) NOT NULL,
    fechaEntrega DATETIME,
    asignado BIT DEFAULT 0, -- 0 -> No Asignado | 1 -> Asignado
    CONSTRAINT pk_reservaLibro PRIMARY KEY (idReserva, isbn),
    CONSTRAINT fk_reslib_idReserva FOREIGN KEY (idReserva) REFERENCES reserva(idReserva),
    CONSTRAINT fk_reslib_isbn FOREIGN KEY (isbn) REFERENCES libro(isbn)
);