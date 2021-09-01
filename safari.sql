/*
MySQL Data Transfer
Source Host: localhost
Source Database: safari
Target Host: localhost
Target Database: safari
Date: 01-Sep-21 5:44:37 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for booked
-- ----------------------------
DROP TABLE IF EXISTS `booked`;
CREATE TABLE `booked` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_by` varchar(50) NOT NULL,
  `book_email` varchar(50) NOT NULL,
  `book_contact` int(15) NOT NULL,
  `book_address` varchar(100) NOT NULL,
  `book_postal` int(5) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_age` int(11) NOT NULL,
  `book_gender` varchar(15) NOT NULL,
  `book_departure` date NOT NULL,
  `park_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `book_tracker` varchar(35) NOT NULL,
  PRIMARY KEY (`book_id`,`book_email`),
  KEY `park_id` (`park_id`,`program_id`),
  KEY `package_id` (`program_id`),
  KEY `ticket_id` (`ticket_id`),
  CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `special_program` (`program_id`),
  CONSTRAINT `booked_ibfk_4` FOREIGN KEY (`park_id`) REFERENCES `park_type` (`park_id`),
  CONSTRAINT `booked_ibfk_5` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cancel_booked
-- ----------------------------
DROP TABLE IF EXISTS `cancel_booked`;
CREATE TABLE `cancel_booked` (
  `booked_id` int(13) NOT NULL AUTO_INCREMENT,
  `booked_name` varchar(20) NOT NULL,
  `booked_date` date NOT NULL,
  `booked_tracker` varchar(50) NOT NULL,
  PRIMARY KEY (`booked_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `image_id` int(13) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(60) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `image_details` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for opening_time
-- ----------------------------
DROP TABLE IF EXISTS `opening_time`;
CREATE TABLE `opening_time` (
  `opening_id` int(11) NOT NULL AUTO_INCREMENT,
  `opening_name` varchar(20) NOT NULL,
  `opening_time` varchar(20) NOT NULL,
  `closing_time` varchar(20) NOT NULL,
  PRIMARY KEY (`opening_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for park_type
-- ----------------------------
DROP TABLE IF EXISTS `park_type`;
CREATE TABLE `park_type` (
  `park_id` int(11) NOT NULL AUTO_INCREMENT,
  `park_name` varchar(35) NOT NULL,
  PRIMARY KEY (`park_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for special_program
-- ----------------------------
DROP TABLE IF EXISTS `special_program`;
CREATE TABLE `special_program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(50) NOT NULL,
  `program_image` varchar(1000) DEFAULT '',
  `program_price` double NOT NULL,
  `program_slot` int(10) NOT NULL,
  `program_details` varchar(1000) DEFAULT '',
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `stat_desc` varchar(20) NOT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_name` varchar(35) NOT NULL,
  `ticket_price` int(255) NOT NULL,
  `season` varchar(13) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trans_payment` double NOT NULL,
  `trans_passenger` varchar(100) NOT NULL,
  `trans_age` int(11) NOT NULL,
  `trans_gender` varchar(15) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `stat_id` int(11) DEFAULT 1,
  `trans_refunded` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`trans_id`),
  KEY `acc_id` (`acc_id`,`origin_id`,`dest_id`,`stat_id`),
  KEY `origin_id` (`origin_id`),
  KEY `dest_id` (`dest_id`),
  KEY `stat_id` (`stat_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `special_program` (`program_id`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`origin_id`) REFERENCES `ticket` (`ticket_id`),
  CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`dest_id`) REFERENCES `park_type` (`park_id`),
  CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`stat_id`) REFERENCES `status` (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account` varchar(50) NOT NULL,
  `user_email` varchar(16) DEFAULT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_type` varchar(12) DEFAULT NULL,
  `user_phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `booked` VALUES ('1', 'Jahirul', 'Jahirul@gmail.com', '1675342146', '32/21 Dinonath', '1211', 'Jahirul', '20', 'Male', '2021-07-30', '1', '6', '1', '61022838290d0');
INSERT INTO `booked` VALUES ('3', 'Rahat', 'rahatabdullah@gmail.com', '1840686590', '11/2/1 Dupkhola', '1236', 'Rahat', '16', 'Male', '2021-07-30', '3', '1', '1', '610275bf2025e');
INSERT INTO `booked` VALUES ('4', 'Rahat', 'rahat@gmail.com', '1840686590', '11/2/1 Dupkhola', '1236', 'Fahad', '20', 'Male', '2021-07-30', '3', '1', '1', '610275bf2025e');
INSERT INTO `booked` VALUES ('10', 'Fahad', 'fahad@gmail.com', '1675342146', '93/3/26 Jatrabari-1236', '1236', 'Fahad', '22', 'Male', '2021-08-09', '1', '1', '1', '611127c566c42');
INSERT INTO `booked` VALUES ('13', 'Rafsan', 'Rafsan@gmail.com', '1321123211', 'Progoti Shoroni', '3212', 'Rafsan', '23', 'Male', '2021-08-09', '3', '1', '3', '6111359f0fcc0');
INSERT INTO `booked` VALUES ('14', 'Sami', 'sami@gmail.com', '132113321', 'Kollanpur', '1233', 'Sami', '22', 'Male', '2021-08-09', '3', '1', '2', '61114b4a1d58e');
INSERT INTO `booked` VALUES ('15', 'Nuruzzaman', 'Nuruzzaman@gmail.com', '1811213456', 'Badol Shordar Road, Shutikhalpar, Dhalpur, Jatrabari, Dhaka-1236', '1236', 'Nuruzzaman', '38', 'Male', '2021-08-17', '3', '3', '5', '611a627cf0dac');
INSERT INTO `cancel_booked` VALUES ('4', 'Nuruzzaman', '2021-08-17', '611a627cf0dac');
INSERT INTO `gallery` VALUES ('2', 'Tiger', 'Tiger.jpg', 'ROAR');
INSERT INTO `gallery` VALUES ('3', 'Panda', 'Panda.jpg', 'Alone Panda');
INSERT INTO `gallery` VALUES ('4', 'Deer', 'Deer.jpg', 'চিত্রা হরিণ');
INSERT INTO `gallery` VALUES ('5', 'Feeding Elephant', 'Feeding Elephant.jpg', 'Happy elephant eating');
INSERT INTO `gallery` VALUES ('6', 'Tiger Road Experience', 'Tiger Road Experience.jpg', 'Scared people.');
INSERT INTO `gallery` VALUES ('7', 'Museum', 'Museum.jpg', 'Collections of the zoo materials');
INSERT INTO `gallery` VALUES ('8', 'Core Safari Park', 'Core Safari Park.jpg', 'Visited people');
INSERT INTO `gallery` VALUES ('9', 'Safari Kingdom Experience', 'Safari Kingdom Experience.jpg', '...');
INSERT INTO `opening_time` VALUES ('1', 'Saturday', '9 AM', '6 PM');
INSERT INTO `opening_time` VALUES ('2', 'Sunday', '9 AM', '6 PM');
INSERT INTO `opening_time` VALUES ('3', 'Monday', '9 AM', '3 PM');
INSERT INTO `opening_time` VALUES ('4', 'Tuesday', '9 AM', '6 PM');
INSERT INTO `opening_time` VALUES ('5', 'Wednesday', '9 AM', '6 PM');
INSERT INTO `opening_time` VALUES ('6', 'Thursday', '9 AM', '6 PM');
INSERT INTO `opening_time` VALUES ('7', 'Friday', 'Closed', 'Closed');
INSERT INTO `opening_time` VALUES ('8', 'Government Holidays', 'Closed', 'Closed');
INSERT INTO `opening_time` VALUES ('9', 'Strike', 'Closed', 'Closed');
INSERT INTO `park_type` VALUES ('1', 'Core Safari');
INSERT INTO `park_type` VALUES ('2', 'Safari Kingdom');
INSERT INTO `park_type` VALUES ('3', 'Nature History Museum');
INSERT INTO `special_program` VALUES ('1', 'Free Walk', 'Free Walk.jpg', '350', '180', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('2', 'Zoo Keeper', 'Zoo Keeper.jpg', '390', '30', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('3', 'Feed The Elephant', 'Feed The Elephant.jpg', '450', '30', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('4', 'Tourist', 'Tourist.jpg', '490', '50', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('5', 'Cabin', 'Cabin.jpg', '600', '30', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('6', 'Deluxe', 'Deluxe.jpg', '700', '30', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('7', 'Tiger Road Experience', 'Tiger Road Experience.jpg', '700', '20', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');
INSERT INTO `special_program` VALUES ('14', 'Birthday celebration in park', 'Birthday celebration in park.jpg', '500', '1', 'Visitors can celebrate birthday on any selected days in park. We recommend to pre book this special program from our booking system. For more updates, terms and conditions please contact with us.');
INSERT INTO `status` VALUES ('1', 'Paid');
INSERT INTO `status` VALUES ('2', 'Refunded');
INSERT INTO `ticket` VALUES ('1', 'Individuals (Spring)', '100', 'Spring');
INSERT INTO `ticket` VALUES ('2', 'Families (Spring)', '200', 'Spring');
INSERT INTO `ticket` VALUES ('3', 'Educational Institutes (Spring)', '50', 'Spring');
INSERT INTO `ticket` VALUES ('4', 'Private Organizations (Spring)', '300', 'Spring');
INSERT INTO `ticket` VALUES ('5', 'Government Officials (Spring)', '50', 'Spring');
INSERT INTO `ticket` VALUES ('6', 'Foreigner (Spring)', '500', 'Spring');
INSERT INTO `ticket` VALUES ('13', 'Individuals (Summer)', '150', 'Summer');
INSERT INTO `ticket` VALUES ('14', 'Families (Summer)', '250', 'Summer');
INSERT INTO `ticket` VALUES ('15', 'Educational Institutes (Summer)', '100', 'Summer');
INSERT INTO `ticket` VALUES ('16', 'Private Organizations (Summer)', '300', 'Summer');
INSERT INTO `ticket` VALUES ('17', 'Government Officials (Summer)', '100', 'Summer');
INSERT INTO `ticket` VALUES ('18', 'Foreigner (Summer)', '600', 'Summer');
INSERT INTO `ticket` VALUES ('19', 'Individuals (Fall)', '70', 'Fall');
INSERT INTO `ticket` VALUES ('20', 'Families (Fall)', '190', 'Fall');
INSERT INTO `ticket` VALUES ('21', 'Educational Institutes (Fall)', '330', 'Fall');
INSERT INTO `ticket` VALUES ('22', 'Private Organizations (Fall)', '330', 'Fall');
INSERT INTO `ticket` VALUES ('23', 'Government Officials (Fall)', '230', 'Fall');
INSERT INTO `ticket` VALUES ('24', 'Foreigner (Fall)', '450', 'Fall');
INSERT INTO `user` VALUES ('1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1781627475');
INSERT INTO `user` VALUES ('2', 'admin2', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', 'admin', '123');
INSERT INTO `user` VALUES ('19', 'fahim', 'fahimaziz2@gmail', 'dcbb9006afaee1296ff36eabe1cddb28', 'admin', '1781627475');
