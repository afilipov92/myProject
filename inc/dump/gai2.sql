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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `road_signs` (`id`, `latitude`, `longitude`, `number`, `info`, `date`, `id_user`) VALUES
(12, 52.44429426337229, 30.999362468719482, '1_10', '                ', '2015-02-12 16:08:02', 1),
(13, 52.443941124959416, 30.999877452850342, '1_11_1', '                ', '2015-02-12 16:13:32', 1),
(14, 52.44469971509612, 30.999491214752197, '1_11_1', '                ', '2015-02-13 14:45:05', 1),
(15, 52.4461253060454, 31.00942611694336, '1_11_1', '                ', '2015-02-13 14:50:25', 1),
(16, 52.447890882319605, 30.998868942260742, '5_10_1', '                ', '2015-02-13 15:00:35', 1),
(17, 52.44547137097053, 30.992496013641357, '1_11_1', '                ', '2015-02-13 15:39:13', 1),
(18, 52.44205767228136, 30.99522113800049, '2_2', '                ', '2015-02-13 15:39:57', 1),
(19, 52.443117124320686, 31.01043462753296, '1_10', '                ', '2015-02-13 15:42:59', 1),
(20, 52.43838209167545, 31.001036167144775, '1_13', '                ', '2015-02-13 15:50:20', 1),
(21, 52.4469361720563, 30.98417043685913, '2_3_1', '                ', '2015-02-13 15:51:17', 1),
(22, 52.4469361720563, 30.98417043685913, '2_3_1', '                ', '2015-02-13 15:51:19', 1),
(23, 52.4469361720563, 30.98417043685913, '2_3_1', '                ', '2015-02-13 15:51:19', 1),
(24, 52.45218028359611, 31.007966995566676, '1_5', '                ', '2015-02-13 15:51:41', 1);

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_status` int(10) unsigned NOT NULL,
  `hash` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `email`, `password`, `id_status`, `hash`) VALUES
(1, 'administrator', 'afilipov92@gmail.com', '$2y$11$vikGGMUCUPoVxlrKDvLWzOgfQySHY2gGs5jufwiBo.sa1tBeJF1oy', 3, '200ceb26807d6bf99fd6f4f0d1ca54d4'),
(6, 'liluoz', 'liluoz@mail.ru', '$2y$11$sdBSYs14SvD5ZV4N2fcPb.BfaWwYNc8T2ioKGxbovcLprw7ZYvW4e', 3, '84c3b379c5dd996064098430b259c1c3');


ALTER TABLE `road_signs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_road_signs_users` (`id_user`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `road_signs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

ALTER TABLE `road_signs`
ADD CONSTRAINT `fk_road_signs_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
