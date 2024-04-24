-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 08:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currency_exchange2`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency_accounts`
--

CREATE TABLE `currency_accounts` (
  `currency_account_id` int(10) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `user_id` int(10) NOT NULL,
  `exchange_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency_accounts`
--

INSERT INTO `currency_accounts` (`currency_account_id`, `balance`, `user_id`, `exchange_id`) VALUES
(41, 0.00, 18, 3),
(42, 0.00, 19, 3),
(43, 1681.42, 20, 3),
(44, 50.32, 21, 3),
(45, 1414.09, 20, 35),
(47, 4788.74, 20, 26),
(48, 12113.41, 20, 24),
(49, 12440.40, 21, 31),
(50, 232.20, 21, 29),
(51, 0.00, 21, 38),
(52, 0.00, 22, 3),
(53, 233.36, 22, 33),
(54, 400060.15, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `evidence_of_funds`
--

CREATE TABLE `evidence_of_funds` (
  `evidence_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `evidence_img_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evidence_of_funds`
--

INSERT INTO `evidence_of_funds` (`evidence_id`, `user_id`, `evidence_img_path`) VALUES
(6, 21, 'imgs/evidence/Evidence202404247878.jpg'),
(7, 23, 'imgs/evidence/Evidence20240424716175.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `exchange_Id` int(10) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `exchange_rate` float NOT NULL,
  `currency_symbol` varchar(3) DEFAULT NULL,
  `currency_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`exchange_Id`, `currency_name`, `exchange_rate`, `currency_symbol`, `currency_image`) VALUES
(3, 'Pound', 1, '£', 'pound.png'),
(18, 'Australian Dollar', 1.9197, 'AU$', 'australlia.png'),
(19, 'Canadian Dollar', 1.6993, 'CA$', 'canada.png'),
(20, 'Chinese Yuan', 9.0272, 'CN¥', 'china.png'),
(21, 'Czech Koruna', 29.3618, 'Kč', 'czech.png'),
(22, 'Danish Krone', 8.6687, 'kr.', 'denmark.png'),
(23, 'Euro', 1.1621, '€', 'Euro.png'),
(24, 'Hong Kong Dollar', 9.7426, 'HK$', 'hongKong.png'),
(25, 'Hungarian Forint', 457.298, 'Ft', 'hungary.png'),
(26, 'Indian Rupee', 103.575, '₹', 'india.png'),
(27, 'Israeli Shekel', 4.682, '₪', 'israel.png'),
(28, 'Japanese Yen', 192.457, '¥', 'japan.png'),
(29, 'Malaysian ringgit', 5.943, 'MYR', 'malaysa.png'),
(30, 'New Zealand Dollar', 2.0952, 'NZ$', 'newz.png'),
(31, 'Norwegian Krone', 13.6056, 'NOK', 'Norway.jpg'),
(32, 'Polish Zloty', 5.0106, 'Zł', 'poland.png'),
(33, 'Saudi Riyal', 4.6634, 'SAR', 'arabia.png'),
(34, 'Singapore Dollar', 1.6926, 'S$', 'singapore.png'),
(35, 'South African Rand', 23.7858, 'ZAR', 'southaf.png'),
(36, 'South Korean Won', 1707.5, '₩', 'southk.png'),
(37, 'Swedish Krona', 13.4687, 'SEK', 'sweden.png'),
(38, 'Swiss Franc', 1.1319, 'Fr.', 'swiss.png'),
(39, 'Taiwan Dollar', 40.4831, 'NT$', 'taiwan.png'),
(40, 'Thai Baht', 45.9524, '฿', 'thailand.png'),
(41, 'Turkish Lira', 40.4768, '₺', 'turkey.png'),
(42, 'US Dollar', 1.2433, '$', 'US.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `tranfer_id` int(10) NOT NULL,
  `transfer_date` date NOT NULL,
  `transfer_amount` decimal(10,2) NOT NULL,
  `account_from` int(10) DEFAULT NULL,
  `account_to` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`tranfer_id`, `transfer_date`, `transfer_amount`, `account_from`, `account_to`, `user_id`) VALUES
(95, '2024-04-17', 3000.00, NULL, 43, 20),
(96, '2024-04-17', 10.00, 45, 43, 20),
(98, '2024-04-17', 1243.00, 48, 43, 20),
(99, '2024-04-17', 46.00, 47, 43, 20),
(101, '2024-04-17', 5962.20, NULL, 50, 21),
(102, '2024-04-17', 300.00, 44, 50, 21),
(103, '2024-04-17', 5430.00, 49, 50, 21),
(104, '2024-04-17', 10.00, 45, 43, 20),
(105, '2024-04-17', 10.00, 43, 45, 20),
(106, '2024-04-17', 50.00, NULL, 52, 22),
(107, '2024-04-17', 50.00, 52, 53, 22),
(108, '2024-04-24', 30.00, NULL, 54, 23),
(112, '2024-04-24', 400000.00, NULL, 54, 23),
(113, '2024-04-24', 400000.00, NULL, 54, 23),
(114, '2024-04-24', 30.00, NULL, 45, 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `pword` mediumtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `dob` date NOT NULL,
  `suspicious_account` tinyint(1) NOT NULL DEFAULT 0,
  `admin_account` tinyint(1) NOT NULL DEFAULT 0,
  `approved_account` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `first_name`, `surname`, `pword`, `email`, `mobile_number`, `dob`, `suspicious_account`, `admin_account`, `approved_account`) VALUES
(18, 'bruh', 'bruh', '$2y$10$JP7KiZTwbQQwj.H.JoYvNOaft3wokDvNWeQqXf4wTZXOy0pwBy8KK', 'bruh3@hotmail.com', 0, '2024-05-03', 0, 0, 0),
(19, 'admin', 'admin', '$2y$10$E7OG2i515G10nVf3XCvU2esku.KhMoPb7BhlT4P3Pme3CffCEUrb.', 'admin@gmail.com', 0, '2024-04-27', 0, 1, 0),
(20, 'test', 'test', '$2y$10$Oz5RAWJqDkll7fTdzQ5RxeKS/m0wMznRITSYiL1PYFwn2uJ.BeI1W', 'test@gmail.com', 2147483647, '2024-04-01', 1, 0, 0),
(21, 'test2', 'test2', '$2y$10$WrnZHCLavOr7/z0vmDfM2OXHjYSU/n80LP7vetH5ecXpqCW9MZYSq', 'test2@gmail.com', 0, '2021-02-17', 1, 0, 0),
(22, 'test3', 'test3', '$2y$10$0mD3LXrqGWzSVLN1QuYmjeUcQemi/457z4Dk69LXDdA4TsN3TmDdO', 'test3@gmail.com', 0, '2024-01-18', 0, 0, 1),
(23, 'demo2', 'demo', '$2y$10$ZdefNNRe68LtuNNRXFxmjO7kzk9y2Noe.3Z16qDMOtVPRR0CiWutC', 'demo@gmail.com', 2147483647, '1996-06-24', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency_accounts`
--
ALTER TABLE `currency_accounts`
  ADD PRIMARY KEY (`currency_account_id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `exchange` (`exchange_id`);

--
-- Indexes for table `evidence_of_funds`
--
ALTER TABLE `evidence_of_funds`
  ADD PRIMARY KEY (`evidence_id`),
  ADD KEY `suspicious_user` (`user_id`);

--
-- Indexes for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD PRIMARY KEY (`exchange_Id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`tranfer_id`),
  ADD KEY `user_transfer` (`user_id`),
  ADD KEY `account_from` (`account_from`),
  ADD KEY `account_to` (`account_to`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency_accounts`
--
ALTER TABLE `currency_accounts`
  MODIFY `currency_account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `evidence_of_funds`
--
ALTER TABLE `evidence_of_funds`
  MODIFY `evidence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `exchange_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `tranfer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `currency_accounts`
--
ALTER TABLE `currency_accounts`
  ADD CONSTRAINT `exchange` FOREIGN KEY (`exchange_id`) REFERENCES `exchange_rates` (`exchange_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evidence_of_funds`
--
ALTER TABLE `evidence_of_funds`
  ADD CONSTRAINT `suspicious_user` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `account_from` FOREIGN KEY (`account_from`) REFERENCES `currency_accounts` (`currency_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_to` FOREIGN KEY (`account_to`) REFERENCES `currency_accounts` (`currency_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_transfer` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
