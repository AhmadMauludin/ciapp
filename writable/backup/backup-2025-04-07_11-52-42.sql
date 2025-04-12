-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ciapp
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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (2,'Nasi Goreng Tanpa Nasi',100000,'1739513037_797a195717cabb5b61ae.png'),(3,'Korek Api',5000,'1739550163_8bdac7341974d4f7f8f0.png');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beli`
--

DROP TABLE IF EXISTS `beli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beli` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beli`
--

LOCK TABLES `beli` WRITE;
/*!40000 ALTER TABLE `beli` DISABLE KEYS */;
INSERT INTO `beli` VALUES (10,13,3,3,15000),(17,9,3,10,50000),(18,9,2,2,200000),(19,31,2,1,100000),(20,31,3,1,5000);
/*!40000 ALTER TABLE `beli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diskon`
--

DROP TABLE IF EXISTS `diskon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diskon` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `minimum_belanja` int(10) NOT NULL,
  `maksimum_belanja` int(10) NOT NULL,
  `diskon` int(10) NOT NULL,
  `status` enum('aktiv','tidak aktiv') NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diskon`
--

LOCK TABLES `diskon` WRITE;
/*!40000 ALTER TABLE `diskon` DISABLE KEYS */;
INSERT INTO `diskon` VALUES (1,'Diskon Munggahan',500000,1000000,50000,'aktiv','1740551103_7c483eeb7184bcfdaa4b.png'),(3,'Diskon lebaran',1000000,2000000,150000,'aktiv','1740552133_9a0e2383ee684beeb875.png');
/*!40000 ALTER TABLE `diskon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `bagian` enum('pengadaan','penjualan','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (2,'maldin','admin','$2y$10$DM4YLVrG81rHq50EPgrSm.BzobUO3TG1ibnSvIwDNgl7UhCehE5ey','1739515087_b8bd2505a4645317b392.png'),(3,'ahmad','pengadaan','$2y$10$GHgOoZTD71p9oCw/P0aXeO1l.apY2l3TSOaSB1ZmfUGonL1s2fCku','1739520140_8d317183f0b85d6caeb7.jpeg'),(4,'iqbal','penjualan','$2y$10$cqWW5hbK1EtzqT.yFb5obOvxNmTi0vxjUnS7j0ZtO/H/r6kaLZ/QW','1739520444_e90c5da90c996b3ff605.png'),(6,'suci','penjualan','$2y$10$zgEaC7MF1hbQCY9q492U0.r4EIr0aNKLxC99/Cv4SwMbJe1hs7qyO','1740466384_6701eb835b8e41f7608d.png'),(7,'intan','admin','$2y$10$bHO7Hctq95tkm/MrLsisKOnsWyGgu67T12QTGUvKiKc/B7LNtwy6G','1740468329_beb898c270ee751e9bec.jpg');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembeli`
--

DROP TABLE IF EXISTS `pembeli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembeli` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembeli`
--

LOCK TABLES `pembeli` WRITE;
/*!40000 ALTER TABLE `pembeli` DISABLE KEYS */;
INSERT INTO `pembeli` VALUES (1,'Muhammad Aris','2025-02-13','1739696984_5ed97f0e0f4649edb3c9.png'),(3,'Sarah Sechan','2025-02-17','1739694449_71d4475419cdd84b3f2e.png');
/*!40000 ALTER TABLE `pembeli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pembeli` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `total` int(10) NOT NULL,
  `diskon` int(10) DEFAULT NULL,
  `distot` int(10) DEFAULT NULL,
  `metode` enum('cash','transfer','dana') NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembali` int(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (9,1,4,'2025-02-14','16:55:00',250000,10000,240000,'cash',250000,10000,'1740233131_241b4ddf3f14dafcffba.jpg'),(31,3,4,'2025-02-21','15:20:04',105000,5000,100000,'cash',100000,0,'1740126015_d90f3987fb2a63705e05.png');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-07 18:52:42
