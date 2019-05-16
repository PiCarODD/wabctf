-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 25, 2019 at 06:00 PM
-- Server version: 10.3.13-MariaDB-1:10.3.13+maria~bionic
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wab_ctfdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `chal_name` varchar(100) DEFAULT NULL,
  `hint` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `flag` varchar(100) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `category`, `chal_name`, `hint`, `url`, `flag`, `points`) VALUES
(5, 'Cryptography', '10101010101', 'what are they?', 'https://pastebin.com/CCGREfDC', 'wabctf{you_are_binary_ninja}', 30),
(6, 'Streganography', 'Image!', 'notepad?', 'https://files.fm/u/aypnffnf', 'wabctf{flag_in_image}', 30);

-- --------------------------------------------------------

--
-- Table structure for table `solve`
--

CREATE TABLE `solve` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `chalid` int(11) NOT NULL,
  `solve` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solve`
--

INSERT INTO `solve` (`id`, `userid`, `chalid`, `solve`) VALUES
(23, 9, 1, 'yes'),
(24, 12, 1, 'yes'),
(25, 13, 5, 'yes'),
(26, 13, 6, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` int(11) NOT NULL,
  `team_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `uniname` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`id`, `team_name`, `username`, `email`, `password`, `uniname`, `phone`, `region`, `type`, `mark`) VALUES
(9, '1337', '1337', '1@gmail.com', '123456789', 'UCSY', '09156096541', 'magway', 'user', 40),
(10, 'so_noob', 'so_noob', 'heinjame@gmail.com', 'waithetaunn', 'University of Computer Studies,Magway', '09156096751', 'Magway', 'user', 100),
(11, 'admin_team1337s', 'team1337', 'admin@gmail.com', 'waithetaunn', 'dh', '09156096751', 'Yangon', 'admin1337s', 0),
(12, 'h3x', 'h3x', '1@gmail.com', 'waithetaunn', 'BEHS(1),Magway', '09256096751', 'taunggyi', 'user', 10),
(13, 'test', 'test', 'test@gmail.com', 'waithetaunn', 'University Of Medicine,China', '09156096541', 'taunggyi', 'user', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solve`
--
ALTER TABLE `solve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `solve`
--
ALTER TABLE `solve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
