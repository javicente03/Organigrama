-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 06:20:52
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `organigrama_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`, `id_usuario_cargo`) VALUES
(1, 'DESPACHO DEL ALCALDE', NULL),
(2, 'SINDICATURA(SINDICO MUNICIPAL)', NULL),
(3, 'UNIDAD DE AUDITORÍA INTERNA', NULL),
(4, 'REGISTRO CIVIL', NULL),
(5, 'CONSEJO LOCAL DE PLANIFICACIÓN PÚBLICA ( JEFA  EJECUTIVA DE COPLAN)', NULL),
(6, 'CMMDNA', NULL),
(7, 'DIRECTOR DEL DESPACHO', NULL),
(8, 'ATENCIÓN AL CIUDADANO (JEFA DE LA OFICINA)', NULL),
(9, 'DIRECCIÓN GENERAL (DIRECTOR)', NULL),
(10, 'DIRECCION TALENTO  HUMANOS Y TECNOLOGIA (DIRECTORA)', NULL),
(11, 'INFORMACIÓN Y RELACIONES PÚBLICAS', NULL),
(12, 'COORDINACIÓN DE TALENTO HUMANO (COORDINADORA)', NULL),
(13, 'COORDINACIÓN DE TECNOLOGIA (COORDINADOR)', NULL),
(14, 'COORDINACIÓN DE CONTROL Y SEGUIMIENTO  (COORDINADOR)', NULL),
(15, 'DIRECCIÓN DE HACIENDA (DIRECTORA DE ADMINISTRACION RENTAS Y TRIBUTOS', NULL),
(16, 'TESORERIA (TESORERO)', NULL),
(17, 'JEFATURA DE BIENES Y SERVICIOS (JEFE)', NULL),
(18, 'UNIDAD DE BIENES PUBLICOS', NULL),
(19, 'JEFATURA DE  PRESUPUESTO (JEFA)', NULL),
(20, 'COORDINACIÓN  DE LIQUIDACIÓN Y RECAUDACIÓN', NULL),
(21, 'JEFATURA DE  CONTABILIDAD (JEFA)', NULL),
(22, 'DIRECCIÓN DE DESARROLLO SOCIAL (DIRECTORA)', NULL),
(23, 'JEFATURA DE SALUD MUNICIPAL', NULL),
(24, 'COORDINACIÓN DE AGROPESCA', NULL),
(25, 'COORDINACIÓN DE SALUD', NULL),
(26, 'COORDINACIÓN DE ATENCION SOCIAL', NULL),
(27, 'DIRECCIÓN DE OBRAS PÚBLICAS (JEFA)', NULL),
(28, 'JEFATURA DE VIVIENDA Y HABITAT (JEFA)', NULL),
(29, 'INGENIERIA MUNICIPAL', NULL),
(30, 'JEFATURA DE TIERRA Y CATASTRO (JEFE) ', NULL),
(31, 'JEFATURA DE SERVICIOS PÚBLICOS', NULL),
(32, 'COORDINACIÓN DE TIERRA', NULL),
(33, 'JEFATURA DE PLANIFICACIÓN URBANA-AMBIENTAL', NULL),
(34, 'COORDINACIÓN DE AMBIENTE', NULL),
(35, 'COORDINACIÓN DE TRANSPORTE', NULL),
(36, 'COORDINACIÓN DE TALLERES', NULL),
(37, 'DIRECCIÓN DE PROTECCIÓN CIVIL Y ADMINISTRACIÓN DE DESASTRES (DIRECTOR)', NULL),
(38, 'SERVICIOS BOMBERILES', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reset_password`
--

CREATE TABLE `reset_password` (
  `id_reset_password` int(11) NOT NULL,
  `user_reset` int(11) NOT NULL,
  `token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reset` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `super_usuario` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `nombres`, `apellidos`, `cedula`, `password`, `profesion`, `img`, `super_usuario`, `activo`) VALUES
(16, 'alcaldia.los.taques.organigrama@gmail.com', 'Diana', 'Gotopo', 5585999, '$2y$12$Teng/QwPhkQOxEESzPRQpOdWmuP3plcyayhV38xQVvH5YN5z1YEqy', 'Ingeniero de Sistemas', '../img/media/ced5585999.jpg', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `id_usuario` (`id_usuario_cargo`);

--
-- Indices de la tabla `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id_reset_password`),
  ADD KEY `user_reset` (`user_reset`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id_reset_password` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`id_usuario_cargo`) REFERENCES `usuarios` (`id_usuario`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `reset_password_ibfk_1` FOREIGN KEY (`user_reset`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
