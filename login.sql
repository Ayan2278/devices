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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `live_status` varchar(50) NOT NULL,
  `asset` varchar(50) NOT NULL,
  `timming` varchar(50) NOT NULL,
  `add` varchar(20) NOT NULL,
  `school` varchar(50) NOT NULL,
  `profile_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `UserName`, `email`, `Password`, `roll`, `live_status`, `asset`, `timming`, `add`, `school`, `profile_image`) VALUES
(1, 'Nilesh', '', 'nilesh', 'CEO', 'true', 'true', 'true', 'true', 'true', ''),
(2, 'Varun', '', 'varun', 'HOD', 'false', 'true', 'false', 'true', 'false', ''),
(3, 'jinal', '', 'jinal', 'Employee', 'true', 'false', 'true', 'false', 'true', ''),
(4, 'ayan', '', 'ayan', 'Employee', 'true', 'true', 'false', 'true', 'false', ''),
(5, 'Meet', '', 'meet', 'Employee', 'true', 'false', 'true', 'false', 'true', ''),
(16, 'Ayan Banglawala', 'ayanbanglawala2278@gmail.com', 'arna', 'Employee', 'true', 'true', 'false', 'true', 'false', 'https://lh3.googleusercontent.com/a/ACg8ocIIBKCQ-7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
