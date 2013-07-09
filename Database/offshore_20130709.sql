-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2013 at 10:31 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `offshore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `name` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `thumbnail`, `thumbnail_label`, `description`, `meta_keyword`, `meta_description`) VALUES
(1, 0, 'Mobile', NULL, NULL, NULL, NULL, NULL),
(2, 0, 'Tablet', NULL, NULL, NULL, NULL, NULL),
(3, 0, 'Laptop', NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Nokia', NULL, NULL, NULL, NULL, NULL),
(5, 1, 'Apple', NULL, NULL, NULL, NULL, NULL),
(6, 1, 'Samsung', NULL, NULL, NULL, NULL, NULL),
(7, 1, 'HTC', NULL, NULL, NULL, NULL, NULL),
(8, 1, 'Sony', NULL, NULL, NULL, NULL, NULL),
(9, 2, 'Apple', NULL, NULL, NULL, NULL, NULL),
(10, 2, 'Asus', NULL, NULL, NULL, NULL, NULL),
(11, 2, 'Samsung', NULL, NULL, NULL, NULL, NULL),
(12, 3, 'HP', NULL, NULL, NULL, NULL, NULL),
(13, 3, 'Toshiba', NULL, NULL, NULL, NULL, NULL),
(14, 3, 'Vaio', NULL, NULL, NULL, NULL, NULL),
(15, 3, 'Lenovo', NULL, NULL, NULL, NULL, NULL),
(16, 3, 'Acer', NULL, NULL, NULL, NULL, NULL),
(17, 3, 'Asus', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE IF NOT EXISTS `category_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`) VALUES
(7, 1, 29),
(8, 4, 29),
(9, 2, 29),
(12, 1, 28),
(13, 4, 28),
(14, 6, 28),
(15, 2, 28),
(16, 9, 28),
(17, 3, 28),
(18, 12, 28),
(19, 1, 31),
(20, 4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usage_limit` int(10) DEFAULT NULL,
  `usage_per_customer` int(10) DEFAULT NULL,
  `expiration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_categories`
--

CREATE TABLE IF NOT EXISTS `coupon_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_products`
--

CREATE TABLE IF NOT EXISTS `coupon_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `coupon_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_actived` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `description`, `meta_keyword`, `meta_description`, `is_actived`) VALUES
(5, 'Liên hệ', '', '', '', '', 0),
(6, 'Tin tức', '', '', '', '', 0),
(7, 'Tuyển dụng', '', '', '', '', 0),
(8, 'Sơ đồ trang', '', '', '', '', 0),
(9, 'Trợ giúp', '', '', '', '', 1),
(10, 'Danh sách sản phẩm', '<div>&nbsp;</div>', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `created_at`, `updated_at`, `short_description`, `description`, `image`, `image_label`, `manufacturer_id`, `price`, `small_image`, `small_image_label`, `thumbnail`, `thumbnail_label`, `weight`, `qty`, `is_in_stock`, `meta_keyword`, `meta_description`) VALUES
(27, 'Lumia', 'nk_lumia_1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '<p>this is description</p>', 'product/27.png', 'nokia lumia', NULL, 1600000, NULL, NULL, 'product/27_thumb.png', 'nokia lumia', NULL, NULL, 1, NULL, NULL),
(28, 'Lumia', 'nk_lumia_2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '<p>đsssđ</p>', '', '', NULL, 16000, NULL, NULL, '', '', NULL, 12, 1, NULL, NULL),
(29, 'Lumia', 'nk_lumia_3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'description', '<p style="text-align: center;"><span style="color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: start; background-color: #fafafa;">Product Description</span></p>', 'product/29.png', 'image label', NULL, 16000, NULL, NULL, 'product/29_thumb.png', 'image label', NULL, 12, 1, NULL, NULL),
(30, 'Lumia 720', 'nk_lumia_4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Thiết kế cao cấp, giá bình dân', '<p>Sản phẩm nổi bật</p>', 'product/30.png', 'nokia lumia', NULL, 6800000, NULL, NULL, 'product/30_thumb.png', 'nokia lumia', NULL, 5, 1, NULL, NULL),
(31, 'Lumia 620', 'nk_lumia_6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '<p>Thiết kế ph&ugrave; hợp với phụ nữ</p>', '<p>Gi&aacute; cả b&igrave;nh d&acirc;n</p>', '', '', NULL, 4800000, NULL, NULL, '', 'nokia lumia', NULL, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_fulltexts`
--

CREATE TABLE IF NOT EXISTS `search_fulltexts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `data_index` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `search_fulltexts`
--

INSERT INTO `search_fulltexts` (`id`, `product_id`, `data_index`) VALUES
(1, 31, ' Lumia 620 <p>Gi&aacute; cả b&igrave;nh d&acirc;n</p> <p>Thiết kế ph&ugrave; hợp với phụ nữ</p> ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `created`, `modified`, `is_active`, `role`) VALUES
(1, NULL, NULL, 'admin', '30d32f48f525dabb40c4e99c9fb34c6121ebd350', '2013-07-09 07:14:39', '0000-00-00 00:00:00', 1, 'super_admin'),
(4, 'duy thanh', 'dao', 'newnew', '30d32f48f525dabb40c4e99c9fb34c6121ebd350', '2013-07-09 08:30:09', '2013-07-09 03:29:51', 0, 'super_admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
