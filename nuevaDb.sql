
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `listado_inventario` (
  `Inventario_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `listado_inventario` (`Inventario_id`, `nombre`) VALUES
(1, 'Botella'),
(2, 'Envases'),
(3, 'Metales'),
(4, 'Tetrabrick'),
(5, 'Corcho'),
(6, 'Plástico'),
(7, 'Vidrio'),
(8, 'Pilas '),
(9, 'Baterías'),
(10, 'Madera');


CREATE TABLE `localidad` (
  `localidad_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `localidad` (`localidad_id`, `nombre`) VALUES
(1, 'USAQUEN'),
(2, 'CHAPINERO'),
(3, 'SANTA FE'),
(4, 'SAN CRISTOBAL'),
(5, 'USME'),
(6, 'TUNJUELITO'),
(7, 'BOSA'),
(8, 'KENNEDY'),
(9, 'FONTIBON'),
(10, 'ENGATIVA'),
(11, 'SUBA'),
(12, 'BARRIOS UNIDOS'),
(13, 'TEUSAQUILLO'),
(14, 'MARTIRES'),
(15, 'ANTONIO NARIÑO'),
(16, 'PUENTE ARANDA'),
(17, 'CANDELARIA'),
(18, 'RAFAEL URIBE'),
(19, 'CIUDAD BOLIVAR'),
(20, 'SUMAPAZ');



CREATE TABLE `residuo` (
  `id_residuo` int(11) NOT NULL,
  `peso` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `id_listado_inventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `localidad` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `fecha_servicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `pesoTotal` double DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_tiporesiduo` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `localidad_id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--





CREATE TABLE `tiposresiduoservicio` (
  `id_tiporesiduo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `tiposresiduoservicio` (`id_tiporesiduo`, `nombre`) VALUES
(1, 'Residuos domésticos'),
(2, 'Residuos comerciales'),
(3, 'Residuos Industriales'),
(4, 'Biorresiduos'),
(5, 'Escombros y residuos de construccion'),
(6, 'Residuos sanitarios');



CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tipousuario` (`id_tipoUsuario`, `description`) VALUES
(1, 'Cliente'),
(2, 'Colaborador'),
(3, 'Administrador');



CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `identificacion_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_tipoUsuario` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO `usuario` (`id`, `identificacion_usuario`, `nombre`, `direccion`, `correo`, `contacto`, `password`, `id_tipoUsuario`, `photo`) VALUES
(1, 213245356, 'Richard', 'pasdasgber', 'richard@admin.com', '3002223445', 'k,mjynthbgrvfd', 2, ''),
(2, 1003706375, 'Brayan Cardenas', 'Cr 4 # 59 - 84', 'brayz987@gmail.com', '3502649117', 'NuevoPass', 2, '/upload_files/1661635549heightmap(3).png'),
(3, 1233436465, 'Juanito Alcachofas', 'Cr 4 # 59 - 90', 'jachofas@admin.com', '3502649117', 'mntbtdv ', 1, '');



ALTER TABLE `listado_inventario`
  ADD PRIMARY KEY (`Inventario_id`);


ALTER TABLE `localidad`
  ADD PRIMARY KEY (`localidad_id`);


ALTER TABLE `residuo`
  ADD PRIMARY KEY (`id_residuo`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `listado_inventario` (`id_listado_inventario`);




ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `identificacion_usuario` (`usuario`),
  ADD KEY `sedesLocalidadId` (`localidad`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `tipoResiduoServicio` (`id_tiporesiduo`),
  ADD KEY `localidad` (`localidad_id`),
  ADD KEY `userxservicio` (`idUser`);


ALTER TABLE `tiposresiduoservicio`
  ADD PRIMARY KEY (`id_tiporesiduo`);


ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipoUsuario` (`id_tipoUsuario`);


ALTER TABLE `listado_inventario`
  MODIFY `Inventario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `localidad`
  MODIFY `localidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;


ALTER TABLE `residuo`
  MODIFY `id_residuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;


ALTER TABLE `tiposresiduoservicio`
  MODIFY `id_tiporesiduo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `residuo`
  ADD CONSTRAINT `listado_inventario` FOREIGN KEY (`id_listado_inventario`) REFERENCES `listado_inventario` (`Inventario_id`),
  ADD CONSTRAINT `residuo_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);


ALTER TABLE `sedes`
  ADD CONSTRAINT `sedesLocalidadId` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`localidad_id`),
  ADD CONSTRAINT `sedesUsers` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);


ALTER TABLE `servicio`
  ADD CONSTRAINT `localidad` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`localidad_id`),
  ADD CONSTRAINT `tipoResiduoServicio` FOREIGN KEY (`id_tiporesiduo`) REFERENCES `tiposresiduoservicio` (`id_tiporesiduo`),
  ADD CONSTRAINT `userxservicio` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`);


ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`);

