-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-05-2022 a las 06:21:14
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_pirineos`
--
CREATE DATABASE IF NOT EXISTS `sis_pirineos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sis_pirineos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `password`, `nom_admin`) VALUES
(1, 'admin', '$2y$10$.0y1HQQU2zQjSxHTNDYP3ODL1eLJXLYYvLgFfFiif7uAKz5EvEPca', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

DROP TABLE IF EXISTS `contenidos`;
CREATE TABLE IF NOT EXISTS `contenidos` (
  `cve_tipo` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_tipo` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_catalog` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod_rel1` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod_rel1` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `url_prod_rel1` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod_rel2` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod_rel2` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `url_prod_rel2` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_tipo` (`cve_tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derivados_trigo`
--

DROP TABLE IF EXISTS `derivados_trigo`;
CREATE TABLE IF NOT EXISTS `derivados_trigo` (
  `cve_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_prod` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_prod` (`cve_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `harinas_preparadas`
--

DROP TABLE IF EXISTS `harinas_preparadas`;
CREATE TABLE IF NOT EXISTS `harinas_preparadas` (
  `cve_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_prod` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_prod` (`cve_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `harinas_trigo`
--

DROP TABLE IF EXISTS `harinas_trigo`;
CREATE TABLE IF NOT EXISTS `harinas_trigo` (
  `cve_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_prod` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_prod` (`cve_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polvo_hornear`
--

DROP TABLE IF EXISTS `polvo_hornear`;
CREATE TABLE IF NOT EXISTS `polvo_hornear` (
  `cve_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_prod` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_prod` (`cve_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `cve_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_prod` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_prod` (`cve_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

DROP TABLE IF EXISTS `recetas`;
CREATE TABLE IF NOT EXISTS `recetas` (
  `cve_rec` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_rec` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_rec` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_rec` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_rec` (`cve_rec`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rendimix`
--

DROP TABLE IF EXISTS `rendimix`;
CREATE TABLE IF NOT EXISTS `rendimix` (
  `cve_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nom_prod` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo_prod` varchar(5) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion_prod` text CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `img_prod` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  UNIQUE KEY `cve_prod` (`cve_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
