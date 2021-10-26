-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ayniop_db
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `idSubject` int(11) NOT NULL AUTO_INCREMENT,
  `codeSubject` varchar(45) NOT NULL,
  `nameSubject` varchar(45) NOT NULL,
  `idYear` int(11) NOT NULL,
  `idMajor` int(11) NOT NULL,
  PRIMARY KEY (`idSubject`),
  UNIQUE KEY `idSubject_UNIQUE` (`idSubject`),
  UNIQUE KEY `codeSubject_UNIQUE` (`codeSubject`),
  UNIQUE KEY `nameSubject_UNIQUE` (`nameSubject`),
  KEY `subject_year_idYear_idx` (`idYear`),
  KEY `subject_major_idMajor_idx` (`idMajor`),
  CONSTRAINT `subject_major_idMajor` FOREIGN KEY (`idMajor`) REFERENCES `major` (`idMajor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `subject_year_idYear` FOREIGN KEY (`idYear`) REFERENCES `year` (`idYear`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (5,'I3302','Php',6,5),(6,'I2233','Infographics',5,5),(7,'I3350','Android',6,5),(8,'I3335','JavaII',6,5),(9,'I2206','Data Structures',5,5),(13,'B1102','BioMole 1',9,6);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-06 14:15:22
