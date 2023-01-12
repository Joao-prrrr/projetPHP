-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: voilaSiteWeb
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0ubuntu0.20.04.1

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
-- Current Database: `voilaSiteWeb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `voilaSiteWeb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `voilaSiteWeb`;

--
-- Table structure for table `quizReponses`
--

DROP TABLE IF EXISTS `quizReponses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizReponses` (
  `responsesDate` datetime NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `utilityBoat_resp` varchar(50) NOT NULL,
  `forwardBoat_resp` varchar(50) NOT NULL,
  `otherName_resp` varchar(20) NOT NULL,
  `speedUnity_resp` varchar(20) NOT NULL,
  `nauticMiles_resp` varchar(20) NOT NULL,
  `othersSailSports_resp` varchar(25) NOT NULL,
  `windSurfDirection_resp` varchar(50) NOT NULL,
  `foil_resp` varchar(20) NOT NULL,
  `wrongWord_resp` varchar(20) NOT NULL,
  `comments_resp` longtext NOT NULL,
  PRIMARY KEY (`responsesDate`,`fk_userId`),
  KEY `fk_userId` (`fk_userId`),
  CONSTRAINT `quizreponses_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizReponses`
--

LOCK TABLES `quizReponses` WRITE;
/*!40000 ALTER TABLE `quizReponses` DISABLE KEYS */;
INSERT INTO `quizReponses` VALUES ('2023-01-12 08:53:36',20,'colonisations, cargaison','depressionVoile','nautisme','2','millesNautiques','kitesurf, plancheVoile','mat','foil','corde','Top!');
/*!40000 ALTER TABLE `quizReponses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `points` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (20,'Joao le BG','2022-12-08 00:00:00',9);
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

-- Dump completed on 2023-01-12 13:10:06
