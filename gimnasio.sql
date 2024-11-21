-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2024 a las 12:40:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_socio` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cancelada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_socio`, `id_servicio`, `fecha`, `hora`, `cancelada`) VALUES
(1, 31, '2024-06-13', '17:45:00', 0),
(9, 29, '2024-11-30', '17:30:00', 0),
(11, 29, '2024-11-21', '17:45:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` varchar(50000) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `contenido`, `imagen`, `fecha`) VALUES
(1, 'Trembolona', 'Estoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes Estoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabeEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petados queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petadoqueEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy pes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petado sabes queEstoy petadEstoy petado sabes queEstoy petado sabes ado sabes quoy petado sabes queEstoy petado', 'imagenes/icono.png', '2024-11-10'),
(3, 'MR.Olimpia', 'CBUM mamado', 'imagenes/imagen.jpg', '2024-11-15'),
(5, 'Gimnasio Explota', 'BOOOOOM', 'imagen/explosion', '2024-10-30'),
(7, 'Tienda vende productos de gimnasio caducados', 'Caducados=Caca', 'imagenes/emoji.jpg', '2024-12-02'),
(41, 'Joder', 'JODER ME CAGO EN TODO', 'imagenes/peru.png', '2024-11-30'),
(42, 'jajajajaja', 'jejejjejejejeje', 'imagenes/Designer.jpeg', '2024-11-20'),
(43, 'ññññññññññññññññ', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'imagenes/Youtube.png', '2024-11-02'),
(54, 'tytrhhtrhtrhtrh', 'hhhhhgerge', 'imagenes/Instagram.png', '2024-09-18'),
(55, 'hoy me cago', 'me cago', 'imagenes/Youtube.png', '2024-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `descripcion`, `duracion`, `precio`) VALUES
(29, 'masaje', 40, 20),
(31, 'cinta', 8, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `usuario` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_general_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `nombre`, `edad`, `usuario`, `password`, `telefono`, `foto`) VALUES
(1, 'manuel', 25, 'manu', 'manuu', '644989754', 'imagenes/emoji.jpg'),
(3, 'jorge', 9, 'jj', 'popola', '675 24 74 21', 'aaa'),
(5, 'hugoo', 19, 'hugoooo', 'papa', '655929476', 'fotito'),
(7, 'crichina', 19, 'yatekomos', 'jiji', '657908746', 'imagenes/imagen.jpg'),
(9, 'javiel', 20, 'karambit', 'rgx', '677939531', 'imagenes/default.jpg'),
(11, 'arikiller', 19, 'XOXO', 'findesemana', '123456789', 'imagenes/default.png'),
(13, 'hugokush', 13, 'elhugomodelnoel', 'puñalada', '000875412', 'wwf'),
(14, 'fede', 1, 'fede_gato_jaime', 'pienso', '987010476', 'gato'),
(15, 'hosting', 100, 'tusmuertos', 'hola', '000112233', 'no'),
(16, 'mari camen', 51, 'Mcumo', 'mamen', '765016311', 'Imágenes/emoji.jpg'),
(27, 'eghfuiehfuiwe', 65, 'instaaaaaa', 'r3t5467u', '4567865434567', 'imagenes/Designer.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio`
--

CREATE TABLE `testimonio` (
  `id` int(11) NOT NULL,
  `autor` varchar(15) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `testimonio`
--

INSERT INTO `testimonio` (`id`, `autor`, `contenido`, `fecha`) VALUES
(1, 'jj', 'Me cago en todo', '2024-11-07'),
(3, 'manu', 'AAAAA', '2024-11-29'),
(4, 'hugoooo', 'PAPA', '2026-11-17'),
(8, 'wereg', 'werth', '2024-11-20'),
(10, 'jj', 'ertrytuykiulkyjtyh', '2024-11-28'),
(13, 'jj', 'Me cago', '2024-11-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_socio`,`id_servicio`),
  ADD KEY `cita_servicio` (`id_servicio`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo_2` (`titulo`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contenido` (`contenido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `cita_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`),
  ADD CONSTRAINT `cita_socio` FOREIGN KEY (`id_socio`) REFERENCES `socio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
