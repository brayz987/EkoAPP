-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 06:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `localidad`
--

CREATE TABLE `localidad` (
  `localidad_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localidad`
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
-- Table structure for table `residuo`
--

CREATE TABLE `residuo` (
  `id_residuo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residuo`
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
(12, 'Comida', 2, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `sedes`
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
-- Table structure for table `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `fecha_servicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `pesoTotal` double DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_tiporesiduo` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `localidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `fecha_servicio`, `fecha_cierre`, `pesoTotal`, `direccion`, `id_tiporesiduo`, `estado`, `localidad_id`) VALUES
(19, '2022-07-06', NULL, 12, 'Cr 4 # 59 - 84', 3, 'Pendiente', 14),
(20, '2022-07-07', NULL, 30, 'Autopista Sur', 5, 'Pendiente', 5),
(21, '2022-07-26', NULL, 16, 'Mi casa', 6, 'Pendiente', 2),
(22, '2022-07-29', NULL, 50, 'La casa de otro', 2, 'Pendiente', 8),
(23, '2022-07-05', NULL, 40, 'Nuevo servicio', 4, 'Pendiente', 11),
(24, '2022-07-06', NULL, 50, 'Mi casa', 1, 'Pendiente', 14),
(25, '2022-07-06', NULL, 50, 'Mi casa', 1, 'Pendiente', 14),
(26, '0000-00-00', NULL, 50, 'Puente Peatonal', 5, 'Pendiente', 20);

-- --------------------------------------------------------

--
-- Table structure for table `servicioxusuario`
--

CREATE TABLE `servicioxusuario` (
  `identificacion_usuario` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiposresiduoservicio`
--

CREATE TABLE `tiposresiduoservicio` (
  `id_tiporesiduo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiposresiduoservicio`
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
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipoUsuario`, `description`) VALUES
(1, 'Cliente'),
(2, 'Colaborador'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `identificacion_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contacto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_tipoUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`identificacion_usuario`, `nombre`, `direccion`, `correo`, `contacto`, `password`, `id_tipoUsuario`) VALUES
(213245356, 'Richard', 'pasdasgber', 'richard@admin.com', '3002223445', 'k,mjynthbgrvfd', 2),
(1003706375, 'Brayan Cardenas', 'Cr 4 # 59 - 84', 'brayz987@gmail.com', '3502649117', 'Admin', 2),
(1233436465, 'Juanito Alcachofas', 'Cr 4 # 59 - 90', 'jachofas@admin.com', '3502649117', 'mntbtdv ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`localidad_id`);

--
-- Indexes for table `residuo`
--
ALTER TABLE `residuo`
  ADD PRIMARY KEY (`id_residuo`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indexes for table `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `identificacion_usuario` (`identificacion_usuario`);

--
-- Indexes for table `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `tipoResiduoServicio` (`id_tiporesiduo`),
  ADD KEY `localidad` (`localidad_id`);

--
-- Indexes for table `servicioxusuario`
--
ALTER TABLE `servicioxusuario`
  ADD KEY `identificacion_usuario` (`identificacion_usuario`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indexes for table `tiposresiduoservicio`
--
ALTER TABLE `tiposresiduoservicio`
  ADD PRIMARY KEY (`id_tiporesiduo`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`identificacion_usuario`),
  ADD KEY `id_tipoUsuario` (`id_tipoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `localidad`
--
ALTER TABLE `localidad`
  MODIFY `localidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `residuo`
--
ALTER TABLE `residuo`
  MODIFY `id_residuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tiposresiduoservicio`
--
ALTER TABLE `tiposresiduoservicio`
  MODIFY `id_tiporesiduo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `residuo`
--
ALTER TABLE `residuo`
  ADD CONSTRAINT `residuo_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Constraints for table `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedes_ibfk_1` FOREIGN KEY (`identificacion_usuario`) REFERENCES `usuario` (`identificacion_usuario`);

--
-- Constraints for table `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `localidad` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`localidad_id`),
  ADD CONSTRAINT `tipoResiduoServicio` FOREIGN KEY (`id_tiporesiduo`) REFERENCES `tiposresiduoservicio` (`id_tiporesiduo`);

--
-- Constraints for table `servicioxusuario`
--
ALTER TABLE `servicioxusuario`
  ADD CONSTRAINT `servicioxusuario_ibfk_1` FOREIGN KEY (`identificacion_usuario`) REFERENCES `usuario` (`identificacion_usuario`),
  ADD CONSTRAINT `servicioxusuario_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
