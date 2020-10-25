-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 10:09 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funtastic_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_password` text NOT NULL,
  `ad_name` varchar(50) NOT NULL,
  `ad_address` text NOT NULL,
  `ad_postcode` text NOT NULL,
  `ad_state` varchar(20) NOT NULL,
  `ad_phonenumber` text NOT NULL,
  `ad_profilepic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_email`, `ad_password`, `ad_name`, `ad_address`, `ad_postcode`, `ad_state`, `ad_phonenumber`, `ad_profilepic`) VALUES
(1, 'yeefantan1999@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'Tan Yee Fan', '5, JALAN SERINDIT, TAMAN REKAMAS 2', '86205', 'Johor', '0126561648', 'images/upload/face3.jpg'),
(2, 'ongjiayou249@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'Ong Jia You', '5 jalan serindit taman rekamas 2', '86200', 'Johor', '0126561648', 'images/upload/face2.jpg'),
(8, 'weikiat25@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'Ku Wei Kiat', '', '', '', '', 'images/faces-clipart/pic-1.png'),
(24, 'lim@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'Lim Li Yen', '', '', '', '', 'images/faces-clipart/pic-1.png'),
(25, 'halo@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'halo', '', '', '', '', 'images/faces-clipart/pic-1.png'),
(26, 'lsdjfk@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'sjldfh', '', '', '', '', 'images/faces-clipart/pic-1.png'),
(27, 'jsdhf@gmail.com', 'b3590a7859e4659cba455451ff7834ce', 'sdf', '', '', '', '', 'images/faces-clipart/pic-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `a_description` text NOT NULL,
  `a_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `admin_id`, `a_date`, `a_description`, `a_type`) VALUES
(1, 2, '0000-00-00', 'Testing announcement', 'Reminder'),
(13, 1, '2019-07-29', ' 234', 'Communication'),
(14, 1, '2019-08-29', ' halo Guys!', 'Communication'),
(15, 1, '2019-08-01', ' halo', 'Communication');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_ref_num` int(20) NOT NULL,
  `booking_date_time` datetime NOT NULL,
  `booking_status` varchar(20) NOT NULL DEFAULT 'cart',
  `booking_total` decimal(9,2) NOT NULL,
  `booking_accnum` varchar(20) NOT NULL,
  `c_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `booking_cancel` varchar(12) DEFAULT NULL,
  `booking_method` varchar(20) NOT NULL,
  `refund_status` varchar(20) DEFAULT NULL,
  `cancel_datetime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_ref_num`, `booking_date_time`, `booking_status`, `booking_total`, `booking_accnum`, `c_id`, `ad_id`, `booking_cancel`, `booking_method`, `refund_status`, `cancel_datetime`) VALUES
(29, 414116898, '2019-08-01 22:59:51', 'completed', '6866.00', '4513123455552342', 16, 0, NULL, 'Visa', 'refund', '2019-08-02'),
(34, 936262650, '2019-08-03 19:58:51', 'pending', '8966.00', '4134123455436654', 16, 0, NULL, 'Visa', NULL, NULL),
(35, 956264290, '2019-08-03 20:23:43', 'cancelled', '6532.00', '5134123433242312', 18, 0, NULL, 'Mastercard', 'refund', '2019-08-04'),
(37, 552468193, '2019-08-04 13:15:32', 'paid', '5532.00', '4523098322212343', 51, 0, NULL, 'Visa', NULL, NULL),
(38, 433871961, '2019-08-04 17:26:18', 'paid', '3332.00', '4524234333433321', 18, 0, NULL, 'Visa', NULL, NULL),
(39, 799808120, '2019-08-04 18:44:35', 'paid', '11800.00', '4500234399983432', 50, 0, NULL, 'Visa', NULL, NULL),
(41, 506972000, '2019-08-04 18:49:11', 'paid', '5532.00', '4500908898987676', 49, 0, NULL, 'Visa', NULL, NULL),
(42, 695303580, '2019-08-05 10:22:56', 'paid', '7032.00', '4234098723643323', 52, 0, NULL, 'Visa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_password` text NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_address` text NOT NULL,
  `c_phonenumber` text NOT NULL,
  `c_postcode` text NOT NULL,
  `c_state` varchar(30) NOT NULL,
  `c_profilepic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_email`, `c_password`, `c_name`, `c_address`, `c_phonenumber`, `c_postcode`, `c_state`, `c_profilepic`) VALUES
(16, 'yeefan12@gmail.com', '59b27b45eb03685c58544fd9b96e0ffa', 'tan yee fan', '5 jalan234 serindit taman rekamas 2', '0126561648', '86200', 'Johor', 'img/upload/face3.jpg'),
(18, 'ongjiayou249@gmail.com', '59b27b45eb03685c58544fd9b96e0ffa', 'ong jia you', 'ixora apartment', '0164933566', '34533', 'Melaka', 'img/upload/face1.jpg'),
(19, 'lim.liyen84@gmail.com', '20a67808f5a1bb2bbd77bc22c857b265', 'Lim liyen', 'mmu, jalan ayer keroh lama', '0126854683', '75450', 'Selangor', 'img/upload/DFD.png'),
(46, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 'images/user.png'),
(47, '234#@xfbg.con', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 'images/user.png'),
(48, '234@gkal.com', 'd41d8cd98f00b204e9800998ecf8427e', '324', '324', '234', '234', 'Kedah', 'images/user.png'),
(49, '2342@gmail.com', '59b27b45eb03685c58544fd9b96e0ffa', '234', '5 jalan serindit taman rekamas 2', '01213421344', '86200', 'Kelantan', 'images/user.png'),
(50, 'xiaoxuantb@gmail.com', '59b27b45eb03685c58544fd9b96e0ffa', 'lim xiao xuan', 'halo, hihihi alal', '011-1231313', '86200', 'Johor', 'images/user.png'),
(51, 'test1@gmail.com', '59b27b45eb03685c58544fd9b96e0ffa', 'tan yee fan', '5, jalan serindit ,taman rekamsa 2', '012-234123', '86200', 'Johor', 'images/user.png'),
(52, 'yo@gmail.com', '59b27b45eb03685c58544fd9b96e0ffa', 'tan yee fan', '5 jalan serindit taman rekamas 2', '01234-23423', '86200', 'Johor', 'images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `event_location` varchar(100) NOT NULL,
  `event_price` decimal(9,2) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_id2` int(12) NOT NULL,
  `service_id3` int(12) NOT NULL,
  `package_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_date`, `event_start_time`, `event_end_time`, `event_location`, `event_price`, `service_id`, `service_id2`, `service_id3`, `package_id`, `theme_id`, `booking_id`) VALUES
(29, '2019-09-14', '08:00:00', '22:00:00', 'kampung machap , 86200 simpang rengam', '6866.00', 238, 0, 237, 2360, 236, 29),
(34, '2019-12-12', '10:00:00', '14:00:00', '234, jalan sonada, taman wohoo', '8966.00', 236, 238, 237, 2353, 237, 34),
(35, '2029-08-12', '10:00:00', '22:00:00', 'wo de yin yue meng\r\n', '6532.00', 237, 238, 0, 2354, 236, 35),
(36, '2020-12-12', '10:00:00', '21:00:00', '234, ixora apartment, halo days\r\n', '7132.00', 236, 0, 0, 2354, 237, 36),
(37, '2020-12-12', '10:00:00', '22:00:00', '5, Jalan SS 21/37, Damansara Utama, Petaling Jaya, Selangor, Malaysia\r\n', '5532.00', 2, 0, 0, 2354, 0, 37),
(38, '4133-03-12', '10:00:00', '16:00:00', '5,jalan serindit, taman rekamas 2', '3332.00', 0, 0, 0, 2355, 0, 38),
(39, '2020-02-20', '10:00:00', '22:00:00', '56, Jalan Sultan, Kuala Lumpur City Centre, Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysi', '11800.00', 238, 0, 0, 2358, 237, 39),
(40, '2020-01-10', '10:00:00', '22:00:00', 'kdjf, ldkfjadsf', '7777.00', 0, 0, 0, 2357, 0, 40),
(41, '2020-01-10', '10:00:00', '22:00:00', '376, Jalan Tun Razak, Taman U Thant, Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', '5532.00', 0, 0, 0, 2354, 0, 41),
(42, '2020-03-21', '10:00:00', '22:00:00', '52a, Jalan Penang, Georgetown, George Town, Penang, Malaysia', '7032.00', 237, 238, 0, 2354, 237, 42);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_rating` decimal(11,1) NOT NULL,
  `package_feedback` text NOT NULL,
  `theme_id` int(11) NOT NULL,
  `theme_rating` decimal(11,1) NOT NULL,
  `theme_feedback` text NOT NULL,
  `service1_id` int(11) NOT NULL,
  `service1_rating` decimal(11,1) NOT NULL,
  `service1_feedback` text NOT NULL,
  `service2_id` int(11) NOT NULL,
  `service2_rating` decimal(11,1) NOT NULL,
  `service2_feedback` text NOT NULL,
  `service3_id` int(11) NOT NULL,
  `service3_feedback` text NOT NULL,
  `service3_rating` decimal(11,1) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `package_id`, `package_rating`, `package_feedback`, `theme_id`, `theme_rating`, `theme_feedback`, `service1_id`, `service1_rating`, `service1_feedback`, `service2_id`, `service2_rating`, `service2_feedback`, `service3_id`, `service3_feedback`, `service3_rating`, `booking_id`) VALUES
(4, 2360, '4.0', '<p>overall satisfied with the service..</p>\r\n', 236, '5.0', '<p>this theme is wonderful! adorable!</p>\r\n', 238, '5.0', '<p>nice</p>\r\n', 0, '0.0', '0', 237, '<p>normal emcee performance</p>\r\n', '2.0', 29);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `package_id`) VALUES
(22, 'pic-1.png', '2019-08-05 14:16:11', '', 2353),
(23, 'pic-2.png', '2019-08-05 14:16:11', '', 2353),
(24, 'pic-3.png', '2019-08-05 14:16:11', '', 2353),
(25, 'pic-4.png', '2019-08-05 14:16:11', '', 2353),
(26, 'corporate.jpg', '2019-08-05 15:40:01', '1', 2353),
(27, 'corporate2.jpg', '2019-08-05 15:40:01', '1', 2353),
(28, 'corporate4.jpeg', '2019-08-05 15:40:01', '1', 2353),
(29, 'kid_birthday.jpg', '2019-08-05 15:40:31', '1', 2354),
(30, 'kid_birthday2.jpg', '2019-08-05 15:40:31', '1', 2354),
(31, 'kid_birthday3.jpg', '2019-08-05 15:40:31', '1', 2354),
(32, 'party.jpg', '2019-08-05 15:40:50', '1', 2355),
(33, 'party2.jpg', '2019-08-05 15:40:50', '1', 2355),
(34, 'party3.jpg', '2019-08-05 15:40:50', '1', 2355),
(35, 'party4.jpeg', '2019-08-05 15:40:50', '1', 2355),
(36, 'ClockBarn.jpg', '2019-08-05 15:41:05', '1', 2356),
(37, 'ClockBarn3.png', '2019-08-05 15:41:05', '1', 2356),
(38, 'ClockBarn4.jpg', '2019-08-05 15:41:05', '1', 2356),
(39, 'Southern.jpg', '2019-08-05 15:41:23', '1', 2357),
(40, 'Southern2.jpg', '2019-08-05 15:41:23', '1', 2357),
(41, 'Southern3.jpg', '2019-08-05 15:41:23', '1', 2357),
(42, 'Southern4.jpeg', '2019-08-05 15:41:23', '1', 2357),
(43, 'premium2.jpg', '2019-08-05 15:41:49', '1', 2358),
(44, 'premium3.jpg', '2019-08-05 15:41:49', '1', 2358),
(45, 'premium4.jpg', '2019-08-05 15:41:49', '1', 2358),
(46, 'LaFiesta2.jpg', '2019-08-05 15:42:18', '1', 2359),
(47, 'LaFiesta3.jpg', '2019-08-05 15:42:18', '1', 2359),
(48, 'Southern.jpg', '2019-08-05 15:42:18', '1', 2359),
(49, 'Southern4.jpeg', '2019-08-05 15:42:18', '1', 2359),
(50, 'surprise2.jpg', '2019-08-05 15:42:33', '1', 2360),
(51, 'surprise3.jpg', '2019-08-05 15:42:33', '1', 2360),
(52, 'surprise4.jpg', '2019-08-05 15:42:33', '1', 2360);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_type` varchar(100) NOT NULL,
  `notification_content` varchar(100) NOT NULL,
  `notification_status` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `notification_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_type`, `notification_content`, `notification_status`, `admin_id`, `notification_datetime`) VALUES
(233, 'addadmin', ' has added a new admin named Lim Li Yen!', 'read', 1, '2019-08-04 16:14:37'),
(234, 'addadmin', ' has added a new admin named Lim Li Yen!', 'read', 2, '2019-08-04 16:14:37'),
(235, 'addadmin', ' has added a new admin named Lim Li Yen!', 'unread', 8, '2019-08-04 16:14:37'),
(236, 'addadmin', ' has added a new admin named Lim Li Yen!', 'unread', 24, '2019-08-04 16:14:37'),
(237, 'addadmin', ' has added a new admin named halo!', 'read', 1, '2019-08-04 16:32:12'),
(238, 'addadmin', ' has added a new admin named halo!', 'read', 2, '2019-08-04 16:32:12'),
(239, 'addadmin', ' has added a new admin named halo!', 'unread', 8, '2019-08-04 16:32:12'),
(240, 'addadmin', ' has added a new admin named halo!', 'unread', 24, '2019-08-04 16:32:12'),
(241, 'addadmin', ' has added a new admin named halo!', 'unread', 25, '2019-08-04 16:32:12'),
(242, 'cancelorder', 'ong jia you cancelled booking order.', 'read', 1, '2019-08-04 17:10:59'),
(243, 'cancelorder', 'ong jia you cancelled booking order.', 'read', 2, '2019-08-04 17:10:59'),
(244, 'cancelorder', 'ong jia you cancelled booking order.', 'unread', 8, '2019-08-04 17:10:59'),
(245, 'cancelorder', 'ong jia you cancelled booking order.', 'unread', 24, '2019-08-04 17:10:59'),
(246, 'cancelorder', 'ong jia you cancelled booking order.', 'unread', 25, '2019-08-04 17:10:59'),
(247, 'cancelorder', 'ong jia you cancelled booking order.', 'read', 1, '2019-08-04 17:18:18'),
(248, 'cancelorder', 'ong jia you cancelled booking order.', 'read', 2, '2019-08-04 17:18:18'),
(249, 'cancelorder', 'ong jia you cancelled booking order.', 'unread', 8, '2019-08-04 17:18:18'),
(250, 'cancelorder', 'ong jia you cancelled booking order.', 'unread', 24, '2019-08-04 17:18:18'),
(251, 'cancelorder', 'ong jia you cancelled booking order.', 'unread', 25, '2019-08-04 17:18:18'),
(252, 'addorder', 'ong jia you submitted booking order.', 'read', 1, '2019-08-04 17:24:29'),
(253, 'addorder', 'ong jia you submitted booking order.', 'read', 2, '2019-08-04 17:24:29'),
(254, 'addorder', 'ong jia you submitted booking order.', 'unread', 8, '2019-08-04 17:24:29'),
(255, 'addorder', 'ong jia you submitted booking order.', 'unread', 24, '2019-08-04 17:24:29'),
(256, 'addorder', 'ong jia you submitted booking order.', 'unread', 25, '2019-08-04 17:24:29'),
(257, 'addorder', ' submitted booking order.', 'read', 1, '2019-08-04 17:26:18'),
(258, 'addorder', ' submitted booking order.', 'read', 2, '2019-08-04 17:26:18'),
(259, 'addorder', ' submitted booking order.', 'unread', 8, '2019-08-04 17:26:18'),
(260, 'addorder', ' submitted booking order.', 'unread', 24, '2019-08-04 17:26:18'),
(261, 'addorder', ' submitted booking order.', 'unread', 25, '2019-08-04 17:26:18'),
(262, 'addorder', ' submitted booking order.', 'read', 1, '2019-08-04 18:44:35'),
(263, 'addorder', ' submitted booking order.', 'read', 2, '2019-08-04 18:44:35'),
(264, 'addorder', ' submitted booking order.', 'unread', 8, '2019-08-04 18:44:35'),
(265, 'addorder', ' submitted booking order.', 'unread', 24, '2019-08-04 18:44:35'),
(266, 'addorder', ' submitted booking order.', 'unread', 25, '2019-08-04 18:44:35'),
(267, 'addorder', ' submitted booking order.', 'read', 1, '2019-08-04 18:44:38'),
(268, 'addorder', ' submitted booking order.', 'read', 2, '2019-08-04 18:44:38'),
(269, 'addorder', ' submitted booking order.', 'unread', 8, '2019-08-04 18:44:38'),
(270, 'addorder', ' submitted booking order.', 'unread', 24, '2019-08-04 18:44:38'),
(271, 'addorder', ' submitted booking order.', 'unread', 25, '2019-08-04 18:44:38'),
(272, 'addorder', '.. submitted booking order.', 'read', 1, '2019-08-04 18:47:10'),
(273, 'addorder', '.. submitted booking order.', 'read', 2, '2019-08-04 18:47:10'),
(274, 'addorder', '.. submitted booking order.', 'unread', 8, '2019-08-04 18:47:10'),
(275, 'addorder', '.. submitted booking order.', 'unread', 24, '2019-08-04 18:47:10'),
(276, 'addorder', '.. submitted booking order.', 'unread', 25, '2019-08-04 18:47:10'),
(277, 'addorder', '.234. submitted booking order.', 'read', 1, '2019-08-04 18:49:11'),
(278, 'addorder', '.234. submitted booking order.', 'read', 2, '2019-08-04 18:49:11'),
(279, 'addorder', '.234. submitted booking order.', 'unread', 8, '2019-08-04 18:49:11'),
(280, 'addorder', '.234. submitted booking order.', 'unread', 24, '2019-08-04 18:49:11'),
(281, 'addorder', '.234. submitted booking order.', 'unread', 25, '2019-08-04 18:49:11'),
(282, 'addadmin', 'halohalo was added to the team!', 'read', 1, '2019-08-04 18:49:50'),
(283, 'addadmin', 'halohalo was added to the team!', 'unread', 2, '2019-08-04 18:49:50'),
(284, 'addadmin', 'halohalo was added to the team!', 'unread', 8, '2019-08-04 18:49:50'),
(285, 'addadmin', 'halohalo was added to the team!', 'unread', 24, '2019-08-04 18:49:50'),
(286, 'addadmin', 'halohalo was added to the team!', 'unread', 25, '2019-08-04 18:49:50'),
(287, 'addadmin', 'halohalo was added to the team!', 'read', 1, '2019-08-04 18:50:26'),
(288, 'addadmin', 'halohalo was added to the team!', 'unread', 2, '2019-08-04 18:50:26'),
(289, 'addadmin', 'halohalo was added to the team!', 'unread', 8, '2019-08-04 18:50:26'),
(290, 'addadmin', 'halohalo was added to the team!', 'unread', 24, '2019-08-04 18:50:26'),
(291, 'addadmin', 'halohalo was added to the team!', 'unread', 25, '2019-08-04 18:50:26'),
(292, 'addadmin', 'sjldfh was added to the team!', 'read', 1, '2019-08-04 18:52:40'),
(293, 'addadmin', 'sjldfh was added to the team!', 'unread', 2, '2019-08-04 18:52:40'),
(294, 'addadmin', 'sjldfh was added to the team!', 'unread', 8, '2019-08-04 18:52:40'),
(295, 'addadmin', 'sjldfh was added to the team!', 'unread', 24, '2019-08-04 18:52:40'),
(296, 'addadmin', 'sjldfh was added to the team!', 'unread', 25, '2019-08-04 18:52:40'),
(297, 'addadmin', 'sjldfh was added to the team!', 'unread', 26, '2019-08-04 18:52:40'),
(298, 'addadmin', 'sdf was added to the team!', 'read', 1, '2019-08-04 18:53:06'),
(299, 'addadmin', 'sdf was added to the team!', 'unread', 2, '2019-08-04 18:53:06'),
(300, 'addadmin', 'sdf was added to the team!', 'unread', 8, '2019-08-04 18:53:06'),
(301, 'addadmin', 'sdf was added to the team!', 'unread', 24, '2019-08-04 18:53:06'),
(302, 'addadmin', 'sdf was added to the team!', 'unread', 25, '2019-08-04 18:53:06'),
(303, 'addadmin', 'sdf was added to the team!', 'unread', 26, '2019-08-04 18:53:06'),
(304, 'addadmin', 'sdf was added to the team!', 'unread', 27, '2019-08-04 18:53:06'),
(305, 'addorder', 'tan yee fan submitted booking order.', 'read', 1, '2019-08-05 10:22:56'),
(306, 'addorder', 'tan yee fan submitted booking order.', 'unread', 2, '2019-08-05 10:22:56'),
(307, 'addorder', 'tan yee fan submitted booking order.', 'unread', 8, '2019-08-05 10:22:56'),
(308, 'addorder', 'tan yee fan submitted booking order.', 'unread', 24, '2019-08-05 10:22:56'),
(309, 'addorder', 'tan yee fan submitted booking order.', 'unread', 25, '2019-08-05 10:22:56'),
(310, 'addorder', 'tan yee fan submitted booking order.', 'unread', 26, '2019-08-05 10:22:56'),
(311, 'addorder', 'tan yee fan submitted booking order.', 'unread', 27, '2019-08-05 10:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(12) NOT NULL,
  `package_name` varchar(200) NOT NULL,
  `package_type` varchar(200) NOT NULL,
  `package_price` decimal(9,2) NOT NULL,
  `package_description` longtext NOT NULL,
  `package_image` longtext NOT NULL,
  `package_removed` tinyint(1) NOT NULL DEFAULT '0',
  `indexing` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_type`, `package_price`, `package_description`, `package_image`, `package_removed`, `indexing`) VALUES
(2353, 'funtastic', 'Corporate', '6666.00', '<p>This package is suitable for group size of 200.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We provide dinner for this event. You may schedule the event and have discussion with our team.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is the list of menu we provided:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Cobb Salad</h3>\r\n\r\n<p>Chopped turkey, egg, peas, bacon, cheese and tomato. Layered on a bed of crisp lettuce. Served with homemade fruit bread. Our customers&rsquo; favorite!&nbsp;</p>\r\n\r\n<h3>Chef Salad</h3>\r\n\r\n<p>Crisp lettuce, cheese, egg, tomato and cucumbers. Topped with your choice of chopped turkey or ham. Served with homemade fruit bread.&nbsp;</p>\r\n\r\n<h3>Breaded or Grilled Chicken Salad</h3>\r\n\r\n<p>Your choice of breaded chicken tenders or all-natural grilled chicken breast, sliced on top of crisp lettuce with all the trimmings. Served with homemade fruit bread.</p>\r\n\r\n<h3>Taco Salad</h3>\r\n\r\n<p>Bed of crisp lettuce with onion, cheese and tomato. Served with Mom&rsquo;s Homemade Chili over the top and tortilla chips.&nbsp;</p>\r\n\r\n<h3>Vegetable Plate</h3>\r\n\r\n<p>Choice of three side dishes and homemade bread. Add a fourth side for&nbsp;</p>\r\n', 'images/package/corporate3.jpg', 0, 'FNTSTK '),
(2354, 'Funtastic birthday', 'Birthday', '5532.00', '<p>Hold your children a 10 years old birthday party!</p>\r\n\r\n<p>This should be their unforgettable party in their lifetime.&nbsp;</p>\r\n\r\n<p>This package is suitable to be held at home. You may also set the location / address you want. We will try to get our service into any possibly location.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We provide western style buffet for this event package:</p>\r\n\r\n<p><strong>APPETIZER</strong></p>\r\n\r\n<p>Greek salad</p>\r\n\r\n<p>Roasted Chicken Pineapple salad</p>\r\n\r\n<p>Fennel Seafood salad</p>\r\n\r\n<p>Baby Corn salad</p>\r\n\r\n<p>Pasta salad with Pesto sauce</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>SOUP</strong></p>\r\n\r\n<p>Broccoli cream soup</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>MAIN COURSE</strong></p>\r\n\r\n<p>Grilled Mahi &ndash; Mahi Caribbean spices</p>\r\n\r\n<p>Beef Kebab Mushroom sauce</p>\r\n\r\n<p>William Potato</p>\r\n\r\n<p>Green Bean bundle with Bacon</p>\r\n\r\n<p>Roasted Pork with Rosemary sauce</p>\r\n\r\n<p>Fusilli pasta</p>\r\n\r\n<p>Saut&eacute;ed Kenya Beans</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>DESSERT</strong></p>\r\n\r\n<p>Blueberry cake</p>\r\n\r\n<p>Lychee pudding</p>\r\n\r\n<p>Fruit skewer</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Coffee or Tea</strong></p>\r\n', 'images/package/hotel_party3.jpg', 0, 'FNTSTK BR0T '),
(2355, 'birthday party', 'Birthday', '3332.00', '<p>This package is suitable for a group size of 50 people.</p>\r\n\r\n<p>Dinner is included. No age limitation.</p>\r\n\r\n<p>Can ask for more details through dropping us a message or send us an email.</p>\r\n\r\n<p>We provide western style buffet for this event package:</p>\r\n\r\n<p>Duo Cherry Tomato Salad with Pesto for salad</p>\r\n\r\n<p>Cream of Forest Mushroom Soup for soup</p>\r\n\r\n<p>Spaghetti with Seafood</p>\r\n\r\n<p>Oven Baked Boneless Chicken with Button Mushroom Cream Sauce</p>\r\n\r\n<p>Fish Fillet with Spicy Mango Salsa</p>\r\n\r\n<p>Breaded Scallop with Tartar Dip</p>\r\n\r\n<p>Buttered Broccoli with Mushroom and Almond Flakes</p>\r\n\r\n<p>Orange Cordial<br />\r\nLemon Cordial<br />\r\nCoffee &amp; Tea</p>\r\n', 'images/package/kid_birthday4.jpg', 0, 'BR0T PRT '),
(2356, 'clockbarn wedding', 'Wedding', '8874.00', '<p>How about having wedding party at wild surrounding? Get with the fresh air, enjoy the moments which away from hustle and bustle.</p>\r\n\r\n<p>The suggested group size for tihs package is 100 guests and above.</p>\r\n\r\n<p>You may add any suitable themes in this package.</p>\r\n\r\n<p>Below is the menu for the dinner:</p>\r\n\r\n<p><strong>Chicken</strong></p>\r\n\r\n<p>Oven Baked Boneless Chicken with Button Mushroom Cream Sauce<br />\r\nGrilled Chicken Chop with Black Pepper Sauce</p>\r\n\r\n<p><strong>Rice</strong></p>\r\n\r\n<p>Baked Butter Rice with Nuts &amp; Raisin<br />\r\nChicken Ham Fried Rice</p>\r\n\r\n<p><strong>Vegetable</strong></p>\r\n\r\n<p>Buttered Broccoli with Mushroom and Almond Flakes<br />\r\nSaut&eacute;ed Cauliflower with Baby Carrot</p>\r\n\r\n<p><strong>Beverage</strong></p>\r\n\r\n<p>Fruit Punch<br />\r\nBarley Cordial<br />\r\nOrange Cordial<br />\r\nLemon Cordial<br />\r\nCoffee &amp; Tea</p>\r\n\r\n<p>&quot;</p>\r\n', 'images/package/ClockBarn2.jpg', 0, 'KLKBRN WTNK '),
(2357, 'Southern corporate', 'Corporate', '7777.00', '<p>Wow. Bring yourself and your employees a funtastic weekend or an annual dinner away from the city.</p>\r\n\r\n<p>The default location for this package is Bayou Lagoon.</p>\r\n\r\n<p>Enjoy the fresh air. Enjoy the easy moments.</p>\r\n\r\n<p>Suggested group size : 50 pax to 100 pax</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>Dinner menu as below:</p>\r\n\r\n<ul>\r\n	<li>Baked Butter Rice with Nuts &amp; Raisin</li>\r\n	<li>Chicken Ham Fried Rice</li>\r\n	<li>Duo Cherry Tomato Salad with Pesto</li>\r\n	<li>International Chicken Caesar SaladSpaghetti with Seafood</li>\r\n	<li>Penne Pasta with PrawnButtered Broccoli with Mushroom and Almond Flakes</li>\r\n	<li>Saut&eacute;ed Cauliflower with Baby CarrotChilled Honeydew Sago</li>\r\n	<li>Fresh Fruit Platter</li>\r\n	<li>Mini Chocolate Brownie</li>\r\n</ul>\r\n', 'images/package/Southern3.jpg', 0, 'S0RN KRPRT '),
(2358, 'Premium Luxury corporate dinner', 'Corporate', '10800.00', '<p>Have a luxury trip and dinner with your workers!</p>\r\n\r\n<p>Suggested group size is 200 pax.</p>\r\n\r\n<p>Dinner is included. No extra services included.</p>\r\n\r\n<p>We provide this service at luxury and premium hotel which is located at Kuala Lumpur.</p>\r\n\r\n<p>You may find other location and leave description for us.</p>\r\n\r\n<p>For dinner we provided as follow:</p>\r\n\r\n<p><strong>APPETIZER</strong></p>\r\n\r\n<p>Russian Chicken salad</p>\r\n\r\n<p>Potato salad</p>\r\n\r\n<p><strong>SOUP</strong></p>\r\n\r\n<p>Vegetable Cream soup</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MAIN COURSE</strong></p>\r\n\r\n<p>Chicken Kebab</p>\r\n\r\n<p>Fish Melanesia</p>\r\n\r\n<p>Tomato Pasta sauce</p>\r\n\r\n<p>Beef Szechuan</p>\r\n\r\n<p>Roasted Potato</p>\r\n\r\n<p>Saut&eacute;ed vegetable</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>DESSERT</strong></p>\r\n\r\n<p>Pumpkin pie</p>\r\n\r\n<p>Chocolate pudding</p>\r\n\r\n<p>Mandarin cake</p>\r\n\r\n<p>Fruit salad</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Coffee or Tea</strong></p>\r\n', 'images/package/premium.jpg', 0, 'PRMM LKSR KRPRT TNR '),
(2359, 'southern wedding', 'Wedding', '6655.00', '<p>This is a southern style wedding dinner and party.</p>\r\n\r\n<p>We provide the dinner for this package. Suggested group size is 50 pax.</p>\r\n\r\n<p>The default location for this package is at beach. You may suggest any beach and we will try to get your preferred location.</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p><strong>APPETIZER</strong></p>\r\n\r\n<p>Tuna salad with star fruit</p>\r\n\r\n<p>Cucumber salad, Yoghurt Garlic dressing</p>\r\n\r\n<p>Grilled Zucchini and Eggplant salad</p>\r\n\r\n<p>Bean salad with Chicken</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>SOUP</strong></p>\r\n\r\n<p>Carrot Cream soup</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>MAIN COURSE</strong></p>\r\n\r\n<p>London Meatloaf</p>\r\n\r\n<p>Chicken Szechuan</p>\r\n\r\n<p>Seafood brass</p>\r\n\r\n<p>Chili Con Carne</p>\r\n\r\n<p>Pasta pesto sauce</p>\r\n\r\n<p>Potato Lyonnaise</p>\r\n\r\n<p>Grilled vegetable skewer</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>DESSERT</strong></p>\r\n\r\n<p>Chocolate mousse</p>\r\n\r\n<p>Banana cake</p>\r\n\r\n<p>Assorted fresh Fruits</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>Coffee or Tea</strong></p>\r\n', 'images/package/Southern.jpg', 0, 'S0RN WTNK '),
(2360, 'romantic surprise', 'Wedding', '6666.00', '<p>How about having your wedding dinner beside the beach?</p>\r\n\r\n<p>Enjoy the sea breeze. Listen to the sea wave.</p>\r\n\r\n<p>Sure you get yourself enjoying here. You&#39;ll definitely feel relaxing!</p>\r\n\r\n<p>Suggested group size for this package is 100pax.</p>\r\n\r\n<p>Enjoy having your wedding here!</p>\r\n\r\n<p>For dinner we provided as follows:&nbsp;</p>\r\n\r\n<p><strong>APPETIZER</strong></p>\r\n\r\n<p>Sweet Potato salad with green Apple</p>\r\n\r\n<p>Tomato Cucumber salad</p>\r\n\r\n<p>Garden salad</p>\r\n\r\n<p>Carrot salad</p>\r\n\r\n<p>Cora&rsquo;s Chicken salad</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>SOUP</strong></p>\r\n\r\n<p>Fish Silk soup</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>MAIN COURSE</strong></p>\r\n\r\n<p>Beef Stroganoff</p>\r\n\r\n<p>Penne Arrabiata</p>\r\n\r\n<p>Grilled Pork BBQ sauce</p>\r\n\r\n<p>Roasted Chicken Mushroom sauce</p>\r\n\r\n<p>Potato Croquette</p>\r\n\r\n<p>Vegetable basket</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>DESSERT</strong></p>\r\n\r\n<p>Black rice pudding</p>\r\n\r\n<p>Crepes suzette with Mandarin sauce</p>\r\n\r\n<p>Strawberry cake</p>\r\n\r\n<p>Fruit skewer</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Coffee or Tea</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;</p>\r\n', 'images/package/surprise.jpg', 0, 'RMNTK SRPRS ');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `refund_bank` varchar(100) NOT NULL,
  `refund_account` varchar(100) NOT NULL,
  `refund_name` varchar(50) NOT NULL,
  `refund_amount` decimal(9,2) NOT NULL,
  `refund_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `booking_id`, `refund_bank`, `refund_account`, `refund_name`, `refund_amount`, `refund_status`) VALUES
(11, 29, 'cimb', '92304821123', 'tan yee fan', '3433.00', 'completed'),
(12, 35, 'cimb', '8923423223421234', 'ong jia you', '3266.00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(11) NOT NULL,
  `service_type` text NOT NULL,
  `service_price` decimal(9,2) NOT NULL,
  `service_description` longtext NOT NULL,
  `service_image` longtext NOT NULL,
  `service_removed` int(11) NOT NULL DEFAULT '0',
  `indexing` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_type`, `service_price`, `service_description`, `service_image`, `service_removed`, `indexing`) VALUES
(236, 'guitar live', 'Clown', '800.00', '<p>Have 2 clown for performance during your whole day event!</p>\r\n\r\n<p>Performance is 30 minutes in every 2 hours.</p>\r\n\r\n<p>Performance included : fire shows, acrobaics shows.</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n', 'images/service/clown2.jpg', 0, 'KTR LF '),
(237, 'emcee', 'Emcee', '500.00', '<p>Have an emcee during your whole day event.</p>\r\n\r\n<p>You may discuss what the atmosphere you wish to conduct. We will let the expert of emcee ot do that.</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n', 'images/service/emcee2.jpg', 0, 'EMS '),
(238, 'Photobooth', 'Photobooth', '200.00', '<p>How about having photobooth for capturing every moments in your event?</p>\r\n\r\n<p>We will provide photobooth for your preferences&nbsp;during the whole day of event.</p>\r\n\r\n<p>&quot;</p>\r\n', 'images/service/beach.jpg', 0, 'FTB0 '),
(239, 'guitar live', 'Liveband', '800.00', '<p>Having professional liveband performance which is the guitar performance.</p>\r\n\r\n<p>The shows will be 2 hours. You may choose the songs or performance contents.</p>\r\n', 'images/service/guitar.jpg', 0, 'KTR LF '),
(240, 'orchestra p', 'Liveband', '500.00', '<p>How about having 1 hour and 30 minutes or Chinese Orchestra Performance?</p>\r\n', 'images/service/orchestra.jpg', 0, 'ORXSTR P '),
(242, 'test', 'Clown', '234234.00', '<p>234</p>\r\n', 'images/service/icon2.png', 1, ''),
(243, '234', 'Clown', '24.00', '<p>234</p>\r\n', 'images/service/do.png', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`sub_id`, `sub_email`) VALUES
(1, 'yeefan12@gmail.com'),
(2, 'xiaoxuantb@gmail.com'),
(3, 'ongjiayou249@gmail.com'),
(4, 'bekcek1234@gmail.com'),
(5, 'mrsyiing1010@gmail.com'),
(6, 'zhixinkiw1999@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(12) NOT NULL,
  `theme_name` varchar(200) NOT NULL,
  `theme_price` decimal(9,2) NOT NULL,
  `theme_description` longtext NOT NULL,
  `theme_image` longtext NOT NULL,
  `theme_removed` int(11) NOT NULL DEFAULT '0',
  `indexing` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_name`, `theme_price`, `theme_description`, `theme_image`, `theme_removed`, `indexing`) VALUES
(236, 'christmas', '300.00', '<p>We apply the theme in your event. This is Christmas based theme.</p>\r\n', 'images/theme/christmas2.jpg', 0, 'XRSTMS '),
(237, 'Disney', '800.00', '<p>We will have 2 cosplay character from disney for this theme applied.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'images/theme/disney.jpg', 0, 'TSN '),
(238, 'mermaid', '333.00', '<p>This is theme suitable for children&#39;s birthday party. We will send mermaid-style designed cake and design the location with mermaid theme based.</p>\r\n', 'images/theme/mermaid3.jpg', 0, 'MRMT '),
(240, 'sdfsdf234234', '234.00', '<p>234234</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>\r\n', 'images/theme/User-Default.jpg', 1, 'STFSTF '),
(241, '234', '234.00', '<p>234</p>\r\n', 'images/theme/icon2.png', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `todolist_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `todolist_type` varchar(100) NOT NULL,
  `todolist_removed` int(11) NOT NULL DEFAULT '0',
  `todolist_content` text NOT NULL,
  `todolist_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`todolist_id`, `admin_id`, `todolist_type`, `todolist_removed`, `todolist_content`, `todolist_datetime`) VALUES
(17, 1, 'urgent', 1, ' test', '2019-08-05 11:06:28'),
(18, 1, 'urgent', 1, ' test', '2019-08-05 11:07:02'),
(19, 1, 'urgent', 1, ' test', '2019-08-05 11:08:12'),
(20, 1, 'pending', 1, ' Halo, Having meeting at 10 a.m. tomorrow', '2019-08-05 11:39:28'),
(21, 1, 'urgent', 1, ' Meeting at 10.00 a.m. tomorrow\r\n', '2019-08-05 11:39:52'),
(22, 1, 'pending', 1, ' Having class 11.00 p.m. today', '2019-08-05 11:40:06'),
(23, 1, 'urgent', 1, ' ~~~', '2019-08-05 11:40:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`todolist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2364;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `todolist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
