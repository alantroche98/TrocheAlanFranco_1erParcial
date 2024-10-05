CREATE TABLE catastro (
    id INT PRIMARY KEY,  -- Eliminamos IDENTITY para permitir inserciones manuales
    Xfin DECIMAL(10, 2),
    Xini DECIMAL(10, 2),
    Yfin DECIMAL(10, 2),
    Yini DECIMAL(10, 2),
    zona VARCHAR(100)
);


CREATE TABLE persona (
    ci VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(100),
    paterno VARCHAR(100)
);

CREATE TABLE usuarios (
    ci VARCHAR(15) NOT NULL PRIMARY KEY,  -- Aquí se define 'ci' como clave primaria
    id INT IDENTITY(1,1),      -- También puedes tener una columna 'id' como clave primaria
    password VARCHAR(100) NOT NULL,
    role VARCHAR(10) CHECK (role IN ('user', 'admin')) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE persona_catastro (
    persona_ci VARCHAR(15) NOT NULL,  -- Cambia esto si no deseas permitir valores NULL
    catastro_id INT NOT NULL,
    PRIMARY KEY (persona_ci, catastro_id),
    FOREIGN KEY (persona_ci) REFERENCES usuarios(ci),  -- Asegúrate de que esta tabla exista
    FOREIGN KEY (catastro_id) REFERENCES catastro(id)  -- Asegúrate de que esta tabla exista
);

//              CREACION DE TABLAS FINALIZADA


INSERT INTO catastro (id, Xfin, Xini, Yfin, Yini, zona) VALUES
(10000, 100.50, 100.00, 200.50, 200.00, 'Zona A'),  -- Catastro 1
(20000, 150.50, 150.00, 250.50, 250.00, 'Zona B'),  -- Catastro 2
(30000, 200.50, 200.00, 300.50, 300.00, 'Zona C'),  -- Catastro 3
(30001, 250.50, 250.00, 350.50, 350.00, 'Zona D');  -- Catastro 4

drop table catastro;
drop table persona_catastro;

INSERT INTO persona (ci, nombre, paterno) VALUES
('12345678', 'Juan', 'Pérez'),        -- Juan Pérez
('87654321', 'Ana', 'López'),         -- Ana López
('11223344', 'Carlos', 'González'),   -- Carlos González
('33445566', 'María', 'Fernández');   -- María Fernández


INSERT INTO usuarios (ci, password, role, username) VALUES
('12345678', 'password1', 'admin', 'juanp'),  -- Juan Pérez como admin
('87654321', 'password2', 'user', 'anal'),    -- Ana López como user
('11223344', 'password3', 'user', 'carlg'),    -- Carlos González como user
('33445566', 'password4', 'user', 'mariaf');    -- María Fernández como user

INSERT INTO persona_catastro (persona_ci, catastro_id) VALUES
('12345678', 30000),   -- Juan Pérez relacionado con Catastro 1 (Zona A)
('87654321', 20000),   -- Ana López relacionado con Catastro 2 (Zona B)
('11223344', 30000),   -- Carlos González relacionado con Catastro 1 (Zona A)
('11223344', 10000),   -- Carlos González relacionado con Catastro 3 (Zona C)
('33445566', 30001);

select * from persona_catastro;



SELECT * FROM persona;
SELECT * FROM catastro;

USE bdalan;
SHOW TABLES;