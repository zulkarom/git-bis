-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 08:58 AM
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
(17, 5, 1, 'testing 123', 'sdfsdfsdfsd', 'yellow');

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
(1345, 256, 7, 9, 1637122839, 'Wed, 17 Nov 21 05:20:39 +0100', NULL, 1, 1343),
(1346, 256, 7, 9, 1637122841, 'Wed, 17 Nov 21 05:20:41 +0100', NULL, 1, 1338),
(1347, 256, 7, 9, 1637122843, 'Wed, 17 Nov 21 05:20:43 +0100', NULL, 1, 1339),
(1348, 256, 7, 9, 1637122845, 'Wed, 17 Nov 21 05:20:45 +0100', NULL, 1, 1341),
(1349, 256, 7, 9, 1637122846, 'Wed, 17 Nov 21 05:20:46 +0100', NULL, 1, 1342),
(1350, 256, 9, 7, 1637122848, 'Wed, 17 Nov 21 05:20:48 +0100', NULL, 1, 1336),
(1351, 256, 9, 7, 1637122849, 'Wed, 17 Nov 21 05:20:49 +0100', NULL, 1, 1337),
(1353, 256, 7, 9, 1637122936, 'Wed, 17 Nov 21 05:22:16 +0100', NULL, 1, 1352),
(1357, 256, 7, 9, 1637124617, 'Wed, 17 Nov 21 05:50:17 +0100', NULL, 1, 1354),
(1361, 256, 7, 9, 1637135866, 'Wed, 17 Nov 21 08:57:46 +0100', NULL, 1, 1358),
(1362, 256, 7, 9, 1637135868, 'Wed, 17 Nov 21 08:57:48 +0100', NULL, 1, 1360),
(1381, 256, 9, 7, 1637198954, 'Thu, 18 Nov 21 02:29:14 +0100', 'dfdsf', 1, 0),
(1382, 256, 9, 7, 1637198957, 'Thu, 18 Nov 21 02:29:17 +0100', 'dfgdfg', 1, 0),
(1383, 256, 9, 7, 1637198994, 'Thu, 18 Nov 21 02:29:54 +0100', 'bdfgdfgd', 1, 0),
(1385, 256, 9, 7, 1637199935, 'Thu, 18 Nov 21 02:45:35 +0100', 'fhfgh', 1, 0),
(1387, 256, 7, 9, 1637199943, 'Thu, 18 Nov 21 02:45:43 +0100', 'fghgfh', 1, 0),
(1388, 256, 9, 7, 1637199946, 'Thu, 18 Nov 21 02:45:46 +0100', 'fghfg', 1, 0),
(1389, 284, 9, 7, 1637202101, 'Thu, 18 Nov 21 03:21:41 +0100', 'asdasdasd', 1, 0),
(1390, 284, 9, 7, 1637202115, 'Thu, 18 Nov 21 03:21:55 +0100', 'asdasdas', 1, 0),
(1391, 284, 9, 7, 1637202121, 'Thu, 18 Nov 21 03:22:01 +0100', 'adasdas', 1, 0),
(1392, 284, 9, 7, 1637202128, 'Thu, 18 Nov 21 03:22:08 +0100', '123123123', 1, 0),
(1393, 284, 7, 9, 1637202133, 'Thu, 18 Nov 21 03:22:13 +0100', '12123123120', 1, 0),
(1394, 284, 7, 9, 1637202141, 'Thu, 18 Nov 21 03:22:21 +0100', '12123104121231', 1, 0),
(1395, 284, 7, 9, 1637202144, 'Thu, 18 Nov 21 03:22:24 +0100', '1212123', 1, 0),
(1396, 284, 9, 7, 1637202148, 'Thu, 18 Nov 21 03:22:28 +0100', '12321', 1, 0),
(1397, 284, 7, 9, 1637202149, 'Thu, 18 Nov 21 03:22:29 +0100', '123213', 1, 0),
(1398, 256, 7, 9, 1637203496, 'Thu, 18 Nov 21 03:44:56 +0100', 'asdfsfsd', 1, 0),
(1399, 284, 9, 7, 1637203502, 'Thu, 18 Nov 21 03:45:02 +0100', 'fgdgdgfdg', 1, 0),
(1401, 284, 9, 7, 1637203513, 'Thu, 18 Nov 21 03:45:13 +0100', 'dfgdfgdf', 1, 0),
(1402, 284, 7, 9, 1637203521, 'Thu, 18 Nov 21 03:45:21 +0100', 'dfgdfg', 1, 0),
(1404, 256, 9, 7, 1637203677, 'Thu, 18 Nov 21 03:47:57 +0100', 'fsdfds', 1, 0),
(1405, 256, 7, 9, 1637203684, 'Thu, 18 Nov 21 03:48:04 +0100', 'dsfsdfsd', 1, 0),
(1406, 256, 9, 7, 1637203789, 'Thu, 18 Nov 21 03:49:49 +0100', '1', 1, 0),
(1407, 256, 7, 9, 1637203793, 'Thu, 18 Nov 21 03:49:53 +0100', '2', 1, 0),
(1408, 256, 9, 7, 1637203796, 'Thu, 18 Nov 21 03:49:56 +0100', '3', 1, 0),
(1409, 256, 7, 9, 1637203800, 'Thu, 18 Nov 21 03:50:00 +0100', '5', 1, 0),
(1410, 256, 9, 7, 1637203801, 'Thu, 18 Nov 21 03:50:01 +0100', '4', 1, 0),
(1411, 256, 7, 9, 1637203806, 'Thu, 18 Nov 21 03:50:06 +0100', '7', 1, 0),
(1412, 256, 9, 7, 1637203807, 'Thu, 18 Nov 21 03:50:07 +0100', '6', 1, 0),
(1413, 256, 9, 7, 1637203812, 'Thu, 18 Nov 21 03:50:12 +0100', '9', 1, 0),
(1414, 256, 9, 7, 1637203822, 'Thu, 18 Nov 21 03:50:22 +0100', '10', 1, 0),
(1415, 256, 7, 9, 1637203825, 'Thu, 18 Nov 21 03:50:25 +0100', '12', 1, 0),
(1416, 256, 7, 9, 1637203830, 'Thu, 18 Nov 21 03:50:30 +0100', '13', 1, 0),
(1417, 256, 9, 7, 1637203834, 'Thu, 18 Nov 21 03:50:34 +0100', '14', 1, 0),
(1418, 256, 9, 7, 1637203836, 'Thu, 18 Nov 21 03:50:36 +0100', '15', 1, 0),
(1419, 256, 7, 9, 1637203841, 'Thu, 18 Nov 21 03:50:41 +0100', '16', 1, 0),
(1420, 256, 7, 9, 1637203847, 'Thu, 18 Nov 21 03:50:47 +0100', '17', 1, 0),
(1421, 256, 7, 9, 1637203875, 'Thu, 18 Nov 21 03:51:15 +0100', '18', 1, 0),
(1422, 256, 9, 7, 1637203878, 'Thu, 18 Nov 21 03:51:18 +0100', '19', 1, 0),
(1423, 256, 9, 7, 1637203879, 'Thu, 18 Nov 21 03:51:19 +0100', '31', 1, 0),
(1424, 256, 9, 7, 1637203881, 'Thu, 18 Nov 21 03:51:21 +0100', '47', 1, 0),
(1425, 256, 7, 9, 1637203885, 'Thu, 18 Nov 21 03:51:25 +0100', '23', 1, 0),
(1426, 256, 7, 9, 1637203887, 'Thu, 18 Nov 21 03:51:27 +0100', '4', 1, 0),
(1427, 256, 9, 7, 1637203889, 'Thu, 18 Nov 21 03:51:29 +0100', '4112', 1, 0),
(1428, 256, 7, 9, 1637203903, 'Thu, 18 Nov 21 03:51:43 +0100', 'hjg', 1, 0),
(1429, 256, 7, 9, 1637203927, 'Thu, 18 Nov 21 03:52:07 +0100', '1', 1, 0),
(1430, 256, 7, 9, 1637203928, 'Thu, 18 Nov 21 03:52:08 +0100', '2', 1, 0),
(1431, 256, 7, 9, 1637203931, 'Thu, 18 Nov 21 03:52:11 +0100', '3', 1, 0),
(1432, 256, 7, 9, 1637203932, 'Thu, 18 Nov 21 03:52:12 +0100', '4', 1, 0),
(1433, 256, 7, 9, 1637203934, 'Thu, 18 Nov 21 03:52:14 +0100', '5', 1, 0),
(1434, 256, 7, 9, 1637203935, 'Thu, 18 Nov 21 03:52:15 +0100', '6', 1, 0),
(1435, 256, 7, 9, 1637203937, 'Thu, 18 Nov 21 03:52:17 +0100', '7', 1, 0),
(1436, 256, 7, 9, 1637203939, 'Thu, 18 Nov 21 03:52:19 +0100', '8', 1, 0),
(1437, 256, 7, 9, 1637203940, 'Thu, 18 Nov 21 03:52:20 +0100', '9', 1, 0),
(1438, 256, 7, 9, 1637203943, 'Thu, 18 Nov 21 03:52:23 +0100', '10', 1, 0),
(1439, 256, 7, 9, 1637203944, 'Thu, 18 Nov 21 03:52:24 +0100', '11', 1, 0),
(1440, 256, 7, 9, 1637203946, 'Thu, 18 Nov 21 03:52:26 +0100', '12', 1, 0),
(1441, 256, 7, 9, 1637203948, 'Thu, 18 Nov 21 03:52:28 +0100', '13', 1, 0),
(1442, 256, 7, 9, 1637203949, 'Thu, 18 Nov 21 03:52:29 +0100', '14', 1, 0),
(1443, 256, 7, 9, 1637203952, 'Thu, 18 Nov 21 03:52:32 +0100', '15', 1, 0),
(1444, 256, 7, 9, 1637203953, 'Thu, 18 Nov 21 03:52:33 +0100', '16', 1, 0),
(1445, 256, 7, 9, 1637203955, 'Thu, 18 Nov 21 03:52:35 +0100', '17', 1, 0),
(1446, 256, 7, 9, 1637203957, 'Thu, 18 Nov 21 03:52:37 +0100', '18', 1, 0),
(1447, 256, 7, 9, 1637203958, 'Thu, 18 Nov 21 03:52:38 +0100', '19', 1, 0),
(1448, 256, 7, 9, 1637203961, 'Thu, 18 Nov 21 03:52:41 +0100', '20', 1, 0),
(1449, 256, 7, 9, 1637206392, 'Thu, 18 Nov 21 04:33:12 +0100', NULL, 1, 1368),
(1450, 256, 7, 9, 1637206399, 'Thu, 18 Nov 21 04:33:19 +0100', NULL, 1, 1369),
(1451, 256, 9, 7, 1637206405, 'Thu, 18 Nov 21 04:33:25 +0100', NULL, 1, 1380),
(1452, 256, 9, 7, 1637206412, 'Thu, 18 Nov 21 04:33:32 +0100', NULL, 1, 1384),
(1453, 256, 7, 9, 1637206420, 'Thu, 18 Nov 21 04:33:40 +0100', NULL, 1, 1400),
(1454, 256, 9, 7, 1637206427, 'Thu, 18 Nov 21 04:33:47 +0100', NULL, 1, 1403),
(1455, 256, 9, 7, 1637206589, 'Thu, 18 Nov 21 04:36:29 +0100', NULL, 1, 1386),
(1457, 256, 9, 7, 1637209538, 'Thu, 18 Nov 21 05:25:38 +0100', 'sdfsfsd', 1, 0),
(1458, 256, 9, 7, 1637209558, 'Thu, 18 Nov 21 05:25:58 +0100', 'xvxcvxc', 1, 0),
(1459, 256, 9, 7, 1637209618, 'Thu, 18 Nov 21 05:26:58 +0100', 'sdfsdfds', 1, 0),
(1460, 256, 9, 7, 1637209744, 'Thu, 18 Nov 21 05:29:04 +0100', 'dfgdg', 1, 0),
(1461, 256, 9, 7, 1637209749, 'Thu, 18 Nov 21 05:29:09 +0100', 'dfgdf', 1, 0),
(1462, 284, 9, 7, 1637209762, 'Thu, 18 Nov 21 05:29:22 +0100', 'dfgdfg', 1, 0),
(1463, 256, 9, 7, 1637209767, 'Thu, 18 Nov 21 05:29:27 +0100', 'dfgdfg', 1, 0),
(1467, 284, 9, 7, 1637222920, 'Thu, 18 Nov 21 09:08:40 +0100', 'cvbcb', 1, 0),
(1470, 256, 7, 9, 1637544161, 'Mon, 22 Nov 21 02:22:41 +0100', 'ssdfsd', 1, 0),
(1471, 256, 9, 7, 1637544163, 'Mon, 22 Nov 21 02:22:43 +0100', 'sdfsdf', 1, 0),
(1474, 284, 9, 7, 1637546856, 'Mon, 22 Nov 21 03:07:36 +0100', 'asdasda', 1, 0),
(1476, 284, 7, 9, 1637551259, 'Mon, 22 Nov 21 04:20:59 +0100', 'sdfsf', 1, 0),
(1477, 256, 7, 9, 1637553391, 'Mon, 22 Nov 21 04:56:31 +0100', 'sdfsd', 1, 0),
(1479, 284, 7, 9, 1637553903, 'Mon, 22 Nov 21 05:05:03 +0100', 'dfgdgd', 1, 0),
(1480, 284, 7, 9, 1637555019, 'Mon, 22 Nov 21 05:23:39 +0100', 'bddfg', 1, 0),
(1483, 328, 9, 7, 1637555053, 'Mon, 22 Nov 21 05:24:13 +0100', NULL, 1, 1482),
(1484, 328, 7, 9, 1637555060, 'Mon, 22 Nov 21 05:24:20 +0100', NULL, 1, 1481),
(1486, 284, 7, 9, 1637555073, 'Mon, 22 Nov 21 05:24:33 +0100', 'sdfsfsdf', 1, 0),
(1487, 328, 9, 7, 1637556690, 'Mon, 22 Nov 21 05:51:30 +0100', NULL, 1, 1485),
(1497, 328, 7, 9, 1637636947, 'Tue, 23 Nov 21 04:09:07 +0100', NULL, 1, 1490),
(1498, 328, 7, 9, 1637636948, 'Tue, 23 Nov 21 04:09:08 +0100', NULL, 1, 1491),
(1499, 328, 7, 9, 1637636948, 'Tue, 23 Nov 21 04:09:08 +0100', NULL, 1, 1492),
(1500, 328, 7, 9, 1637636954, 'Tue, 23 Nov 21 04:09:14 +0100', NULL, 1, 1493),
(1501, 328, 9, 7, 1637637044, 'Tue, 23 Nov 21 04:10:44 +0100', NULL, 1, 1488),
(1502, 328, 9, 7, 1637637045, 'Tue, 23 Nov 21 04:10:45 +0100', NULL, 1, 1489),
(1503, 328, 7, 9, 1637637050, 'Tue, 23 Nov 21 04:10:50 +0100', NULL, 1, 1494),
(1504, 328, 7, 9, 1637637051, 'Tue, 23 Nov 21 04:10:51 +0100', NULL, 1, 1495),
(1505, 328, 7, 9, 1637637053, 'Tue, 23 Nov 21 04:10:53 +0100', NULL, 1, 1496);

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
(256, 'Default', 5, 5, 1, 1, '2021-11-22 11:56:31'),
(258, 'Default', 6, 5, 2, 1, NULL),
(284, 'Where have you been?', 5, 5, 1, 0, '2021-11-22 12:24:33'),
(328, 'test 123456', 5, 5, 1, 0, '2021-11-23 11:09:02');

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
(5, 7, 0, 'Fiqram Cooperation Sdn Bhd', 'No 123 Jalan Meranti Chabang Empat 16210\r\nTumpat\r\nKelantan', '0176250556', '0914588520', 'fiqramcooperation@gmail.com', 'Information Technology', 'Software Development', '2021-08-03', 'KT0406247-U', 50, '619da6fa54e7e.jpg', '2021-11-24 10:44:10');

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
(5, 5, 1, '2021-11-23 09:08:48'),
(6, 5, 2, NULL);

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
(1, 9, 20, '6189f221d7438.png', '2021-11-09 11:59:29'),
(2, 10, 20, '615bbd2d83f64.jpg', '2021-10-05 10:49:17'),
(3, 11, 0, NULL, NULL);

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
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(10, '3wVxbgMMUKhdBet-k-tbjiWNXCtigZO1', 1633402074, 0);

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
(7, 'iqramrafien21@gmail.com', 'Ahmad Albab Bin Jidark', 'iqramrafien21@gmail.com', 1, '$2y$13$5jwVMf2PeCPvVfS3tTRFq.XVCcA9sVyVdX/zr4SqjQSk.OQAedSfq', '_qKjxhFAFD_HQ4PfyY9VdqYNVRmFTN0j', 1624467684, NULL, NULL, '::1', 1624467474, 1630987255, 0, 1637721222, 10, ''),
(8, 'superadmin', 'Superadmin', '', 0, '$2y$10$G2CqfuUqiTshvYmzFbh/seDgLVXbHRvUrb8fu.8UxCHgyaF9vd3pG', '', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 10, ''),
(9, 'iqramrafien@gmail.com', 'Fakhrul Iqram', 'iqramrafien@gmail.com', 2, '$2y$13$lh6AznZexBZVMp9YfH3Eu.aReWILMfAQKzKjfDgooyeitXFRAdFbm', '4INfZI_L_M2RuMxQEYDbfVDKtIwDNiPe', NULL, NULL, NULL, '::1', 1624484446, 1631030643, 0, 1637636240, 10, ''),
(10, 'haikal@gmail.com', 'Hakimi Bin Ab Rahim', 'haikal@gmail.com', 2, '$2y$10$E4zM.GJUgKZFjMn7h2Id9uukq7QX8c20m84WzxhIo5NEmBI9jPUAK', '5VEOQvyjcxb6RKXvYQJmWSfR-yIcpIlJ', NULL, NULL, NULL, '::1', 1633402074, 1633402074, 0, 1635671931, 10, ''),
(11, 'mohdali@gmail.com', 'Mohd Ali Bin Abu', 'mohdali@gmail.com', 2, '$2y$10$CQsQ7C8o233xWqpSciUCref3OTxhU4kKJ6EWsTIiKCzdpjW2fg.3q', 'DO4IhG6vE4WXGcVXyQQ4Zx827WBgIX0t', 1635734141, NULL, NULL, '::1', 1635734098, 1635734098, 0, 1635734190, 10, '');

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
(44, '619de8681b3af.png', '619deb4b4964c.jpg', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1506;

--
-- AUTO_INCREMENT for table `chat_topic`
--
ALTER TABLE `chat_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `web_intro`
--
ALTER TABLE `web_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_portfolio`
--
ALTER TABLE `web_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
