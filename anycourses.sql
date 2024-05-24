-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2022 at 10:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anycourses`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_video`
--

CREATE TABLE `all_video` (
  `ID` int(50) NOT NULL,
  `V_NAME` varchar(100) NOT NULL,
  `V_NUM` int(50) NOT NULL,
  `PATH` varchar(250) NOT NULL,
  `TEACHER` varchar(50) NOT NULL,
  `TYPE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `ID` int(50) NOT NULL,
  `S_NAME` varchar(150) NOT NULL,
  `IMAG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`ID`, `S_NAME`, `IMAG`) VALUES
(1, 'JAVA', '../background/JAVA/17.jpg'),
(2, 'JAVASCRIPT', '../background/JAVASCRIPT/16.jpg'),
(3, 'HTML', '../background/HTML/11.jpg'),
(4, 'php', '../background/php/17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(50) NOT NULL,
  `F_NAME` varchar(50) NOT NULL,
  `L_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASS` varchar(80) NOT NULL,
  `isAdmin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `F_NAME`, `L_NAME`, `EMAIL`, `PASS`, `isAdmin`) VALUES
(2, 'Ahmed', 'Qahtan', 'ahmedqahtan@gmail.com', '433', b'0'),
(3, 'Osama', 'Alathwari', 'o@g.c', '123', b'0'),
(4, 'admin', 'admin', 'hash@g.c', '$2y$10$SpI6v5y4Bq6jzSdbDY2M7OwUqSuJfg1N7KJqmueF44qRJfqPjLsle', b'1'),
(6, 'tameem', 'alwajeeh', 'ahash@g.c', '$2y$10$Aqbm7mwX0/QCdkonih6CXuudz3nJlPkiPYfqY.6FoRMAyskhQbsw2', b'0'),
(7, 'osamaaaa', 'aha', 'os@g.c', '$2y$10$UcDPL8Nfe96RrZA5GC0FyebCKdViceH.R7d1s5/WihLb0frY5jGr2', b'0'),
(9, 'Ahmed', 'qahtan', 'a@g.c', '$2y$10$l1F7qwZojaNv/bpOP9yoCeucYoNOUuRylaENmxlyVcadgpV7Fu7UC', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_video`
--
ALTER TABLE `all_video`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `EMAIL_2` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_video`
--
ALTER TABLE `all_video`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_video`
--
ALTER TABLE `all_video`
  ADD CONSTRAINT `all_video_ibfk_1` FOREIGN KEY (`TYPE`) REFERENCES `section` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
