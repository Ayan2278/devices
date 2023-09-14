-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 10:13 AM
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
('Asia pacific school', 'Gandhinagar', 'D', 'Theltej', 'PC01', 'T92416', 'W76431', 'H76333'),
('Nalanda School', 'Ahmedabad', 'A', 'gota', 'PC02', 'T62049', 'W76621', 'H76321'),
('Diwan ballu school', 'surat', 'C', 'Paldi', 'PC03', 'T62122', 'W76621', 'H21322'),
('Ankur School', 'Rajkot', 'L', 'Theltej', 'PC04', 'T62122', 'W77811', 'H21322'),
('Anand niketan school', 'Patan', 'B', 'adgsf', 'PC05', 'T62049', 'W76621', 'H76321'),
('Genius Acadmi', 'Kutch', 'E', 'Paldi', 'PC06', 'T72184', 'W77811', 'H76321'),
('Bright school', 'Bhavnagar', 'H', 'gota', 'PC07', 'T62122', 'W77811', 'H21322'),
('Asia pacific school', 'Gandhinagar', 'B', 'Theltej', 'PC08', 'T62122', 'W76431', 'H21322'),
('Ankur School', 'Rajkot', 'K', 'Theltej', 'PC09', 'T72184', 'W77811', 'H76421'),
('MVN Secondary School', 'Amreli', 'J', 'Nikol', 'PC02', 'T72184', 'W77811', 'H76321'),
('Bright school', 'Bhavnagar', 'C', 'gota', 'PC03', 'T62122', 'W77811', 'H21322');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
