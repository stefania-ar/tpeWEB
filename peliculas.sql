-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 23:33:37
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

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
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `titulo` varchar(200) NOT NULL,
  `anio` int(4) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `director_a` varchar(70) NOT NULL,
  `calificacion` int(2) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `id` int(200) NOT NULL,
  `id_genero` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`titulo`, `anio`, `pais`, `director_a`, `calificacion`, `imagen`, `id`, `id_genero`) VALUES
('La Monja', 2018, 'Estados Unidos', 'Hardy Corin', 4, '', 1, 1),
('Annabelle', 2014, 'Estados Unidos', 'Leonetti John', 5, '', 7, 1),
('Una mujer fantástica', 2017, 'Chile', 'Lelio Sebastián', 9, '', 11, 11),
('Diario de una Pasión', 2004, 'Estados Unidos', 'Cassavetes Nick', 7, '', 12, 2),
('A Fall From Grace', 2020, 'Estados Unidos', 'Perry Tyler', 8, '', 22, 10),
('Ágora', 2009, 'España', 'Amenábar Alejandro', 9, '', 23, 4),
('Bolt', 2008, 'Estados Unidos', ' Howard, Byron - Williams Chris ', 8, './imagenes/5fcbfb9f883321.51774454.jpg', 24, 12),
('Las Vírgenes Suicidas', 1999, 'Estados Unidos', 'Coppola Sofia', 7, '', 25, 11),
('Camila', 1984, 'Argentina', 'Bemberg, María Luisa', 8, '', 26, 4),
('Diamante de Sangre', 2006, 'Estados Unidos', 'Zwick, Edward', 9, '', 27, 7),
('Clueless', 1995, 'Estados Unidos', 'Heckerling, Amy', 9, '', 28, 9),
('Inocencia interrumpida', 1999, 'Estados Unidos', 'Mangold, James', 10, '', 29, 11),
('El laberinto del Fauno', 2006, 'España', 'del Toro Guillermo', 9, '', 32, 5),
('Darkest Hour', 2017, 'Estados Unidos', 'Wright Joe', 8, '', 33, 11),
('Se7en ', 1995, 'Estados Unidos', 'Fincher David', 9, '', 35, 6),
('El Fin de los Tiempos', 2008, 'Estados Unidos', 'Shyamalan M Night', 9, '', 36, 10),
('El Francotirador', 2014, 'Estados Unidos', 'Eastwood Clint', 5, '', 37, 20),
('Viaje al Centro de la Tierra', 2008, 'Estados Unidos', 'Brevig Eric', 7, './imagenes/5fbb1d2a5de688.53148313.jpg', 45, 7),
('Parasite', 2019, 'España', 'Bong Joon-ho', 9, '', 46, 10),
('1917', 2019, 'Inglaterra', 'Mendes Sam', 5, '', 47, 20),
('El Viaje de Chihiro', 2001, 'Japon', 'Hayao Miyazaki', 10, './imagenes/5fc2b0fdeda541.47045705.jpg', 48, 12),
('El Castillo Ambulante', 2004, 'Japon', 'Hayao Miyazaki', 10, './imagenes/5fc2b179ae8913.91477213.jpg', 49, 12),
('La Masacre de Texas', 2003, 'Estados Unidos', 'Nispel Marcus', 8, '', 50, 1),
('Operacion Monumento', 2014, 'Estados Unidos', 'Clooney George', 7, '', 51, 20),
('Los Juegos del Hambre: Sinsajo Pt 2', 2015, 'Estados Unidos', 'Lawrence Francis', 8, '', 52, 8),
('Passengers', 2016, 'Estados Unidos', 'Tyldum Morten', 7, '', 53, 3),
('Gravity', 2013, 'Estados Unidos', 'Cuaron Alfonso', 8, '', 55, 10),
('Eterno resplandor de una mente sin recuerdos', 2004, 'Estados Unidos', 'Gondry Michel', 7, '', 56, 3),
('The Truman Show', 1998, 'Estados Unidos', 'Weir Peter', 8, '', 57, 11),
('Todopoderoso', 2003, 'Estados Unidos', 'Shadyac Tom', 8, '', 58, 9),
('El Grinch', 2000, 'Estados Unidos', 'Howard Ron', 7, '', 59, 5),
('Pulp Fiction', 1984, 'Estados Unidos', 'Tarantino Quentin', 7, '', 60, 11),
('Al final del Tunel', 2016, 'Argentina', 'Grande Rodrigo', 7, '', 61, 10),
('El Secreto de sus Ojos', 2009, 'Argentina', 'Campanella Juan Jose', 6, '', 62, 19),
('Apocalipsis Now', 1979, 'Estados Unidos', 'Coppola Francis', 8, '', 63, 20),
('The Suffragettes', 2015, 'Inglaterra', 'Gavron Sarah', 10, '', 64, 4),
('Akira', 1988, 'Japon', 'Otomo Katsuhiro', 7, '', 65, 3),
('The Hateful Eight', 2015, 'Estados Unidos', 'Tarantino', 5, '', 66, 19),
('War Horse', 2011, 'Inglaterra', 'Spielberg Steven', 6, '', 67, 20),
('Troya', 2004, 'Estados Unidos', 'Petersen Wolfgang', 5, '', 68, 20),
('Tiburon', 1975, 'Estados Unidos', 'Spielberg Steven', 6, '', 69, 10),
('ET', 1982, 'Estados Unidos', 'Spielberg Steven', 9, '', 70, 3),
('Gladiador', 2000, 'Estados Unidos', 'Scott Ridley', 7, '', 71, 11),
('La guerra de los Mundos', 2005, 'Estados Unidos', 'Spielberg Steven', 8, '', 72, 3),
('Dia de la Independencia', 1996, 'Estados Unidos', 'Emmerich Roland', 6, '', 73, 3),
('Busqueda Implacable', 2008, 'Estados Unidos', 'Morel Pierre', 9, '', 74, 8),
('El Transportador', 2002, 'Estados Unidos', 'Leterrier Louis', 8, '', 75, 8),
('Colombiana', 2011, 'Inglaterra', 'Megaton Oliver', 7, '', 76, 10),
('Una esposa de mentira', 2011, 'Estados Unidos', 'Dugan Dennis', 7, '', 77, 9),
('La Cabaña en el Bosque', 2011, 'Estados Unidos', 'Goddard Drew', 7, '', 78, 9),
('Peloton', 1986, 'Estados Unidos', 'Stone Oliver', 6, '', 79, 20),
('Scarface', 1983, 'Estados Unidos', 'De Palma Brian', 6, '', 80, 11),
('Kill Bill', 2003, 'Estados Unidos', 'Tarantino Quentin', 6, '', 81, 8),
('Son como Niños', 2010, 'Argentina', 'Dugan Dennis', 8, '', 82, 9),
('Los Miserables', 1998, 'Estados Unidos', 'August Billie', 10, '', 83, 11),
('El dia despues de Mañana', 2004, 'Estados Unidos', 'Emmerich Roland', 8, '', 84, 7),
('Perdida', 2014, 'Estados Unidos', 'Fincher David', 8, '', 85, 19),
('La chica del Tren', 2016, 'Estados Unidos', 'Taylor Tate', 7, '', 86, 19),
('La Cordillera', 2017, 'Argentina', 'Mitre Santiago', 7, '', 87, 11),
('Jurassic Park', 1993, 'Estados Unidos', 'Spielberg Steven', 8, '', 88, 7),
('Joker', 2019, 'Estados Unidos', 'Phillips Todd', 7, '', 89, 11),
('Hidden Figures', 2016, 'Estados Unidos', 'Melfi Theodore', 9, '', 90, 4),
('Fragmentado', 2016, 'Estados Unidos', 'Shyamalan M Night', 9, '', 91, 10),
('Secretos Ocultos', 2017, 'Estados Unidos', 'Sanchez Sergio', 7, '', 92, 1),
('El protegido', 2000, 'Estados Unidos', 'Shyamalan M Night', 7, '', 93, 10),
('Dirty Dancing', 1987, 'Estados Unidos', 'Ardolino Emile', 9, '', 94, 2),
('Ritmo y Seduccion', 2006, 'Estados Unidos', 'Friedlander Liz', 9, '', 95, 2),
('El Gato con Botas', 2011, 'Estados Unidos', 'miller Chris', 9, '', 96, 12),
('Evita', 1996, 'Estados Unidos', 'Parker Alan', 9, '', 97, 11),
('La Leyenda del Zorro', 2005, 'Estados Unidos', 'Campbell Martin', 7, '', 98, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
