-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:04 PM
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
-- Database: `migrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `oneyeargb` decimal(6,0) UNSIGNED NOT NULL,
  `oneyearus` decimal(6,0) UNSIGNED NOT NULL,
  `fiveyeargb` decimal(6,0) UNSIGNED NOT NULL,
  `fiveyearus` decimal(6,0) UNSIGNED NOT NULL,
  `militarygb` decimal(6,0) UNSIGNED NOT NULL,
  `militaryus` decimal(6,0) UNSIGNED NOT NULL,
  `u21gb` decimal(6,0) UNSIGNED NOT NULL,
  `u21us` decimal(6,0) UNSIGNED NOT NULL,
  `minpricegb` decimal(6,0) UNSIGNED NOT NULL,
  `minpriceus` decimal(6,0) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `title` tinytext,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `class` char(20) NOT NULL,
  `user_level` tinyint(2) UNSIGNED NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state_country` char(25) NOT NULL,
  `zcode_pcode` char(10) NOT NULL,
  `phone` char(15) DEFAULT NULL,
  `secret` varchar(30) NOT NULL,
  `paid` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `title`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `class`, `user_level`, `address1`, `address2`, `city`, `state_country`, `zcode_pcode`, `phone`, `secret`, `paid`) VALUES
(34, 'Mr.', 'James', 'Smith', 'jsmith@myisp.co.uk', '$2y$10$TZRpkkmeP6fIl2hy1z2H6OV6WwL1ZcjHLTdrASs1jJm5N77a5kFie', '2018-06-20 10:08:01', '125', 0, '111 Main St', NULL, 'Key West', 'FL', '33040', NULL, 'Smith', 'Yes'),
(35, NULL, 'Jack', 'Smith', 'jsmith@outcook.com', '$2y$10$i9uYUhvXZqbkPuTWnukM7uLGqo/aksE6TlPCTqVVL4h3NtYmRmdpm', '2018-06-20 10:09:52', '125', 1, '111 Main St', NULL, 'Key West', 'FL', '33040', NULL, 'Smith', 'Yes'),
(36, 'Mr.', 'Mike', 'Rosoft', 'miker@myisp.com', '$2y$10$UmWacPiHiECQmJz6VpPS5u2ne5oLPswKyhDIF6PcwhbpV7BcYLtGa', '2018-06-20 10:13:51', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(37, 'Ms.', 'Olive', 'Branch', 'obranch@myisp.co.uk', '$2y$10$w/O9nBxDkm5j8E3apHVP3u6NH6O7VHUizH2TuZC5.Y4OpDXE2POBy', '2018-06-20 10:15:23', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(38, 'Mr.', 'Frank', 'Incense', 'fincense@myisp.net', '$2y$10$cEgamDEeI79Ka14BDoDjCeeV4z0xrNpYxNFeGdlJ9OIPqnvJxiVL2', '2018-06-20 10:16:49', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(39, 'Miss', 'Annie', 'Versary', 'aversary@myisp.com', '$2y$10$WFkNsErvl331HYWPx1I6yOMbXqRGjzJCY.xMYucu.AIOsDpw0dtZ2', '2018-06-20 10:18:51', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(40, 'Mr.', 'Terry', 'Fide', 'tfide@myisp.de', '$2y$10$RYRudOlD4i9dWjY.jlFpQOmiOEeT9YECQCanqTmsUwzs7RVWa0oPG', '2018-06-20 10:20:13', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(41, 'Mrs', 'Rose', 'Bush', 'rbush@myisp.co.uk', '$2y$10$d6N2TjV82II07r7VSpLmeeYt4DbmU8iUx8C8B/uZ03gAemFDxGDti', '2018-06-20 10:31:08', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(42, 'Mrs', 'Annie', 'Mossity', 'amositty@myisp.org.uk', '$2y$10$tgY2g9J0elkfrQIb7j2Jau4U275a/V08eaYsmQqnuwIOGEbTbYxAe', '2018-06-20 10:32:24', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(43, 'Mr.', 'Percey', 'Veer', 'pveer@myisp.com', '$2y$10$Lh4JbdwseMeV0ozvCxAmd.mLjZdkB6lg4OkhA3IxaEeESvO8ug97.', '2018-06-20 10:33:58', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(44, 'Mr.', 'Darrel', 'Doo', 'ddoo@myisp.co.uk', '$2y$10$Ko7pl4a2yNY1SkXFIb6LMu1ROoGvRFjYVMOU0cC6ypNoNZC95/6Xq', '2018-06-20 10:35:50', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(45, 'Mr.', 'Stan', 'Dard', 'sdard@myisp.net', '$2y$10$RKyMLj.ZvtBFwsOgqKS1.O5aW/tQgDdbcfzKpejiHvPtSMn8GzXQ2', '2018-06-20 10:37:14', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(46, 'Mrs', 'Nora', 'Bone', 'nbone@myisp.com', '$2y$10$BLioPYg2pLPz5yHnmnhqvOCr6QbAuGpg6KIhIPA//j8jTJqbXv8Fa', '2018-06-20 10:39:02', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes'),
(47, 'Mr.', 'Barry', 'Cade', 'bcade@myisp.co.uk', '$2y$10$P/7yQfboAVJvDfC275LuxerpTVaOs6yLhsZEeJ1SBoKX.Y8pCFrA2', '2018-06-20 10:40:33', '125', 0, '2 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 'London', 'Yes');

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
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
