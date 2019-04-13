-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2019 a las 01:12:04
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `red_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `CodAm` int(11) NOT NULL,
  `usua_enviador` int(11) DEFAULT NULL,
  `usua_receptor` int(11) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `solicitud` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`CodAm`, `usua_enviador`, `usua_receptor`, `status`, `solicitud`) VALUES
(1, 3, 4, b'1', b'1'),
(2, 5, 3, b'1', b'1'),
(3, 7, 6, b'1', b'1'),
(4, 8, 6, b'1', b'1'),
(5, 9, 6, b'1', b'1'),
(6, 10, 6, b'0', b'1'),
(7, 11, 6, b'1', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `CodCom` int(11) NOT NULL,
  `comentario` text,
  `CodPost` int(11) DEFAULT NULL,
  `CodUsua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`CodCom`, `comentario`, `CodPost`, `CodUsua`) VALUES
(1, 'Hola', 1, 3),
(2, 'como estas', 1, 5),
(3, 'No quiero que Apu salga de la serie de los Simpson', 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mg`
--

CREATE TABLE `mg` (
  `CodLike` int(11) NOT NULL,
  `CodPost` int(11) DEFAULT NULL,
  `CodUsua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mg`
--

INSERT INTO `mg` (`CodLike`, `CodPost`, `CodUsua`) VALUES
(1, 1, 3),
(2, 1, 5),
(3, 1, 5),
(4, 3, 6),
(5, 4, 7),
(6, 5, 6),
(7, 4, 6),
(8, 4, 8),
(9, 6, 8),
(10, 7, 6),
(11, 7, 7),
(12, 3, 7),
(13, 6, 6),
(14, 7, 9),
(15, 4, 9),
(16, 3, 9),
(17, 9, 6),
(18, 7, 10),
(19, 4, 10),
(20, 3, 10),
(21, 11, 7),
(22, 10, 7),
(23, 11, 6),
(24, 8, 9),
(25, 9, 9),
(26, 8, 6),
(27, 10, 6),
(28, 6, 6),
(29, 6, 6),
(30, 12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `CodNot` int(11) NOT NULL,
  `accion` bit(1) DEFAULT NULL,
  `visto` bit(1) DEFAULT NULL,
  `CodPost` int(11) DEFAULT NULL,
  `CodUsua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`CodNot`, `accion`, `visto`, `CodPost`, `CodUsua`) VALUES
(2, b'1', b'1', 1, 3),
(3, b'0', b'1', 1, 5),
(4, b'0', b'1', 1, 5),
(5, b'1', b'1', 1, 5),
(6, b'0', b'1', 3, 6),
(7, b'0', b'1', 4, 7),
(8, b'0', b'1', 5, 6),
(9, b'1', b'1', 5, 6),
(10, b'0', b'1', 4, 6),
(11, b'0', b'1', 4, 8),
(12, b'0', b'0', 6, 8),
(13, b'0', b'1', 7, 6),
(14, b'0', b'1', 7, 7),
(15, b'0', b'1', 3, 7),
(16, b'0', b'0', 6, 6),
(17, b'0', b'1', 7, 9),
(18, b'0', b'1', 4, 9),
(19, b'0', b'1', 3, 9),
(20, b'0', b'1', 9, 6),
(21, b'0', b'1', 7, 10),
(22, b'0', b'1', 4, 10),
(23, b'0', b'1', 3, 10),
(24, b'0', b'1', 11, 7),
(25, b'0', b'1', 10, 7),
(26, b'0', b'1', 11, 6),
(27, b'0', b'1', 8, 9),
(28, b'0', b'1', 9, 9),
(29, b'0', b'1', 8, 6),
(30, b'0', b'1', 10, 6),
(31, b'0', b'0', 6, 6),
(32, b'0', b'0', 6, 6),
(33, b'0', b'1', 12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `CodPost` int(11) NOT NULL,
  `contenido` text,
  `img` varchar(200) DEFAULT NULL,
  `CodUsua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`CodPost`, `contenido`, `img`, `CodUsua`) VALUES
(1, 'Imagen de prueba', 'subidos/fondo.jpg', 3),
(2, 'Me encanta comer', 'subidos/homer-simpson.jpg', 3),
(3, 'Recuerdo de aquella vez en el Marmol', 'subidos/braylin_payano_14583506_1256375001085993_1686563778021294080_n.jpg', 6),
(4, 'Holaaa', 'subidos/life.jpg', 6),
(5, 'Apu', 'subidos/apu-cbb2949caaa57372a3cb8a3b57e7541f-1200x600.jpg', 7),
(6, 'Que hay de nuevo hermano', 'subidos/bender.jpg', 8),
(7, 'Desde esta misma noche a las 12 A:M Solo pensare en la pelÃ­cula de Coco hasta maÃ±ana', 'subidos/920x920.jpg', 6),
(8, 'Recuerdame ', 'subidos/', 9),
(9, 'Homero Simpson', 'subidos/homer.jpg', 9),
(10, 'hola', 'subidos/Ahora - Ana Gabriel.mp3', 6),
(11, 'Sol de las montaÃ±as', 'subidos/braylin_payano_15802565_1805560056379614_3479026923982553088_n.jpg', 6),
(12, 'Hola', 'subidos/71902270-los-niÃ±os-van-a-la-caricatura-de-la-escuela.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CodUsua` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `profesion` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CodUsua`, `nombre`, `usuario`, `pass`, `pais`, `profesion`, `edad`, `foto_perfil`) VALUES
(3, 'Homero simpson', 'homero', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Estados Unidos', 'Abogado', 21, 'subidos/3195385_640px.jpg'),
(4, 'Lisa Simpson', 'lisa', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Estados Unidos', 'Profesor', 25, 'img/sin foto de perfil.jpg'),
(5, 'Bart simpson', 'bart', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Estados Unidos', 'Doctor', 29, 'img/sin foto de perfil.jpg'),
(6, 'Braylin', 'braylin16', 'e5366ddd878c9ab29ae416b51207ff82bc7ab89036c613d82791df3cfaca8a78da75572e4f9036f5673be6e156b9f3aa3ab8689d84fb38ea06bb577c9f81d8a4', 'RepÃºblica Dominicana', 'Desarrollador Web', 20, 'subidos/life.jpg'),
(7, 'Carlos', 'carlos19', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Estados Unidos', 'Mesero', 30, 'subidos/bender.jpg'),
(8, 'Bender', 'bender20', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Jamaica', 'Caricatura', 10, 'subidos/bender.jpg'),
(9, 'Prieto', 'prieto23', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'RepÃºblica Dominicana', 'YouTuber', 17, 'subidos/homer.jpg'),
(10, 'Julio Cesar', 'julioC14', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'Puerto Rico', 'Ingeniero', 35, 'img/sin foto de perfil.jpg'),
(11, 'darlin@darlin.com', 'darlin002', 'e13efc991a9bf44bbb4da87cdbb725240184585ccaf270523170e008cf2a3b85f45f86c3da647f69780fb9e971caf5437b3d06d418355a68c9760c70a31d05c7', 'RepÃºblica Dominicana', 'Bloggero', 16, 'img/sin foto de perfil.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`CodAm`),
  ADD KEY `usua_enviador` (`usua_enviador`),
  ADD KEY `usua_receptor` (`usua_receptor`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`CodCom`),
  ADD KEY `CodUsua` (`CodUsua`),
  ADD KEY `CodPost` (`CodPost`);

--
-- Indices de la tabla `mg`
--
ALTER TABLE `mg`
  ADD PRIMARY KEY (`CodLike`),
  ADD KEY `CodUsua` (`CodUsua`),
  ADD KEY `CodPost` (`CodPost`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`CodNot`),
  ADD KEY `CodUsua` (`CodUsua`),
  ADD KEY `fk_post` (`CodPost`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`CodPost`),
  ADD KEY `CodUsua` (`CodUsua`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CodUsua`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `CodAm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `CodCom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mg`
--
ALTER TABLE `mg`
  MODIFY `CodLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `CodNot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `CodPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `CodUsua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`usua_enviador`) REFERENCES `usuarios` (`CodUsua`),
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`usua_receptor`) REFERENCES `usuarios` (`CodUsua`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`CodUsua`) REFERENCES `usuarios` (`CodUsua`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`CodPost`) REFERENCES `post` (`CodPost`);

--
-- Filtros para la tabla `mg`
--
ALTER TABLE `mg`
  ADD CONSTRAINT `mg_ibfk_1` FOREIGN KEY (`CodUsua`) REFERENCES `usuarios` (`CodUsua`),
  ADD CONSTRAINT `mg_ibfk_2` FOREIGN KEY (`CodPost`) REFERENCES `post` (`CodPost`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_post` FOREIGN KEY (`CodPost`) REFERENCES `post` (`CodPost`),
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`CodUsua`) REFERENCES `usuarios` (`CodUsua`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`CodUsua`) REFERENCES `usuarios` (`CodUsua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
