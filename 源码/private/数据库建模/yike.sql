-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 14 日 14:54
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yike`
--

-- --------------------------------------------------------

--
-- 表的结构 `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `catalogue_id` int(11) NOT NULL AUTO_INCREMENT,
  `catalogue_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`catalogue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `catalogue`
--

INSERT INTO `catalogue` (`catalogue_id`, `catalogue_name`) VALUES
(2, '其它'),
(3, '鞋包配饰'),
(4, '手机、配件'),
(5, '电脑、配件'),
(6, '其他数码'),
(7, '二手车'),
(8, '生活日用'),
(9, '美容'),
(10, '图书文具'),
(11, '吃喝玩乐'),
(12, '玩具宠物'),
(13, '虚拟商品'),
(14, '服装');

-- --------------------------------------------------------

--
-- 表的结构 `demandthing`
--

CREATE TABLE IF NOT EXISTS `demandthing` (
  `demandthing_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `catalogue_id` int(11) DEFAULT NULL,
  `demandthing_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `demandthing_detail` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `demandthing_pic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `demandthing_is_deleted` tinyint(1) DEFAULT NULL,
  `demandthing_time` bigint(20) DEFAULT NULL,
  `demandthing_click_count` int(11) DEFAULT NULL,
  `demandthing_money` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`demandthing_id`),
  KEY `FK_demandthing_has_catalogue` (`catalogue_id`),
  KEY `FK_demandthing_status` (`status_id`),
  KEY `FK_user_has_demands` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `message_content` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_read` tinyint(1) NOT NULL,
  `message_is_deleted` tinyint(1) DEFAULT NULL,
  `message_created` bigint(20) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `FK_receive_a_message` (`receiver_id`),
  KEY `FK_send_a_message` (`sender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ownedthing`
--

CREATE TABLE IF NOT EXISTS `ownedthing` (
  `ownthing_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `catalogue_id` int(11) DEFAULT NULL,
  `ownthing_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ownthing_details` varchar(900) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownthing_pic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownthing_is_deleted` tinyint(1) DEFAULT NULL,
  `ownthing_time` bigint(20) DEFAULT NULL,
  `ownthing_click_count` int(11) DEFAULT NULL,
  `ownthing_money` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`ownthing_id`),
  KEY `FK_ownedthing_status` (`status_id`),
  KEY `FK_ownthing_has_catalogue` (`catalogue_id`),
  KEY `FK_user_owned_things` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status_describe` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='取值：闲置中、交易中、已交易' AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_describe`) VALUES
(10, '未交易', '未交易'),
(20, '交易中', '交易中'),
(30, '已交易', '已交易');

-- --------------------------------------------------------

--
-- 表的结构 `swapmap`
--

CREATE TABLE IF NOT EXISTS `swapmap` (
  `swap_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `ownthing_id` int(11) NOT NULL,
  `demandthing_id` int(11) NOT NULL,
  PRIMARY KEY (`swap_id`),
  KEY `FK_demandthing_link_map` (`demandthing_id`),
  KEY `FK_map_status` (`status_id`),
  KEY `FK_ownedthing_link_map2` (`ownthing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `screan_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pwd` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longphone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shortphone` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `qq` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_is_deleted` tinyint(1) DEFAULT NULL,
  `last_login_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_time` bigint(20) DEFAULT NULL,
  `user_join_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user_name 和 email 要是惟一的。' AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `demandthing`
--
ALTER TABLE `demandthing`
  ADD CONSTRAINT `FK_user_has_demands` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_demandthing_has_catalogue` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue` (`catalogue_id`),
  ADD CONSTRAINT `FK_demandthing_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- 限制表 `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_send_a_message` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_receive_a_message` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`user_id`);

--
-- 限制表 `ownedthing`
--
ALTER TABLE `ownedthing`
  ADD CONSTRAINT `FK_user_owned_things` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK_ownedthing_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `FK_ownthing_has_catalogue` FOREIGN KEY (`catalogue_id`) REFERENCES `catalogue` (`catalogue_id`);

--
-- 限制表 `swapmap`
--
ALTER TABLE `swapmap`
  ADD CONSTRAINT `FK_ownedthing_link_map2` FOREIGN KEY (`ownthing_id`) REFERENCES `ownedthing` (`ownthing_id`),
  ADD CONSTRAINT `FK_demandthing_link_map` FOREIGN KEY (`demandthing_id`) REFERENCES `demandthing` (`demandthing_id`),
  ADD CONSTRAINT `FK_map_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
