-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 02:44 AM
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
(4, 'Business Canvas', 7, '2021-08-04 11:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `bc_brainstorm`
--

CREATE TABLE `bc_brainstorm` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_brainstorm`
--

INSERT INTO `bc_brainstorm` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(2, 4, 'brainstorming space title ', 'brainstorming description', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `bc_channel`
--

CREATE TABLE `bc_channel` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_channel`
--

INSERT INTO `bc_channel` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'Add Channels', 'Add Channels\r\n', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `bc_cost_structure`
--

CREATE TABLE `bc_cost_structure` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_cost_structure`
--

INSERT INTO `bc_cost_structure` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'brainstorming title', 'brainstorming details', 'red'),
(2, 4, 'Cost Structure', 'Cost Structure', 'green'),
(3, 4, 'brainstorming title', 'sdsds', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `bc_cust_relation`
--

CREATE TABLE `bc_cust_relation` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_cust_relation`
--

INSERT INTO `bc_cust_relation` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'Add Customer Relationship', 'Add Customer Relationship', 'green');

-- --------------------------------------------------------

--
-- Table structure for table `bc_cust_segment`
--

CREATE TABLE `bc_cust_segment` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_cust_segment`
--

INSERT INTO `bc_cust_segment` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'Add Customer Segments', 'Add Customer Segments', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `bc_key_activity`
--

CREATE TABLE `bc_key_activity` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_key_activity`
--

INSERT INTO `bc_key_activity` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'activity title', 'activity description', 'green'),
(2, 4, 'activity title 2', 'activity description 2', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `bc_key_parner`
--

CREATE TABLE `bc_key_parner` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_key_parner`
--

INSERT INTO `bc_key_parner` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(6, 4, 'test', 'test ', 'blue'),
(7, 4, 'test 2', 'test 2', 'red'),
(8, 4, 'test 3', 'test 3', 'green');

-- --------------------------------------------------------

--
-- Table structure for table `bc_key_resource`
--

CREATE TABLE `bc_key_resource` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_key_resource`
--

INSERT INTO `bc_key_resource` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'Key Resources Title', 'Key Resources Description', 'grey');

-- --------------------------------------------------------

--
-- Table structure for table `bc_rev_stream`
--

CREATE TABLE `bc_rev_stream` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_rev_stream`
--

INSERT INTO `bc_rev_stream` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'Add Revenue Streams', 'Add Revenue Streams', 'grey');

-- --------------------------------------------------------

--
-- Table structure for table `bc_val_proposition`
--

CREATE TABLE `bc_val_proposition` (
  `id` int(11) NOT NULL,
  `biz_canvas_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_val_proposition`
--

INSERT INTO `bc_val_proposition` (`id`, `biz_canvas_id`, `title`, `description`, `color`) VALUES
(1, 4, 'test 1', 'test 1', 'yellow'),
(2, 4, 'test 1', 'test 2', 'yellow'),
(3, 4, 'test 1  test 1 test 1 test 1 test 1 test 1 test 1 test 1 ', 'test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 ', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `rfc822` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `recipient_id`, `user_id`, `time`, `rfc822`, `name`, `icon`, `message`) VALUES
(168, 7, 9, NULL, 1624755870, 'Sun, 27 Jun 21 03:04:30 +0200', 'IQRAM RAFIEN', 'iqramrafien21@gmail.com', 'sfsdfsdfsdf'),
(169, 7, 9, NULL, 1624755903, 'Sun, 27 Jun 21 03:05:03 +0200', 'IQRAM RAFIEN', 'iqramrafien21@gmail.com', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_type` tinyint(2) NOT NULL,
  `profile_file` varchar(225) NOT NULL,
  `personal_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `client_type`, `profile_file`, `personal_updated_at`) VALUES
(5, 7, 0, '610c772edccfe.jpg', '2021-08-06 08:26:52');

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
  `profile_file` varchar(225) NOT NULL,
  `personal_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `user_id`, `expert_type`, `profile_file`, `personal_updated_at`) VALUES
(1, 9, 20, '610c842fdbabb.png', '2021-08-06 08:37:03');

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
(7, 'iqramrafien21@gmail.com', 'IQRAM RAFIEN', 'iqramrafien21@gmail.com', 1, '$2y$10$ROS1EaY6SHxLLJhzgQFn3Oum9zbjt/.o42fofZCW7LOyW75zbEY96', '_qKjxhFAFD_HQ4PfyY9VdqYNVRmFTN0j', 1624467684, NULL, NULL, '::1', 1624467474, 1628209404, 0, 1628209396, 10, ''),
(8, 'superadmin', 'Superadmin', '', 0, '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 10, ''),
(9, 'iqramrafien29@gmail.com', 'Fakhrul Iqram Bin Rafien', 'iqramrafien29@gmail.com', 2, '$2y$10$goxdKCZQPMIZlylAv.B26O9cvfEiS57quDyo.l0upvVpQzQR97F3i', '4INfZI_L_M2RuMxQEYDbfVDKtIwDNiPe', NULL, NULL, NULL, '::1', 1624484446, 1628210214, 0, 1628210234, 10, '');

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
-- Indexes for table `bc_biz_canvas`
--
ALTER TABLE `bc_biz_canvas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bc_brainstorm`
--
ALTER TABLE `bc_brainstorm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biz_canvas_id` (`biz_canvas_id`);

--
-- Indexes for table `bc_channel`
--
ALTER TABLE `bc_channel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_channel_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_cost_structure`
--
ALTER TABLE `bc_cost_structure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_cost_structure_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_cust_relation`
--
ALTER TABLE `bc_cust_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_cust_relation_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_cust_segment`
--
ALTER TABLE `bc_cust_segment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_cust_segment_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_key_activity`
--
ALTER TABLE `bc_key_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_key_activity_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_key_parner`
--
ALTER TABLE `bc_key_parner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_key_parner_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_key_resource`
--
ALTER TABLE `bc_key_resource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_key_resource_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_rev_stream`
--
ALTER TABLE `bc_rev_stream`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_rev_stream_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `bc_val_proposition`
--
ALTER TABLE `bc_val_proposition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bc_val_proposition_ibfk_1` (`biz_canvas_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_exper`
--
ALTER TABLE `client_exper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_exper_ibfk_1` (`client_id`),
  ADD KEY `client_exper_ibfk_2` (`expert_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bc_brainstorm`
--
ALTER TABLE `bc_brainstorm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bc_channel`
--
ALTER TABLE `bc_channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bc_cost_structure`
--
ALTER TABLE `bc_cost_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bc_cust_relation`
--
ALTER TABLE `bc_cust_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bc_cust_segment`
--
ALTER TABLE `bc_cust_segment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bc_key_activity`
--
ALTER TABLE `bc_key_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bc_key_parner`
--
ALTER TABLE `bc_key_parner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bc_key_resource`
--
ALTER TABLE `bc_key_resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bc_rev_stream`
--
ALTER TABLE `bc_rev_stream`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bc_val_proposition`
--
ALTER TABLE `bc_val_proposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `bc_brainstorm`
--
ALTER TABLE `bc_brainstorm`
  ADD CONSTRAINT `bc_brainstorm_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_channel`
--
ALTER TABLE `bc_channel`
  ADD CONSTRAINT `bc_channel_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_cost_structure`
--
ALTER TABLE `bc_cost_structure`
  ADD CONSTRAINT `bc_cost_structure_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_cust_relation`
--
ALTER TABLE `bc_cust_relation`
  ADD CONSTRAINT `bc_cust_relation_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_cust_segment`
--
ALTER TABLE `bc_cust_segment`
  ADD CONSTRAINT `bc_cust_segment_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_key_activity`
--
ALTER TABLE `bc_key_activity`
  ADD CONSTRAINT `bc_key_activity_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_key_parner`
--
ALTER TABLE `bc_key_parner`
  ADD CONSTRAINT `bc_key_parner_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_key_resource`
--
ALTER TABLE `bc_key_resource`
  ADD CONSTRAINT `bc_key_resource_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_rev_stream`
--
ALTER TABLE `bc_rev_stream`
  ADD CONSTRAINT `bc_rev_stream_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `bc_val_proposition`
--
ALTER TABLE `bc_val_proposition`
  ADD CONSTRAINT `bc_val_proposition_ibfk_1` FOREIGN KEY (`biz_canvas_id`) REFERENCES `bc_biz_canvas` (`id`);

--
-- Constraints for table `client_exper`
--
ALTER TABLE `client_exper`
  ADD CONSTRAINT `client_exper_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `client_exper_ibfk_2` FOREIGN KEY (`expert_id`) REFERENCES `expert` (`id`);

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
