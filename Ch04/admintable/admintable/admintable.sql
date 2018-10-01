-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 06:53 PM
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
-- Database: `admintable`
--

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `oneyeargb` decimal(6,0) UNSIGNED NOT NULL,
  `oneyearus` decimal(6,0) UNSIGNED NOT NULL,
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
('30', '40', '125', '140', '5', '8', '2', '3', '15', '20'),
('30', '40', '125', '140', '5', '8', '2', '3', '15', '20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `user_level`) VALUES
(1, 'James', 'Smith', 'jsmith@myisp.co.uk', '$2y$10$fB/cbTyl.l0V3/iOpxdTHelBwoXrtoI0R8rksyMyLz5yZByIZvNgi', '2017-11-28 10:34:46', 0),
(3, 'Jack', 'Smith', 'jsmith@outcook.com', '$2y$10$pf7khel0dwUCjX1211Pgpue73otgQ94gfviGe5WyH6IUJHcIlww3i', '2017-11-28 10:42:11', 1),
(4, 'Mike', 'Rosoft', 'miker@myisp.com', '$2y$10$02usUgNBg9ITWL4b43Qwq.BbCncs4oobO2NVJUjgnTDlaICXFw/TO', '2017-11-28 10:44:12', 0),
(5, 'Olive', 'Branch', 'obranch@myisp.co.uk', '$2y$10$MSzF.LyLKAjcBK29iAyGtu79kKljLgjow4geSX.MubrC9pzLPN566', '2017-11-28 10:45:05', 0),
(6, 'Frank', 'Incense', 'fincense@myisp.net', '$2y$10$sm8haAl94e.LzgD9hhbd1.GbIhFZ3bPNWiHwHfNCQAUlA1n421see', '2017-11-28 10:45:52', 0),
(34, 'Terry', 'Fide', 'tfide@myisp.de', '$2y$10$IO8Gcy7MWk9TzfV2HjVg4Oao46UfusHN.fCnfrl8eIh4EyeDMYl4u', '2018-05-31 15:14:53', 0),
(35, 'Rose', 'Bush', 'rbush@myisp.co.uk', '$2y$10$iro7lP10KjUV76voOlJfGecUU9BmDieBbntc0hRzA7BY3ajy0LUWK', '2018-05-31 15:18:02', 0),
(36, 'Annie', 'Versary', 'aversary@myisp.com', '$2y$10$F6Ft/m92sn6QuPyPn4/hNeGJlqmN/6lDtUCHNL/o5cH7KeAZkoRuG', '2018-05-31 15:19:13', 0),
(37, 'Percy', 'Veer', 'pveer@myisp.com', '$2y$10$uAAkr6vvQOEEl3yl4aoy6.p5.vR5C8z8xUFr1DAH6bdM6b2.cx6JS', '2018-05-31 17:06:02', 0),
(38, 'Stan', 'Dard', 'sdard@myisp.net', '$2y$10$2KpmjaxVIXrobj.eCfyHHu97dNKy5goAlVnFkuh233.JLz3DB3FLW', '2018-05-31 17:06:57', 0),
(39, 'Nora', 'Bone', 'nbone@myisp.com', '$2y$10$Q5g7vfrMpcgufwnxdCvoe.yTjdo7MfzQy5OGuIHDpNdqmYWj6PL7i', '2018-05-31 17:07:49', 0),
(40, 'Barry', 'Cade', 'bcade@myisp.co.uk', '$2y$10$IT8LaiC8USftBTU5Ni/zauaeYLpwDlDSmtuV.Spwrtl5jkmg.kBgK', '2018-05-31 17:08:39', 0),
(41, 'Dee', 'Jected', 'djected@myisp.ork.uk', '$2y$10$OFuKWogf2M5YyPW2cuCs5.2IPfDdU5K65gUlww0oOuRHTWlcUstgm', '2018-05-31 17:09:30', 0),
(42, 'Lynn', 'Steed', 'lseed@myisp.com', '$2y$10$Umfyip63mNyRks4Dzd5or.ul/agTTWtbaiDrXLjtudz7kIH/MfE4C', '2018-05-31 17:10:21', 0),
(43, 'Barry', 'Tone', 'btone@myisp.net', '$2y$10$5f4cMkdMuOvx7nebpEWJNOvNLyeDbCWE6HRnQmm0x1.frZw2/pmDy', '2018-05-31 17:11:11', 0),
(44, 'Helen', 'Back', 'hback@myisp.net', '$2y$10$uRQYFnrANSWR7VFu4zUOH.KwwvV/9cEbbQo6KlRakC94SamEC9SO2', '2018-05-31 17:12:02', 0),
(45, 'Justin', 'Case', 'jcase@myisp.co.uk', '$2y$10$n3/2E6ktCuT2xzSZ6cRhAuLUxe3ZaUdPlmkhDj2egeU7ffjj2FGZS', '2018-05-31 17:12:52', 0),
(46, 'Jerry', 'Attrik', 'jattrik@myisp.com', '$2y$10$7CibFWAgTBvB5PHanwTvjOJZTc.3/i6YR055q4gxjQ4X834KxHa6G', '2018-05-31 17:13:55', 0),
(47, 'James', 'Smith', 'jimsmith@myisp.org.uk', '$2y$10$DFVql/p1AkUsNRaajux1zuuR7NEaPdHjT1.Aur5mUt3m/gUZkEUnO', '2018-06-01 14:24:00', 0),
(48, 'James', 'Smith', 'James.smith@myisp.com', '$2y$10$FNg963aulhjXoWUZZvBhwuD41mAY5he4glifJLZy1aGlsjzu7zkLu', '2018-06-01 14:24:46', 0),
(49, 'James', 'Smith', 'Jimmy.smith@myisp.co.uk', '$2y$10$641BVhWNl/WbS7LxHaI9Hemou9tGXa4OKwm4yAFHiSllYUpGRF172', '2018-06-01 14:25:38', 0),
(50, 'James', 'Smith', 'jims@myisp.net', '$2y$10$49UnXz7NG/rJQbH5VmhPzeoBhGJO6HmknCdbqXmYV2/7pbzdBlXBy', '2018-06-01 14:26:32', 0),
(52, 'Phyllis', 'Tine', 'ptine@myisp.co.uk', '$2y$10$gJO4wgQwGdZ3/CylK7LtbOgOiXJBYOw1KflYI/Tk8ExGAJ7CzwA/O', '2018-06-02 13:13:40', 0);

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
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
