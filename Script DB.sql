


CREATE TABLE `Residuo` (
  `id_residuo` int PRIMARY KEY AUTO_INCREMENT,
  `peso` Float,
  `cantidad` Float,
  `clasificacion` varchar(255),
  `id_servicio` int
);

CREATE TABLE `TipoResiduo` (
  `id_tipoResiduo` int PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(255),
  `id_residuo` int
);

CREATE TABLE `Servicio` (
  `id_servicio` int PRIMARY KEY AUTO_INCREMENT,
  `fecha_servicio` date,
  `fecha_cierre` date,
  `ciudad` varchar(255),
  `pesoTotal` Float,
  `direccion` varchar(255)
);

CREATE TABLE `Usuario` (
  `identificacion_usuario` int PRIMARY KEY,
  `nombre` varchar(255),
  `direccion` varchar(255),
  `correo` varchar(255),
  `contacto` varchar(255)
);

CREATE TABLE `TipoUsuario` (
  `id_tipoResiduo` int PRIMARY KEY,
  `description` varchar(255),
  `identificacion_usuario` int
);

CREATE TABLE `ServicioXUsuario` (
  `identificacion_usuario` int,
  `id_servicio` int
);

CREATE TABLE `Sedes` (
  `id_sede` int PRIMARY KEY AUTO_INCREMENT,
  `direccion` varchar(255),
  `nombre` varchar(255),
  `servicio` varchar(255),
  `identificacion_usuario` int
);

ALTER TABLE `Residuo` ADD FOREIGN KEY (`id_servicio`) REFERENCES `Servicio` (`id_servicio`);

ALTER TABLE `TipoResiduo` ADD FOREIGN KEY (`id_residuo`) REFERENCES `Residuo` (`id_residuo`);

ALTER TABLE `TipoUsuario` ADD FOREIGN KEY (`identificacion_usuario`) REFERENCES `Usuario` (`identificacion_usuario`);

ALTER TABLE `ServicioXUsuario` ADD FOREIGN KEY (`identificacion_usuario`) REFERENCES `Usuario` (`identificacion_usuario`);

ALTER TABLE `ServicioXUsuario` ADD FOREIGN KEY (`id_servicio`) REFERENCES `Servicio` (`id_servicio`);

ALTER TABLE `Sedes` ADD FOREIGN KEY (`identificacion_usuario`) REFERENCES `Usuario` (`identificacion_usuario`);
