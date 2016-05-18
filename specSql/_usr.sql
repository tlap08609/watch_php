CREATE TABLE IF NOT EXISTS `usr`(
`uid` CHAR(36) NOT NULL COMMENT 'something like 7441005c-1cee-11e6-adf4-b888e3065a51',
`name` VARCHAR(50) NOT NULL COMMENT '/[a-z\u4e00-\u9eff]{1,}/i',  
`pw` VARCHAR(16) NOT NULL COMMENT 'md5',
`email` VARCHAR(255) NOT NULL COMMENT '/[\w\d]+@[\w]{1,}.[\w]{2,3}/',
`tel` varchar(20) DEFAULT NULL,
`mobile` varchar(10) DEFAULT NULL COMMENT '/09[0-9]{8}|09[0-9]{2}-[0-9]{6}/',
`address` VARCHAR(255) NULL,
`status` tinyint(1) NULL DEFAULT '1' COMMENT '1 current member 0 not current',
`cr` timestamp NULL DEFAULT NULL,
`up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY(`uid`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `usr`(`uid`,`name`,`pw`,`email`,`cr`,`up`) VALUES
('7441005c-1cee-11e6-adf4-b888e3065a51','tlap08609','cool0519','tlap086091@livemail.tw',now(),now()),
('c59c5aa1-1cef-11e6-adf4-b888e3065a51','alice','1300197','alice@livemail.tw',now(),now())