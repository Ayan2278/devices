-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 12:20 PM
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `live_status` varchar(50) NOT NULL,
  `asset` varchar(50) NOT NULL,
  `timming` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--


INSERT INTO `login` (`UserName`, `Password`, `roll`, `live_status`, `asset`, `timming`, `school`) VALUES
('Nilesh', 'nilesh', 'CEO', 'true', 'true', 'true', 'true'),
('Varun', 'varun', 'HOD', 'true', 'true', 'false', 'false'),
('jinal', 'jinal', 'employee', 'true', 'false', 'false', 'false'),
('ayan', 'ayan', 'employee', 'false', 'true', 'true', 'false'),
('Meet', 'meet', 'employee', 'false', 'false', 'true', 'true');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
