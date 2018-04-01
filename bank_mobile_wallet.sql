-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 06:54 PM
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
-- Database: `bank_mobile_wallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
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
-- Table structure for table `address_temps`
--

CREATE TABLE `address_temps` (
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
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `balance_id` int(11) NOT NULL,
  `balance` double DEFAULT NULL,
  `last_transaction_balance` double NOT NULL,
  `Update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_users`
--

CREATE TABLE `bank_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_users`
--

INSERT INTO `bank_users` (`user_id`, `user_name`, `user_password`, `type_id`, `user_create_date`, `user_active`) VALUES
(1, 'rahul', '123abc', 1, '2018-02-23 19:50:59', 1),
(2, 'rafi', '456abc', 2, '2018-02-23 19:50:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank_user_temps`
--

CREATE TABLE `bank_user_temps` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_user_temps`
--

INSERT INTO `bank_user_temps` (`user_id`, `user_name`, `user_password`, `type_id`, `user_create_date`, `user_active`) VALUES
(1, 'ummar', '789abc', 2, '2018-02-23 19:50:59', 0),
(2, 'abvc', '12345', 2, NULL, 0),
(3, 'abc', '123', 2, NULL, 0),
(4, 'abc', '123', 2, '2018-03-30 20:31:16', 0),
(5, 'abc', '123', 2, '2018-03-30 20:38:36', 0),
(6, 'abc', '123', 2, '2018-03-30 20:39:21', 0),
(7, 'abc', '123', 2, '2018-03-30 20:40:59', 0),
(8, 'abc', '123', 2, '2018-03-30 20:42:38', 0),
(9, 'abc', '123', 2, '2018-03-30 20:44:17', 0),
(10, 'abc', '123', 2, '2018-03-30 20:52:25', 0),
(11, 'abc', '123', 2, '2018-03-30 20:54:58', 0),
(12, 'abc', '123', 2, '2018-03-30 20:58:18', 0),
(13, 'abc', '123', 2, '2018-03-30 21:03:02', 0),
(14, 'abc', '123', 2, '2018-03-30 21:04:12', 0),
(15, 'abc', '123', 2, '2018-03-30 21:04:39', 0),
(16, 'abc', '123', 2, '2018-03-30 21:07:52', 0),
(17, 'abc', '123', 2, '2018-03-30 21:09:45', 0),
(18, 'abc', '123', 2, '2018-03-30 21:13:26', 0),
(19, 'abc', '123', 2, '2018-03-30 21:13:59', 0),
(20, 'abc', '123', 2, '2018-03-30 21:18:07', 0),
(21, 'abc', '123', 2, '2018-03-30 21:20:56', 0),
(22, 'abc', '12345', 2, '2018-03-31 08:12:26', 0),
(23, 'abc', '12345', 2, '2018-03-31 08:26:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(11) NOT NULL,
  `Card_no` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  `card_pin` int(50) NOT NULL,
  `expair_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `c_v_s_code` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `transactions_id` int(11) NOT NULL,
  `transactions_domination` varchar(255) NOT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `atm_place` varchar(255) DEFAULT NULL,
  `transactions_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transactions_ammount` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `nominee_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` longblob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nominee_temps`
--

CREATE TABLE `nominee_temps` (
  `nominee_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` longblob NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` int(11) NOT NULL,
  `transactions_domination` varchar(255) NOT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `atm_place` varchar(255) DEFAULT NULL,
  `transactions_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transactions_ammount` double NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE `user_informations` (
  `user_informations_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` longblob NOT NULL,
  `user_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_informations_temps`
--

CREATE TABLE `user_informations_temps` (
  `user_informations_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `contact_no` int(50) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `image` longblob NOT NULL,
  `user_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `address_temps`
--
ALTER TABLE `address_temps`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`balance_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bank_users`
--
ALTER TABLE `bank_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `bank_user_temps`
--
ALTER TABLE `bank_user_temps`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`nominee_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nominee_temps`
--
ALTER TABLE `nominee_temps`
  ADD PRIMARY KEY (`nominee_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD PRIMARY KEY (`user_informations_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `nominee_id` (`nominee_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `user_informations_temps`
--
ALTER TABLE `user_informations_temps`
  ADD PRIMARY KEY (`user_informations_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `nominee_id` (`nominee_id`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_temps`
--
ALTER TABLE `address_temps`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `balance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_users`
--
ALTER TABLE `bank_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_user_temps`
--
ALTER TABLE `bank_user_temps`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `nominee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominee_temps`
--
ALTER TABLE `nominee_temps`
  MODIFY `nominee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `user_informations_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_informations_temps`
--
ALTER TABLE `user_informations_temps`
  MODIFY `user_informations_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `address_temps`
--
ALTER TABLE `address_temps`
  ADD CONSTRAINT `address_temps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `balances_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `bank_users`
--
ALTER TABLE `bank_users`
  ADD CONSTRAINT `bank_users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`);

--
-- Constraints for table `bank_user_temps`
--
ALTER TABLE `bank_user_temps`
  ADD CONSTRAINT `bank_user_temps_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`);

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `nominees`
--
ALTER TABLE `nominees`
  ADD CONSTRAINT `nominees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `nominee_temps`
--
ALTER TABLE `nominee_temps`
  ADD CONSTRAINT `nominee_temps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`);

--
-- Constraints for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD CONSTRAINT `user_informations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`),
  ADD CONSTRAINT `user_informations_ibfk_2` FOREIGN KEY (`nominee_id`) REFERENCES `nominees` (`nominee_id`),
  ADD CONSTRAINT `user_informations_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);

--
-- Constraints for table `user_informations_temps`
--
ALTER TABLE `user_informations_temps`
  ADD CONSTRAINT `user_informations_temps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bank_users` (`user_id`),
  ADD CONSTRAINT `user_informations_temps_ibfk_2` FOREIGN KEY (`nominee_id`) REFERENCES `nominees` (`nominee_id`),
  ADD CONSTRAINT `user_informations_temps_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
