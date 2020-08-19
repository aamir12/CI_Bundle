-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 09:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basiccode`
--

-- --------------------------------------------------------

--
-- Table structure for table `disable_date`
--

CREATE TABLE `disable_date` (
  `disdate_id` int(11) NOT NULL,
  `dd_vehical_id` int(11) NOT NULL,
  `dd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disable_date`
--

INSERT INTO `disable_date` (`disdate_id`, `dd_vehical_id`, `dd_date`) VALUES
(1, 1, '2018-02-23'),
(2, 1, '2018-02-24'),
(3, 2, '2018-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `eid_wish`
--

CREATE TABLE `eid_wish` (
  `eidwishid` int(11) NOT NULL,
  `wishname` varchar(255) NOT NULL,
  `wishdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eid_wish`
--

INSERT INTO `eid_wish` (`eidwishid`, `wishname`, `wishdate`) VALUES
(1, 'Aamir Khan', '2018-05-29 11:50:27'),
(2, 'Aamir', '2018-05-29 14:28:43'),
(3, 'Aamir', '2018-05-29 20:11:19'),
(4, 'Aamir', '2018-05-29 20:45:58'),
(5, 'Aamir', '2018-05-29 20:46:24'),
(6, 'Codexking', '2018-05-29 21:16:21'),
(7, 'Aamir Khan', '2018-05-29 21:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_salary` decimal(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`emp_id`, `emp_name`, `emp_salary`) VALUES
(1, 'Aamir Khan', '5000.00'),
(2, 'Girjesh', '4500.00'),
(3, 'Tahir Khan', '8000.00'),
(4, 'Rahul Pawar', '9000.00'),
(5, 'Abhishek', '5000.00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `message`, `created_date`) VALUES
(6, 'hello dear', '2017-05-05'),
(7, 'hello', '2017-05-09'),
(8, 'bye', '2017-05-10'),
(11, 'kkk', '2017-05-11'),
(13, 'dd', '2017-05-14'),
(17, 'sister merriage', '2017-06-01'),
(18, 'my holiday', '2017-06-01'),
(19, 'shopping', '2017-06-13'),
(20, 'ddd', '2017-05-16'),
(21, 'byyy', '2017-06-15'),
(22, 'sister merriage', '2017-06-15'),
(23, 'hello', '2017-06-15'),
(24, 'alfiya bithday', '2017-06-15'),
(25, 'hello tommrow is holiday', '2017-05-13'),
(26, 'jj', '2017-09-06'),
(28, 'hjghj', '2017-09-28'),
(30, '555', '2018-01-18'),
(31, 'happy birthday', '2018-01-18'),
(35, 'test', '2018-05-01'),
(36, 'abc', '2018-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `pk_gid` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`pk_gid`, `heading`, `image`) VALUES
(9, 'ashish', 'Logo.png'),
(10, 'sdfd', 'El-Coroba-Cleaning-Services_1_1_.gif'),
(11, 'hello aamir', 'Intro-to-gardening-course.jpg'),
(12, 'sdgfdfd sfdsfd', 'horticultural-services-250x250.jpg'),
(13, 'ddd', '1502951263-adv.png'),
(14, 'tt', 'approved.png');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `hobby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `sid`, `hobby`) VALUES
(1, 23, 'cricket'),
(2, 24, 'hockey'),
(3, 24, 'football'),
(4, 23, 'bollywall');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'CODEX@123', 0, 0, 0, NULL, '2017-10-12 13:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `myjson`
--

CREATE TABLE `myjson` (
  `id` int(11) NOT NULL,
  `mydata` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_range`
--

CREATE TABLE `price_range` (
  `pricerange` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `minexp` int(5) NOT NULL,
  `maxexp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_range`
--

INSERT INTO `price_range` (`pricerange`, `price`, `minexp`, `maxexp`) VALUES
(1, '4-6', 4, 6),
(2, '6-15', 6, 15),
(3, '3-9', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `option_name`, `option_value`) VALUES
(1, 'abc', '100.00', 'El-Coroba-Cleaning-Services_1_1_.gif', '', ''),
(2, 'Shirt', '320.00', 'horticultural-services-250x250.jpg', 'Color', 'Black,White,Red'),
(3, 'T-SHirt', '400.00', 'Intro-to-gardening-course.jpg', 'Size', 'small,large');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `status`) VALUES
(1, 'ActionScript', '1'),
(2, 'AppleScript', '1'),
(3, 'Asp', '1'),
(4, 'BASIC', '1'),
(5, 'C', '1'),
(6, 'C++', '1'),
(7, 'Clojure', '1'),
(8, 'COBOL', '1'),
(9, 'ColdFusion', '1'),
(10, 'Erlang', '1'),
(11, 'Fortran', '1'),
(12, 'Groovy', '1'),
(13, 'Haskell', '1'),
(14, 'Java', '1'),
(15, 'JavaScript', '1'),
(16, 'Lisp', '1'),
(17, 'MySQL', '1'),
(18, 'Oracle', '1'),
(19, 'Perl', '1'),
(20, 'PHP', '1'),
(21, 'Python', '1'),
(22, 'Ruby', '1'),
(23, 'Scala', '1'),
(24, 'Scheme', '1'),
(25, 'SQL', '1'),
(26, 'Web Development', '1');

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE `social_login` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `pk_sid` int(11) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(16) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `hobbies` text NOT NULL,
  `category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`pk_sid`, `studentname`, `address`, `contact`, `gender`, `hobbies`, `category`) VALUES
(23, 'Aakash', 'Betul', '46545646', 'Male', 'Cricket@Football', 'OBC'),
(24, 'aamir', 'sdfa', '4654654', 'Male', 'Cricket', 'OBC'),
(25, 'khan', 'dsfa', '46545', 'Female', 'Football', 'ST'),
(27, 'tahir', 'chicholi', '888888888888', 'Male', 'Cricket@Football', 'OBC'),
(28, 'aamir', 'abc', '852547154545', 'Male', 'Cricket@Football', 'General'),
(29, 'Girjesh', 'kkkkkkk', '99999999', 'Male', 'Cricket', 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderid` int(11) NOT NULL,
  `vehicalid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderid`, `vehicalid`, `startdate`, `enddate`, `status`) VALUES
(1, 1, '2018-01-09', '2018-01-12', '2'),
(2, 1, '2018-01-09', '2018-01-15', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `created`, `modified`, `status`) VALUES
(2, 'aamir', 'khan', 'aamir@gmail.com', '8878246627', '2018-06-29 16:42:33', '2018-06-29 16:42:33', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disable_date`
--
ALTER TABLE `disable_date`
  ADD PRIMARY KEY (`disdate_id`);

--
-- Indexes for table `eid_wish`
--
ALTER TABLE `eid_wish`
  ADD PRIMARY KEY (`eidwishid`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`pk_gid`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myjson`
--
ALTER TABLE `myjson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_range`
--
ALTER TABLE `price_range`
  ADD PRIMARY KEY (`pricerange`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`pk_sid`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disable_date`
--
ALTER TABLE `disable_date`
  MODIFY `disdate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eid_wish`
--
ALTER TABLE `eid_wish`
  MODIFY `eidwishid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `pk_gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `myjson`
--
ALTER TABLE `myjson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price_range`
--
ALTER TABLE `price_range`
  MODIFY `pricerange` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `social_login`
--
ALTER TABLE `social_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `pk_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
