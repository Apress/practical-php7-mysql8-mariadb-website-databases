-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:01 PM
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
-- Database: `finalpostal`
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
(1, 'Mr', 'Mike', 'Rosoft', 'miker@myisp.com', '$2y$10$UiiBhmXca.0/bwopveFq8uInuX.EVrecinUQYQG546WjAWwZLJNoe', '2017-12-06 08:43:41', '30', 0, '4 The Street', 'The Village', 'Townsville', 'USA', 'WA', '0123777888', '', 'Yes'),
(2, 'Mr', 'Jack', 'Smith', 'jsmith@outcook.com', '$2y$10$NjlsajfCITeb.oDXqu9Neuguh3PBKL5EaqZ5ClfW76nVSnW.W.XNO', '2017-12-06 08:47:24', '30', 1, '3 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', '', 'Yes'),
(4, 'Ms', 'Olive', 'Branch', 'obranch@myisp.co.uk', '$2y$10$5KM8jy5MwHIgfVchsdfE8OvuF1cT2VYqU6mte2CWBw1HjmEv3r.ES', '2017-12-06 12:20:33', '2', 0, '6 The Street', '', 'Townsville', 'UK', 'EX9 9PG', '01234777888', '', 'Yes'),
(5, 'Mr', 'Patrick', 'O\'Hara', 'pohara@myisp.org.uk', '$2y$10$0nmGDVmHdWusgFJRmVZADeL43Y7HCPViBrHj/Z2betxiMdMx5Y2sC', '2017-12-06 12:27:32', '30', 0, '5 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', '', 'Yes'),
(6, 'Mr', 'Frank', 'Incense', 'fincense@myisp.net', '$2y$10$KCQhEftEJouWPfuOOVoRVOECY/oJTluxHRr85fWlz6nsfN4OHtCie', '2017-12-06 17:02:16', '30', 0, '6 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PS', '', '', 'Yes'),
(7, 'Miss', 'Annie', 'Versary', 'aversary@myisp.com', '$2y$10$IrQE3TTkWzNm93FP/VYf.O/yMWDJDpIn/.qjrmvN.I97fvakynuza', '2017-12-06 17:11:44', '30', 0, '7 The Street', 'The Village', 'Townsville', 'UK', 'EXP 6PG', '01234777888', '', 'Yes'),
(8, 'Mrs', 'Rose', 'Bush', 'rbush@myisp.co.uk', '$2y$10$R2auBMKMe/Qw2fFr8D.S8eUEENUz8r.YUth5NHAyskNYupUzBen5O', '2017-12-06 17:18:30', '30', 0, '7 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', '', 'Yes'),
(9, 'Mrs', 'Annie', 'Mossity', 'amossity@myisp.org.uk', '$2y$10$amqmyEfaOfiZ0MkIzdO90uZMPw4Mi/4RR70nNd0nxaZSOlxlr.8DC', '2017-12-06 17:24:42', '30', 0, '4 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', '', 'Yes'),
(10, 'Mr', 'Percy', 'Veer', 'pveer@myisp.com', '$2y$10$Wvdx/YO4cCcOQvyMVVtapO3F/eiz2Ow3yU9VcczGMC.dcgwbgIXMS', '2017-12-06 17:28:53', '30', 0, '7 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PG', '01234777888', '', 'Yes'),
(11, 'Mr', 'Darrel', 'Doo', 'ddoo@myisp.co.uk', '$2y$10$cTmJVcuUmTpCOIdQJ8MG3uwLmG7M7V3iE8zPXiNW2PQEdDQZMBftO', '2017-12-06 17:39:30', '30', 0, '5 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '', '', 'Yes'),
(12, 'Mr', 'Stan', 'Dard', 'sdard@myisp.net', '$2y$10$YUYnU8UvOF/WUJ5h4VK4Qe.I48ZcAbedjPiDekKHlODduqGdJoI9i', '2017-12-06 18:02:04', '30', 0, '3 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '01234777888', '', 'Yes'),
(13, 'Mrs', 'Nora', 'Bone', 'nbone@myisp.com', '$2y$10$k9sMvE001164jjzJLs.OpOmb9LtluUEbR4GQ4RT5/rvSPNIqbL6gC', '2017-12-07 17:39:34', '30', 0, '6 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', '', 'Yes'),
(14, 'Mr', 'Barry', 'Cade', 'bcade@myisp.co.uk', '$2y$10$TOr.IZq/joHIKSk0Oo.jE.yWau48sUSgtC5TzKJ0sl0AoO2Bsk3lW', '2017-12-08 12:16:58', '30', 0, '5 The Street', '', 'Townsville', 'UK', 'EX7 9PG', '01234777888', '', 'Yes'),
(16, 'Miss', 'Lynn', 'Seed', 'lseed@myisp.com', '$2y$10$nEs3Zhh4V5ZznpcPzGs9gOWupjY2NgV87DPpLu2DjqsdyBNRjf4/C', '2017-12-16 20:03:16', '30', 0, '6 The Street', '', 'Townsville', 'UK', 'EX24 6PG', '01234777888', '', 'Yes'),
(17, 'Mr', 'Barry', 'Tone', 'btone@myisp.net', '$2y$10$w4zMq7ij7NmVDeBBKDSmbu963EwchZwAHPZmgZmTQAQ8Gha2jTD5W', '2017-12-16 20:16:40', '30', 0, '2 The Street', '', 'Townsville', 'USA', 'CA12345', '', '', 'Yes'),
(30, 'Mr', 'Terry', 'Fide', 'tfide@myisp.de', '$2y$10$lePdxFz7ZKn/bJ41BS0h/ehWyIL2ZgK123iPQJahNCaRjgxVY3Rfq', '2017-12-29 11:28:43', '30', 0, '2 The Street', 'The Village', 'Townsville', 'Germany', 'BL1234', '', '', 'Yes'),
(31, 'Miss', 'Dee', 'Jected', 'djected@myisp.org.uk', '$2y$10$ujpV7w4blsTdQFWOsE1fiOFYtj9zN4w0WcK5V4WJ60Pc5HWodWlGC', '2017-12-29 11:48:04', '30', 0, '3 The Street', 'The Village', 'Townsville', 'UK', 'EX3 1TH', '', '', 'Yes'),
(32, 'Mr', 'James', 'Smith', 'jsmith@myisp.co.uk', '$2y$10$Yu.c/cw/TSFa9vcMBGAfAe5vzyOwp3SZarBVc/9vEksfp.F8BzSiW', '2017-12-29 11:58:51', '30', 0, '2 The Street', '', 'Townsville', 'UK', 'EX24 6PS', '01234777888', '', 'Yes');

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
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
