-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-01-2018 a las 12:20:35
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito_compras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` TEXT NOT NULL COLLATE 'utf8_spanish_ci',
	`descripcion` TEXT NOT NULL COLLATE 'utf8_spanish_ci',
	`imagen` TEXT NOT NULL COLLATE 'utf8_spanish_ci',
	`precio` DOUBLE NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;


--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES (1, 'Celular', 'Este es un celular con 10 mpx 8g de ram ', 'celular.jpg', 102.32);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES (2, 'Cámara', 'Esta es una cámara asesina de la kgb', 'camara.jpg', 1282.82);
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES (3, 'Computadora', 'Una computadora interplanetaria', 'computadora.jpg', 4823.42);


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
