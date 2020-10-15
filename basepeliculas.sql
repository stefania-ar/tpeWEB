-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2020 a las 19:36:36
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basepeliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(200) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre`) VALUES
(1, 'Terror'),
(2, 'Romance'),
(3, 'Sci-Fi'),
(4, 'Historico'),
(5, 'Fantasia'),
(6, 'Policial'),
(7, 'Aventura'),
(8, 'Accion'),
(9, 'Comedia'),
(10, 'Suspenso'),
(11, 'Drama'),
(12, 'Animacion'),
(19, 'Misterio'),
(20, 'Belico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `titulo` varchar(200) NOT NULL,
  `anio` int(4) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `director_a` varchar(70) NOT NULL,
  `calificacion` int(2) NOT NULL,
  `id` int(200) NOT NULL,
  `id_genero` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`titulo`, `anio`, `pais`, `director_a`, `calificacion`, `id`, `id_genero`) VALUES
('La Monja', 2018, 'Estados Unidos', 'Hardy Corin', 4, 1, 1),
('Annabelle', 2014, 'Estados Unidos', 'Leonetti John', 5, 7, 1),
('Una mujer fantástica', 2017, 'Chile', 'Lelio Sebastián', 9, 11, 11),
('Diario de una Pasión', 2004, 'Estados Unidos', 'Cassavetes Nick', 7, 12, 2),
('A Fall From Grace', 2020, 'Estados Unidos', 'Perry Tyler', 8, 22, 10),
('Ágora', 2009, 'España', 'Amenábar Alejandro', 9, 23, 4),
('Bolt', 2008, 'Estados Unidos', ' Howard, Byron - Williams Chris ', 8, 24, 12),
('Las Vírgenes Suicidas', 1999, 'Estados Unidos', 'Coppola Sofia', 7, 25, 11),
('Camila', 1984, 'Argentina', 'Bemberg, María Luisa', 8, 26, 4),
('Diamante de Sangre', 2006, 'Estados Unidos', 'Zwick, Edward', 9, 27, 7),
('Clueless', 1995, 'Estados Unidos', 'Heckerling, Amy', 9, 28, 9),
('Inocencia interrumpida', 1999, 'Estados Unidos', 'Mangold, James', 10, 29, 11),
('El laberinto del Fauno', 2006, 'España', 'del Toro Guillermo', 9, 32, 5),
('Darkest Hour', 2017, 'Estados Unidos', 'Wright Joe', 8, 33, 11),
('Se7en ', 1995, 'Estados Unidos', 'Fincher David', 9, 35, 6),
('El Fin de los Tiempos', 2008, 'Estados Unidos', 'Shyamalan M Night', 9, 36, 10),
('El Francotirador', 2014, 'Estados Unidos', 'Eastwood Clint', 5, 37, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `tipo_usuario`) VALUES
(1, 'usuario', '$2y$12$l8p9Bk7KODJdEpCDCqLZZ.2aB8G9SlXfK/t1YW6KcMbkwD5adlOAq', 1),
(2, 'normal', '$2y$12$xjhM3ukO7CWG72Xz.C2S5ecu7TV3wdYgH3AN2CY3WkC5eFDVukOr2', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
