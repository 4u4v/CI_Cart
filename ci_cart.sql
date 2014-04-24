/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : 127.0.0.1:3306
Source Database       : ci_cart

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-04-24 15:42:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mc_article
-- ----------------------------
DROP TABLE IF EXISTS `mc_article`;
CREATE TABLE `mc_article` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `author` varchar(12) DEFAULT NULL,
  `cat_id` int(5) DEFAULT NULL,
  `content` text,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_article
-- ----------------------------
INSERT INTO `mc_article` VALUES ('1', 'Title01', 'Author', '1', 'This is Content... This is Content... This is Content... This is Content... This is Content... \r\nThis is Content... This is Content... This is Content... This is Content... This is Content... \r\nThis is Content... This is Content... This is Content... This is Content... This is Content... ', '2014-04-08 09:25:52');
INSERT INTO `mc_article` VALUES ('2', 'Test02zzz', 'Tester02zzz', '2', 'This is Test02zzz Content... This is Test02 Content... This is Test02 Content... This is Test02 Content... This is Test02 Content... This is Test02 Content... This is Test02 Content... This is Test02 Content... ', '2014-04-08 09:26:57');
INSERT INTO `mc_article` VALUES ('3', '标题03', '作者03', '3', '这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。\r\n这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。\r\n这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。这里是内容。。。 ', '2014-04-08 09:27:11');
INSERT INTO `mc_article` VALUES ('5', '标题05', '水木', '5', '这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 \r\n这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 ', '2014-04-08 14:21:19');
INSERT INTO `mc_article` VALUES ('8', '标题08', '作者08', '1', '这里是测试内容08。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 \r\n这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 ', '2014-04-09 15:38:02');
INSERT INTO `mc_article` VALUES ('9', '标题09', '作者09', '2', '这里是测试内容09。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 \r\n这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 这里是测试内容。。。 ', '2014-04-09 15:47:32');
INSERT INTO `mc_article` VALUES ('11', '测试标题', '测试者', '3', '<p>\r\n	这里是测试文章内容。。。<a href=\"http://www.4u4v.net\">这里是测试文章内容</a>。。。这里是测试文章内容。。。这里是测试文章内容。。。</p>\r\n<p>\r\n	<span style=\"color: rgb(255, 0, 0);\">这里是测试文章内容。。。这里是测试文章内容。。。这里是测试文章内容。。。这里是测试文章内容。。。</span></p>\r\n<p>\r\n	<strong>这里是测试文章内容。。。这里是测试文章内容。。。这里是测试文章内容。。。这里是测试文章内容。。。</strong></p>\r\n', '2014-04-23 17:55:33');

-- ----------------------------
-- Table structure for mc_art_cat
-- ----------------------------
DROP TABLE IF EXISTS `mc_art_cat`;
CREATE TABLE `mc_art_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(32) NOT NULL,
  `cat_ename` varchar(32) DEFAULT NULL,
  `sort_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_art_cat
-- ----------------------------
INSERT INTO `mc_art_cat` VALUES ('1', '分类目录一', 'category1', '1');
INSERT INTO `mc_art_cat` VALUES ('2', '分类目录二', 'category2', '2');
INSERT INTO `mc_art_cat` VALUES ('3', '分类目录三', 'category3', '3');
INSERT INTO `mc_art_cat` VALUES ('5', '分类目录五', 'category5', '5');

-- ----------------------------
-- Table structure for mc_brand
-- ----------------------------
DROP TABLE IF EXISTS `mc_brand`;
CREATE TABLE `mc_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品品牌ID',
  `brand_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品品牌名称',
  `brand_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品品牌描述',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '品牌网址',
  `logo` varchar(50) NOT NULL DEFAULT '' COMMENT '品牌logo',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50' COMMENT '品牌排序',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认1显示',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_brand
-- ----------------------------
INSERT INTO `mc_brand` VALUES ('1', '小米', '为发烧友而生', 'www.xiaomi.com', 'xiaomi.png', '50', '1');
INSERT INTO `mc_brand` VALUES ('2', '三星', '三星三星三星', 'www.samsung.com', 'samsung.gif', '50', '1');
INSERT INTO `mc_brand` VALUES ('3', '诺基亚', '手机品牌领导者', 'www.nokia.com', 'nokia.gif', '50', '1');
INSERT INTO `mc_brand` VALUES ('4', '中兴', '中兴中兴中兴中兴中兴', 'www.zhongxing.com', '', '50', '1');
INSERT INTO `mc_brand` VALUES ('5', '摩托罗拉', '摩托罗拉——王牌。', 'www.motouloula.com', '1224880048347558386.gif', '50', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_captcha
-- ----------------------------
INSERT INTO `mc_captcha` VALUES ('116', '1398318724', '127.0.0.1', '330245');

-- ----------------------------
-- Table structure for mc_category
-- ----------------------------
DROP TABLE IF EXISTS `mc_category`;
CREATE TABLE `mc_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类ID',
  `cat_name` varchar(30) NOT NULL DEFAULT '' COMMENT '商品分类名称',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类父ID',
  `cat_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '商品分类描述',
  `sort_order` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序依据',
  `unit` varchar(15) NOT NULL DEFAULT '' COMMENT '单位',
  `is_show` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示，默认1是显示',
  PRIMARY KEY (`cat_id`),
  KEY `pid` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_category
-- ----------------------------
INSERT INTO `mc_category` VALUES ('1', '分类目录一', '0', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('2', '分类目录二', '0', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('3', '分类目录三', '0', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('4', '分类目录4', '1', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('5', '分类目录xxx', '3', '                     ', '50', '0', '1');
INSERT INTO `mc_category` VALUES ('6', '分类目录10', '5', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('7', '分类目录6', '1', '                     ', '50', '0', '1');
INSERT INTO `mc_category` VALUES ('8', '分类目录7', '2', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('9', '分类目录8', '3', '                     ', '50', '0', '1');
INSERT INTO `mc_category` VALUES ('13', '分类目录9', '12', '', '50', '', '1');
INSERT INTO `mc_category` VALUES ('11', '分类目录111', '2', '           分类描述          ', '50', '0', '1');
INSERT INTO `mc_category` VALUES ('12', '分类目录四', '0', '', '50', '', '1');

-- ----------------------------
-- Table structure for mc_manager
-- ----------------------------
DROP TABLE IF EXISTS `mc_manager`;
CREATE TABLE `mc_manager` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `administrator` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `login_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administrator` (`administrator`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_manager
-- ----------------------------
INSERT INTO `mc_manager` VALUES ('1', 'admin', '7fef6171469e80d32c0559f88b377245', 'admin@4u4v.net', '2014-04-11 10:08:58');

-- ----------------------------
-- Table structure for mc_sessions
-- ----------------------------
DROP TABLE IF EXISTS `mc_sessions`;
CREATE TABLE `mc_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for mc_user
-- ----------------------------
DROP TABLE IF EXISTS `mc_user`;
CREATE TABLE `mc_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `reg_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_user
-- ----------------------------
INSERT INTO `mc_user` VALUES ('1', 'tester01', 'e10adc3949ba59abbe56e057f20f883e', 'tester01@qq.com', '0000-00-00 00:00:00');
INSERT INTO `mc_user` VALUES ('2', 'tester02', 'e10adc3949ba59abbe56e057f20f883e', 'tester02@qq.com', '0000-00-00 00:00:00');
INSERT INTO `mc_user` VALUES ('3', 'tester03', 'f4eddb1257c91ed28fd2fead367337e9', 'tester03@qq.com', '2014-04-07 10:08:58');
INSERT INTO `mc_user` VALUES ('5', 'tester05', 'd41d8cd98f00b204e9800998ecf8427e', 'tester05@qq.com', '2014-04-08 10:08:58');
INSERT INTO `mc_user` VALUES ('6', 'tester07', '25d55ad283aa400af464c76d713c07ad', 'tester06@qq.com', '2014-04-09 10:08:58');
INSERT INTO `mc_user` VALUES ('7', 'tester06', '6daa15f2f1ee5e29686026099560220b', 'tester06@qq.com', '2014-04-10 10:08:58');
INSERT INTO `mc_user` VALUES ('8', 'tester08', 'd41d8cd98f00b204e9800998ecf8427e', 'tester08@qq.com', '2014-04-10 10:18:58');
INSERT INTO `mc_user` VALUES ('9', 'tester09', '1560fb02f6f8bda0b7b189691ec595e7', 'tester09@qq.com', '2014-04-11 10:08:58');
INSERT INTO `mc_user` VALUES ('10', 'tester10', 'af71a0623b472fb657d4c68545140035', 'tester10@qq.com', '2014-04-11 10:20:07');
