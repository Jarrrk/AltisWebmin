SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for web_admins
-- ----------------------------

DROP TABLE IF EXISTS `web_admins`;
CREATE TABLE `web_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for web_data
-- ----------------------------

DROP TABLE IF EXISTS `web_data`;
CREATE TABLE `web_data` (
  `last_action` varchar(255) NOT NULL,
  PRIMARY KEY (`last_action`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
