-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 08:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaintbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `AID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'ASSIGNED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`AID`, `CID`, `UID`, `Status`) VALUES
(5, 30, 15, 'ASSIGNED');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL DEFAULT 'Admin',
  `timeDate` varchar(100) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `CID`, `UID`, `Name`, `timeDate`, `comment`) VALUES
(21, 30, 20, 'Mohd Monish', 'Nov,10,2022 02:05:41 PM', 'heyyy admin plzz see my complaint !'),
(22, 30, 15, 'Admin', 'Nov,10,2022 02:10:21 PM', 'hey Aman plzzz read it carefully nd solve this problem');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `cDate` varchar(100) NOT NULL,
  `cTime` varchar(50) NOT NULL,
  `cType` varchar(100) NOT NULL DEFAULT 'OTHERS',
  `subject` varchar(250) NOT NULL,
  `cDescription` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'UNSEEN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`CID`, `UID`, `cDate`, `cTime`, `cType`, `subject`, `cDescription`, `status`) VALUES
(30, 20, 'Nov 25, 2022', '04:31 PM', 'PLUMBER', 'this is complaint subject', 'description/151692863212869856901586082660.html', 'ACTIVE'),
(41, 20, 'Nov 24, 2022', '03:06 PM', 'PLUMBER', 'hjgh nghfg jhtuy jyu ftg', 'description/1502101608983389761048757085.html', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `standardcomplaints`
--

CREATE TABLE `standardcomplaints` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `Description` varchar(750) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standardcomplaints`
--

INSERT INTO `standardcomplaints` (`id`, `category`, `subject`, `Description`) VALUES
(1, 'PLUMBER', 'bsdgdshghsad sadghjdasg asjgdhas', 'skdhasndjk asddha'),
(2, 'OTHERS', 'Anything that can cause harmful problems.', 'Request repairs. Of course, put in a repair request first. But if that gets ignored, send a complaint letter. Some examples of necessary repairs include leaky faucets, plumbing issues, broken appliances and leaks in the roof. Failure to complete regular maintenance outlined in the lease also qualifies.\r\nRepeated issues with neighbors, such as loud music, fighting or other disruptive behavior. However, if you suspect anything that\'s extremely dangerous and/or against the law, such as domestic abuse, call the police immediately.\r\nAnything that can cause health problems, like rodents, insects and mold. Problems like these are more likely to happen in a rental house');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL DEFAULT 'OTHERS',
  `Mobile` varchar(20) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `workStatus` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `Name`, `Email`, `Password`, `Category`, `Mobile`, `Address`, `workStatus`) VALUES
(11, 'Mohd Monish', 'mohdmonishksg@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'RESIDENT', '09821446257', 'Mnnit Allahabad', 'YES'),
(12, 'Aancha Navlakha', 'aanchalnavlakha@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'ELECTRICIAN', '9174809521', 'Indore Madhya Pradesh ', 'NO'),
(13, 'sahil dikka', 'sahildikka2001@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'PLUMBER', '9821960098', 'Mnnit Allahabad', 'YES'),
(14, 'Mohd Danish', 'monishksg@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'OTHERS', '8742996850', 'Mnnit Allahabad Uttar Pradesh', 'YES'),
(15, 'Aman Mishra', 'monish2021.mca@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'PLUMBER', '9821446258', 'Mnnit Allahabad UP India', 'NO'),
(16, 'Chinglen  Khomba', 'cknaorem.kakching@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'RESIDENT', '7898653412', 'Manipur West Imphal', 'NO'),
(17, 'Kumari Aanchal', 'aanchalnav2512@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'ELECTRICIAN', '9821446257', 'Delhi India ', 'NO'),
(18, 'Pooja  Rani', 'aanchalnavlakha477@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'PLUMBER', '9821444356', 'Mnnit Allahabad INDIA', 'NO'),
(20, 'Mohd Monish', 'complaintbox.avishkar2022@gmail.com', '', 'OTHERS', '', '', 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `CID` (`CID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `comments_ibfk_1` (`UID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `standardcomplaints`
--
ALTER TABLE `standardcomplaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `standardcomplaints`
--
ALTER TABLE `standardcomplaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `complaints` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `complaints` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
