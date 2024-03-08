-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 02:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_shoesphereweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `username`, `password`) VALUES
(1, 'Zyro', 'Zyro123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_responsetbl`
--

CREATE TABLE `admin_responsetbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `response` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_responsetbl`
--

INSERT INTO `admin_responsetbl` (`id`, `user_id`, `response`, `date`) VALUES
(10, 8, 'Thank your for your response.', '2024-01-15 15:28:16'),
(17, 10, 'Thanks for your response Kurt.', '2024-01-16 12:48:27'),
(24, 24, 'thanks', '2024-03-07 16:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `item_size` varchar(100) DEFAULT NULL,
  `item_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`id`, `user_id`, `item_name`, `item_price`, `item_qty`, `subtotal`, `item_size`, `item_img`) VALUES
(232, 24, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png'),
(233, 24, 'Nike Women\'s Dunk Low', 6000, 1, 6000, 'Size 7', 'Nike-img/shoe3.png'),
(234, 24, 'Nike Men\'s Dunk Low', 6000, 1, 6000, 'Size 7', 'Nike-img/shoe2.png'),
(235, 24, 'KD Trey 5', 7000, 1, 7000, 'Size 7', 'kd-img/kd1.png'),
(236, 24, 'Nike Men\'s Sneaker', 5000, 1, 5000, 'Size 7', 'Nike-img/shoe1.png'),
(237, 24, 'KD Blazer Mid', 10000, 1, 10000, 'Size 7', 'kd-img/kd3.png');

-- --------------------------------------------------------

--
-- Table structure for table `concernarchive`
--

CREATE TABLE `concernarchive` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concernarchive`
--

INSERT INTO `concernarchive` (`id`, `user_id`, `username`, `email`, `message`) VALUES
(2, 20, 'John', 'johnfordbuliag182@gmail.com', 'Hello Thanks for your good services.'),
(3, 21, 'Zyro', 'johnfordbuliag182@gmail.com', 'Thanks for your good services.');

-- --------------------------------------------------------

--
-- Table structure for table `concerntbl`
--

CREATE TABLE `concerntbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `concerntbl`
--

INSERT INTO `concerntbl` (`id`, `user_id`, `username`, `email`, `message`) VALUES
(27, 23, 'KenToy', 'kenneth@gmail.com', 'The web system\'s intuitive design, responsive features, and user-friendly interface create a seamless experience. Efficient navigation, modern layout, and helpful features contribute to an engaging and secure online environment, ensuring user satisfaction.'),
(29, 24, 'Zyro', 'johnfordbuliag182@gmail.com', 'Thanks For your assessing my concern.');

-- --------------------------------------------------------

--
-- Table structure for table `orderarchive`
--

CREATE TABLE `orderarchive` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `item_size` varchar(50) DEFAULT NULL,
  `item_img` varchar(100) DEFAULT NULL,
  `date_purchased` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderarchive`
--

INSERT INTO `orderarchive` (`id`, `item_id`, `user_id`, `item_name`, `item_price`, `item_qty`, `subtotal`, `item_size`, `item_img`, `date_purchased`) VALUES
(3, 104, 20, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-10 14:02:07'),
(4, 105, 20, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-02-10 14:02:07'),
(5, 110, 21, 'Nike Men\'s Sneaker', 5000, 3, 15000, 'Size 7', 'Nike-img/shoe1.png', '2024-02-15 11:15:09'),
(6, 111, 21, 'KD Sky Walk', 8000, 1, 8000, 'Size 7', 'kd-img/kd2.png', '2024-02-15 11:15:09'),
(7, 112, 21, 'KD Trey 5', 7000, 1, 7000, 'Size 7', 'kd-img/kd1.png', '2024-02-15 11:15:09'),
(8, 115, 21, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-02-15 11:15:09'),
(9, 116, 21, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-15 11:18:40'),
(10, 117, 21, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-02-15 11:18:40'),
(11, 118, 21, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-02-15 11:18:40'),
(12, 119, 21, 'KD Trey 5', 7000, 1, 7000, 'Size 7', 'kd-img/kd1.png', '2024-02-15 11:18:40'),
(13, 121, 21, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-15 11:18:40'),
(14, 123, 21, 'Nike Men\'s Dunk Low', 6000, 3, 18000, 'Size 15', 'Nike-img/shoe2.png', '2024-02-24 15:49:27'),
(15, 124, 21, 'KD Trey 5', 7000, 5, 35000, 'Size 7', 'kd-img/kd1.png', '2024-02-24 15:49:27'),
(16, 125, 21, 'KD Blazer Mid', 10000, 1, 10000, 'Size 7', 'kd-img/kd3.png', '2024-02-24 15:49:27'),
(17, 128, 21, 'Adidas Crazyflight', 5000, 2, 10000, 'Size 15', 'adidas-img/adidas3.png', '2024-02-29 14:01:00'),
(18, 129, 21, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-29 14:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `item_price` double DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `item_size` varchar(50) DEFAULT NULL,
  `item_img` varchar(100) DEFAULT NULL,
  `date_purchased` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`id`, `user_id`, `item_name`, `item_price`, `item_qty`, `subtotal`, `item_size`, `item_img`, `date_purchased`) VALUES
(112, 21, 'KD Trey 5', 7000, 3, 21000, 'Size 7', 'kd-img/kd1.png', '2024-02-15 11:15:09'),
(115, 21, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-02-15 11:15:09'),
(116, 21, 'Adidas Crazyflight', 5000, 2, 10000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-15 11:18:40'),
(117, 21, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-02-15 11:18:40'),
(118, 21, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-02-15 11:18:40'),
(119, 21, 'KD Trey 5', 7000, 1, 7000, 'Size 7', 'kd-img/kd1.png', '2024-02-15 11:18:40'),
(121, 21, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-15 11:18:40'),
(123, 21, 'Nike Men\'s Dunk Low', 6000, 3, 18000, 'Size 15', 'Nike-img/shoe2.png', '2024-02-24 15:49:27'),
(124, 21, 'KD Trey 5', 7000, 5, 35000, 'Size 7', 'kd-img/kd1.png', '2024-02-24 15:49:27'),
(125, 21, 'KD Blazer Mid', 10000, 1, 10000, 'Size 7', 'kd-img/kd3.png', '2024-02-24 15:49:27'),
(128, 21, 'Adidas Crazyflight', 5000, 2, 10000, 'Size 15', 'adidas-img/adidas3.png', '2024-02-29 14:01:00'),
(129, 21, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-02-29 14:01:00'),
(130, 23, 'Adidas Men\'s Hoops', 3000, 5, 15000, 'Size 15', 'adidas-img/adidas1.png', '2024-03-02 15:23:57'),
(131, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-02 15:33:33'),
(132, 23, 'Adidas Men\'s Hoops', 3000, 2, 6000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-02 15:36:09'),
(133, 23, 'Nike Women\'s Dunk Low', 6000, 2, 12000, 'Size 7', 'Nike-img/shoe3.png', '2024-03-02 15:45:24'),
(134, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-02 15:57:16'),
(135, 23, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-02 15:57:31'),
(136, 23, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-02 15:58:24'),
(137, 23, 'Nike Women\'s Dunk Low', 6000, 1, 6000, 'Size 7', 'Nike-img/shoe3.png', '2024-03-02 16:00:15'),
(138, 23, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-02 16:00:33'),
(139, 23, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-02 16:05:14'),
(141, 24, 'Adidas Alpha Sneakers', 4000, 2, 8000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-03 21:25:24'),
(142, 23, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-04 14:15:17'),
(143, 23, 'Nike Women\'s Dunk Low', 6000, 1, 6000, 'Size 7', 'Nike-img/shoe3.png', '2024-03-04 14:15:17'),
(144, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(145, 23, 'Adidas Men\'s Hoops', 3000, 3, 9000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(146, 23, 'Adidas Men\'s Hoops', 3000, 2, 6000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(147, 23, 'Adidas Men\'s Hoops', 3000, 3, 9000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(148, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(149, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(150, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(151, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(152, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(153, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(154, 23, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(155, 23, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-04 14:15:17'),
(156, 23, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-04 14:15:17'),
(157, 23, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-04 14:15:17'),
(158, 24, 'Nike Men\'s Sneaker', 5000, 1, 5000, 'Size 7', 'Nike-img/shoe1.png', '2024-03-04 14:15:17'),
(159, 24, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 14:15:17'),
(160, 24, 'KD Blazer Mid', 10000, 1, 10000, 'Size 7', 'kd-img/kd3.png', '2024-03-04 14:15:17'),
(161, 24, 'Nike Women\'s Dunk Low', 6000, 1, 6000, 'Size 7', 'Nike-img/shoe3.png', '2024-03-04 14:15:17'),
(162, 24, 'KD Sky Walk', 8000, 1, 8000, 'Size 7', 'kd-img/kd2.png', '2024-03-04 14:15:17'),
(163, 24, 'KD Trey 5', 7000, 1, 7000, 'Size 7', 'kd-img/kd1.png', '2024-03-04 14:15:17'),
(164, 24, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-04 16:13:41'),
(165, 24, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-04 16:13:41'),
(166, 24, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 16:13:41'),
(167, 24, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-04 16:15:34'),
(168, 24, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-04 16:22:06'),
(169, 24, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-04 16:22:06'),
(170, 24, 'Adidas Men\'s Hoops', 3000, 3, 9000, 'Size 15', 'adidas-img/adidas1.png', '2024-03-05 01:48:23'),
(171, 24, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-05 01:50:14'),
(172, 24, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-05 01:50:14'),
(173, 24, 'Adidas Men\'s Hoops', 3000, 1, 3000, 'Size 7', 'adidas-img/adidas1.png', '2024-03-05 01:50:14'),
(174, 24, 'Adidas Alpha Sneakers', 4000, 2, 8000, 'Size 14', 'adidas-img/adidas2.png', '2024-03-07 15:52:14'),
(175, 24, 'Adidas Crazyflight', 5000, 3, 15000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-07 16:18:59'),
(176, 24, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-07 16:21:36'),
(177, 24, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-07 16:21:36'),
(178, 24, 'Adidas Crazyflight', 5000, 1, 5000, 'Size 7', 'adidas-img/adidas3.png', '2024-03-07 16:21:36'),
(179, 24, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-07 16:23:29'),
(180, 24, 'Adidas Alpha Sneakers', 4000, 1, 4000, 'Size 7', 'adidas-img/adidas2.png', '2024-03-07 16:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE `selection` (
  `id` int(11) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `value` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`id`, `description`, `value`) VALUES
(1, 'Default', 'Default'),
(2, 'Ascending Order', 'Ascending'),
(3, 'Descending Order', 'Descending'),
(4, 'Adidas', 'Adidas'),
(5, 'Nike', 'Nike'),
(6, 'KD', 'KD');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_value` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_value`, `description`) VALUES
(1, 'Size 7', 'Size 7 - 9.625 inches'),
(2, 'Size 8', 'Size 8 - 9.875 inches'),
(3, 'Size 9', 'Size 9 - 10.1875 inches'),
(4, 'Size 10', 'Size 10 - 10.5 inches'),
(5, 'Size 11', 'Size 11 - 10.75 inches'),
(6, 'Size 12', 'Size 12 - 11.0625 inches'),
(7, 'Size 13', 'Size 13 - 11.25 inches'),
(8, 'Size 14', 'Size 14 - 11.5625 inches'),
(9, 'Size 15', 'Size 15 - 11.875 inches');

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE `userfeedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userfeedback`
--

INSERT INTO `userfeedback` (`id`, `user_id`, `name`, `email`, `message`) VALUES
(4, 22, 'Cris Ann Joy', 'cris@gmail.com', '\r\nDear [Ecommerce Website] Team, I want to express my appreciation for your user-friendly website and high-quality products. Although my overall experience was positive, I encountered a minor issue during the checkout process. I believe addressing this can enhance the customer journey. Looking forward to continued improvements. Thank you for providing a great platform for online shopping.'),
(5, 23, 'KenToy', 'kenneth@gmail.com', 'Dear [Ecommerce Website] Team, I extend my gratitude for your intuitive website and premium products. Despite an overall positive experience, a minor checkout issue arose. Addressing this can elevate the customer journey. Eagerly anticipating ongoing improvements. Thank you for consistently providing an excellent online shopping platform experience.'),
(6, 24, 'John Ford', 'johnfordbuliag182@gmail.com', 'I extend my sincere appreciation for the meticulously crafted website and the unparalleled quality of your premium products. My overall experience has been commendable; however, I would like to bring to your attention a minor issue encountered during the checkout process. I firmly believe that addressing this matter will contribute significantly to elevating the customer journey.'),
(7, 24, 'Zyro', 'johnfordbuliag182@gmail.com', 'I extend my sincere appreciation for the meticulously crafted website and the unparalleled quality of your premium products. My overall experience has been commendable; however, I would like to bring to your attention a minor issue encountered during the checkout process. I firmly believe that addressing this matter will contribute significantly to elevating the customer journey.'),
(8, 24, 'Hanz', 'johnfordbuliag182@gmail.com', 'Thanks For good service.');

-- --------------------------------------------------------

--
-- Table structure for table `usersarchive`
--

CREATE TABLE `usersarchive` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersarchive`
--

INSERT INTO `usersarchive` (`id`, `user_id`, `name`, `username`, `email`, `password`, `image`) VALUES
(4, 20, 'John', 'John', 'johnfordbuliag182@gmail.com', 'John123', 'avatars/men2.jpg'),
(5, 21, 'Zyro', 'Zyro', 'johnfordbuliag182@gmail.com', 'Zyro', 'avatars/men6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `name`, `username`, `email`, `password`, `image`) VALUES
(22, 'Cris Ann', 'Cris Ann', 'cris@gmail.com', 'Cris Ann', 'avatars/girl6.jpg'),
(23, 'Kenneth', 'KenToy', 'kenneth@gmail.com', 'KenToy', 'avatars/men3.jpg'),
(24, 'John Ford', 'Zyro', 'johnfordbuliag182@gmail.com', 'Zyro', 'avatars/men6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_responsetbl`
--
ALTER TABLE `admin_responsetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concernarchive`
--
ALTER TABLE `concernarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concerntbl`
--
ALTER TABLE `concerntbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderarchive`
--
ALTER TABLE `orderarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selection`
--
ALTER TABLE `selection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `usersarchive`
--
ALTER TABLE `usersarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_responsetbl`
--
ALTER TABLE `admin_responsetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `concernarchive`
--
ALTER TABLE `concernarchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `concerntbl`
--
ALTER TABLE `concerntbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orderarchive`
--
ALTER TABLE `orderarchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `selection`
--
ALTER TABLE `selection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userfeedback`
--
ALTER TABLE `userfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usersarchive`
--
ALTER TABLE `usersarchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD CONSTRAINT `userfeedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
