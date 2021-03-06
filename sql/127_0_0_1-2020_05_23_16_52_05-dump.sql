-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: yii2
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.19.10.1

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
-- Table structure for table `apple`
--

DROP TABLE IF EXISTS `apple`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apple` (
  `id` int NOT NULL AUTO_INCREMENT,
  `color` varchar(7) NOT NULL,
  `created` int NOT NULL,
  `fell` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `size` float(3,2) NOT NULL DEFAULT '1.00',
  PRIMARY KEY (`id`),
  KEY `apple_created_index` (`created`),
  KEY `apple_fell_index` (`fell`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apple`
--

LOCK TABLES `apple` WRITE;
/*!40000 ALTER TABLE `apple` DISABLE KEYS */;
INSERT INTO `apple` VALUES (1,'#008000',1589783375,NULL,1,1.00),(3,'#00FF00',1589818343,NULL,1,1.00),(4,'#FF0000',1589987003,NULL,1,1.00),(5,'#808000',1589652053,1590246993,3,1.00),(6,'#FFFF00',1590054919,NULL,1,1.00),(7,'#800000',1589846866,NULL,1,1.00),(8,'#800080',1589971416,NULL,1,1.00),(10,'#008080',1590197985,NULL,1,1.00),(11,'#C0C0C0',1589966493,NULL,1,1.00),(12,'#008000',1589999425,NULL,1,1.00),(13,'#FF0000',1590069249,NULL,1,1.00),(14,'#FF0000',1589707398,1590247116,2,0.01),(15,'#808000',1589943065,NULL,1,1.00),(16,'#00FFFF',1589900344,NULL,1,1.00),(17,'#800000',1590137136,NULL,1,1.00),(18,'#FF0000',1589750973,1590247268,2,0.30),(19,'#008000',1590187180,NULL,1,1.00),(20,'#800080',1589965950,NULL,1,1.00),(21,'#0000FF',1589704492,1590247096,2,0.90),(22,'#808000',1589916992,NULL,1,1.00),(23,'#008000',1589967565,NULL,1,1.00),(24,'#800080',1590180879,NULL,1,1.00),(25,'#808080',1590084346,NULL,1,1.00),(26,'#808080',1589691536,1590247094,2,0.10),(27,'#FFFF00',1590020876,NULL,1,1.00),(28,'#000080',1589760595,1590247735,2,0.50),(29,'#000080',1589907989,NULL,1,1.00),(30,'#FF00FF',1589772582,NULL,1,1.00),(32,'#008080',1589943701,NULL,1,1.00),(35,'#008000',1590001675,NULL,1,1.00),(37,'#00FF00',1590156670,NULL,1,1.00),(38,'#808000',1589982556,NULL,1,1.00),(39,'#808000',1590094244,NULL,1,1.00),(40,'#008000',1590216711,NULL,1,1.00),(41,'#FF0000',1589886600,NULL,1,1.00),(42,'#FF00FF',1590169315,NULL,1,1.00),(43,'#808080',1590100756,NULL,1,1.00),(44,'#000000',1590037546,NULL,1,1.00),(45,'#FF00FF',1589761239,NULL,1,1.00),(46,'#000080',1590051756,NULL,1,1.00),(47,'#000080',1589933444,NULL,1,1.00),(48,'#C0C0C0',1590189141,NULL,1,1.00),(49,'#808080',1589923715,NULL,1,1.00),(51,'#008000',1589950404,NULL,1,1.00),(52,'#000000',1590125736,NULL,1,1.00),(53,'#C0C0C0',1589651716,1590246601,3,1.00),(54,'#C0C0C0',1589999442,NULL,1,1.00),(56,'#FF0000',1589918909,NULL,1,1.00);
/*!40000 ALTER TABLE `apple` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1590215837),('m130524_201442_init',1590215843),('m190124_110200_add_verification_token_column_to_user_table',1590215844);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','HP187Mvq7Mmm3CTU80dLkGmni_FUH_lR','$2y$13$EjaPFBnZOQsHdGuHI.xvhuDp1fHpo8hKRSk6yshqa9c5EG8s3C3lO','ExzkCOaYc1L8IOBs4wdTGGbgNiG3Wz1I_1402312317','admin@admin.local',10,1402312317,1402312317,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-23 16:52:05
