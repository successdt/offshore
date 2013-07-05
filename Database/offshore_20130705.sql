/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.27 : Database - offshore
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`parent_id`,`name`,`thumbnail`,`thumbnail_label`,`description`,`meta_keyword`,`meta_description`) values (1,0,'Mobile',NULL,NULL,NULL,NULL,NULL),(2,0,'Tablet',NULL,NULL,NULL,NULL,NULL),(3,0,'Laptop',NULL,NULL,NULL,NULL,NULL),(4,1,'Nokia',NULL,NULL,NULL,NULL,NULL),(5,1,'Apple',NULL,NULL,NULL,NULL,NULL),(6,1,'Samsung',NULL,NULL,NULL,NULL,NULL),(7,1,'HTC',NULL,NULL,NULL,NULL,NULL),(8,1,'Sony',NULL,NULL,NULL,NULL,NULL),(9,2,'Apple',NULL,NULL,NULL,NULL,NULL),(10,2,'Asus',NULL,NULL,NULL,NULL,NULL),(11,2,'Samsung',NULL,NULL,NULL,NULL,NULL),(12,3,'HP',NULL,NULL,NULL,NULL,NULL),(13,3,'Toshiba',NULL,NULL,NULL,NULL,NULL),(14,3,'Vaio',NULL,NULL,NULL,NULL,NULL),(15,3,'Lenovo',NULL,NULL,NULL,NULL,NULL),(16,3,'Acer',NULL,NULL,NULL,NULL,NULL),(17,3,'Asus',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `category_products` */

DROP TABLE IF EXISTS `category_products`;

CREATE TABLE `category_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `category_products` */

insert  into `category_products`(`id`,`category_id`,`product_id`) values (7,1,29),(8,4,29),(9,2,29),(12,1,28),(13,4,28),(14,6,28),(15,2,28),(16,9,28),(17,3,28),(18,12,28),(19,1,31),(20,4,31);

/*Table structure for table `configs` */

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `configs` */

/*Table structure for table `coupon_categories` */

DROP TABLE IF EXISTS `coupon_categories`;

CREATE TABLE `coupon_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `coupon_categories` */

/*Table structure for table `coupon_products` */

DROP TABLE IF EXISTS `coupon_products`;

CREATE TABLE `coupon_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `coupon_products` */

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usage_limit` int(10) DEFAULT NULL,
  `usage_per_customer` int(10) DEFAULT NULL,
  `expiration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `coupons` */

/*Table structure for table `manufacturers` */

DROP TABLE IF EXISTS `manufacturers`;

CREATE TABLE `manufacturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `manufacturers` */

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_actived` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `pages` */

insert  into `pages`(`id`,`title`,`content`,`description`,`meta_keyword`,`meta_description`,`is_actived`) values (5,'Liên hệ','','','','',0),(6,'Tin tức','','','','',0),(7,'Tuyển dụng','','','','',0),(8,'Sơ đồ trang','','','','',0),(9,'Trợ giúp','','','','',1),(10,'Danh sách sản phẩm','<div>&nbsp;</div>','','','',1);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manufacturer_id` int(10) DEFAULT NULL,
  `price` decimal(12,0) DEFAULT NULL,
  `small_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `small_image_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` decimal(12,0) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `is_in_stock` tinyint(4) DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`sku`,`created_at`,`updated_at`,`short_description`,`description`,`image`,`image_label`,`manufacturer_id`,`price`,`small_image`,`small_image_label`,`thumbnail`,`thumbnail_label`,`weight`,`qty`,`is_in_stock`,`meta_keyword`,`meta_description`) values (27,'Lumia','nk_lumia_1','0000-00-00 00:00:00','0000-00-00 00:00:00','','<p>this is description</p>','product/27.png','nokia lumia',NULL,'1600000',NULL,NULL,'product/27_thumb.png','nokia lumia',NULL,NULL,1,NULL,NULL),(28,'Lumia','nk_lumia_2','0000-00-00 00:00:00','0000-00-00 00:00:00','','<p>đsssđ</p>','','',NULL,'16000',NULL,NULL,'','',NULL,12,1,NULL,NULL),(29,'Lumia','nk_lumia_3','0000-00-00 00:00:00','0000-00-00 00:00:00','description','<p style=\"text-align: center;\"><span style=\"color: #333333; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: start; background-color: #fafafa;\">Product Description</span></p>','product/29.png','image label',NULL,'16000',NULL,NULL,'product/29_thumb.png','image label',NULL,12,1,NULL,NULL),(30,'Lumia 720','nk_lumia_4','0000-00-00 00:00:00','0000-00-00 00:00:00','Thiết kế cao cấp, giá bình dân','<p>Sản phẩm nổi bật</p>','product/30.png','nokia lumia',NULL,'6800000',NULL,NULL,'product/30_thumb.png','nokia lumia',NULL,5,1,NULL,NULL),(31,'Lumia 620','nk_lumia_6','0000-00-00 00:00:00','0000-00-00 00:00:00','<p>Thiết kế ph&ugrave; hợp với phụ nữ</p>','<p>Gi&aacute; cả b&igrave;nh d&acirc;n</p>','','',NULL,'4800000',NULL,NULL,'','nokia lumia',NULL,5,1,NULL,NULL);

/*Table structure for table `search_fulltexts` */

DROP TABLE IF EXISTS `search_fulltexts`;

CREATE TABLE `search_fulltexts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `data_index` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `search_fulltexts` */

insert  into `search_fulltexts`(`id`,`product_id`,`data_index`) values (1,31,' Lumia 620 <p>Gi&aacute; cả b&igrave;nh d&acirc;n</p> <p>Thiết kế ph&ugrave; hợp với phụ nữ</p> ');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` tinyint(4) DEFAULT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`username`,`password`,`created`,`modified`,`is_active`,`role`) values (1,NULL,NULL,'admin','30d32f48f525dabb40c4e99c9fb34c6121ebd350','0000-00-00 00:00:00','0000-00-00 00:00:00',1,'super_admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
