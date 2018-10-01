-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 06:37 PM
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
-- Database: `simpledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'Steve', 'Johnson', 'sjohnson@sjohnson.com', '$2y$10$lEmRKPYfu/Nb6ECtbmp7YOuIZeZDYuCnZKRmEBnQ6nRHDKJHdEgMK', '2018-04-26 15:11:58'),
(2, 'Mike', 'Rosolt', 'mrosolf@someplace.com', '$2y$10$9lXam45bwNHu4/zbu5FdXuW243F1R0GkQBDJr/juvV8wYr6lMZbau', '2018-04-28 15:15:32'),
(3, 'Tweedle', 'Dee-Deest', 'tdeedeest@themail.com', '$2y$10$.ewnSKbbeP6lSI4UF0BasOTnDyLzBH8mwcDM3wEM1hzoJAXYz2doK', '2018-04-28 15:17:29'),
(4, 'Annie', 'Versary', 'aversary@outcook.com', '$2y$10$5yz6IiFq/uZR4VdacjVRbOWTIA5tZCSLZ975mGZCoas3UHMMojN46', '2018-04-28 15:18:17'),
(5, 'Charley', 'Farnsbarns', 'cfransnarns@outcook.com', '$2y$10$WFX630.YbR5WQcYNBnMMueIbjIbo5.C6aDkUKVUfXBC1oNrqasmWa', '2018-04-28 15:19:50');

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
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
