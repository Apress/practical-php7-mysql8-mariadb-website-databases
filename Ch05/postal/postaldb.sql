-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 06:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `oneyeargb` decimal(6,0) NOT NULL,
  `oneyearus` decimal(6,0) NOT NULL,
  `fiveyeargb` decimal(6,0) NOT NULL,
  `fiveyearus` decimal(6,0) NOT NULL,
  `militarygb` decimal(6,0) NOT NULL,
  `militaryus` decimal(6,0) NOT NULL,
  `u21gb` decimal(6,0) NOT NULL,
  `u21us` decimal(6,0) NOT NULL,
  `minpricegb` decimal(6,0) NOT NULL,
  `minpriceus` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`oneyeargb`, `oneyearus`, `fiveyeargb`, `fiveyearus`, `militarygb`, `militaryus`, `u21gb`, `u21us`, `minpricegb`, `minpriceus`) VALUES
('30', '40', '125', '140', '5', '8', '2', '3', '15', '20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` char(60) COLLATE utf8_bin NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) NOT NULL,
  `address1` varchar(50) COLLATE utf8_bin NOT NULL,
  `address2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `state_country` char(25) COLLATE utf8_bin NOT NULL,
  `zcode_pcode` char(10) COLLATE utf8_bin NOT NULL,
  `phone` char(15) COLLATE utf8_bin DEFAULT NULL,
  `paid` enum('No','Yes') COLLATE utf8_bin NOT NULL,
  `class` char(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `user_level`, `address1`, `address2`, `city`, `state_country`, `zcode_pcode`, `phone`, `paid`, `class`) VALUES
(1, 'James', 'Smith', 'jsmith@myisp.com', '$2y$10$9A7tLasMBRhpgHGXvAR3o.7o9TTl8MCI90FjVqe2NxtreSqMwU5Ze', '2017-12-08 18:13:48', 1, '2 The Street', NULL, 'Townsville', 'CA', '33040', '3055551111', 'No', '125'),
(2, 'Jack', 'Smith', 'jsmith@outcook.com', '$2y$10$7bRW0hJkQFQs6QKxLYm4Cud/Mq0/opjEGLdLPECCWoi9EScVLNg32', '2017-12-08 18:18:35', 0, '2 The Street', NULL, 'Townsville', 'CA', '33040', '3055551111', 'No', '30'),
(3, 'Mike', 'Rosoft', 'miker@myisp.com', '$2y$10$2ozl5Ds/F.IdEDGnfAovku5DxQubPbzxfeFKCpZDsi74wLEmeCeSy', '2017-12-08 18:19:43', 0, '2 The Street', NULL, 'Townsville', 'CA', '33040', '3055551111', 'No', '2'),
(4, 'Olive', 'Branch', 'obranch@myisp.co.uk', '$2y$10$IiCEJot1JJ3X2WUjAx9e4ecQL2eUbBsCbUqNwljgxrX7cLtKebpAe', '2017-12-08 18:21:08', 0, '2 The Street', 'The Village', 'Townsville', 'CA', '33040', '3055551111', 'No', '2'),
(5, 'Frank', 'Incense', 'incense@myisp.net', '$2y$10$Tm6mFieRmBMAXPS4VqE.aubkadLmW2clnrDkTS3ZKbyXFvlNBkZzu', '2017-12-08 18:22:53', 0, '2 The Street', 'The Village', 'Townsville', 'CA', '33040', NULL, 'No', '15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
