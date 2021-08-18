-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 05:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_type` tinyint(2) NOT NULL,
  `biz_name` varchar(225) NOT NULL,
  `biz_address` varchar(225) NOT NULL,
  `biz_phone` varchar(50) NOT NULL,
  `biz_fax` varchar(50) NOT NULL,
  `biz_email` varchar(225) NOT NULL,
  `biz_type` varchar(225) NOT NULL,
  `biz_main_activity` varchar(225) NOT NULL,
  `biz_date_execution` date NOT NULL,
  `biz_reg_no` varchar(225) NOT NULL,
  `biz_capital` int(11) NOT NULL,
  `profile_file` varchar(225) NOT NULL,
  `personal_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `client_type`, `biz_name`, `biz_address`, `biz_phone`, `biz_fax`, `biz_email`, `biz_type`, `biz_main_activity`, `biz_date_execution`, `biz_reg_no`, `biz_capital`, `profile_file`, `personal_updated_at`) VALUES
(5, 7, 0, 'Fiqram Cooperation Sdn Bhd', 'No 123 Jalan Meranti Chabang Empat 16210\r\nTumpat\r\nKelantan', '0176250556', '091458852', 'fiqramcooperation@gmail.com', 'Information Technology', 'Software Development', '2021-08-18', 'KT0406247-U', 50, '611d26c313b7d.png', '2021-08-18 23:26:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
