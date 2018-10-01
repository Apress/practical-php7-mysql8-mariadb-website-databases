-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:07 PM
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
-- Database: `estatedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `ref_number` mediumint(6) UNSIGNED NOT NULL,
  `location` tinytext CHARACTER SET utf8 NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `type` tinytext CHARACTER SET utf8 NOT NULL,
  `mini_description` varchar(100) CHARACTER SET utf8 NOT NULL,
  `bedrooms` tinyint(2) NOT NULL,
  `thumb` varchar(45) CHARACTER SET utf8 NOT NULL,
  `status` tinytext CHARACTER SET utf8 NOT NULL,
  `full_description` varchar(600) CHARACTER SET utf8 NOT NULL,
  `full_picture` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`ref_number`, `location`, `price`, `type`, `mini_description`, `bedrooms`, `thumb`, `status`, `full_description`, `full_picture`) VALUES
(1000, 'South_Devon', '350000.00', 'Det-bung', 'New property in rural situation but close to village shops', 3, 'images/thumbs/house01-191.gif', 'Sold', '<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1001, 'North_Devon', '320000.00', 'Det-bung', 'Delightful rural location but close to village shops', 3, 'images/thumbs/house01-191.gif', 'Available', '<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1002, 'Mid_Devon', '300000.00', 'Det-bung', 'Delightful rural location but close to village shops', 3, 'images/thumbs/house01-191.gif', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1003, 'South_Devon', '400000.00', 'Det-house', 'Located on the outskirts of a thriving town. Stunning rural views.', 4, 'images/thumbs/house10-151.gif', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', 'images/pictures/house10.gif'),
(1004, 'North_Devon', '380000.00', 'Det-house', 'Semi rural location within walking distance of Townsville ', 4, 'images/thumbs/house10-151.gif', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1005, 'Mid_Devon', '360000.00', 'Det-house', 'Located on the edge of the town of Townsville.', 4, 'images/thumbs/house10-151.gif', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1006, 'Mid_Devon', '330000.00', 'Det-house', 'Semi rural with magnificent views of the countryside', 4, 'images/thumbs/house10-151.gif', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1007, 'South_Devon', '390000.00', 'Det-house', 'A town house with rural views. Located close to shops. ', 4, '\"images/thumbs/house12-102.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1008, 'Mid_Devon', '390000.00', 'Det-house', 'New build in rural loaction within walking distance of shops.', 4, '\"images/thumbs/house02-120.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1009, 'South_Devon', '390000.00', 'Det-house', 'A town house with character ', 4, '\"images/thumbs/house06-126.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1010, 'South_Devon', '295000.00', 'Det_house', 'In need of refurbishment', 4, '\"images/thumbs/house06-126.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1011, 'South_Devon', '295000.00', 'Det-house', 'In need of refurbishment', 4, '\"images/thumbs/house06-126.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1012, 'South_Devon', '350000.00', 'Semi-det-house', 'Recently refurbished throughout. Quiet urban location.', 3, '\"images/thumbs/house03-137-semi.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1013, 'South_Devon', '290000.00', 'Semi-det-house', 'Grade 2 Listed. Needs some refurbishment  Quiet rural location.', 3, '\"images/thumbs/house09-semi-110.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1014, 'South_Devon', '290000.00', 'Det-house', 'Modern town house in quiet location', 3, '\"images/thumbs/house12-102.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1015, 'North_Devon', '390000.00', 'Det-house', 'Modern town house in quiet location', 3, '\"images/thumbs/house10-151.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1016, 'North_Devon', '290000.00', 'Sem-det-bung', 'Modern bugalow in quiet location', 3, '\"images/thumbs/bung13-semi-thumb.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1017, 'North_Devon', '250000.00', 'Sem-det-bung', 'Modern bungalow in quiet location', 2, '\"images/thumbs/bung13-semi-thumb.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1018, 'North_Devon', '150000.00', 'Det-bung', 'Bungalow with character in rural location. Needs some refurbishment.', 2, '\"images/thumbs/house08.jpg\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1019, 'Mid_Devon', '150000.00', 'Det-bung', 'Bungalow with character in rural location. Needs some refurbishment.', 2, '\"images/thumbs/house08.jpg\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1020, 'South_Devon', '150000.00', 'Det-bung', 'Bungalow with character in rural location. Needs some refurbishment.', 2, '\"images/thumbs/house08.jpg\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1021, 'South_Devon', '290000.00', 'Det-house', 'Beach house. Needs some refurbishment.', 2, '\"images/thumbs/house05-104.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1022, 'Mid_Devon', '270000.00', 'Det-house', 'Rural locstion. House needs some refurbishment.', 3, '\"images/thumbs/house07-153.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1023, 'South_Devon', '280000.00', 'Det-house', 'Rural location. House needs some refurbishment.', 3, '\"images/thumbs/house07-153.gif\"', 'Available', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1024, 'South_Devon', '320000.00', 'Det-house', 'Rubbish', 3, '\"images/thumbs/house06-126.gif\"', 'Withdrawn', '	<p>A large and superbly presented detached house located in a beautiful \r\n	valley in South Devon. Four good size bedrooms, all en-suite. Three generous \r\n	reception rooms, luxury kitchen and main bathroom. &nbsp;&nbsp; <br>Double \r\n			Garage with radio operated doors. parking space for three cars in \r\n			front of the house. Large landscaped rear garden (approximately one \r\n			acre) with green house, summer house and hot tub. Neat front garden with rockery. </p>', ''),
(1025, 'South_Devon', '320000.00', 'Det-house', 'Rubbish', 3, '\"images/house06-126.gif\"', 'Withdrawn', '', ''),
(1026, 'Mid_Devon', '270000.00', 'Sem-det-bung', 'Recently built semi-detached bungalow in a pleasant cul-de-sac n and bathroom. Good gardens.', 3, '\"images/bung13-semi-thumb.gif\"', 'Available', '', ''),
(1027, 'North_Devon', '270000.00', 'Sem-det-bung', 'Recently built semi-detached bungalow in a pleasant cul-de-sac n and bathroom. Good gardens.', 3, '\"images/bung13-semi-thumb.gif\"', 'Available', '', ''),
(1028, 'Mid_Devon', '250000.00', 'Sem-det-bung', 'Recently refurbished semi- detached bungalow. Pleasant estate, quiet and tree lined. ', 3, '\"images/bung13-semi-thumb.gif\"', 'Available', '', ''),
(1029, 'Mid_Devon', '270000.00', 'Sem-det-bung', 'Located in a delightful village with post office and general stores. Landscaped rear garden. Rural v', 3, '\"images/bung13-semi-thumb.gif\"', 'Available', '', ''),
(1030, 'Mid_Devon', '270000.00', 'Sem-det-bung', 'Located in a delightful village with post office and general stores. Landscaped rear garden. Rural v', 3, '\"images/bung13-semi-thumb.gif\"', 'Available', '', ''),
(1031, 'North_Devon', '280000.00', 'Det-bung', 'Recently built house in an attractive location with full amenities, including school, general stores', 3, '\"images/house02-120.gif\"', 'Available', '', ''),
(1032, 'North_Devon', '290000.00', 'Semi-det-house', 'Delightful semi- detached house in a pleasant urban location', 2, '\"images/house03-137-semi.gif\"', 'Available', '', ''),
(1033, 'Mid_Devon', '250000.00', 'Semi-det-house', 'Well presented semi-detached house in pleasant surroundings.', 2, '\"images/house03-137-semi.gif\"', 'Available', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `password` char(60) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `user_level` tinyint(2) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `first_name`, `last_name`, `user_level`, `email`) VALUES
(10, '$2y$10$3YLxPRe/dEmD7VLlUTw/QO8.EUtUz9OB01CMlWH/tBv3.Dz8JiHZa', 'Jack', 'Smith', 1, 'jsmith@outcook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`ref_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `ref_number` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
