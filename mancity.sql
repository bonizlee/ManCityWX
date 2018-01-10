DROP TABLE IF EXISTS `draw`;
CREATE TABLE `draw` (
  `drawId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`drawId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `enroll`;
CREATE TABLE `enroll` (
  `enrollId` int(11) NOT NULL AUTO_INCREMENT,
  `pName` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `idno` varchar(255) DEFAULT NULL COMMENT 'id card last 8 number',
  `wxid` varchar(255) DEFAULT NULL,
  `drawId` int(11) DEFAULT NULL,
  `eDate` datetime DEFAULT NULL,
  PRIMARY KEY (`enrollId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


