-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 03:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancesys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Attendance_ID` int(255) NOT NULL,
  `Student_ID` int(255) DEFAULT NULL,
  `Class_ID` int(255) DEFAULT NULL,
  `StudentModule_ID` int(255) DEFAULT NULL,
  `Week_ID` int(255) DEFAULT NULL,
  `Start_Time` varchar(255) DEFAULT NULL,
  `End_Time` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_module`
--

CREATE TABLE `class_module` (
  `Class_ID` int(255) NOT NULL,
  `Module_ID` int(255) NOT NULL,
  `Day_ID` int(255) NOT NULL,
  `Room_ID` int(255) NOT NULL,
  `Staff_ID` int(255) NOT NULL,
  `Class_Type` int(5) NOT NULL,
  `Start_Time` varchar(255) NOT NULL,
  `End_Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_module`
--

INSERT INTO `class_module` (`Class_ID`, `Module_ID`, `Day_ID`, `Room_ID`, `Staff_ID`, `Class_Type`, `Start_Time`, `End_Time`) VALUES
(1, 1, 2, 12, 4, 1, '11:00am', '01:00pm'),
(2, 1, 2, 5, 1, 2, '02:00pm', '04:00pm'),
(3, 1, 2, 5, 3, 2, '09:00am', '11:00am'),
(4, 3, 5, 7, 6, 1, '10:00am', '12:00pm'),
(5, 2, 5, 17, 5, 1, '01:00pm', '02:00pm'),
(6, 2, 5, 3, 5, 2, '02:00pm', '04:00pm'),
(7, 2, 5, 3, 5, 2, '04:00pm', '06:00pm'),
(8, 4, 3, 1, 8, 1, '09:00am', '10:00am'),
(9, 4, 3, 10, 1, 2, '02:00pm', '04:00pm'),
(10, 5, 2, 13, 9, 1, '10:00am', '12:00pm'),
(11, 5, 2, 16, 9, 2, '01:00pm', '03:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `ClassStudent_ID` int(255) NOT NULL,
  `Class_ID` int(255) NOT NULL,
  `Student_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`ClassStudent_ID`, `Class_ID`, `Student_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 7),
(6, 1, 8),
(7, 2, 1),
(8, 2, 2),
(9, 2, 3),
(10, 2, 4),
(11, 2, 7),
(12, 2, 8),
(13, 1, 5),
(14, 1, 6),
(15, 3, 5),
(16, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `day_details`
--

CREATE TABLE `day_details` (
  `Day_ID` int(10) NOT NULL,
  `Day_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_details`
--

INSERT INTO `day_details` (`Day_ID`, `Day_Name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `Login_ID` int(10) NOT NULL,
  `Login_Email` varchar(255) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `Login_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`Login_ID`, `Login_Email`, `Username`, `Login_Password`) VALUES
(1, 'hastonng@studentanglia.com', 'hastonng', 'e10adc3949ba59abbe56e057f20f883e'),
(2, NULL, 'arunkumar', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'aroojfatima@anglia.com', 'aroojfatima', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'swathithota@anglia.com', 'swathithota', 'e10adc3949ba59abbe56e057f20f883e'),
(5, NULL, 'joshuageorge', '670b14728ad9902aecba32e22fa4f6bd'),
(6, NULL, 'christinaluca', '5b1b68a9abf4d2cd155c81a9225fd158'),
(7, NULL, 'andrewmoore', 'e10adc3949ba59abbe56e057f20f883e'),
(8, NULL, 'jinzhang', 'e10adc3949ba59abbe56e057f20f883e'),
(9, NULL, 'jamiebambrick', 'e10adc3949ba59abbe56e057f20f883e'),
(10, NULL, 'joshjames', 'e10adc3949ba59abbe56e057f20f883e'),
(11, NULL, 'sarahhewitson', 'e10adc3949ba59abbe56e057f20f883e'),
(12, NULL, 'dylanbennette', 'e10adc3949ba59abbe56e057f20f883e'),
(13, NULL, 'samlondsdale', 'e10adc3949ba59abbe56e057f20f883e'),
(14, NULL, 'dominikkosmacka', 'e10adc3949ba59abbe56e057f20f883e'),
(15, NULL, 'razvandinita', 'e10adc3949ba59abbe56e057f20f883e'),
(16, NULL, 'gerogewilson', 'e10adc3949ba59abbe56e057f20f883e'),
(17, NULL, 'ianvanderlinde', 'e10adc3949ba59abbe56e057f20f883e'),
(18, NULL, 'michellerobertson', 'e10adc3949ba59abbe56e057f20f883e'),
(19, NULL, 'erilau', 'e10adc3949ba59abbe56e057f20f883e'),
(20, NULL, 'shilodavid', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `module_details`
--

CREATE TABLE `module_details` (
  `Module_ID` int(10) NOT NULL,
  `Staff_ID` int(10) DEFAULT NULL,
  `Module_Name` varchar(255) NOT NULL,
  `Module_Code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_details`
--

INSERT INTO `module_details` (`Module_ID`, `Staff_ID`, `Module_Name`, `Module_Code`) VALUES
(1, 4, 'Advance Web Solution', 'MOD004364'),
(2, 5, 'Web Application Security', 'MOD004364'),
(3, 6, 'Research Methods', 'MOD002695'),
(4, 8, 'Computer Graphics Programming', 'MOD006127'),
(5, 9, 'Data Structures and Algorithms', 'MOD002641'),
(6, 8, 'Distributed Programming', 'MOD006128'),
(7, 4, 'Undergraduate Final Project', 'MOD002691'),
(8, 9, 'Image Processing', 'MOD002643'),
(9, 7, 'Mobile Technology', 'MOD002663'),
(10, 6, 'Professional Issues: Computing and Society', 'MOD002647'),
(11, 1, 'Interaction and Usability', 'MOD002591'),
(12, 7, 'Object Oriented C++', 'MOD003197'),
(13, 5, 'Digital Security', 'MOD003264'),
(14, 1, 'Database Design and Implementation', 'MOD002589'),
(15, 5, 'Network Routing', 'MOD003262'),
(16, 4, 'Software Engineering', 'MOD003263');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `Room_ID` int(11) NOT NULL,
  `Room_Number` int(255) NOT NULL,
  `Room_Building` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`Room_ID`, `Room_Number`, `Room_Building`) VALUES
(1, 303, 'Science'),
(2, 304, 'Science'),
(3, 305, 'Science'),
(4, 503, 'Science'),
(5, 504, 'Science'),
(6, 505, 'Science'),
(7, 124, 'Coslett'),
(8, 125, 'Coslett'),
(9, 126, 'Coslett'),
(10, 216, 'Young Street'),
(11, 217, 'Young Street'),
(12, 218, 'Young Street'),
(13, 303, 'Compass House'),
(14, 304, 'Compass House'),
(15, 305, 'Compass House'),
(16, 123, 'Young Street'),
(17, 124, 'Young Street');

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `Staff_ID` int(10) NOT NULL,
  `Login_ID` int(10) DEFAULT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Staff_Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(255) NOT NULL,
  `Mail_Address` varchar(255) NOT NULL,
  `Staff_Type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`Staff_ID`, `Login_ID`, `First_Name`, `Last_Name`, `Staff_Email`, `PhoneNo`, `Mail_Address`, `Staff_Type`) VALUES
(1, 3, 'Arooj', 'Fatima', 'aroojfatima@anglia.com', '447080603934', 'South Cambridge, England', 2),
(2, 4, 'Swathi', 'Thota', 'swathithota@anglia.com', '447538473473', 'East London, England', 3),
(3, 5, 'Kaushik', 'Liliyan', 'kaushikliliyan@anglia.com', '446675868685', 'Dublin, Ireland', 1),
(4, 6, 'Christina', 'Luca', 'christinaluca@anglia.com', '446868686885', 'Athens, Greece', 2),
(5, 7, 'Andrew', 'Moore', 'andrewmoore@anglia.com', '447889899887', 'Belfast, Northern Ireland', 2),
(6, 8, 'Jin', 'Zhang', 'jinzhang@anglia.com', '446585855858', 'Zhong Hua, China', 2),
(7, 15, 'Razvan', 'Dinita', 'razvandinita@anglia.com', '441223698705', 'Moscow, Russia', 2),
(8, 16, 'George', 'Wilson', 'georgewilson@anglia.com', '447950429494', 'Manchester, England', 2),
(9, 17, 'Ian Van', 'der Linde', 'ianvanderlinde@anglia.com', '445556697797', 'Durban, South Africa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `Student_ID` int(10) NOT NULL,
  `Login_ID` int(10) DEFAULT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Student_Email` varchar(255) DEFAULT NULL,
  `PhoneNo` varchar(255) DEFAULT NULL,
  `Mail_Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Student_ID`, `Login_ID`, `First_Name`, `Last_Name`, `Student_Email`, `PhoneNo`, `Mail_Address`) VALUES
(1, 1, 'Haston', 'Ng', 'hastonng@studentanglia.com', '0123456789565', 'Kuala Lumpur, Wilayah Persekutuan'),
(2, 2, 'Arun', 'Kumar', 'arunkumar@studentanglia.com', '0134567999455', 'Mangalore, Karnataka'),
(3, 9, 'Jamie', 'Bambrick', 'jamiebambrick@studentanglia.com', '4478052124345', 'Belfast, Antrim'),
(4, 10, 'Josh', 'James', 'joshjames@studentanglia.com', '4465955959696', 'Cardiff, Glamorganshire'),
(5, 11, 'Sarah', 'Hewitson', 'sarahhewitson@studentanglia.com', '4455564343133', 'Bury St Edmunds, Suffolk'),
(6, 12, 'Dylan', 'Bennette', 'dylanbennette@studentanglia.com', '4466868688686', 'Bury St Edmunds, Suffolk'),
(7, 13, 'Sam', 'Lonsdale', 'samelonsdale@studentanglia.com', '4476675656774', 'Edinburgh, Edinburghshire'),
(8, 14, 'Dominik', 'Kosmačka', 'dominikkomacka@studentanglia.com', '4455545466466', 'Ceske Budejovice, South Bohemia'),
(9, 18, 'Michelle', 'Robertson', 'michellerobertson@studentanglia.com', '4465656566377', 'Cambridge, Cambridgeshire'),
(10, 19, 'Eri', 'Lau', 'erilau@studentanglia.com', '4453546641349', 'Kuala Lumpur, Wilayah Persekutuan'),
(11, 20, 'Shilo David', 'Ben Hod', 'shilobenhod@studentanglia.com', '4455838484891', 'Tel Aviv-Yafo, Israel');

-- --------------------------------------------------------

--
-- Table structure for table `student_module`
--

CREATE TABLE `student_module` (
  `StudentModule_ID` int(10) NOT NULL,
  `Module_ID` int(10) NOT NULL,
  `Student_ID` int(10) NOT NULL,
  `Start_Date` varchar(255) NOT NULL,
  `End_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_module`
--

INSERT INTO `student_module` (`StudentModule_ID`, `Module_ID`, `Student_ID`, `Start_Date`, `End_Date`) VALUES
(1, 1, 1, '20012020', '26042020'),
(2, 1, 2, '20012020', '26042020');

-- --------------------------------------------------------

--
-- Table structure for table `week_details`
--

CREATE TABLE `week_details` (
  `Week_ID` int(255) NOT NULL,
  `Week_Num` int(255) NOT NULL,
  `Week_Type` int(5) NOT NULL,
  `Start_Date` varchar(50) NOT NULL,
  `End_Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `week_details`
--

INSERT INTO `week_details` (`Week_ID`, `Week_Num`, `Week_Type`, `Start_Date`, `End_Date`) VALUES
(1, 1, 1, '20012020', '24012020'),
(2, 2, 1, '27012020', '31012020'),
(3, 3, 1, '03022020', '07022020'),
(4, 4, 1, '10022020', '14022020'),
(5, 5, 1, '17022020', '21022020'),
(6, 6, 1, '24022020', '28022020'),
(7, 7, 1, '02032020', '06032020'),
(8, 8, 1, '09032020', '13032020'),
(9, 9, 1, '16032020', '20032020'),
(10, 10, 1, '23032020', '27032020'),
(11, 11, 1, '30032020', '03042020'),
(12, 1, 2, '06042020', '10042020'),
(13, 2, 2, '13042020', '17042020'),
(14, 12, 1, '20042020', '24042020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Attendance_ID`);

--
-- Indexes for table `class_module`
--
ALTER TABLE `class_module`
  ADD PRIMARY KEY (`Class_ID`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`ClassStudent_ID`);

--
-- Indexes for table `day_details`
--
ALTER TABLE `day_details`
  ADD PRIMARY KEY (`Day_ID`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`Login_ID`),
  ADD UNIQUE KEY `Login_Email` (`Login_Email`);

--
-- Indexes for table `module_details`
--
ALTER TABLE `module_details`
  ADD PRIMARY KEY (`Module_ID`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`Room_ID`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD UNIQUE KEY `Login_ID` (`Login_ID`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Login_ID` (`Login_ID`);

--
-- Indexes for table `student_module`
--
ALTER TABLE `student_module`
  ADD PRIMARY KEY (`StudentModule_ID`),
  ADD UNIQUE KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `week_details`
--
ALTER TABLE `week_details`
  ADD PRIMARY KEY (`Week_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Attendance_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_module`
--
ALTER TABLE `class_module`
  MODIFY `Class_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `ClassStudent_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `Login_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `module_details`
--
ALTER TABLE `module_details`
  MODIFY `Module_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `Room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff_details`
--
ALTER TABLE `staff_details`
  MODIFY `Staff_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `Student_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_module`
--
ALTER TABLE `student_module`
  MODIFY `StudentModule_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `week_details`
--
ALTER TABLE `week_details`
  MODIFY `Week_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
