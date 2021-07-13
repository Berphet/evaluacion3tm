-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 12, 2021 at 10:52 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marshall`
--

-- --------------------------------------------------------

--
-- Table structure for table `apunte`
--

DROP TABLE IF EXISTS `apunte`;
CREATE TABLE IF NOT EXISTS `apunte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `url` varchar(500) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contenido_id` (`contenido_id`),
  KEY `tipo_apunte` (`tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apunte`
--

INSERT INTO `apunte` (`id`, `contenido_id`, `nombre`, `url`, `tipo`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 1, 'baile cierre semestre franki', 'https://www.youtube.com/embed?v=kvznYJEFh1w&list=RDNvS351QKFV4&t=9s', 3, '2021-07-06 19:39:27', '2021-07-08 02:05:54'),
(4, 1, 'Que es un semestre?', 'https://es.wikipedia.org/wiki/Semestre', 1, '2021-07-08 02:14:09', '2021-07-08 02:18:25'),
(5, 1, 'version pdf', 'https://www.redalyc.org/pdf/213/21311917005.pdf', 4, '2021-07-08 02:19:05', '2021-07-08 02:19:48'),
(3, 7, 'notas taller imagen', 'https://th.bing.com/th/id/R.9fbdff96cb12e976e23c2f0ff56de648?rik=w66Pag41jS8y6w&riu=http%3a%2f%2fofficemax.vteximg.com.br%2farquivos%2fids%2f170503-1000-1000%2f92471_1.jpg&ehk=PrsxBL%2fSuRAeUuoDMVQnnYqcsUREbeMt9Koojbmpm4U%3d&risl=&pid=ImgRaw', 2, '2021-07-06 20:20:50', '2021-07-08 02:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `apunte_tipo`
--

DROP TABLE IF EXISTS `apunte_tipo`;
CREATE TABLE IF NOT EXISTS `apunte_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apunte_tipo`
--

INSERT INTO `apunte_tipo` (`id`, `nombre`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'WEB', '2021-07-03 07:37:09', '2021-07-03 07:37:09'),
(2, 'Imagen', '2021-07-03 07:37:43', '2021-07-03 07:37:43'),
(3, 'Video', '2021-07-03 07:37:58', '2021-07-03 07:37:58'),
(4, 'PDF', '2021-07-03 07:38:10', '2021-07-03 07:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
CREATE TABLE IF NOT EXISTS `contenido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contenido`
--

INSERT INTO `contenido` (`id`, `nombre`, `descripcion`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Cierre de semestre', 'Contenido relacionado con evaluaciones que cierran el primer semestre del aÃ±o 2021', '2021-06-23 20:11:31', '2021-07-03 07:28:47'),
(7, 'Taller Multimedios', 'Dentro de este contenido se encuentra informaciÃ³n relevante para la evaluaciÃ³n 3 de taller de mutimedios', '2021-07-03 07:27:57', '2021-07-03 07:27:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
