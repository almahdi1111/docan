-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 28 يناير 2021 الساعة 16:24
-- إصدار الخادم: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docan`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `user_id`) VALUES
(19, 22, 8);

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(250) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name`, `note`, `add_date`, `image`, `active`) VALUES
(1, 'ملابس', 'هو قسم خاص بالملابس', '2021-01-22 19:45:26', NULL, 1),
(2, 'لابتوبات', 'هو قسم خاص باللابتوبات', '2021-01-23 00:31:19', NULL, 1),
(3, 'الهواتف', 'هو قسم خاص بالهواتف', '2021-01-23 02:35:53', NULL, 1),
(4, 'العاب', 'هذا القسم مختص في اخر العاب الفيديو و البلاستيشن', '2021-01-28 13:41:07', NULL, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `content`, `add_date`, `active`, `p_id`, `user_id`) VALUES
(30, 'هذا المنتج خارب', '2021-01-23 00:39:14', 1, 24, 1),
(31, 'كيف انتو ياخبرة', '2021-01-23 01:19:55', 1, 24, 1),
(33, 'هذ المنتج خارب خارب يا اخي', '2021-01-23 02:14:05', 1, 22, 8),
(35, 'xlkjkjxvklxcjkl', '2021-01-28 13:38:45', 0, 24, 1),
(36, 'اللعبة قوة ', '2021-01-28 13:49:05', 1, 29, 1),
(37, 'غالي ياعم الكل ', '2021-01-28 13:51:06', 1, 23, 1),
(38, 'اهلا ياعم ', '2021-01-28 13:52:11', 1, 27, 9),
(40, 'اهلا بكم جميعا وخاصة الاستاذة مروة الهادي', '2021-01-28 13:58:07', 1, 30, 1),
(41, 'اهلا بكم جميعا وخاصة الاستاذة مروة الهادي', '2021-01-28 13:58:24', 1, 22, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `content` text NOT NULL,
  `sender` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `messages`
--

INSERT INTO `messages` (`id`, `email`, `content`, `sender`, `date`) VALUES
(35, 'alyamany@almahdi.com', 'هل يمكن ان ابيع الكلية حقي هنا \r\n\r\n				', 'عبدالعزيز', '2021-01-28 13:59:16');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `detail` text NOT NULL,
  `price` double NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image1` varchar(250) NOT NULL,
  `image2` varchar(250) NOT NULL,
  `image3` varchar(250) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `price`, `add_date`, `image1`, `image2`, `image3`, `active`, `c_id`, `user_id`) VALUES
(22, 'كمبيوتر مكتبي ', 'ذاكرة 16 جيجيا بايت بالاضافة الى هارد 1 تيرا بايت ', 1500, '2021-01-23 00:29:12', 'product22.jpg', 'product24.jpg', 'product24.jpg', 1, 1, 1),
(23, 'large-lenovo-ideapad-320s-14ikb-14-laptop-grey', 'ذاكرة 16 جيجيا بايت بالاضافة الى هارد 1 تيرا بايت ', 1500, '2021-01-23 00:30:17', 'product23.jpg', 'product25.jpg', 'product25.jpg', 1, 1, 1),
(24, 'large-asus-transformer-mini-t102ha-10-1-2-1-silver', 'ذاكرة 16 جيجيا بايت بالاضافة الى هارد 1 تيرا بايت ', 1200.78, '2021-01-23 00:33:05', 'product24.jpg', 'product26.jpg', 'product26.jpg', 1, 2, 1),
(26, 'هاتف ال جي اكس برو ماكس', 'هذا الهاتف من اهم الهواتف التي كانت في السوق ', 599.99, '2021-01-23 02:37:26', 'product25.jpg', 'product27.jpg', 'product27.jpg', 1, 3, 2),
(27, 'هاتف1', 'هذا الهاتف من اهم الهواتف التي كانت في السوق ', 499.99, '2021-01-23 02:39:23', 'product27.jpg', 'product29.jpg', 'product29.jpg', 1, 1, 2),
(29, 'GOD OF WAR', 'هذا اللعبة من اهم اللالعاب لعام 2018التي حازت على جائزة لعبة السنة ', 70, '2021-01-28 13:47:19', 'product28.jpg', 'product30.jpg', 'product30.jpg', 1, 4, 1),
(30, 'لابتوب hp Z-book', 'ذاكرة 16 جيجيا بايت بالاضافة الى هارد 1 تيرا بايت ', 549.99, '2021-01-28 13:56:07', 'product30.jpg', 'product31.jpg', 'product32.jpg', 1, 2, 9);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `image` varchar(250) DEFAULT 'default.png',
  `phone` varchar(250) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'this to active the account',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`, `user_type`, `address`, `gender`, `birth_date`, `image`, `phone`, `active`) VALUES
(1, '123', 'almahdi', 'almahdi@almahdi.com', 'admin', 'sanaa', 'male', '2021-01-13', 'default.png', '77732002', 1),
(2, '334232', 'M_Alsakkaf', 'alsakkaf@gmail.com', 'admin', 'sana', 'male', '1994-10-20', NULL, '772714522', 1),
(8, '123', 'الاستاذ عبدالكريم اليمني', 'alyamany@almahdi.com', 'buyer', '13', 'ذكر', '2021-01-28', 'user3.jpg', '773000111', 1),
(9, 'nashwan123', 'نشوان نجاد', 'nashwan@gmail.com', 'vedor', '13', 'ذكر', '2021-12-31', 'user9.jpg', '773000111', 1),
(10, '123', 'محمد طارق', 'mohmmed@almahdi.com', 'admin', '12', 'ذكر', '1997-09-19', 'user10.jpg', '775769149', 1);

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- القيود للجدول `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- القيود للجدول `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
