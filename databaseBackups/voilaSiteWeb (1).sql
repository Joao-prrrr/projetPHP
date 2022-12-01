-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2022 at 04:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

drop database if exists voilaSiteWeb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voilaSiteWeb`
--
Create database voilaSiteWeb;
use voilaSiteWeb;
-- --------------------------------------------------------

--
-- Table structure for table `quizReponses`
--

CREATE TABLE `quizReponses` (
  `responsesDate` datetime NOT NULL,
  `fk_userId` int(11) NOT NULL,
  `utilityBoat_resp` varchar(50) NOT NULL,
  `forwardBoat_resp` varchar(50) NOT NULL,
  `otherName_resp` varchar(20) NOT NULL,
  `speedUnity_resp` varchar(20) NOT NULL,
  `nauticMiles_resp` varchar(20) NOT NULL,
  `othersSailSports_resp` varchar(25) NOT NULL,
  `windSurfDirection_resp` varchar(50) NOT NULL,
  `foil_resp` varchar(20) NOT NULL,
  `nautism_resp` varchar(20) NOT NULL,
  `comments_resp` text NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `points` int(10) UNSIGNED NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizReponses`
--
ALTER TABLE `quizReponses`
  ADD PRIMARY KEY (`responsesDate`,`fk_userId`),
  ADD KEY `fk_userId` (`fk_userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quizReponses`
--
ALTER TABLE `quizReponses`
  ADD CONSTRAINT `quizreponses_ibfk_1` FOREIGN KEY (`fk_userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
