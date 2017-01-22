-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: e-store
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.17-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` longtext,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (0,'Klenejc','Poderc','admin','$2a$07$4380348hvnjkjvernjk4ue182aqSvnSi2tRSX3NwBgJJR3194ZPui','admin@estore.si');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` longtext,
  `picture` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `id_seller` int(11) DEFAULT NULL,
  `rating_sum` int(11) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `active_article` int(11) NOT NULL,
  `active_seller` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'BATTERY WHEY PROTEIN','proteins',29.8,'Battery Nutrition Whey Protein - visoka količina proteinov.','1.jpg','2000',1,0,0,1,1),(3,'BATTERY WHEY PROTEIN','proteins',29.7,'Battery Nutrition Whey Protein - visoka koli?','3.jpg','2000',1,5,1,1,1),(4,'BATTERY OMEGA 3','fats',6.99,'Battery Omega 3 ima veliko višjo koli?ino ome','4.jpg','1',5,6,2,1,1),(5,'BATTERY WHEY PROTEIN','proteins',29.7,'Battery Nutrition Whey Protein - visoka koli?','5.jpg','2000',1,0,0,1,1),(6,'IRONMAXX 100% WHEY PROTEIN','proteins',19.99,'Obstaja kar nekaj pomembnih prednosti beljako','6.jpg','900',5,0,0,1,1),(7,'USN ORGANIC PEANUT BUTTER','fats',10.99,'USN ORGANIC PEANUT BUTTER je popolnoma narave','7.jpg','1000',4,0,0,1,0),(8,'OLIMP GOLD OMEGA 3 SPORT EDITION','fats',15.99,'Prehransko dopolnilo Omega-3 maš?obne kisline','8.jpg','1',5,0,0,1,1),(9,'OLIMP WHEY PROTEIN COMPLEX 100%','proteins',19.99,'OLIMP WHEY PROTEIN COMPLEX 100% je beljakovin','9.jpg','700',4,0,0,1,0),(10,'BATTERY WHEY PROTEIN','proteins',29.7,'Battery Nutrition Whey Protein - visoka koli?','10.jpg','2000',1,0,0,1,1),(11,'BATTERY WHEY PROTEIN','proteins',29.7,'Battery Nutrition Whey Protein - visoka koli?','11.jpg','2000',1,0,0,1,1),(12,'OLIMP WHEY PROTEIN COMPLEX 100%','proteins',44.99,'OLIMP WHEY PROTEIN COMPLEX 100% je beljakovin','12.jpg','2200',4,0,0,1,0),(13,'BATTERY WHEY PROTEIN','proteins',29.7,'Battery Nutrition Whey Protein - visoka koli?','13.jpg','2000',1,0,0,1,1),(15,'BATTERY GLUTAMINE brez okusa','proteins',13.99,'Glutamin je aminokislina, ki jo je v našem te','15.jpg','500',5,0,0,1,1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (15,2,3,5),(16,2,4,4),(17,1,4,2);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipt`
--

DROP TABLE IF EXISTS `receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipt` (
  `id_receipt` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `id_seller` int(11) DEFAULT NULL,
  `confirmed` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_receipt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipt`
--

LOCK TABLES `receipt` WRITE;
/*!40000 ALTER TABLE `receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sellers` (
  `id_seller` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` longtext,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `active_seller` int(11) NOT NULL,
  PRIMARY KEY (`id_seller`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'Sašo','Kranjc','saso','$2a$07$4380348hvnjkjvernjk4uecp.p3rUPDgODpZjHZGfffgx2tvkAW2y','s.krajnc@gmail.com','Ulica na Brdo 90','Ljubljana','Slovenija',1),(5,'Klemen','Moderc','klemen','$2a$07$4380348hvnjkjvernjk4uecp.p3rUPDgODpZjHZGfffgx2tvkAW2y','kmoderc@gmail.com','Moderčina 20','Moderčovje','Slovenija',1);
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` longtext,
  `email` varchar(45) DEFAULT NULL,
  `phone_num` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `active_user` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Nejc','Povšič','npovsic','$2a$07$4380348hvnjkjvernjk4ue6fiRMBGVqUNFVJleD.YOLzodP3fbQam','npovsic@gmail.com','041245543','Prapretno 24','Radeče','Slovenija',1,6422);
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

-- Dump completed on 2017-01-22 16:41:50
