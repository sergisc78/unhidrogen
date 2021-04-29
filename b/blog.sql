-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2021 a las 13:57:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@unhidrogen.es', '$2y$15$TkFF/436/PS.SHAh2Fdez.N3K0M4RS1F4FQ/43ISY7hm8P1VIJXRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `descr_categoria` varchar(100) NOT NULL,
  `url_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descr_categoria`, `url_categoria`) VALUES
(23, 'alimentacion1', 'vegetarismo'),
(24, 'alimentacion2', 'alimentacion'),
(25, 'medicina1', 'coronavirus'),
(26, 'medicina2', 'pandemia'),
(27, 'timo', 'timocracia'),
(28, 'medicina', 'vacuna'),
(29, 'timo', 'timocracia'),
(30, 'medicina', 'vacuna'),
(31, 'hola', 'adios'),
(32, 'gato', 'perro'),
(33, 'perro', 'gato'),
(34, 'alimentacion3', 'verdura'),
(35, 'alimentacion4', 'legumbres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `headers`
--

CREATE TABLE `headers` (
  `id_headers` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `tituloHeader` varchar(80) DEFAULT NULL,
  `textoHeader` longtext DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  `bannerLateral` varchar(100) DEFAULT NULL,
  `linkLateral` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `headers`
--

INSERT INTO `headers` (`id_headers`, `id_post`, `orden`, `tituloHeader`, `textoHeader`, `imagen`, `bannerLateral`, `linkLateral`) VALUES
(119, 120, 1, 'Tipos de dietas vegetarianas', 'Cuando la gente piensa en una dieta vegetariana, normalmente piensa en una dieta que no incluye carne de vaca, pollo o pescado. Pero las dietas vegetarianas varían en cuanto a los alimentos que incluyen y excluyen:\r\n\r\n    Las dietas lactovegetarianas excluyen la carne de vaca, de pollo y de pescado y los huevos, así como los alimentos que contienen estos productos. Se incluyen los productos lácteos, como la leche, el queso, el yogur y la mantequilla.\r\n    Las dietas ovovegetarianas excluyen la carne de vaca y de pollo, los mariscos y los productos lácteos, pero permiten los huevos.\r\n    Las dietas lacto-ovo vegetarianas excluyen la carne de vaca, de pollo y de pescado, pero permiten los productos lácteos y los huevos.\r\n    Las dietas pescetarianas excluyen la carne de vaca y de pollo, los lácteos y los huevos, pero permiten el pescado.\r\n    Las dietas veganas excluyen la carne de vaca, de pollo y de pescado, los huevos y los productos lácteos, así como los alimentos que contienen estos productos.\r\n', '', '', 'alimentacion-vegana'),
(120, 121, 1, 'qué es el covid-19', 'La COVID‑19 es la enfermedad infecciosa causada por el coronavirus que se ha descubierto más recientemente. Tanto este nuevo virus como la enfermedad que provoca eran desconocidos antes de que estallara el brote en Wuhan (China) en diciembre de 2019. Actualmente la COVID‑19 es una pandemia que afecta a muchos países de todo el mundo.', 'mate1.png', 'mate2.png', 'medicina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titulo_post` varchar(100) NOT NULL,
  `fecha_post` date NOT NULL,
  `introduccion_post` text NOT NULL,
  `url_post` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `titulo_post`, `fecha_post`, `introduccion_post`, `url_post`) VALUES
(120, 'Dieta vegetariana', '2021-02-21', 'Una dieta vegetariana bien planificada es una manera saludable de satisfacer tus necesidades nutricionales. Descubre lo que debes saber sobre una dieta a base de alimentos de origen vegetal.', 'alimentacion-vegetariana'),
(121, 'coronavirus', '2021-02-23', 'Los coronavirus son una extensa familia de virus que pueden causar enfermedades tanto en animales como en humanos. En los humanos, se sabe que varios coronavirus causan infecciones respiratorias que pueden ir desde el resfriado común hasta enfermedades más graves como el síndrome respiratorio de Oriente Medio (MERS) y el síndrome respiratorio agudo severo (SRAS). El coronavirus que se ha descubierto más recientemente causa la enfermedad por coronavirus COVID-19.', 'pandemia-mundial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_categorias`
--

CREATE TABLE `post_categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post_categorias`
--

INSERT INTO `post_categorias` (`id_categoria`, `id_post`) VALUES
(23, 120),
(24, 120),
(25, 121),
(26, 121),
(32, 121),
(33, 121),
(34, 120),
(35, 120);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id_headers`),
  ADD KEY `id_post` (`id_post`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `post_categorias`
--
ALTER TABLE `post_categorias`
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_categorias` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `headers`
--
ALTER TABLE `headers`
  MODIFY `id_headers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `headers`
--
ALTER TABLE `headers`
  ADD CONSTRAINT `headers_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post_categorias`
--
ALTER TABLE `post_categorias`
  ADD CONSTRAINT `post_categorias_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_categorias_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
