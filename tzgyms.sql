-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2017 a las 04:55:31
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tzgyms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gyms`
--

CREATE TABLE `gyms` (
  `id` int(9) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `coord_x` varchar(50) CHARACTER SET utf8 NOT NULL,
  `coord_y` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `coord_x`, `coord_y`) VALUES
(1, 'Capilla Nuestra Señora De Agua Fría', '25.811112', '-100.148533'),
(2, 'Capilla Agua Fría', '25.803136', '-100.1554'),
(3, 'Estructuras Rojas', '25.789891', '-100.141425'),
(4, 'Papalote (aeropuerto)', '25.786729', '-100.136404'),
(6, 'Coliseo la Ciudad(cento apodaca)', '25.782865', '-100.181855'),
(7, 'Imagen De Barro', '25.778443', '-100.179567'),
(8, 'General Juan Mendez Arcs', '25.78146', '-100.189245'),
(9, 'Curva Apodaca', '25.774874', '-100.187716'),
(10, 'Modelo Shield', '25.768715', '-100.190591'),
(12, 'Guardián De Oro Mural', '25.763805', '-100.173697'),
(13, 'Biblioteca Pueblo Nuevo', '25.759215', '-100.161716'),
(14, 'Molino de viento', '25.749065', '-100.163579'),
(21, 'Capilla Cristo Rey Del Amor', '25.734065', '-100.187373'),
(22, 'Mural San Judas Tadeo', '25.736455', '-100.194629');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rank` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `rank`) VALUES
(1, 'ramsk8tz', 'uvalle', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
