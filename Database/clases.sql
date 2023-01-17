-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 14-11-2022 a las 12:56:40
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tdr_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `aula` text NOT NULL,
  `id` int(11) NOT NULL,
  `PASSWORD` int(11) NOT NULL,
  `LLUMS` int(11) NOT NULL,
  `ALUMNES` int(11) NOT NULL,
  `TEMPERATURA` int(11) NOT NULL,
  `HUMETAT` int(11) NOT NULL,
  `VENTILADORS` int(11) NOT NULL,
  `RELES` int(11) NOT NULL,
  `Master` int(11) NOT NULL,
  `ESTAT` int(11) NOT NULL,
  `CAIXA_MAIN` int(11) NOT NULL,
  `CAIXA_RELES` int(11) NOT NULL,
  `CAIXA_PORTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`aula`, `id`, `PASSWORD`, `LLUMS`, `ALUMNES`, `TEMPERATURA`, `HUMETAT`, `VENTILADORS`, `RELES`, `Master`, `ESTAT`, `CAIXA_MAIN`, `CAIXA_RELES`, `CAIXA_PORTA`) VALUES
('ABP', 123456, 123456, 1, 1, 20, 30, 1, 1, 0, 1, 1, 0, 0),
('1R-BATX', 12345, 12345, 0, 0, 19, 19, 0, 0, 0, 0, 0, 0, 0),
('2n-batx-b', 123, 123, 0, 1, 20, 30, 0, 0, 0, 1, 1, 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
