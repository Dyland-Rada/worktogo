-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2023 a las 15:30:59
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuentasusers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cedula` varchar(40) NOT NULL PRIMARY KEY,
  `Nombre` varchar(75) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Clave` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--
drop table usuarios;
INSERT INTO `usuarios` (`Cedula`, `Nombre`, `Telefono`, `Email`, `Clave`) VALUES
('1001978711', 'Alexander Rodriguez', '3166083511', 'Arodri461@gmail.com', '123456'),
('10045870569', 'Jose Carlos Ibarra Herrera', '3135878569', 'jose.ibarra@gmail.com', '456789'),
('10045878569', 'Carlos Daniel Crismatt Polo', '3145878569', 'carlos.crismatt@gmail.com', '123'),
('1046692639', 'Dyland Camilo Rada Borja', '3115478569', 'dilancamilorada@unicolombo.edu.co', '321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
