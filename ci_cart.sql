/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : 127.0.0.1:3306
Source Database       : ci_cart

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-05-07 11:59:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mc_article`
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
INSERT INTO `mc_article` VALUES ('12', '测试标题12', '水木', '3', '<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n', '2014-04-24 16:59:57');
INSERT INTO `mc_article` VALUES ('13', '测试标题1313', '作者1313', '13', '<p>\r\n	这里是测试内容13。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容13。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容13。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n', '2014-04-24 17:00:27');
INSERT INTO `mc_article` VALUES ('14', '测试标题14', '水木', '5', '<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>', '2014-04-24 17:00:56');
INSERT INTO `mc_article` VALUES ('15', '测试标题15', '作者15', '5', '<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n<p>\r\n	这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。这里是测试内容。。。</p>\r\n', '2014-04-24 17:01:24');

-- ----------------------------
-- Table structure for `mc_art_cat`
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
-- Table structure for `mc_brand`
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_brand
-- ----------------------------
INSERT INTO `mc_brand` VALUES ('1', '小米', '为发烧友而生', 'www.xiaomi.com', 'xiaomi.png', '50', '1');
INSERT INTO `mc_brand` VALUES ('2', '三星', '三星三星三星', 'www.samsung.com', 'samsung.gif', '50', '1');
INSERT INTO `mc_brand` VALUES ('3', '诺基亚', '手机品牌领导者', 'www.nokia.com', 'nokia.gif', '50', '1');
INSERT INTO `mc_brand` VALUES ('5', '摩托罗拉', '摩托罗拉——王牌。', 'www.motouloula.com', '1224880048347558386.gif', '50', '1');
INSERT INTO `mc_brand` VALUES ('6', 'LG', 'LGLGLGLGLGLGLGLG', 'www.lg.com', '1224961476889999917.gif', '50', '1');

-- ----------------------------
-- Table structure for `mc_captcha`
-- ----------------------------
DROP TABLE IF EXISTS `mc_captcha`;
CREATE TABLE `mc_captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_captcha
-- ----------------------------
INSERT INTO `mc_captcha` VALUES ('143', '1399427264', '127.0.0.1', '929632');

-- ----------------------------
-- Table structure for `mc_category`
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
-- Table structure for `mc_dy`
-- ----------------------------
DROP TABLE IF EXISTS `mc_dy`;
CREATE TABLE `mc_dy` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `weizhi` int(11) DEFAULT NULL,
  `content` text,
  `biaoshi` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_dy
-- ----------------------------
INSERT INTO `mc_dy` VALUES ('1', 'Test Title1', '1', '<p>\r\n	This is a Test1...This is a Test1...This is a Test1...This is a Test1...This is a Test1...</p>\r\n', 't1');
INSERT INTO `mc_dy` VALUES ('2', '测试标题二', '2', '<p>这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。</p>\r\n<p>这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。</p>\r\n<p>这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。这里是单面测试内容。。。</p>', 't2');
INSERT INTO `mc_dy` VALUES ('0', '测试标题3', '3', '<p>\r\n	这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。</p>\r\n<p>\r\n	这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。</p>\r\n<p>\r\n	这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。这里是测试3内容。。。</p>\r\n', 't3');

-- ----------------------------
-- Table structure for `mc_goods`
-- ----------------------------
DROP TABLE IF EXISTS `mc_goods`;
CREATE TABLE `mc_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_sn` varchar(30) NOT NULL DEFAULT '' COMMENT '商品货号',
  `goods_name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_brief` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_desc` text COMMENT '商品详情',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类别ID',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属品牌ID',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本店价格',
  `promote_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `promote_start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销起始时间',
  `promote_end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '促销截止时间',
  `goods_img` varchar(50) NOT NULL DEFAULT '' COMMENT '商品图片',
  `goods_thumb` varchar(50) NOT NULL DEFAULT '' COMMENT '商品缩略图',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型ID',
  `is_promote` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否促销，默认为0不促销',
  `is_best` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否精品,默认为0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品，默认为0',
  `is_hot` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖,默认为0',
  `is_onsale` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架,默认为1',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`goods_id`),
  KEY `cat_id` (`cat_id`),
  KEY `brand_id` (`brand_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_goods
-- ----------------------------
INSERT INTO `mc_goods` VALUES ('1', 'P001', '商品001', '', '商品详细描述。。。商品详细描述。。。', '7', '3', '2612.00', '2010.00', '1750.00', '0', '0', '149838_425032.jpg', '149838_425032_thumb.jpg', '4', '0', '0', '0', '1', '1', '1', '0', '0');
INSERT INTO `mc_goods` VALUES ('2', 'P002', '商品002', '', '商品详细描述。。。商品详细描述。。。商品详细描述。。。商品详细描述。。。商品详细描述。。。', '2', '1', '2000.00', '1999.00', '1750.00', '0', '0', 'home-nfc.jpg', 'home-nfc_thumb.jpg', '888', '0', '0', '0', '1', '1', '1', '0', '0');
INSERT INTO `mc_goods` VALUES ('3', 'P003', '商品003', '商品简单描述', '<p>\r\n	商品详细描述。。。商品详细描述。。。商品详细描述。。。商品详细描述。。。商品详细描述。。。</p>\r\n<p>\r\n	<strong>商品详细描述。。。商品详细描述。。。商品详细描述。。。商品详细描述。。。商品详细描述。。。</strong></p>\r\n<p>\r\n	商品详细描述。。。商品详细描述。。。商品详细描述。。。<span style=\"color: rgb(255, 0, 0);\">商品详细描述。。。商品详细描述。。。商品详细描述。。。</span>商品详细描述。。。商品详细描述。。。商品详细描述。。。</p>\r\n', '8', '2', '3662.00', '3060.00', '2750.00', '0', '0', '201402_347.jpg', '201402_347_thumb.jpg', '888', '0', '0', '0', '1', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for `mc_goods_type`
-- ----------------------------
DROP TABLE IF EXISTS `mc_goods_type`;
CREATE TABLE `mc_goods_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类型ID',
  `type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '商品类型名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_goods_type
-- ----------------------------
INSERT INTO `mc_goods_type` VALUES ('1', '手机');
INSERT INTO `mc_goods_type` VALUES ('2', '配件');
INSERT INTO `mc_goods_type` VALUES ('3', '电脑');
INSERT INTO `mc_goods_type` VALUES ('4', '数码相机');
INSERT INTO `mc_goods_type` VALUES ('5', '家电');
INSERT INTO `mc_goods_type` VALUES ('6', '鞋服');
INSERT INTO `mc_goods_type` VALUES ('7', '食品');
INSERT INTO `mc_goods_type` VALUES ('8', '家具');

-- ----------------------------
-- Table structure for `mc_links`
-- ----------------------------
DROP TABLE IF EXISTS `mc_links`;
CREATE TABLE `mc_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `weizhi` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mc_links
-- ----------------------------
INSERT INTO `mc_links` VALUES ('1', '博客水木', 'http://www.4u4v.net', '1', 'http://www.4u4v.net/images/logo.gif');
INSERT INTO `mc_links` VALUES ('2', '水木轩', 'http://www.4u4v.cn', '2', 'http://www.4u4v.cn/logo.gif');
INSERT INTO `mc_links` VALUES ('3', '水木工作室', 'http://studio.js.cn', '3', 'http://www.4u4v.cn/images/logo.gif');

-- ----------------------------
-- Table structure for `mc_manager`
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
-- Table structure for `mc_sessions`
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
-- Table structure for `mc_user`
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
