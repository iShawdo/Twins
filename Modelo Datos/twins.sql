-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2016 a las 03:05:48
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `twins`
--
CREATE DATABASE IF NOT EXISTS `twins` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `twins`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigo`
--

CREATE TABLE `amigo` (
  `AMI_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `USUARIO_AMIGO_ID` int(11) NOT NULL,
  `EST_ID` int(11) NOT NULL,
  `AMI_FECHA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `amigo`
--

INSERT INTO `amigo` (`AMI_ID`, `USUARIO_ID`, `USUARIO_AMIGO_ID`, `EST_ID`, `AMI_FECHA`) VALUES
(10, 1, 4, 23, '2016-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ban`
--

CREATE TABLE `ban` (
  `BAN_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `BAN_MOTIVO` varchar(5000) NOT NULL,
  `BAN_DESDE` date NOT NULL,
  `BAN_HASTA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloqueo`
--

CREATE TABLE `bloqueo` (
  `BLOQ_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `USUARIO_BLOQ_ID` int(11) NOT NULL,
  `BLOQ_FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bloqueo`
--

INSERT INTO `bloqueo` (`BLOQ_ID`, `USUARIO_ID`, `USUARIO_BLOQ_ID`, `BLOQ_FECHA`) VALUES
(3, 6, 1, '2016-06-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conexion`
--

CREATE TABLE `conexion` (
  `CON_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `DOM_ID` int(11) NOT NULL,
  `CON_FECHA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conexion`
--

INSERT INTO `conexion` (`CON_ID`, `USER_ID`, `DOM_ID`, `CON_FECHA`) VALUES
(1, 1, 20, '2016-06-20 06:34:01'),
(2, 6, 20, '2016-06-20 06:42:08'),
(3, 1, 20, '2016-06-20 09:24:21'),
(4, 1, 21, '2016-06-20 09:25:23'),
(5, 1, 20, '2016-06-20 09:31:36'),
(6, 1, 20, '2016-06-20 09:33:16'),
(7, 1, 21, '2016-06-20 09:34:26'),
(8, 1, 20, '2016-06-20 09:34:32'),
(9, 1, 21, '2016-06-20 09:35:01'),
(10, 5, 20, '2016-06-20 09:35:07'),
(11, 5, 21, '2016-06-20 09:35:15'),
(12, 1, 20, '2016-06-20 09:35:27'),
(13, 1, 21, '2016-06-20 09:42:19'),
(14, 1, 20, '2016-06-20 09:42:22'),
(15, 1, 21, '2016-06-20 09:42:26'),
(16, 1, 20, '2016-06-20 09:42:30'),
(17, 1, 21, '2016-06-20 09:57:21'),
(18, 1, 20, '2016-06-20 09:57:24'),
(19, 1, 21, '2016-06-20 09:59:06'),
(20, 6, 20, '2016-06-20 09:59:13'),
(21, 6, 21, '2016-06-20 10:05:06'),
(22, 1, 20, '2016-06-20 10:05:10'),
(23, 1, 21, '2016-06-20 10:05:14'),
(24, 6, 20, '2016-06-20 10:05:20'),
(25, 6, 21, '2016-06-20 10:06:03'),
(26, 6, 20, '2016-06-20 10:06:12'),
(27, 1, 20, '2016-06-20 19:11:03'),
(28, 1, 21, '2016-06-20 19:11:52'),
(29, 5, 20, '2016-06-20 19:11:57'),
(30, 5, 21, '2016-06-20 19:40:31'),
(31, 7, 21, '2016-06-20 19:55:22'),
(32, 1, 20, '2016-06-20 19:55:26'),
(33, 1, 21, '2016-06-20 20:11:07'),
(34, 6, 20, '2016-06-20 20:11:12'),
(35, 6, 21, '2016-06-20 20:16:18'),
(36, 6, 20, '2016-06-20 20:16:24'),
(37, 6, 21, '2016-06-20 20:22:54'),
(38, 1, 20, '2016-06-20 20:23:04'),
(39, 1, 21, '2016-06-20 20:47:26'),
(40, 1, 20, '2016-06-20 20:47:30'),
(41, 1, 21, '2016-06-20 20:48:31'),
(42, 1, 20, '2016-06-20 20:48:34'),
(43, 1, 21, '2016-06-20 20:59:01'),
(44, 1, 20, '2016-06-20 20:59:05'),
(45, 1, 21, '2016-06-20 20:59:08'),
(46, 6, 20, '2016-06-20 20:59:17'),
(47, 6, 21, '2016-06-20 20:59:50'),
(48, 6, 20, '2016-06-20 20:59:55'),
(49, 6, 21, '2016-06-20 21:02:50'),
(50, 8, 21, '2016-06-20 21:04:01'),
(51, 9, 21, '2016-06-20 21:16:34'),
(52, 6, 20, '2016-06-20 21:16:38'),
(53, 6, 21, '2016-06-20 21:17:27'),
(54, 1, 21, '2016-06-21 16:39:55'),
(55, 1, 20, '2016-06-21 16:40:03'),
(56, 1, 21, '2016-06-21 17:27:09'),
(57, 1, 20, '2016-06-21 17:27:13'),
(58, 1, 20, '2016-06-22 08:49:02'),
(59, 1, 21, '2016-06-22 09:35:08'),
(60, 1, 20, '2016-06-22 09:35:13'),
(61, 1, 21, '2016-06-22 10:27:21'),
(62, 5, 20, '2016-06-22 10:27:26'),
(63, 5, 21, '2016-06-22 10:32:28'),
(64, 1, 20, '2016-06-22 10:32:33'),
(65, 1, 21, '2016-06-22 13:27:29'),
(66, 1, 20, '2016-06-22 13:27:32'),
(67, 1, 21, '2016-06-22 14:21:09'),
(68, 5, 20, '2016-06-22 14:21:16'),
(69, 5, 21, '2016-06-22 14:48:34'),
(70, 1, 20, '2016-06-22 14:48:38'),
(71, 1, 21, '2016-06-22 14:49:11'),
(72, 5, 20, '2016-06-22 14:49:18'),
(73, 5, 21, '2016-06-22 14:57:33'),
(74, 5, 20, '2016-06-22 14:57:40'),
(75, 5, 21, '2016-06-22 14:58:04'),
(76, 5, 20, '2016-06-22 14:58:16'),
(77, 1, 20, '2016-06-22 18:39:03'),
(78, 1, 20, '2016-06-24 01:33:20'),
(79, 1, 21, '2016-06-24 01:38:55'),
(80, 1, 20, '2016-06-25 04:27:08'),
(81, 1, 21, '2016-06-25 04:27:30'),
(82, 5, 20, '2016-06-25 04:27:40'),
(83, 5, 21, '2016-06-25 07:53:02'),
(84, 1, 20, '2016-06-25 07:57:56'),
(85, 1, 21, '2016-06-25 11:25:27'),
(86, 1, 20, '2016-06-25 12:02:07'),
(87, 1, 21, '2016-06-25 12:10:29'),
(88, 1, 20, '2016-06-25 12:16:48'),
(89, 1, 21, '2016-06-25 14:24:35'),
(90, 1, 20, '2016-06-25 14:38:53'),
(91, 1, 21, '2016-06-25 15:35:05'),
(92, 1, 20, '2016-06-25 15:37:47'),
(93, 1, 21, '2016-06-25 22:39:10'),
(94, 5, 20, '2016-06-25 22:39:15'),
(95, 5, 21, '2016-06-25 22:52:20'),
(96, 1, 20, '2016-06-25 22:52:28'),
(97, 1, 21, '2016-06-25 22:52:35'),
(98, 5, 20, '2016-06-25 22:52:39'),
(99, 5, 21, '2016-06-25 23:05:00'),
(100, 1, 20, '2016-06-25 23:05:06'),
(101, 1, 21, '2016-06-25 23:06:16'),
(102, 5, 20, '2016-06-25 23:06:21'),
(103, 5, 21, '2016-06-25 23:06:28'),
(104, 1, 20, '2016-06-25 23:06:32'),
(105, 1, 21, '2016-06-25 23:22:20'),
(106, 5, 20, '2016-06-25 23:22:25'),
(107, 5, 21, '2016-06-25 23:22:31'),
(108, 1, 20, '2016-06-25 23:22:37'),
(109, 1, 21, '2016-06-25 23:29:27'),
(110, 1, 20, '2016-06-25 23:29:33'),
(111, 1, 21, '2016-06-25 23:45:29'),
(112, 5, 20, '2016-06-25 23:45:34'),
(113, 5, 21, '2016-06-26 00:37:11'),
(114, 6, 20, '2016-06-26 00:37:30'),
(115, 6, 21, '2016-06-26 00:40:25'),
(116, 1, 20, '2016-06-26 00:40:36'),
(117, 1, 21, '2016-06-26 00:40:40'),
(118, 5, 20, '2016-06-26 00:40:47'),
(119, 1, 20, '2016-06-26 09:00:44'),
(120, 1, 21, '2016-06-26 09:25:59'),
(121, 1, 20, '2016-06-26 09:26:11'),
(122, 1, 21, '2016-06-26 09:41:54'),
(123, 1, 20, '2016-06-26 10:01:48'),
(124, 1, 21, '2016-06-26 10:04:31'),
(125, 1, 20, '2016-06-27 22:56:59'),
(126, 1, 21, '2016-06-27 23:34:47'),
(127, 6, 20, '2016-06-27 23:34:53'),
(128, 6, 21, '2016-06-27 23:44:25'),
(129, 1, 20, '2016-06-27 23:44:32'),
(130, 1, 21, '2016-06-27 23:44:39'),
(131, 6, 20, '2016-06-27 23:44:46'),
(132, 6, 21, '2016-06-27 23:58:39'),
(133, 1, 20, '2016-06-27 23:58:45'),
(134, 1, 21, '2016-06-28 00:09:13'),
(135, 4, 20, '2016-06-28 00:09:28'),
(136, 4, 21, '2016-06-28 00:15:20'),
(137, 6, 20, '2016-06-28 00:15:38'),
(138, 6, 21, '2016-06-28 00:16:54'),
(139, 1, 20, '2016-06-28 00:16:58'),
(140, 1, 20, '2016-06-29 19:35:40'),
(141, 1, 21, '2016-06-29 19:38:32'),
(142, 1, 20, '2016-06-29 19:38:36'),
(143, 1, 21, '2016-06-29 19:40:33'),
(144, 6, 20, '2016-06-29 19:40:39'),
(145, 6, 21, '2016-06-29 19:51:15'),
(146, 4, 20, '2016-06-29 19:51:19'),
(147, 4, 21, '2016-06-29 19:52:07'),
(148, 6, 20, '2016-06-29 19:52:13'),
(149, 6, 21, '2016-06-29 20:01:08'),
(150, 1, 20, '2016-06-29 20:01:12'),
(151, 1, 21, '2016-06-29 20:02:47'),
(152, 4, 20, '2016-06-29 20:02:52'),
(153, 4, 21, '2016-06-29 20:06:19'),
(154, 6, 20, '2016-06-29 20:06:25'),
(155, 6, 21, '2016-06-29 20:07:30'),
(156, 5, 20, '2016-06-29 20:07:35'),
(157, 5, 21, '2016-06-29 20:07:37'),
(158, 1, 20, '2016-06-29 20:07:41'),
(159, 1, 21, '2016-06-29 20:19:05'),
(160, 6, 20, '2016-06-29 20:19:19'),
(161, 6, 21, '2016-06-29 20:25:55'),
(162, 1, 20, '2016-06-30 01:01:30'),
(163, 1, 20, '2016-06-30 01:26:01'),
(164, 1, 21, '2016-06-30 01:30:24'),
(165, 1, 20, '2016-07-01 00:28:15'),
(166, 1, 21, '2016-07-01 01:50:04'),
(167, 1, 20, '2016-07-01 02:26:50'),
(168, 1, 21, '2016-07-01 06:15:06'),
(169, 1, 20, '2016-07-01 06:15:13'),
(170, 1, 21, '2016-07-01 06:50:21'),
(171, 4, 20, '2016-07-01 06:50:26'),
(172, 4, 21, '2016-07-01 07:09:48'),
(173, 6, 20, '2016-07-01 07:09:55'),
(174, 6, 21, '2016-07-01 07:11:52'),
(175, 1, 20, '2016-07-01 07:11:57'),
(176, 1, 21, '2016-07-01 10:16:42'),
(177, 5, 20, '2016-07-01 10:16:47'),
(178, 5, 21, '2016-07-01 10:33:39'),
(179, 1, 20, '2016-07-01 10:33:44'),
(180, 1, 20, '2016-07-01 11:55:57'),
(181, 1, 20, '2016-07-01 16:16:10'),
(182, 1, 20, '2016-07-15 12:22:25'),
(183, 1, 20, '2016-07-20 16:30:45'),
(184, 1, 20, '2016-12-18 00:10:58'),
(185, 1, 21, '2016-12-18 00:11:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `DOM_ID` int(11) NOT NULL,
  `DOM_TITLE` varchar(50) NOT NULL,
  `DOM_DESC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`DOM_ID`, `DOM_TITLE`, `DOM_DESC`) VALUES
(1, 'SEXO', 'MASCULINO'),
(2, 'SEXO', 'FEMENINO'),
(3, 'COLOR_OJOS', 'CAFE'),
(4, 'COLOR_OJOS', 'VERDES'),
(5, 'COLOR_OJOS', 'AZULES'),
(6, 'COLOR_OJOS', 'PARDOS'),
(7, 'COLOR_OJOS', 'OTRO'),
(8, 'COLOR_PELO', 'NEGRO'),
(9, 'COLOR_PELO', 'CASTAÑO OSCURO'),
(10, 'COLOR_PELO', 'CASTAÑO CLARO'),
(11, 'COLOR_PELO', 'RUBIO'),
(12, 'USUARIO', 'ACTIVO'),
(13, 'USUARIO', 'BANNEADO'),
(14, 'MENSAJE', 'ENVIADO'),
(15, 'MENSAJE', 'RECIBIDO'),
(16, 'ESTADO_CIVIL', 'SOLTERO/A'),
(17, 'ESTADO_CIVIL', 'EN PAREJA'),
(18, 'ESTADO_CIVIL', 'CASADO/A'),
(19, 'ESTADO_CIVIL', 'DIVORCIADO/A'),
(20, 'CONEXION', 'CONECTADO'),
(21, 'CONEXION', 'DESCONECTADO'),
(22, 'AMIGO', 'ESPERA'),
(23, 'AMIGO', 'ACEPTADA'),
(24, 'AMIGO', 'RECHAZADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `FOTO_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `FOTO_RUTA` varchar(2000) NOT NULL,
  `FOTO_NOMBRE` varchar(300) NOT NULL,
  `FOTO_PERFIL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`FOTO_ID`, `USUARIO_ID`, `FOTO_RUTA`, `FOTO_NOMBRE`, `FOTO_PERFIL`) VALUES
(6, 1, '../Resources/userImages/', 'michael.jpg', 0),
(7, 1, '../Resources/userImages/', '13502030_10210191369679308_6526135677858365937_n.jpg', 1),
(8, 1, '../Resources/userImages/', '13315412_10209901445991397_8881814591852889281_n.jpg', 0),
(9, 1, '../Resources/userImages/', '13254030_10209901446071399_3069435068959882649_n.jpg', 0),
(10, 1, '../Resources/userImages/', '13509009_10210120884197215_7867786683370102610_n.jpg', 0),
(11, 1, '../Resources/userImages/', '13266066_10209901446151401_6770463859139035719_n.jpg', 0),
(12, 6, '../Resources/userImages/', '13524176_1079513075430391_1313410071_o.jpg', 0),
(13, 6, '../Resources/userImages/', '13524218_1079513085430390_476557980_o.jpg', 0),
(14, 6, '../Resources/userImages/', '13517765_1079514162096949_1175755436_o (1).jpg', 0),
(15, 4, '../Resources/userImages/', '1484391_882710625127594_5793989988009690872_n.jpg', 0),
(16, 4, '../Resources/userImages/', '11988290_956382444427078_4703065825983416181_n.jpg', 0),
(17, 4, '../Resources/userImages/', '1072501_665302216868437_1994087624_o.jpg', 1),
(18, 6, '../Resources/userImages/', '12376613_964840416897658_2475249965067002808_n.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `MEN_ID` int(11) NOT NULL,
  `USUARIO_DE` int(11) NOT NULL,
  `USUARIO_PARA` int(11) NOT NULL,
  `MEN_MENSAJE` varchar(2500) NOT NULL,
  `MEN_FECHA` datetime NOT NULL,
  `MEN_ESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`MEN_ID`, `USUARIO_DE`, `USUARIO_PARA`, `MEN_MENSAJE`, `MEN_FECHA`, `MEN_ESTADO`) VALUES
(5, 6, 5, 'gvxghf', '2016-06-18 17:21:16', 1),
(14, 6, 4, 'ADASAs', '2016-06-19 04:17:10', 1),
(15, 5, 6, 'dasdads', '2016-06-19 07:09:11', 1),
(16, 6, 1, 'dggsg', '2016-06-19 04:24:17', 1),
(17, 1, 6, 'dggsg', '2016-06-19 04:24:17', 1),
(18, 4, 6, 'asdasddad', '2016-06-20 07:23:09', 1),
(19, 6, 4, 'aasdasd', '2016-06-20 06:13:11', 1),
(20, 1, 6, 'Hola cochino qlo', '2016-06-24 01:36:50', 1),
(21, 1, 6, 'Como estay perra qla', '2016-06-24 01:37:04', 1),
(22, 5, 6, 'Hola guapo :$', '2016-06-25 07:52:45', 1),
(23, 1, 4, 'Buena polanquito ! ', '2016-06-27 23:27:29', 15),
(24, 1, 4, 'asdasdasdaasdasdasd', '2016-06-28 00:08:31', 15),
(25, 1, 4, 'asdasdasdasd', '2016-06-28 00:08:47', 1),
(26, 1, 6, 'Hola Jose !', '2016-06-29 19:38:16', 15),
(27, 1, 4, 'wena wena men como estamos ', '2016-07-01 04:32:45', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `TIP_USER_ID` int(11) NOT NULL,
  `TIP_USER_DESC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`TIP_USER_ID`, `TIP_USER_DESC`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'NORMAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAME` varchar(25) NOT NULL,
  `USER_PASSWORD` varchar(50) NOT NULL,
  `USER_CORREO` varchar(50) NOT NULL,
  `TIP_USER_ID` int(11) NOT NULL,
  `USER_NOMBRE` varchar(50) NOT NULL,
  `USER_APELLIDO` varchar(50) NOT NULL,
  `USER_SEXO` int(11) NOT NULL,
  `USER_FECHA_NACIMIENTO` date NOT NULL,
  `USER_DESCRIPCION` varchar(2000) DEFAULT NULL,
  `USER_ESTATURA` varchar(4) DEFAULT NULL,
  `USER_PESO` varchar(3) DEFAULT NULL,
  `USER_COLOR_OJOS` int(11) DEFAULT NULL,
  `USER_COLOR_PELO` int(11) DEFAULT NULL,
  `USER_ESTADO_CIVIL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Información completa de un usuario';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USER_ID`, `USER_NAME`, `USER_PASSWORD`, `USER_CORREO`, `TIP_USER_ID`, `USER_NOMBRE`, `USER_APELLIDO`, `USER_SEXO`, `USER_FECHA_NACIMIENTO`, `USER_DESCRIPCION`, `USER_ESTATURA`, `USER_PESO`, `USER_COLOR_OJOS`, `USER_COLOR_PELO`, `USER_ESTADO_CIVIL`) VALUES
(1, 'iShawdo', '1f32aa4c9a1d2ea010adcf2348166a04', 'shawdo@twins.cl', 1, 'Michael Joseph', 'Núñez Bobadilla', 1, '1994-09-28', 'Hola a todos, soy el administrador de Twins Chat Online, si tienes alguna duda o consulta, no dudes en hablarme :)', '', '', 3, 8, 16),
(4, 'ed.polanco', 'ec6a6536ca304edf844d1d248a4f08dc', 'ed.polanco@twins.cl', 2, 'Eduardo', 'Polanco', 1, '1998-01-01', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'maca.trittini', 'd9b1d7db4cd6e70935368a1efb10e377', 'maca.trittini@twins.cl', 2, 'Macarena Del Pilar', 'Trittini', 2, '1995-03-15', '', '1.99', '', 0, 0, 0),
(6, 'TIO_SIMIO', '14e1b600b1fd579f47433b88e8d85291', 'JOSEALVEAR.B@GMAIL.COM', 1, 'JOSE', 'ALVEAR', 1, '1995-02-27', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'TOTI', 'ec6a6536ca304edf844d1d248a4f08dc', 'TITO@GMAIL.COM', 2, 'HECTOR ', 'CARRERA', 1, '1994-04-17', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ASVILO', 'ec6a6536ca304edf844d1d248a4f08dc', 'ASVILO@GMAIL.COM', 2, 'Bastian ', 'Jerome', 1, '1998-09-14', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'MATI', 'ec6a6536ca304edf844d1d248a4f08dc', 'MATIAS@GMAIL.COM', 2, 'MAtiiAS', 'LaTorre', 1, '1990-03-11', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigo`
--
ALTER TABLE `amigo`
  ADD PRIMARY KEY (`AMI_ID`);

--
-- Indices de la tabla `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`BAN_ID`);

--
-- Indices de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  ADD PRIMARY KEY (`BLOQ_ID`);

--
-- Indices de la tabla `conexion`
--
ALTER TABLE `conexion`
  ADD PRIMARY KEY (`CON_ID`);

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`DOM_ID`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FOTO_ID`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`MEN_ID`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`TIP_USER_ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USER_NAME` (`USER_NAME`),
  ADD UNIQUE KEY `USER_CORREO` (`USER_CORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigo`
--
ALTER TABLE `amigo`
  MODIFY `AMI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ban`
--
ALTER TABLE `ban`
  MODIFY `BAN_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `bloqueo`
--
ALTER TABLE `bloqueo`
  MODIFY `BLOQ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `conexion`
--
ALTER TABLE `conexion`
  MODIFY `CON_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `DOM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `FOTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `MEN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `TIP_USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
