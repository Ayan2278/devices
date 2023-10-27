-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 09:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_name` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `block` varchar(20) NOT NULL,
  `village` varchar(50) NOT NULL,
  `pincode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_name`, `district`, `block`, `village`, `pincode`) VALUES
('Asia pacific school', 'Gandhinagar', 'B', 'Theltej', '345020'),
('Nalanda School', 'Ahmedabad', 'A', 'gota', '387621'),
('Diwan ballu school', 'surat', 'C', 'Paldi', '367800'),
('Ankur School', 'Rajkot', 'C', 'Theltej', '332111'),
('Anand niketan school', 'Patan', 'B', 'adgsf', '367800'),
('Genius Acadmi', 'Kutch', 'B', 'Paldi', '387621'),
('Bright school', 'Bhavnagar', 'C', 'gota', '387621'),
('Bright school', 'Bhavnagar', 'C', 'gota', '387621'),
('MVN Secondary School', 'Amreli', 'J', 'Nikol', '654215');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
