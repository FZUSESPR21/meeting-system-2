# Host: localhost  (Version: 5.7.26)
# Date: 2021-03-27 23:49:44
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "forum"
#

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `pcount` varchar(255) DEFAULT NULL,
  `forumid` int(11) NOT NULL,
  `nuseraccount` int(11) DEFAULT NULL,
  `meetid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`forumid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "forum"
#


#
# Structure for table "forumleader"
#

DROP TABLE IF EXISTS `forumleader`;
CREATE TABLE `forumleader` (
  `name` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL,
  `formid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "forumleader"
#


#
# Structure for table "leader"
#

DROP TABLE IF EXISTS `leader`;
CREATE TABLE `leader` (
  `name` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "leader"
#


#
# Structure for table "luntan"
#

DROP TABLE IF EXISTS `luntan`;
CREATE TABLE `luntan` (
  `account` int(11) NOT NULL,
  `bool1` int(2) DEFAULT NULL,
  `bool2` int(2) DEFAULT NULL,
  `bool3` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "luntan"
#

/*!40000 ALTER TABLE `luntan` DISABLE KEYS */;
INSERT INTO `luntan` VALUES (123456,NULL,NULL,NULL),(123456,1,1,0),(123456,1,1,0),(1212012,1,1,0),(1212012,0,0,0),(1212013,1,1,0);
/*!40000 ALTER TABLE `luntan` ENABLE KEYS */;

#
# Structure for table "luntanmsg"
#

DROP TABLE IF EXISTS `luntanmsg`;
CREATE TABLE `luntanmsg` (
  `forumid` int(11) DEFAULT NULL,
  `msgname` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `zhuxi` varchar(255) DEFAULT NULL,
  `xinxi` varchar(255) DEFAULT NULL,
  `jianjie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "luntanmsg"
#

INSERT INTO `luntanmsg` VALUES (1,'北京论坛','洗牌结束，格局重构','2021-03-27 00:00:00','冯浩','信息','北京论坛简介：'),(2,'福州论坛','洗牌结束，格局重构','2021-03-27 00:00:00','庄康泽','信息','福州论坛简介：'),(3,'山西论坛','洗牌结束，格局重构','2021-03-27 00:00:00','陈少彬','信息','山西论坛简介：');

#
# Structure for table "meet"
#

DROP TABLE IF EXISTS `meet`;
CREATE TABLE `meet` (
  `pcount` varchar(255) DEFAULT NULL,
  `btime` datetime DEFAULT NULL,
  `etime` datetime DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "meet"
#


#
# Structure for table "msg"
#

DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `forumid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "msg"
#

/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` VALUES ('主席','北京论坛信息发布','2021-03-27',1),('主席','内容','2021-03-27',1),('主席','热烈欢迎福州论坛开放！','2021-03-27',2);
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;

#
# Structure for table "normaluser"
#

DROP TABLE IF EXISTS `normaluser`;
CREATE TABLE `normaluser` (
  `name` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "normaluser"
#

INSERT INTO `normaluser` VALUES ('冯浩','123456','123456',NULL,123456),('1234567','1234567','1234567','2021-03-27 22:27:49',1234567),('1234567','12345678','12345678','2021-03-27 22:30:06',12345678),('fdh','123456789','123456789','2021-03-27 23:13:59',123456789),('fdh','1234567890','123456','2021-03-27 23:14:44',1234567890),('fdh','121212','121212','2021-03-27 23:15:33',121212),('fdh','11111111','123123','2021-03-27 23:18:47',11111111),('fdh','11111112','121212','2021-03-27 23:19:27',11111112),('fdh','1212120','1212120','2021-03-27 23:22:33',1212120),('fdh','120120','120120','2021-03-27 23:24:34',120120),('fhc','1212012','123456','2021-03-27 23:33:37',1212012),('fhc','1212013','123456','2021-03-27 23:35:45',1212013);

#
# Structure for table "secretary"
#

DROP TABLE IF EXISTS `secretary`;
CREATE TABLE `secretary` (
  `name` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL,
  `forumid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "secretary"
#

