-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 12:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarea`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `animeid` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `capitulos` int(11) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `aired` date DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `studio` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `num_comentarios` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`animeid`, `nombre`, `capitulos`, `genero`, `aired`, `rating`, `tipo`, `studio`, `duration`, `num_comentarios`) VALUES
(10, 'Trigun', 26, 'Action, Sci-Fi, Adventure, Comedy, Drama, Shounen', '1998-04-01', 4, 'TV', 'Madhouse', '24 min. per ep', 0),
(11, 'Cowboy Bebop', 26, 'Action, Adventure, Comedy, Drama, Sci-Fi, Space', '1998-04-03', 2.6, 'TV', 'Sunrise', '24 min. per ep', 0),
(13, 'Monster', 74, 'Drama, Horror, Mystery, Police, Psychological, Seinen, Thriller', '2004-04-07', 1, 'TV', 'Madhouse', '24 min. per ep', 1),
(14, 'Naruto', 220, 'Action, Adventure, Comedy, Super Power, Martial Arts, Shounen', '2002-09-03', 0, 'TV', 'Studio Pierrot', '24 min. per ep', 0),
(15, 'Akira', 1, 'Action, Military, Sci-Fi, Adventure, Horror, Supernatural, Seinen', '1988-07-16', 0, 'Movie', 'Tokyo Movie Shinsha', '2 hr. 4 min.', 1),
(16, 'One Piece', 1024, 'Action, Adventure, Comedy, Super Power, Drama, Fantasy, Shounen', '1999-10-20', 0, 'TV', 'Toei Animation', '24 min. per ep', 0),
(17, 'Rurouni Kenshin: Meiji Kenkaku Romantan', 26, 'Action, Adventure, Comedy, Historical, Romance, Samurai, Shounen', '1996-01-10', 3, 'TV', 'Gallop, Studio Deen', '24 min. per ep', 0),
(18, 'Hunter x Hunter', 62, 'Action, Adventure, Super Power, Fantasy, Shounen', '1999-10-19', 4.5, 'TV', 'Nippon Animation', '2 hr. 4 min.', 2),
(19, 'Mobile Suit Gundam: Chars Counterattack', 1, 'Military, Sci-Fi, Space, Drama, Mecha', '1998-04-03', 0, 'Movie', 'Bandai Entertainment', '1 hr. 59 min.', 0),
(20, 'Fullmetal Alchemist', 51, 'Action, Adventure, Comedy, Drama, Fantasy, Magic, Military, Shounen', '2003-10-04', 0, 'TV', 'Funimation', '24 min. per ep', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_anime`
--

CREATE TABLE `comment_anime` (
  `animeid` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_anime`
--

INSERT INTO `comment_anime` (`animeid`, `content`, `userid`) VALUES
(13, 'Nose no la he visto', 1),
(18, 'la mea serie sis', 2),
(18, 'estoy impactado de tan buena que es +10', 1),
(15, 'muy buena peli', 1);

--
-- Triggers `comment_anime`
--
DELIMITER $$
CREATE TRIGGER `anime_comentarios` AFTER INSERT ON `comment_anime` FOR EACH ROW UPDATE anime
SET num_comentarios = num_comentarios + 1
WHERE animeid = NEW.animeid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `userid` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `animeid` int(11) NOT NULL,
  `nombre_anime` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historial`
--

INSERT INTO `historial` (`userid`, `fecha`, `animeid`, `nombre_anime`) VALUES
(2, '2022-07-18 03:52:26', 11, 'Cowboy Bebop'),
(1, '2022-07-19 03:16:31', 18, 'Hunter x Hunter'),
(1, '2022-07-19 03:16:49', 18, 'Hunter x Hunter'),
(1, '2022-07-19 03:18:32', 18, 'Hunter x Hunter'),
(1, '2022-07-19 03:28:40', 13, 'Monster'),
(1, '2022-07-19 03:46:37', 10, 'Trigun'),
(1, '2022-07-19 03:58:48', 16, 'One Piece'),
(1, '2022-07-20 21:40:03', 15, 'Akira'),
(1, '2022-07-20 21:40:11', 15, 'Akira'),
(3, '2022-07-20 22:14:19', 10, 'Trigun'),
(3, '2022-07-20 22:14:32', 10, 'Trigun'),
(3, '2022-07-20 22:18:29', 17, 'Rurouni Kenshin: Meiji Kenkaku Romantan');

--
-- Triggers `historial`
--
DELIMITER $$
CREATE TRIGGER `anime_histoirial` AFTER INSERT ON `historial` FOR EACH ROW UPDATE usuario
SET num_animes_vistos = num_animes_vistos + 1
WHERE userid = NEW.userid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rate_anime`
--

CREATE TABLE `rate_anime` (
  `userid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `animeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_anime`
--

INSERT INTO `rate_anime` (`userid`, `rate`, `animeid`) VALUES
(1, 5, 11),
(1, 1, 11),
(1, 1, 11),
(1, 1, 11),
(1, 1, 11),
(1, 4, 11),
(1, 4, 11),
(1, 4, 11),
(1, 4, 11),
(1, 1, 11),
(1, 4, 10),
(1, 1, 13),
(3, 4, 18),
(3, 5, 18),
(3, 3, 17);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_5_comentarios`
-- (See below for the actual view)
--
CREATE TABLE `top_5_comentarios` (
`nombre` varchar(255)
,`num_comentarios` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_5_less_popular`
-- (See below for the actual view)
--
CREATE TABLE `top_5_less_popular` (
`nombre` varchar(255)
,`rating` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `top_5_popular`
-- (See below for the actual view)
--
CREATE TABLE `top_5_popular` (
`nombre` varchar(255)
,`rating` float
);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `userid` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `pass` varchar(90) NOT NULL,
  `num_animes_vistos` int(11) DEFAULT 0,
  `num_peliculas_vistos` int(11) DEFAULT 0,
  `num_seguidores` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`userid`, `nombre`, `pass`, `num_animes_vistos`, `num_peliculas_vistos`, `num_seguidores`) VALUES
(1, 'carlos', 'hola', 8, 0, 0),
(2, 'remi', 'lacroix', 1, 0, 0),
(3, 'alberto', 'mayol', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_usuario`
--

CREATE TABLE `usuario_usuario` (
  `user_idone` int(11) NOT NULL,
  `user_idtwo` int(11) NOT NULL,
  `name1` varchar(90) DEFAULT NULL,
  `name2` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario_usuario`
--

INSERT INTO `usuario_usuario` (`user_idone`, `user_idtwo`, `name1`, `name2`) VALUES
(1, 2, 'carlos', 'remi'),
(1, 2, 'carlos', 'remi'),
(1, 2, 'carlos', 'remi'),
(1, 3, 'carlos', 'alberto'),
(3, 1, 'alberto', 'carlos');

-- --------------------------------------------------------

--
-- Structure for view `top_5_comentarios`
--
DROP TABLE IF EXISTS `top_5_comentarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_5_comentarios`  AS SELECT `anime`.`nombre` AS `nombre`, `anime`.`num_comentarios` AS `num_comentarios` FROM `anime` ORDER BY `anime`.`num_comentarios` DESC LIMIT 0, 5  ;

-- --------------------------------------------------------

--
-- Structure for view `top_5_less_popular`
--
DROP TABLE IF EXISTS `top_5_less_popular`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_5_less_popular`  AS SELECT `anime`.`nombre` AS `nombre`, `anime`.`rating` AS `rating` FROM `anime` ORDER BY `anime`.`rating` ASC LIMIT 0, 5  ;

-- --------------------------------------------------------

--
-- Structure for view `top_5_popular`
--
DROP TABLE IF EXISTS `top_5_popular`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top_5_popular`  AS SELECT `anime`.`nombre` AS `nombre`, `anime`.`rating` AS `rating` FROM `anime` ORDER BY `anime`.`rating` DESC LIMIT 0, 5  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`animeid`);

--
-- Indexes for table `comment_anime`
--
ALTER TABLE `comment_anime`
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD KEY `animeid` (`animeid`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `usuario_usuario`
--
ALTER TABLE `usuario_usuario`
  ADD KEY `fk_user_user` (`user_idtwo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `animeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_anime`
--
ALTER TABLE `comment_anime`
  ADD CONSTRAINT `comment_anime_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usuario` (`userid`);

--
-- Constraints for table `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`animeid`) REFERENCES `anime` (`animeid`);

--
-- Constraints for table `usuario_usuario`
--
ALTER TABLE `usuario_usuario`
  ADD CONSTRAINT `fk_user_user` FOREIGN KEY (`user_idtwo`) REFERENCES `usuario` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
