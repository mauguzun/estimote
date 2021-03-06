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

 Date: 11/12/2019 17:33:45
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
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `UNIQ_59AF8E00A3BFB812`(`ac_reg`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for aprons
-- ----------------------------
DROP TABLE IF EXISTS `aprons`;
CREATE TABLE `aprons`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for beacon
-- ----------------------------
DROP TABLE IF EXISTS `beacon`;
CREATE TABLE `beacon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ts` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lattitude` decimal(10, 4) NOT NULL,
  `longitude` decimal(10, 4) NOT NULL,
  `head` double NOT NULL,
  `prec` double NULL DEFAULT NULL,
  `diff` double NULL DEFAULT NULL,
  `sats` double NULL DEFAULT NULL,
  `speed` decimal(10, 0) NULL DEFAULT NULL,
  `added` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 181 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beacon
-- ----------------------------
INSERT INTO `beacon` VALUES (1, '1574356634000', 50.6344, 5.4250, 123, 123, 23, 123, 60, '2019-12-01 12:25:03');
INSERT INTO `beacon` VALUES (2, '1574356634000', 50.6344, 5.4251, 124, 124, 24, 124, 60, '2019-12-01 12:26:03');
INSERT INTO `beacon` VALUES (3, '1574356634000', 50.6344, 5.4251, 125, 125, 25, 125, 60, '2019-12-01 12:27:03');
INSERT INTO `beacon` VALUES (4, '1574356634000', 50.6344, 5.4252, 126, 126, 26, 126, 60, '2019-12-01 12:28:03');
INSERT INTO `beacon` VALUES (5, '1574356634000', 50.6344, 5.4252, 127, 127, 27, 127, 60, '2019-12-01 12:29:03');
INSERT INTO `beacon` VALUES (6, '1574356634000', 50.6344, 5.4252, 128, 128, 28, 128, 60, '2019-12-01 12:30:03');
INSERT INTO `beacon` VALUES (7, '1574356634000', 50.6344, 5.4253, 129, 129, 29, 129, 60, '2019-12-01 12:31:03');
INSERT INTO `beacon` VALUES (8, '1574356634000', 50.6344, 5.4253, 130, 130, 30, 130, 60, '2019-12-01 12:32:03');
INSERT INTO `beacon` VALUES (9, '1574356634000', 50.6344, 5.4253, 131, 131, 31, 131, 60, '2019-12-01 12:33:03');
INSERT INTO `beacon` VALUES (10, '1574356634000', 50.6345, 5.4253, 132, 132, 32, 132, 60, '2019-12-01 12:34:03');
INSERT INTO `beacon` VALUES (11, '1574356634000', 50.6345, 5.4254, 133, 133, 33, 133, 60, '2019-12-01 12:35:03');
INSERT INTO `beacon` VALUES (12, '1574356634000', 50.6345, 5.4254, 134, 134, 34, 134, 60, '2019-12-01 12:36:03');
INSERT INTO `beacon` VALUES (13, '1574356634000', 50.6345, 5.4255, 135, 135, 35, 135, 60, '2019-12-01 12:37:03');
INSERT INTO `beacon` VALUES (14, '1574356634000', 50.6345, 5.4255, 136, 136, 36, 136, 60, '2019-12-01 12:38:03');
INSERT INTO `beacon` VALUES (15, '1574356634000', 50.6345, 5.4255, 137, 137, 37, 137, 60, '2019-12-01 12:39:03');
INSERT INTO `beacon` VALUES (16, '1574356634000', 50.6345, 5.4256, 138, 138, 38, 138, 60, '2019-12-01 12:40:03');
INSERT INTO `beacon` VALUES (17, '1574356634000', 50.6345, 5.4256, 139, 139, 39, 139, 60, '2019-12-01 12:41:03');
INSERT INTO `beacon` VALUES (18, '1574356634000', 50.6345, 5.4256, 140, 140, 40, 140, 60, '2019-12-01 12:42:03');
INSERT INTO `beacon` VALUES (19, '1574356634000', 50.6346, 5.4256, 141, 141, 41, 141, 60, '2019-12-01 12:43:03');
INSERT INTO `beacon` VALUES (20, '1574356634000', 50.6346, 5.4256, 142, 142, 42, 142, 60, '2019-12-01 12:44:03');
INSERT INTO `beacon` VALUES (21, '1574356634000', 50.6346, 5.4256, 143, 143, 43, 143, 60, '2019-12-01 12:45:03');
INSERT INTO `beacon` VALUES (22, '1574356634000', 50.6347, 5.4256, 144, 144, 44, 144, 60, '2019-12-01 12:46:03');
INSERT INTO `beacon` VALUES (23, '1574356634000', 50.6347, 5.4256, 141, 141, 41, 141, 0, '2019-12-01 12:47:03');
INSERT INTO `beacon` VALUES (24, '1574356634000', 50.6347, 5.4256, 142, 142, 42, 142, 0, '2019-12-01 12:48:03');
INSERT INTO `beacon` VALUES (25, '1574356634000', 50.6347, 5.4256, 143, 143, 43, 143, 0, '2019-12-01 12:49:03');
INSERT INTO `beacon` VALUES (26, '1574356634000', 50.6347, 5.4256, 144, 144, 44, 144, 0, '2019-12-01 12:50:03');
INSERT INTO `beacon` VALUES (27, '1574356634000', 50.6347, 5.4256, 141, 141, 41, 141, 0, '2019-12-01 12:51:03');
INSERT INTO `beacon` VALUES (28, '1574356634000', 50.6347, 5.4256, 142, 142, 42, 142, 60, '2019-12-01 12:52:03');
INSERT INTO `beacon` VALUES (29, '1574356634000', 50.6347, 5.4257, 143, 143, 43, 143, 50, '2019-12-01 12:53:03');
INSERT INTO `beacon` VALUES (30, '1574356634000', 50.6347, 5.4257, 144, 144, 44, 144, 60, '2019-12-01 12:54:03');
INSERT INTO `beacon` VALUES (31, '1574356634000', 50.6347, 5.4257, 126, 126, 26, 126, 50, '2019-12-01 12:55:03');
INSERT INTO `beacon` VALUES (32, '1574356634000', 50.6346, 5.4258, 127, 127, 27, 127, 60, '2019-12-01 12:56:03');
INSERT INTO `beacon` VALUES (33, '1574356634000', 50.6346, 5.4258, 128, 128, 28, 128, 51, '2019-12-01 12:57:03');
INSERT INTO `beacon` VALUES (34, '1574356634000', 50.6346, 5.4258, 129, 129, 29, 129, 61, '2019-12-01 12:58:03');
INSERT INTO `beacon` VALUES (35, '1574356634000', 50.6346, 5.4259, 130, 130, 30, 130, 51, '2019-12-01 12:59:03');
INSERT INTO `beacon` VALUES (36, '1574356634000', 50.6346, 5.4259, 131, 131, 31, 131, 61, '2019-12-01 13:00:03');
INSERT INTO `beacon` VALUES (37, '1574356634000', 50.6346, 5.4260, 132, 132, 32, 132, 52, '2019-12-01 13:01:03');
INSERT INTO `beacon` VALUES (38, '1574356634000', 50.6346, 5.4261, 133, 133, 33, 133, 62, '2019-12-01 13:02:03');
INSERT INTO `beacon` VALUES (39, '1574356634000', 50.6346, 5.4261, 134, 134, 34, 134, 52, '2019-12-01 13:03:03');
INSERT INTO `beacon` VALUES (40, '1574356634000', 50.6347, 5.4265, 135, 135, 35, 135, 62, '2019-12-01 13:04:03');
INSERT INTO `beacon` VALUES (41, '1574356634000', 50.6347, 5.4265, 136, 136, 36, 136, 53, '2019-12-01 13:05:03');
INSERT INTO `beacon` VALUES (42, '1574356634000', 50.6348, 5.4266, 137, 137, 37, 137, 63, '2019-12-01 13:06:03');
INSERT INTO `beacon` VALUES (43, '1574356634000', 50.6349, 5.4267, 138, 138, 38, 138, 53, '2019-12-01 13:07:03');
INSERT INTO `beacon` VALUES (44, '1574356634000', 50.6349, 5.4267, 139, 139, 39, 139, 63, '2019-12-01 13:08:03');
INSERT INTO `beacon` VALUES (45, '1574356634000', 50.6349, 5.4267, 140, 140, 40, 140, 54, '2019-12-01 13:09:03');
INSERT INTO `beacon` VALUES (46, '1574356634000', 50.6350, 5.4268, 141, 141, 41, 141, 64, '2019-12-01 13:10:03');
INSERT INTO `beacon` VALUES (47, '1574356634000', 50.6350, 5.4267, 142, 142, 42, 142, 0, '2019-12-01 13:11:03');
INSERT INTO `beacon` VALUES (48, '1574356634000', 50.6350, 5.4267, 143, 143, 43, 143, 0, '2019-12-01 13:12:03');
INSERT INTO `beacon` VALUES (49, '1574356634000', 50.6350, 5.4267, 144, 144, 44, 144, 0, '2019-12-01 13:13:03');
INSERT INTO `beacon` VALUES (50, '1574356634000', 50.6350, 5.4267, 145, 145, 45, 145, 0, '2019-12-01 13:14:03');
INSERT INTO `beacon` VALUES (51, '1574356634000', 50.6350, 5.4267, 146, 146, 46, 146, 0, '2019-12-01 13:15:03');
INSERT INTO `beacon` VALUES (52, '1574356634000', 50.6350, 5.4268, 147, 147, 47, 147, 60, '2019-12-01 13:16:03');
INSERT INTO `beacon` VALUES (53, '1574356634000', 50.6349, 5.4269, 148, 148, 48, 148, 50, '2019-12-01 13:17:03');
INSERT INTO `beacon` VALUES (54, '1574356634000', 50.6349, 5.4270, 149, 149, 49, 149, 60, '2019-12-01 13:18:03');
INSERT INTO `beacon` VALUES (55, '1574356634000', 50.6349, 5.4271, 150, 150, 50, 150, 50, '2019-12-01 13:19:03');
INSERT INTO `beacon` VALUES (56, '1574356634000', 50.6348, 5.4272, 151, 151, 51, 151, 60, '2019-12-01 13:20:03');
INSERT INTO `beacon` VALUES (57, '1574356634000', 50.6348, 5.4272, 152, 152, 52, 152, 51, '2019-12-01 13:21:03');
INSERT INTO `beacon` VALUES (58, '1574356634000', 50.6348, 5.4272, 153, 153, 53, 153, 61, '2019-12-01 13:22:03');
INSERT INTO `beacon` VALUES (59, '1574356634000', 50.6348, 5.4274, 154, 154, 54, 154, 51, '2019-12-01 13:23:03');
INSERT INTO `beacon` VALUES (60, '1574356634000', 50.6348, 5.4276, 155, 155, 55, 155, 61, '2019-12-01 13:24:03');
INSERT INTO `beacon` VALUES (61, '1574356634000', 50.6348, 5.4277, 156, 156, 56, 156, 52, '2019-12-01 13:25:03');
INSERT INTO `beacon` VALUES (62, '1574356634000', 50.6347, 5.4278, 157, 157, 57, 157, 62, '2019-12-01 13:26:03');
INSERT INTO `beacon` VALUES (63, '1574356634000', 50.6347, 5.4279, 158, 158, 58, 158, 52, '2019-12-01 13:27:03');
INSERT INTO `beacon` VALUES (64, '1574356634000', 50.6347, 5.4280, 159, 159, 59, 159, 62, '2019-12-01 13:28:03');
INSERT INTO `beacon` VALUES (65, '1574356634000', 50.6347, 5.4282, 160, 160, 60, 160, 53, '2019-12-01 13:29:03');
INSERT INTO `beacon` VALUES (66, '1574356634000', 50.6347, 5.4284, 161, 161, 61, 161, 63, '2019-12-01 13:30:03');
INSERT INTO `beacon` VALUES (67, '1574356634000', 50.6347, 5.4285, 162, 162, 62, 162, 53, '2019-12-01 13:31:03');
INSERT INTO `beacon` VALUES (68, '1574356634000', 50.6347, 5.4286, 163, 163, 63, 163, 63, '2019-12-01 13:32:03');
INSERT INTO `beacon` VALUES (69, '1574356634000', 50.6348, 5.4286, 164, 164, 64, 164, 54, '2019-12-01 13:33:03');
INSERT INTO `beacon` VALUES (70, '1574356634000', 50.6348, 5.4287, 165, 165, 65, 165, 64, '2019-12-01 13:34:03');
INSERT INTO `beacon` VALUES (71, '1574356634000', 50.6348, 5.4287, 166, 166, 66, 166, 62, '2019-12-01 13:35:03');
INSERT INTO `beacon` VALUES (72, '1574356634000', 50.6349, 5.4288, 167, 167, 67, 167, 53, '2019-12-01 13:36:03');
INSERT INTO `beacon` VALUES (73, '1574356634000', 50.6349, 5.4289, 168, 168, 68, 168, 63, '2019-12-01 13:37:03');
INSERT INTO `beacon` VALUES (74, '1574356634000', 50.6350, 5.4289, 169, 169, 69, 169, 53, '2019-12-01 13:38:03');
INSERT INTO `beacon` VALUES (75, '1574356634000', 50.6351, 5.4290, 170, 170, 70, 170, 63, '2019-12-01 13:39:03');
INSERT INTO `beacon` VALUES (76, '1574356634000', 50.6352, 5.4290, 171, 171, 71, 171, 54, '2019-12-01 13:40:03');
INSERT INTO `beacon` VALUES (77, '1574356634000', 50.6352, 5.4290, 172, 172, 72, 172, 64, '2019-12-01 13:41:03');
INSERT INTO `beacon` VALUES (78, '1574356634000', 50.6352, 5.4291, 173, 173, 73, 173, 54, '2019-12-01 13:42:03');
INSERT INTO `beacon` VALUES (79, '1574356634000', 50.6353, 5.4291, 174, 174, 74, 174, 64, '2019-12-01 13:43:03');
INSERT INTO `beacon` VALUES (80, '1574356634000', 50.6353, 5.4291, 175, 175, 75, 175, 55, '2019-12-01 13:44:03');
INSERT INTO `beacon` VALUES (81, '1574356634000', 50.6354, 5.4291, 176, 176, 76, 176, 65, '2019-12-01 13:45:03');
INSERT INTO `beacon` VALUES (82, '1574356634000', 50.6354, 5.4291, 177, 177, 77, 177, 0, '2019-12-01 13:46:03');
INSERT INTO `beacon` VALUES (83, '1574356634000', 50.6354, 5.4291, 178, 178, 78, 178, 0, '2019-12-01 13:47:03');
INSERT INTO `beacon` VALUES (84, '1574356634000', 50.6354, 5.4291, 179, 179, 79, 179, 0, '2019-12-01 13:48:03');
INSERT INTO `beacon` VALUES (85, '1574356634000', 50.6354, 5.4291, 180, 180, 80, 180, 0, '2019-12-01 13:49:03');
INSERT INTO `beacon` VALUES (86, '1574356634000', 50.6354, 5.4291, 181, 181, 81, 181, 0, '2019-12-01 13:50:03');
INSERT INTO `beacon` VALUES (87, '1574356634000', 50.6354, 5.4291, 182, 182, 82, 182, 0, '2019-12-01 13:51:03');
INSERT INTO `beacon` VALUES (88, '1574356634000', 50.6354, 5.4291, 183, 183, 83, 183, 60, '2019-12-01 13:52:03');
INSERT INTO `beacon` VALUES (89, '1574356634000', 50.6354, 5.4292, 184, 184, 84, 184, 61, '2019-12-01 13:53:03');
INSERT INTO `beacon` VALUES (90, '1574356634000', 50.6355, 5.4292, 185, 185, 85, 185, 62, '2019-12-01 13:54:03');
INSERT INTO `beacon` VALUES (91, '1574356634000', 50.6355, 5.4293, 186, 186, 86, 186, 63, '2019-12-01 13:55:03');
INSERT INTO `beacon` VALUES (92, '1574356634000', 50.6355, 5.4293, 187, 187, 87, 187, 64, '2019-12-01 13:56:03');
INSERT INTO `beacon` VALUES (93, '1574356634000', 50.6355, 5.4293, 188, 188, 88, 188, 65, '2019-12-01 13:57:03');
INSERT INTO `beacon` VALUES (94, '1574356634000', 50.6355, 5.4294, 189, 189, 89, 189, 66, '2019-12-01 13:58:03');
INSERT INTO `beacon` VALUES (95, '1574356634000', 50.6355, 5.4295, 190, 190, 90, 190, 67, '2019-12-01 13:59:03');
INSERT INTO `beacon` VALUES (96, '1574356634000', 50.6355, 5.4295, 191, 191, 91, 191, 68, '2019-12-01 14:00:03');
INSERT INTO `beacon` VALUES (97, '1574356634000', 50.6355, 5.4296, 192, 192, 92, 192, 69, '2019-12-01 14:01:03');
INSERT INTO `beacon` VALUES (98, '1574356634000', 50.6356, 5.4297, 193, 193, 93, 193, 70, '2019-12-01 14:02:03');
INSERT INTO `beacon` VALUES (99, '1574356634000', 50.6356, 5.4297, 194, 194, 94, 194, 71, '2019-12-01 14:03:03');
INSERT INTO `beacon` VALUES (100, '1574356634000', 50.6356, 5.4298, 195, 195, 95, 195, 72, '2019-12-01 14:04:03');
INSERT INTO `beacon` VALUES (101, '1574356634000', 50.6356, 5.4299, 196, 196, 96, 196, 73, '2019-12-01 14:05:03');
INSERT INTO `beacon` VALUES (102, '1574356634000', 50.6356, 5.4299, 197, 197, 97, 197, 74, '2019-12-01 14:06:03');
INSERT INTO `beacon` VALUES (103, '1574356634000', 50.6356, 5.4300, 198, 198, 98, 198, 75, '2019-12-01 14:07:03');
INSERT INTO `beacon` VALUES (104, '1574356634000', 50.6356, 5.4300, 199, 199, 99, 199, 76, '2019-12-01 14:08:03');
INSERT INTO `beacon` VALUES (105, '1574356634000', 50.6356, 5.4301, 200, 200, 100, 200, 77, '2019-12-01 14:09:03');
INSERT INTO `beacon` VALUES (106, '1574356634000', 50.6356, 5.4301, 201, 201, 101, 201, 78, '2019-12-01 14:10:03');
INSERT INTO `beacon` VALUES (107, '1574356634000', 50.6356, 5.4301, 202, 202, 102, 202, 79, '2019-12-01 14:11:03');
INSERT INTO `beacon` VALUES (108, '1574356634000', 50.6357, 5.4302, 203, 203, 103, 203, 80, '2019-12-01 14:12:03');
INSERT INTO `beacon` VALUES (109, '1574356634000', 50.6357, 5.4302, 204, 204, 104, 204, 81, '2019-12-01 14:13:03');
INSERT INTO `beacon` VALUES (110, '1574356634000', 50.6357, 5.4303, 205, 205, 105, 205, 82, '2019-12-01 14:14:03');
INSERT INTO `beacon` VALUES (111, '1574356634000', 50.6357, 5.4303, 206, 206, 106, 206, 83, '2019-12-01 14:15:03');
INSERT INTO `beacon` VALUES (112, '1574356634000', 50.6357, 5.4304, 207, 207, 107, 207, 84, '2019-12-01 14:16:03');
INSERT INTO `beacon` VALUES (113, '1574356634000', 50.6357, 5.4304, 208, 208, 108, 208, 85, '2019-12-01 14:17:03');
INSERT INTO `beacon` VALUES (114, '1574356634000', 50.6358, 5.4305, 209, 209, 109, 209, 86, '2019-12-01 14:18:03');
INSERT INTO `beacon` VALUES (115, '1574356634000', 50.6358, 5.4305, 210, 210, 110, 210, 87, '2019-12-01 14:19:03');
INSERT INTO `beacon` VALUES (116, '1574356634000', 50.6358, 5.4306, 211, 211, 111, 211, 88, '2019-12-01 14:20:03');
INSERT INTO `beacon` VALUES (117, '1574356634000', 50.6359, 5.4307, 212, 212, 112, 212, 89, '2019-12-01 14:21:03');
INSERT INTO `beacon` VALUES (118, '1574356634000', 50.6359, 5.4307, 213, 213, 113, 213, 90, '2019-12-01 14:22:03');
INSERT INTO `beacon` VALUES (119, '1574356634000', 50.6359, 5.4307, 214, 214, 114, 214, 91, '2019-12-01 14:23:03');
INSERT INTO `beacon` VALUES (120, '1574356634000', 50.6359, 5.4308, 215, 215, 115, 215, 0, '2019-12-01 14:24:03');
INSERT INTO `beacon` VALUES (121, '1574356634000', 50.6359, 5.4308, 216, 216, 116, 216, 0, '2019-12-01 14:25:03');
INSERT INTO `beacon` VALUES (122, '1574356634000', 50.6359, 5.4308, 217, 217, 117, 217, 0, '2019-12-01 14:26:03');
INSERT INTO `beacon` VALUES (123, '1574356634000', 50.6359, 5.4308, 218, 218, 118, 218, 0, '2019-12-01 14:27:03');
INSERT INTO `beacon` VALUES (124, '1574356634000', 50.6359, 5.4308, 219, 219, 119, 219, 0, '2019-12-01 14:28:03');
INSERT INTO `beacon` VALUES (125, '1574356634000', 50.6359, 5.4309, 220, 220, 120, 220, 61, '2019-12-01 14:29:03');
INSERT INTO `beacon` VALUES (126, '1574356634000', 50.6359, 5.4310, 221, 221, 121, 221, 62, '2019-12-01 14:30:03');
INSERT INTO `beacon` VALUES (127, '1574356634000', 50.6359, 5.4311, 222, 222, 122, 222, 63, '2019-12-01 14:31:03');
INSERT INTO `beacon` VALUES (128, '1574356634000', 50.6359, 5.4313, 223, 223, 123, 223, 64, '2019-12-01 14:32:03');
INSERT INTO `beacon` VALUES (129, '1574356634000', 50.6359, 5.4315, 224, 224, 124, 224, 65, '2019-12-01 14:33:03');
INSERT INTO `beacon` VALUES (130, '1574356634000', 50.6360, 5.4318, 225, 225, 125, 225, 66, '2019-12-01 14:34:03');
INSERT INTO `beacon` VALUES (131, '1574356634000', 50.6360, 5.4320, 226, 226, 126, 226, 67, '2019-12-01 14:35:03');
INSERT INTO `beacon` VALUES (132, '1574356634000', 50.6360, 5.4321, 227, 227, 127, 227, 68, '2019-12-01 14:36:03');
INSERT INTO `beacon` VALUES (133, '1574356634000', 50.6358, 5.4326, 228, 228, 128, 228, 69, '2019-12-01 14:37:03');
INSERT INTO `beacon` VALUES (134, '1574356634000', 50.6357, 5.4329, 229, 229, 129, 229, 70, '2019-12-01 14:38:03');
INSERT INTO `beacon` VALUES (135, '1574356634000', 50.6357, 5.4330, 230, 230, 130, 230, 71, '2019-12-01 14:39:03');
INSERT INTO `beacon` VALUES (136, '1574356634000', 50.6358, 5.4333, 231, 231, 131, 231, 72, '2019-12-01 14:40:03');
INSERT INTO `beacon` VALUES (137, '1574356634000', 50.6359, 5.4335, 232, 232, 132, 232, 73, '2019-12-01 14:41:03');
INSERT INTO `beacon` VALUES (138, '1574356634000', 50.6361, 5.4338, 233, 233, 133, 233, 74, '2019-12-01 14:42:03');
INSERT INTO `beacon` VALUES (139, '1574356634000', 50.6364, 5.4341, 234, 234, 134, 234, 75, '2019-12-01 14:43:03');
INSERT INTO `beacon` VALUES (140, '1574356634000', 50.6366, 5.4339, 235, 235, 135, 235, 69, '2019-12-01 14:44:03');
INSERT INTO `beacon` VALUES (141, '1574356634000', 50.6368, 5.4337, 236, 236, 136, 236, 70, '2019-12-01 14:45:03');
INSERT INTO `beacon` VALUES (142, '1574356634000', 50.6369, 5.4331, 237, 237, 137, 237, 71, '2019-12-01 14:46:03');
INSERT INTO `beacon` VALUES (143, '1574356634000', 50.6370, 5.4335, 238, 238, 138, 238, 72, '2019-12-01 14:47:03');
INSERT INTO `beacon` VALUES (144, '1574356634000', 50.6371, 5.4335, 239, 239, 139, 239, 73, '2019-12-01 14:48:03');
INSERT INTO `beacon` VALUES (145, '1574356634000', 50.6372, 5.4333, 240, 240, 140, 240, 74, '2019-12-01 14:49:03');
INSERT INTO `beacon` VALUES (146, '1574356634000', 50.6373, 5.4333, 241, 241, 141, 241, 75, '2019-12-01 14:50:03');
INSERT INTO `beacon` VALUES (147, '1574356634000', 50.6373, 5.4332, 242, 242, 142, 242, 73, '2019-12-01 14:51:03');
INSERT INTO `beacon` VALUES (148, '1574356634000', 50.6374, 5.4332, 243, 243, 143, 243, 74, '2019-12-01 14:52:03');
INSERT INTO `beacon` VALUES (149, '1574356634000', 50.6375, 5.4332, 244, 244, 144, 244, 75, '2019-12-01 14:53:03');
INSERT INTO `beacon` VALUES (150, '1574356634000', 50.6374, 5.4331, 245, 245, 145, 245, 0, '2019-12-01 14:54:03');
INSERT INTO `beacon` VALUES (151, '1574356634000', 50.6374, 5.4331, 246, 246, 146, 246, 0, '2019-12-01 14:55:03');
INSERT INTO `beacon` VALUES (152, '1574356634000', 50.6374, 5.4331, 247, 247, 147, 247, 0, '2019-12-01 14:56:03');
INSERT INTO `beacon` VALUES (153, '1574356634000', 50.6374, 5.4331, 248, 248, 148, 248, 0, '2019-12-01 14:57:03');
INSERT INTO `beacon` VALUES (154, '1574356634000', 50.6374, 5.4331, 249, 249, 149, 249, 0, '2019-12-01 14:58:03');
INSERT INTO `beacon` VALUES (155, '1574356634000', 50.6374, 5.4331, 250, 250, 150, 250, 0, '2019-12-01 14:59:03');
INSERT INTO `beacon` VALUES (156, '1574356634000', 50.6373, 5.4333, 251, 251, 151, 251, 45, '2019-12-01 15:00:03');
INSERT INTO `beacon` VALUES (157, '1574356634000', 50.6372, 5.4333, 252, 252, 152, 252, 46, '2019-12-01 15:01:03');
INSERT INTO `beacon` VALUES (158, '1574356634000', 50.6372, 5.4334, 253, 253, 153, 253, 47, '2019-12-01 15:02:03');
INSERT INTO `beacon` VALUES (159, '1574356634000', 50.6371, 5.4334, 254, 254, 154, 254, 48, '2019-12-01 15:03:03');
INSERT INTO `beacon` VALUES (160, '1574356634000', 50.6371, 5.4336, 255, 255, 155, 255, 49, '2019-12-01 15:04:03');
INSERT INTO `beacon` VALUES (161, '1574356634000', 50.6370, 5.4337, 256, 256, 156, 256, 50, '2019-12-01 15:05:03');
INSERT INTO `beacon` VALUES (162, '1574356634000', 50.6370, 5.4338, 257, 257, 157, 257, 51, '2019-12-01 15:06:03');
INSERT INTO `beacon` VALUES (163, '1574356634000', 50.6369, 5.4339, 258, 258, 158, 258, 52, '2019-12-01 15:07:03');
INSERT INTO `beacon` VALUES (164, '1574356634000', 50.6370, 5.4341, 259, 259, 159, 259, 53, '2019-12-01 15:08:03');
INSERT INTO `beacon` VALUES (165, '1574356634000', 50.6370, 5.4342, 260, 260, 160, 260, 54, '2019-12-01 15:09:03');
INSERT INTO `beacon` VALUES (166, '1574356634000', 50.6370, 5.4347, 261, 261, 161, 261, 55, '2019-12-01 15:10:03');
INSERT INTO `beacon` VALUES (167, '1574356634000', 50.6371, 5.4349, 262, 262, 162, 262, 56, '2019-12-01 15:11:03');
INSERT INTO `beacon` VALUES (168, '1574356634000', 50.6370, 5.4350, 263, 263, 163, 263, 57, '2019-12-01 15:12:03');
INSERT INTO `beacon` VALUES (169, '1574356634000', 50.6370, 5.4350, 264, 264, 164, 264, 58, '2019-12-01 15:13:03');
INSERT INTO `beacon` VALUES (170, '1574356634000', 50.6371, 5.4352, 265, 265, 165, 265, 59, '2019-12-01 15:14:03');
INSERT INTO `beacon` VALUES (171, '1574356634000', 50.6371, 5.4357, 266, 266, 166, 266, 60, '2019-12-01 15:15:03');
INSERT INTO `beacon` VALUES (172, '1574356634000', 50.6371, 5.4358, 267, 267, 167, 267, 61, '2019-12-01 15:16:03');
INSERT INTO `beacon` VALUES (173, '1574356634000', 50.6371, 5.4359, 268, 268, 168, 268, 62, '2019-12-01 15:17:03');
INSERT INTO `beacon` VALUES (174, '1574356634000', 50.6371, 5.4360, 269, 269, 169, 269, 63, '2019-12-01 15:18:03');
INSERT INTO `beacon` VALUES (175, '1574356634000', 50.6370, 5.4361, 270, 270, 170, 270, 64, '2019-12-01 15:19:03');
INSERT INTO `beacon` VALUES (176, '1574356634000', 50.6370, 5.4362, 271, 271, 171, 271, 65, '2019-12-01 15:20:03');
INSERT INTO `beacon` VALUES (177, '1574356634000', 50.6369, 5.4362, 272, 272, 172, 272, 66, '2019-12-01 15:21:03');
INSERT INTO `beacon` VALUES (178, '1574356634000', 50.6369, 5.4363, 273, 273, 173, 273, 67, '2019-12-01 15:22:03');
INSERT INTO `beacon` VALUES (179, '1574356634000', 50.6369, 5.4365, 274, 274, 174, 274, 68, '2019-12-01 15:23:03');
INSERT INTO `beacon` VALUES (180, '1574356634000', 50.6368, 5.4367, 275, 275, 175, 275, 69, '2019-12-01 15:24:03');

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stand_id` int(11) NULL DEFAULT NULL,
  `aircraft_id` int(11) NULL DEFAULT NULL,
  `lattitude` decimal(10, 4) NOT NULL,
  `longitude` decimal(10, 4) NOT NULL,
  `ts` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stamp` datetime(0) NOT NULL,
  `lead_time` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_F11FA7459734D487`(`stand_id`) USING BTREE,
  INDEX `IDX_F11FA745846E2F5C`(`aircraft_id`) USING BTREE,
  CONSTRAINT `FK_F11FA745846E2F5C` FOREIGN KEY (`aircraft_id`) REFERENCES `aircrafts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_F11FA7459734D487` FOREIGN KEY (`stand_id`) REFERENCES `stands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for stands
-- ----------------------------
DROP TABLE IF EXISTS `stands`;
CREATE TABLE `stands`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arpon_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` decimal(10, 4) NOT NULL,
  `latitude` decimal(10, 4) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_396860AA502DCF01`(`arpon_id`) USING BTREE,
  CONSTRAINT `FK_396860AA502DCF01` FOREIGN KEY (`arpon_id`) REFERENCES `aprons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 137 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stands
-- ----------------------------
INSERT INTO `stands` VALUES (1, NULL, 'H1', 5.4464, 50.6441);
INSERT INTO `stands` VALUES (2, NULL, 'H2', 5.4462, 50.6439);
INSERT INTO `stands` VALUES (3, NULL, 'H3', 5.4460, 50.6437);
INSERT INTO `stands` VALUES (4, NULL, '17', 5.4638, 50.6468);
INSERT INTO `stands` VALUES (5, NULL, '18', 5.4633, 50.6460);
INSERT INTO `stands` VALUES (6, NULL, '19', 5.4629, 50.6458);
INSERT INTO `stands` VALUES (7, NULL, '20', 5.4624, 50.6456);
INSERT INTO `stands` VALUES (8, NULL, '30', 5.4621, 50.6455);
INSERT INTO `stands` VALUES (9, NULL, '21', 5.4619, 50.6453);
INSERT INTO `stands` VALUES (10, NULL, '22', 5.4615, 50.6451);
INSERT INTO `stands` VALUES (11, NULL, '31', 5.4612, 50.6449);
INSERT INTO `stands` VALUES (12, NULL, '23', 5.4611, 50.6448);
INSERT INTO `stands` VALUES (13, NULL, '24S', 5.4607, 50.6445);
INSERT INTO `stands` VALUES (14, NULL, '32', 5.4605, 50.6445);
INSERT INTO `stands` VALUES (15, NULL, '25S', 5.4603, 50.6443);
INSERT INTO `stands` VALUES (16, NULL, '33', 5.4599, 50.6442);
INSERT INTO `stands` VALUES (17, NULL, '26S', 5.4598, 50.6440);
INSERT INTO `stands` VALUES (18, NULL, '27S', 5.4594, 50.6438);
INSERT INTO `stands` VALUES (19, NULL, '34', 5.4593, 50.6438);
INSERT INTO `stands` VALUES (20, NULL, '28', 5.4590, 50.6435);
INSERT INTO `stands` VALUES (21, NULL, '35', 5.4587, 50.6434);
INSERT INTO `stands` VALUES (22, NULL, 'GA2E', 5.4583, 50.6435);
INSERT INTO `stands` VALUES (23, NULL, 'GA3E', 5.4584, 50.6434);
INSERT INTO `stands` VALUES (24, NULL, 'GA5E', 5.4586, 50.6433);
INSERT INTO `stands` VALUES (25, NULL, 'GA6E', 5.4587, 50.6432);
INSERT INTO `stands` VALUES (26, NULL, '29', 5.4586, 50.6432);
INSERT INTO `stands` VALUES (27, NULL, 'GA2W', 5.4582, 50.6434);
INSERT INTO `stands` VALUES (28, NULL, 'GA3W', 5.4583, 50.6433);
INSERT INTO `stands` VALUES (29, NULL, 'GA5W', 5.4585, 50.6432);
INSERT INTO `stands` VALUES (30, NULL, 'GA6W', 5.4586, 50.6431);
INSERT INTO `stands` VALUES (31, NULL, 'GA1E', 5.4579, 50.6432);
INSERT INTO `stands` VALUES (32, NULL, 'GA4E', 5.4581, 50.6431);
INSERT INTO `stands` VALUES (33, NULL, 'GA7E', 5.4583, 50.6430);
INSERT INTO `stands` VALUES (34, NULL, '40', 5.4582, 50.6430);
INSERT INTO `stands` VALUES (35, NULL, 'GA1W', 5.4578, 50.6431);
INSERT INTO `stands` VALUES (36, NULL, 'GA4W', 5.4580, 50.6430);
INSERT INTO `stands` VALUES (37, NULL, 'GA7E', 5.4582, 50.6429);
INSERT INTO `stands` VALUES (38, NULL, '41S', 5.4575, 50.6427);
INSERT INTO `stands` VALUES (39, NULL, '41M', 5.4575, 50.6426);
INSERT INTO `stands` VALUES (40, NULL, '41', 5.4577, 50.6425);
INSERT INTO `stands` VALUES (41, NULL, '41E', 5.4575, 50.6422);
INSERT INTO `stands` VALUES (42, NULL, '42S', 5.4569, 50.6423);
INSERT INTO `stands` VALUES (43, NULL, '42', 5.4571, 50.6422);
INSERT INTO `stands` VALUES (44, NULL, '42A', 5.4570, 50.6422);
INSERT INTO `stands` VALUES (45, NULL, '43S', 5.4564, 50.6420);
INSERT INTO `stands` VALUES (46, NULL, '43', 5.4566, 50.6420);
INSERT INTO `stands` VALUES (47, NULL, '43E', 5.4566, 50.6417);
INSERT INTO `stands` VALUES (48, NULL, 'G2', 5.4472, 50.6346);
INSERT INTO `stands` VALUES (49, NULL, 'G3', 5.4469, 50.6348);
INSERT INTO `stands` VALUES (50, NULL, 'G4', 5.4463, 50.6357);
INSERT INTO `stands` VALUES (51, NULL, 'G4', 5.4463, 50.6357);
INSERT INTO `stands` VALUES (52, NULL, 'G5', 5.4460, 50.6354);
INSERT INTO `stands` VALUES (53, NULL, 'L19', 5.4441, 50.6331);
INSERT INTO `stands` VALUES (54, NULL, 'M1', 5.4424, 50.6329);
INSERT INTO `stands` VALUES (55, NULL, 'M2', 5.4420, 50.6326);
INSERT INTO `stands` VALUES (56, NULL, 'M3', 5.4416, 50.6323);
INSERT INTO `stands` VALUES (57, NULL, 'M2', 5.4420, 50.6326);
INSERT INTO `stands` VALUES (58, NULL, 'M4', 5.4412, 50.6321);
INSERT INTO `stands` VALUES (59, NULL, '44S', 5.4558, 50.6416);
INSERT INTO `stands` VALUES (60, NULL, '44M', 5.4562, 50.6413);
INSERT INTO `stands` VALUES (61, NULL, '44', 5.4563, 50.6412);
INSERT INTO `stands` VALUES (62, NULL, '45S', 5.4551, 50.6412);
INSERT INTO `stands` VALUES (63, NULL, '45M', 5.4555, 50.6409);
INSERT INTO `stands` VALUES (64, NULL, '45', 5.4556, 50.6408);
INSERT INTO `stands` VALUES (65, NULL, '46S', 5.4543, 50.6407);
INSERT INTO `stands` VALUES (66, NULL, '46M', 5.4548, 50.6404);
INSERT INTO `stands` VALUES (67, NULL, '46', 5.4549, 50.6403);
INSERT INTO `stands` VALUES (68, NULL, '50S', 5.4537, 50.6403);
INSERT INTO `stands` VALUES (69, NULL, '50', 5.4541, 50.6401);
INSERT INTO `stands` VALUES (70, NULL, '50E', 5.4541, 50.6399);
INSERT INTO `stands` VALUES (71, NULL, '52D', 5.4532, 50.6401);
INSERT INTO `stands` VALUES (72, NULL, '52C', 5.4536, 50.6399);
INSERT INTO `stands` VALUES (73, NULL, '51S', 5.4532, 50.6399);
INSERT INTO `stands` VALUES (74, NULL, '51', 5.4532, 50.6397);
INSERT INTO `stands` VALUES (75, NULL, '50B', 5.4528, 50.6399);
INSERT INTO `stands` VALUES (76, NULL, '50A', 5.4533, 50.6396);
INSERT INTO `stands` VALUES (77, NULL, '51E', 5.4533, 50.6395);
INSERT INTO `stands` VALUES (78, NULL, '52S', 5.4526, 50.6396);
INSERT INTO `stands` VALUES (79, NULL, '52', 5.4530, 50.6394);
INSERT INTO `stands` VALUES (80, NULL, '54D', 5.4521, 50.6395);
INSERT INTO `stands` VALUES (81, NULL, '54C', 5.4525, 50.6392);
INSERT INTO `stands` VALUES (82, NULL, '53E', 5.4526, 50.6390);
INSERT INTO `stands` VALUES (83, NULL, '53S', 5.4521, 50.6393);
INSERT INTO `stands` VALUES (84, NULL, '53', 5.4524, 50.6390);
INSERT INTO `stands` VALUES (85, NULL, '52B', 5.4517, 50.6392);
INSERT INTO `stands` VALUES (86, NULL, '52A', 5.4522, 50.6390);
INSERT INTO `stands` VALUES (87, NULL, '54S', 5.4515, 50.6389);
INSERT INTO `stands` VALUES (88, NULL, '54', 5.4519, 50.6387);
INSERT INTO `stands` VALUES (89, NULL, '56D', 5.4510, 50.6388);
INSERT INTO `stands` VALUES (90, NULL, '56C', 5.4514, 50.6385);
INSERT INTO `stands` VALUES (91, NULL, '55S', 5.4510, 50.6386);
INSERT INTO `stands` VALUES (92, NULL, '55', 5.4513, 50.6383);
INSERT INTO `stands` VALUES (93, NULL, '54B', 5.4507, 50.6385);
INSERT INTO `stands` VALUES (94, NULL, '54A', 5.4511, 50.6383);
INSERT INTO `stands` VALUES (95, NULL, '56S', 5.4504, 50.6382);
INSERT INTO `stands` VALUES (96, NULL, '56', 5.4508, 50.6380);
INSERT INTO `stands` VALUES (97, NULL, '58D', 5.4499, 50.6381);
INSERT INTO `stands` VALUES (98, NULL, '58C', 5.4504, 50.6378);
INSERT INTO `stands` VALUES (99, NULL, '57S', 5.4499, 50.6379);
INSERT INTO `stands` VALUES (100, NULL, '57', 5.4502, 50.6376);
INSERT INTO `stands` VALUES (101, NULL, '56B', 5.4496, 50.6378);
INSERT INTO `stands` VALUES (102, NULL, '56A', 5.4500, 50.6376);
INSERT INTO `stands` VALUES (103, NULL, '58S', 5.4493, 50.6375);
INSERT INTO `stands` VALUES (104, NULL, '58', 5.4497, 50.6373);
INSERT INTO `stands` VALUES (105, NULL, '60D', 5.4488, 50.6374);
INSERT INTO `stands` VALUES (106, NULL, '60C', 5.4493, 50.6371);
INSERT INTO `stands` VALUES (107, NULL, '59S', 5.4488, 50.6372);
INSERT INTO `stands` VALUES (108, NULL, '59', 5.4491, 50.6370);
INSERT INTO `stands` VALUES (109, NULL, '59E', 5.4492, 50.6368);
INSERT INTO `stands` VALUES (110, NULL, '58B', 5.4485, 50.6371);
INSERT INTO `stands` VALUES (111, NULL, '58A', 5.4489, 50.6369);
INSERT INTO `stands` VALUES (112, NULL, '60S', 5.4482, 50.6368);
INSERT INTO `stands` VALUES (113, NULL, '60', 5.4486, 50.6366);
INSERT INTO `stands` VALUES (114, NULL, '60E', 5.4485, 50.6363);
INSERT INTO `stands` VALUES (115, NULL, '61S', 5.4477, 50.6365);
INSERT INTO `stands` VALUES (116, NULL, '61', 5.4481, 50.6363);
INSERT INTO `stands` VALUES (117, NULL, '62S', 5.4471, 50.6361);
INSERT INTO `stands` VALUES (118, NULL, '62E', 5.4478, 50.6358);
INSERT INTO `stands` VALUES (119, NULL, '62', 5.4475, 50.6359);
INSERT INTO `stands` VALUES (120, NULL, '63S', 5.4465, 50.6357);
INSERT INTO `stands` VALUES (121, NULL, '63M', 5.4469, 50.6355);
INSERT INTO `stands` VALUES (122, NULL, '63', 5.4469, 50.6355);
INSERT INTO `stands` VALUES (123, NULL, '110', 5.4256, 50.6347);
INSERT INTO `stands` VALUES (124, NULL, '112', 5.4267, 50.6350);
INSERT INTO `stands` VALUES (125, NULL, '114', 5.4281, 50.6352);
INSERT INTO `stands` VALUES (126, NULL, '116', 5.4291, 50.6354);
INSERT INTO `stands` VALUES (127, NULL, '118', 5.4300, 50.6356);
INSERT INTO `stands` VALUES (128, NULL, '120', 5.4308, 50.6359);
INSERT INTO `stands` VALUES (129, NULL, '122', 5.4317, 50.6365);
INSERT INTO `stands` VALUES (130, NULL, '124', 5.4324, 50.6370);
INSERT INTO `stands` VALUES (131, NULL, '126', 5.4331, 50.6374);
INSERT INTO `stands` VALUES (132, NULL, '128', 5.4338, 50.6379);
INSERT INTO `stands` VALUES (133, NULL, '11', 5.4671, 50.6490);
INSERT INTO `stands` VALUES (134, NULL, '12', 5.4662, 50.6483);
INSERT INTO `stands` VALUES (135, NULL, '13', 5.4664, 50.6481);
INSERT INTO `stands` VALUES (136, NULL, '14', 5.4654, 50.6475);

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
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
INSERT INTO `user` VALUES (1, 1, 'Root', 'Admin', 'admin@aslairlines.be', '$2y$10$mcxRVI.WEyQ4MPa1r0As..S6GvMn1ZYBA3KeRhoDI0czsRRT7LMTm', NULL, NULL);

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
