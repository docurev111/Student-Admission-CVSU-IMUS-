-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 06:27 PM
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
(10, 10, 'david.lopez@example.com', 'strongPassword890'),
(11, 11, 'alice.smith@example.com', 'password1'),
(12, 12, 'bob.johnson@example.com', 'password2'),
(13, 13, 'charlie.brown@example.com', 'password3'),
(14, 14, 'david.davis@example.com', 'password4'),
(15, 15, 'eva.miller@example.com', 'password5'),
(16, 16, 'frank.wilson@example.com', 'password6'),
(17, 17, 'grace.moore@example.com', 'password7'),
(18, 18, 'hank.taylor@example.com', 'password8'),
(19, 19, 'ivy.anderson@example.com', 'password9'),
(20, 20, 'jack.thomas@example.com', 'password10');

-- --------------------------------------------------------

--
-- Table structure for table `admissioninformation`
--

CREATE TABLE `admissioninformation` (
  `admission_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `preferred_course` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `lrn` varchar(20) DEFAULT NULL,
  `rejection_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissioninformation`
--

INSERT INTO `admissioninformation` (`admission_id`, `student_id`, `preferred_course`, `status`, `lrn`, `rejection_reason`) VALUES
(1, 1, 'Computer Science', 'Approved', '123456789012', NULL),
(2, 2, 'Business Administration', 'Rejected', '987654321098', NULL),
(3, 3, 'Education', 'Approved', '456789012345', NULL),
(4, 4, 'Nursing', 'Approved', '789012345678', NULL),
(5, 5, 'Architecture', 'Approved', '234567890123', NULL),
(6, 6, 'Law', 'Approved', '345678901234', NULL),
(7, 7, 'Mechanical Engineering', 'Approved', '567890123456', NULL),
(8, 8, 'Biology', 'Rejected', '678901234567', NULL),
(9, 9, 'Finance', 'Pending', '890123456789', NULL),
(10, 10, 'Communications', 'Approved', '901234567890', NULL),
(11, 11, 'Computer Science', 'Pending', '123456789012', NULL),
(12, 12, 'Business Administration', 'Approved', '987654321098', NULL),
(13, 13, 'Education', 'Rejected', '456789012345', NULL),
(14, 14, 'Nursing', 'Pending', '789012345678', NULL),
(15, 15, 'Architecture', 'Approved', '234567890123', NULL),
(16, 16, 'Law', 'Pending', '345678901234', NULL),
(17, 17, 'Mechanical Engineering', 'Approved', '567890123456', NULL),
(18, 18, 'Biology', 'Rejected', '678901234567', NULL),
(19, 19, 'Finance', 'Pending', '890123456789', NULL),
(20, 20, 'Communications', 'Approved', '901234567890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `title`, `content`, `deleted`, `created_at`) VALUES
(1, 'Title:', 'dada', 1, '2024-07-03 04:00:44'),
(2, 'Important Update', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, '2024-07-03 04:01:27'),
(3, 'New Course Offerings', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, '2024-07-03 04:01:39'),
(4, 'Faculty Meeting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, '2024-07-03 04:01:52'),
(5, 'Faculty Meeting part 2 hahhaha', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 0, '2024-07-03 04:03:04');

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
(10, 10, 'Elementary School J', 'City J', '2008', 'Public', 'High School J', 'Town J', '2012', 'Private', 'Senior High J', 'City J', '2015', 'Public'),
(11, 11, 'Greenwood Elementary', 'City X', '2010', 'Public', 'Greenwood High', 'City X', '2014', 'Private', 'Greenwood Senior High', 'City X', '2017', 'Public'),
(12, 12, 'Sunnydale Elementary', 'City Y', '2009', 'Public', 'Sunnydale High', 'City Y', '2013', 'Private', 'Sunnydale Senior High', 'City Y', '2016', 'Public'),
(13, 13, 'Riverbank Elementary', 'City Z', '2008', 'Public', 'Riverbank High', 'City Z', '2012', 'Private', 'Riverbank Senior High', 'City Z', '2015', 'Public'),
(14, 14, 'Lakeside Elementary', 'City W', '2007', 'Public', 'Lakeside High', 'City W', '2011', 'Private', 'Lakeside Senior High', 'City W', '2014', 'Public'),
(15, 15, 'Hilltop Elementary', 'City V', '2006', 'Public', 'Hilltop High', 'City V', '2010', 'Private', 'Hilltop Senior High', 'City V', '2013', 'Public'),
(16, 16, 'Riverside Elementary', 'City U', '2012', 'Public', 'Riverside High', 'City U', '2016', 'Private', 'Riverside Senior High', 'City U', '2019', 'Public'),
(17, 16, 'Woodland Elementary', 'City T', '2011', 'Public', 'Woodland High', 'City T', '2015', 'Private', 'Woodland Senior High', 'City T', '2018', 'Public'),
(18, 18, 'Seaside Elementary', 'City S', '2010', 'Public', 'Seaside High', 'City S', '2014', 'Private', 'Seaside Senior High', 'City S', '2017', 'Public'),
(19, 19, 'Mountainview Elementary', 'City R', '2009', 'Public', 'Mountainview High', 'City R', '2013', 'Private', 'Mountainview Senior High', 'City R', '2016', 'Public'),
(20, 20, 'Valley Elementary', 'City Q', '2008', 'Public', 'Valley High', 'City Q', '2012', 'Private', 'Valley Senior High', 'City Q', '2015', 'Public');

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
(10, 10, 'Joseph Lopez', '09180000028', 'Entrepreneur', 'Sophia Lopez', '09180000029', 'Doctor', 'Guardian Name 10', '09180000030', 'Teacher'),
(11, 11, 'Robert Smith', '09301234567', 'Engineer', 'Laura Smith', '09311234567', 'Teacher', 'Emily Smith', '09321234567', 'Doctor'),
(12, 12, 'Michael Johnson', '09331234567', 'Architect', 'Linda Johnson', '09341234567', 'Nurse', 'David Johnson', '09351234567', 'Lawyer'),
(13, 13, 'James Brown', '09361234567', 'Pilot', 'Patricia Brown', '09371234567', 'Dentist', 'George Brown', '09381234567', 'Accountant'),
(14, 14, 'William Davis', '09391234567', 'Chef', 'Jennifer Davis', '09401234567', 'Pharmacist', 'Henry Davis', '09411234567', 'Engineer'),
(15, 15, 'Charles Miller', '09421234567', 'Mechanic', 'Barbara Miller', '09431234567', 'Veterinarian', 'Samuel Miller', '09441234567', 'Scientist'),
(16, 16, 'Joseph Wilson', '09451234567', 'Farmer', 'Susan Wilson', '09461234567', 'Teacher', 'Anna Wilson', '09471234567', 'Artist'),
(17, 17, 'Thomas Moore', '09481234567', 'Driver', 'Sarah Moore', '09491234567', 'Secretary', 'Paul Moore', '09501234567', 'Technician'),
(18, 18, 'Christopher Taylor', '09511234567', 'Programmer', 'Karen Taylor', '09521234567', 'HR Manager', 'Mark Taylor', '09531234567', 'Analyst'),
(19, 19, 'Daniel Anderson', '09541234567', 'Consultant', 'Betty Anderson', '09551234567', 'Journalist', 'Matthew Anderson', '09561234567', 'Broker'),
(20, 20, 'Anthony Thomas', '09571234567', 'Manager', 'Helen Thomas', '09581234567', 'Accountant', 'Jacob Thomas', '09591234567', 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `id_pic`
--

CREATE TABLE `id_pic` (
  `photo_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `id_name` varchar(255) DEFAULT NULL,
  `id_file` longblob DEFAULT NULL
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
  `baranggay` varchar(50) DEFAULT NULL,
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

INSERT INTO `personalinformation` (`student_id`, `firstname`, `middlename`, `lastname`, `suffix`, `date_of_birth`, `place_of_birth`, `sex`, `region`, `province`, `town`, `baranggay`, `street`, `zip_code`, `cellphone_number`, `landline_number`, `email`, `civil_status`, `religion`) VALUES
(1, 'John', 'A.', 'Doe', 'Jr.', '2002-05-15', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Street Name', '12345', '09171234567', '021234567', NULL, 'Single', 'Religion Name'),
(2, 'Mary', 'B.', 'Smith', 'Sr.', '2001-08-20', 'Town Name', 'F', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Another Street', '54321', '09182345678', '029876543', NULL, 'Married', 'Religion Name'),
(3, 'Alice', 'C.', 'Johnson', '', '1999-12-01', 'Village Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'New Street', '67890', '09871234567', '032165498', NULL, 'Single', 'Religion Name'),
(4, 'Michael', 'D.', 'Brown', '', '2003-02-28', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Main Street', '45678', '09173456789', '036547981', NULL, 'Single', 'Religion Name'),
(5, 'Sophia', 'E.', 'Garcia', '', '2000-10-05', 'Town Name', 'F', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Old Street', '98765', '09187654321', '027654321', NULL, 'Single', 'Religion Name'),
(6, 'Daniel', 'F.', 'Martinez', 'III', '2004-07-12', 'Village Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Side Street', '23456', '09184567890', '039876543', NULL, 'Single', 'Religion Name'),
(7, 'Emily', 'G.', 'Anderson', '', '1998-03-18', 'City Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Park Street', '87654', '09185678901', '028765432', NULL, 'Single', 'Religion Name'),
(8, 'James', 'H.', 'Wilson', '', '2001-12-30', 'Town Name', 'M', 'Region Name', 'Province Name', 'City Name', 'Barangay Name', 'Hill Street', '34567', '09182345678', '032198765', NULL, 'Single', 'Religion Name'),
(9, 'Emma', 'I.', 'Taylor', '', '2003-09-25', 'Village Name', 'F', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'River Street', '76543', '09181234567', '026543789', NULL, 'Single', 'Religion Name'),
(10, 'David', 'J.', 'Lopez', '', '1999-06-08', 'City Name', 'M', 'Region Name', 'Province Name', 'Town Name', 'Barangay Name', 'Forest Street', '54321', '09185674321', '031234567', NULL, 'Single', 'Religion Name'),
(11, 'Alice', 'B.', 'Smith', 'Jr.', '1998-03-12', 'City X', 'F', 'Region 5', 'Province X', 'Town X', 'Baranggay X', 'Street X', '5000', '09181234567', '1234568', NULL, 'Single', 'Catholic'),
(12, 'Bob', 'C.', 'Johnson', '', '1999-07-22', 'City Y', 'M', 'Region 3', 'Province Y', 'Town Y', 'Baranggay Y', 'Street Y', '3000', '09191234567', '1234569', NULL, 'Married', 'Protestant'),
(13, 'Charlie', 'D.', 'Brown', '', '2001-11-01', 'City Z', 'M', 'Region 7', 'Province Z', 'Town Z', 'Baranggay Z', 'Street Z', '7000', '09201234567', '1234570', NULL, 'Single', 'Muslim'),
(14, 'David', 'E.', 'Davis', '', '1997-05-14', 'City W', 'M', 'Region 2', 'Province W', 'Town W', 'Baranggay W', 'Street W', '2000', '09211234567', '1234571', NULL, 'Single', 'Buddhist'),
(15, 'Eva', 'F.', 'Miller', 'Sr.', '1996-12-30', 'City V', 'F', 'Region 6', 'Province V', 'Town V', 'Baranggay V', 'Street V', '6000', '09221234567', '1234572', NULL, 'Widowed', 'Hindu'),
(16, 'Frank', 'G.', 'Wilson', '', '2000-06-25', 'City U', 'M', 'Region 4', 'Province U', 'Town U', 'Baranggay U', 'Street U', '4000', '09231234567', '1234573', NULL, 'Single', 'Catholic'),
(17, 'Grace', 'H.', 'Moore', '', '1995-09-15', 'City T', 'F', 'Region 8', 'Province T', 'Town T', 'Baranggay T', 'Street T', '8000', '09241234567', '1234574', NULL, 'Single', 'Christian'),
(18, 'Hank', 'I.', 'Taylor', '', '1998-02-10', 'City S', 'M', 'Region 1', 'Province S', 'Town S', 'Baranggay S', 'Street S', '1000', '09251234567', '1234575', NULL, 'Single', 'Catholic'),
(19, 'Ivy', 'J.', 'Anderson', '', '1999-08-05', 'City R', 'F', 'Region 5', 'Province R', 'Town R', 'Baranggay R', 'Street R', '5000', '09261234567', '1234576', NULL, 'Married', 'Jewish'),
(20, 'Jack', 'K.', 'Thomas', '', '2001-03-28', 'City Q', 'M', 'Region 3', 'Province Q', 'Town Q', 'Baranggay Q', 'Street Q', '3000', '09271234567', '1234577', NULL, 'Single', 'Agnostic');

-- --------------------------------------------------------

--
-- Table structure for table `report_card`
--

CREATE TABLE `report_card` (
  `card_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `report_card_name` varchar(255) DEFAULT NULL,
  `report_card_file` longblob DEFAULT NULL
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
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

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
-- Indexes for table `id_pic`
--
ALTER TABLE `id_pic`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `report_card`
--
ALTER TABLE `report_card`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountinformation`
--
ALTER TABLE `accountinformation`
  MODIFY `accound_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admissioninformation`
--
ALTER TABLE `admissioninformation`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `familybackground`
--
ALTER TABLE `familybackground`
  MODIFY `family_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `id_pic`
--
ALTER TABLE `id_pic`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `report_card`
--
ALTER TABLE `report_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `id_pic`
--
ALTER TABLE `id_pic`
  ADD CONSTRAINT `id_pic_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);

--
-- Constraints for table `report_card`
--
ALTER TABLE `report_card`
  ADD CONSTRAINT `report_card_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `personalinformation` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
