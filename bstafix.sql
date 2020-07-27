-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bsta
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `alamat`
--

DROP TABLE IF EXISTS `alamat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alamat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(128) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `tipe_alamat` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orderr` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alamat`
--

LOCK TABLES `alamat` WRITE;
/*!40000 ALTER TABLE `alamat` DISABLE KEYS */;
INSERT INTO `alamat` VALUES (9,23,'1-1595717167','Eky Arjayanto N','082344033238','Jln. Tanjung Alang No. 10',12220,'Sambung Jawa','Mamajang','Makassar','Sulawesi Selatan','Office'),(10,24,'1-1595720194','Eky Arjayanto N','082344033238','Jln. Tanjung Alang No. 10',12220,'Sambung Jawa','Mamajang','Makassar','Sulawesi Selatan','Office'),(11,25,'4-1595740459','Rege','082332344455','Jln. Tanjung Alang No. 10',12220,'Sambung Jawa','Mamajang','Makassar','Sulawesi Selatan','Office'),(12,26,'1-1595832235','Eky Arjayanto N','082344033238','Jln. Tanjung Alang No. 10',12220,'Sambung Jawa','Mamajang','Makassar','Sulawesi Selatan','Home');
/*!40000 ALTER TABLE `alamat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controller_access`
--

DROP TABLE IF EXISTS `controller_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controller_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) NOT NULL,
  `controller` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `controller_access_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controller_access`
--

LOCK TABLES `controller_access` WRITE;
/*!40000 ALTER TABLE `controller_access` DISABLE KEYS */;
INSERT INTO `controller_access` VALUES (7,1,'Home'),(8,1,'Penjual'),(9,1,'Profile'),(10,2,'Home'),(11,2,'Produk'),(12,2,'Profile');
/*!40000 ALTER TABLE `controller_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_order`
--

DROP TABLE IF EXISTS `data_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_order` varchar(125) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produk` (`id_produk`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `data_order_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  CONSTRAINT `data_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orderr` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_order`
--

LOCK TABLES `data_order` WRITE;
/*!40000 ALTER TABLE `data_order` DISABLE KEYS */;
INSERT INTO `data_order` VALUES (35,23,1,'1-1595717167',1,2,'2020-07-26 06:46:07','2020-07-26 06:46:07'),(36,23,1,'1-1595717167',3,1,'2020-07-26 06:46:07','2020-07-26 06:46:07'),(37,24,1,'1-1595720194',18,3,'2020-07-26 07:36:35','2020-07-26 07:36:35'),(38,25,4,'4-1595740459',1,1,'2020-07-26 13:14:20','2020-07-26 13:14:20'),(39,25,4,'4-1595740459',2,1,'2020-07-26 13:14:20','2020-07-26 13:14:20'),(40,25,4,'4-1595740459',3,1,'2020-07-26 13:14:20','2020-07-26 13:14:20'),(41,25,4,'4-1595740459',18,1,'2020-07-26 13:14:20','2020-07-26 13:14:20'),(42,26,1,'1-1595832235',1,1,'2020-07-27 14:43:55','2020-07-27 14:43:55'),(43,26,1,'1-1595832235',2,1,'2020-07-27 14:43:55','2020-07-27 14:43:55'),(44,26,1,'1-1595832235',3,1,'2020-07-27 14:43:56','2020-07-27 14:43:56');
/*!40000 ALTER TABLE `data_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_produk`
--

DROP TABLE IF EXISTS `foto_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `thumb` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `foto_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_produk`
--

LOCK TABLES `foto_produk` WRITE;
/*!40000 ALTER TABLE `foto_produk` DISABLE KEYS */;
INSERT INTO `foto_produk` VALUES (1,1,'durian-musang-king.jpg','durian-musang-king.jpg'),(2,2,'semangka-jepang.jpg','semangka-jepang.jpg'),(3,3,'sayur-kangkung-ternate.jpg','sayur-kangkung-ternate.jpg');
/*!40000 ALTER TABLE `foto_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gambar_verifikasi`
--

DROP TABLE IF EXISTS `gambar_verifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gambar_verifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(128) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `gambar_verifikasi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orderr` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gambar_verifikasi`
--

LOCK TABLES `gambar_verifikasi` WRITE;
/*!40000 ALTER TABLE `gambar_verifikasi` DISABLE KEYS */;
INSERT INTO `gambar_verifikasi` VALUES (2,23,'1-1595717167','1595718013_3f39059d8bd9328bebaf.png'),(3,24,'1-1595720194','1595720238_2631705726ad772efc44.jpg'),(4,25,'4-1595740459','1595740545_9e42f7eec69bace61843.png'),(5,26,'1-1595832235','1595832332_c0ada1fdf89b643a13e1.jpg');
/*!40000 ALTER TABLE `gambar_verifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,1010,'Buah','Buah segar import ','ready'),(2,1111,'Sayur','Sayur segar organik','ready');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keranjang`
--

DROP TABLE IF EXISTS `keranjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(125) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keranjang`
--

LOCK TABLES `keranjang` WRITE;
/*!40000 ALTER TABLE `keranjang` DISABLE KEYS */;
INSERT INTO `keranjang` VALUES (1,'1-1',1,1,3);
/*!40000 ALTER TABLE `keranjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `kode_order` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produk` (`id_produk`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orderr` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentar`
--

LOCK TABLES `komentar` WRITE;
/*!40000 ALTER TABLE `komentar` DISABLE KEYS */;
INSERT INTO `komentar` VALUES (1,1,23,'1-1595717167','laode123','durian terenak yang pernah saya makan, tapi boong hiya hiya','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,18,24,'1-1595720194','Eky','enakk sekali','2020-07-26 07:46:03','2020-07-26 08:22:56'),(8,18,25,'4-1595740459','Rege','tess yak','2020-07-26 15:04:43','2020-07-26 15:04:43'),(9,3,25,'4-1595740459','Rege','haiiii','2020-07-26 16:00:16','2020-07-26 16:00:16'),(10,1,25,'4-1595740459','Rege','maniss sekali','2020-07-26 16:05:30','2020-07-26 16:05:30'),(11,1,26,'1-1595832235','Eky','tesss review','2020-07-27 14:46:46','2020-07-27 14:46:46');
/*!40000 ALTER TABLE `komentar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderr`
--

DROP TABLE IF EXISTS `orderr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `payment_method` varchar(125) NOT NULL,
  `status_order` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `orderr_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderr`
--

LOCK TABLES `orderr` WRITE;
/*!40000 ALTER TABLE `orderr` DISABLE KEYS */;
INSERT INTO `orderr` VALUES (23,1,'1-1595717167',3,63000,'Cash on Delivery','Received','2020-07-26 06:46:07','2020-07-26 07:10:18'),(24,1,'1-1595720194',3,15000,'Cash on Delivery','Received','2020-07-26 07:36:34','2020-07-26 07:37:40'),(25,4,'4-1595740459',4,132000,'Cash on Delivery','Received','2020-07-26 13:14:19','2020-07-26 13:16:31'),(26,1,'1-1595832235',3,127000,'Cash on Delivery','Received','2020-07-27 14:43:55','2020-07-27 14:46:09');
/*!40000 ALTER TABLE `orderr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `status_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (1,1,2,'1-durian-musang-king','durian musang',26000,'ready','Manis, Dagingnya tebal, dan dijamin halal',100,'2020-07-12','2020-07-25'),(2,1,2,'2-semangka-jepang','Semangka jepang',90000,'ready','manis, banyak air, tidak memiliki biji',20,'2020-07-12','2020-07-23'),(3,2,2,'3-sayur-kangkung-ternate','Sayur Kangkung Ternate',11000,'Ready','Inport langsung dari Ternate, dijamin kepalsuannya',10,'2020-07-12','2020-07-25'),(18,2,2,'1595717938-sayur-bayam','Sayur Bayam',5000,'Ready','ini adalah sayur',20,'2020-07-26','2020-07-26');
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Eky','eky.ean22@gmail.com','$2y$10$TPyLmA6F2P9vjgDkMhrPNunw4X2genzX2IZ1/x09Dxa5I2bQgB3am',2,1,'2020-07-08 13:10:06','2020-07-08 13:10:06'),(2,'Aslan','aslan@gmail.com','$2y$10$BmihctZ2GWXzpnzFm.45FeFOCm5B03LtASiv4IKAmQGqNNYMfRIi6',1,1,'2020-07-08 21:02:52','2020-07-08 21:02:52'),(4,'Rege','rege@gmail.com','$2y$10$7zyH3/Y2DuYzQFMMJcCEyuXXmUBcUQXq8XFINuho2SedTcQNwMvpG',2,1,'2020-07-13 02:43:01','2020-07-13 02:43:01'),(5,'Eky','eky.nurhasana@gmail.com','$2y$10$bbTejIcb.0fJcqaUrYuGvuooL2owur0YsHZ.CtH3DKYzAc80iMd/e',2,1,'2020-07-15 11:50:06','2020-07-15 11:50:06'),(6,'Shofiah','shofiah@gmail.com','$2y$10$.jdLNGHhm8aZnMmBWKsVQOEORtymRamR2hx3BFRhbn7VBZllltzd6',2,1,'2020-07-27 19:26:15','2020-07-27 19:26:15');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_menu`
--

DROP TABLE IF EXISTS `user_access_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  KEY `menu_id` (`menu_id`),
  CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id`),
  CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_menu`
--

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` VALUES (1,1,1),(2,1,2),(3,2,2),(4,2,3);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_level`
--

LOCK TABLES `user_level` WRITE;
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` VALUES (1,'Penjual'),(2,'Pembeli');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_menu`
--

DROP TABLE IF EXISTS `user_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(125) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_menu`
--

LOCK TABLES `user_menu` WRITE;
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` VALUES (1,'Penjual'),(2,'User'),(3,'Pembeli');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_submenu`
--

DROP TABLE IF EXISTS `user_submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user_menu` (`id_user_menu`),
  CONSTRAINT `user_submenu_ibfk_1` FOREIGN KEY (`id_user_menu`) REFERENCES `user_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_submenu`
--

LOCK TABLES `user_submenu` WRITE;
/*!40000 ALTER TABLE `user_submenu` DISABLE KEYS */;
INSERT INTO `user_submenu` VALUES (1,1,'Produk','penjual','fas fa-fw fa-store-alt',1),(2,1,'Order','penjual/order','fas fa-fw fa-shopping-cart',1),(3,2,'My Profile','profile','fas fa-fw fa-user',1),(4,3,'Orderanku','Produk/orderanku','fas fa-fw fa-shopping-cart',1);
/*!40000 ALTER TABLE `user_submenu` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-27 20:26:34
