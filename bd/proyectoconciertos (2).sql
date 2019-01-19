-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2019 a las 13:39:21
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoconciertos`
--
CREATE DATABASE IF NOT EXISTS `proyectoconciertos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectoconciertos`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `aniadirGrupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `aniadirGrupo` (IN `Nombre` VARCHAR(20))  NO SQL
INSERT INTO grupo (nombre) values (Nombre)$$

DROP PROCEDURE IF EXISTS `buscarEntrada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarEntrada` (IN `username` VARCHAR(20))  NO SQL
select * from entrada where username = username$$

DROP PROCEDURE IF EXISTS `comprar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `comprar` (IN `ParametrofechaCompra` VARCHAR(30), IN `ParametrohoraCompra` VARCHAR(30), IN `ParametroidConciertoSala` INT(30), IN `Parametrousername` VARCHAR(30), IN `ParametroPrecio` INT(30), IN `ParametroCantidad` INT(30), IN `ParametroFechaEvento` VARCHAR(30))  NO SQL
INSERT INTO entrada (fechaCompra, horaCompra,idConciertoSala,username,Precio,Cantidad,FechaEvento)
VALUES (ParametrofechaCompra,ParametrohoraCompra,ParametroidConciertoSala,Parametrousername,ParametroPrecio,ParametroCantidad,ParametroFechaEvento )$$

DROP PROCEDURE IF EXISTS `contraOlvidada`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `contraOlvidada` (IN `email` VARCHAR(30))  NO SQL
SELECT *  FROM usuario WHERE correo= email$$

DROP PROCEDURE IF EXISTS `editarPerfil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `editarPerfil` (IN `nombre` VARCHAR(30), IN `apellido1` VARCHAR(30), IN `apellido2` VARCHAR(30), IN `fecha` VARCHAR(30), IN `direccion` VARCHAR(30), IN `correo` VARCHAR(30), IN `username` VARCHAR(30))  NO SQL
UPDATE usuario
SET usuario.nombre = nombre, usuario.apellido1 = apellido1, usuario.apellido2 = apellido2, usuario.fechaNacimiento = fecha, usuario.direccion = direccion, usuario.correo = correo
WHERE usuario.username = username$$

DROP PROCEDURE IF EXISTS `eliminarGrupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarGrupo` (IN `id` INT(3))  NO SQL
DELETE from grupo WHERE idGrupo = id$$

DROP PROCEDURE IF EXISTS `informacionCompletaGrupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `informacionCompletaGrupo` (IN `id` INT(10))  NO SQL
SELECT  grupo.NombreGrupo AS 'NombreGrupo', grupo.descripcion AS 'DescripcionGrupo', grupo.imagenGrupo AS 'ImagenGrupo', concierto.nombreConcierto AS 'NombreConcierto', conciertosala.fecha AS 'ConciertoSalaFecha', sala.NombreSala AS 'NombreSala', sala.aforo AS 'AforoSala', conciertosala.idConciertoSala AS 'idConciertoSala' 
FROM grupo
INNER JOIN concierto ON grupo.idGrupo = concierto.idGrupo
INNER JOIN conciertosala ON concierto.idConcierto = conciertosala.idConcierto
INNER JOIN sala ON conciertosala.idSala = sala.idSala
WHERE grupo.idGrupo = id$$

DROP PROCEDURE IF EXISTS `login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `usu` VARCHAR(30))  NO SQL
select * from usuario where usuario.username = usu$$

DROP PROCEDURE IF EXISTS `modificarGrupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificarGrupo` (IN `nombre` VARCHAR(100))  NO SQL
UPDATE grupo set nombre = nombreGrupo$$

DROP PROCEDURE IF EXISTS `mostrarTodoEntradas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodoEntradas` ()  NO SQL
SELECT * from entrada$$

DROP PROCEDURE IF EXISTS `registro`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registro` (IN `Usuario` VARCHAR(30), IN `Contra` VARCHAR(255), IN `Nombre` VARCHAR(30), IN `Apellido1` VARCHAR(30), IN `Apellido2` VARCHAR(30), IN `Fecha` VARCHAR(30), IN `Direccion` VARCHAR(30), IN `Correo` VARCHAR(30), IN `Privilegios` VARCHAR(30))  NO SQL
insert into usuario(username,pass,nombre,apellido1,apellido2,fechaNacimiento,direccion,correo,privilegios) VALUES (Usuario,Contra,Nombre,Apellido1,Apellido2,Fecha,Direccion,Correo,Privilegios)$$

DROP PROCEDURE IF EXISTS `restablecerContra`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `restablecerContra` (IN `contra` VARCHAR(255), IN `username` VARCHAR(30))  NO SQL
UPDATE usuario
SET usuario.pass = contra
WHERE usuario.username = username$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `idComentario` int(10) NOT NULL,
  `idConcierto` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idConcierto`, `username`, `comentario`) VALUES
(1, 1, 'Victor', 'El concierto me gusto mucho fue la ostia'),
(2, 15, 'Victor', 'No estuvo mal el concierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concierto`
--

DROP TABLE IF EXISTS `concierto`;
CREATE TABLE `concierto` (
  `idConcierto` int(10) NOT NULL,
  `nombreConcierto` varchar(30) NOT NULL,
  `idGrupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `concierto`
--

INSERT INTO `concierto` (`idConcierto`, `nombreConcierto`, `idGrupo`) VALUES
(1, 'Concierto1', 1),
(2, 'Concierto2', 2),
(3, 'Concierto3', 3),
(4, 'Concierto4', 4),
(5, 'Concierto5', 5),
(6, 'Concierto6', 6),
(7, 'Concierto7', 7),
(8, 'Concierto8', 8),
(9, 'Concierto9', 9),
(10, 'Concierto10', 10),
(11, 'Concierto11', 11),
(12, 'Concierto12', 12),
(13, 'Concierto13', 13),
(14, 'Concierto14', 14),
(15, 'Concierto15', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciertosala`
--

DROP TABLE IF EXISTS `conciertosala`;
CREATE TABLE `conciertosala` (
  `idConciertoSala` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `idSala` int(10) NOT NULL,
  `idConcierto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conciertosala`
--

INSERT INTO `conciertosala` (`idConciertoSala`, `fecha`, `idSala`, `idConcierto`) VALUES
(1, '2018-12-24', 1, 1),
(2, '2019-01-17', 2, 10),
(3, '2019-01-06', 3, 15),
(4, '2019-02-14', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

DROP TABLE IF EXISTS `entrada`;
CREATE TABLE `entrada` (
  `idEntrada` int(10) NOT NULL,
  `fechaCompra` varchar(100) NOT NULL,
  `horaCompra` varchar(30) NOT NULL,
  `idConciertoSala` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Precio` int(30) NOT NULL,
  `Cantidad` int(30) NOT NULL,
  `FechaEvento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`idEntrada`, `fechaCompra`, `horaCompra`, `idConciertoSala`, `username`, `Precio`, `Cantidad`, `FechaEvento`) VALUES
(1, '2018-12-12', '', 1, 'Victor', 0, 0, ''),
(2, '2018-12-19', '', 3, 'Victor', 0, 0, ''),
(46, '10/01/2019', '01:33:38pm', 4, 'Jose', 150, 3, '2019-02-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `descripcion` varchar(100) NOT NULL,
  `idGrupo` int(10) NOT NULL,
  `NombreGrupo` varchar(30) NOT NULL,
  `imagenGrupo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`descripcion`, `idGrupo`, `NombreGrupo`, `imagenGrupo`) VALUES
('Diego sabe la descripcion', 1, 'WITHIN TEMPTATION', 'IMG/WithinTemptation.jpg'),
('Green Day es una banda estadounidense de pop punk', 2, 'GREEN DAY', 'IMG/GreenDay.jpg'),
('Ir a la búsqueda Queen Brian May, Freddie Mercury, John Deacon y Roger Taylor. ', 3, 'QUEEN ', 'IMG/Queen.jpeg'),
('Coldplay es una banda británica de pop rock y rock alternativo formada en Londres en 1996. ', 4, 'COLDPLAY', 'IMG/ColdPlay.jpg'),
('Linkin Park es una banda estadounidense de rock alternativo procedente de Agoura Hills, California. ', 5, 'LINKIN PARK', 'IMG/LinkinPark.jpg'),
('a la búsqueda Para la revista musical, véase Rolling Stone. ', 6, 'ROLLING STONES', 'IMG/RollingStones.jpg'),
('The Black Eyed Peas es un grupo de música estadounidense de hip hop formado en 1995 en Los Ángeles ', 7, 'BLACK EYED PEAS ', 'IMG/BlackEyedPeas.jpg'),
('Evanescence es una banda estadounidense de rock fundada en Little Rock', 8, 'EVANESCENCE', 'IMG/Evanescence.jpg'),
('Paramore es una banda estadounidense de pop punk y rock alternativo', 9, 'PARAMORE', 'IMG/Paramore.jpg'),
('Guns N\' Roses es una banda estadounidense de hard rock formada en Hollywood', 10, 'GUNS N ROSES', 'IMG/GunsNRoses.jpg'),
('Jonas Brothers fue un grupo estadounidense de música', 11, 'JONAS BROTHERS', 'IMG/JonasBrother.jpg'),
('El Canto del Loco (también abreviado ECDL) fue un grupo español de música pop rock', 12, 'EL CANTO DEL LOCO', 'IMG/CantoDelLoco.jpg'),
('Mecano fue un grupo español de música pop, activo entre 1981 y 1992', 13, 'MECANO', 'IMG/Mecano.jpg'),
('Backstreet Boys es una boy band estadounidense formada en Orlando, Florida, en 1993. ', 14, 'BACKSTREET BOYS', 'IMG/BlackEyedPeas.jpg'),
('The Killers es una banda de rock estadounidense formada en 2001 en Las Vegas (Nevada)', 15, 'THE KILLERS', 'IMG/BackStreetBoys.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE `sala` (
  `idSala` int(10) NOT NULL,
  `NombreSala` varchar(30) NOT NULL,
  `aforo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`idSala`, `NombreSala`, `aforo`) VALUES
(1, 'Sala Barcelona', 1000),
(2, 'Sala Bilbao', 1000),
(3, 'Sala Madrid', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `privilegios` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `pass`, `nombre`, `apellido1`, `apellido2`, `fechaNacimiento`, `direccion`, `correo`, `privilegios`) VALUES
('Jose', '$2y$15$vLxhvlnbQpoz.BxsbTlMZu0K/O4iNv99j4iVUHhSASFlSLsgKySTa', 'Jose', 'palotes', 'pele', '2019-01-09', 'santo palotes', 'ticketZornotza@hotmail.com', 'Usuario'),
('Juan', '$2y$15$bGyIECvX.o/7dyb4ZPmnEOeJydP4alYNxrBg2b8Sr/2mTpCHdE9Ba', 'Juan', 'asdasd', 'dasdd', '2019-01-08', 'calle marimar', 'pepe@hotmail.com', 'Usuario'),
('Victor', '1234', 'victo', 'dsa', 'asd', '1999-12-02', 'asdasd', 'asd@asd.com', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `Fk_comentario_Username` (`username`),
  ADD KEY `Fk_comentario_Concierto` (`idConcierto`);

--
-- Indices de la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`idConcierto`),
  ADD KEY `Fk_Evento_Grupo` (`idGrupo`);

--
-- Indices de la tabla `conciertosala`
--
ALTER TABLE `conciertosala`
  ADD PRIMARY KEY (`idConciertoSala`),
  ADD KEY `Fk_ConciertoSala_sala` (`idSala`),
  ADD KEY `Fk_ConciertoSala_concierto` (`idConcierto`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`idEntrada`),
  ADD KEY `Fk_Entrada_ConciertoSala` (`idConciertoSala`),
  ADD KEY `Fk_Entrada_Username` (`username`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `concierto`
--
ALTER TABLE `concierto`
  MODIFY `idConcierto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `conciertosala`
--
ALTER TABLE `conciertosala`
  MODIFY `idConciertoSala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `idEntrada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idGrupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `Fk_comentario_Concierto` FOREIGN KEY (`idConcierto`) REFERENCES `concierto` (`idConcierto`),
  ADD CONSTRAINT `Fk_comentario_Username` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`);

--
-- Filtros para la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD CONSTRAINT `Fk_Evento_Grupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`);

--
-- Filtros para la tabla `conciertosala`
--
ALTER TABLE `conciertosala`
  ADD CONSTRAINT `Fk_ConciertoSala_concierto` FOREIGN KEY (`idConcierto`) REFERENCES `concierto` (`idConcierto`),
  ADD CONSTRAINT `Fk_ConciertoSala_sala` FOREIGN KEY (`idSala`) REFERENCES `sala` (`idSala`);

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `Fk_Entrada_ConciertoSala` FOREIGN KEY (`idConciertoSala`) REFERENCES `conciertosala` (`idConciertoSala`),
  ADD CONSTRAINT `Fk_Entrada_Username` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
