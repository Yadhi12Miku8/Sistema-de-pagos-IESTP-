-- Insertar roles del sistema
INSERT INTO roles (nombre)
VALUES 
('usuario'),
('bienestar'),
('direccion');
-- Insertar usuarios (ejemplo con contraseñas cifradas usando SHA2)
INSERT INTO usuarios (usuario, nombre_completo, correo, contrasena_hash, rol_id)
VALUES
('estudiante01', 'Carlos Ramírez López', 'carlos.ramirez@gmail.com', SHA2('123456', 256), 1), -- Rol: usuario
('bienestar01', 'María Fernández Torres', 'maria.fernandez@instituto.edu', SHA2('123456', 256), 2), -- Rol: bienestar
('direccion01', 'Jorge Paredes Castillo', 'jorge.paredes@instituto.edu', SHA2('123456', 256), 3); -- Rol: direccion

