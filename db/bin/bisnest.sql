-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 01:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_biz_canvas`
--

CREATE TABLE `bc_biz_canvas` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_biz_canvas`
--

INSERT INTO `bc_biz_canvas` (`id`, `title`, `user_id`, `created_at`) VALUES
(4, 'Business Canvas', 7, '2021-08-04 11:24:46'),
(5, 'testing', 7, '2021-08-05 01:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `bc_category`
--

CREATE TABLE `bc_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_key` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `cat_col` tinyint(2) NOT NULL DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_category`
--

INSERT INTO `bc_category` (`id`, `category_name`, `category_key`, `description`, `cat_col`) VALUES
(1, 'Key Partners', 'key-parner', NULL, 12),
(2, 'Key Activities', 'key-activity', NULL, 12),
(3, 'Value Proposition', 'val-proposition', NULL, 12),
(4, 'Customer Relationship', 'cust-relation', NULL, 12),
(5, 'Customers Segments', 'cust-segment', NULL, 12),
(6, 'Key Resources', 'key-resource', NULL, 12),
(7, 'Channels', 'channel', NULL, 12),
(8, 'Cost Structure', 'cost-structure', NULL, 12),
(9, 'Revenue Streams', 'rev-stream', NULL, 12),
(10, 'Brainstorming Space', 'brainstorm', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `bc_item`
--

CREATE TABLE `bc_item` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_item`
--

INSERT INTO `bc_item` (`id`, `biz_canvas_id`, `category_id`, `title`, `description`, `color`) VALUES
(1, 4, 1, 'sdfsdf', 'sdfsdf', 'red'),
(5, 4, 2, '', 'aaaaaaaaaaaaaa', 'green'),
(7, 4, 8, 'sdfsd', 'sdfsdf', 'yellow'),
(8, 4, 8, 'sdfsdf', 'sdfsdf', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `rfc822` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `recipient_id`, `time`, `rfc822`, `message`) VALUES
(187, 7, 9, 1630027848, 'Fri, 27 Aug 21 03:30:48 +0200', 'asdfasdf'),
(188, 9, 7, 1630028112, 'Fri, 27 Aug 21 03:35:12 +0200', 'sdfsdf'),
(189, 9, 7, 1630028144, 'Fri, 27 Aug 21 03:35:44 +0200', 'sadfasdf'),
(190, 7, 9, 1630035665, 'Fri, 27 Aug 21 05:41:05 +0200', 'sdfsdff'),
(191, 9, 7, 1630036744, 'Fri, 27 Aug 21 05:59:04 +0200', 'yoooooooooooooo'),
(192, 7, 9, 1630036758, 'Fri, 27 Aug 21 05:59:18 +0200', 'ahui'),
(193, 9, 7, 1630036781, 'Fri, 27 Aug 21 05:59:41 +0200', 'asdfasdfsafdsdf'),
(194, 7, 9, 1630036908, 'Fri, 27 Aug 21 06:01:48 +0200', 'dddddddddddddddddddddddddddddddddddd'),
(195, 7, 9, 1630036973, 'Fri, 27 Aug 21 06:02:53 +0200', 'ddd'),
(196, 7, 9, 1630037030, 'Fri, 27 Aug 21 06:03:50 +0200', 'pp');

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
(5, 7, 0, 'Fiqram Cooperation Sdn Bhd', 'No 123 Jalan Meranti Chabang Empat 16210\r\nTumpat\r\nKelantan', '0176250556', '091458852', 'fiqramcooperation@gmail.com', 'Information Technology', 'Software Development', '2021-08-18', 'KT0406247-U', 50, '612837d0e95b0.jpg', '2021-08-27 12:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `client_exper`
--

CREATE TABLE `client_exper` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `expert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_exper`
--

INSERT INTO `client_exper` (`id`, `client_id`, `expert_id`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expert_type` tinyint(2) NOT NULL,
  `profile_file` text DEFAULT NULL,
  `personal_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `user_id`, `expert_type`, `profile_file`, `personal_updated_at`) VALUES
(1, 9, 20, '61283d66d7716.jpeg', '2021-08-27 09:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1608541238),
('m130524_201442_init', 1608541245),
('m140209_132017_init', 1624370530),
('m140403_174025_create_account_table', 1624370532),
('m140504_113157_update_tables', 1624370533),
('m140504_130429_create_token_table', 1624370535),
('m140830_171933_fix_ip_field', 1624370536),
('m140830_172703_change_account_table_name', 1624370537),
('m141222_110026_update_ip_field', 1624370538),
('m141222_135246_alter_username_length', 1624370538),
('m150614_103145_update_social_account_table', 1624370539),
('m150623_212711_fix_username_notnull', 1624370539),
('m151218_234654_add_timezone_to_profile', 1624370539),
('m160929_103127_add_last_login_at_to_user_table', 1624370540),
('m190124_110200_add_verification_token_column_to_user_table', 1608541245),
('m201221_083220_why_choose', 1608541584),
('m201222_023501_who_we_are', 1608604659),
('m201222_083600_header', 1608626268);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_type` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `role`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `password_reset_token`) VALUES
(7, 'iqramrafien21@gmail.com', 'Ahmad Albab Bin Jidar', 'iqramrafien21@gmail.com', 1, '$2y$10$ROS1EaY6SHxLLJhzgQFn3Oum9zbjt/.o42fofZCW7LOyW75zbEY96', '_qKjxhFAFD_HQ4PfyY9VdqYNVRmFTN0j', 1624467684, NULL, NULL, '::1', 1624467474, 1630037260, 0, 1630396685, 10, ''),
(8, 'superadmin', 'Superadmin', '', 0, '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 10, ''),
(9, 'iqramrafien@gmail.com', 'Fakhrul Iqram', 'iqramrafien@gmail.com', 2, '$2y$10$goxdKCZQPMIZlylAv.B26O9cvfEiS57quDyo.l0upvVpQzQR97F3i', '4INfZI_L_M2RuMxQEYDbfVDKtIwDNiPe', NULL, NULL, NULL, '::1', 1624484446, 1624484446, 0, 1630026772, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `web_intro`
--

CREATE TABLE `web_intro` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_content` varchar(100) NOT NULL,
  `title_button` varchar(50) NOT NULL,
  `intro_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_intro`
--

INSERT INTO `web_intro` (`id`, `title`, `title_content`, `title_button`, `intro_content`) VALUES
(1, 'HATCHNIAGA', 'Online Incubation Platform', 'LEARN MORE', 'Hatchniaga an online incubation platform for entrepreneurs who are looking for a starting-point for their business. The entrepreneurs are able to transform indigenous ideas into a rapidly growing companies providing products and services to the market via our online incubation platform.');

-- --------------------------------------------------------

--
-- Table structure for table `web_portfolio`
--

CREATE TABLE `web_portfolio` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_portfolio`
--

INSERT INTO `web_portfolio` (`id`, `image_url`) VALUES
(1, 'Doa-Tidak-Makbul.jpg'),
(2, 'Doa-Tidak-Makbul.jpg'),
(3, 'images.png'),
(4, 'Doa-Tidak-Makbul.jpg'),
(5, 'Doa-Tidak-Makbul.jpg'),
(6, 'Doa-Tidak-Makbul.jpg'),
(7, '20-0-75.71-100'),
(8, '0-0-55.71-100'),
(9, '19.56-0-75.27-100'),
(10, '22.22-0-77.94-100'),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, '18.44-0-74.16-100'),
(16, '17.78-0-73.49-100'),
(17, '0-0-55.71-100'),
(18, '0-0-55.71-100'),
(19, '17.11-0-72.83-100'),
(20, '16.44-0-72.16-100'),
(21, '20.89-0-76.6-100'),
(22, '19.33-0-75.05-100'),
(23, '20-0-75.71-100'),
(24, '20.89-0-76.6-100'),
(25, '20.89-0-76.6-100');

-- --------------------------------------------------------

--
-- Table structure for table `web_section`
--

CREATE TABLE `web_section` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_section`
--

INSERT INTO `web_section` (`id`, `title`, `content`, `image_url`) VALUES
(1, 'Startups', 'Hatchniaga assist entrepreneurs build companies from scratch and help start-up to grow and consolidate their business.', ''),
(2, 'Investors', 'Hatchniaga connect with investment opportunities in Malaysia.', 'pic2.jpeg'),
(3, 'Ecosystem', ' Hatchniaga create an entrepreneurial ecosystem focused on growing and sustaining the business and community.', 'pic3.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `bc_biz_canvas`
--
ALTER TABLE `bc_biz_canvas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bc_category`
--
ALTER TABLE `bc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bc_item`
--
ALTER TABLE `bc_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biz_canvas_id` (`biz_canvas_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_ibfk_1` (`user_id`);

--
-- Indexes for table `client_exper`
--
ALTER TABLE `client_exper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `web_intro`
--
ALTER TABLE `web_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_portfolio`
--
ALTER TABLE `web_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_section`
--
ALTER TABLE `web_section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bc_biz_canvas`
--
ALTER TABLE `bc_biz_canvas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bc_category`
--
ALTER TABLE `bc_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bc_item`
--
ALTER TABLE `bc_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client_exper`
--
ALTER TABLE `client_exper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web_intro`
--
ALTER TABLE `web_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_portfolio`
--
ALTER TABLE `web_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `web_section`
--
ALTER TABLE `web_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bc_item`
--
ALTER TABLE `bc_item`
  ADD CONSTRAINT `bc_item_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`),
  ADD CONSTRAINT `bc_item_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `bc_category` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
