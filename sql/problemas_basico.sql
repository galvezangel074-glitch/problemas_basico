-- =============================================================
--  Base de datos: problemas_basico
--  Proyecto: Prácticas de Programación Orientada a Objetos en PHP
--  Motor: MySQL 8.x / MariaDB 10.x+ (WampServer)
--
--  Este script representa en tablas las clases del proyecto:
--    - Coche / CocheDeLujo            (Problema 1)
--    - Circulo                        (Problema 4)
--    - Persona / Estudiante / Docente (Problema 5)
--
--  La herencia de PHP se modela con "una tabla por subclase":
--  la tabla hija usa como llave primaria la llave de la tabla
--  padre (relación 1 a 1), igual que "extends" en PHP.
-- =============================================================

CREATE DATABASE IF NOT EXISTS problemas_basico
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE problemas_basico;

-- Borrar en orden inverso a las dependencias para poder re-ejecutar el script
DROP VIEW IF EXISTS vista_docentes;
DROP VIEW IF EXISTS vista_estudiantes;
DROP VIEW IF EXISTS vista_coches_de_lujo;
DROP TABLE IF EXISTS docente;
DROP TABLE IF EXISTS estudiante;
DROP TABLE IF EXISTS persona;
DROP TABLE IF EXISTS modalidad_estudio;
DROP TABLE IF EXISTS estado_academico;
DROP TABLE IF EXISTS circulo;
DROP TABLE IF EXISTS coche_de_lujo;
DROP TABLE IF EXISTS coche;

-- -------------------------------------------------------------
--  Problema 1: Coche y CocheDeLujo (CocheDeLujo extends Coche)
-- -------------------------------------------------------------
CREATE TABLE coche (
    id    INT UNSIGNED NOT NULL AUTO_INCREMENT,
    color VARCHAR(30)  NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE coche_de_lujo (
    coche_id INT UNSIGNED NOT NULL,
    extras   VARCHAR(100) NOT NULL,
    PRIMARY KEY (coche_id),
    CONSTRAINT fk_coche_de_lujo_coche
        FOREIGN KEY (coche_id) REFERENCES coche (id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -------------------------------------------------------------
--  Problema 4: Circulo (área y perímetro calculados por la BD)
-- -------------------------------------------------------------
CREATE TABLE circulo (
    id        INT UNSIGNED  NOT NULL AUTO_INCREMENT,
    radio     DECIMAL(10,2) NOT NULL,
    area      DECIMAL(12,2) AS (PI() * radio * radio) STORED,
    perimetro DECIMAL(12,2) AS (2 * PI() * radio) STORED,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

-- -------------------------------------------------------------
--  Problema 5: Persona, Estudiante y Docente
-- -------------------------------------------------------------
CREATE TABLE estado_academico (
    id          TINYINT UNSIGNED NOT NULL,
    descripcion VARCHAR(20)      NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE modalidad_estudio (
    id          TINYINT UNSIGNED NOT NULL,
    descripcion VARCHAR(20)      NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE persona (
    id               INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre           VARCHAR(50)  NOT NULL,
    apellido         VARCHAR(50)  NOT NULL,
    fecha_nacimiento DATE         NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE estudiante (
    persona_id           INT UNSIGNED      NOT NULL,
    codigo               VARCHAR(20)       NOT NULL,
    indice_academico     DECIMAL(3,2)      NOT NULL,
    cohorte              SMALLINT UNSIGNED NOT NULL,
    estado_academico_id  TINYINT UNSIGNED  NOT NULL,
    modalidad_estudio_id TINYINT UNSIGNED  NOT NULL,
    PRIMARY KEY (persona_id),
    UNIQUE KEY uk_estudiante_codigo (codigo),
    CONSTRAINT fk_estudiante_persona
        FOREIGN KEY (persona_id) REFERENCES persona (id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_estudiante_estado
        FOREIGN KEY (estado_academico_id) REFERENCES estado_academico (id),
    CONSTRAINT fk_estudiante_modalidad
        FOREIGN KEY (modalidad_estudio_id) REFERENCES modalidad_estudio (id)
) ENGINE=InnoDB;

CREATE TABLE docente (
    persona_id        INT UNSIGNED NOT NULL,
    codigo            VARCHAR(20)  NOT NULL,
    departamento      VARCHAR(50)  NOT NULL,
    categoria         VARCHAR(30)  NOT NULL,
    maximo_titulo     VARCHAR(30)  NOT NULL,
    tipo_contratacion VARCHAR(30)  NOT NULL,
    PRIMARY KEY (persona_id),
    UNIQUE KEY uk_docente_codigo (codigo),
    CONSTRAINT fk_docente_persona
        FOREIGN KEY (persona_id) REFERENCES persona (id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -------------------------------------------------------------
--  Datos (los mismos que se usan en los problemas de PHP)
-- -------------------------------------------------------------
INSERT INTO coche (id, color) VALUES
    (1, 'negro');

INSERT INTO coche_de_lujo (coche_id, extras) VALUES
    (1, 'TV');

INSERT INTO circulo (radio) VALUES
    (4);

INSERT INTO estado_academico (id, descripcion) VALUES
    (0, 'Inactivo'),
    (1, 'Activo'),
    (2, 'Retirado'),
    (3, 'Graduado');

INSERT INTO modalidad_estudio (id, descripcion) VALUES
    (1, 'Presencial'),
    (2, 'Virtual'),
    (3, 'Híbrida');

INSERT INTO persona (id, nombre, apellido, fecha_nacimiento) VALUES
    (1, 'Juan',  'Pérez',    '2000-05-15'),
    (2, 'María', 'González', '1982-03-20');

INSERT INTO estudiante (persona_id, codigo, indice_academico, cohorte, estado_academico_id, modalidad_estudio_id) VALUES
    (1, '8-988-123', 3.50, 2023, 1, 2);

INSERT INTO docente (persona_id, codigo, departamento, categoria, maximo_titulo, tipo_contratacion) VALUES
    (2, 'DOC-0457', 'Computación', 'Titular', 'Magíster', 'Tiempo completo');

-- -------------------------------------------------------------
--  Vistas: unen la tabla padre con la hija (como un objeto completo)
-- -------------------------------------------------------------
CREATE VIEW vista_coches_de_lujo AS
SELECT c.id, c.color, l.extras
FROM coche c
INNER JOIN coche_de_lujo l ON l.coche_id = c.id;

CREATE VIEW vista_estudiantes AS
SELECT p.id, p.nombre, p.apellido, p.fecha_nacimiento,
       e.codigo, e.indice_academico, e.cohorte,
       ea.descripcion AS estado_academico,
       me.descripcion AS modalidad_estudio
FROM persona p
INNER JOIN estudiante e         ON e.persona_id = p.id
INNER JOIN estado_academico ea  ON ea.id = e.estado_academico_id
INNER JOIN modalidad_estudio me ON me.id = e.modalidad_estudio_id;

CREATE VIEW vista_docentes AS
SELECT p.id, p.nombre, p.apellido, p.fecha_nacimiento,
       d.codigo, d.departamento, d.categoria,
       d.maximo_titulo, d.tipo_contratacion
FROM persona p
INNER JOIN docente d ON d.persona_id = p.id;
