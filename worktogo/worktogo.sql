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