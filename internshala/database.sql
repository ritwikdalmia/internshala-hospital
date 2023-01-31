-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2023 at 10:04 AM
-- Server version: 5.7.40-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smilewellnessfoundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_internshala`
--

CREATE TABLE `admin_internshala` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verification` int(11) NOT NULL,
  `password_token` varchar(255) NOT NULL,
  `password_verification` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `creation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_internshala`
--

INSERT INTO `admin_internshala` (`admin_id`, `admin_username`, `hospital_name`, `email`, `password`, `token`, `verification`, `password_token`, `password_verification`, `ip_address`, `creation_time`) VALUES
(1, 'ritwik1234', 'dalmia hospital', 'dalmiaritwik@gmail.com', '$2y$10$nKXlkFFYuEyfXfyf.9ntwuFtVcqOCoKl40xJXtDCYkLT5mfp7XBnG', '0', 1, 'f7cb6d091d0320ccab918eae602336', 0, '', '2023-01-19 18:17:38'),
(3, 'sushree', 'dalmia1 hospital', 'ritwik.esports@gmail.com', '$2y$10$hXdVonAOOGo1ltHZuhN0re8yPlpx4kXsMevtnUZoDDo/4WhFitbrG', '950801', 0, '', 0, '', '2023-01-20 04:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `application_request`
--

CREATE TABLE `application_request` (
  `application_request_id` int(11) NOT NULL,
  `blood_id` int(11) NOT NULL,
  `login_username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `application_time` datetime NOT NULL,
  `acceptance` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_request`
--

INSERT INTO `application_request` (`application_request_id`, `blood_id`, `login_username`, `full_name`, `blood_type`, `hospital_name`, `quantity`, `application_time`, `acceptance`) VALUES
(2, 979579, 'ritwikdalmia', 'ritwik dalmia', 'A+', 'dalmia hospital', 1, '2023-01-20 01:39:14', 'accepted'),
(4, 473041, 'ritwik dalmia', 'dalmiaritwik@gmail.com', 'O+', 'dalmia hospital', 1, '2023-01-20 04:32:32', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type`
--

CREATE TABLE `blood_type` (
  `id` int(11) NOT NULL,
  `blood_id` int(11) NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_type`
--

INSERT INTO `blood_type` (`id`, `blood_id`, `blood_type`, `hospital_name`, `quantity`, `admin_username`, `timestamp`) VALUES
(3, 979579, 'A+', 'dalmia hospital', 8, 'ritwik1234', '2023-01-19 19:06:43'),
(5, 473041, 'O+', 'dalmia hospital', 9, 'ritwik1234', '2023-01-20 03:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `profile_internshala`
--

CREATE TABLE `profile_internshala` (
  `login_username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mno` bigint(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_internshala`
--

INSERT INTO `profile_internshala` (`login_username`, `full_name`, `email`, `Mno`, `address`, `state`, `city`, `zip`) VALUES
('ritwikdalmia', 'ritwik dalmia', 'dalmiaritwik@gmail.com', 9971655508, 'SRI SRI UNIVERSITY', 'Odisha', 'CUTTACK', 754006);

-- --------------------------------------------------------

--
-- Table structure for table `users_internshala`
--

CREATE TABLE `users_internshala` (
  `user_id` int(11) NOT NULL,
  `login_username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Mno` bigint(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verification` int(11) NOT NULL DEFAULT '0',
  `password_token` varchar(255) NOT NULL,
  `password_verification` int(11) NOT NULL DEFAULT '0',
  `blood_group` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `creation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_internshala`
--

INSERT INTO `users_internshala` (`user_id`, `login_username`, `full_name`, `email`, `Mno`, `password`, `token`, `verification`, `password_token`, `password_verification`, `blood_group`, `ip_address`, `creation_time`) VALUES
(2, 'ritwikdalmia', 'ritwik dalmia', 'dalmiaritwik@gmail.com', 9971655508, '$2y$10$jO1L0DH8wZRFSXNLZ/7jGO62xf//pgZNuIHnURYe3LyINH3YKfZpi', '839104', 1, 'cdbb7a36fda67fa6ead1c106f0e9b5', 0, 'A+', '', '2023-01-20 00:49:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_internshala`
--
ALTER TABLE `admin_internshala`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `application_request`
--
ALTER TABLE `application_request`
  ADD PRIMARY KEY (`application_request_id`);

--
-- Indexes for table `blood_type`
--
ALTER TABLE `blood_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blood` (`blood_type`,`hospital_name`);

--
-- Indexes for table `profile_internshala`
--
ALTER TABLE `profile_internshala`
  ADD PRIMARY KEY (`login_username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Mno` (`Mno`);

--
-- Indexes for table `users_internshala`
--
ALTER TABLE `users_internshala`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Mno` (`Mno`),
  ADD UNIQUE KEY `login_username` (`login_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_internshala`
--
ALTER TABLE `admin_internshala`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_request`
--
ALTER TABLE `application_request`
  MODIFY `application_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_type`
--
ALTER TABLE `blood_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_internshala`
--
ALTER TABLE `users_internshala`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
