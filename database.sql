CREATE DATABASE IF NOT EXISTS crud_mascotas;
USE crud_mascotas;
CREATE TABLE IF NOT EXISTS mascotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO mascotas (nombre, tipo, edad, descripcion)
VALUES ('Fido', 'Perro', 3, 'Un perro muy juguetón'),
    (
        'Michi',
        'Gato',
        2,
        'Le gusta dormir todo el día'
    ),
    ('Rex', 'Perro', 5, 'Guardian de la casa');