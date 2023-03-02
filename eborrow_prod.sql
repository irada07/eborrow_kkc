/*
 Navicat Premium Data Transfer

 Source Server         : eborrow
 Source Server Type    : MariaDB
 Source Server Version : 80032
 Source Host           : localhost:3306
 Source Schema         : eborrow_prod

 Target Server Type    : MariaDB
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 02/03/2023 22:44:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for billings
-- ----------------------------
DROP TABLE IF EXISTS `billings`;
CREATE TABLE `billings`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `doc_date` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of billings
-- ----------------------------

-- ----------------------------
-- Table structure for borrow_goods
-- ----------------------------
DROP TABLE IF EXISTS `borrow_goods`;
CREATE TABLE `borrow_goods`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `good_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  `action` tinyint(1) NULL DEFAULT NULL,
  `user_id` int(0) NULL DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `approve_date` datetime(0) NULL DEFAULT NULL,
  `return_date` datetime(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `good_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borrow_goods
-- ----------------------------
INSERT INTO `borrow_goods` VALUES (66, 162, 1, '2023-02-24 07:42:01', '2023-02-24 07:44:13', 2, 1, 55, NULL, '2023-02-24 07:44:13', NULL, 'คอมพิวเตอร์ประสิทธิภาพสูง', 'เครื่อง', '3254-3333-060-01-1-1(1)', 'ไอรดา ส่งสุข', NULL, 'ชำรุด');
INSERT INTO `borrow_goods` VALUES (67, 166, 1, '2023-02-24 07:42:14', '2023-02-24 07:43:40', 1, 1, 55, NULL, '2023-02-24 07:43:40', NULL, 'คอมพิวเตอร์แม่ข่าย', 'เครื่อง', '3254-3333-060-01-1-2(2)', 'ไอรดา ส่งสุข', NULL, NULL);

-- ----------------------------
-- Table structure for borrow_materials
-- ----------------------------
DROP TABLE IF EXISTS `borrow_materials`;
CREATE TABLE `borrow_materials`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_id` int(0) NULL DEFAULT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  `action` tinyint(1) NULL DEFAULT NULL,
  `user_id` int(0) NULL DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `approve_date` datetime(0) NULL DEFAULT NULL,
  `return_date` datetime(0) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 277 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of borrow_materials
-- ----------------------------

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (1, 'วศ.บ. คอมพิวเตอร์', '2020-08-26 19:42:21', '2020-08-26 19:42:28', NULL);
INSERT INTO `departments` VALUES (2, 'วศ.บ. ไฟฟ้า', '2020-08-29 17:37:58', '2020-08-29 17:38:05', NULL);

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `good_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name_ex` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `price_unit` decimal(8, 2) NULL DEFAULT 0.00,
  `amount` int(0) NULL DEFAULT 0,
  `department_id` int(0) NULL DEFAULT NULL,
  `unit_id` int(0) NULL DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `buy_date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `ready_to_use` int(0) NULL DEFAULT 0,
  `defective` int(0) NULL DEFAULT 0,
  `active` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 168 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (153, '01012550', '3252-3333-025-28-1-1', 'ชุดปฏิบัติการออกแบบวงจรดิจิตอล VHDL', NULL, 735000.00, 1, 1, 26, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 0, '2007-01-01 00:00:00', NULL, '2023-02-21 04:43:47', '2023-02-21 04:43:47', NULL, 0, 1, 1);
INSERT INTO `goods` VALUES (154, '110958', 'ว-3158-3331-071-72-1(3)-3(3)', 'ตู้โล่ง-ล่างบ้านเปิด 5CM810 สีเชอร์รี่/ดำ', NULL, 3380.00, 3, 1, 32, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2015-09-11 00:00:00', NULL, '2023-02-21 05:00:33', '2023-02-21 05:00:33', NULL, 3, 0, 1);
INSERT INTO `goods` VALUES (155, '291251', '3252-3333-071-85-6', 'โต๊ะและเก้าอี้สำหรับอาจารย์', NULL, 9950.00, 6, 1, 26, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2008-12-29 00:00:00', NULL, '2023-02-21 05:00:53', '2023-02-21 05:00:53', NULL, 6, 0, 1);
INSERT INTO `goods` VALUES (156, '110958', 'ว-3158-3331-071-112-1(3)-3(3)', 'เก้าอี้สำนักงาน ST-07-1 บุหนังดำ+ขาเหล็ก', NULL, 2985.00, 3, 1, 25, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2015-09-11 00:00:00', NULL, '2023-02-21 05:02:15', '2023-02-21 05:02:15', NULL, 3, 0, 1);
INSERT INTO `goods` VALUES (157, '100153', 'TC-5821-005-0001', 'โทรทัศน์สี 41 นิ้วโซนี', NULL, 179760.00, 1, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 0, '2010-01-10 00:00:00', NULL, '2023-02-21 05:03:09', '2023-02-21 05:03:09', NULL, 0, 1, 1);
INSERT INTO `goods` VALUES (158, '110958', 'ว-3158-3331-071-131-1(2)-2(2)', 'โต๊ะทำงาน ทอรัส /FGC', NULL, 4270.00, 2, 1, 26, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2015-09-11 00:00:00', NULL, '2023-02-21 05:03:11', '2023-02-21 05:03:11', NULL, 2, 0, 1);
INSERT INTO `goods` VALUES (159, '190353', '3253-3333-071-40-1-3', 'ตู้ประจำห้องปฏิบัติการคอมพิวเตอร์', NULL, 19140.00, 3, 1, 26, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2010-03-19 00:00:00', NULL, '2023-02-21 05:06:06', '2023-02-21 05:06:06', NULL, 3, 0, 1);
INSERT INTO `goods` VALUES (160, '310154', '3254-3333-060-01-1', 'ครุภัณฑ์คอมพิวเตอร์เพื่อสนง.สาขาฯ', '<p>1.คอมพิวเตอร์ประสิทธิภาพสูง 3 เครื่อง&nbsp;</p>\r\n\r\n<p>2.คอมพิวเตอร์แม่ข่าย 2 เครื่อง</p>\r\n\r\n<p>3.เครื่องพิมพ์เลเซอร์แบบเม่ข่าย 1 เครื่อง</p>', 186949.00, 1, 1, 26, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2023-02-24 07:36:10', NULL, '2023-02-21 05:09:58', '2023-02-24 07:36:10', NULL, 1, 0, 0);
INSERT INTO `goods` VALUES (161, '31154', '3254-3333-071-100-1', 'ชุดโต๊ะเก้าอี้ประจำห้องปฏิบัติการวิศวกรรมฯ', NULL, 130863.00, 1, 1, 26, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2011-01-31 00:00:00', NULL, '2023-02-21 05:10:03', '2023-02-21 05:12:54', NULL, 1, 0, 1);
INSERT INTO `goods` VALUES (162, '310154', '3254-3333-060-01-1-1(1)', 'คอมพิวเตอร์ประสิทธิภาพสูง', NULL, 0.00, 1, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2023-02-24 07:44:13', NULL, '2023-02-21 05:12:01', '2023-02-24 07:44:13', NULL, 1, 0, 1);
INSERT INTO `goods` VALUES (163, '310154', '3254-3333-060-01-1-1(2)', 'คอมพิวเตอร์ประสิทธิภาพสูง', NULL, 0.00, 1, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2011-01-31 00:00:00', NULL, '2023-02-21 05:12:49', '2023-02-21 05:12:49', NULL, 1, 0, 1);
INSERT INTO `goods` VALUES (164, '310154', '3254-3333-060-01-1-1(3)', 'คอมพิวเตอร์ประสิทธิภาพสูง', NULL, 0.00, 1, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2011-01-31 00:00:00', NULL, '2023-02-21 05:13:26', '2023-02-21 05:13:26', NULL, 1, 0, 1);
INSERT INTO `goods` VALUES (165, '310154', '3254-3333-060-01-1-2(1)', 'คอมพิวเตอร์แม่ข่าย', NULL, 0.00, 1, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2011-01-31 00:00:00', NULL, '2023-02-21 05:14:20', '2023-02-21 05:14:20', NULL, 1, 0, 1);
INSERT INTO `goods` VALUES (166, '310154', '3254-3333-060-01-1-2(2)', 'คอมพิวเตอร์แม่ข่าย', NULL, 0.00, 0, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, '2023-02-24 07:42:14', NULL, '2023-02-21 05:14:55', '2023-02-24 07:42:14', NULL, 1, 0, 1);
INSERT INTO `goods` VALUES (167, '310154', '3254-3333-060-01-1-3(1)', 'เครื่องพิมพ์เลเซอร์แบบเม่ข่าย', NULL, 0.00, 1, 1, 7, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 0, '2011-01-31 00:00:00', NULL, '2023-02-21 05:15:48', '2023-02-21 05:15:48', NULL, 0, 1, 1);

-- ----------------------------
-- Table structure for materials
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `price_unit` decimal(8, 2) NULL DEFAULT 0.00,
  `amount` int(0) NULL DEFAULT 0,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_id` int(0) NULL DEFAULT NULL,
  `type_id` int(0) NULL DEFAULT NULL,
  `shop_id` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `ready_to_use` int(0) NULL DEFAULT 0,
  `defective` int(0) NULL DEFAULT 0,
  `active` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 236 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materials
-- ----------------------------
INSERT INTO `materials` VALUES (84, 'IV6500180', 'บอร์ด KIdBright32iA Beginner Kit พร้อมอุปกรณ์เรียนรู้และหนังสือ', 1390.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 01:43:31', '2023-02-21 01:43:31', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (85, 'IV6500200', 'E32-TTL-100 SX1278/SX1276 RF Wireless Module 433 Mhz. LORA 3000M UART Interface Automatic Meter Reading Low Power', 650.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 01:44:41', '2023-02-21 01:45:39', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (86, 'IV6500200', '2004 LCD (Yellow Screen) ขนาด 20 ตัวอักษร 4 แถว 20x4 LCD with backlight of the LCD Screen พร้อม I2C Interface', 295.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 01:45:32', '2023-02-21 01:45:32', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (87, 'IV6500200', 'LCD 128X64 Dots Graphic Blue Color Backlight LCD Display Shield 5.0V พร้อม I2C', 530.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 01:46:22', '2023-02-21 01:46:22', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (88, 'IV5500503', 'TONER HP 30A เบอร์ CF230A', 2300.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 2, 2, '2023-02-21 01:48:06', '2023-02-21 01:48:06', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (89, 'IV5500503', 'TONER HP 83A เบอร์ CF283A', 2460.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 2, 2, '2023-02-21 01:48:31', '2023-02-21 01:48:31', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (90, 'SK65G18/035', 'ถ่านอัลคาไลน์ PANASONIC LR6T/2B AA 1.5V (2ก้อน)', 38.00, 36, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 11, 2, 1, '2023-02-21 01:50:23', '2023-02-21 01:50:23', NULL, 36, 0, 1);
INSERT INTO `materials` VALUES (91, 'SK65G18/035', 'ถ่านอัลคาไลน์ PANASONIC LR03T/2B AAA 1.5V. (2ก้อน)', 38.00, 12, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 11, 2, 1, '2023-02-21 01:50:46', '2023-02-21 01:50:46', NULL, 12, 0, 1);
INSERT INTO `materials` VALUES (92, 'SK65G18/035', 'ถ่าน PANASONIC GF22NT ดำ 9V.(1X12)', 40.00, 30, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 10, 2, 1, '2023-02-21 01:51:39', '2023-02-21 01:51:39', NULL, 30, 0, 1);
INSERT INTO `materials` VALUES (93, 'SK65G18/035', 'แท่นตัดเทปแกนเล็ก ม้า H-15', 50.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-21 01:52:24', '2023-02-21 01:52:24', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (94, 'SK65G18/035', 'เทปใส 3M#500 (1\"X36 หลา) แกนเล็ก', 35.00, 5, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-21 01:53:06', '2023-02-21 01:53:06', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (95, 'SK65G18/035', 'เทปกาวเยื่อ2หน้า 3M#777 (18มม.X10หลา)', 45.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-21 01:53:40', '2023-02-21 01:53:40', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (96, 'SK65G18/035', 'เทปกาวเมื่อ2หน้า 3M#777 (24มม.X10หลา)', 58.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-21 01:54:11', '2023-02-21 01:54:11', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (97, 'SK65G18/035', 'เทปโฟมกาว2หน้า 3M#110 (21มม.X5ม.)', 190.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-21 01:54:35', '2023-02-21 01:54:35', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (98, 'SK65G18/035', 'แฟ้มคลิปบอร์ดไม้ ไทย-ไท A4 (1X12)', 45.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-21 01:55:02', '2023-02-21 01:55:02', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (99, 'SK65G18/035', 'ที่เย็บ MAX HD-88R เบจ มีที่ถอน', 380.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 2, 1, '2023-02-21 01:55:24', '2023-02-21 01:55:24', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (100, 'IV6500226', 'โมดูล Rasberry Pi4 CM4 Wireless หน่วยความจำ 8 GB และมี eMMC ขนาด 32 GB พร้อมแผงระบายความร้อนและเสาอากาศ', 4800.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:20:29', '2023-02-21 02:20:29', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (101, 'IV6500226', 'เส้นพลาสติกสำหรับเครื่องพิมพ์ 3 มิติ (สีเหลือง,แดง,น้ำเงิน,เขียว,ฟ้า,ส้ม,ขาว,ชมพู สีละ 2 กก.)', 580.00, 16, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 30, 1, 3, '2023-02-21 02:21:24', '2023-02-21 02:21:24', NULL, 16, 0, 1);
INSERT INTO `materials` VALUES (102, 'IV6500226', 'แผงวงจรอินพุดสำหรับ Rasberry Pi CM4 (WaveShare) พร้อมตัวแปลงไฟฟ้าแบบ 12V 2A', 2800.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:21:58', '2023-02-21 02:21:58', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (103, 'IV6500226', 'โมดูล ESP32 Module ESP32-CAM WIFI', 320.00, 13, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:22:35', '2023-02-21 02:22:35', NULL, 13, 0, 1);
INSERT INTO `materials` VALUES (104, 'IV6500226', 'แผงวงจรแสดงผลแบบจอสีระบบสัมผัสขนาด 3 นิ้ว ชนิด TFT LED ความละเอียด 400x240 จุด แรงดันไฟฟ้า 3.3V พร้อมปากกา', 330.00, 13, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:23:05', '2023-02-21 02:23:05', NULL, 13, 0, 1);
INSERT INTO `materials` VALUES (105, 'IV6500226', 'สายแปลงสัญญาณ HDMI เป็น VGA', 135.00, 13, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:23:36', '2023-02-21 02:23:36', NULL, 13, 0, 1);
INSERT INTO `materials` VALUES (106, 'IV6500226', 'ตัวแปลงสัญญาณ VGA สำหรับบอร์ด Rasberry Pi', 260.00, 13, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:24:02', '2023-02-21 02:24:02', NULL, 13, 0, 1);
INSERT INTO `materials` VALUES (107, 'IV6500226', 'แบตเตอรี่แบบ CR2032 Lithim 3V', 175.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 11, 1, 3, '2023-02-21 02:24:30', '2023-02-21 02:24:30', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (108, 'IV6500232', 'บอร์ด OpenKB IOT', 1200.00, 9, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:25:13', '2023-02-21 02:25:13', NULL, 9, 0, 1);
INSERT INTO `materials` VALUES (109, 'IV6500232', 'สาย MicroUSB DATA', 200.00, 9, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 31, 1, 3, '2023-02-21 02:26:24', '2023-02-21 02:26:24', NULL, 9, 0, 1);
INSERT INTO `materials` VALUES (110, 'IV6500232', 'มินิบอร์ดตัววัดระยะทางอัลตร้าโซนิก ZX-SONAR', 400.00, 9, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:26:54', '2023-02-21 02:26:54', NULL, 9, 0, 1);
INSERT INTO `materials` VALUES (111, 'IV6500232', 'มินิบอร์ดตัววัดระยะทางอัลตร้าโซนิก ZX-SONAR', 300.00, 12, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:27:59', '2023-02-21 02:27:59', NULL, 12, 0, 1);
INSERT INTO `materials` VALUES (112, 'IV6500232', 'เชอร์โวมอเตอร์ KSERV0360J', 400.00, 18, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:28:32', '2023-02-21 02:28:32', NULL, 18, 0, 1);
INSERT INTO `materials` VALUES (113, 'IV6500232', 'ล้อพร้อมยาง Technic ขนาด 65 มม.', 200.00, 9, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:28:54', '2023-02-21 02:28:54', NULL, 9, 0, 1);
INSERT INTO `materials` VALUES (114, 'IV6500232', 'แผ่นฐานวงกลม', 100.00, 12, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 02:29:16', '2023-02-21 02:29:16', NULL, 12, 0, 1);
INSERT INTO `materials` VALUES (115, 'KU6401101', 'UGREEN USB TYP ตัวแปลง USB Type C ThunderBoit3 มัลติพอร์ท 5 in 1 แปลงสัญญาณภาพ USB Type ThunderBolt3 เป็น HDMI ความละเอียดสูงถึง 4K@30Hz', 2000.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 12, 1, 1, '2023-02-21 03:52:41', '2023-02-21 03:52:41', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (116, 'QT64012701', 'อุปกรณ์ Power Adapter USB-C ใช้งานร่วมกับ Raspberry Pi 4', 780.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 03:54:32', '2023-02-21 03:54:32', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (117, 'QT64052401', 'ท่อ EMT 1/2นิ้ว ยี่ห้อ Panasonic', 120.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 31, 1, 3, '2023-02-21 03:57:05', '2023-02-21 03:57:05', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (118, 'QT64012701', 'อุปกรณ์ Power Adapter 5V 4A หัวต่อแจ็ค 5.5X2.5 mm.', 365.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 03:57:17', '2023-02-21 03:57:17', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (119, 'QT64052401', 'ท่อ EMT 3/4\" ยี่ห้อ Panasonic', 160.00, 20, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 31, 1, 3, '2023-02-21 03:57:36', '2023-02-21 03:57:36', NULL, 20, 0, 1);
INSERT INTO `materials` VALUES (120, 'QT64012701', 'อุปกรณ์แผ่นระบายความร้อน Aluminium Armour Case with Dual Fan สำหรับใช้งานร่วมกับ Raspberry Pi 4 Model B', 850.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 03:58:43', '2023-02-21 03:58:43', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (121, 'QT64052401', 'ชุดอุปกรณ์ WELD-232-14', 2950.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 3, '2023-02-21 03:58:44', '2023-02-21 03:58:44', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (122, 'QT64052401', 'ชุดสตาร์ทมอเตอร์ ยี่ห้อ MITSUBISHI รุ่น MSO-T21 ,220V', 1600.00, 5, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 03:59:31', '2023-02-21 03:59:31', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (123, 'QT64012701', 'วงจร ODROID-C4', 3650.00, 5, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 11, 1, 3, '2023-02-21 03:59:52', '2023-02-21 03:59:52', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (124, 'QT64052401', 'โอเวอร์โหลด ยี่ห้อ MITSUBISHI รุ่น TH-T25 11A', 600.00, 5, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 04:01:01', '2023-02-21 04:01:01', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (125, 'QT64012701', 'แผ่น Micro SD 64GB Class 10 Extreme Pro ยี่ห้อ SanDisk', 790.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 14, 1, 3, '2023-02-21 04:02:04', '2023-02-21 04:02:04', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (126, 'QT64052401', 'สายไฟ 24 AWG', 120.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 1, 3, '2023-02-21 04:02:08', '2023-02-21 04:02:08', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (127, 'QT64052401', 'สายไฟ 22 AWG', 150.00, 10, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 1, 3, '2023-02-21 04:03:07', '2023-02-21 04:03:07', NULL, 10, 0, 1);
INSERT INTO `materials` VALUES (128, 'QT64012701', '2005 Switching Power Supply 12V 30A', 1380.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 1, 3, '2023-02-21 04:04:29', '2023-02-21 04:04:29', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (129, 'QT64012701', 'ตัวต่อสายไฟ WACO 221-413 แบบ 3 ช่อง (50 ชิ้น/กล่อง)', 1950.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 1, 3, '2023-02-21 04:05:14', '2023-02-21 04:05:14', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (130, 'QT64012701', 'ตัวต่อสายไฟ WACO 221-413 แบบ 5 ช่อง (25 ชิ้น/กล่อง)', 1540.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 1, 3, '2023-02-21 04:06:08', '2023-02-21 04:06:08', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (131, 'QUO6405004', 'ชุด Power supply 12V พร้อมแบตเตอรี่ 12V 7AH', 1520.00, 4, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 10, '2023-02-21 04:06:46', '2023-02-21 04:06:46', NULL, 4, 0, 1);
INSERT INTO `materials` VALUES (132, 'QT64012701', 'สายไฟ ดำ-แดง ขนาด 2X0.75 SQ.MM (18 AWG) (100 เมตร)', 1850.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 1, 3, '2023-02-21 04:06:47', '2023-02-21 04:06:47', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (133, 'QT64012701', 'สายไฟ ดำ-แดง ขนาด 2X1 SQ.MM (16 AWG) (100 เมตร)', 2850.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 5, 1, 3, '2023-02-21 04:07:16', '2023-02-21 04:07:16', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (134, 'QUO6405004', 'กลอนแม่เหล็ก Magnetic Lock ขนาด 600 ปอนด์ พร้อม LZ Bracket', 1690.00, 4, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 10, '2023-02-21 04:08:36', '2023-02-21 04:08:36', NULL, 4, 0, 1);
INSERT INTO `materials` VALUES (135, 'QUO6405004', 'สวิตช์ปุ่มกด EXIT แบบ PVC', 120.00, 4, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 10, '2023-02-21 04:10:02', '2023-02-21 04:10:02', NULL, 4, 0, 1);
INSERT INTO `materials` VALUES (136, 'QT64052801', 'วงจรแสดงผล แบบ E-Paper ขนาด 7.5 นิ้ว พร้อม HAT for Raspberry pi', 3580.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 04:10:32', '2023-02-21 04:10:32', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (137, 'QUO6405004', 'บอร์ด Raspberry Pi Pico', 259.00, 40, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 10, '2023-02-21 04:10:46', '2023-02-21 04:10:46', NULL, 40, 0, 1);
INSERT INTO `materials` VALUES (138, 'QT64052801', 'ตัวรับเสียงแบบ Lavalier RODE SMARTLAV+', 3380.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 04:11:17', '2023-02-21 04:11:17', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (139, 'QUO6405004', 'Raspberry Pi 7 inch Touchscreen LCD Display', 3850.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 10, '2023-02-21 04:11:34', '2023-02-21 04:11:34', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (140, 'QUO6405004', 'Raspberry Pi 4 Model B (4GB)', 2450.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 26, 1, 10, '2023-02-21 04:12:06', '2023-02-21 04:12:06', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (141, 'QT64052801', 'ตัวรับเสียงแบบ BOYA BY-PM500 USB', 3580.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 04:12:27', '2023-02-21 04:12:27', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (142, 'QT64052801', 'ตัวส่งเสียงแบบ Tronsmart Element Mega SoundPulse', 2980.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 1, 3, '2023-02-21 04:13:01', '2023-02-21 04:13:01', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (143, 'QT64052801', 'ตัวรับภาพแบบ Logitech C925e', 4980.00, 1, NULL, 25, 1, 3, '2023-02-21 04:13:35', '2023-02-21 04:13:35', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (144, '640000153', 'คีย์บอร์ด Logitech K37.5S', 850.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 2, 1, '2023-02-21 04:18:49', '2023-02-21 04:19:30', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (145, '640000153', 'Mouse Microsoft Bluetooth ARC (SAGE) MCS- ELG-00044', 2300.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 2, 1, '2023-02-21 04:19:20', '2023-02-21 04:19:20', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (146, '640000312', 'สมาร์ทวอทช์ 41mm. สีดำ', 5000.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, 1, 1, '2023-02-21 04:19:24', '2023-02-21 04:19:24', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (147, '640000312', 'KEYBOARD LOGITECH K380 BLUETOOTH', 1050.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 12, 1, 1, '2023-02-21 04:20:11', '2023-02-21 04:20:11', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (148, '640000153', 'Mouse ไร้สาย Logitech MX Anywhere 3 for MAC', 2900.00, 1, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 25, 2, 1, '2023-02-21 04:20:22', '2023-02-21 04:20:47', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (149, 'S3564B337-01', 'ผงหมึก HP CF283A(83A) BK/M125', 2500.00, 3, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-21 04:26:12', '2023-02-21 04:26:12', NULL, 3, 0, 1);
INSERT INTO `materials` VALUES (150, 'S3564B337-01', 'ผงหมึก HP CF230A(30A) BK/M227', 2470.00, 4, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-21 04:26:58', '2023-02-21 04:26:58', NULL, 4, 0, 1);
INSERT INTO `materials` VALUES (151, 'KU6401181', 'ผงหมึก HP CC532A(304A) Y/CP2025', 4500.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-21 04:28:59', '2023-02-21 04:28:59', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (152, '2564', 'กรรไกร SCOTCH 8 นิ้ว', 54.00, 2, 'สาขาวิชาวิศวกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 19:29:50', '2023-02-22 19:29:50', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (153, '2564', 'กระดาษ ขนาด A4 70G. บรรจุ 500 ผ.', 86.00, 15, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 2, 2, 1, '2023-02-22 19:41:32', '2023-02-22 19:41:32', NULL, 15, 0, 1);
INSERT INTO `materials` VALUES (154, '2564', 'กระดาษ ขนาด A4 80G. บรรจุ 500 ผ.', 102.00, 15, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 2, 2, 1, '2023-02-22 19:43:33', '2023-02-22 19:43:33', NULL, 15, 0, 1);
INSERT INTO `materials` VALUES (155, '2564', 'กระดาษ ขนาด F4 บรรจุ 500 ผ.', 130.00, 7, NULL, 2, 2, 1, '2023-02-22 19:44:31', '2023-02-22 19:44:31', NULL, 7, 0, 1);
INSERT INTO `materials` VALUES (156, '2564', 'กระดาษโรเนียวสีหนา 120/200 A4 คละสี', 80.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 2, 2, 1, '2023-02-22 19:45:05', '2023-02-22 19:46:09', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (157, '2564', 'กาวแท่ง Scotch 3M ขนาด 25 g.', 33.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 3, 2, 1, '2023-02-22 19:46:03', '2023-02-22 19:46:03', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (158, '2564', 'กาวน้ำใส ตราม้า ขนาด 50 ซีซี', 22.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 19:47:04', '2023-02-22 19:47:04', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (159, '2564', 'กาวย่น 3M ขนาด 2 นิ้ว', 48.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-22 19:48:54', '2023-02-22 19:48:54', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (160, '2564', 'คลิปดำขนาด 19 มม. (No.411) ตรา Horse', 3.00, 5, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 19:50:31', '2023-02-22 19:50:31', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (161, '2564', 'คลิปดำขนาด 32 มม. (No.412) ตรา Horse', 3.00, 12, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 19:51:55', '2023-02-22 19:51:55', NULL, 12, 0, 1);
INSERT INTO `materials` VALUES (162, '2564', 'คลิปดำขนาด 50 มม. (No.414) ตรา Horse', 3.00, 59, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 19:52:52', '2023-02-22 19:52:52', NULL, 59, 0, 1);
INSERT INTO `materials` VALUES (163, '2564', 'คลิปลวด บรรจุ 50 ตัว (Paper Clip No.1 ตรา Diamond)', 5.00, 48, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 19:53:56', '2023-02-22 19:53:56', NULL, 48, 0, 1);
INSERT INTO `materials` VALUES (164, '2564', 'คลิปลวด บรรจุ 50 ตัว (Paper Clip No.1 ตรา Shark)', 5.00, 30, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 19:54:53', '2023-02-22 19:54:53', NULL, 30, 0, 1);
INSERT INTO `materials` VALUES (165, '2564', 'เครื่องเหลาดินสอ ตราม้า', 250.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 7, 2, 1, '2023-02-22 19:55:25', '2023-02-22 19:55:25', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (166, '2564', 'ซองขาวมีครุฑ C5 (16*23 ซม.)', 1.00, 64, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 8, 2, 1, '2023-02-22 19:56:06', '2023-02-22 19:56:06', NULL, 64, 0, 1);
INSERT INTO `materials` VALUES (167, '2564', 'ซองน้ำตาลครุฑ A4 (16*23 ซม.)', 3.00, 88, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 8, 2, 1, '2023-02-22 19:56:37', '2023-02-22 19:56:37', NULL, 88, 0, 1);
INSERT INTO `materials` VALUES (168, '2564', 'ซองน้ำตาลครุฑ A4 (16*23 ซม.)  ขยายข้าง', 3.00, 47, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 8, 2, 1, '2023-02-22 19:57:13', '2023-02-22 19:57:13', NULL, 47, 0, 1);
INSERT INTO `materials` VALUES (169, '2564', 'ดินสอกด Pentel 0.5', 40.00, 7, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 19:59:29', '2023-02-22 19:59:29', NULL, 7, 0, 1);
INSERT INTO `materials` VALUES (170, '2564', 'ดินสอดำ 2B ตรา Staedtler', 5.00, 84, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:00:16', '2023-02-22 20:00:16', NULL, 84, 0, 1);
INSERT INTO `materials` VALUES (171, '2564', 'ดินสอดำ HB ตรา Quantum', 5.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:00:55', '2023-02-22 20:00:55', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (172, '2564', 'ดินสอดำ นอริก้า 2B', 4.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:01:30', '2023-02-22 20:01:30', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (173, '2564', 'ดินสอดำ นอริก้า ตรา Staedtler', 3.75, 8, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:02:35', '2023-02-22 20:02:35', NULL, 8, 0, 1);
INSERT INTO `materials` VALUES (174, '2564', 'ตลับหมึก Flower Gold สีดำ', 100.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-22 20:03:09', '2023-02-22 20:03:09', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (175, '2564', 'ถ่านอัลคาไลน์ 9V. (1 ก้อน/แผง) พานาโซนิก', 120.00, 28, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 10, 2, 1, '2023-02-22 20:03:57', '2023-02-22 20:03:57', NULL, 28, 0, 1);
INSERT INTO `materials` VALUES (176, '2564', 'ถ่านอัลคาไลน์ AA 1.5V. (2 ก้อน/แผง) พานาโซนิก', 38.00, 34, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 11, 2, 1, '2023-02-22 20:05:04', '2023-02-22 20:05:04', NULL, 34, 0, 1);
INSERT INTO `materials` VALUES (177, '2564', 'ถ่านอัลคาไลน์ AAA 1.5V. (4 ก้อน/แผง) พานาโซนิก', 80.00, 17, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 11, 2, 1, '2023-02-22 20:05:48', '2023-02-22 20:05:48', NULL, 17, 0, 1);
INSERT INTO `materials` VALUES (178, '2564', 'ที่ถอนลวดเหล็กหนีบ EAGLE', 50.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 20:06:23', '2023-02-22 20:06:23', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (179, '2564', 'เทปกาวติดสัน NUVO สีเขียว', 40.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-22 20:07:06', '2023-02-22 20:07:06', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (180, '2564', 'เทปกาวติดสัน NUVO สีแดง', 40.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-22 20:07:44', '2023-02-22 20:07:44', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (181, '2564', 'เทปกาวติดสัน NUVO สีน้ำเงิน', 40.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-22 20:08:22', '2023-02-22 20:08:22', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (182, '2564', 'เทปใสม้วน ขนาด 1/2 นิ้ว * 36 yard ตรา Unitape', 21.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-22 20:08:58', '2023-02-22 20:08:58', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (183, '2564', 'เทปใสรุ่น 500 ตรา 3M Scotch ขนาด 12 มม. * 33 มม.', 15.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 5, 2, 1, '2023-02-22 20:09:29', '2023-02-22 20:09:29', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (184, '2564', 'น้ำยาลบคำผิด ขนาด 4.2 มล. ยี่ห้อ Pentel', 52.00, 4, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:10:06', '2023-02-22 20:10:06', NULL, 4, 0, 1);
INSERT INTO `materials` VALUES (185, '2564', 'น้ำหมึก Pilot สีดำ (Wyteboard Marker) - Refill Ink', 65.00, 12, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:10:54', '2023-02-22 20:10:54', NULL, 12, 0, 1);
INSERT INTO `materials` VALUES (186, '2564', 'น้ำหมึก Pilot สีน้ำเงิน (Wyteboard Marker) - Refill Ink', 65.00, 5, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:11:34', '2023-02-22 20:11:34', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (187, '2564', 'น้ำหมึก Pilot สีแดง (Wyteboard Marker) - Refill Ink', 65.00, 7, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:12:57', '2023-02-22 20:12:57', NULL, 7, 0, 1);
INSERT INTO `materials` VALUES (188, '2564', 'น้ำหมึกสีแดง ตราม้า', 13.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:13:52', '2023-02-22 20:13:52', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (189, '2564', 'น้ำหมึกสีน้ำเงิน ตราม้า', 13.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:14:36', '2023-02-22 20:14:36', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (190, '2564', 'ใบมีดคัตเตอร์ ยี่ห้อ OLFA: LB-10 บรรจุ 10 อัน', 110.00, 2, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:15:06', '2023-02-22 20:15:06', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (191, '2564', 'ปากกา Uniball 0.7 สีดำ', 52.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:15:35', '2023-02-22 20:15:35', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (192, '2564', 'ปากกา Uniball 0.7 สีน้ำเงิน', 52.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:16:08', '2023-02-22 20:16:08', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (193, '2564', 'ปากกา Wytebord Marker ยี่ห้อ pilot  สีดำ', 22.00, 36, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:16:48', '2023-02-22 20:16:48', NULL, 36, 0, 1);
INSERT INTO `materials` VALUES (194, '2564', 'ปากกา Wytebord Marker ยี่ห้อ pilot  สีแดง', 22.00, 38, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:17:47', '2023-02-22 20:17:47', NULL, 38, 0, 1);
INSERT INTO `materials` VALUES (195, '2564', 'ปากกา Wytebord Marker ยี่ห้อ pilot  สีน้ำเงิน', 22.00, 27, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:18:28', '2023-02-22 20:18:28', NULL, 27, 0, 1);
INSERT INTO `materials` VALUES (196, '2564', 'ปากกา Wytebord Marker ยี่ห้อ pilot  สีเขียว', 22.00, 38, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:19:23', '2023-02-22 20:19:23', NULL, 38, 0, 1);
INSERT INTO `materials` VALUES (197, '2564', 'ปากกาเน้นข้อความ Staedtler', 25.00, 7, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:19:51', '2023-02-22 20:19:51', NULL, 7, 0, 1);
INSERT INTO `materials` VALUES (198, '2564', 'ปากกาเมจิก PILOT สีดำ', 6.00, 7, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:20:45', '2023-02-22 20:20:45', NULL, 7, 0, 1);
INSERT INTO `materials` VALUES (199, '2564', 'ปากกาเมจิก PILOT สีแดง', 6.00, 4, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:23:42', '2023-02-22 20:23:42', NULL, 4, 0, 1);
INSERT INTO `materials` VALUES (200, '2564', 'ปากกาเมจิก PILOT สีน้ำเงิน', 6.00, 6, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 9, 2, 1, '2023-02-22 20:24:22', '2023-02-22 20:24:22', NULL, 6, 0, 1);
INSERT INTO `materials` VALUES (201, '2564', 'ปากกาลูกลื่น Quantum 0.7 สีแดง', 4.00, 14, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:25:33', '2023-02-22 20:25:33', NULL, 14, 0, 1);
INSERT INTO `materials` VALUES (202, '2564', 'ปากกาลูกลื่น Quantum 0.7 สีน้ำเงิน', 4.00, 40, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:26:18', '2023-02-22 20:26:18', NULL, 40, 0, 1);
INSERT INTO `materials` VALUES (203, '2564', 'ปากกาลูกลื่น Quantum 0.7 สีดำ', 4.00, 47, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 13, 2, 1, '2023-02-22 20:27:30', '2023-02-22 20:27:30', NULL, 47, 0, 1);
INSERT INTO `materials` VALUES (204, '2564', 'แปรงลบกระดานไม้ ยี่ห้อโดมอน', 16.00, 3, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-22 20:29:23', '2023-02-22 20:29:23', NULL, 3, 0, 1);
INSERT INTO `materials` VALUES (205, '2564', 'ผง HP ดำ เบอร์ 30A', 2260.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:30:10', '2023-02-22 20:30:10', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (206, '2564', 'ผง HP ดำ เบอร์ 53A', 3880.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:30:57', '2023-02-22 20:30:57', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (207, '2564', 'ผง HP ดำ เบอร์ 83A', 2320.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:33:36', '2023-02-22 20:33:36', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (208, '2564', 'แผ่น Stamp pad No.2 ตราม้า', 42.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:34:11', '2023-02-22 20:34:11', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (209, '2564', 'แผ่นซีดี ตรา Princo', 7.18, 108, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 14, 2, 1, '2023-02-22 20:35:01', '2023-02-22 20:35:01', NULL, 108, 0, 1);
INSERT INTO `materials` VALUES (210, '2564', 'แผ่นดีวีดี ตรา Peacock', 8.40, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 14, 2, 1, '2023-02-22 20:35:49', '2023-02-22 20:35:49', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (211, '2564', 'แฟ้มซอง 1 กระดุม ขยายข้าง A4 ORCA', 15.00, 5, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 20:36:32', '2023-02-22 20:36:32', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (212, '2564', 'แฟ้มซอง 1 กระดุม  A4', 8.00, 5, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-22 20:37:12', '2023-02-22 20:37:12', NULL, 5, 0, 1);
INSERT INTO `materials` VALUES (213, '2564', 'แฟ้มปกแข็ง 3 นิ้ว 2ห่วงช้าง #112F/ดำ', 65.00, 9, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 15, 2, 1, '2023-02-22 20:38:25', '2023-02-22 20:38:25', NULL, 9, 0, 1);
INSERT INTO `materials` VALUES (214, '2564', 'มีตคัตเตอร์ MESA AL-2P ใหญ่ Autolock', 48.00, 2, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-22 20:39:38', '2023-02-22 20:39:38', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (215, '2564', 'ไม้บรรทัด (พลาสติก)', 11.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 20:40:16', '2023-02-22 20:40:16', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (216, '2564', 'ไม้บรรทัด (เหล็ก)', 36.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 20:40:48', '2023-02-22 20:40:48', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (217, '2564', 'ยางลบ Staedler', 4.00, 11, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 10, 2, 1, '2023-02-22 20:41:33', '2023-02-22 20:41:33', NULL, 11, 0, 1);
INSERT INTO `materials` VALUES (218, '2564', 'ลวดเข้าเล่ม ETONA 23/10', 54.00, 1, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:42:12', '2023-02-22 20:42:12', NULL, 1, 0, 1);
INSERT INTO `materials` VALUES (219, '2564', 'ลวดเข้าเล่ม ETONA 23/15', 90.00, 2, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:42:39', '2023-02-22 20:42:39', NULL, 2, 0, 1);
INSERT INTO `materials` VALUES (220, '2564', 'ลวดเย็บกระดาษ ตราแม๊กซ์  No.10-1M(27/4.8) บรรจุ 1,000 staples', 8.70, 30, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:43:17', '2023-02-22 20:43:17', NULL, 30, 0, 1);
INSERT INTO `materials` VALUES (221, '2564', 'ลวดเย็บกระดาษ ตราแม๊กซ์  No.10-5M(27/4.8) บรรจุ 5,000 staples', 42.00, 8, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:43:53', '2023-02-22 20:43:53', NULL, 8, 0, 1);
INSERT INTO `materials` VALUES (222, '2564', 'ลวดเย็บกระดาษ ตราแม๊กซ์  No.3-1M(24/6) บรรจุ 1,000 staples', 18.00, 18, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:44:26', '2023-02-22 20:44:26', NULL, 18, 0, 1);
INSERT INTO `materials` VALUES (223, '2564', 'ลวดเย็บกระดาษ ตราแม๊กซ์  No.35-5M(26/6) บรรจุ 1,000 staples', 18.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:44:56', '2023-02-22 20:44:56', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (224, '2564', 'ลวดเย็บกระดาษ ตราแม๊กซ์  No.35-5M(26/6) บรรจุ 5,000 staples', 59.00, 7, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:45:24', '2023-02-22 20:45:24', NULL, 7, 0, 1);
INSERT INTO `materials` VALUES (225, '2564', 'ลวดเย็บกระดาษ ตราแม๊กซ์  T3-10MB ขนาด 12 มม.* 10 มม. บรรจุ 1,000 staples', 55.00, 8, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:46:05', '2023-02-22 20:46:05', NULL, 8, 0, 1);
INSERT INTO `materials` VALUES (226, '2564', 'ลวดเสียบ 1*50 Elfen ชุบ', 5.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:46:31', '2023-02-22 20:46:31', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (227, '2564', 'ไส้ดินสอ ตรา Pentel 0.5 มม. บรรจุ 12 ไส้', 20.00, 18, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 6, 2, 1, '2023-02-22 20:46:59', '2023-02-22 20:46:59', NULL, 18, 0, 1);
INSERT INTO `materials` VALUES (228, '2564', 'หมึก Canon 810 (Black)', 755.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-22 20:47:37', '2023-02-22 20:47:37', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (229, '2564', 'หมึก Canon 811 (Color)', 950.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 20:48:07', '2023-02-22 20:48:07', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (230, '2564', 'หมึก Canon CL-9 (98 Color)', 565.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 12, 2, 1, '2023-02-22 20:48:36', '2023-02-22 20:48:36', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (231, '2564', 'หมึก Canon PG-8 (88 Black)', 450.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 1, 2, 1, '2023-02-22 20:49:03', '2023-02-22 20:49:03', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (232, '2564', 'หมึก Epson (664) สี Cyan', 235.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:49:32', '2023-02-22 20:49:32', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (233, '2564', 'หมึก Epson (664) สี Magenta', 235.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:50:08', '2023-02-22 20:50:08', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (234, '2564', 'หมึก Epson (664) สีดำ', 235.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:50:38', '2023-02-22 20:50:38', NULL, 0, 0, 1);
INSERT INTO `materials` VALUES (235, '2564', 'หมึก Epson (664) สีเหลือง', 235.00, 0, 'สาขาวิชาวิศกรรมคอมพิวเตอร์', 4, 2, 1, '2023-02-22 20:51:04', '2023-02-22 20:51:04', NULL, 0, 0, 1);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_08_25_145542_goods', 2);
INSERT INTO `migrations` VALUES (4, '2020_08_26_012900_departments', 3);
INSERT INTO `migrations` VALUES (5, '2020_08_26_012908_units', 3);
INSERT INTO `migrations` VALUES (6, '2020_08_26_012945_materials', 3);
INSERT INTO `migrations` VALUES (7, '2020_08_26_013011_reciept_materials', 3);
INSERT INTO `migrations` VALUES (8, '2020_08_26_013027_borrow_materials', 3);
INSERT INTO `migrations` VALUES (9, '2020_08_26_013523_types', 3);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('prasan.ue@rmuti.ac.th', '$2y$10$UPv5lLJd8/jc51847sQ2vu4LJYofI6GUsdXfrqXW7XlcO7nvBi3y2', '2022-09-27 14:26:49');

-- ----------------------------
-- Table structure for receipt_goods
-- ----------------------------
DROP TABLE IF EXISTS `receipt_goods`;
CREATE TABLE `receipt_goods`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `good_id` int(0) NOT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of receipt_goods
-- ----------------------------
INSERT INTO `receipt_goods` VALUES (7, 12, 12, '2021-06-15 11:15:58', '2021-06-15 11:15:58', NULL);
INSERT INTO `receipt_goods` VALUES (8, 140, 1, '2022-10-04 04:19:00', '2022-10-04 04:19:00', NULL);
INSERT INTO `receipt_goods` VALUES (9, 136, 2, '2023-02-06 05:20:39', '2023-02-06 05:20:39', NULL);
INSERT INTO `receipt_goods` VALUES (10, 146, 1, '2023-02-13 12:20:51', '2023-02-13 12:20:51', NULL);

-- ----------------------------
-- Table structure for receipt_materials
-- ----------------------------
DROP TABLE IF EXISTS `receipt_materials`;
CREATE TABLE `receipt_materials`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_id` int(0) NOT NULL,
  `amount` int(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of receipt_materials
-- ----------------------------
INSERT INTO `receipt_materials` VALUES (29, 62, 10, '2022-09-22 02:39:23', '2022-09-22 02:39:23', NULL);
INSERT INTO `receipt_materials` VALUES (30, 62, 1000000000, '2022-09-22 03:04:25', '2022-09-22 03:04:25', NULL);
INSERT INTO `receipt_materials` VALUES (31, 82, 3, '2022-12-21 09:13:48', '2022-12-21 09:13:48', NULL);
INSERT INTO `receipt_materials` VALUES (32, 83, 1, '2023-02-03 03:17:13', '2023-02-03 03:17:13', NULL);
INSERT INTO `receipt_materials` VALUES (33, 83, 3, '2023-02-03 03:17:26', '2023-02-03 03:17:26', NULL);
INSERT INTO `receipt_materials` VALUES (34, 65, 1, '2023-02-03 03:17:56', '2023-02-03 03:17:56', NULL);
INSERT INTO `receipt_materials` VALUES (35, 76, 1, '2023-02-03 03:28:41', '2023-02-03 03:28:41', NULL);
INSERT INTO `receipt_materials` VALUES (36, 83, 1, '2023-02-13 12:22:28', '2023-02-13 12:22:28', NULL);
INSERT INTO `receipt_materials` VALUES (37, 82, 1, '2023-02-13 12:23:08', '2023-02-13 12:23:08', NULL);

-- ----------------------------
-- Table structure for shops
-- ----------------------------
DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shops
-- ----------------------------
INSERT INTO `shops` VALUES (1, 'ขอนแก่นคลังนานาธรรม', '2022-08-12 02:50:59', '2022-08-12 02:50:59', NULL);
INSERT INTO `shops` VALUES (2, 'ขอนแก่นไทยแลนด์', '2022-08-12 03:05:44', '2022-08-12 03:05:44', NULL);
INSERT INTO `shops` VALUES (3, 'คิงส์อีเล็คทรอนิกส์', '2022-08-13 03:07:51', '2022-08-13 03:07:51', NULL);
INSERT INTO `shops` VALUES (10, 'Newvisions Digital', '2023-02-21 04:05:09', '2023-02-21 04:05:09', NULL);

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 'ฝึกสอน', '2020-08-29 17:08:46', '2020-08-29 17:08:55', NULL);
INSERT INTO `types` VALUES (2, 'สิ้นเปลือง', '2020-08-29 17:09:12', '2020-08-29 17:09:19', NULL);
INSERT INTO `types` VALUES (4, 'สำนักงาน', '2022-09-27 14:38:13', '2022-12-21 10:00:08', NULL);

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of units
-- ----------------------------
INSERT INTO `units` VALUES (1, 'อัน', '2022-08-12 02:58:28', '2022-08-12 02:58:28', NULL);
INSERT INTO `units` VALUES (2, 'รีม', '2022-08-12 02:59:42', '2022-08-12 02:59:42', NULL);
INSERT INTO `units` VALUES (3, 'หลอด', '2022-08-12 03:00:01', '2022-08-12 03:00:01', NULL);
INSERT INTO `units` VALUES (4, 'ขวด', '2022-08-12 03:00:09', '2022-08-12 03:00:09', NULL);
INSERT INTO `units` VALUES (5, 'ม้วน', '2022-08-12 03:00:17', '2022-08-12 03:00:17', NULL);
INSERT INTO `units` VALUES (6, 'กล่อง', '2022-08-12 03:00:32', '2022-08-12 03:00:32', NULL);
INSERT INTO `units` VALUES (7, 'เครื่อง', '2022-08-12 03:00:43', '2022-08-12 03:00:43', NULL);
INSERT INTO `units` VALUES (8, 'ซอง', '2022-08-12 03:00:50', '2022-08-12 03:00:50', NULL);
INSERT INTO `units` VALUES (9, 'แท่ง', '2022-08-12 03:01:16', '2022-08-12 03:01:16', NULL);
INSERT INTO `units` VALUES (10, 'ก้อน', '2022-08-12 03:01:25', '2022-08-12 03:01:25', NULL);
INSERT INTO `units` VALUES (11, 'แผง', '2022-08-12 03:01:35', '2022-08-12 03:01:35', NULL);
INSERT INTO `units` VALUES (12, 'อัน', '2022-08-12 03:01:48', '2022-08-12 03:01:48', NULL);
INSERT INTO `units` VALUES (13, 'ด้าม', '2022-08-12 03:02:02', '2022-08-12 03:02:02', NULL);
INSERT INTO `units` VALUES (14, 'แผ่น', '2022-08-12 03:02:21', '2022-08-12 03:02:21', NULL);
INSERT INTO `units` VALUES (15, 'แฟ้ม', '2022-08-12 03:02:33', '2022-08-12 03:02:33', NULL);
INSERT INTO `units` VALUES (25, 'ตัว', '2022-08-13 03:06:08', '2022-08-13 03:06:08', NULL);
INSERT INTO `units` VALUES (26, 'ชุด', '2022-08-13 03:15:18', '2022-08-13 03:15:18', NULL);
INSERT INTO `units` VALUES (27, 'เครื่อง', '2022-08-13 03:42:09', '2023-02-21 01:42:15', '2023-02-21 01:42:15');
INSERT INTO `units` VALUES (28, 'งาน', '2022-08-14 04:53:09', '2022-08-14 04:53:09', NULL);
INSERT INTO `units` VALUES (29, 'ตู้', '2022-08-14 04:53:18', '2022-08-14 04:53:18', NULL);
INSERT INTO `units` VALUES (30, 'กก.', '2023-02-21 02:20:50', '2023-02-21 02:20:50', NULL);
INSERT INTO `units` VALUES (31, 'เส้น', '2023-02-21 02:25:42', '2023-02-21 02:25:42', NULL);
INSERT INTO `units` VALUES (32, 'หลัง', '2023-02-21 04:58:47', '2023-02-21 04:58:47', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_sso` tinyint(1) NULL DEFAULT 0,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@admin', NULL, '$2y$10$mezbdLcLHW5oaBKH2A6Viu/0dVKzI4E/la/H1rpRMaFkYnrRlmna.', 'kd5LZKq67hoEwiqSptbhAALzCwvFrLnmuNCb464EQlZXuhb8aFrsrOP9NJnv', '2020-08-18 16:22:12', '2020-08-18 16:22:12', 1, 0, '', 1);
INSERT INTO `users` VALUES (2, 'User', 'user@user', NULL, '$2y$10$v.uzLmY.NCx98xOyTl1T..dpVJH58azWg5wbQKGIkxxLeX7ICfztC', NULL, '2020-09-23 14:40:41', '2023-02-21 03:34:09', 1, 0, 'Teachers', 1);
INSERT INTO `users` VALUES (3, 'user1', 'user1@user', NULL, '$2y$10$0IW/nXosW2t.cNrbDnmBgOyhU3qgQqbRuLxZPwmBEvG19vpaCX1dS', NULL, '2020-09-23 14:48:03', '2022-12-21 15:14:54', 0, 0, 'Students', 1);
INSERT INTO `users` VALUES (7, 'Test65', 'test65@Test65', NULL, '$2y$10$Pgp1hibJLHLk9uClc6MXteBaD9zgS02H6cQ61QvcZUUeHGqsEKQH6', NULL, '2022-08-13 03:25:20', '2023-03-01 22:35:57', 0, 0, 'Students', 0);
INSERT INTO `users` VALUES (8, 'รชต วันเทาแก้ว', 'rachata.wa@rmuti.ac.th', NULL, '$2y$10$Q9fNdWH4HWaZaLgNT70k8.A9sp2pO.KZObU9D2WqeHhMt06Mwe3YK', NULL, '2022-09-09 14:17:49', '2023-02-21 05:15:19', 0, 1, 'Students', 0);
INSERT INTO `users` VALUES (9, 'เพิ่มพร ลักขณาวรรณกุล', 'phoemporn.la@rmuti.ac.th', NULL, '$2y$10$RueShQeqc8L99csLyQlIkO8zYCtajXMr8nYK/KNx72DNXfUd.OKnO', NULL, '2022-09-20 09:14:55', '2022-12-20 10:38:14', 1, 1, 'Teachers', 1);
INSERT INTO `users` VALUES (25, 'ปิยะนุช ตั้งกิตติพล', 'piyanuch.ch@rmuti.ac.th', NULL, '$2y$10$xgkIpNFrVvUzHBberkvahO2ZxfzL4S8VEQrdwAcHWX99mrY6eKkgS', NULL, '2022-09-21 04:26:56', '2022-09-21 04:26:56', 0, 1, 'Teachers', 0);
INSERT INTO `users` VALUES (48, 'จักรพนธ์ อบมา', 'jagraphon.ob@rmuti.ac.th', NULL, '$2y$10$CH9omNqX782ow8mU1vgE6OanakQ52Ch28XXccQwIiBXrjyn5./U.u', NULL, '2022-09-26 12:45:48', '2022-09-26 12:45:48', 0, 1, 'Teachers', 0);
INSERT INTO `users` VALUES (49, 'ประสาน เอื้อทาน', 'prasan.ue@rmuti.ac.th', NULL, '$2y$10$NuIX.LIlNFoO2hLjwRnLn.VXjJVyqD2NMe5qLoTJhITPAUhEO.FLe', NULL, '2022-09-27 14:13:53', '2023-02-02 22:58:47', 0, 1, 'Teachers', 1);
INSERT INTO `users` VALUES (50, 'เฉลิมวุฒิ น้อยอุ่นแสน', 'chaluemwut.no@rmuti.ac.th', NULL, '$2y$10$tTOtZV7G8vGFceyX0jPQsuLq.HkULmP8SkBa37KIyIFIMWh2fQlau', NULL, '2022-09-30 00:44:17', '2022-09-30 00:44:17', 0, 1, 'Teachers', 0);
INSERT INTO `users` VALUES (55, 'ไอรดา ส่งสุข', 'irada.so@rmuti.ac.th', NULL, '$2y$10$/nek/z9rdrsFl1hRHbiBbeFXcLYmfIYBtftAH4JKgOd6iZzVsxQUC', NULL, '2022-12-22 22:57:44', '2022-12-22 22:57:44', 1, 1, 'Teachers', 1);
INSERT INTO `users` VALUES (57, 'บุรินทร ป้องจันทร์', 'burintorn.po@rmuti.ac.th', NULL, '$2y$10$9p/b18fiE7DKOqt6TtgX1uuhD4i7DlyE/.1wf9HHkgW5BRt2a5pP.', NULL, '2023-01-04 18:26:55', '2023-01-05 04:20:50', 0, 1, 'Students', 1);
INSERT INTO `users` VALUES (58, 'ภัควัตร โคตะรุต', 'pakkawat.kh@rmuti.ac.th', NULL, '$2y$10$nq8XKYJ2C5vfMFJZtGssUeei0mRzFY9rs01lOqJuj49VMIgekCOli', NULL, '2023-01-04 18:27:11', '2023-01-05 04:20:44', 0, 1, 'Students', 0);
INSERT INTO `users` VALUES (59, 'ปฐมพงษ์ สีพลแสน', 'phathompong.se@rmuti.ac.th', NULL, '$2y$10$lUaCSaW3nhENql1ThGSTAeL3s23lmGK65cCdHDjtDHZ7Dsd.TUJJe', NULL, '2023-01-04 18:34:07', '2023-01-05 03:31:35', 0, 1, 'Students', 1);
INSERT INTO `users` VALUES (61, 'ศศิธร พิมพ์สุนนท์', 'sasitorn.pi@rmuti.ac.th', NULL, '$2y$10$7SLzZYKamhGLBbEfaud0G.UbdK2YImARwgmrK/.plCebC.gp/P89C', NULL, '2023-02-08 23:03:05', '2023-02-22 19:30:21', 1, 1, 'Teachers', 1);
INSERT INTO `users` VALUES (62, 'กนกพล มีพันธ์', 'kanokpol.me@rmuti.ac.th', NULL, '$2y$10$D2.Sjm6NCsI/6TfpcliHV.Vwe.Ptf4BCn7/3ucit/flT7RRBWy3um', NULL, '2023-02-24 07:55:47', '2023-02-24 08:00:58', 0, 1, 'Teachers', 1);

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warehouses
-- ----------------------------
INSERT INTO `warehouses` VALUES (1, 'ฝึกสอน', '2020-08-29 17:08:46', '2020-08-29 17:08:55', '2020-08-29 17:08:55');
INSERT INTO `warehouses` VALUES (2, 'สิ้นเปลือง', '2020-08-29 17:09:12', '2021-06-17 07:44:57', '2021-06-17 07:44:57');
INSERT INTO `warehouses` VALUES (4, 'ทดสอบ', '2021-06-17 07:29:28', '2021-06-17 07:45:15', '2021-06-17 07:45:15');
INSERT INTO `warehouses` VALUES (5, 'ทดสอบ', '2021-06-17 07:30:10', '2021-06-17 07:30:10', NULL);
INSERT INTO `warehouses` VALUES (6, 'ทดสอบ', '2021-06-17 07:30:14', '2021-06-17 07:30:14', NULL);
INSERT INTO `warehouses` VALUES (7, 'ชุดสายวัดดำแดง', '2021-06-17 07:31:15', '2021-06-17 07:31:15', NULL);
INSERT INTO `warehouses` VALUES (8, 'ทดสอบrtrt', '2021-06-17 07:34:22', '2021-06-17 07:45:41', '2021-06-17 07:45:41');
INSERT INTO `warehouses` VALUES (9, 'werwerwe', '2021-06-17 08:01:00', '2021-06-17 08:01:36', '2021-06-17 08:01:36');
INSERT INTO `warehouses` VALUES (10, NULL, '2021-06-17 08:06:13', '2021-06-17 08:07:59', '2021-06-17 08:07:59');
INSERT INTO `warehouses` VALUES (11, NULL, '2021-06-17 08:06:52', '2021-06-17 08:07:21', '2021-06-17 08:07:21');
INSERT INTO `warehouses` VALUES (12, 'sdsdfsdfspodfjspodfjposajdfpasdf', '2021-06-17 08:07:00', '2021-06-17 08:07:17', '2021-06-17 08:07:17');
INSERT INTO `warehouses` VALUES (13, 'ewroiwueroiwer', '2021-06-17 08:08:04', '2021-06-17 08:26:45', '2021-06-17 08:26:45');

SET FOREIGN_KEY_CHECKS = 1;
