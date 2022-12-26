-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 02:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

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
  `wrongWord_resp` varchar(20) NOT NULL,
  `comments_resp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizReponses`
--

INSERT INTO `quizReponses` (`responsesDate`, `fk_userId`, `utilityBoat_resp`, `forwardBoat_resp`, `otherName_resp`, `speedUnity_resp`, `nauticMiles_resp`, `othersSailSports_resp`, `windSurfDirection_resp`, `foil_resp`, `wrongWord_resp`, `comments_resp`) VALUES
('2022-12-26 13:30:12', 9, 'colonisations, cargaison', 'depressionVoile', 'nautisme', '2', 'millesNautiques', 'kitesurf, plancheVoile', 'mat', 'foil', 'corde', 'top'),
('2022-12-26 13:48:03', 10, 'colonisations, cargaison', 'dauphins', ' nautisme', '2', 'noeuds', 'surf, foil, skiNautique', 'avecMains', 'baume', 'ok', 'adfga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `points` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `birthdate`, `points`) VALUES
(9, 'Joao', '2008-06-04 00:00:00', 9),
(10, 'Louis', '2022-12-08 00:00:00', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
