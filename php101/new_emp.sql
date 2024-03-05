-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: new_emp
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `two_fields`
--

DROP TABLE IF EXISTS `two_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `two_fields` (
  `recid` int(11) NOT NULL AUTO_INCREMENT,
  `fieldOne` varchar(255) NOT NULL,
  `fieldTwo` varchar(255) NOT NULL,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `two_fields`
--

LOCK TABLES `two_fields` WRITE;
/*!40000 ALTER TABLE `two_fields` DISABLE KEYS */;
INSERT INTO `two_fields` VALUES (1,'Db5It','Db5It'),(2,'e8tvz','e8tvz'),(3,'X2AjF','X2AjF'),(4,'mOBkt','mOBkt'),(5,'9CV92','9CV92'),(6,'5kAxj','5kAxj'),(7,'8gD0J','8gD0J'),(8,'3W0Kg','3W0Kg'),(9,'iNetM','iNetM'),(10,'DbC20','DbC20'),(11,'z30uz','z30uz'),(12,'0xTe7','0xTe7'),(13,'qdm4d','qdm4d'),(14,'Dn4QZ','Dn4QZ');
/*!40000 ALTER TABLE `two_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `recid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`recid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'edited','Db5It.com','Db5It'),(3,'X2AjF','X2AjF.com','X2AjF'),(4,'mOBkt','mOBkt.com','mOBkt'),(5,'9CV92','9CV92.com','9CV92'),(6,'5kAxj','5kAxj.com','5kAxj'),(7,'8gD0J','8gD0J.com','8gD0J'),(8,'3W0Kg','3W0Kg.com','3W0Kg'),(9,'iNetM','iNetM.com','iNetM'),(10,'edited','DbC20.com','DbC20'),(11,'edited','z30uz.com','z30uz'),(12,'edited','0xTe7.com','0xTe7'),(13,'edited','qdm4d.com','qdm4d'),(14,'edited','Dn4QZ.com','Dn4QZ');
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

-- Dump completed on 2024-03-05 13:56:09
