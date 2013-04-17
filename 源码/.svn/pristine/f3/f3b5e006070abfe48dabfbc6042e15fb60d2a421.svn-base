-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2012 年 06 月 18 日 00:37
-- 服务器版本: 5.1.47
-- PHP 版本: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_yike2012`
--

-- --------------------------------------------------------

--
-- 表的结构 `catalogue`
--

CREATE TABLE IF NOT EXISTS `catalogue` (
  `catalogue_id` int(11) NOT NULL AUTO_INCREMENT,
  `catalogue_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`catalogue_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `demandthing`
--

INSERT INTO `demandthing` (`demandthing_id`, `user_id`, `status_id`, `catalogue_id`, `demandthing_title`, `demandthing_detail`, `demandthing_pic`, `demandthing_is_deleted`, `demandthing_time`, `demandthing_click_count`, `demandthing_money`) VALUES
(1, 4, 10, 5, '鼠标', 'RT~~', '', 0, 1339939943, 1, 0.00);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `message`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ownedthing`
--

INSERT INTO `ownedthing` (`ownthing_id`, `status_id`, `user_id`, `catalogue_id`, `ownthing_name`, `ownthing_details`, `ownthing_pic`, `ownthing_is_deleted`, `ownthing_time`, `ownthing_click_count`, `ownthing_money`) VALUES
(1, 10, 3, 5, 'IPAD3苹果原装平板电脑', '<span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">黑色，64G，港行货，带WIFI和4G，因为自己有一台了，所以这台几呼没有怎么用过，跟全新的一样，膜都没有拆开，全套配置都在，发票也在，喜欢的朋友就3800元交易</span>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617211030_39980.jpg', 0, 1339938682, 2, 3800.00),
(2, 10, 3, 5, 'DDR3和DDR2内存条', '<span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">升级换下的DDR3和DDR2内存条，2G和1G，要的换，都是自己升级换下的，品牌内存，绝对保证质量。</span>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617211424_23844.jpg', 0, 1339938890, 1, 0.00),
(3, 10, 3, 5, 'USB无线网卡接收器', '<p>\n	<span style="color:#224155;font-family:宋体, Arial, ''Arial Black'';font-size:14px;font-weight:bold;line-height:normal;text-align:-webkit-left;white-space:normal;">USB无线网卡接收器 300M TP-LINK TL-WN</span>\n</p>\n<p>\n	<span style="color:#224155;font-family:宋体, Arial, ''Arial Black'';font-size:14px;font-weight:bold;line-height:normal;text-align:-webkit-left;white-space:normal;"><span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">东西基本是全新的，现在闲置，需要你就拿走，买和换都行，包装没有了，保证是新的好用。</span><br />\n</span>\n</p>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617211652_60577.jpg', 0, 1339939044, 0, 0.00),
(4, 10, 3, 5, '双飞燕OP-220 鼠标ps/2 鼠标', '<span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">双飞燕OP-220&nbsp;鼠标ps/2&nbsp;鼠标，闲置中</span>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617211812_17987.jpg', 0, 1339939104, 0, 0.00),
(5, 10, 3, 5, '任意伸缩鼠标', '<span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">小巧方便，适合用于笔记本电脑！</span>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617211938_92649.jpg', 0, 1339939191, 0, 0.00),
(6, 10, 4, 9, '迪彩防干枯莹亮啫喱水', '<span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">说是9成新，其实至少95成新，轻盈柔亮，倍感舒适。</span>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617212301_59543.jpg', 0, 1339939393, 1, 0.00),
(7, 10, 4, 9, '魔力丝滑BB霜', '<p style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">\n	露兰姬那&nbsp;蚕丝蛋白系列&nbsp;魔力丝滑保湿BB霜50ml\n</p>\n<p style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">\n	<br />\n</p>\n<p style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">\n	经科学验证，能令肌肤细致光滑的根本---蚕丝蛋白中提取的天然蚕丝蛋白水解精华液，富含多种氨基酸和蛋白质，具有超强渗透力，渗透至肌肤深层，发挥补水保湿、美白修护的卓越功效，令肌肤日渐白、细、滑、弹。\n</p>\n<p style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">\n	<br />\n</p>\n<p style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">\n	多效焕肤&nbsp;出色出采&nbsp;完全没有普通粉底的厚重感，质地轻盈透薄，自然修正肤色，赋予肌肤明亮光采的透明感，轻松遮盖面部粗大毛孔、黑眼圈、斑点瑕疵，缔造细致无暇好肤质。\n</p>\n<p style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">\n	给肌肤超强保护&nbsp;为肌肤筑起抗污染、抗干燥、抗暗黄的超强保护屏障，保护肌肤免受干燥、日照、污染等造成的侵害。\n</p>\n<p style="font-family:宋体, Arial, ''Arial Black'';li', 'http://yike2012-yikeup.stor.sinaapp.com/20120617212431_11108.jpg', 0, 1339939487, 1, 0.00),
(8, 10, 4, 9, '四葉草香水', '<span style="font-family:宋体, Arial, ''Arial Black'';line-height:22px;white-space:normal;">煥發和收藏這溫馨的味道！！！</span>', 'http://yike2012-yikeup.stor.sinaapp.com/20120617212516_16764.jpg', 0, 1339939539, 2, 0.00),
(9, 10, 4, 9, '木梳子', '普通木梳一把~~', 'http://yike2012-yikeup.stor.sinaapp.com/20120617212621_69808.jpg', 0, 1339939605, 0, 0.00),
(10, 10, 4, 10, '求是', '三本~~', 'http://yike2012-yikeup.stor.sinaapp.com/20120617212946_18061.jpg', 0, 1339939803, 0, 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status_describe` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='取值：闲置中、交易中、已交易' AUTO_INCREMENT=31 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `swapmap`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user_name 和 email 要是惟一的。' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `role_id`, `screan_name`, `email`, `user_pwd`, `avatar`, `longphone`, `shortphone`, `sex`, `qq`, `user_is_deleted`, `last_login_ip`, `last_login_time`, `user_join_time`) VALUES
(1, 'Anye', 1, NULL, '', 'd047777220b823703d9454114e1015e9', NULL, '', '', NULL, '', 0, '58.60.63.199', 1339933064, 1339933051),
(2, 'Yike', 1, NULL, '', '6918e9c361c8d23ce95b418894bbf171', NULL, '', '', NULL, '', 0, '58.60.63.199', 1339934725, 1339933318),
(3, 'nonandor', 1, NULL, '', 'ebc5eca33f46ca9acee621ce0735b0eb', NULL, '', '', NULL, '', 0, '58.60.63.199', 1339947341, 1339938208),
(4, 'MM', 1, NULL, '', 'abda327dda3c0ecb8581fef07b8d3eb0', NULL, '', '', NULL, '', 0, '210.39.1.10', 1339939288, 1339939270);
