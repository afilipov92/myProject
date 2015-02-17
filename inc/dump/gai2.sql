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
  `rotation` int(11) NOT NULL,
  `info` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

INSERT INTO `road_signs` (`id`, `latitude`, `longitude`, `number`, `rotation`, `info`, `date`, `id_user`) VALUES
(33, 52.44380810289314, 31.000349521636963, '1_11_1', 20, '                ', '2015-02-17 12:53:28', 1),
(34, 52.44450129993606, 31.003739833831787, '1_11_1', 0, '                ', '2015-02-17 13:03:05', 1),
(35, 52.4443312714823, 30.99989891052246, '1_2', 0, '                ', '2015-02-17 17:12:05', 1),
(36, 52.442264719356324, 30.998718738555908, '2_5', 0, '                ', '2015-02-17 17:12:56', 1);

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
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

ALTER TABLE `road_signs`
ADD CONSTRAINT `fk_road_signs_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
