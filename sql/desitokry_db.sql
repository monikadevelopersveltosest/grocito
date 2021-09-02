-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 07:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desitokry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `txn_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` int(11) NOT NULL,
  `wallet_amount` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `txn_password`, `first_name`, `last_name`, `image`, `wallet_amount`, `status`, `create_date`, `modify_date`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'Wellness', 0, 410000, 1, '2019-03-12 00:00:00', '2020-06-13 12:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `area_zipcode` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `area_zipcode`, `status`, `create_date`) VALUES
(1, 'Palacia', 452001, 1, '2019-10-23 12:01:35'),
(2, 'sdfdf', 452001, 3, '2019-10-23 12:04:07'),
(3, 'mahu nakka', 452001, 1, '2019-10-23 12:05:10'),
(4, 'futikoti', 452001, 1, '2019-10-23 12:34:31'),
(5, 'sindhi colony', 0, 1, '2020-07-20 17:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `brand_logo`
--

CREATE TABLE `brand_logo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `staus` tinyint(4) NOT NULL DEFAULT '1',
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand_logo`
--

INSERT INTO `brand_logo` (`id`, `name`, `image`, `staus`, `create_date`) VALUES
(4, 'Ra', 'b1.jpg', 0, 2020),
(5, 'chanel', 'b2.jpg', 0, 2020),
(6, 'prada', 'b3.jpg', 0, 2020),
(7, 'lacosta', 'b4.jpg', 0, 2020),
(8, 'fendi', 'b5.jpg', 0, 2020),
(9, 'burberry', 'b6.jpg', 0, 2020),
(10, 'luice vitton', 'b7.jpg', 0, 2020),
(11, 'dada', 'b21.jpg', 0, 2020),
(12, 'abs', 'b11.jpg', 0, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` tinyint(5) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `category_name`, `parent_category_id`, `category_image`, `status`, `create_date`, `modify_date`) VALUES
(1, 'furniture', 0, 'wlogo7.png', 3, '2019-10-23 10:00:28', '2019-10-23 13:23:15'),
(2, 'furniture', 0, '4.png', 1, '2019-11-28 12:30:29', '2019-10-23 15:06:18'),
(3, 'Mens Tshirt', 0, '1.jpg', 1, '2019-11-29 05:43:53', '2019-10-23 15:35:45'),
(4, 'Jwellery', 2, 'rj.jpg', 1, '2020-06-27 11:42:10', '2019-11-28 12:37:05'),
(5, 'sofa', 2, '41k5oiQUn2L_-_Copy.jpg', 1, '2019-11-28 11:51:07', '2019-11-28 16:20:57'),
(6, 'Jwellery', 0, '10.jpg', 1, '2019-11-28 12:30:05', '2019-11-28 17:00:05'),
(7, 'Gift', 0, '8.png', 1, '2019-11-28 12:30:46', '2019-11-28 17:00:46'),
(8, 'Electronics', 0, '5.png', 1, '2019-11-28 12:31:49', '2019-11-28 17:01:49'),
(9, 'Grocery', 0, '8.jpg', 1, '2019-11-28 12:32:09', '2019-11-28 17:02:09'),
(10, 'Hardware', 0, '5.jpg', 1, '2019-11-28 12:35:41', '2019-11-28 17:05:41'),
(11, 'Kids', 0, '3.jpg', 1, '2019-11-28 12:45:16', '2019-11-28 17:15:16'),
(12, 'Womens', 0, '2.png', 1, '2019-11-28 12:45:34', '2019-11-28 17:15:34'),
(13, 'Blouse', 12, 'RiyaBoutique.png', 1, '2020-06-22 07:45:10', '2020-06-22 00:45:10'),
(14, 'Shoes', 11, '11.jpg', 1, '2020-06-25 13:14:40', '2020-06-25 06:14:40'),
(15, 'Clothes', 12, '21.png', 1, '2020-06-27 11:42:49', '2020-06-27 04:42:49'),
(16, 'shoes', 12, '22.png', 1, '2020-06-27 11:43:52', '2020-06-27 04:43:52'),
(17, 'Winter clothes', 11, '31.jpg', 1, '2020-06-27 11:44:54', '2020-06-27 04:44:54'),
(18, 'tools', 10, '41.png', 1, '2020-06-27 11:45:17', '2020-06-27 04:45:17'),
(19, 'Almirah', 10, '42.png', 1, '2020-06-27 11:45:51', '2020-06-27 04:45:51'),
(20, 'Wheat', 9, '81.png', 1, '2020-06-27 11:46:39', '2020-06-27 04:46:39'),
(21, 'Dry Fruits', 9, '82.png', 1, '2020-06-27 11:47:10', '2020-06-27 04:47:10'),
(22, 'TV', 8, '83.png', 1, '2020-06-27 11:47:23', '2020-06-27 04:47:23'),
(23, 'Laptop', 8, '84.png', 1, '2020-06-27 11:47:52', '2020-06-27 04:47:52'),
(24, 'Diwali gift', 7, '85.png', 1, '2020-06-27 11:48:52', '2020-06-27 04:48:52'),
(25, 'New year gift', 7, '86.png', 1, '2020-06-27 11:49:11', '2020-06-27 04:49:11'),
(26, ' anklets', 6, '87.png', 1, '2020-06-27 11:49:44', '2020-06-27 04:49:44'),
(27, 'necklesh', 6, '101.jpg', 1, '2020-06-27 11:50:20', '2020-06-27 04:50:20'),
(28, 'sports', 3, '12.jpg', 1, '2020-06-27 11:50:44', '2020-06-27 04:50:44'),
(29, 'winter t shirts', 3, '13.jpg', 1, '2020-06-27 11:51:30', '2020-06-27 04:51:30'),
(30, 'Bed', 2, '88.png', 1, '2020-06-27 11:52:00', '2020-06-27 04:52:00'),
(31, 'Sofa', 2, 'sofa-set-500x500.jpg', 1, '2020-07-03 18:30:44', '2020-07-03 11:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'IndianRed', '#CD5C5C', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(2, 'LightCoral', '#F08080', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(3, 'Salmon', '#FA8072', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(4, 'DarkSalmon', '#E9967A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(5, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(6, 'Crimson', '#DC143C', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(7, 'Red', '#FF0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(8, 'FireBrick', '#B22222', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(9, 'DarkRed', '#8B0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(10, 'Pink', '#FFC0CB', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(11, 'LightPink', '#FFB6C1', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(12, 'HotPink', '#FF69B4', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(13, 'DeepPink', '#FF1493', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(14, 'MediumVioletRed', '#C71585', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(15, 'PaleVioletRed', '#DB7093', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(16, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(17, 'Coral', '#FF7F50', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(18, 'Tomato', '#FF6347', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(19, 'OrangeRed', '#FF4500', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(20, 'DarkOrange', '#FF8C00', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(21, 'Orange', '#FFA500', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(22, 'Gold', '#FFD700', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(23, 'Yellow', '#FFFF00', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(24, 'LightYellow', '#FFFFE0', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(25, 'LemonChiffon', '#FFFACD', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(26, 'LightGoldenrodYellow', '#FAFAD2', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(27, 'PapayaWhip', '#FFEFD5', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(28, 'Moccasin', '#FFE4B5', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(29, 'PeachPuff', '#FFDAB9', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(30, 'PaleGoldenrod', '#EEE8AA', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(31, 'Khaki', '#F0E68C', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(32, 'DarkKhaki', '#BDB76B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(33, 'Lavender', '#E6E6FA', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(34, 'Thistle', '#D8BFD8', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(35, 'Plum', '#DDA0DD', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(36, 'Violet', '#EE82EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(37, 'Orchid', '#DA70D6', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(38, 'Fuchsia', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(39, 'Magenta', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(40, 'MediumOrchid', '#BA55D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(41, 'MediumPurple', '#9370DB', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(42, 'Amethyst', '#9966CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(43, 'BlueViolet', '#8A2BE2', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(44, 'DarkViolet', '#9400D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(45, 'DarkOrchid', '#9932CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(46, 'DarkMagenta', '#8B008B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(47, 'Purple', '#800080', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(48, 'Indigo', '#4B0082', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(49, 'SlateBlue', '#6A5ACD', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(50, 'DarkSlateBlue', '#483D8B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(51, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(52, 'GreenYellow', '#ADFF2F', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(53, 'Chartreuse', '#7FFF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(54, 'LawnGreen', '#7CFC00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(55, 'Lime', '#00FF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(56, 'LimeGreen', '#32CD32', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(57, 'PaleGreen', '#98FB98', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(58, 'LightGreen', '#90EE90', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(59, 'MediumSpringGreen', '#00FA9A', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(60, 'SpringGreen', '#00FF7F', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(61, 'MediumSeaGreen', '#3CB371', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(62, 'SeaGreen', '#2E8B57', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(63, 'ForestGreen', '#228B22', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(64, 'Green', '#008000', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(65, 'DarkGreen', '#006400', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(66, 'YellowGreen', '#9ACD32', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(67, 'OliveDrab', '#6B8E23', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(68, 'Olive', '#808000', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(69, 'DarkOliveGreen', '#556B2F', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(70, 'MediumAquamarine', '#66CDAA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(71, 'DarkSeaGreen', '#8FBC8F', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(72, 'LightSeaGreen', '#20B2AA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(73, 'DarkCyan', '#008B8B', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(74, 'Teal', '#008080', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(75, 'Aqua', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(76, 'Cyan', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(77, 'LightCyan', '#E0FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(78, 'PaleTurquoise', '#AFEEEE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(79, 'Aquamarine', '#7FFFD4', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(80, 'Turquoise', '#40E0D0', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(81, 'MediumTurquoise', '#48D1CC', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(82, 'DarkTurquoise', '#00CED1', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(83, 'CadetBlue', '#5F9EA0', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(84, 'SteelBlue', '#4682B4', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(85, 'LightSteelBlue', '#B0C4DE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(86, 'PowderBlue', '#B0E0E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(87, 'LightBlue', '#ADD8E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(88, 'SkyBlue', '#87CEEB', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(89, 'LightSkyBlue', '#87CEFA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(90, 'DeepSkyBlue', '#00BFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(91, 'DodgerBlue', '#1E90FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(92, 'CornflowerBlue', '#6495ED', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(93, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(94, 'RoyalBlue', '#4169E1', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(95, 'Blue', '#0000FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(96, 'MediumBlue', '#0000CD', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(97, 'DarkBlue', '#00008B', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(98, 'Navy', '#000080', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(99, 'MidnightBlue', '#191970', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(100, 'Cornsilk', '#FFF8DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(101, 'BlanchedAlmond', '#FFEBCD', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(102, 'Bisque', '#FFE4C4', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(103, 'NavajoWhite', '#FFDEAD', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(104, 'Wheat', '#F5DEB3', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(105, 'BurlyWood', '#DEB887', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(106, 'Tan', '#D2B48C', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(107, 'RosyBrown', '#BC8F8F', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(108, 'SandyBrown', '#F4A460', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(109, 'Goldenrod', '#DAA520', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(110, 'DarkGoldenrod', '#B8860B', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(111, 'Peru', '#CD853F', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(112, 'Chocolate', '#D2691E', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(113, 'SaddleBrown', '#8B4513', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(114, 'Sienna', '#A0522D', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(115, 'Brown', '#A52A2A', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(116, 'Maroon', '#800000', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(117, 'White', '#FFFFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(118, 'Snow', '#FFFAFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(119, 'Honeydew', '#F0FFF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(120, 'MintCream', '#F5FFFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(121, 'Azure', '#F0FFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(122, 'AliceBlue', '#F0F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(123, 'GhostWhite', '#F8F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(124, 'WhiteSmoke', '#F5F5F5', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(125, 'Seashell', '#FFF5EE', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(126, 'Beige', '#F5F5DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(127, 'OldLace', '#FDF5E6', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(128, 'FloralWhite', '#FFFAF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(129, 'Ivory', '#FFFFF0', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(130, 'AntiqueWhite', '#FAEBD7', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(131, 'Linen', '#FAF0E6', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(132, 'LavenderBlush', '#FFF0F5', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(133, 'MistyRose', '#FFE4E1', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(134, 'Gainsboro', '#DCDCDC', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(135, 'LightGrey', '#D3D3D3', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(136, 'Silver', '#C0C0C0', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(137, 'DarkGray', '#A9A9A9', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(138, 'Gray', '#808080', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(139, 'DimGray', '#696969', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(140, 'LightSlateGray', '#778899', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(141, 'SlateGray', '#708090', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(142, 'DarkSlateGray', '#2F4F4F', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(143, 'Black', '#000000', '2018-11-05 02:12:30', '2018-11-05 02:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `common_setting`
--

CREATE TABLE `common_setting` (
  `id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `common_setting`
--

INSERT INTO `common_setting` (`id`, `option_name`, `option_value`, `status`) VALUES
(1, 'backedn_login_background_image', 'parraback.jpg', 1),
(2, 'site_title', 'E-SHOP', 1),
(3, 'backlogo', 'meralocalmart-50px_(1)1.png', 1),
(4, 'front_logo', 'meralocalmart-50px_(1).png', 1),
(5, 'facebook_url', 'nirbhay gander', 1),
(6, 'linkedin_url', 'https://in.linkedin.com/', 1),
(7, 'instagram_url', 'https://www.facebook.com/', 1),
(8, 'twitter_url', 'https://www.facebook.com/', 1),
(11, 'email', 'nirbhay.espsofttech1@gmail.com', 1),
(12, 'address', '155,vijay nagar indore, 155,vijay nagar indore', 1),
(13, 'mobile_no', '08962327488', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `number`, `message`, `create_date`) VALUES
(13, 'des', 'as@ds.com', 798789797, 'sdfsdf', '0000-00-00 00:00:00'),
(14, 'dsf', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(15, 'dsf', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(16, 'dsf', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(17, 'dsf', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(18, 'dsf', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(19, 'dsf', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(20, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(21, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, 'dsf', '0000-00-00 00:00:00'),
(22, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, '', '0000-00-00 00:00:00'),
(23, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, '', '0000-00-00 00:00:00'),
(24, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, '', '0000-00-00 00:00:00'),
(25, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, ' bf', '0000-00-00 00:00:00'),
(26, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, ' bf', '0000-00-00 00:00:00'),
(27, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, ' bf', '0000-00-00 00:00:00'),
(28, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, '', '0000-00-00 00:00:00'),
(29, 'Imperfect', 'shruti.jain590@gmail.com', 2147483647, 'sdf', '0000-00-00 00:00:00'),
(30, 'shruti jain', 'shruti.jain590@gmail.com', 2147483647, 'sdf', '0000-00-00 00:00:00'),
(31, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, 'sdf', '0000-00-00 00:00:00'),
(32, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, 'sdf', '0000-00-00 00:00:00'),
(33, 'nirbhay gander', 'nirbhay.itspark@gmail.com', 2147483647, 'sdf', '0000-00-00 00:00:00'),
(34, 'nirbhay', 'nirbhay.espsofttech@gmail.com', 2147483647, 'dfg', '0000-00-00 00:00:00'),
(35, 'sdsd', 'sd', 0, 'sd', '0000-00-00 00:00:00'),
(36, 'wewewe', 'eas@sdfsd', 2147483647, 'sdsd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `added_by` enum('shop','admin') NOT NULL,
  `added_by_id` int(11) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `offer_amount` float NOT NULL,
  `offer_amount_type` varchar(255) NOT NULL,
  `min_total_amount` float NOT NULL,
  `coupon_policy` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `added_by`, `added_by_id`, `coupon_code`, `start_date`, `end_date`, `status`, `offer_amount`, `offer_amount_type`, `min_total_amount`, `coupon_policy`, `create_date`) VALUES
(1, 'shop', 5, 'ITS150', '2020-01-03', '2020-09-30', 1, 10, '1', 500, '', '2019-12-12 13:47:09'),
(2, 'shop', 11, 'F50', '2020-01-03', '2020-09-30', 1, 10, '1', 200, '', '2020-06-22 07:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboys`
--

CREATE TABLE `deliveryboys` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `show_password` varchar(250) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `adhar_image` varchar(255) NOT NULL,
  `id_proof_type` enum('adhar_card','pan_card','voter_id','driving_licence') NOT NULL,
  `id_proof_id` int(11) NOT NULL,
  `id_proof_image` varchar(255) NOT NULL,
  `id_proof_status` int(11) NOT NULL,
  `address` text NOT NULL,
  `zipcode` int(11) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `device_id` varchar(250) NOT NULL COMMENT '1="android" 2="ios"',
  `device_type` varchar(250) NOT NULL,
  `fcm_token` text NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_acc_no` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(100) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `cancel_check_images` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0="Deactive" 1="Active" 3="Delete"',
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliveryboys`
--

INSERT INTO `deliveryboys` (`id`, `reg_id`, `name`, `email`, `password`, `show_password`, `mobile_no`, `image`, `house_no`, `adhar_image`, `id_proof_type`, `id_proof_id`, `id_proof_image`, `id_proof_status`, `address`, `zipcode`, `latitude`, `longitude`, `device_id`, `device_type`, `fcm_token`, `bank_name`, `bank_acc_no`, `bank_ifsc_code`, `bank_branch`, `cancel_check_images`, `status`, `create_date`, `modify_date`) VALUES
(3, 'TCT3KNNM', 'Nirbhay', 'nirbhay.espsofttech@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 8962327488, 'user2.png', '', '', 'adhar_card', 0, '', 0, '155,vijay nagar indore, 155,vijay nagar indore', 452001, '', '', '', '', '', '', '', '', '', '', 1, '2019-10-29 14:09:02', '2019-10-29 13:09:02'),
(4, 'PL46505DI', 'nirbhay gander', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 8962327478, '', '', 'aadhar-card-sample-picture.jpg', 'adhar_card', 0, '', 0, '155,vijay nagar indore, 155,vijay nagar indore', 452001, '', '', '', '', '', '', '', '', '', '', 0, '2019-11-14 08:39:56', '2019-11-14 07:39:56'),
(5, '8R56GFG8', 'Nirbhay', 'nirbhay.espsofttech@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 8962327489, '', '', '', '', 2147483647, '', 0, '155,vijay nagar indore, 155,vijay nagar indore', 452001, '', '', '', '', '', '', '', '', '', '', 1, '2019-12-06 11:55:27', '2019-12-06 10:55:27'),
(6, 'Q24NLEI2A', 'nirbhay gander', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 74158963, 'aadhar-card-sample-picture2.jpg', '', 'demopancard1.jpg', 'adhar_card', 2147483647, 'demopancard1.jpg', 0, '155,vijay nagar indore, 155,vijay nagar indore', 452001, '', '', '', '', '', '', '', '', '', '', 1, '2019-12-06 11:58:14', '2019-12-06 10:58:14'),
(7, 'H7E004A6', 'nirbhay gander', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 89623274568, '', '', '', 'pan_card', 2147483647, '', 0, '155,vijay nagar indore, 155,vijay nagar indore', 452001, '', '', '', '', '', 'SBI', 'dfg', 'df', 'dsaf', 'm1.jpg', 0, '2019-12-10 10:13:01', '2019-12-10 09:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `ds_id` int(11) NOT NULL,
  `delivery_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_status`
--

INSERT INTO `delivery_status` (`ds_id`, `delivery_status_name`) VALUES
(1, 'pending'),
(2, 'Accept by delivery boy'),
(3, 'Dispatch by shop'),
(4, 'completed'),
(5, 'cancel'),
(6, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_otp`
--

CREATE TABLE `forgot_otp` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `otp` varchar(8) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forgot_otp`
--

INSERT INTO `forgot_otp` (`id`, `mobile_no`, `otp`, `create_date`) VALUES
(1, '8962327488', '616784', '2020-07-22 07:20:58'),
(2, '7974419521', '129588', '2020-07-03 09:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `homebannerslider`
--

CREATE TABLE `homebannerslider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homebannerslider`
--

INSERT INTO `homebannerslider` (`id`, `title`, `image`, `link`, `start_date`, `end_date`, `price`, `status`, `create_date`, `modify_date`) VALUES
(1, 'Home', 'blb3.png', 'http://localhost/myproject/multivendor/shops?categories_id=Mens%20Tshirt', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 200, 1, '2020-03-26 12:37:41', '2019-11-28 12:29:19'),
(2, 'Home2', 'bag4.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-28 00:00:00', 0, 1, '2019-11-28 13:39:33', '2019-11-28 12:36:35'),
(3, 'Home3', 'kit1.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, '2020-03-26 12:37:06', '2019-11-28 12:40:13'),
(4, 'Let\'s Do Marketing With Us', 'nik.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-29 00:00:00', 0, 1, '2019-11-28 13:43:58', '2019-11-28 12:43:58'),
(5, 'Let\'s Do Marketing With Us', 'kit.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-30 00:00:00', 0, 0, '2019-11-28 14:01:54', '2019-11-28 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `homebannersliderfourth`
--

CREATE TABLE `homebannersliderfourth` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homebannersliderfourth`
--

INSERT INTO `homebannersliderfourth` (`id`, `title`, `image`, `link`, `start_date`, `end_date`, `status`, `create_date`, `modify_date`, `price`) VALUES
(1, 'Home', 'bag.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2019-11-29 13:04:49', '2019-11-28 12:29:19', 0),
(2, 'Home2', 'bag1.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2019-11-29 13:05:00', '2019-11-28 12:36:35', 0),
(3, 'Home3', 'gift2.jpg', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2019-11-29 13:05:13', '2019-11-28 12:40:13', 0),
(4, 'Let\'s Do Marketing With Us', 'nik.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-29 00:00:00', 3, '2019-11-28 13:43:58', '2019-11-28 12:43:58', 0),
(5, 'Let\'s Do Marketing With Us', 'kit.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-30 00:00:00', 3, '2019-11-28 14:01:54', '2019-11-28 13:01:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `homebannerslidersec`
--

CREATE TABLE `homebannerslidersec` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `price` float NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homebannerslidersec`
--

INSERT INTO `homebannerslidersec` (`id`, `title`, `image`, `link`, `start_date`, `end_date`, `status`, `price`, `create_date`, `modify_date`) VALUES
(1, 'Home', 'blb.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '2019-11-29 13:08:31', '2019-11-28 12:29:19'),
(2, 'Home2', 'kit.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '2019-11-29 13:08:40', '2019-11-28 12:36:35'),
(3, 'Home3', 'blb1.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '2019-11-29 13:08:47', '2019-11-28 12:40:13'),
(4, 'Let\'s Do Marketing With Us', 'gift2.jpg', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '2019-11-29 13:08:55', '2019-11-28 12:43:58'),
(5, 'Let\'s Do Marketing With Us', 'kit.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-30 00:00:00', 0, 0, '2019-11-28 14:01:54', '2019-11-28 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `homebannersliderthird`
--

CREATE TABLE `homebannersliderthird` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homebannersliderthird`
--

INSERT INTO `homebannersliderthird` (`id`, `title`, `image`, `link`, `start_date`, `end_date`, `price`, `status`, `create_date`, `modify_date`) VALUES
(1, 'Home 3', 'blb.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, '2019-11-29 13:09:52', '2019-11-28 12:29:19'),
(2, 'Home2', 'gift2.jpg', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, '2019-11-29 13:09:59', '2019-11-28 12:36:35'),
(3, 'Home3', 'blb1.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, '2019-11-29 13:10:12', '2019-11-28 12:40:13'),
(4, 'Let\'s Do Marketing With Us', 'nik.png', 'http://localhost/myproject/multivendor/home', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, '2019-11-29 13:10:25', '2019-11-28 12:43:58'),
(5, 'Let\'s Do Marketing With Us', 'kit.png', 'http://localhost/myproject/multivendor/home', '2019-11-28 00:00:00', '2019-11-30 00:00:00', 0, 3, '2019-11-28 14:01:54', '2019-11-28 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `homepopupimage`
--

CREATE TABLE `homepopupimage` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homepopupimage`
--

INSERT INTO `homepopupimage` (`id`, `image`, `link`, `status`, `create_date`) VALUES
(1, 'bag.png', 'http://maayanews.com/multivendor/clearance_product', 1, '2020-07-25 13:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `id_proof_type`
--

CREATE TABLE `id_proof_type` (
  `id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `id_proof_type`
--

INSERT INTO `id_proof_type` (`id`, `option_name`, `option_value`) VALUES
(1, 'adhar_card', 'adhar card'),
(2, 'pan_card', 'pan card'),
(3, 'voter_id', 'voter id'),
(4, 'driving_licence', 'driving licence');

-- --------------------------------------------------------

--
-- Table structure for table `login_otp`
--

CREATE TABLE `login_otp` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `otp` varchar(8) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_otp`
--

INSERT INTO `login_otp` (`id`, `mobile_no`, `otp`, `create_date`) VALUES
(1, '8962327488', '904236', '2020-07-20 13:26:53'),
(2, '7974419521', '437027', '2020-06-24 12:27:46'),
(3, '9424891320', '495530', '2020-07-20 06:53:07'),
(4, '9589163694', '471600', '2020-07-20 13:24:51'),
(5, '8770151892', '370042', '2020-07-24 12:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_address`
--

CREATE TABLE `multiple_address` (
  `add_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `multiple_address`
--

INSERT INTO `multiple_address` (`add_id`, `user_id`, `name`, `email`, `phone`, `address`, `zipcode`, `latitude`, `longitude`, `status`) VALUES
(1, 14, '', '', '', 'Chandani Chowk , New Delhi', 32131, 'f2113', '131', 1),
(2, 14, '', '', '', 'Teacher colony , indore', 4546511, '4654.464.', '4464.64', 0),
(8, 4, 'Nirbhay Nirbhay', 'ng@gmail.com', '78979879', 'indore', 452001, '22.87878787', '78.55555', 0),
(9, 4, ' Nirbhay', 'ng@gmail.com', '741258963', 'Ratlam', 741258, '7412589632', '741258963', 0),
(10, 16, '', '', '', 'teachers quarters iet davv khandwa road indore', 452001, '', '', 1),
(11, 16, '', '', '', '123 colony', 452020, '', '', 0),
(12, 4, 'Nirbhay', 'ng@gmail.com', '741258963', '155,vijay nagar indore', 452001, '456112222', '7878787878', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deliveryboy_id` int(11) NOT NULL,
  `shipping_address` text NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `shipping_charge` float NOT NULL,
  `grand_total` float NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `coupon_discount` float NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `confirm_delivery_date` datetime NOT NULL,
  `deliveryboy_accept_date` datetime NOT NULL,
  `order_receive_otp` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prduct_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `seller_id`, `user_id`, `deliveryboy_id`, `shipping_address`, `payment_type`, `payment_status`, `shipping_charge`, `grand_total`, `delivery_status`, `coupon_discount`, `coupon_code`, `create_date`, `confirm_delivery_date`, `deliveryboy_accept_date`, `order_receive_otp`, `status`, `modify_date`, `prduct_details`) VALUES
(1, 'INC2020I1', 4, 3, 3, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash_on_delivery', 'unpaid', 0, 900, 4, 0, '0000-00-00 00:00:00', '2020-01-09 04:20:36', '2020-02-25 08:21:06', '2020-02-25 08:19:11', '', 1, '2020-01-09 08:50:36', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(2, 'INC2020I2', 4, 3, 3, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash_on_delivery', 'paid', 0, 900, 4, 0, '0000-00-00 00:00:00', '2020-07-09 06:47:34', '2020-07-09 06:47:34', '2020-07-09 06:47:13', '', 1, '2020-01-09 09:08:23', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(3, 'INC2020I3', 4, 3, 0, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 3600, 1, 0, '0000-00-00 00:00:00', '2020-01-29 07:29:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-01-29 11:59:53', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"quantity\":\"2\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":1800,\"shop_id\":\"4\"},{\"id\":\"5\",\"name\":\"nirbhay gander\",\"color\":\"#E9967A\",\"quantity\":\"2\",\"main_image\":\"15458_1575635359.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":1800,\"shop_id\":\"4\"}]'),
(4, 'INC2020I4', 4, 3, 3, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 3600, 2, 0, '0000-00-00 00:00:00', '2020-07-23 13:18:15', '0000-00-00 00:00:00', '2020-07-23 13:18:15', '', 1, '2020-01-29 12:03:41', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#FA8072\",\"choice_0\":\"M\",\"quantity\":\"3\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":2700,\"shop_id\":\"4\"},{\"id\":\"7\",\"name\":\"nirbhay gander\",\"color\":\"#E9967A\",\"choice_0\":\"L\",\"choice_1\":\"50\",\"quantity\":\"1\",\"main_image\":\"3857_1575635455.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(5, 'INC2020I5', 4, 3, 0, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 1800, 1, 0, '0000-00-00 00:00:00', '2020-01-30 07:43:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-01-30 12:13:46', '{\"5\":{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#FA8072\",\"choice_0\":\"M\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"},\"9\":{\"id\":\"7\",\"name\":\"nirbhay gander\",\"color\":\"#FA8072\",\"choice_0\":\"M\",\"choice_1\":\"50\",\"quantity\":\"1\",\"main_image\":\"3857_1575635455.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"}}'),
(6, 'INC2020I6', 4, 3, 0, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 1800, 1, 0, '0000-00-00 00:00:00', '2020-01-30 07:48:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-01-30 12:18:37', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"},{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"M\",\"variations\":\"[{\\\"SIze\\\":\\\"M\\\"}]\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(7, 'INC2020I7', 4, 3, 3, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 3600, 3, 0, '0000-00-00 00:00:00', '2020-07-18 06:37:15', '0000-00-00 00:00:00', '2020-07-18 06:37:15', '', 1, '2020-01-31 06:50:47', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"2\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":1800,\"shop_id\":\"4\"},{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#FA8072\",\"choice_0\":\"M\",\"variations\":\"[{\\\"SIze\\\":\\\"M\\\"}]\",\"quantity\":\"2\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":1800,\"shop_id\":\"4\"}]'),
(8, 'INC2020I8', 4, 3, 3, '{\"name\":\"Nirbhay \",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 1800, 4, 0, '0000-00-00 00:00:00', '2020-02-01 01:11:30', '2020-02-06 14:39:59', '2020-02-05 10:15:19', '', 1, '2020-02-01 05:41:30', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#FA8072\",\"choice_0\":\"M\",\"variations\":\"[{\\\"SIze\\\":\\\"M\\\"}]\",\"quantity\":\"2\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":1800,\"shop_id\":\"4\"}]'),
(9, 'INC2020I9', 4, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 1800, 1, 0, '0000-00-00 00:00:00', '2020-02-10 03:29:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-02-10 07:59:17', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"2\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":1800,\"shop_id\":\"4\"}]'),
(10, 'INC2020I10', 4, 4, 3, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 900, 4, 0, '0000-00-00 00:00:00', '2020-02-11 01:01:27', '2020-02-11 10:48:34', '2020-02-11 10:45:42', '', 1, '2020-02-11 05:31:27', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(11, 'INC2020I11', 4, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'paid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-03-17 10:02:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-02-14 05:04:17', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(12, 'INC2020I12', 4, 4, 3, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"postal_code\":\"452001\",\"phone\":\"452001\"}', 'cash', 'unpaid', 0, 900, 4, 0, '0000-00-00 00:00:00', '2020-02-14 07:59:36', '2020-02-14 13:32:27', '2020-02-14 13:32:05', '', 1, '2020-02-14 12:29:36', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(13, 'INC2020I13', 4, 4, 3, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 3, 0, '0000-00-00 00:00:00', '2020-02-25 02:16:20', '0000-00-00 00:00:00', '2020-02-25 10:47:22', '', 1, '2020-02-25 06:46:20', '[{\"id\":\"8\",\"name\":\"nirbhay gander\",\"choice_1\":\"M\",\"variations\":\"[{\\\"Size\\\":\\\"M\\\"}]\",\"quantity\":\"1\",\"main_image\":\"16596_1575635423.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(14, 'INC2020I14', 4, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'paid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-03-17 10:02:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-03-03 08:10:16', '[{\"id\":\"10\",\"name\":\"nirbhay gander\",\"choice_1\":\"L\",\"variations\":\"[{\\\"Size\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"580671_1575635471.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(15, 'INC2020I15', 4, 4, 3, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 4, 0, '0000-00-00 00:00:00', '2020-03-17 13:04:08', '2020-03-17 14:04:08', '2020-03-17 14:03:40', '', 1, '2020-03-17 12:56:57', '[{\"id\":\"4\",\"name\":\"nirbhay gander\",\"color\":\"#F08080\",\"choice_0\":\"L\",\"variations\":\"[{\\\"SIze\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"3914_1575635327.jpeg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(16, 'INC2020I16', 11, 13, 0, '{\"name\":\"Test name test last name\",\"email\":\"sachinkkarma@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, Indi\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 450, 1, 0, '0000-00-00 00:00:00', '2020-06-25 14:19:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-06-25 14:19:54', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(17, 'INC2020I17', 11, 13, 0, '{\"name\":\"Test name test last name\",\"email\":\"sachinkkarma@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, Indi\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 450, 1, 0, '0000-00-00 00:00:00', '2020-06-25 14:40:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-06-25 14:40:31', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(18, 'INC2020I18', 11, 13, 0, '{\"name\":\"Test name test last name\",\"email\":\"sachinkkarma@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, Indi\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 450, 1, 0, '0000-00-00 00:00:00', '2020-06-25 15:42:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-06-25 15:42:00', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(19, 'INC2020I19', 12, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 0.9, 1, 0, '0000-00-00 00:00:00', '2020-07-09 06:37:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-09 06:37:48', '[{\"id\":\"20\",\"name\":\"Full Sleves\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"14464_1594017371.jpg\",\"mrp_price\":\"1.00\",\"price\":0.9,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":0.9,\"shop_id\":\"12\"}]'),
(20, 'INC2020I20', 4, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"Indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-07-12 12:07:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-12 12:07:32', '[{\"id\":\"5\",\"name\":\"nirbhay gander\",\"color\":\"#FA8072\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"15458_1575635359.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(21, 'INC2020I21', 12, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"Indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.9, 1, 0, '0000-00-00 00:00:00', '2020-07-12 12:10:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-12 12:10:08', '[{\"id\":\"20\",\"name\":\"Full Sleves\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"14464_1594017371.jpg\",\"mrp_price\":\"1.00\",\"price\":0.9,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":0.9,\"shop_id\":\"12\"}]'),
(22, 'INC2020I22', 5, 14, 3, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"Indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.99, 4, 0, '0000-00-00 00:00:00', '2020-07-12 12:16:12', '2020-07-12 12:16:12', '2020-07-12 12:16:06', '', 1, '2020-07-12 12:13:32', '[{\"id\":\"30\",\"name\":\"Pursee\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"1852_1593498384.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(23, 'INC2020I23', 5, 15, 0, '{\"name\":\"vk karma\",\"email\":\"vijaykarma@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"9424891320\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.99, 1, 0, '0000-00-00 00:00:00', '2020-07-20 06:41:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-20 06:41:01', '[{\"id\":\"26\",\"name\":\"neckles\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16789_1593766784.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(24, 'INC2020I24', 12, 15, 0, '{\"name\":\"vk karma\",\"email\":\"123@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"1234567890\",\"address\":\"iet davv\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, -9, 1, 0, '0000-00-00 00:00:00', '2020-07-20 06:45:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-20 06:45:57', '[{\"id\":\"21\",\"name\":\"Newyeargift\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"54115_1593495543.jpg\",\"mrp_price\":\"1.00\",\"price\":-9,\"discount\":\"10\",\"discount_type\":\"2\",\"discount_amount\":\"10\",\"subtotal_price\":-9,\"shop_id\":\"12\"}]'),
(25, 'INC2020I25', 12, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 49.5, 1, 0, '0000-00-00 00:00:00', '2020-07-20 13:15:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-20 13:15:13', '[{\"id\":\"25\",\"name\":\"Almond\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16379_1594017235.jpg\",\"mrp_price\":\"10.00\",\"price\":9.9,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":9.9,\"shop_id\":\"12\"},{\"id\":\"25\",\"name\":\"Almond\",\"variations\":\"[]\",\"quantity\":\"3\",\"main_image\":\"16379_1594017235.jpg\",\"mrp_price\":\"10.00\",\"price\":9.9,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":29.7,\"shop_id\":\"12\"},{\"id\":\"25\",\"name\":\"Almond\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16379_1594017235.jpg\",\"mrp_price\":\"10.00\",\"price\":9.9,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":9.9,\"shop_id\":\"12\"}]'),
(26, 'INC2020I26', 10, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"indoree\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 1.96, 1, 0, '0000-00-00 00:00:00', '2020-07-20 16:58:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-20 16:58:53', '[{\"id\":\"16\",\"name\":\"Asbash\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"17375_1592900607.jpg\",\"mrp_price\":\"2.00\",\"price\":1.96,\"discount\":\"2\",\"discount_type\":\"1\",\"discount_amount\":0.04,\"subtotal_price\":1.96,\"shop_id\":\"10\"}]'),
(27, 'INC2020I27', 12, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"indoree\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.9, 1, 0, '0000-00-00 00:00:00', '2020-07-20 17:01:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-20 17:01:07', '[{\"id\":\"20\",\"name\":\"Full Sleves\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"14464_1594017371.jpg\",\"mrp_price\":\"1.00\",\"price\":0.9,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":0.9,\"shop_id\":\"12\"}]'),
(28, 'INC2020I28', 12, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.9, 1, 0, '0000-00-00 00:00:00', '2020-07-21 05:56:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-21 05:56:21', '[{\"id\":\"20\",\"name\":\"Full Sleves\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"14464_1594017371.jpg\",\"mrp_price\":\"1.00\",\"price\":0.9,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":0.9,\"shop_id\":\"12\"}]'),
(29, 'INC2020I29', 11, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 1350, 1, 0, '0000-00-00 00:00:00', '2020-07-21 11:57:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-21 11:57:42', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"3\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":1350,\"shop_id\":\"11\"}]'),
(30, 'INC2020I30', 11, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 450, 1, 0, '0000-00-00 00:00:00', '2020-07-22 06:20:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 06:20:29', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(31, 'INC2020I31', 5, 0, 0, '{\"name\":\"Nirbhay\",\"email\":\"ng@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"7485955555\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 901.98, 1, 0, '0000-00-00 00:00:00', '2020-07-22 13:01:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 13:01:52', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"},{\"id\":\"26\",\"name\":\"neckles\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16789_1593766784.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"},{\"id\":\"26\",\"name\":\"neckles\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16789_1593766784.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(32, 'INC2020I32', 4, 0, 0, '{\"name\":\"Demo\",\"email\":\"ng@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"7532114569\",\"address\":\"indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-07-22 13:09:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 13:09:53', '[{\"id\":\"6\",\"name\":\"nirbhay gander\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16978_1575637134.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(33, 'INC2020I33', 12, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"indoree\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 9.9, 1, 0, '0000-00-00 00:00:00', '2020-07-22 13:23:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 13:23:58', '[{\"id\":\"25\",\"name\":\"Almond\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16379_1594017235.jpg\",\"mrp_price\":\"10.00\",\"price\":9.9,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":9.9,\"shop_id\":\"12\"}]'),
(34, 'INC2020I34', 12, 32, 0, '{\"name\":\"sds sdd\",\"email\":\"sds@as\",\"postal_code\":\"452001\",\"phone\":\"0\",\"address\":\"sdd\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.9, 1, 0, '0000-00-00 00:00:00', '2020-07-22 13:40:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 13:40:00', '[{\"id\":\"20\",\"name\":\"Full Sleves\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"14464_1594017371.jpg\",\"mrp_price\":\"1.00\",\"price\":0.9,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":0.9,\"shop_id\":\"12\"}]'),
(35, 'INC2020I35', 5, 33, 0, '{\"name\":\"ngk kk\",\"email\":\"ngk@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"748963214\",\"address\":\"indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-07-22 13:40:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 13:40:02', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(36, 'INC2020I36', 5, 34, 0, '{\"name\":\"shruti jain\",\"email\":\"gth@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"7412589632\",\"address\":\"indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-07-22 13:57:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 13:57:49', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(37, 'INC2020I37', 11, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"1232@123.COM\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 450.99, 1, 0, '0000-00-00 00:00:00', '2020-07-22 15:46:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-22 15:46:17', '{\"0\":{\"id\":\"27\",\"name\":\"Anckel\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"6476_1593776742.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"},\"2\":{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}}'),
(38, 'INC2020I38', 12, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.85, 1, 0, '0000-00-00 00:00:00', '2020-07-23 16:44:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-23 16:44:08', '[{\"id\":\"23\",\"name\":\"Belt\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"97713_1594017633.jpg\",\"mrp_price\":\"1.00\",\"price\":0.85,\"discount\":\"15\",\"discount_type\":\"1\",\"discount_amount\":0.15,\"subtotal_price\":0.85,\"shop_id\":\"12\"}]'),
(39, 'INC2020I39', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '0000-00-00 00:00:00', '2020-07-24 07:10:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-24 07:10:27', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(40, 'INC2020I40', 11, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 405, 1, 45, 'ITS150', '2020-07-24 12:55:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-24 12:55:22', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(41, 'INC2020I41', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 2430, 1, 270, 'F50', '2020-07-24 13:13:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-24 13:13:20', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"},{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"},{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(42, 'INC2020I42', 11, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 450, 1, 0, '', '2020-07-24 13:14:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-24 13:14:16', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(43, 'INC2020I43', 4, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-25 07:53:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 07:53:39', '[{\"id\":\"10\",\"name\":\"nirbhay gander\",\"choice_1\":\"L\",\"variations\":\"[{\\\"Size\\\":\\\"L\\\"}]\",\"quantity\":\"1\",\"main_image\":\"580671_1575635471.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(44, 'INC2020I44', 5, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.99, 1, 0, '', '2020-07-25 13:00:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:00:57', '[{\"id\":\"29\",\"name\":\"product\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"12149_1593498329.png\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(45, 'INC2020I45', 4, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-25 13:03:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:03:10', '[{\"id\":\"6\",\"name\":\"nirbhay gander\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16978_1575637134.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"4\"}]'),
(46, 'INC2020I46', 10, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 90, 1, 0, '', '2020-07-25 13:12:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:12:19', '[{\"id\":\"18\",\"name\":\"Braclet\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16789_1593495109.jpg\",\"mrp_price\":\"100.00\",\"price\":90,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":10,\"subtotal_price\":90,\"shop_id\":\"10\"}]'),
(47, 'INC2020I47', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-25 13:39:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:39:25', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(48, 'INC2020I48', 11, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 450, 1, 0, '', '2020-07-25 13:42:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:42:47', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(49, 'INC2020I49', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-25 13:43:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:43:36', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(50, 'INC2020I50', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-25 13:44:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:44:12', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(51, 'INC2020I51', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-25 13:45:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 13:45:27', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(52, 'INC2020I52', 5, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.99, 1, 0, '', '2020-07-25 14:23:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 14:23:13', '[{\"id\":\"27\",\"name\":\"Anckel\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"6476_1593776742.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(53, 'INC2020I53', 5, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, -1.01, 1, 0, '', '2020-07-25 15:09:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-25 15:09:28', '[{\"id\":\"13\",\"name\":\"asdasd\",\"choice_1\":\"\",\"variations\":\"[{\\\"\\\":\\\"\\\"}]\",\"quantity\":\"1\",\"main_image\":\"19477_1592566209.jpg\",\"mrp_price\":\"12.00\",\"price\":-2,\"discount\":\"14\",\"discount_type\":\"2\",\"discount_amount\":\"14\",\"subtotal_price\":-2,\"shop_id\":\"10\"},{\"id\":\"27\",\"name\":\"Anckel\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"6476_1593776742.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(54, 'INC2020I54', 12, 14, 0, '{\"name\":\"rahul solanki\",\"email\":\"rahul@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 9.9, 1, 0, '', '2020-07-26 05:37:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-26 05:37:19', '[{\"id\":\"25\",\"name\":\"Almond\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"16379_1594017235.jpg\",\"mrp_price\":\"10.00\",\"price\":9.9,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":9.9,\"shop_id\":\"12\"}]'),
(55, 'INC2020I55', 11, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 450, 1, 0, '', '2020-07-26 07:48:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-26 07:48:35', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(56, 'INC2020I56', 5, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-26 12:07:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-26 12:07:48', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(57, 'INC2020I57', 11, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 450, 1, 0, '', '2020-07-26 12:10:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-26 12:10:21', '[{\"id\":\"15\",\"name\":\"Simple Blouse\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"7012_1592814902.jpg\",\"mrp_price\":\"500.00\",\"price\":450,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":50,\"subtotal_price\":450,\"shop_id\":\"11\"}]'),
(58, 'INC2020I58', 5, 4, 0, '{\"name\":\"nirbhay gander\",\"email\":\"nirbhay.espsofttech@gmail.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"155,vijay nagar indore, 155,vijay nagar indore\",\"latitude\":\"22.71720790\",\"longitude\":\"75.86841130\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-27 05:13:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-27 05:13:45', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#F08080\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(59, 'INC2020I59', 12, 36, 0, '{\"name\":\"asfsa asdd\",\"email\":\"\",\"postal_code\":\"0\",\"phone\":\"0\",\"address\":\"\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.9, 1, 0, '', '2020-07-27 10:16:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-27 10:16:03', '[{\"id\":\"20\",\"name\":\"Full Sleves\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"14464_1594017371.jpg\",\"mrp_price\":\"1.00\",\"price\":0.9,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":0.1,\"subtotal_price\":0.9,\"shop_id\":\"12\"}]'),
(60, 'INC2020I60', 5, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, 0.99, 1, 0, '', '2020-07-27 16:43:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-27 16:43:25', '[{\"id\":\"27\",\"name\":\"Anckel\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"6476_1593776742.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(61, 'INC2020I61', 5, 16, 0, '{\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"452001\",\"address\":\"iet davv khandwa road indore\",\"latitude\":\"\",\"longitude\":\"\"}', 'cash', 'unpaid', 0, -8.01, 1, 0, '', '2020-07-28 03:39:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-28 03:39:38', '[{\"id\":\"21\",\"name\":\"Newyeargift\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"54115_1593495543.jpg\",\"mrp_price\":\"1.00\",\"price\":-9,\"discount\":\"10\",\"discount_type\":\"2\",\"discount_amount\":\"10\",\"subtotal_price\":-9,\"shop_id\":\"12\"},{\"id\":\"27\",\"name\":\"Anckel\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"6476_1593776742.jpg\",\"mrp_price\":\"1.00\",\"price\":0.99,\"discount\":\"1\",\"discount_type\":\"1\",\"discount_amount\":0.01,\"subtotal_price\":0.99,\"shop_id\":\"5\"}]'),
(62, 'INC2020I62', 5, 4, 0, '{\"name\":\"\",\"email\":\"\",\"postal_code\":\"452001\",\"phone\":\"\",\"address\":\"indore\",\"latitude\":\"787979\",\"longitude\":\"78979879\"}', 'cash', 'unpaid', 0, 900, 1, 0, '', '2020-07-28 06:04:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-28 06:04:42', '[{\"id\":\"11\",\"name\":\"Sofa set\",\"color\":\"#E9967A\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"10144_1593777145.jpg\",\"mrp_price\":\"1000.00\",\"price\":900,\"discount\":\"10\",\"discount_type\":\"1\",\"discount_amount\":100,\"subtotal_price\":900,\"shop_id\":\"5\"}]'),
(63, 'INC2020I63', 10, 16, 0, '{\"address_id\":\"newadd\",\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"1234567890\",\"address\":\"iet davv campus khandwa road indore\"}', 'cash', 'unpaid', 0, 1.76, 1, 0, '', '2020-07-28 07:11:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-28 07:11:26', '[{\"id\":\"12\",\"name\":\"12\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"29866_1592564529.png\",\"mrp_price\":\"1.00\",\"price\":0.88,\"discount\":\"12\",\"discount_type\":\"1\",\"discount_amount\":0.12,\"subtotal_price\":0.88,\"shop_id\":\"10\"},{\"id\":\"12\",\"name\":\"12\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"29866_1592564529.png\",\"mrp_price\":\"1.00\",\"price\":0.88,\"discount\":\"12\",\"discount_type\":\"1\",\"discount_amount\":0.12,\"subtotal_price\":0.88,\"shop_id\":\"10\"}]'),
(64, 'INC2020I64', 10, 16, 0, '{\"address_id\":\"newadd\",\"name\":\"vijay karma\",\"email\":\"vijaykarma@yahoo.com\",\"postal_code\":\"452001\",\"phone\":\"1234567890\",\"address\":\"iet davv campus khandwa road indore 452001\"}', 'cash', 'unpaid', 0, 1.96, 1, 0, '', '2020-07-28 07:27:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 1, '2020-07-28 07:27:37', '[{\"id\":\"16\",\"name\":\"Asbash\",\"variations\":\"[]\",\"quantity\":\"1\",\"main_image\":\"17375_1592900607.jpg\",\"mrp_price\":\"2.00\",\"price\":1.96,\"discount\":\"2\",\"discount_type\":\"1\",\"discount_amount\":0.04,\"subtotal_price\":1.96,\"shop_id\":\"10\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_reg_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `shop_id` int(11) NOT NULL COMMENT 'it a shop user id',
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float(10,2) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` enum('1','2') COLLATE utf8_unicode_ci NOT NULL COMMENT '1="Percentage" 2="Flat"',
  `colors` text COLLATE utf8_unicode_ci NOT NULL,
  `choice_options` text COLLATE utf8_unicode_ci NOT NULL,
  `variations` text COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `return_policy` text COLLATE utf8_unicode_ci NOT NULL,
  `product_images` text COLLATE utf8_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_sale` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1="active" 0="Deactive" 3="Delete"',
  `featured_status` int(11) NOT NULL,
  `clearance_status` int(11) NOT NULL COMMENT '1="Under Product Clearence"',
  `create_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
PARTITION BY HASH (product_id)
PARTITIONS 5;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_reg_id`, `shop_id`, `categories_id`, `sub_categories_id`, `name`, `description`, `quantity`, `unit_price`, `discount`, `discount_type`, `colors`, `choice_options`, `variations`, `unit`, `return_policy`, `product_images`, `main_image`, `tags`, `meta_title`, `meta_description`, `meta_image`, `num_of_sale`, `status`, `featured_status`, `clearance_status`, `create_date`) VALUES
(10, 'P0010', 4, 2, 4, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 10, 1000.00, 10, '1', '[]', '[{\"name\":\"choice_1\",\"title\":\"Size\",\"options\":[\"L\"]}]', '{\"L\":{\"price\":\"1000.00\",\"sku\":\"ng-L\",\"qty\":\"10\"}}', '', '    sdf    ', '[\"10310_1575463506.png\",\"2309_1575463506.jpg\",\"7241_1575463506.png\"]', '580671_1575635471.jpg', 'T-shirt', 'df', 'dsfsdf', '2309_1575463921.jpg', 0, 1, 1, 0, '2019-12-06 13:31:11'),
(5, 'P005', 4, 2, 0, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1000, 1000.00, 10, '1', '[\"#FA8072\",\"#E9967A\"]', '[]', '{\"Salmon\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon\",\"qty\":\"10\"},\"DarkSalmon\":{\"price\":\"1000.00\",\"sku\":\"ng-DarkSalmon\",\"qty\":\"10\"}}', '', ' sdfsdfdsf ', '[\"10310_1575375150.png\",\"2309_1575375150.jpg\"]', '15458_1575635359.jpg', 'belt', 'belt', 'belt', '', 0, 1, 1, 0, '2019-12-06 13:29:19'),
(15, 'P0015', 11, 12, 13, 'Simple Blouse', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1, 500.00, 10, '1', '[]', '[]', '[]', '', 'within a week', '[\"7012_1592814902.jpg\"]', '7012_1592814902.jpg', 'Blouse', 'Blouse', 'A simple blouse', '', 0, 1, 0, 0, '2020-06-22 08:35:02'),
(20, 'P0020', 12, 3, 28, 'Full Sleves', '   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.   ', 1, 1.00, 10, '1', '[]', '[]', '[]', '', '        ', '[\"11273_1594016770.jpg\"]', '14464_1594017371.jpg', 'asdasd', 'asdasd', 'asdasda', '', 0, 1, 1, 1, '2020-07-06 06:36:11'),
(25, 'P0025', 12, 9, 21, 'Almond', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. ', 500, 10.00, 1, '1', '[]', '[]', '[]', '', '    ', '[\"25019_1594017235.jpg\"]', '16379_1594017235.jpg', 'sdfsdf', 'sdfsdf', 'sdfsd', '', 0, 1, 1, 1, '2020-07-06 06:33:55'),
(30, 'P0030', 5, 7, 24, 'Pursee', '      Are you planning to build your own&nbsp;multi-vendor&nbsp;marketplace website for your ... Every seller/vendor has a unique URL and metadata like meta&nbsp;description&nbsp;and meta ... With 350 projects and some 200,000 man hours under our&nbsp;belts        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.    ', 1, 1.00, 1, '1', '[]', '[{\"name\":\"choice_1\",\"title\":\"size\",\"options\":[\"7\"]}]', '{\"7\":{\"price\":null,\"sku\":null,\"qty\":null}}', '', '                  ', '[\"3075_1593777331.jpg\",\"3709_1593777331.jpg\",\"4508_1593777331.jpg\",\"3241_1593777331.jpg\",\"5232_1593777331.jpg\",\"8836_1593777331.jpg\"]', '1852_1593498384.jpg', 'sdf', 'sdfs', 'sdfs', '', 0, 1, 0, 1, '2020-07-18 06:35:49'),
(6, 'P006', 4, 2, 0, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1000, 1000.00, 10, '1', '[]', '[]', '[]', '', '   sdfsdfdsf   ', '[]', '16978_1575637134.jpg', 'shooes', 'shooes', 'shooes', '', 0, 1, 1, 0, '2019-12-06 13:58:54'),
(1, '', 4, 3, 0, 'Mens T-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1000, 200.00, 10, '1', '', '', '', '', '', '', '', '', '', '', '', 0, 3, 0, 0, '2019-11-13 08:41:17'),
(11, 'P0011', 5, 2, 4, 'Sofa set', ' Super Comfortable Eclipse Series&nbsp;Sofa&nbsp;thats Ergonomically designed and Aesthetically appealing from PRIMROSE. ', 10, 1000.00, 10, '1', '[\"#F08080\",\"#FA8072\",\"#E9967A\"]', '[]', '{\"LightCoral\":{\"price\":\"1000.00\",\"sku\":\"Ss-LightCoral\",\"qty\":\"10\"},\"Salmon\":{\"price\":\"1000.00\",\"sku\":\"Ss-Salmon\",\"qty\":\"10\"},\"DarkSalmon\":{\"price\":\"1000.00\",\"sku\":\"Ss-DarkSalmon\",\"qty\":\"10\"}}', '', '  2&nbsp; hours&nbsp;  ', '[\"6433_1593777145.jpg\",\"5379_1593777145.jpg\",\"6252_1593777145.jpg\",\"7842_1593777145.jpg\",\"10296_1593777145.jpg\"]', '10144_1593777145.jpg', 'furniture,sofaset', 'Furniture', 'Furniture', '3689_1585314195.png', 0, 1, 1, 0, '2020-07-03 11:52:25'),
(16, 'P0016', 10, 7, 0, 'Asbash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 12, 2.00, 2, '1', '[]', '[]', '[]', '', 'asd', '[\"17375_1592900607.jpg\"]', '17375_1592900607.jpg', 'sd', 'sd', 'sd', '2058_1592900607.png', 0, 1, 1, 1, '2020-06-23 08:23:27'),
(21, 'P0021', 12, 7, 25, 'Newyeargift', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1, 1.00, 10, '2', '[]', '[]', '[]', '', '  ', '[\"54115_1593495543.jpg\"]', '54115_1593495543.jpg', 'asda', 'asdasd', 'sdasd', '', 0, 1, 1, 1, '2020-06-30 05:39:03'),
(26, 'P0026', 5, 6, 26, 'neckles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1, 1.00, 1, '1', '[]', '[]', '[]', '', '            ', '[\"11004_1593776937.jpg\",\"9684_1593776937.jpg\",\"9430_1593776937.jpg\",\"12673_1593776937.jpg\",\"10436_1593776937.jpg\"]', '16789_1593766784.jpg', 'sadf', 'sdf', 'sdf', '', 0, 1, 0, 1, '2020-07-03 11:48:57'),
(2, '', 4, 3, 0, 'Female T-shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1000, 1000.00, 10, '1', '', '', '', '', '', '', '', '', '', '', '', 0, 3, 0, 0, '2019-11-13 08:45:41'),
(7, 'P007', 4, 2, 4, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 10, 1000.00, 10, '1', '[\"#FA8072\",\"#E9967A\",\"#FFA07A\",\"#FFA07A\"]', '[{\"name\":\"choice_0\",\"title\":\"Size\",\"options\":[\"M\",\"L\",\"N\"]},{\"name\":\"choice_1\",\"title\":\"Lenth\",\"options\":[\"50\"]}]', '{\"Salmon-M-50\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon-M-50\",\"qty\":\"10\"},\"Salmon-L-50\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon-L-50\",\"qty\":\"10\"},\"Salmon-N-50\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon-N-50\",\"qty\":\"10\"},\"DarkSalmon-M-50\":{\"price\":\"1000.00\",\"sku\":\"ng-DarkSalmon-M-50\",\"qty\":\"10\"},\"DarkSalmon-L-50\":{\"price\":\"1000.00\",\"sku\":\"ng-DarkSalmon-L-50\",\"qty\":\"10\"},\"DarkSalmon-N-50\":{\"price\":\"1000.00\",\"sku\":\"ng-DarkSalmon-N-50\",\"qty\":\"10\"},\"LightSalmon-M-50\":{\"price\":\"1000.00\",\"sku\":\"ng-LightSalmon-M-50\",\"qty\":\"10\"},\"LightSalmon-L-50\":{\"price\":\"1000.00\",\"sku\":\"ng-LightSalmon-L-50\",\"qty\":\"10\"},\"LightSalmon-N-50\":{\"price\":\"1000.00\",\"sku\":\"ng-LightSalmon-N-50\",\"qty\":\"10\"}}', '', '                    dsfsdfsdf                    ', '[\"2309_1575455329.jpg\",\"7241_1575455329.png\",\"2309_1575457289.jpg\"]', '3857_1575635455.jpeg', 'begs', 'begs', 'begs', '', 0, 1, 0, 0, '2019-12-06 13:30:55'),
(12, 'P0012', 10, 2, 0, '12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 12, 1.00, 12, '1', '[]', '[]', '[]', '', '12', '[\"17887_1592564529.jpg\"]', '29866_1592564529.png', 'aaa', 'a', 'a', '28346_1592564529.png', 0, 1, 0, 1, '2020-06-19 11:02:09'),
(17, 'P0017', 10, 7, 0, 'pant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1, 12.00, 12, '1', '[]', '[]', '[]', '', '  ', '[\"33430_1593494889.png\"]', '33430_1593494889.png', 'asd', 'asd', 'asd', '', 0, 1, 1, 1, '2020-06-30 05:28:09'),
(22, 'P0022', 12, 8, 23, 'Dell Laptop', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.  ', 1, 1.00, 20, '1', '[]', '[]', '[]', '', '      ', '[\"16484_1594017581.jpg\"]', '9656_1594017581.jpg', 'sdfsdf', 'sdfs', 'dfsd', '', 0, 1, 1, 1, '2020-07-06 06:39:41'),
(27, 'P0027', 5, 6, 26, 'Anckel', '  a woman\'s&nbsp;handbag&nbsp;or pocketbook. a small&nbsp;bag,&nbsp;pouch, or case for carrying money. anything resembling a&nbsp;purse&nbsp;in appearance, use, etc. a sum of money offered as a prize or reward.      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velitLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1, 1.00, 1, '1', '[]', '[]', '[]', '', '        ', '[\"3656_1593498246.jpeg\",\"5951_1593776742.jpg\",\"3744_1593776778.jpg\"]', '6476_1593776742.jpg', 'sdfsd', 'fsdfsd', 'fsdfsd', '', 0, 1, 0, 1, '2020-07-03 11:46:18'),
(8, 'P008', 4, 2, 4, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 10, 1000.00, 10, '1', '[]', '[{\"name\":\"choice_1\",\"title\":\"Size\",\"options\":[\"M\",\"L\",\"N\"]}]', '{\"M\":{\"price\":\"1000.00\",\"sku\":\"ng-M\",\"qty\":\"10\"},\"L\":{\"price\":\"1000.00\",\"sku\":\"ng-L\",\"qty\":\"10\"},\"N\":{\"price\":\"1000.00\",\"sku\":\"ng-N\",\"qty\":\"10\"}}', '', '   dsfsdf   ', '[]', '16596_1575635423.jpg', 'jwellery', 'jwellery', 'jwellery', '', 0, 1, 1, 0, '2019-12-06 13:30:23'),
(3, 'P003', 4, 2, 0, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 10, 100.00, 2, '1', '[\"#FA8072\",\"#E9967A\",\"#FFA07A\",\"#FFA07A\"]', '[{\"name\":\"choice_0\",\"title\":\"Size\",\"options\":[\"L\",\"M\",\"N\"]}]', '{\"Salmon-L\":{\"price\":\"100.00\",\"sku\":\"ng-Salmon-L\",\"qty\":\"10\"},\"Salmon-M\":{\"price\":\"100.00\",\"sku\":\"ng-Salmon-M\",\"qty\":\"10\"},\"Salmon-N\":{\"price\":\"100.00\",\"sku\":\"ng-Salmon-N\",\"qty\":\"10\"},\"DarkSalmon-L\":{\"price\":\"100.00\",\"sku\":\"ng-DarkSalmon-L\",\"qty\":\"10\"},\"DarkSalmon-M\":{\"price\":\"100.00\",\"sku\":\"ng-DarkSalmon-M\",\"qty\":\"10\"},\"DarkSalmon-N\":{\"price\":\"100.00\",\"sku\":\"ng-DarkSalmon-N\",\"qty\":\"10\"},\"LightSalmon-L\":{\"price\":\"100.00\",\"sku\":\"ng-LightSalmon-L\",\"qty\":\"10\"},\"LightSalmon-M\":{\"price\":\"100.00\",\"sku\":\"ng-LightSalmon-M\",\"qty\":\"10\"},\"LightSalmon-N\":{\"price\":\"100.00\",\"sku\":\"ng-LightSalmon-N\",\"qty\":\"10\"}}', '', '        ', '[]', '', '', '', '', '', 0, 3, 0, 0, '2019-12-04 12:21:39'),
(13, 'P0013', 10, 6, 0, 'asdasd', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 14, 12.00, 14, '2', '[]', '[{\"name\":\"choice_1\",\"title\":\"\",\"options\":[\"\"]}]', '{\"\":{\"price\":null,\"sku\":null,\"qty\":null}}', '', '  asd  ', '[\"33430_1592566209.png\"]', '19477_1592566209.jpg', 'sd', 'sd', 'sd', '28346_1592566209.png', 0, 1, 0, 1, '2020-06-19 12:17:10'),
(18, 'P0018', 10, 6, 27, 'Braclet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.', 1, 100.00, 10, '1', '[]', '[]', '[]', '', '  ', '[\"16789_1593495109.jpg\"]', '16789_1593495109.jpg', 'asdaa', 'sdasdasd', 'asdasdas', '', 0, 1, 1, 1, '2020-06-30 05:31:49'),
(23, 'P0023', 12, 8, 23, 'Belt', '   Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit.   ', 1, 1.00, 15, '1', '[]', '[]', '[]', '', '        ', '[\"61455_1594016872.jpg\",\"97713_1594017105.jpg\"]', '97713_1594017633.jpg', 'asasf', 'sdfgsdfs', 'dfsdf', '', 0, 1, 1, 1, '2020-07-06 06:40:33'),
(28, 'P0028', 5, 6, 27, 'watch', '    liquid template file mentioned in the configuration page. After pasting the code,&nbsp;a&nbsp;seller link will be displayed on the product&nbsp;description        ', 1, 1.00, 11, '1', '[]', '[]', '[]', '', '            ', '[\"9213_1593776566.jpg\",\"7062_1593776566.jpg\",\"4313_1593776566.jpg\",\"13027_1593776567.jpg\"]', '10546_1593776445.jpeg', 'sdfs', 'sdsd', 'sdf', '', 0, 1, 0, 1, '2020-07-18 06:57:17'),
(4, 'P004', 4, 2, 0, 'nirbhay gander', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.', 10, 1000.00, 10, '1', '[\"#F08080\",\"#FA8072\",\"#FFA07A\",\"#FFA07A\"]', '[{\"name\":\"choice_0\",\"title\":\"SIze\",\"options\":[\"L\",\"M\",\"N\"]}]', '{\"LightCoral-L\":{\"price\":\"1000.00\",\"sku\":\"ng-LightCoral-L\",\"qty\":\"10\"},\"LightCoral-M\":{\"price\":\"1000.00\",\"sku\":\"ng-LightCoral-M\",\"qty\":\"10\"},\"LightCoral-N\":{\"price\":\"1000.00\",\"sku\":\"ng-LightCoral-N\",\"qty\":\"10\"},\"Salmon-L\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon-L\",\"qty\":\"10\"},\"Salmon-M\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon-M\",\"qty\":\"10\"},\"Salmon-N\":{\"price\":\"1000.00\",\"sku\":\"ng-Salmon-N\",\"qty\":\"10\"},\"LightSalmon-L\":{\"price\":\"1000.00\",\"sku\":\"ng-LightSalmon-L\",\"qty\":\"10\"},\"LightSalmon-M\":{\"price\":\"1000.00\",\"sku\":\"ng-LightSalmon-M\",\"qty\":\"10\"},\"LightSalmon-N\":{\"price\":\"1000.00\",\"sku\":\"ng-LightSalmon-N\",\"qty\":\"10\"}}', '', 'sdfsdfsdf', '[\"10310_1575367631.png\",\"2309_1575367631.jpg\"]', '3914_1575635327.jpeg', 'sd', 'sd', 'sd', '', 0, 1, 1, 0, '2019-12-06 13:28:47'),
(9, 'P009', 4, 2, 4, 'jwellery', ' sdf ', 10, 1000.00, 10, '1', '[]', '[]', '[]', '', ' sdf ', '[\"2309_1575460012.jpg\",\"7241_1575460012.png\"]', '3914_1575637123.jpeg', 'T-shirt', 'begs', 'dsfsdf', '', 0, 1, 1, 0, '2019-12-06 13:58:43'),
(14, 'P0014', 10, 11, 0, 'qweak', 'asd', 3, 1.00, 21, '', '[]', '[]', '[]', '', 'asd', '[\"29986_1592568943.png\"]', '19477_1592568943.jpg', 'as', 'as', 'as', '', 0, 1, 0, 1, '2020-06-19 12:15:43'),
(19, 'P0019', 10, 11, 14, 'School shoes', '  ', 1, 1.00, 15, '1', '[]', '[]', '[]', '', '  ', '[\"7928_1593495245.png\"]', '2100_1593495245.jpg', 'asdasd', 'asdasd', 'asdasd', '', 0, 1, 1, 1, '2020-06-30 05:34:05'),
(24, 'P0024', 12, 9, 20, 'Aashirwad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero.          ', 10, 1.00, 10, '2', '[]', '[]', '[]', '', '          ', '[\"16352_1594017902.jpg\"]', '18054_1594017787.jpg', 'asdfdf', 'gdsfgsd', 'sdgsd', '', 0, 1, 1, 1, '2020-07-06 06:46:03'),
(29, 'P0029', 5, 7, 24, 'product', '  Let customers easily create&nbsp;gift&nbsp;registry lists and share them with friends to get the&nbsp;presents&nbsp;they really want. Enhance customer experience      ', 1, 1.00, 1, '1', '[]', '[]', '[]', '', '        ', '[\"12149_1593498329.png\",\"10714_1593775994.jpg\",\"35122_1593775994.jpg\",\"5800_1593776039.jpg\"]', '12149_1593498329.png', 'sdfs', 'sdfsd', 'sdfsd', '', 0, 1, 0, 1, '2020-07-03 11:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `productreviewrating`
--

CREATE TABLE `productreviewrating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productreviewrating`
--

INSERT INTO `productreviewrating` (`id`, `user_id`, `product_id`, `order_id`, `rating`, `title`, `review`, `create_date`, `status`) VALUES
(1, 1, 4, 11, 1, 'Excellent', 'I have purchased shirts from Minimalism a few times and am never disappointed. The quality is excellent and the shipping is amazing. It seems like it\'s at your front door the minute you get off your pc.\r\n', '2020-02-14 08:59:12', 1),
(2, 2, 4, 10, 3, 'Amazing', 'Minimalism is the online !', '2020-02-14 11:18:23', 1),
(3, 3, 4, 12, 4, 'Nicely', 'Unbeatable service and selection. This store has the best business model I have seen on the net. They are true to their word, and go the extra mile for their customers.', '2020-02-14 13:33:08', 1),
(4, 5, 4, 15, 4, 'Awesome', 'I felt like a purchasing partner more than a customer. You have a lifetime client in me.', '2020-03-17 14:05:10', 1),
(5, 6, 10, 21, 3, 'asad', 'asdasdasdasd asdasd', '2020-07-04 00:00:00', 1),
(6, 7, 10, 22, 1, 'asad', 'asdasdasdasd asdasd', '2020-07-04 00:00:00', 1),
(7, 4, 4, 15, 5, '', '', '2020-07-09 06:48:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration_otp`
--

CREATE TABLE `registration_otp` (
  `id` int(11) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration_otp`
--

INSERT INTO `registration_otp` (`id`, `mobile_no`, `otp`, `create_date`) VALUES
(30, '7974419522', '865802', '2020-07-22 10:49:33'),
(31, '85236974458', '663278', '2020-07-22 12:58:50'),
(32, '1598741235', '802695', '2020-07-22 13:08:55'),
(33, '7974419524', '765574', '2020-07-22 13:16:59'),
(34, '4563217896', '043782', '2020-07-22 13:23:45'),
(35, '7974419526', '724335', '2020-07-22 13:24:32'),
(36, '8963257412', '017028', '2020-07-22 13:25:08'),
(37, '7974419527', '865045', '2020-07-22 13:36:49'),
(38, '456328965', '930084', '2020-07-22 13:37:28'),
(39, '7974419528', '991058', '2020-07-22 13:38:12'),
(40, '12365478945', '541742', '2020-07-22 13:56:08'),
(41, '7974419529', '227999', '2020-07-23 07:09:52'),
(42, '8319774478', '544847', '2020-07-26 08:18:13'),
(43, '7974419531', '368299', '2020-07-27 08:17:29'),
(44, '7974419532', '955671', '2020-07-27 10:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `shopreviewrating`
--

CREATE TABLE `shopreviewrating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `attachement` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopreviewrating`
--

INSERT INTO `shopreviewrating` (`id`, `user_id`, `shop_id`, `order_id`, `rating`, `comment`, `attachement`, `create_date`, `status`) VALUES
(1, 4, 8, 11, 3, '', '', '2020-02-14 08:49:47', 1),
(2, 4, 8, 10, 4, '', '', '2020-02-14 11:18:30', 1),
(3, 4, 4, 12, 3, '', '', '2020-02-14 13:32:54', 1),
(4, 4, 4, 15, 3, '', '', '2020-03-17 14:04:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL,
  `shop_reg_id` varchar(50) NOT NULL,
  `shop_registration_no` varchar(100) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_logo` text NOT NULL,
  `shop_image_desktop` text NOT NULL,
  `shop_image_mobile` text NOT NULL,
  `gst_number` varchar(20) NOT NULL,
  `pan_no` varchar(15) NOT NULL,
  `adhar_no` varchar(15) NOT NULL,
  `pan_image` varchar(255) NOT NULL,
  `adhar_image` varchar(255) NOT NULL,
  `owner_image` text NOT NULL,
  `gumasta_image` varchar(255) NOT NULL,
  `shop_address` text NOT NULL,
  `shop_latitude` varchar(50) NOT NULL,
  `shop_longitude` varchar(100) NOT NULL,
  `shopping_categories` varchar(255) NOT NULL,
  `shopping_specialized` varchar(255) NOT NULL,
  `shop_type_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_acc_no` varchar(100) NOT NULL,
  `bank_ifsc_code` varchar(100) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `gst_image` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `cancel_check_image` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_sales` int(11) NOT NULL,
  `meta_tags` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured_status` tinyint(1) NOT NULL,
  `order_counts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shop_reg_id`, `shop_registration_no`, `owner_name`, `mobile_no`, `email`, `password`, `shop_name`, `shop_logo`, `shop_image_desktop`, `shop_image_mobile`, `gst_number`, `pan_no`, `adhar_no`, `pan_image`, `adhar_image`, `owner_image`, `gumasta_image`, `shop_address`, `shop_latitude`, `shop_longitude`, `shopping_categories`, `shopping_specialized`, `shop_type_id`, `bank_name`, `bank_acc_no`, `bank_ifsc_code`, `bank_branch`, `gst_image`, `account_holder_name`, `cancel_check_image`, `last_login`, `total_sales`, `meta_tags`, `create_date`, `modify_date`, `status`, `featured_status`, `order_counts`) VALUES
(4, 'MHJ0OMHLP', 'dsfdf', 'Nirbhay Ganderff', 'OTgyNzY0MTQ4MA==', 'nirbhay.espsofttech@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ITSPARK ', 'l3.png', 'l31.png', 'l31.png', 'MTIzNDU2Nzg5NQ==', 'TkRnME5UUTFORFU', 'NTQ0NTY0NjQ2NDY', '', 'l3.png', 'l3.png', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '23.334169', '75.037636', 'Mens Tshirt,Jwellery', 'Mens Tshirt,Jwellery', 1, '', '', '', '', '', '', '', '2020-07-18 07:03:10', 0, '', '2019-11-06 07:16:44', '2019-11-06 11:46:44', 1, 1, 0),
(5, '88GSJ7', '45454545', '4545454', 'Nzk3NDQxOTUyMQ==', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 's1', 'l4.png', 'l41.png', 'l4.png', 'ODc4Nzg3ODc4Nzg3ODc=', 'Vm0wd2QyUXlWa1p', 'TnpnM09EYzROemc', 'demopancard.jpg', 'aadhar-card-sample-picture.jpg', 'l4.png', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.718670', '75.855710', 'furniture,Jwellery,Gift', '', 1, 'sbi', '123456789', '3216549687', 'sbi', '', 'Rajat verma', '', '2020-07-22 06:19:19', 0, '', '2019-11-14 02:10:34', '2019-11-14 06:40:34', 1, 1, 0),
(6, 'IAH49G0G', 'show123456', 'itspark', 'NzUyMTQ4NTIyMg==', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'itspark', 'l5.png', 'l5.png', 'l5.png', 'ODc4Nzg3ODc4Nzg3ODc=', 'VmtjMWQySnJNSGR', 'Nzg3ODc4Nzg3ODc', 'demopancard1.jpg', 'aadhar-card-sample-picture1.jpg', 'itspark1.jpg', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.738650', '75.886150', 'Gift,Electronics', '', 1, 'sf', 'asdasdds', 'dfdsads', 'sad', '', '', '', '2020-06-29 10:32:03', 0, '', '2019-12-10 03:23:30', '2019-12-10 07:53:30', 1, 1, 0),
(8, '52A8DTJ', '457897', 'nirbhay gander', 'NzQxMjU4OTYzNQ==', 'nirbhay.espsofttech@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ITSPARK', 'Your uploaded image file is blank.', 'm2.png', 'm2.png', 'ODc4Nzg3ODc4Nzg3ODc=', 'Vm0weE1HRnJNVmh', 'NTQ1NDU0NTQ1NA=', 'demopancard211.jpg', 'aadhar-card-sample-picture3.jpg', 'demo11.jpg', '', '155,vijay nagar indore, 155,vijay nagar indore', '22.71720790', '75.86841130', 'Electronics', 'Jwellery', 1, '', '', '', '', '', '', '', '2020-06-29 10:30:04', 0, '', '2019-12-16 03:17:27', '2019-12-16 07:47:27', 1, 1, 0),
(9, 'L5KQLG', 'YTR123456', 'nirbhay gander', 'MDg5NjIzMjc0ODg=', 'nirbhay.itspark@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'itspark', '172.png', '172.png', '172.png', 'Nzg3ODc4Nzg3OA==', 'Vm0wd2QyUXlWa1p', 'Nzg3ODc4Nzg3ODc', 'demopancard2.jpg', 'aadhar-card-sample-picture2.jpg', 'itspark.jpg', 'blb3.png', '155,vijay nagar indore, 155,vijay nagar indore', '22.71720790', '75.86841130', 'Mens Tshirt,Jwellery', 'furniture,Jwellery', 1, 'SBI', 'asdasdds', 'df', 'dsaf', '', '', 'bag5.png', '2020-06-29 10:30:48', 0, 'furniture,jwellery', '2019-12-17 05:10:17', '2019-12-17 09:40:17', 1, 1, 0),
(10, 'J2N5RST8', '123456', 'rahul', 'Nzk3NDQxOTUyMQ==', 'rahul.itspark@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'rahul', 'Your uploaded image file is blank.', '17375_1592900607.jpg', '17375_1592900607.jpg', 'MTIzNDU2Nzg5', 'VmpGamVFMUZOVmh', '', '', '', '17375_1592900607.jpg', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', 'Jwellery,Gift,Kids', '', 1, 'sbi', '123456798', '123465', 'abcd', '', 'rahul', '', '2020-06-30 12:43:57', 0, '', '2020-06-19 17:53:57', '2020-06-19 10:53:57', 1, 0, 0),
(11, 'O4M8EP2', '123qweasd', 'Sachin Karma', 'OTY4NTgxNDc0Mw==', 'sachinkkarma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Riya Boutique', 'RiyaBoutique.png', '265100_-_Copy1.jpg', 'm21.png', 'R1NUSU4xMjNxd2U=', 'Vm0wd2VFNUdiRmR', 'VmtaYVUxTnRWbkp', 'RiyaBoutique.png', 'RiyaBoutique.png', 'RiyaBoutique.png', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', 'Gift,Kids,Womens', '', 1, 'AXIS', '7412589632', '415288', 'indore', 'RiyaBoutique.png', 'Sachin Karma', 'download.jpg', '2020-07-21 10:07:13', 0, '', '2020-06-22 14:45:55', '2020-06-22 07:45:55', 1, 1, 0),
(12, '3Q5R3J4D', '123321', 'ram', 'OTgyNzY0MTQ4MA==', 'ram@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ram store', '5.jpg', '5.jpg', '5.jpg', 'YXNkZmcyNTYzaA==', 'YXNkZmcyNTYzaGE', 'ODk3OTg3OTg3OTc', '', '', 'rj.jpg', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', 'Mens Tshirt,Gift,Electronics,Grocery', 'Mens Tshirt', 1, 'sbi', '123456798546', 'sbin1212000', 'sni', '', 'ram verma', '', '2020-06-29 12:33:58', 0, 'as', '2020-06-29 19:33:58', '2020-06-29 12:33:58', 1, 0, 0),
(13, 'NEDTMAJBS', '987789', 'warma', 'MTIzNDU2Nzg5MA==', 'egal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'egale', '', '', '', 'MTIzMTIzMTIzMTIz', 'MTIzMTIzMTIz', 'MTIzMTIzMTIzMTI', '', '', '', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', 'Mens Tshirt,Jwellery,Electronics,Grocery', '', 1, 'asdasd', '12312312312312', 'sdsdasd', 'sdasd', '', 'asdasd', '', '2020-07-04 05:38:19', 0, '', '2020-07-04 12:36:22', '2020-07-04 05:36:22', 3, 0, 0),
(14, 'CKN8KHPQ4', 'qwqwe', 'qweqw', 'YXNm', 'admain@admin.coa', 'e10adc3949ba59abbe56e057f20f883e', 'aasa', '2309_1575457647.jpg', '2309_1575452698.jpg', '2309_1575452698.jpg', 'YXNkYXM=', 'WVhOaw==', '', '', '', '2309_1575367614.jpg', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', '', '', 2, 'asdas', 'asd', 'asd', 'asd', '', 'asdas', '', '2020-07-04 09:22:10', 0, '', '2020-07-04 16:17:47', '2020-07-04 09:17:47', 3, 0, 0),
(15, 'QOQDNQE3I', '234234', 'ssdfsdjk', 'Nzg5NDU2MTIzMA==', 'sdfsd@sdf', 'e10adc3949ba59abbe56e057f20f883e', 'dmart', 'Untitled-2.png', 'Untitled-2.png', 'logo52.png', 'MjMyMzQyMw==', 'Vmtaa2QxUnJNVVp', 'VFdwTk1FMXFUWGx', 'paytm.png', 'paytm.png', 'demo12.jpg', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', 'furniture,Mens Tshirt,Jwellery,Gift', 'sofa,Diwali gift', 1, 'asdasd', '12123123123', '123123', 'aweqw', 'logo5.png', 'asdasd', '', '2020-07-20 13:25:49', 0, '', '2020-07-20 13:44:55', '2020-07-20 06:44:55', 3, 0, 0),
(16, 'OMB7RSNIT', 'sdfsd', 'sdfs', 'c2RzZmRm', 'sdfsdfsdfsdsdfsd@sd', 'd41d8cd98f00b204e9800998ecf8427e', 'sdfsd', '', '', '', 'c2Rmc2Q=', 'c2Rmc2Rm', 'c2Rmcw==', '', '', '', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India', '22.71720790', '75.86841130', '', '', 1, 'sdfsd', 'sdfsdf', 'sdfsd', '', '', 'sdfsdf', '', '2020-07-20 13:25:44', 0, '', '2020-07-20 20:25:31', '2020-07-20 13:25:31', 3, 0, 0),
(18, 'H9K6H4CJ', '12345678', 'vijay', 'OTQyNDg5MTMyMA==', 'vijaykarma@gmail.com', 'c33367701511b4f6020ec61ded352059', 'aarna fashion store', 'IMG_20180529_2150121.jpg', '265100.jpg', 'l311.png', 'MTJhYmNwazEyMzlhem0x', 'Vm1wR1lXRXhUWGx', 'Vm10YVlWVXhUblJ', 'IMG_20180529_2150121.jpg', 'IMG_20180529_2150121.jpg', 'IMG_20180529_2150121.jpg', 'IMG_20180529_2150121.jpg', 'sindhi colony indore', '22.71720790', '75.86841130', 'Electronics', '', 1, 'sbi', '123456789012', 'sbi0n1234', 'iit', 'IMG_20180529_2150121.jpg', 'vijay k', 'IMG_20180529_2150121.jpg', '2020-07-21 09:48:45', 0, '', '2020-07-21 00:35:44', '2020-07-20 17:35:44', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_types`
--

CREATE TABLE `shop_types` (
  `shop_type_id` int(11) NOT NULL,
  `shop_type_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_types`
--

INSERT INTO `shop_types` (`shop_type_id`, `shop_type_name`) VALUES
(1, 'Individual'),
(2, 'Registerd Shop');

-- --------------------------------------------------------

--
-- Table structure for table `support_message`
--

CREATE TABLE `support_message` (
  `message_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `user_type` enum('shop','customer','deliveryboy','admin') NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_message`
--

INSERT INTO `support_message` (`message_id`, `ticket_id`, `message`, `to_id`, `from_id`, `user_type`, `create_date`) VALUES
(1, 138, 'hello', 1, 13, 'customer', '2020-02-07 13:27:35'),
(2, 138, 'xczxczv', 1, 13, 'customer', '2020-02-07 13:33:12'),
(3, 138, 'zxcxzcxzc', 13, 1, 'admin', '2020-02-07 14:17:45'),
(4, 138, 'dfsdf', 13, 1, 'admin', '2020-02-07 14:19:00'),
(5, 138, 'dfsdf', 13, 1, 'admin', '2020-02-07 14:19:04'),
(6, 138, 'szxfsdf', 13, 1, 'admin', '2020-02-07 14:19:44'),
(7, 139, 'rtyr', 1, 14, 'deliveryboy', '2020-02-06 00:00:00'),
(8, 138, 'sds', 1, 13, 'customer', '2020-02-08 04:53:02'),
(9, 138, 'sds', 1, 13, 'customer', '2020-02-08 04:53:05'),
(10, 138, 'Wake', 1, 13, 'customer', '2020-02-08 04:55:51'),
(11, 138, 'Wake', 1, 13, 'customer', '2020-02-08 04:56:05'),
(12, 138, 'Wake', 1, 13, 'customer', '2020-02-08 04:56:08'),
(13, 138, 'All', 1, 13, 'customer', '2020-02-08 04:57:27'),
(14, 138, 'as', 1, 13, 'customer', '2020-02-08 05:06:47'),
(0, 0, 'Hi how are you', 1, 4, 'customer', '2020-02-08 09:57:58'),
(0, 0, 'Hi how are you', 1, 4, 'customer', '2020-02-08 09:58:06'),
(0, 0, 'Hi how are you', 1, 4, 'customer', '2020-02-08 09:58:24'),
(0, 0, 'dxfgfd', 1, 4, 'customer', '2020-02-08 09:59:41'),
(0, 0, 'dfdsfdf', 1, 4, 'customer', '2020-02-08 10:00:20'),
(0, 0, 'dfdsf', 1, 4, 'customer', '2020-02-08 10:00:47'),
(0, 0, 'sdfsdf', 1, 4, 'customer', '2020-02-08 10:02:33'),
(0, 0, 'sdsdf', 1, 4, 'customer', '2020-02-08 10:09:17'),
(0, 0, 'Hi how are you', 1, 4, 'customer', '2020-02-08 10:10:03'),
(0, 0, 'Hi how are you', 1, 4, 'customer', '2020-02-08 10:19:48'),
(0, 0, 'df', 1, 4, 'customer', '2020-02-08 10:21:59'),
(0, 0, 'fg', 1, 4, 'customer', '2020-02-08 10:22:43'),
(0, 0, 'fg', 1, 4, 'customer', '2020-02-08 10:23:02'),
(0, 0, 'sdfsdf', 1, 4, 'customer', '2020-02-08 10:23:19'),
(0, 0, 'sdf', 1, 4, 'customer', '2020-02-10 07:01:42'),
(0, 0, 's', 1, 4, 'customer', '2020-02-10 07:01:48'),
(0, 0, 's sdf', 1, 4, 'customer', '2020-02-10 07:01:51'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:01'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:07'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:11'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:12'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:13'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:13'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:13'),
(0, 1, 'Hi how are you', 1, 4, 'customer', '2020-02-14 13:35:14'),
(0, 1, 'rrtgrg', 1, 13, 'customer', '2020-06-25 14:14:31'),
(0, 1, 'rrtgrg', 1, 13, 'customer', '2020-06-25 14:14:33'),
(0, 1, 'rrtgrgrgferpgr', 1, 13, 'customer', '2020-06-25 14:14:35'),
(0, 1, 'HI', 1, 4, 'customer', '2020-06-30 10:49:40'),
(0, 1, 'How are you?', 1, 4, 'customer', '2020-06-30 10:49:48'),
(0, 1, 'fffff', 4, 1, 'admin', '2020-07-21 08:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket`
--

CREATE TABLE `support_ticket` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('shop','customer','deliveryboy') NOT NULL,
  `query` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `close_date` datetime NOT NULL,
  `status` enum('open','close') NOT NULL,
  `ticket_reg_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_ticket`
--

INSERT INTO `support_ticket` (`ticket_id`, `user_id`, `user_type`, `query`, `create_date`, `close_date`, `status`, `ticket_reg_id`) VALUES
(1, 4, 'customer', 'Hello ,  How can i order', '2020-02-14 13:34:40', '0000-00-00 00:00:00', 'open', 'ES20201'),
(2, 0, 'shop', 'Demo Demo', '2020-06-19 11:54:41', '0000-00-00 00:00:00', 'open', 'ES20202');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `image`, `description`, `status`, `create_date`) VALUES
(5, 'Ramesh Singh', 'client-3.jpg', 'It is my pleasure to provide a rave review for Exotica Infotech Media. From my first conversation with Adam I knew they were the right website design company for us…. The whole team was incredibly attentive and responsive…they', 0, '2020-02-28 01:06:49'),
(6, 'Suresh patel', 'client-1.jpg', 'It is my pleasure to provide a rave review for Exotica Infotech Media. From my first conversation with Adam I knew they were the right website design company for us…. The whole team was incredibly attentive and responsive…they', 0, '2020-02-28 01:07:18'),
(7, 'Gopal', 'defaultuserimg.jpg', 'It is my pleasure to provide a rave review for Exotica Infotech Media. From my first conversation with Adam I knew they were the right website design company for us…. The whole team was incredibly attentive and responsive…they', 0, '2020-02-28 01:07:42'),
(8, 'Ramesh', 'defaultuserimg1.jpg', 'It is my pleasure to provide a rave review for Exotica Infotech Media. From my first conversation with Adam I knew they were the right website design company for us…. The whole team was incredibly attentive and responsive…they', 0, '2020-02-28 01:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `show_password` varchar(250) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `country_isd_code` int(11) NOT NULL DEFAULT '91',
  `zipcode` int(11) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `device_id` varchar(250) NOT NULL COMMENT '1="android" 2="ios"',
  `device_type` varchar(250) NOT NULL,
  `fcm_token` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0="Deactive" 1="Active" 3="Delete"',
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `reg_id`, `first_name`, `last_name`, `email`, `password`, `show_password`, `mobile_no`, `image`, `house_no`, `address`, `country_isd_code`, `zipcode`, `latitude`, `longitude`, `device_id`, `device_type`, `fcm_token`, `status`, `create_date`, `modify_date`, `area_id`) VALUES
(1, '5NOFODKHL', 'nirbhay gander', '', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 8962327489, 'parraback1.jpg', '', '155,vijay nagar indore, 155,vijay nagar indore', 91, 452001, '', '', '', '', '', 3, '2019-10-24 11:50:34', '2019-10-24 09:50:34', 4),
(2, 'B46O59JCM', 'nirbhay', '', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 896232747, 'logo12.png', '', '155,vijay nagar indore, 155,vijay nagar indore', 91, 452001, '22.71720790', '75.86841130', '', '', '', 0, '2019-10-24 14:50:48', '2019-10-24 12:50:48', 0),
(3, 'HKA9HFBR', 'Nirbhay', 'd', 'nirbhay.espsofttech1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 741852963, 'logo_gif21.gif', '', '155,vijay nagar indore, 155,vijay nagar indore', 91, 452001, '22.71720790', '75.86841130', '', '', '', 1, '2019-10-29 14:05:05', '2019-10-29 13:05:05', 4),
(4, 'M6GM9LLI', 'nirbhay', 'gander', 'nirbhay.espsofttech@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 8962327488, 'imgpsh_fullsize_anim_(1).png', '', '155,vijay nagar indore, 155,vijay nagar indore', 91, 452001, '22.71720790', '75.86841130', '', '', '', 1, '2019-10-29 14:06:33', '2019-10-29 13:06:33', 0),
(5, '45454545', 'nirbhay', 'gander', '', 'e10adc3949ba59abbe56e057f20f883e', '', 8962327456, '', '', '', 91, 0, '', '', '', '', '', 0, '2019-11-26 12:31:05', '2019-11-26 11:31:05', 0),
(9, 'ES9', 'Nirbhay', 'Gander', '', 'e10adc3949ba59abbe56e057f20f883e', '', 8962321596, '', '', '', 91, 0, '', '', '', '', '', 1, '2019-11-26 12:41:41', '2019-11-26 11:41:41', 0),
(10, 'ES10', 'Nirbhay', 'Gander', '', 'e10adc3949ba59abbe56e057f20f883e', '', 8962327415, '', '', '', 91, 0, '', '', '', '', '', 1, '2019-11-26 13:12:35', '2019-11-26 12:12:35', 0),
(11, '6NC39LLN', 'de', '', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 896232748, '', '', '155,vijay nagar indore, 155,vijay nagar indore', 91, 452001, '22.71720790', '75.86841130', '', '', '', 1, '2019-12-13 07:51:00', '2019-12-13 06:51:00', 0),
(12, 'ES12', 'nirbhaydf', 'gander', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 7418529632, '', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, Indi', 91, 452001, '22.71720790', '75.86841130', '', '', '', 1, '2019-12-13 13:44:23', '2019-12-13 12:44:23', 0),
(13, '3QG84H9B', 'Test name', 'test last name', 'sachinkkarma@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 9685814743, '2.png', '', 'Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, Indi', 91, 452001, '22.71720790', '75.86841130', '', '', '', 1, '2020-06-22 09:31:10', '2020-06-22 09:31:10', 1),
(14, 'ES14', 'rahul', 'solanki', 'rahul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419521, '17375_15929006072.jpg', '', 'indore', 91, 452001, '', '', '', '', '', 1, '2020-06-24 12:27:01', '2020-06-24 12:27:01', 0),
(15, 'ES15', 'vk', 'karma', '', 'e10adc3949ba59abbe56e057f20f883e', '', 9424891320, '', '', '', 91, 0, '', '', '', '', '', 3, '2020-07-20 06:39:00', '2020-07-20 06:39:00', 0),
(16, 'ES16', 'vijay', 'karma', 'vijaykarma@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', 8770151892, '', '', 'iet davv khandwa road indore', 91, 452001, '', '', '', '', '', 1, '2020-07-20 06:57:25', '2020-07-20 06:57:25', 0),
(17, 'ES17', 'vijay', 'sir', '', 'e10adc3949ba59abbe56e057f20f883e', '', 9589163694, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-20 13:23:28', '2020-07-20 13:23:28', 0),
(18, 'ES18', 'rajat', 'sharma', '', 'e10adc3949ba59abbe56e057f20f883e', '', 9827641481, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-20 18:14:51', '2020-07-20 18:14:51', 0),
(19, 'ES19', 'rajat', 'ashh', '', 'e10adc3949ba59abbe56e057f20f883e', '', 9827641482, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-20 18:16:34', '2020-07-20 18:16:34', 0),
(20, 'ES20', 'asdfas', 'asdasd', '', 'e10adc3949ba59abbe56e057f20f883e', '', 9827641483, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-20 18:18:08', '2020-07-20 18:18:08', 0),
(21, 'ES21', 'sdfs', 'sdfs', '', 'e10adc3949ba59abbe56e057f20f883e', '', 9827641485, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-21 03:20:43', '2020-07-21 03:20:43', 0),
(22, 'ES22', 'Nirbhay', 'gander', '', 'e10adc3949ba59abbe56e057f20f883e', '', 8488088893, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-21 07:45:05', '2020-07-21 07:45:05', 0),
(23, 'ES23', 'gn', 'h', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7412589635, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-21 07:52:49', '2020-07-21 07:52:49', 0),
(24, 'ES24', 'ng', 'demo', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7412589632, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 06:25:17', '2020-07-22 06:25:17', 0),
(25, 'ES25', 'sdsd', 'sdsd', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419522, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 10:50:09', '2020-07-22 10:50:09', 0),
(26, 'ES26', 'nirbhay', 'g2', '', 'e10adc3949ba59abbe56e057f20f883e', '', 85236974458, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:00:17', '2020-07-22 13:00:17', 0),
(27, 'ES27', 'demo', 'demog', '', 'e10adc3949ba59abbe56e057f20f883e', '', 1598741235, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:09:10', '2020-07-22 13:09:10', 0),
(28, 'ES28', 'dw', 'sdsd', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419524, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:17:26', '2020-07-22 13:17:26', 0),
(29, 'ES29', 'rtm', 'rtm2', '', 'e10adc3949ba59abbe56e057f20f883e', '', 4563217896, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:23:59', '2020-07-22 13:23:59', 0),
(30, 'ES30', 'asdasd', 'asdas', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419526, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:24:53', '2020-07-22 13:24:53', 0),
(31, 'ES31', 'ert', 'gm', '', 'e10adc3949ba59abbe56e057f20f883e', '', 8963257412, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:25:20', '2020-07-22 13:25:20', 0),
(32, 'ES32', 'sds', 'sdd', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419528, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:38:56', '2020-07-22 13:38:56', 0),
(33, 'ES33', 'ngk', 'kk', '', 'e10adc3949ba59abbe56e057f20f883e', '', 456328965, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:39:03', '2020-07-22 13:39:03', 0),
(34, 'ES34', 'gth', 'th', '', 'e10adc3949ba59abbe56e057f20f883e', '', 12365478945, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-22 13:56:29', '2020-07-22 13:56:29', 0),
(35, 'ES35', 'as', 'asas', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419531, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-27 08:18:19', '2020-07-27 08:18:19', 0),
(36, 'ES36', 'asfsa', 'asdd', '', 'e10adc3949ba59abbe56e057f20f883e', '', 7974419532, '', '', '', 91, 0, '', '', '', '', '', 1, '2020-07-27 10:15:26', '2020-07-27 10:15:26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `brand_logo`
--
ALTER TABLE `brand_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_setting`
--
ALTER TABLE `common_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_id` (`reg_id`);

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `forgot_otp`
--
ALTER TABLE `forgot_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homebannerslider`
--
ALTER TABLE `homebannerslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homebannersliderfourth`
--
ALTER TABLE `homebannersliderfourth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homebannerslidersec`
--
ALTER TABLE `homebannerslidersec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homebannersliderthird`
--
ALTER TABLE `homebannersliderthird`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepopupimage`
--
ALTER TABLE `homepopupimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_proof_type`
--
ALTER TABLE `id_proof_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_otp`
--
ALTER TABLE `login_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_address`
--
ALTER TABLE `multiple_address`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_idx` (`product_id`);

--
-- Indexes for table `productreviewrating`
--
ALTER TABLE `productreviewrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_otp`
--
ALTER TABLE `registration_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopreviewrating`
--
ALTER TABLE `shopreviewrating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`),
  ADD UNIQUE KEY `shop_registration_no` (`shop_registration_no`),
  ADD KEY `shop_idx` (`shop_id`);

--
-- Indexes for table `shop_types`
--
ALTER TABLE `shop_types`
  ADD PRIMARY KEY (`shop_type_id`);

--
-- Indexes for table `support_message`
--
ALTER TABLE `support_message`
  ADD KEY `message_idx` (`message_id`);

--
-- Indexes for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_id` (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_logo`
--
ALTER TABLE `brand_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `common_setting`
--
ALTER TABLE `common_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_status`
--
ALTER TABLE `delivery_status`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forgot_otp`
--
ALTER TABLE `forgot_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homebannerslider`
--
ALTER TABLE `homebannerslider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homebannersliderfourth`
--
ALTER TABLE `homebannersliderfourth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homebannerslidersec`
--
ALTER TABLE `homebannerslidersec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homebannersliderthird`
--
ALTER TABLE `homebannersliderthird`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homepopupimage`
--
ALTER TABLE `homepopupimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `id_proof_type`
--
ALTER TABLE `id_proof_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_otp`
--
ALTER TABLE `login_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `multiple_address`
--
ALTER TABLE `multiple_address`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `productreviewrating`
--
ALTER TABLE `productreviewrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration_otp`
--
ALTER TABLE `registration_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `shopreviewrating`
--
ALTER TABLE `shopreviewrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shop_types`
--
ALTER TABLE `shop_types`
  MODIFY `shop_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
