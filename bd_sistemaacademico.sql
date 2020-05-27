-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2020 a las 23:03:06
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistemaacademico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumno`
--

CREATE TABLE `talumno` (
  `CodAlumno` char(6) NOT NULL,
  `NombreAlumno` varchar(20) NOT NULL,
  `ApellidoPaternoAlumno` varchar(20) NOT NULL,
  `ApellidoMaternoAlumno` varchar(20) NOT NULL,
  `DNIAlumno` decimal(8,0) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `DireccionAlumno` varchar(45) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `TelefonoAlumno` char(10) DEFAULT NULL,
  `EstadoAlumno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talumno`
--

INSERT INTO `talumno` (`CodAlumno`, `NombreAlumno`, `ApellidoPaternoAlumno`, `ApellidoMaternoAlumno`, `DNIAlumno`, `FechaNacimiento`, `DireccionAlumno`, `Sexo`, `TelefonoAlumno`, `EstadoAlumno`) VALUES
('051005', 'Javier', 'Paredes', 'Montes', '47556211', NULL, 'Jr. Lima 458', 'M', '', 'Egresado'),
('051010', 'Marco', 'Aguilar', 'Estrada', '46556215', NULL, 'Av. Peru 458', 'M', '', 'Egresado'),
('052001', 'Olivia', 'Trujillo', 'Casas', '48456212', NULL, 'Jr. Lima 450', 'F', '', 'Egresado'),
('091001', 'Anyinson Cristofer', 'Acharte', 'Quispe', '32496210', NULL, 'Jr. Lima 420', 'M', '', 'Egresado'),
('091002', 'Jessica', 'Blanco', 'Cordova', '32459213', NULL, 'Jr. Lima 430', 'F', '', 'Egresado'),
('091003', 'Axel Andree', 'Caceres', 'Cansaya', '32956215', NULL, 'Jr. Puno 320', 'M', '', 'Egresado'),
('092001', 'Marbeli', 'Gutierrez', 'Franco', '32486245', NULL, 'Jr. Junin 320', 'F', '', 'Regular'),
('092002', 'Margot', 'Huayta', 'Patiño', '38456255', NULL, 'Jr. Lima 123', 'F', '', 'Regular'),
('101001', 'Julian', 'Abarca', 'Ezequilla', '32486298', NULL, 'Jr. Lima 850', 'M', '', 'Regular'),
('101002', 'Yuri', 'Argamonte', 'Huamani', '21536212', NULL, 'Jr. Lima 420', 'M', '', 'Regular'),
('111005', 'Veronica', 'Palomino', 'Montalvo', '35556212', NULL, 'Av. Peru 436', 'F', '', 'Regular'),
('111036', 'Yalu', 'Garay', 'Santos', '32456120', NULL, 'Av. Peru 480', 'M', '', 'Regular'),
('112046', 'Olga Zarepta', 'Cuchillo', 'Caytuiro', '32356222', NULL, 'Av. Arequipa 40', 'F', '', 'Regular'),
('112047', 'Jose', 'Hurtado', 'Casaverde', '32456262', NULL, 'Av. Peru 420', 'M', '', 'Regular'),
('121001', 'Jaime', 'Ojeda', 'Arriaga', '26566212', NULL, 'Jr. Lima 120', 'M', '', 'Ingresante'),
('141010', 'Luz', 'Vilca', 'Calvo', '26002136', NULL, 'Jr. Lima 120', 'M', '', 'Regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignatura`
--

CREATE TABLE `tasignatura` (
  `CodAsignatura` char(5) NOT NULL,
  `NomAsignatura` varchar(50) NOT NULL,
  `NumeroCreditos` smallint(6) NOT NULL,
  `HorasTeoricas` smallint(6) NOT NULL,
  `HorasPractica` smallint(6) NOT NULL,
  `HorasLaboratorio` smallint(6) NOT NULL,
  `CategoriaAsignatura` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasignatura`
--

INSERT INTO `tasignatura` (`CodAsignatura`, `NomAsignatura`, `NumeroCreditos`, `HorasTeoricas`, `HorasPractica`, `HorasLaboratorio`, `CategoriaAsignatura`) VALUES
('IS101', 'Introducción a la Informática y Sistemas', 4, 3, 0, 2, 'AFPO'),
('IS102', 'Matemática Discreta I', 4, 3, 2, 0, 'AFPB'),
('IS103', 'Matemáticas Básicas', 4, 3, 2, 0, 'AFG'),
('IS201', 'Algoritmica I', 5, 3, 0, 4, 'AFPO'),
('IS202', 'Matemática Discreta II', 4, 3, 2, 0, 'AFPB'),
('IS203', 'Geometría Analítica', 4, 3, 2, 0, 'AFG'),
('IS301', 'Algotitmica II', 5, 3, 0, 4, 'AFPO'),
('IS302', 'Sistemas Operativos', 4, 3, 0, 2, 'AFPO'),
('IS303', 'Calculo I', 4, 3, 2, 0, 'AFPB'),
('IS401', 'Algoritmica III', 5, 3, 0, 4, 'AFPO'),
('IS402', 'Base de Datos I', 4, 3, 0, 2, 'AFPO'),
('IS405', 'Calculo II', 4, 3, 2, 0, 'AFPB'),
('IS501', 'Taller de Programación I', 2, 0, 2, 2, 'AFPO'),
('IS502', 'Base de Datos II', 4, 3, 0, 2, 'AFPO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasignaturaprogramada`
--

CREATE TABLE `tasignaturaprogramada` (
  `IDAsignaturaProgramada` int(11) NOT NULL,
  `CodAsignatura` char(5) NOT NULL,
  `CodSemestre` char(6) NOT NULL,
  `CodDocente` decimal(6,0) NOT NULL,
  `CodEscuelaProfesional` char(3) NOT NULL,
  `Observacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasignaturaprogramada`
--

INSERT INTO `tasignaturaprogramada` (`IDAsignaturaProgramada`, `CodAsignatura`, `CodSemestre`, `CodDocente`, `CodEscuelaProfesional`, `Observacion`) VALUES
(1, 'IS101', '2014-2', '10802', 'IIS', ''),
(2, 'IS102', '2014-2', '10803', 'IIS', ''),
(3, 'IS103', '2014-2', '10803', 'IIS', ''),
(4, 'IS101', '2015-1', '10802', 'IIS', ''),
(5, 'IS102', '2015-1', '10808', 'IIS', ''),
(6, 'IS103', '2015-1', '10808', 'IIS', ''),
(7, 'IS201', '2015-1', '10801', 'IIS', ''),
(8, 'IS202', '2015-1', '10808', 'IIS', ''),
(9, 'IS203', '2015-1', '10803', 'IIS', ''),
(10, 'IS101', '2015-2', '10802', 'IIS', ''),
(11, 'IS102', '2015-2', '10808', 'IIS', ''),
(12, 'IS103', '2015-2', '10802', 'IIS', ''),
(13, 'IS201', '2015-2', '10801', 'IIS', ''),
(14, 'IS202', '2015-2', '10806', 'IIS', ''),
(15, 'IS203', '2015-2', '10808', 'IIS', ''),
(16, 'IS301', '2015-2', '10804', 'IIS', ''),
(17, 'IS302', '2015-2', '10805', 'IIS', ''),
(18, 'IS303', '2015-2', '10808', 'IIS', ''),
(19, 'IS303', '2016-1', '10808', 'IIS', ''),
(20, 'IS101', '2016-1', '10802', 'IIS', ''),
(21, 'IS102', '2016-1', '10808', 'IIS', ''),
(22, 'IS103', '2016-1', '10802', 'IIS', ''),
(23, 'IS201', '2016-1', '10801', 'IIS', ''),
(24, 'IS202', '2016-1', '10806', 'IIS', ''),
(25, 'IS203', '2016-1', '10808', 'IIS', ''),
(26, 'IS301', '2016-1', '10804', 'IIS', ''),
(27, 'IS302', '2016-1', '10805', 'IIS', ''),
(28, 'IS303', '2016-1', '10808', 'IIS', ''),
(29, 'IS401', '2016-1', '10802', 'IIS', ''),
(30, 'IS402', '2016-1', '10808', 'IIS', ''),
(31, 'IS103', '2016-2', '10802', 'IIS', ''),
(32, 'IS201', '2016-2', '10801', 'IIS', ''),
(33, 'IS202', '2016-2', '10806', 'IIS', ''),
(34, 'IS203', '2016-2', '10808', 'IIS', ''),
(35, 'IS301', '2016-2', '10804', 'IIS', ''),
(36, 'IS302', '2016-2', '10805', 'IIS', ''),
(37, 'IS303', '2016-2', '10808', 'IIS', ''),
(38, 'IS302', '2016-2', '10805', 'IIS', ''),
(39, 'IS303', '2016-2', '10808', 'IIS', ''),
(40, 'IS401', '2016-2', '10805', 'IIS', ''),
(41, 'IS402', '2016-2', '10808', 'IIS', ''),
(42, 'IS501', '2016-2', '10805', 'IIS', ''),
(43, 'IS502', '2016-2', '10808', 'IIS', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdetallematricula`
--

CREATE TABLE `tdetallematricula` (
  `IDMatricula` int(11) NOT NULL,
  `IDAsignaturaProgramada` int(11) NOT NULL,
  `FechaActas` date DEFAULT NULL,
  `Nota` char(3) DEFAULT NULL,
  `observacion` char(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdetallematricula`
--

INSERT INTO `tdetallematricula` (`IDMatricula`, `IDAsignaturaProgramada`, `FechaActas`, `Nota`, `observacion`) VALUES
(1, 1, NULL, '10', ''),
(1, 2, NULL, '13', ''),
(1, 3, NULL, '13', ''),
(2, 1, NULL, '15', ''),
(2, 2, NULL, '9', ''),
(2, 3, NULL, '13', ''),
(3, 4, NULL, '12', ''),
(3, 8, NULL, '12', ''),
(3, 9, NULL, '10', ''),
(4, 5, NULL, '13', ''),
(4, 7, NULL, '12', ''),
(4, 9, NULL, '13', ''),
(5, 4, NULL, '13', ''),
(5, 5, NULL, '15', ''),
(5, 6, NULL, '14', ''),
(6, 4, NULL, '12', ''),
(6, 5, NULL, '15', ''),
(6, 6, NULL, '5', ''),
(11, 18, NULL, '5', ''),
(11, 19, NULL, '10', ''),
(11, 30, NULL, '10', ''),
(12, 35, NULL, '10', ''),
(12, 40, NULL, '12', ''),
(12, 41, NULL, '13', ''),
(12, 42, NULL, '14', ''),
(13, 30, NULL, '10', ''),
(14, 35, NULL, '10', ''),
(14, 40, NULL, '12', ''),
(14, 42, NULL, '14', ''),
(15, 30, NULL, '13', ''),
(16, 41, NULL, '11', ''),
(16, 42, NULL, '14', ''),
(16, 43, NULL, '13', ''),
(17, 31, NULL, '11', ''),
(17, 32, NULL, '13', ''),
(17, 33, NULL, '14', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdocente`
--

CREATE TABLE `tdocente` (
  `CodDocente` decimal(6,0) NOT NULL,
  `CodEscuelaProfesional` char(3) NOT NULL,
  `NomDocente` varchar(20) NOT NULL,
  `ApellidoPaternoDocente` varchar(20) NOT NULL,
  `ApellidoMaternoDocente` varchar(20) NOT NULL,
  `DireccionDocente` varchar(45) DEFAULT NULL,
  `TelefonoDocente` char(10) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `DNIDocente` decimal(8,0) NOT NULL,
  `CategoriaDocente` varchar(12) NOT NULL,
  `CondicionDocente` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tdocente`
--

INSERT INTO `tdocente` (`CodDocente`, `CodEscuelaProfesional`, `NomDocente`, `ApellidoPaternoDocente`, `ApellidoMaternoDocente`, `DireccionDocente`, `TelefonoDocente`, `Sexo`, `FechaNacimiento`, `DNIDocente`, `CategoriaDocente`, `CondicionDocente`) VALUES
('10801', 'IIS', 'Jorge', 'Serrano', 'Quispe', '', '', 'M', NULL, '23421563', 'Auxiliar', 'C'),
('10802', 'IIS', 'Jose Luis', 'Merma', 'Aroni', '', '', 'M', NULL, '23789456', 'Asociado', 'N'),
('10803', 'IIS', 'Wilber', 'Colque', 'Candia', '', '', 'M', NULL, '23894561', 'Auxiliar', 'C'),
('10804', 'IIS', 'Evelyn', 'Luque', 'Ochoa', '', '', 'F', NULL, '46892310', 'Auxiliar', 'N'),
('10805', 'IIS', 'Erech', 'Ordoñez', 'Ramos', '', '', 'M', NULL, '496385', 'Auxiliar', 'N'),
('10806', 'IM', 'Shermila', 'Santos', 'Guerra', '', '', 'F', NULL, '45612378', 'Asociado', 'N'),
('10807', 'IM', 'Jhon', 'Zegarra', 'Sierra', '', '', 'M', NULL, '78945612', 'Asociado', 'C'),
('10808', 'IAG', 'Rosa', 'Marrufo', 'Ludeña', '', '', 'F', NULL, '23964521', 'Principal', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tescuelaprofesional`
--

CREATE TABLE `tescuelaprofesional` (
  `CodEscuelaProfesional` char(3) NOT NULL,
  `NomEscuelaProfesional` varchar(45) NOT NULL,
  `Observación` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tescuelaprofesional`
--

INSERT INTO `tescuelaprofesional` (`CodEscuelaProfesional`, `NomEscuelaProfesional`, `Observación`) VALUES
('IAG', 'Ingeniería Agroindustrial', ''),
('IC', 'Ingeniería Civil', ''),
('IiS', 'Ingeniería Informática y Sistemas', ''),
('IM', 'Ingeniería de Minas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmatricula`
--

CREATE TABLE `tmatricula` (
  `IDMatricula` int(11) NOT NULL,
  `CodAlumno` char(6) NOT NULL,
  `CodEscuelaProfesional` char(3) NOT NULL,
  `CodSemestre` char(6) NOT NULL,
  `FechaMatricula` date DEFAULT NULL,
  `TotalCreditos` smallint(6) NOT NULL,
  `Observacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmatricula`
--

INSERT INTO `tmatricula` (`IDMatricula`, `CodAlumno`, `CodEscuelaProfesional`, `CodSemestre`, `FechaMatricula`, `TotalCreditos`, `Observacion`) VALUES
(1, '091001', 'IIS', '2014-2', '2014-08-14', 12, ''),
(2, '091002', 'IIS', '2014-2', '2014-08-14', 12, ''),
(3, '091001', 'IIS', '2015-1', '2015-05-15', 12, ''),
(4, '091002', 'IIS', '2015-1', '2015-05-15', 12, ''),
(5, '092001', 'IIS', '2015-1', '2015-05-15', 12, ''),
(6, '092002', 'IIS', '2015-1', '2015-05-15', 12, ''),
(7, '091001', 'IIS', '2015-2', '2015-09-02', 0, ''),
(8, '092001', 'IIS', '2015-2', '2015-09-02', 0, ''),
(9, '101001', 'IIS', '2015-2', '2015-09-02', 0, ''),
(10, '101002', 'IIS', '2015-2', '2015-09-02', 0, ''),
(11, '092001', 'IIS', '2016-1', '2016-04-03', 0, ''),
(12, '092001', 'IIS', '2016-2', '2016-09-02', 0, ''),
(13, '091001', 'IIS', '2016-1', '2016-04-03', 12, ''),
(14, '091001', 'IIS', '2016-2', '2016-09-02', 12, ''),
(15, '101002', 'IIS', '2016-1', '2016-04-03', 8, ''),
(16, '101002', 'IIS', '2016-2', '2016-09-02', 8, ''),
(17, '121001', 'IIS', '2016-2', '2016-09-02', 8, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trequisito`
--

CREATE TABLE `trequisito` (
  `CodAsignatura` char(5) NOT NULL,
  `CodRequisito` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsemestre`
--

CREATE TABLE `tsemestre` (
  `CodSemestre` char(6) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaTermino` date DEFAULT NULL,
  `Observacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsemestre`
--

INSERT INTO `tsemestre` (`CodSemestre`, `FechaInicio`, `FechaTermino`, `Observacion`) VALUES
('2014-1', '2014-04-04', '2014-08-30', 'Res.Rectoral Nº056-2014'),
('2014-2', '2014-08-31', '2014-12-24', 'Res.Rectoral Nº238-2014'),
('2015-1', '2014-04-15', '2014-08-15', 'Res.Rectoral Nº040-2015'),
('2015-2', '2015-08-15', '2015-12-25', 'Res.Rectoral Nº129-2015'),
('2016-1', '2016-04-04', '2016-08-30', 'Res.Rectoral Nº109-2016'),
('2016-2', '2016-09-01', '2016-12-26', 'Res.Rectoral Nº209-2016'),
('2017-1', '2017-04-07', '2017-07-31', 'Res.Rectoral Nº206-2017'),
('2017-2', '2017-09-02', '2017-12-31', 'Res.Rectoral Nº336-2017');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD PRIMARY KEY (`CodAlumno`);

--
-- Indices de la tabla `tasignatura`
--
ALTER TABLE `tasignatura`
  ADD PRIMARY KEY (`CodAsignatura`);

--
-- Indices de la tabla `tasignaturaprogramada`
--
ALTER TABLE `tasignaturaprogramada`
  ADD PRIMARY KEY (`IDAsignaturaProgramada`),
  ADD KEY `CodAsignatura` (`CodAsignatura`),
  ADD KEY `CodSemestre` (`CodSemestre`),
  ADD KEY `CodDocente` (`CodDocente`),
  ADD KEY `CodEscuelaProfesional` (`CodEscuelaProfesional`);

--
-- Indices de la tabla `tdetallematricula`
--
ALTER TABLE `tdetallematricula`
  ADD PRIMARY KEY (`IDMatricula`,`IDAsignaturaProgramada`),
  ADD KEY `IDAsignaturaProgramada` (`IDAsignaturaProgramada`);

--
-- Indices de la tabla `tdocente`
--
ALTER TABLE `tdocente`
  ADD PRIMARY KEY (`CodDocente`),
  ADD KEY `CodEscuelaProfesional` (`CodEscuelaProfesional`);

--
-- Indices de la tabla `tescuelaprofesional`
--
ALTER TABLE `tescuelaprofesional`
  ADD PRIMARY KEY (`CodEscuelaProfesional`);

--
-- Indices de la tabla `tmatricula`
--
ALTER TABLE `tmatricula`
  ADD PRIMARY KEY (`IDMatricula`),
  ADD KEY `CodAlumno` (`CodAlumno`),
  ADD KEY `CodEscuelaProfesional` (`CodEscuelaProfesional`),
  ADD KEY `CodSemestre` (`CodSemestre`);

--
-- Indices de la tabla `trequisito`
--
ALTER TABLE `trequisito`
  ADD PRIMARY KEY (`CodAsignatura`,`CodRequisito`);

--
-- Indices de la tabla `tsemestre`
--
ALTER TABLE `tsemestre`
  ADD PRIMARY KEY (`CodSemestre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasignaturaprogramada`
--
ALTER TABLE `tasignaturaprogramada`
  ADD CONSTRAINT `tasignaturaprogramada_ibfk_1` FOREIGN KEY (`CodAsignatura`) REFERENCES `tasignatura` (`CodAsignatura`),
  ADD CONSTRAINT `tasignaturaprogramada_ibfk_2` FOREIGN KEY (`CodSemestre`) REFERENCES `tsemestre` (`CodSemestre`),
  ADD CONSTRAINT `tasignaturaprogramada_ibfk_3` FOREIGN KEY (`CodDocente`) REFERENCES `tdocente` (`CodDocente`),
  ADD CONSTRAINT `tasignaturaprogramada_ibfk_4` FOREIGN KEY (`CodEscuelaProfesional`) REFERENCES `tescuelaprofesional` (`CodEscuelaProfesional`);

--
-- Filtros para la tabla `tdetallematricula`
--
ALTER TABLE `tdetallematricula`
  ADD CONSTRAINT `tdetallematricula_ibfk_1` FOREIGN KEY (`IDAsignaturaProgramada`) REFERENCES `tasignaturaprogramada` (`IDAsignaturaProgramada`),
  ADD CONSTRAINT `tdetallematricula_ibfk_2` FOREIGN KEY (`IDMatricula`) REFERENCES `tmatricula` (`IDMatricula`);

--
-- Filtros para la tabla `tdocente`
--
ALTER TABLE `tdocente`
  ADD CONSTRAINT `tdocente_ibfk_1` FOREIGN KEY (`CodEscuelaProfesional`) REFERENCES `tescuelaprofesional` (`CodEscuelaProfesional`);

--
-- Filtros para la tabla `tmatricula`
--
ALTER TABLE `tmatricula`
  ADD CONSTRAINT `tmatricula_ibfk_1` FOREIGN KEY (`CodAlumno`) REFERENCES `talumno` (`CodAlumno`),
  ADD CONSTRAINT `tmatricula_ibfk_2` FOREIGN KEY (`CodEscuelaProfesional`) REFERENCES `tescuelaprofesional` (`CodEscuelaProfesional`),
  ADD CONSTRAINT `tmatricula_ibfk_3` FOREIGN KEY (`CodSemestre`) REFERENCES `tsemestre` (`CodSemestre`);

--
-- Filtros para la tabla `trequisito`
--
ALTER TABLE `trequisito`
  ADD CONSTRAINT `trequisito_ibfk_1` FOREIGN KEY (`CodAsignatura`) REFERENCES `tasignatura` (`CodAsignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
