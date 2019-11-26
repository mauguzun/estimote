/*
 Navicat Premium Data Transfer

 Source Server         : vagrant
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : homestead:3306
 Source Schema         : homestead

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 21/11/2019 14:48:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aircrafts
-- ----------------------------
DROP TABLE IF EXISTS `aircrafts`;
CREATE TABLE `aircrafts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_reg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `raport_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `UNIQ_59AF8E00A3BFB812`(`ac_reg`) USING BTREE,
  INDEX `IDX_59AF8E00CF98AA3A`(`raport_id`) USING BTREE,
  CONSTRAINT `FK_59AF8E00CF98AA3A` FOREIGN KEY (`raport_id`) REFERENCES `raports` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aircrafts
-- ----------------------------
INSERT INTO `aircrafts` VALUES (40, 'omg', NULL);
INSERT INTO `aircrafts` VALUES (41, 'some', NULL);
INSERT INTO `aircrafts` VALUES (44, 'asdfasdf123123', NULL);
INSERT INTO `aircrafts` VALUES (45, 'sdf', NULL);
INSERT INTO `aircrafts` VALUES (46, '123', NULL);

-- ----------------------------
-- Table structure for raports
-- ----------------------------
DROP TABLE IF EXISTS `raports`;
CREATE TABLE `raports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eta` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `tail_id` int(11) NULL DEFAULT NULL,
  `stand_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_6A8EE553A76ED395`(`user_id`) USING BTREE,
  INDEX `IDX_6A8EE5533A31B61C`(`tail_id`) USING BTREE,
  INDEX `IDX_6A8EE5539734D487`(`stand_id`) USING BTREE,
  INDEX `IDX_6A8EE5536BF700BD`(`status_id`) USING BTREE,
  CONSTRAINT `FK_6A8EE5533A31B61C` FOREIGN KEY (`tail_id`) REFERENCES `aircrafts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_6A8EE5536BF700BD` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_6A8EE5539734D487` FOREIGN KEY (`stand_id`) REFERENCES `stands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_6A8EE553A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of raports
-- ----------------------------
INSERT INTO `raports` VALUES (5, '21 : 19', NULL, 1, 46, 7, 1);
INSERT INTO `raports` VALUES (7, '17 : 47', NULL, 1, 40, 7, 1);
INSERT INTO `raports` VALUES (8, '09 : 56', NULL, 1, 41, 7, 1);
INSERT INTO `raports` VALUES (9, '09 : 58', NULL, 1, 40, 8, 1);

-- ----------------------------
-- Table structure for stands
-- ----------------------------
DROP TABLE IF EXISTS `stands`;
CREATE TABLE `stands`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `raport_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_396860AACF98AA3A`(`raport_id`) USING BTREE,
  CONSTRAINT `FK_396860AACF98AA3A` FOREIGN KEY (`raport_id`) REFERENCES `raports` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stands
-- ----------------------------
INSERT INTO `stands` VALUES (7, '1 stand', '1234', '1234', NULL);
INSERT INTO `stands` VALUES (8, '2 second', '123123', '123123', NULL);
INSERT INTO `stands` VALUES (9, 'my cat', '12312', '1234', NULL);

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `raport_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_4BF01E11CF98AA3A`(`raport_id`) USING BTREE,
  CONSTRAINT `FK_4BF01E11CF98AA3A` FOREIGN KEY (`raport_id`) REFERENCES `raports` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES (1, 'open123', 'ope111111111111', NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lastname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password_reset_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email_UNIQUE`(`email`) USING BTREE,
  INDEX `user_role_idx`(`role_id`) USING BTREE,
  CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, 'Root', 'Admin', 'admin@aslairlines.be', '$2y$10$tKEvcupgr.Hf9Ivoea/Ywe36KDjttLmQbSmCi1NPROcHN8xMgNniG', NULL, NULL);
INSERT INTO `user` VALUES (2, 2, 'user', 'user', 'mauguzun+agent@gmail.com', '$2y$10$b4yw0pgdhaLNHj79ocPZ5.X0pdr8EqVv2Io9Wvr06ycA/60ECsVzi', NULL, '12312');
INSERT INTO `user` VALUES (3, 3, 'user', 'user', 'mauguzun+user@gmail.com', '$2y$10$oCtq5DwPiLabGqpJ/ozHlOUowDSk0RmbuzqNown6d6bdYKy2cLU12', NULL, NULL);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `UNIQ_2DE8C6A35E237E06`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'ROLE_ADMIN', 'Full access');
INSERT INTO `user_role` VALUES (2, 'ROLE_AGENT', 'Can access only allowed parts of application');
INSERT INTO `user_role` VALUES (3, 'ROLE_USER', 'Limited access');

-- ----------------------------
-- Table structure for user_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `user_role_permission`;
CREATE TABLE `user_role_permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_7DA19409D60322AC`(`role_id`) USING BTREE,
  CONSTRAINT `FK_7DA19409D60322AC` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role_permission
-- ----------------------------
INSERT INTO `user_role_permission` VALUES (7, 3, 'role.view', 'role.view');
INSERT INTO `user_role_permission` VALUES (8, 3, 'role.edit', 'role.edit');
INSERT INTO `user_role_permission` VALUES (9, 3, 'role.delete', 'role.delete');
INSERT INTO `user_role_permission` VALUES (10, 3, 'role.permission.edit', 'role.permission.edit');
INSERT INTO `user_role_permission` VALUES (11, 3, 'stand.view', 'stand.view');
INSERT INTO `user_role_permission` VALUES (12, 3, 'stand.create', 'stand.create');
INSERT INTO `user_role_permission` VALUES (13, 3, 'stand.show', 'stand.show');
INSERT INTO `user_role_permission` VALUES (14, 3, 'stand.edit', 'stand.edit');
INSERT INTO `user_role_permission` VALUES (15, 3, 'stand.delete', 'stand.delete');
INSERT INTO `user_role_permission` VALUES (16, 3, 'aircraft.view', 'aircraft.view');
INSERT INTO `user_role_permission` VALUES (17, 3, 'aircraft.create', 'aircraft.create');
INSERT INTO `user_role_permission` VALUES (18, 3, 'aircraft.show', 'aircraft.show');
INSERT INTO `user_role_permission` VALUES (19, 3, 'aircraft.edit', 'aircraft.edit');
INSERT INTO `user_role_permission` VALUES (20, 3, 'aircraft.delete', 'aircraft.delete');
INSERT INTO `user_role_permission` VALUES (21, 3, 'status.view', 'status.view');
INSERT INTO `user_role_permission` VALUES (22, 3, 'status.create', 'status.create');
INSERT INTO `user_role_permission` VALUES (23, 3, 'status.show', 'status.show');
INSERT INTO `user_role_permission` VALUES (24, 3, 'status.edit', 'status.edit');
INSERT INTO `user_role_permission` VALUES (25, 3, 'status.delete', 'status.delete');
INSERT INTO `user_role_permission` VALUES (30, 3, 'raport.delete', 'raport.delete');
INSERT INTO `user_role_permission` VALUES (31, 3, 'user.view', 'user.view');
INSERT INTO `user_role_permission` VALUES (32, 3, 'user.edit', 'user.edit');
INSERT INTO `user_role_permission` VALUES (33, 3, 'user.passwordReset', 'user.passwordReset');
INSERT INTO `user_role_permission` VALUES (34, 3, 'user.delete', 'user.delete');
INSERT INTO `user_role_permission` VALUES (39, 2, 'stand.view', 'stand.view');
INSERT INTO `user_role_permission` VALUES (40, 2, 'stand.create', 'stand.create');
INSERT INTO `user_role_permission` VALUES (41, 2, 'stand.show', 'stand.show');
INSERT INTO `user_role_permission` VALUES (42, 2, 'stand.edit', 'stand.edit');
INSERT INTO `user_role_permission` VALUES (43, 2, 'stand.delete', 'stand.delete');
INSERT INTO `user_role_permission` VALUES (44, 2, 'raport.view', 'raport.view');
INSERT INTO `user_role_permission` VALUES (45, 3, 'raport.view', 'raport.view');
INSERT INTO `user_role_permission` VALUES (46, 3, 'raport.create', 'raport.create');
INSERT INTO `user_role_permission` VALUES (47, 3, 'raport.show', 'raport.show');
INSERT INTO `user_role_permission` VALUES (48, 3, 'raport.edit', 'raport.edit');

SET FOREIGN_KEY_CHECKS = 1;
