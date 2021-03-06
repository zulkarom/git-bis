-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 11:18 AM
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
-- Database: `b-hatch`
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
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bc_biz_canvas`
--

INSERT INTO `bc_biz_canvas` (`id`, `title`, `description`, `user_id`, `created_at`) VALUES
(11, 'ZAHIRAH FASHION', '', 7, '2022-06-19 11:15:16');

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
(1, 'Key Partners', 'key-parner', '<ul type=\"i\">\r\n<li>Who are your key partners?</li>\r\n<li>Who are your key suppliers?</li>\r\n<li>Which key resources are we acquiring from partners?</li>\r\n<li>Which key activities do partners perform?</li>\r\n</ul>', 12),
(2, 'Key Activities', 'key-activity', '<ul>\r\n<li>What key activities do our value propositions require?</li>\r\n<li>Our distribution channels?</li>\r\n<li>Customer relationships?</li>\r\n<li>Revenue streams?</li>\r\n</ul>', 12),
(3, 'Value Proposition', 'val-proposition', '<ul>\r\n<li>What value do we deliver to the customer?</li>\r\n<li>Which one of our customer\'s problems are we helping to solve?</li>\r\n<li>What bundles of products and services are we offering to each Customer Segment?</li>\r\n<li>Which customer needs are we satisfying?</li>\r\n</ul>', 12),
(4, 'Customer Relationship', 'cust-relation', '<ul>\r\n<li>What type of relationship does each of our Customer Segments expect us to establish and maintain with them?</li>\r\n<li>Which ones have we established?</li>\r\n<li>How are they integrated with the rest of our business model?</li>\r\n<li>How costly are they?</li>\r\n</ul>', 12),
(5, 'Customers Segments', 'cust-segment', '<ul>\r\n<li>For whom are we creating value?</li>\r\n<li>Who are our most important customers?</li>\r\n</ul>', 12),
(6, 'Key Resources', 'key-resource', '<ul>\r\n<li>What Key Resources do our Value Propositions require?</li>\r\n<li>Our Distribution Channels?</li>\r\n<li>Customer Relationships?</li>\r\n<li>Revenue Streams?</li>\r\n</ul>', 12),
(7, 'Channels', 'channel', '<ul>\r\n<li>Through which Channels do our Customer Segments want to be reached?</li>\r\n<li>How are we reaching them now?</li>\r\n<li>How are our Channels integrated?</li>\r\n<li>Which ones work best?</li>\r\n<li>Which ones are most cost-efficient?</li>\r\n<li>How are we integrating them with customer routines?</li>\r\n</ul>', 12),
(8, 'Cost Structure', 'cost-structure', '<ul>\r\n<li>What are the most important costs inherent in our business model?</li>\r\n<li>Which Key Resources are most expensive?</li>\r\n<li>Which Key Activities are most expensive?</li>\r\n</ul>', 12),
(9, 'Revenue Streams', 'rev-stream', '<ul>\r\n<li>For what value are our customers really willing to pay?</li>\r\n<li>For what do they currently pay?</li>\r\n<li>How are they currently paying?</li>\r\n<li>How would they prefer pay?</li>\r\n<li>How much does each Revenue Stream contribute to overall revenues?</li>\r\n</ul>', 12),
(10, 'Brainstorming Space', 'brainstorm', '<ul>\r\n<li>What are your temporary Brainstorming notes?</li>\r\n</ul>', 12);

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
(38, 11, 1, '', 'Providers', 'blue'),
(39, 11, 1, '', 'Holding company (Inditex)', 'green'),
(40, 11, 2, '', 'Design Manufacturing', 'yellow'),
(41, 11, 2, '', 'Retail Process (point of sale & 3rd party management)', 'red'),
(42, 11, 2, '', 'Distribution channels and logistics', 'grey'),
(43, 11, 6, '', 'Stock', 'blue'),
(44, 11, 6, '', 'Large network of stores', 'green'),
(45, 11, 6, '', 'Strong brand', 'yellow'),
(46, 11, 6, '', 'Logistics and supply chain infrastructure', 'grey'),
(47, 11, 3, '', 'Flagship store experience', 'grey'),
(48, 11, 3, '', 'Accessories', 'green'),
(49, 11, 3, '', 'Great eCommerce experience', 'blue'),
(50, 11, 3, '', 'Fashionable clothes', 'yellow'),
(51, 11, 3, '', 'Fast-fashion', 'red'),
(52, 11, 4, '', 'Salesperson at store', 'red'),
(53, 11, 4, '', 'Brand through social media', 'green'),
(54, 11, 4, '', 'Sentimental attachment to clothing/accessories', 'blue'),
(55, 11, 5, '', 'Men', 'grey'),
(56, 11, 5, '', 'Women', 'yellow'),
(57, 11, 5, '', 'Children', 'red'),
(58, 11, 7, '', 'Direct store', 'yellow'),
(59, 11, 7, '', 'Online', 'green'),
(60, 11, 7, '', 'Social media', 'grey'),
(61, 11, 8, '', 'Fixed (rent, payroll, etc.)', 'blue'),
(62, 11, 8, '', 'Variables associated with sale of goods', 'yellow'),
(63, 11, 9, '', 'Sales of clothing and accessories', 'red'),
(64, 11, 1, '', 'Fabric Dealer', 'red'),
(65, 11, 1, '', 'Tie ups with local brand', 'grey'),
(67, 11, 1, '', 'Raw material', 'yellow'),
(68, 11, 1, '', 'Contrators', 'red'),
(69, 11, 8, '', 'Manufacture cost', 'red'),
(70, 11, 8, '', 'Raw material', 'green'),
(71, 11, 8, '', 'Fabric buying cost', 'grey'),
(72, 11, 8, '', 'Bank loan & interest', 'blue'),
(73, 11, 9, '', 'Target on jeans and jersey fabric', 'blue'),
(74, 11, 9, '', 'Promoting weavers with their beautiful skill', 'green'),
(75, 11, 9, '', 'Comfortable and affordable clothes', 'grey'),
(76, 11, 5, '', 'College students', 'green'),
(77, 11, 5, '', 'Local community', 'blue'),
(78, 11, 10, '', 'Historical Record', 'blue'),
(79, 11, 10, '', 'Economical Factors', 'green'),
(80, 11, 10, '', 'Personal Apperance', 'yellow'),
(81, 11, 10, '', 'Lifestyle & Culture', 'red'),
(82, 11, 10, '', 'Trends of Fashion', 'grey'),
(83, 11, 10, '', 'Confidence & Self Image', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL,
  `rfc822` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `topic_id`, `sender_id`, `recipient_id`, `time`, `rfc822`, `message`, `is_read`, `is_deleted`) VALUES
(1, 258, 10, 7, 1655615822, 'Sun, 19 Jun 22 13:17:02 +0800', 'Hello!', 1, 0),
(2, 258, 10, 7, 1655615840, 'Sun, 19 Jun 22 13:17:20 +0800', 'Hey, I am facing problem as i can not login into application. Can you help me to reset my password?', 1, 0),
(3, 258, 10, 7, 1655615848, 'Sun, 19 Jun 22 13:17:28 +0800', '\nCan you check this urgently?', 1, 0),
(4, 258, 10, 7, 1655615860, 'Sun, 19 Jun 22 13:17:40 +0800', 'really appricate if you look this quickly?', 1, 0),
(5, 258, 7, 10, 1655615877, 'Sun, 19 Jun 22 13:17:57 +0800', 'Definately. We are happy to help you.', 1, 0),
(6, 258, 10, 7, 1655615887, 'Sun, 19 Jun 22 13:18:07 +0800', 'Thank you! Let me know when it done.', 1, 0),
(7, 258, 7, 10, 1655615913, 'Sun, 19 Jun 22 13:18:33 +0800', 'We just reset your account. Please check your email for verification.', 1, 0),
(8, 258, 7, 10, 1655615921, 'Sun, 19 Jun 22 13:18:41 +0800', 'Please confirm if your got email', 1, 0),
(9, 258, 10, 7, 1655615956, 'Sun, 19 Jun 22 13:19:16 +0800', 'Thank you for your help.', 1, 0),
(10, 258, 10, 7, 1655615976, 'Sun, 19 Jun 22 13:19:36 +0800', 'Really appreciate', 1, 0),
(11, 258, 7, 10, 1655615986, 'Sun, 19 Jun 22 13:19:46 +0800', 'You are most welcome', 1, 0),
(12, 258, 7, 10, 1655621859, 'Sun, 19 Jun 22 14:57:39 +0800', 'test 123', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat_topic`
--

CREATE TABLE `chat_topic` (
  `id` int(11) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `client_expert_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `expert_id` int(11) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `last_message_send` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_topic`
--

INSERT INTO `chat_topic` (`id`, `topic`, `client_expert_id`, `client_id`, `expert_id`, `is_default`, `last_message_send`) VALUES
(256, 'Default', 5, 5, 1, 1, '2022-06-05 12:00:48'),
(258, 'Default', 6, 5, 2, 1, '2022-06-19 14:57:38'),
(465, '01258', 5, 5, 1, 0, '2022-06-19 08:50:44'),
(473, 'gvgv', 6, 5, 2, 0, '2022-06-19 08:51:04'),
(474, 'ddfgdf', 6, 5, 2, 0, '2022-06-19 08:51:16');

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
(5, 7, 0, 'Fiqram Cooperation Sdn Bhd', 'No 123 Jalan Meranti Chabang Empat 16210\r\nTumpat\r\nKelantan', '0176250556', '0914588520', 'fiqramcooperation@gmail.com', 'Information Technology', 'Software Development', '2021-08-03', 'KT0406247-U', 50, '619da6fa54e7e.jpg', '2022-04-28 17:01:31'),
(7, 14, 0, '', '', '', '', '', '', '', '0000-00-00', '', 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_exper`
--

CREATE TABLE `client_exper` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `expert_id` int(11) NOT NULL,
  `last_message` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_exper`
--

INSERT INTO `client_exper` (`id`, `client_id`, `expert_id`, `last_message`) VALUES
(5, 5, 1, '2022-05-11 14:12:13'),
(6, 5, 2, '2022-06-19 13:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expert_type` tinyint(2) NOT NULL,
  `biz_name` varchar(225) NOT NULL,
  `biz_phone` varchar(50) NOT NULL,
  `biz_description` text NOT NULL,
  `profile_file` text DEFAULT NULL,
  `personal_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`id`, `user_id`, `expert_type`, `biz_name`, `biz_phone`, `biz_description`, `profile_file`, `personal_updated_at`) VALUES
(1, 9, 20, '', '', '', '6189f221d7438.png', '2021-11-09 11:59:29'),
(2, 10, 20, 'Edusage Network', '0176850558', 'Event, Conference & Scholar\'s Services', '615bbd2d83f64.jpg', '2022-06-19 14:18:24');

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
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(10, '3wVxbgMMUKhdBet-k-tbjiWNXCtigZO1', 1633402074, 0),
(12, '5WRVB4LL0GaxBiI_AsAWOg0HeHg2iDE5', 1652249208, 0);

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
(7, 'iqramrafien21@gmail.com', 'Ahmad Albab Bin Jidark', 'iqramrafien21@gmail.com', 1, '$2y$13$5jwVMf2PeCPvVfS3tTRFq.XVCcA9sVyVdX/zr4SqjQSk.OQAedSfq', '_qKjxhFAFD_HQ4PfyY9VdqYNVRmFTN0j', 1624467684, NULL, NULL, '::1', 1624467474, 1630987255, 0, 1655619746, 10, ''),
(8, 'superadmin', 'Superadmin', '', 0, '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 10, ''),
(9, 'iqramrafien@gmail.com', 'Fakhrul Iqram', 'iqramrafien@gmail.com', 2, '$2y$13$lh6AznZexBZVMp9YfH3Eu.aReWILMfAQKzKjfDgooyeitXFRAdFbm', '4INfZI_L_M2RuMxQEYDbfVDKtIwDNiPe', NULL, NULL, NULL, '::1', 1624484446, 1631030643, 0, 1652249401, 10, ''),
(10, 'haikal@gmail.com', 'Ahmad Khusyairi', 'haikal@gmail.com', 2, '$2y$10$E4zM.GJUgKZFjMn7h2Id9uukq7QX8c20m84WzxhIo5NEmBI9jPUAK', '5VEOQvyjcxb6RKXvYQJmWSfR-yIcpIlJ', NULL, NULL, NULL, '::1', 1633402074, 1633402074, 0, 1655615798, 10, ''),
(11, 'mohdali@gmail.com', 'Mohd Ali Bin Abu', 'mohdali@gmail.com', 2, '$2y$10$CQsQ7C8o233xWqpSciUCref3OTxhU4kKJ6EWsTIiKCzdpjW2fg.3q', 'DO4IhG6vE4WXGcVXyQQ4Zx827WBgIX0t', 1635734141, NULL, NULL, '::1', 1635734098, 1635734098, 0, 1635734190, 10, ''),
(12, 'iqramrafien08@gmail.com', 'Iqram Haikal', 'iqramrafien08@gmail.com', 1, '$2y$10$OFszL5JTXM1WeGzl3uPcwOhAIDcTQx9ZISDqjk8obF5gkqRAMvWiO', 'aBFtmVrnuv5vZsfWcHYG_mkCJ7DRCP_b', NULL, NULL, NULL, '::1', 1652249208, 1652249208, 0, NULL, 10, ''),
(14, 'sitiasmida_999@yahoo.com', 'Asmida', 'sitiasmida_999@yahoo.com', 1, '$2y$10$G9whOtKpo3oMtBpdssLVAOE7csBOjY.ORrKfMteqTtyF0DWkzr97S', 'aUnMYAesnAEy-pFQkbI97j7dQ0UOoG5R', 1654391379, NULL, NULL, '::1', 1654391329, 1654391329, 0, NULL, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `web_intro`
--

CREATE TABLE `web_intro` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_content` varchar(100) NOT NULL,
  `title_button` varchar(50) NOT NULL,
  `intro_content` text NOT NULL,
  `logo_header_url` text NOT NULL,
  `logo_intro_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_intro`
--

INSERT INTO `web_intro` (`id`, `title`, `title_content`, `title_button`, `intro_content`, `logo_header_url`, `logo_intro_url`) VALUES
(1, 'HATCHNIAGA', 'Online Incubation Platform', 'LEARN MORE', 'Hatchniaga an online incubation platform for entrepreneurs who are looking for a starting-point for their business. The entrepreneurs are able to transform indigenous ideas into a rapidly growing companies providing products and services to the market via our online incubation platform.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_portfolio`
--

CREATE TABLE `web_portfolio` (
  `id` int(11) NOT NULL,
  `image_file` varchar(225) NOT NULL,
  `image_file_hover` varchar(225) NOT NULL,
  `image_url` text CHARACTER SET utf8 NOT NULL,
  `is_show` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_portfolio`
--

INSERT INTO `web_portfolio` (`id`, `image_file`, `image_file_hover`, `image_url`, `is_show`) VALUES
(45, '619df83ae9b87.png', '619df8b41f84d.png', 'https://www.facebook.com/bisnestofficial', 1),
(47, '619eff1771841.png', '619eff1781f49.png', 'Not Set', 1),
(48, '619dfe502294e.png', '619dfe5a98321.png', 'https://confvalley.com/', 1),
(49, '619f000a9477a.png', '619f000aa37a8.png', 'http://www.edusagenet.com/', 1),
(50, '619f16b18be12.png', '619f16b19c112.png', 'https://www.facebook.com/IBN-Agro-Farm-110867724169562', 1),
(51, '619f16f659db6.png', '619f16f66de29.png', 'https://instagram.com/projekmakanmayu?igshid=1i1kdi4hglcuv', 1),
(52, '619f178d4161f.png', '619f178d4da0b.png', 'https://ijeob.com/', 1),
(53, '619f17b5137c5.jpg', '619f17b527375.jpg', 'Not Set', 1),
(54, '619f199479f3c.jpg', '619f199484ea0.jpg', 'Not Set', 1);

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
(1, 'Startup', 'Hatchniaga assist entrepreneurs build companies from scratch and help start-up to grow and consolidate their business.', ''),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_ibfk_1` (`topic_id`);

--
-- Indexes for table `chat_topic`
--
ALTER TABLE `chat_topic`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bc_category`
--
ALTER TABLE `bc_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bc_item`
--
ALTER TABLE `bc_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chat_topic`
--
ALTER TABLE `chat_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_exper`
--
ALTER TABLE `client_exper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `web_intro`
--
ALTER TABLE `web_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_portfolio`
--
ALTER TABLE `web_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `chat_topic` (`id`);

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
