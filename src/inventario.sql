-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 16-10-2022 a las 16:35:55
-- Versión del servidor: 5.7.34
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idArticulo` int(11) NOT NULL,
  `noPedidos` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `ensamblado` int(11) NOT NULL,
  `idEstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idArticulo`, `noPedidos`, `existencia`, `ensamblado`, `idEstatus`) VALUES
(1, 6, 8, 1, 4),
(2, 8, 4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoresEsperados`
--

CREATE TABLE `valoresEsperados` (
  `idArticulo` int(11) NOT NULL,
  `valor_previo` int(11) NOT NULL,
  `valor_esperado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valoresEsperados`
--

INSERT INTO `valoresEsperados` (`idArticulo`, `valor_previo`, `valor_esperado`) VALUES
(1, 4, 4),
(2, 2, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `valoresEsperados`
--
ALTER TABLE `valoresEsperados`
  ADD KEY `idArticulo` (`idArticulo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `valoresEsperados`
--
ALTER TABLE `valoresEsperados`
  ADD CONSTRAINT `valoresesperados_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `productos` (`idArticulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
