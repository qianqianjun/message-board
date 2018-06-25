-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-03 10:59:24
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `member`
--

-- --------------------------------------------------------

--
-- 表的结构 `administer`
--

CREATE TABLE IF NOT EXISTS `administer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `major` varchar(20) NOT NULL,
  `qq` varchar(12) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `college` varchar(10) NOT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `administer`
--

INSERT INTO `administer` (`id`, `account`, `password`, `phone`, `major`, `qq`, `sex`, `college`, `state`) VALUES
(1, '1111', 'b59c67bf196a4758191e42f76670ceba', '1111', '1111', '1111', 'ç”·', 'ä¿¡æ¯', 0),
(14, '5555', '6074c6aa3488f3c2dddff2a7ca821aab', '5555', '5555', '5555', 'ç”·', 'ä¿¡æ¯', 0),
(16, '3333', '934b535800b1cba8f96a5d72f72f1611', '3333', '3333', '3333', 'ç”·', 'ä¿¡æ¯', 0),
(20, '8888', 'cf79ae6addba60ad018347359bd144d2', '8888', '8888', '8888', 'å¥³', 'åŒ–å·¥', 0),
(21, '2016014302', '221bc18ba5863a3ad1f41e4cf02d3e6b', '10086', 'è®¡ç®—æœº', '1905946527', 'ç”·', 'ä¿¡æ¯', 0),
(22, '4', 'a87ff679a2f3e71d9181a67b7542122c', '4', '4', '4', 'ç”·', 'ä¿¡æ¯', 0),
(23, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', '3', '3', 'ç”·', 'ä¿¡æ¯', 0),
(24, '2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2', '2', '2', 'ç”·', 'åŒ–å·¥', 0),
(25, '999', 'b706835de79a2b4e80506f582af3676a', '999', '999', '999', 'ç”·', 'ä¿¡æ¯', 0);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `account` varchar(15) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `account`, `content`, `time`) VALUES
(12, '1111', 'çš„äººå‘ç»™vé¢', '2017-04-25 04:11:27'),
(13, '1111', 'ç¬¬ä¸‰æ–¹vçš„', '2017-04-25 04:11:41'),
(14, '5555', 'æˆ‘çš„ç¬¬ä¸€ä¸ªç•™è¨€', '2017-04-25 08:01:17'),
(15, '5555', 'æˆ‘çš„ç¬¬äºŒç•™è¨€', '2017-04-25 08:04:11'),
(17, '1111', 'asdfgh', '2017-04-25 17:14:22'),
(20, '2016014301', 'é«˜è°¦æ˜¯æˆ‘ä»¬çš„å„¿å­', '2017-04-25 18:13:05'),
(21, '3333', 'å‘µå‘µ', '2017-04-26 04:10:25'),
(22, '1111', 'å“ˆå“ˆ', '2017-04-26 04:58:14'),
(23, '1111', 'çš„å®˜æ–¹vsçš„', '2017-04-26 04:58:22'),
(24, '1111', 'çš„æ˜¯', '2017-04-26 04:58:27'),
(31, '4', 'é«˜è°¦å–œæ¬¢', '2017-04-26 16:26:49'),
(32, '999', 'ç¬¬ä¸€ä¸ª', '2017-04-28 09:18:58'),
(34, '66', 'çƒ­å•Šv', '2017-05-02 10:57:47');

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `flag` int(10) NOT NULL,
  `content` text NOT NULL,
  `account` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`id`, `flag`, `content`, `account`) VALUES
(1, 17, 'haha', '1111'),
(3, 17, 'å‘µå‘µå¤§', '1111'),
(4, 20, 'è¯´çš„çœŸæ£’', '2016014301'),
(5, 20, 'æˆ‘è‰æ³¥é©¬', '1111'),
(6, 15, 'ç¬¬ä¸€ä¸ªåœ¨å“ªï¼Ÿ', '2222'),
(7, 12, 'å“ˆå“ˆ', '1111'),
(8, 13, 'æµ‹è¯•', '1111'),
(9, 21, 'å¤§èƒ†', '1111'),
(10, 30, 'å“¥å“¥', '1111'),
(11, 17, '222223', '1111'),
(12, 31, '44444444', '1111'),
(13, 31, 'gaoqianhaoshuai', '1111'),
(14, 31, '3', '3'),
(15, 23, 'h', '1111'),
(16, 23, 'h', '1111'),
(17, 24, 'haha', '1111'),
(18, 32, 'å“ˆå“ˆ', '999'),
(19, 34, 'å‘µå‘µ', '66');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `major` varchar(20) NOT NULL,
  `qq` varchar(12) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `college` varchar(10) NOT NULL,
  `state` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `phone`, `major`, `qq`, `sex`, `college`, `state`) VALUES
(1, '1111', 'b59c67bf196a4758191e42f76670ceba', '1111', '1111', '1111', 'ç”·', 'ä¿¡æ¯', 0),
(14, '5555', '6074c6aa3488f3c2dddff2a7ca821aab', '5555', '5555', '5555', 'ç”·', 'ä¿¡æ¯', 0),
(15, '2222', '934b535800b1cba8f96a5d72f72f1611', '2222', '2222', '2222', 'ç”·', 'ä¿¡æ¯', 0),
(16, '3333', '934b535800b1cba8f96a5d72f72f1611', '3333', '3333', '3333', 'ç”·', 'ä¿¡æ¯', 0),
(17, '4444', 'dbc4d84bfcfe2284ba11beffb853a8c4', '4444', '4444', '4444', 'ç”·', 'ä¿¡æ¯', 0),
(18, '6666', 'e9510081ac30ffa83f10b68cde1cac07', '6666', '6666', '6666', 'ç”·', 'ä¿¡æ¯', 0),
(19, '7777', 'd79c8788088c2193f0244d8f1f36d2db', '7777', '7777', '7777', 'ç”·', 'ä¿¡æ¯', 0),
(20, '8888', 'cf79ae6addba60ad018347359bd144d2', '8888', '8888', '8888', 'å¥³', 'åŒ–å·¥', 0),
(21, '2016014302', '221bc18ba5863a3ad1f41e4cf02d3e6b', '10086', 'è®¡ç®—æœº', '1905946527', 'ç”·', 'ä¿¡æ¯', 0),
(22, '4', 'a87ff679a2f3e71d9181a67b7542122c', '4', '4', '4', 'ç”·', 'ä¿¡æ¯', 0),
(23, '3', 'a87ff679a2f3e71d9181a67b7542122c', '3', '3', '3', 'ç”·', 'ä¿¡æ¯', 0),
(24, '2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '2', '2', '2', 'ç”·', 'åŒ–å·¥', 0),
(25, '999', 'b706835de79a2b4e80506f582af3676a', '999', '999', '999', 'ç”·', 'ä¿¡æ¯', 0),
(26, '9999', 'fa246d0262c3925617b0c72bb20eeb1d', '9999', '9999', '9999', 'ç”·', 'ä¿¡æ¯', 0),
(27, '66', '3295c76acbf4caaed33c36b1b5fc2cb1', '66', '66', '66', 'å¥³', 'åŒ–å·¥', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
