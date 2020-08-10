-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `ci_student_management` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ci_student_management`;

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `students` (`id`, `first_name`, `last_name`, `dob`, `gender`, `created_at`, `updated_at`) VALUES
(6,	'divya',	'mehta',	'1995-12-07',	'female',	'2020-08-09 23:01:21',	'2020-08-10 22:46:28'),
(7,	'ajay',	'tagore',	'1990-10-10',	'male',	'2020-08-10 21:47:22',	'2020-08-10 22:45:23');

-- 2020-08-10 17:43:56
