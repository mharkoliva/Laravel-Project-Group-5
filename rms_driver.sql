-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 11:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms_driver`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_no` int(7) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_no`, `password`, `name`, `contact`) VALUES
(1901001, 'rms_driver', 'sample', 9123456789),
(1901002, '@PJmk_2022', 'Sample', 12345678901);

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `contact_message_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `message_email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`contact_message_id`, `name`, `message_email`, `subject`, `message`) VALUES
(1, 'Jericho', 'jerpenones@my.com', 'Sample', 'csfedgfdvdvdvxdcv'),
(2, 'Jericho', 'jerpenones@my.com', 'Sample', 'srsfsvsxvxsvx'),
(4, 'tedddy', 'teddyu@hdhf.com', 'hsgdg', 'sdvgsdgsdgsdgrbrbrvsevsv'),
(5, 'nanieee', 'nanieee@gaga.haha', 'dsdsds', 'fuvjcsdsfdfddsd'),
(6, 'ssscss', 'cscsc@dvd.com', 'cdcdc', 'scscssc'),
(7, 'ssscss', 'cscsc@dvd.com', 'fbfbfb', 'svfvodfnvkjfbjvhfjv'),
(8, 'ako', 'ako@ako.ako', 'ss', 'akoakaoakoakoa'),
(9, 'Apple', 'apple@gmail.com', 'Good', 'juehfhefheufhjenjf'),
(10, 'madimo', 'madimo@didi.com', 'kakakadfff', 'a,dbfkjdbvkjdbvjkdbvjkd');

-- --------------------------------------------------------

--
-- Table structure for table `december2021`
--

CREATE TABLE `december2021` (
  `december2021_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `3rd` int(5) NOT NULL,
  `6th` int(5) NOT NULL,
  `7th` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `december2021`
--

INSERT INTO `december2021` (`december2021_id`, `id_no`, `3rd`, `6th`, `7th`) VALUES
(1, 1901002, 11, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `may2022`
--

CREATE TABLE `may2022` (
  `may2022_id` bigint(20) UNSIGNED NOT NULL,
  `id_no` bigint(20) UNSIGNED NOT NULL,
  `22nd` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `23rd` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `may2022`
--

INSERT INTO `may2022` (`may2022_id`, `id_no`, `22nd`, `23rd`) VALUES
(1, 1901002, '7', '3');

-- --------------------------------------------------------

--
-- Table structure for table `november2021`
--

CREATE TABLE `november2021` (
  `november2021_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `2nd` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `november2021`
--

INSERT INTO `november2021` (`november2021_id`, `id_no`, `2nd`) VALUES
(1, 1901002, 9);

-- --------------------------------------------------------

--
-- Table structure for table `october2021`
--

CREATE TABLE `october2021` (
  `october2021_id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `1st` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `october2021`
--

INSERT INTO `october2021` (`october2021_id`, `id_no`, `1st`) VALUES
(1, 1901002, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`contact_message_id`);

--
-- Indexes for table `december2021`
--
ALTER TABLE `december2021`
  ADD PRIMARY KEY (`december2021_id`);

--
-- Indexes for table `may2022`
--
ALTER TABLE `may2022`
  ADD PRIMARY KEY (`may2022_id`);

--
-- Indexes for table `november2021`
--
ALTER TABLE `november2021`
  ADD PRIMARY KEY (`november2021_id`);

--
-- Indexes for table `october2021`
--
ALTER TABLE `october2021`
  ADD PRIMARY KEY (`october2021_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1901003;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `contact_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `december2021`
--
ALTER TABLE `december2021`
  MODIFY `december2021_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `may2022`
--
ALTER TABLE `may2022`
  MODIFY `may2022_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `november2021`
--
ALTER TABLE `november2021`
  MODIFY `november2021_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `october2021`
--
ALTER TABLE `october2021`
  MODIFY `october2021_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
