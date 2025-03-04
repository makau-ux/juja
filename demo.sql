-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 01:11 PM
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
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `vehicle_reg` varchar(200) NOT NULL,
  `driver_name` varchar(200) NOT NULL,
  `check_inn` date NOT NULL,
  `check_out` date NOT NULL,
  `rate` int(200) NOT NULL,
  `ITEM` varchar(200) NOT NULL,
  `time` int(128) NOT NULL,
  `tot_amount` int(128) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`vehicle_reg`, `driver_name`, `check_inn`, `check_out`, `rate`, `ITEM`, `time`, `tot_amount`, `id`) VALUES
('KDP 591D', 'ELONGU PIPER', '2025-03-01', '2025-03-10', 500, 'stones and sand', 0, 4500, 12),
('KDP 591D', 'ELONGU PIPER', '2025-03-01', '2025-03-10', 1000, 'TIMBER', 0, 9000, 14),
('KDP 591D', 'ELONGU PIPER', '2025-03-01', '2025-03-10', 1000, 'TIMBER', 0, 9000, 15),
('KAC', 'TIM KALE', '2025-03-06', '2025-03-20', 600, 'SAND', 0, 14000, 16),
('KAC', 'TIM KALE', '2025-03-06', '2025-03-20', 600, 'SAND', 0, 7800, 17),
('KBP 591D', 'ELONGU PIPER', '2025-02-19', '2025-03-02', 1000, 'TIMBER', 0, 10000, 18),
('KBP 345G', 'dantr nyu', '2025-02-19', '2025-03-02', 400, 'TIMBER', 0, 4000, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `role`) VALUES
(1, 'manu', '$2y$10$JpkbNngl8JET8EeMabr/4OaOcIxUfOK7i2sR0W/GcEX/amzp29Ynu', '2025-02-27 15:10:30', 'user'),
(2, 'davis', '$2y$10$EtVtFFmVUOVZIUl665wv/uhAxOGs97q5Zu.ihnIM2u8TRpG14Xnm2', '2025-02-27 15:17:57', 'user'),
(3, 'aqua', '$2y$10$Xyuuhb1AY59t64UMLBQGa.L7kh.vKwY1LicRmhmgC/1yTVz34ccaG', '2025-03-04 07:59:25', 'user'),
(4, 'adey', '$2y$10$9sU8aq7.cWyClNA62itViOg9c6OJKbz87//HRK/ghhHlLG5Ux.mjy', '2025-03-04 08:33:14', 'admin'),
(5, 'user', '$2y$10$aqZ9IqkpTs6VEOeVzSB5k.UM9XGBZGfKbM7vTfR.B8mXZZXq1tOUq', '2025-03-04 08:34:11', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
