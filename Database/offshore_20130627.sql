-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2013 at 11:47 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 28),
(2, 6, 28),
(3, 2, 28),
(4, 9, 28),
(5, 3, 28),
(6, 12, 28),
(7, 1, 29),
(8, 4, 29),
(9, 2, 29);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `created_at`, `updated_at`, `short_description`, `description`, `image`, `image_label`, `manufacturer_id`, `price`, `small_image`, `small_image_label`, `thumbnail`, `thumbnail_label`, `weight`, `qty`, `is_in_stock`, `meta_keyword`, `meta_description`) VALUES
(27, 'Lumia', 'nk_lumia_1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '<p>this is description</p>', 'product/27.png', 'nokia lumia', NULL, 1600000, NULL, NULL, 'product/27_thumb.png', 'nokia lumia', NULL, NULL, 1, NULL, NULL),
(28, 'Lumia', 'nk_lumia_2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '<p>đsssđ</p>', '', '', NULL, 16000, NULL, NULL, '', '', NULL, 12, 1, NULL, NULL),
(29, 'Lumia', 'nk_lumia_3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '<p><span style="color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 20px; background-color: #fafafa;">Short Description</span></p>', '<p style="text-align: center;"><span style="color: #333333; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: start; background-color: #fafafa;">Product Description</span></p>', 'product/29.png', 'image label', NULL, 16000, NULL, NULL, 'product/29_thumb.png', 'image label', NULL, 12, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_fulltexts`
--

CREATE TABLE IF NOT EXISTS `search_fulltexts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `data_index` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `created`, `modified`, `is_active`, `role`) VALUES
(1, NULL, NULL, 'admin', '30d32f48f525dabb40c4e99c9fb34c6121ebd350', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'super_admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
