# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.10-MariaDB)
# Database: blogtest
# Generation Time: 2019-12-03 17:01:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `description`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`)
VALUES
	(1,'Veniam quisquam non a expedita in.','Autem ea odit debitis labore reprehenderit magni. Ipsum libero natus ut dolorem magni pariatur. Sunt earum eos quibusdam assumenda ducimus.',NULL,NULL,'2019-12-02 08:57:36','2019-12-02 08:57:36'),
	(2,'Ullam consectetur aut sint et fugit fugiat eligendi.','Consequatur quia nam qui corporis assumenda consectetur ipsam. Nesciunt voluptatem alias vitae unde. Dignissimos est inventore velit molestiae magni earum iure. Ut est quasi voluptas dolor aut dignissimos.',NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(3,'Aliquam neque illum voluptatem magni ratione et odio earum.','Qui dignissimos eos inventore iste et eius voluptas. Perferendis sint vitae id expedita autem ad. Vero ea animi mollitia et illo perferendis neque. Ab odio aut adipisci assumenda.',NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(4,'In distinctio eligendi voluptatem ut similique dolorum.','Culpa cupiditate voluptate quis qui voluptatem natus dolorem. Quod nobis asperiores praesentium sed. Culpa enim reiciendis inventore nam ducimus dignissimos velit.',NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(5,'Temporibus at eos voluptatibus fuga sint ab.','Magni qui et quas voluptate ullam officia. Harum at in alias eum voluptate dolores. Sit perspiciatis exercitationem hic earum illum voluptatibus dolores eum. Qui eveniet ipsam quasi cupiditate optio debitis.',NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(6,'Est provident quis voluptatem et qui recusandae dolor.','Eveniet nobis ratione enim aut laborum dolor. Facilis ea eos eum et commodi quia laboriosam. Et sapiente pariatur qui quia magni vero inventore. Qui provident temporibus rem explicabo accusamus et nulla.',NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(7,'Lorem ipsulum','lorem ipsulum dolorem sit amen','Lorem, dolorem, ipsulum','lorem ipsulum dolorem sit amen','2019-12-03 09:54:47','2019-12-03 09:54:47'),
	(8,'Test 3 test EDITED','Test, la, la','La, bla, bla','Test, la, la','2019-12-03 09:57:17','2019-12-03 09:57:17');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
	(10,'2014_10_12_000000_create_users_table',1),
	(11,'2014_10_12_100000_create_password_resets_table',1),
	(12,'2019_08_19_000000_create_failed_jobs_table',1),
	(13,'2019_11_29_101713_create_categories_table',1),
	(14,'2019_11_29_103727_create_posts_table',1),
	(15,'2019_11_29_103814_create_tags_table',1),
	(16,'2019_11_29_103912_create_post_tags_table',1),
	(17,'2019_12_02_172809_add_deleted_at_to_users_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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



# Dump of table post_tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_tags`;

CREATE TABLE `post_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tags_post_id_foreign` (`post_id`),
  KEY `post_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_author_id_foreign` (`author_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `body`, `image`, `category_id`, `author_id`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`)
VALUES
	(2,'Blanditiis numquam delectus hic ipsam repellendus nostrum vel.','Aliquid dolorem similique esse aut eum consequatur. Voluptatem eligendi minus cum impedit unde. Et modi voluptas ab. Facilis est iste amet porro quia.',NULL,3,3,'jutyuty','tyuyyt','2019-12-02 09:00:56','2019-12-03 16:38:43'),
	(3,'Velit perspiciatis doloremque animi minima.','Quis dolorem necessitatibus blanditiis hic illo. Ipsum quasi possimus accusamus. Voluptas reprehenderit cupiditate cum et labore impedit. Fugit pariatur nostrum vel voluptates sunt voluptas enim labore.',NULL,4,4,NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(4,'Dolorem cum qui ipsum veniam dolor aut.','Optio molestiae quis quis quas sequi. Quia aut excepturi et. Voluptatibus doloribus quia accusamus at numquam. Quae repellendus et autem sit ea impedit rerum sint.',NULL,5,5,NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(5,'Labore sed perferendis iure.','In a accusamus in. Ea ipsa natus mollitia inventore voluptas enim et dolorem. Modi quas fuga tempora a delectus qui. Asperiores distinctio veniam qui mollitia.',NULL,6,6,NULL,NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(8,'Lorem ipsulum','Lorem ipsum dolor sit amet, mel atomorum tractatos maiestatis in, id purto ubique vis. Te autem accusam appareat eum, idque mnesarchum ius ad. At per error posidonium, ne nam debitis iudicabit dissentiunt, ei dicat expetenda splendide has. Has et tempor inciderint. Qui dicam eleifend ei.',NULL,1,8,'safdsf','sadfdsafdsaf','2019-12-02 12:54:00','2019-12-03 16:40:20'),
	(10,'Dolor sit amet','Lorem ipsum dolor sit amet, mel atomorum tractatos maiestatis in, id purto ubique vis. Te autem accusam appareat eum, idque mnesarchum ius ad. At per error posidonium, ne nam debitis iudicabit dissentiunt, ei dicat expetenda splendide has. Has et tempor inciderint. Qui dicam eleifend ei.',NULL,2,8,NULL,NULL,'2019-12-02 12:55:12','2019-12-02 12:55:12'),
	(11,'Mel atomorum','Lorem ipsum dolor sit amet, mel atomorum tractatos maiestatis in, id purto ubique vis. Te autem accusam appareat eum, idque mnesarchum ius ad. At per error posidonium, ne nam debitis iudicabit dissentiunt, ei dicat expetenda splendide has. Has et tempor inciderint. Qui dicam eleifend ei.',NULL,3,8,NULL,NULL,'2019-12-02 12:56:36','2019-12-02 12:56:36'),
	(12,'bmmmb','hkst;h\'tshlt\\ tltr\'slyt;\'r rs;ylr;tyl','/images/0349122019707.img',8,7,'ryertytr','rtutrututru','2019-12-03 15:58:31','2019-12-03 15:58:31'),
	(14,'lok','klok ktndkf fkf','/images/0349122019738.img',8,8,'thhgfjgfd','fdhfghgfh','2019-12-03 16:43:32','2019-12-03 16:43:32');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2019-12-02 10:58:49','2019-12-02 10:58:49'),
	(2,'editor','2019-12-02 10:59:37','2019-12-02 10:59:37');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(3,'Dorcas','Feeney','kendrick.gusikowski@example.org','2019-12-02 09:00:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'kOzeKQhGd1',NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(4,'Deron','Botsford','wmorissette@example.com','2019-12-02 09:00:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'PN1L6yNR5P',NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(5,'Glennie','Koch','feil.akeem@example.com','2019-12-02 09:00:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'lLvDVoWsV0',NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(6,'Grant','Price','buckridge.vince@example.com','2019-12-02 09:00:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'EteY1To0c2',NULL,'2019-12-02 09:00:56','2019-12-02 09:00:56'),
	(7,'Admin','Admin','admin@gmail.com',NULL,'$2y$10$znf2jndWwrqxYPUfVZUPQ.nJBypdLzT6r5/QN.gFfkeLIAouZeqru',1,NULL,NULL,'2019-12-02 09:08:58','2019-12-02 09:08:58'),
	(8,'Editor','Editor','editor@gmail.com',NULL,'$2y$10$f4RZ6jJ2.GXFCxNbV/uY6eymjSCQC86/G2leRDJxAH1uJFxdCF9Ci',2,NULL,NULL,'2019-12-02 10:42:13','2019-12-02 10:42:13');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
