/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : 127.0.0.1:3306
Source Database       : ci_cart

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-04-01 17:43:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mc_captcha
-- ----------------------------
DROP TABLE IF EXISTS `mc_captcha`;
CREATE TABLE `mc_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_captcha
-- ----------------------------
INSERT INTO `mc_captcha` VALUES ('7', '1396344403', '127.0.0.1', '931335');
INSERT INTO `mc_captcha` VALUES ('6', '1396344379', '127.0.0.1', '648300');
INSERT INTO `mc_captcha` VALUES ('9', '1396345340', '127.0.0.1', '827047');
INSERT INTO `mc_captcha` VALUES ('8', '1396345337', '127.0.0.1', '873849');

-- ----------------------------
-- Table structure for mc_user
-- ----------------------------
DROP TABLE IF EXISTS `mc_user`;
CREATE TABLE `mc_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_user
-- ----------------------------
INSERT INTO `mc_user` VALUES ('1', 'tester01', 'e10adc3949ba59abbe56e057f20f883e', 'tester01@qq.com');
INSERT INTO `mc_user` VALUES ('2', 'tester02', 'e10adc3949ba59abbe56e057f20f883e', 'tester02@qq.com');
INSERT INTO `mc_user` VALUES ('3', 'tester03', 'f4eddb1257c91ed28fd2fead367337e9', 'tester03@qq.com');
INSERT INTO `mc_user` VALUES ('7', 'tester06', '6daa15f2f1ee5e29686026099560220b', 'tester06@qq.com');
INSERT INTO `mc_user` VALUES ('5', 'tester05', 'd41d8cd98f00b204e9800998ecf8427e', 'tester05@qq.com');
INSERT INTO `mc_user` VALUES ('6', 'tester06', '25d55ad283aa400af464c76d713c07ad', 'tester06@qq.com');
INSERT INTO `mc_user` VALUES ('8', '', 'd41d8cd98f00b204e9800998ecf8427e', '');
INSERT INTO `mc_user` VALUES ('9', '', 'd41d8cd98f00b204e9800998ecf8427e', '');
INSERT INTO `mc_user` VALUES ('10', 'tester10', 'e10adc3949ba59abbe56e057f20f883e', 'tester10@qq.com');
INSERT INTO `mc_user` VALUES ('11', '', 'd41d8cd98f00b204e9800998ecf8427e', '');
INSERT INTO `mc_user` VALUES ('12', '', 'd41d8cd98f00b204e9800998ecf8427e', '');
INSERT INTO `mc_user` VALUES ('13', 'tester07', 'e10adc3949ba59abbe56e057f20f883e', 'tester07@qq.com');
INSERT INTO `mc_user` VALUES ('14', 'tester08', 'e10adc3949ba59abbe56e057f20f883e', 'tester08@qq.com');
INSERT INTO `mc_user` VALUES ('15', '', 'd41d8cd98f00b204e9800998ecf8427e', '');
