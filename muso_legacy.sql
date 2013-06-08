-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: muso
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `band`
--

DROP TABLE IF EXISTS `band`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `band` (
  `bandID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` mediumint(5) unsigned NOT NULL,
  `labelID` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`bandID`),
  UNIQUE KEY `FK_U_band_artistgroup` (`groupID`),
  KEY `FK_band_record_label` (`labelID`),
  CONSTRAINT `FK_band_artistgroup` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_band_record_label` FOREIGN KEY (`labelID`) REFERENCES `label` (`labelID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `band`
--

LOCK TABLES `band` WRITE;
/*!40000 ALTER TABLE `band` DISABLE KEYS */;
INSERT INTO `band` VALUES (34,57,NULL),(35,58,NULL),(36,59,NULL),(37,60,NULL),(38,61,NULL),(39,62,NULL),(40,63,NULL),(41,64,NULL),(42,65,NULL),(43,66,NULL),(44,67,NULL),(45,68,NULL),(46,69,NULL),(47,70,NULL),(48,71,NULL),(49,72,NULL),(50,73,NULL),(51,74,NULL),(52,75,NULL),(53,76,NULL),(54,77,NULL),(55,78,NULL),(56,79,NULL),(57,80,NULL),(58,81,NULL),(59,82,NULL),(60,83,NULL),(61,84,NULL),(62,85,NULL),(63,86,NULL),(64,87,NULL),(65,88,NULL),(66,89,NULL),(67,90,NULL),(68,91,NULL),(69,92,NULL),(70,93,NULL);
/*!40000 ALTER TABLE `band` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `band_event`
--

DROP TABLE IF EXISTS `band_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `band_event` (
  `bandID` mediumint(5) unsigned NOT NULL,
  `eventID` mediumint(5) unsigned NOT NULL,
  `isInternal` char(1) NOT NULL DEFAULT 'Y',
  `bandName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`bandID`,`eventID`),
  KEY `FK_b2e_event` (`eventID`),
  KEY `FK_b2e_band` (`bandID`),
  CONSTRAINT `FK_b2e_band` FOREIGN KEY (`bandID`) REFERENCES `band` (`bandID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_b2e_event` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `band_event`
--

LOCK TABLES `band_event` WRITE;
/*!40000 ALTER TABLE `band_event` DISABLE KEYS */;
/*!40000 ALTER TABLE `band_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `eventID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `promoterID` mediumint(5) unsigned NOT NULL,
  `eventName` varchar(60) NOT NULL,
  PRIMARY KEY (`eventID`),
  KEY `FK_event_promoter` (`promoterID`),
  CONSTRAINT `FK_event_promoter` FOREIGN KEY (`promoterID`) REFERENCES `promoter` (`promoterID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre_lookup`
--

DROP TABLE IF EXISTS `genre_lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre_lookup` (
  `genreID` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `genre` varchar(30) NOT NULL,
  PRIMARY KEY (`genreID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre_lookup`
--

LOCK TABLES `genre_lookup` WRITE;
/*!40000 ALTER TABLE `genre_lookup` DISABLE KEYS */;
/*!40000 ALTER TABLE `genre_lookup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `groupID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `profilePicURL` varchar(80) DEFAULT NULL,
  `websiteURL` varchar(60) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (57,'The band','C:\\xampp\\htdocs\\muso\\protected\\data\\group\\57\\gbday14.jpg','www.grubmusic.co.uk','Stuff about us'),(58,'The moves',NULL,'www.grubmusic.co.uk','the moves dstuff'),(59,'The moves',NULL,'www.grubmusic.co.uk','the moves dstuff'),(60,'The moves','C:\\xampp\\htdocs\\muso\\protected\\data\\bands\\60\\Image10.jpg','www.grubmusic.co.uk','the moves dstuff'),(61,'The Baskervilles','C:\\xampp\\htdocs\\muso\\protected\\data\\bands\\61\\profilePic.jpg','www.grubmusic.co.uk','the basj dstuff'),(62,'The freds','C:\\xampp\\htdocs\\muso\\protected\\data\\bands\\62\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(63,'The gooons',NULL,'www.grubmusic.co.uk','asd'),(64,'The gooons',NULL,'www.grubmusic.co.uk','asd'),(65,'The gooons',NULL,'www.grubmusic.co.uk','asd'),(66,'The gooons','C:\\xampp\\htdocs\\muso\\protected\\data\\mgroupbase\\66\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(67,'The 2222','C:\\xampp\\htdocs\\muso\\protected\\data\\band\\67\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(68,'The 444','C:\\xampp\\htdocs\\muso\\protected\\data\\band\\68\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(69,'The 555','C:\\xampp\\htdocs\\muso\\protected\\data\\band\\69\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(70,'The 666','C:\\xampp\\htdocs\\muso\\protected\\data\\band\\70\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(71,'The 666','C:\\xampp\\htdocs\\muso\\protected\\data\\band\\71\\profile_pic.JPG','www.grubmusic.co.uk','asd'),(72,'Gum','/muso/data/band/72','sdf','ff'),(73,'Teest','/muso/data/band/73/profile_pic.JPG','ds','sdf'),(74,'asdasd','muso/data/band/74/profile_pic.JPG','d','d'),(75,'ew','data/band/75/profile_pic.JPG','r','r'),(76,'ghf',NULL,'fgh','fgh'),(77,'ghf',NULL,'fgh','fgh'),(78,'gf',NULL,'gfh','gfh'),(79,'h',NULL,'fgh','ghf'),(80,'h',NULL,'fgh','ghf'),(81,'h',NULL,'fgh','ghf'),(82,'h','data/band/82/profile_pic.JPG','fgh','ghf'),(83,'dsf','static/band/83/profile_pic.JPG','sdf','dsf'),(84,'l','/muso/static/band/84/profile_pic.JPG','kjl','kjl'),(85,'Yum','/muso/static/band/85/profile_pic.JPG','asd','asd'),(86,'Richard\'s army of squirells','/muso/static/band/86/profile_pic.JPG','www.grubmusic.co.uk','asdasdasd Tthatalhrf aj'),(87,'Werzel',NULL,'asdasd','ddddd'),(88,'Werzel','/muso/static/band/Werzel_88/profile_pic.jpg','asdasd','ddddd'),(89,'iii','/muso/static/band/iii_89/profile_pic.JPG','tyu','uuuu'),(90,'iii','/muso/static/band/iii_90/profile_pic.JPG','tyu','uuuu'),(91,'iii','/muso/static/band/iii_91/profile_pic.JPG','tyu','uuuu'),(92,'QWERTT','/muso/static/band/QWERTT_92/profile_pic.JPG','sdf','dsfff'),(93,'QWERTT','/muso/static/band/QWERTT_93/profile_pic.JPG','sdf','dsfff');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_genre`
--

DROP TABLE IF EXISTS `group_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_genre` (
  `genreID` smallint(3) unsigned NOT NULL,
  `groupID` mediumint(5) unsigned NOT NULL,
  PRIMARY KEY (`genreID`,`groupID`),
  KEY `FK_g2ag_artistgroup` (`groupID`),
  KEY `FK_g2ag_genre_lookup` (`genreID`),
  CONSTRAINT `FK_g2ag_artistgroup` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_g2ag_genre_lookup` FOREIGN KEY (`genreID`) REFERENCES `genre_lookup` (`genreID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_genre`
--

LOCK TABLES `group_genre` WRITE;
/*!40000 ALTER TABLE `group_genre` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_member`
--

DROP TABLE IF EXISTS `group_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_member` (
  `memberID` mediumint(5) unsigned NOT NULL,
  `groupID` mediumint(5) unsigned NOT NULL,
  `isInternal` char(1) NOT NULL DEFAULT 'Y',
  `memberName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`memberID`,`groupID`),
  KEY `FK_m2ag_artistgroup` (`groupID`),
  KEY `FK_m2ag_member` (`memberID`),
  CONSTRAINT `FK_m2ag_artistgroup` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_m2ag_member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_member`
--

LOCK TABLES `group_member` WRITE;
/*!40000 ALTER TABLE `group_member` DISABLE KEYS */;
INSERT INTO `group_member` VALUES (18,84,'1',NULL),(18,93,'1',NULL);
/*!40000 ALTER TABLE `group_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instrument_lookup`
--

DROP TABLE IF EXISTS `instrument_lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrument_lookup` (
  `instrumentID` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `instrument` varchar(30) NOT NULL,
  PRIMARY KEY (`instrumentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instrument_lookup`
--

LOCK TABLES `instrument_lookup` WRITE;
/*!40000 ALTER TABLE `instrument_lookup` DISABLE KEYS */;
/*!40000 ALTER TABLE `instrument_lookup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label`
--

DROP TABLE IF EXISTS `label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `label` (
  `labelID` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` mediumint(5) unsigned NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`labelID`),
  UNIQUE KEY `FK_U_record_label_artistgroup` (`groupID`),
  CONSTRAINT `FK_record_label_artistgroup` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label`
--

LOCK TABLES `label` WRITE;
/*!40000 ALTER TABLE `label` DISABLE KEYS */;
/*!40000 ALTER TABLE `label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `memberID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(40) CHARACTER SET latin1 NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `password` char(32) NOT NULL,
  `profilePicURL` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `keepMe_hash` char(32) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (18,'Rich','G','grubby','richardgarner@hotmail.co.uk','ce319c5742ac2a67d75b25646c12e383','user_data/profile_pics/grubby_cropped.jpg',NULL,'active'),(19,'Sarah','Canning','scanning','scanning-design@gmail.com','ce319c5742ac2a67d75b25646c12e383','','','active'),(20,'Lou','Reed','loureed','lou@test.com','vicious',NULL,NULL,'active'),(21,'Jimi','Hendrix','jhendrix','jh@test.com','voodoo',NULL,NULL,'active'),(22,'Tom','Waits','twaits','tw@test.com','password',NULL,NULL,'active'),(23,'Graham','Coxon','gcoxon','gcoxon@test.com','f1a1ae48c7524b29621000c59705969d',NULL,NULL,'active'),(24,'George','Clinton','gclinton','gc@test.com','fbbac1b1eff38282efb27ee78d84cec8',NULL,NULL,'active'),(25,'bootsy','collins','bcollins','bc@test.com','fbbac1b1eff38282efb27ee78d84cec8',NULL,NULL,'active'),(35,'Bob','Dobbs','bobd','bob@dobb.com','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,'active'),(36,'Bob','Dobbs','bobd','bob@dobb.com','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,'active'),(37,'Bob','Dobbs','bobd','bob@dobb.com','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,'active'),(38,'Bob','Dobbs','bobd','bob@dobb.com','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,'active'),(39,'Joni','Mitchell','joni','userA@localhost','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,'inactive'),(40,'James','Brown','jb','userA@localhost','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,NULL),(41,'James','Brown','jb','userA@localhost','ce319c5742ac2a67d75b25646c12e383',NULL,NULL,NULL),(42,'J','d','as','userA@localhost','1d4a562e618139fea73ebcf15495e256',NULL,NULL,NULL),(43,'J','d','as','userA@localhost','d95bd0ba1591655dacaf61b4426d3c19',NULL,NULL,NULL),(44,'Jeff','Bridges','jbridges','userA@localhost','1d4a562e618139fea73ebcf15495e256',NULL,NULL,'active'),(45,'Fred','Fruit','froo','userA@localhost','1d4a562e618139fea73ebcf15495e256',NULL,NULL,'active'),(46,'Sue','Ker','sue','userA@localhost','c1eb9fdee6c60ad86e84ca2a6b6ba520',NULL,NULL,'active'),(47,'r','d','er','userA@localhost','1d4a562e618139fea73ebcf15495e256',NULL,NULL,'active'),(48,'Jimi','Hendrix','jhendrix','userA@localhost','1d4a562e618139fea73ebcf15495e256',NULL,NULL,'inactive'),(49,'Jimi','Hendrix','jhendrix','userA@localhost','1d4a562e618139fea73ebcf15495e256',NULL,NULL,'active');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_activation`
--

DROP TABLE IF EXISTS `member_activation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_activation` (
  `regkey` char(32) NOT NULL,
  `memberID` mediumint(5) unsigned NOT NULL,
  `variables` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`regkey`,`memberID`),
  KEY `FK_memberreg_member` (`memberID`),
  CONSTRAINT `FK_memberreg_member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_activation`
--

LOCK TABLES `member_activation` WRITE;
/*!40000 ALTER TABLE `member_activation` DISABLE KEYS */;
INSERT INTO `member_activation` VALUES ('171dde68ce28f8acdd38dee1e22a151f',44,'group=band;action=create'),('1e0873e0250fc437949879c37733a9c8',45,'group=band;action=join'),('4bbb1a37335604bbb8aa91479aa629b1',38,'group=band;action=create'),('54440b28f177de825b60c2078f2e04eb',39,'group=band;action=create'),('680d45e5fcd64eddec2e6bc3d0c8dcbe',43,'group=band;action=create'),('6d712e970c97f13ec34cc2d45e9386ef',42,'group=band;action=create'),('77563f8b0fcd1858f8e86c60cfe08af9',46,'group=band;action=join'),('7fedbb3e8d91e4fed5900153b352637e',41,'group=band;action=create'),('b2535019a8804148a76d619d747480b1',49,'group=band;action=create'),('bef2d0ca1fd48e0131c5b79333e88850',40,'group=band;action=create'),('f633c38eb73f48b13f0e8a9b3812d7de',47,'group=band;action=create'),('fd482a97abb0f87d747874df329b11cb',48,'group=band;action=create');
/*!40000 ALTER TABLE `member_activation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_instrument`
--

DROP TABLE IF EXISTS `member_instrument`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_instrument` (
  `memberID` mediumint(5) unsigned NOT NULL,
  `instrumentID` smallint(3) unsigned NOT NULL,
  `skillLevel` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`memberID`,`instrumentID`),
  KEY `FK_i2m_instrument_lookup` (`instrumentID`),
  KEY `FK_i2m_member` (`memberID`),
  CONSTRAINT `FK_i2m_instrument_lookup` FOREIGN KEY (`instrumentID`) REFERENCES `instrument_lookup` (`instrumentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_i2m_member` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_instrument`
--

LOCK TABLES `member_instrument` WRITE;
/*!40000 ALTER TABLE `member_instrument` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_instrument` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producer`
--

DROP TABLE IF EXISTS `producer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producer` (
  `producerID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` mediumint(5) unsigned NOT NULL,
  `labelID` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`producerID`),
  UNIQUE KEY `FK_U_producer_artistgroup` (`groupID`),
  KEY `FK_producer_record_label` (`labelID`),
  CONSTRAINT `FK_producer_artistgroup` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_producer_record_label` FOREIGN KEY (`labelID`) REFERENCES `label` (`labelID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producer`
--

LOCK TABLES `producer` WRITE;
/*!40000 ALTER TABLE `producer` DISABLE KEYS */;
/*!40000 ALTER TABLE `producer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promoter`
--

DROP TABLE IF EXISTS `promoter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promoter` (
  `promoterID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `groupID` mediumint(5) unsigned NOT NULL,
  PRIMARY KEY (`promoterID`),
  UNIQUE KEY `FK_U_promoter_artistgroup` (`groupID`),
  CONSTRAINT `FK_promoter_artistgroup` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promoter`
--

LOCK TABLES `promoter` WRITE;
/*!40000 ALTER TABLE `promoter` DISABLE KEYS */;
/*!40000 ALTER TABLE `promoter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `song` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `groupID` mediumint(5) unsigned DEFAULT NULL,
  `artUrl` varchar(100) DEFAULT NULL,
  `bpm` int(11) DEFAULT NULL,
  `songUrl` varchar(100) NOT NULL,
  `wavformUrl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_song_group` (`groupID`),
  CONSTRAINT `FK_song_group` FOREIGN KEY (`groupID`) REFERENCES `group` (`groupID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `song`
--

LOCK TABLES `song` WRITE;
/*!40000 ALTER TABLE `song` DISABLE KEYS */;
INSERT INTO `song` VALUES (1,'Song 1',93,'/muso/static/QWERTT_93/songs/song1.JPG',120,'/muso/static/band/QWERTT_93/songs/song1.mp3','/muso/static/band/QWERTT_93/songs/song1_waveform.png'),(2,'Song 2',93,'/muso/static/QWERTT_93/songs/bb1.JPG',100,'/muso/static/band/QWERTT_93/songs/bb1.mp3','/muso/static/band/QWERTT_93/songs/bb1_waveform.png'),(3,'Song 3',93,'/muso/static/QWERTT_93/songs/bb2.jpg',100,'/muso/static/band/QWERTT_93/songs/bb2.mp3','/muso/static/band/QWERTT_93/songs/bb2_waveform.png'),(4,'Song 4',93,'/muso/static/QWERTT_93/songs/bb3.JPG',100,'/muso/static/band/QWERTT_93/songs/bb3.mp3','/muso/static/band/QWERTT_93/songs/bb3_waveform.png');
/*!40000 ALTER TABLE `song` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-04-28 19:44:05
