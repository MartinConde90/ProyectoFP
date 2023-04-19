-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2023 a las 13:34:01
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(3) NOT NULL,
  `id_post_comentario` int(3) NOT NULL,
  `autor_comentario` varchar(255) NOT NULL,
  `email_autor` varchar(255) NOT NULL,
  `contenido_comentario` text NOT NULL,
  `estatus_comentario` varchar(255) NOT NULL,
  `fecha_comentario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_post_comentario`, `autor_comentario`, `email_autor`, `contenido_comentario`, `estatus_comentario`, `fecha_comentario`) VALUES
(38, 1, 'Martin', 'martin@gmail.com', 'hola', 'Aprobado', '2023-04-18'),
(39, 7, 'Martin', 'martin@gmail.com', 'sfgsgmsgm', 'Aprobado', '2023-04-18'),
(40, 1, 'Martin', 'martin@gmail.com', 'hhshsh', 'Aprobado', '2023-04-18'),
(41, 10, 'Martin', 'martin@gmail.com', 'dvavasvasv', 'Aprobado', '2023-04-18'),
(42, 9, 'Martin', 'martin@gmail.com', 'fdsf', 'Aprobado', '2023-04-18'),
(43, 1, 'martin', 'martin@gmail.com', 'probando comentarios', 'Aprobado', '2023-04-19'),
(44, 1, 'martin', 'martin@gmail.com', 'sadasdasdasd', 'Aprobado', '2023-04-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id_post` int(3) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `imagen` text NOT NULL,
  `contenido` text NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `nombre`, `estatus`, `imagen`, `contenido`, `fecha`, `id_usuario`) VALUES
(1, 'Probando', 'Published', 'bebe.jpeg', 'J. R. R. Tolkien planned The Lord of the Rings as a sequel to his earlier novel The Hobbit, but it ended up becoming a much more far-reaching and lengthy story which, written in stages between 1937 and 1949, was first published in the UK. between 1954 and 1955 in three volumes. Since then it has been reprinted numerous times and translated into many languages,2 becoming one of the most popular works of 20th century literature.3 In addition, it has been adapted several times for radio, theater and film. , mainly highlighting the film trilogy created by the New Zealand filmmaker Peter JacksonJ. R. R. Tolkien planned The Lord of the Rings as a sequel to his earlier novel The Hobbit, but it ended up becoming a much more far-reaching and lengthy story which, written in stages between 1937 and 1949, was first published in the UK. between 1954 and 1955 in three volumes. Since then it has been reprinted numerous times and translated into many languages,2 becoming one of the most popular works of 20th century literature.3 In addition, it has been adapted several times for radio, theater and film. , mainly highlighting the film trilogy created by the New Zealand filmmaker Peter Jacksonsdfsdfsdfsdfsdfsdfsdffsd', '2017-04-23 00:00:00', 1),
(7, 'doval probando a subir algo', 'Published', 'IMG_20191215_031959.jpg', 'eeeeeeeeeeeeeeeeeeeee', '2023-04-17 22:59:22', 2),
(8, 'paco rerse', 'Draft', 'IMG_20170428_012211.jpg', '444444', '2023-04-17 23:06:38', 1),
(9, 'bsbsdb', 'Published', 'WhatsApp Image 2023-04-14 at 14.44.43.jpeg', 'sdbsdb', '2023-04-18 19:28:48', 1),
(10, 'bdsbsdb', 'Published', 'titulobach.png', 'sdbdsbsdb', '2023-04-18 19:28:57', 1),
(11, 'xzvxzvxv', 'Published', 'a7PXgZl2_700w_0.jpg', 'bbbb', '2023-04-18 19:29:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `email`, `pass`, `rol`) VALUES
(1, 'martin', 'martin@gmail.com', '$2y$10$2/WYwveCRMDH4Zxt4RYg9OW0sMlsHf3yoRDGJc2FyW2yYsGCgvNPe', 1),
(2, 'Muriel', 'muriel@gmail.com', '$2y$10$gCQEwzOCu6kDC54v7COTcO.5vTZwUt57vCJ5OnuzKl5iafUDglq5y', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
