-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2023 a las 20:13:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `worktogo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `ID` int(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` int(100) NOT NULL,
  `Email` int(100) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Descripcion` text NOT NULL,
  `fk_cedula_usuarios` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuentes`
--

CREATE TABLE `frecuentes` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(200) NOT NULL,
  `SOLUCION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `frecuentes`
--

INSERT INTO `frecuentes` (`ID`, `TITULO`, `SOLUCION`) VALUES
(1, '¿Como puedo solicitar un servicio?', 'si'),
(2, '¿Cómo elimino una petición de servicio?', 'Para cancelar una solicitud de amistad que enviaste:\r\nVe a las solicitudes de amistad enviadas o busca la persona a la que le enviaste la solicitud.\r\nHaz clic en Ver solicitudes enviadas en la parte superior izquierda.\r\nHaz clic en Cancelar solicitud.\r\nNota: No puedes cancelar una solicitud de amistad si ya la aceptaron. Obtén información sobre cómo eliminar a alguien de la lista de amigos.'),
(3, '¿Quién mato a Cristóbal Colom?', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombreser` varchar(200) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` int(11) NOT NULL,
  `fk_id_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_soli` int(11) NOT NULL,
  `fk_id_servicio` int(11) NOT NULL,
  `fk_id_solicitante` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cedula` varchar(40) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Clave` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula`, `Nombre`, `Telefono`, `Email`, `Clave`) VALUES
('1001978711', 'Alexander Rodriguez', '3166083511', 'Arodri461@gmail.com', '123456'),
('10045870569', 'Jose Carlos Ibarra Herrera', '3135878569', 'jose.ibarra@gmail.com', '456789'),
('10045878569', 'Carlos Daniel Crismatt Polo', '3145878569', 'carlos.crismatt@gmail.com', '123'),
('1046692639', 'Dyland Camilo Rada Borja', '3115478569', 'dilancamilorada@unicolombo.edu.co', '321'),
('1143340324', 'Rosalba', '3002268124', 'roshiperez2006@gmail.com', 'roshiperez09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `contacto_ibfk_2` (`fk_cedula_usuarios`);

--
-- Indices de la tabla `frecuentes`
--
ALTER TABLE `frecuentes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_cedula` (`fk_id_usuario`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_soli`),
  ADD KEY `fk_id_servicios` (`fk_id_servicio`),
  ADD KEY `fk_id_solicitante` (`fk_id_solicitante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `frecuentes`
--
ALTER TABLE `frecuentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_soli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_2` FOREIGN KEY (`fk_cedula_usuarios`) REFERENCES `usuarios` (`Cedula`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `fk_id_cedula` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`Cedula`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_id_servicios` FOREIGN KEY (`fk_id_servicio`) REFERENCES `servicios` (`id`),
  ADD CONSTRAINT `fk_id_solicitante` FOREIGN KEY (`fk_id_solicitante`) REFERENCES `usuarios` (`Cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
