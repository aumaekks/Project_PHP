-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 11:43 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrowdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrowID` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `equipmentID` varchar(4) NOT NULL,
  `userborrowID` varchar(4) NOT NULL,
  `lenderID` varchar(4) NOT NULL,
  `Duration` int(30) NOT NULL,
  `borroweddate` date NOT NULL,
  `datereturn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`borrowID`, `equipmentID`, `userborrowID`, `lenderID`, `Duration`, `borroweddate`, `datereturn`) VALUES
('H1', 'S1', 'A2', 'A1', 5, '2022-10-21', '2022-10-21'),
('H10', 'S1', 'A11', 'A1', 10, '2022-10-21', '2022-10-21'),
('H11', 'S8', 'A4', 'A5', 20, '2022-10-21', '2022-10-21'),
('H12', 'S12', 'A4', 'A11', 20, '2022-10-21', '2022-10-21'),
('H13', 'S10', 'A4', 'A6', 20, '2022-10-21', '2022-10-21'),
('H14', 'S4', 'A4', 'A2', 10, '2022-10-21', '0000-00-00'),
('H2', 'S2', 'A2', 'A1', 10, '2022-10-21', '2022-10-21'),
('H3', 'S3', 'A2', 'A1', 15, '2022-10-21', '2022-10-21'),
('H4', 'S1', 'A2', 'A1', 7, '2022-10-21', '2022-10-21'),
('H5', 'S3', 'A2', 'A1', 10, '2022-10-21', '2022-10-21'),
('H6', 'S9', 'A11', 'A6', 30, '2022-10-21', '2022-10-21'),
('H7', 'S10', 'A11', 'A6', 10, '2022-10-21', '2022-10-21'),
('H8', 'S11', 'A11', 'A1', 30, '2022-10-21', '2022-10-21'),
('H9', 'S8', 'A11', 'A5', 20, '2022-10-21', '2022-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttype`
--

CREATE TABLE `equipmenttype` (
  `typeID` varchar(4) NOT NULL,
  `typeName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipmenttype`
--

INSERT INTO `equipmenttype` (`typeID`, `typeName`) VALUES
('e1', 'Weightlifting equipment'),
('e2', 'Barbells and plates'),
('e3', 'Resistance bands'),
('e4', 'Squat rack'),
('e5', 'Cardio equipment'),
('e6', 'Rowing machines'),
('e7', 'Dueling ropes');

-- --------------------------------------------------------

--
-- Table structure for table `fitnessequipment`
--

CREATE TABLE `fitnessequipment` (
  `equipmentID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `equipmentName` text NOT NULL,
  `typeID` varchar(4) NOT NULL,
  `Information` text NOT NULL,
  `Borrower` varchar(4) NOT NULL,
  `status` int(1) NOT NULL,
  `numberoftime` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fitnessequipment`
--

INSERT INTO `fitnessequipment` (`equipmentID`, `equipmentName`, `typeID`, `Information`, `Borrower`, `status`, `numberoftime`) VALUES
('S1', 'Dumbel', 'e1', '10KG', 'A1', 1, 3),
('S10', 'VIVA', 'e1', '5kg x2', 'A6', 1, 2),
('S11', 'Barbells', 'e1', 'ts', 'A1', 1, 1),
('S12', 'Cable machine Extra', 'e1', '20KG', 'A11', 1, 1),
('S13', 'Cable machine', 'e6', '50KG', 'A4', 1, 0),
('S3', 'Cable machine', 'e6', 'maximum 50KG', 'A1', 1, 2),
('S4', 'Hexagon Dumbel Set', 'e1', '12KGx2', 'A2', 0, 1),
('S5', 'XtivePRO', 'e1', '20-40 kg', 'A7', 1, 0),
('S6', 'YINGERJIAN', 'e1', '30 kg', 'A7', 1, 0),
('S7', 'GSports ', 'e1', '2kg x2', 'A5', 1, 0),
('S8', 'SPORTLAND', 'e1', '4 kg', 'A5', 1, 2),
('S9', 'Adidas', 'e1', '4 kg', 'A6', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `lenderID` varchar(4) NOT NULL,
  `reviewerID` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`lenderID`, `reviewerID`) VALUES
('A1', 'A11'),
('A1', 'A2'),
('A11', 'A4'),
('A2', 'A4'),
('A5', 'A11'),
('A5', 'A4'),
('A6', 'A11'),
('A6', 'A4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` varchar(4) NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` text NOT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Email`, `Phone`) VALUES
('A1', 'Test1', '123456789', 'test@gmail.com', '085-879652'),
('A10', 'maiaow', '54321', 'maiaow@gmail.com', '024-856525'),
('A11', 'aekkaratz', '12345', 'aek@gmail.com', '054-895466'),
('A12', 'Sarawut', '123456789', 'sarawut@gmail.com', '094-563255'),
('A2', 'Test2', '123456789', 'test2@gmail.com', '085-636333'),
('A4', 'Somsuk', '12345', 'Somsuk@hotmail.com', '111-111111'),
('A5', 'John_xi_na', '12345', 'Johnxina@hotmail.com', '111-111111'),
('A6', 'The_wonk', '12345', 'Thewonk@hotmail.com', '111-111111'),
('A7', 'Sayan', '12345', 'Johbinary@hotmail.com', '111-111111'),
('A8', 'somboy', '12345', 'AAAAAa@AAAAAAA', '111-111111'),
('A9', 'Aowpala', '54321', 'aowpala@gmail.com', '084-985632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrowID`);

--
-- Indexes for table `equipmenttype`
--
ALTER TABLE `equipmenttype`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `fitnessequipment`
--
ALTER TABLE `fitnessequipment`
  ADD PRIMARY KEY (`equipmentID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`lenderID`,`reviewerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
