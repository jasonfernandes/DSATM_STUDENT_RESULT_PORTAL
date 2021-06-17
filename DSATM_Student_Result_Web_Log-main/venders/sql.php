-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 27, 2021 at 12:03 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `student_data_base`
--
CREATE DATABASE IF NOT EXISTS `student_data_base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `student_data_base`;

-- --------------------------------------------------------

--
-- Table structure for table `cocurricular_activities`
--

CREATE TABLE `cocurricular_activities` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `date` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cocurricular_activities`
--

INSERT INTO `cocurricular_activities` (`usn`, `name`, `date`, `sem`, `description`) VALUES
('1DT18CS055', 'Prashanth Reddy', '27-02-2020', '4', 'Web Development Conducted CSI 33rd Convention in DSATM'),
('1DT18CS065', 'Nafey', '23-09-2019', '3', 'Debate event organized in The Esperenza  Cultural Fest of DSATM'),
('1DT18EC035', 'Hrushikesh B Chavare', '27-02-2019', '2', 'Inter College Science Forum held at DSATM , Bengaluru.'),
('1DT18IS002', 'Aditya Prasad', '27-02-2020', '4', 'CSI 33rd convention held at DSATM participated in Decoding and also been part of the as volunteer.'),
('1DT18IS012', 'Ayush Dravid', '27-02-2020', '5', '33rd CSI convention held at DSATM and participated in event web-development'),
('1DT18IS015', 'BHARATH H J', '15-09-20', '5', 'CPA: Programming Essentials in C++ \r\nDuring the Cisco Networking Academy® course, administered by the undersigned instructor, the student has studied the following skills:\r\nThis Statement of Achievement is to acknowledge that during the course CPA: Programming Essentials in C++, the student has been able to accomplish coding tasks related to the basics of programming in the C++ language, and understands the fundamental notions and techniques used in object-oriented programming.\r\nBy completing the course, the student is now ready to attempt the qualification CPA – C++ Certified Associate Programmer Certification, from the C++ Institute.'),
('1DT18IS023', 'Deepayan Ghosh', '17-08-2020', '5', 'SIMA Analaytica LTD : Full-stack Developer as intern'),
('1DT18IS039', 'Jason Francis Fernandes', '16-10-2020', '5', 'LIC POLICY Return Management System Project 2020 had a role of Free Lancer.'),
('1DT18IS052', 'MANVITH J Y', '30-09-2020', '4', 'UDEMY Course : Introduction to Databases and SQL online course under the guidance of Rakesh Gopalakrishnan');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `name`) VALUES
('1', 'ISE'),
('2', 'CSE'),
('3', 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `extra_curricular_activities`
--

CREATE TABLE `extra_curricular_activities` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `content` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `extra_curricular_activities`
--

INSERT INTO `extra_curricular_activities` (`usn`, `name`, `sem`, `date`, `content`) VALUES
('1DT18CS065', 'Nafey', '3', '21-10-2019', 'Volley Ball taluk level held by sports auhority of VTU at Bengaluru'),
('1DT18IS012', 'Ayush Dravid', '3', '18-04-2020', 'DANCE COMPETITION of the event Esperanza'),
('1DT18IS023', 'Deepayan Ghosh', '4', '08-02-2020', 'Karate National Level held at Bengaluru and had secured Bronze (3rd Position) ');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `usn` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`usn`, `message`) VALUES
('1DT18IS000', 'Hi AMAR Congratulations You are eligible for DSATM Placements 2021.');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `SGPA` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`usn`, `name`, `sem`, `SGPA`) VALUES
('1DT18CS055', 'Prashanth Reddy', '4', 9),
('1DT18CS065', 'Nafey', '4', 9),
('1DT18EC035', 'Hrushikesh B Chavare', '4', 8),
('1DT18IS000', 'AMAR', '3', 8),
('1DT18IS002', 'Aditya Prasad', '4', 9),
('1DT18IS012', 'Ayush Dravid', '4', 8),
('1DT18IS015', 'Bharath H J', '4', 9),
('1DT18IS023', 'Deepayan Ghosh', '4', 8),
('1DT18IS039', 'Jason Francis Fernandes', '4', 9),
('1DT18IS052', 'Manvith J Y', '4', 8);

--
-- Triggers `result`
--
DELIMITER $$
CREATE TRIGGER `after_members_insert` AFTER INSERT ON `result` FOR EACH ROW BEGIN
    IF NEW.SGPA<7 THEN
        INSERT INTO reminders(usn, message)
        VALUES(new.usn,CONCAT('Hi ', NEW.name, ' Please improve your SGPA to get eligibility for DSATM Placements 2021.'));
        ELSE 
        INSERT INTO reminders(usn, message)
        	VALUES(new.usn,CONCAT('Hi ', NEW.name, ' Congratulations You are eligible for DSATM Placements 2021.'));
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(70) NOT NULL,
  `dept_id` varchar(45) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `batch` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `email`, `dept_id`, `phone`, `address`, `sem`, `batch`, `gender`) VALUES
('1', 'A', 'A', '1', '1234567', 'QWE', '3', '2018', 'M'),
('1DT18CS055', 'Prashanth Reddy', 'lprashanth987@gmail.com', '2', '9019723839', 'Ward 3,Bsaveshwaranagar,Ballari', '5', '2018', 'MALE'),
('1DT18CS065', 'Nafey', 'nafeyahthenx@gmail.com', '2', '8904991412', 'Wadi-e-huda , Shivamogga Karnataka', '5', '2018', 'MALE'),
('1DT18EC035', 'Hrushikesh B Chavare', 'infohrushikesh@gmail.com', '3', '9945895800', 'House No 429 Chavare Street, Shedbal, Belagavi Karnataka', '5', '2018', 'MALE'),
('1DT18IS000', 'AMAR', 'Amar@gmail.com', '2', '212349598', 'asdfghjkl', '3', '2018', 'M'),
('1DT18IS002', 'Aditya Prasad', '1dt18is002.adityaprasad@gmail.com', '1', '8930528335', 'Brigade Meadows Kaglipura Bengaluru Karnataka', '5', '2018', 'MALE'),
('1DT18IS012', 'Ayush Dravid', '1dt18is012.ayushdravid@gmail.com', '1', '8618529543', 'Sakalwara Bengaluru Karnataka', '5', '2018', 'MALE'),
('1DT18IS015', 'Bharath H J', '1dt18is015.bharath@gmail.com', '1', '6362787700', 'Shree Nilaya , Jayanagar 1st Stage Hassan 573201 Karnataka', '5', '2018', 'MALE'),
('1DT18IS023', 'Deepayan Ghosh', '1d18is023.deepayanghosh@gmail.com', '1', '7019449052', 'Gottigere Bannerghata Banglore Karnataka', '5', '2018', 'MALE'),
('1DT18IS039', 'Jason Francis Fernandes', '1dt18is039.jason@gmail.com', '1', '8310174544', 'LIC of India Quarters Karwar Karnataka', '5', '2018', 'MALE'),
('1DT18IS052', 'ManvithJ Y', '1dt18is052.manvithjy@gmail.com', '1', '9482818188', 'Javagal Thirthahalli Taluk Shivmogha Karnataka', '5', '2018', 'MALE'),
('2', '2', '2', '1', '2', '2', '3', '2018', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cocurricular_activities`
--
ALTER TABLE `cocurricular_activities`
  ADD PRIMARY KEY (`usn`,`description`(10));

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `extra_curricular_activities`
--
ALTER TABLE `extra_curricular_activities`
  ADD PRIMARY KEY (`usn`,`name`,`content`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `usn` (`usn`),
  ADD KEY `Foreign key` (`dept_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cocurricular_activities`
--
ALTER TABLE `cocurricular_activities`
  ADD CONSTRAINT `cocurricular_activities_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `extra_curricular_activities`
--
ALTER TABLE `extra_curricular_activities`
  ADD CONSTRAINT `extra_curricular_activities_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);
