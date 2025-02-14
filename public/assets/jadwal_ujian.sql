CREATE DATABASE  IF NOT EXISTS `jadwal_ujian` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `jadwal_ujian`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: jadwal_ujian
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `templahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `jk` enum('lk','pr','nd') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nd',
  `alamat` longtext COLLATE utf8mb4_unicode_ci,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guru_nip_unique` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (1,'198609262015052001','Yusnimar KH, S.Pd','Padang','1986-02-06','pr',NULL,'082185968596','yusnimar@mail.com','2025-02-14 05:11:24','2025-02-14 05:11:24'),(2,'198609262015052002','Dra. Zuhra Catri','Padang','1986-02-06','pr',NULL,'082185968595','zuhra@mail.com',NULL,NULL),(3,'198609262015052003','Rina Yanuar, S.Pd','Padang','1986-02-06','pr',NULL,'082185968123','rina@mail.com',NULL,NULL),(4,'198609262015052004','Dra. Elismarita','Padang','1986-02-06','pr',NULL,'082185968432','elismarita@mail.com',NULL,NULL),(5,'198609262015052005','Eliza, S.Pd','Padang','1986-02-06','pr',NULL,'082185968243','eliza@mail.com',NULL,NULL),(6,'198609262015052006','Betri Erlina, S.Pd','Padang','1986-02-06','pr',NULL,'082185968652','erlina@mail.com',NULL,NULL),(7,'198609262015052007','Zaidati, S.Ag','Padang','1986-02-06','pr',NULL,'082185968675','zaidati@mail.com',NULL,NULL),(8,'198609262015052008','Eni Darvita, S.Pd','Padang','1986-02-06','pr',NULL,'082185967894','darvita@mail.com',NULL,NULL),(9,'198609262015052009','Nursen, S.Pd ','Padang','1986-02-06','pr',NULL,'082185968523','nursen@mail.com',NULL,NULL),(10,'198609262015052010','Veriyanti, S.Pd','Padang','1986-02-06','pr',NULL,'082185969632','veriyanti@mail.com',NULL,NULL),(11,'198609262015052011','Dra. Nestri Redvi Yanti','Padang','1986-02-06','pr',NULL,'082185966512','nestri@mail.com',NULL,NULL),(12,'198609262015052012','Yatini, S.Pd','Padang','1986-02-06','pr',NULL,'082185966453','yatini@mail.com',NULL,NULL),(13,'198609262015052013','Rudi Maiyanto, S.Pd','Padang','1986-02-06','pr',NULL,'082185963216','rudi@mail.com',NULL,NULL),(14,'198609262015052014','Fitri Ramadhanis, M.Pd','Padang','1986-02-06','pr',NULL,'082185965231','fitri@mail.com',NULL,NULL),(15,'198609262015052015','Roza Nofiani, S.Pd','Padang','1986-02-06','pr',NULL,'082185967456','roza@mail.com',NULL,NULL),(16,'198609262015052016','Isnaini, S.Pd','Padang','1986-02-06','pr',NULL,'082185968546','isnaini@mail.com',NULL,NULL),(17,'198609262015052017','Wilda Irsyad, S.Pd.I','Padang','1986-02-06','pr',NULL,'082185967458','wilda@mail.com',NULL,NULL),(18,'198609262015052018','Ferry Fitrianto, S.Pd','Padang','1986-02-06','pr',NULL,'082185969658','ferry@mail.com',NULL,NULL),(19,'198609262015052019','Pipi Amelia, S.Pd','Padang','1986-02-06','pr',NULL,'082185964521','pipi@mail.com',NULL,NULL),(20,'198609262015052020','Nelpariani, S.Pd','Padang','1986-02-06','pr',NULL,'082185964632','nelpariani@mail.com',NULL,NULL),(21,'198609262015052021','Cicy Septina Permatasari, S.Pd','Padang','1986-02-06','pr',NULL,'082185964654','septiana@mail.com',NULL,NULL),(22,'198609262015052022','Lona Pusika, S.Kom','Padang','1986-02-06','pr',NULL,'082185964741','lona@mail.com',NULL,NULL),(23,'198609262015052023','Oktriani, S.Sos','Padang','1986-02-06','pr',NULL,'082185964852','oktriani@mail.com',NULL,NULL),(24,'198609262015052024','Eva Febriany, S.Pd','Padang','1986-02-06','pr',NULL,'082185964963','febriani@mail.com',NULL,NULL),(25,'198609262015052025','Altika Sarah, S.Pd','Padang','1986-02-06','pr',NULL,'082185964123','altika@mail.com',NULL,NULL),(26,'198609262015052026','Nadya Anggita, S.Pd','Padang','1986-02-06','pr',NULL,'082185964321','anggita@mail.com',NULL,NULL),(27,'198609262015052027','Emilda Efrita, S.Pd','Padang','1986-02-06','pr',NULL,'082185964456','emilda@mail.com',NULL,NULL),(28,'198609262015052028','Yuni Elvika, S.Pd','Padang','1986-02-06','pr',NULL,'082185964654','yuni@mail.com',NULL,NULL),(29,'198609262015052029','Rizka Nova Gusman, S.Pd','Padang','1986-02-06','pr',NULL,'082185964789','rizka@mail.com',NULL,NULL),(30,'198609262015052030','Nadia Angelina','Padang','1986-02-06','pr',NULL,'082185964987','angelina@mail.com',NULL,NULL),(31,'198609262015052031','Khairunnisa','Padang','1986-02-06','pr',NULL,'082185964951','khairunnisa@mail.com',NULL,NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_ujian`
--

DROP TABLE IF EXISTS `jadwal_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal_ujian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idmtpelajaran` bigint unsigned DEFAULT NULL,
  `hari_ujian` date NOT NULL,
  `waktu_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idkelas` bigint unsigned DEFAULT NULL,
  `idguru` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_ujian_idmtpelajaran_foreign` (`idmtpelajaran`),
  KEY `jadwal_ujian_idkelas_foreign` (`idkelas`),
  KEY `jadwal_ujian_idguru_foreign` (`idguru`),
  CONSTRAINT `jadwal_ujian_idguru_foreign` FOREIGN KEY (`idguru`) REFERENCES `guru` (`id`) ON DELETE SET NULL,
  CONSTRAINT `jadwal_ujian_idkelas_foreign` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`id`) ON DELETE SET NULL,
  CONSTRAINT `jadwal_ujian_idmtpelajaran_foreign` FOREIGN KEY (`idmtpelajaran`) REFERENCES `mata_pelajaran` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_ujian`
--

LOCK TABLES `jadwal_ujian` WRITE;
/*!40000 ALTER TABLE `jadwal_ujian` DISABLE KEYS */;
INSERT INTO `jadwal_ujian` VALUES (1,1,'2025-06-02','07:30','09:30',12,17,'2025-02-14 07:38:38','2025-02-14 07:38:38'),(2,1,'2025-06-02','07:30','09:30',13,8,NULL,NULL),(3,1,'2025-06-02','07:30','09:30',14,6,NULL,NULL),(4,1,'2025-06-02','07:30','09:30',15,24,NULL,NULL),(5,1,'2025-06-02','07:30','09:30',16,18,NULL,NULL),(6,1,'2025-06-02','07:30','09:30',7,7,NULL,NULL),(7,1,'2025-06-02','07:30','09:30',8,14,NULL,NULL),(8,1,'2025-06-02','07:30','09:30',9,29,NULL,NULL),(9,1,'2025-06-02','07:30','09:30',10,28,NULL,NULL),(10,1,'2025-06-02','07:30','09:30',11,16,NULL,NULL),(11,1,'2025-06-02','07:30','09:30',1,5,NULL,NULL),(12,1,'2025-06-02','07:30','09:30',2,23,NULL,NULL),(13,1,'2025-06-02','07:30','09:30',3,3,NULL,NULL),(14,1,'2025-06-02','07:30','09:30',4,9,NULL,NULL),(15,1,'2025-06-02','07:30','09:30',5,11,NULL,NULL),(16,1,'2025-06-02','07:30','09:30',6,2,NULL,NULL),(17,2,'2025-06-02','10:00','11:30',12,13,'2025-02-14 07:45:59','2025-02-14 07:45:59'),(18,2,'2025-06-02','10:00','11:30',13,12,NULL,NULL),(19,2,'2025-06-02','10:00','11:30',14,9,NULL,NULL),(20,2,'2025-06-02','10:00','11:30',15,26,NULL,NULL),(21,2,'2025-06-02','10:00','11:30',16,15,NULL,NULL),(22,2,'2025-06-02','10:00','11:30',7,16,NULL,NULL),(23,2,'2025-06-02','10:00','11:30',8,21,NULL,NULL),(24,2,'2025-06-02','10:00','11:30',9,19,NULL,NULL),(25,2,'2025-06-02','10:00','11:30',10,6,NULL,NULL),(26,2,'2025-06-02','10:00','11:30',11,10,NULL,NULL),(27,2,'2025-06-02','10:00','11:30',1,25,NULL,NULL),(28,2,'2025-06-02','10:00','11:30',2,20,NULL,NULL),(29,2,'2025-06-02','10:00','11:30',3,28,NULL,NULL),(30,2,'2025-06-02','10:00','11:30',4,3,NULL,NULL),(31,2,'2025-06-02','10:00','11:30',5,22,NULL,NULL),(32,2,'2025-06-02','10:00','11:30',6,4,NULL,NULL),(33,3,'2025-06-03','07:30','09:30',12,11,'2025-02-14 08:33:48','2025-02-14 08:33:48'),(34,3,'2025-06-03','07:30','09:30',13,1,NULL,NULL),(35,3,'2025-06-03','07:30','09:30',14,7,NULL,NULL),(36,3,'2025-06-03','07:30','09:30',15,19,NULL,NULL),(37,3,'2025-06-03','07:30','09:30',16,25,NULL,NULL),(38,3,'2025-06-03','07:30','09:30',7,5,NULL,NULL),(39,3,'2025-06-03','07:30','09:30',8,2,NULL,NULL),(40,3,'2025-06-03','07:30','09:30',9,22,NULL,NULL),(41,3,'2025-06-03','07:30','09:30',10,4,NULL,NULL),(42,3,'2025-06-03','07:30','09:30',11,6,NULL,NULL),(43,3,'2025-06-03','07:30','09:30',1,18,NULL,NULL),(44,3,'2025-06-03','07:30','09:30',2,13,NULL,NULL),(45,3,'2025-06-03','07:30','09:30',3,17,NULL,NULL),(46,3,'2025-06-03','07:30','09:30',4,16,NULL,NULL),(47,3,'2025-06-03','07:30','09:30',5,14,NULL,NULL),(48,3,'2025-06-03','07:30','09:30',6,23,NULL,NULL),(49,4,'2025-06-03','10:00','11:30',12,2,'2025-02-14 08:37:16','2025-02-14 08:37:16'),(50,4,'2025-06-03','10:00','11:30',13,17,NULL,NULL),(51,4,'2025-06-03','10:00','11:30',14,5,NULL,NULL),(52,4,'2025-06-03','10:00','11:30',15,10,NULL,NULL),(53,4,'2025-06-03','10:00','11:30',16,21,NULL,NULL),(54,4,'2025-06-03','10:00','11:30',7,12,NULL,NULL),(55,4,'2025-06-03','10:00','11:30',8,1,NULL,NULL),(56,4,'2025-06-03','10:00','11:30',9,24,NULL,NULL),(57,4,'2025-06-03','10:00','11:30',10,25,NULL,NULL),(58,4,'2025-06-03','10:00','11:30',11,8,NULL,NULL),(59,4,'2025-06-03','10:00','11:30',1,15,NULL,NULL),(60,4,'2025-06-03','10:00','11:30',2,9,NULL,NULL),(61,4,'2025-06-03','10:00','11:30',3,20,NULL,NULL),(62,4,'2025-06-03','10:00','11:30',4,23,NULL,NULL),(63,4,'2025-06-03','10:00','11:30',5,3,NULL,NULL),(64,4,'2025-06-03','10:00','11:30',6,22,NULL,NULL),(65,5,'2025-06-04','07:30','09:30',12,10,'2025-02-14 08:40:31','2025-02-14 08:40:31'),(66,5,'2025-06-04','07:30','09:30',13,16,NULL,NULL),(67,5,'2025-06-04','07:30','09:30',14,8,NULL,NULL),(68,5,'2025-06-04','07:30','09:30',15,6,NULL,NULL),(69,5,'2025-06-04','07:30','09:30',16,19,NULL,NULL),(70,5,'2025-06-04','07:30','09:30',7,3,NULL,NULL),(71,5,'2025-06-04','07:30','09:30',8,20,NULL,NULL),(72,5,'2025-06-04','07:30','09:30',9,13,NULL,NULL),(73,5,'2025-06-04','07:30','09:30',10,14,NULL,NULL),(74,5,'2025-06-04','07:30','09:30',11,23,NULL,NULL),(75,5,'2025-06-04','07:30','09:30',1,29,NULL,NULL),(76,5,'2025-06-04','07:30','09:30',2,4,NULL,NULL),(77,5,'2025-06-04','07:30','09:30',3,18,NULL,NULL),(78,5,'2025-06-04','07:30','09:30',4,15,NULL,NULL),(79,5,'2025-06-04','07:30','09:30',5,17,NULL,NULL),(80,5,'2025-06-04','07:30','09:30',6,27,NULL,NULL),(81,6,'2025-06-04','10:00','11:30',12,25,'2025-02-14 08:44:38','2025-02-14 08:44:38'),(82,6,'2025-06-04','10:00','11:30',13,22,NULL,NULL),(83,6,'2025-06-04','10:00','11:30',14,1,NULL,NULL),(84,6,'2025-06-04','10:00','11:30',15,13,NULL,NULL),(85,6,'2025-06-04','10:00','11:30',16,14,NULL,NULL),(86,6,'2025-06-04','10:00','11:30',7,27,NULL,NULL),(87,6,'2025-06-04','10:00','11:30',8,18,NULL,NULL),(88,6,'2025-06-04','10:00','11:30',9,10,NULL,NULL),(89,6,'2025-06-04','10:00','11:30',10,29,NULL,NULL),(90,6,'2025-06-04','10:00','11:30',11,11,NULL,NULL),(91,6,'2025-06-04','10:00','11:30',1,24,NULL,NULL),(92,6,'2025-06-04','10:00','11:30',2,2,NULL,NULL),(93,6,'2025-06-04','10:00','11:30',3,7,NULL,NULL),(94,6,'2025-06-04','10:00','11:30',4,8,NULL,NULL),(95,6,'2025-06-04','10:00','11:30',5,5,NULL,NULL),(96,6,'2025-06-04','10:00','11:30',6,21,NULL,NULL),(97,1,'2025-06-02','07:30','09:30',17,26,'2025-02-14 08:50:39','2025-02-14 08:52:20'),(98,1,'2025-06-02','07:30','09:30',18,25,'2025-02-14 08:53:44','2025-02-14 08:53:44'),(99,2,'2025-06-02','10:00','11:30',17,1,'2025-02-14 08:54:23','2025-02-14 08:54:23'),(100,2,'2025-06-02','10:00','11:30',18,29,'2025-02-14 08:54:56','2025-02-14 08:54:56'),(101,3,'2025-06-03','07:30','09:30',17,21,'2025-02-14 08:55:31','2025-02-14 08:55:31'),(102,3,'2025-06-03','07:30','09:30',18,30,'2025-02-14 08:56:03','2025-02-14 09:56:34'),(103,4,'2025-06-03','10:00','11:30',17,19,'2025-02-14 08:56:46','2025-02-14 08:56:46'),(104,4,'2025-06-03','10:00','11:30',18,31,'2025-02-14 08:57:17','2025-02-14 08:57:17'),(105,5,'2025-06-04','07:30','09:30',17,12,'2025-02-14 08:57:54','2025-02-14 08:57:54'),(106,5,'2025-06-04','07:30','09:30',18,25,'2025-02-14 08:58:32','2025-02-14 08:58:32'),(107,6,'2025-06-04','10:00','11:30',17,9,'2025-02-14 08:59:08','2025-02-14 08:59:08'),(108,6,'2025-06-04','10:00','11:30',18,19,'2025-02-14 08:59:38','2025-02-14 08:59:38'),(109,7,'2025-06-05','07:30','09:30',12,15,'2025-02-14 09:00:30','2025-02-14 09:00:30'),(110,7,'2025-06-05','07:30','09:30',13,3,NULL,NULL),(111,7,'2025-06-05','07:30','09:30',14,2,NULL,NULL),(112,7,'2025-06-05','07:30','09:30',15,7,NULL,NULL),(113,7,'2025-06-05','07:30','09:30',16,12,NULL,NULL),(114,7,'2025-06-05','07:30','09:30',7,11,NULL,NULL),(115,7,'2025-06-05','07:30','09:30',8,9,NULL,NULL),(116,7,'2025-06-05','07:30','09:30',9,4,NULL,NULL),(117,7,'2025-06-05','07:30','09:30',10,20,NULL,NULL),(118,7,'2025-06-05','07:30','09:30',11,22,NULL,NULL),(119,7,'2025-06-05','07:30','09:30',1,8,NULL,NULL),(120,7,'2025-06-05','07:30','09:30',2,25,NULL,NULL),(121,7,'2025-06-05','07:30','09:30',3,21,NULL,NULL),(122,7,'2025-06-05','07:30','09:30',4,10,NULL,NULL),(123,7,'2025-06-05','07:30','09:30',5,28,NULL,NULL),(124,7,'2025-06-05','07:30','09:30',6,26,NULL,NULL),(125,7,'2025-06-05','07:30','09:30',17,24,NULL,NULL),(126,7,'2025-06-05','07:30','09:30',18,31,NULL,NULL),(127,8,'2025-06-05','10:00','11:30',12,1,'2025-02-14 09:03:55','2025-02-14 09:03:55'),(128,8,'2025-06-05','10:00','11:30',13,28,NULL,NULL),(129,8,'2025-06-05','10:00','11:30',14,18,NULL,NULL),(130,8,'2025-06-05','10:00','11:30',15,23,NULL,NULL),(131,8,'2025-06-05','10:00','11:30',16,24,NULL,NULL),(132,8,'2025-06-05','10:00','11:30',7,4,NULL,NULL),(133,8,'2025-06-05','10:00','11:30',8,15,NULL,NULL),(134,8,'2025-06-05','10:00','11:30',9,17,NULL,NULL),(135,8,'2025-06-05','10:00','11:30',10,13,NULL,NULL),(136,8,'2025-06-05','10:00','11:30',11,3,NULL,NULL),(137,8,'2025-06-05','10:00','11:30',1,19,NULL,NULL),(138,8,'2025-06-05','10:00','11:30',2,26,NULL,NULL),(139,8,'2025-06-05','10:00','11:30',3,11,NULL,NULL),(140,8,'2025-06-05','10:00','11:30',4,6,NULL,NULL),(141,8,'2025-06-05','10:00','11:30',5,16,NULL,NULL),(142,8,'2025-06-05','10:00','11:30',6,14,NULL,NULL),(143,8,'2025-06-05','10:00','11:30',17,5,NULL,NULL),(144,8,'2025-06-05','10:00','11:30',18,30,NULL,NULL),(145,9,'2025-06-06','07:30','09:30',12,12,'2025-02-14 09:08:16','2025-02-14 09:08:16'),(146,9,'2025-06-06','07:30','09:30',13,20,NULL,NULL),(147,9,'2025-06-06','07:30','09:30',14,3,NULL,NULL),(148,9,'2025-06-06','07:30','09:30',15,22,NULL,NULL),(149,9,'2025-06-06','07:30','09:30',16,5,NULL,NULL),(150,9,'2025-06-06','07:30','09:30',7,21,NULL,NULL),(151,9,'2025-06-06','07:30','09:30',8,28,NULL,NULL),(152,9,'2025-06-06','07:30','09:30',9,2,NULL,NULL),(153,9,'2025-06-06','07:30','09:30',10,18,NULL,NULL),(154,9,'2025-06-06','07:30','09:30',11,9,NULL,NULL),(155,9,'2025-06-06','07:30','09:30',1,7,NULL,NULL),(156,9,'2025-06-06','07:30','09:30',2,15,NULL,NULL),(157,9,'2025-06-06','07:30','09:30',3,29,NULL,NULL),(158,9,'2025-06-06','07:30','09:30',4,24,NULL,NULL),(159,9,'2025-06-06','07:30','09:30',5,10,NULL,NULL),(160,9,'2025-06-06','07:30','09:30',6,1,NULL,NULL),(161,9,'2025-06-06','07:30','09:30',17,27,NULL,NULL),(162,9,'2025-06-06','07:30','09:30',18,31,NULL,NULL),(163,10,'2025-06-06','10:00','11:30',12,8,'2025-02-14 09:11:13','2025-02-14 09:11:13'),(164,10,'2025-06-06','10:00','11:30',13,4,NULL,NULL),(165,10,'2025-06-06','10:00','11:30',14,19,NULL,NULL),(166,10,'2025-06-06','10:00','11:30',15,16,NULL,NULL),(167,10,'2025-06-06','10:00','11:30',16,23,NULL,NULL),(168,10,'2025-06-06','10:00','11:30',7,14,NULL,NULL),(169,10,'2025-06-06','10:00','11:30',8,7,NULL,NULL),(170,10,'2025-06-06','10:00','11:30',9,27,NULL,NULL),(171,10,'2025-06-06','10:00','11:30',10,17,NULL,NULL),(172,10,'2025-06-06','10:00','11:30',11,25,NULL,NULL),(173,10,'2025-06-06','10:00','11:30',1,13,NULL,NULL),(174,10,'2025-06-06','10:00','11:30',2,29,NULL,NULL),(175,10,'2025-06-06','10:00','11:30',3,6,NULL,NULL),(176,10,'2025-06-06','10:00','11:30',4,12,NULL,NULL),(177,10,'2025-06-06','10:00','11:30',5,20,NULL,NULL),(178,10,'2025-06-06','10:00','11:30',6,11,NULL,NULL),(179,10,'2025-06-06','10:00','11:30',17,28,NULL,NULL),(180,10,'2025-06-06','10:00','11:30',18,30,NULL,NULL);
/*!40000 ALTER TABLE `jadwal_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kdkls` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlbangku` int NOT NULL,
  `idguru` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelas_kdkls_unique` (`kdkls`),
  KEY `kelas_idguru_foreign` (`idguru`),
  CONSTRAINT `kelas_idguru_foreign` FOREIGN KEY (`idguru`) REFERENCES `guru` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'7A',30,1,'2025-02-14 05:34:24','2025-02-14 05:34:24'),(2,'7B',30,2,'2025-02-14 05:34:43','2025-02-14 05:34:43'),(3,'7C',30,3,'2025-02-14 05:34:52','2025-02-14 05:34:52'),(4,'7D',30,4,'2025-02-14 05:35:05','2025-02-14 05:35:05'),(5,'7E',30,5,'2025-02-14 05:35:18','2025-02-14 05:35:18'),(6,'7F',30,6,'2025-02-14 05:35:31','2025-02-14 05:35:31'),(7,'8A',30,7,NULL,NULL),(8,'8B',30,8,NULL,NULL),(9,'8C',30,9,NULL,NULL),(10,'8D',30,10,NULL,NULL),(11,'8E',30,11,NULL,NULL),(12,'9A',30,12,NULL,NULL),(13,'9B',30,13,NULL,NULL),(14,'9C',30,14,NULL,NULL),(15,'9D',30,15,NULL,NULL),(16,'9E',30,16,NULL,NULL),(17,'LAB',30,18,'2025-02-14 08:47:20','2025-02-14 08:47:43'),(18,'CAD',30,24,'2025-02-14 08:47:39','2025-02-14 08:47:39');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran`
--

DROP TABLE IF EXISTS `mata_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata_pelajaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kdmapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmmapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci,
  `idguru` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mata_pelajaran_kdmapel_unique` (`kdmapel`),
  KEY `mata_pelajaran_idguru_foreign` (`idguru`),
  CONSTRAINT `mata_pelajaran_idguru_foreign` FOREIGN KEY (`idguru`) REFERENCES `guru` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran`
--

LOCK TABLES `mata_pelajaran` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` VALUES (1,'BID','B. Indonesia',NULL,1,'2025-02-14 05:38:18','2025-02-14 05:38:18'),(2,'PAI','PAI',NULL,2,NULL,NULL),(3,'MTK','Matematika',NULL,3,NULL,NULL),(4,'PJOK','PJOK',NULL,4,NULL,NULL),(5,'BIG','B. Inggris',NULL,5,NULL,NULL),(6,'PKN','PKN',NULL,6,NULL,NULL),(7,'IPA','IPA',NULL,7,NULL,NULL),(8,'SB','Seni Budaya',NULL,8,NULL,NULL),(9,'IPS','IPS',NULL,9,NULL,NULL),(10,'PR/TIK','Prakarya/TIK',NULL,10,NULL,NULL);
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'2025_02_08_203833_create_guru_table',1),(3,'2025_02_08_204453_create_mata_pelajaran_table',1),(4,'2025_02_08_204933_create_kelas_table',1),(5,'2025_02_08_204983_create_users_table',1),(6,'2025_02_08_205301_create_jadwal_ujian_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('tHW4NsKZdLoBViNwd4LXKSVeA4AHukgnKonDKjub',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOW1rYlBSQkhwVGpOeGt6S3BYOFF5NVhOMFZVQ1Qyd0lybW5hb2pXdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1739560569);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guru','siswa','kepsek') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `idkelas` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_idkelas_foreign_idx` (`idkelas`),
  CONSTRAINT `users_idkelas_foreign` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','administrator@mail.com','$2y$12$oUdmuXP80ZWvHJnrBF8aN.KVCmaD5sYfIlVVNs/EHL1lghGQUNkJW','admin',NULL,'2025-02-14 05:06:27','2025-02-14 05:06:27'),(2,'Guru Mapel','gurumapel@mail.com','$2y$12$.jdOSS7UM.H5yPFk4SDKcOA3IHVI3MWjQeCd7A7dPQ/b3FBQ2p2WS','guru',NULL,'2025-02-14 05:06:27','2025-02-14 05:06:27'),(3,'Guru Wali Kelas','guruwalikelas@mail.com','$2y$12$ARyM1sX7STjXuprEzVusrO440HwQnc9uV3X53//74GpWtTRpFrK7G','guru',NULL,'2025-02-14 05:06:27','2025-02-14 05:06:27'),(5,'Kepala Sekolah','kepsek@mail.com','$2y$12$ryE.BbC9QX.sUm0xSWZ4JuKg6i.wX05LBSgEO0O/s3fyKLIuHDiH.','kepsek',NULL,'2025-02-14 05:06:27','2025-02-14 05:06:27'),(6,'Ani','ani@mail.com','$2y$12$7emLU.iz.Gbp3u1EgmhceOK/wWz9ALQnguE8soFaV/xkT4gy/xIme','siswa',1,'2025-02-14 07:27:01','2025-02-14 07:27:01'),(7,'Tata Usaha','tatausaha@mail.com','$2y$12$Xz3ZkRsKNIqQDtV.a1MMQ.ntyENQKGNiwxmH4oFr62kERz9V27tvG','admin',NULL,'2025-02-14 07:27:31','2025-02-14 07:27:31'),(8,'Adi','adi@mail.com','$2y$12$1EwU7JhaGa9/WRzZkIRBbumT0Gw6FkT6ky.SEDTHFSCWUMxrzd94G','siswa',2,'2025-02-14 07:30:37','2025-02-14 07:30:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'jadwal_ujian'
--

--
-- Dumping routines for database 'jadwal_ujian'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-15  2:20:20
