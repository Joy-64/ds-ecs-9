-- Instalacion nueva: ejecutar este script.
-- Base existente: ejecutar migracion_profesiones.sql en su lugar.
-- Cada persona tiene una profesion; una profesion puede tener muchas personas.
-- Base de Datos
CREATE DATABASE IF NOT EXISTS arq_2026;
USE arq_2026;

CREATE TABLE IF NOT EXISTS profesiones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO profesiones (id, nombre) VALUES
(1, 'Sin especificar'),
(2, 'Docente'),
(3, 'Comerciante'),
(4, 'Programador'),
(5, 'Medico');

-- Tabla Personas
CREATE TABLE IF NOT EXISTS personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    edad INT NOT NULL,
    profesion_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_personas_profesion FOREIGN KEY (profesion_id) REFERENCES profesiones(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Datos de ejemplo (opcional)
INSERT INTO personas (nombre, email, edad, profesion_id) VALUES
('Juan García', 'juan@example.com', 28, 4),
('María López', 'maria@example.com', 25, 2),
('Carlos Pérez', 'carlos@example.com', 32, 3),
('Carlos Paez', 'carlospaez@example.com', 58, 5);
