-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 02:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvsuadmissionsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountinformation`
--

CREATE TABLE `accountinformation` (
  `family_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admissioninformation`
--

CREATE TABLE `admissioninformation` (
  `admission_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `first_choice_course` varchar(50) DEFAULT NULL,
  `second_choice_course` varchar(50) DEFAULT NULL,
  `third_choice_course` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `lrn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissioninformation`
--

INSERT INTO `admissioninformation` (`admission_id`, `student_id`, `first_choice_course`, `second_choice_course`, `third_choice_course`, `status`, `lrn`) VALUES
(1, 1, 'Computer Science', 'Information Technology', 'Software Engineering', 'Pending', '1234567890'),
(2, 2, 'Business Administration', 'Accounting', 'Finance', 'Approved', '2345678901'),
(3, 3, 'Mechanical Engineering', 'Civil Engineering', 'Electrical Engineering', 'Pending', '3456789012'),
(4, 4, 'Nursing', 'Pharmacy', 'Physical Therapy', 'Approved', '4567890123'),
(5, 5, 'Biology', 'Chemistry', 'Physics', 'Pending', '5678901234'),
(6, 6, 'Psychology', 'Sociology', 'Anthropology', 'Approved', '6789012345'),
(7, 7, 'Mathematics', 'Statistics', 'Data Science', 'Pending', '7890123456'),
(8, 8, 'Economics', 'Political Science', 'History', 'Approved', '8901234567'),
(9, 9, 'English', 'Literature', 'Creative Writing', 'Pending', '9012345678'),
(10, 10, 'Architecture', 'Urban Planning', 'Interior Design', 'Approved', '0123456789'),
(11, 11, 'Law', 'Political Science', 'International Relations', 'Pending', '1123456789'),
(12, 12, 'Medicine', 'Nursing', 'Dentistry', 'Approved', '2123456789'),
(13, 13, 'Computer Engineering', 'Electrical Engineering', 'Mechanical Engineering', 'Pending', '3123456789'),
(14, 14, 'Fine Arts', 'Design', 'Art History', 'Approved', '4123456789'),
(15, 15, 'Environmental Science', 'Geology', 'Geography', 'Rejected', '5123456789');

-- --------------------------------------------------------

--
-- Table structure for table `educationalbackground`
--

CREATE TABLE `educationalbackground` (
  `education_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `elementary_school_name` varchar(100) DEFAULT NULL,
  `elementary_school_address` varchar(255) DEFAULT NULL,
  `elementary_year_graduated` year(4) DEFAULT NULL,
  `elementary_type` varchar(50) DEFAULT NULL,
  `high_school_name` varchar(100) DEFAULT NULL,
  `high_school_address` varchar(255) DEFAULT NULL,
  `high_school_year_graduated` year(4) DEFAULT NULL,
  `high_school_type` varchar(50) DEFAULT NULL,
  `senior_high_school_name` varchar(100) DEFAULT NULL,
  `senior_high_school_address` varchar(255) DEFAULT NULL,
  `senior_high_school_year_graduated` year(4) DEFAULT NULL,
  `senior_high_school_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `familybackground`
--

CREATE TABLE `familybackground` (
  `family_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_contact_number` varchar(15) DEFAULT NULL,
  `father_occupation` varchar(50) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_contact_number` varchar(15) DEFAULT NULL,
  `mother_occupation` varchar(50) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_contact_number` varchar(15) DEFAULT NULL,
  `guardian_occupation` varchar(50) DEFAULT NULL,
  `family_income` decimal(10,2) DEFAULT NULL,
  `number_of_siblings` int(11) DEFAULT NULL,
  `birth_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalinformation`
--

CREATE TABLE `medicalinformation` (
  `medical_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `medications` text DEFAULT NULL,
  `illnesses` text DEFAULT NULL,
  `physical_conditions` text DEFAULT NULL,
  `is_pwd` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personalinformation`
--

CREATE TABLE `personalinformation` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `mi` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `cellphone_number` varchar(15) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personalinformation`
--

INSERT INTO `personalinformation` (`student_id`, `firstname`, `mi`, `lastname`, `suffix`, `date_of_birth`, `place_of_birth`, `sex`, `region`, `province`, `town`, `barangay`, `street`, `zip_code`, `cellphone_number`, `email`, `civil_status`, `religion`) VALUES
(1, 'John', 'A.', 'Doe', 'Jr.', '2002-05-15', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Street Name', '12345', '09171234567', 'bruh@email.com', 'Single', 'Religion Name'),
(2, 'Mary', 'B.', 'Smith', 'Sr.', '2001-08-20', 'Town Name', 'F', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Another Street', '54321', '09182345678', 'bruh@email.com', 'Married', 'Religion Name'),
(3, 'Alice', 'C.', 'Johnson', '', '1999-12-01', 'Village Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'New Street', '67890', '09871234567', 'bruh@email.com', 'Single', 'Religion Name'),
(4, 'Michael', 'D.', 'Brown', '', '2003-02-28', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Main Street', '45678', '09173456789', 'bruh@email.com', 'Single', 'Religion Name'),
(5, 'Emily', 'E.', 'Wilson', '', '2000-07-10', 'Suburb Name', 'F', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Central Street', '56789', '09174567890', 'bruh@email.com', 'Single', 'Religion Name'),
(6, 'David', 'F.', 'Martinez', '', '1998-04-05', 'Village Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Side Street', '34567', '09175678901', 'bruh@email.com', 'Single', 'Religion Name'),
(7, 'Sarah', 'G.', 'Anderson', '', '2004-10-18', 'City Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Corner Street', '23456', '09176789012', 'bruh@email.com', 'Single', 'Religion Name'),
(8, 'William', 'H.', 'Taylor', '', '1997-03-25', 'Town Name', 'M', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Crescent Street', '78901', '09177890123', 'bruh@email.com', 'Single', 'Religion Name'),
(9, 'Olivia', 'I.', 'Thomas', '', '2002-09-05', 'Suburb Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Park Street', '67890', '09178901234', 'bruh@email.com', 'Single', 'Religion Name'),
(10, 'Ethan', 'J.', 'Jackson', '', '2001-11-30', 'Village Name', 'M', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Market Street', '89012', '09179012345', 'bruh@email.com', 'Single', 'Religion Name'),
(11, 'Sophia', 'K.', 'White', '', '2003-06-15', 'City Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Plaza Street', '12346', '09170123456', 'bruh@email.com', 'Single', 'Religion Name'),
(12, 'Alexander', 'L.', 'Harris', '', '2000-01-28', 'Town Name', 'M', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Beach Street', '78902', '09171234567', 'bruh@email.com', 'Single', 'Religion Name'),
(13, 'Mia', 'M.', 'King', '', '1999-05-20', 'Suburb Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Hill Street', '45678', '09172345678', 'bruh@email.com', 'Single', 'Religion Name'),
(14, 'Benjamin', 'N.', 'Lee', '', '2004-08-12', 'Village Name', 'M', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'River Street', '89012', '09173456789', 'bruh@email.com', 'Single', 'Religion Name'),
(15, 'Charlotte', 'O.', 'Clark', '', '1998-02-14', 'City Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Garden Street', '34567', '09174567890', 'bruh@email.com', 'Single', 'Religion Name');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountinformation`
--
ALTER TABLE `accountinformation`
  ADD PRIMARY KEY (`family_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `admissioninformation`
--
ALTER TABLE `admissioninformation`
  ADD PRIMARY KEY (`admission_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `familybackground`
--
ALTER TABLE `familybackground`
  ADD PRIMARY KEY (`family_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `medicalinformation`
--
ALTER TABLE `medicalinformation`
  ADD PRIMARY KEY (`medical_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountinformation`
--
ALTER TABLE `accountinformation`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admissioninformation`
--
ALTER TABLE `admissioninformation`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `familybackground`
--
ALTER TABLE `familybackground`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalinformation`
--
ALTER TABLE `medicalinformation`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountinformation`
--
ALTER TABLE `accountinformation`
  ADD CONSTRAINT `accountinformation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);

--
-- Constraints for table `admissioninformation`
--
ALTER TABLE `admissioninformation`
  ADD CONSTRAINT `admissioninformation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);

--
-- Constraints for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  ADD CONSTRAINT `educationalbackground_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);

--
-- Constraints for table `familybackground`
--
ALTER TABLE `familybackground`
  ADD CONSTRAINT `familybackground_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);

--
-- Constraints for table `medicalinformation`
--
ALTER TABLE `medicalinformation`
  ADD CONSTRAINT `medicalinformation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
