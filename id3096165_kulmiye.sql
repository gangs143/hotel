-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2018 at 03:04 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3096165_kulmiye`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `booking` date NOT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `room_no` int(11) NOT NULL,
  `staying` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `discount` double NOT NULL,
  `rem_price` double NOT NULL,
  `paid` double NOT NULL,
  `tot_price` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `guest_id`, `booking`, `checkin`, `checkout`, `room_no`, `staying`, `status`, `discount`, `rem_price`, `paid`, `tot_price`, `created_at`, `updated_at`) VALUES
(1, 5, '2018-10-22', '2018-10-22', '2018-10-24', 10, 2, 0, 0, 0, 20, 20, '2018-10-22 19:30:51', '2018-10-24 16:27:40'),
(2, 6, '2018-10-22', '2018-10-22', '2018-10-25', 6, 3, 0, 0, 0, 12, 12, '2018-10-22 19:31:18', '2018-10-24 16:30:18'),
(3, 8, '2018-10-22', '2018-10-22', '2018-11-01', 9, 10, 1, 0, 190, 10, 200, '2018-10-22 19:32:57', '2018-10-29 14:11:50'),
(4, 5, '2018-10-31', '2018-10-31', '2018-11-03', 7, 3, 0, 0, 0, 30, 30, '2018-10-31 08:48:16', '2018-10-31 08:10:20'),
(5, 15, '2018-10-31', '2018-10-31', '2018-11-02', 13, 2, 0, 0, 0, 20, 20, '2018-10-31 08:56:03', '2018-10-31 08:09:45'),
(6, 19, '2018-10-31', '2018-10-31', '2018-11-03', 6, 3, 0, 0, 0, 12, 12, '2018-10-31 11:06:40', '2018-10-31 08:13:22'),
(7, 14, '2018-10-31', '2018-10-31', '2018-11-04', 6, 4, 0, 0, 0, 16, 16, '2018-10-31 11:07:41', '2018-10-31 08:13:10'),
(8, 12, '2018-10-31', '2018-10-31', '2018-11-01', 12, 1, 0, 0, 0, 4, 4, '2018-10-31 11:08:13', '2018-10-31 08:09:05'),
(9, 5, '2018-10-31', '2018-10-31', '2018-11-03', 7, 3, 0, 0, 0, 30, 30, '2018-10-31 11:20:42', '2018-10-31 08:22:48'),
(10, 7, '2018-10-31', '2018-10-31', '2018-11-04', 13, 4, 0, 0, 0, 40, 40, '2018-10-31 11:21:02', '2018-10-31 08:22:31'),
(11, 10, '2018-10-31', '2018-10-31', '2018-11-05', 14, 5, 0, 0, 0, 50, 50, '2018-10-31 11:21:23', '2018-10-31 08:22:15'),
(12, 6, '2018-10-31', '2018-10-31', '2018-11-07', 6, 7, 1, 0, 28, 0, 28, '2018-10-31 11:24:49', '2018-10-31 08:24:49'),
(13, 7, '2018-10-31', '2018-10-31', '2018-11-06', 6, 6, 0, 0, 0, 24, 24, '2018-10-31 11:25:33', '2018-10-31 08:25:57'),
(14, 15, '2018-10-31', '2018-10-31', '2018-11-02', 6, 2, 1, 0, 8, 0, 8, '2018-10-31 11:26:36', '2018-10-31 08:26:36'),
(15, 18, '2018-11-02', '2018-11-02', '2018-11-06', 10, 4, 1, 0, 32, 8, 40, '2018-11-02 13:38:42', '2018-11-02 13:42:04'),
(16, 8, '2018-11-02', '2018-11-02', '2018-11-10', 11, 8, 1, 0, 160, 0, 160, '2018-11-02 13:44:34', '2018-11-02 13:44:34'),
(17, 7, '2018-11-03', NULL, NULL, 16, 0, 0, 0, 0, 0, 0, '2018-11-03 02:15:28', '2018-11-03 02:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `check_trn`
--

CREATE TABLE `check_trn` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `check_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_trn`
--

INSERT INTO `check_trn` (`id`, `guest_id`, `check_id`, `amount`, `created_at`, `update_at`) VALUES
(1, 6, 2, 6, '2018-10-22 19:42:37', '2018-10-22 16:42:37'),
(2, 6, 2, 14, '2018-10-22 19:45:08', '2018-10-22 16:45:08'),
(3, 8, 3, 0, '2018-10-24 19:03:10', '2018-10-24 16:03:10'),
(4, 8, 3, 0, '2018-10-24 19:05:04', '2018-10-24 16:05:04'),
(5, 8, 3, 0, '2018-10-24 19:05:40', '2018-10-24 16:05:40'),
(6, 8, 3, 10, '2018-10-24 19:05:58', '2018-10-29 14:11:50'),
(7, 6, 2, 0, '2018-10-24 19:13:09', '2018-10-24 16:13:09'),
(8, 6, 2, 4, '2018-10-24 19:14:30', '2018-10-24 16:14:30'),
(9, 6, 2, 2.1, '2018-10-24 19:16:00', '2018-10-24 16:16:00'),
(10, 5, 1, 10, '2018-10-24 19:25:54', '2018-10-24 16:25:54'),
(11, 5, 1, 4, '2018-10-24 19:26:08', '2018-10-24 16:26:20'),
(12, 5, 1, 6, '2018-10-24 19:27:40', '2018-10-24 16:27:40'),
(13, 6, 2, 4, '2018-10-24 19:30:18', '2018-10-24 16:30:18'),
(14, 5, 4, 15, '2018-10-31 10:55:05', '2018-10-31 07:55:05'),
(15, 12, 8, 4, '2018-10-31 11:09:05', '2018-10-31 08:09:05'),
(16, 15, 5, 20, '2018-10-31 11:09:46', '2018-10-31 08:09:46'),
(17, 5, 4, 15, '2018-10-31 11:10:20', '2018-10-31 08:10:20'),
(18, 14, 7, 16, '2018-10-31 11:13:10', '2018-10-31 08:13:10'),
(19, 19, 6, 12, '2018-10-31 11:13:22', '2018-10-31 08:13:22'),
(20, 10, 11, 50, '2018-10-31 11:22:15', '2018-10-31 08:22:15'),
(21, 7, 10, 40, '2018-10-31 11:22:31', '2018-10-31 08:22:31'),
(22, 5, 9, 30, '2018-10-31 11:22:48', '2018-10-31 08:22:48'),
(23, 7, 13, 24, '2018-10-31 11:25:57', '2018-10-31 08:25:57'),
(24, 18, 15, 8, '2018-11-02 13:42:04', '2018-11-02 13:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `transfer` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `amount`, `transfer`, `created_at`, `updated_at`) VALUES
(1, 10, '2018-10-29', '2018-10-29 17:22:17', '2018-10-29 14:22:17'),
(5, 30, '2018-10-30', '2018-10-30 08:08:16', '2018-10-30 05:08:49'),
(6, 50, '2018-10-31', '2018-10-30 08:12:37', '2018-10-30 05:12:37'),
(7, 23, '2018-10-31', '2018-10-31 11:38:19', '2018-10-31 08:38:19'),
(8, 58, '2018-11-02', '2018-11-02 13:51:55', '2018-11-02 13:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `exp_daily`
--

CREATE TABLE `exp_daily` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `description` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exp_daily`
--

INSERT INTO `exp_daily` (`id`, `type`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(15, 'washing closes', 5, 'this amount of Exp is paid washing closes', '2018-10-10 16:23:29', '2018-10-10 13:23:29'),
(16, 'oomo', 1, 'nadiifin', '2018-10-10 18:53:23', '2018-10-10 15:53:23'),
(17, 'oonmo', 1, 'nadiifin', '2018-10-11 11:23:01', '2018-10-11 08:23:01'),
(18, 'nadiifin', 5, 'tirtirid', '2018-10-13 20:10:49', '2018-10-13 17:10:49'),
(19, 'oomo', 10, 'nadaafad', '2018-10-29 17:21:36', '2018-10-29 14:21:36'),
(20, 'oomo', 10, 'nadaafad', '2018-10-30 11:11:11', '2018-10-30 08:23:57'),
(21, 'rinji', 50, 'hotelka oo dhan', '2018-10-30 11:25:31', '2018-10-30 08:25:51'),
(22, 'oomo', 2, 'fsd', '2018-10-30 11:37:23', '2018-10-30 08:37:23'),
(23, 'rinji', 50, 'guriga oo dhan', '2018-10-31 11:28:30', '2018-10-31 08:28:30'),
(24, 'weel', 30, 'alaab', '2018-10-31 11:30:25', '2018-10-31 08:30:25'),
(25, 'oomo', 20, 'oomo', '2018-10-31 11:33:14', '2018-10-31 08:33:14'),
(26, 'd', 3, 'gdf', '2018-10-31 11:34:08', '2018-10-31 08:34:08'),
(27, 'tuubo', 8, 'qolalf', '2018-11-02 13:49:21', '2018-11-02 13:49:21'),
(28, 'rinjiyen', 50, 'guriga oo dhan', '2018-11-02 13:50:06', '2018-11-02 13:50:36'),
(29, 'oomo', 10, 'dsf', '2018-11-03 02:28:12', '2018-11-03 02:28:12'),
(30, 'tuubooyin', 20, 'fsdf', '2018-11-03 02:33:03', '2018-11-03 02:33:03'),
(31, 'tuubooyin', 20, 'fsdf', '2018-11-03 02:33:04', '2018-11-03 02:33:04'),
(32, 'tuubooyin', 20, 'fsdf', '2018-11-03 02:33:04', '2018-11-03 02:33:04'),
(33, 'tuubo', 15, 'fsd', '2018-11-03 02:34:46', '2018-11-03 02:34:46'),
(34, 'tuubo', 15, 'fsd', '2018-11-03 02:34:46', '2018-11-03 02:34:46'),
(35, 'tuubo', 15, 'fsd', '2018-11-03 02:34:47', '2018-11-03 02:34:47'),
(36, 'fd', 45, 'fds', '2018-11-03 02:35:19', '2018-11-03 02:35:19'),
(37, 'xa', 12, 'sdfsw', '2018-11-03 02:36:40', '2018-11-03 02:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `name`) VALUES
(1, 'floor 1'),
(2, 'floor 2'),
(3, 'floor 3');

-- --------------------------------------------------------

--
-- Table structure for table `guarantee`
--

CREATE TABLE `guarantee` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `description` text NOT NULL,
  `verifiyed` int(1) NOT NULL,
  `grname` varchar(60) DEFAULT NULL,
  `grphone` varchar(15) DEFAULT NULL,
  `grtitle` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `phone`, `nationality`, `gender`, `description`, `verifiyed`, `grname`, `grphone`, `grtitle`, `created_at`, `updated_at`) VALUES
(5, 'mustafe', '098877676', 'somali', 'male', 'waa arday', 1, '', '', '', '2018-10-10 18:47:35', '2018-10-10 15:47:35'),
(6, 'abdi xasan', '09086365', 'somali', 'male', 'macalin', 1, '', '', '', '2018-10-10 19:37:16', '2018-10-10 16:37:16'),
(7, 'xasan muuse', '098787485', 'somali', 'male', 'waa musaafir', 1, '', '', '', '2018-10-13 19:18:58', '2018-10-13 16:18:58'),
(8, 'farah jaamac', '09593487', 'ethiopian', 'male', 'arday', 1, '', '', '', '2018-10-13 19:20:52', '2018-10-13 16:20:52'),
(9, 'aaliya', '0976578767', 'sudan', 'female', 'dhakhtarad', 1, '', '', '', '2018-10-13 19:22:15', '2018-10-13 16:22:15'),
(10, 'muud ali', '8989', 'somali', 'male', '', 1, '', '', '', '2018-10-20 21:51:33', '2018-10-25 16:13:24'),
(11, 'xasan aadan samater', '8478932748932', 'somali', 'male', 'hawiye cayr ah', 1, '', '', '', '2018-10-25 20:09:20', '2018-10-25 17:09:20'),
(12, 'farxiye fiska', '2930480239', 'somali', 'female', 'hawiye cayr ah', 1, 'xasan aadan samater', '43892748', 'fanaan lafahi hore ah', '2018-10-25 20:10:48', '2018-10-25 17:10:48'),
(13, 'salaad darbi', '38472398', 'somali', 'male', 'hawiye heesta beeni raad ma leh', 1, '', '', '', '2018-10-25 20:12:10', '2018-10-25 17:12:10'),
(14, 'cali axmed ismacil', '546564564', 'somali', 'male', 'ganacsade', 1, '', '', '', '2018-10-29 10:54:30', '2018-10-29 07:54:30'),
(15, 'kaamil axmed xasan', '564546', 'somali', 'male', 'arday', 1, '', '', '', '2018-10-29 10:54:57', '2018-10-29 07:54:57'),
(16, 'hodan axmed', '565645456', 'somali', 'female', 'guri joog', 1, 'jaamac cali', '423432', 'ganacase', '2018-10-30 12:00:18', '2018-10-30 09:00:18'),
(17, 'xamdi maxamuud', '4546', 'somali', 'male', 'xildhibaan', 1, 'xasan shiikh maxamuud', '897897989', 'siyaasi', '2018-10-30 17:00:09', '2018-10-30 14:00:44'),
(18, 'aadan axmed', '8789789789', 'somali', 'male', 'software developer', 1, 'yuusuf khaliil', '23423343', 'ganacsade', '2018-10-30 17:01:27', '2018-10-30 14:07:19'),
(19, 'c/raxmaan cali', '42343', 'somali', 'male', 'ganacsade', 1, NULL, NULL, NULL, '2018-10-31 08:17:19', '2018-10-31 05:17:19'),
(21, 'jkjlkjk', '5465456', 'jhjkhkj', 'male', 'fsdfdsfs', 1, 'fsdfskj', '32432', 'kkj', '2018-11-03 02:57:27', '2018-11-03 02:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` varchar(30) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `location`, `address`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Qahira HOtel', 'bosaaso', 'Suuqa', 'uploads/hotels.jpg', '2018-07-13 16:52:19', '2018-11-03 03:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `medium`
--

CREATE TABLE `medium` (
  `id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `dates` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medium`
--

INSERT INTO `medium` (`id`, `debit`, `credit`, `dates`, `created_at`, `updated_at`) VALUES
(6, 6, 0, '2018-10-10', '2018-10-10 16:23:29', '2018-10-10 15:53:23'),
(7, 1, 0, '2018-10-11', '2018-10-11 11:23:01', '2018-10-11 08:23:01'),
(8, 5, 0, '2018-10-13', '2018-10-13 20:10:49', '2018-10-13 17:10:49'),
(9, 0, 10, '2018-10-29', '2018-10-29 17:21:36', '2018-10-29 15:02:08'),
(10, 72, 0, '2018-10-30', '2018-10-30 11:11:11', '2018-10-30 08:37:23'),
(11, 50, 0, '0000-00-00', '2018-10-31 11:28:30', '2018-10-31 08:28:30'),
(12, 30, 0, '0000-00-00', '2018-10-31 11:30:25', '2018-10-31 08:30:25'),
(13, 0, 23, '2018-10-31', '2018-10-31 11:33:14', '2018-10-31 08:38:19'),
(14, 0, 58, '2018-11-02', '2018-11-02 13:49:21', '2018-11-02 13:51:55'),
(15, 172, 0, '2018-11-03', '2018-11-03 02:28:12', '2018-11-03 02:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `check_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `memo` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `advance_pay` double NOT NULL,
  `rem_pay` double NOT NULL,
  `status` int(11) NOT NULL,
  `payroll_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `staff_id`, `amount`, `advance_pay`, `rem_pay`, `status`, `payroll_date`, `created_at`, `updated_at`) VALUES
(29, 18, 300, 60, 0, 1, NULL, '2018-10-10 16:26:20', '2018-11-01 05:13:11'),
(30, 18, 10, 10, 290, 0, NULL, '2018-11-01 08:10:01', '2018-11-01 05:10:01'),
(31, 22, 600, 0, 0, 1, NULL, '2018-11-01 08:13:52', '2018-11-01 05:13:52'),
(32, 22, 800, 200, -200, 1, NULL, '2018-11-01 08:17:42', '2018-11-02 13:54:33'),
(33, 23, 300, 0, 0, 1, '2018-10-01', '2018-11-01 08:25:46', '2018-11-01 05:25:46'),
(34, 25, 400, 300, 0, 1, '2018-10-01', '2018-10-07 08:26:53', '2018-11-01 05:27:50'),
(35, 23, 500, 200, -200, 1, '2018-10-01', '2018-11-01 08:31:43', '2018-11-02 19:44:10'),
(36, 20, 900, 0, 0, 1, '2018-11-01', '2018-12-01 08:32:54', '2018-12-01 05:32:54'),
(37, 19, 200, 80, 0, 1, '2018-10-01', '2018-10-01 08:56:30', '2018-11-01 05:59:16'),
(38, 22, 600, 0, 0, 1, '2018-10-02', '2018-11-02 13:55:31', '2018-11-02 13:55:31'),
(39, 22, 600, 0, 0, 1, '2018-10-02', '2018-11-02 13:56:27', '2018-11-02 13:56:27'),
(40, 25, 200, 200, 200, 0, NULL, '2018-11-02 19:51:50', '2018-11-02 19:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `counter` int(4) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type_id`, `floor_id`, `room_no`, `beds`, `counter`, `status`, `created_at`, `updated_at`) VALUES
(6, 4, 1, 101, 2, 2, 1, '2018-10-10 19:23:33', '2018-10-31 08:26:36'),
(7, 6, 3, 302, 1, 0, 0, '2018-10-13 19:16:02', '2018-10-31 08:22:48'),
(9, 5, 2, 202, 1, 0, 1, '2018-10-21 18:44:52', '2018-10-22 16:32:57'),
(10, 6, 1, 104, 1, 0, 1, '2018-10-21 18:44:52', '2018-11-02 13:38:42'),
(11, 5, 2, 205, 1, 0, 1, '2018-10-25 19:03:14', '2018-11-02 13:44:34'),
(12, 4, 1, 105, 1, 0, 0, '2018-10-25 19:06:23', '2018-10-31 08:09:05'),
(13, 6, 3, 309, 1, 0, 0, '2018-10-29 16:46:30', '2018-10-31 08:22:31'),
(14, 6, 3, 308, 1, 0, 0, '2018-10-31 10:41:29', '2018-10-31 08:22:15'),
(15, 5, 1, 106, 1, 0, 0, '2018-11-02 13:29:00', '2018-11-02 13:29:00'),
(16, 6, 1, 107, 1, 0, 1, '2018-11-02 13:29:01', '2018-11-03 02:15:28'),
(17, 7, 2, 25, 1, 0, 0, '2018-11-03 02:59:32', '2018-11-03 02:59:32'),
(18, 7, 3, 112, 45, 0, 0, '2018-11-03 02:59:50', '2018-11-03 02:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `type`, `price`, `created_at`, `updated_at`) VALUES
(4, 'double', 4, '2018-10-10 19:16:52', '2018-10-21 16:28:28'),
(5, 'family', 20, '2018-10-13 19:12:59', '2018-10-13 16:12:59'),
(6, 'single', 10, '2018-10-13 19:13:14', '2018-10-21 16:28:05'),
(7, 'triple', 7, '2018-10-30 17:25:52', '2018-11-02 13:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `salary_activity`
--

CREATE TABLE `salary_activity` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `paid_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_activity`
--

INSERT INTO `salary_activity` (`id`, `staff_id`, `payroll_id`, `amount`, `paid_date`, `created_at`, `updated_at`) VALUES
(16, 18, 29, 40, '2018-10-10', '2018-10-10 16:26:20', '2018-10-10 16:04:44'),
(17, 18, 29, 20, '2018-10-10', '2018-10-10 19:11:55', '2018-10-10 16:11:55'),
(18, 18, 30, 10, '2018-11-01', '2018-11-01 08:10:01', '2018-11-01 05:10:01'),
(19, 25, 34, 200, '2018-10-07', '2018-10-07 08:26:53', '2018-10-07 05:26:53'),
(20, 25, 34, 100, '2018-10-07', '2018-10-07 08:27:27', '2018-10-07 05:27:27'),
(21, 19, 37, 80, '2018-10-01', '2018-10-01 08:56:30', '2018-10-01 05:56:30'),
(22, 22, 32, 200, '2018-11-02', '2018-11-02 13:54:33', '2018-11-02 13:54:33'),
(23, 23, 35, 200, '2018-11-02', '2018-11-02 19:44:10', '2018-11-02 19:44:10'),
(24, 25, 40, 120, '2018-11-02', '2018-11-02 19:51:50', '2018-11-02 19:51:50'),
(25, 25, 40, 80, '2018-11-02', '2018-11-02 19:58:08', '2018-11-02 19:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `type` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `salary` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `phone`, `gender`, `type`, `shift`, `salary`, `created_at`, `updated_at`) VALUES
(18, 'murow ayaan', 907886611, 'female', 'cashier', 'full-time', 300, '2018-10-10 16:20:53', '2018-10-24 15:43:13'),
(19, 'aasha', 90984757, 'female', 'caisher', 'full-time', 200, '2018-10-10 18:57:23', '2018-10-10 17:01:59'),
(20, 'MUSTAFE', 9878768, 'male', 'CLEANER', 'morning', 900, '2018-10-10 20:02:41', '2018-10-24 15:10:18'),
(21, 'muu', 85679858, 'male', 'caisheir', 'full-time', 78, '2018-10-10 20:06:08', '2018-10-24 15:09:50'),
(22, 'nimco maxamuud', 343432, 'female', 'reception', 'full-time', 600, '2018-10-29 11:19:05', '2018-10-29 13:42:12'),
(23, 'cali maxamed', 456454646, 'male', 'cashier', 'afternoon', 300, '2018-10-29 11:27:38', '2018-10-29 13:41:18'),
(25, 'cabdi axmed', 5456456, 'male', 'manager', 'full-time', 400, '2018-10-29 16:30:25', '2018-10-30 14:32:41'),
(26, 'test employe', 654554, 'male', 'cashier', 'full-time', 350, '2018-11-03 03:02:47', '2018-11-03 03:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `picture` varchar(400) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mustafe faarax', 'admin', '$2y$10$EVVruw2XoSAZ31scHXh8UeI9xcC9kH1R.os0OS8xt0rbuOD12Qwbe', 'admin@gmail.com', '+252907701622', 'uploads/user.jpg', 1, '2018-07-25 05:24:30', '2018-11-03 02:56:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_id` (`room_no`),
  ADD KEY `fk_guest_id` (`guest_id`);

--
-- Indexes for table `check_trn`
--
ALTER TABLE `check_trn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_guest_id_ckech` (`guest_id`),
  ADD KEY `fk_check_id_check` (`check_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_daily`
--
ALTER TABLE `exp_daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guarantee`
--
ALTER TABLE `guarantee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gust_id` (`guest_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medium`
--
ALTER TABLE `medium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_check_id` (`check_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_staff_id` (`staff_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_id` (`type_id`),
  ADD KEY `fk_floor_id` (`floor_id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_activity`
--
ALTER TABLE `salary_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stuff_id_salary` (`staff_id`),
  ADD KEY `pk_payroll_id` (`payroll_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
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
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `check_trn`
--
ALTER TABLE `check_trn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exp_daily`
--
ALTER TABLE `exp_daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guarantee`
--
ALTER TABLE `guarantee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medium`
--
ALTER TABLE `medium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary_activity`
--
ALTER TABLE `salary_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `fk_guest_id` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`room_no`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `check_trn`
--
ALTER TABLE `check_trn`
  ADD CONSTRAINT `fk_check_id_check` FOREIGN KEY (`check_id`) REFERENCES `checkin` (`id`),
  ADD CONSTRAINT `fk_guest_id_ckech` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guarantee`
--
ALTER TABLE `guarantee`
  ADD CONSTRAINT `fk_gust_id` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_floor_id` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `roomtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
