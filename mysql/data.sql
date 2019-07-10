CREATE TABLE `user` (
    `id` int(10) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(20) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';

INSERT INTO `user` VALUES (null, 'a1');