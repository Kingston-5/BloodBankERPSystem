-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: bloodbank
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,1);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `center_id` int DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `center_id` (`center_id`),
  CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`center_id`) REFERENCES `health_centers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,3,2,'2022-12-31 03:00:00',0),(2,3,1,'2023-01-01 20:02:00',2),(3,3,1,'2023-01-02 05:00:00',1),(4,3,2,'2023-01-04 01:03:00',0),(5,2,1,'2023-01-01 13:00:00',2),(6,2,1,'2023-01-02 10:00:00',2),(7,3,1,'2023-01-01 08:00:00',0),(8,3,1,'2023-01-03 10:00:00',2);
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood_clerks`
--

DROP TABLE IF EXISTS `blood_clerks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blood_clerks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `center_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `center_id` (`center_id`),
  CONSTRAINT `blood_clerks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `blood_clerks_ibfk_2` FOREIGN KEY (`center_id`) REFERENCES `health_centers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_clerks`
--

LOCK TABLES `blood_clerks` WRITE;
/*!40000 ALTER TABLE `blood_clerks` DISABLE KEYS */;
INSERT INTO `blood_clerks` VALUES (1,2,1);
/*!40000 ALTER TABLE `blood_clerks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood_orders`
--

DROP TABLE IF EXISTS `blood_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blood_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `center_id` int DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `A_pos` int DEFAULT NULL,
  `A_neg` int DEFAULT NULL,
  `AB_pos` int DEFAULT NULL,
  `AB_neg` int DEFAULT NULL,
  `B_pos` int DEFAULT NULL,
  `B_neg` int DEFAULT NULL,
  `O_pos` int DEFAULT NULL,
  `O_neg` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `center_id` (`center_id`),
  CONSTRAINT `blood_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `blood_orders_ibfk_2` FOREIGN KEY (`center_id`) REFERENCES `health_centers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_orders`
--

LOCK TABLES `blood_orders` WRITE;
/*!40000 ALTER TABLE `blood_orders` DISABLE KEYS */;
INSERT INTO `blood_orders` VALUES (1,2,1,'2022-12-31 06:40:00',0,0,0,0,0,0,0,0,2),(2,2,1,'2022-12-31 06:48:00',0,0,0,0,0,0,0,0,1),(3,2,1,'2022-12-31 06:48:00',0,0,0,0,0,0,0,0,1),(4,2,1,'2022-12-31 07:01:00',2,8,20,10,900,70,82,5,2),(5,2,1,'2022-12-31 07:01:00',10,400,10,30,20,50,80,10,1);
/*!40000 ALTER TABLE `blood_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blood_units`
--

DROP TABLE IF EXISTS `blood_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blood_units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `center_id` int DEFAULT NULL,
  `appointment_id` int DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(11) COLLATE utf8mb4_bin DEFAULT NULL,
  `blood_group` char(3) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `center_id` (`center_id`),
  CONSTRAINT `blood_units_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `blood_units_ibfk_2` FOREIGN KEY (`center_id`) REFERENCES `health_centers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blood_units`
--

LOCK TABLES `blood_units` WRITE;
/*!40000 ALTER TABLE `blood_units` DISABLE KEYS */;
INSERT INTO `blood_units` VALUES (1,3,1,NULL,'2022-12-31 06:25:35','qweasd',NULL),(2,2,1,NULL,'2022-12-31 07:36:40','zxxcvb',NULL),(3,2,1,NULL,'2022-12-31 07:49:17','bnmlkj',NULL),(4,3,1,NULL,'2022-12-31 07:56:49','uiopkl',NULL),(5,3,1,8,'2022-12-31 07:59:58','qwerasdf','A+');
/*!40000 ALTER TABLE `blood_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_centers`
--

DROP TABLE IF EXISTS `health_centers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `health_centers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_centers`
--

LOCK TABLES `health_centers` WRITE;
/*!40000 ALTER TABLE `health_centers` DISABLE KEYS */;
INSERT INTO `health_centers` VALUES (1,'Mbabane government hospital'),(2,'Mbabane Clinic');
/*!40000 ALTER TABLE `health_centers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'m0001_initial.php','2022-12-30 22:13:03'),(2,'m0002_create_users_table.php','2022-12-30 22:13:03'),(3,'m0003_create_health_centers_table.php','2022-12-30 22:13:03'),(4,'m0004_create_admins_table.php','2022-12-30 22:13:03'),(5,'m0005_create_blood_clerks_table.php','2022-12-30 22:13:03'),(6,'m0006_create_appointments_table.php','2022-12-30 22:13:03'),(7,'m0007_create_blood_units_table.php','2022-12-30 22:13:03'),(8,'m0008_create_blood_orders_table.php','2022-12-30 22:13:03'),(9,'m0009_insert_default_user_into_users_table.php','2022-12-30 23:50:01'),(10,'m0010_insert_default_admin_into_admins_table.php','2022-12-30 23:54:28');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone_number` int DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` char(2) COLLATE utf8mb4_bin DEFAULT NULL,
  `blood_type` char(3) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(512) COLLATE utf8mb4_bin NOT NULL,
  `joined` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'superadmin@email.com','Super','Admin',NULL,NULL,NULL,NULL,NULL,'$2y$10$.hc/zFcAMkecKAuuhUC6JOhLDzpgo/UEfflDCS.2YvXdH0qmiwMKe','2022-12-30 23:50:01'),(2,'simphiwe@email.com','Simphiwe','Matimela','Mbabane Mbangweni',78253614,'2003-10-22','F',NULL,'$2y$10$xdpK2Tbi2k6/MIIEIn4Nu.mIZg.2l1htccyObay0dCtEg90X3xwn6','2022-12-31 01:36:24'),(3,'qhawe@email.com','Qhawe','Matimela','Mantshonga Ngculwini Manzini',79736175,'2002-05-27','M',NULL,'$2y$10$ETZb1wVZf6RXCq094.8q8euQdvBSoEUnCJOay.v.cTK9tJYA1RplW','2022-12-31 02:51:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-31 10:05:56
