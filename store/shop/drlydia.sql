-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2023 at 09:26 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `drlydia`
--
CREATE DATABASE IF NOT EXISTS `drlydia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `drlydia`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(30) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `pin` text NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `generated_password` text NOT NULL,
  `balance` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '2aff11a7da66af3f7408d5e000873a29', '2017-01-24 16:21:18', '20-08-2023 01:52:17 AM');

-- --------------------------------------------------------

--
-- Table structure for table `adminwallet`
--

CREATE TABLE IF NOT EXISTS `adminwallet` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminwallet`
--

INSERT INTO `adminwallet` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `announcement` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `samary` text CHARACTER SET utf8,
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `topic` text CHARACTER SET utf8,
  `tdate` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `tauther` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `malaf` varchar(200) CHARACTER SET utf8 NOT NULL DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `samary`, `category`, `topic`, `tdate`, `tauther`, `malaf`) VALUES
(1, 'عنوان الموضوع', 'images.jpg', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-05', 'demian', ''),
(9, 'عنوان الموضوع', 'download (1).jpg', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-21', 'ahmed', 'قانون المشروعات االمتوسطة والصغيرة والمتناهية الصغر.pdf'),
(11, 'عنوان الموضوع', 'اعلان التاجير.jpg', 'ملخص المقال هنا', 'موضوع رئيسي', '<p>نص المقال</p>', '2023-07-21', 'ahmed', 'اعلان التاجير.jpg'),
(2, 'عنوان الموضوع', 'images (14).jpeg', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-05', 'demian', 'قانون رقم 30 لسنة 23.pdf'),
(3, 'عنوان الموضوع', 'images (14).jpeg', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-05', 'demian', 'FB_IMG_1689025488609.jpg'),
(4, 'عنوان الموضوع', 'الضرائب.jpg', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-05', 'demian', 'قانون رقم 30 لسنة 23.pdf'),
(5, 'عنوان الموضوع', 'download.png', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-05', 'demian', 'Law no. 133 for 1951.pdf'),
(10, 'عنوان الموضوع', 'download.jpg', 'ملخص المقال', 'موضوع رئيسي', 'نص المقال', '2023-07-21', 'ahmed', 'اللائحة التنفيذية لقانون المشروعات االمتوسطة والصغيرة والمتناهية الصغر.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `image` varchar(250) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `image`, `creationDate`, `updationDate`) VALUES
(1, 'الأدوية', NULL, 'Frame-2506_1681035707.jpg', '2023-10-19 15:53:45', NULL),
(2, 'العناية بالشعر', NULL, 'Frame-2458_1667482658.jpg', '2023-10-19 15:55:59', NULL),
(3, 'العناية بالبشرة', NULL, 'Frame-2457-1_1679493245.jpg', '2023-10-19 15:56:39', NULL),
(4, 'العناية اليومية', NULL, 'Daily-Essential-Now-_1690384279.jpg', '2023-10-19 15:57:45', NULL),
(5, 'الأم والطفل', NULL, 'Frame-2457-3_1667483217.jpg', '2023-10-19 15:59:24', NULL),
(6, 'المكياج و الاكسسوارات', NULL, 'Frame-2457-4_1667482979.jpg', '2023-10-19 15:59:42', NULL),
(7, 'المستلزمات الطبية', NULL, 'Frame-2458-1_1667483491.jpg', '2023-10-19 16:00:31', NULL),
(8, 'الفيتامينات والمكملات', NULL, 'Vitamins-Now-_1690384303.jpg', '2023-10-19 16:01:29', NULL),
(9, 'الصحة الجنسية', NULL, 'Frame-2457-6_1667486551.jpg', '2023-10-19 16:04:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categoryat`
--

CREATE TABLE IF NOT EXISTS `categoryat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'admin', 'admin', 'Adel', 'Kamal');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_type` varchar(255) DEFAULT NULL,
  `grad_img` varchar(255) DEFAULT NULL,
  `per_img` varchar(255) DEFAULT NULL,
  `aname` varchar(255) DEFAULT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `grad_date` date DEFAULT NULL,
  `grad_place` varchar(255) DEFAULT NULL,
  `id_card` bigint(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `member_activity` varchar(255) DEFAULT NULL,
  `sub_syndicate` int(11) DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `payment_no` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `twon` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=293 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_type`, `grad_img`, `per_img`, `aname`, `bname`, `cname`, `dname`, `grad_date`, `grad_place`, `id_card`, `address`, `work_place`, `mail`, `phone`, `mobile`, `member_activity`, `sub_syndicate`, `bank`, `payment_no`, `password`, `username`, `active`, `create_date`, `edit_date`, `create_by`, `edit_by`, `deleted`, `twon`) VALUES
(1, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M1', NULL, NULL, NULL, '2023-03-04', NULL, NULL, '1', '1', 'M1@gmail.com', '1', '1', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-03-04', '2023-03-04 11:09:55', 0, NULL, 0, NULL),
(2, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M2', NULL, NULL, NULL, '2023-03-04', NULL, 2, '2', '2', 'M2@gmail.com', '2', '2', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-03-04', '2023-03-04 11:08:15', 0, NULL, 0, NULL),
(3, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M3', NULL, NULL, NULL, '2023-03-04', NULL, 3, '3', '3', 'M@gmail.com', '3', '3', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-03-04', '2023-03-04 11:07:40', 0, NULL, 0, NULL),
(4, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M4', NULL, NULL, NULL, '2023-03-04', NULL, 4, '4', '4', 'M@gmail.com', '4', '4', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-03-04', '2023-03-04 11:08:07', 0, NULL, 0, NULL),
(5, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M5', NULL, NULL, NULL, '2023-03-04', NULL, 5, '5', '5', 'M@gmail.com', '5', '5', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-03-04', '2023-03-04 11:24:05', 0, NULL, 0, NULL),
(6, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M6', NULL, NULL, NULL, '2023-03-04', NULL, 6, '6', '6', 'M@gmail.com', '6', '6', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-03-04', '2023-03-04 12:19:06', 0, NULL, 0, NULL),
(7, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M7', NULL, NULL, NULL, '2023-03-04', NULL, 7, '7', '7', 'M@gmail.com', '7', '7', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-04', NULL, 0, NULL, 0, NULL),
(8, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M8', NULL, NULL, NULL, '2023-03-04', NULL, 8, '8', '8', 'M@gmail.com', '8', '8', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-04', NULL, NULL, NULL, 0, NULL),
(9, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M9', NULL, NULL, NULL, '2023-03-08', NULL, 9, '9', '9', 'M@gmail.com', '9', '9', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(10, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M10', NULL, NULL, NULL, '2023-03-08', NULL, 10, '10', '10', 'M@gmail.com', '10', '10', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(11, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M11', NULL, NULL, NULL, '2023-03-08', NULL, 11, '11', '11', 'M@gmail.com', '11', '11', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(12, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M12', NULL, NULL, NULL, '2023-03-08', NULL, 12, '12', '12', 'M@gmail.com', '12', '12', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(13, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M13', NULL, NULL, NULL, '2023-03-08', NULL, 13, '13', '13', 'M@gmail.com', '13', '13', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(14, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M14', NULL, NULL, NULL, '2023-03-08', NULL, 14, '14', '14', 'M@gmail.com', '14', '14', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(15, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M15', NULL, NULL, NULL, '2023-03-08', NULL, 15, '15', '15', 'M@gmail.com', '15', '15', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(16, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M16', NULL, NULL, NULL, '2023-03-08', NULL, 16, '16', '16', 'M@gmail.com', '16', '16', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(17, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M17', NULL, NULL, NULL, '2023-03-08', NULL, 17, '17', '17', 'M@gmail.com', '17', '17', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(18, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M18', NULL, NULL, NULL, '2023-03-08', NULL, 18, '18', '18', 'M@gmail.com', '18', '18', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(19, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M19', NULL, NULL, NULL, '2023-03-08', NULL, 19, '19', '19', 'M@gmail.com', '19', '19', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(20, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M20', NULL, NULL, NULL, '2023-03-08', NULL, 20, '20', '20', 'M@gmail.com', '0', '0', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(21, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M21', NULL, NULL, NULL, '2023-03-08', NULL, 0, '0', '0', 'M@gmail.com', '0', '0', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(22, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M22', NULL, NULL, NULL, '2023-03-08', NULL, 22, '22', '22', 'M@gmail.com', '22', '22', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(23, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M23', NULL, NULL, NULL, '2023-03-08', NULL, 23, '23', '23', 'M@gmail.com', '23', '23', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-08', NULL, 0, NULL, 0, NULL),
(24, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M24', NULL, NULL, NULL, '2023-03-11', NULL, 24, '24', '24', 'M@gmail.com', '24', '24', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 0, NULL, 0, NULL),
(25, 'خاص', 'WhatsApp Image 2023-02-09 at 3.54.30 PM.jpeg', 'WhatsApp Image 2023-02-09 at 3.54.33 PM.jpeg', 'M25', NULL, NULL, NULL, '2023-03-11', NULL, 2522552126552, 'كفر الشيخ', '1', 'M1@Yahoo.Com', '01025649666', '01259565223', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:00:16', 1, NULL, 0, NULL),
(26, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M26', NULL, NULL, NULL, '2023-03-11', NULL, 26, '26', '26', 'M@gmail.com', '26', '26', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 0, NULL, 0, NULL),
(27, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M27', NULL, NULL, NULL, '2023-03-11', NULL, 27, '27', '27', 'M@yahoo.com', '27', '27', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(28, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M28', NULL, NULL, NULL, '2023-03-11', NULL, 28, '28', '28', 'M@yahoo.com', '28', '28', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(29, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M29', NULL, NULL, NULL, '2023-03-11', NULL, 29, '29', '29', 'M@yahoo.com', '29', '29', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(30, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M30', NULL, NULL, NULL, '2023-03-11', NULL, 30, '30', '30', 'M@yahoo.com', '30', '30', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:36:21', 1, NULL, 0, NULL),
(31, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M31', NULL, NULL, NULL, '2023-03-11', NULL, 31, '31', '31', 'M@yahoo.com', '31', '31', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:36:34', 1, NULL, 0, NULL),
(32, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M32', NULL, NULL, NULL, '2023-03-11', NULL, 32, '32', '32', 'M@yahoo.com', '32', '32', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:36:53', 1, NULL, 0, NULL),
(33, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M33', NULL, NULL, NULL, '2023-03-11', NULL, 33, '33', '33', 'M@yahoo.com', '32', '32', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:37:50', 1, NULL, 0, NULL),
(34, NULL, 'Egyption_ID.jpg', 'profile.png', 'M33', NULL, NULL, NULL, '2023-03-11', NULL, 311654121, '33', '33', 'M@yahoo.com', '33', '33', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:44:32', 1, NULL, 0, NULL),
(35, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M34', NULL, NULL, NULL, '2023-03-11', NULL, 34, '34', '34', 'M@yahoo.com', '34', '34', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(36, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M35', NULL, NULL, NULL, '2023-03-11', NULL, 35, '35', '35', 'M@yahoo.com', '35', '35', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(37, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M37', NULL, NULL, NULL, '2023-03-11', NULL, 37, '37', '37', 'M@yahoo.com', '37', '37', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(38, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M38', NULL, NULL, NULL, '2023-03-11', NULL, 38, '38', '38', 'M@yahoo.com', '38', '38', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(39, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M39', NULL, NULL, NULL, '2023-03-11', NULL, 39, '39', '39', 'M@yahoo.com', '39', '39', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(40, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M40', NULL, NULL, NULL, '2023-03-11', NULL, 40, '40', '40', 'M@yahoo.com', '40', '40', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(41, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M41', NULL, NULL, NULL, '2023-03-11', NULL, 41, '41', '41', 'M@yahoo.com', '41', '41', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(42, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M42', NULL, NULL, NULL, '2023-03-11', NULL, 42, '42', '42', 'M@yahoo.com', '42', '42', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(43, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M43', NULL, NULL, NULL, '2023-03-11', NULL, 43, '43', '43', 'M@yahoo.com', '43', '43', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-03-11', '2023-03-11 06:44:14', 1, NULL, 0, NULL),
(44, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M44', NULL, NULL, NULL, '2023-03-11', NULL, 44, '44', '44', 'M@yahoo.com', '44', '44', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(45, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M45', NULL, NULL, NULL, '2023-03-11', NULL, 45, '45', '45', 'M@yahoo.com', '45', '45', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(46, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M46', NULL, NULL, NULL, '2023-03-11', NULL, 46, '46', '46', 'M@yahoo.com', '46', '46', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(47, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M47', NULL, NULL, NULL, '2023-03-11', NULL, 47, '47', '47', 'M@yahoo.com', '47', '47', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(48, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M48', NULL, NULL, NULL, '2023-03-11', NULL, 48, '48', '48', 'M@yahoo.com', '48', '48', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(49, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M49', NULL, NULL, NULL, '2023-03-11', NULL, 49, '49', '49', 'M@yahoo.com', '49', '49', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(50, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M50', NULL, NULL, NULL, '2023-03-11', NULL, 50, '50', '50', 'M@yahoo.com', '50', '50', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(51, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M51', NULL, NULL, NULL, '2023-03-11', NULL, 51, '51', '51', 'M@yahoo.com', '51', '51', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(52, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M52', NULL, NULL, NULL, '2023-03-11', NULL, 52, '52', '52', 'M@yahoo.com', '52', '52', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(53, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M53', NULL, NULL, NULL, '2023-03-11', NULL, 53, '53', '53', 'M@yahoo.com', '53', '53', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(54, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M54', NULL, NULL, NULL, '2023-03-11', NULL, 54, '54', '54', 'M@yahoo.com', '54', '54', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(55, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M55', NULL, NULL, NULL, '2023-03-11', NULL, 55, '55', '55', 'M@yahoo.com', '55', '55', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(56, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M56', NULL, NULL, NULL, '2023-03-11', NULL, 56, '56', '56', 'M@yahoo.com', '56', '56', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(57, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M57', NULL, NULL, NULL, '2023-03-11', NULL, 57, '57', '57', 'M@yahoo.com', '57', '57', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(58, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M58', NULL, NULL, NULL, '2023-03-11', NULL, 58, '58', '58', 'M@yahoo.com', '58', '58', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(59, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M59', NULL, NULL, NULL, '2023-03-11', NULL, 59, '59', '59', 'M@yahoo.com', '59', '59', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(60, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M60', NULL, NULL, NULL, '2023-03-11', NULL, 60, '60', '60', 'M@yahoo.com', '60', '60', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(61, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M61', NULL, NULL, NULL, '2023-03-11', NULL, 61, '61', '61', 'M@yahoo.com', '61', '61', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(62, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M62', NULL, NULL, NULL, '2023-03-11', NULL, 62, '62', '62', 'M@yahoo.com', '62', '62', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(63, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M63', NULL, NULL, NULL, '2023-03-11', NULL, 63, '63', '63', 'M@yahoo.com', '63', '63', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(64, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M64', NULL, NULL, NULL, '2023-03-11', NULL, 64, '64', '64', 'M@yahoo.com', '64', '64', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(65, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M65', NULL, NULL, NULL, '2023-03-11', NULL, 65, '65', '65', 'M@yahoo.com', '65', '65', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(66, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M66', NULL, NULL, NULL, '2023-03-11', NULL, 66, '66', '66', 'M@yahoo.com', '66', '66', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(67, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M67', NULL, NULL, NULL, '2023-03-11', NULL, 67, '67', '67', 'M@yahoo.com', '67', '67', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(68, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M68', NULL, NULL, NULL, '2023-03-11', NULL, 68, '68', '68', 'M@yahoo.com', '68', '68', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(69, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M69', NULL, NULL, NULL, '2023-03-11', NULL, 69, '69', '69', 'M@yahoo.com', '69', '69', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(70, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M70', NULL, NULL, NULL, '2023-03-11', NULL, 70, '70', '70', 'M@yahoo.com', '70', '70', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(71, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M71', NULL, NULL, NULL, '2023-03-11', NULL, 71, '71', '71', 'M@yahoo.com', '71', '71', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(72, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M72', NULL, NULL, NULL, '2023-03-11', NULL, 72, '72', '72', 'M@yahoo.com', '72', '72', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(73, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M73', NULL, NULL, NULL, '2023-03-11', NULL, 73, '73', '73', 'M@yahoo.com', '73', '73', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(74, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M74', NULL, NULL, NULL, '2023-03-11', NULL, 74, '74', '74', 'M@yahoo.com', '74', '74', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(75, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M75', NULL, NULL, NULL, '2023-03-11', NULL, 75, '75', '75', 'M@yahoo.com', '75', '75', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(76, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M76', NULL, NULL, NULL, '2023-03-11', NULL, 76, '76', '76', 'M@yahoo.com', '76', '76', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(77, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M77', NULL, NULL, NULL, '2023-03-11', NULL, 77, '77', '77', 'M@yahoo.com', '77', '77', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(78, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M78', NULL, NULL, NULL, '2023-03-11', NULL, 78, '78', '78', 'M@yahoo.com', '78', '78', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(79, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M79', NULL, NULL, NULL, '2023-03-11', NULL, 79, '79', '79', 'M@yahoo.com', '79', '79', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(80, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M80', NULL, NULL, NULL, '2023-03-11', NULL, 80, '80', '80', 'M@yahoo.com', '80', '80', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(81, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M81', NULL, NULL, NULL, '2023-03-11', NULL, 81, '81', '81', 'M@yahoo.com', '81', '81', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(82, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M82', NULL, NULL, NULL, '2023-03-11', NULL, 82, '82', '82', 'M@yahoo.com', '82', '82', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(83, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M83', NULL, NULL, NULL, '2023-03-11', NULL, 83, '83', '83', 'M@yahoo.com', '83', '83', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(84, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M84', NULL, NULL, NULL, '2023-03-11', NULL, 84, '84', '84', 'M@yahoo.com', '84', '84', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(85, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M85', NULL, NULL, NULL, '2023-03-11', NULL, 85, '85', '85', 'M@yahoo.com', '85', '85', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(86, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M86', NULL, NULL, NULL, '2023-03-11', NULL, 86, '86', '86', 'M@yahoo.com', '86', '86', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(87, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M87', NULL, NULL, NULL, '2023-03-11', NULL, 87, '87', '87', 'M@yahoo.com', '87', '87', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(88, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M88', NULL, NULL, NULL, '2023-03-11', NULL, 88, '88', '88', 'M@yahoo.com', '88', '88', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(89, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M89', NULL, NULL, NULL, '2023-03-11', NULL, 89, '89', '89', 'M@yahoo.com', '89', '89', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(90, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M90', NULL, NULL, NULL, '2023-03-11', NULL, 90, '90', '90', 'M@yahoo.com', '90', '90', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(91, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M91', NULL, NULL, NULL, '2023-03-11', NULL, 91, '91', '91', 'M@yahoo.com', '91', '91', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(92, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M92', NULL, NULL, NULL, '2023-03-11', NULL, 92, '92', '92', 'M@yahoo.com', '92', '92', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(93, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M93', NULL, NULL, NULL, '2023-03-11', NULL, 93, '93', '93', 'M@yahoo.com', '93', '93', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(94, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M94', NULL, NULL, NULL, '2023-03-11', NULL, 94, '94', '94', 'M@yahoo.com', '94', '94', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(95, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M95', NULL, NULL, NULL, '2023-03-11', NULL, 95, '95', '95', 'M@yahoo.com', '95', '95', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(96, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M96', NULL, NULL, NULL, '2023-03-11', NULL, 96, '96', '96', 'M@yahoo.com', '96', '96', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(97, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M97', NULL, NULL, NULL, '2023-03-11', NULL, 97, '97', '97', 'M@yahoo.com', '97', '97', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(98, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M98', NULL, NULL, NULL, '2023-03-11', NULL, 98, '98', '98', 'M@yahoo.com', '98', '98', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(99, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M99', NULL, NULL, NULL, '2023-03-11', NULL, 99, '99', '99', 'M@yahoo.com', '99', '99', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(100, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'M100', NULL, NULL, NULL, '2023-03-11', NULL, 100, '100', '100', 'M@yahoo.com', '100', '100', NULL, 1, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-11', NULL, 1, NULL, 0, NULL),
(101, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عمر محمود ابراهيم شبانة', NULL, NULL, NULL, '2023-03-23', NULL, NULL, 'الزهور عمارة 29', 'طالب', NULL, '0', '01010154113', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-04-07', '2023-05-14 08:30:09', 0, NULL, 0, NULL),
(102, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'كنزى ايهاب المحلاوى', NULL, NULL, NULL, '2023-04-02', NULL, NULL, 'النبوى المهندس', 'طالبة', NULL, '0', '01098707777', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-04-07', '2023-04-07 09:23:08', 0, NULL, 0, NULL),
(103, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'رزان محمد احمد نوح', NULL, NULL, NULL, '2023-03-12', NULL, NULL, 'تقسيم النيابة الادراية', 'طالبة', NULL, '0', '01026669070', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-07', NULL, 0, NULL, 0, NULL),
(104, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نهى احمد الصياد', NULL, NULL, NULL, '2023-03-27', NULL, 289123041500128, 'شارع الجزائر - تقسيم 2 - كفرالشيخ', '0', NULL, '0', '01009563604', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-07', NULL, 0, NULL, 0, NULL),
(105, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ياسمين هلال', NULL, NULL, NULL, '2023-04-07', NULL, 105, 'سخا - كفرالشيخ', '0', NULL, '0', '01010272767', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-07', NULL, 0, NULL, 0, NULL),
(106, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'روان محمد عبد الحميد', NULL, NULL, NULL, '2023-03-27', NULL, 106, 'سخا - كفرالشيخ', '0', NULL, '0', '01050001163', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-07', NULL, 0, NULL, 0, NULL),
(107, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نسمة ممدوح محمود', NULL, NULL, NULL, '2023-03-27', NULL, 107, 'سخا كفرالشيخ', '0', NULL, '0', '01000287655', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-07', NULL, 0, NULL, 0, NULL),
(108, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نعمه عبيد عبد الفتاح', NULL, NULL, NULL, '2023-03-28', NULL, 30409131501285, 'ابراج المحافظة - كفرالشيخ', '0', NULL, '0', '01016873535', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-04-07', '2023-04-07 09:33:36', 0, NULL, 0, NULL),
(109, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'خلود عبد الله سيف الاسلام', NULL, NULL, NULL, '2023-04-06', NULL, 109, 'المحاربين الجديدة - كفرالشيخ', '0', NULL, '0', '01024468868', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-04-07', '2023-04-07 09:39:10', 0, NULL, 0, NULL),
(110, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'غادة بدر غانم', NULL, NULL, NULL, '2023-04-06', NULL, 110, 'النبوى المهندس - كفرالشيخ', 'ربة منزل', NULL, '0', '01099100038', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-07', NULL, 0, NULL, 0, NULL),
(111, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'امينة سعد الشوادفى الدكرورى', NULL, NULL, NULL, '2023-04-09', NULL, 3160326, 'النبوى المهندس - كفرالشيخ', 'طالبة', NULL, '0', '01093578618', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-04-09', NULL, 0, NULL, 0, NULL),
(112, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اميره عبدالله عبدالعاطي', NULL, NULL, NULL, '2023-04-13', NULL, NULL, 'كفرالشيخ', 'مدرسه رياض اطفال', NULL, '01009224904', '01009224904', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-04-14', '2023-04-14 10:02:50', 0, NULL, 0, NULL),
(113, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نيره مصطفى رزق', NULL, NULL, NULL, '2023-05-02', NULL, 27509161500064, 'تقسيم زهدى شارع الدلتا برج فينسيا', 'معلمه', NULL, '0', '01067694042', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-02', NULL, 0, NULL, 0, NULL),
(114, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مروة على عبد الواحد', NULL, NULL, NULL, '2023-05-02', NULL, 114, 'شارع مستشفى الزهراء - كفرالشيخ', '0', 'marwa@yahoo.com', '0', '01061010119', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-02', NULL, 0, NULL, 0, NULL),
(115, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عمر عبد الحفيظ شاكر', NULL, NULL, NULL, '2023-05-01', NULL, 115, 'تقسيم 2 - كفرالشيخ', 'طالب', 'omr@yahoo.com', '0', '01096906622', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-02', NULL, 0, NULL, 0, NULL),
(116, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'منير احمد جاد', NULL, NULL, NULL, '2023-05-04', NULL, 29306101500706, 'كفر الشيخ المستشفى العام', 'طالب', NULL, '0', '01008692763', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-04', '2023-05-04 04:31:22', 0, NULL, 0, NULL),
(117, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'كنده احمد سعد', NULL, NULL, NULL, '2023-05-04', NULL, NULL, 'كفر الشيخ تقسيم الشرطه', 'طالب', NULL, '0', '01069939323', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-04', '2023-05-04 04:31:09', 0, NULL, 0, NULL),
(118, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مروان احمد سعد', NULL, NULL, NULL, '2023-05-04', NULL, NULL, 'كفر الشيخ تقسيم الشرطه', 'طالب', NULL, '0', '01069939323', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-04', '2023-05-04 04:30:36', 0, NULL, 0, NULL),
(119, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'احمد ياسر مبروك', NULL, NULL, NULL, '2023-05-04', NULL, 29305011500468, 'كفر الشيخ الاوقاف', 'طالب', NULL, '0', '01008388293', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-04', '2023-05-04 04:31:31', 0, NULL, 0, NULL),
(120, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مليكه احمد المعراج', NULL, NULL, NULL, '2023-05-04', NULL, 29012141500063, 'النبوى المهندس - كفرالشيخ', 'طالب', NULL, '0', '01009342138', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-04', '2023-05-04 04:31:51', 0, NULL, 0, NULL),
(121, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فيروز فتحى شحاته', NULL, NULL, NULL, '2023-05-04', NULL, 27807200202361, 'كفر الشيخ تقسيم الشرطه', 'ربه منزل', NULL, '0', '010033005543', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-04', NULL, 0, NULL, 0, NULL),
(122, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'يسرا هيثم عبده زكريا', NULL, NULL, NULL, '2023-05-07', NULL, 28108011500537, 'كفر الشيخ تقسيم الشرطه', 'طالبه', NULL, '0', '01552262226', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-07', NULL, 0, NULL, 0, NULL),
(123, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نور حاتم عبد الحليم الغنام', NULL, NULL, NULL, '2023-05-07', NULL, 28407291500712, 'كفر الشيخ الحاربين القدماء', 'طالبه', NULL, '0', '01000543027', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-07', NULL, 0, NULL, 0, NULL),
(124, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'محمد حاتم عبد الحليم الغنام', NULL, NULL, NULL, '2023-05-07', NULL, NULL, 'كفر الشيخ المحاربين القدماء', 'طالب', NULL, '0', '01092692521', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-07', NULL, 0, NULL, 0, NULL),
(125, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'تالا احمد المعراج', NULL, NULL, NULL, '2023-05-07', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '0', '01009342138', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-07', NULL, 0, NULL, 0, NULL),
(126, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ورود فاروق العزبى', NULL, NULL, NULL, '2023-05-07', NULL, NULL, 'كفر الشيخ', 'موظفه', NULL, '0', '01091963177', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-07', '2023-05-14 08:10:47', 0, NULL, 0, NULL),
(127, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'بتول عز الدين محمد', NULL, NULL, NULL, '2023-05-11', NULL, 28305171500169, 'كقر الشيخ الخليفه', 'طالبه', NULL, '0', '01095584305', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-11', '2023-05-11 08:11:42', 0, NULL, 0, NULL),
(128, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شيماء حسن بدر الدين', NULL, NULL, NULL, '2023-05-13', NULL, NULL, 'كفر الشيخ الاستاد', 'موظفه', NULL, '0', '01091170515', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-13', NULL, 0, NULL, 0, NULL),
(129, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عبد المالك اسامة', NULL, NULL, NULL, '2023-05-14', NULL, 128, 'شارع المصنع - كفرالشيخ', 'طالبة', NULL, '0', '01125968688', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-14', NULL, 0, NULL, 0, NULL),
(130, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ايمان صلاح المنطاوى', NULL, NULL, NULL, '2023-05-14', NULL, 129, 'سخا - كفرالشيخ', 'طبيبة', NULL, '0', '01127336632', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-14', '2023-06-02 10:56:03', 0, NULL, 0, NULL),
(131, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسراء سعد ابو شعيشع', NULL, NULL, NULL, '2023-05-16', NULL, NULL, 'كفر الشيخ  تقسيم الضرايب', 'موظفه', NULL, '0', '0113864000', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-16', NULL, 0, NULL, 0, NULL),
(132, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عمر محمد ناجى عطيه', NULL, NULL, NULL, '2023-05-16', NULL, NULL, 'كفر الشيخ ابراج مبارك', 'طالب', NULL, '0', '01062193954', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-16', '2023-05-17 04:53:59', 0, NULL, 0, NULL),
(133, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فاطمه محمد ناجي عطيه', NULL, NULL, NULL, '2023-05-16', NULL, NULL, 'كفر الشيخ ابراج مبارك', 'طالبه', NULL, '0', '01062193954', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-16', NULL, 0, NULL, 0, NULL),
(134, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عزيزه ربيع محمد غازى', NULL, NULL, NULL, '2023-05-18', NULL, 134, 'ابراج الصيانة - كفرالشيخ', 'معلمة', NULL, '0', '01017440747', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-18', NULL, 0, NULL, 0, NULL),
(135, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اميرة ابراهيم فتح الله', NULL, NULL, NULL, '2023-05-18', NULL, 135, 'حى الاطباء', '0', NULL, '0', '01012589751', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(136, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جهاد محمد محمود غانم', NULL, NULL, NULL, '2023-05-19', NULL, 136, 'كفرالشيخ', '0', NULL, '0', '01011999890', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(137, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'امانى سعد', NULL, NULL, NULL, '2023-05-19', NULL, 137, 'كفرالشيخ', '0', NULL, '0', '01026273626', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(138, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'منى السيد اسماعيل', NULL, NULL, NULL, '2023-05-19', NULL, 138, 'كفرالشيخ', '0', NULL, '0', '01022723449', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(139, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ساره احمد امام', NULL, NULL, NULL, '2023-05-19', NULL, 139, 'كفرالشيخ', 'Banker', NULL, '0', '01090440512', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(140, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اميره عيد المغازى', NULL, NULL, NULL, '2023-05-19', NULL, 140, 'ش اضرائب - كفرالشيخ', '0', NULL, '0', '01065554665', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(141, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شريهان بسيونى عبده', NULL, NULL, NULL, '2023-05-19', NULL, 141, 'الخليفة المأمون', '0', NULL, '0', '01000144845', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-19', NULL, 0, NULL, 0, NULL),
(142, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اروى ماجد ابراهيم الحايس', NULL, NULL, NULL, '2023-05-21', NULL, NULL, 'كفر الشيخ تقسيم 2', 'طالبه', NULL, '0', '01069993406', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-21', '2023-05-21 03:26:27', 0, NULL, 0, NULL),
(143, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هنا محمد المزين', NULL, NULL, NULL, '2023-05-21', NULL, NULL, 'كفر الشيخ ال47', 'طالبه', NULL, '0', '01008663795', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-21', '2023-05-21 03:26:35', 0, NULL, 0, NULL),
(144, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'امل احمد البرعي', NULL, NULL, NULL, '2023-05-21', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '0', '01066218224', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-21', '2023-05-21 03:26:46', 0, NULL, 0, NULL),
(145, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حورية طه عبد الرؤوف', NULL, NULL, NULL, '2023-05-22', NULL, 145, 'بيلا - كفرالشيخ', 'اخصائية علاج طبيعى', NULL, '0', '01062665656', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-22', NULL, 0, NULL, 0, NULL),
(146, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حبيبة محمد حسن نصر', NULL, NULL, NULL, '2023-05-21', NULL, 146, 'بيلا - كفرالشيخ', 'طالبة', NULL, '0', '01062665656', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-22', NULL, 0, NULL, 0, NULL),
(147, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ماليكا محمد حسن نصر', NULL, NULL, NULL, '2023-05-21', NULL, 147, 'بيلا - كفرالشيخ', 'طالبة', NULL, '0', '01062665656', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-22', NULL, 0, NULL, 0, NULL),
(148, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'دينا عصام زيدان', NULL, NULL, NULL, '2023-05-21', NULL, 148, 'الخليفة المأمون - كفرالشيخ', 'طبيبة اسنان', NULL, '0', '01069993406', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-22', NULL, 0, NULL, 0, NULL),
(149, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'رودينا محمد حسين اللوانى', NULL, NULL, NULL, '2023-05-23', NULL, 149, 'ابراج الربيع - كفرالشيخ', 'طالبة', NULL, '0', '01067456814', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-23', NULL, 0, NULL, 0, NULL),
(150, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ملك مصطفى سامى', NULL, NULL, NULL, '2023-05-23', NULL, 150, 'المحاربين القديمة - كفرالشيخ', 'طالبة', NULL, '0', '01011354356', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-23', NULL, 0, NULL, 0, NULL),
(151, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ملك احمد كمال ابراهيم', NULL, NULL, NULL, '2023-05-23', NULL, 151, 'تقسيم 4 - كفرالشيخ', 'طالبة', NULL, '0', '01091293241', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-23', NULL, 0, NULL, 0, NULL),
(152, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حلا احمد حسن حنفى', NULL, NULL, NULL, '2023-05-24', NULL, 1, 'امام مستشفى الزهراء برج المرام', 'طالبه', NULL, '0', '01005780213', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-24', NULL, 0, NULL, 0, NULL),
(153, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هاجر محمد عبد المجيد العيسوى', NULL, NULL, NULL, '2023-05-25', NULL, 29102231500207, 'برج فينسيا كفرالشيخ', 'صيدلانية', NULL, '0', '01025350193', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-25', NULL, NULL, NULL, 0, NULL),
(154, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هاله نشات احمد زايد', NULL, NULL, NULL, '2023-05-26', NULL, 12345, 'كفر الشيخ شارع الضرائب', 'دكتوره', NULL, '01010199595', '01010199595', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-26', NULL, 0, NULL, 0, NULL),
(155, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'منى ابو زيد السعيد', NULL, NULL, NULL, '2023-05-26', NULL, 4444, 'الصوالحه', 'ربه منزل', NULL, '01021527215', '01021527215', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-26', NULL, NULL, NULL, 0, NULL),
(156, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جنى عبد الرحمن بسيونى', NULL, NULL, NULL, '2023-05-26', NULL, 1111, 'كفر الشيخ', 'طالبه', NULL, '01022723449', '01022723449', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-26', NULL, 0, NULL, 0, NULL),
(157, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'يحيى محمد عبد السلام', NULL, NULL, NULL, NULL, NULL, 157, 'ش الضرائب كفر الشيخ ', 'طالب', NULL, '01558889699', '01010494008', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-26', '2023-06-02 09:11:51', 0, NULL, 0, NULL),
(158, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مرام اشرف حسين حماد', NULL, NULL, NULL, '2023-05-27', NULL, 158, 'كفرالشيخ', 'صيدلانية', NULL, '0', '01007508020', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-27', NULL, 0, NULL, 0, NULL),
(159, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'تقى محمد الباز', NULL, NULL, NULL, '2023-05-27', NULL, 159, 'شارع جيهان - كفرالشيخ', 'طالبة', NULL, '0', '01029113325', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-27', '2023-05-27 04:01:12', 0, NULL, 0, NULL),
(160, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اياد محمد الباز', NULL, NULL, NULL, '2023-05-27', NULL, 160, 'شارع جيهان - كفرالشيخ', 'طالب', NULL, '0', '01029113325', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-27', '2023-05-27 04:01:22', 0, NULL, 0, NULL),
(161, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'احمد اشرف دحدوح', NULL, NULL, NULL, '2023-05-28', NULL, 888, 'شارع الضرائب', 'طفل', NULL, '01063132378', '01063132378', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-28', NULL, 0, NULL, 0, NULL),
(162, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ميرنا طه ذكى السيد ', NULL, NULL, NULL, '2023-05-28', NULL, NULL, 'كفر الشيخ', 'طفل', NULL, '01114442610', '01114442610', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-28', NULL, 0, NULL, 0, NULL),
(163, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مريم طه ذكى السيد', NULL, NULL, NULL, '2023-05-28', NULL, NULL, 'كفر الشيخ', 'طفل', NULL, '01114442610', '01114442610', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-28', NULL, 0, NULL, 0, NULL),
(164, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ادم محمود بشته', NULL, NULL, NULL, '2023-05-28', NULL, NULL, 'الخليفه المامون', 'طفل', NULL, '01008661215', '01008661215', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-28', NULL, 0, NULL, 0, NULL),
(165, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جنى محمود بشته', NULL, NULL, NULL, '2023-05-28', NULL, NULL, 'كفر الشيخ', 'طفل', NULL, '01015458656', '01015458656', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-28', '2023-05-28 02:58:36', 0, NULL, 0, NULL),
(166, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شيماء مصطفى محمد الخياط ', NULL, NULL, NULL, '2023-05-28', NULL, NULL, 'كفر الشيخ امام التربيه النوعيه', 'ربه منزل', NULL, '01026622149', '01026622149', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-28', NULL, 0, NULL, 0, NULL),
(167, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نورين احمد سليمان', NULL, NULL, NULL, '2023-05-28', NULL, NULL, 'كفر الشيخ امام التربيه النوعيه', 'طفل', NULL, '01026622149', '01026622149', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-28', NULL, 0, NULL, 0, NULL),
(168, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جورى عمرو الشناوى', NULL, NULL, NULL, '2023-05-29', NULL, NULL, 'تقسيم 2 شارع تونس', 'طفل', NULL, '01008383203', '01008383203', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-29', NULL, 0, NULL, 0, NULL),
(169, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نوران حسين صقر ', NULL, NULL, NULL, '2023-05-31', NULL, NULL, 'كفر الشيخ', 'صاحبه اكاديميه صقر', NULL, '01030784793', '01030784793', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-31', NULL, 0, NULL, 0, NULL),
(170, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسراء طلبه محمد احمد سالم', NULL, NULL, NULL, '2023-05-31', NULL, NULL, 'تقسيم 2 شارع المصنع', 'ربه منزل', NULL, '01122872187', '01122872187', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-31', NULL, 0, NULL, 0, NULL),
(171, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'علياء عمرعبد الحميد عبيد', NULL, NULL, NULL, '2023-05-31', NULL, NULL, 'الغرايب الجديده', 'ربه منزل', NULL, '01018038226', '01018038226', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-05-31', '2023-06-06 06:57:19', 0, NULL, 0, NULL),
(172, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جنى مصطفى حسن الدلال ', NULL, NULL, NULL, '2023-05-31', NULL, NULL, 'الضرائب الجديده', 'ربه منزل', NULL, '01013936769', '01013936769', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-05-31', NULL, 0, NULL, 0, NULL),
(173, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حمزة محمد سمير عمر', NULL, NULL, NULL, '2023-06-01', NULL, 173, 'الخليفة المأمون كفرالشيخ', 'طالب', NULL, '0', '01098834423', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-06-02', '2023-06-02 09:18:13', 0, NULL, 0, NULL),
(174, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هاله مصباح عقل', NULL, NULL, NULL, '2023-06-01', NULL, 2850201901500343, 'ش ال 47 لاعمارة كفرالشيخ', 'معلمة', NULL, '0', '01093898617', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-02', NULL, 0, NULL, 0, NULL),
(175, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ايمان نجم الدين محمد بركات', NULL, NULL, NULL, '2023-06-01', NULL, 30603031500363, 'النبوى المهندس كفرالشيخ', 'طالبة', NULL, '0', '01032616446', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-02', NULL, 0, NULL, 0, NULL),
(176, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'غادة محمد عبد الفتاح فايد', NULL, NULL, NULL, '2023-06-01', NULL, 176, 'ال47 عمارة كفرالشيخ', 'صيدلانية', NULL, '0', '01159142898', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-02', NULL, 0, NULL, 0, NULL),
(177, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حبيبة عصام ابراهيم', NULL, NULL, NULL, '2023-06-01', NULL, 177, 'ابراج الصيانة كفرالشيخ', 'طالبة', NULL, '0', '01017440747', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-02', NULL, 0, NULL, 0, NULL),
(178, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'غاده عزت زهران', NULL, NULL, NULL, '2023-06-02', NULL, 2760301500128, 'كفر الشيخ', 'استاذ جامعي', NULL, '01279171079', '01279171079', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-02', NULL, NULL, NULL, 0, NULL),
(179, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مى عبد الرحمن هراس', NULL, NULL, NULL, '2023-06-04', NULL, NULL, 'كفر الشيخ الخليفه', 'مدرس بكليه تربيه نوعيه', NULL, '01010443385', '01010443385', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-04', NULL, 0, NULL, 0, NULL),
(180, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سماح السيد احمد', NULL, NULL, NULL, '2023-06-04', NULL, NULL, 'كفر الشيخ الخليفه', 'ربه منزل', NULL, '01016748836', '01016748836', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-04', NULL, 0, NULL, 0, NULL),
(181, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'خلود محمد ابراهيم', NULL, NULL, NULL, '2023-06-04', NULL, NULL, 'كفر الشيخ الخليفه', 'طالبه', NULL, '01016748836', '01016748836', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-04', NULL, 0, NULL, 0, NULL),
(182, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ثناء رسمى دايم', NULL, NULL, NULL, '2023-06-04', NULL, NULL, 'تقسيم الضرائب', 'صيدلانيه ', NULL, '01028213148', '01028213148', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-04', NULL, 0, NULL, 0, NULL);
INSERT INTO `members` (`id`, `member_type`, `grad_img`, `per_img`, `aname`, `bname`, `cname`, `dname`, `grad_date`, `grad_place`, `id_card`, `address`, `work_place`, `mail`, `phone`, `mobile`, `member_activity`, `sub_syndicate`, `bank`, `payment_no`, `password`, `username`, `active`, `create_date`, `edit_date`, `create_by`, `edit_by`, `deleted`, `twon`) VALUES
(183, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسراء عبد السند على عبد الخاطر', NULL, NULL, NULL, '2023-06-05', NULL, 28703208800228, 'كفر الشيخ طريق صبرى القاضي', 'ربه منزل', NULL, '01005333144', '01005333144', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-05', NULL, NULL, NULL, 0, NULL),
(184, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'دينا عبد السند على عبد الخاطر', NULL, NULL, NULL, '2023-06-05', NULL, 2860407880087, 'كفر الشيخ تقسيم 2', 'ربه منزل', NULL, '01068602821', '01068602821', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-05', NULL, NULL, NULL, 0, NULL),
(185, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مروه سعد الله محمد صالح ', NULL, NULL, NULL, '2023-06-05', NULL, 28408301500062, 'المحاربين الجديده', 'صيدلانيه', NULL, '01099229973', '01099229973', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-05', NULL, NULL, NULL, 0, NULL),
(186, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اثار عبد العاطى محمد', NULL, NULL, NULL, '2023-06-05', NULL, NULL, 'كفر الشيخ ابراج الربيع', 'طبيب جراح عام', NULL, '01224545634', '01224545634', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-05', NULL, NULL, NULL, 0, NULL),
(187, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نورهان صبرى سلامه محمد', NULL, NULL, NULL, '2023-06-05', NULL, NULL, 'ابراج الجبالى ', 'محاميه', NULL, '01090222192', '01090222192', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-05', NULL, NULL, NULL, 0, NULL),
(188, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'دميان مرقص', NULL, NULL, NULL, '2023-06-05', NULL, 28101091200038, 'بيلا', 'ceo up co.', 'dr.demianmorcos@gmail.com', '0473606158', '01005468353', NULL, 1, NULL, NULL, NULL, NULL, 1, '2023-06-05', '2023-06-05 01:57:35', 0, NULL, 0, NULL),
(189, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هاجر هانى عبد الحافظ', NULL, NULL, NULL, '2023-06-05', NULL, NULL, 'كفر الشيخ شارع جيهان', 'طالبه', NULL, '01029254948', '01029254948', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-05', NULL, 0, NULL, 0, NULL),
(190, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'احلام سامى جلال', NULL, NULL, NULL, '2023-06-06', NULL, NULL, 'شارع النبوى المهندس', 'طالبه', NULL, '01001147148', '01001147148', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-06', NULL, 0, NULL, 0, NULL),
(191, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ميرنا احمد كمال الزواوى', NULL, NULL, NULL, '2023-06-06', NULL, NULL, 'تقسيم 4 شارع جيهان ', 'طالبه', NULL, '01015091087', '01015091087', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-06', NULL, 0, NULL, 0, NULL),
(192, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سما ناصر محمد على', NULL, NULL, NULL, '2023-06-06', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01092557431', '01092557431', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-06', NULL, 0, NULL, 0, NULL),
(193, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فاتن فوزي محمد', NULL, NULL, NULL, '2023-06-06', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01030582820', '01030582820', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-06-06', '2023-06-08 04:03:17', 0, NULL, 0, NULL),
(194, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مروه احمد المعاندى', NULL, NULL, NULL, '2023-06-08', NULL, 2880071602685, 'كفر الشيخ اول سكه روينه', 'طبيبه', NULL, '01098185214', '01098185214', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-08', NULL, 0, NULL, 0, NULL),
(195, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سماح حلمى السعدنى', NULL, NULL, NULL, '2023-06-08', NULL, NULL, 'كفر الشيخ تقسيم النيابه العامه', 'طبيبه', NULL, '01022773937', '01022773937', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-08', NULL, 0, NULL, 0, NULL),
(196, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ادم احمد كارم', NULL, NULL, NULL, '2023-06-08', NULL, NULL, 'المدينه الصناعيه', 'طفل', NULL, '01000860664', '01000860664', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-08', NULL, 0, NULL, 0, NULL),
(197, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'رنا كمال المغازى', NULL, NULL, NULL, '2023-06-08', NULL, NULL, 'كفر الشيخ تقسيم قضايا الدوله', 'ربه منزل', NULL, '01068181630', '01068181630', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-08', NULL, 0, NULL, 0, NULL),
(198, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسماء احمد محمد درويش هيكل', NULL, NULL, NULL, '2023-06-08', NULL, NULL, 'كفر الشيخ', 'اعمال حره', NULL, '01061301314', '01061301314', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-08', NULL, 0, NULL, 0, NULL),
(199, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ادهم احمد عبد العزيز', NULL, NULL, NULL, '2023-06-08', NULL, NULL, 'كفر الشيخ', 'طالب', NULL, '01061301314', '01061301314', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-08', NULL, 0, NULL, 0, NULL),
(200, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سمر احمد محمد عبد الغفار', NULL, NULL, NULL, '2023-06-09', NULL, 29108251500287, 'برج الكوثر امام مستشفى الرمد', 'ربة منزل', NULL, '0', '01094777604', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-06-10', '2023-07-02 06:28:42', 0, NULL, 0, NULL),
(201, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سارة احمد محمد عبد الغفار', NULL, NULL, NULL, '2023-06-09', NULL, 28601091500085, 'برج الكوثر امام مستشفى الرمد', 'ربة منزل', NULL, '0', '01020737607', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-06-10', '2023-07-02 06:29:06', 0, NULL, 0, NULL),
(202, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سما ناصر احمد', NULL, NULL, NULL, '2023-06-09', NULL, 202, 'كفرالشيخ', 'طالبة', NULL, '01061668263', '01021527215', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(203, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'الما اكرم محمد', NULL, NULL, NULL, '2023-06-09', NULL, 203, 'كفرالشيخ', 'طالبة', NULL, '0', '01012294742', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(204, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'لمار عبد العزيز بكر', NULL, NULL, NULL, '2023-06-09', NULL, 204, 'الخليفة المأمون', 'طالبة', NULL, '0', '01000253325', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(205, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فرح حسام الصفطاوى', NULL, NULL, NULL, '2023-06-09', NULL, 205, 'الخليفة المأمون', 'طالبة', NULL, '0', '0120350560', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(206, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جودى سعيد مراد', NULL, NULL, NULL, '2023-06-09', NULL, 206, 'سكة روينه كفالشيخ', 'طالبة', NULL, '0', '01000201254', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(207, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ريماس احمد محمد حسب الله', NULL, NULL, NULL, '2023-06-09', NULL, 207, 'تقسيم 4 كفرالشيخ', 'طالبة', NULL, '0', '01069420948', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(208, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نورين حاتم ابراهيم', NULL, NULL, NULL, '2023-06-09', NULL, 208, 'تقسيم 2 شارع العمال', 'طالبة', NULL, '0', '01228106147', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(209, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شهد محمود محرم جودة', NULL, NULL, NULL, '2023-06-09', NULL, 209, 'شارع مخزن الزيت', 'طالبة', NULL, '0', '01050295585', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(210, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'يارا فهمي سالم ', NULL, NULL, NULL, '2023-06-10', NULL, NULL, 'كفرالشيخ', 'دكتوره نفسيه ', NULL, '01028642229', '01028642229', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-10', NULL, 0, NULL, 0, NULL),
(211, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'منى محمد شامة', NULL, NULL, NULL, '2023-06-12', NULL, NULL, 'المدينة - كفرالشيخ', NULL, NULL, '0', '01000556206', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-06-11', '2023-06-12 04:27:38', 0, NULL, 0, NULL),
(212, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عمر طه زكي', NULL, NULL, NULL, '2023-06-11', NULL, NULL, 'كفر الشيخ النبوي', 'طالب', NULL, '0', '01114442610', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-11', NULL, 0, NULL, 0, NULL),
(213, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'بسمله ايمن ابو النضر', NULL, NULL, NULL, '2023-06-11', NULL, NULL, 'مستشفى الزهراء ', 'طالبه', NULL, '01281831599', '01281831599', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-11', NULL, 0, NULL, 0, NULL),
(214, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مروة السيد على عبد الخاطر', NULL, NULL, NULL, '2023-06-12', NULL, 214, 'سيدى سالم', '0', NULL, '0', '01278300401', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-12', NULL, 0, NULL, 0, NULL),
(215, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'كادى السعيد السيد', NULL, NULL, NULL, '2023-06-15', NULL, NULL, 'كفر الشيخ شارع جيهان', 'طفل', NULL, '01020290701', '01020290701', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-15', NULL, 0, NULL, 0, NULL),
(216, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'محمد السعيد السيد', NULL, NULL, NULL, '2023-06-15', NULL, NULL, 'كفر الشيخ شارع جيهان', 'طفل', NULL, '01020290701', '01020290701', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-15', NULL, 0, NULL, 0, NULL),
(217, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فاطمه عبد المنعم', NULL, NULL, NULL, '2023-06-16', NULL, NULL, 'كفر الشيخ', '0', NULL, '0', '01093700244', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-16', NULL, 0, NULL, 0, NULL),
(218, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سهام محمد حسنى', NULL, NULL, NULL, '2023-06-11', NULL, 27106051500061, 'تقسيم مختار الوكيل - كفرالشيخ', '0', NULL, '0', '01119365626', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-17', NULL, 0, NULL, 0, NULL),
(219, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ريم عبدالعزيز السيد علي ', NULL, NULL, NULL, '2023-06-17', NULL, 304041500245, 'الاوقاف كفرالشيخ ', 'طالبه ', NULL, '01014097001', '01014097001', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-17', NULL, 0, NULL, 0, NULL),
(220, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مازن مصطفي تاج الدين شهاب', NULL, NULL, NULL, '2023-06-18', NULL, NULL, 'كفر الشيخ تقسيم 2', 'طالب', NULL, '0', '01015581725', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-18', NULL, 0, NULL, 0, NULL),
(221, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هاجر جاب الله رمضان', NULL, NULL, NULL, '2023-06-18', NULL, NULL, 'كفر الشيخ تقسيم2', 'طالبه', NULL, '0', '01507146984', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-18', NULL, 0, NULL, 0, NULL),
(222, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حنين جاب الله رمضان', NULL, NULL, NULL, '2023-06-18', NULL, NULL, 'كفر الشيخ تقسيم 2', 'طالبه', NULL, '0', '01507196984', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-18', NULL, 0, NULL, 0, NULL),
(223, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ايه صالح حسن الشرقاوي', NULL, NULL, NULL, '2023-06-18', NULL, NULL, 'كفر الشيخ الاوقاف', 'طالبه', NULL, '0', '01507196984', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-18', NULL, 0, NULL, 0, NULL),
(224, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'جيهان صالح حسن الشرقاوي', NULL, NULL, NULL, '2023-06-18', NULL, NULL, 'كفر الشيخ الاوقاف', 'طالبه', NULL, '0', '01027027891', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-18', NULL, 0, NULL, 0, NULL),
(225, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'لانا احمد ابراهيم', NULL, NULL, NULL, '2023-06-22', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01030114700', '01030114700', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-22', NULL, 0, NULL, 0, NULL),
(226, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مريم محمود يس', NULL, NULL, NULL, '2023-06-23', NULL, NULL, 'المحاربين القديمه ', 'طالبه ', NULL, '0', '0102612350', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-23', NULL, 0, NULL, 0, NULL),
(227, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ماهيتاب احمد سليم ', NULL, NULL, NULL, '2023-06-23', NULL, NULL, 'كفرالشيخ', 'طالبه ', NULL, '0', '0106594483', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-23', NULL, 0, NULL, 0, NULL),
(228, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فاطيما احمد محمد مغاوري', NULL, NULL, NULL, '2023-06-25', NULL, NULL, 'كفر الشيخ الخليفه', 'طالبه', NULL, '0', '01091593001', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-25', NULL, 0, NULL, 0, NULL),
(229, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نها جلال السيد', NULL, NULL, NULL, '2023-06-26', NULL, NULL, 'كفر الشيخ بجوار مكتبه هشام', 'دكتوره', NULL, '01101661708', '01101661708', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-06-26', NULL, NULL, NULL, 0, NULL),
(230, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'امل عبد الشفيق اسماعيل', NULL, NULL, NULL, '2023-07-02', NULL, NULL, 'تقسيم2 عباد الرحمن', 'صيدلانيه', NULL, '0', '01155555632', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-02', NULL, 0, NULL, 0, NULL),
(231, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'بسنت عبد الموجود', NULL, NULL, NULL, '2023-07-03', NULL, 1500886, 'كفر الشيخ الخليفه', 'معلم اول', NULL, '0', '01091593001', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-03', NULL, 0, NULL, 0, NULL),
(232, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فهد احمد احمد رمزي', NULL, NULL, NULL, '2023-07-04', NULL, NULL, 'كفر الشيخ الخليفه', 'طالب', NULL, '0', '01010443285', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-04', NULL, 0, NULL, 0, NULL),
(235, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مليكه احمد احمد رمزي', NULL, NULL, NULL, '2023-07-04', NULL, NULL, 'كفر الشيخ الخليفه', 'طالبه', NULL, '0', '01019492385', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-04', NULL, 0, NULL, 0, NULL),
(236, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سمر عبد الحميد محمد', NULL, NULL, NULL, '2023-07-04', NULL, 29404141500701, 'كفر الشيخ تقسيم الضرايب', 'بكالوريوس تجاره', NULL, '0', '01005776946', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-04', NULL, 0, NULL, 0, NULL),
(237, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مي عبد المجيد البدراوي', NULL, NULL, NULL, '2023-07-04', NULL, NULL, 'كفر الشيخ الخليفه', '0', NULL, '0', '01282110055', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-04', NULL, NULL, NULL, 0, NULL),
(238, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'امال سمير ابراهيم الصعيدى', NULL, NULL, NULL, '2023-07-05', NULL, 238, 'المحاربين الجديدة', '0', NULL, '0', '01093768768', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-05', NULL, 0, NULL, 0, NULL),
(239, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اروى جاب الله رمضان ', NULL, NULL, NULL, '2023-07-07', NULL, NULL, 'كفرالشيخ', 'طالبه', NULL, '0', '01507196983', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-07', NULL, 0, NULL, 0, NULL),
(240, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عمر طه ذكى السيد', NULL, NULL, NULL, '2023-07-09', NULL, NULL, 'كفر الشيخ', 'طفل', NULL, '01114442610', '01114442610', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-07-09', '2023-07-12 03:14:50', 0, NULL, 0, NULL),
(241, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسر احمد سليمان', NULL, NULL, NULL, '2023-07-09', NULL, NULL, 'كفر الشيخ', 'طفل', NULL, '01092220108', '01092220108', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-09', NULL, 0, NULL, 0, NULL),
(242, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مايا مصطفى محمود', NULL, NULL, NULL, '2023-07-09', NULL, NULL, 'كفر الشيخ عمارات بنك التعمير و الاسكان', 'طالبه', NULL, '01092220810', '01092220810', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-09', NULL, 0, NULL, 0, NULL),
(243, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'حلا احمد العمروسى', NULL, NULL, NULL, '2023-07-09', NULL, NULL, 'تقسيم المحافظه', 'طالبه', NULL, '01009514987', '01009514987', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-09', NULL, NULL, NULL, 0, NULL),
(244, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هاجر محمد يسرى ', NULL, NULL, NULL, '2023-07-09', NULL, NULL, 'المدينه الصناعيه', 'طالبه', NULL, '01288645002', '01288645002', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-09', NULL, NULL, NULL, 0, NULL),
(245, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ساره نسيم ابراهيم', NULL, NULL, NULL, '2023-07-13', NULL, NULL, 'صندله', 'طالبه', NULL, '01006993864', '01006993864', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-13', NULL, 0, NULL, 0, NULL),
(246, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هبه حسن محمد الجندى', NULL, NULL, NULL, '2023-07-13', NULL, NULL, 'كفر الشيخ تقسيم 4', 'دكتوره البيطريه', NULL, '01006993864', '01006993864', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-07-13', '2023-08-15 06:02:28', 0, NULL, 0, NULL),
(247, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'غاده محمد عبد العزيز عفيفى', NULL, NULL, NULL, '2023-07-18', NULL, NULL, 'كفر الشيخ الرياض', 'صيدلانيه', NULL, '01091663159', '01091663159', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-18', NULL, 0, NULL, 0, NULL),
(248, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نيره سعد عطيه', NULL, NULL, NULL, '2023-07-18', NULL, NULL, 'كفر الشيخ ش جيهان', 'ربه منزل', NULL, '01020916271', '01020916271', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-18', NULL, 0, NULL, 0, NULL),
(249, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسماء احمد عبد المقصود', NULL, NULL, NULL, '2023-07-18', NULL, NULL, 'كفر الشيخ ش الدستور', 'دكتوره', NULL, '01006958686', '01006958686', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-18', NULL, 0, NULL, 0, NULL),
(250, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نورا بسام عبد المجيد', NULL, NULL, NULL, '2023-07-19', NULL, NULL, 'كفر الشيخ', 'طفل', NULL, '01063699557', '01063699557', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-19', NULL, 0, NULL, 0, NULL),
(251, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'لميس محمد البشبيشي', NULL, NULL, NULL, '2023-07-19', NULL, NULL, 'كفر الشيخ', 'ربه منزل', NULL, '01003642341', '01003642341', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-19', NULL, 0, NULL, 0, NULL),
(252, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عائشه احمد سالم', NULL, NULL, NULL, '2023-07-22', NULL, NULL, 'كفر الشيخ المستشفى العام', 'طالبه', NULL, '0', '01033776437', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-22', NULL, 0, NULL, 0, NULL),
(253, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سمر محمد العيسوى', NULL, NULL, NULL, '2023-07-22', NULL, NULL, 'المحاربين القديمه', '0', NULL, '0', '01000203067', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-22', NULL, 0, NULL, 0, NULL),
(254, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'داليا عبد الناصر', NULL, NULL, NULL, '2023-07-22', NULL, NULL, 'كفر الشيخ النبوي', '0', NULL, '0', '01099779345', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-22', NULL, 0, NULL, 0, NULL),
(255, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسراء عبد الوهاب الشامى', NULL, NULL, NULL, '2023-07-24', NULL, 29105058800363, 'تقسيم النقل', 'مهندسه', NULL, '01009791876', '01009791876', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-24', NULL, 0, NULL, 0, NULL),
(256, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ليلي عبدالجواد وفا', NULL, NULL, NULL, '2023-07-27', NULL, NULL, 'مسير كفرالشيخ', 'مامو ضرايب ', NULL, '0', '01068898089', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-27', NULL, 0, NULL, 0, NULL),
(257, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'همسه مصباح احمد', NULL, NULL, NULL, '2023-07-27', NULL, NULL, 'كفرالشيخ', 'صاحبه حضانه', NULL, '0', '01007821851', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-27', NULL, 0, NULL, 0, NULL),
(258, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مروه مصطفي الهنداوي', NULL, NULL, NULL, '2023-07-27', NULL, NULL, 'كفرالشيخ', 'صاحبه حضانه', NULL, '0', '01001246826', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-27', NULL, 0, NULL, 0, NULL),
(259, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ناهد علي الموافي ', NULL, NULL, NULL, '2023-07-28', NULL, NULL, 'كفرالشيخ', 'ربه منزل', NULL, '0', '01016630490', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-07-28', '2023-08-02 04:15:47', 0, NULL, 0, NULL),
(260, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'امنيه مجدى بدوي', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'تقسيم النيابه الاداريه ', 'صيدلانيه', NULL, '01004032414', '01004032414', NULL, 2, NULL, NULL, NULL, NULL, 1, '2023-07-30', '2023-08-02 03:47:47', 0, NULL, 0, NULL),
(261, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'رؤي حسام الموافى', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01553146046', '01553146046', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-30', NULL, 0, NULL, 0, NULL),
(262, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'بسمله احمد نزيه', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01008714549', '01008714549', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-30', NULL, 0, NULL, 0, NULL),
(263, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سلمى احمد نزيه', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01011445442', '01011445442', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-30', NULL, 0, NULL, 0, NULL),
(264, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'روفيدا عابدين الليثي', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'تقسيم قضايا الدوله', 'صيدلانيه', NULL, '01553146046', '01553146046', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-30', NULL, 0, NULL, 0, NULL),
(265, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سميه سعيد ابو زيد', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'تقسيم النقل و البضائع ', 'معلمه', NULL, '01019180606', '01019180606', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-30', NULL, 0, NULL, 0, NULL),
(266, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ياسمين عامر ', NULL, NULL, NULL, '2023-07-30', NULL, NULL, 'كفر الشيخ', 'محاميه', NULL, '01097982103', '01097982103', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-30', NULL, 0, NULL, 0, NULL),
(267, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ايمان يوسف الشرنوبي', NULL, NULL, NULL, '2023-07-31', NULL, NULL, 'كفر الشيخ قسم اول', 'ربه منزل', NULL, '01030783880', '01030783880', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-07-31', NULL, 0, NULL, 0, NULL),
(268, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سمر السيد عطيه احمد سعيد', NULL, NULL, NULL, '2023-08-01', NULL, NULL, 'كفر الشيخ تقسيم النيابه الاداريه', 'ربه منزل', NULL, '01099115994', '01099115994', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-01', NULL, NULL, NULL, 0, NULL),
(269, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شيماء رافت بدوى', NULL, NULL, NULL, '2023-08-01', NULL, NULL, 'كفر الشيخ تقسيم الشرطه', 'مراجع حسابات بالشئون الصحيه', NULL, '01003477667', '01003477667', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-01', NULL, NULL, NULL, 0, NULL),
(270, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسراء محمود سالم', NULL, NULL, NULL, '2023-08-01', NULL, NULL, 'كفر الشيخ تقسيم 2 ', 'ربه منزل', NULL, '01090533390', '01090533390', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-01', NULL, NULL, NULL, 0, NULL),
(271, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'منى محمود منصور', NULL, NULL, NULL, '2023-08-02', NULL, 18909301604681, 'كفر الشيخ مستشفى الزهراء', '0', NULL, '0', '01000232662', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-02', NULL, 0, NULL, 0, NULL),
(272, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'دينا ابراهيم عبد الله', NULL, NULL, NULL, '2023-08-02', NULL, NULL, 'شارع الضرائب', '0', NULL, '0', '01008082525', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-02', NULL, 0, NULL, 0, NULL),
(273, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هبه هانى محمد السطوحى', NULL, NULL, NULL, '2023-08-05', NULL, NULL, 'ابراج المصنع', '0', NULL, '0', '01099733585', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-05', NULL, 0, NULL, 0, NULL),
(274, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'عبير ابراهيم عابدين', NULL, NULL, NULL, '2023-08-05', NULL, NULL, 'كفر الشيخ', '0', NULL, '0', '01008206771', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-05', NULL, 0, NULL, 0, NULL),
(275, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اسماء عبد العليم حسن', NULL, NULL, NULL, '2023-08-05', NULL, NULL, 'تقسيم الشرطه', '0', NULL, '0', '01092440830', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-05', NULL, 0, NULL, 0, NULL),
(276, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شيماء عماد عليوه', NULL, NULL, NULL, '2023-08-06', NULL, NULL, 'المدينه الصناعيه ', 'ربه منزل', NULL, '01000860664', '01000860664', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-06', NULL, NULL, NULL, 0, NULL),
(277, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نانسي حسن حامد', NULL, NULL, NULL, '2023-08-06', NULL, NULL, 'كفر الشيخ', 'ربه منزل', NULL, '01021168189', '01021168189', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-06', NULL, NULL, NULL, 0, NULL),
(278, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'رشا عبد الحافظ محمد يوسف', NULL, NULL, NULL, '2023-08-06', NULL, NULL, 'العزبه الجديده ', 'مدرسه', NULL, '01093845700', '01093845700', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-06', NULL, 0, NULL, 0, NULL),
(279, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'وسام ابراهيم محمود', NULL, NULL, NULL, '2023-08-07', NULL, NULL, 'ابراج الصيانه ', 'طبيب بشري', NULL, '01101235035', '01101235035', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-07', NULL, NULL, NULL, 0, NULL),
(280, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'شيماء الرفاعى ', NULL, NULL, NULL, '2023-08-07', NULL, NULL, 'كفر الشيخ', 'ربه منزل', NULL, '01012542176', '01012542176', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-07', NULL, NULL, NULL, 0, NULL),
(281, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'دانيه احمد عبد العزيز', NULL, NULL, NULL, '2023-08-08', NULL, NULL, 'شارع الجيش', 'طفله', NULL, '01061106009', '01061106009', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-08', NULL, NULL, NULL, 0, NULL),
(282, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'فاطمه حسن الصاوى', NULL, NULL, NULL, '2023-08-08', NULL, NULL, 'كفر الشيخ شارع الشهيد محمد الدمرداش', 'ربه منزل', NULL, '01026272900', '01026272900', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-08', NULL, 0, NULL, 0, NULL),
(283, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'سلمى عبد الناصر سليمان', NULL, NULL, NULL, '2023-08-08', NULL, NULL, 'كفر الشيخ ', 'ربه منزل', NULL, '01019926998', '01019926998', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-08', NULL, NULL, NULL, 0, NULL),
(284, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'اميره منصور صقر', NULL, NULL, NULL, '2023-08-10', NULL, NULL, 'الاوقاف', '0', NULL, '0', '01009244140', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-10', NULL, 0, NULL, 0, NULL),
(285, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'الشيماء محمد محمد عبد الجيد', NULL, NULL, NULL, '2023-08-10', NULL, NULL, 'المدينه الصناعيه', '0', NULL, '0', '01061110369', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-10', NULL, 0, NULL, 0, NULL),
(286, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'نورين عماد كمال', NULL, NULL, NULL, '2023-08-13', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '01090406704', '01090406704', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-13', NULL, 0, NULL, 0, NULL),
(287, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'ايبان مسعد احمد يوسف', NULL, NULL, NULL, '2023-08-15', NULL, NULL, 'كفر الشيخ تقسيم 2', 'ربه منزل', NULL, '01002730084', '01002730084', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-15', NULL, 0, NULL, 0, NULL),
(288, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'هبه كمال الدين محمد الاودن', NULL, NULL, NULL, '2023-08-17', NULL, 28509101500221, 'بجوار مستشفى العسكرى', 'بيولوجيه', NULL, '0', '01062468065', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-17', NULL, 0, NULL, 0, NULL),
(289, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'يارا بدير الحداد', NULL, NULL, NULL, '2023-08-17', NULL, 30205061500303, 'تقسيم الوسط الارشاد', '0', NULL, '0', '01067597979', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-17', NULL, 0, NULL, 0, NULL),
(290, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'مريم جلال السيد', NULL, NULL, NULL, '2023-08-24', NULL, NULL, 'كفر الشيخ', 'طالبه', NULL, '0', '01001012431', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-24', NULL, 0, NULL, 0, NULL),
(291, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'الاء محمد الخياط', NULL, NULL, NULL, '2023-08-26', NULL, NULL, 'حى الاطباء', '0', NULL, '0', '010646412120', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-08-26', NULL, 0, NULL, 0, NULL),
(292, 'خاص', 'Egyption_ID.jpg', 'profile.png', 'يحيى احمد الجريدى', NULL, NULL, NULL, '2023-09-05', NULL, 290, 'تقسيم 4 ', 'طالب', NULL, '0', '+201210053621', NULL, 2, NULL, NULL, '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-09-05', NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `message` mediumtext,
  `replay` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `date`, `message`, `replay`, `total`) VALUES
(1, 'dimyan_marcos@yahoo.com', '2023/07/16\r\n', 'Ø§Ø­ØªØ§Ø¬ Ø³Ø­Ø¨ Ø§Ù„Ø¨ÙˆÙ†Øµ Ø¹Ù† Ø§Ù„ÙØªØ±Ø© Ù…Ù† Ø§ÙˆÙ„ ÙŠÙ†Ø§ÙŠØ± Ø­ØªÙ‰ Ø§Ø®Ø± ÙŠÙˆÙ†ÙŠÙˆ 2023Ù…', 'ØªÙ… Ø§Ø­ØªØ³Ø§Ø¨ Ø¹Ø¯Ø¯ Ø§Ù„Ø¨ÙˆÙ†Øµ Ø§Ù„Ø®Ø§Øµ Ø¨ÙƒÙ… Ø¹Ù† Ø§Ù„ÙØªØ±Ø© Ø§Ù„Ù…Ø­Ø¯Ø¯Ø©', '100'),
(2, 'dimyan_marcos@yahoo.com', '2023/07/16', 'Ø§Ø­ØªØ§Ø¬ Ø³Ø­Ø¨ Ø§Ù„Ø¨ÙˆÙ†Øµ Ø¹Ù† Ø§Ù„ÙØªØ±Ø© Ù…Ù† Ø§ÙˆÙ„ ÙŠÙ†Ø§ÙŠØ± Ø­ØªÙ‰ Ø§Ø®Ø± ÙŠÙˆÙ†ÙŠÙˆ 2023Ù…', 'ØªÙ… Ø§Ø­ØªØ³Ø§Ø¨ Ù‚ÙŠÙ…Ø© Ø§Ù„Ø¨ÙˆÙ†Øµ Ø§Ù„Ø®Ø§ØµØ© Ø¨ÙƒÙ… Ø¹Ù† Ø§Ù„ÙØªØ±Ø© Ø§Ù„Ù…Ø­Ø¯Ø¯Ø¯Ø©', '250'),
(3, 'dimyan_marcos@yahoo.com', '2023/07/16', 'Ø§Ø­ØªØ§Ø¬ Ø³Ø­Ø¨ Ø§Ù„Ø¨ÙˆÙ†Øµ Ø¹Ù† Ø§Ù„ÙØªØ±Ø© Ù…Ù† Ø§ÙˆÙ„ ÙŠÙ†Ø§ÙŠØ± Ø­ØªÙ‰ Ø§Ø®Ø± ÙŠÙˆÙ†ÙŠÙˆ 2023Ù…', 'ØªÙ… Ø§Ø­ØªØ³Ø§Ø¨ Ù‚ÙŠÙ…Ø© Ø§Ù„Ø¨ÙˆÙ†Øµ Ø§Ù„Ø®Ø§ØµØ© Ø¨ÙƒÙ… ', '150'),
(4, 'dimyan_marcos@yahoo.com', '2023/07/16', 'Ø§Ø­ØªØ§Ø¬ Ø³Ø­Ø¨ Ø§Ù„Ø¨ÙˆÙ†Øµ Ø¹Ù† Ø§Ù„Ø´Ù‡Ø± Ø§Ù„Ø­Ø§Ù„ÙŠ', NULL, NULL),
(5, 'dimyan_marcos@yahoo.com', '2023/07/25', 'Ø§Ù„Ø³Ù„Ø§Ù… Ø¹Ù„ÙŠÙƒÙ… Ø§Ø­ØªØ§Ø¬ Ù„Ø³Ø­Ø¨ Ø§Ù„Ø¹Ù…ÙˆÙ„Ø§Øª Ø§Ù„Ø®Ø§ØµØ© Ø¨ÙŠ Ø¹Ù† Ø§Ù„ÙØªØ±Ø© Ù…Ù† Ø§ÙˆÙ„ ÙŠÙ†Ø§ÙŠØ± 2023 Ø­ØªÙ‰ ÙŠÙˆÙ„ÙŠÙˆ 2023Ù…', 'ØªÙ… Ø§Ø³ØªÙ„Ø§Ù… Ø·Ù„Ø¨ÙƒÙ… Ù„Ø³Ø­Ø¨ Ø§Ù„Ø¨ÙˆÙ†Øµ ÙˆØ¬Ø§Ø±ÙŠ ÙˆØ¶Ø¹Ù‡ Ø¹Ù„Ù‰ Ø§Ù„Ù…Ø­ÙØ¸Ø© ÙˆÙ‚ÙŠÙ…Ø© Ø§Ù„Ø¨ÙˆÙ†Øµ Ø§Ù„Ù…ØªØ§Ø­Ø© Ù„ÙƒÙ… Ù‡ÙŠ 150 Ø¨ÙˆÙ†Øµ ØµØ§Ù„Ø­Ø© Ù„Ù„Ø´Ø±Ø§Ø¡ Ù…Ù† Ø®Ù„Ø§Ù„ Ø§Ù„Ù', '150'),
(6, 'dimyan_marcos@yahoo.com', '2023/08/20', 'Ø§Ø±Ø¬Ùˆ Ø³Ø¹Ø¨ Ø§Ù„Ø¨ÙˆÙ†Øµ Ø§Ù„Ø®Ø§Øµ Ø¨ÙŠ Ø¹Ù† Ø§Ù„ÙØªØ±Ø© ÙƒØ°Ø§', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moorders`
--

CREATE TABLE IF NOT EXISTS `moorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productcateg` varchar(255) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL,
  `productbonus` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `totalbonus` varchar(250) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `moorders`
--

INSERT INTO `moorders` (`id`, `name`, `productname`, `productcateg`, `productprice`, `productbonus`, `quantity`, `total`, `totalbonus`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 'طارق السيد شهاب', 'طابعة ليزر', 'اتش بي', '2500', '250', 1, '2500', '250', '2023-10-15 21:49:46', 'عند الاستلام', 'تم التسليم');

-- --------------------------------------------------------

--
-- Table structure for table `mostakhdem`
--

CREATE TABLE IF NOT EXISTS `mostakhdem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mostakhdem`
--

INSERT INTO `mostakhdem` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'دميان مرقص أنور سمعان', 'dimyan', 1005468353, '123', 'شارع الثورة بجوار المستشفى العام', NULL, 'بيلا', 33634, NULL, NULL, NULL, NULL, '2023-10-17 05:39:48', NULL),
(3, NULL, NULL, NULL, '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-17 05:57:19', NULL),
(4, 'دميان مرقص', 'demian', 1005468353, '12345678', 'بيلا شارع الثورة', NULL, 'بيلا', 33634, NULL, NULL, NULL, NULL, '2023-10-17 05:58:14', NULL),
(5, 'محمد المصري', 'masry', 100000, '12345678', 'دسوق شارع الشركات', NULL, 'دسوق', 33634, NULL, NULL, NULL, NULL, '2023-10-17 06:01:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, '1', 1, '2023-03-16 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(2, 1, '2', 1, '2023-04-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(3, 3, '3', 2, '2023-05-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(4, 2, '4', 2, '2023-06-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(5, 4, '2', 1, '2023-07-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(6, 2, '4', 1, '2023-07-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(7, 3, '1', 1, '2023-03-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(8, 4, '4', 2, '2023-05-15 17:46:42', 'Ø§Ù„Ø¯ÙØ¹ Ø¹Ù†Ø¯ Ø§Ù„Ø§Ø³ØªÙ„Ø§Ù…', 'in Process'),
(9, 4, '5', 1, '2023-09-10 16:08:05', 'Ù…Ø­ÙØ¸ØªÙŠ', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` longtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 1, 'in Process', 'ØªÙ… ØªØ³Ù„ÙŠÙ… Ø§Ù„Ø·Ù„Ø¨ Ù„Ù„Ø´Ø­Ù†', '2023-07-15 17:48:14'),
(2, 2, 'in Process', 'ØªÙ… ØªØ³Ù„ÙŠÙ… Ø§Ù„Ø·Ù„Ø¨ Ù„Ø´Ø±ÙƒØ© Ø§Ù„Ø´Ø­Ù†', '2023-07-15 17:49:19'),
(3, 9, 'Delivered', 'Ù†Ø´ÙƒØ±Ùƒ Ø¹Ù„Ù‰ ØªÙ‚ØªÙƒÙ… Ø¨Ù…ØªØ¬Ø±Ù†Ø§', '2023-09-10 16:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `oroudpro`
--

CREATE TABLE IF NOT EXISTS `oroudpro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `image` varchar(350) DEFAULT NULL,
  `photo` varchar(350) DEFAULT NULL,
  `picture` varchar(350) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `oroudpro`
--

INSERT INTO `oroudpro` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `image`, `photo`, `picture`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 'عروض', NULL, 'العروض', 'صيدلية د/ ليديا', 1000, NULL, 'العرض الأول', 'carousel-1.jpg', 'carousel-2.jpg', 'carousel-3.jpg', 10, 'متاح', NULL, NULL),
(2, 'عروض', NULL, 'العروض', 'صيدلية د/ ليديا', 1000, NULL, NULL, 'carousel-4.jpg', 'carousel-3.jpg', 'carousel-2.jpg', 10, 'متاح', NULL, NULL),
(3, 'عروض', NULL, 'العروض', 'صيدلية د/ ليديا', 1000, NULL, NULL, 'carousel-1.jpg', 'carousel-2.jpg', 'carousel-3.jpg', 10, 'متاح', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perm`
--

CREATE TABLE IF NOT EXISTS `perm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `sub_syndicate` varchar(100) DEFAULT NULL,
  `users` varchar(100) DEFAULT NULL,
  `members` varchar(100) DEFAULT NULL,
  `deletedmembers` varchar(100) DEFAULT NULL,
  `towns` varchar(100) DEFAULT NULL,
  `forms` varchar(100) DEFAULT NULL,
  `reports` varchar(100) DEFAULT NULL,
  `requests` varchar(100) DEFAULT NULL,
  `complaints` varchar(100) DEFAULT NULL,
  `banks` varchar(100) DEFAULT NULL,
  `payments` varchar(100) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `backup` varchar(100) DEFAULT NULL,
  `restore` varchar(100) DEFAULT NULL,
  `searches` varchar(100) DEFAULT NULL,
  `add` varchar(100) DEFAULT NULL,
  `edit` varchar(100) DEFAULT NULL,
  `delete` varchar(100) DEFAULT NULL,
  `view` varchar(100) DEFAULT NULL,
  `print` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE IF NOT EXISTS `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `image` varchar(350) DEFAULT NULL,
  `photo` varchar(350) DEFAULT NULL,
  `picture` varchar(350) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `image`, `photo`, `picture`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 'الأدوية', NULL, 'بانادول | إكسترا لتخفيف إضافي فعال للألم و الحمي | 24 قرص', NULL, 34, NULL, 'مميزات المنتج\r\nبانادول | إكسترا لتخفيف إضافي فعال للألم و الحمي | 24 قرص\r\nعن هذا المنتج\r\nما هي أقراص بانادول إكسترا: تم تصميم أقراص بانادول إكسترا لتخفيف أنواع متعددة من الألم: الصداع ، آلام الدورة الشهرية ، آلام العضلات، آلام الأسنان والحمى.\r\nلماذا أقراص بانادول إكسترا: مع تركيبة مزدوجة، تحتوي على الباراسيتامول والكافيين.\r\nمن يمكنه استخدام بانادول إكسترا: أقراص بانادول إكسترا مخصصة للأشخاص الذين يحتاجون إلى تخفيف الألم، وهي مناسبة أيضا لأولئك الذين يتناولون معظم الأدوية الأخرى وكذلك كبار السن*.\r\nالمنتجات المتاحة من بانادول إكسترا: يمكن العثور على بانادول إكسترا في عبوات من 24 قرصا. من الجيد أن تكون في متناول اليد لتخفيف الألم بشكل فعال.\r\nكيف سيفيدك بانادول إكسترا: الباراسيتامول والكافيين معا يعملوا كمسكن قوي للألم ,عند الأستخدام حسب الإرشادات. يمكن تناوله على معدة فارغة ومن غير أن يسبب تهيج المعدة ^*.\r\n^ التهيج هو نسبة إلى التأثير على الذين يعانون أو معرضون لخطر الإصابة بمرض قرحة المعدة أو نزيف الجهاز الهضمي.\r\nعند الاستخدام حسب الإرشادات/اقرأ الملصق دائما قبل الاستخدام', 'fsh4vJTQ67N75I3EZRyUMWjTknm6CXT1w3ze56zu.jpg', 'Panadol-extra-gsk-24-tablets-1.jpg', 'Panadol-Extra-new-package.jpg', 10, 'متاح', NULL, NULL),
(2, 'العناية بالشعر', NULL, 'صبغة لوريال اكسلانس آش سوبريم | 8.12 أشقر لؤلؤي رمادى فاتح', NULL, 185, NULL, 'مميزات المنتج\r\nتتميز صبغة لوريال اكسلانس بما يلي:\r\n\r\nأحد أشهر العلامات التجارية في صبغ الشعر.\r\nتوفر تغطية للشيب بنسبة 100%.\r\nتكسب الشعر ألواناً لامعة وزاهية.\r\nلا تسبب تلف الشعر وتدوم لفترة طويلة.\r\nيتوفر منها درجات عديدة تناسب ألوان الشعر المختلفة.\r\nسعر صبغة لوريال اكسلانس مناسب مقارنة بفوائدها للشعر.\r\nعن هذا المنتج\r\nمم تتكون صبغة لوريال اكسلانس\r\nتحتوي عبوة لوريال صبغة على:\r\nسيروم حماية للشعر.\r\nكريم تلوين.\r\nشامبو.\r\nماسك حماية للشعر بعد الصبغة.\r\n\r\nحجم Loreal excellence\r\nتتوفر Loreal excellence بحجم 250 مل.\r\n\r\nسعر صبغة لوريال اكسلانس\r\nيتراوح سعر صبغة لوريال اكسلانس ما بين 180 إلى 194 جنيه مصري.\r\n\r\nيوصى باستعمال صبغة لوريال اكسلانس ل\r\nلوريال اكسلانس صبغة مناسبة لمن يريدون الحصول على لون شعر مختلف وجذاب بدون حدوث تلف أو ضرر للشعر، فهي تمنح شعرك مظهرًا أكثر جاذبية ولمعانًا.\r\n', '71JCirY8sWS._AC_UF1000,1000_QL80_.jpg', 'loreal-excellence-crm-8-12-ash-supreme-light-blond-2-vk68-01656446304.jpg', '18.1.jpg', 10, 'متاح', NULL, NULL),
(3, 'العناية بالبشرة', NULL, 'إيڤا سكين كير | كريم بشرة بالعسل | 55جم', NULL, 20, NULL, 'يعيد لبشرتك نعومتها وتوازنها الطبيعي ويمنحها نضارة وإشراقة دائمة.\r\nللبشرة العادية.', 'f0fea6b57ed25a2c9870ae465a861d2dc8b720a0.jpg', '51CnG7EFXNL._AC_UF350,350_QL80_.jpg', 'sddefault.jpg', 10, 'متاح', NULL, NULL),
(4, 'العناية اليومية', NULL, 'مميزات المنتج جيليت | ماكينة حلاقة للاستخدام مرة واحدة بجل مريح بلو 3 | 3 قطع', NULL, 95, NULL, 'مميزات المنتج\r\nجيليت | ماكينة حلاقة للاستخدام مرة واحدة بجل مريح بلو 3 | 3 قطع', '71h8rbaOLzL._AC_UF1000,1000_QL80_.jpg', '919+1T-b9cL._AC_UF1000,1000_QL80_.jpg', 'gillette-blue3-disposable-shaving-razor-with-comfort-gel-3pcs-i3xz-01658157804.jpg', 10, 'متاح', NULL, NULL),
(5, 'المكياج و الاكسسوارات', NULL, 'لابيلو | مرطب للشفاه بالفراولة | 4.8جم', NULL, 80, NULL, 'مميزات المنتج\r\nلابيلو | مرطب للشفاه بالفراولة | 4.8جم', '71jQ8SI1TDL.jpg', 'xOuOaKiCnerKfLsLkODgMGVZYBOHxX1RTz69tyMd.jpg', '61yli6ACJAL.jpg', NULL, 'متاح', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServicesID` varchar(200) DEFAULT NULL,
  `ServicesTitle` varchar(200) DEFAULT NULL,
  `ServicesPrice` varchar(200) DEFAULT NULL,
  `ServicesText` varchar(200) DEFAULT NULL,
  `OrderDate` varchar(200) DEFAULT NULL,
  `OrderName` varchar(200) DEFAULT NULL,
  `OrderPhone` varchar(200) DEFAULT NULL,
  `OrderAddress` varchar(200) DEFAULT NULL,
  `OrderTown` varchar(200) DEFAULT NULL,
  `OrderArea` varchar(200) DEFAULT NULL,
  `OrderDetails` mediumtext,
  `image` varchar(200) DEFAULT NULL,
  `OrderFDate` varchar(200) DEFAULT NULL,
  `OrderSDate` varchar(200) DEFAULT NULL,
  `OrderStatus` varchar(200) DEFAULT NULL,
  `FaniName` varchar(200) DEFAULT NULL,
  `FaniPhone` varchar(200) DEFAULT NULL,
  `FaniID` varchar(200) DEFAULT NULL,
  `FaniTakiim` varchar(200) DEFAULT NULL,
  `OrderNo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sadmin`
--

CREATE TABLE IF NOT EXISTS `sadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `details` text,
  `grad_img` varchar(255) DEFAULT NULL,
  `per_img` varchar(255) DEFAULT NULL,
  `sign_img` varchar(255) DEFAULT NULL,
  `grad_date` date DEFAULT NULL,
  `grad_place` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT '0000-00-00 00:00:00',
  `edit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `sub_syndicate` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `onus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sadmin`
--

INSERT INTO `sadmin` (`id`, `first_name`, `bname`, `cname`, `last_name`, `mail`, `username`, `password`, `address`, `country`, `salary`, `phone`, `mobile`, `details`, `grad_img`, `per_img`, `sign_img`, `grad_date`, `grad_place`, `id_card`, `work_place`, `create_date`, `edit_date`, `last_login`, `create_by`, `edit_by`, `group_id`, `active`, `sub_syndicate`, `job`, `onus`) VALUES
(1, 'الادارة', NULL, NULL, NULL, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE IF NOT EXISTS `siteinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `details` text,
  `grad_img` varchar(255) DEFAULT NULL,
  `per_img` varchar(255) DEFAULT NULL,
  `sign_img` varchar(255) DEFAULT NULL,
  `grad_date` varchar(200) DEFAULT NULL,
  `grad_place` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `create_date` varchar(200) DEFAULT NULL,
  `edit_date` text,
  `last_login` varchar(200) DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL,
  `edit_by` varchar(200) DEFAULT NULL,
  `group_id` varchar(200) DEFAULT NULL,
  `active` varchar(200) DEFAULT NULL,
  `sub_syndicate` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `onus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`id`, `first_name`, `bname`, `cname`, `last_name`, `mail`, `username`, `password`, `address`, `country`, `salary`, `phone`, `mobile`, `details`, `grad_img`, `per_img`, `sign_img`, `grad_date`, `grad_place`, `id_card`, `work_place`, `create_date`, `edit_date`, `last_login`, `create_by`, `edit_by`, `group_id`, `active`, `sub_syndicate`, `job`, `onus`) VALUES
(1, 'اكسيل للحلول البرمجية', 'اكسيل للحلول البرمجية البرمجة التقنية والخدمات الالكترونية', NULL, NULL, NULL, NULL, NULL, NULL, '01149220950', NULL, NULL, NULL, NULL, 'logo.png', NULL, NULL, NULL, 'info@excelgiants.site//', NULL, 'السويس', '2023-07-07 08:49:23', '<p>اكسيل للحلول البرمجية البرمجة التقنية والخدمات الالكترونية</p>', '2023-10-19 11:43:36', 'https://www.facebook.com/excelgiants.site', 'https://www.linkedin.com/excelgiants.site', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slidat`
--

CREATE TABLE IF NOT EXISTS `slidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `details` text,
  `grad_img` varchar(255) DEFAULT NULL,
  `per_img` varchar(255) DEFAULT NULL,
  `sign_img` varchar(255) DEFAULT NULL,
  `grad_date` date DEFAULT NULL,
  `grad_place` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT '0000-00-00 00:00:00',
  `edit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `sub_syndicate` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `onus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slidat`
--

INSERT INTO `slidat` (`id`, `first_name`, `bname`, `cname`, `last_name`, `mail`, `username`, `password`, `address`, `country`, `salary`, `phone`, `mobile`, `details`, `grad_img`, `per_img`, `sign_img`, `grad_date`, `grad_place`, `id_card`, `work_place`, `create_date`, `edit_date`, `last_login`, `create_by`, `edit_by`, `group_id`, `active`, `sub_syndicate`, `job`, `onus`) VALUES
(1, 'العرض الأول', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blog-1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-21 03:08:00', NULL, '2023-07-21 03:08:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'العرض الثاني', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blog-2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-21 03:09:30', NULL, '2023-07-21 03:09:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'العرض الثالث', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blog-3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-21 03:10:07', NULL, '2023-07-21 03:10:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'العرض الرابع', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blog-4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-21 03:10:27', NULL, '2023-07-21 03:10:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'العرض الخامس', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blog-5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-21 03:10:59', NULL, '2023-07-21 03:10:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'LED', '2023-07-02 08:01:19', NULL),
(2, 1, 'Air Condition', '2023-07-02 08:01:31', NULL),
(3, 1, 'Tablet', '2023-07-02 08:01:50', NULL),
(4, 2, 'Labtop', '2023-07-02 08:02:11', NULL),
(5, 2, 'Printer', '2023-07-02 08:02:17', NULL),
(6, 3, 'Ø³Ø§Ù…Ø³ÙˆÙ†Ø¬', '2023-07-10 19:25:58', '10-09-2023 08:26:21 PM'),
(7, 3, 'Ø§ÙŠ ÙÙˆÙ†', '2023-07-10 19:26:03', NULL),
(8, 3, 'Ù‡ÙˆØ§ÙˆÙŠ', '2023-07-10 19:26:09', NULL),
(9, 3, 'Ø§ÙŠÙÙˆÙ† 14Ø¨Ø±Ùˆ Ù…Ø§ÙƒØ³', '2023-09-06 12:08:59', '10-09-2023 08:54:50 PM'),
(10, 5, 'ÙƒØ±ÙŠÙ… Ø´Ø¹Ø±', '2023-10-03 15:23:12', NULL),
(11, 6, 'Ø¨Ù„Ø³Ù… Ù„Ù„Ø´Ø¹Ø±', '2023-10-03 18:18:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `systemgroups`
--

CREATE TABLE IF NOT EXISTS `systemgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) DEFAULT '0',
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edit_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` int(11) NOT NULL,
  `edit_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE IF NOT EXISTS `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Ù…Ø­ÙØ¸Ø© Ø§Ù„Ø¨Ø±ÙŠÙ‚ Ø£ÙˆÙ†Ù„Ø§ÙŠÙ†'),
(6, 'short_name', 'Ù…Ø­ÙØ¸ØªÙŠ'),
(11, 'logo', 'uploads/1647977100_finallogo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1626249540_dark-bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE IF NOT EXISTS `towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `syndadmin` varchar(200) DEFAULT NULL,
  `syndadminjop` varchar(200) DEFAULT NULL,
  `address` text,
  `create_date` datetime DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(30) NOT NULL,
  `account_id` int(30) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=Cash in, 2= Withdraw, 3=transfer',
  `amount` float NOT NULL,
  `remarks` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'dr.demianmorcos@gmail.com', '41.235.137.228\0\0', '2023-07-15 17:34:02', NULL, 0),
(2, 'dr.demianmorcos@gmail.com', '41.235.137.228\0\0', '2023-07-15 17:34:32', NULL, 1),
(3, 'dr.demianmorcos@gmail.com', '41.235.137.228\0\0', '2023-07-15 17:35:10', NULL, 1),
(4, 'dr.demianmorcos@gmail.com', '41.235.137.228\0\0', '2023-07-15 17:37:57', NULL, 1),
(5, 'dr.demianmorcos@gmail.com', '41.235.183.35\0\0\0', '2023-07-16 08:02:45', NULL, 0),
(6, 'dr.demianmorcos@gmail.com', '41.235.183.35\0\0\0', '2023-07-16 08:03:27', NULL, 0),
(7, 'demian_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:06:26', NULL, 0),
(8, 'demian_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:06:51', NULL, 0),
(9, 'dimyan_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:07:43', NULL, 1),
(10, 'dimyan_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:10:00', '16-07-2023 01:40:30 PM', 1),
(11, 'dimyan_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:11:36', NULL, 0),
(12, 'dimyan_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:12:20', '16-07-2023 01:56:06 PM', 1),
(13, 'dimyan_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:26:23', NULL, 1),
(14, 'dimyan_marcos@yahoo.com', '41.235.183.35\0\0\0', '2023-07-16 08:27:04', NULL, 1),
(15, 'dimyan_marcos@yahoo.com', '41.235.137.228\0\0', '2023-07-16 18:57:01', NULL, 1),
(16, 'dimyan_marcos@yahoo.com', '41.235.134.8\0\0\0\0', '2023-07-17 19:33:37', NULL, 1),
(17, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:13:10', NULL, 0),
(18, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:13:29', NULL, 0),
(19, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:13:39', NULL, 0),
(20, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:13:50', NULL, 0),
(21, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:14:00', NULL, 0),
(22, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:14:09', NULL, 0),
(23, 'dr.demianmorcos@gmail.com', '51.15.37.232\0\0\0\0', '2023-07-25 18:14:19', NULL, 0),
(24, 'dr.demianmorcos@gmail.com', '41.235.135.29\0\0\0', '2023-07-25 18:16:39', NULL, 0),
(25, 'dimyan_marcos@yahoo.com', '41.235.135.29\0\0\0', '2023-07-25 18:19:33', NULL, 1),
(26, 'amyerpaly@gmail.com', '165.16.43.223\0\0\0', '2023-08-15 21:19:10', NULL, 1),
(27, 'dr.demianmorcos@gmail.com', '41.253.98.39\0\0\0\0', '2023-08-20 16:51:51', NULL, 0),
(28, 'dr.demianmorcos@gmail.com', '41.253.98.39\0\0\0\0', '2023-08-20 16:52:27', NULL, 0),
(29, 'dimyan_marcos@yahoo.com', '41.235.226.123\0\0', '2023-08-20 17:54:41', NULL, 1),
(30, 'dimyan_marcos@yahoo.com', '41.235.247.97\0\0\0', '2023-09-01 11:26:45', NULL, 0),
(31, 'dimyan_marcos@yahoo.com', '41.235.247.97\0\0\0', '2023-09-01 11:27:29', NULL, 1),
(32, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:18:33', NULL, 0),
(33, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:19:37', NULL, 0),
(34, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:21:14', NULL, 0),
(35, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:24:36', NULL, 1),
(36, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:42:25', NULL, 0),
(37, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:42:58', '06-09-2023 02:21:10 AM', 0),
(38, 'amyerpaly@gmail.com', '102.164.99.38\0\0\0', '2023-09-05 20:51:48', NULL, 1),
(39, 'aliwanees17148@gmail.com', '165.16.42.74\0\0\0\0', '2023-09-10 16:07:35', NULL, 1),
(40, 'aliwanees17148@gmail.com', '102.69.7.152\0\0\0\0', '2023-09-14 19:42:29', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `waorders`
--

CREATE TABLE IF NOT EXISTS `waorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productcateg` varchar(255) DEFAULT NULL,
  `productprice` varchar(255) DEFAULT NULL,
  `productbonus` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `totalbonus` varchar(250) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `waorders`
--

INSERT INTO `waorders` (`id`, `name`, `productname`, `productcateg`, `productprice`, `productbonus`, `quantity`, `total`, `totalbonus`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 'حسن محمد الفرماوي', 'شاشة lcd', 'اسر', '1500', '150', 1, '1500', '150', '2023-10-15 21:45:46', 'عند الاستلام', 'تم الشحن');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
