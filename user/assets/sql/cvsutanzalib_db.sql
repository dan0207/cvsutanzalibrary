-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 08:53 AM
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
-- Database: `cvsutanzalib_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateBookStatus` ()   BEGIN
    UPDATE books
    SET book_status = 
        CASE
            WHEN book_copy > 1 THEN 'Available to Borrow'
            WHEN book_copy  = 1 THEN 'Room Use Only'
            ELSE 'Not Available'
        END;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateReservationStatus` ()   BEGIN
    UPDATE bookreserve
    SET status = 'to pickup'
    WHERE status = 'hold'
    AND timestamp <= NOW() - INTERVAL 1 MINUTE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT curdate(),
  `member_type` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_section` varchar(50) NOT NULL,
  `student_year` varchar(50) NOT NULL,
  `student_number` varchar(9) NOT NULL,
  `faculty_number` varchar(50) NOT NULL,
  `faculty_department` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` time DEFAULT curtime(),
  `status` varchar(50) NOT NULL,
  `token` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `member_type`, `fullname`, `student_course`, `student_section`, `student_year`, `student_number`, `faculty_number`, `faculty_department`, `picture`, `email`, `time`, `status`, `token`) VALUES
(223, '2024-01-23', 'Student', 'Erika Navarro', 'BSHM', 'ONE', 'SECOND', '202010135', '', '', 'https://lh3.googleusercontent.com/a/ACg8ocLz-IgfSbq_OMmzHcJ6WbxQbB60_W-FONOPdPSHKX54XQ=s96-c', 'erika.navarro@cvsu.edu.ph', '14:52:02', 'IN', '64066905'),
(243, '2024-01-24', 'Student', 'Erika Navarro', 'BSHM', 'ONE', 'SECOND', '202013150', '', '', '../assets/img/profile_pictures/64066905_profile_picture.png', 'erika.navarro@cvsu.edu.ph', '15:45:59', 'IN', '64066905');

-- --------------------------------------------------------

--
-- Table structure for table `bookborrowed`
--

CREATE TABLE `bookborrowed` (
  `id` int(255) NOT NULL,
  `libraryid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseSection` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bookAccessNo` varchar(255) DEFAULT NULL,
  `bookTitle` varchar(255) DEFAULT NULL,
  `bookAuthor` varchar(255) DEFAULT NULL,
  `pickupDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `fine` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookborrowed`
--

INSERT INTO `bookborrowed` (`id`, `libraryid`, `name`, `courseSection`, `email`, `bookAccessNo`, `bookTitle`, `bookAuthor`, `pickupDate`, `returnDate`, `fine`) VALUES
(1000145, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000116', 'Fundamentals of management science', 'CIR HD30.25 T87', '2024-01-25', '2024-01-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookreserve`
--

CREATE TABLE `bookreserve` (
  `id` int(11) NOT NULL,
  `libraryid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `courseSection` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bookAccessNo` varchar(255) NOT NULL,
  `bookTitle` varchar(255) NOT NULL,
  `bookCallNo` varchar(255) NOT NULL,
  `pickupDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `action_btn` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookreserve`
--

INSERT INTO `bookreserve` (`id`, `libraryid`, `name`, `courseSection`, `email`, `bookAccessNo`, `bookTitle`, `bookCallNo`, `pickupDate`, `returnDate`, `status`, `action_btn`, `timestamp`) VALUES
(1000146, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000114', 'Microeconomics', 'CIR HB172.5 P21', '2024-01-29', '2024-01-29', 'to pickup', '', '2024-01-23 18:46:41'),
(1000147, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000114', 'Microeconomics', 'CIR HB172.5 P21', '2024-01-31', '2024-01-31', 'to pickup', '', '2024-01-23 18:49:21'),
(1000148, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000117', 'Fundamentals of management science', 'CIR HD30.25 T87', '2024-01-25', '2024-01-25', 'to pickup', '', '2024-01-23 19:24:05'),
(1000149, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000116', 'Microeconomics', 'CIR HB172.5 P21', '2024-01-30', '2024-01-30', 'to pickup', '', '2024-01-23 19:42:47'),
(1000150, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000117', 'Fundamentals of management science', 'CIR HD30.25 T87', '2024-01-29', '2024-01-29', 'to pickup', '', '2024-01-24 03:10:43'),
(1000151, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000116', 'Microeconomics', 'CIR HB172.5 P21', '2024-01-29', '2024-01-29', 'to pickup', '', '2024-01-24 03:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_access_number` varchar(255) NOT NULL,
  `book_call_number` varchar(255) NOT NULL,
  `book_material_type` varchar(255) NOT NULL,
  `book_language` varchar(255) NOT NULL,
  `book_publication_details` varchar(255) NOT NULL,
  `book_description` text NOT NULL,
  `book_content_type` varchar(255) NOT NULL,
  `book_media_type` varchar(255) NOT NULL,
  `book_carrier_type` varchar(255) NOT NULL,
  `book_isbn` varchar(255) NOT NULL,
  `book_subject` varchar(255) NOT NULL,
  `book_classification` varchar(255) NOT NULL,
  `book_status` varchar(255) NOT NULL,
  `book_totalCopy` int(11) NOT NULL,
  `book_copy` int(11) NOT NULL,
  `book_btn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_author`, `book_access_number`, `book_call_number`, `book_material_type`, `book_language`, `book_publication_details`, `book_description`, `book_content_type`, `book_media_type`, `book_carrier_type`, `book_isbn`, `book_subject`, `book_classification`, `book_status`, `book_totalCopy`, `book_copy`, `book_btn`) VALUES
(17, 'Organic Chemistry', 'Carney, Dorothy', 'TCL000479', 'QD251.2  C21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(18, 'Microeconomics', 'Parkin, Michael', 'TCL000114', 'CIR HB172.5 P21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(19, 'Fundamentals of management science', 'Turban, Efraim', 'TCL000117', 'CIR HD30.25 T87', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(20, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000118', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(21, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000122', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 4, 4, 'Request Button'),
(22, 'Manegerial Accounting', 'Garrison, Ray H.', 'TCL000191', 'CIR HF5657.4 G19', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(23, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000282', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(24, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000181', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(25, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000162', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(26, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000163', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(27, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000241', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(28, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000341', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(29, 'Organic Chemistry', 'Carney, Dorothy', 'TCL000379', 'QD251.2  C21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(30, 'Microeconomics', 'Parkin, Michael', 'TCL000115', 'CIR HB172.5 P21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(31, 'Fundamentals of management science', 'Turban, Efraim', 'TCL000218', 'CIR HD30.25 T87', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(32, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000318', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(33, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL001232', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(34, 'Manegerial Accounting', 'Garrison, Ray H.', 'TCL000291', 'CIR HF5657.4 G19', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(35, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000382', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(36, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000281', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(37, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000262', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(38, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000263', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(39, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000441', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(40, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000541', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(41, 'Organic Chemistry', 'Carney, Dorothy', 'TCL000579', 'QD251.2  C21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(42, 'Microeconomics', 'Parkin, Michael', 'TCL000116', 'CIR HB172.5 P21', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 5, 5, 'Request Button'),
(43, 'Fundamentals of management science', 'Turban, Efraim', 'TCL000419', 'CIR HD30.25 T87', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 4, 4, 'Request Button'),
(44, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000120', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(45, 'Statistics for management and econ...', 'Keller, Gerald', 'TCL000123', 'CIR HD30.215 K281', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button'),
(46, 'Manegerial Accounting', 'Garrison, Ray H.', 'TCL000193', 'CIR HF5657.4 G19', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(47, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000186', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(48, 'Case studies in finance:', 'Bruner, Robert F.', 'TCL000183', 'CIR HG4015.5 B78', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(49, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000164', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(50, 'Understanding social issues: ', 'Berlage, Gai', 'TCL000167', 'CIR HN59.2 B46', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Room Use Only', 1, 1, 'Request Button'),
(51, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000641', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 2, 2, 'Request Button'),
(52, 'Grammar and Composition', 'Garrison, Ray H.', 'TCL000741', 'CIR PE1112.3 G76', 'Computer file', 'English', 'Los Angeles, California : Tritech Digital Media, 2020', '1 online resource (123, pages) : color illustrations', 'text', 'computer', 'online resource', '978-1-7996-9914-9', 'Chemistry, Organic, Organic chemistry', 'QD251.2 C21 2020', 'Available to Borrow', 3, 3, 'Request Button');

-- --------------------------------------------------------

--
-- Table structure for table `booktransaction`
--

CREATE TABLE `booktransaction` (
  `id` int(255) NOT NULL,
  `libraryid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `courseSection` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bookAccessNo` varchar(255) DEFAULT NULL,
  `bookTitle` varchar(255) DEFAULT NULL,
  `bookAuthor` varchar(255) DEFAULT NULL,
  `pickupDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  `fine` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booktransaction`
--

INSERT INTO `booktransaction` (`id`, `libraryid`, `name`, `courseSection`, `email`, `bookAccessNo`, `bookTitle`, `bookAuthor`, `pickupDate`, `returnDate`, `fine`, `remarks`) VALUES
(1000144, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000114', 'Microeconomics', 'CIR HB172.5 P21', '2024-01-25', '2024-01-25', '', 'Returned'),
(1000152, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000116', 'Microeconomics', 'CIR HB172.5 P21', '2024-01-30', '2024-01-31', NULL, 'option4'),
(1000153, '64066905', 'Erika Navarro', 'BSHM 2-1', 'erika.navarro@cvsu.edu.ph', 'TCL000120', 'Statistics for management and econ...', 'CIR HD30.215 K281', '2024-01-30', '2024-01-31', '', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `createpost`
--

CREATE TABLE `createpost` (
  `id` int(255) NOT NULL,
  `text` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `embed_code` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `createpost`
--

INSERT INTO `createpost` (`id`, `text`, `image_url`, `video_url`, `embed_code`, `timestamp`) VALUES
(17, 'weqweqwe', 'city.jpg', '', '', '2024-01-12 22:22:49'),
(21, 'try embed', '', '', '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fphoto%2F%3Ffbid%3D986711502606596%26set%3Da.368434147767671&show_text=true&width=500\" width=\"500\" height=\"560\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowfullscreen=\"true\" allow=\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\"></iframe>', '2024-01-12 22:48:49'),
(22, '', '', '2024-01-13 15-05-43.mp4', '', '2024-01-12 23:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_timeFrom` time NOT NULL,
  `event_timeTo` time NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `librarypages`
--

CREATE TABLE `librarypages` (
  `id` int(255) NOT NULL,
  `pages` varchar(999) NOT NULL,
  `mainText` mediumtext NOT NULL,
  `subText` mediumtext NOT NULL,
  `links` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarypages`
--

INSERT INTO `librarypages` (`id`, `pages`, `mainText`, `subText`, `links`) VALUES
(1, 'about', 'mission', 'Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.', NULL),
(2, 'about', 'vision', 'The premier university in historic Cavite globally recognized for excellence in character development, academics, research, innovation and sustainable community engagement.', NULL),
(5, 'about', 'objective', 'To support the school\'s graduate and undergraduate programs in its instructional, research and information needs', NULL),
(6, 'about', 'rules', 'Always present your ID as you enter the library.', NULL),
(33, 'about', 'objective', 'To provide resources, facilities, and services to the Cavite State University - Tanza Campus academic community as a means to achieve the school’s goals and objective', NULL),
(45, 'about', 'rules', 'Always leave your belongings, except your valuables at the Baggage Counter Area. The library is not responsible for any loss or damage to your property.', NULL),
(46, 'about', 'rules', 'Always present to the student assistant on duty any duly borrowed library property you may wish to bring outside the library for inspection.', NULL),
(47, 'about', 'objective', 'To develop, enrich, and maintain the library collection in terms of the course offered and special programs of the College', NULL),
(48, 'about', 'objective', 'To extend services to non-CVSU-Tanza students within the limits of its resources', NULL),
(52, 'links', 'academic subscription', 'Gale Database', 'https://link.gale.com/apps/menu?userGroupName=phslsu&prodId=MENU'),
(53, 'links', 'cvsu tanza page', 'Cavite State University - Tanza Campus', 'https://cvsu.edu.ph/tanza-campus/'),
(55, 'links', 'e-journals', 'Open Science Directory', 'https://opensciencedirectory.net/'),
(56, 'links', 'e-books', 'Junky Books', 'https://www.junkybooks.com/books'),
(67, 'services', 'READER\'S SERVICES', '<h2><strong>READERS SERVICE</strong></h2><p>This is a service wherein students/faculty are using the reading areas for borrowing and returning library materials. Readers Services composed of the ff. areas:</p><h4>CIRCULATION AND RESERVATION SECTION</h4><ul><li>Handles the charging and discharging of books for library and home use.</li><li>Books are allowed for overnight use.</li><li>RESERVE SECTION</li><li>They are the in-demand books or may be single copies. These library materials are not allowed to be borrowed for overnight use but can be photocopied.</li><li>Books are for <strong>room use only.</strong></li></ul><h4>GENERAL REFERENCE SECTION</h4><ul><li>General Reference materials such as dictionaries, bibliographies, encyclopedia, almanacs, atlases, yearbooks, directories, maps are found in this area.</li><li>Materials are for <strong>ROOM USE ONLY.</strong></li></ul><h4>FILIPINIANA SECTION</h4><ul><li>Books about the Philippines in the different subject fields and books by Filipino authors published here or abroad.</li><li>Materials are for <strong>ROOM USE ONLY.</strong></li></ul><h4>UNPUBLISHED SECTION</h4><ul><li>Manuscript written by students are found in this section.</li><li>Materials are for <strong>ROOM USE ONLY.</strong></li></ul><h4>PERIODICALS SECTION</h4><ul><li>Vertical file such as clippings, magazines, journals and newspaper are found in this section.</li><li>These library materials are not allowed to be borrowed for overnight use but can be photocopied.</li></ul>', NULL),
(68, 'services', 'CURRENT AWARENESS SERVICE', '<h2><strong>CURRENT AWARENESS SERVICE</strong></h2><ul><li>List of newly acquired books and other materials sent to the faculty members to inform the recent acquisitions.</li><li>It is also posted at the bulletin board and at the library website.</li></ul>', NULL),
(69, 'services', 'INTERNET SERVICE', '<h2><strong>INTERNET SERVICE</strong></h2><p>Service for accessing online resources such as:</p><ul><li>Online Databases, Free Access E-books and Electronic Journals</li></ul>', NULL),
(79, 'services', 'REFERRAL SERVICES', '<h2><strong>REFERRAL SERVICES</strong></h2><p>A referral letter is issued to any member of the faculty, administrative staff and students who may want to use the library of other institution.</p><ol><li>Only CVSU students who are enrolled and with a validated school ID for the current semester/summer term will be issued with referral letter to visit other libraries.</li><li>The application and issuance of referral letter will be done within the day.</li><li>Faculty and employee who are employed at the CVSU will be issued with referral letter to visit other libraries.</li></ol><p><strong>Visitors</strong></p><ol><li>Students from other colleges and universities are considered visitors. They are allowed to use CVSU library resources and facilities.</li><li>Visitors should present validated school ID and referral letter to the library personnel at the circulation area.</li><li>Visitors are required to pay the library fee of twenty pesos (P20.00) per library visit</li><li>Visitors are allowed to use CVSU Library from Monday to Friday.</li><li>Materials that will be borrowed by the visitors are for room use only.</li></ol>', NULL),
(93, 'opacSearch', 'Monday - Thursday', '07:00 - 18:00', 'libraryHours'),
(94, 'opacSearch', 'student', 'general circulation', '100'),
(95, 'opacSearch', 'student', 'reserve', '50'),
(96, 'opacSearch', 'faculty', 'general circulation', '5'),
(97, 'opacSearch', 'faculty', 'reserve', '50'),
(98, 'opacSearch', 'background', 'qrcode_www.facebook.com.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `rating` varchar(5) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT curdate(),
  `time` time NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `category`, `subject`, `rating`, `comments`, `date`, `time`) VALUES
(1, 'Complaint', 'asd', '5', 'qweqwe', '2024-01-09', '12:06:39'),
(2, 'Problem', 'qwert', '4', 'good', '2024-01-09', '17:33:43'),
(3, 'Complaint', 'testing', '5', 'Good', '2024-01-09', '17:34:34'),
(4, 'Praise', 'adw', '5', 'awda', '2024-01-22', '22:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_givenName` varchar(100) NOT NULL,
  `user_middleI` varchar(100) NOT NULL,
  `user_familyName` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_student_number` varchar(9) NOT NULL,
  `user_student_course` varchar(50) NOT NULL,
  `user_student_section` varchar(50) NOT NULL,
  `user_student_year` varchar(50) NOT NULL,
  `user_faculty_number` varchar(50) NOT NULL,
  `user_faculty_department` varchar(50) NOT NULL,
  `user_picture` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` varchar(50) NOT NULL,
  `user_member_type` varchar(50) NOT NULL,
  `user_token` varchar(21) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookborrowed`
--
ALTER TABLE `bookborrowed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookreserve`
--
ALTER TABLE `bookreserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id` (`book_id`,`book_access_number`,`book_call_number`,`book_isbn`);

--
-- Indexes for table `booktransaction`
--
ALTER TABLE `booktransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `librarypages`
--
ALTER TABLE `librarypages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `bookreserve`
--
ALTER TABLE `bookreserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000154;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `librarypages`
--
ALTER TABLE `librarypages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12909997;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `UpdateReservationStatusEvent` ON SCHEDULE EVERY 20 SECOND STARTS '2024-01-25 22:18:28' ON COMPLETION NOT PRESERVE ENABLE DO CALL UpdateReservationStatus()$$

CREATE DEFINER=`root`@`localhost` EVENT `UpdateBookStatusEvent` ON SCHEDULE EVERY 20 SECOND STARTS '2024-01-25 22:18:28' ON COMPLETION NOT PRESERVE ENABLE DO CALL UpdateBookStatus()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
