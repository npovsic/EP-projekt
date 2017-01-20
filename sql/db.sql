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
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (0,'Klenejc','Poderc','admin','admin','admin@estore.si');
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
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'BATTERY WHEY PROTEIN','proteins',29.69,'Battery Nutrition Whey Protein - visoka koli?','1','2000',1,8,2),(2,'BATTERY WHEY PROTEIN','proteins',14.39,'Battery Nutrition Whey Protein - visoka koli?','2','800',4,4,1),(3,'OLIMP BCAA XPLODE','proteins',26.99,'BCAA Xplode je izdelek, ki kon?no izpolnjuje ','3','500',1,1,1),(4,'BATTERY OMEGA 3','fats',6.99,'Battery Omega 3 ima veliko višjo koli?ino ome','4','1',5,3,1),(5,'BATTERY PROTEIN PUDDING','pudding',5.99,'Battery je ustvaril zdravo beljakovinsko slad','5','120',1,1,1),(6,'IRONMAXX 100% WHEY PROTEIN','proteins',19.99,'Obstaja kar nekaj pomembnih prednosti beljako','6','900',5,4,1),(7,'USN ORGANIC PEANUT BUTTER','fats',10.99,'USN ORGANIC PEANUT BUTTER je popolnoma narave','7','1000',4,3,1),(8,'OLIMP GOLD OMEGA 3 SPORT EDITION','fats',15.99,'Prehransko dopolnilo Omega-3 maš?obne kisline','8','1',5,4,1),(9,'OLIMP WHEY PROTEIN COMPLEX 100%','proteins',19.99,'OLIMP WHEY PROTEIN COMPLEX 100% je beljakovin','9','700',4,5,1),(10,'OLIMP VITA-MIN MULTIPLE SPORT','vitamins',11.99,'VITA-MIN multiple SPORT je prehransko dopolni','10','60',1,4,1),(11,'BATTERY CREATINE','creatin',8.99,'Battery Creatine vsebuje 100% nerazred?en kre','11','500',1,0,0),(12,'OLIMP WHEY PROTEIN COMPLEX 100%','proteins',44.99,'OLIMP WHEY PROTEIN COMPLEX 100% je beljakovin','12','2200',4,0,0),(13,'BATTERY VIT&MIN','vitamins',6.99,'Vsi vitamini in minerali, ki jih potrebujete ','13','90',1,0,0),(14,'BATTERY BCAA','proteins',23.99,'Battery Nutrition BCAA so razvejane aminokisl','14','500',1,0,0),(15,'BATTERY GLUTAMINE brez okusa','proteins',13.99,'Glutamin je aminokislina, ki jo je v našem te','15','500',5,0,0);
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
  `username` varchar(45) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (4,'npovsic',1,5),(5,'npovsic',2,4),(6,'npovsic',3,1),(7,'npovsic',4,3),(8,'npovsic',5,1),(9,'npovsic',6,4),(10,'npovsic',7,3),(11,'npovsic',8,4),(12,'npovsic',10,4),(13,'npovsic',9,5),(14,'saso',1,3);
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
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_seller`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'Sašo','Kranjc','saso','pass','skrajnc@gmail.com','Ulica na Brdo 90','Ljubljana','Slovenija','true'),(4,'Nejc','Povši?','npovsic','nejc','npovsic@gmail.com','Prapretno 24','Rade?e','Slovenija','true'),(5,'Klemen','Moderc','klemen','klemz','kmoderc@gmail.com','Moder?ina 20','Moder?ovje','Slovenija','true');
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone_num` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nejc','Povši?',NULL,'npovsic','root','npovsic@gmail.com','Prapretno 24','Rade?e','Slovenija',0,0);
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

-- Dump completed on 2017-01-20 11:58:07
