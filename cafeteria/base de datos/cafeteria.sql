-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2022 a las 06:20:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha`) VALUES
(1, 'Lenteja', '12334578869', 10000, 20, 'Granos', 0, '2022-11-08'),
(2, 'Arroz', '74642887394', 4500, 10, 'Granos', 15, '2022-11-10'),
(5, 'play 5', 'play 5', 500000, 30, 'consolas', 6, '2022-11-16'),
(8, 'play 5 slin2', 'play 5 slin2', 54, 30, 'consolas de video', 99, '2022-11-04'),
(9, 'psp 2022', 'psp 2022', 50, 2, 'consolas', 0, '2022-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `factura` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `factura`, `id_producto`, `cantidad`, `precio`, `fecha_venta`) VALUES
(1, 'favdss', 1, 2, 10000, '2022-11-17'),
(2, 'favdss', 5, 2, 500000, '2022-11-17'),
(3, '49', 1, 2, 10000, '2022-11-17'),
(4, '49', 5, 2, 500000, '2022-11-17'),
(5, '49', 1, 2, 10000, '2022-11-17'),
(6, '49', 5, 2, 500000, '2022-11-17'),
(7, '61', 1, 2, 10000, '2022-11-17'),
(8, '15', 5, 2, 500000, '2022-11-17'),
(9, '84', 1, 2, 10000, '2022-11-17'),
(10, '10', 1, 2, 10000, '2022-11-17'),
(11, '10', 5, 2, 500000, '2022-11-17'),
(13, '86', 1, 2, 10000, '2022-11-17'),
(14, '80', 1, 2, 10000, '2022-11-17'),
(15, '49', 1, 2, 10000, '2022-11-17'),
(16, '49', 5, 2, 500000, '2022-11-17'),
(17, '12', 1, 2, 10000, '2022-11-17'),
(18, '11', 5, 3, 500000, '2022-11-17'),
(19, '11', 1, 3, 10000, '2022-11-17'),
(20, '16', 5, 1, 500000, '2022-11-17'),
(21, '99', 1, 7, 10000, '2022-11-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
