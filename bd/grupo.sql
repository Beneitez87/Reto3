-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2019 a las 10:48:33
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `descripcion` varchar(100) NOT NULL,
  `idGrupo` int(10) NOT NULL,
  `NombreGrupo` varchar(30) NOT NULL,
  `imagenGrupo` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`descripcion`, `idGrupo`, `NombreGrupo`, `imagenGrupo`, `video`) VALUES
('Diego sabe la descripcion', 1, 'WITHIN TEMPTATION', 'IMG/WithinTemptation.jpg', 'https://www.youtube.com/watch?v=S7sOZ_TFUXg'),
('Green Day es una banda estadounidense de pop punk', 2, 'GREEN DAY', 'IMG/GreenDay.jpg', 'https://www.youtube.com/watch?v=Soa3gO7tL-c'),
('Ir a la búsqueda Queen Brian May, Freddie Mercury, John Deacon y Roger Taylor. ', 3, 'QUEEN ', 'IMG/Queen.jpeg', 'https://www.youtube.com/watch?v=rY0WxgSXdEE'),
('Coldplay es una banda británica de pop rock y rock alternativo formada en Londres en 1996. ', 4, 'COLDPLAY', 'IMG/ColdPlay.jpg', 'https://www.youtube.com/watch?v=dvgZkm1xWPE'),
('Linkin Park es una banda estadounidense de rock alternativo procedente de Agoura Hills, California. ', 5, 'LINKIN PARK', 'IMG/LinkinPark.jpg', 'https://www.youtube.com/watch?v=kXYiU_JCYtU'),
('a la búsqueda Para la revista musical, véase Rolling Stone. ', 6, 'ROLLING STONES', 'IMG/RollingStones.jpg', 'https://www.youtube.com/watch?v=nrIPxlFzDi0'),
('The Black Eyed Peas es un grupo de música estadounidense de hip hop formado en 1995 en Los Ángeles ', 7, 'BLACK EYED PEAS ', 'IMG/BlackEyedPeas.jpg', 'https://www.youtube.com/watch?v=ZaI2IlHwmgQ'),
('Evanescence es una banda estadounidense de rock fundada en Little Rock', 8, 'EVANESCENCE', 'IMG/Evanescence.jpg', 'https://www.youtube.com/watch?v=3YxaaGgTQYM'),
('Paramore es una banda estadounidense de pop punk y rock alternativo', 9, 'PARAMORE', 'IMG/Paramore.jpg', 'https://www.youtube.com/watch?v=aCyGvGEtOwc'),
('Guns N\' Roses es una banda estadounidense de hard rock formada en Hollywood', 10, 'GUNS N ROSES', 'IMG/GunsNRoses.jpg', 'https://www.youtube.com/watch?v=1w7OgIMMRc4'),
('Jonas Brothers fue un grupo estadounidense de música', 11, 'JONAS BROTHERS', 'IMG/JonasBrother.jpg', 'https://www.youtube.com/watch?v=5KNEZJ6KkLI'),
('El Canto del Loco (también abreviado ECDL) fue un grupo español de música pop rock', 12, 'EL CANTO DEL LOCO', 'IMG/CantoDelLoco.jpg', 'https://www.youtube.com/watch?v=n9jzGmFBzx8'),
('Mecano fue un grupo español de música pop, activo entre 1981 y 1992', 13, 'MECANO', 'IMG/Mecano.jpg', 'https://www.youtube.com/watch?v=_mAmEKNqg1g'),
('Backstreet Boys es una boy band estadounidense formada en Orlando, Florida, en 1993. ', 14, 'BACKSTREET BOYS', 'IMG/BlackEyedPeas.jpg', 'https://www.youtube.com/watch?v=ZaI2IlHwmgQ'),
('The Killers es una banda de rock estadounidense formada en 2001 en Las Vegas (Nevada)', 15, 'THE KILLERS', 'IMG/BackStreetBoys.jpg', 'https://www.youtube.com/watch?v=6M6samPEMpM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idGrupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
