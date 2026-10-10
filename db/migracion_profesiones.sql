-- Ejecutar una sola vez sobre la base existente, antes de usar el nuevo ABM.
-- No ejecutar si la base ya fue creada con el nuevo schema.sql.
-- Las personas existentes conservan sus datos y quedan con "Sin especificar".
USE arq_2026;

CREATE TABLE profesiones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO profesiones (id, nombre) VALUES
(1, 'Sin especificar'),
(2, 'Docente'),
(3, 'Comerciante'),
(4, 'Programador'),
(5, 'Medico');

ALTER TABLE personas ADD COLUMN profesion_id INT NULL AFTER edad;
UPDATE personas SET profesion_id = 1;
ALTER TABLE personas
    MODIFY COLUMN profesion_id INT NOT NULL,
    ADD CONSTRAINT fk_personas_profesion FOREIGN KEY (profesion_id) REFERENCES profesiones(id);
