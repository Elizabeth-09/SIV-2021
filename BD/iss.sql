-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-11-2021 a las 08:01:31
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iss`
--
CREATE DATABASE IF NOT EXISTS `iss` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `iss`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `token` varchar(10) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `passw`, `estado`, `tipo`, `token`, `correo`, `foto`) VALUES
(1, 'admin', '$2y$10$svYPxGihYJvF/adVQWQA2O/7eESY8Cm2FNyrT1doOTJCAwR.keNFm', 1, 1, '', 'rigorellana@gmail.com', NULL),
(6, 'bart', '$2y$10$zQFCQvgTOduh0HyWVq1MTup7RCV0hNklTjMLpbTVrBompP/5Vlpfm', 1, 1, NULL, NULL, 'bart.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
