CREATE TABLE IF NOT EXISTS `adm`(
`uid` CHAR(36) NOT NULL,
`name` varchar(50) NOT NULL,  
`pw` varchar(16) NOT NULL COMMENT 'md5',
`email` varchar(255) NOT NULL,
`mobile` varchar(10) DEFAULT NULL,
`status` tinyint(1) NULL DEFAULT '1' COMMENT '1 current admin 0 not current',
`cr` timestamp NULL DEFAULT NULL,
`up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`crIP` varchar(21) DEFAULT NULL,
`upIP` varchar(21) DEFAULT NULL,
PRIMARY KEY(`uid`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8;

INSERT INTO `adm` (`uid`,`name`,`pw`,`email`,`cr`) VALUES 
(uuid(),'java001','java001','tlap086091@livemail.tw',now())