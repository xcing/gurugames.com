-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.0.51b-community-nt-log - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             7.0.0.4370
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table gurugames.article
DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `articleId` int(10) NOT NULL auto_increment,
  `ordinal` int(4) default NULL,
  `type` tinyint(1) NOT NULL default '1' COMMENT '1= ข่าวอัพเดท, 2 = โปรโมชั่น',
  `contentId` int(10) default NULL,
  `gameId` int(10) default NULL,
  `showType` tinyint(1) NOT NULL default '0' COMMENT '0 = show all, 1 = show only mainweb, 2 = show only game web',
  `commentType` tinyint(1) NOT NULL default '0' COMMENT '0 = can''t comment, 1 = can comment',
  PRIMARY KEY  (`articleId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.article: 7 rows
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`articleId`, `ordinal`, `type`, `contentId`, `gameId`, `showType`, `commentType`) VALUES
	(1, 3, 1, 1, 1, 0, 0),
	(2, 1, 1, NULL, 1, 0, 0),
	(3, 2, 1, NULL, 1, 0, 0),
	(4, 1, 2, NULL, 1, 0, 0),
	(5, 1, 1, NULL, 2, 0, 0),
	(6, 2, 2, NULL, 2, 0, 0),
	(7, 1, 2, NULL, 2, 0, 0);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;


-- Dumping structure for table gurugames.authassignment
DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.authassignment: 3 rows
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
	('Game', '1', NULL, NULL),
	('User', '1', NULL, NULL),
	('General', '1', NULL, NULL);
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;


-- Dumping structure for table gurugames.authitem
DROP TABLE IF EXISTS `authitem`;
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.authitem: 6 rows
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
	('Game', 2, 'Game', NULL, 'N;'),
	('Game_Module', 1, 'Game_Module', NULL, 'N;'),
	('General_Module', 1, 'General_Module', NULL, 'N;'),
	('User_Module', 1, 'User_Module', NULL, 'N;'),
	('User', 2, 'User', NULL, 'N;'),
	('General', 2, 'General', NULL, 'N;');
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;


-- Dumping structure for table gurugames.authitemchild
DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY  (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.authitemchild: 3 rows
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
INSERT INTO `authitemchild` (`parent`, `child`) VALUES
	('Game', 'Game_Module'),
	('General', 'General_Module'),
	('User', 'User_Module');
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;


-- Dumping structure for table gurugames.comment
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(10) NOT NULL auto_increment,
  `detail` varchar(500) NOT NULL,
  `articleId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `dateCreate` datetime NOT NULL,
  PRIMARY KEY  (`commentId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.comment: 1 rows
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`commentId`, `detail`, `articleId`, `userId`, `dateCreate`) VALUES
	(1, 'asaasasasasas', 1, 1, '2014-06-05 15:59:00');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;


-- Dumping structure for table gurugames.content
DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `contentId` int(10) NOT NULL auto_increment,
  `title` varchar(150) NOT NULL,
  `image` varchar(150) default NULL,
  `detail` text,
  `shortDetail` varchar(300) default NULL,
  `gameId` int(10) default NULL,
  `userCreate` int(10) NOT NULL,
  `userUpdate` int(10) NOT NULL,
  `dateCreate` datetime NOT NULL,
  `dateUpdate` datetime NOT NULL,
  PRIMARY KEY  (`contentId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.content: 1 rows
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` (`contentId`, `title`, `image`, `detail`, `shortDetail`, `gameId`, `userCreate`, `userUpdate`, `dateCreate`, `dateUpdate`) VALUES
	(1, 'test', '', '<p>aaa</p>\r\n', 'bbb', 1, 1, 1, '2014-05-28 00:00:00', '2014-05-28 13:20:58');
/*!40000 ALTER TABLE `content` ENABLE KEYS */;


-- Dumping structure for table gurugames.game
DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `gameId` int(10) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `subdomainName` varchar(20) NOT NULL,
  `bgImage` varchar(50) default NULL,
  `themeColorMain` varchar(10) default NULL,
  `themeColor1` varchar(10) default NULL,
  `themeColor2` varchar(10) default NULL,
  PRIMARY KEY  (`gameId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.game: 2 rows
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` (`gameId`, `name`, `subdomainName`, `bgImage`, `themeColorMain`, `themeColor1`, `themeColor2`) VALUES
	(1, 'Dota2', 'dota2', '', '', '', ''),
	(2, 'EOS', 'eos', '', '', '', '');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;


-- Dumping structure for table gurugames.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menuId` int(10) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) default NULL,
  `link` varchar(50) default NULL,
  `position` int(10) NOT NULL default '1' COMMENT '1 = topmenu, 2 = leftmenu',
  `ordinal` int(10) NOT NULL default '0',
  `gameId` int(10) NOT NULL default '0',
  `parentMenuId` int(10) NOT NULL default '0',
  `haveSubMenu` tinyint(1) NOT NULL default '0' COMMENT '0 = not have, 1 = have',
  PRIMARY KEY  (`menuId`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.menu: 19 rows
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`menuId`, `name`, `image`, `link`, `position`, `ordinal`, `gameId`, `parentMenuId`, `haveSubMenu`) VALUES
	(1, 'Hero', '', '', 1, 2, 1, 0, 0),
	(2, 'Item', '', '', 1, 1, 1, 0, 0),
	(13, 'Soul System', '', '', 1, 3, 2, 10, 0),
	(9, 'Home', '', '', 1, 1, 2, 0, 0),
	(10, 'Info', '', '', 1, 2, 2, 0, 1),
	(11, 'Character', '', '', 1, 1, 2, 10, 1),
	(12, 'Job', '', '', 1, 2, 2, 10, 0),
	(14, 'Gem&Rune', '', '', 1, 4, 2, 10, 0),
	(15, 'Auction', '', '', 1, 5, 2, 10, 0),
	(16, 'Mount&Pet', '', '', 1, 6, 2, 10, 0),
	(17, 'Database', '', '', 1, 3, 2, 0, 1),
	(18, 'Item', '', '', 1, 1, 2, 17, 0),
	(19, 'Tip&Trick', '', '', 1, 4, 2, 0, 0),
	(21, 'Image', '', '', 1, 6, 2, 0, 1),
	(22, 'Wallpaper', '', '', 1, 1, 2, 21, 0),
	(23, 'Screenshot', '', '', 1, 2, 2, 21, 0),
	(24, 'Battle System', '', '', 1, 7, 2, 10, 0),
	(25, 'Boss', '', '', 1, 2, 2, 17, 0),
	(26, 'Webboard', '', '', 1, 7, 2, 0, 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table gurugames.rights
DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY  (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.rights: 0 rows
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;


-- Dumping structure for table gurugames.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `md5_password` varchar(50) NOT NULL,
  `displayName` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL default '1' COMMENT '1 = admin, 2 = mod, 3 = general',
  `active` tinyint(1) NOT NULL default '1' COMMENT '1 = active, 0 = inactive',
  `usergroup` enum('SuperAdmin','Admin','Staff','Client') NOT NULL default 'Staff',
  `registerDate` datetime NOT NULL,
  `lastlogin` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table gurugames.user: 1 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `md5_password`, `displayName`, `role`, `active`, `usergroup`, `registerDate`, `lastlogin`) VALUES
	(1, 'admin', 'e75d1bfdf36446670b0395d3a0db86ab', 'admin', 1, 1, 'SuperAdmin', '0000-00-00 00:00:00', '2014-06-09 10:54:11');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
