-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-07-2022 a las 14:43:31
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `RetoMunicipal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuentros`
--

CREATE TABLE `encuentros` (
  `Id` int(11) NOT NULL,
  `CodRonda` varchar(1) NOT NULL DEFAULT '',
  `Ganador` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Equipo1` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Equipo2` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Equipo3` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Equipo4` int(11) NOT NULL,
  `Estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `pk_num_equipo` int(11) NOT NULL,
  `ind_nombre_equipo` varchar(100) NOT NULL DEFAULT '',
  `num_estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica`
--

CREATE TABLE `estadistica` (
  `CodRonda` varchar(1) NOT NULL DEFAULT '',
  `Encuentro` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Equipo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `FlagGano` varchar(1) NOT NULL DEFAULT '',
  `Puntos` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Equipo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Pregunta` int(10) UNSIGNED NOT NULL,
  `Encuentro` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `FlagAcierto` int(11) DEFAULT NULL,
  `FlagValido` int(11) DEFAULT NULL,
  `Respuesta` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `Parametro` varchar(10) NOT NULL DEFAULT '',
  `Descripcion` varchar(100) NOT NULL DEFAULT '',
  `Valor` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`Parametro`, `Descripcion`, `Valor`) VALUES
('RONDA1', 'ELIMINATORIA', '5'),
('RONDA2', 'SEMI-FINAL', '5'),
('RONDA3', 'FINAL', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Pregunta` longtext NOT NULL,
  `OpcionA` longtext NOT NULL,
  `OpcionB` longtext NOT NULL,
  `OpcionC` longtext NOT NULL,
  `OpcionD` longtext NOT NULL,
  `Respuesta` varchar(1) NOT NULL DEFAULT '',
  `Puntos` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `Ronda` varchar(1) NOT NULL DEFAULT '',
  `Estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `CodRonda` varchar(1) NOT NULL DEFAULT '',
  `IdEncuentro` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Puntos1` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Puntos2` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Puntos3` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rondas`
--

CREATE TABLE `rondas` (
  `CodRonda` varchar(1) NOT NULL DEFAULT '',
  `Ronda` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `CodRonda` varchar(1) NOT NULL DEFAULT '',
  `Encuentro` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Turno` varchar(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `IdEquipo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `CodRonda` varchar(1) NOT NULL DEFAULT '',
  `Encuentro` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `CantTurnos` int(11) DEFAULT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuentros`
--
ALTER TABLE `encuentros`
  ADD PRIMARY KEY (`Id`,`Ganador`,`CodRonda`) USING BTREE;

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`pk_num_equipo`) USING BTREE;

--
-- Indices de la tabla `estadistica`
--
ALTER TABLE `estadistica`
  ADD PRIMARY KEY (`CodRonda`,`Encuentro`,`Equipo`) USING BTREE;

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD UNIQUE KEY `historial_uk_2` (`Equipo`,`Pregunta`,`Encuentro`) USING BTREE;

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`Parametro`) USING BTREE;

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`Id`,`IdEncuentro`,`CodRonda`) USING BTREE;

--
-- Indices de la tabla `rondas`
--
ALTER TABLE `rondas`
  ADD PRIMARY KEY (`CodRonda`) USING BTREE;

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`CodRonda`,`Encuentro`,`Turno`) USING BTREE;

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuentros`
--
ALTER TABLE `encuentros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `pk_num_equipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
