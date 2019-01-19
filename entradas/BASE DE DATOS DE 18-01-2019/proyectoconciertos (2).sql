-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2019 a las 09:52:42
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarEntrada` (IN `usuario` VARCHAR(20))  NO SQL
select entrada.idEntrada AS 'idEntrada', entrada.fechaCompra AS 'fechaCompra',entrada.horaCompra AS 'horaCompra', entrada.username AS 'usuario', entrada.Precio AS 'precio', entrada.Cantidad AS 'cantidad', entrada.FechaEvento AS 'fechaEvento', conciertosala.hora AS 'horaEvento' ,concierto.nombreConcierto AS 'nombreConcierto', sala.NombreSala AS 'nombreSala', grupo.NombreGrupo AS 'nombreGrupo'  from entrada 
INNER JOIN conciertosala ON entrada.idConciertoSala = conciertosala.idConciertoSala
INNER JOIN sala ON conciertosala.idSala = sala.idSala
INNER JOIN  concierto ON conciertosala.idConcierto = concierto.idConcierto
INNER JOIN  grupo ON concierto.idGrupo = grupo.idGrupo
where entrada.username = usuario$$

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

DROP PROCEDURE IF EXISTS `insertarComentario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarComentario` (IN `id` INT(10), IN `usuarios` VARCHAR(30), IN `comentarios` VARCHAR(255), IN `fecha` VARCHAR(30), IN `hora` VARCHAR(30))  NO SQL
INSERT INTO comentario (idConcierto,username,comentario,fechaComentario,horaComentario)
VALUES (id,usuarios,comentarios,fecha,hora)$$

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

DROP PROCEDURE IF EXISTS `verComentarios`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verComentarios` (IN `idGrupos` INT(10))  NO SQL
SELECT * FROM comentario WHERE comentario.idConcierto = idGrupos$$

DROP PROCEDURE IF EXISTS `verGrupoId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verGrupoId` (IN `sp_id` INT)  NO SQL
SELECT * FROM grupo WHERE idGrupo = sp_id$$

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
  `comentario` varchar(255) NOT NULL,
  `fechaComentario` varchar(30) NOT NULL,
  `horaComentario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idConcierto`, `username`, `comentario`, `fechaComentario`, `horaComentario`) VALUES
(1, 1, 'Victor', 'El concierto me gusto mucho fue la ostia', '', ''),
(2, 15, 'Victor', 'No estuvo mal el concierto', '', ''),
(3, 8, 'Jose', 'Hola que tal', '15/01/2019', '01:21:31pm'),
(4, 8, 'Jose', 'Hola que tal', '15/01/2019', '01:22:46pm'),
(5, 1, 'Jose', 'as', '15/01/2019', '01:23:24pm'),
(6, 2, 'Jose', 'a', '15/01/2019', '01:26:10pm'),
(7, 2, 'Jose', 'Hola', '15/01/2019', '01:52:08pm'),
(8, 2, 'Jose', 'hola pepe', '15/01/2019', '01:53:08pm'),
(9, 2, 'Jose', 'buenas', '15/01/2019', '01:54:08pm'),
(10, 2, 'Jose', 'jkkklkll', '15/01/2019', '01:55:00pm'),
(11, 2, 'Jose', '', '16/01/2019', '11:20:23am'),
(12, 1, 'Juan', 'Hola Jose', '16/01/2019', '12:14:29pm'),
(13, 1, 'Juan', 'Hola Victor', '16/01/2019', '12:16:30pm'),
(14, 1, 'Juan', 'Hola chavales', '16/01/2019', '12:55:29pm'),
(15, 2, 'Juan', 'Hola Jose', '16/01/2019', '12:56:58pm'),
(16, 1, 'Jose', 'Hola', '17/01/2019', '11:15:48am'),
(17, 1, 'Jose', 'Hola', '17/01/2019', '11:16:59am'),
(26, 1, 'Jose', '', '17/01/2019', '12:14:11pm'),
(27, 15, 'Jose', 'La verdad que si', '18/01/2019', '09:04:39am');

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
  `hora` varchar(30) NOT NULL,
  `idSala` int(10) NOT NULL,
  `idConcierto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conciertosala`
--

INSERT INTO `conciertosala` (`idConciertoSala`, `fecha`, `hora`, `idSala`, `idConcierto`) VALUES
(1, '2018-12-24', '18:30 pm', 1, 1),
(2, '2019-01-17', '12:00 am', 2, 10),
(3, '2019-01-06', '20:30 pm', 3, 15),
(4, '2019-02-14', '2:00 am', 2, 1);

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
(46, '10/01/2019', '01:33:38pm', 4, 'Jose', 150, 3, '2019-02-14'),
(48, '11/01/2019', '11:19:21am', 4, 'Jose', 250, 5, '2019-02-14'),
(49, '15/01/2019', '08:44:01am', 1, 'Jose', 100, 2, '2018-12-24'),
(50, '15/01/2019', '12:26:16pm', 3, 'Jose', 200, 4, '2019-01-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `descripcion` varchar(100) NOT NULL,
  `idGrupo` int(10) NOT NULL,
  `NombreGrupo` varchar(30) NOT NULL,
  `imagenGrupo` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `miembros` varchar(2000) NOT NULL,
  `discos` varchar(2000) NOT NULL,
  `descripcionCompleta` varchar(5000) NOT NULL,
  `añoFormacion` int(10) NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`descripcion`, `idGrupo`, `NombreGrupo`, `imagenGrupo`, `video`, `miembros`, `discos`, `descripcionCompleta`, `añoFormacion`, `genero`) VALUES
('Diego sabe la descripcion', 1, 'WITHIN TEMPTATION', 'IMG/WithinTemptation.jpg', 'https://www.youtube.com/embed/S7sOZ_TFUXg', 'Sharon den Adel, Rudolf Adrianus Jolie, Jeroen van Veen, Martijn Spierenburg, Robert Westerholt, Stefan Helleblad, Mike Coolen.', 'Enter (1997),Mother Earth (2000),The Silent Force (2004),The Heart of Everything (2007),The Unforgiving (2011),Hydra (2014),Resist (2019).\r\n', 'WithinTemptation es una banda neerlandesa de metal sinfónico formada en el año 1996 por Sharon den Adel, Robert Westerholt, Michiel Papenhove, Martijn Westerholt, Jeroen van Veen e Ivar de Graaf. Su estilo ha evolucionado desde el doom metal, el metal celta, el metal gótico, entre otros, hasta el metal sinfónico/rock sinfónico como ellos mismos han declarado. Aunque el grupo sigue siendo a menudo clasificado como gótico, la vocalista Sharon den Adel declaró en una entrevista que no consideraba a la banda como gótica.  A través de sus más de 15 años activos, Within Temptation ha tenido gran cantidad de miembros oficiales, siendo Jeroen van Veen, Den Adel y Robert Westerholt los únicos permanentes y los dos principales compositores; por su parte, Westerholt ha participado en la mayoría de sus discos y hasta la gira de 2011 decidió no acompañarlos debido al embarazo de Den Adel, estando ausente solo por 4 años. En todo este tiempo, la banda ha lanzado seis álbumes de estudio, tres extended play, tres álbumes en vivo, veintiuno sencillos y veintidós vídeos musicales.', 1996, 'Metal sinfónico.'),
('Green Day es una banda estadounidense de pop punk', 2, 'GREEN DAY', 'IMG/GreenDay.jpg', 'https://www.youtube.com/embed/Soa3gO7tL-c', 'Billie Joe Armstrong, Mike Dirnt, Tré Cool.', 'Smooth(1990), Kerplunk(1992), Dookie(1994), Nimrod?(1995), American Idiot?(1997), Revolution Radio (2012)', 'La historia de Green Day comienza en Berkeley, California, en 1983, cuando dos jóvenes amigos llamados Billie Joe Armstrong (Billie Joe) y Michael Pritchard (Mike Dirnt), forman su primer grupo de música, llamado Sweet children. Por aquel entonces apenas contaban 14 años. En 1989 se une al dúo el batería Al Sobrante y Sweet Children cambia su nombre por el de Green Day. Ese mismo año, Green Day edita su primer disco con una compañía independiente. El título del trabajo era “1.000 Hours”, que fue bien recibido en los ambientes punk. Poco tiempo después Sobrante es reemplazado por otro batería, John Kiftmeyer. Con él, Green Day publica en 1990 su primer álbum, \"1039/Smooth\".', 1986, 'Punk Rock'),
('Ir a la búsqueda Queen Brian May, Freddie Mercury, John Deacon y Roger Taylor. ', 3, 'QUEEN ', 'IMG/Queen.jpeg', 'https://www.youtube.com/embed/tgbNymZ7vqY', 'Freddie Mercury, Brian May, Roger Taylor, John Deacon', '1973: Queen (1973), Queen II (1974), Sheer Heart Attack (1974), A Night at the Opera (1975), A Day at the Races (1976), News of the World (1977), Jazz (1978), The Game (1980), Hot Space (1982), The Works (1984), 1986: A Kind of Magic (1986), The Miracle (1989), Innuendo (1991), Made in Heaven (1995)', 'Queen es una banda británica de rock formada en 1970 en Londres por el cantante Freddie Mercury, el guitarrista Brian May, el baterista Roger Taylor y el bajista John Deacon. Si bien el grupo ha presentado bajas de dos de sus miembros (Mercury, fallecido en 1991, y Deacon, retirado en 1997), los integrantes restantes, May y Taylor, continúan trabajando bajo el nombre Queen, por lo que la banda aún se considera activa.4  El grupo gozó de un gran éxito en el Reino Unido con álbumes como Sheer Heart Attack (1974) y A Night at the Opera (1975). Este último llamó la atención internacionalmente, en especial por el sencillo \"Bohemian Rhapsody\", y colocó a Queen en un primer plano de la escena musical. Tuvieron una significativa repercusión en Estados Unidos a finales de los años 1970, ya con un numeroso repertorio de éxitos.5 A nivel artístico, se ha destacado su diversidad musical, sus arreglos en múltiples capas y sus armonías vocales. Es considerada una banda de gran influencia en el desarrollo del hard rock y el heavy metal, incorporando elementos del glam rock, rock progresivo, folk, blues y pop. Fue una de las primeras agrupaciones musicales en hacer de sus conciertos espectáculos muy vistosos mediante el uso de bombas de humo, flashpots o innovadores sistemas de luces móviles, además de promover la participación del público en los mismos, contribuyendo así al auge del arena rock.6 La crítica ha señalado el carisma de Freddie Mercury como una parte fundamental de sus presentaciones.7 A este respecto, habitualmente se han reconocido actuaciones como las del Live Aid en 1985 o el concierto del estadio de Wembley en 1986 como dos de los mejores recitales de rock de la historia.', 1770, 'Rock'),
('Coldplay es una banda británica de pop rock y rock alternativo formada en Londres en 1996. ', 4, 'COLDPLAY', 'IMG/ColdPlay.jpg', 'https://www.youtube.com/embed/dvgZkm1xWPE', 'Chris Martin, Jonny Buckland, Guy Berryman, Will Champion, Phil Harvey', 'Parachutes (2000), A Rush of Blood to the Head (2002), Viva la Vida or Death and All His Friends (2008), Mylo Xyloto (2011), Ghost Stories (2014), A Head Full of Dreams (2015)', 'Coldplay es una banda británica de pop rock y rock alternativo formada en Londres en 1996. El grupo está integrado por Chris Martin (voz, teclado, guitarra), Jon Buckland (guitarra principal), Guy Berryman (bajo eléctrico) y Will Champion (batería, coros y otros instrumentos).  Los primeros trabajos de Coldplay hicieron que la banda fuera comparada repetidas veces con artistas como Radiohead, Oasis, INXS, U2 y Travis. Alcanzaron el éxito internacional con el lanzamiento de su sencillo «Yellow», seguido por su álbum debut, Parachutes (2000), que fue nominado a los Premios Mercury. Su segundo álbum, A Rush of Blood to the Head (2002) ganó múltiples premios, incluido el de Álbum del Año según el semanario NME. Pese a que su tercer álbum, X&Y (2005) no causó tanto entusiasmo, tuvo igualmente una recepción positiva. El cuarto álbum de estudio de la banda, Viva la Vida or Death and All His Friends (2008) fue producido por Brian Eno y generó excelentes críticas, llegando a recibir nominaciones a los premios Grammy y otra clase de homenajes.', 1996, 'Pop rock'),
('Linkin Park es una banda estadounidense de rock alternativo procedente de Agoura Hills, California. ', 5, 'LINKIN PARK', 'IMG/LinkinPark.jpg', 'https://www.youtube.com/embed/kXYiU_JCYtU', 'Mike Shinoda, Joe Hahn, Rob Bourdon, Brad Delson, Dave Farrell', 'Hybrid Theory (2000), Meteora (2003), Minutes to Midnight (2007), A Thousand Suns (2010), 2012: Living Things (2012), 2014: The Hunting Party (2014), One More Light (2017)', 'Linkin Park es una banda estadounidense de rock alternativo procedente de Agoura Hills, California. Formada en 1996, el grupo estuvo inicialmente integrado por Mike Shinoda, Dave Farrell, Joe Hahn, Brad Delson, Rob Bourdon y Mark Wakefield, este último como voz principal. La banda inició en ese mismo año sus primeros trabajos musicales de manera independiente y posterior a esto grabaron su primer material llamado Xero; sin embargo no tuvieron gran éxito en la búsqueda de un sello discográfico ya que nadie mostró interés por su trabajo, lo que ocasionó la renuncia de Mark Wakefield. Poco después, Chester Bennington se incorporó a la banda como vocalista; el grupo realizó su primera presentación en un club de Los Ángeles y siendo respaldados por Jeff Blue, en aquel entonces vicepresidente de Warner Bros. Records, lograron firmar con el sello en 1999. El nombre del grupo es un juego de palabras que hace referencia al Lincoln Park en Santa Mónica', 1996, 'Rock alternativo.'),
('a la búsqueda Para la revista musical, véase Rolling Stone. ', 6, 'ROLLING STONES', 'IMG/RollingStones.jpg', 'https://www.youtube.com/embed/nrIPxlFzDi0', 'Mick Jagger, Keith Richards, Charlie Watts, Ron Wood', 'The Rolling Stones (1964, UK), The Rolling Stones No. 2 (1965, UK), Out of Our Heads (1965), December\'s Children (And Everybody\'s) (1965, US), Aftermath(1966), Between the Buttons (1967), Their Satanic Majesties Request (1967), Beggars Banquet (1968), Let It Bleed (1969), Sticky Fingers (1971), Exile on Main St (1972), Goats Head Soup (1973), It\'s Only Rock \'n Roll (1974)', 'The Rolling Stones es una banda británica de rock originaria de Londres. La banda se formó en abril de 1962 por Brian Jones, Mick Jagger, Keith Richards, Bill Wyman, Ian Stewart y Charlie Watts. Brian Jones fue despedido en junio de 1969, falleciendo tres semanas después, siendo reemplazado por el guitarrista Mick Taylor, que dejaría el grupo en 1975 y sería a su vez reemplazado por Ron Wood. Con el retiro de Bill Wyman en 1993 se incluyó al bajista Darryl Jones que, aunque toca con la banda desde la grabación del álbum Voodoo Lounge en 1994, no es un miembro oficial.  Están considerados como una de las más grandes e influyentes bandas de toda la historia del rock, siendo la agrupación que sentó las bases del rock contemporáneo. Contando desde sus inicios con el favor de la crítica, algunos de sus materiales están considerados de los mejores de todos los tiempos; entre ellos destacan Beggars Banquet (1968), Let It Bleed (1969), Sticky Fingers (1971) y quizá su mejor obra, Exile on Main St. (1972). En 1989 fueron incluidos en el Salón de la Fama del Rock and Roll, y en 2004 la revista estadounidense Rolling Stone los colocó en el puesto No. 4 en su lista de Los 50 Mejores Artistas de todos los Tiempos. Ningún grupo de rock hasta la fecha ha sostenido tan duradera y todavía mundialmente reconocida trayectoria como The Rolling Stones; con Jagger, Richards y Watts como miembros fundadores en activo, continúan siendo la banda más longeva de la historia del rock.', 1962, 'Rock'),
('The Black Eyed Peas es un grupo de música estadounidense de hip hop formado en 1995 en Los Ángeles ', 7, 'BLACK EYED PEAS ', 'IMG/BlackEyedPeas.jpg', 'https://www.youtube.com/embed/ZaI2IlHwmgQ', 'Will.i.am, Apl.de.ap, Taboo, Jessica Reynoso', 'Behind the Front (1998), Bridging the Gap (2000), Elephunk (2003), Monkey Business (2005), The E.N.D (2009), The Beginning (2010), Masters of the Sun Vol.1 (2018)', 'The Black Eyed Peas es un grupo de música estadounidense de hip hop formado en 1995 en Los Ángeles, California. Seis veces ganadores del premio Grammy, el grupo está actualmente integrado por los vocalistas: Will.i.am, Apl.de.Ap, Taboo y la participante de La Voz Filipinas, Jessica Reynoso.  Durante los años 90, el grupo surgió como trío masculino de rap y fue ganando mediana popularidad en el género hip-hop estadounidense, pero no fue hasta el año 2003, con su disco Elephunk y la incorporación de la cantante Fergie a la banda, cuando el grupo se hizo mundialmente famoso. Su primer éxito a nivel mundial fue la canción \"Where Is the Love?\", que llegó a las primeras posiciones en más de diez listas de éxitos de todo el mundo. Otro single de éxito europeo fue \"Shut Up\", que encabezó posiciones en todo el mundo sobre todo dicho continente y \"Let\'s Get It Started\", con el que ganaron un Grammy. Su siguiente álbum, Monkey Business, lanzado en el año 2005, fue también éxito en todo el mundo y consiguió 4 discos de Platino en los EE.UU., y fue número #2 en los Billboard.', 1995, ' Pop rock'),
('Evanescence es una banda estadounidense de rock fundada en Little Rock', 8, 'EVANESCENCE', 'IMG/Evanescence.jpg', 'https://www.youtube.com/embed/3YxaaGgTQYM', 'Amy Lee, Tim McCord, Troy McLawhorn, Jen Majura, Will Hunt', 'Fallen (2003), Anywhere But Home (2004), The Open Door (2006), Evanescence (2011), Synthesis (2017)', 'Evanescence es una banda estadounidense de rock fundada en Little Rock, Arkansas, en 1995 por la cantante, pianista y compositora Amy Lee y el guitarrista Ben Moody. Después de grabar dos EPs independientes, Evanescence EP y Sound Asleep, y luego su primer álbum demo, Origin, con su tercer integrante, el tecladista David Hodges en 2000 con ayuda de la discográfica Bigwig Enterprises, la banda lanzó su primer álbum de estudio, Fallen, con la discográfica Wind-up Records en 2003. Fallen vendió más de 17 millones de copias en todo el mundo y la banda ganó dos premios Grammy. Un año más tarde, la banda lanzó su primer CD-DVD en vivo, Anywhere but Home, el cual vendió cerca de 2 millones de copias alrededor del mundo. En 2006, la banda lanzó su segundo álbum de estudio, The Open Door, que vendió más de 5 millones de copias. En octubre de 2011, fue lanzado el tercer álbum de estudio de la banda titulado Evanescence. En suma, la banda ha vendido cerca de 29 millones de copias alrededor del mundo.', 1995, 'Metal Gotico'),
('Paramore es una banda estadounidense de pop punk y rock alternativo', 9, 'PARAMORE', 'IMG/Paramore.jpg', 'https://www.youtube.com/embed/aCyGvGEtOwc', 'Amy Lee, Tim McCord, Troy McLawhorn, Jen Majura, Will Hunt', 'Fallen (2003), Anywhere But Home (2004), The Open Door (2006), Evanescence (2011), Synthesis (2017)', 'Paramore es una banda estadounidense de pop punk y rock alternativo integrada por Hayley Williams (voz), Taylor York (guitarra) y Zac Farro (batería). Fue formada en Franklin, Tennessee, en 2004, por Williams y Jeremy Davis (bajo) junto con Josh Farro (guitarra líder y coros), Zac Farro (batería) y Jason Bynum (guitarra rítmica).7 En 2008, recibió su primera nominación a los premios Grammy en la categoría de mejor artista nuevo. Ese mismo año, obtuvo los galardones de mejor banda rock y mejor canción rock (por «Decode») en los Teen Choice Awards.  En 2005, Paramore firmó con el sello discográfico Fueled by Ramen y lanzó su álbum debut titulado All We Know Is Falling; de este se extrajeron tres sencillos, pero ninguno logró entrar en las listas de popularidad. Tampoco apareció en la lista semanal Billboard 200, a pesar de que alcanzó el puesto número treinta de la Billboard Top Heatseekers. All We Know Is Falling recibió la certificación de disco de oro en el Reino Unido cuatro años después de su lanzamiento.', 2004, 'Pop rock'),
('Guns N\' Roses es una banda estadounidense de hard rock formada en Hollywood', 10, 'GUNS N ROSES', 'IMG/GunsNRoses.jpg', 'https://www.youtube.com/embed/1w7OgIMMRc4', 'Axl Rose, Slash, Duff McKagan, Dizzy Reed, Richard Fortus, Frank Ferrer, Melissa Reese', 'Appetite for Destruction (1987), G N\' R Lies (1988), Use Your Illusion I (1991), Use Your Illusion II (1991), \"The Spaghetti Incident?\" (1993), Chinese Democracy (2008)', 'Guns N\' Roses es una banda estadounidense de hard rock formada en Hollywood, en la ciudad de Los Ángeles, California en 1985. El grupo fue fundado por el vocalista Axl Rose y el guitarrista Izzy Stradlin. Asimismo, la banda es uno de los números artísticos más exitosos de la historia musical, debido a sus grandes ventas, numerosos galardones, legado y repercusión mundial hasta la fecha. Tambien Guns N\' Roses es considerada una de las bandas más influyentes de la historia debido a su gran legado musical. En el año 2011 también fueron posicionados en el puesto número 21 en la lista de \"los 100 mejores artistas de la historia\", elaborada por la revista Rolling Stone en conjunto con diversos productores y críticos musicales.   La formación actual cuenta con el vocalista Axl Rose, el guitarrista rítmico Richard Fortus, los tecladistas Dizzy Reed y Melissa Reese, el baterista Frank Ferrer, el bajista Duff McKagan y el guitarrista líder Slash. Estos dos últimos son considerados miembros clásicos de la agrupación y luego de una ausencia de 23 años, retomaron su lugar en la banda.', 1985, 'Hard rock'),
('Jonas Brothers fue un grupo estadounidense de música', 11, 'JONAS BROTHERS', 'IMG/JonasBrother.jpg', 'https://www.youtube.com/embed/5KNEZJ6KkLI', 'Kevin Jonas, Joe Jonas, Nick Jonas', 'Jonas Brothers (2007), A Little Bit Longer (2008), Lines, Vines and Trying Times (2009)', 'Jonas Brothers fue un grupo estadounidense de música, compuesto por tres hermanos: Kevin Jonas (Paul Kevin Jonas II, n. 1987), Joe Jonas (Joseph Adam Jonas, n. 1989) y Nick Jonas (Nicholas Jerry Jonas, n. 1992), originarios de Wyckoff, Nueva Jersey. La carrera de los hermanos Jonas comenzó en 2005 cuando firmaron contrato con Columbia Records, sello discográfico con el que grabaron y lanzaron su álbum debut It\'s About Time.6 A causa del bajo éxito del álbum, los Jonas Brothers fueron expulsados de Columbia Records y se unieron a Hollywood Records, sello discográfico perteneciente a The Walt Disney Company.', 2005, 'Pop'),
('El Canto del Loco (también abreviado ECDL) fue un grupo español de música pop rock', 12, 'EL CANTO DEL LOCO', 'IMG/CantoDelLoco.jpg', 'https://www.youtube.com/embed/n9jzGmFBzx8', 'Carlos Gamón, Chema Ruiz, Dani Martín, David Otero, Isaac de René, Xabier Mendiluze', 'El canto del loco (2000), A contracorriente (2002), Estados de ánimo (2003), Zapatillas (2005), Personas (2008)', 'El Canto del Loco (también abreviado ECDL) fue un grupo español de música pop rock, aunque sus miembros consideran que algunas de sus canciones pertenecen más al género power pop.1 Fue creado en 1994 por Dani Martín e Iván Ganchegui (quien abandonaría el grupo en 2002), y años después terminarían por ser cinco miembros. Influidos principalmente por otros grupos españoles de la década de 1980 y con cinco álbumes de estudio, El Canto del Loco ha conseguido vender más de un millón de copias en el mercado, convirtiéndose en uno de los grupos musicales más importantes del panorama español en su momento. En febrero del 2010 la banda anunció su separación, ya que los miembros del grupo querían seguir su carrera individualmente.', 1994, 'Pop rock'),
('Mecano fue un grupo español de música pop, activo entre 1981 y 1992', 13, 'MECANO', 'IMG/Mecano.jpg', 'https://www.youtube.com/embed/_mAmEKNqg1g', 'Nacho Cano, José María Cano, Ana Torroja', 'Mecano (1982), ¿Dónde está el país de las hadas? (1983), Ya viene el Sol (1984), Entre el cielo y el suelo (1986), Descanso dominical (1988), 1991: Aidalai (1991)', 'Mecano fue un grupo español de música pop, activo entre 1981 y 1992, periodo al que hay que sumar una fugaz reaparición en 1998, que duró apenas ocho meses a partir de la edición de un doble disco recopilatorio que incluía siete nuevos temas grabados para la ocasión.  El grupo estaba formado por Ana Torroja y los hermanos Nacho y José María Cano. Fuera del grupo, pero parte integrante de la banda, tanto para las sesiones de estudio como para los directos, estuvieron grandes músicos entre bajistas y bateristas entre los que destacan Arturo Terriza, Manolo Aguilar, Nacho Mañó, Javier Quílez y los bateristas Ángel Celada y Óscar Astruga.  Mecano realizó un pop que evolucionó desde una sonoridad puramente «tecno», durante su primera etapa (entre 1981 y 1985), hasta el eclecticismo de la que es considerada como segunda época artística (entre 1986 y 1992), en la que el grupo demostró una gran versatilidad a través de grandes producciones y de la incursión en diferentes estilos, siempre desde un planteamiento unificador logrado especialmente a través de la sonoridad pop de su vocalista, que sirvió como tamiz nivelador de las tan diferentes concepciones artísticas de sus dos autores.', 1981, 'Pop rock'),
('Backstreet Boys es una boy band estadounidense formada en Orlando, Florida, en 1993. ', 14, 'BACKSTREET BOYS', 'IMG/BlackEyedPeas.jpg', 'https://www.youtube.com/embed/ZaI2IlHwmgQ', 'J. McLean, Howie Dorough \"Howie D.\", Nick Carter, Kevin Richardson, Brian Littrell', 'Backstreet Boys (1996), Backstreet\'s Back (1997), Millennium (1999), Black & Blue (2000), The Hits - Chapter One (2001), Never Gone (2005), Unbreakable (2007), This Is Us (2009), NKOTBSB (2011), In a World Like This (2013), DNA (álbum) (2019)', 'Backstreet Boys es una boy band estadounidense formada en Orlando, Florida, en 1993. La banda está formada por A. J. McLean, Howie Dorough, Brian Littrell, Nick Carter y Kevin Richardson. Este último dejó la banda en 2006, pero regresó al grupo en 2012. Saltaron a la fama con su álbum debut, Backstreet Boys (1996). El siguiente álbum, Backstreet\'s Back (1997) continuó con el éxito del grupo en todo el mundo. Llegaron al estrellato con su álbum Millennium (1999) y el álbum siguiente, Black & Blue (2000). Después de un descanso de tres años, la banda ha lanzado cinco álbumes Never Gone (2005), Unbreakable (2007), This Is Us (2009), NKOTBSB junto a los New Kids On The Block (2011) y In A World Like This (2013). La banda ha vendido más de 135 millones de discos en todo el mundo, haciéndolos uno de los grupos con mayores ventas registradas en la historia de la música. Son considerados la banda masculina de pop más importante e influyente de la historia de la música. De acuerdo con Billboard, son el primer grupo desde Sade en hacer llegar sus primeros siete álbumes en el top 10 en esa lista.', 1993, 'Teen pop'),
('The Killers es una banda de rock estadounidense formada en 2001 en Las Vegas (Nevada)', 15, 'THE KILLERS', 'IMG/BackStreetBoys.jpg', 'https://www.youtube.com/embed/6M6samPEMpM', 'Brandon Flowers, Dave Keuning, Mark Stoermer, Ronnie Vannucci Jr', '2004: Hot Fuss (2004), Sam\'s Town (2006), Day & Age (2008), Battle Born (2012), Wonderful Wonderful (2017)', 'The Killers es una banda de rock estadounidense formada en 2001 en Las Vegas (Nevada) por el vocalista, teclista y bajista Brandon Flowers y el guitarrista Dave Keuning. En sus inicios la formación de la banda sufrió diversos cambios, pero hacia 2002 se integraron el bajista y guitarrista Mark Stoermer y el batería Ronnie Vannucci Jr., permaneciendo fija desde entonces. Después de llamar la atención de un busca talentos, el grupo firmó con el sello independiente británico Lizard King Records y el estadounidense Island Records.  La banda ha lanzado cinco álbumes de estudio: Hot Fuss (2004), Sam\'s Town (2006), Day & Age (2008), Battle Born (2012) y su reciente quinto álbum Wonderful Wonderful publicado el 22 de septiembre de 2017. Todos los álbumes han ocupado el puesto número uno en el Reino Unido y en Irlanda; además, se estima que han vendido 22 millones de álbumes en todo el mundo.2 Por otra parte, también han lanzado un álbum recopilatorio (Sawdust, en 2007), un álbum en vivo (Live from the Royal Albert Hall, en 2009) y un álbum de grandes éxitos (Direct Hits, en 2013).', 2001, 'Rock alternativo');

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
('Jose', '$2y$15$IetuWfmSjI5Zl.xltVgAMOSK..NtwNgxPBgSxflNfgBGgFomroWmC', 'Jose', 'palotes', 'pele', '2019-01-17', 'santo palotes', 'ticketPruebas@hotmail.com', 'Administrador'),
('joselito', '$2y$15$8aM4dR3lwgDy2IaVbklaCO7ekhEZY5rF1CZ8kSCQgBYpLxRG3BKDi', 'jose', 'asd', 'asd', '2019-01-01', 'calle marimar', 'victor_sanchez@gmail.com', 'Usuario'),
('Juan', '$2y$15$bGyIECvX.o/7dyb4ZPmnEOeJydP4alYNxrBg2b8Sr/2mTpCHdE9Ba', 'Juan', 'asdasd', 'dasdd', '2019-01-08', 'calle marimar', 'pepe@hotmail.com', 'Usuario'),
('Pepe', '$2y$15$TYcZ/T0wnrnkF/r61t4XT.A3EDmXJU4ou3RmrEQ0BVvi1qsYlkjm.', 'pepe', 'sanchez', 'dasdd', '2019-01-01', 'calle marimar', 'victor_sanchez@gmail.com', 'Usuario'),
('Victor', '1234', 'victo', 'dsa', 'asd', '1999-12-02', 'asdasd', 'asd@asd.com', 'Administrador'),
('VictorAdmin', '$2y$15$3cVy7nkdClvaUUGkQLrZ8ediEZegjutB/P.YlZO6nm/W2VIM3SEc.', 'victor', 'sanchez', 'juan', '2019-01-02', 'calle marimar', 'ticketPruebas@hotmail.com', 'Usuario');

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
  MODIFY `idComentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `idEntrada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
