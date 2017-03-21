-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 06:38 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malgadi.co.in`
--

-- --------------------------------------------------------

--
-- Table structure for table `click_to_notify`
--

CREATE TABLE IF NOT EXISTS `click_to_notify` (
`index` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `item` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `earn_money`
--

CREATE TABLE IF NOT EXISTS `earn_money` (
`index` int(11) NOT NULL,
  `refer_code` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`index` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `item_avil` int(11) NOT NULL,
  `out_of_stock` tinyint(1) NOT NULL DEFAULT '0',
  `tags` text NOT NULL,
  `description` longtext NOT NULL,
  `department` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `avg_star` float NOT NULL DEFAULT '4',
  `total_people` int(11) NOT NULL DEFAULT '1',
  `purchasing_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newitemslist`
--

CREATE TABLE IF NOT EXISTS `newitemslist` (
  `index` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `item_avil` int(11) NOT NULL,
  `out_of_stock` tinyint(1) NOT NULL DEFAULT '0',
  `tags` text NOT NULL,
  `description` longtext NOT NULL,
  `department` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `purchasing_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`od_index` int(11) NOT NULL,
  `odid` char(21) NOT NULL,
  `items` text NOT NULL,
  `fname` text NOT NULL,
  `branch` text NOT NULL,
  `sem` int(11) NOT NULL,
  `address` text NOT NULL,
  `ccity` text NOT NULL,
  `mnumber` text NOT NULL,
  `email` text NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  `refer_code` text NOT NULL,
  `prices` text NOT NULL,
  `qtys` text NOT NULL,
  `payment` varchar(12) NOT NULL DEFAULT 'cod',
  `delivery_charges` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`index` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile_no` text NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `enable` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5267 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`index` int(11) NOT NULL,
  `tag` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `click_to_notify`
--
ALTER TABLE `click_to_notify`
 ADD PRIMARY KEY (`index`);

--
-- Indexes for table `earn_money`
--
ALTER TABLE `earn_money`
 ADD PRIMARY KEY (`index`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`index`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`od_index`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`index`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`index`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `click_to_notify`
--
ALTER TABLE `click_to_notify`
MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `earn_money`
--
ALTER TABLE `earn_money`
MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `od_index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5267;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `index` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
