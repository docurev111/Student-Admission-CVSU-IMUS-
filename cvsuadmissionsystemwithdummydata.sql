-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 06:08 AM
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
  `accound_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountinformation`
--

INSERT INTO `accountinformation` (`accound_id`, `student_id`, `email`, `password`) VALUES
(1, 1, 'john.doe@example.com', 'password123'),
(2, 2, 'mary.smith@example.com', 'securePassword'),
(3, 3, 'alice.johnson@example.com', 'password456'),
(4, 4, 'michael.brown@example.com', 'strongPassword'),
(5, 5, 'sophia.garcia@example.com', 'password789'),
(6, 6, 'daniel.martinez@example.com', 'passwordabc'),
(7, 7, 'emily.anderson@example.com', 'passwordxyz'),
(8, 8, 'james.wilson@example.com', 'password1234'),
(9, 9, 'emma.taylor@example.com', 'securePassword567'),
(10, 10, 'david.lopez@example.com', 'strongPassword890');

-- --------------------------------------------------------

--
-- Table structure for table `admissioninformation`
--

CREATE TABLE `admissioninformation` (
  `admission_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `preferred_course` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `lrn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissioninformation`
--

INSERT INTO `admissioninformation` (`admission_id`, `student_id`, `preferred_course`, `status`, `lrn`) VALUES
(1, 1, 'Computer Science', 'Pending', '123456789012'),
(2, 2, 'Business Administration', 'Accepted', '987654321098'),
(3, 3, 'Education', 'Rejected', '456789012345'),
(4, 4, 'Nursing', 'Pending', '789012345678'),
(5, 5, 'Architecture', 'Accepted', '234567890123'),
(6, 6, 'Law', 'Pending', '345678901234'),
(7, 7, 'Mechanical Engineering', 'Accepted', '567890123456'),
(8, 8, 'Biology', 'Rejected', '678901234567'),
(9, 9, 'Finance', 'Pending', '890123456789'),
(10, 10, 'Communications', 'Accepted', '901234567890');

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

--
-- Dumping data for table `educationalbackground`
--

INSERT INTO `educationalbackground` (`education_id`, `student_id`, `elementary_school_name`, `elementary_school_address`, `elementary_year_graduated`, `elementary_type`, `high_school_name`, `high_school_address`, `high_school_year_graduated`, `high_school_type`, `senior_high_school_name`, `senior_high_school_address`, `senior_high_school_year_graduated`, `senior_high_school_type`) VALUES
(1, 1, 'Elementary School A', 'City A', '2010', 'Public', 'High School A', 'Town A', '2014', 'Private', 'Senior High A', 'City A', '2017', 'Public'),
(2, 2, 'Elementary School B', 'City B', '2009', 'Public', 'High School B', 'Town B', '2013', 'Private', 'Senior High B', 'City B', '2016', 'Public'),
(3, 3, 'Elementary School C', 'City C', '2008', 'Public', 'High School C', 'Town C', '2012', 'Private', 'Senior High C', 'City C', '2015', 'Public'),
(4, 4, 'Elementary School D', 'City D', '2007', 'Public', 'High School D', 'Town D', '2011', 'Private', 'Senior High D', 'City D', '2014', 'Public'),
(5, 5, 'Elementary School E', 'City E', '2006', 'Public', 'High School E', 'Town E', '2010', 'Private', 'Senior High E', 'City E', '2013', 'Public'),
(6, 6, 'Elementary School F', 'City F', '2012', 'Public', 'High School F', 'Town F', '2016', 'Private', 'Senior High F', 'City F', '2019', 'Public'),
(7, 7, 'Elementary School G', 'City G', '2011', 'Public', 'High School G', 'Town G', '2015', 'Private', 'Senior High G', 'City G', '2018', 'Public'),
(8, 8, 'Elementary School H', 'City H', '2010', 'Public', 'High School H', 'Town H', '2014', 'Private', 'Senior High H', 'City H', '2017', 'Public'),
(9, 9, 'Elementary School I', 'City I', '2009', 'Public', 'High School I', 'Town I', '2013', 'Private', 'Senior High I', 'City I', '2016', 'Public'),
(10, 10, 'Elementary School J', 'City J', '2008', 'Public', 'High School J', 'Town J', '2012', 'Private', 'Senior High J', 'City J', '2015', 'Public');

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
  `guardian_occupation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familybackground`
--

INSERT INTO `familybackground` (`family_id`, `student_id`, `father_name`, `father_contact_number`, `father_occupation`, `mother_name`, `mother_contact_number`, `mother_occupation`, `guardian_name`, `guardian_contact_number`, `guardian_occupation`) VALUES
(1, 1, 'John Doe Sr.', '09180000001', 'Engineer', 'Jane Doe', '09180000002', 'Teacher', 'Guardian Name 1', '09180000003', 'Business Owner'),
(2, 2, 'James Smith', '09180000004', 'Doctor', 'Emily Smith', '09180000005', 'Nurse', 'Guardian Name 2', '09180000006', 'Artist'),
(3, 3, 'Robert Johnson', '09180000007', 'Lawyer', 'Sarah Johnson', '09180000008', 'Accountant', 'Guardian Name 3', '09180000009', 'Entrepreneur'),
(4, 4, 'Michael Brown Sr.', '09180000010', 'Architect', 'Michelle Brown', '09180000011', 'Artist', 'Guardian Name 4', '09180000012', 'Engineer'),
(5, 5, 'William Garcia', '09180000013', 'Professor', 'Olivia Garcia', '09180000014', 'Psychologist', 'Guardian Name 5', '09180000015', 'Writer'),
(6, 6, 'Samuel Martinez', '09180000016', 'Pilot', 'Hannah Martinez', '09180000017', 'Dentist', 'Guardian Name 6', '09180000018', 'Photographer'),
(7, 7, 'Benjamin Anderson', '09180000019', 'Chef', 'Ella Anderson', '09180000020', 'Police Officer', 'Guardian Name 7', '09180000021', 'Designer'),
(8, 8, 'Lucas Wilson', '09180000022', 'Scientist', 'Isabella Wilson', '09180000023', 'Veterinarian', 'Guardian Name 8', '09180000024', 'Actor'),
(9, 9, 'Gabriel Taylor', '09180000025', 'Journalist', 'Ava Taylor', '09180000026', 'Engineer', 'Guardian Name 9', '09180000027', 'Musician'),
(10, 10, 'Joseph Lopez', '09180000028', 'Entrepreneur', 'Sophia Lopez', '09180000029', 'Doctor', 'Guardian Name 10', '09180000030', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `personalinformation`
--

CREATE TABLE `personalinformation` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
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
  `landline_number` varchar(15) NOT NULL,
  `email` varchar(15) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personalinformation`
--

INSERT INTO `personalinformation` (`student_id`, `firstname`, `middlename`, `lastname`, `suffix`, `date_of_birth`, `place_of_birth`, `sex`, `region`, `province`, `town`, `barangay`, `street`, `zip_code`, `cellphone_number`, `landline_number`, `email`, `civil_status`, `religion`) VALUES
(1, 'John', 'A.', 'Doe', 'Jr.', '2002-05-15', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Street Name', '12345', '09171234567', '021234567', NULL, 'Single', 'Religion Name'),
(2, 'Mary', 'B.', 'Smith', 'Sr.', '2001-08-20', 'Town Name', 'F', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Another Street', '54321', '09182345678', '029876543', NULL, 'Married', 'Religion Name'),
(3, 'Alice', 'C.', 'Johnson', '', '1999-12-01', 'Village Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'New Street', '67890', '09871234567', '032165498', NULL, 'Single', 'Religion Name'),
(4, 'Michael', 'D.', 'Brown', '', '2003-02-28', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Main Street', '45678', '09173456789', '036547981', NULL, 'Single', 'Religion Name'),
(5, 'Sophia', 'E.', 'Garcia', '', '2000-10-05', 'Town Name', 'F', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Old Street', '98765', '09187654321', '027654321', NULL, 'Single', 'Religion Name'),
(6, 'Daniel', 'F.', 'Martinez', 'III', '2004-07-12', 'Village Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Side Street', '23456', '09184567890', '039876543', NULL, 'Single', 'Religion Name'),
(7, 'Emily', 'G.', 'Anderson', '', '1998-03-18', 'City Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Park Street', '87654', '09185678901', '028765432', NULL, 'Single', 'Religion Name'),
(8, 'James', 'H.', 'Wilson', '', '2001-12-30', 'Town Name', 'M', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Hill Street', '34567', '09182345678', '032198765', NULL, 'Single', 'Religion Name'),
(9, 'Emma', 'I.', 'Taylor', '', '2003-09-25', 'Village Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'River Street', '76543', '09181234567', '026543789', NULL, 'Single', 'Religion Name'),
(10, 'David', 'J.', 'Lopez', '', '1999-06-08', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Forest Street', '54321', '09185674321', '031234567', NULL, 'Single', 'Religion Name');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountinformation`
--
ALTER TABLE `accountinformation`
  ADD PRIMARY KEY (`accound_id`),
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
  MODIFY `accound_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admissioninformation`
--
ALTER TABLE `admissioninformation`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `familybackground`
--
ALTER TABLE `familybackground`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
