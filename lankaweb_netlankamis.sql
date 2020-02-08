/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : lankaweb_netlankamis

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-02-06 22:02:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sup_tbl_cabin_types
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_cabin_types`;
CREATE TABLE `sup_tbl_cabin_types` (
  `cabin_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `cabin_type` varchar(200) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`cabin_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sup_tbl_cabin_types
-- ----------------------------
INSERT INTO `sup_tbl_cabin_types` VALUES ('1', 'CEMENT', '1');
INSERT INTO `sup_tbl_cabin_types` VALUES ('2', 'PU', '1');
INSERT INTO `sup_tbl_cabin_types` VALUES ('3', 'OD', '1');
INSERT INTO `sup_tbl_cabin_types` VALUES ('4', 'FIBER', '1');
INSERT INTO `sup_tbl_cabin_types` VALUES ('5', 'ZN/AL', '1');
INSERT INTO `sup_tbl_cabin_types` VALUES ('6', 'Cabin', '1');

-- ----------------------------
-- Table structure for sup_tbl_generators
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_generators`;
CREATE TABLE `sup_tbl_generators` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_code` varchar(50) DEFAULT NULL,
  `gen_model_name` varchar(150) DEFAULT NULL,
  `capacity` varchar(50) DEFAULT NULL,
  `gen_type` int(11) DEFAULT NULL,
  `sb_ft` int(11) DEFAULT NULL,
  `standed_e_oil_qty` int(11) DEFAULT NULL,
  `oil_filter` int(11) DEFAULT NULL,
  `air_filter` int(11) DEFAULT NULL,
  `fuel_filter` int(11) DEFAULT NULL,
  `fan_belt` int(11) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sup_tbl_generators
-- ----------------------------

-- ----------------------------
-- Table structure for sup_tbl_gen_models
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_gen_models`;
CREATE TABLE `sup_tbl_gen_models` (
  `gen_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_cat_name` varchar(255) DEFAULT NULL,
  `gen_cat_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`gen_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sup_tbl_gen_models
-- ----------------------------

-- ----------------------------
-- Table structure for sup_tbl_ht_con_types
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_ht_con_types`;
CREATE TABLE `sup_tbl_ht_con_types` (
  `ht_con_id` int(11) NOT NULL AUTO_INCREMENT,
  `ht_con_name` varchar(255) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`ht_con_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sup_tbl_ht_con_types
-- ----------------------------
INSERT INTO `sup_tbl_ht_con_types` VALUES ('1', 'AC', '1');
INSERT INTO `sup_tbl_ht_con_types` VALUES ('2', 'FCB', '1');
INSERT INTO `sup_tbl_ht_con_types` VALUES ('3', 'AC/FCB', '1');
INSERT INTO `sup_tbl_ht_con_types` VALUES ('4', 'DC FAN', '1');
INSERT INTO `sup_tbl_ht_con_types` VALUES ('5', 'N/A', '1');

-- ----------------------------
-- Table structure for sup_tbl_infra_owner
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_infra_owner`;
CREATE TABLE `sup_tbl_infra_owner` (
  `inf_own_id` int(11) NOT NULL AUTO_INCREMENT,
  `inf_own_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`inf_own_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sup_tbl_infra_owner
-- ----------------------------
INSERT INTO `sup_tbl_infra_owner` VALUES ('1', 'DAP');
INSERT INTO `sup_tbl_infra_owner` VALUES ('2', 'DBN');
INSERT INTO `sup_tbl_infra_owner` VALUES ('3', 'NON');

-- ----------------------------
-- Table structure for sup_tbl_job_category
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_job_category`;
CREATE TABLE `sup_tbl_job_category` (
  `job_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_cat_name` varchar(255) DEFAULT NULL,
  `job_cat_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sup_tbl_job_category
-- ----------------------------
INSERT INTO `sup_tbl_job_category` VALUES ('1', 'Portable Generator', '1');
INSERT INTO `sup_tbl_job_category` VALUES ('2', 'FTG', '1');
INSERT INTO `sup_tbl_job_category` VALUES ('3', 'Second Time Gen Service', '1');
INSERT INTO `sup_tbl_job_category` VALUES ('4', 'Addhoc', '1');
INSERT INTO `sup_tbl_job_category` VALUES ('5', 'PIS', '1');
INSERT INTO `sup_tbl_job_category` VALUES ('6', 'Dialog Own Site', '1');
INSERT INTO `sup_tbl_job_category` VALUES ('7', 'Sharing', '1');

-- ----------------------------
-- Table structure for sup_tbl_on_air_status
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_on_air_status`;
CREATE TABLE `sup_tbl_on_air_status` (
  `on_air_st_id` int(11) NOT NULL,
  `on_air_st_name` varchar(100) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`on_air_st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sup_tbl_on_air_status
-- ----------------------------

-- ----------------------------
-- Table structure for sup_tbl_tower_operators
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_tower_operators`;
CREATE TABLE `sup_tbl_tower_operators` (
  `tower_op_id` int(11) NOT NULL AUTO_INCREMENT,
  `tower_op` varchar(200) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`tower_op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sup_tbl_tower_operators
-- ----------------------------
INSERT INTO `sup_tbl_tower_operators` VALUES ('1', 'DAP', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('2', 'MOBITEL', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('3', 'SLT', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('4', 'DBN', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('5', 'LB', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('6', 'HUTCH', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('7', 'AT', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('8', 'ETISALAT', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('9', 'Co-Lo', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('10', 'IBS', '1');
INSERT INTO `sup_tbl_tower_operators` VALUES ('11', 'RT', '1');

-- ----------------------------
-- Table structure for sup_tbl_tower_types
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_tower_types`;
CREATE TABLE `sup_tbl_tower_types` (
  `tower_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `tower_type` varchar(200) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`tower_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sup_tbl_tower_types
-- ----------------------------
INSERT INTO `sup_tbl_tower_types` VALUES ('1', 'GFT', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('2', 'CO-LO', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('3', 'GBT', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('4', 'INDOOR', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('5', 'RTMP', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('6', 'IBS', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('7', 'MTU', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('8', 'RTP', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('9', 'RT', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('10', 'RTT', '1');
INSERT INTO `sup_tbl_tower_types` VALUES ('11', 'SP', '1');

-- ----------------------------
-- Table structure for sup_tbl_user_levels
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_user_levels`;
CREATE TABLE `sup_tbl_user_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` varchar(100) NOT NULL,
  `status` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sup_tbl_user_levels
-- ----------------------------
INSERT INTO `sup_tbl_user_levels` VALUES ('1', 'Admin', '1');
INSERT INTO `sup_tbl_user_levels` VALUES ('2', 'Organization', '1');
INSERT INTO `sup_tbl_user_levels` VALUES ('3', 'Region', '1');
INSERT INTO `sup_tbl_user_levels` VALUES ('4', 'Deport', '1');

-- ----------------------------
-- Table structure for sup_tbl_user_log
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_user_log`;
CREATE TABLE `sup_tbl_user_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `log_out_time` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sup_tbl_user_log
-- ----------------------------
INSERT INTO `sup_tbl_user_log` VALUES ('1', '1', '2019-11-01 15:44:08', '2019-11-01 16:18:14');
INSERT INTO `sup_tbl_user_log` VALUES ('2', '2', '2019-11-01 16:18:23', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('3', '2', '2019-11-04 10:57:48', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('4', '3', '2019-11-04 12:10:39', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('5', '3', '2019-11-04 15:19:25', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('6', '2', '2019-11-04 22:00:16', '2019-12-29 03:50:46');
INSERT INTO `sup_tbl_user_log` VALUES ('7', '3', '2019-11-04 22:00:37', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('8', '2', '2019-11-05 05:55:22', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('9', '1', '2019-11-07 09:58:05', '2019-11-07 10:24:05');
INSERT INTO `sup_tbl_user_log` VALUES ('10', '2', '2019-11-07 10:40:39', '2019-11-07 10:41:01');
INSERT INTO `sup_tbl_user_log` VALUES ('11', '1', '2019-11-07 10:41:09', '2019-11-07 10:42:49');
INSERT INTO `sup_tbl_user_log` VALUES ('12', '4', '2019-11-07 10:42:58', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('13', '2', '2019-11-12 20:32:51', '2019-11-12 20:33:09');
INSERT INTO `sup_tbl_user_log` VALUES ('14', '1', '2019-11-12 20:33:22', '2019-11-12 21:42:46');
INSERT INTO `sup_tbl_user_log` VALUES ('15', '2', '2019-11-12 21:43:01', '2019-11-12 21:43:06');
INSERT INTO `sup_tbl_user_log` VALUES ('16', '1', '2019-11-12 21:44:57', '2019-11-12 21:45:22');
INSERT INTO `sup_tbl_user_log` VALUES ('17', '2', '2019-11-12 21:45:28', '2019-11-12 21:45:50');
INSERT INTO `sup_tbl_user_log` VALUES ('18', '3', '2019-11-12 21:46:09', '2019-11-12 21:46:12');
INSERT INTO `sup_tbl_user_log` VALUES ('19', '2', '2019-11-12 21:46:19', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('20', '1', '2019-11-14 04:01:32', '2019-11-14 04:08:50');
INSERT INTO `sup_tbl_user_log` VALUES ('21', '2', '2019-11-14 04:08:58', '2019-11-14 04:34:18');
INSERT INTO `sup_tbl_user_log` VALUES ('22', '1', '2019-11-14 04:34:24', '2019-11-14 04:37:46');
INSERT INTO `sup_tbl_user_log` VALUES ('23', '2', '2019-11-14 04:37:52', '2019-11-14 05:15:20');
INSERT INTO `sup_tbl_user_log` VALUES ('24', '2', '2019-11-14 05:15:25', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('25', '2', '2019-11-14 06:20:20', '2019-11-14 06:43:58');
INSERT INTO `sup_tbl_user_log` VALUES ('26', '1', '2019-11-14 06:44:04', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('27', '1', '2019-11-14 09:55:57', '2019-11-14 10:10:49');
INSERT INTO `sup_tbl_user_log` VALUES ('28', '2', '2019-11-14 10:11:10', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('29', '2', '2019-11-14 13:46:46', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('30', '2', '2019-11-14 17:10:58', '2019-11-14 17:20:51');
INSERT INTO `sup_tbl_user_log` VALUES ('31', '1', '2019-11-14 17:20:56', '2019-11-14 17:38:28');
INSERT INTO `sup_tbl_user_log` VALUES ('32', '2', '2019-11-14 17:38:33', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('33', '2', '2019-11-14 22:28:34', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('34', '2', '2019-11-14 23:44:39', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('35', '2', '2019-11-15 01:41:22', '2019-11-15 01:41:51');
INSERT INTO `sup_tbl_user_log` VALUES ('36', '1', '2019-11-15 01:41:56', '2019-11-15 01:42:11');
INSERT INTO `sup_tbl_user_log` VALUES ('37', '3', '2019-11-15 01:51:00', '2019-11-15 01:51:49');
INSERT INTO `sup_tbl_user_log` VALUES ('38', '1', '2019-11-15 01:51:56', '2019-11-15 01:56:25');
INSERT INTO `sup_tbl_user_log` VALUES ('39', '3', '2019-11-15 01:56:30', '2019-11-15 01:58:48');
INSERT INTO `sup_tbl_user_log` VALUES ('40', '3', '2019-11-15 01:58:53', '2019-11-15 02:41:03');
INSERT INTO `sup_tbl_user_log` VALUES ('41', '3', '2019-11-15 02:41:09', '2019-11-15 02:49:36');
INSERT INTO `sup_tbl_user_log` VALUES ('42', '1', '2019-11-15 02:49:43', '2019-11-15 04:07:27');
INSERT INTO `sup_tbl_user_log` VALUES ('43', '2', '2019-11-15 04:07:32', '2019-11-15 04:09:27');
INSERT INTO `sup_tbl_user_log` VALUES ('44', '3', '2019-11-15 04:09:36', '2019-11-15 04:17:21');
INSERT INTO `sup_tbl_user_log` VALUES ('45', '1', '2019-11-15 04:17:36', '2019-11-15 04:19:52');
INSERT INTO `sup_tbl_user_log` VALUES ('46', '7', '2019-11-15 04:19:57', '2019-11-15 04:22:27');
INSERT INTO `sup_tbl_user_log` VALUES ('47', '3', '2019-11-15 04:22:39', '2019-11-15 04:23:44');
INSERT INTO `sup_tbl_user_log` VALUES ('48', '7', '2019-11-15 04:24:30', '2019-11-15 04:32:00');
INSERT INTO `sup_tbl_user_log` VALUES ('49', '1', '2019-11-15 04:32:06', '2019-11-15 04:33:16');
INSERT INTO `sup_tbl_user_log` VALUES ('50', '2', '2019-11-15 04:33:30', '2019-11-15 05:03:18');
INSERT INTO `sup_tbl_user_log` VALUES ('51', '2', '2019-11-15 05:03:24', '2019-11-15 05:06:00');
INSERT INTO `sup_tbl_user_log` VALUES ('52', '1', '2019-11-15 05:06:05', '2019-11-15 05:06:27');
INSERT INTO `sup_tbl_user_log` VALUES ('53', '2', '2019-11-15 05:06:36', '2019-11-15 05:41:18');
INSERT INTO `sup_tbl_user_log` VALUES ('54', '3', '2019-11-15 05:41:24', '2019-11-15 05:52:16');
INSERT INTO `sup_tbl_user_log` VALUES ('55', '3', '2019-11-15 05:52:28', '2019-11-15 05:56:27');
INSERT INTO `sup_tbl_user_log` VALUES ('56', '7', '2019-11-15 05:56:34', '2019-11-15 06:13:32');
INSERT INTO `sup_tbl_user_log` VALUES ('57', '1', '2019-11-15 06:13:38', '2019-11-15 06:14:38');
INSERT INTO `sup_tbl_user_log` VALUES ('58', '2', '2019-11-15 06:14:45', '2019-11-15 06:56:47');
INSERT INTO `sup_tbl_user_log` VALUES ('59', '2', '2019-11-15 06:56:52', '2019-11-15 07:01:37');
INSERT INTO `sup_tbl_user_log` VALUES ('60', '3', '2019-11-15 07:01:42', '2019-11-15 07:01:55');
INSERT INTO `sup_tbl_user_log` VALUES ('61', '7', '2019-11-15 07:02:03', '2019-11-15 07:02:13');
INSERT INTO `sup_tbl_user_log` VALUES ('62', '1', '2019-11-15 07:02:18', '2019-11-15 07:04:44');
INSERT INTO `sup_tbl_user_log` VALUES ('63', '2', '2019-11-15 07:04:52', '2019-11-15 07:12:04');
INSERT INTO `sup_tbl_user_log` VALUES ('64', '1', '2019-11-15 07:12:09', '2019-11-15 07:20:58');
INSERT INTO `sup_tbl_user_log` VALUES ('65', '2', '2019-11-15 07:21:04', '2019-11-15 07:22:41');
INSERT INTO `sup_tbl_user_log` VALUES ('66', '3', '2019-11-15 07:22:47', '2019-11-15 07:23:20');
INSERT INTO `sup_tbl_user_log` VALUES ('67', '7', '2019-11-15 07:23:28', '2019-11-15 07:25:08');
INSERT INTO `sup_tbl_user_log` VALUES ('68', '2', '2019-11-15 07:25:15', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('69', '1', '2019-11-15 15:51:40', '2019-11-15 15:52:30');
INSERT INTO `sup_tbl_user_log` VALUES ('70', '2', '2019-11-15 15:52:37', '2019-11-15 18:37:40');
INSERT INTO `sup_tbl_user_log` VALUES ('71', '2', '2019-11-15 18:37:46', '2019-11-15 19:41:50');
INSERT INTO `sup_tbl_user_log` VALUES ('72', '3', '2019-11-15 19:41:56', '2019-11-15 21:28:27');
INSERT INTO `sup_tbl_user_log` VALUES ('73', '1', '2019-11-15 21:28:35', '2019-11-15 21:28:40');
INSERT INTO `sup_tbl_user_log` VALUES ('74', '2', '2019-11-15 21:28:47', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('75', '2', '2019-11-15 22:11:11', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('76', '2', '2019-11-18 12:10:02', '2019-11-18 12:14:55');
INSERT INTO `sup_tbl_user_log` VALUES ('77', '3', '2019-11-18 12:15:02', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('78', '2', '2019-11-18 12:19:29', '2019-11-18 12:31:17');
INSERT INTO `sup_tbl_user_log` VALUES ('79', '1', '2019-11-18 12:37:44', '2019-11-18 12:44:29');
INSERT INTO `sup_tbl_user_log` VALUES ('80', '2', '2019-11-18 12:44:34', '2019-11-18 13:09:49');
INSERT INTO `sup_tbl_user_log` VALUES ('81', '2', '2019-11-18 13:10:01', '2019-11-18 13:11:32');
INSERT INTO `sup_tbl_user_log` VALUES ('82', '7', '2019-11-18 13:11:37', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('83', '2', '2019-11-24 14:38:02', '2019-11-24 14:49:13');
INSERT INTO `sup_tbl_user_log` VALUES ('84', '3', '2019-11-24 14:49:26', '2019-11-24 14:49:53');
INSERT INTO `sup_tbl_user_log` VALUES ('85', '2', '2019-11-24 14:50:00', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('86', '1', '2019-11-29 19:59:57', '2019-11-29 20:00:54');
INSERT INTO `sup_tbl_user_log` VALUES ('87', '2', '2019-11-29 20:01:00', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('88', '2', '2019-11-30 09:38:20', '2019-11-30 09:39:17');
INSERT INTO `sup_tbl_user_log` VALUES ('89', '8', '2019-11-30 09:39:24', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('90', '2', '2019-11-30 12:47:24', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('91', '2', '2019-11-30 14:24:54', '2019-11-30 15:02:48');
INSERT INTO `sup_tbl_user_log` VALUES ('92', '8', '2019-11-30 15:02:54', '2019-11-30 15:11:11');
INSERT INTO `sup_tbl_user_log` VALUES ('93', '11', '2019-11-30 15:11:27', '2019-11-30 15:19:04');
INSERT INTO `sup_tbl_user_log` VALUES ('94', '8', '2019-11-30 15:19:10', '2019-11-30 15:20:14');
INSERT INTO `sup_tbl_user_log` VALUES ('95', '11', '2019-11-30 15:20:20', '2019-11-30 15:20:27');
INSERT INTO `sup_tbl_user_log` VALUES ('96', '12', '2019-11-30 15:20:35', '2019-11-30 15:23:10');
INSERT INTO `sup_tbl_user_log` VALUES ('97', '2', '2019-11-30 15:23:18', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('98', '2', '2019-12-01 08:54:39', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('99', '2', '2019-12-01 08:57:52', '2019-12-01 09:07:47');
INSERT INTO `sup_tbl_user_log` VALUES ('100', '8', '2019-12-01 09:07:53', '2019-12-01 11:43:19');
INSERT INTO `sup_tbl_user_log` VALUES ('101', '2', '2019-12-01 11:23:01', '2019-12-01 11:41:15');
INSERT INTO `sup_tbl_user_log` VALUES ('102', '9', '2019-12-01 11:41:20', '2019-12-01 11:51:19');
INSERT INTO `sup_tbl_user_log` VALUES ('103', '2', '2019-12-01 11:43:25', '2019-12-01 12:00:18');
INSERT INTO `sup_tbl_user_log` VALUES ('104', '8', '2019-12-01 11:58:40', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('105', '11', '2019-12-01 12:00:24', '2019-12-01 13:47:05');
INSERT INTO `sup_tbl_user_log` VALUES ('106', '12', '2019-12-01 12:04:18', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('107', '2', '2019-12-01 13:47:12', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('108', '8', '2019-12-01 20:58:17', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('109', '8', '2019-12-02 05:02:07', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('110', '8', '2019-12-02 15:10:57', '2019-12-02 16:06:52');
INSERT INTO `sup_tbl_user_log` VALUES ('111', '2', '2019-12-02 16:12:10', '2019-12-02 16:52:32');
INSERT INTO `sup_tbl_user_log` VALUES ('112', '2', '2019-12-02 16:52:42', '2019-12-02 16:52:51');
INSERT INTO `sup_tbl_user_log` VALUES ('113', '8', '2019-12-02 16:55:46', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('114', '8', '2019-12-03 22:12:10', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('115', '8', '2019-12-04 04:01:25', '2019-12-04 04:22:40');
INSERT INTO `sup_tbl_user_log` VALUES ('116', '11', '2019-12-04 04:22:50', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('117', '11', '2019-12-05 04:37:06', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('118', '11', '2019-12-05 05:41:56', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('119', '11', '2019-12-05 10:50:58', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('120', '9', '2019-12-05 19:56:05', '2019-12-05 19:56:30');
INSERT INTO `sup_tbl_user_log` VALUES ('121', '9', '2019-12-05 19:56:46', '2019-12-05 19:56:52');
INSERT INTO `sup_tbl_user_log` VALUES ('122', '11', '2019-12-05 19:57:09', '2019-12-05 20:40:50');
INSERT INTO `sup_tbl_user_log` VALUES ('123', '8', '2019-12-05 20:40:57', '2019-12-05 20:41:07');
INSERT INTO `sup_tbl_user_log` VALUES ('124', '11', '2019-12-05 20:41:15', '2019-12-05 21:45:25');
INSERT INTO `sup_tbl_user_log` VALUES ('125', '8', '2019-12-05 21:45:33', '2019-12-05 21:45:48');
INSERT INTO `sup_tbl_user_log` VALUES ('126', '11', '2019-12-05 21:45:56', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('127', '11', '2019-12-05 22:23:37', '2019-12-05 22:46:34');
INSERT INTO `sup_tbl_user_log` VALUES ('128', '8', '2019-12-05 22:47:31', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('129', '8', '2019-12-06 07:45:31', '2019-12-06 07:48:13');
INSERT INTO `sup_tbl_user_log` VALUES ('130', '11', '2019-12-06 07:48:19', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('131', '11', '2019-12-06 07:58:27', '2019-12-06 07:58:36');
INSERT INTO `sup_tbl_user_log` VALUES ('132', '8', '2019-12-06 07:58:47', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('133', '2', '2019-12-07 14:18:09', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('134', '2', '2019-12-10 09:38:00', '2019-12-10 09:57:38');
INSERT INTO `sup_tbl_user_log` VALUES ('135', '1', '2019-12-10 09:57:43', '2019-12-10 11:24:48');
INSERT INTO `sup_tbl_user_log` VALUES ('136', '2', '2019-12-10 11:26:39', '2019-12-10 12:18:41');
INSERT INTO `sup_tbl_user_log` VALUES ('137', '2', '2019-12-10 12:19:22', '2019-12-10 12:20:10');
INSERT INTO `sup_tbl_user_log` VALUES ('138', '1', '2019-12-10 12:20:15', '2019-12-10 12:22:33');
INSERT INTO `sup_tbl_user_log` VALUES ('139', '6', '2019-12-10 12:22:39', '2019-12-10 12:28:26');
INSERT INTO `sup_tbl_user_log` VALUES ('140', '6', '2019-12-10 12:28:48', '2019-12-10 12:29:05');
INSERT INTO `sup_tbl_user_log` VALUES ('141', '2', '2019-12-10 12:29:22', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('142', '3', '2019-12-10 12:35:30', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('143', '4', '2019-12-10 12:38:02', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('144', '4', '2019-12-10 20:36:14', '2019-12-10 20:37:06');
INSERT INTO `sup_tbl_user_log` VALUES ('145', '2', '2019-12-10 20:37:12', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('146', '2', '2019-12-11 05:44:08', '2019-12-11 08:07:01');
INSERT INTO `sup_tbl_user_log` VALUES ('147', '3', '2019-12-11 08:07:13', '2019-12-11 08:14:30');
INSERT INTO `sup_tbl_user_log` VALUES ('148', '2', '2019-12-11 08:14:50', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('149', '3', '2019-12-11 08:15:48', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('150', '6', '2019-12-11 08:35:13', '2019-12-11 09:12:53');
INSERT INTO `sup_tbl_user_log` VALUES ('151', '6', '2019-12-11 09:12:59', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('152', '2', '2019-12-11 17:09:40', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('153', '6', '2019-12-11 17:16:07', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('154', '7', '2019-12-11 18:44:16', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('155', '3', '2019-12-11 21:57:06', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('156', '6', '2019-12-11 23:04:15', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('157', '6', '2019-12-12 00:16:16', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('158', '6', '2019-12-12 12:49:00', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('159', '2', '2019-12-16 19:40:25', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('160', '6', '2019-12-26 17:18:33', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('161', '1', '2019-12-28 09:38:23', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('162', '6', '2019-12-28 17:39:59', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('163', '6', '2019-12-29 00:46:57', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('164', '6', '2019-12-29 03:50:55', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('165', '6', '2019-12-30 16:13:38', '2019-12-30 18:49:34');
INSERT INTO `sup_tbl_user_log` VALUES ('166', '6', '2019-12-31 14:16:31', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('167', '6', '2019-12-31 18:21:27', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('168', '6', '2020-01-31 18:35:58', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('169', '6', '2020-02-01 02:14:31', '0000-00-00 00:00:00');
INSERT INTO `sup_tbl_user_log` VALUES ('170', '6', '2020-02-04 09:56:49', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for sup_tbl_vehicle_category
-- ----------------------------
DROP TABLE IF EXISTS `sup_tbl_vehicle_category`;
CREATE TABLE `sup_tbl_vehicle_category` (
  `veh_cat_id` int(11) NOT NULL,
  `veh_cat_name` varchar(100) DEFAULT NULL,
  `veh_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`veh_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sup_tbl_vehicle_category
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_account
-- ----------------------------
DROP TABLE IF EXISTS `tbl_account`;
CREATE TABLE `tbl_account` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_code` int(11) DEFAULT NULL,
  `acc_name` int(11) DEFAULT NULL,
  `acc_type` int(11) DEFAULT NULL,
  `acc_status` int(11) DEFAULT NULL,
  `acc_unit` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_account
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_allocate_fund_limit
-- ----------------------------
DROP TABLE IF EXISTS `tbl_allocate_fund_limit`;
CREATE TABLE `tbl_allocate_fund_limit` (
  `allocate_fund_limit_id` int(11) NOT NULL AUTO_INCREMENT,
  `limit_type_id` int(11) DEFAULT NULL,
  `limited_amount` float(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`allocate_fund_limit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_allocate_fund_limit
-- ----------------------------
INSERT INTO `tbl_allocate_fund_limit` VALUES ('1', '2', '500.00', '0');
INSERT INTO `tbl_allocate_fund_limit` VALUES ('2', '3', '100000.00', '1');
INSERT INTO `tbl_allocate_fund_limit` VALUES ('3', '4', '50000.00', '1');
INSERT INTO `tbl_allocate_fund_limit` VALUES ('4', '5', '10000.00', '1');
INSERT INTO `tbl_allocate_fund_limit` VALUES ('5', '6', '10000000.00', '1');

-- ----------------------------
-- Table structure for tbl_appointment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_appointment`;
CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_name` varchar(200) NOT NULL,
  `appointment_status` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_appointment
-- ----------------------------
INSERT INTO `tbl_appointment` VALUES ('1', 'Head Office', '1');
INSERT INTO `tbl_appointment` VALUES ('2', 'Region Coordinator', '1');
INSERT INTO `tbl_appointment` VALUES ('3', 'Team Member', '1');

-- ----------------------------
-- Table structure for tbl_bill
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bill`;
CREATE TABLE `tbl_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(10) NOT NULL,
  `job_date` date NOT NULL,
  `job_id` int(11) NOT NULL,
  `bill_amount` float(10,2) NOT NULL,
  `remarks` text NOT NULL,
  `bill_date` date NOT NULL,
  `bill_status` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_bill
-- ----------------------------
INSERT INTO `tbl_bill` VALUES ('1', '98989', '2019-12-05', '1', '900909.00', '9999909090', '2019-12-05', '1', '2', '6', '6', '11', '2019-12-05 22:41:45', '11', '2019-12-05 22:44:32');
INSERT INTO `tbl_bill` VALUES ('2', '2', '2019-12-05', '1', '20000.00', '123123', '2019-12-05', '1', '2', '6', '6', '11', '2019-12-05 22:40:38', '11', '2019-12-05 22:44:36');
INSERT INTO `tbl_bill` VALUES ('3', '001', '2019-12-18', '1', '10000.00', 'test', '2019-12-10', '2', '1', '1', '1', '3', '2019-12-10 13:33:39', '2', '2019-12-10 14:09:01');
INSERT INTO `tbl_bill` VALUES ('4', '123', '2019-12-10', '2', '20000.00', 'test', '2019-12-10', '2', '1', '1', '1', '3', '2019-12-10 15:37:07', '2', '2019-12-11 22:40:46');
INSERT INTO `tbl_bill` VALUES ('5', '0327483', '2019-12-11', '3', '2500.00', 'test', '2019-12-11', '0', '1', '1', '1', '3', '2019-12-11 22:24:01', '3', '2019-12-11 22:29:07');
INSERT INTO `tbl_bill` VALUES ('6', '800000', '2019-12-18', '3', '2500.00', 'asdasd', '2019-12-11', '1', '1', '1', '1', '3', '2019-12-11 22:29:25', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tbl_depot
-- ----------------------------
DROP TABLE IF EXISTS `tbl_depot`;
CREATE TABLE `tbl_depot` (
  `depot_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_code` varchar(100) NOT NULL,
  `depot_name` text NOT NULL,
  `depot_short_name` varchar(250) NOT NULL,
  `depot_addr` text NOT NULL,
  `depot_tel1` varchar(150) NOT NULL,
  `depot_tel2` varchar(150) NOT NULL,
  `depot_tel3` varchar(150) NOT NULL,
  `depot_email` varchar(150) NOT NULL,
  `depot_fax` varchar(150) NOT NULL,
  `depot_web` varchar(200) NOT NULL,
  `org_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `depot_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`depot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_depot
-- ----------------------------
INSERT INTO `tbl_depot` VALUES ('1', '01', 'Kandy', 'Kandy', '-', '-', '-', '-', '-', '-', '-', '1', '1', '1', '2019-12-10 10:55:02', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_depot` VALUES ('2', '02', 'Matale', 'Matale', '-', '-', '-', '-', '-', '-', '-', '1', '1', '1', '2019-12-10 10:55:36', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_depot` VALUES ('3', '03', 'Gampola', 'Gampola', '-', '-', '-', '-', '-', '-', '-', '1', '1', '1', '2019-12-10 10:56:20', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_depot` VALUES ('4', '04', 'Kegalle', 'Kegalle', '-', '-', '-', '-', '-', '-', '-', '1', '1', '1', '2019-12-10 10:59:04', '1', '2019-12-10 10:59:47', '1');
INSERT INTO `tbl_depot` VALUES ('5', '05', 'Nuwaraeliya', 'Nuwaraeliya', '-', '-', '-', '-', '-', '-', '-', '1', '1', '1', '2019-12-10 11:07:17', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_depot` VALUES ('6', '01', 'Ratnapura', 'Ratnapura', '-', '-', '-', '-', '-', '-', '-', '1', '2', '1', '2019-12-11 17:49:39', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_depot` VALUES ('7', 'Balangoda', 'Balangoda', 'Balangoda', '-', '-', '-', '-', '-', '--', '-', '1', '2', '1', '2019-12-11 17:50:29', '6', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for tbl_district
-- ----------------------------
DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE `tbl_district` (
  `disid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `proid` int(11) NOT NULL,
  `discode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`disid`),
  KEY `FKdistrict643350` (`proid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_district
-- ----------------------------
INSERT INTO `tbl_district` VALUES ('1', 'NOT SPECIFIED', '1', '');
INSERT INTO `tbl_district` VALUES ('2', 'GAMPAHA', '2', 'GAM');
INSERT INTO `tbl_district` VALUES ('3', 'COLOMBO', '2', 'COL');
INSERT INTO `tbl_district` VALUES ('4', 'KALUTARA', '2', 'KAL');
INSERT INTO `tbl_district` VALUES ('5', 'KANDY', '3', 'KAN');
INSERT INTO `tbl_district` VALUES ('6', 'MATALE', '3', 'MAT');
INSERT INTO `tbl_district` VALUES ('7', 'NUWARA ELIYA', '3', 'NUW');
INSERT INTO `tbl_district` VALUES ('8', 'AMPARA', '4', 'AMP');
INSERT INTO `tbl_district` VALUES ('9', 'BATTICALOA', '4', 'BAT');
INSERT INTO `tbl_district` VALUES ('10', 'TRINCOMALEE', '4', 'TRI');
INSERT INTO `tbl_district` VALUES ('11', 'ANURADHAPURA', '5', 'ANU');
INSERT INTO `tbl_district` VALUES ('12', 'POLONNARUWA', '5', 'POL');
INSERT INTO `tbl_district` VALUES ('13', 'JAFFNA', '6', 'JAF');
INSERT INTO `tbl_district` VALUES ('14', 'KILINOCHCHI', '6', 'KIL');
INSERT INTO `tbl_district` VALUES ('15', 'MANNAR', '6', 'MAN');
INSERT INTO `tbl_district` VALUES ('16', 'MULLAITIVU', '6', 'MUL');
INSERT INTO `tbl_district` VALUES ('17', 'VAVUNIYA', '6', 'VAV');
INSERT INTO `tbl_district` VALUES ('18', 'KURUNEGALA', '7', 'KUR');
INSERT INTO `tbl_district` VALUES ('19', 'PUTTALAM', '7', 'PUT');
INSERT INTO `tbl_district` VALUES ('20', 'KEGALLE', '8', 'KEG');
INSERT INTO `tbl_district` VALUES ('21', 'RATNAPURA', '8', 'RAT');
INSERT INTO `tbl_district` VALUES ('22', 'GALLE', '9', 'GAL');
INSERT INTO `tbl_district` VALUES ('23', 'HAMBANTOTA', '9', 'HAM');
INSERT INTO `tbl_district` VALUES ('24', 'MATARA', '9', 'MAR');
INSERT INTO `tbl_district` VALUES ('25', 'BADULLA', '10', 'BAD');
INSERT INTO `tbl_district` VALUES ('26', 'MONERAGALA', '10', 'MON');

-- ----------------------------
-- Table structure for tbl_employeer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_employeer`;
CREATE TABLE `tbl_employeer` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `emp_name` varchar(300) NOT NULL,
  `emp_full_name` varchar(600) NOT NULL,
  `emp_address` varchar(600) NOT NULL,
  `emp_nic` varchar(100) NOT NULL,
  `emp_birth` date NOT NULL,
  `emp_contact1` varchar(100) NOT NULL,
  `emp_contact2` varchar(100) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `spouse_name` varchar(300) NOT NULL,
  `spouse_nic` varchar(150) NOT NULL,
  `appointment` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `pass` text NOT NULL,
  `user_type` int(11) NOT NULL,
  `emp_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_employeer
-- ----------------------------
INSERT INTO `tbl_employeer` VALUES ('1', '2', '0', '0', '213213', 'Kasun Chamara ', 'kasun chamara', 'No 130 ,Rilaodawatta ,, Heenatigala Talpe', '45435345345', '2019-05-08', '234234', '34534EE', 'SANDUNCHANAKA@JHASDJH.COM', '8787878', '234234', '1', 'admin', '7dd12f3a9afa0282a575b8ef99dea2a0c1becb51', '1', '1', '2019-09-25 11:09:38', '1', '2019-11-29 20:22:33', '2');
INSERT INTO `tbl_employeer` VALUES ('2', '1', '1', '0', '48', 'Vikum Kumarasiri', 'Vikum Kumarasiri', '-', '-', '2019-12-23', '-', '-', '-', '-', '-', '2', 'Vikum', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '3', '1', '2019-12-10 11:13:04', '1', '2019-12-10 20:37:23', '2');
INSERT INTO `tbl_employeer` VALUES ('3', '1', '1', '1', '131', 'K.C.P. Ariyasena', 'K.C.P. Ariyasena', '-', '-', '1999-06-16', '-', '-', '-', '-', '-', '3', 'kcp', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '4', '1', '2019-12-10 12:02:48', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_employeer` VALUES ('4', '1', '1', '1', '245', 'Manoj Bandara', 'Manoj Bandara', '-', '-', '1999-06-25', '-', '-', '-', '-', '-', '3', 'Manoj', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '4', '1', '2019-12-10 12:04:15', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_employeer` VALUES ('5', '1', '1', '1', '88', 'Tharindu Pathirana', 'Tharindu Pathirana', '-', '-', '1999-06-16', '-', '-', '-', '-', '-', '3', 'tharidu', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '4', '1', '2019-12-10 12:05:38', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_employeer` VALUES ('6', '1', '0', '0', '01', 'Net lanka', 'Net lanka', '-', '-', '2000-11-29', '-', '-', '-', '-', '-', '1', 'net', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '2', '1', '2019-12-10 12:21:29', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_employeer` VALUES ('7', '1', '2', '0', '212', 'Lakshika Jayasekara', 'Lakshika Jayasekara', '-', '-', '2019-12-25', '-', '-', '-', '-', '-', '2', 'Lakshika', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '3', '1', '2019-12-11 17:48:08', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_employeer` VALUES ('8', '1', '2', '6', '023', 'Sameera Seneviratne', 'Sameera Seneviratne', '-', '-', '2019-12-20', '-', '-', '-', '-', '-', '3', 'Sameera', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '4', '1', '2019-12-11 17:51:35', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_employeer` VALUES ('9', '1', '3', '0', '675', 'Kasun Nilanga', 'Kasun Nilanga', '-', '-', '2019-12-17', '-', '-', '-', '-', '-', '2', 'Kasun', 'e3431a8e0adbf96fd140103dc6f63a3f8fa343ab', '3', '1', '2019-12-11 18:52:10', '6', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for tbl_employeer_jobs
-- ----------------------------
DROP TABLE IF EXISTS `tbl_employeer_jobs`;
CREATE TABLE `tbl_employeer_jobs` (
  `job_emp_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_employeer_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_fund_allocation
-- ----------------------------
DROP TABLE IF EXISTS `tbl_fund_allocation`;
CREATE TABLE `tbl_fund_allocation` (
  `fund_allocation_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id_from` int(11) NOT NULL,
  `emp_id_to` int(11) NOT NULL,
  `fund_allocation_type` int(11) NOT NULL,
  `fund_allocation_ref` varchar(200) NOT NULL,
  `allocate_amount` float(10,2) NOT NULL,
  `remarks` text NOT NULL,
  `fund_allocation_cat` int(11) NOT NULL,
  `fund_allocation_status` int(11) NOT NULL,
  `approve_comment` text NOT NULL,
  `org_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `appointment` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`fund_allocation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_fund_allocation
-- ----------------------------
INSERT INTO `tbl_fund_allocation` VALUES ('1', '6', '2', '3', '', '100000.00', 'test', '1', '3', 'accept', '1', '0', '0', '2', '2', '2019-12-10 12:28:11', '6', '2019-12-10 12:31:35', '2');
INSERT INTO `tbl_fund_allocation` VALUES ('2', '2', '3', '3', '', '50000.00', 'test', '1', '3', 'test', '1', '1', '0', '3', '3', '2019-12-10 12:32:24', '2', '2019-12-10 12:35:40', '3');
INSERT INTO `tbl_fund_allocation` VALUES ('3', '2', '4', '3', '', '50000.00', 'test', '1', '3', 'test', '1', '1', '0', '3', '3', '2019-12-10 12:32:52', '2', '2019-12-10 12:38:25', '4');
INSERT INTO `tbl_fund_allocation` VALUES ('4', '6', '7', '3', '', '50000.00', '-', '1', '3', 'accept', '1', '0', '0', '2', '2', '2019-12-11 17:56:15', '6', '2019-12-11 18:45:01', '7');
INSERT INTO `tbl_fund_allocation` VALUES ('5', '6', '9', '3', '', '10000.00', '-', '1', '1', '', '1', '0', '0', '2', '2', '2019-12-11 18:52:31', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_fund_allocation` VALUES ('6', '6', '2', '5', '', '50000.00', '-', '1', '3', '-', '1', '0', '0', '2', '2', '2019-12-11 19:14:57', '6', '2019-12-11 19:18:26', '2');
INSERT INTO `tbl_fund_allocation` VALUES ('7', '2', '3', '5', '', '10000.00', '-', '1', '1', '', '1', '1', '0', '3', '3', '2019-12-11 19:25:02', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_fund_allocation` VALUES ('8', '6', '2', '1', '', '15000.00', 'uiuiui', '1', '1', '', '1', '0', '0', '2', '2', '2019-12-30 17:58:22', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_fund_allocation` VALUES ('9', '6', '9', '1', '', '5000000.00', 'uiuiui', '1', '1', '', '1', '0', '0', '2', '2', '2019-12-30 17:58:55', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_fund_allocation` VALUES ('10', '6', '7', '2', '', '4500000.00', 'uiuiui', '1', '1', '', '1', '0', '0', '2', '2', '2019-12-30 18:04:57', '6', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for tbl_fund_allocation_types
-- ----------------------------
DROP TABLE IF EXISTS `tbl_fund_allocation_types`;
CREATE TABLE `tbl_fund_allocation_types` (
  `fund_allocation_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fund_allocation_type_name` varchar(300) NOT NULL,
  `act` int(11) NOT NULL,
  PRIMARY KEY (`fund_allocation_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_fund_allocation_types
-- ----------------------------
INSERT INTO `tbl_fund_allocation_types` VALUES ('1', 'Weekly Budject', '1');
INSERT INTO `tbl_fund_allocation_types` VALUES ('2', 'Urgent Requirement', '1');
INSERT INTO `tbl_fund_allocation_types` VALUES ('3', 'Additional Cash', '1');
INSERT INTO `tbl_fund_allocation_types` VALUES ('4', 'Monthly Allocations', '0');
INSERT INTO `tbl_fund_allocation_types` VALUES ('5', 'Service Allocations', '0');

-- ----------------------------
-- Table structure for tbl_gen_for_jobs
-- ----------------------------
DROP TABLE IF EXISTS `tbl_gen_for_jobs`;
CREATE TABLE `tbl_gen_for_jobs` (
  `gen_jobs_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_id` int(11) DEFAULT NULL,
  `gen_ref` varchar(255) DEFAULT NULL,
  `request_time_to_install` varchar(255) DEFAULT NULL,
  `sla_time` varchar(255) DEFAULT NULL,
  `install_time` varchar(255) DEFAULT NULL,
  `request_to_remove_time` varchar(255) DEFAULT NULL,
  `remove_time` varchar(255) DEFAULT '',
  `install_duration` varchar(255) DEFAULT NULL,
  `install_dealay` varchar(255) DEFAULT NULL,
  `cancelation` varchar(255) DEFAULT NULL,
  `cancelation_payability` varchar(255) DEFAULT NULL,
  `manual_distance` varchar(255) DEFAULT '',
  `usage_qty` varchar(255) DEFAULT '',
  `expenses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gen_jobs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_gen_for_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_item_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_item_category`;
CREATE TABLE `tbl_item_category` (
  `item_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_cat_code` varchar(50) DEFAULT NULL,
  `item_cat_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`item_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_item_category
-- ----------------------------
INSERT INTO `tbl_item_category` VALUES ('1', null, 'Engine Oil');
INSERT INTO `tbl_item_category` VALUES ('2', null, 'Filters');
INSERT INTO `tbl_item_category` VALUES ('3', null, null);

-- ----------------------------
-- Table structure for tbl_item_master
-- ----------------------------
DROP TABLE IF EXISTS `tbl_item_master`;
CREATE TABLE `tbl_item_master` (
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_name` varchar(150) DEFAULT NULL,
  `part_number` varchar(100) DEFAULT NULL,
  `item_cat_id` int(11) DEFAULT NULL,
  `item_sub_cat_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `item_date` date DEFAULT NULL,
  `item_unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_item_master
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_item_sub_cat
-- ----------------------------
DROP TABLE IF EXISTS `tbl_item_sub_cat`;
CREATE TABLE `tbl_item_sub_cat` (
  `itm_sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `itm_sub_code` varchar(50) DEFAULT NULL,
  `item_sub_cat_name` varchar(100) DEFAULT NULL,
  `item_cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`itm_sub_cat_id`),
  KEY `catid` (`item_cat_id`),
  CONSTRAINT `catid` FOREIGN KEY (`item_cat_id`) REFERENCES `tbl_item_category` (`item_cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_item_sub_cat
-- ----------------------------
INSERT INTO `tbl_item_sub_cat` VALUES ('1', null, 'Caltex', '1');
INSERT INTO `tbl_item_sub_cat` VALUES ('2', null, 'Mobil', '1');
INSERT INTO `tbl_item_sub_cat` VALUES ('3', null, 'Oil Filter', '2');
INSERT INTO `tbl_item_sub_cat` VALUES ('4', null, 'Fuel Filter', '2');
INSERT INTO `tbl_item_sub_cat` VALUES ('5', null, 'Air Filter', '2');

-- ----------------------------
-- Table structure for tbl_jobs
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jobs`;
CREATE TABLE `tbl_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_number` varchar(20) NOT NULL,
  `site_id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `job_date` text NOT NULL,
  `service_person` int(11) NOT NULL,
  `job_status` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_job_gen_fuels
-- ----------------------------
DROP TABLE IF EXISTS `tbl_job_gen_fuels`;
CREATE TABLE `tbl_job_gen_fuels` (
  `job_gen_fuel_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `gen_id` int(11) DEFAULT NULL,
  `install_duration` varchar(255) DEFAULT NULL,
  `usage_qty` int(11) DEFAULT NULL,
  `fuel_consumption` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_gen_fuel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_job_gen_fuels
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_job_types
-- ----------------------------
DROP TABLE IF EXISTS `tbl_job_types`;
CREATE TABLE `tbl_job_types` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_name` varchar(400) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_job_types
-- ----------------------------
INSERT INTO `tbl_job_types` VALUES ('1', 'Repair', '1');
INSERT INTO `tbl_job_types` VALUES ('2', 'Maintenance', '1');

-- ----------------------------
-- Table structure for tbl_job_vehicles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_job_vehicles`;
CREATE TABLE `tbl_job_vehicles` (
  `job_vehicle_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `act` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_job_vehicles
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_office
-- ----------------------------
DROP TABLE IF EXISTS `tbl_office`;
CREATE TABLE `tbl_office` (
  `office_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_code` varchar(100) NOT NULL,
  `office_name` text NOT NULL,
  `office_short_name` varchar(250) NOT NULL,
  `office_addr` text NOT NULL,
  `office_tel1` varchar(150) NOT NULL,
  `office_tel2` varchar(150) NOT NULL,
  `office_tel3` varchar(150) NOT NULL,
  `office_email` varchar(150) NOT NULL,
  `office_fax` varchar(150) NOT NULL,
  `office_web` varchar(200) NOT NULL,
  `org_id` int(11) NOT NULL,
  `org_type` int(11) NOT NULL,
  `office_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_office
-- ----------------------------
INSERT INTO `tbl_office` VALUES ('1', 'CEN', 'Central Region', 'Central', '.', '-', '-', '-', '-', '-', '-', '1', '2', '1', '2019-12-10 10:16:01', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_office` VALUES ('2', 'Uva', ' Uva Region', 'Uva', '-', '-', '-', '-', '-', '-', '-', '1', '2', '1', '2019-12-10 10:17:19', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_office` VALUES ('3', 'Southern', 'Southern Region', 'Southern', '-', '-', '-', '-', '-', '-', '-', '1', '2', '1', '2019-12-10 10:35:53', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_office` VALUES ('4', 'Western South', 'Western South  Region', 'Western South ', '-', '-', '-', '-', '-', '-', '-', '1', '2', '1', '2019-12-10 10:36:44', '1', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for tbl_organization
-- ----------------------------
DROP TABLE IF EXISTS `tbl_organization`;
CREATE TABLE `tbl_organization` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_code` varchar(50) NOT NULL,
  `org_name` varchar(400) NOT NULL,
  `org_short_name` varchar(100) NOT NULL,
  `org_address` varchar(1000) NOT NULL,
  `org_tel1` varchar(50) NOT NULL,
  `org_tel2` varchar(50) NOT NULL,
  `org_tel3` varchar(50) NOT NULL,
  `org_fax` varchar(100) NOT NULL,
  `org_email` varchar(150) NOT NULL,
  `org_web` varchar(150) NOT NULL,
  `org_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_organization
-- ----------------------------
INSERT INTO `tbl_organization` VALUES ('1', '001', 'Net Lanka Engineering Service (Pvt) Ltd', 'NET LANKA', 'No. 1215, Rajamalwatta Road, Battaramulla, Sri Lanka.', '011 2868204', '', '', '-', 'info@netlanka.com', 'https://www.netlanka.lk/', '1', '2019-12-10 10:02:15', '1', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for tbl_service_provider
-- ----------------------------
DROP TABLE IF EXISTS `tbl_service_provider`;
CREATE TABLE `tbl_service_provider` (
  `service_provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_code` varchar(50) NOT NULL,
  `service_provider_name` varchar(200) NOT NULL,
  `sp_status` int(11) NOT NULL,
  PRIMARY KEY (`service_provider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_service_provider
-- ----------------------------
INSERT INTO `tbl_service_provider` VALUES ('1', '2343', 'asdsad', '1');
INSERT INTO `tbl_service_provider` VALUES ('2', '123', '234123', '0');
INSERT INTO `tbl_service_provider` VALUES ('3', '001', 'DIALOG', '1');
INSERT INTO `tbl_service_provider` VALUES ('4', '002', 'MOBITEL', '1');
INSERT INTO `tbl_service_provider` VALUES ('5', '004', 'LAKNA BELL', '1');
INSERT INTO `tbl_service_provider` VALUES ('6', '', '', '1');

-- ----------------------------
-- Table structure for tbl_sites
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sites`;
CREATE TABLE `tbl_sites` (
  `sites_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_code` varchar(20) DEFAULT NULL,
  `site_name` varchar(500) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `tower_op_id` int(11) DEFAULT NULL,
  `infra_owner` int(11) DEFAULT NULL,
  `tower_type` int(11) DEFAULT NULL,
  `chabin_type` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `on_air_status` int(11) DEFAULT NULL,
  `on_air_date` date DEFAULT NULL,
  `site_address` text DEFAULT NULL,
  `gps_lan` text DEFAULT NULL,
  `gps_lon` text CHARACTER SET utf8 DEFAULT NULL,
  `dns_depot` int(11) DEFAULT NULL,
  `depot_office_contact` varchar(100) DEFAULT NULL,
  `permission_req` int(11) DEFAULT NULL,
  `wheel_drive_req` int(11) DEFAULT NULL,
  `tower_height` double DEFAULT NULL,
  `heat_control_sys` int(11) DEFAULT NULL,
  `pg_manual` varchar(50) DEFAULT NULL,
  `fuel_manual` varchar(50) DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `rectifier_model` varchar(50) DEFAULT NULL,
  `care_taker_avilability` int(11) DEFAULT NULL,
  `last_service_date` date DEFAULT NULL,
  `service_frequency` int(11) DEFAULT NULL,
  `ftg_service_frequency` int(11) DEFAULT NULL,
  `gen_service_frequency` int(11) DEFAULT NULL,
  `disel_filling_frequency` int(11) DEFAULT NULL,
  `free_cooling_frequency` int(11) DEFAULT NULL,
  `pest_control_frequency` int(11) DEFAULT NULL,
  `outdoor_bts_clening_frequency` int(11) DEFAULT NULL,
  `tower_n_cabin_inspection_frequency` int(11) DEFAULT NULL,
  `epl_frequency` int(11) DEFAULT NULL,
  `site_status` int(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`sites_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_sites
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_site_care_takers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_site_care_takers`;
CREATE TABLE `tbl_site_care_takers` (
  `care_taker_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `care_taker_name` varchar(200) DEFAULT NULL,
  `care_taker_contact` varchar(200) DEFAULT NULL,
  `care_tk_status` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`care_taker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_site_care_takers
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_site_epl_rpt
-- ----------------------------
DROP TABLE IF EXISTS `tbl_site_epl_rpt`;
CREATE TABLE `tbl_site_epl_rpt` (
  `epl_rpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `base_a` varchar(255) DEFAULT NULL,
  `base_b` varchar(255) DEFAULT NULL,
  `base_c` varchar(255) DEFAULT NULL,
  `base_d` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`epl_rpt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_site_epl_rpt
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_site_service_dates
-- ----------------------------
DROP TABLE IF EXISTS `tbl_site_service_dates`;
CREATE TABLE `tbl_site_service_dates` (
  `ftg_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `pis_target_month` date DEFAULT NULL,
  `general_service_target_month` date DEFAULT NULL,
  `civil_target_month` date DEFAULT NULL,
  `ftg_service_date` date DEFAULT NULL,
  `general_service_date` date DEFAULT NULL,
  `disel_filling_date` date DEFAULT NULL,
  `free_cooling_date` date DEFAULT NULL,
  `pest_control_date` date DEFAULT NULL,
  `outdoor_bts_date` date DEFAULT NULL,
  `tower_n_cabin_inspection_date` date DEFAULT NULL,
  `epl_date` date DEFAULT NULL,
  PRIMARY KEY (`ftg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_site_service_dates
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_supplier_master
-- ----------------------------
DROP TABLE IF EXISTS `tbl_supplier_master`;
CREATE TABLE `tbl_supplier_master` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_supplier_master
-- ----------------------------
INSERT INTO `tbl_supplier_master` VALUES ('1', null, 'SRM  Distributors (pvt) Ltd');
INSERT INTO `tbl_supplier_master` VALUES ('2', null, 'Caltone Southern Lanka (Pvt) Ltd');
INSERT INTO `tbl_supplier_master` VALUES ('3', null, 'Lakwijaya  Distributors');
INSERT INTO `tbl_supplier_master` VALUES ('4', null, 'Sunlink Trading & Services (Pvt) Ltd.');
INSERT INTO `tbl_supplier_master` VALUES ('5', null, 'Trade Promoters (Pvt) Ltd ');
INSERT INTO `tbl_supplier_master` VALUES ('6', null, 'Manathunga Distributors');
INSERT INTO `tbl_supplier_master` VALUES ('7', null, 'Power Lanka (Pvt) Ltd.');
INSERT INTO `tbl_supplier_master` VALUES ('8', null, 'Other Suppliers');

-- ----------------------------
-- Table structure for tbl_towers
-- ----------------------------
DROP TABLE IF EXISTS `tbl_towers`;
CREATE TABLE `tbl_towers` (
  `tower_id` int(11) NOT NULL AUTO_INCREMENT,
  `tower_code` varchar(100) NOT NULL,
  `tower_name` varchar(400) NOT NULL,
  `tower_op` int(11) DEFAULT NULL,
  `Infrao` int(11) DEFAULT NULL,
  `tower_types` int(11) DEFAULT NULL,
  `cabin_type` int(11) DEFAULT NULL,
  `districts` int(11) DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `on_air_st` int(11) DEFAULT NULL,
  `on_air_date` date DEFAULT NULL,
  `tower_location` text DEFAULT NULL,
  `depot` int(11) DEFAULT NULL,
  `depo_officer_contact` varchar(500) DEFAULT NULL,
  `per_req` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `theight` varchar(255) DEFAULT NULL,
  `sp_os` int(11) DEFAULT NULL,
  `stby_ful` int(11) DEFAULT NULL,
  `oil_filter` varchar(500) DEFAULT NULL,
  `air_filter` varchar(500) DEFAULT NULL,
  `fuel_filter` varchar(500) DEFAULT NULL,
  `heat_con` varchar(500) DEFAULT NULL,
  `remarks` text NOT NULL,
  `tower_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`tower_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_towers
-- ----------------------------
INSERT INTO `tbl_towers` VALUES ('1', '01', 'Site 01', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '-', '1', '2019-12-10 12:14:18', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_towers` VALUES ('2', '02', 'Site 02', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'test', '1', '2019-12-10 12:14:40', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_towers` VALUES ('3', 'esdfsd', 'sdfsdfsdf', '3', '1', '2', '5', '5', '2', '1', '2019-12-05', 'ertert', '6', 'retert', '1', 'ertert', 'ertert', 'erter', '2', '1', 'ertert', 'retert', 'rtret', '2', 'ertertert', '1', '2019-12-31 18:22:43', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_towers` VALUES ('4', 'esdfsd', 'sdfsdfsdf', '1', '1', '3', '5', '5', '1', '2', '2019-12-24', 'ertert', '3', 'retert', '1', 'aqua', 'ertert', 'erter', '1', '1', 'ertert', 'retert', 'rtret', '4', 'uiuiuigggg', '1', '2019-12-31 18:24:18', '6', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_towers` VALUES ('5', '345', '34534', '3', '2', '3', '5', '5', '1', '1', '2020-01-07', 'ertert', '4', '34534', '1', '345', 'ertert', '34534', '2', '1', '345', '345', '34534', '4', '345345', '1', '2019-12-31 18:35:32', '6', '0000-00-00 00:00:00', '0');

-- ----------------------------
-- Table structure for tbl_tower_data
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tower_data`;
CREATE TABLE `tbl_tower_data` (
  `tower_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `tower_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `ref_code` varchar(150) NOT NULL,
  `contact_person` varchar(300) NOT NULL,
  `tel_no1` varchar(50) NOT NULL,
  `tel_no2` varchar(50) NOT NULL,
  `tel_no3` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `sp_data_status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(11) NOT NULL,
  PRIMARY KEY (`tower_data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tower_data
-- ----------------------------
INSERT INTO `tbl_tower_data` VALUES ('1', '1', '1', '234324', '23213', '12312', '123', '21312', '123213', '', '1', '2019-09-28 08:43:12', '1', '0000-00-00 00:00:00', '0');
INSERT INTO `tbl_tower_data` VALUES ('2', '1', '3', '234324ee', '23213ee', '12312ee', '123ee', '21312ee', '123213eee', '', '0', '2019-09-29 07:48:49', '1', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for tbl_vehicle_master
-- ----------------------------
DROP TABLE IF EXISTS `tbl_vehicle_master`;
CREATE TABLE `tbl_vehicle_master` (
  `veh_id` int(11) NOT NULL AUTO_INCREMENT,
  `veh_num` int(11) DEFAULT NULL,
  `veh_cat_id` int(11) DEFAULT NULL,
  `veh_owner` varchar(255) DEFAULT NULL,
  `veh_contact` varchar(255) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_contact` varchar(255) DEFAULT NULL,
  `acc_bank` varchar(255) DEFAULT NULL,
  `acc_branch` varchar(255) DEFAULT NULL,
  `acc_number` int(11) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `depot_id` int(11) DEFAULT NULL,
  `veh_ownership` int(11) DEFAULT NULL,
  `veh_status` varchar(255) DEFAULT NULL,
  `veh_project` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`veh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_vehicle_master
-- ----------------------------
