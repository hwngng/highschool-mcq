-- MySQL dump 10.19  Distrib 10.3.32-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: mcq_dev
-- ------------------------------------------------------
-- Server version	10.3.32-MariaDB-0ubuntu0.20.04.1
use mcq_dev;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
use mcq_dev;
--
-- Dumping data for table `choice`
--

LOCK TABLES `choice` WRITE;
/*!40000 ALTER TABLE `choice` DISABLE KEYS */;
INSERT INTO `choice` VALUES (0,10,'2',1),(1,10,'3',0),(2,10,'1.9',0),(3,10,'\\(\\sqrt(2)^2\\)',1),(0,11,'3',1),(1,11,'4',0),(2,11,'2.9',0),(3,11,'\\(\\sqrt(3)^2\\)',1),(0,12,'4',1),(1,12,'5',0),(2,12,'3.9',0),(3,12,'\\(\\sqrt(4)^2\\)',1),(0,13,'5',1),(1,13,'6',0),(2,13,'4.9',0),(3,13,'\\(\\sqrt(5)^2\\)',1);
/*!40000 ALTER TABLE `choice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `class_member`
--

LOCK TABLES `class_member` WRITE;
/*!40000 ALTER TABLE `class_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `class_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `class_test`
--

LOCK TABLES `class_test` WRITE;
/*!40000 ALTER TABLE `class_test` DISABLE KEYS */;
/*!40000 ALTER TABLE `class_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES ('10','Lớp 10'),('11','Lớp 11'),('12','Lớp 12');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'The well known Pythagorean theorem \\(x^2 + y^2 = z^2\\) was proved to be invalid for other exponents. Meaning the next equation has no integer solutions:\n\\[ x^n + y^n = z^n \\]',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'\\(< > \\subset \\supset \\subseteq \\supseteq\\) $c = 1$',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'\\(\\sqrt(4) = ?\\)',4,NULL,'Because \\(\\sqrt(4) = \\frac{10}{5}\\)',NULL,NULL,NULL,NULL,NULL),(11,'\\(\\sqrt(9) = ?\\)',4,NULL,'Because \\(\\sqrt(4) = \\frac{18}{2}\\)',NULL,NULL,NULL,NULL,NULL),(12,'\\(\\sqrt(16) = ?\\)',4,NULL,'Because \\(\\sqrt(4) = \\frac{100}{25}\\)',NULL,NULL,NULL,NULL,NULL),(13,'\\(\\sqrt(25) = ?\\)',4,NULL,'Because \\(\\sqrt(4) = \\frac{50}{10}\\)',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin',NULL),(2,'teacher',NULL),(3,'student',NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'THCS Lê Thanh Nghị','','Gia Tân, Gia Lộc, Hải Dương'),(2,'THPT Gia Lộc','','TT Gia Lộc, Gia Lộc, Hải Dương'),(3,'THPT Chuyên Nguyễn Trãi','','Đường Ngô Quyền, TP Hải Dương, Hải Dương'),(4,'THPT Hồng Quang','','Chương Dương, Trần Phú, TP Hải Dương, Hải Dương'),(5,'THPT chuyên Khoa học Tự nhiên','','182 đường Lương Thế Vinh, quận Thanh Xuân, Hà Nội'),(6,'THPT Thăng Long','','Số 44, Tạ Quang Bửu, Hai Bà Trưng, Hà Nội'),(7,'THPT Chuyên Nguyễn Chí Thanh','','08 Lê Duẩn, Phường Nghĩa Tân, Gia Nghĩa, Đăk Nông');
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'Toán',NULL),(2,'Vật Lý',NULL),(3,'Hóa Học',NULL),(4,'Sinh học',NULL),(5,'English',NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,0,'11',NULL,'Kiểm tra ngắn',5,10,NULL,'Bài kiểm tra ngắn cho lớp 11A, trường THPT Gia Lộc',NULL,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_content`
--

LOCK TABLES `test_content` WRITE;
/*!40000 ALTER TABLE `test_content` DISABLE KEYS */;
INSERT INTO `test_content` VALUES (1,0,1,NULL,NULL),(1,0,2,NULL,NULL),(1,0,10,NULL,NULL),(1,0,11,NULL,NULL),(1,0,12,NULL,NULL),(1,0,13,NULL,NULL);
/*!40000 ALTER TABLE `test_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `test_type`
--

LOCK TABLES `test_type` WRITE;
/*!40000 ALTER TABLE `test_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'hung',NULL,'$2y$10$iDhSkFjLBPfyxXrxzXubPec5Xb5jqXF603tRrq02kvFLdH2/fh1ha',NULL,NULL,'Hung','Nguyen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-26 03:55:25',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `work_history`
--

LOCK TABLES `work_history` WRITE;
/*!40000 ALTER TABLE `work_history` DISABLE KEYS */;
INSERT INTO `work_history` VALUES (1,1,1,0,NULL,'2021-12-26 05:50:02',NULL,NULL,NULL);
/*!40000 ALTER TABLE `work_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `work_history_detail`
--

LOCK TABLES `work_history_detail` WRITE;
/*!40000 ALTER TABLE `work_history_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_history_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-26  6:00:14
