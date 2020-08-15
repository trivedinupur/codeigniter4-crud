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
(7,	'ajay',	'tagore',	'1990-10-10',	'male',	'2020-08-10 21:47:22',	'2020-08-10 22:45:23'),
(8,	'test',	'test',	'1990-11-11',	'female',	'2020-08-11 19:30:24',	'2020-08-15 10:10:20');

DROP TABLE IF EXISTS `test_migrations`;
CREATE TABLE `test_migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `test_students`;
CREATE TABLE `test_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `test_students` (`id`, `first_name`, `last_name`, `dob`, `gender`, `created_at`, `updated_at`) VALUES
(6,	'divya',	'mehta',	'1995-12-07',	'female',	'2020-08-09 23:01:21',	'2020-08-10 22:46:28'),
(7,	'ajay',	'tagore',	'1990-10-10',	'male',	'2020-08-10 21:47:22',	'2020-08-10 22:45:23'),
(8,	'test',	'test',	'1990-11-11',	'female',	'2020-08-11 19:30:24',	'2020-08-15 10:10:20'),
(9,	'batuk',	'trivedi',	'1998-12-18',	'female',	'2020-08-15 10:12:58',	'2020-08-15 10:14:50'),
(29,	'test',	'test',	'1990-10-12',	'female',	'2020-08-15 14:57:56',	'2020-08-15 14:57:56'),
(30,	'test',	'test',	'1990-10-12',	'female',	'2020-08-15 14:59:35',	'2020-08-15 14:59:35'),
(31,	'test',	'test',	'1990-10-12',	'female',	'2020-08-15 15:01:42',	'2020-08-15 15:01:42'),
(32,	'test',	'test',	'1990-10-12',	'female',	'2020-08-15 15:02:34',	'2020-08-15 15:02:34');

-- 2020-08-15 09:35:03
