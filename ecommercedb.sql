/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : ecommercedb

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2016-09-22 14:26:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ecm_bank`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_bank`;
CREATE TABLE `ecm_bank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_no` int(11) NOT NULL,
  `initial_balance` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_bank
-- ----------------------------
INSERT INTO `ecm_bank` VALUES ('1', 'Pagac, Lockman and Huels', 'Troytown', '2196329', '200', 'Active', '1', '1', '1', '2016-09-09 17:55:42', '2016-09-09 17:55:42');
INSERT INTO `ecm_bank` VALUES ('2', 'Kirlin, Homenick and Harris', 'South Lorenzborough', '1964911', '150', 'Active', '1', '1', '1', '2016-09-09 17:55:29', '2016-09-09 17:55:29');
INSERT INTO `ecm_bank` VALUES ('3', 'Bailey, Wisozk and Mraz', 'West Brady', '1533329', '500', 'Active', '1', '1', '1', '2016-09-09 17:55:16', '2016-09-09 17:55:16');
INSERT INTO `ecm_bank` VALUES ('4', 'Luettgen Ltd', 'West Terenceville', '2371272', '300', 'Active', '1', '1', '1', '2016-09-09 17:54:59', '2016-09-09 17:54:59');
INSERT INTO `ecm_bank` VALUES ('5', 'Olson LLC', 'North Chynatown', '1573230', '250', 'Active', '1', '1', '1', '2016-09-09 17:54:50', '2016-09-09 17:54:50');

-- ----------------------------
-- Table structure for `ecm_branch`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_branch`;
CREATE TABLE `ecm_branch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_location` varchar(255) DEFAULT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `branch_admin` varchar(250) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_branch
-- ----------------------------
INSERT INTO `ecm_branch` VALUES ('1', 'Lebsack Group', 'Pansyshire', '065 Schuster Ridges\nHirtheborough, MH 54030', 'Rigoberto', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('2', 'Pfannerstill-Hessel', 'Tysonfort', '800 Joan Lodge\nOrnstad, CA 20665-8225', 'Asia', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('3', 'Koepp, Wolff and Schaefer', 'Bettyemouth', '214 Arnaldo Valleys Apt. 659\nFunkhaven, GU 39929', 'Monty', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('4', 'Ritchie, Kulas and Kemmer', 'New Chaunceyside', '546 Vandervort Underpass Apt. 727\nAmyfurt, PW 51007-3462', 'Raquel', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('5', 'Bogan Group', 'New Shad', '36194 Franecki Bridge Apt. 789\nMohrville, MO 33025', 'Monserrate', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('6', 'Hegmann, Orn and Legros', 'North Daron', '652 Graham Pines\nNorth Lottie, ID 67438', 'Duane', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('7', 'Greenholt-Sporer', 'New Margarete', '203 Ledner Square\nDaytonmouth, MS 24236', 'Morris', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('8', 'O\'Conner-Beier', 'East Kacey', '2357 Balistreri Roads Apt. 142\nIzaiahbury, NV 45305-5987', 'Kenna', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('9', 'Quigley, Barrows and Lang', 'Mullerton', '013 Rolfson Manors\nLake Euna, VI 84896', 'Ines', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('10', 'Dach-Jacobi', 'New Maraton', '15412 Elmo Cape Suite 837\nNew Nolan, HI 20195-4110', 'Garfield', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('11', 'Schmitt LLC', 'Port Modesta', '267 Kunde Knolls Suite 972\nJerryhaven, IN 73642-9034', 'Curt', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('12', 'Ortiz-Bogisich', 'North Birdieville', '5970 Lukas Lights Suite 669\nWeissnatside, FM 22598-9147', 'Victoria', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('13', 'Abbott-Zieme', 'South Angelinestad', '30058 Cremin Roads Suite 174\nEast Stoneburgh, CT 91173', 'Oleta', 'Active', '1', '1', '2016-09-07 16:53:51', '2016-09-07 16:53:51');
INSERT INTO `ecm_branch` VALUES ('14', 'Fisher, Huels and Mayert', 'Hahnmouth', '19314 Jeramie Mews\nEast Lysanne, MO 73269', 'Mckenna', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('15', 'Crist, Gislason and Pollich', 'North Briana', '5624 Steuber Causeway\nShieldsmouth, SD 91335', 'Prudence', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('16', 'Maggio Ltd', 'South Dellmouth', '260 Gleason Extensions Apt. 047\nSteuberfurt, TX 07920-1094', 'Arne', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('17', 'Pfeffer-Ritchie', 'West Gardnerland', '29017 Heidenreich Green\nHadleyview, FL 93024-5411', 'Melvina', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('18', 'Pollich, Marks and Hintz', 'Lake Tylerfort', '8882 Wilderman Motorway\nNorth Teagan, CO 22460', 'Armand', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('19', 'Heller Ltd', 'East Evie', '3843 Bahringer Harbor\nPort Terrellside, WY 57778', 'Jaren', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('20', 'Huel, Osinski and Brekke', 'East Julia', '1424 Reginald Street Apt. 910\nOrnberg, NM 70207', 'Marlene', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('21', 'Welch, Lemke and Swaniawski', 'West Faustinoburgh', '995 Schultz Point Suite 013\nHoppemouth, PA 66630-5150', 'Agnes', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('22', 'Rau-Schneider', 'Port Mayburgh', '1619 Deontae Avenue\nConroyland, IL 16962', 'Carmine', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('23', 'Borer, Swaniawski and Shanahan', 'Elouiseside', '8044 Brenden Station Apt. 647\nJohnstonland, NH 51794', 'Leonor', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('24', 'Prosacco PLC', 'East Kadeland', '90432 Clinton Springs\nHeathcotechester, AE 66774-4984', 'Jaydon', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('25', 'Wuckert and Sons', 'South Maurineton', '9731 Dexter Greens Suite 316\nNorth Gonzalo, OH 57472-6554', 'Kylie', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('26', 'Nitzsche Ltd', 'West Jayceside', '0413 Hoppe Causeway\nWest Keonhaven, GA 79432-5769', 'Gabe', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('27', 'Gorczany, O\'Keefe and Boehm', 'Lake Mosesstad', '6955 Vicenta Falls Apt. 263\nSchmelerview, NM 24856-9024', 'Elian', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('28', 'Bahringer-Rice', 'Ornborough', '29823 Erdman Heights\nWolffort, CT 22667-0604', 'Kobe', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('29', 'Kautzer and Sons', 'North Sheila', '53087 Nicklaus Courts\nWest Ashton, AZ 08068-8611', 'Will', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('30', 'Abbott-Hand', 'New Rosalia', '5407 Conn Avenue Suite 077\nDickimouth, AK 05235-3015', 'Camden', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('31', 'Fritsch-Fadel', 'Port Vivianne', '55984 Kozey Oval Apt. 422\nKailynchester, ME 71753', 'Imogene', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('32', 'Jewess and Sons', 'Hanschester', '05303 McClure Ports Suite 140\nLinwoodport, ND 77815-3414', 'Rosalyn', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('33', 'McLaughlin, Shanahan and Herman', 'Lempifurt', '174 Lew Stream\nPort Freddie, KY 07680', 'Pedro', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('34', 'Fritsch Group', 'Port Karolannborough', '7170 Jaycee Fork\nStiedemannstad, VT 51483', 'Ruben', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('35', 'Williamson Group', 'Lake Efrenview', '558 Hand Extensions\nSofiashire, TX 91697-3905', 'Kaylee', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('36', 'Jenkins and Sons', 'Buckridgemouth', '485 D\'Amore Alley Apt. 475\nBeierbury, UT 22809', 'Johnnie', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('37', 'Hansen, Williamson and Greenholt', 'South Fanny', '72315 Weissnat Place Apt. 898\nRodriguezview, RI 97828-3327', 'Maia', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('38', 'Cummerata-Schmitt', 'Bartellhaven', '7540 Prohaska Circles Apt. 470\nStromanview, GA 14387-8801', 'Gustave', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('39', 'Jakubowski, Robel and Brekke', 'North Halchester', '7943 Reichel Run\nPort Trever, UT 14870', 'Vidal', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('40', 'Metz-Gaylord', 'Walterburgh', '35060 Pouros Track\nPort Rogerfort, VA 11346-7405', 'Lucie', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('41', 'Emard-Sporer', 'Arnulfomouth', '57943 Duncan Bridge\nFelipaton, TX 72133-8981', 'Jennie', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('42', 'Barton Ltd', 'Daughertyfort', '9231 Myrtle Spurs Apt. 536\nLake Lisandroside, OR 81136', 'Angela', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('43', 'Turcotte-Dickinson', 'Mrazfort', '186 Dan Forest Apt. 642\nO\'Konborough, NM 10428', 'Cathryn', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('44', 'Schroeder-Homenick', 'Keelingborough', '07256 Jast Cove\nWest Vedahaven, OK 56171', 'Adriel', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('45', 'Wunsch, Roob and Erdman', 'Olashire', '02535 Dietrich Courts\nNew Alysafurt, WA 03999-0074', 'Javier', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('46', 'Lemke-Bahringer', 'Lake Bernard', '5169 Citlalli Overpass Suite 533\nTodville, AP 14847', 'Aric', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('47', 'Greenholt PLC', 'New Theron', '2709 Webster Passage\nWest Fannieville, HI 75888-0073', 'Forest', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('48', 'Robel-Wisoky', 'Handtown', '00036 Lila Forges Apt. 650\nBotsfordland, HI 83646', 'Dallin', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('49', 'Simonis, Ruecker and Goodwin', 'Schneiderhaven', '2353 Bednar Circle Suite 645\nKadinstad, MS 15180-4053', 'Oliver', 'Active', '1', '1', '2016-09-07 16:53:52', '2016-09-07 16:53:52');
INSERT INTO `ecm_branch` VALUES ('50', 'Runte-Mueller', 'Murrayville', '8738 Schmitt CircleMortimerfurt, LA 11507-8520', 'Halle', 'Active', '1', '1', '0000-00-00 00:00:00', '2016-09-07 16:54:22');

-- ----------------------------
-- Table structure for `ecm_customer`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_customer`;
CREATE TABLE `ecm_customer` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `contact_person` varchar(250) NOT NULL,
  `landline_no` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `ntn_no` varchar(250) NOT NULL,
  `initial_balance` int(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_customer
-- ----------------------------
INSERT INTO `ecm_customer` VALUES ('1', 'Miss Aliza Sporer DDS', 'Jackeline Becker', '353.379.5248x98441', '942-118-8337', 'csauer@smith.com', '782951', '446313', '2000', 'Active', '1', '1', '1', '2016-09-11 17:00:02', '2016-09-11 17:00:02');
INSERT INTO `ecm_customer` VALUES ('2', 'Justina Schroeder', 'Mr. Orrin Kautzer I', '1-239-252-6099x945', '611-746-7441x118', 'kohler.devyn@hotmail.com', '6293208', '9338451', '1000', 'Active', '1', '1', '1', '2016-09-11 17:00:17', '2016-09-11 17:00:17');
INSERT INTO `ecm_customer` VALUES ('3', 'Hillary Grant', 'Jordi Daniel', '(076)085-6396x37632', '368.434.5695x97655', 'goodwin.leola@gmail.com', '8739253', '929308', '500', 'Active', '1', '1', '1', '2016-09-11 17:00:29', '2016-09-11 17:00:29');
INSERT INTO `ecm_customer` VALUES ('4', 'Wilmer Davis', 'Antonietta Cruickshank', '(225)731-8295', '1-895-165-4291x05296', 'rhianna19@gmail.com', '3949362', '7158271', '1500', 'Active', '1', '1', '1', '2016-09-11 17:00:39', '2016-09-11 17:00:39');
INSERT INTO `ecm_customer` VALUES ('5', 'Nyasia Stanton', 'Laverna Heidenreich', '093-749-3612', '(856)033-7960x8713', 'skyla.mills@brekke.net', '6730064', '996998', '2500', 'Active', '1', '1', '1', '2016-09-11 17:00:50', '2016-09-11 17:00:50');
INSERT INTO `ecm_customer` VALUES ('6', 'Lora Carroll', 'Brant Abshire', '938.290.0541', '(787)886-6739x6991', 'baylee66@hotmail.com', '6013038', '8889254', '6616013', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('7', 'Mrs. Mae Tromp PhD', 'Misael Ferry', '160.527.9509x91510', '+32(7)8920136148', 'itzel22@hotmail.com', '7338076', '5015181', '3627245', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('8', 'Yvette Gusikowski', 'Ella Frami', '614.008.2043', '1-136-676-3467x0157', 'savanna34@gmail.com', '9557540', '7356886', '4076909', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('9', 'Remington Schuppe', 'Maddison Crona', '126-903-0105', '564-056-8601x99595', 'zabernathy@hotmail.com', '5079344', '2534869', '9041870', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('10', 'Jacey Waters', 'Arch Dickinson', '01775453891', '377.341.2441', 'von.ivah@bayerreichel.org', '3716211', '7547553', '8778273', 'Active', '1', '1', '1', '2016-09-18 16:06:39', '2016-09-18 16:06:39');
INSERT INTO `ecm_customer` VALUES ('11', 'Kelvin Hilpert', 'Mr. Golda Kunze', '01447202759', '933.808.4643x1791', 'hankunding@gmail.com', '5374100', '4574853', '9257837', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('12', 'Ken Barrows DVM', 'Miss Lemuel Johnston', '(906)439-2635x577', '+45(6)3936341852', 'kip45@schaefer.com', '2169037', '7337601', '376196', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('13', 'Camron Ondricka', 'Eleonore Connelly', '(467)882-4508', '06340444407', 'dariana.lueilwitz@barrows.biz', '2799394', '9696206', '8010802', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('14', 'Mrs. Lexie Braun I', 'Jovan Hayes DVM', '225-036-1986x3756', '953.986.9661', 'pearline86@turcotte.com', '8175612', '1650261', '6859429', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('15', 'Dr. Jeramie Crooks', 'Mrs. Sebastian Anderson I', '(661)735-7045x99884', '937-229-0172x098', 'kamron12@stracke.org', '2275117', '1277243', '2692924', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('16', 'Boyd Pollich', 'Miss Elyssa Abshire', '126.260.0424', '848.491.7849', 'rickie66@hotmail.com', '2371875', '4234032', '5283191', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('17', 'Maria Dibbert Jr.', 'Domingo Littel', '(256)339-6692x6086', '07529548124', 'hzboncak@gmail.com', '8995017', '5266599', '3177697', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('18', 'Garrick Runolfsson', 'Miss Tito Zemlak MD', '669.496.4033x958', '015.930.4738x8357', 'johnny.hilll@yahoo.com', '4605631', '4530389', '8541709', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('19', 'Kamryn Mills', 'Amani Kutch', '1-962-874-3727', '771-873-2471', 'ssatterfield@gmail.com', '7739731', '5436776', '8005669', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('20', 'Mrs. Freeman Prosacco', 'Juanita Tremblay', '206-353-7719', '1-854-026-3959', 'ngerhold@gmail.com', '9545915', '7460673', '5164383', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('21', 'Virginie Schowalter', 'Ellen Braun DDS', '+18(2)5948767886', '905-483-0361', 'gschaden@runolfsdottir.com', '6557208', '4633184', '7770810', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('22', 'Walter Armstrong', 'Luis Shanahan', '+25(5)9145637674', '+57(9)8328993667', 'russel.roberto@pacocha.info', '9372108', '2970481', '887284', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('23', 'Mr. Jules Mante PhD', 'Allison Becker', '1-522-109-7458x1847', '(733)920-7295x034', 'hhayes@yahoo.com', '9220690', '1950505', '2491376', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('24', 'Dr. Cyrus O\'Reilly', 'Wallace Koss', '(608)538-4130', '07736383692', 'fmonahan@lebsack.com', '4729599', '8689934', '2428306', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('25', 'Nestor Cruickshank', 'Karina Kozey', '250.372.7253x39187', '450.422.0468x08629', 'brown.abelardo@cruickshankhand.biz', '4985044', '2601896', '4360779', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('26', 'Zetta Carter', 'Mr. Horace Kautzer', '085-438-3770', '+93(0)3711897934', 'breichert@sanford.biz', '5958879', '4804690', '4661694', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('27', 'Eulalia Kozey', 'Miss Cheyanne Wiza Sr.', '1-685-681-8907', '071.596.6777', 'dwunsch@hahn.com', '4385307', '7203403', '4838550', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('28', 'Anika Bauch', 'Dr. Alia Bashirian', '(296)442-1752x234', '+23(2)0867403348', 'nreichert@wisozk.com', '7703237', '1005633', '7218528', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('29', 'Alphonso Jast', 'Emily Bosco', '385.671.3619', '02445195494', 'dicki.enoch@kirlinabshire.com', '8276637', '7572494', '1011553', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('30', 'Jodie McDermott', 'Vicenta Lowe', '(892)570-6606x202', '1-165-966-9066x05219', 'goyette.jany@gmail.com', '9009611', '3402796', '256445', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('31', 'Mr. Garnet Collier V', 'Elton Wyman', '998-905-4604', '344-158-6537', 'ruecker.katelyn@pacochakrajcik.info', '7848423', '2927619', '2887835', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('32', 'Kailee Medhurst', 'Tony Fritsch', '(800)067-1284x9508', '(747)899-0099x37591', 'mayer.agustina@walshschneider.com', '5283607', '9329591', '4665170', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('33', 'Mrs. Elody O\'Conner', 'Pablo Cremin IV', '332.811.2514x893', '973.830.8755', 'thaddeus.robel@walsh.com', '2097718', '9686511', '2556748', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('34', 'Keely Ebert Jr.', 'Ms. Claude Paucek MD', '188.506.3231x20337', '(616)711-9837x070', 'mante.lavern@howell.net', '8707963', '8798864', '3606046', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('35', 'Cristopher Mills', 'Antonia Howell', '1-840-195-4969x6244', '344.502.5535x7594', 'ottilie.keebler@gmail.com', '1557524', '6463149', '4665448', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('36', 'Ms. Xavier Stiedemann', 'Mrs. Oceane Bernhard', '418.543.6488x370', '532-751-3915x246', 'kenneth83@miller.biz', '6933766', '9908942', '4384998', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('37', 'Princess Schneider V', 'Americo Abshire', '555-775-5837x332', '012-581-9826x5702', 'royal.hahn@deckow.info', '4355205', '9783803', '7375893', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('38', 'Mr. Rod Grimes IV', 'Lauretta Zieme', '096.925.4978', '(940)582-3050', 'thea70@gmail.com', '7596583', '1575828', '4981328', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('39', 'Giovani Schroeder', 'Randall Bradtke', '698-542-8075', '625-120-4894x697', 'horacio.koepp@hackett.com', '9210050', '6793627', '5839866', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('40', 'Madisen Ullrich I', 'Mrs. Rosalind Littel III', '+95(2)7782197158', '04064288271', 'wbrekke@dickismitham.com', '98367', '4323603', '2915297', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('41', 'Arjun Hickle', 'Mariah Hettinger Jr.', '712-380-3778x04722', '(290)783-5630x1980', 'lbednar@yahoo.com', '1225546', '8544829', '6194444', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('42', 'Dr. Matilda Bednar', 'Krystel Waelchi', '1-746-479-0216', '1-362-892-9421x275', 'levi80@farrell.com', '6969045', '8294618', '2537007', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('43', 'Danial Kuhn', 'Nadia Lang', '607-535-0076x9597', '451.803.3564x75410', 'eichmann.makayla@yahoo.com', '3767158', '9017095', '9703167', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('44', 'Micaela Sauer IV', 'Nat Franecki', '292.835.7197x428', '+91(9)2343848743', 'anabel.huel@schaeferdicki.com', '516865', '840189', '9603126', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('45', 'Markus Kilback', 'Tyrique Bashirian', '08263902488', '+93(6)2423337653', 'go\'connell@gorczany.com', '3473839', '1944163', '6238253', 'Active', '1', '1', '1', '2016-09-07 16:20:59', '2016-09-07 16:20:59');
INSERT INTO `ecm_customer` VALUES ('46', 'Stacy Fritsch', 'Ms. Rory Kilback Jr.', '862.981.7080x8463', '672.133.9734x2145', 'jaquan.haag@kuhlman.com', '7182712', '6288038', '1500', 'Active', '1', '1', '1', '2016-09-21 14:37:13', '2016-09-21 14:37:13');
INSERT INTO `ecm_customer` VALUES ('47', 'Tommie Lind', 'Dr. Annetta Schneider III', '+06(6)2654355038', '599-889-7756', 'lakin.devante@yahoo.com', '9043747', '7380170', '1200', 'Active', '1', '1', '1', '2016-09-21 14:37:03', '2016-09-21 14:37:03');
INSERT INTO `ecm_customer` VALUES ('48', 'Miss Lea Pollich', 'Dr. Fatima Nitzsche', '196.524.6711x908', '1-718-021-7977', 'chadd.ernser@gmail.com', '8822955', '8926777', '1500', 'Active', '1', '1', '1', '2016-09-21 14:36:48', '2016-09-21 14:36:48');
INSERT INTO `ecm_customer` VALUES ('49', 'Ayla Cassin Sr.', 'Isac Schamberger', '00298945911', '1-810-299-1816x8975', 'wyatt04@beer.com', '1825366', '3331177', '3000', 'Active', '1', '1', '1', '2016-09-21 14:26:14', '2016-09-21 14:26:14');
INSERT INTO `ecm_customer` VALUES ('50', 'Juliet Stokes', 'Chelsie Pfannerstill', '1-579-809-7118x9760', '076-310-1763x5946', 'jillian.auer@carrollschaden.com', '7215100', '6801323', '2500', 'Active', '1', '1', '1', '2016-09-21 14:36:05', '2016-09-21 14:36:05');

-- ----------------------------
-- Table structure for `ecm_item`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_item`;
CREATE TABLE `ecm_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_sale` int(11) NOT NULL,
  `price_cost` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `max_quantity` int(11) NOT NULL,
  `initial_quantity` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_item
-- ----------------------------
INSERT INTO `ecm_item` VALUES ('1', '2', 'Albina', '1675', '1535', '31766', '18', '191', '18', 'Active', '1', '1', '1', '0000-00-00 00:00:00', '2016-09-07 16:55:08');
INSERT INTO `ecm_item` VALUES ('2', '24', 'Adele', '1195', '1088', '33297', '1', '264', '1', 'Active', '1', '1', '1', '0000-00-00 00:00:00', '2016-09-07 16:31:30');
INSERT INTO `ecm_item` VALUES ('3', '30', 'Nathen', '922', '820', '34663', '64', '266', '3', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('4', '4', 'Isabell', '1385', '1315', '34800', '19', '204', '33', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('5', '39', 'Cloyd', '624', '549', '32170', '96', '253', '6', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('6', '12', 'Annetta', '1958', '1808', '36727', '96', '150', '38', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('7', '11', 'Helena', '1926', '1783', '39880', '97', '87', '32', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('8', '30', 'Lila', '1240', '1103', '33409', '31', '60', '21', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('9', '46', 'Carolyn', '1582', '1465', '31815', '61', '222', '21', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('10', '17', 'Aniyah', '1174', '1157', '39334', '19', '224', '24', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('11', '37', 'Gretchen', '542', '435', '39626', '58', '169', '26', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('12', '24', 'Sidney', '734', '687', '37881', '62', '249', '25', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('13', '45', 'Orrin', '1633', '1581', '35010', '62', '25', '9', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('14', '43', 'Alphonso', '1302', '1133', '30013', '22', '282', '34', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('15', '8', 'Maxie', '235', '141', '39396', '83', '274', '25', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('16', '27', 'Tod', '92', '83', '39505', '19', '260', '5', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('17', '25', 'Montana', '1517', '1437', '32548', '98', '176', '22', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('18', '35', 'Monte', '1819', '1767', '31126', '79', '265', '9', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('19', '18', 'Mariela', '572', '480', '38903', '39', '23', '38', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('20', '37', 'Emie', '1428', '1392', '33249', '37', '116', '46', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('21', '6', 'Clotilde', '360', '263', '32860', '79', '254', '5', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('22', '31', 'Estrella', '1532', '1387', '35960', '29', '279', '29', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('23', '22', 'Leatha', '301', '155', '30754', '22', '217', '44', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('24', '27', 'Stanford', '1603', '1588', '32244', '60', '124', '11', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('25', '1', 'Estefania', '294', '235', '30795', '82', '16', '21', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('26', '17', 'Tevin', '586', '564', '30110', '13', '41', '39', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('27', '44', 'Ismael', '1936', '1756', '31474', '93', '38', '8', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('28', '36', 'Leda', '960', '842', '34710', '85', '219', '43', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('29', '43', 'Okey', '1709', '1518', '33244', '39', '21', '37', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('30', '39', 'Rachelle', '542', '409', '36134', '10', '281', '5', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('31', '3', 'Hester', '1463', '1319', '33176', '59', '210', '5', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('32', '25', 'Keara', '662', '582', '38118', '81', '150', '40', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('33', '44', 'Afton', '1521', '1479', '38867', '82', '211', '37', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('34', '43', 'Damon', '837', '645', '35350', '58', '83', '3', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('35', '25', 'Edd', '384', '187', '39223', '75', '183', '22', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('36', '10', 'Anastacio', '812', '626', '31374', '14', '258', '11', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('37', '45', 'Araceli', '417', '416', '31514', '11', '207', '17', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('38', '39', 'Tito', '816', '716', '34805', '22', '254', '23', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('39', '23', 'Justice', '1454', '1294', '39120', '75', '97', '44', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('40', '21', 'Drake', '1308', '1250', '31507', '25', '73', '46', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('41', '5', 'Terry', '265', '65', '35003', '75', '264', '34', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('42', '22', 'Linnea', '1607', '1464', '30602', '35', '283', '19', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('43', '1', 'Russel', '1029', '886', '32508', '48', '98', '48', 'Active', '1', '1', '1', '0000-00-00 00:00:00', '2016-09-18 16:08:33');
INSERT INTO `ecm_item` VALUES ('44', '36', 'Zack', '1011', '986', '34585', '66', '216', '18', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('45', '36', 'Earnest', '1997', '1981', '34440', '96', '13', '1', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('46', '33', 'Clara', '1471', '1334', '32048', '34', '267', '21', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('47', '3', 'Demarcus', '1246', '1057', '32017', '89', '143', '44', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('48', '1', 'Lottie', '700', '647', '37523', '45', '181', '8', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('49', '48', 'Madisyn', '1300', '1218', '38530', '41', '284', '6', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');
INSERT INTO `ecm_item` VALUES ('50', '47', 'Jamil', '1951', '1777', '32758', '28', '137', '2', 'Active', '1', '1', '1', '2016-09-07 16:30:11', '2016-09-07 16:30:11');

-- ----------------------------
-- Table structure for `ecm_item_category`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_item_category`;
CREATE TABLE `ecm_item_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_item_category
-- ----------------------------
INSERT INTO `ecm_item_category` VALUES ('1', 'Front-line content-based installation', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('2', 'Synchronised real-time moratorium', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('3', 'Reactive zeroadministration product', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('4', 'Grass-roots value-added pricingstructure', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('5', 'Extended executive application', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('6', 'Multi-channelled assymetric website', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('7', 'Universal leadingedge attitude', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('8', 'Universal global parallelism', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('9', 'Phased cohesive circuit', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('10', 'Configurable asynchronous circuit', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('11', 'Multi-layered attitude-oriented framework', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('12', 'Adaptive disintermediate access', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('13', 'Programmable systematic toolset', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('14', 'Reduced directional opensystem', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('15', 'Mandatory grid-enabled database', 'Active', '1', '1', '1', '2016-09-07 16:12:47', '2016-09-07 16:12:47');
INSERT INTO `ecm_item_category` VALUES ('16', 'Open-source systematic emulation', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('17', 'Persevering intangible throughput', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('18', 'User-friendly bi-directional functionalities', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('19', 'Business-focused client-server flexibility', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('20', 'Re-contextualized multimedia algorithm', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('21', 'Front-line exuding concept', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('22', 'Proactive optimal parallelism', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('23', 'Virtual maximized benchmark', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('24', 'Synergistic hybrid leverage', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('25', 'Vision-oriented bifurcated flexibility', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('26', 'Versatile 24/7 groupware', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('27', 'Reverse-engineered cohesive collaboration', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('28', 'Horizontal logistical budgetarymanagement', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('29', 'Expanded stable projection', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('30', 'Multi-channelled incremental budgetarymanagement', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('31', 'Mandatory radical initiative', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('32', 'Re-contextualized grid-enabled protocol', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('33', 'Public-key real-time customerloyalty', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('34', 'Front-line high-level contingency', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('35', 'Object-based even-keeled hierarchy', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('36', 'Inverse dedicated workforce', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('37', 'Distributed coherent portal', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('38', 'Open-architected foreground extranet', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('39', 'Universal systematic monitoring', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('40', 'Assimilated demand-driven complexity', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('41', 'Visionary cohesive model', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('42', 'Synergized discrete help-desk', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('43', 'Facetoface human-resource projection', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('44', 'Robust background service-desk', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('45', 'Total nextgeneration orchestration', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('46', 'Future-proofed heuristic project', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('47', 'Innovative high-level policy', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('48', 'Switchable interactive hierarchy', 'Active', '1', '1', '1', '2016-09-07 16:12:48', '2016-09-07 16:12:48');
INSERT INTO `ecm_item_category` VALUES ('49', 'Programmable encompassing systemengine', 'Active', '1', '1', '1', '2016-09-18 16:07:43', '2016-09-18 16:07:43');
INSERT INTO `ecm_item_category` VALUES ('50', 'Balanced motivating focusgroup', 'Active', '1', '1', '1', '2016-09-18 16:07:43', '2016-09-18 16:07:43');

-- ----------------------------
-- Table structure for `ecm_parent_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_parent_menu`;
CREATE TABLE `ecm_parent_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trans_id` int(11) DEFAULT NULL,
  `parent_menu_name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `sorting_order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_parent_menu
-- ----------------------------
INSERT INTO `ecm_parent_menu` VALUES ('1', '1', 'menu1', null, null, null, '2016-07-23 15:03:20');

-- ----------------------------
-- Table structure for `ecm_purchase`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_purchase`;
CREATE TABLE `ecm_purchase` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mini_trans_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `purchase_quantity` int(11) DEFAULT NULL,
  `purchase_price` int(11) DEFAULT NULL,
  `purchase_total` int(11) DEFAULT NULL,
  `purchase_grand_total` int(11) DEFAULT NULL,
  `sale_quantity` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `sale_total` int(11) DEFAULT NULL,
  `sale_grand_total` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `transaction` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `cheque_no` int(11) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `cheque_return` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL,
  `receipt_amount` int(11) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `branch_id` varchar(11) DEFAULT NULL,
  `group_id` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_purchase
-- ----------------------------
INSERT INTO `ecm_purchase` VALUES ('1', '1', '2016-09-06', '2', 'Jamar Rutherford', null, null, null, null, '25252', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '10', null, '1', '01', '001', '2016-09-22 12:00:30', '2016-09-22 12:00:30');
INSERT INTO `ecm_purchase` VALUES ('2', '2', '2016-09-06', '3', 'Ava King', null, null, null, null, '46454', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '10', null, '1', '01', '001', '2016-09-22 12:00:21', '2016-09-22 12:00:21');
INSERT INTO `ecm_purchase` VALUES ('3', '3', '2016-09-06', '2', 'Jamar Rutherford', null, null, null, null, 'dsfdsfdsfs', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '10', null, '1', '01', '001', '2016-09-22 11:59:59', '2016-09-22 11:59:59');
INSERT INTO `ecm_purchase` VALUES ('4', '4', '2016-10-09', '4', 'Carmen Hilll', null, null, null, null, '212', null, null, null, null, null, null, null, null, 'Active', 'payment', '5', 'Olson LLC', '1521', '2016-09-10', null, 'bank', '20', null, '1', '01', '001', '2016-09-22 12:08:26', '2016-09-22 12:08:26');
INSERT INTO `ecm_purchase` VALUES ('23', '23', '2016-09-02', '4', 'Carmen Hilll', null, null, null, null, '212', null, null, null, null, null, null, null, null, 'Active', 'payment', '2', 'Kirlin, Homenick and Harris', '1515151', '2016-11-09', null, 'bank', '30', null, '1', '01', '001', '2016-09-09 18:33:35', '2016-09-09 18:33:35');
INSERT INTO `ecm_purchase` VALUES ('24', '24', '2016-09-07', '2', 'Jamar Rutherford', null, null, null, null, '123', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '10', null, '1', '01', '001', '2016-09-21 13:01:07', '2016-09-21 13:01:07');
INSERT INTO `ecm_purchase` VALUES ('37', '37', '2016-09-02', '3', 'Ava King', null, null, null, null, '212', null, null, null, null, null, null, null, null, 'Active', 'payment', '3', 'Bailey, Wisozk and Mraz', '15232', '2016-09-02', null, 'bank', '50', null, '1', '01', '001', '2016-09-22 12:08:13', '2016-09-22 12:08:13');
INSERT INTO `ecm_purchase` VALUES ('42', '42', '2016-09-08', null, '', '47', 'Tommie Lind', null, null, 'bank', null, null, null, null, null, null, null, null, 'Active', 'receipt', '2', 'Kirlin, Homenick and Harris', '11232', '2016-09-09', null, 'bank', '100', null, '1', '01', '001', '2016-09-21 14:15:38', '2016-09-21 14:15:38');
INSERT INTO `ecm_purchase` VALUES ('43', '43', '2016-09-08', null, '', '49', 'Ayla Cassin Sr.', null, null, 'bank', null, null, null, null, null, null, null, null, 'Active', 'receipt', '1', 'Pagac, Lockman and Huels', '123123', '2016-09-08', null, 'bank', '60', null, '1', '01', '001', '2016-09-21 14:15:29', '2016-09-21 14:15:29');
INSERT INTO `ecm_purchase` VALUES ('44', '44', '2016-09-08', '5', 'Lia Dickinson', null, null, null, null, '1522', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '20', null, '1', '01', '001', '2016-09-22 12:03:45', '2016-09-22 12:03:45');
INSERT INTO `ecm_purchase` VALUES ('46', '46', '2016-09-02', null, '', '48', 'Miss Lea Pollich', null, null, '89555', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '10', null, '1', '01', '001', '2016-09-21 14:15:20', '2016-09-21 14:15:20');
INSERT INTO `ecm_purchase` VALUES ('47', '47', '2016-09-01', null, '', '46', 'Stacy Fritsch', null, null, '1515', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '20', null, '1', '01', '001', '2016-09-21 14:14:26', '2016-09-21 14:14:26');
INSERT INTO `ecm_purchase` VALUES ('48', '48', '2016-09-09', '5', 'Lia Dickinson', null, null, null, null, '212', null, null, null, null, null, null, null, null, 'Active', 'payment', '4', 'Luettgen Ltd', '988', '2016-09-11', null, 'bank', '40', null, '1', '01', '001', '2016-09-21 16:04:12', '2016-09-21 16:04:12');
INSERT INTO `ecm_purchase` VALUES ('49', '49', '2016-09-01', '4', 'Carmen Hilll', null, null, null, null, '1522', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '55', null, '1', '01', '001', '2016-09-22 12:03:35', '2016-09-22 12:03:35');
INSERT INTO `ecm_purchase` VALUES ('50', '370', '2016-09-08', '3', 'Ava King', null, null, null, null, '1666', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '15', null, '1', '01', '001', '2016-09-08 14:24:28', '2016-09-08 14:24:28');
INSERT INTO `ecm_purchase` VALUES ('51', '51', '2016-09-08', null, '', '50', 'Juliet Stokes', null, null, '15333', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '30', null, '1', '01', '001', '2016-09-21 14:14:08', '2016-09-21 14:14:08');
INSERT INTO `ecm_purchase` VALUES ('52', '52', '2016-09-07', null, '', '50', 'Juliet Stokes', null, null, '0155', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '60', null, '1', '01', '001', '2016-09-21 14:14:00', '2016-09-21 14:14:00');
INSERT INTO `ecm_purchase` VALUES ('53', '53', '2016-09-08', null, '', '49', 'Ayla Cassin Sr.', null, null, '1112', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '30', null, '1', '01', '001', '2016-09-21 14:13:48', '2016-09-21 14:13:48');
INSERT INTO `ecm_purchase` VALUES ('56', '56', '2016-09-07', null, '', '47', 'Tommie Lind', null, null, '0555', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '15', null, '1', '01', '001', '2016-09-21 14:13:38', '2016-09-21 14:13:38');
INSERT INTO `ecm_purchase` VALUES ('57', '57', '2016-09-07', '2', 'Jamar Rutherford', null, null, null, null, '212', null, null, null, null, null, null, null, null, 'Active', 'payment', '5', 'Olson LLC', '151515', '2016-09-07', null, 'bank', '60', null, '1', '01', '001', '2016-09-11 12:31:22', '2016-09-11 12:31:22');
INSERT INTO `ecm_purchase` VALUES ('58', '58', '2016-10-09', '2', 'Jamar Rutherford', null, null, null, null, '10 date payment', null, null, null, null, null, null, null, null, 'Active', 'payment', '1', 'Pagac, Lockman and Huels', '122323', '2016-09-09', null, 'bank', '50', null, '1', '01', '001', '2016-09-15 20:20:34', '2016-09-15 20:20:34');
INSERT INTO `ecm_purchase` VALUES ('59', '59', '2016-09-10', '50', 'Garret Hessel', null, null, null, null, '1222', null, null, null, null, null, null, null, null, 'Active', 'payment', '1', 'Pagac, Lockman and Huels', '1222', '2016-09-08', null, 'bank', '70', null, '1', '01', '001', '2016-09-15 20:32:13', '2016-09-15 20:32:13');
INSERT INTO `ecm_purchase` VALUES ('65', '65', '2016-09-13', null, '', '48', 'Miss Lea Pollich', null, null, '009', null, null, null, null, null, null, null, null, 'Active', 'receipt', '1', 'Pagac, Lockman and Huels', '122', '1970-01-01', null, 'bank', '20', null, '1', '01', '001', '2016-09-21 14:13:31', '2016-09-21 14:13:31');
INSERT INTO `ecm_purchase` VALUES ('66', '66', '2016-09-13', null, '', '50', 'Juliet Stokes', null, null, '112', null, null, null, null, null, null, null, null, 'Active', 'receipt', '0', null, null, null, null, 'cash', '10', null, '1', '01', '001', '2016-09-21 14:13:22', '2016-09-21 14:13:22');
INSERT INTO `ecm_purchase` VALUES ('95', '471', '2016-09-09', null, null, '50', 'Juliet Stokes', '30', 'Rachelle', '0015', null, null, null, null, '15', '15', '225', '250', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-16 00:50:40', '2016-09-16 00:50:40');
INSERT INTO `ecm_purchase` VALUES ('96', '471', '2016-09-09', null, null, '50', 'Juliet Stokes', '4', 'Isabell', '0015', null, null, null, null, '5', '5', '25', '250', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-16 00:50:40', '2016-09-16 00:50:40');
INSERT INTO `ecm_purchase` VALUES ('101', '850', '2016-09-18', null, null, '47', 'Tommie Lind', '27', 'Ismael', '2322', null, null, null, null, '23', '33', '759', '1507', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-18 16:10:57', '2016-09-18 16:10:57');
INSERT INTO `ecm_purchase` VALUES ('102', '850', '2016-09-18', null, null, '47', 'Tommie Lind', '15', 'Maxie', '2322', null, null, null, null, '34', '22', '748', '1507', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-18 16:10:57', '2016-09-18 16:10:57');
INSERT INTO `ecm_purchase` VALUES ('103', '103', '2016-09-01', '2', 'Jamar Rutherford', null, null, null, null, '343', null, null, null, null, null, null, null, null, 'Active', 'payment', '1', 'Pagac, Lockman and Huels', '23333', '2016-01-09', null, 'bank', '1200', null, '1', '01', '001', '2016-09-22 12:28:37', '2016-09-22 12:28:37');
INSERT INTO `ecm_purchase` VALUES ('114', '940', '2016-09-13', null, null, '50', 'Juliet Stokes', '1', 'Albina', 'sale item', null, null, null, null, '15', '15', '225', '225', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-20 00:16:49', '2016-09-20 00:16:49');
INSERT INTO `ecm_purchase` VALUES ('116', '540', '2016-09-13', null, null, '49', 'Ayla Cassin Sr.', '1', 'Albina', '1222', null, null, null, null, '13', '12', '156', '156', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-20 00:16:48', '2016-09-20 00:16:48');
INSERT INTO `ecm_purchase` VALUES ('125', '897', '2016-09-14', null, null, '50', 'Juliet Stokes', '3', 'Nathen', '0090', null, null, null, null, '23', '32', '736', '828', 'Revised', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:53:02');
INSERT INTO `ecm_purchase` VALUES ('126', '897', '2016-09-14', null, null, '50', 'Juliet Stokes', '2', 'Adele', '0090', null, null, null, null, '23', '4', '92', '828', 'Revised', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:53:02');
INSERT INTO `ecm_purchase` VALUES ('127', '99', '2016-09-20', null, null, '50', 'Juliet Stokes', '1', 'Albina', '1212', null, null, null, null, '12', '12', '144', '369', 'Initial', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:59:21');
INSERT INTO `ecm_purchase` VALUES ('128', '99', '2016-09-20', null, null, '50', 'Juliet Stokes', '35', 'Edd', '1212', null, null, null, null, '15', '15', '225', '369', 'Initial', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:59:21');
INSERT INTO `ecm_purchase` VALUES ('129', '531', '2016-09-19', null, null, '48', 'Miss Lea Pollich', '25', 'Estefania', '123', null, null, null, null, '15', '15', '225', '325', 'Initial', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:59:29');
INSERT INTO `ecm_purchase` VALUES ('130', '531', '2016-09-19', null, null, '48', 'Miss Lea Pollich', '19', 'Mariela', '123', null, null, null, null, '10', '10', '100', '325', 'Initial', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:59:29');
INSERT INTO `ecm_purchase` VALUES ('131', '905', '2016-09-08', null, null, '1', 'Miss Aliza Sporer DDS', '14', 'Alphonso', '322323', null, null, null, null, '23', '22', '506', '1035', 'Initial', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:59:38');
INSERT INTO `ecm_purchase` VALUES ('132', '905', '2016-09-08', null, null, '1', 'Miss Aliza Sporer DDS', '3', 'Nathen', '322323', null, null, null, null, '23', '23', '529', '1035', 'Initial', 'quotation', null, null, null, null, null, null, null, null, '1', '01', '001', '2021-09-16 00:00:00', '2016-09-21 12:59:38');
INSERT INTO `ecm_purchase` VALUES ('133', '573', '2016-09-19', null, null, '47', 'Tommie Lind', '17', 'Montana', 'sale stock', null, null, null, null, '12', '12', '144', '144', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 14:12:34', '2016-09-21 14:12:34');
INSERT INTO `ecm_purchase` VALUES ('134', '499', '2016-08-01', null, null, '48', 'Miss Lea Pollich', '3', 'Nathen', '120', null, null, null, null, '15', '12', '180', '280', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 14:12:48', '2016-09-21 14:12:48');
INSERT INTO `ecm_purchase` VALUES ('135', '499', '2016-08-01', null, null, '48', 'Miss Lea Pollich', '30', 'Rachelle', '120', null, null, null, null, '10', '10', '100', '280', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 14:12:48', '2016-09-21 14:12:48');
INSERT INTO `ecm_purchase` VALUES ('136', '378', '2016-09-16', null, null, '46', 'Stacy Fritsch', '12', 'Sidney', '1222', null, null, null, null, '12', '2', '24', '66', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 14:13:01', '2016-09-21 14:13:01');
INSERT INTO `ecm_purchase` VALUES ('137', '378', '2016-09-16', null, null, '46', 'Stacy Fritsch', '3', 'Nathen', '1222', null, null, null, null, '21', '2', '42', '66', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 14:13:01', '2016-09-21 14:13:01');
INSERT INTO `ecm_purchase` VALUES ('138', '857', '2016-09-07', null, null, '46', 'Stacy Fritsch', '17', 'Montana', '888', null, null, null, null, '9', '98', '882', '882', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 14:13:11', '2016-09-21 14:13:11');
INSERT INTO `ecm_purchase` VALUES ('139', '763', '2016-09-21', null, null, '46', 'Stacy Fritsch', '1', 'Albina', '0125', null, null, null, null, '14', '20', '280', '280', 'Active', 'sales', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 17:06:09', '2016-09-21 17:06:09');
INSERT INTO `ecm_purchase` VALUES ('144', '696', '2016-09-14', '2', 'Jamar Rutherford', null, null, '1', 'Albina', 'item purchase', '12', '12', '144', '288', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:09:59', '2016-09-21 15:09:59');
INSERT INTO `ecm_purchase` VALUES ('145', '696', '2016-09-14', '2', 'Jamar Rutherford', null, null, '1', 'Albina', 'item purchase', '12', '12', '144', '288', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:09:59', '2016-09-21 15:09:59');
INSERT INTO `ecm_purchase` VALUES ('149', '104', '2016-09-07', '3', 'Ava King', null, null, '6', 'Dell', '1521', '12', '12', '144', '144', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:10:32', '2016-09-21 15:10:32');
INSERT INTO `ecm_purchase` VALUES ('153', '481', '2016-09-12', '5', 'Lia Dickinson', null, null, '11', 'Gretchen', '0015', '12', '12', '144', '369', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:10:59', '2016-09-21 15:10:59');
INSERT INTO `ecm_purchase` VALUES ('154', '481', '2016-09-12', '5', 'Lia Dickinson', null, null, '49', 'Madisyn', '0015', '15', '15', '225', '369', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:10:59', '2016-09-21 15:10:59');
INSERT INTO `ecm_purchase` VALUES ('155', '190', '2016-09-28', '3', 'Ava King', null, null, '19', 'Mariela', '222', '12', '22', '264', '660', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:11:07', '2016-09-21 15:11:07');
INSERT INTO `ecm_purchase` VALUES ('156', '190', '2016-09-28', '3', 'Ava King', null, null, '15', 'Maxie', '222', '12', '33', '396', '660', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:11:07', '2016-09-21 15:11:07');
INSERT INTO `ecm_purchase` VALUES ('157', '133', '2016-07-05', '5', 'Lia Dickinson', null, null, '18', 'Monte', '158526', '15', '12', '180', '4285', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:11:34', '2016-09-21 15:11:34');
INSERT INTO `ecm_purchase` VALUES ('158', '133', '2016-07-05', '5', 'Lia Dickinson', null, null, '31', 'Hester', '158526', '59', '56', '3304', '4285', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:11:34', '2016-09-21 15:11:34');
INSERT INTO `ecm_purchase` VALUES ('159', '133', '2016-07-05', '5', 'Lia Dickinson', null, null, '29', 'Okey', '158526', '89', '9', '801', '4285', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 15:11:34', '2016-09-21 15:11:34');
INSERT INTO `ecm_purchase` VALUES ('162', '264', '2016-07-15', '4', 'Carmen Hilll', null, null, '16', 'Tod', '8955', '89', '5', '445', '603', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 16:08:30', '2016-09-21 16:08:30');
INSERT INTO `ecm_purchase` VALUES ('163', '264', '2016-07-15', '4', 'Carmen Hilll', null, null, '14', 'Alphonso', '8955', '2', '56', '112', '603', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 16:08:30', '2016-09-21 16:08:30');
INSERT INTO `ecm_purchase` VALUES ('164', '264', '2016-07-15', '4', 'Carmen Hilll', null, null, '10', 'Aniyah', '8955', '2', '23', '46', '603', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-21 16:08:30', '2016-09-21 16:08:30');
INSERT INTO `ecm_purchase` VALUES ('171', '171', '2016-09-22', '3', 'Ava King', null, null, null, null, '0513', null, null, null, null, null, null, null, null, 'Active', 'payment', '2', 'Kirlin, Homenick and Harris', '159926235', '1970-01-01', null, 'bank', '150', null, '1', '01', '001', '2016-09-22 12:28:31', '2016-09-22 12:28:31');
INSERT INTO `ecm_purchase` VALUES ('172', '478', '2016-09-22', '3', 'Ava King', null, null, '3', 'Nathen', 'current date 22-09-16', '15', '15', '225', '250', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-22 12:12:24', '2016-09-22 12:12:24');
INSERT INTO `ecm_purchase` VALUES ('173', '478', '2016-09-22', '3', 'Ava King', null, null, '5', 'Cloyd', 'current date 22-09-16', '5', '5', '25', '250', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-22 12:12:24', '2016-09-22 12:12:24');
INSERT INTO `ecm_purchase` VALUES ('176', '360', '2016-08-01', '3', 'Ava King', null, null, '32', 'Keara', '00155', '15', '15', '225', '1649', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-22 12:16:05', '2016-09-22 12:16:05');
INSERT INTO `ecm_purchase` VALUES ('177', '360', '2016-08-01', '3', 'Ava King', null, null, '15', 'Maxie', '00155', '16', '89', '1424', '1649', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-22 12:16:05', '2016-09-22 12:16:05');
INSERT INTO `ecm_purchase` VALUES ('178', '217', '2016-09-13', '2', 'Jamar Rutherford', null, null, '37', 'Araceli', '1822', '15', '15', '225', '393', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-22 12:16:16', '2016-09-22 12:16:16');
INSERT INTO `ecm_purchase` VALUES ('179', '217', '2016-09-13', '2', 'Jamar Rutherford', null, null, '48', 'Lottie', '1822', '14', '12', '168', '393', null, null, null, null, 'Active', 'purchase', null, null, null, null, null, null, null, null, '1', '01', '001', '2016-09-22 12:16:16', '2016-09-22 12:16:16');
INSERT INTO `ecm_purchase` VALUES ('180', '50507', '2016-09-22', '4', 'Carmen Hilll', null, null, null, null, '156', null, null, null, null, null, null, null, null, 'Active', 'payment', '0', null, null, null, null, 'cash', '25', null, '1', '01', '001', '2016-09-22 12:45:34', '2016-09-22 12:45:34');

-- ----------------------------
-- Table structure for `ecm_quot_status`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_quot_status`;
CREATE TABLE `ecm_quot_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_quot_status
-- ----------------------------
INSERT INTO `ecm_quot_status` VALUES ('1', 'Initial');
INSERT INTO `ecm_quot_status` VALUES ('2', 'Revised');
INSERT INTO `ecm_quot_status` VALUES ('3', 'InProcess');
INSERT INTO `ecm_quot_status` VALUES ('4', 'Approved');
INSERT INTO `ecm_quot_status` VALUES ('5', 'Rejected');

-- ----------------------------
-- Table structure for `ecm_supplier`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_supplier`;
CREATE TABLE `ecm_supplier` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `contact_person` varchar(250) NOT NULL,
  `landline_no` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `ntn_no` varchar(250) NOT NULL,
  `initial_balance` int(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_supplier
-- ----------------------------
INSERT INTO `ecm_supplier` VALUES ('1', 'Audreanne Altenwerth PhD', 'Leonie Runolfsdottir', '271-868-3702', '07164320920', 'dickinson.odessa@hotmail.com', '6557287', '3153866', '2000', 'Active', '1', '1', '1', '2016-09-15 20:19:15', '2016-09-15 20:19:15');
INSERT INTO `ecm_supplier` VALUES ('2', 'Jamar Rutherford', 'Josh Fay III', '236-354-7004x27233', '1-368-390-7451x3127', 'kendall.carter@yahoo.com', '9200506', '7038756', '1000', 'Active', '1', '1', '1', '2016-09-15 20:19:29', '2016-09-15 20:19:29');
INSERT INTO `ecm_supplier` VALUES ('3', 'Ava King', 'Mrs. Edison Cole III', '1-956-777-5965x09763', '118.688.3001', 'mariah52@hotmail.com', '8487467', '9824943', '1500', 'Active', '1', '1', '1', '2016-09-15 20:19:40', '2016-09-15 20:19:40');
INSERT INTO `ecm_supplier` VALUES ('4', 'Carmen Hilll', 'Mrs. Mercedes Strosin', '542.671.9161', '(475)468-9767', 'marlen.moore@yahoo.com', '9512826', '1157072', '1500', 'Active', '1', '1', '1', '2016-09-21 15:17:47', '2016-09-21 15:17:47');
INSERT INTO `ecm_supplier` VALUES ('5', 'Lia Dickinson', 'Mrs. Blake Schmitt', '(477)584-2711', '296-014-5805x6762', 'malachi55@gmail.com', '2443662', '3312340', '11000', 'Active', '1', '1', '1', '2016-09-21 15:36:49', '2016-09-21 15:36:49');
INSERT INTO `ecm_supplier` VALUES ('6', 'Dr. Georgianna Lynch', 'Carson Bernier', '(984)773-6100x7670', '154-840-5005', 'max.zboncak@gmail.com', '6270783', '1766418', '1500', 'Active', '1', '1', '1', '2016-09-21 15:39:58', '2016-09-21 15:39:58');
INSERT INTO `ecm_supplier` VALUES ('7', 'Kieran Schamberger Jr.', 'Alena Kovacek', '(076)557-6418x38434', '014-124-7637', 'keven.hermann@gmail.com', '2618283', '7155509', '1100', 'Active', '1', '1', '1', '2016-09-21 16:01:47', '2016-09-21 16:01:47');
INSERT INTO `ecm_supplier` VALUES ('8', 'Jacquelyn Howell', 'Marcellus Armstrong', '1-064-165-1632', '1-261-991-9824x77694', 'jaunita87@wiza.com', '1597878', '1704287', '1500', 'Active', '1', '1', '1', '2016-09-21 16:02:04', '2016-09-21 16:02:04');
INSERT INTO `ecm_supplier` VALUES ('9', 'Ms. Ramon Funk II', 'Alvah Frami', '909.038.5830', '066.533.5338', 'tillman.marge@tillmangleichner.net', '7470998', '2747724', '1600', 'Active', '1', '1', '1', '2016-09-21 16:02:15', '2016-09-21 16:02:15');
INSERT INTO `ecm_supplier` VALUES ('10', 'Nathaniel O\'Hara', 'Kareem Eichmann', '606-967-7622', '1-397-512-0826', 'iva63@braunhegmann.com', '9681283', '2980112', '5422270', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('11', 'Orlo Reichert', 'Dr. Einar Fritsch Jr.', '01589870271', '088.114.4287', 'btorphy@gmail.com', '1435530', '9323314', '8386990', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('12', 'Maybelle Prohaska', 'Garett Reynolds', '687-592-1162x6355', '(075)838-7118', 'domenico.lindgren@yahoo.com', '6404864', '759167', '9093100', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('13', 'Russ Cole', 'Ms. Julien Franecki DDS', '833.067.8071', '1-087-045-0402', 'rosalind15@larson.com', '8515892', '9710414', '9104715', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('14', 'Catherine Ruecker MD', 'Ewell Breitenberg DVM', '564.702.8510', '(243)089-3736x19535', 'hosea.pacocha@aufderhardavis.net', '8657089', '9594483', '4384234', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('15', 'Oda Bergnaum', 'Dan Bogan', '05599559004', '424-479-1191', 'gilda.watsica@wiza.biz', '9932254', '7770723', '2972337', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('16', 'Petra Botsford', 'Mr. Ellie Davis Jr.', '(173)101-3425x715', '317-116-6374', 'alfonzo.schmidt@swaniawski.biz', '8513005', '6168247', '2252026', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('17', 'Maverick Botsford', 'Veda Runte', '710-891-3715x419', '816.684.2957x320', 'marco69@stanton.biz', '8098691', '1016052', '2533275', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('18', 'Jordon Grimes', 'Mrs. Pasquale Prohaska MD', '440-175-2249x3562', '06593303095', 'idach@gleason.biz', '4850661', '6324943', '9976699', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('19', 'Dr. Darron Gerhold', 'Herminia Schneider', '(277)686-0377', '222-937-9902x8242', 'smitham.dillan@langworthbuckridge.com', '1909672', '9097356', '6930829', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('20', 'Gia Smith', 'Mr. Chaz Muller', '(778)035-8550', '484-488-5398x7432', 'adelia63@wintheiser.com', '513973', '2426413', '1344161', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('21', 'Tyreek Towne', 'Obie Jacobi', '451.883.0875x713', '430-291-7014x6637', 'vshanahan@gmail.com', '9643983', '5414390', '3470834', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('22', 'Dangelo Schowalter', 'Amani Jacobs', '802.622.1891x2067', '(765)184-3563', 'kschultz@hotmail.com', '8621551', '5544818', '49203', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('23', 'Cathrine Schulist', 'Monroe Willms', '1-966-917-2673x90046', '1-235-492-4442', 'okoch@haley.com', '9140245', '828758', '798842', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('24', 'Dominic Cormier V', 'Jacinthe Cassin', '944-980-1347', '1-442-870-8592', 'lenny77@stroman.com', '6600977', '4933039', '5663723', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('25', 'Oleta Block V', 'Monique Rodriguez', '1-136-045-0753', '520-774-4850', 'keebler.yasmeen@yahoo.com', '8487328', '7973331', '4959064', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('26', 'Ms. Janice Carter Sr.', 'Brice D\'Amore', '(466)383-4698', '726-412-5131', 'kohler.ena@aufderhar.biz', '5145059', '991314', '9505672', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('27', 'Ms. Arvid Konopelski', 'Miss Abe Green', '176.141.7471x99252', '887.416.2548x46631', 'hauck.sandy@bahringer.com', '2029312', '7609186', '7167322', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('28', 'Paxton Schultz', 'Marilie Nienow', '(873)973-5702', '794-600-8397', 'howe.virgil@yahoo.com', '1779834', '1776421', '2365147', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('29', 'Brain Hickle', 'Reese Lowe', '+14(0)9428561937', '270-251-7841x51347', 'floyd11@gmail.com', '8741538', '584487', '6958439', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('30', 'Jasen Larkin', 'Ms. Vivien Dickinson', '1-233-181-3431x3461', '(271)565-4449x159', 'vschuppe@cronin.com', '5048859', '6361780', '3779120', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('31', 'Kristoffer Brown', 'Sincere Schaden', '1-063-780-6159', '385.079.2603x549', 'clemens25@gmail.com', '3860893', '5544383', '7112241', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('32', 'Matt Ankunding III', 'Miss Fredrick Krajcik Sr.', '02288130478', '676-362-6979x35694', 'schmidt.sigrid@yahoo.com', '1430368', '3060685', '6167202', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('33', 'Dandre Huels', 'Audra Lindgren', '02193002148', '513-942-5351x65405', 'ymaggio@greenholt.com', '9161147', '1256556', '8205329', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('34', 'River Muller', 'Victor McLaughlin', '+07(8)2609024784', '1-308-639-5801x76508', 'marley13@reicheladams.com', '115871', '7824158', '12000', 'Active', '1', '1', '1', '2016-09-15 20:19:49', '2016-09-15 20:19:49');
INSERT INTO `ecm_supplier` VALUES ('35', 'Hollie Goldner', 'Angelica Hamill II', '1-294-586-6248x037', '632.800.9238x2084', 'ymills@yahoo.com', '7844702', '6254243', '6788284', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('36', 'Mrs. Timmy Cronin', 'Dr. Olga Maggio I', '(174)780-8052x0279', '319.356.0433', 'gerson.hauck@nader.net', '7167645', '4688709', '6866401', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('37', 'Wilton Welch', 'Pedro Lindgren', '09438892671', '809-650-5516', 'srussel@yahoo.com', '5268608', '8529505', '5743340', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('38', 'Fritz Greenholt', 'Waldo Parisian V', '(268)496-9683x7719', '338.891.0203x874', 'mariam24@zboncak.com', '9774953', '7045122', '1070566', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('39', 'Mr. Keshawn Gislason', 'Marie Farrell', '974-618-6440x36489', '1-284-960-6005x8848', 'metz.korey@barrows.net', '6686138', '8809150', '9698044', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('40', 'Maximus Graham', 'Dejah Shields', '(970)141-4752x26037', '638-477-0899', 'ivy.konopelski@kunze.com', '9695096', '7970538', '7829403', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('41', 'Myrtis Hand', 'Rosalind Rohan', '502.135.6276x94451', '04010854628', 'brekke.liliana@russelbednar.biz', '8719114', '1485916', '8078710', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('42', 'Eloy Hilpert I', 'Ethelyn Kertzmann', '017-426-6931x822', '(894)049-5639x0300', 'keebler.anabelle@marquardthaley.biz', '3208876', '3254165', '4869709', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('43', 'Mr. Belle Jacobi', 'Madeline O\'Kon Sr.', '603-091-0570x410', '548-438-8842x8888', 'humberto.howell@powlowskiprosacco.org', '4377603', '1009317', '4093087', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('44', 'Bridget Koelpin', 'Mrs. Gage Gottlieb', '(714)537-2662', '02511986418', 'eloise.wiza@yahoo.com', '6403617', '1361942', '7532295', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('45', 'Clare Ward V', 'Alexandre Mosciski PhD', '(346)733-0514', '1-585-771-1528x728', 'alittle@yahoo.com', '4931146', '7276597', '1720750', 'Active', '1', '1', '1', '2016-09-07 16:33:04', '2016-09-07 16:33:04');
INSERT INTO `ecm_supplier` VALUES ('46', 'Tessie DuBuque', 'Lew Braun', '(495)047-1539x110', '1-113-072-8685', 'lazaro20@gislason.biz', '1960227', '2595418', '12000', 'Active', '1', '1', '1', '2016-09-15 20:29:50', '2016-09-15 20:29:50');
INSERT INTO `ecm_supplier` VALUES ('47', 'Genoveva Gerhold V', 'Dr. Noel Thiel', '945.389.1206x473', '1-635-513-6175x69139', 'spencer.corine@sporer.info', '6869085', '4330047', '13000', 'Active', '1', '1', '1', '2016-09-15 20:29:40', '2016-09-15 20:29:40');
INSERT INTO `ecm_supplier` VALUES ('48', 'Graham Gorczany', 'Tressa Cormier', '(121)156-0865x643', '1-136-731-3806', 'beau.murphy@gmail.com', '6240321', '4340807', '14000', 'Active', '1', '1', '1', '2016-09-15 20:29:31', '2016-09-15 20:29:31');
INSERT INTO `ecm_supplier` VALUES ('49', 'Clint Spencer', 'Clarissa Trantow', '(759)604-1009x21556', '862.502.9864x93641', 'mklocko@runolfsson.com', '9516074', '7740439', '14000', 'Active', '1', '1', '1', '2016-09-15 20:29:20', '2016-09-15 20:29:20');
INSERT INTO `ecm_supplier` VALUES ('50', 'Garret Hessel', 'Natalia Reynolds', '1-930-167-9377x16682', '02660882061', 'selmer.shanahan@schulist.com', '319957', '8452647', '1400', 'Active', '1', '1', '1', '2016-09-15 20:29:09', '2016-09-15 20:29:09');

-- ----------------------------
-- Table structure for `ecm_temp`
-- ----------------------------
DROP TABLE IF EXISTS `ecm_temp`;
CREATE TABLE `ecm_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidden_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecm_temp
-- ----------------------------
INSERT INTO `ecm_temp` VALUES ('116', '540', '1', 'Albina', '13', '12', '156', '2016-09-21 14:12:17', '2016-09-20 00:16:48');
INSERT INTO `ecm_temp` VALUES ('125', '897', '3', 'Nathen', '23', '32', '736', '2016-09-21 12:56:43', '2021-09-16 00:00:00');
INSERT INTO `ecm_temp` VALUES ('126', '897', '2', 'Adele', '23', '4', '92', '2016-09-21 12:56:43', '2021-09-16 00:00:00');
INSERT INTO `ecm_temp` VALUES ('144', '696', '1', 'Albina', '12', '12', '144', '2016-09-21 15:09:53', '2016-09-21 15:09:39');
INSERT INTO `ecm_temp` VALUES ('145', '696', '1', 'Albina', '12', '12', '144', '2016-09-21 15:09:53', '2016-09-21 15:09:39');
