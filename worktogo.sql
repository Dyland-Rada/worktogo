-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2023 a las 05:31:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`ID`, `Nombre`, `Apellido`, `Email`, `Telefono`, `Descripcion`, `fk_cedula_usuarios`) VALUES
(1, 'Jose Carlos', 0, 0, 2147483647, 'esta monda no sirve', '1046692639');

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
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` int(11) NOT NULL,
  `fk_id_usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `imagen`, `descripcion`, `precio`, `fk_id_usuario`) VALUES
(1, 'Arreglar tubo', '1683760491_image-7.png', 'Vales monda', 12233, '1046692639'),
(3, 'Cambiar un foco', '1683760692_wallpaperbetter.com_7680x4320 (19).jpg', '12321', 123213, '1046692639');

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
('1046692639', 'Dyland Camilo Rada Borja', '3115478569', 'dilancamilorada@unicolombo.edu.co', '321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_cedula_usuarios` (`fk_cedula_usuarios`);

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
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `frecuentes`
--
ALTER TABLE `frecuentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`fk_cedula_usuarios`) REFERENCES `usuarios` (`Cedula`),
  ADD CONSTRAINT `contacto_ibfk_2` FOREIGN KEY (`fk_cedula_usuarios`) REFERENCES `usuarios` (`Cedula`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`Cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
