/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : www.zycrm.io

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2017-08-24 14:41:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customer_care
-- ----------------------------
DROP TABLE IF EXISTS `customer_care`;
CREATE TABLE `customer_care` (
  `care_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `care_theme` varchar(50) DEFAULT NULL,
  `care_way` varchar(50) DEFAULT NULL,
  `care_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `care_remark` varchar(1000) DEFAULT NULL,
  `care_nexttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `care_people` varchar(50) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`care_id`),
  KEY `FK_Reference_15` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_care
-- ----------------------------
INSERT INTO `customer_care` VALUES ('1', '1', '纪念日', '送礼品', '2017-05-25 11:17:21', '节日纪念', '2017-05-26 23:12:34', '孙悟空', '1');
INSERT INTO `customer_care` VALUES ('2', '2', '生日', '上门拜访', '2017-05-25 11:19:26', '过生日', '2017-05-26 23:14:15', '猪八戒', '1');
INSERT INTO `customer_care` VALUES ('3', '3', '测试', '发短信', '2017-08-23 08:30:13', '测试', '2017-05-26 00:00:00', '张三', '0');
INSERT INTO `customer_care` VALUES ('4', '3', '测试', '发短信', '2017-05-25 11:19:30', '测试', '2017-05-26 00:00:00', '张三', '1');
INSERT INTO `customer_care` VALUES ('5', '8', '测试', '上门拜访', '2017-05-25 14:26:43', '买他的羊肉串', '2016-01-01 00:00:00', '张三', '1');

-- ----------------------------
-- Table structure for customer_condition
-- ----------------------------
DROP TABLE IF EXISTS `customer_condition`;
CREATE TABLE `customer_condition` (
  `condition_id` int(10) NOT NULL AUTO_INCREMENT,
  `condition_name` varchar(50) DEFAULT NULL,
  `condition_explain` varchar(1000) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`condition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_condition
-- ----------------------------
INSERT INTO `customer_condition` VALUES ('1', '潜在客户', '可能成为客户的人', '1');
INSERT INTO `customer_condition` VALUES ('2', '意向客户', '有意愿车成为客户的人', '1');
INSERT INTO `customer_condition` VALUES ('3', '交易客户', '正在交易的客户', '1');
INSERT INTO `customer_condition` VALUES ('4', '测试1', '测试1', '1');
INSERT INTO `customer_condition` VALUES ('5', '测试2', null, '0');

-- ----------------------------
-- Table structure for customer_info
-- ----------------------------
DROP TABLE IF EXISTS `customer_info`;
CREATE TABLE `customer_info` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `condition_id` int(10) DEFAULT NULL,
  `source_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_sex` varchar(10) DEFAULT NULL,
  `customer_mobile` varchar(20) DEFAULT NULL,
  `customer_qq` varchar(20) DEFAULT NULL,
  `customer_address` varchar(500) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_remark` varchar(1000) DEFAULT NULL,
  `customer_job` varchar(100) DEFAULT NULL,
  `customer_blog` varchar(100) DEFAULT NULL,
  `customer_tel` varbinary(20) DEFAULT NULL,
  `customer_msn` varchar(50) DEFAULT NULL,
  `customer_birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_addtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_addman` varchar(50) DEFAULT NULL,
  `customer_changtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_changeman` varchar(20) DEFAULT NULL,
  `customer_company` varchar(50) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`customer_id`),
  KEY `FK_Reference_16` (`condition_id`),
  KEY `FK_Reference_17` (`source_id`),
  KEY `FK_Reference_18` (`type_id`),
  KEY `FK_Reference_23` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_info
-- ----------------------------
INSERT INTO `customer_info` VALUES ('1', '2', '1', '3', '2', '李四', '男', '13725425426', '2334343', '重庆', '379727687@qq.com', '									你好\r\n		\r\n		\r\n		\r\n		\r\n		', '老板', '3434322', 0x3534353435343333, '23234465', '2013-05-23 22:39:27', '2013-05-08 22:30:40', '张三', '2013-05-25 09:25:43', '张三', '思科', '1');
INSERT INTO `customer_info` VALUES ('2', '1', '1', '4', '1', '华纳', '女', '13924452345', '23456', '重庆三峡', '379727687@qq.com', '						反反复复\r\n		\r\n		', '学生', '6576', 0x3835383538353834, '45454555', '2013-05-25 09:35:22', '2013-05-23 23:05:44', '张三', '2013-05-25 09:31:47', '二位', '天天', '1');
INSERT INTO `customer_info` VALUES ('3', '1', '1', '1', '1', '刘欢', '男', '13854545454', '23245', '重庆', '379727687@qq.com', '			如同仁堂\r\n		', '学生', '6567', 0x3532343534373839, '53423134', '2017-05-22 09:57:32', '2013-05-23 23:08:52', '张三', '2013-05-25 09:32:48', '热热热', '微微', '1');
INSERT INTO `customer_info` VALUES ('4', '1', '1', '1', '1', '阿黄', '男', '13544455544', '454578', '重庆三峡学院', '379727687@qq.com', '			法国风格\r\n		', '学生', '6565', 0x3235343738353437, '45444455', '2017-05-22 09:57:54', '2013-05-23 23:10:17', '张三', '2013-05-25 09:33:24', '恒河', '三峡学院', '1');
INSERT INTO `customer_info` VALUES ('6', '1', '2', '4', '2', '张三', '男', '312103210320302.0', '032032023030', '020320320320', '123@123.com', '汪汪汪', '经理', '03203203', 0x30333230333033323033303233, '03203030', '2017-05-27 16:56:59', '2017-05-22 16:56:19', '03203203203', '2017-05-22 16:56:19', '0320320320', '3203203032', '1');
INSERT INTO `customer_info` VALUES ('7', '1', '2', '4', '1', '李四', '男', '15136171850', '1201201201', '背景', 'xm@126.com', '啦啦啦 ', '你猜', '1230', 0x36383937343536, '123456', '2017-05-22 17:54:46', '2017-05-22 17:02:42', '张三', '2017-05-22 17:02:42', '张三', '向桑科技', '1');
INSERT INTO `customer_info` VALUES ('8', '2', '3', '1', '4', '阿凡提', '男', '1111111111', '123456', '新疆', 'afanti@123.com', '阿凡提的羊肉串好吃', '买羊肉串', 'afanti', 0x333731333731333731, 'afanti', '2017-05-23 10:56:56', '2017-05-22 17:54:21', '李', '2017-05-22 17:54:21', '李', '新疆', '1');
INSERT INTO `customer_info` VALUES ('9', '1', '2', null, '2', '叶问', '男', '151361111111', '11121222', '佛山', 'yewen@126.com', '咏春宗师 叶问', '武师', '叶问', 0x313131313131313131313131, '111111111111', '2016-01-01 00:00:00', '2017-05-23 11:04:55', '李', '2017-05-23 11:04:55', '', '咏春', '1');
INSERT INTO `customer_info` VALUES ('10', '1', '1', null, '1', '黄笑', '男', '11111111850', '158387845', '洛阳', 'huangxiao@126.com', '黄笑科技黄笑科技黄笑科技', '总经理', 'huangxiao@126.com', 0x3033373138383838383838, 'huangxiao@126.com', '2016-03-07 00:00:00', '2017-05-25 14:24:40', '张', '2017-05-25 14:24:40', '李', '黄笑科技', '1');

-- ----------------------------
-- Table structure for customer_linkreord
-- ----------------------------
DROP TABLE IF EXISTS `customer_linkreord`;
CREATE TABLE `customer_linkreord` (
  `record_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `link_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `who_link` varchar(50) DEFAULT NULL,
  `link_type` varchar(50) DEFAULT NULL,
  `link_theme` varchar(200) DEFAULT NULL,
  `link_nexttime` varchar(100) DEFAULT NULL,
  `link_remark` varchar(1000) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`record_id`),
  KEY `FK_Reference_19` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_linkreord
-- ----------------------------
INSERT INTO `customer_linkreord` VALUES ('1', '1', '2013-05-23 23:15:11', '张三', '打电话', '过来买房', '2013-05-28 23:15:14 ', '很好', '1');
INSERT INTO `customer_linkreord` VALUES ('2', '2', '2013-05-23 23:16:05', '张三', '谈判', '卖房', '2013-05-28 23:16:08 ', '探索', '1');
INSERT INTO `customer_linkreord` VALUES ('3', '3', '2017-05-24 15:08:49', '张三', '测试', '测试', '2017-05-24 14:05', '而产生的', '0');
INSERT INTO `customer_linkreord` VALUES ('4', '3', '2017-05-24 15:13:10', '张三', '测试', '测试', '2017-05-24 14:05', '测试', '0');
INSERT INTO `customer_linkreord` VALUES ('5', '3', '2017-05-25 11:55:40', '张三', '的', '测试', '2017-05-26 12:05', '测试', '1');
INSERT INTO `customer_linkreord` VALUES ('6', '8', '2017-05-25 14:27:44', '张三', '打电话', '测试', '2017-05-26 15:05', '打电话订羊肉串', '1');

-- ----------------------------
-- Table structure for customer_source
-- ----------------------------
DROP TABLE IF EXISTS `customer_source`;
CREATE TABLE `customer_source` (
  `source_id` int(10) NOT NULL AUTO_INCREMENT,
  `source_name` varchar(50) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_source
-- ----------------------------
INSERT INTO `customer_source` VALUES ('1', '自己上门', '1');
INSERT INTO `customer_source` VALUES ('2', '朋友推荐', '1');
INSERT INTO `customer_source` VALUES ('3', '百度网', '1');
INSERT INTO `customer_source` VALUES ('4', '测试', '0');

-- ----------------------------
-- Table structure for customer_type
-- ----------------------------
DROP TABLE IF EXISTS `customer_type`;
CREATE TABLE `customer_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer_type
-- ----------------------------
INSERT INTO `customer_type` VALUES ('1', '客户', '1');
INSERT INTO `customer_type` VALUES ('2', '合作伙伴', '1');
INSERT INTO `customer_type` VALUES ('3', '供应商', '1');
INSERT INTO `customer_type` VALUES ('4', '合作伙伴', '1');
INSERT INTO `customer_type` VALUES ('5', '测试', '0');

-- ----------------------------
-- Table structure for notice_info
-- ----------------------------
DROP TABLE IF EXISTS `notice_info`;
CREATE TABLE `notice_info` (
  `notice_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `notice_title` varchar(100) DEFAULT NULL,
  `notice_content` varchar(2000) DEFAULT NULL,
  `notice_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notice_endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`notice_id`),
  KEY `FK_Reference_12` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice_info
-- ----------------------------
INSERT INTO `notice_info` VALUES ('3', '4', '最近要开会', '记得带钱', '2013-05-23 23:22:12', '2013-05-30 23:22:29', '1');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `department_id` int(10) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_sex` varchar(10) DEFAULT NULL,
  `user_mobile` varchar(20) DEFAULT NULL,
  `user_age` int(10) DEFAULT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_pw` varchar(50) DEFAULT NULL,
  `user_tel` varchar(20) DEFAULT NULL,
  `user_idnum` varchar(20) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_addman` varchar(50) DEFAULT NULL,
  `user_changetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_changeman` varchar(50) DEFAULT NULL,
  `user_interest` varchar(1000) DEFAULT NULL,
  `user_diploma` varchar(20) DEFAULT NULL,
  `user_bankcard` varchar(20) DEFAULT NULL,
  `user_nation` varchar(20) DEFAULT NULL,
  `is_married` varchar(10) DEFAULT NULL,
  `is_used` varchar(10) DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `FK_Reference_22` (`department_id`),
  KEY `FK_Reference_24` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '1', '1', '张三', '男', '13525452584', '20', '万州', '123456', '52000112', '500234154545745474', '123456@qq.com', '2017-05-19 15:34:28', '肉骨粉', '2013-05-25 09:31:39', '未修改', '很多', '本科', '5442232327863358787', '汉', '已婚', '1');
INSERT INTO `user_info` VALUES ('3', '1', '2', '王五', '男', '13254545454', '22', '重庆三峡学院', '123', '22323244', '522141444514744547', '87592@qq.com', '2013-05-25 09:37:07', '张三', '2013-05-25 09:29:05', '未修改', '斗地主', '本科', '2323232345555555522', '汉', '未婚', '1');
INSERT INTO `user_info` VALUES ('4', '1', '2', '孙悟空', '男', '13545454545', '55', '花果山', '456', '54584785', '524147444584574554', '39547@qq.com', '2013-05-25 09:37:04', '张三', '2013-05-25 09:30:14', '未修改', '吃桃子', '初中', '3535355488676754578', '汉', '离异', '1');
INSERT INTO `user_info` VALUES ('5', '1', '2', '猪八戒', '男', '13544477747', '2', '高老庄', '789', '52000112', '524154655895854744', '3963547@qq.com', '2013-05-25 09:36:59', '张三', '2013-05-25 09:29:33', '未修改', '吃西瓜', '初中', '3535355555454787887', '汉', '已婚', '1');
