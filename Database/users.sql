-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-11-2022 a las 22:01:51
-- Versión del servidor: 5.7.24
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tdr_database_group`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Bepes', '$2y$10$1SiuFKdKyVytQciuvlWc9.6wEir9vGjT042FivRvKpas3gK04eMJO', '2022-11-09 19:14:23'),
(2, 'Solans', '$2y$10$wG/4743Q1jWOqNdbDb0iKObHe6ZLtgjwowIdPRtDnxQYwRF/wXzv2', '2022-11-09 19:18:26'),
(3, 'Institut', '$2y$10$Kak3ZJIf5rxiT8tSiJDELuq6wHqf/S.rXA2gQoY9dpf.Di6YuOZ1i', '2022-11-17 22:56:14'),
(4, 'Ori', '$2y$10$.jRLpDXtoZzhotQGlRhWluOUVWlEz5jvMQ49Fh3IvpLuhADY5XTZO', '2022-11-17 22:56:41'),
(5, 'Albert', '$2y$10$SblWDuWjN7Nah/nz7u8Y7OZcd/DA.zN9TkpabbGkSNLC5SIhGGWYC', '2022-11-17 22:57:38'),
(6, 'Solans_', '$2y$10$KzwXMP9dZHGCqJt0D1bUaeLDaG49OEgatSaIFiCg3tQAJEjMcVili', '2022-11-17 22:59:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
