-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: online_math_exam
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-1ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2020_08_28_152147_create_chapters_table',1),(2,'2020_08_28_152147_create_choices_table',1),(3,'2020_08_28_152147_create_class_members_table',1),(4,'2020_08_28_152147_create_class_tests_table',1),(5,'2020_08_28_152147_create_classes_table',1),(6,'2020_08_28_152147_create_difficulties_table',1),(7,'2020_08_28_152147_create_districts_table',1),(8,'2020_08_28_152147_create_grades_table',1),(9,'2020_08_28_152147_create_provinces_table',1),(10,'2020_08_28_152147_create_questions_table',1),(11,'2020_08_28_152147_create_roles_table',1),(12,'2020_08_28_152147_create_schools_table',1),(13,'2020_08_28_152147_create_subjects_table',1),(14,'2020_08_28_152147_create_test_content_table',1),(15,'2020_08_28_152147_create_test_matrices_table',1),(16,'2020_08_28_152147_create_test_matrix_content_table',1),(17,'2020_08_28_152147_create_test_table',1),(18,'2020_08_28_152147_create_test_types_table',1),(19,'2020_08_28_152147_create_topics_table',1),(20,'2020_08_28_152147_create_user_role_table',1),(21,'2020_08_28_152147_create_users_table',1),(22,'2020_08_28_152147_create_wards_table',1),(23,'2020_08_28_152147_create_work_histories_table',1),(24,'2020_08_28_152147_create_work_history_detail_table',1),(25,'2020_08_28_152157_create_foreign_keys',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-03 15:50:48
