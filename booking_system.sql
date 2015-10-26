-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2015 年 10 月 26 日 10:02
-- サーバのバージョン: 5.5.32
-- PHP のバージョン: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `booking_system`
--
CREATE DATABASE IF NOT EXISTS `booking_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booking_system`;

-- --------------------------------------------------------

--
-- テーブルの構造 `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `appo_date` date NOT NULL,
  `time_id` int(11) NOT NULL,
  `table` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` varchar(64) NOT NULL,
  `total_time` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`id`, `order`, `total_time`, `created`, `modified`) VALUES
(1, 'カット', 1, '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(2, 'カラー', 2, '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(3, 'パーマ', 3, '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(4, 'カット&パーマ', 4, '2015-10-11 00:00:00', '2015-10-11 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- テーブルのデータのダンプ `times`
--

INSERT INTO `times` (`id`, `start_time`, `created`, `modified`) VALUES
(1, '09:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(2, '10:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(3, '11:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(4, '12:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(5, '13:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(6, '14:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(7, '15:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(8, '16:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(9, '17:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00'),
(10, '18:00:00', '2015-10-11 00:00:00', '2015-10-11 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `created`, `modified`) VALUES
(2, 'nanashi@gmail.com', 'nanashi', 'nanashi', '2015-10-15 00:00:00', '2015-10-15 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
