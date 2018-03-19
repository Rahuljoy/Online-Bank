-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 06:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_m_wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `address_temp`
--

CREATE TABLE `address_temp` (
  `address_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_temp`
--

INSERT INTO `address_temp` (`address_id`, `address`, `type`, `state`, `city`, `country`, `zip_code`, `user_id`) VALUES
(1, 'aionik prime, present, present, present', 'present', 'bonani', 'dhaka', 'Bangladesh', 1213, NULL),
(4, 'aionik prime, permanent', 'permanent', 'bonani', 'dhaka', 'Bangladesh', 1213, NULL),
(12, 'Aionik prime', 'permanent', 'Banani', 'Dhaka', 'Bangladesh', 1213, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `last_transaction_balance` double NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `b_user`
--

CREATE TABLE `b_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_user`
--

INSERT INTO `b_user` (`user_id`, `user_name`, `user_password`, `type_id`, `update_date`, `user_active`) VALUES
(1, 'Rahul', '123abc', 1, '2018-02-23 19:25:44', 1),
(5, 'Rafiul', '789abc', 2, '2018-02-23 19:51:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `b_user_temp`
--

CREATE TABLE `b_user_temp` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_user_temp`
--

INSERT INTO `b_user_temp` (`user_id`, `user_name`, `user_password`, `type_id`, `update_date`, `user_active`) VALUES
(1, 'Rafi', '456abc', 2, '2018-02-23 19:50:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `card_no` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  `card_pin` int(50) NOT NULL,
  `expire_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `c_v_c_code` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `transaction_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `atm_place` varchar(255) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_ammount` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `nominee_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` longblob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominee_temp`
--

CREATE TABLE `nominee_temp` (
  `nominee_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `image` longblob,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominee_temp`
--

INSERT INTO `nominee_temp` (`nominee_id`, `full_name`, `occupation`, `relationship`, `office_address`, `present_address`, `permanent_address`, `gender`, `date_of_birth`, `image`, `user_id`) VALUES
(5, 'nepal prasad', 'business', 'father', 'attanibazar', 'muktagacha', 'mymenshing', 'male', '0000-00-00', NULL, NULL),
(13, 'Protima prasad', 'Housewife', 'mother', 'Muktagacha,mymenshing', 'Attanibazer,muktagacha', 'Attanibazer,muktagacha', 'female', '1978-02-18', NULL, NULL),
(14, 'Mustakim', 'jifjlsdjf', 'gjjd', 'khilkhet, present', 'fjdjjfjd', 'khilkhet, present', 'male', '1994-05-15', NULL, NULL),
(15, 'Mustakim', 'fmsdjflj', 'sfkfdjf', 'dmflsdf', 'fksjdlfl', 'sdfms', 'male', '1994-12-05', NULL, NULL),
(16, 'Mustakim', 'fmsdjflj', 'sfkfdjf', 'dmflsdf', 'fksjdlfl', 'sdfms', 'male', '1994-12-05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `atm_place` varchar(255) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_ammount` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_info_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` longblob NOT NULL,
  `user_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_temp`
--

CREATE TABLE `user_info_temp` (
  `user_info_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `image` longblob,
  `user_id` int(11) DEFAULT NULL,
  `nominee_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_temp`
--

INSERT INTO `user_info_temp` (`user_info_id`, `first_name`, `middle_name`, `last_name`, `e_mail`, `contact_no`, `gender`, `date_of_birth`, `image`, `user_id`, `nominee_id`, `address_id`) VALUES
(1, 'Md', 'abu', 'umaer', 'fgauy@gmail.com', 175598665, 'male', '2018-03-19', NULL, NULL, NULL, NULL),
(2, 'Md', 'abu', 'rashid', 'aburashid@gmail.com', 17555963, 'male', '2018-03-19', NULL, NULL, NULL, NULL),
(29, 'imon', 'chandra', 'day', 'limon@gmail.com', 1674937410, 'male', '0000-00-00', NULL, NULL, NULL, NULL),
(37, 'rahul', 'prasad', 'joy', 'rahuljoy707@gmail.com', 1743002626, 'male', '1992-03-30', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `address_temp`
--
ALTER TABLE `address_temp`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `b_user`
--
ALTER TABLE `b_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Type_id` (`type_id`);

--
-- Indexes for table `b_user_temp`
--
ALTER TABLE `b_user_temp`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `Type_id` (`type_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`nominee_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `nominee_temp`
--
ALTER TABLE `nominee_temp`
  ADD PRIMARY KEY (`nominee_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `U_id` (`user_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_info_id`),
  ADD KEY `U_id` (`user_id`),
  ADD KEY `Nominee_id` (`nominee_id`),
  ADD KEY `Address_id` (`address_id`);

--
-- Indexes for table `user_info_temp`
--
ALTER TABLE `user_info_temp`
  ADD PRIMARY KEY (`user_info_id`),
  ADD KEY `U_id` (`user_id`),
  ADD KEY `Nominee_id` (`nominee_id`),
  ADD KEY `Address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_temp`
--
ALTER TABLE `address_temp`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b_user`
--
ALTER TABLE `b_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `b_user_temp`
--
ALTER TABLE `b_user_temp`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominee`
--
ALTER TABLE `nominee`
  MODIFY `nominee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominee_temp`
--
ALTER TABLE `nominee_temp`
  MODIFY `nominee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info_temp`
--
ALTER TABLE `user_info_temp`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `address_temp`
--
ALTER TABLE `address_temp`
  ADD CONSTRAINT `address_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `b_user`
--
ALTER TABLE `b_user`
  ADD CONSTRAINT `b_user_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `type` (`Type_id`);

--
-- Constraints for table `b_user_temp`
--
ALTER TABLE `b_user_temp`
  ADD CONSTRAINT `b_user_temp_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `type` (`Type_id`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `nominee`
--
ALTER TABLE `nominee`
  ADD CONSTRAINT `nominee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `nominee_temp`
--
ALTER TABLE `nominee_temp`
  ADD CONSTRAINT `nominee_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`),
  ADD CONSTRAINT `user_info_ibfk_2` FOREIGN KEY (`Nominee_id`) REFERENCES `nominee` (`Nominee_id`),
  ADD CONSTRAINT `user_info_ibfk_3` FOREIGN KEY (`Address_id`) REFERENCES `address` (`Address_id`);

--
-- Constraints for table `user_info_temp`
--
ALTER TABLE `user_info_temp`
  ADD CONSTRAINT `user_info_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `b_user` (`user_id`),
  ADD CONSTRAINT `user_info_temp_ibfk_2` FOREIGN KEY (`Nominee_id`) REFERENCES `nominee` (`Nominee_id`),
  ADD CONSTRAINT `user_info_temp_ibfk_3` FOREIGN KEY (`Address_id`) REFERENCES `address` (`Address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
