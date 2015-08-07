-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.37-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.0.0.4464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица forms.lc.area
CREATE TABLE IF NOT EXISTS `area` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forms.lc.area: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT IGNORE INTO `area` (`id`, `name`) VALUES
	(1, 'Район 1'),
	(2, 'Район 2'),
	(3, 'Район 3');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;


-- Дамп структуры для таблица forms.lc.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area` (`area_id`),
  CONSTRAINT `area` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forms.lc.city: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT IGNORE INTO `city` (`id`, `area_id`, `name`) VALUES
	(1, 1, 'Город 1'),
	(2, 1, 'Город 2'),
	(3, 2, 'Город 3'),
	(4, 2, 'Город 4'),
	(5, 3, 'Город 5');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Дамп структуры для таблица forms.lc.documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `area` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `contribution` varchar(50) NOT NULL,
  `need` varchar(50) NOT NULL,
  `analysis` text NOT NULL,
  `datetime` datetime NOT NULL,
  `state` enum('Save','Inquiry','Access') NOT NULL DEFAULT 'Save',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forms.lc.documents: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT IGNORE INTO `documents` (`id`, `user_id`, `name`, `city`, `area`, `amount`, `contribution`, `need`, `analysis`, `datetime`, `state`) VALUES
	(1, 2, 'Заявка 1', '2', 1, 123, '22', '101', '123', '2015-07-20 17:57:12', 'Save');
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;


-- Дамп структуры для таблица forms.lc.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `doc_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `state` enum('WAIT','DONE') NOT NULL DEFAULT 'WAIT',
  `state_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `documents` (`doc_id`),
  CONSTRAINT `documents` FOREIGN KEY (`doc_id`) REFERENCES `documents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forms.lc.requests: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT IGNORE INTO `requests` (`id`, `user_id`, `doc_id`, `comment`, `state`, `state_time`) VALUES
	(1, 2, 1, '123', 'DONE', '2015-07-20 17:57:20');
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;


-- Дамп структуры для таблица forms.lc.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(128) NOT NULL,
  `realName` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы forms.lc.user: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`id`, `login`, `realName`, `password`, `email`, `role`) VALUES
	(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', 'administrator'),
	(2, 'user', '1', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@localhost', 'user'),
	(3, 'user2', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@mail', 'user'),
	(4, 'user3', 'user3', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@mail', 'user'),
	(6, 'user5', 'asd', '0a791842f52a0acfbb3a783378c066b8', 'qwe@main', 'user'),
	(7, 'user6', '1', 'ee11cbb19052e40b07aac0ca060c23ee', '1@aa', 'user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
