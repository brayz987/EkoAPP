CREATE TABLE `Residuo` (
  `id_residuo` int PRIMARY KEY AUTO_INCREMENT,
  `peso` double,
  `cantidad` double,
  `clasificacion` varchar(255),
  `id_servicio` int,
  `id_tipoResiduo` int
);

CREATE TABLE `TipoResiduo` (
  `id_tipoResiduo` int PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(255)
);

CREATE TABLE `Servicio` (
  `id_servicio` int PRIMARY KEY AUTO_INCREMENT,
  `fecha_servicio` date,
  `fecha_cierre` date,
  `ciudad` varchar(255),
  `pesoTotal` double,
  `direccion` varchar(255)
);

CREATE TABLE `Usuario` (
  `identificacion_usuario` int PRIMARY KEY,
  `nombre` varchar(255),
  `direccion` varchar(255),
  `correo` varchar(255),
  `contacto` varchar(255),
  `id_tipoUsuario` int
);

CREATE TABLE `TipoUsuario` (
  `id_tipoUsuario` int PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255)
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

ALTER TABLE `Residuo` ADD FOREIGN KEY (`id_tipoResiduo`) REFERENCES `TipoResiduo` (`id_tipoResiduo`);

ALTER TABLE `Usuario` ADD FOREIGN KEY (`id_tipoUsuario`) REFERENCES `TipoUsuario` (`id_tipoUsuario`);

ALTER TABLE `ServicioXUsuario` ADD FOREIGN KEY (`identificacion_usuario`) REFERENCES `Usuario` (`identificacion_usuario`);

ALTER TABLE `ServicioXUsuario` ADD FOREIGN KEY (`id_servicio`) REFERENCES `Servicio` (`id_servicio`);

ALTER TABLE `Sedes` ADD FOREIGN KEY (`identificacion_usuario`) REFERENCES `Usuario` (`identificacion_usuario`);
