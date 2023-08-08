CREATE TABLE `board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);