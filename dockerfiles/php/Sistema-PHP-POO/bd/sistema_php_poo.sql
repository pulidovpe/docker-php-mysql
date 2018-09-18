-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2013 a las 16:22:53
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_php_poo`
--
DROP DATABASE IF EXISTS `sistema_php_poo`;
CREATE DATABASE `sistema_php_poo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_php_poo`;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` varchar(20) NOT NULL,
  `descrip_usu` varchar(25) NOT NULL,
  `clave_usu` varchar(256) NOT NULL,
  `activo` enum('S','N') NOT NULL DEFAULT 'N',
  `modulo01` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo02` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo03` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo04` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo05` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo06` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo07` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo08` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo09` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo10` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo11` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo12` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo13` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo14` enum('L','E','X') NOT NULL DEFAULT 'X',
  `modulo15` enum('L','E','X') NOT NULL DEFAULT 'X',
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `descrip_usu`, `clave_usu`, `activo`, `modulo01`, `modulo02`, `modulo03`, `modulo04`, `modulo05`, `modulo06`, `modulo07`, `modulo08`, `modulo09`, `modulo10`, `modulo11`, `modulo12`, `modulo13`, `modulo14`, `modulo15`) VALUES
('10123123', 'Usuario de pruebas', 'e10adc3949ba59abbe56e057f20f883e', 'S', 'L', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'E'),
('99009009', 'Usuario Administrativo', 'e10adc3949ba59abbe56e057f20f883e', 'S', 'E', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X');

--
-- Restricciones para tablas volcadas
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
