-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 10:47 PM
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
-- Database: `customdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(8) UNSIGNED NOT NULL,
  `thumb` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(6,2) UNSIGNED NOT NULL,
  `medium` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `mini_descr` varchar(150) NOT NULL,
  `ppcode` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `thumb`, `type`, `price`, `medium`, `artist`, `mini_descr`, `ppcode`) VALUES
(1, '\"images/aw-brown-vessel-thumb.jpg\"', 'Still-life', '60.00', 'Oil-painting', 'Adrian-W-West', 'First exhibited in Coventry City Art Gallery 1968. Painted on durable tempered hardboard.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(2, '\"images/k-copper-kettle-thumb.jpg\"', 'Still-life', '750.00', 'Oil-painting', 'James-Kessell', 'James Kessell (RA and RABA) painted this on tempered hard board for an appreciative audience. It was exhibited at the Birmingham Art Gallery in 1967.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(3, '\"images/aw-white-jug-thumb.jpg\"', 'Still-life', '70.00', 'Oil-painting', 'Adrian-W-West', 'Painted on tempered hardboard in 1968 and exhibited first at Coventry City Art Gallery in the same year.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(4, '\"images/rsb-beer-thumb.jpg\"', 'Nature', '40.00', 'Colored-etching', 'Roger-St-Barbe', 'Looking back at Beer beach, South East Devon. ', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(5, '\"images/rsb-blue-thumb.jpg\"', 'Nature', '40.00', 'Colored-etching', 'Roger-St-Barbe', 'Roger produces excellent etchings of Devon\'s native butterflies. ', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(6, '\"images/rsb-fritillary-thumb.jpg\"', 'Nature', '40.00', 'Colored-etching', 'Roger-St-Barbe', 'The silver washed fritillary is a less common Devon butterfly.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(7, '\"images/rsb-lyme-thumb.jpg\"', 'Nature', '40.00', 'Colored-etching', 'Roger-St-Barbe', 'Lyme Regis is a popular Devon seaside resort with a spectacular sea wall called the Cobb.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(22, '\"images/rsb-lyme-thumb.jpg\"', 'Landscape', '40.00', 'Colored-etching', 'Roger-St-Barbe', 'Lyme Regis is a popular Devon seaside resort with a spectacular sea wall called the Cobb.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(23, '\"images/k-abstract-squares-thumb.jpg\"', 'Abstract', '800.00', 'Oil-painting', 'James-Kessell', 'Composition of squares and circles in tasteful pastel colors. Painted on high quality tempered board.', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>'),
(21, '\"images/rsb-beer-thumb.jpg\"', 'Landscape', '40.00', 'Colored-etching', 'Roger-St-Barbe', 'Looking back at Beer beach, South East Devon. ', '<form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\"> <input name=\"cmd\" value=\"_s-xclick\" type=\"hidden\"> <input name=\"hosted_button_id\" value=\"5159065\" type=\"hidden\"> <p> <input src=\"https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online.\" style=\"float: left;\" border=\"0\" type=\"image\"> <img alt=\"\" src=\"https://www.paypal.com/en_GB/i/scr/pixel.gif\" border=\"0\" height=\"1\" width=\"1\"></p> </form>');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(8) UNSIGNED NOT NULL,
  `afname` varchar(30) DEFAULT NULL,
  `amname` varchar(30) DEFAULT NULL,
  `alname` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `afname`, `amname`, `alname`) VALUES
(1, 'Adrian', 'W', 'West'),
(2, 'Roger', 'St.', 'Barbe'),
(3, 'James', '', 'Kessell'),
(4, 'Charlie', 'S', 'Farnsbarns');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) UNSIGNED NOT NULL,
  `buyer_id` int(8) UNSIGNED NOT NULL,
  `total_price` decimal(7,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `art_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`content_id`, `order_id`, `art_id`, `quantity`, `price`) VALUES
(1, 2, 4, 1, '17.99'),
(2, 3, 4, 1, '17.99'),
(3, 4, 2, 1, '14.99'),
(4, 5, 3, 1, '16.99'),
(5, 6, 1, 1, '19.99'),
(6, 7, 1, 1, '60.00'),
(7, 8, 2, 1, '99.99'),
(8, 15, 1, 1, '60.00'),
(9, 16, 1, 1, '60.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ord_details_id` int(8) UNSIGNED NOT NULL,
  `order_id` int(8) UNSIGNED NOT NULL,
  `art_id` int(8) UNSIGNED NOT NULL,
  `dispatch_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `user_id` mediumint(6) UNSIGNED NOT NULL,
  `title` tinytext NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `addr1` varchar(50) NOT NULL,
  `addr2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state_country` char(25) NOT NULL,
  `zcode_pcode` char(10) NOT NULL,
  `phone` char(15) DEFAULT NULL,
  `user_level` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `title`, `fname`, `lname`, `email`, `psword`, `registration_date`, `addr1`, `addr2`, `city`, `state_country`, `zcode_pcode`, `phone`, `user_level`) VALUES
(1, 'Mr', 'Mike', 'Rosoft', 'miker@myisp.com', '$2y$10$UiiBhmXca.0/bwopveFq8uInuX.EVrecinUQYQG546WjAWwZLJNoe', '2017-12-06 08:43:41', '4 The Street', 'The Village', 'Townsville', 'USA', 'WA', '0123777888', 0),
(2, 'Mr', 'Jack', 'Smith', 'jsmith@outcook.com', '44fc2837cca3d8994cba9d02d94a15c1fe7b1d66', '2017-12-06 08:47:24', '3 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', 0),
(4, 'Ms', 'Olive', 'Branch', 'obranch@myisp.co.uk', '$2y$10$5KM8jy5MwHIgfVchsdfE8OvuF1cT2VYqU6mte2CWBw1HjmEv3r.ES', '2017-12-06 12:20:33', '6 The Street', '', 'Townsville', 'UK', 'EX9 9PG', '01234777888', 0),
(5, 'Mr', 'Patrick', 'O\'Hara', 'pohara@myisp.org.uk', '$2y$10$0nmGDVmHdWusgFJRmVZADeL43Y7HCPViBrHj/Z2betxiMdMx5Y2sC', '2017-12-06 12:27:32', '5 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', 0),
(6, 'Mr', 'Frank', 'Incense', 'fincense@myisp.net', '$2y$10$KCQhEftEJouWPfuOOVoRVOECY/oJTluxHRr85fWlz6nsfN4OHtCie', '2017-12-06 17:02:16', '6 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PS', '', 0),
(7, 'Miss', 'Annie', 'Versary', 'aversary@myisp.com', '$2y$10$IrQE3TTkWzNm93FP/VYf.O/yMWDJDpIn/.qjrmvN.I97fvakynuza', '2017-12-06 17:11:44', '7 The Street', 'The Village', 'Townsville', 'UK', 'EXP 6PG', '01234777888', 0),
(8, 'Mrs', 'Rose', 'Bush', 'rbush@myisp.co.uk', '$2y$10$R2auBMKMe/Qw2fFr8D.S8eUEENUz8r.YUth5NHAyskNYupUzBen5O', '2017-12-06 17:18:30', '7 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', 0),
(9, 'Mrs', 'Annie', 'Mossity', 'amossity@myisp.org.uk', '$2y$10$amqmyEfaOfiZ0MkIzdO90uZMPw4Mi/4RR70nNd0nxaZSOlxlr.8DC', '2017-12-06 17:24:42', '4 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 0),
(10, 'Mr', 'Percy', 'Veer', 'pveer@myisp.com', '$2y$10$Wvdx/YO4cCcOQvyMVVtapO3F/eiz2Ow3yU9VcczGMC.dcgwbgIXMS', '2017-12-06 17:28:53', '7 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PG', '01234777888', 0),
(11, 'Mr', 'Darrel', 'Doo', 'ddoo@myisp.co.uk', '$2y$10$cTmJVcuUmTpCOIdQJ8MG3uwLmG7M7V3iE8zPXiNW2PQEdDQZMBftO', '2017-12-06 17:39:30', '5 The Street', 'The Village', 'Townsville', 'UK', 'EX7 9PP', '', 0),
(12, 'Mr', 'Stan', 'Dard', 'sdard@myisp.net', '$2y$10$YUYnU8UvOF/WUJ5h4VK4Qe.I48ZcAbedjPiDekKHlODduqGdJoI9i', '2017-12-06 18:02:04', '3 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '01234777888', 0),
(13, 'Mrs', 'Nora', 'Bone', 'nbone@myisp.com', '$2y$10$k9sMvE001164jjzJLs.OpOmb9LtluUEbR4GQ4RT5/rvSPNIqbL6gC', '2017-12-07 17:39:34', '6 The Street', '', 'Townsville', 'UK', 'EX7 9PP', '', 0),
(14, 'Mr', 'Barry', 'Cade', 'bcade@myisp.co.uk', '$2y$10$TOr.IZq/joHIKSk0Oo.jE.yWau48sUSgtC5TzKJ0sl0AoO2Bsk3lW', '2017-12-08 12:16:58', '5 The Street', '', 'Townsville', 'UK', 'EX7 9PG', '01234777888', 0),
(16, 'Miss', 'Lynn', 'Seed', 'lseed@myisp.com', '$2y$10$nEs3Zhh4V5ZznpcPzGs9gOWupjY2NgV87DPpLu2DjqsdyBNRjf4/C', '2017-12-16 20:03:16', '6 The Street', '', 'Townsville', 'UK', 'EX24 6PG', '01234777888', 0),
(17, 'Mr', 'Barry', 'Tone', 'btone@myisp.net', '$2y$10$w4zMq7ij7NmVDeBBKDSmbu963EwchZwAHPZmgZmTQAQ8Gha2jTD5W', '2017-12-16 20:16:40', '2 The Street', '', 'Townsville', 'USA', 'CA12345', '', 0),
(30, 'Mr', 'Terry', 'Fide', 'tfide@myisp.de', '$2y$10$lePdxFz7ZKn/bJ41BS0h/ehWyIL2ZgK123iPQJahNCaRjgxVY3Rfq', '2017-12-29 11:28:43', '2 The Street', 'The Village', 'Townsville', 'Germany', 'BL1234', '', 0),
(31, 'Miss', 'Dee', 'Jected', 'djected@myisp.org.uk', '$2y$10$ujpV7w4blsTdQFWOsE1fiOFYtj9zN4w0WcK5V4WJ60Pc5HWodWlGC', '2017-12-29 11:48:04', '3 The Street', 'The Village', 'Townsville', 'UK', 'EX3 1TH', '', 0),
(32, 'Mr', 'James', 'Smith', 'jsmith@myisp.co.uk', '$2y$10$Yu.c/cw/TSFa9vcMBGAfAe5vzyOwp3SZarBVc/9vEksfp.F8BzSiW', '2017-12-29 11:58:51', '2 The Street', '', 'Townsville', 'UK', 'EX24 6PS', '01234777888', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `art_name` (`thumb`,`price`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `buyer_id` (`buyer_id`,`order_date`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ord_details_id`),
  ADD KEY `order_id` (`order_id`,`art_id`,`dispatch_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ord_details_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
