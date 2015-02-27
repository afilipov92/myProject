SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `gai_users` (
`id` int(10) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_status` int(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gai_users` (`id`, `login`, `email`, `password`, `id_status`) VALUES
(1, 'administrator', 'afilipov92@gmail.com', '$2y$11$vikGGMUCUPoVxlrKDvLWzOgfQySHY2gGs5jufwiBo.sa1tBeJF1oy', 1);

CREATE TABLE IF NOT EXISTS `road_signs` (
`id` int(10) unsigned NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `number` varchar(100) NOT NULL,
  `rotation` int(11) NOT NULL,
  `info` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `road_signs` (`id`, `latitude`, `longitude`, `number`, `rotation`, `info`, `date`, `id_user`) VALUES
(171, 52.44028963274399, 30.997753143310547, '1_3_2', 0, '', '2015-02-27 14:29:13', 1),
(172, 52.445783031675, 31.000285148620605, '1_4_3', -30, '', '2015-02-27 14:29:33', 1),
(173, 52.448607941696345, 30.995736122131348, '1_9', 20, '', '2015-02-27 14:29:27', 1),
(174, 52.43742494587265, 31.006100177764893, '1_31_3', -40, '', '2015-02-27 14:30:01', 1);


ALTER TABLE `gai_users`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `road_signs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_road_signs_users` (`id_user`);


ALTER TABLE `gai_users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `road_signs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE `road_signs`
ADD CONSTRAINT `fk_road_signs_users` FOREIGN KEY (`id_user`) REFERENCES `gai_users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
