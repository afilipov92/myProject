SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `road_signs` (
`id` int(10) unsigned NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `number` varchar(100) NOT NULL,
  `info` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `road_signs` (`id`, `latitude`, `longitude`, `number`, `info`, `date`, `id_user`) VALUES
(12, 52.44429426337229, 30.999362468719482, '1_10', '                ', '2015-02-12 16:08:02', 1),
(13, 52.443941124959416, 30.999877452850342, '1_11_1', '                ', '2015-02-12 16:13:32', 1);

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_status` int(10) unsigned NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `email`, `password`, `id_status`, `hash`) VALUES
(1, 'administrator', 'afilipov92@gmail.com', '$2y$11$vikGGMUCUPoVxlrKDvLWzOgfQySHY2gGs5jufwiBo.sa1tBeJF1oy', 3, '200ceb26807d6bf99fd6f4f0d1ca54d4'),
(2, 'al.oz2015', 'liluoz@mail.ru', '$2y$11$J.4Z0oHydKKf4U5HhSJw4O8QpF8G7zxTRKqQ799L8ieE/uS2J2jFq', 3, 'afc2e390c56f270820b3e324a8360bd2');


ALTER TABLE `road_signs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_road_signs_users` (`id_user`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `road_signs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `road_signs`
ADD CONSTRAINT `fk_road_signs_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
