-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 09:55 AM
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
-- Database: `system`
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

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`name`) VALUES
('Ahmedabad'),
('Vadodara'),
('Amreli'),
('Anand'),
('Banaskantha'),
('Baroda'),
('Bharuch'),
('Bhavnagar'),
('Dahod'),
('Dang'),
('Dwarka'),
('Gandhinagar'),
('Jamnagar'),
('Junagadh'),
('Kheda'),
('Kutch'),
('Mehsana'),
('Nadiad'),
('Narmada'),
('Navsari'),
('Panchmahals'),
('Patan'),
('Porbandar'),
('Rajkot'),
('Sabarkantha'),
('Surat'),
('Surendranagar'),
('Vadodara'),
('Valsad'),
('Vapi');

-- --------------------------------------------------------

--
-- Table structure for table `google_user`
--

CREATE TABLE `google_user` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
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
(2, 'Varun', '', 'varun', 'HOD', 'true', 'true', 'true', 'false', 'true', ''),
(3, 'jinal', '', 'jinal', 'Employee', 'true', 'false', 'true', 'false', 'true', ''),
(4, 'ayan', '', 'ayan', 'Employee', 'true', 'false', 'true', 'false', 'true', ''),
(5, 'Meet', '', 'meet', 'Employee', 'true', 'false', 'true', 'false', 'true', '');

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
('Ankur School', 'Rajkot', 'C', 'Vejagam ', '332111'),
('Anand niketan school', 'Patan', 'B', 'Amarpura', '367800'),
('Genius Acadmi', 'Kutch', 'B', 'Bhuj', '387621'),
('MVN Secondary School', 'Amreli', 'J', 'Devgam', '654215'),
('Bright school', 'Bhavnagar', 'C', 'Ratanpar', '387621'),
('Diwan ballu school', 'Vadodara', 'h', 'Paldi', '332641'),
('bvd', 'Panchmahals', 'h', 'dsd', '332111');

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
('PC07', 'Ahmedabad', 'A', 'Gatlodia', 'meet', 'meet', 'Nalanda School');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `profile_image`) VALUES
(25, '107763483415135544355', 'jinal chauhan', 'jinalc201@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocIYQkV4AJiq5GvvTL7oaFK6f7SERqcNjPQA1dl2z7HS=s96-c'),
(26, '108882651372347038802', 'Jinal Chauhan', 'jinalchauhan454@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocIOol_zVO0cFp4jqvdZmi0iQMzf524wa9jGx1eTTZsy=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `google_user`
--
ALTER TABLE `google_user`
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
