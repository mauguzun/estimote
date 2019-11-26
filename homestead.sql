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

 Date: 26/11/2019 17:09:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aircrafts
-- ----------------------------
DROP TABLE IF EXISTS `aircrafts`;
CREATE TABLE `aircrafts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raport_id` int(11) NULL DEFAULT NULL,
  `ac_reg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `UNIQ_59AF8E00A3BFB812`(`ac_reg`) USING BTREE,
  INDEX `IDX_59AF8E00CF98AA3A`(`raport_id`) USING BTREE,
  CONSTRAINT `FK_59AF8E00CF98AA3A` FOREIGN KEY (`raport_id`) REFERENCES `raports` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for beacon
-- ----------------------------
DROP TABLE IF EXISTS `beacon`;
CREATE TABLE `beacon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ts` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double NOT NULL,
  `head` double NOT NULL,
  `prec` double NULL DEFAULT NULL,
  `diff` double NULL DEFAULT NULL,
  `sats` double NULL DEFAULT NULL,
  `speed` double NULL DEFAULT NULL,
  `added` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beacon
-- ----------------------------
INSERT INTO `beacon` VALUES (1, '1574356634000', '56.972919464111', 24.164608001709, 278.14999389648, 0.80000001192093, 119.72163391113, 9, 5, '2019-11-26 11:44:58');

-- ----------------------------
-- Table structure for raports
-- ----------------------------
DROP TABLE IF EXISTS `raports`;
CREATE TABLE `raports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tail_id` int(11) NULL DEFAULT NULL,
  `stand_id` int(11) NULL DEFAULT NULL,
  `status_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `eta` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_6A8EE5533A31B61C`(`tail_id`) USING BTREE,
  INDEX `IDX_6A8EE5539734D487`(`stand_id`) USING BTREE,
  INDEX `IDX_6A8EE5536BF700BD`(`status_id`) USING BTREE,
  INDEX `IDX_6A8EE553A76ED395`(`user_id`) USING BTREE,
  CONSTRAINT `FK_6A8EE5533A31B61C` FOREIGN KEY (`tail_id`) REFERENCES `aircrafts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_6A8EE5536BF700BD` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_6A8EE5539734D487` FOREIGN KEY (`stand_id`) REFERENCES `stands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_6A8EE553A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for stands
-- ----------------------------
DROP TABLE IF EXISTS `stands`;
CREATE TABLE `stands`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raport_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_396860AACF98AA3A`(`raport_id`) USING BTREE,
  CONSTRAINT `FK_396860AACF98AA3A` FOREIGN KEY (`raport_id`) REFERENCES `raports` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stands
-- ----------------------------
INSERT INTO `stands` VALUES (1, NULL, 'H1', '5.4464222', '50.6441194');
INSERT INTO `stands` VALUES (2, NULL, 'H2', '5.4462306', '50.6439333');
INSERT INTO `stands` VALUES (3, NULL, 'H3', '5.4460361', '50.6437472');
INSERT INTO `stands` VALUES (4, NULL, '17', '5.463750000', '50.646838889');
INSERT INTO `stands` VALUES (5, NULL, '18', '5.463327778', '50.646016667');
INSERT INTO `stands` VALUES (6, NULL, '19', '5.462905556', '50.645750000');
INSERT INTO `stands` VALUES (7, NULL, '20', '5.462355556', '50.645611111');
INSERT INTO `stands` VALUES (8, NULL, '30', '5.462130556', '50.645488889');
INSERT INTO `stands` VALUES (9, NULL, '21', '5.461936111', '50.645344444');
INSERT INTO `stands` VALUES (10, NULL, '22', '5.461516667', '50.645080556');
INSERT INTO `stands` VALUES (11, NULL, '31', '5.461177778', '50.644905556');
INSERT INTO `stands` VALUES (12, NULL, '23', '5.461097222', '50.644816667');
INSERT INTO `stands` VALUES (13, NULL, '24S', '5.460672222', '50.644547222');
INSERT INTO `stands` VALUES (14, NULL, '32', '5.460461111', '50.644513889');
INSERT INTO `stands` VALUES (15, NULL, '25S', '5.460255556', '50.644286111');
INSERT INTO `stands` VALUES (16, NULL, '33', '5.459880556', '50.644150000');
INSERT INTO `stands` VALUES (17, NULL, '26S', '5.459836111', '50.644022222');
INSERT INTO `stands` VALUES (18, NULL, '27S', '5.459416667', '50.643758333');
INSERT INTO `stands` VALUES (19, NULL, '34', '5.459305556', '50.643786111');
INSERT INTO `stands` VALUES (20, NULL, '28', '5.458997222', '50.643494444');
INSERT INTO `stands` VALUES (21, NULL, '35', '5.458727778', '50.643422222');
INSERT INTO `stands` VALUES (22, NULL, 'GA2E', '5.458255556', '50.643463889');
INSERT INTO `stands` VALUES (23, NULL, 'GA3E', '5.45840555555556', '50.64336944444445');
INSERT INTO `stands` VALUES (24, NULL, 'GA5E', '5.45855555555556', '50.64327222222222');
INSERT INTO `stands` VALUES (25, NULL, 'GA6E', '5.45870555555556', '50.64317500000000');
INSERT INTO `stands` VALUES (26, NULL, '29', '5.45857777777778', '50.64323055555555');
INSERT INTO `stands` VALUES (27, NULL, 'GA2W', '5.45818611111111', '50.64341944444445');
INSERT INTO `stands` VALUES (28, NULL, 'GA3W', '5.45833611111111', '50.64332500000000');
INSERT INTO `stands` VALUES (29, NULL, 'GA5W', '5.45848611111111', '50.64322777777777');
INSERT INTO `stands` VALUES (30, NULL, 'GA6W', '5.45863611111111', '50.64313055555556');
INSERT INTO `stands` VALUES (31, NULL, 'GA1E', '5.45790277777778', '50.64320833333333');
INSERT INTO `stands` VALUES (32, NULL, 'GA4E', '5.45810000000000', '50.64308055555556');
INSERT INTO `stands` VALUES (33, NULL, 'GA7E', '5.45830000000000', '50.64295555555555');
INSERT INTO `stands` VALUES (34, NULL, '40', '5.45815833333333', '50.64296388888889');
INSERT INTO `stands` VALUES (35, NULL, 'GA1W', '5.45777222222222', '50.64312500000000');
INSERT INTO `stands` VALUES (36, NULL, 'GA4W', '5.45797222222222', '50.64300000000000');
INSERT INTO `stands` VALUES (37, NULL, 'GA7E', '5.45816944444444', '50.64287222222222');
INSERT INTO `stands` VALUES (38, NULL, '41S', '5.45748611111111', '50.64265555555556');
INSERT INTO `stands` VALUES (39, NULL, '41M', '5.45753888888889', '50.64262222222222');
INSERT INTO `stands` VALUES (40, NULL, '41', '5.45767777777778', '50.64253333333333');
INSERT INTO `stands` VALUES (41, NULL, '41E', '5.45751944444444', '50.64224722222222');
INSERT INTO `stands` VALUES (42, NULL, '42S', '5.45693055555556', '50.64230555555555');
INSERT INTO `stands` VALUES (43, NULL, '42', '5.45711944444444', '50.64218333333334');
INSERT INTO `stands` VALUES (44, NULL, '42A', '5.45698888888889', '50.64220833333334');
INSERT INTO `stands` VALUES (45, NULL, '43S', '5.45641388888889', '50.64198055555556');
INSERT INTO `stands` VALUES (46, NULL, '43', '5.45660277777778', '50.64198055555556');
INSERT INTO `stands` VALUES (47, NULL, '43E', '5.45661666666667', '50.64165555555555');
INSERT INTO `stands` VALUES (48, NULL, 'G2', '5.44724444444444', '50.63458333333333');
INSERT INTO `stands` VALUES (49, NULL, 'G3', '5.44688333333333', '50.63481111111111');
INSERT INTO `stands` VALUES (50, NULL, 'G4', '5.44632500000000', '50.63572222222222');
INSERT INTO `stands` VALUES (51, NULL, 'G4', '5.44632500000000', '50.63572222222222');
INSERT INTO `stands` VALUES (52, NULL, 'G5', '5.44596388888889', '50.63540555555556');
INSERT INTO `stands` VALUES (53, NULL, 'L19', '5.44407500000000', '50.63314722222222');
INSERT INTO `stands` VALUES (54, NULL, 'M1', '5.44238333333333', '50.63293333333333');
INSERT INTO `stands` VALUES (55, NULL, 'M2', '5.44201111111111', '50.63260000000000');
INSERT INTO `stands` VALUES (56, NULL, 'M3', '5.44159722222222', '50.63233333333334');
INSERT INTO `stands` VALUES (57, NULL, 'M2', '5.44201111111111', '50.63260000000000');
INSERT INTO `stands` VALUES (58, NULL, 'M4', '5.44116666666667', '50.63206666666667');

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raport_id` int(11) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_4BF01E11CF98AA3A`(`raport_id`) USING BTREE,
  CONSTRAINT `FK_4BF01E11CF98AA3A` FOREIGN KEY (`raport_id`) REFERENCES `raports` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, 'Root', 'Admin', 'admin@aslairlines.be', '$2y$10$r32KGXXfNLmJldtbk0hwdO6dnPhpQ.vDzFc5MyNxOo6w9bhGGt8cW', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
