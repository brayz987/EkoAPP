-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2022 a las 23:52:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ekoapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `localidad_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidad`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residuo`
--

CREATE TABLE `residuo` (
  `id_residuo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `residuo`
--

INSERT INTO `residuo` (`id_residuo`, `nombre`, `peso`, `cantidad`, `id_servicio`) VALUES
(1, 'Botellas', 120, 300, 19),
(2, 'botellas', 111, 30, 19),
(3, 'Botellas', 12, 300, 19),
(4, 'Botellas', 12, 300, 19),
(5, 'Botellas', 12, 300, 19),
(6, 'Botellas', 12, 300, 19),
(7, 'Botellas', 12, 300, 19),
(8, 'Bolsa', 1, 20, 19),
(9, 'Bolsa', 1, 20, 19),
(10, 'Hola', 12231, 212, 19),
(11, 'Prueba1', 12, 234, 23),
(13, 'sdads', 21, 1, 27),
(14, 'sadd', 12, 2, 19),
(15, 'prueba', 12, 1, 19),
(16, 'pruebas', 12, 123, 21),
(17, 'das', 1, 2, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `identificacion_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

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
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `fecha_servicio`, `fecha_cierre`, `pesoTotal`, `direccion`, `id_tiporesiduo`, `estado`, `localidad_id`, `idUser`) VALUES
(19, '2022-08-21', NULL, 2131, 'prueba edicion 2', 4, 'eliminado', 15, 2),
(20, '2022-07-07', NULL, 30, 'Autopista Sur', 5, 'eliminado', 5, 2),
(21, '2022-07-26', NULL, 16, 'Mi casa', 6, 'eliminado', 2, 2),
(22, '2022-07-29', NULL, 50, 'La casa de otro', 2, 'eliminado', 8, 2),
(23, '2022-07-05', NULL, 40, 'Nuevo servicio', 4, 'eliminado', 11, 2),
(24, '2022-07-06', '2022-08-21', 50, 'Mi casa', 1, 'Cerrado', 14, 2),
(25, '2022-07-06', NULL, 50, 'Mi casa', 1, 'Pendiente', 14, 2),
(26, '0000-00-00', NULL, 50, 'Puente Peatonal', 5, 'Pendiente', 20, 2),
(27, '2022-08-11', NULL, 32, 'dsadas', 1, 'Pendiente', 3, 2),
(28, '2022-08-05', NULL, 12, 'prueba servicios cliente', 1, 'Pendiente', 5, 2),
(29, '2022-08-11', NULL, 212, 'prueba user id', 3, 'Pendiente', 1, 2),
(30, '2022-08-11', NULL, 212, 'prueba user id', 3, 'Pendiente', 1, 2),
(31, '2022-08-25', NULL, 50, 'sadasdds', 1, 'Pendiente', 7, 1),
(32, '2022-08-25', NULL, 50, 'sadasdds', 1, 'Pendiente', 7, 1),
(33, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(34, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(35, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(36, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(37, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(38, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(39, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(40, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(41, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(42, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(43, '2022-08-25', NULL, 12, 'eqweqwewe', 2, 'Pendiente', 2, 1),
(44, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(45, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(46, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(47, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(48, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(49, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(50, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(51, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(52, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(53, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(54, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(55, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(56, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(57, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(58, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(59, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(60, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(61, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(62, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(63, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(64, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(65, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(66, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(67, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(68, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(69, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(70, '2022-08-26', NULL, 45, 'dasddsd', 4, 'Pendiente', 11, 2),
(71, '2022-08-25', NULL, 23, 'prueba correo', 2, 'Pendiente', 9, 2),
(72, '2022-08-25', NULL, 23, 'prueba correo', 2, 'Pendiente', 9, 2),
(73, '2022-08-25', NULL, 12, 'prueba mail', 3, 'Pendiente', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposresiduoservicio`
--

CREATE TABLE `tiposresiduoservicio` (
  `id_tiporesiduo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposresiduoservicio`
--

INSERT INTO `tiposresiduoservicio` (`id_tiporesiduo`, `nombre`) VALUES
(1, 'Residuos domésticos'),
(2, 'Residuos comerciales'),
(3, 'Residuos Industriales'),
(4, 'Biorresiduos'),
(5, 'Escombros y residuos de construccion'),
(6, 'Residuos sanitarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipoUsuario`, `description`) VALUES
(1, 'Cliente'),
(2, 'Colaborador'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

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

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `identificacion_usuario`, `nombre`, `direccion`, `correo`, `contacto`, `password`, `id_tipoUsuario`, `photo`) VALUES
(1, 213245356, 'Richard', 'pasdasgber', 'richard@admin.com', '3002223445', 'k,mjynthbgrvfd', 2, ''),
(2, 1003706375, 'Brayan Cardenas', 'Cr 4 # 59 - 84', 'brayz987@gmail.com', '3502649117', 'NuevoPass', 2, '/upload_files/1661635549heightmap(3).png'),
(3, 1233436465, 'Juanito Alcachofas', 'Cr 4 # 59 - 90', 'jachofas@admin.com', '3502649117', 'mntbtdv ', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`localidad_id`);

--
-- Indices de la tabla `residuo`
--
ALTER TABLE `residuo`
  ADD PRIMARY KEY (`id_residuo`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `identificacion_usuario` (`identificacion_usuario`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `tipoResiduoServicio` (`id_tiporesiduo`),
  ADD KEY `localidad` (`localidad_id`),
  ADD KEY `userxservicio` (`idUser`);

--
-- Indices de la tabla `tiposresiduoservicio`
--
ALTER TABLE `tiposresiduoservicio`
  ADD PRIMARY KEY (`id_tiporesiduo`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipoUsuario` (`id_tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `localidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `residuo`
--
ALTER TABLE `residuo`
  MODIFY `id_residuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `tiposresiduoservicio`
--
ALTER TABLE `tiposresiduoservicio`
  MODIFY `id_tiporesiduo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `residuo`
--
ALTER TABLE `residuo`
  ADD CONSTRAINT `residuo_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedesUsers` FOREIGN KEY (`identificacion_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `localidad` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`localidad_id`),
  ADD CONSTRAINT `tipoResiduoServicio` FOREIGN KEY (`id_tiporesiduo`) REFERENCES `tiposresiduoservicio` (`id_tiporesiduo`),
  ADD CONSTRAINT `userxservicio` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
