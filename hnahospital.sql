-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2018 at 11:50 AM
-- Server version: 8.0.12
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnahospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `Data`
--

CREATE TABLE `Data` (
  `First Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Last Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ID Card` int(14) NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Phone Number` int(15) DEFAULT NULL,
  `Gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Pulse` int(3) NOT NULL DEFAULT '0',
  `Count` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Data`
--

INSERT INTO `Data` (`First Name`, `Last Name`, `ID Card`, `Email`, `Age`, `Phone Number`, `Gender`, `Pulse`, `Count`) VALUES
('habiba', 'ahmed', 5, 'gg', 20, 11, 'f', 105, 0),
('noha', 'sh', 6, 'gag', 20, 15, 'f', 61, 0),
('ahmed', 'adel', 8, 'gh', 20, 55, 'male', 51, 0),
('Nada ', 'galal', 9, 'na', 22, 6, 'f', 67, 0),
('noha', 'shafek', 33, 'Nohashafek@dhiw', 20, 114, 'female', 77, 0),
('nada', 'abd el aziz', 55, '8888', 20, 15, 'f', 109, 0),
('noha', 'shafeq', 123, 'ghha', 20, 874, 'f', 59, 0),
('Nada', 'Galal', 123456, 'Nada.galal6123@gmail.com', 21, 114282, 'f', 67, 0),
('ahmed', 'galal', 123456789, 'Ahmed.galal615243@gmail.com', 20, 1122325946, 'male', 77, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE `Doctors` (
  `Usernumber` int(11) NOT NULL,
  `Physician Name` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`Usernumber`, `Physician Name`, `Department`) VALUES
(2, 'mohamed salam', 'ICU'),
(3, 'Ahmed Kamal', 'ICU'),
(4, 'Joe steve', 'ICU');

-- --------------------------------------------------------

--
-- Table structure for table `ICU Daily Progress Notes`
--

CREATE TABLE `ICU Daily Progress Notes` (
  `number of notes` int(11) NOT NULL,
  `ID` int(5) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Activity Status` varchar(100) NOT NULL,
  `Mental Status` text NOT NULL,
  `GI Status` text NOT NULL,
  `Respiratory Status` text NOT NULL,
  `Heart Rate` int(11) NOT NULL,
  `Blood Sugar` int(11) NOT NULL,
  `Daily Weight` int(11) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ICU Daily Progress Notes`
--

INSERT INTO `ICU Daily Progress Notes` (`number of notes`, `ID`, `Date`, `Activity Status`, `Mental Status`, `GI Status`, `Respiratory Status`, `Heart Rate`, `Blood Sugar`, `Daily Weight`, `Notes`) VALUES
(1, 55, '2018-08-26 16:37:09', 'cart', 'Confused \r\n', 'Diarrhea', 'Labored', 56, 90, 59, ''),
(2, 55, '2018-08-26 16:36:54', 'cart', 'Alert', 'Diarrhea', 'Labored', 67, 80, 58, 'getting worse');

-- --------------------------------------------------------

--
-- Table structure for table `ICU Patient Background`
--

CREATE TABLE `ICU Patient Background` (
  `ID` int(5) NOT NULL,
  `Admition Date` date NOT NULL,
  `Allergies` text NOT NULL,
  `Background` text NOT NULL,
  `Height` int(3) NOT NULL,
  `Weight` int(3) NOT NULL,
  `Patient Meds` text NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ICU Patient Background`
--

INSERT INTO `ICU Patient Background` (`ID`, `Admition Date`, `Allergies`, `Background`, `Height`, `Weight`, `Patient Meds`, `Comment`) VALUES
(55, '2018-08-08', 'fruits/ binuts/cocnut', 'kidney disease ', 163, 67, 'nothing', 'she is okay');

-- --------------------------------------------------------

--
-- Table structure for table `InPatients`
--

CREATE TABLE `InPatients` (
  `ID` int(5) NOT NULL,
  `ID Card` int(11) NOT NULL,
  `Full Name` varchar(150) NOT NULL,
  `Main Physician` varchar(100) NOT NULL,
  `Family Contact` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `InPatients`
--

INSERT INTO `InPatients` (`ID`, `ID Card`, `Full Name`, `Main Physician`, `Family Contact`) VALUES
(56, 453653, 'Ali Kamel', 'mohamed salam', 121232444),
(55, 2236222, 'Habiba Ahmed', 'Ahmed Kamal', 1151280909),
(5557, 56465374, 'Nada Glal', 'Ahmed Kamal', 1126756658),
(5556, 216382838, 'Noha Shafeq', 'mohamed salam', 115128038),
(5558, 564653744, 'Mahmoud Ali', 'mohamed salam', 1167280394);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `first_name`, `last_name`) VALUES
(1, 'mahmoud', 'fathy'),
(2, 'mahmoud', 'fathy'),
(5, 'nada', 'galal'),
(2345, 'nada', 'galal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Data`
--
ALTER TABLE `Data`
  ADD PRIMARY KEY (`ID Card`);

--
-- Indexes for table `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`Usernumber`),
  ADD KEY `Physician Name` (`Physician Name`);

--
-- Indexes for table `ICU Daily Progress Notes`
--
ALTER TABLE `ICU Daily Progress Notes`
  ADD PRIMARY KEY (`number of notes`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `ICU Patient Background`
--
ALTER TABLE `ICU Patient Background`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `InPatients`
--
ALTER TABLE `InPatients`
  ADD PRIMARY KEY (`ID Card`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Main Physician` (`Main Physician`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `Usernumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ICU Daily Progress Notes`
--
ALTER TABLE `ICU Daily Progress Notes`
  MODIFY `number of notes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ICU Daily Progress Notes`
--
ALTER TABLE `ICU Daily Progress Notes`
  ADD CONSTRAINT `ICU Daily Progress Notes_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `ICU Patient Background` (`id`);

--
-- Constraints for table `ICU Patient Background`
--
ALTER TABLE `ICU Patient Background`
  ADD CONSTRAINT `ICU Patient Background_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `InPatients` (`id`);

--
-- Constraints for table `InPatients`
--
ALTER TABLE `InPatients`
  ADD CONSTRAINT `InPatients_ibfk_1` FOREIGN KEY (`Main Physician`) REFERENCES `Doctors` (`physician name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
