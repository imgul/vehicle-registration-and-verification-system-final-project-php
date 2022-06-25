-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 02:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vrvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`) VALUES
(1, 'honda', '2022-06-22 12:27:11'),
(2, 'toyota', '2022-06-22 12:34:19'),
(3, 'bmw', '2022-06-22 12:55:53'),
(5, 'suzuki', '2022-06-22 20:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `is_admin`, `created_at`) VALUES
(1, 'Muhammad', 'Sajjad', 'sajjad@gmail.com', '0302030402', '$2y$10$ofXoj.ybiTstlXUJO/hnOeA.NTVp6v5CV8sqagIKcuncuEcnSUIcu', 1, '2022-06-21 05:11:49'),
(2, 'user', '', 'user@email.com', '03123452341', '$2y$10$cZ5aNBMZifA3DKYoBJwxquHN22NC2n9Y7/sHSlV01YZotsXfUuZVi', 0, '2022-06-21 05:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `number` varchar(10) NOT NULL,
  `company` varchar(22) NOT NULL,
  `type` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `owner_name` varchar(70) NOT NULL,
  `owner_phone` varchar(15) NOT NULL,
  `owner_address` varchar(500) NOT NULL,
  `other_specs` varchar(700) NOT NULL,
  `date_purchase` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `number`, `company`, `type`, `color`, `owner_name`, `owner_phone`, `owner_address`, `other_specs`, `date_purchase`, `created_at`) VALUES
(2, 'VLH003', 'Honda', 'car', 'black', 'Muhammad Sajjad', '03123456789', 'Fareed Town Sahiwal', 'New Honda with Helmet', '2022-06-07 00:00:00', '2022-06-22 08:01:40'),
(3, 'LHR3519', 'toyta', 'car', 'black', 'Waleed', '0300039832', 'Fareed Town Sahiwal', 'Free Oil', '2022-05-22 00:00:00', '2022-06-22 08:05:29'),
(5, 'LHR5055', 'suzuki', 'car', 'blue', 'nawab khan', '03017433879', 'bonga bloch minchinabad', 'Service', '2020-08-22 00:00:00', '2022-06-22 08:07:40'),
(8, 'FD', 'dsf', 'bike', 'blue', 'Khan', '032342345', 'Lahore City', '', '0000-00-00 00:00:00', '2022-06-22 10:02:42'),
(10, 'ISB2040', 'toyota', 'car', 'red', 'Ahsan', '0312423562', 'Islamabad', 'One year of free service', '2021-12-31 00:00:00', '2022-06-22 10:40:47'),
(11, 'PSW3434', 'suzuki', 'car', 'red', 'Hammad Khan', '0332233223', 'Main Peshawar City', 'No extra specs', '2022-05-18 00:00:00', '2022-06-22 21:02:15'),
(12, 'DSF', 'sdf', 'bike', 'blue', 'df', 'dsf', 'dsf', '', '2022-06-27 00:00:00', '2022-06-22 21:10:52'),
(13, 'FDS', 'sdf', 'bike', 'blue', 'sdf', 'sdf', 'sdf', '', '2022-06-08 00:00:00', '2022-06-22 21:13:48'),
(14, 'SDFER', 'suzuki', 'heavy-vehicle', 'blue', 'nbfrg', 'fdfdf', 'ds', 'vds', '2022-06-07 00:00:00', '2022-06-22 22:24:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
