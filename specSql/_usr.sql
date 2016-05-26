CREATE TABLE IF NOT EXISTS `usr`(
`uid` CHAR(36) NOT NULL COMMENT 'something like 7441005c-1cee-11e6-adf4-b888e3065a51',
`name` varchar(50) NOT NULL COMMENT '/[a-z\u4e00-\u9eff]{1,}/i',  
`pw` varchar(16) NOT NULL COMMENT 'md5',
`email` varchar(255) NOT NULL COMMENT '/[\w\d]+@[\w]{1,}.[\w]{2,3}/',
`gender` tinyint(1) DEFAULT NULL COMMENT '0 female, 1 male',
`tel` varchar(20) DEFAULT NULL,
`mobile` varchar(10) DEFAULT NULL COMMENT '/09[0-9]{8}|09[0-9]{2}-[0-9]{6}/',
`address` varchar(255) NULL,
`status` tinyint(1) NULL DEFAULT '1' COMMENT '1 current member 0 not current',
`cr` timestamp NULL DEFAULT NULL,
`up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`crIP` varchar(21) DEFAULT NULL,
`upIP` varchar(21) DEFAULT NULL,
PRIMARY KEY(`uid`),
UNIQUE KEY `email` (`email`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO `usr`(`uid`,`name`,`pw`,`email`,`cr`,`crIP`,`upIP`) VALUES
('7441005c-1cee-11e6-adf4-b888e3065a51','tlap08609','cool0519','tlap086091@livemail.tw','2016-03-24 16:00:21','127.0.0.1','127.0.0.1'),
('c59c5aa1-1cef-11e6-adf4-b888e3065a51','alice','1300197','alice@livemail.tw','2016-03-24 16:00:21','127.0.0.1','127.0.0.1'),
(uuid(),'eva','eva197','eva@livemail.tw','2016-03-24 16:00:21','127.0.0.1','127.0.0.1'),
(uuid(),'mom','mom197','mom@livemail.tw','2016-03-24 16:00:21','127.0.0.1','127.0.0.1'),
(uuid(),'father','fat197','father@livemail.tw','2016-03-24 16:00:21','127.0.0.1','127.0.0.1'),
(uuid(),'uncle','uncle197','uncle@livemail.tw',now(),'127.0.0.1','127.0.0.1'),
(uuid(),'grandmother','grandmother197','grandmother@livemail.tw',now(),'127.0.0.1','127.0.0.1'),
(uuid(),'grandfather','grandfather197','grandfather@livemail.tw',now(),'127.0.0.1','127.0.0.1')