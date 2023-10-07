-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 12:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `device`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `school_name` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `block` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `pc_sr` varchar(20) NOT NULL,
  `TFT_id` varchar(20) NOT NULL,
  `Webcam_id` varchar(20) NOT NULL,
  `Headphone_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`school_name`, `district`, `block`, `village`, `pc_sr`, `TFT_id`, `Webcam_id`, `Headphone_id`) VALUES
('Nalanda School', 'Ahmedabad', 'A', 'Bopal', 'PC09', 'T62049', 'W76621', 'H76321'),
('Ankur School', 'Rajkot', 'L', 'Theltej', 'PC04', 'T62122', 'W77811', 'H21322'),
('Anand niketan school', 'Patan', 'B', 'Satellite', 'PC05', 'T62049', 'W76621', 'H76321'),
('Genius Acadmi', 'Kutch', 'E', 'Paldi', 'PC06', 'T72184', 'W77811', 'H76321'),
('Bright school', 'Bhavnagar', 'C', 'Naroda', 'PC07', 'T67321', 'W76621', 'H76388'),
('MVN Secondary School', 'Amreli', 'J', 'Nikol', 'PC07', 'T67400', 'W75971', 'H78523'),
('Asia pacific school', 'Gandhinagar', 'B', 'Theltej', 'PC04', 'T67400', 'W75971', 'H76388');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
