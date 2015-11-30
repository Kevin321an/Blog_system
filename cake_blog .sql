-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 04:27 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'The title', 'This is the article body.', '2015-10-29 13:39:51', NULL, NULL),
(2, 'A title once again', 'And the article body follows.', '2015-10-29 13:39:51', NULL, NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2015-10-29 13:39:51', NULL, NULL),
(6, 'asdf', 'asdfasd', '2015-10-29 18:25:45', '2015-10-29 18:25:45', NULL),
(7, 'test1', 'test1', '2015-11-03 01:27:12', '2015-11-03 01:27:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Address` text COLLATE latin1_general_ci,
  `Telephone` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Size` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `CrusType` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Toping` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `City` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `province` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Postal` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Total` int(10) NOT NULL,
  `Complete` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Name`, `Address`, `Telephone`, `Email`, `Size`, `CrusType`, `Toping`, `created`, `modified`, `user_id`, `City`, `province`, `Postal`, `Total`, `Complete`) VALUES
(1, 'kevin', 'lakjksl.s\r\n\r\nsdfone..\r\nsdf\r\n', '65464564', 'd54f@kdjf.com', '45', '12', '321', '2015-11-11 00:00:00', '2015-11-18 00:00:00', NULL, '', '', '', 0, '1'),
(2, 'kevin', 'lakjksl.s\r\n\r\nsdfone..\r\nsdf\r\n', '65464564123123', 'd54f@kdjf.com', '', '', '', '2015-11-11 00:00:00', '2015-11-18 00:00:00', NULL, '', '312312', '123121', 0, '1'),
(3, '567', '567', '345123123123123', '345@ERTERT', 'Small', '', '', NULL, NULL, NULL, '34', '345', '345', 0, '1'),
(5, 'Kevin Zhang', '', '6477025722', 'zmk161@gmail.com', '3', NULL, NULL, NULL, NULL, NULL, '', '', '', 0, '1'),
(6, 'Kevin Zhang', '', '6477025722', 'zmk161@gmail.com', 'MEDIUM', NULL, NULL, NULL, NULL, NULL, '', '', '', 0, '1'),
(7, 'Kevin Zhang', '', '6477025722', 'zmk161@gmail.com', 'EXTRA LARGE', NULL, NULL, NULL, NULL, NULL, '', '', '', 0, '1'),
(8, 'Kevin Zhang', '', '6477025722', 'kevin321@gmail.com', 'MEDIUM', NULL, NULL, NULL, NULL, NULL, '', '', '', 0, '1'),
(9, 'Kevin Zhang', '78 Amherst Dr.', '6477025722', 'zmk161@gmail.com', 'Small', 'HAND TOSSED', '555', NULL, NULL, NULL, '', '', '', 0, '1'),
(10, 'Kevin Zhang', '78 Amherst Dr.', '6477025722', 'zmk161@gmail.com', 'Small', 'HAND TOSSED', '', NULL, NULL, NULL, '', '', '', 0, '1'),
(15, '123', '123', '123123123123123123', '123123@2', '', 'STUFFED', '', NULL, NULL, NULL, '', '', '', 0, '1'),
(17, '123', '17065 Green Drive, M7XA', '62672112323', 'zmk161@gmail.com', '', '', '', NULL, NULL, NULL, '', '', '', 0, '0'),
(18, 'Kevin Zhang', '209-425 Wilson Avenue', '6477025722', 'kevin321@gmail.com', 'LARGE', 'STUFFED', '', NULL, NULL, 2, '', '', '', 0, '1'),
(19, '123', '123', '2312312123123123123', '123123@231', 'Small', 'THIN', '', NULL, NULL, 2, '123123123', '123123', '123123', 0, '0'),
(0, 'fanfan', 'wilson', '6477025722', 'zmk161@gmail.com', 'MEDIUM', 'HAND TOSSED', '', NULL, NULL, 2, 'Kitchener', 'Ontario', 'N2P 1C9', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'test123', '$2y$10$yn0.MccO2a9mupA3hOgbAOvBGNPaM.Qlk.Ouk4WyjW32Bfg547hPW', 'admin', NULL, NULL),
(2, '123', '$2y$10$2O/i77sfRJl17MYGrjEPt.ytSC380BwO4iqRthZOglwJBQVa8nJJO', 'admin', NULL, NULL),
(3, 'test', '$2y$10$ct/dGt9wPxEPkRARqCjIm.DZaaOgw.6rpG47oGF8gwaN8fNCMt6pa', 'admin', NULL, NULL),
(4, 'kevin', '$2y$10$VfuHYvZ3QZkWgCbffmfcFue5LuXNEzVX9GnNxyROM7av6jRfr6xyu', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
