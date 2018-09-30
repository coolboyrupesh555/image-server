DROP DATABASE IF EXISTS userimage;

CREATE DATABASE userimage;

USE userimage;

DROP TABLE IF EXISTS `usermaster`;
CREATE TABLE `usermaster` (
`userid` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) DEFAULT NULL,
`password` varchar(255) DEFAULT NULL,
`email` varchar(255) DEFAULT NULL,
PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `userdata`;
CREATE TABLE `userdata` (
`userid` int(11) DEFAULT NULL,
`imageurl` text,
`imageid` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`imageid`),
KEY `userid` (`userid`),
CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usermaster` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;