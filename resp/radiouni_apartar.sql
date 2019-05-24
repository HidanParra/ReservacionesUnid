-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2015 a las 07:23:21
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `radiouni_apartar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canones`
--

CREATE TABLE IF NOT EXISTS `canones` (
  `can_id` int(11) NOT NULL,
  `can_estatus` int(11) DEFAULT NULL,
  `can_marca` varchar(50) DEFAULT NULL,
  `can_modelo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canones`
--

INSERT INTO `canones` (`can_id`, `can_estatus`, `can_marca`, `can_modelo`) VALUES
(1, 1, 'sonyy', 'sony47'),
(2, 1, 'sony', 'sony47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `can_salidas`
--

CREATE TABLE IF NOT EXISTS `can_salidas` (
  `csl_id` int(11) NOT NULL,
  `can_id` int(11) DEFAULT NULL,
  `sal_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `can_salidas`
--

INSERT INTO `can_salidas` (`csl_id`, `can_id`, `sal_id`) VALUES
(4, 2, 4),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles educativos`
--

CREATE TABLE IF NOT EXISTS `niveles educativos` (
  `niv_id` int(11) NOT NULL,
  `niv_nombre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_usuario`
--

CREATE TABLE IF NOT EXISTS `niveles_usuario` (
  `nvu_id` int(11) NOT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `rsr_id` int(11) NOT NULL,
  `rsr_fecha` date DEFAULT NULL,
  `rsr_hora_inicio` varchar(255) DEFAULT NULL,
  `rsr_hora_termino` varchar(255) DEFAULT NULL,
  `rsr_estatus` int(11) DEFAULT NULL,
  `rsr_salon` varchar(255) DEFAULT NULL,
  `rsr_observaciones` varchar(300) DEFAULT NULL,
  `can_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `srv_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE IF NOT EXISTS `salidas` (
  `sal_id` int(11) NOT NULL,
  `sal_nombre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`sal_id`, `sal_nombre`) VALUES
(1, ''),
(2, 'dfgdfg'),
(3, 'hdmi'),
(4, 'vga'),
(5, ''),
(6, 'vga'),
(7, ''),
(8, 'asdasdsd'),
(9, 'aa'),
(10, 'hgh'),
(11, ''),
(12, 'asdasdsd'),
(13, 'bbbbb'),
(14, 'aaaaaaa'),
(15, 'eeee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `srv_id` int(11) NOT NULL,
  `srv_nombre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`srv_id`, `srv_nombre`) VALUES
(1, 'Proyectores'),
(2, 'Auditorio'),
(3, 'asda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_adicionales`
--

CREATE TABLE IF NOT EXISTS `servicios_adicionales` (
  `sra_id` int(11) NOT NULL,
  `sra_nombre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usr_id` int(11) NOT NULL,
  `usr_matricula` text,
  `usr_correo` varchar(255) DEFAULT NULL,
  `usr_nombre` varchar(255) DEFAULT NULL,
  `usr_telefono` text,
  `usr_password` varchar(200) DEFAULT NULL,
  `usr_estatus` int(1) DEFAULT NULL,
  `usr_nivel` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usr_id`, `usr_matricula`, `usr_correo`, `usr_nombre`, `usr_telefono`, `usr_password`, `usr_estatus`, `usr_nivel`) VALUES
(1, '00104801x', 'abraham.opp@gmail.com', 'Abraham Pechx', '9981448350', '123456', 0, 2),
(6, '111111', 'gerardomay@live.com', 'gerardo', '91929123', 'ppsspp', 1, 1),
(5, '00120502', 'diego@diego.com', 'diego', '9999999999', '123456', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canones`
--
ALTER TABLE `canones`
  ADD PRIMARY KEY (`can_id`);

--
-- Indices de la tabla `can_salidas`
--
ALTER TABLE `can_salidas`
  ADD PRIMARY KEY (`csl_id`);

--
-- Indices de la tabla `niveles educativos`
--
ALTER TABLE `niveles educativos`
  ADD PRIMARY KEY (`niv_id`);

--
-- Indices de la tabla `niveles_usuario`
--
ALTER TABLE `niveles_usuario`
  ADD PRIMARY KEY (`nvu_id`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`rsr_id`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`srv_id`);

--
-- Indices de la tabla `servicios_adicionales`
--
ALTER TABLE `servicios_adicionales`
  ADD PRIMARY KEY (`sra_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canones`
--
ALTER TABLE `canones`
  MODIFY `can_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `can_salidas`
--
ALTER TABLE `can_salidas`
  MODIFY `csl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `niveles educativos`
--
ALTER TABLE `niveles educativos`
  MODIFY `niv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `niveles_usuario`
--
ALTER TABLE `niveles_usuario`
  MODIFY `nvu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `rsr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `srv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `servicios_adicionales`
--
ALTER TABLE `servicios_adicionales`
  MODIFY `sra_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
