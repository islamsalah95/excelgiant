-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2024 at 08:45 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excelgia_mahmdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `samary` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `topic` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tdate` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tauther` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `malaf` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '#'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogvides`
--

CREATE TABLE `blogvides` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `samary` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `topic` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tdate` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tauther` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
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
  `OrderDetails` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `OrderFDate` varchar(200) DEFAULT NULL,
  `OrderSDate` varchar(200) DEFAULT NULL,
  `OrderStatus` varchar(200) DEFAULT NULL,
  `FaniName` varchar(200) DEFAULT NULL,
  `FaniPhone` varchar(200) DEFAULT NULL,
  `FaniID` varchar(200) DEFAULT NULL,
  `FaniTakiim` varchar(200) DEFAULT NULL,
  `OrderNo` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoryat`
--

CREATE TABLE `categoryat` (
  `id` int(11) NOT NULL,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categoryat`
--

INSERT INTO `categoryat` (`id`, `category`, `image`) VALUES
(1, 'من نحن', NULL),
(3, 'المكتبة القانونية', NULL),
(2, 'الخدمات القانونية', NULL),
(4, 'أحدث الأخبار', NULL),
(5, 'كبسولات قانونية', NULL),
(6, 'المنتدى', NULL),
(7, 'مساهمات الأعضاء', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examinee_tbl`
--

CREATE TABLE `examinee_tbl` (
  `exmne_id` int(11) NOT NULL,
  `exmne_fullname` varchar(1000) NOT NULL,
  `exmne_course` varchar(1000) NOT NULL,
  `exmne_gender` varchar(1000) NOT NULL,
  `exmne_birthdate` varchar(1000) NOT NULL,
  `exmne_year_level` varchar(1000) NOT NULL,
  `exmne_email` varchar(1000) NOT NULL,
  `exmne_password` varchar(1000) NOT NULL,
  `exmne_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_tbl`
--

CREATE TABLE `exam_question_tbl` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fani`
--

CREATE TABLE `fani` (
  `id` int(11) NOT NULL,
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
  `OrderDetails` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `grad_img` varchar(200) DEFAULT NULL,
  `per_img` varchar(200) DEFAULT NULL,
  `OrderFDate` varchar(200) DEFAULT NULL,
  `OrderSDate` varchar(200) DEFAULT NULL,
  `OrderStatus` varchar(200) DEFAULT NULL,
  `FaniName` varchar(200) DEFAULT NULL,
  `FaniPhone` varchar(200) DEFAULT NULL,
  `FaniID` varchar(200) DEFAULT NULL,
  `FaniTakiim` varchar(200) DEFAULT NULL,
  `OrderNo` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kararat`
--

CREATE TABLE `kararat` (
  `id` int(11) NOT NULL,
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
  `OrderDetails` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `OrderFDate` varchar(200) DEFAULT NULL,
  `OrderSDate` varchar(200) DEFAULT NULL,
  `OrderStatus` varchar(200) DEFAULT NULL,
  `FaniName` varchar(200) DEFAULT NULL,
  `FaniPhone` varchar(200) DEFAULT NULL,
  `FaniID` varchar(200) DEFAULT NULL,
  `FaniTakiim` varchar(200) DEFAULT NULL,
  `OrderNo` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `natiga`
--

CREATE TABLE `natiga` (
  `id` int(11) NOT NULL,
  `RegNumber` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `subject1` varchar(200) DEFAULT NULL,
  `subject2` varchar(200) DEFAULT NULL,
  `subject3` varchar(200) DEFAULT NULL,
  `subject4` varchar(200) DEFAULT NULL,
  `subject5` varchar(200) DEFAULT NULL,
  `subject6` varchar(200) DEFAULT NULL,
  `subject7` varchar(200) DEFAULT NULL,
  `subject8` varchar(200) DEFAULT NULL,
  `subject9` varchar(200) DEFAULT NULL,
  `subject10` varchar(200) DEFAULT NULL,
  `subject11` varchar(200) DEFAULT NULL,
  `subject12` varchar(200) DEFAULT NULL,
  `subject13` varchar(200) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `ferka` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newrequest`
--

CREATE TABLE `newrequest` (
  `id` int(11) NOT NULL,
  `sname` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `sphone` varchar(200) DEFAULT NULL,
  `pphone` varchar(200) DEFAULT NULL,
  `nationalty` varchar(200) DEFAULT NULL,
  `religon` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `score` varchar(200) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `stydytype` varchar(200) DEFAULT NULL,
  `curentdate` varchar(200) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perm`
--

CREATE TABLE `perm` (
  `id` int(11) NOT NULL,
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
  `print` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
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
  `OrderDetails` mediumtext DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `OrderFDate` varchar(200) DEFAULT NULL,
  `OrderSDate` varchar(200) DEFAULT NULL,
  `OrderStatus` varchar(200) DEFAULT NULL,
  `FaniName` varchar(200) DEFAULT NULL,
  `FaniPhone` varchar(200) DEFAULT NULL,
  `FaniID` varchar(200) DEFAULT NULL,
  `FaniTakiim` varchar(200) DEFAULT NULL,
  `OrderNo` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sadmin`
--

CREATE TABLE `sadmin` (
  `id` int(11) NOT NULL,
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
  `details` text DEFAULT NULL,
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
  `onus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `sadmin`
--

INSERT INTO `sadmin` (`id`, `first_name`, `bname`, `cname`, `last_name`, `mail`, `username`, `password`, `address`, `country`, `salary`, `phone`, `mobile`, `details`, `grad_img`, `per_img`, `sign_img`, `grad_date`, `grad_place`, `id_card`, `work_place`, `create_date`, `edit_date`, `last_login`, `create_by`, `edit_by`, `group_id`, `active`, `sub_syndicate`, `job`, `onus`) VALUES
(1, 'محمود المنطاوي', NULL, NULL, NULL, NULL, 'mantawey', 'f3f0c52c714ca76bede3fdab9900dbfb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE `siteinfo` (
  `id` int(11) NOT NULL,
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
  `details` text DEFAULT NULL,
  `grad_img` varchar(255) DEFAULT NULL,
  `per_img` varchar(255) DEFAULT NULL,
  `sign_img` varchar(255) DEFAULT NULL,
  `grad_date` varchar(200) DEFAULT NULL,
  `grad_place` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `create_date` varchar(200) DEFAULT NULL,
  `edit_date` varchar(200) DEFAULT NULL,
  `last_login` varchar(200) DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL,
  `edit_by` varchar(200) DEFAULT NULL,
  `group_id` varchar(200) DEFAULT NULL,
  `active` varchar(200) DEFAULT NULL,
  `sub_syndicate` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `onus` varchar(255) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`id`, `first_name`, `bname`, `cname`, `last_name`, `mail`, `username`, `password`, `address`, `country`, `salary`, `phone`, `mobile`, `details`, `grad_img`, `per_img`, `sign_img`, `grad_date`, `grad_place`, `id_card`, `work_place`, `create_date`, `edit_date`, `last_login`, `create_by`, `edit_by`, `group_id`, `active`, `sub_syndicate`, `job`, `onus`, `description`) VALUES
(1, 'مستشارنا', 'دكتور/ محمود المنطاوي', NULL, NULL, NULL, NULL, NULL, NULL, '01000970111', NULL, NULL, NULL, NULL, 'logo.png', NULL, NULL, NULL, 'info@excelgiants.site', NULL, 'المطرية ميدان المطري', '2023-07-07 08:49:23', '<h4><strong>الإستشارات القانونية من خلال تقديم المشورة القانونية أو الرأي القانوني وتقديم الحلول القانونية الممكنة&nbsp;</strong></h4>', '2024-05-19 05:43:23', 'https://www.facebook.com/excelgiants.site', 'https://www.linkedin.com/excelgiants.site', NULL, NULL, NULL, NULL, NULL, 'الإستشارات القانونية من خلال تقديم المشورة القانونية أو الرأي القانوني وتقديم الحلول القانونية الممكنة ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `StudentName` varchar(200) DEFAULT NULL,
  `RegNumber` varchar(200) DEFAULT NULL,
  `NationalID` varchar(200) DEFAULT NULL,
  `Type` varchar(200) DEFAULT NULL,
  `Nationalty` varchar(200) DEFAULT NULL,
  `Religon` varchar(200) DEFAULT NULL,
  `BirthDate` varchar(200) DEFAULT NULL,
  `Age` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `StudentFone` varchar(200) DEFAULT NULL,
  `ParentFone` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `ElSaf` varchar(200) DEFAULT NULL,
  `Takhasous` varchar(200) DEFAULT NULL,
  `Year` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  `ferka` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemgroups`
--

CREATE TABLE `systemgroups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edit_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_edit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` int(11) NOT NULL,
  `edit_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `takhasousat`
--

CREATE TABLE `takhasousat` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `syndadmin` varchar(200) DEFAULT NULL,
  `syndadminjop` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `edit_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `details` text DEFAULT NULL,
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
  `onus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `bname`, `cname`, `last_name`, `mail`, `username`, `password`, `address`, `country`, `salary`, `phone`, `mobile`, `details`, `grad_img`, `per_img`, `sign_img`, `grad_date`, `grad_place`, `id_card`, `work_place`, `create_date`, `edit_date`, `last_login`, `create_by`, `edit_by`, `group_id`, `active`, `sub_syndicate`, `job`, `onus`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:05:26', NULL, '2024-05-11 08:05:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:05:42', NULL, '2024-05-11 08:05:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:05:52', NULL, '2024-05-11 08:05:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:06:01', '2024-05-11 08:06:16', '2024-05-11 08:06:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:06:27', NULL, '2024-05-11 08:06:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:06:37', NULL, '2024-05-11 08:06:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b7.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:06:46', NULL, '2024-05-11 08:06:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b8.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:06:55', NULL, '2024-05-11 08:06:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b9.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:07:04', NULL, '2024-05-11 08:07:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b10.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-11 08:07:14', NULL, '2024-05-11 08:07:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogvides`
--
ALTER TABLE `blogvides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryat`
--
ALTER TABLE `categoryat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  ADD PRIMARY KEY (`exmne_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `fani`
--
ALTER TABLE `fani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `kararat`
--
ALTER TABLE `kararat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `natiga`
--
ALTER TABLE `natiga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newrequest`
--
ALTER TABLE `newrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perm`
--
ALTER TABLE `perm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadmin`
--
ALTER TABLE `sadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteinfo`
--
ALTER TABLE `siteinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemgroups`
--
ALTER TABLE `systemgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `takhasousat`
--
ALTER TABLE `takhasousat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
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
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogvides`
--
ALTER TABLE `blogvides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoryat`
--
ALTER TABLE `categoryat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examinee_tbl`
--
ALTER TABLE `examinee_tbl`
  MODIFY `exmne_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_question_tbl`
--
ALTER TABLE `exam_question_tbl`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fani`
--
ALTER TABLE `fani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kararat`
--
ALTER TABLE `kararat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `natiga`
--
ALTER TABLE `natiga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newrequest`
--
ALTER TABLE `newrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perm`
--
ALTER TABLE `perm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sadmin`
--
ALTER TABLE `sadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siteinfo`
--
ALTER TABLE `siteinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemgroups`
--
ALTER TABLE `systemgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `takhasousat`
--
ALTER TABLE `takhasousat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
