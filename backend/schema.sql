SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Workshops`;
CREATE TABLE `Workshops` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(500) NOT NULL,
  `Description` longtext NOT NULL,
  `Poster_image` varchar(500) NOT NULL,
  `icon` varchar(500) NOT NULL DEFAULT 'nil',
  `category` boolean  DEFAULT 0, 
  `register_link` varchar(500) DEFAULT '#' , 
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
