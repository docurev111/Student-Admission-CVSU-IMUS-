-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 06:09 AM
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
  `guardian_occupation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `accound_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admissioninformation`
--
ALTER TABLE `admissioninformation`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

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
