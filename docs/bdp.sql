CREATE DATABASE  IF NOT EXISTS `bdp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdp`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: bdp
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '1',
  `banned` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('46358501T',1,0,0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Senior Masculi',NULL),(2,'Senior Femeni',NULL),(3,'Junior Masculi',NULL),(4,'Junior Femeni',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkup`
--

DROP TABLE IF EXISTS `checkup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkup` (
  `checkup_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) DEFAULT NULL,
  `player_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `season_id` int(11) NOT NULL,
  `downloaded` int(4) DEFAULT NULL,
  `background_family` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_injuries` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_disease` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_fracture` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_allergy` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_activity` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background_other` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anthropometry_height` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anthropometry_weight` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anthropometry_morphotype` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardio_rhytm` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardio_pressure` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardio_pulses` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardio_ecg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardio_bufs` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardio_oxygen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `musculoskeletal_column` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `musculoskeletal_limb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `musculoskeletal_hamstrings` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `musculoskeletal_varus` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `musculoskeletal_podoscopia` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recommend` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`checkup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkup`
--

LOCK TABLES `checkup` WRITE;
/*!40000 ALTER TABLE `checkup` DISABLE KEYS */;
INSERT INTO `checkup` VALUES (1,0,'46242933F',1,0,'no','no','no','si','no','8h','','187','70','PRIM','OK','135/50','OK','Ritme sinusal a 70x\', eix a 0o, PR 0\'14, QRS 0\'08, sense alteracions del ritme o la repolartizaciÃ³.','NO','98%','OK','NO','CURTS','VALGO','NORMAL','Es recomana control de pes. Es recomana millora d\'estiraments i treball de flexibilitat. Per les exploracions realitzades no presenta contraindicaciÃ³ per la prÃ ctica esportiva'),(2,0,'456456456D',1,0,'no','no','no','si','no','8','','187','70','xx','','x','x','x','x','x','x','x','x','x','x','x'),(3,0,'46242933F',2,0,'no','no','no','si','no','8','','','','','','','','','','','','','','','',''),(4,0,'123123123Q',1,0,'no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no');
/*!40000 ALTER TABLE `checkup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `club` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_mail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` int(4) DEFAULT '1',
  PRIMARY KEY (`club_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES (1,'UESC','img/logos/uesc.jpg','Lluis Curto',NULL,'info@uesc.cat',1),(2,'CEB Sant Jordi','img/logos/santjordi.jpg','Pere Soler','645645645','pistol@pistol.com',1),(4,'Mosh Team yeah!!!','img/logos/IMG_8270.JPG','Oscar','650208444','o.pascu@gmail.com',1),(5,'Locos anonimos','img/logos/IMG_20150331_153219.jpg','Oscar','650208444','o.pascu@gmail.com',1);
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `birth_date` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES ('123123123Q',0,'19820716','20150629',1,1,1,1),('37885124W',0,'19880101','20150629',2,2,2,2),('456456456D',0,'19790330','20150629',4,1,1,1),('46242933F',0,'19820910','20150731',4,4,1,1),('46358501T',0,'19830521','20150520',1,1,1,1);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `season`
--

DROP TABLE IF EXISTS `season`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `season` (
  `season_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(4) DEFAULT '0',
  PRIMARY KEY (`season_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `season`
--

LOCK TABLES `season` WRITE;
/*!40000 ALTER TABLE `season` DISABLE KEYS */;
INSERT INTO `season` VALUES (1,'2015',1),(2,'2016',0),(3,'2017',0),(4,'2018',0),(5,'2019',0);
/*!40000 ALTER TABLE `season` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sport`
--

LOCK TABLES `sport` WRITE;
/*!40000 ALTER TABLE `sport` DISABLE KEYS */;
INSERT INTO `sport` VALUES (1,'Basquet','Basquet 360 Air Jordan'),(2,'Futbol','Futbol total'),(3,'Handbol','Handbol man\'s of steel'),(4,'Hockey','Oju amb el pal'),(5,'Tennis','Edu xupamela');
/*!40000 ALTER TABLE `sport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL,
  `last_login` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('123123123Q','Bernat','de Pablo','bernat.depablo','19820716',0,'20150629','01c19cdc5df04464aaf0c29690b828d2'),('37885124W','Mireia','Bernado Figuerola','mireia.figuerola','19880101',0,'20150617','12eedcd5ff5ba00cd90024725185054b'),('43856621J','Nacho','Mayol Orti','nacho.mayol','19800823',0,'20150617','d435943de53618fe0a154dad0b9167ee'),('456456456D','Dani','Salvat Iturbide','dani.salvat','19790330',0,'20150529','cc87eaefeee854b5ad9731ba2c8a01ac'),('46242933F','Oscar','Pascual Gimeno','oscar.pascual','19820910',0,'','66fef669dc9bc8e8c437e897efc79912'),('46358501T','Eduard','Ortega Carrion','eduard.ortega','19830521',0,'20150617','a1376151b51e9e7054a17c28b9f25cfb');
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

-- Dump completed on 2015-08-27 19:32:55
