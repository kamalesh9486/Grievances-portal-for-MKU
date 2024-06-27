-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 03:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinzo1`
--

-- --------------------------------------------------------

--
-- Table structure for table `grievances`
--

CREATE TABLE `grievances` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `register_number` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `program_type` varchar(255) DEFAULT NULL,
  `main_course` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `idcard` varchar(255) DEFAULT NULL,
  `grievance_type` varchar(255) DEFAULT NULL,
  `batch` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `grievances_details` text DEFAULT NULL,
  `Fees_Payment_Details` varchar(255) DEFAULT NULL,
  `Hall_Ticket` varchar(255) DEFAULT NULL,
  `Exam_Application_Form` varchar(255) DEFAULT NULL,
  `Available_Mark_Statement` varchar(255) DEFAULT NULL,
  `Consolidated_Mark_Statement` varchar(255) DEFAULT NULL,
  `Course_Completion_Certificate` varchar(255) DEFAULT NULL,
  `Application_Fees` varchar(255) DEFAULT NULL,
  `Genuine_Certificate_Fees` varchar(255) DEFAULT NULL,
  `PSTM` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `detailed_description` longtext DEFAULT NULL,
  `last_appearance` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grievances`
--

INSERT INTO `grievances` (`id`, `name`, `register_number`, `course_name`, `date_of_birth`, `program_type`, `main_course`, `mobile`, `email`, `address`, `idcard`, `grievance_type`, `batch`, `status`, `grievances_details`, `Fees_Payment_Details`, `Hall_Ticket`, `Exam_Application_Form`, `Available_Mark_Statement`, `Consolidated_Mark_Statement`, `Course_Completion_Certificate`, `Application_Fees`, `Genuine_Certificate_Fees`, `PSTM`, `created_at`, `detailed_description`, `last_appearance`) VALUES
(1, 'Dinesh Kumar', '2023DDEMCA001', 'M.C.A. (Master of Computer Applications)', '2002-02-04', 'semester', 'PG Courses', '9898898989', 'dinesh@gmail.com', 'madurai', 'station.jpg', 'Result', '2023-2024', 'Resolved', 'exam fees issue', 'uploads/dummy pdf.pdf', 'uploads/dummy pdf.pdf', 'uploads/dummy pdf.pdf', NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-26 05:25:43', 'certificate dispatched to ur address', NULL),
(2, 'Murugan', '23mcs2002s', 'B.A. History [Tamil]', '2222-02-22', 'semester', 'UG Courses', '9876543213', 'admin@de', 'D.No 362 west street uthupatti', 'my image.jpg', 'Course Completion Certificate', '2023-2024', 'Rejected', 's', 'uploads/dummy pdf.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-27 13:53:45', 'sorry', '2023-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grievances`
--
ALTER TABLE `grievances`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grievances`
--
ALTER TABLE `grievances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
