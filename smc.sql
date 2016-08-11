-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2016 at 12:41 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smc`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `phone`, `name`, `surname`) VALUES
(1, '87082929394', 'Daulet', 'Kuzerbay'),
(2, '87057769813', 'Almat', 'Ybray'),
(3, '87017582287', 'Aknur', 'Abubakirova'),
(4, '87086625225', 'Dauren', 'Mukhametkarim'),
(5, '87089201587', 'Dilshat', 'Erkinov'),
(6, '87073756939', 'Aktilek', 'Zhumadil'),
(7, '87772273101', 'Aldiyar', 'Primbayev'),
(8, '87073300096', 'Alisher', 'Ertau'),
(9, '87789577117', 'Gabit', 'Kirey'),
(10, '87029117367', 'Farkhat', 'Rapikhov'),
(11, '87077000000', 'Aidar', 'Zaurbek'),
(12, '87073723221', 'Arman', 'Biggy'),
(13, '87471790166', 'Erkezhan', 'Zhenisova'),
(14, '87756849884', 'Gulzhannat', 'Saburova'),
(15, '87777777777', 'Nursultan', 'Nazarbayev'),
(17, '+77082223344', 'Alish', 'Zhangbyrshy');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `login`, `password`, `name`) VALUES
(2, 'login', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Bachmanity'),
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Company'),
(4, 'doocky', 'df88d041b7d00cd31e47e97e7b6a005dccc55958', 'doockyInk'),
(5, 'daur', '47002dd07afbfa55648db01b4abe20eb4a8f59f3', 'daurInk'),
(12, 'aknur', 'a692200e3a9002470a3d0e75265ff04e1d83ffc6', 'Aknur'),
(18, 'aknurito', 'a1b96e07680df5a3b879e8cd0479c577c7f34242', 'Aknurito'),
(19, 'qwe', '056eafe7cf52220de2df36845b8ed170c67e23e3', 'qwe'),
(20, 'biggy', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'biggyInk');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `type`, `price`) VALUES
(1, 'iphone', 'phones', 500),
(2, 'samsung', 'phones', 600),
(3, 'htc', 'phones', 400),
(4, 'blackberry', 'phones', 800),
(5, 'asus ', 'laptop', 1000),
(6, 'iphone 5s', 'phones', 800),
(7, 'ipod', 'mp3', 100),
(11, 'sony walkman', 'mp3', 130),
(12, 'ipod nano', 'mp3', 120),
(13, 'mac book', 'laptop', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `history_call_center`
--

CREATE TABLE IF NOT EXISTS `history_call_center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `manager_to_id` int(11) NOT NULL,
  `rejection` int(11) NOT NULL,
  `rejection_cause` text NOT NULL,
  `manager_from_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `history_call_center`
--

INSERT INTO `history_call_center` (`id`, `client_id`, `manager_to_id`, `rejection`, `rejection_cause`, `manager_from_id`, `date`) VALUES
(1, 10, 1, 1, 'Korochee', 2, '2016-08-04 08:23:04'),
(2, 13, 5, 0, '', 2, '2016-08-04 08:31:57'),
(3, 14, 1, 0, '', 2, '2016-08-04 08:36:02'),
(4, 8, 4, 0, '', 2, '2016-08-04 09:30:22'),
(5, 8, 3, 1, 'Because Almat is chort!', 2, '2016-08-04 09:32:20'),
(6, 15, 3, 0, '', 2, '2016-08-05 10:41:37'),
(7, 15, 4, 1, 'qweq', 2, '2016-08-05 10:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `history_of_sales`
--

CREATE TABLE IF NOT EXISTS `history_of_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `result` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `history_of_sales`
--

INSERT INTO `history_of_sales` (`id`, `client_id`, `manager_id`, `goods_id`, `date`, `result`) VALUES
(2, 3, 1, 1, '2016-08-04 06:06:49', 'wfsdfsdf'),
(3, 3, 1, 1, '2016-08-04 06:08:14', 'asd'),
(4, 3, 1, 1, '2016-08-04 06:12:15', 'qwe'),
(5, 3, 1, 1, '2016-08-04 06:13:07', 'asd'),
(6, 12, 1, 2, '2016-08-04 08:31:44', 'asdsd'),
(7, 3, 1, 1, '2016-08-04 08:33:32', 'asdsadas'),
(8, 3, 1, 1, '2016-08-04 08:34:34', 'asdasd'),
(9, 3, 1, 1, '2016-08-04 08:36:09', 'fghjk'),
(10, 3, 1, 1, '2016-08-04 08:38:21', 'hjkl'),
(11, 3, 1, 1, '2016-08-04 08:38:28', 'lklkl'),
(12, 3, 1, 1, '2016-08-04 08:38:49', 'asdasd'),
(13, 16, 3, 6, '2016-08-05 10:46:17', 'buy'),
(14, 2, 3, 13, '2016-08-05 13:03:35', 'Kuzya''s '),
(15, 17, 3, 5, '2016-08-05 13:05:14', 'Kuzya''s present!');

-- --------------------------------------------------------

--
-- Table structure for table `history_quality_control`
--

CREATE TABLE IF NOT EXISTS `history_quality_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `complaints_and_suggestions` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `history_quality_control`
--

INSERT INTO `history_quality_control` (`id`, `client_id`, `manager_id`, `goods_id`, `complaints_and_suggestions`, `date`) VALUES
(1, 2, 5, 2, 'Iphone is bulshit!', '2016-08-04 08:16:12'),
(2, 8, 5, 3, 'Almat is chort', '2016-08-04 09:34:05'),
(3, 4, 5, 6, 'good good good', '2016-08-05 10:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `history_tech_support`
--

CREATE TABLE IF NOT EXISTS `history_tech_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `result` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `history_tech_support`
--

INSERT INTO `history_tech_support` (`id`, `client_id`, `manager_id`, `cause`, `result`, `goods_id`, `date`) VALUES
(1, 1, 4, 's2 ', 1, 2, '2016-08-04 05:20:16'),
(2, 5, 4, 'test ', 1, 1, '2016-08-05 06:11:45'),
(3, 11, 4, 'asdasd ', 1, 6, '2016-08-05 10:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `department` int(2) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `login`, `password`, `name`, `surname`, `department`, `company_id`, `status`, `active`) VALUES
(1, 'doocky', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Dauren', 'Mukhametkarim', 2, 2, 1, 0),
(2, 'agai', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ilyas', 'Zvonkov', 1, 2, 1, 1),
(3, 'mop', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Otdel', 'Prodazh', 2, 2, 1, 1),
(4, 'mtp', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Technicheskaya', 'Podderzhka', 3, 2, 1, 1),
(5, 'mkk', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Kontrol', 'Kachestva', 4, 2, 1, 1),
(6, 'almat', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Almat', 'Ybray', 1, 2, 0, 0),
(7, 'qwerty', '7b52009b64fd0a2a49e6d8a939753077792b0554', 'Almat', 'D', 1, 3, 0, 0),
(49, 'qwerty', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Almat', 'Ybray', 3, 3, 0, 0),
(50, 'qwerty', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Almat', 'Qwerty', 2, 3, 0, 0),
(52, 'mister-yab@yandex.ru', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Mister', 'Ybray', 4, 3, 0, 0),
(56, 'misterybray', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Almat', 'GO', 4, 3, 0, 0),
(57, 'Almat', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Almat qwe', 'Ybray', 1, 2, 0, 0),
(89, 'doocky', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Doocky', 'Moockyas', 1, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `return_product`
--

CREATE TABLE IF NOT EXISTS `return_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cause` varchar(255) NOT NULL,
  `sales_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `return_product`
--

INSERT INTO `return_product` (`id`, `client_id`, `goods_id`, `date`, `cause`, `sales_id`) VALUES
(1, 3, 1, '2016-08-05 11:42:55', 'test', 2),
(2, 3, 1, '2016-08-05 12:30:17', 'test2', 2),
(3, 3, 1, '2016-08-05 13:37:04', 'qweqwqew', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
