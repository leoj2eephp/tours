-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2014 a las 07:11:32
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tours`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrivo_cjc`
--

CREATE TABLE IF NOT EXISTS `arrivo_cjc` (
`id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_vuelo` time DEFAULT NULL,
  `num_vuelo` varchar(40) DEFAULT NULL,
  `linea_aerea_id` int(11) NOT NULL,
  `hora_pickup` time DEFAULT NULL,
  `idioma_id` int(11) NOT NULL,
  `detalle_servicio_id` int(11) NOT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asunto`
--

CREATE TABLE IF NOT EXISTS `asunto` (
`id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asunto`
--

INSERT INTO `asunto` (`id`, `descripcion`) VALUES
(1, 'COTIZACION'),
(2, 'CONFIRMACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
`id` int(11) NOT NULL,
  `cotizante_id` int(11) NOT NULL,
  `moneda_id` int(11) NOT NULL,
  `asunto_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_pasajero` varchar(200) NOT NULL,
  `numero_pax` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `arrivo_cjc_id` int(11) DEFAULT NULL,
  `salida_cjc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizante`
--

CREATE TABLE IF NOT EXISTS `cotizante` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `pais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_servicio`
--

CREATE TABLE IF NOT EXISTS `detalle_servicio` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_servicio`
--

INSERT INTO `detalle_servicio` (`id`, `nombre`) VALUES
(1, 'Solo Guía'),
(2, 'Solo Chofer'),
(3, 'Guía + Chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excursion`
--

CREATE TABLE IF NOT EXISTS `excursion` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo_excursion_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra`
--

CREATE TABLE IF NOT EXISTS `extra` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `extra`
--

INSERT INTO `extra` (`id`, `nombre`) VALUES
(1, 'Aguas'),
(2, 'Almuerzo'),
(3, 'Aperitivo'),
(4, 'Once'),
(5, 'Cena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_arrivo`
--

CREATE TABLE IF NOT EXISTS `extra_arrivo` (
  `extra_id` int(11) NOT NULL,
  `arrivo_cjc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_salida`
--

CREATE TABLE IF NOT EXISTS `extra_salida` (
  `extra_id` int(11) NOT NULL,
  `salida_cjc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra_servicio`
--

CREATE TABLE IF NOT EXISTS `extra_servicio` (
  `servicio_id` int(11) NOT NULL,
  `extra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id`, `nombre`) VALUES
(1, 'Hotel Puyehue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`id`, `nombre`) VALUES
(1, 'Español'),
(2, 'Inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
`id` int(11) NOT NULL,
  `ruta_imagen` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_excursion`
--

CREATE TABLE IF NOT EXISTS `imagen_excursion` (
  `imagen_id` int(11) NOT NULL,
  `excursion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_aerea`
--

CREATE TABLE IF NOT EXISTS `linea_aerea` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_aerea`
--

INSERT INTO `linea_aerea` (`id`, `nombre`) VALUES
(1, 'LAN'),
(2, 'SKY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `nombre`, `tipo_servicio_id`) VALUES
(1, 'Valle De La Muerte', 2),
(2, 'Catarpe', 2),
(3, 'Valle De La Muerte', 1),
(4, 'Valle De La Luna', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE IF NOT EXISTS `moneda` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `conversion_dolar` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `nombre`, `conversion_dolar`) VALUES
(1, 'Peso Chileno', NULL),
(2, 'Dólar', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `nacionalidad` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `nacionalidad`) VALUES
(1, 'Chile', 'chileno'),
(2, 'Alemania', 'alemán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE IF NOT EXISTS `pasajero` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `pais_id` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `pasaporte` varchar(30) NOT NULL,
  `observaciones` text,
  `cotizacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_cjc`
--

CREATE TABLE IF NOT EXISTS `salida_cjc` (
`id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_vuelo` time DEFAULT NULL,
  `num_vuelo` varchar(40) DEFAULT NULL,
  `linea_aerea_id` int(11) NOT NULL,
  `hora_pickup` time DEFAULT NULL,
  `idioma_id` int(11) NOT NULL,
  `detalle_servicio_id` int(11) NOT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
`id` int(11) NOT NULL,
  `cotizacion_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia_semana` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `n_personas` int(11) NOT NULL,
  `tipo_servicio_id` int(11) NOT NULL,
  `lugar_id` int(11) NOT NULL,
  `entrada` smallint(6) NOT NULL DEFAULT '0',
  `idioma_guia_id` int(11) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigue_a`
--

CREATE TABLE IF NOT EXISTS `sigue_a` (
`id` int(11) NOT NULL,
  `seguida_por_id` int(11) NOT NULL,
  `sigue_a_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_excursion`
--

CREATE TABLE IF NOT EXISTS `tipo_excursion` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_excursion`
--

INSERT INTO `tipo_excursion` (`id`, `nombre`) VALUES
(1, 'HALF DAY'),
(2, 'FULL DAY'),
(3, 'FULL DAY EXTRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE IF NOT EXISTS `tipo_servicio` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id`, `nombre`) VALUES
(1, 'Excursión'),
(2, 'Trekking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rol` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `rol`, `email`) VALUES
(1, 'asdf', 'asdf', '1', 'leandro,j2ee@gmail.com'),
(2, 'qwer', 'qwer', '2', 'qwer@qwer.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_cotizante`
--

CREATE TABLE IF NOT EXISTS `usuario_cotizante` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cotizante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrivo_cjc`
--
ALTER TABLE `arrivo_cjc`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_arrivo_cjc_linea_area1` (`linea_aerea_id`), ADD KEY `fk_arrivo_cjc_idioma1` (`idioma_id`), ADD KEY `fk_arrivo_cjc_detalle_servicio1` (`detalle_servicio_id`);

--
-- Indices de la tabla `asunto`
--
ALTER TABLE `asunto`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cotizacion_usuario1` (`cotizante_id`), ADD KEY `fk_cotizacion_moneda1` (`moneda_id`), ADD KEY `fk_cotizacion_asunto1` (`asunto_id`), ADD KEY `fk_cotizacion_hotel1` (`hotel_id`), ADD KEY `fk_cotizacion_arrivo_cjc1` (`arrivo_cjc_id`), ADD KEY `fk_cotizacion_salida_cjc1` (`salida_cjc_id`);

--
-- Indices de la tabla `cotizante`
--
ALTER TABLE `cotizante`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_usuario_pais` (`pais_id`);

--
-- Indices de la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `excursion`
--
ALTER TABLE `excursion`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_excursion_tipo_excursion1` (`tipo_excursion_id`);

--
-- Indices de la tabla `extra`
--
ALTER TABLE `extra`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `extra_arrivo`
--
ALTER TABLE `extra_arrivo`
 ADD PRIMARY KEY (`extra_id`,`arrivo_cjc_id`), ADD KEY `fk_extra_has_arrivo_cjc_arrivo_cjc1` (`arrivo_cjc_id`), ADD KEY `fk_extra_has_arrivo_cjc_extra1` (`extra_id`);

--
-- Indices de la tabla `extra_salida`
--
ALTER TABLE `extra_salida`
 ADD PRIMARY KEY (`extra_id`,`salida_cjc_id`), ADD KEY `fk_extra_has_salida_cjc_salida_cjc1` (`salida_cjc_id`), ADD KEY `fk_extra_has_salida_cjc_extra1` (`extra_id`);

--
-- Indices de la tabla `extra_servicio`
--
ALTER TABLE `extra_servicio`
 ADD KEY `fk_servicio_has_extra_extra1` (`extra_id`), ADD KEY `fk_servicio_has_extra_servicio1` (`servicio_id`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen_excursion`
--
ALTER TABLE `imagen_excursion`
 ADD KEY `fk_imagen_has_excursion_excursion1` (`excursion_id`), ADD KEY `fk_imagen_has_excursion_imagen1` (`imagen_id`);

--
-- Indices de la tabla `linea_aerea`
--
ALTER TABLE `linea_aerea`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_lugar_tipo_servicio1` (`tipo_servicio_id`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_pasajero_pais1` (`pais_id`), ADD KEY `fk_pasajero_cotizacion1` (`cotizacion_id`);

--
-- Indices de la tabla `salida_cjc`
--
ALTER TABLE `salida_cjc`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_arrivo_cjc_linea_area1` (`linea_aerea_id`), ADD KEY `fk_arrivo_cjc_idioma1` (`idioma_id`), ADD KEY `fk_salida_cjc_detalle_servicio1` (`detalle_servicio_id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_servicio_cotizacion1` (`cotizacion_id`), ADD KEY `fk_servicio_tipo_servicio1` (`tipo_servicio_id`), ADD KEY `fk_servicio_lugar1` (`lugar_id`), ADD KEY `fk_servicio_idioma1` (`idioma_guia_id`);

--
-- Indices de la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_sigue_a_excursion1` (`seguida_por_id`), ADD KEY `fk_sigue_a_excursion2` (`sigue_a_id`);

--
-- Indices de la tabla `tipo_excursion`
--
ALTER TABLE `tipo_excursion`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_cotizante`
--
ALTER TABLE `usuario_cotizante`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `fk_usuario_has_cotizante_cotizante1` (`cotizante_id`), ADD UNIQUE KEY `fk_usuario_has_cotizante_usuario1` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arrivo_cjc`
--
ALTER TABLE `arrivo_cjc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asunto`
--
ALTER TABLE `asunto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cotizante`
--
ALTER TABLE `cotizante`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_servicio`
--
ALTER TABLE `detalle_servicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `excursion`
--
ALTER TABLE `excursion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `extra`
--
ALTER TABLE `extra`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `linea_aerea`
--
ALTER TABLE `linea_aerea`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `salida_cjc`
--
ALTER TABLE `salida_cjc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_excursion`
--
ALTER TABLE `tipo_excursion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario_cotizante`
--
ALTER TABLE `usuario_cotizante`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arrivo_cjc`
--
ALTER TABLE `arrivo_cjc`
ADD CONSTRAINT `fk_arrivo_cjc_detalle_servicio1` FOREIGN KEY (`detalle_servicio_id`) REFERENCES `detalle_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_arrivo_cjc_idioma1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_arrivo_cjc_linea_area1` FOREIGN KEY (`linea_aerea_id`) REFERENCES `linea_aerea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
ADD CONSTRAINT `fk_cotizacion_arrivo_cjc1` FOREIGN KEY (`arrivo_cjc_id`) REFERENCES `arrivo_cjc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cotizacion_asunto1` FOREIGN KEY (`asunto_id`) REFERENCES `asunto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cotizacion_hotel1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cotizacion_moneda1` FOREIGN KEY (`moneda_id`) REFERENCES `moneda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cotizacion_salida_cjc1` FOREIGN KEY (`salida_cjc_id`) REFERENCES `salida_cjc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cotizacion_usuario1` FOREIGN KEY (`cotizante_id`) REFERENCES `cotizante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizante`
--
ALTER TABLE `cotizante`
ADD CONSTRAINT `fk_usuario_pais` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `excursion`
--
ALTER TABLE `excursion`
ADD CONSTRAINT `fk_excursion_tipo_excursion1` FOREIGN KEY (`tipo_excursion_id`) REFERENCES `tipo_excursion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `extra_arrivo`
--
ALTER TABLE `extra_arrivo`
ADD CONSTRAINT `fk_extra_has_arrivo_cjc_arrivo_cjc1` FOREIGN KEY (`arrivo_cjc_id`) REFERENCES `arrivo_cjc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_extra_has_arrivo_cjc_extra1` FOREIGN KEY (`extra_id`) REFERENCES `extra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `extra_salida`
--
ALTER TABLE `extra_salida`
ADD CONSTRAINT `fk_extra_has_salida_cjc_extra1` FOREIGN KEY (`extra_id`) REFERENCES `extra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_extra_has_salida_cjc_salida_cjc1` FOREIGN KEY (`salida_cjc_id`) REFERENCES `salida_cjc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `extra_servicio`
--
ALTER TABLE `extra_servicio`
ADD CONSTRAINT `fk_servicio_has_extra_extra1` FOREIGN KEY (`extra_id`) REFERENCES `extra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_servicio_has_extra_servicio1` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagen_excursion`
--
ALTER TABLE `imagen_excursion`
ADD CONSTRAINT `fk_imagen_has_excursion_excursion1` FOREIGN KEY (`excursion_id`) REFERENCES `excursion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_imagen_has_excursion_imagen1` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lugar`
--
ALTER TABLE `lugar`
ADD CONSTRAINT `fk_lugar_tipo_servicio1` FOREIGN KEY (`tipo_servicio_id`) REFERENCES `tipo_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
ADD CONSTRAINT `fk_pasajero_cotizacion1` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pasajero_pais1` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salida_cjc`
--
ALTER TABLE `salida_cjc`
ADD CONSTRAINT `fk_arrivo_cjc_idioma10` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_arrivo_cjc_linea_area10` FOREIGN KEY (`linea_aerea_id`) REFERENCES `linea_aerea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_salida_cjc_detalle_servicio1` FOREIGN KEY (`detalle_servicio_id`) REFERENCES `detalle_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
ADD CONSTRAINT `fk_servicio_cotizacion1` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_servicio_idioma1` FOREIGN KEY (`idioma_guia_id`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_servicio_lugar1` FOREIGN KEY (`lugar_id`) REFERENCES `lugar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_servicio_tipo_servicio1` FOREIGN KEY (`tipo_servicio_id`) REFERENCES `tipo_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sigue_a`
--
ALTER TABLE `sigue_a`
ADD CONSTRAINT `fk_sigue_a_excursion1` FOREIGN KEY (`seguida_por_id`) REFERENCES `excursion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sigue_a_excursion2` FOREIGN KEY (`sigue_a_id`) REFERENCES `excursion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_cotizante`
--
ALTER TABLE `usuario_cotizante`
ADD CONSTRAINT `fk_usuario_has_cotizante_cotizante1` FOREIGN KEY (`cotizante_id`) REFERENCES `cotizante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usuario_has_cotizante_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
