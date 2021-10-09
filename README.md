# Escrito Programacion 9/10/2021
Hecho por: Pedro Oyarzun 3ºBF

# Tablas de la base de datos:
CREATE TABLE souvenir ( id int primary key auto_increment, nombre varchar (20), descripcion varchar (255), stock
int, precio int, fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

CREATE TABLE compra( id int primary key auto_increment, nombre varchar (20), cantidad int, fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP );

CREATE TABLE usuario( id int primary key auto_increment, usuario varchar (20), contrasenia varchar(255) );

# Insertar Usuario

INSERT INTO usuario (usuario, contrasenia) VALUES ('pedrooyarzun', '$2y$10$h2ZWXH.Av9OtEVO7FNpVVepR2hk2eOshFGDgJVnPvSLxvo6p1OpSC');
