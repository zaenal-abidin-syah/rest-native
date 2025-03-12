/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.8-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mahasiswa
-- ------------------------------------------------------
-- Server version	10.11.8-MariaDB-0ubuntu0.24.04.1

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
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES
(1,'Zaenal Abidin Syah','210411100186','210411100186@student.trunojoyo.ac.id'),
(2,'Budi Santoso','210411100187','210411100187@student.trunojoyo.ac.id'),
(3,'Citra Dewi','210411100188','210411100188@student.trunojoyo.ac.id'),
(4,'Dewi Lestari','210411100189','210411100189@student.trunojoyo.ac.id'),
(5,'Eko Prasetyo','210411100190','210411100190@student.trunojoyo.ac.id'),
(6,'Fajar Hidayat','210411100191','210411100191@student.trunojoyo.ac.id'),
(7,'Gita Permata','210411100192','210411100192@student.trunojoyo.ac.id'),
(8,'Hendra Wijaya','210411100193','210411100193@student.trunojoyo.ac.id'),
(9,'Indra Kurniawan','210411100194','210411100194@student.trunojoyo.ac.id'),
(10,'Joko Susilo','210411100195','210411100195@student.trunojoyo.ac.id'),
(11,'Kiki Amalia','210411100196','210411100196@student.trunojoyo.ac.id'),
(12,'Lina Marlina','210411100197','210411100197@student.trunojoyo.ac.id'),
(13,'Maman Subagyo','210411100198','210411100198@student.trunojoyo.ac.id'),
(14,'Nina Puspita','210411100199','210411100199@student.trunojoyo.ac.id'),
(15,'Oki Setiawan','210411100200','210411100200@student.trunojoyo.ac.id'),
(16,'Putu Dwi','210411100201','210411100201@student.trunojoyo.ac.id'),
(17,'Rina Sari','210411100202','210411100202@student.trunojoyo.ac.id'),
(18,'Sari Wulandari','210411100203','210411100203@student.trunojoyo.ac.id'),
(19,'Teguh Pratama','210411100204','210411100204@student.trunojoyo.ac.id'),
(20,'Umar Hidayat','210411100205','210411100205@student.trunojoyo.ac.id');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-12  7:26:55
