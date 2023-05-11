CREATE DATABASE worktogo;

USE worktogo;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



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

INSERT INTO `usuarios` (`Cedula`, `Nombre`, `Telefono`, `Email`, `Clave`) VALUES
('1001978711', 'Alexander Rodriguez', '3166083511', 'Arodri461@gmail.com', '123456'),
('10045870569', 'Jose Carlos Ibarra Herrera', '3135878569', 'jose.ibarra@gmail.com', '456789'),
('10045878569', 'Carlos Daniel Crismatt Polo', '3145878569', 'carlos.crismatt@gmail.com', '123'),
('1046692639', 'Dyland Camilo Rada Borja', '3115478569', 'dilancamilorada@unicolombo.edu.co', '321');


-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE servicios (
  `id` INT AUTO_INCREMENT  NOT NULL PRIMARY KEY,
  `nombre` varchar(200) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `precio` INT NOT NULL,
  fk_id_usuario VARCHAR(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE servicios
ADD CONSTRAINT fk_id_cedula
FOREIGN KEY (fk_id_usuario) REFERENCES usuarios(Cedula);


DROP Table servicios;

CREATE TABLE solicitud(
  id_soli INT AUTO_INCREMENT PRIMARY KEY,
  fk_id_servicio INT NOT NULL,
  fk_id_solicitante VARCHAR(40) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE solicitud
ADD CONSTRAINT fk_id_servicios
FOREIGN KEY (fk_id_servicio) REFERENCES servicios(id);


ALTER TABLE solicitud
ADD CONSTRAINT fk_id_solicitante
FOREIGN KEY (fk_id_solicitante) REFERENCES usuarios(cedula);

drop Table solicitud;


CREATE TABLE `frecuentes` (
  `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
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



CREATE TABLE `contacto` (
  `ID` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` int(100) NOT NULL,
  `Email` int(100) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Descripcion` text NOT NULL,
  `fk_cedula_usuarios` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




ALTER TABLE `contacto`
 ADD CONSTRAINT `contacto_ibfk_2` FOREIGN KEY (`fk_cedula_usuarios`) REFERENCES `usuarios` (`Cedula`);


  