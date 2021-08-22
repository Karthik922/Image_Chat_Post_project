-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 04:35 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sedintech`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CID` int(10) NOT NULL,
  `IMGID` int(10) NOT NULL,
  `UNAME` varchar(100) NOT NULL,
  `COMMENTS` varchar(100) NOT NULL,
  `DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CID`, `IMGID`, `UNAME`, `COMMENTS`, `DATE`) VALUES
(2, 2, 'SK Karthik', 'Wow nice pic', '2021-08-22 19:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `IMG_ID` int(10) NOT NULL,
  `U_ID` int(10) NOT NULL,
  `IMGTEXT` text NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `TIME` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`IMG_ID`, `U_ID`, `IMGTEXT`, `IMAGE`, `TIME`) VALUES
(2, 2, 'My first post', 'images/first year.jpg', '2021-08-21 12:17:54'),
(3, 4, 'My Photo', 'images/gokul.jpeg', '2021-08-21 15:55:08'),
(4, 2, 'I am First Price in web design compitition.....', 'images/price.jpeg', '2021-08-21 20:31:40'),
(5, 3, 'My College Friends', 'images/friend.jpg', '2021-08-22 12:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(10) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `NAME`, `USER_NAME`, `EMAIL`, `PASS`) VALUES
(1, 'ManiKandan B', 'Mani', 'manikandan123@gmail.com', '123456'),
(2, 'Karthik', 'SK Karthik', 'karthikkaliyaperumal1@gmail.com', '1234'),
(3, 'Ragul P', 'RainaRagul', 'rainaragul123@gmail.com', '123456'),
(4, 'Gokul G', 'Gokulkrish', 'gokultkdr4@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`IMG_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `IMG_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
