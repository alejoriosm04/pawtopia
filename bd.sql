-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pawtopia
-- ------------------------------------------------------
-- Server version       10.11.6-MariaDB-0+deb12u1

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES
('lsballestm@eafit.edu.co|190.158.28.34','i:1;',1727252989),
('lsballestm@eafit.edu.co|190.158.28.34:timer','i:1727252989;',1727252989);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `species_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_species_id_foreign` (`species_id`),
  CONSTRAINT `categories_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Food','Food for Dogs',1,'2024-09-25 08:33:00','2024-09-25 08:33:00'),
(2,'Food','Food for cats',2,'2024-09-25 08:33:11','2024-09-25 08:33:11'),
(3,'Food','Food for fish',4,'2024-09-25 08:33:21','2024-09-25 08:33:21'),
(4,'Accesories','Accesories for dogs',1,'2024-09-25 08:33:46','2024-09-25 08:33:46'),
(5,'Toys','Toys for Cats',2,'2024-09-25 08:33:56','2024-09-25 08:33:56'),
(6,'Cages','Cages for Small pets',3,'2024-09-25 08:34:07','2024-09-25 08:34:07'),
(7,'Accesories','Accesories for cats',2,'2024-09-25 08:34:19','2024-09-25 08:34:19'),
(8,'Food','Food for Birds',5,'2024-09-25 08:34:34','2024-09-25 08:34:34'),
(9,'Beds','Beds for dogs',1,'2024-09-25 08:34:52','2024-09-25 08:34:52'),
(10,'Toys','Toys for dogs',1,'2024-09-25 08:35:33','2024-09-25 08:35:33'),
(11,'Medicine','Medicine for dogs',1,'2024-09-25 08:36:10','2024-09-25 08:36:10'),
(12,'Beds','Beds for cats',2,'2024-09-25 08:36:40','2024-09-25 08:36:40'),
(13,'Snacks','Snacks for Cats',2,'2024-09-25 08:51:36','2024-09-25 08:51:36');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `pet_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_order_id_foreign` (`order_id`),
  KEY `items_product_id_foreign` (`product_id`),
  KEY `items_pet_id_foreign` (`pet_id`),
  CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `items_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES
(1,1,7,1,12,1,'2024-09-25 08:49:39','2024-09-25 08:49:39'),
(2,3,53,2,1,1,'2024-09-25 08:50:10','2024-09-25 08:50:10'),
(3,4,23,2,3,1,'2024-09-25 08:50:10','2024-09-25 08:50:10'),
(4,1,64,2,5,1,'2024-09-25 08:50:10','2024-09-25 08:50:10'),
(5,2,45,3,8,1,'2024-09-25 08:51:48','2024-09-25 08:51:48'),
(6,4,18,3,11,1,'2024-09-25 08:51:48','2024-09-25 08:51:48'),
(7,6,8,4,14,2,'2024-09-25 08:55:25','2024-09-25 08:55:25');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2024_09_16_052119_create_species_table',1),
(5,'2024_09_16_052328_create_categories_table',1),
(6,'2024_09_16_052358_create_products_table',1),
(7,'2024_09_16_052419_create_pets_table',1),
(8,'2024_09_22_180452_create_orders_table',1),
(9,'2024_09_22_180522_create_items_table',1),
(10,'2024_09_23_044446_create_user_favorites_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES
(1,7,1,'2024-09-25 08:49:39','2024-09-25 08:49:39'),
(2,316,1,'2024-09-25 08:50:10','2024-09-25 08:50:10'),
(3,162,1,'2024-09-25 08:51:48','2024-09-25 08:51:48'),
(4,48,1,'2024-09-25 08:55:25','2024-09-25 08:55:25');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `species_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `breed` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `characteristics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`characteristics`)),
  `medications` varchar(255) NOT NULL,
  `feeding` varchar(255) NOT NULL,
  `veterinaryNotes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pets_species_id_foreign` (`species_id`),
  KEY `pets_user_id_foreign` (`user_id`),
  CONSTRAINT `pets_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES
(1,'Maggie','images/pets/otLooaF9YluXHbEMDODAwhJifNYu82IFyLohrhnv.jpg',1,1,'Pug and Schanuzer','2017-04-14','{\"color\":\"brown\",\"size\":\"Small\",\"temperament\":\"Friendly\"}','None','3 times at day','Healthy','2024-09-25 08:49:19','2024-09-25 08:49:19'),
(2,'Pablito','images/pets/RuvjBUMfBPQlNFS6FSNFVfkHXB73JquHI0ZO4IoZ.jpg',4,1,'Gold fish','2023-10-18','{\"color\":\"green\",\"size\":\"Small\",\"temperament\":\"Calm\"}','None','2 times at day','Healthy','2024-09-25 08:55:00','2024-09-25 08:55:00');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `species_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_species_id_foreign` (`species_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(1,'PURINA Dog Chow Adult Sensitive Salmon','Ensure that sensitive skin & digestion are not spoiling your dog’s nutrition with this wholesome dry food, made using nutritious salmon & a range of suitable ingredients to support the immune system.',5300,'1.png',1,1,'2024-09-25 08:38:05','2024-09-25 08:38:06'),
(2,'PURINA Dog Chow Complete/Classic with Chicken','Dry adult dog food made with quality ingredients to a complete, balanced recipe, enriched with antioxidants and ideal for all activity levels, with no artificial colours, flavours or preservatives.',4049,'2.png',1,1,'2024-09-25 08:38:30','2024-09-25 08:38:30'),
(3,'Dog Chow Senior Lamb','Tasty dry food for older dogs, formula with natural ingredients, contains lamb, provides prebiotics, omega fatty acids and taurine, complete & balanced, without artificial additives',2340,'3.png',1,1,'2024-09-25 08:39:05','2024-09-25 08:39:05'),
(5,'Doggy Paddling Pool','The really cool Doggy Pool! A durable, plastic paddling pool especially for dogs. With reinforced walls, integrated drainage valve and no need to inflate! Great outdoor fun for your dog on hot days.',6400,'5.png',10,1,'2024-09-25 08:41:09','2024-09-25 08:41:09'),
(6,'Evolve Dog Classic Beef','EVOLVE DOG CLASSIC BEEF is made for dogs that prefer beef sabor or have allergies to chicken, contains vitamins and is healthy for young adults',6270,'6.png',1,1,'2024-09-25 08:43:05','2024-09-25 08:43:05'),
(7,'Hills Science Plan Adult Chicken','Wholesome dry food to provide the exact balanced nutrition needed for adult cats over 1 year old, with high-quality protein and delicious protein to support natural immune system health.',2566,'7.png',2,2,'2024-09-25 08:43:57','2024-09-25 08:44:18'),
(8,'Hills Science Plan Adult 1+ Sensitive Stomach & Skin Medium with Chicken','Digestible dry food for adult dogs with sensitive digestions, with chicken and prebiotic fibres to help support digestion, enriched with omega fatty acids and vitamin E for skin and coat health.',4500,'8.png',1,1,'2024-09-25 08:45:13','2024-09-25 08:45:13'),
(9,'Taste of the Wild - Pacific Stream','Grain-free dog food with plenty of fresh salmon as the sole source of animal protein, with highly-digestible sweet potato and ideal even for more sensitive dogs. Made in the USA',1679,'9.png',1,1,'2024-09-25 08:46:08','2024-09-25 08:46:09'),
(10,'Pet Cage Freedom with Side Extension','A great multi-functional pet carrier with foldable side extension. Perfect for transporting your pet rabbit or guinea pig. Also suitable for cats and small dogs. Colour: black and grey',3700,'10.png',6,3,'2024-09-25 08:47:00','2024-09-25 08:47:00'),
(11,'Royal Canin Medium Adult Rating: 5/5 (51)','Balanced dry food for adult dogs of medium-sized breeds, provides high-quality proteins, highly digestible ingredients, source of antioxidants, customised kibble size.',1800,'11.png',1,1,'2024-09-25 08:48:21','2024-09-25 08:48:21'),
(12,'Royal Canin Indoor','A complete dry cat food for adult indoor cats, with an adapted calorie content and designed to reduce hairballs and stool odour, as well as promoting dental hygiene and healthy urinary tract.',729,'12.png',2,2,'2024-09-25 08:48:51','2024-09-25 08:48:51'),
(13,'Royal Canin Savour Exigent','Wholesome dry food for fussy, texture-sensitive adult cats, with two different kibble types for best acceptance and helping to support healthy digestion and ideal weight.',1900,'13.png',2,2,'2024-09-25 08:49:24','2024-09-25 08:49:24'),
(14,'Sera FD Artemia Shrimps Not Rated','Tender brine shrimp, a delicacy for your fresh or salt water fish.',815,'14.png',3,4,'2024-09-25 08:50:56','2024-09-25 08:50:56'),
(15,'Felix Goody Bag Treats','Delicious treat mixes available in a range of tasty varieties, with appetising scent and irresistible flavour combined with protein, vitamins and omega-6 fatty acids, for joyful moments!',355,'15.png',13,2,'2024-09-25 08:51:58','2024-09-25 08:51:58'),
(16,'Felix As Good As It Looks Mega Pack 120 x 85g','Now your cat can enjoy Felix As Good As It Looks complete wet cat food in a great value mega pack, with 4 different flavour varieties of juicy chunks in a flavoursome jelly and practical pouches.',2000,'16.png',2,2,'2024-09-25 08:52:27','2024-09-25 08:52:27'),
(17,'Felix Crispies 45g','An exciting star and moon-shaped snack for cats, airy cat treats full of valuable proteins, vitamins and omega-6 fatty acids, in 3 delicious varieties and perfect as a tasty reward.',544,'17.png',13,2,'2024-09-25 08:53:01','2024-09-25 08:53:01'),
(18,'TIAKI Living Large Small Pet Cage','Elegant small pet cage for hamsters and mice, in a minimalistic design with a wooden platform and ramp, as well as a food bowl, featuring a high base tray and top door for easy access.',9512,'18.png',6,3,'2024-09-25 08:53:44','2024-09-25 08:53:44'),
(19,'Savic Small Pet Cage Zeno 2','High quality, completely collapsible cage for rats, gerbils and other small pets, with colourful accessories, easy and quick to assemble without tools, thin bar spacing (9.5 mm)',9000,'19.png',6,3,'2024-09-25 08:54:11','2024-09-25 08:54:11'),
(20,'TIAKI Rat & Chinchilla Cage','Stylish cage for rats and chinchillas, in a Scandinavian design with 3 wooden platforms including ramps to allow your pet to discover the higher levels, with 3 food bowls and a high base tray.',6712,'20.png',6,3,'2024-09-25 08:54:40','2024-09-25 08:54:40'),
(21,'kooa Bamboo Slicker Brush','Efficient slicker brush for removing loose hair, knots & tangles. It has a pleasant massage effect and is suitable for dogs and cats, and all fur lengths. With a comfortable, natural bamboo handle.',2320,'21.png',4,1,'2024-09-25 08:55:50','2024-09-25 08:55:50'),
(22,'Wolf of Wilderness RAW Freeze-dried Snacks Saver Packs','Grain-free, freeze-dried dog snacks made with 100% pure meat or fish. Premium snacks with a rich taste.',1998,'22.png',1,1,'2024-09-25 08:56:21','2024-09-25 08:56:21'),
(23,'Modern Living Cape Town 2-in-1 Cat Bed','2-in-1 bed for cats and small dogs, reversible with the choice of a cuddly cushion or a bed with raised border, made from natural cotton outer material, easy to care and particularly snuggly.',3500,'23.png',9,1,'2024-09-25 08:57:15','2024-09-25 08:57:15'),
(24,'Modern Living Dog Bed Sydney','Elegant bed for smaller dogs, made of light jersey fabric, soft & non-slip, comfortable lying surface, raised edge to lean against, underside with anti-slip coating, cover removable, colour: grey',3075,'24.png',9,1,'2024-09-25 08:57:44','2024-09-25 08:57:44');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
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
INSERT INTO `sessions` VALUES
('46wLjVyhnOFfYQJrJX1V0UL26iFhITwGTrzqY3zE',NULL,'199.45.155.70','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2l5Z1dIcWtOMmdubGZuN09JWndGbWRLdW8xMElHb2RyWHRLNGhxdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vMzQuMTcwLjg4LjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1727256845),
('cB9Dds7obbrn9pmxeocYD3k3K4MH81rzGcliXBM7',NULL,'181.48.255.69','Mozilla/5.0 (Linux; Android 11; moto g(20)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Mobile Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVDBkT1pvZnpGTmVLODJOY3pNYWd0ZURoUmViQ2ZZaGl1QThxUm1rbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vcGF3dG9waWEuc3l0ZXMubmV0L2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1727260205),
('J3yKZoRaXMrvfTgVAWaihQTcP55ab3V88sOIB1ZW',1,'190.158.28.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36 OPR/113.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoic1BWZ0xiNTdhTWZMSnZIZEpVdk5lQW5jTmR4aWVqOWpUSkNZVjlrZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHBzOi8vcGF3dG9waWEuc3l0ZXMubmV0L3Byb2R1Y3RzL3NwZWNpZXMvRG9nIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1727255087),
('lOfklXAWzrzJgtKuBdS8p4uCjfvfWrhjVQTLnOZY',NULL,'200.12.188.151','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoid2hZYnE5VFRhdXREY3p4Rkdzd2hFa1ZCTnVCMUxWMjIxSXhqYTI5NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vcGF3dG9waWEuc3l0ZXMubmV0L2NhcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1727262056),
('qu3UEoPP8VpnmnWAI0BLrmMuMozDh74FlrEWiUEB',NULL,'199.45.155.70','Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoidUJIYUFKeENmMHFRQUNwOXFCQ0NkRlZmS2R1R1Y1TlJZZTM1SzRSWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vMzQuMTcwLjg4LjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1727256849),
('R1gVqbQmH4rHnaOaXAnEQzcY8EbIqOPo0ZvXWdBp',1,'181.58.39.24','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUFJNVcwdkVHMUhqRkJLTlB0eFBGNUltSHJNbVpzb1ZNNElTS3A4biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vcGF3dG9waWEuc3l0ZXMubmV0L3VzZXIvb3JkZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1727260228),
('UBtfemeriBnYKRKCBxDxUz4iNYlr9DCWQszKp04f',1,'181.58.39.24','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMERsSTNCTFZPWGFaeERtUEtpU00wQnVJdjJFQVZzVkdMYk9IUVFYTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vcGF3dG9waWEuc3l0ZXMubmV0L3Byb2R1Y3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1727254666),
('xioiUpPCilZSTLxTqLga4xU4wpYETx7JHEGQCZZN',NULL,'200.12.188.109','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiakhsd0k4Z0tkeXNwaEVEeEthMVZvQlZBZ1hGNFhHNFE0VzNxSGJaciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vcGF3dG9waWEuc3l0ZXMubmV0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1727267278);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `species`
--

DROP TABLE IF EXISTS `species`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `species` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `species`
--

LOCK TABLES `species` WRITE;
/*!40000 ALTER TABLE `species` DISABLE KEYS */;
INSERT INTO `species` VALUES
(1,'Dog','2024-09-25 08:32:33','2024-09-25 08:32:33'),
(2,'Cat','2024-09-25 08:32:36','2024-09-25 08:32:36'),
(3,'Small Pet','2024-09-25 08:32:40','2024-09-25 08:32:40'),
(4,'Fish','2024-09-25 08:32:48','2024-09-25 08:32:48'),
(5,'Bird','2024-09-25 08:32:51','2024-09-25 08:32:51');
/*!40000 ALTER TABLE `species` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_favorites_products`
--

DROP TABLE IF EXISTS `user_favorites_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_favorites_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_favorites_products_user_id_foreign` (`user_id`),
  KEY `user_favorites_products_product_id_foreign` (`product_id`),
  CONSTRAINT `user_favorites_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_favorites_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_favorites_products`
--

LOCK TABLES `user_favorites_products` WRITE;
/*!40000 ALTER TABLE `user_favorites_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_favorites_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'regular',
  `address` varchar(255) DEFAULT NULL,
  `credit_card` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Alejandro Ríos Muñoz','alejo.rios.munoz@gmail.com','Sanalejo2004','admin','Medellin','0000000000000000','1.jpg',NULL,NULL,'2024-09-25 08:27:40','2024-09-25 08:56:01'),
(2,'Lina Ballesteros','lsballestm@eafit.edu.co','sofi1300','regular',NULL,NULL,NULL,NULL,NULL,'2024-09-25 08:29:17','2024-09-25 08:29:17');
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

-- Dump completed on 2024-09-25 12:28:48