-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2024 at 07:08 PM
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
-- Database: `ereliefhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `shelters`
--

CREATE TABLE `shelters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `regional_admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shelters`
--

INSERT INTO `shelters` (`id`, `name`, `location`, `capacity`, `region`, `regional_admin_id`, `created_at`) VALUES
(10, 'Pirgacha GN College', 'Borodorga1', 450, 'Kurigram', 21, '2024-11-23 12:55:07'),
(11, 'Kurigram High School', 'Borodorga', 653, 'Kurigram', 21, '2024-11-23 12:59:28'),
(20, 'Baradarga High School', 'Borodorga', 34, 'Kurigram', 36, '2024-11-24 17:22:44'),
(21, 'Kurigram Model School', '400', 3, 'Kurigram', 36, '2024-11-24 17:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `shelter_users`
--

CREATE TABLE `shelter_users` (
  `shelter_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shelter_users`
--

INSERT INTO `shelter_users` (`shelter_id`, `user_id`) VALUES
(11, 22),
(20, 35);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('Normal User','Central Admin','Regional Admin','Shelter Coordinator','Relief Distributor') NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `date_of_birth`, `email`, `password_hash`, `role`, `phone_number`, `address`, `region`, `created_at`, `updated_at`) VALUES
(1, 'Nihal Khan', '2024-11-20', 'tanvirislam@thebaustian.com', '$2y$10$xlomAKIGQ2D2/ObLFYZ6pOk75bzkvhJIwn49jzN6AqEKVPLo0t6Lq', 'Normal User', NULL, NULL, NULL, '2024-11-22 03:42:51', '2024-11-22 03:48:25'),
(4, 'Tanvir Islam', NULL, 'tanvir@gmail.com', '123456', 'Regional Admin', '01786504649', NULL, 'Rangpur', '2024-11-22 05:18:36', '2024-11-22 05:18:36'),
(8, 'Labib Ahasan1', NULL, 'labib@gmail.com', '123456', 'Shelter Coordinator', '0184666322', NULL, '', '2024-11-23 03:00:35', '2024-11-23 12:54:51'),
(16, 'Nihal Islam1', NULL, 'regionaladmin@gmail.com', '$2y$10$qPypc.LYUJ4oY20OxeZi.OoOAsPoP6g/dZD.ghUoPPL6fJMxET6wS', 'Regional Admin', '017455635', NULL, '', '2024-11-23 05:16:22', '2024-11-23 06:37:34'),
(19, 'Nazim Uddin', NULL, 'nazimuddin@example.com', '$2y$10$qPypc.LYUJ4oY20OxeZi.OoOAsPoP6g/dZD.ghUoPPL6fJMxET6wS', 'Central Admin', '017884663', 'Rangpur', NULL, '2024-11-23 07:01:38', '2024-11-23 07:01:38'),
(21, 'Tanvir Islam', NULL, 'tanvir1@gmail.com', '$2y$10$An20ruBx5OZ/XzwucRgeke4x8oGzM/8F1oPFIzAKoPRQ0ym37Va56', 'Regional Admin', '0178640573', NULL, '', '2024-11-23 07:24:24', '2024-11-24 17:04:15'),
(22, 'Sourav Hassan', NULL, 'sourav@gmail.com', '$2y$10$qLYuz7tGDnnDdRZs8IuHjuvRuj7CcCTMAchg8O7EvFuhPfdxONZcm', 'Normal User', '01287345433', NULL, '', '2024-11-23 15:27:39', '2024-11-24 16:59:18'),
(23, 'Zisan Alom', NULL, 'zisan@gmail.com', '$2y$10$i85/udKSGb3d844YnRNTO.cnZyFX5XbNZ6lAPjNsRmrOmnP/cpaKO', 'Normal User', '0177343242', NULL, '', '2024-11-23 15:28:51', '2024-11-24 16:59:14'),
(25, 'Lohit Zaman', NULL, 'lohit@gmail.com', '$2y$10$fowAK8TiJu1yNqE0zc/UzeU6f38QkVpovpkodY9GX8WoUVt3kyviq', 'Normal User', '01734332', NULL, '', '2024-11-23 15:33:07', '2024-11-24 16:55:23'),
(29, 'Nihal1', NULL, 'nihal@gmail.com', '$2y$10$dtXZaFY.R95x7aUWYoHKL.8hi0td.WvWxk3SKRfu1a4KgeMP4z2F2', 'Shelter Coordinator', '016263255', NULL, 'Kurigram', '2024-11-24 12:37:58', '2024-11-24 17:24:17'),
(35, 'Tamzid Shafayet', NULL, 'tamzid@gmail.com', '$2y$10$oFfLWkGe3.FIw.nn1prmke37fRaB9paXUeh/vdYsSmHuIL43rO/7e', 'Normal User', '0184666322', NULL, 'Kurigram', '2024-11-24 17:14:09', '2024-11-24 17:14:09'),
(36, 'nihal', NULL, 'nihal1@gmail.com', '$2y$10$zdArZ/IZHKpReUBO0S0TOePekkM2EU1R/4OXcxtBmO3ioCSS61hgS', 'Regional Admin', '0178343534', NULL, 'Kurigram', '2024-11-24 17:20:48', '2024-11-24 17:20:48'),
(37, 'Nihal Khan1', '2024-11-06', 'taaaa@gmail.com', '$2y$10$0fNxfOeCTv6syiJ3B6aZheTx2U7N/o/jdiUDl2VRsCXijVQoe5v12', 'Normal User', NULL, NULL, 'Kurigram', '2024-11-24 17:32:07', '2024-11-24 17:35:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shelters`
--
ALTER TABLE `shelters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regional_admin_id` (`regional_admin_id`);

--
-- Indexes for table `shelter_users`
--
ALTER TABLE `shelter_users`
  ADD PRIMARY KEY (`shelter_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shelters`
--
ALTER TABLE `shelters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shelters`
--
ALTER TABLE `shelters`
  ADD CONSTRAINT `shelters_ibfk_1` FOREIGN KEY (`regional_admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shelter_users`
--
ALTER TABLE `shelter_users`
  ADD CONSTRAINT `shelter_users_ibfk_1` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`id`),
  ADD CONSTRAINT `shelter_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
