-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: myapp
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','webmob','9033463695','admin@gmail.com','$2y$10$rw9hzGqJZUooFXSx7pQWIedftZvKthXn0aeG94DDdDpOVzOJ7Xkuq','2023-10-10 10:48:12','2023-10-10 10:48:12');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `parent_category_id` int DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`),
  KEY `parent_category_id` (`parent_category_id`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Electronics',NULL,'2023-10-12 12:48:43','2023-10-12 12:48:43'),(2,'Phone',1,'2023-10-12 12:49:33','2023-10-12 12:49:33'),(3,'Phone',1,'2023-10-12 12:49:45','2023-10-12 12:49:45'),(4,'TV',1,'2023-10-12 12:51:09','2023-10-12 12:51:09'),(5,'TV',1,'2023-10-12 12:51:17','2023-10-12 12:51:17'),(6,'Books',NULL,'2023-10-12 12:51:43','2023-10-12 12:51:43'),(7,'Language',NULL,'2023-10-12 12:53:37','2023-10-12 12:53:37'),(8,'QQQ',NULL,'2023-10-12 12:54:09','2023-10-12 12:54:09'),(9,'AAAA',NULL,'2023-10-12 12:54:37','2023-10-12 12:54:37'),(10,'AAAA',NULL,'2023-10-12 12:56:49','2023-10-12 12:56:49'),(11,'AAADDDDD',NULL,'2023-10-12 12:56:55','2023-10-12 12:56:55'),(12,'aD{sub)',11,'2023-10-12 12:57:14','2023-10-12 12:57:14'),(13,'aD{sub)',11,'2023-10-12 13:01:33','2023-10-12 13:01:33'),(14,'aD{sub)',11,'2023-10-12 13:01:36','2023-10-12 13:01:36'),(15,'aD{sub)',11,'2023-10-12 13:01:41','2023-10-12 13:01:41'),(16,'New',1,'2023-10-12 13:10:41','2023-10-12 13:10:41'),(17,'New',1,'2023-10-12 13:10:51','2023-10-12 13:10:51'),(18,'New',1,'2023-10-12 13:10:56','2023-10-12 13:10:56'),(19,'New',1,'2023-10-12 13:14:45','2023-10-12 13:14:45'),(20,'New',1,'2023-10-12 13:14:57','2023-10-12 13:14:57'),(21,'New',1,'2023-10-12 13:16:54','2023-10-12 13:16:54'),(22,'kjhgfd',6,'2023-10-12 13:17:16','2023-10-12 13:17:16'),(23,'Laptop',19,'2023-10-12 13:23:02','2023-10-12 13:23:02'),(24,'Laptop',19,'2023-10-12 13:24:45','2023-10-12 13:24:45'),(25,'Webmob',NULL,'2023-10-19 06:10:12','2023-10-19 06:10:12'),(26,'Webmob',NULL,'2023-10-19 06:10:44','2023-10-19 06:10:44'),(27,'Laravel',25,'2023-10-19 06:11:07','2023-10-19 06:11:07'),(28,'Design',26,'2023-10-19 06:12:14','2023-10-19 06:12:14'),(29,'Design',26,'2023-10-19 06:12:39','2023-10-19 06:12:39'),(30,'Digital marketing',25,'2023-10-19 06:14:02','2023-10-19 06:14:02'),(31,'Digital marketing',25,'2023-10-19 06:14:17','2023-10-19 06:14:17'),(32,'Digital marketing2',25,'2023-10-19 06:16:28','2023-10-19 06:16:28'),(33,'Digital marketing2',25,'2023-10-19 06:16:57','2023-10-19 06:16:57'),(34,'DM3',25,'2023-10-19 06:18:06','2023-10-19 06:18:06'),(35,'DM4',25,'2023-10-19 06:20:19','2023-10-19 06:20:19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_category` int DEFAULT NULL,
  `price_basic` decimal(10,2) NOT NULL,
  `price_discounted` decimal(10,2) DEFAULT NULL,
  `small_description` text,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_id` (`product_category`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (18,'Karleigh Melendez',12,238.00,777.00,'Id exercitationem si','Aliquam repudiandae ','uploads/652e7ae1cec5f_download.jpeg'),(19,'Kylee Cotton',18,382.00,968.00,'Sint voluptatibus l','Enim voluptatem dolo','uploads/652e7b266aee8_boat.jpg'),(20,'Buffy Avery',22,714.00,425.00,'Eos similique est la','Rerum consequat Ips','uploads/652e7ba445c83_painting-mountain-lake-with-moun.jpg'),(21,'Ali Vaughn',8,490.00,345.00,'Anim laborum archite','Quia sunt odit labo','uploads/652e7c3b2bf57_boat.jpg'),(32,'Juliet Horton',1,511.00,886.00,'Cupiditate nisi veni','Amet non voluptatem','uploads/652f7e18df9c0_3.jpeg'),(33,'Xandra Duffy',17,704.00,840.00,'Vel non quia necessi','Voluptatem minus ad','uploads/652f814c783ad_3.jpeg'),(34,'Nerea Larson',24,570.00,49.00,'Aliqua Natus autem ','Sint repudiandae co','uploads/652f81bec0404_3.jpeg'),(35,'Amos Finley',2,165.00,739.00,'Voluptate error Nam ','Veniam nisi non pro','uploads/652f82d77149a_3.jpeg'),(38,'Cain Gilbertd',9,321.00,29.00,'Dolore ipsa vel qui','Sequi id sed ab at i','uploads/652f864bd7934_3.jpeg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ronit','Zinzuvadiya','9033463695','ronitz@webmobtech.com','$2y$10$XqOldUl6Cs91.ySa7sv.3uEIAg0pGPAGfQ/SkmrF5P7brYpNYnkZG','2023-10-10 09:59:40','2023-10-10 09:59:40'),(2,'Daksh','Makwana','8754693365','daksh20@gmail.com','$2y$10$WnRXcjLhhETw7L6.aKkbTer1BUa3AUx6OfwO5FKND9HuAJ38XAX76','2023-10-12 09:17:35','2023-10-12 09:17:35');
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

-- Dump completed on 2023-10-19 13:27:22
