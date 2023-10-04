-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 09:47 AM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pc_sr` varchar(20) NOT NULL,
  `district` varchar(50) NOT NULL,
  `block` varchar(20) NOT NULL,
  `village` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `school_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pc_sr`, `district`, `block`, `village`, `username`, `Password`, `school_name`) VALUES
('PC04', 'Rajkot', 'L', 'Theltej', 'Ankur', 'ankur', 'Ankur School'),
('PC05', 'Patan', 'B', 'Satelite', 'ANS', 'ans', 'Anand niketan school'),
('PC08', 'Gandhinagar', 'B', 'Theltej', 'Asia', 'asia', 'Asia Pacific School'),
('PC09', 'Ahmedabad', 'B', 'Satelite', 'ayan', 'ayan', 'Anand niketan school'),
('PC09', 'Vadodara', 'D', 'Gota', 'ayarna', 'ayarna', 'Anand niketan school'),
('PC03', 'Bhavnagar', 'C', 'Naroda', 'bghs', 'bghs', 'Bright School'),
('PC07', 'Bhavnagar', 'F', 'Naroda', 'Bright', 'bright', 'Bright school'),
('PC06', 'Kutch', 'E', 'Paldi', 'Genius', 'genius', 'Genius Acadmi'),
('PC01', 'Ahmedabad', 'A', 'Gatlodia', 'jinal', 'jinal', 'Asia Pacific School'),
('PC07', 'Ahmedabad', 'A', 'Gatlodia', 'meet', 'meet', 'Nalanda School'),
('PC07', 'Amreli', 'J', 'Nikol', 'Varun', 'varun', 'MVN Secondary School');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
