-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 07:14 PM
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
-- Database: `msgboarddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `post_id` int(8) UNSIGNED NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `message` varchar(200) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`post_id`, `user_name`, `subject`, `message`, `post_date`) VALUES
(1, 'lilythepink', 'Wise Quotes', '\"Adversity causes some men to break: others to break records\" William Arthur Ward', '2018-07-02 21:21:54'),
(2, 'mechanic7', 'Comical Quotes', '\"I love deadlines. I like the whooshing sound they make as they fly by\" Douglas Adams', '2018-06-26 19:52:48'),
(3, 'lilythepink', 'Comical Quotes', '\"Golf is a good walk spoiled\" Mark Twain', '2018-06-26 16:02:56'),
(4, 'lilythepink', 'Comical Quotes', '\"Life is one darned thing after another\" Mark Twain', '2018-06-26 16:37:23'),
(5, 'giantstep12', 'Comical Quotes', 'Jack Benny once said \"Give me golf clubs, fresh air and a beautiful partner and you can keep the golf clubs and fresh air\"', '2018-06-26 18:17:54'),
(6, 'mythking', 'Wise Quotes', '\"Nothing great was ever achieved without great enthusiasm\" Ralph Waldo Emerson', '2018-07-03 12:29:31'),
(7, 'mythking', 'Wise Quotes', '\"Wise sayings often fall on barren ground, but a kind word is never thrown away\" Arthur Helps', '2018-07-03 12:31:48'),
(8, 'mythking', 'Comical Quotes', '\"Many a small thing has been made large by the right kind of advertising\" Mark Twain', '2018-07-03 17:46:04'),
(9, 'mythking', 'Wise Quotes', '\"To do two things at once is to do neither\" Publilius Syrus', '2018-07-03 17:52:20'),
(11, 'giantstep12', 'Wise Quotes', '\"Anyone who has never made a mistake has never tried anything new\" Albert Einstein', '2018-07-03 20:33:01'),
(13, 'giantstep12', 'Comical Quotes', '\"Experience is simply the name we give our mistakes\" Oscar Wilde', '2018-07-04 11:04:22'),
(14, 'giantstep12', 'Comical Quotes', '\"If you want to recapture your youth, just cut off his allowance\" Al Bernstein', '2018-07-04 11:30:52'),
(17, 'mechanic7', 'Comical Quotes', '\"Technological progress has merely provided us with a more efficient means for going backwards\" Aldous Huxley', '2018-07-04 15:01:34'),
(28, 'lilythepink', 'Wise Quotes', '\"Real knowledge is to know the extent of one\'s ignorance\" Confucius', '2018-07-06 11:51:21'),
(29, 'mechanic7', 'Wise Quotes', '\"It is amazing what you can accomplish if you do not care who gets the credit\" Harry. S. Truman', '2018-07-06 12:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(8) UNSIGNED NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `passcode` char(60) NOT NULL,
  `reg_date` datetime NOT NULL,
  `member_level` tinyint(2) NOT NULL,
  `secret` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `user_name`, `email`, `passcode`, `reg_date`, `member_level`, `secret`) VALUES
(12, 'lilythepink', 'jsmith@myisp.co.uk', '$2y$10$y7YdhjpOmI/WM.5sRWpl/eIwWgQ2rt/LgYtuwvOEvUYSQ3325RBGu', '2018-07-15 18:13:34', 0, 'Pink'),
(13, 'giantstep12', 'ndean@myisp.co.uk', '$2y$10$cSE3uN9aLvzveWrWkarPYuYUxWmO43/OKN2awxuw2FEnN03c/mmSi', '2018-07-15 18:15:16', 0, 'Giant'),
(14, 'mechanic7', 'jdoe@myisp.co.uk', '$2y$10$6AoLBfB0h.1ZSGDHZM8arudM8v2gk5WrfJOMVfP8rZlQbbwGCASrW', '2018-07-15 18:16:59', 0, 'Mec'),
(15, 'skivvy', 'jsmith@outcook.com', '$2y$10$5pZlgtkITlxjH/f4M4.Mtu4hmT8xCbLGcbJtYjLYygERoD0Bp/XNe', '2018-07-15 18:18:05', 0, 'Ski'),
(16, 'mythking', 'arthur@myisp.net', '$2y$10$CYZRmHngilpb7RLohommce7qk7VDs5ezfogjztGkhN0Ai7hH.D4lO', '2018-07-15 18:19:13', 0, 'King');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`post_id`);
ALTER TABLE `forum` ADD FULLTEXT KEY `message` (`message`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `uname` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `post_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
