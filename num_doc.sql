/*
 Navicat Premium Data Transfer

 Source Server         : xampp
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : num_doc

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 20/12/2023 10:17:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `userID` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'เลขบัตรประชาชน',
  `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'คำนำหน้าชื่อ, ยศ',
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ชื่อ',
  `surname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'นามสกุล',
  `position` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ตำแหน่ง',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Username',
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'Password',
  `user_type` int NULL DEFAULT NULL COMMENT 'ประเภทผู้ใช้ 0=Admin, 1=ผู้ใช้ทั่วไป',
  `create_date` datetime NULL DEFAULT NULL COMMENT 'วันที่สร้าง',
  `create_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้สร้าง',
  `update_date` datetime NULL DEFAULT NULL COMMENT 'วันที่อัพเดท',
  `update_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้อัพเดท',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES (1, '5149999004580', 'ส.ต.', 'ภูพริษฐ์', 'เมธาพัฒนบูรณ์', 'เสมียนแผนกพัฒนาระบบ', 'Admin', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 0, '2023-12-15 23:23:10', 'สิบตรีภูพริษฐ์ เมธาพัฒนบูรณ์', '2023-12-16 01:57:08', 'พล.อ.สรวิชญ์ กิตติพันธ์พยัต');
INSERT INTO `account` VALUES (3, '9999999999999', 'พล.อ.', 'สรวิชญ์', 'กิตติพันธ์พยัต', 'ผบ.ทบ.', 'sornrawit', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 0, '2023-12-15 23:29:27', 'สิบตรีภูพริษฐ์ เมธาพัฒนบูรณ์', '2023-12-19 10:54:05', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์');
INSERT INTO `account` VALUES (4, '1111111111111', 'นาย', 'อาวีสร', 'รอดจันทร์', 'พนักงานราชการ', 'rvsorn', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-15 23:33:39', 'สิบตรีภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (5, '3319297287618', 'พ.อ.', 'ฐปนนท์', 'สุกปลั่ง', 'รอง ผอ.กรภ.สปข.สนผ.กห.', 'thapanon.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 15:41:23', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '2023-12-19 15:42:56', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์');
INSERT INTO `account` VALUES (6, '3251676562713', 'น.ท.', 'ปราโมทย์', 'เดชไกรกิตติ', 'หน.สารบรรณและธุรการ กลาง.สนผ.กห.', 'pramot.d', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 15:45:18', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (7, '2785466800056', 'พ.อ.หญิง', 'วาสิณี', 'บุญญานันต์', 'รอง ผอ.กงป.สนผ.กห.', 'wasinee.b', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 15:47:10', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (8, '7529525314599', 'น.อ.', 'วราห์', 'เรืองเดช', 'นายทหารประสานนโยบาย สนย.สนผ.กห.', 'wara.r', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 15:47:58', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (9, '428922852480', 'พ.อ.หญิง', 'ชนัญชิดา', 'เบญจาธิกุล', 'นายทหารประสานนโยบาย สกร.สนผ.กห.', 'chanutchida.b', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 15:49:05', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (10, '6289564974829', 'พ.ท.หญิง', 'สุชาดา', 'ไล้สุวรรณ', 'หน.กิจการพลเรือน กกร.สกร.สนผ.กห.', 'suchada.l', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 15:49:53', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (11, '7087432673036', 'น.ท.', 'ดำรงพล', 'ชะระอ่ำ', 'หน.ความร่วมมือกับประเทศรอบบ้าน กมซ.สอซ.สนผ.กห.', 'damrong.c', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:33:19', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '2023-12-19 21:33:36', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์');
INSERT INTO `account` VALUES (12, '4546686528765', 'พ.ท.หญิง', 'ชุติมา', 'กระสา', 'หน.การประชุม กปช.สนผ.กห.', 'chutima.k', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:35:08', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (13, '2095548217665', 'พ.ท.', 'ยชุรเวท', 'รัตนเสนีย์', 'หน.เตรียมการ กปช.สนผ.กห.', 'yachurawet.r', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:36:19', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (14, '5259552831586', 'พ.ท.หญิง', 'จันธิมา', 'สกุลจันทร์', 'หน.บัญชี กกง.สนผ.กห.', 'jantima.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:37:06', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (15, '3754611501287', 'พ.ท.หญิง', 'จิตรลดา', 'ภู่ศิริ', 'หน.รักษาความปลอดภัยบุคคล และเอกสาร กรภ.สปข.สนผ.กห.', 'jirada.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:37:58', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (16, '197865677655', 'น.ต.', 'เสวก', 'สีชัย', 'นายทหารประสานภารกิจด้านความมั่นคงกับ กอ.รมน.ศปสท.สนผ.กห.', 'sawek.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:39:09', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (17, '1730703431451', 'พ.ต.หญิง', 'ภัทราวดี', 'ศุกระเศรณี', 'ประจำแผนกสำรวจและควบคุม กรภ.สปข.สนผ.กห.', 'pattharawadee.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:41:37', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (18, '5802083731257', 'พ.ต.หญิง', 'พรนิภา', 'อภิโชติพัฒนศิริ', 'นายทหารสารบรรณและธุรการ สนย.สนผ.กห.', 'phonnipa.a', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:43:18', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (19, '4032630721877', 'พ.ต.', 'นพพล', 'สังข์จุ้ย', 'ประจำแผนกเศรษฐกิจ สังคม และวัฒนธรรม อาเซียน กยซ.สอซ.สนผ.กห.', 'nopphon.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:44:14', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (20, '9502668509735', 'น.ต.หญิง', 'พชรวรรณ', 'ทับทิมไทย', 'ประจำแผนกการจัดพิเศษ กผจ.สนผ.กห.', 'pacharawan.t', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:45:08', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (21, '5632879977420', 'น.ต.หญิง', 'พรินทรา', 'ชูศรี', 'เจ้าหน้าที่งบประมาณ กงป.สนผ.กห.', 'parinthara.c', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-19 21:46:08', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (22, '2008840646549', 'พ.ต.หญิง', 'มสารัศม์', 'สังข์สวัสดิ์', 'ประจำแผนกบริการ กลาง.สนผ.กห.', 'masaras.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:03:53', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (23, '4090592957354', 'พ.ต.', 'ศุภเชษฐ์', 'ฤทธิ์จันทร์', 'ประจำแผนกกิจการพลเรือน กกร.สกร.สนผ.กห.', 'supachet.r', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:05:11', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (24, '9855739309738', 'พ.ต.', 'สมมารถ', 'พุ่มพุทรา', 'นปสท.กับ กต.สง.ปสท.กับ กต.สปสท.สนผ.กห.', 'sommas.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:06:37', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '2023-12-20 09:07:53', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์');
INSERT INTO `account` VALUES (25, '2742365307045', 'พ.ต.', 'นนทิกร', 'ผ่องเคหา', 'นายทหารสารบรรณและธุรการ สกร.สนผ.กห.', 'nontikorn.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:07:32', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (26, '1648258873249', 'ร.อ.หญิง', 'องค์กช', 'วรรณภักตร์', 'ประจำแผนกนโยบายและแผน กนผ.สปข.สนผ.กห.', 'ongkoch.w', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:10:03', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (27, '2134881228710', 'ร.อ.หญิง', 'พจนพร', 'กังสดาร', 'ประจำแผนกยุทธศาสตร์อาเซียน กยซ.สอซ.สนผ.กห.', 'pojjanaporn.k', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:15:20', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (28, '3030863104086', 'ร.อ.หญิง', 'นวพรรษ', 'นิ่มนวล', 'ประจำแผนกความร่วมมือกับคู่เจรจา กรซ.สอซ.สนผ.กห.', 'nawapan.n', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:16:16', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (29, '4033406439252', 'ร.อ.', 'พงศธร', 'เวสมโน', 'ประจำแผนกพิธีการ กพก.สวส.สนผ.กห.', 'pongsathorn', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:17:09', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (30, '4346469058168', 'ร.อ.หญิง', 'วลัยพร', 'บัวเพิ่ม', 'ประจำแผนกสารบรรณและธุรการ กลาง.สนผ.กห.', 'walaiporn.b', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:18:00', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (31, '4287251777216', 'ร.ท.', 'ปรมา', 'สุขเสวตร์', 'ประจำแผนกสารบรรณและธุรการ กลาง.สนผ.กห.', 'parama.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:18:55', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (32, '2788064491634', 'ร.ท.', 'เจษฎา', 'ไชยชนะ', 'ประจำแผนกรักษาความปลอดภัยบุคคล และเอกสาร กรภ.สปข.สนผ.กห.', 'jedsada.ch', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:19:42', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (33, '2262963016356', 'ร.ท.หญิง', 'มินตรา', 'ภู่เจริญ', 'ประจำแผนกสนับสนุนภารกิจพิเศษ กกร.สกร.สนผ.กห.', 'mintra.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:20:34', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (34, '8279360397343', 'ร.ท.', 'ศุภวุฒิ', 'ผ่องพุฒิ', 'ประจำแผนกรวบรวมวิเคราะห์ และประชาสัมพันธ์ข้อมูล กสน.สวส.สนผ.กห.', 'suphawut.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:22:08', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (35, '3163659299631', 'ร.ท.', 'พิสิษฐ์สรรค์', 'พงษ์ประสิทธิ์', 'ประจำแผนกการทูตฝ่ายทหาร กวส.สวส.สนผ.กห.', 'pisisan.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:23:30', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (36, '3385736086005', 'ร.ท.', 'จตุภูมิ', 'ร่วมจิต', 'เจ้าหน้าที่สารบรรณและธุรการ กผจ.สนผ.กห.', 'jatuphum.r', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:24:18', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (37, '9440082455707', 'ร.ท.', 'ณัฐพงษ์', 'เฮงวัชรไพบูลย์', 'ประจำแผนกปฏิบัติการ กทด.สนผ.กห.', 'natthapong.h', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:25:09', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (38, '6942735235284', 'ร.ท.', 'รวิสุต', 'อนุศรี', 'ประจำแผนกพัฒนาระบบ กทด.สนผ.กห.', 'rawisut.a', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:26:14', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (39, '2163112409790', 'ร.ต.', 'ไชยพันธุ์', 'ปิติสุทธิ', 'เจ้าหน้าที่สารบรรณและธุรการ สง.ปรมน.ศปสท.สนผ.กห.', 'chaiphun.p', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:26:59', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (40, '3716378153878', 'ร.ต.หญิง', 'ประภาศรี', 'ทัดทองคำ', 'เจ้าหน้าที่สารบรรณและธุรการ สวส.สนผ.กห.', 'prapasi.t', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:28:45', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (41, '7793279867388', 'ร.ต.หญิง', 'ณธษา', 'ศิริพฤกษ์', 'เจ้าหน้าที่สารบรรณและธุรการ สนย.สนผ.กห.', 'nathasa.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:29:32', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (42, '2036987215788', 'ร.ต.', 'ศราวุธ', 'บุญพิทักษ์', 'ประจำแผนกยุทธภัณฑ์และสิ่ิงอุปกรณ์ กสก.สนผ.สนผ.กห.', 'sarawut.b', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:30:20', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (43, '8064677942751', 'พ.อ.อ.', 'มีชัย', 'บุนนาค', 'เสมียนแผนกสารบรรณและธุรการ กลาง.สนผ.กห.', 'meechai.b', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:31:05', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (44, '6931190716032', 'จ.อ.หญิง', 'นิชาภา', 'เก่งเขตวิทย์', 'เสมียนแผนกกำลังพล กลาง.สนผ.กห.', 'nichapha.k', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:31:48', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (45, '3136011221172', 'จ.ส.อ.', 'สุเมธ', 'บุตรศรีเพ็ชร', 'เสมียนแผนกสารบรรณและธุรการ กลาง.สนผ.กห.', 'sumet.b', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:32:32', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);
INSERT INTO `account` VALUES (46, '1940303001807', 'พ.จ.อ.', 'อำพล', 'ศรแผลง', 'เสมียนแผนกสารบรรณและธุรการ กลาง.สนผ.กห.', 'aumphol.s', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 1, '2023-12-20 09:33:27', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', NULL, NULL);

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'E-mail',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'คำอธิบาย',
  `create_date` datetime NULL DEFAULT NULL COMMENT 'วันส่ง',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (3, 'zeed@mail.com', 'adfasdf', '2023-12-19 22:07:45');
INSERT INTO `contact` VALUES (4, 'theadmin@gmail.com', 'asdfasdf', '2023-12-19 22:07:48');
INSERT INTO `contact` VALUES (5, 'schultz.angelita@example.net', 'asdfasdfzxvzxcv', '2023-12-19 22:07:51');

-- ----------------------------
-- Table structure for doc_normal
-- ----------------------------
DROP TABLE IF EXISTS `doc_normal`;
CREATE TABLE `doc_normal`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_doc` int NULL DEFAULT NULL COMMENT 'ออกเลขที่',
  `urgent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ชั้นความเร็ว ด่วน, ด่วนมาก, ด่วนที่สุด',
  `type_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ประเภทหนังสือ ',
  `from_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'จากหน่วยงานออก',
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'เรื่อง',
  `to_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ถึงหน่วยงานที่รับ',
  `signer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ลงนาม',
  `requester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ขอ',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'หมายเหตุ',
  `create_date` datetime NULL DEFAULT NULL COMMENT 'วันที่ออกเลข',
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'สถานะการลบ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doc_normal
-- ----------------------------
INSERT INTO `doc_normal` VALUES (1, 1, 'ปกติ', 'บันทึกข้อความ', 'กทด.สนผ.กห', 'ขอส่งระบบออกเลขลับ', 'สนผ.กห.', 'พ.อ.นิธิ', '', 'ตรวจสอบการทำงานของ', '2023-12-16 00:35:57', 'ลบ');
INSERT INTO `doc_normal` VALUES (2, 2, 'ปกติ', 'บันทึกข้อความ', 'กทด.สนผ.กห', 'ขอส่งระบบออกเลขลับ', 'สนผ.กห.', 'พ.อ.นิธิ', '', 'ตรวจสอบการทำงานของ', '2023-12-16 00:36:11', NULL);
INSERT INTO `doc_normal` VALUES (3, 3, 'ปกติ', 'บันทึกข้อความ', 'กทด.สนผ.กห', 'ขอส่งระบบออกเลขลับ', 'สนผ.กห.', 'พ.อ.นิธิ', '', 'ตรวจสอบการทำงานของ', '2023-12-16 00:37:20', NULL);
INSERT INTO `doc_normal` VALUES (4, 4, 'ปกติ', 'บันทึกข้อความ', 'กทด.สนผ.กห', 'ขอส่งระบบออกเลขลับ', 'สนผ.กห.', 'พ.อ.นิธิ', '', 'ตรวจสอบการทำงานของ', '2023-12-16 00:38:12', NULL);
INSERT INTO `doc_normal` VALUES (5, 5, 'ด่วน', 'หนังสือประทับตรา', 'กทด.สนผ.กห', 'ทดสอบระบบ', 'สนผ.กห.', 'พ.อ.นิธิ', '', '', '2023-12-16 00:39:57', NULL);
INSERT INTO `doc_normal` VALUES (6, 6, 'ด่วนที่สุด', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', '', '', '2023-12-16 00:41:35', NULL);
INSERT INTO `doc_normal` VALUES (7, 7, 'ด่วนที่สุด', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-16 00:41:47', 'ลบ');
INSERT INTO `doc_normal` VALUES (10, 8, 'ปกติ', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-17 14:10:00', NULL);
INSERT INTO `doc_normal` VALUES (11, 9, 'ด่วนมาก', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-17 14:10:50', NULL);
INSERT INTO `doc_normal` VALUES (12, 10, 'ด่วนมาก', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-17 14:12:26', 'ลบ');
INSERT INTO `doc_normal` VALUES (13, 11, 'ด่วนมาก', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-17 14:16:57', NULL);
INSERT INTO `doc_normal` VALUES (14, 12, 'ด่วนมาก', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-17 14:17:01', 'ลบ');
INSERT INTO `doc_normal` VALUES (15, 13, 'ด่วนมาก', 'หนังสือประทับตรา', 'สนผ.กห.', 'ตอบกลับทดสอบระบบ', 'กทด.สนผ.กห.', 'ผอ.สนผ.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', '', '2023-12-17 14:17:16', NULL);
INSERT INTO `doc_normal` VALUES (16, 14, 'ด่วน', 'หนังสือประทับตรา', 'กทด.สนผ.กห1', 'ขอส่งระบบออกเลขลับ1', 'สนผ.กห.1', 'พ.อ.นิธิ', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'ตรวจสอบการทำงานของ1', '2023-12-18 08:51:34', NULL);
INSERT INTO `doc_normal` VALUES (17, 15, 'ด่วน', 'หนังสือประทับตรา', 'aa', 'bbb', 'ccc', 'ddd', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'aaaa', '2023-12-18 19:58:51', NULL);
INSERT INTO `doc_normal` VALUES (18, 16, 'ด่วน', 'หนังสือประทับตรา', 'aaaaa', 'bbbbb', 'cccccc', 'ddddd', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'gggggg', '2023-12-18 20:06:50', NULL);

-- ----------------------------
-- Table structure for doc_secret1
-- ----------------------------
DROP TABLE IF EXISTS `doc_secret1`;
CREATE TABLE `doc_secret1`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_doc` int NULL DEFAULT NULL COMMENT 'ออกเลขที่',
  `urgent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ชั้นความเร็ว ด่วน, ด่วนมาก, ด่วนที่สุด',
  `type_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ประเภทหนังสือ ',
  `from_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'จากหน่วยงานออก',
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'เรื่อง',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ตำแหน่ง',
  `to_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ถึงหน่วยงานที่รับ',
  `signer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ลงนาม',
  `requester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ขอ',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'หมายเหตุ',
  `create_date` datetime NULL DEFAULT NULL COMMENT 'วันที่ออกเลข',
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'สถานะการลบ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doc_secret1
-- ----------------------------
INSERT INTO `doc_secret1` VALUES (1, 1, 'ด่วน', 'บันทึกข้อความ', 'สนผ.กห.2', 'ตรวจสอบอาวุธปืน2', 'เสมียนแผนกพัฒนาระบบ', 'กทด.สนผ.กห.2', 'ผช.ผอ.สนผ.กห.2', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ', '2023-12-16 00:45:33', 'ลบ');
INSERT INTO `doc_secret1` VALUES (4, 2, 'ปกติ', 'บันทึกข้อความ', 'สนผ.กห.', 'ไม่มีเรื่อง', 'เสมียนแผนกพัฒนาระบบ', 'กอซ.สนผ.กห.', 'ผอ.กอซ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์,เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล,อื่นๆ,aabbcc', '2023-12-17 22:06:50', NULL);
INSERT INTO `doc_secret1` VALUES (7, 3, 'ปกติ', 'บันทึกข้อความ', 'สนผ.กห.', 'ไม่มีเรื่อง', 'เสมียนแผนกพัฒนาระบบ', 'กอซ.สนผ.กห.', 'ผอ.กอซ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์,ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์,เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล,อื่นๆ,aabbcc', '2023-12-17 22:08:09', NULL);
INSERT INTO `doc_secret1` VALUES (8, 4, 'ปกติ', 'บันทึกข้อความ', 'สนผ.กห.', 'ไม่มีเรื่อง', 'เสมียนแผนกพัฒนาระบบ', 'กอซ.สนผ.กห.', 'ผอ.กอซ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ', '2023-12-17 22:08:14', NULL);
INSERT INTO `doc_secret1` VALUES (9, 5, 'ด่วน', 'หนังสือประทับตรา', 'สนผ.กห.', 'ไม่มีเรื่อง', 'เสมียนแผนกพัฒนาระบบ', 'กอซ.สนผ.กห.', 'ผอ.กอซ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,อื่นๆ,abcd', '2023-12-17 22:08:31', 'ลบ');
INSERT INTO `doc_secret1` VALUES (10, 6, 'ปกติ', 'บันทึกข้อความ', 'หน่วยต้นเรื่อง', 'เรื่อง', 'เสมียนแผนกพัฒนาระบบ', 'คำขึ้นต้น/หน่วยรับ', 'ผู้ลงนาม', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,อื่นๆ,cccc', '2023-12-17 22:19:48', 'ลบ');
INSERT INTO `doc_secret1` VALUES (11, 7, 'ด่วนมาก', 'กระดาษเขียนข่าว', 'สนผ.กห.', 'ทดสอบเรื่อง', 'ไม่มีตำแหน่ง', 'กทด.สนผ.กห.', 'ผอ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,อื่นๆ,cccc', '2023-12-18 10:15:33', NULL);
INSERT INTO `doc_secret1` VALUES (12, 8, 'ด่วน', 'บันทึกข้อความ', 'กทด.สนผ.กห.', 'ทดสอบระบบออกเลขที่หนังสือ', 'รอง ผอ.กทด.สนผ.กห.', 'กลาง.สนผ.กห.', 'ผอ.กทด.สนผ.กห.', 'นายอาวีสร รอดจันทร์', 'กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,อื่นๆ,cccc', '2023-12-18 11:43:01', NULL);
INSERT INTO `doc_secret1` VALUES (13, 9, 'ด่วน', 'หนังสือประทับตรา', 'aaaa', 'fff', 'เสมียนแผนกพัฒนาระบบ', 'aaa', 'ffff', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,อื่นๆ,cccc', '2023-12-18 19:59:58', 'ลบ');
INSERT INTO `doc_secret1` VALUES (14, 10, 'ด่วน', 'หนังสือประทับตรา', 'aaaa', 'fff', 'เสมียนแผนกพัฒนาระบบ', 'aaa', 'ffff', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,อื่นๆ,cccc', '2023-12-18 20:02:27', NULL);
INSERT INTO `doc_secret1` VALUES (15, 11, 'ด่วนมาก', 'กระดาษเขียนข่าว', 'aaaaa', 'bbbbb', 'เสมียนแผนกพัฒนาระบบ', 'nnnnn', 'nnnnnnaaaa', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ,อื่นๆ,aaaaabbb', '2023-12-18 20:06:25', NULL);
INSERT INTO `doc_secret1` VALUES (16, 12, 'ด่วนมาก', 'หนังสือประทับตรา', 'aaaa', 'ddddd', 'เสมียนแผนกพัฒนาระบบ', 'aaaa', 'ddd', 'นายอาวีสร รอดจันทร์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ,อื่นๆ,abc', '2023-12-19 09:27:11', NULL);
INSERT INTO `doc_secret1` VALUES (17, 13, 'ด่วนมาก', 'หนังสือประทับตรา', 'aaaaa', 'dddddd', 'พนักงานราชการ', 'aa', 'dddd', 'นายอาวีสร รอดจันทร์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ,อื่นๆ,', '2023-12-19 09:45:43', NULL);

-- ----------------------------
-- Table structure for doc_secret2
-- ----------------------------
DROP TABLE IF EXISTS `doc_secret2`;
CREATE TABLE `doc_secret2`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_doc` int NULL DEFAULT NULL COMMENT 'ออกเลขที่',
  `urgent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ชั้นความเร็ว ด่วน, ด่วนมาก, ด่วนที่สุด',
  `type_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ประเภทหนังสือ ',
  `from_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'จากหน่วยงานออก',
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'เรื่อง',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ตำแหน่ง',
  `to_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ถึงหน่วยงานที่รับ',
  `signer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ลงนาม',
  `requester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ขอ',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'หมายเหตุ',
  `create_date` datetime NULL DEFAULT NULL COMMENT 'วันที่ออกเลข',
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'สถานะการลบ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doc_secret2
-- ----------------------------
INSERT INTO `doc_secret2` VALUES (1, 1, 'ด่วนที่สุด', 'หนังสือประทับตรา', 'สนผ.กห.2', 'ของส่งแผนการปฏิบัติงานของ สนผ.กห.2', 'เสมียนแผนกพัฒนาระบบ', 'สภากลาโหม2', 'ผอ.สนผ.กห.2', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง', '2023-12-16 00:52:04', '');
INSERT INTO `doc_secret2` VALUES (2, 2, 'ด่วน', 'หนังสือประทับตรา', 'aaaaa', 'bbbbbb', 'เสมียนแผนกพัฒนาระบบ', 'aaa', 'ccc', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์,อื่นๆ,abc', '2023-12-18 20:07:36', 'ลบ');
INSERT INTO `doc_secret2` VALUES (3, 3, 'ปกติ', 'บันทึกข้อความ', 'aaaa', 'bbbbb', 'เสมียนแผนกพัฒนาระบบ', 'aaaa', 'ddd', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................)', '2023-12-18 20:29:06', NULL);

-- ----------------------------
-- Table structure for doc_secret3
-- ----------------------------
DROP TABLE IF EXISTS `doc_secret3`;
CREATE TABLE `doc_secret3`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_doc` int NULL DEFAULT NULL COMMENT 'ออกเลขที่',
  `urgent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ชั้นความเร็ว ด่วน, ด่วนมาก, ด่วนที่สุด',
  `type_doc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ประเภทหนังสือ ',
  `from_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'จากหน่วยงานออก',
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'เรื่อง',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ตำแหน่ง',
  `to_dep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ถึงหน่วยงานที่รับ',
  `signer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ลงนาม',
  `requester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'ผู้ขอ',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'หมายเหตุ',
  `create_date` datetime NULL DEFAULT NULL COMMENT 'วันที่ออกเลข',
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'สถานะการลบ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doc_secret3
-- ----------------------------
INSERT INTO `doc_secret3` VALUES (1, 1, 'ด่วนมาก', 'กระดาษเขียนข่าว', 'สนผ.กห.', 'แจ้งเตือนผู้กระทำความผิด', 'เสมียนแผนกพัฒนาระบบ', 'กทด.สนผ.กห.', 'ผช.ผอ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................),อื่นๆ,aaadf', '2023-12-16 00:49:30', NULL);
INSERT INTO `doc_secret3` VALUES (2, 2, 'ด่วนมาก', 'กระดาษเขียนข่าว', 'สนผ.กห.', 'แจ้งเตือนผู้กระทำความผิด', 'เสมียนแผนกพัฒนาระบบ', 'กทด.สนผ.กห.', 'ผช.ผอ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ,กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง,กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์,อื่นๆ,aaadf', '2023-12-18 11:11:37', 'ลบ');
INSERT INTO `doc_secret3` VALUES (3, 3, 'ด่วนมาก', 'กระดาษเขียนข่าว', 'สนผ.กห.', 'แจ้งเตือนผู้กระทำความผิด', 'เสมียนแผนกพัฒนาระบบ', 'กทด.สนผ.กห.', 'ผช.ผอ.สนผ.กห.', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อความสัมพันธ์ระหว่างประเทศ,กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์,ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์', '2023-12-18 11:12:50', 'ลบ');
INSERT INTO `doc_secret3` VALUES (4, 4, 'ด่วนที่สุด', 'หนังสือประทับตรา', 'aa', 'cc', 'เสมียนแผนกพัฒนาระบบ', 'dddd', 'ax', 'ส.ต.ภูพริษฐ์ เมธาพัฒนบูรณ์', 'กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์,ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์,เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล', '2023-12-18 20:29:29', NULL);

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES (1, '815027');
INSERT INTO `test` VALUES (2, '948807');
INSERT INTO `test` VALUES (3, '153169');
INSERT INTO `test` VALUES (4, '318028');
INSERT INTO `test` VALUES (5, '947115');
INSERT INTO `test` VALUES (6, '776136');
INSERT INTO `test` VALUES (7, '745453');
INSERT INTO `test` VALUES (8, '283011');
INSERT INTO `test` VALUES (9, '301967');
INSERT INTO `test` VALUES (10, '631782');
INSERT INTO `test` VALUES (11, '724447');
INSERT INTO `test` VALUES (12, '96046');
INSERT INTO `test` VALUES (13, '654863');
INSERT INTO `test` VALUES (14, '191136');
INSERT INTO `test` VALUES (15, '504931');
INSERT INTO `test` VALUES (16, '114643');
INSERT INTO `test` VALUES (17, '123943');
INSERT INTO `test` VALUES (18, '122417');
INSERT INTO `test` VALUES (19, '85344');
INSERT INTO `test` VALUES (20, '379736');
INSERT INTO `test` VALUES (21, '825834');
INSERT INTO `test` VALUES (22, '704156');
INSERT INTO `test` VALUES (23, '563552');
INSERT INTO `test` VALUES (24, '872001');
INSERT INTO `test` VALUES (25, '769726');
INSERT INTO `test` VALUES (26, '32916');
INSERT INTO `test` VALUES (27, '458097');
INSERT INTO `test` VALUES (28, '430986');
INSERT INTO `test` VALUES (29, '321115');
INSERT INTO `test` VALUES (30, '453262');
INSERT INTO `test` VALUES (31, '557950');
INSERT INTO `test` VALUES (32, '796234');
INSERT INTO `test` VALUES (33, '157410');
INSERT INTO `test` VALUES (34, '454137');
INSERT INTO `test` VALUES (35, '57154');
INSERT INTO `test` VALUES (36, '238055');
INSERT INTO `test` VALUES (37, '356837');
INSERT INTO `test` VALUES (38, '780348');
INSERT INTO `test` VALUES (39, '945216');
INSERT INTO `test` VALUES (40, '339734');
INSERT INTO `test` VALUES (41, '798757');
INSERT INTO `test` VALUES (42, '160999');
INSERT INTO `test` VALUES (43, '272950');
INSERT INTO `test` VALUES (44, '517850');
INSERT INTO `test` VALUES (45, '596595');
INSERT INTO `test` VALUES (46, '630425');
INSERT INTO `test` VALUES (47, '367540');
INSERT INTO `test` VALUES (48, '670024');
INSERT INTO `test` VALUES (49, '114136');
INSERT INTO `test` VALUES (50, '323726');
INSERT INTO `test` VALUES (51, '502374');
INSERT INTO `test` VALUES (52, '502253');
INSERT INTO `test` VALUES (53, '288971');
INSERT INTO `test` VALUES (54, '746971');
INSERT INTO `test` VALUES (55, '528757');
INSERT INTO `test` VALUES (56, '903146');
INSERT INTO `test` VALUES (57, '937368');
INSERT INTO `test` VALUES (58, '512408');
INSERT INTO `test` VALUES (59, '431744');
INSERT INTO `test` VALUES (60, '479239');
INSERT INTO `test` VALUES (61, '751952');
INSERT INTO `test` VALUES (62, '334435');
INSERT INTO `test` VALUES (63, '171899');
INSERT INTO `test` VALUES (64, '911123');
INSERT INTO `test` VALUES (65, '237741');
INSERT INTO `test` VALUES (66, '921984');
INSERT INTO `test` VALUES (67, '947337');
INSERT INTO `test` VALUES (68, '690974');
INSERT INTO `test` VALUES (69, '760213');
INSERT INTO `test` VALUES (70, '452137');
INSERT INTO `test` VALUES (71, '66353');
INSERT INTO `test` VALUES (72, '612772');
INSERT INTO `test` VALUES (73, '881959');
INSERT INTO `test` VALUES (74, '999173');
INSERT INTO `test` VALUES (75, '835593');
INSERT INTO `test` VALUES (76, '182608');
INSERT INTO `test` VALUES (77, '577865');
INSERT INTO `test` VALUES (78, '421263');
INSERT INTO `test` VALUES (79, '281023');
INSERT INTO `test` VALUES (80, '49758');
INSERT INTO `test` VALUES (81, '241705');
INSERT INTO `test` VALUES (82, '392656');
INSERT INTO `test` VALUES (83, '805486');
INSERT INTO `test` VALUES (84, '836788');
INSERT INTO `test` VALUES (85, '836477');
INSERT INTO `test` VALUES (86, '289285');
INSERT INTO `test` VALUES (87, '819644');
INSERT INTO `test` VALUES (88, '953463');
INSERT INTO `test` VALUES (89, '729743');
INSERT INTO `test` VALUES (90, '995966');
INSERT INTO `test` VALUES (91, '500991');
INSERT INTO `test` VALUES (92, '988798');
INSERT INTO `test` VALUES (93, '891623');
INSERT INTO `test` VALUES (94, '556815');
INSERT INTO `test` VALUES (95, '314935');
INSERT INTO `test` VALUES (96, '165785');
INSERT INTO `test` VALUES (97, '27858');
INSERT INTO `test` VALUES (98, '591625');
INSERT INTO `test` VALUES (99, '306451');
INSERT INTO `test` VALUES (100, '390686');

SET FOREIGN_KEY_CHECKS = 1;
