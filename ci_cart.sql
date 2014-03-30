/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : ci_cart

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-03-29 11:12:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mc_user`
-- ----------------------------
DROP TABLE IF EXISTS `mc_user`;
CREATE TABLE `mc_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_user
-- ----------------------------
INSERT INTO `mc_user` VALUES ('1', 'tester01', 'd41d8cd98f00b204e9800998ecf8427e', 'tester01@qq.com');
INSERT INTO `mc_user` VALUES ('2', 'tester02', 'e10adc3949ba59abbe56e057f20f883e', 'tester02@qq.com');
INSERT INTO `mc_user` VALUES ('3', 'tester03', 'f4eddb1257c91ed28fd2fead367337e9', 'tester03@qq.com');
INSERT INTO `mc_user` VALUES ('4', 'tester03', 'f4eddb1257c91ed28fd2fead367337e9', 'tester03@qq.com');
