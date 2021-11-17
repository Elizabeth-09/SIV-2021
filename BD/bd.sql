CREATE DATABASE IF NOT EXISTS iss DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

USE iss;

CREATE TABLE usuarios (
    idusuario INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usuario VARCHAR(50) NOT NULL,
    passw VARCHAR(255) NOT NULL,
    estado INTEGER NOT NULL,
    tipo INTEGER NOT NULL,
    token VARCHAR(10) NULL,
    correo VARCHAR(255) NULL,
    foto text NULL
);
/*
    Claves
    root2021
    Admin2021
*/
INSERT INTO `usuarios` (`idusuario`, `usuario`, `passw`, `estado`, `tipo`, `token`, `correo`, `foto`) VALUES
(1, 'admin', '$2y$10$svYPxGihYJvF/adVQWQA2O/7eESY8Cm2FNyrT1doOTJCAwR.keNFm', 1, 1, '', 'rigorellana@gmail.com', NULL),
(6, 'bart', '$2y$10$zQFCQvgTOduh0HyWVq1MTup7RCV0hNklTjMLpbTVrBompP/5Vlpfm', 1, 1, NULL, NULL, 'bart.png');

CREATE TABLE tipo_usuario (
    idtipo INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    tipo INTEGER NOT NULL,
    nombre_tipo VARCHAR(50) NOT NULL
);

INSERT INTO tipo_usuario (tipo, nombre_tipo) VALUES 
(1,"Root"),
(2,"Administrador"),
(3,"Operador");

CREATE TABLE categorias (
    idcategoria INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    categoria VARCHAR(50)
);

CREATE TABLE proveedores (
    idproveedor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    proveedor VARCHAR(50),
    direccion TEXT,
    telefono VARCHAR(9),
    correo VARCHAR(50)
);

CREATE TABLE productos (
    idproducto INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codproducto VARCHAR(10),
    producto TEXT NOT NULL,
    descripcion TEXT NOT NULL,
    precio_venta FLOAT NOT NULL,
    precio_compra FLOAT NOT NULL,
    idproveedor INT NOT NULL,
    fecha_ingreso DATETIME NOT NULL,
    stock FLOAT NOT NULL,
    imagen TEXT NOT NULL,
    estado INT NOT NULL
);


CREATE TABLE inventarios (
    idinventario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    idproducto INT NOT NULL,
    idcategoria INT NOT NULL,
    stock FLOAT
);

CREATE TABLE empleados (
    idempleado INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    dui VARCHAR(10) NOT NULL,
    direccion TEXT,
    telefono VARCHAR(9),
    idusuario INT NOT NULL
);

CREATE TABLE empresa (
    idempresa INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50),
    direccion TEXT,
    telefono VARCHAR(9),
    nit VARCHAR(17),
    nrc VARCHAR(15),
    logo TEXT
);

CREATE TABLE clientes (
    idcliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    dui VARCHAR(10) NOT NULL,
    nit VARCHAR(17),
    direccion TEXT,
    telefono VARCHAR(9)
);