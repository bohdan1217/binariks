# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.23)
# Database: binariks
# Generation Time: 2020-01-23 4:04:57 PM +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2020_01_21_172215_create_products_table',1),
	(4,'2020_01_21_173938_create_status_table',1),
	(5,'2020_01_21_174024_create_orders_table',1),
	(6,'2020_01_21_174104_create_order_products_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_products`;

CREATE TABLE `order_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `qty` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_products_order_id_index` (`order_id`),
  CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `qty`, `title`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,1,2,'Test 1',195.00,NULL,NULL),
	(2,1,2,4,'Test 2',164.00,NULL,NULL),
	(3,1,3,4,'Test 3',163.00,NULL,NULL),
	(4,1,4,4,'Test 4',128.00,NULL,NULL),
	(5,1,5,2,'Test 5',150.00,NULL,NULL),
	(6,2,1,4,'Test 1',145.00,NULL,NULL),
	(7,2,2,1,'Test 2',155.00,NULL,NULL),
	(8,2,3,4,'Test 3',57.00,NULL,NULL),
	(9,2,4,1,'Test 4',193.00,NULL,NULL),
	(10,2,5,2,'Test 5',174.00,NULL,NULL),
	(11,3,1,4,'Test 1',113.00,NULL,NULL),
	(12,3,2,1,'Test 2',151.00,NULL,NULL),
	(13,3,3,4,'Test 3',157.00,NULL,NULL),
	(14,3,4,1,'Test 4',80.00,NULL,NULL),
	(15,3,5,2,'Test 5',149.00,NULL,NULL),
	(16,4,1,4,'Test 1',93.00,NULL,NULL),
	(17,4,2,3,'Test 2',113.00,NULL,NULL),
	(18,4,3,2,'Test 3',92.00,NULL,NULL),
	(19,4,4,3,'Test 4',182.00,NULL,NULL),
	(20,4,5,1,'Test 5',109.00,NULL,NULL),
	(21,5,1,1,'Test 1',133.00,NULL,NULL),
	(22,5,2,1,'Test 2',129.00,NULL,NULL),
	(23,5,3,1,'Test 3',53.00,NULL,NULL),
	(24,5,4,2,'Test 4',55.00,NULL,NULL),
	(25,5,5,1,'Test 5',55.00,NULL,NULL),
	(26,6,1,1,'Test 1',65.00,NULL,NULL),
	(27,6,2,4,'Test 2',76.00,NULL,NULL),
	(28,6,3,4,'Test 3',180.00,NULL,NULL),
	(29,6,4,1,'Test 4',168.00,NULL,NULL),
	(30,6,5,4,'Test 5',117.00,NULL,NULL),
	(31,7,1,4,'Test 1',95.00,NULL,NULL),
	(32,7,2,2,'Test 2',141.00,NULL,NULL),
	(33,7,3,1,'Test 3',94.00,NULL,NULL),
	(34,7,4,1,'Test 4',75.00,NULL,NULL),
	(35,7,5,2,'Test 5',166.00,NULL,NULL),
	(36,8,1,1,'Test 1',97.00,NULL,NULL),
	(37,8,2,1,'Test 2',134.00,NULL,NULL),
	(38,8,3,2,'Test 3',51.00,NULL,NULL),
	(39,8,4,2,'Test 4',162.00,NULL,NULL),
	(40,8,5,4,'Test 5',46.00,NULL,NULL),
	(41,9,1,4,'Test 1',142.00,NULL,NULL),
	(42,9,2,4,'Test 2',104.00,NULL,NULL),
	(43,9,3,1,'Test 3',106.00,NULL,NULL),
	(44,9,4,4,'Test 4',44.00,NULL,NULL),
	(45,9,5,4,'Test 5',152.00,NULL,NULL),
	(56,12,1,3,'Test 1',98.00,NULL,NULL),
	(57,12,2,1,'Test 2',84.00,NULL,NULL),
	(58,12,3,4,'Test 3',64.00,NULL,NULL),
	(59,12,4,4,'Test 4',152.00,NULL,NULL),
	(60,12,5,4,'Test 5',173.00,NULL,NULL);

/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status_id` smallint(6) NOT NULL DEFAULT '1',
  `sum` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `user_id`, `status_id`, `sum`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,5,2,NULL,'2020-01-22 00:00:00','2020-01-23 17:53:23',NULL),
	(2,4,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(3,1,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(4,5,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(5,2,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(6,2,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(7,5,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(8,1,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(9,5,1,NULL,'2020-01-22 00:00:00',NULL,NULL),
	(12,3,1,NULL,'2020-01-22 00:00:00',NULL,NULL);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_alias_unique` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `title`, `alias`, `content`, `price`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'test1','alias-1','content',91.00,NULL,NULL,NULL),
	(2,'test2','alias-2','content',123.00,NULL,NULL,NULL),
	(3,'test3','alias-3','content',167.00,NULL,NULL,NULL),
	(4,'test4','alias-4','content',114.00,NULL,NULL,NULL),
	(5,'test5','alias-5','content',170.00,NULL,NULL,NULL),
	(6,'test6','alias-6','content',117.00,NULL,NULL,NULL),
	(7,'test7','alias-7','content',166.00,NULL,NULL,NULL),
	(8,'test8','alias-8','content',63.00,NULL,NULL,NULL),
	(9,'test9','alias-9','content',73.00,NULL,NULL,NULL),
	(10,'test10','alias-10','content',145.00,NULL,NULL,NULL),
	(11,'test11','alias-11','content',62.00,NULL,NULL,NULL),
	(12,'test12','alias-12','content',179.00,NULL,NULL,NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;

INSERT INTO `status` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'pending',NULL,NULL),
	(2,'done',NULL,NULL),
	(3,'declined',NULL,NULL);

/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','a@a.ru',NULL,'$2y$10$n8eigfvWwRQEYSp4tbO1KO3NTVu9B03r.D5y75nXMdpbOWBaoN5kO',NULL,NULL,NULL),
	(2,'user','u@u.ru',NULL,'$2y$10$BlRJ/YPD9TdOcfG00bteF.GYglQSm6BmGbSXJdBQECagR9Vh5D8pq',NULL,NULL,NULL),
	(3,'bohdan','admin@admin.ru8',NULL,'$2y$10$bbHWfUD8lQ2Go9sDx/Xc/.CtsFcorG3bosqrColrySylpp4I1nMBS',NULL,NULL,NULL),
	(4,'masha','admin@admin.ru9',NULL,'$2y$10$65hjGGRepM0teXdBBFhzbuUWYyDyMZXE84jxf13M1NYfOkIhvtFFW',NULL,NULL,NULL),
	(5,'pasha','admin@admin.ru10',NULL,'$2y$10$fe5HlHDCVa1W6z6.whVGCefVTyCoyJvk43MVqSwtqmxbnysC.v23q',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
