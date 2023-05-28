-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 10:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

CREATE DATABASE vaccinationsystem;
use vaccinationsystem;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccinationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminName`, `AdminPassword`) VALUES
('umer', 'aiman');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `vaccination_id` int(11) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `parent_id`, `child_id`, `vaccination_id`, `hospital_id`, `booking_date`, `approved`) VALUES
(45, 72, 3, 10, 1, '2023-03-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `child_id` int(11) NOT NULL,
  `childname` varchar(255) DEFAULT NULL,
  `Dateofbirth` date DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`child_id`, `childname`, `Dateofbirth`, `parent_id`) VALUES
(1, 'Zaid', '2022-12-16', 33),
(3, 'sufyan ahmed', '2021-02-07', 72),
(5, 'Umer', '2023-03-08', 72),
(11, 'Munir Ahmed Khan', '2021-07-22', 33);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospital_id` int(11) NOT NULL,
  `hospitalname` varchar(255) DEFAULT NULL,
  `hospitalemail` varchar(255) DEFAULT NULL,
  `Hospitalpassword` varchar(255) NOT NULL,
  `hospitaladdress` varchar(255) DEFAULT NULL,
  `Hepatitis_B_HepB` tinyint(1) DEFAULT 0,
  `RotaVirus_RV` tinyint(1) DEFAULT 0,
  `Diphteria_Tetanus_Pertussis_DTaP` tinyint(1) DEFAULT 0,
  `H_Influenzae_type_B_Hib` tinyint(1) DEFAULT 0,
  `Pneumococcal_PCV` tinyint(1) DEFAULT 0,
  `Inactivated_Poliovirus_IPV` tinyint(1) DEFAULT 0,
  `Measels_MumpsRubella_MMR` tinyint(1) DEFAULT 0,
  `Varicella_VAR` tinyint(1) DEFAULT 0,
  `Hepatitius_A_HepA` tinyint(1) DEFAULT 0,
  `Influenza` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospital_id`, `hospitalname`, `hospitalemail`, `Hospitalpassword`, `hospitaladdress`, `Hepatitis_B_HepB`, `RotaVirus_RV`, `Diphteria_Tetanus_Pertussis_DTaP`, `H_Influenzae_type_B_Hib`, `Pneumococcal_PCV`, `Inactivated_Poliovirus_IPV`, `Measels_MumpsRubella_MMR`, `Varicella_VAR`, `Hepatitius_A_HepA`, `Influenza`) VALUES
(1, 'Dr.Ziauddin Hospital North Nazimabad', 'Dr.Ziauddin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Dr. Ziauddin Hospital North Nazimabad Campus, Allama Rasheed Turabi Road, Wahid Colony, Karachi', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(13, '	Saifee Hospital', 'SaifeeHospital@gmail.com	', '8cb2237d0679ca88db6464eac60da96345513964	', 'Saifee Hospital, St-1, Block F North Nazimabad Town, Karachi, Sindh 74700, Pakistan	', 1, 0, 1, 0, 1, 0, 1, 1, 1, 0),
(14, 'Asgar Hospital', 'asgarhospital@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964	', 'W2JJ+W2Q Asgar Hospital, Block A North Nazimabad Town, Karachi, Karachi City, Sindh, Pakistan', 0, 1, 0, 1, 0, 1, 0, 1, 0, 1),
(15, 'Imam Clinic', 'imamclinic@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964	', 'Imam Clinic, Block I North Nazimabad Town, Karachi', 1, 1, 0, 0, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `parentname` varchar(255) DEFAULT NULL,
  `parentemail` varchar(255) NOT NULL,
  `parentpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `parentname`, `parentemail`, `parentpassword`) VALUES
(33, 'umer ejaz', 'umertheninja44@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `child_id` int(11) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `vaccination_id` int(11) DEFAULT NULL,
  `date_of_request` date DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `parent_id`, `child_id`, `hospital_id`, `vaccination_id`, `date_of_request`, `approved`) VALUES
(22, 72, 3, 1, 4, '2023-03-23', 1),
(23, 72, 3, 1, 10, '2023-03-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `vaccination_id` int(11) NOT NULL,
  `vaccinationname` varchar(255) DEFAULT NULL,
  `birth` tinyint(1) DEFAULT 0,
  `2months` tinyint(1) DEFAULT 0,
  `4months` tinyint(1) DEFAULT 0,
  `6months` tinyint(1) DEFAULT 0,
  `12months` tinyint(1) DEFAULT 0,
  `15months` tinyint(1) DEFAULT 0,
  `18months` tinyint(1) DEFAULT 0,
  `24months` tinyint(1) DEFAULT 0,
  `4_5years` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinations`
--

INSERT INTO `vaccinations` (`vaccination_id`, `vaccinationname`, `birth`, `2months`, `4months`, `6months`, `12months`, `15months`, `18months`, `24months`, `4_5years`) VALUES
(1, 'Hepatitis_B_HepB', 1, 1, 0, 1, 0, 0, 0, 0, 0),
(2, 'RotaVirus_RV', 0, 1, 1, 1, 0, 0, 0, 0, 0),
(3, 'Diphteria_Tetanus_Pertussis_DTaP', 0, 1, 1, 1, 0, 1, 0, 0, 1),
(4, 'H_Influenzae_type_B_Hib', 0, 1, 1, 0, 0, 1, 0, 0, 0),
(5, 'Pneumococcal_PCV', 0, 1, 1, 1, 1, 0, 0, 0, 0),
(6, 'Inactivated_Poliovirus_IPV', 0, 1, 1, 1, 0, 0, 0, 0, 1),
(7, 'Measels_MumpsRubella_MMR', 0, 0, 0, 0, 1, 0, 0, 0, 1),
(8, 'Varicella_VAR', 0, 0, 0, 0, 1, 0, 0, 0, 1),
(9, 'Hepatitius_A_HepA', 0, 0, 0, 0, 0, 0, 1, 1, 0),
(10, 'Influenza', 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_dates`
--

CREATE TABLE `vaccination_dates` (
  `vaccination_date_id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `vaccination_id` int(11) DEFAULT NULL,
  `date_of_vaccination` date DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccination_dates`
--

INSERT INTO `vaccination_dates` (`vaccination_date_id`, `child_id`, `vaccination_id`, `date_of_vaccination`, `is_completed`) VALUES
(43, 3, 10, '2023-03-24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `booking_ibfk_3` (`vaccination_id`),
  ADD KEY `bookings_ibfk_3` (`parent_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospital_id`),
  ADD UNIQUE KEY `hospitalemail` (`hospitalemail`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `parentemail` (`parentemail`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `hospital_id` (`hospital_id`),
  ADD KEY `vaccination_id` (`vaccination_id`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`vaccination_id`),
  ADD UNIQUE KEY `vaccinationname` (`vaccinationname`);

--
-- Indexes for table `vaccination_dates`
--
ALTER TABLE `vaccination_dates`
  ADD PRIMARY KEY (`vaccination_date_id`),
  ADD UNIQUE KEY `uniquer` (`child_id`,`vaccination_id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `vaccination_id` (`vaccination_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `vaccination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vaccination_dates`
--
ALTER TABLE `vaccination_dates`
  MODIFY `vaccination_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `children` (`child_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`child_id`) REFERENCES `children` (`child_id`),
  ADD CONSTRAINT `requests_ibfk_3` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`hospital_id`);

--
-- Constraints for table `vaccination_dates`
--
ALTER TABLE `vaccination_dates`
  ADD CONSTRAINT `vaccination_dates_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `children` (`child_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
