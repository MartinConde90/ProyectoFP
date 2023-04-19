-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2023 a las 01:58:42
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
(44, 1, 'martin', 'martin@gmail.com', 'sadasdasdasd', 'Aprobado', '2023-04-19'),
(45, 20, 'martin', 'martin@gmail.com', 'hfshhfdhfdh', 'Aprobado', '2023-04-20');

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
  `fecha` date NOT NULL,
  `post_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id_post`, `nombre`, `estatus`, `imagen`, `contenido`, `fecha`, `post_user`) VALUES
(19, 'Brandoncete', 'Published', 'IMG_20170428_012211.jpg', 'Brandon pidiendo comida', '2023-04-20', 'martin'),
(20, 'Perro volador', 'Draft', 'WhatsApp Image 2021-09-11 at 13.51.48.jpeg', 'Melon volador', '2023-04-20', 'martin'),
(21, 'Wallpaper medieval', 'Published', 'FjO95DeXwBUpyJC.jpg', 'Fondo de pantalla', '2023-04-20', 'martin'),
(22, 'Homer', 'Draft', 'IMG_20191215_031959.jpg', 'Homer volador', '2023-04-20', 'martin'),
(23, 'The Boys', 'Published', 'a7PXgZl2_700w_0.jpg', 'Carnicero', '2023-04-20', 'martin'),
(24, 'Carnaval', 'Draft', 'WhatsApp Image 2023-02-19 at 04.43.24 (2).jpeg', 'Star wars de carnaval', '2023-04-20', 'martin'),
(25, 'Fondo psicodelico', 'Published', 'ElDeUdCW0AAnLNo.jpg', 'Fondo de pantalla', '2023-04-20', 'Muriel');

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
(1, 'Martin', 'martin@gmail.com', '$2y$10$2/WYwveCRMDH4Zxt4RYg9OW0sMlsHf3yoRDGJc2FyW2yYsGCgvNPe', 1),
(4, 'Muriel', 'muriel@gmail.com', '$2y$10$Aac1Fpk0VBuV2l/btf6RPuhQwKfAdEVkE/sjCL6Z0CEnMaIwV8VTa', 0);

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
  MODIFY `id_comentario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
