-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2015 a las 02:45:55
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `jardin`
--
CREATE DATABASE IF NOT EXISTS `jardin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jardin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fenac` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `peso` float NOT NULL,
  `talla` int(2) NOT NULL,
  `nac` varchar(50) NOT NULL,
  `lugarnac` varchar(50) NOT NULL,
  `feins` date NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `aula` int(11) NOT NULL,
  `nom_rp` varchar(50) NOT NULL,
  `ape_rp` varchar(50) NOT NULL,
  `tlf` varchar(11) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parent` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `alumnos`:
--   `aula`
--       `aulas` -> `id`
--

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `fenac`, `sexo`, `peso`, `talla`, `nac`, `lugarnac`, `feins`, `cedula`, `aula`, `nom_rp`, `ape_rp`, `tlf`, `dir`, `email`, `parent`) VALUES
(2, 'Bernardo Daniel', 'Lopez Gomez', '2011-12-24', 'Masculino', 24.53, 22, 'Mexicano', 'Guadalajara', '2015-08-20', '1223441241', 1, 'Elena Del Valle', 'Marcano de Lopez', '02912345678', 'skgdf ashf sakj fhs a kjf hsa fk afs hkja kadlj ahdkahd ajsh', 'elena@mail.com', 'Abuela'),
(3, 'Jeraldine Gabriela', 'Montiel Ramirez', '2012-01-21', 'Femenino', 22.312, 16, 'Venezolana', 'Maturin', '2015-09-19', '3122431232', 5, 'Eduardo David', 'Montiel Ramirez', '02912345678', 'sashfsahfksjfhsakhfaskjkfhaskjfh', 'eduardo@ejemplo.com', 'Hermano'),
(4, 'Enriqueta Maria', 'Suarez Molina', '2011-03-22', 'Femenino', 30.42, 20, 'Venezolana', 'Caracas', '2015-08-20', '2233343434', 5, 'Enrique Jose', 'Suarez Marcano', '04261234567', 'hfkashfsajhfsakfhasjkfhsakfhah', 'enrique@ejemplo.com', 'Padre'),
(5, 'Elys Manuel', 'Mata Astudillo', '2012-04-24', 'Masculino', 20.654, 13, 'Venezolano', 'MaturÃ­n', '2015-08-20', '1022399930', 1, 'Elys Manuel', 'Mata', '04141234567', 'jaghadskjghahgakghaksghakjgkjghk', 'manuelmata777@gmail.com', 'Padre'),
(6, 'Bruna Andreina', 'Garcia Palomares', '2011-05-04', 'Femenino', 22.45, 16, 'Venezolana', 'Ciudad Guayana', '2015-08-21', '1323823980', 6, 'Ernesto Jose', 'Garcia Arocha', '02912345678', 'flsafhsafsahfksajhfsakjfhsakjfhaskjfhaskjfhsakjfhsakjfhaskj', 'ernesto@mail.com', 'Hermano'),
(7, 'Arturo Roberto', 'Fuentes Palmas', '2011-06-15', 'Masculino', 26.12, 20, 'Venezolano', 'Maracaibo', '2015-08-21', '1653271987', 6, 'Abel Joaquin', 'Fuentes Jimenez', '04122228293', 'dhhdfsakdhskdhsakdhaksj', 'abel@ejemplo.com', 'Padre'),
(8, 'Lorenzo Daniel', 'Montilla Dores', '2012-08-04', 'Masculino', 30.8783, 22, 'Venezolano', 'Caracas', '2015-08-21', '2709830918', 1, 'Margarito Jose', 'Jimenez PeÃ±a', '02912345678', 'fhhfkdshfkjhhsdhfdskfhkdjsfh', 'margarito@mail.com', 'Otros'),
(9, 'Maria Jose', 'Araque Azocar', '2012-08-27', 'Femenino', 24.212, 20, 'Colombiana', 'CÃºcuta', '2015-09-19', '1980839280', 5, 'Juan Jose', 'Araque Gomez', '04247879127', 'adh lsdhsakdhh hdashdas hdsadh ishdadh sdhasdh lsjdla jsdljas sjadlakja sdhaakjlshd.', 'juanjose@ejemplo.com', 'Padre'),
(10, 'Pedro Miguel', 'Rodriguez Pilar', '2011-06-08', 'Masculino', 31.2163, 22, 'Venezolano', 'MaturÃ­n', '2015-08-22', '1782032093', 6, 'Miguel Antonio', 'Rodriguez Pilar', '02912345678', 'Av blakal calle sjasj #129', 'miguel@mail.com', 'Hermano'),
(11, 'VÃ­ctor Jose', 'Suarez Mata', '2013-04-24', 'Masculino', 28.783, 12, 'Venezolano', 'MaturÃ­n', '2015-09-18', '1099840984', 5, 'Maria Camila', 'Mata Gomez', '04123839058', 'dash skhdkjashd skjhdksah ashdk akjdh', 'maria@mail.com', 'Madre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

DROP TABLE IF EXISTS `ambiente`;
CREATE TABLE IF NOT EXISTS `ambiente` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `padre` varchar(2) NOT NULL,
  `madre` varchar(2) NOT NULL,
  `n_hnos` int(2) NOT NULL,
  `n_abl` int(1) NOT NULL,
  `n_tios` int(2) NOT NULL,
  `n_otr` int(2) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `material` varchar(50) NOT NULL,
  `dormi` int(1) NOT NULL,
  `cocina` int(1) NOT NULL,
  `bano` int(1) NOT NULL,
  `comedor` int(1) NOT NULL,
  `tend` varchar(50) NOT NULL,
  `cuida` varchar(20) NOT NULL,
  `cdobs` varchar(100) NOT NULL,
  `asis` varchar(2) NOT NULL,
  `orien` varchar(200) NOT NULL,
  `padres` varchar(20) NOT NULL,
  `hnos` varchar(20) NOT NULL,
  `flia` varchar(20) NOT NULL,
  `amg` varchar(20) NOT NULL,
  `consulta` varchar(50) NOT NULL,
  `pq` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `ambiente`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id`, `ced_alu`, `padre`, `madre`, `n_hnos`, `n_abl`, `n_tios`, `n_otr`, `tipo`, `material`, `dormi`, `cocina`, `bano`, `comedor`, `tend`, `cuida`, `cdobs`, `asis`, `orien`, `padres`, `hnos`, `flia`, `amg`, `consulta`, `pq`) VALUES
(2, '1223441241', 'Si', 'No', 2, 1, 0, 1, 'Apartamento', 'Bloque', 3, 1, 2, 1, 'Alquilada', 'Abuela', 'hfkasfhaskjfskajfhkshfkashfaskfhaskjfhasjkfhasfahsfkjah', 'No', 'fhkahfjashfkashfjksfhkjasfjkashfjkashfk', 'ArmÃ³nica', 'Cordial', 'Cordial', 'Cordial', 'PsicÃ³logos', 'hfashfakhfjksfhasfhskfhsakfhkasfhskfjhakfhaksjfhkjhfkjasf'),
(3, '3122431232', 'No', 'Si', 2, 0, 0, 1, 'Otros', 'Madera', 3, 1, 2, 1, 'Propia', 'Hermano', 'jhsakfhaskhfaskjfhsakjfhaskhfkjashjkf', 'No', 'hfsakhfskjafhskjhfaskfhsakjhfsjahfjaskhfhjsa', 'Tensa', 'Indiferente', 'Tensa', 'Agresiva', 'Psico-pedagogos', 'sasahakshfkashfkjsahfaskjdhas'),
(4, '2233343434', 'Si', 'Si', 0, 0, 2, 2, 'Casa', 'Bloque', 5, 1, 3, 1, 'InvasiÃ³n', 'TÃ­o', 'safhsakfksahfkjsafjksahfkjashfjasfh', 'No', 'skjhsajkfsahfksjhfasfhasfhsafhasfha', 'ArmÃ³nica', 'ArmÃ³nica', 'ArmÃ³nica', 'ArmÃ³nica', 'Terapista de Lenguaje', 'shsadhskdhaskdhaskdhsakjdhaskjdhsakjdhaskjdaskdhskj'),
(5, '1022399930', 'Si', 'Si', 0, 0, 0, 0, 'Casa', 'Bloque', 2, 1, 2, 1, 'Propia', 'Madre', 'jflsajflksjfkashfkjshfkhaskhfakjfjah', 'No', 'hfskajfhaskjfhaskjfhskjfhaskuyrqwuyrxmv zmvmcbvukfrye', 'ArmÃ³nica', 'ArmÃ³nica', 'Cordial', 'Cordial', 'Otros', 'nhsakjfhaskjfhasyfueqwi,scn,mncaskhfk'),
(6, '1323823980', 'Si', 'No', 1, 1, 0, 1, 'Apartamento', 'Bloque', 4, 1, 3, 1, 'Con opciÃ³n a compra', 'Otros', 'La cachifa XD', 'Si', 'Si, le digo jajajajajajajajajajaajaja', 'Tensa', 'Cordial', 'Agresiva', 'Tensa', 'PsicÃ³logos', 'hsksajhdsakhdskhdkashdkasjdhj'),
(7, '1653271987', 'Si', 'Si', 3, 1, 2, 4, 'Casa', 'Bloque', 5, 1, 3, 1, 'Propia', 'Otros', 'fhjdhfksjdhfkjhfkjsdfh', 'Si', 'hksjfhshfkasfhaksjfhk', 'Cordial', 'Cordial', 'Cordial', 'Tensa', 'PsicÃ³logos', 'fjlksfjdsklfjldjfsdfkjdskfj'),
(8, '2709830918', 'Si', 'No', 3, 0, 0, 2, 'Rancho', 'Madera', 3, 1, 1, 1, 'InvasiÃ³n', 'Padre', 'dhskfhkjdsfdhfkdshfkdsjfhdsfkjhfd', 'No', 'fjfjslfjkslfjdsklfjdsjf', 'Cordial', 'Tensa', 'Cordial', 'Agresiva', 'Psico-pedagogos', 'hfdlsfhdkjfhdsfkhsdfksfh'),
(9, '1980839280', 'No', 'No', 1, 0, 1, 1, 'Apartamento', 'Bloque', 3, 1, 2, 1, 'Con opciÃ³n a compra', 'Hermano', 'Siempre arman un bochinche', 'No', 'No ha sido orientada correctamente', 'Cordial', 'ArmÃ³nica', 'Tensa', 'Cordial', 'PsicÃ³logos', 'Tiene una serie de problemitas, pero son breves XD XD XD'),
(10, '1782032093', 'No', 'Si', 2, 1, 0, 1, 'Casa', 'Zinc', 2, 0, 1, 0, 'InvasiÃ³n', 'Hermano', 'jhasd sad sdjadj lorem asin djask', 'Si', 'hablando con el asi: ajskaj 12sca ajksjd 21sd sda', 'Cordial', 'Cordial', 'Tensa', 'Cordial', 'Otros', 'porque si shdadh 22313 kdjaskdj'),
(11, '1099840984', 'Si', 'Si', 1, 1, 0, 0, 'Casa', 'Bloque', 3, 1, 2, 1, 'Propia', 'Abuelo', 'Ninguna', 'No', 'Si vale', 'ArmÃ³nica', 'ArmÃ³nica', 'Cordial', 'Tensa', 'Psico-pedagogos', 'Para orientarlo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

DROP TABLE IF EXISTS `antecedentes`;
CREATE TABLE IF NOT EXISTS `antecedentes` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `plan` varchar(2) NOT NULL,
  `enf` varchar(100) NOT NULL,
  `trab` varchar(2) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `suf` varchar(2) NOT NULL,
  `gs` varchar(3) NOT NULL,
  `parto` varchar(20) NOT NULL,
  `edad` varchar(2) NOT NULL,
  `prob` varchar(2) NOT NULL,
  `peso` float NOT NULL,
  `talla` float NOT NULL,
  `nac` varchar(2) NOT NULL,
  `causa` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `antecedentes`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `ced_alu`, `plan`, `enf`, `trab`, `tipo`, `suf`, `gs`, `parto`, `edad`, `prob`, `peso`, `talla`, `nac`, `causa`) VALUES
(2, '1223441241', 'Si', 'Otras', 'No', 'Otros', 'on', 'AB-', 'CesÃ¡ria', '27', 'No', 24.53, 22, 'Me', 'hfkshfkajhfhasfhskajfhaskjf'),
(3, '3122431232', 'Si', 'on,on,on', 'Si', 'Profesional', 'on', 'O+', 'ForcÃ©', '22', 'Si', 22.312, 16, 'Ve', 'hfhsakfahskhfashfkjashfkashfjkasfhfkjashfjsahfa'),
(4, '2233343434', 'Si', 'Anemia,Otras', 'No', 'Otros', 'No', 'AB+', 'CesÃ¡ria', '25', 'No', 30.42, 20, 'Ve', 'hdkashdksahdksjhdaskhdkshdjksadhkadkjhasd'),
(5, '1022399930', 'Si', 'HipertensiÃ³n,Otras', 'Si', 'Profesional', 'No', 'B-', 'CesÃ¡ria', '26', 'No', 20.654, 13, 'No', 'nashfkjashfkjahfkjashfkjashfkjsahfkjashfaskjfhjksfa'),
(6, '1323823980', 'Si', 'RubÃ©ola,Anemia,Toxo', 'No', 'Otros', 'No', 'AB+', 'Natural', '26', 'No', 22.45, 16, 'No', 'para nada'),
(7, '1653271987', 'No', 'Toxoplasmosis', 'Si', 'Profesional', 'Si', 'O+', 'A tÃ©rmino', '27', 'No', 26.12, 20, 'No', 'daslfslafskfjalf'),
(8, '2709830918', 'No', 'RubÃ©ola,Anemia,Hipe', 'Si', 'Otros', 'No', 'B+', 'Prematuro', '23', 'Si', 30.8783, 22, 'Si', 'sahsakjsajhfaskjfhasfkjasfhf'),
(9, '1980839280', 'Si', 'RubÃ©ola,Anemia,Toxo', 'Si', 'Otros', 'No', 'A+', 'Natural', '23', 'No', 24.212, 20, 'No', 'ninguna'),
(10, '1782032093', 'Si', 'RubÃ©ola, Anemia, Toxoplasmosis, HipertensiÃ³n, Otras', 'Si', 'Otros', 'Si', 'O-', 'A tÃ©rmino', '25', 'Si', 31.2163, 22, 'Si', 'tuvo muchos problemas pero los supero de la siguiente manera: hsdkja sjkdhasd sihdak 231ksld s 1sd 1jkjs'),
(11, '1099840984', 'Si', 'Ninguna', 'Si', 'Oficio', 'No', 'B-', 'Natural', '30', 'No', 28.783, 12, 'No', 'Sin problemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE IF NOT EXISTS `auditoria` (
  `id` int(11) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `accion` varchar(50) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `fehr` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `auditoria`:
--   `admin`
--       `usuarios` -> `usuario`
--

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `admin`, `accion`, `referencia`, `fehr`) VALUES
(1, 'elysmata', 'Registro de Usuario', 'Ricardo Daniel Linares Garcia', '2015-08-18 13:08:35'),
(2, 'elysmata', 'Registro de Docente', 'Paloma Del Valle Quiroz Bragansa', '2015-08-18 13:32:33'),
(3, 'elysmata', 'Registro de Aula', 'Seccion:B | Grupo:1 | Turno:MaÃ±ana | Periodo:2015-2016', '2015-08-18 13:33:32'),
(4, 'elysmata', 'ActualizaciÃ³n de Usuario', 'Yadira Josefina Martinez Lopez', '2015-08-18 13:55:47'),
(5, 'elysmata', 'ActualizaciÃ³n de Usuario', 'Yadira Josefina Martinez Lopez', '2015-08-18 13:56:20'),
(6, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-18 14:08:04'),
(7, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-18 14:11:24'),
(8, 'robertica', 'IngresÃ³ al Sistema', 'Auxiliar', '2015-08-18 14:11:31'),
(9, 'robertica', 'SaliÃ³ del Sistema', 'Auxiliar', '2015-08-18 14:12:55'),
(10, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-18 14:13:04'),
(11, 'elysmata', 'ActualizaciÃ³n de Docente', 'Miguel Alejandro Morales PeÃ±a', '2015-08-18 14:27:30'),
(12, 'elysmata', 'ActualizaciÃ³n de Docente', 'Miguel Alejandro Morales PeÃ±a', '2015-08-18 14:27:40'),
(13, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-18 14:38:16'),
(14, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-18 17:14:34'),
(15, 'elysmata', 'Registro de Docente', 'Ana Paula Ramirez Torres', '2015-08-18 17:49:00'),
(17, 'elysmata', 'Registro de Docente', 'Elys Manuel Mata', '2015-08-18 18:19:44'),
(20, 'elysmata', 'EliminaciÃ³n de Docente', 'Paloma Del Valle Quiroz Bragansa', '2015-08-18 18:22:31'),
(21, 'elysmata', 'EliminaciÃ³n de Aula', '2', '2015-08-18 18:23:10'),
(22, 'elysmata', 'ActualizaciÃ³n de Usuario', 'Roberta Elina Rincon Juarez', '2015-08-18 18:40:08'),
(23, 'elysmata', 'EliminaciÃ³n de Usuario', 'roberticaupaupa', '2015-08-18 18:40:31'),
(24, 'elysmata', 'ActualizaciÃ³n de Usuario', 'Roberta Elina Rincon Juarez', '2015-08-18 18:40:47'),
(25, 'elysmata', 'EliminaciÃ³n de Usuario', 'yadira', '2015-08-18 18:40:53'),
(26, 'elysmata', 'EliminaciÃ³n de Usuario', 'yadira', '2015-08-18 18:41:11'),
(27, 'elysmata', 'EliminaciÃ³n de Usuario', 'robertica', '2015-08-18 18:41:19'),
(28, 'elysmata', 'EliminaciÃ³n de Usuario', 'ricardodaniel', '2015-08-18 18:41:21'),
(29, 'elysmata', 'EliminaciÃ³n de Usuario', 'yadira', '2015-08-18 18:41:25'),
(30, 'elysmata', 'EliminaciÃ³n de Usuario', 'robertica', '2015-08-18 18:42:06'),
(31, 'elysmata', 'EliminaciÃ³n de Usuario', 'ricardodaniel', '2015-08-18 18:42:08'),
(32, 'elysmata', 'EliminaciÃ³n de Usuario', 'yadira', '2015-08-18 18:42:12'),
(33, 'elysmata', 'EliminaciÃ³n de Usuario', 'robertica', '2015-08-18 18:42:15'),
(34, 'elysmata', 'Registro de Usuario', 'Yadira Josefina Martinez Lopez', '2015-08-18 18:43:43'),
(35, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-18 18:44:17'),
(36, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-18 19:05:41'),
(37, 'elysmata', 'EliminaciÃ³n de Docente', 'Miguel Alejandro Morales PeÃ±a', '2015-08-18 19:27:04'),
(38, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-18 19:27:45'),
(39, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-18 21:35:11'),
(40, 'elysmata', 'ActualizaciÃ³n de datos', 'Elys Manuel Mata', '2015-08-18 22:00:57'),
(41, 'elysmata', 'Cambio de Clave', ' ', '2015-08-18 22:37:31'),
(42, 'elysmata', 'Cambio de Clave', ' ', '2015-08-18 22:39:39'),
(43, 'elysmata', 'Cambio de Clave', 'Elys Manuel Mata', '2015-08-18 22:40:28'),
(44, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-18 22:50:54'),
(45, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-18 22:54:06'),
(46, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-18 23:02:32'),
(47, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-19 11:10:34'),
(48, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-19 11:13:25'),
(49, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-19 11:14:14'),
(50, 'elysmata', 'ActualizaciÃ³n de datos', 'Elys Manuel Mata', '2015-08-19 11:14:31'),
(51, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-19 11:14:36'),
(52, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-19 11:15:45'),
(53, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Alejandro Margarito Jimenez Rincon', '2015-08-19 22:16:52'),
(54, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Bernardo Daniel Lopez Gomez', '2015-08-19 22:36:42'),
(55, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Jeraldine Gabriela Montiel Ramirez', '2015-08-19 23:21:23'),
(56, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Enriqueta Maria Suarez Molina', '2015-08-19 23:40:06'),
(57, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-20 11:36:12'),
(58, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Elys Manuel Mata Astudillo', '2015-08-20 11:54:58'),
(59, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-20 12:46:27'),
(60, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-20 15:56:35'),
(61, 'elysmata', 'InscripciÃ³n de Alumno Regular', '1234567890', '2015-08-20 16:30:19'),
(62, 'elysmata', 'InscripciÃ³n de Alumno Regular', '1234567890', '2015-08-20 16:31:43'),
(63, 'elysmata', 'InscripciÃ³n de Alumno Regular', '1223441241', '2015-08-20 16:50:15'),
(64, 'elysmata', 'Registro de Aula', 'Seccion:C | Grupo:2 | Turno:Tarde | Periodo:2015-2016', '2015-08-20 16:53:16'),
(65, 'elysmata', 'InscripciÃ³n de Alumno Regular', 'C.E.: 1234567890', '2015-08-20 17:22:10'),
(66, 'elysmata', 'InscripciÃ³n de Alumno Regular', 'C.E.: 1234567890', '2015-08-20 18:20:57'),
(67, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Bruna Andreina Garcia Palomares', '2015-08-20 19:01:12'),
(68, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Arturo Roberto Fuentes Palmas', '2015-08-20 19:19:30'),
(69, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Lorenzo Manuel Montilla Dores', '2015-08-20 19:27:35'),
(70, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-20 19:30:54'),
(71, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-20 21:00:24'),
(72, 'elysmata', 'EliminaciÃ³n de Docente', 'Paloma Del Valle Quiroz Bragansa', '2015-08-20 21:00:35'),
(73, 'elysmata', 'EliminaciÃ³n de Docente', 'Miguel Alejandro Morales PeÃ±a', '2015-08-20 21:00:38'),
(74, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-21 00:19:34'),
(75, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-21 11:26:37'),
(76, 'elysmata', 'EliminaciÃ³n de Aula', 'SecciÃ³n:A Grupo:1 Turno:MaÃ±ana Periodo:2015-2016', '2015-08-21 11:27:09'),
(77, 'elysmata', 'EliminaciÃ³n de Aula', 'SecciÃ³n:C | Grupo:2 | Turno:Tarde | Periodo:2015-2016', '2015-08-21 11:28:02'),
(78, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-21 14:10:29'),
(79, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-21 14:29:09'),
(80, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-21 14:32:34'),
(81, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Maria Jose Araque Azocar', '2015-08-21 16:12:21'),
(82, 'elysmata', 'InscripciÃ³n de Alumno Regular', 'C.E.: 1980839280', '2015-08-21 17:16:42'),
(83, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'Pedro Miguel Rodriguez Pilar', '2015-08-21 18:31:35'),
(84, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-21 18:51:37'),
(85, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-21 18:51:44'),
(86, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-21 19:03:41'),
(87, 'yadira', 'IngresÃ³ al Sistema', 'Operador', '2015-08-21 19:03:47'),
(88, 'yadira', 'SaliÃ³ del Sistema', 'Operador', '2015-08-21 19:03:57'),
(89, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-21 19:04:09'),
(90, 'elysmata', 'Estado de Usuario', 'yadira fue Inhabilitado del sistema', '2015-08-21 19:04:37'),
(91, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-21 19:04:44'),
(92, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-21 19:05:15'),
(93, 'elysmata', 'Estado de Usuario', 'yadira fue Habilitado del sistema', '2015-08-21 19:05:22'),
(94, 'elysmata', 'EliminaciÃ³n de Alumno', 'Alejandro Margarito Jimenez Rincon', '2015-08-21 19:19:48'),
(95, 'elysmata', 'EliminaciÃ³n de Aula', 'SecciÃ³n:A | Grupo:1 | Turno:MaÃ±ana | Periodo:2015-2016', '2015-08-21 19:20:13'),
(98, 'elysmata', 'ActualizaciÃ³n de Alumno', 'Lorenzo Daniel Montilla Dores', '2015-08-21 21:04:38'),
(99, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-21 21:05:04'),
(100, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-26 12:49:30'),
(101, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-26 12:50:33'),
(102, 'robertica', 'IngresÃ³ al Sistema', 'Auxiliar', '2015-08-26 12:50:39'),
(103, 'robertica', 'SaliÃ³ del Sistema', 'Auxiliar', '2015-08-26 13:04:55'),
(104, 'yadira', 'IngresÃ³ al Sistema', 'Operador', '2015-08-26 13:05:02'),
(105, 'yadira', 'SaliÃ³ del Sistema', 'Operador', '2015-08-26 13:05:39'),
(106, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-26 13:05:45'),
(107, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-26 13:08:20'),
(108, 'yadira', 'IngresÃ³ al Sistema', 'Operador', '2015-08-26 13:08:29'),
(109, 'yadira', 'SaliÃ³ del Sistema', 'Operador', '2015-08-26 13:10:05'),
(110, 'robertica', 'IngresÃ³ al Sistema', 'Auxiliar', '2015-08-26 13:10:11'),
(111, 'robertica', 'SaliÃ³ del Sistema', 'Auxiliar', '2015-08-26 13:11:02'),
(112, 'yadira', 'IngresÃ³ al Sistema', 'Operador', '2015-08-26 13:11:10'),
(113, 'yadira', 'SaliÃ³ del Sistema', 'Operador', '2015-08-26 13:44:53'),
(114, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-26 13:44:59'),
(115, 'elysmata', 'Registro de Docente', 'Elena Camila Mijares Lopez', '2015-08-26 13:56:05'),
(116, 'elysmata', 'Registro de Docente', 'Bruno Jose Perez Avila', '2015-08-26 14:03:30'),
(117, 'elysmata', 'Registro de Aula', 'Seccion:A | Grupo:3 | Turno:MaÃ±ana | Periodo:2015-2016', '2015-08-26 14:10:45'),
(118, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-26 16:26:51'),
(119, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-26 22:16:25'),
(120, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-26 23:52:03'),
(121, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-27 11:59:07'),
(122, 'elysmata', 'ActualizaciÃ³n de Alumno', 'Arturo Roberto Fuentes Palmas', '2015-08-27 12:35:09'),
(123, 'elysmata', 'ActualizaciÃ³n de Alumno', 'Arturo Roberto Fuentes Palmas', '2015-08-27 12:35:54'),
(124, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-27 12:36:52'),
(125, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-27 17:09:50'),
(126, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-27 17:15:24'),
(127, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-08-27 23:30:06'),
(128, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-08-27 23:34:51'),
(129, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-14 22:12:27'),
(130, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-14 22:14:51'),
(131, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-14 23:05:18'),
(132, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-14 23:07:14'),
(133, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-14 23:28:33'),
(134, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-16 11:11:52'),
(135, 'elysmata', 'Registro de Aula', 'Seccion:A | Grupo:3 | Turno:MaÃ±ana | Periodo:2016-2015', '2015-09-17 21:37:09'),
(136, 'elysmata', 'EliminaciÃ³n de Aula', 'SecciÃ³n:A | Grupo:3 | Turno:MaÃ±ana | Periodo:2016-2015', '2015-09-17 21:39:34'),
(137, 'elysmata', 'Registro de Aula', 'Seccion:A | Grupo:3 | Turno:MaÃ±ana | Periodo:2016-2015', '2015-09-17 21:40:58'),
(138, 'elysmata', 'EliminaciÃ³n de Aula', 'SecciÃ³n:A | Grupo:3 | Turno:MaÃ±ana | Periodo:2016-2015', '2015-09-17 21:41:05'),
(139, 'elysmata', 'Registro de Aula', 'Seccion:C | Grupo:3 | Turno:MaÃ±ana | Periodo:2015-2016', '2015-09-17 21:42:09'),
(140, 'elysmata', 'Registro de Aula', 'Seccion:B | Grupo:1 | Turno:Tarde | Periodo:2016-2017', '2015-09-17 21:42:56'),
(141, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-17 23:46:07'),
(142, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-18 13:07:14'),
(143, 'elysmata', 'InscripciÃ³n de Alumno Nuevo', 'VÃ­ctor Jose Suarez Mata', '2015-09-18 13:21:46'),
(144, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-18 16:44:42'),
(145, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-18 22:05:01'),
(146, 'elysmata', 'InscripciÃ³n de Alumno Regular', 'C.E.: 1980839280', '2015-09-18 22:13:47'),
(147, 'elysmata', 'InscripciÃ³n de Alumno Regular', 'C.E.: 1980839280', '2015-09-18 22:16:01'),
(148, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-18 22:18:43'),
(149, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-19 14:55:23'),
(150, 'elysmata', 'InscripciÃ³n de Alumno Regular', 'C.E.: 3122431232', '2015-09-19 14:58:22'),
(151, 'elysmata', 'ActualizaciÃ³n de Alumno', 'Bernardo Daniel Lopez Gomez', '2015-09-19 15:18:45'),
(152, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-19 19:19:31'),
(153, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-09-19 20:14:14'),
(154, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-09-19 20:24:39'),
(155, 'elysmata', 'IngresÃ³ al Sistema', 'Administrador', '2015-10-10 23:16:03'),
(156, 'elysmata', 'SaliÃ³ del Sistema', 'Administrador', '2015-10-10 23:20:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `grupo` int(2) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `dct` int(11) NOT NULL,
  `desde` year(4) NOT NULL,
  `hasta` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `aulas`:
--   `dct`
--       `docentes` -> `id`
--

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `seccion`, `grupo`, `turno`, `dct`, `desde`, `hasta`) VALUES
(1, 'A', 1, 'MaÃ±ana', 1, 2015, 2016),
(5, 'B', 1, 'MaÃ±ana', 3, 2015, 2016),
(6, 'C', 2, 'Tarde', 3, 2015, 2016),
(7, 'A', 3, 'MaÃ±ana', 5, 2015, 2016),
(10, 'C', 3, 'MaÃ±ana', 4, 2015, 2016),
(11, 'B', 1, 'Tarde', 5, 2016, 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nac` varchar(1) NOT NULL,
  `tlf` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `docentes`:
--

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombres`, `apellidos`, `cedula`, `nac`, `tlf`) VALUES
(1, 'Miguel Alejandro', 'Morales PeÃ±a', '12345678', 'V', '02912345678'),
(3, 'Paloma Del Valle', 'Quiroz Bragansa', '26544770', 'V', '04141234567'),
(4, 'Elena Camila', 'Mijares Lopez', '11983198', 'V', '04128497498'),
(5, 'Bruno Jose', 'Perez Avila', '20373874', 'V', '02919897389');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergencia`
--

DROP TABLE IF EXISTS `emergencia`;
CREATE TABLE IF NOT EXISTS `emergencia` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tlf` varchar(11) NOT NULL,
  `parent` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `emergencia`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `emergencia`
--

INSERT INTO `emergencia` (`id`, `ced_alu`, `nombres`, `apellidos`, `tlf`, `parent`) VALUES
(2, '1223441241', 'Ricardo Daniel', 'Lopez Montiel', '02911234567', 'Otros'),
(3, '3122431232', 'Marlene Del Valle', 'Dunn Morales', '02919928293', 'Otros'),
(4, '2233343434', 'Leandro Jorge', 'Marcano Coentrao', '02912345678', 'TÃ­o'),
(5, '1022399930', 'Yudielis', 'Astudillo', '04121234567', 'Madre'),
(6, '1323823980', 'Emilia del Carmen', 'Martinez Lombardi', '02917128937', 'Otros'),
(7, '1653271987', 'Roberto Margarito', 'Lopez Camacho', '02919283287', 'Otros'),
(8, '2709830918', 'Ernesto', 'Villalba', '82381203103', 'Abuelo'),
(9, '1980839280', 'Jose Andres', 'Araque Azocar', '04268921732', 'Hermano'),
(10, '1782032093', 'Hector JosÃ©', 'Barbosa Dominguez', '02912837128', 'Otros'),
(11, '1099840984', 'Miguel Eduardo', 'Mata Lopez', '02912093021', 'Abuelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `aula` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `historial`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `ced_alu`, `aula`) VALUES
(1, '1099840984', 5),
(2, '1980839280', 5),
(3, '3122431232', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madres`
--

DROP TABLE IF EXISTS `madres`;
CREATE TABLE IF NOT EXISTS `madres` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nac` varchar(50) NOT NULL,
  `ec` varchar(20) NOT NULL,
  `tlf` varchar(11) NOT NULL,
  `ocp` varchar(50) NOT NULL,
  `ingreso` float NOT NULL,
  `dir` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `madres`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `madres`
--

INSERT INTO `madres` (`id`, `ced_alu`, `nombres`, `apellidos`, `cedula`, `nac`, `ec`, `tlf`, `ocp`, `ingreso`, `dir`, `email`) VALUES
(2, '1223441241', 'Maritza Andreina', 'Gomez Palacios', '1223124124', 'Mexicana', 'Concubinato', '02121234567', 'Bodeguera', 30000, 'hdkfhkdhfkhfkasjhskjhfaskj', 'mari@ejemplo.com'),
(3, '3122431232', 'Alina De Jesus', 'Ramirez Lares', '12345678', 'Venezolana', 'Divorciada', '02912345678', 'Ingeniera', 18000, 'hfshkdshgfkjshgdskhfsdkfhkjfhsdkfj', 'alina@mail.com'),
(4, '2233343434', 'Laura Del Carmen', 'Molina Otto', '138889002', 'Venezolana', 'Concubinato', '04123456789', 'Arquitecto', 45000, 'ssahksahdskajdaskhdjaskdhkasdhjkasdh', 'laura@ejemplo.com'),
(5, '1022399930', 'Yudielis', 'Astudillo', '12343435', 'Venezolana', 'Casada', '04121234567', 'Ingeniera', 15000, 'hhfkajfhksahfkashfhsakjfhskhfksahfskj', 'yudielis@ejemplo.com'),
(6, '1323823980', 'Josefina Del Valle', 'Palomares Villalba', 'V11445566', 'Venezolana', 'Divorciada', '04245549349', 'Comerciante', 20000, 'fhafhdfhdifbdsfjdnbsfkjfkshfkjshfkj', 'josefina@mail.com'),
(7, '1653271987', 'Maria Jose', 'Palmas Linares', 'V10992739', 'Venezolana', 'Casada', '04129828732', 'Ingeniera', 28000, 'hshasabdkjsad', 'maria@mail.com'),
(8, '2709830918', 'Manuela Ruperta', 'Dores Lobos', 'V18621836', 'Venezolana', 'Concubinato', '72791273812', 'dhkahdak', 29000, 'dshfkhfkdskfjdh', 'adjd@mail.com'),
(9, '1980839280', 'Elena Del Valle', 'Azocar Campos', 'V12982983', 'Venezolana', 'Divorciada', '04128273128', 'Comerciante', 26000, 'Av. Bolivar, Urb. Laguna Blanca Torre 1, Piso 7 Apartamento #9, Porlamar Edo. Nueva Esparta', 'elena@mail.com'),
(10, '1782032093', 'Micaela Margarita', 'Pilar Lopez', 'V12321213', 'Venezolana', 'Concubinato', '04121289128', 'Bachaquera', 23000, 'Av hajs Calle 1iuwe Casa #9201 cerda de isjdlsdj', 'mica@mail.com'),
(11, '1099840984', 'Maria Camila', 'Mata Gomez', 'V13356654', 'Venezolana', 'Casada', '04123839058', 'Ama de Casa', 0, 'dash skhdkjashd skjhdksah ashdk akjdh', 'maria@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

DROP TABLE IF EXISTS `padres`;
CREATE TABLE IF NOT EXISTS `padres` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nac` varchar(50) NOT NULL,
  `ec` varchar(20) NOT NULL,
  `tlf` varchar(11) NOT NULL,
  `ocp` varchar(50) NOT NULL,
  `ingreso` float NOT NULL,
  `dir` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `padres`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id`, `ced_alu`, `nombres`, `apellidos`, `cedula`, `nac`, `ec`, `tlf`, `ocp`, `ingreso`, `dir`, `email`) VALUES
(2, '1223441241', 'Roberto Jesus', 'Lopez Medina', '128294839', 'Cubano', 'Concubinato', '02911234567', 'MecÃ¡nico', 35000, 'hdskfhsafhkjfhskahfaskfhaskjfhakj', 'robert@mail.com'),
(3, '3122431232', 'Eduardo Jose', 'Montiel Gamarra', '12345678', 'Venezolano', 'Concubinato', '04161234565', 'Abogado', 34000, 'safhskfhaskfsafhsfkhakjshfaksjh', 'eduardo@ejemplo.com'),
(4, '2233343434', 'Enrique Jose', 'Suarez Marcano', '123334556', 'Venezolano', 'Concubinato', '04141234567', 'Doctor', 58000, 'sahskfshafksjfhskhfsakhfsakjfhsfsakfhkjashfjaskhf', 'enrique@ejemplo.com'),
(5, '1022399930', 'Elys Manuel', 'Mata', '12345678', 'Venezolano', 'Casado', '04141234567', 'Ingeniero', 15000, 'kskjfnakfkjsafsfasjfeiorewqutewioxz,m c', 'manuelmata777@gmail.com'),
(6, '1323823980', 'Bruno RamÃ³n', 'Garcia Bermudez', 'V14989812', 'Venezolano', 'Divorciado', '02911222329', 'Ingeniero', 24000, 'skhfaskjfhsakhfiuewyriewhmbsncb', 'bram@ejemplo.com'),
(7, '1653271987', 'Abel Joaquin', 'Fuentes Jimenez', 'V9223712', 'Venezolano', 'Casado', '04168327328', 'Ingeniero', 28000, 'ashskfhskjfhjksghfdsjhf', 'abel@ejemplo.com'),
(8, '2709830918', 'Jose Eduardo', 'Montilla Dumm', 'V12192828', 'Venezolano', 'Divorciado', '89381290381', 'shsdh', 28000, 'hshfkjfhkjfhsdkjfh', 'daj@mail.com'),
(9, '1980839280', 'Juan Jose', 'Araque Gomez', 'V8342364', 'Colombiano', 'Casado', '04247879127', 'Comerciante', 35000, 'Av. EspaÃ±a Urb. Campo claro, Casa #7, San Cristobal Edo. Tachira', 'juanjose@ejemplo.com'),
(10, '1782032093', 'Pedro Jose', 'Rodriguez Villar', 'V8376364', 'Venezolano', 'Casado', '04249840932', 'Bachaquero', 23000, 'Av. sjdaslkj Calle 2wewoi Edificio jfasldj Piso 3 Apto. 2 cerca de jwqeoi', 'pedro@ejemplo.com'),
(11, '1099840984', 'Pedro Jose', 'Suarez Linares', 'V119009280', 'Venezolano', 'Casado', '04142892398', 'Ingeniero', 20000, 'dash skhdkjashd skjhdksah ashdk akjdh', 'pedro@ejemplo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

DROP TABLE IF EXISTS `salud`;
CREATE TABLE IF NOT EXISTS `salud` (
  `id` int(11) NOT NULL,
  `ced_alu` varchar(10) NOT NULL,
  `hbl` int(2) NOT NULL,
  `cam` int(2) NOT NULL,
  `mano` varchar(20) NOT NULL,
  `cual` varchar(50) NOT NULL,
  `causa` varchar(100) NOT NULL,
  `control` varchar(2) NOT NULL,
  `vac` varchar(100) NOT NULL,
  `enf` varchar(100) NOT NULL,
  `gs` varchar(3) NOT NULL,
  `hosp` varchar(2) NOT NULL,
  `hcs` varchar(100) NOT NULL,
  `alg` varchar(2) NOT NULL,
  `acs` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `salud`:
--   `ced_alu`
--       `alumnos` -> `cedula`
--

--
-- Volcado de datos para la tabla `salud`
--

INSERT INTO `salud` (`id`, `ced_alu`, `hbl`, `cam`, `mano`, `cual`, `causa`, `control`, `vac`, `enf`, `gs`, `hosp`, `hcs`, `alg`, `acs`) VALUES
(2, '1223441241', 15, 8, 'Izquierda', 'Es pilisima', 'que se yo es un pila y punto', 'Si', 'SarampiÃ³n,RubÃ©ola,Influenza,Fiebre Amarilla', 'Lechina,Otras', 'AB+', 'No', 'shfkashfsakfhaskjfh', 'Si', 'hkdfhskhdsakjhdkashdjkablalbla'),
(3, '3122431232', 20, 10, 'Derecha', 'sdhadaskdha', 'sahdskdhskhdaskhdkas', 'Si', 'Hepatitis A,SarampiÃ³n,RubÃ©ola,Influenza', 'Meningitis,Paperas', 'O+', 'No', 'shjsalaskdjasldkjal', 'No', 'dhaskjdhasdhkasdhaskd'),
(4, '2233343434', 28, 10, 'Ambas', 'Aspeger', 'hsshaskhfskhskajfhaskjfhsakjfksjf', 'No', 'Ninguna', 'Ninguna', 'B+', 'Si', 'shskhaskhkasjhfkshkjashfaf', 'No', 'lasjdksajdlkjdklasjdlsajdkasdjlsdjlasjdl'),
(5, '1022399930', 16, 8, 'Derecha', 'No presenta', 'No presenta', 'Si', 'Hepatitis A,Influenza,Fiebre Amarilla', 'RubÃ©ola,Paperas', 'O-', 'Si', 'Paperas', 'No', 'nada'),
(6, '1323823980', 20, 9, 'Derecha', 'No', 'Para nada', 'Si', 'Hepatitis A,Influenza', 'RubÃ©ola', 'B+', 'Si', 'Rubeola', 'No', 'shflashfkhsfkjafh'),
(7, '1653271987', 23, 13, 'Izquierda', 'laksapaodo', 'shdsjdbsakfha', 'Si', 'SarampiÃ³n,Fiebre Amarilla', 'Otras', 'O+', 'No', 'hsahfkasfhklasfksahfkasjfkjash', 'Si', 'hsdhaskjdhasjdashdk'),
(8, '2709830918', 29, 11, 'Ambas', 'fasfaf', 'aasfasfasf', 'No', 'Hepatitis A,SarampiÃ³n,Fiebre Amarilla', 'Meningitis,Lechina,Paperas', 'B-', 'No', 'fsafasfsafsaf', 'No', 'sfasfasfafsafass'),
(9, '1980839280', 26, 11, 'Derecha', 'Ninguna', 'Ninguna', 'Si', 'Hepatitis A, Hepatitis B, SarampiÃ³n, RubÃ©ola, Influenza, Fiebre Amarilla', 'RubÃ©ola, Meningitis, Parotiditis, Lechina, Paperas, Otras', 'B+', 'Si', 'Demasiadas veces por el monton de enfermedades que ha padecido, es horrible :S', 'Si', 'Es alÃ©rgica a toda broma'),
(10, '1782032093', 20, 11, 'Ambas', 'No presenta', 'No tiene condiciones y escribo akjdkds sajdaj ksdjald 23 jd probando probando', 'No', 'Hepatitis A, Hepatitis B, SarampiÃ³n, RubÃ©ola, Influenza, Fiebre Amarilla', 'RubÃ©ola, Meningitis, Parotiditis, Lechina, Paperas, Otras', 'O-', 'Si', 'ha estado varias veces enfermo le ha dado de todo sdkj sdasd osdja 2321 skdj', 'Si', 'es alergico a todo, una de las cosas que le ha dado jdakl o isoi i2 lojran ii2 sdjsk'),
(11, '1099840984', 17, 8, 'Izquierda', 'Ninguna', 'Ninguna', 'Si', 'Hepatitis A, SarampiÃ³n, Influenza, Fiebre Amarilla', 'RubÃ©ola, Lechina', 'B-', 'No', 'No ha sido hospitalizado', 'Si', 'Pinturas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `preg` varchar(100) NOT NULL,
  `resp` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `usuario`, `clave`, `tipo`, `preg`, `resp`, `estado`) VALUES
(1, 'Elys Manuel', 'Mata', 'manuelmata777@gmail.com', 'elysmata', 'abc123', 'Administrador', 'Deporte o aficion preferida', 'Dios', 'Habilitado'),
(3, 'Roberta Elina', 'Rincon Juarez', 'roberta@mail.com', 'robertica', 'abc123', 'Auxiliar', 'Lugar donde viajo su primera vez', 'Miami', 'Habilitado'),
(5, 'Yadira Josefina', 'Martinez Lopez', 'yadira@mail.com', 'yadira', 'abc123', 'Operador', 'Nombre de tu mejor amigo', 'Miguel', 'Habilitado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `aula` (`aula`);

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`);

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`admin`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dct` (`dct`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emergencia`
--
ALTER TABLE `emergencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`,`aula`);

--
-- Indices de la tabla `madres`
--
ALTER TABLE `madres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`);

--
-- Indices de la tabla `salud`
--
ALTER TABLE `salud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ced_alu` (`ced_alu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `emergencia`
--
ALTER TABLE `emergencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `madres`
--
ALTER TABLE `madres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `salud`
--
ALTER TABLE `salud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`aula`) REFERENCES `aulas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD CONSTRAINT `antecedentes_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `usuarios` (`usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `aulas_ibfk_1` FOREIGN KEY (`dct`) REFERENCES `docentes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `emergencia`
--
ALTER TABLE `emergencia`
  ADD CONSTRAINT `emergencia_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `madres`
--
ALTER TABLE `madres`
  ADD CONSTRAINT `madres_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salud`
--
ALTER TABLE `salud`
  ADD CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`ced_alu`) REFERENCES `alumnos` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
