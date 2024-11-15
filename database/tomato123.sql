-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 08:24 PM
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
-- Database: `tomato123`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `leaderboard_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `life` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`leaderboard_id`, `score`, `user_id`, `life`, `createdAt`, `updatedAt`) VALUES
(34, 15, 1, 1, '2024-04-04 17:08:56', '2024-04-04 17:08:56'),
(35, 4, 1, 1, '2024-04-04 17:09:00', '2024-04-04 17:09:00'),
(36, 3, 1, 1, '2024-04-04 17:09:41', '2024-04-04 17:09:41'),
(41, 5, 4, 1, '2024-04-04 17:56:40', '2024-04-04 17:56:40'),
(42, 11, 4, 1, '2024-04-05 17:27:36', '2024-04-05 17:27:36'),
(43, 2, 4, 1, '2024-04-05 17:35:21', '2024-04-05 17:35:21'),
(44, 2, 4, 1, '2024-04-05 17:38:33', '2024-04-05 17:38:33'),
(45, 2, 4, 1, '2024-04-05 17:39:07', '2024-04-05 17:39:07'),
(46, 4, 4, 1, '2024-04-05 17:45:08', '2024-04-05 17:45:08'),
(47, 5, 4, 1, '2024-04-05 17:45:22', '2024-04-05 17:45:22'),
(48, 2, 4, 1, '2024-04-05 17:52:31', '2024-04-05 17:52:31'),
(49, 2, 4, 1, '2024-04-05 17:52:39', '2024-04-05 17:52:39'),
(50, 2, 4, 1, '2024-04-05 18:23:54', '2024-04-05 18:23:54'),
(51, 5, 4, 1, '2024-04-05 18:24:20', '2024-04-05 18:24:20'),
(52, 3, 4, 1, '2024-04-05 18:24:58', '2024-04-05 18:24:58'),
(53, 4, 4, 1, '2024-04-05 18:25:17', '2024-04-05 18:25:17'),
(54, 2, 4, 1, '2024-04-05 18:25:56', '2024-04-05 18:25:56'),
(55, 8, 4, 1, '2024-04-05 18:41:49', '2024-04-05 18:41:49'),
(56, 2, 4, 1, '2024-04-05 18:41:58', '2024-04-05 18:41:58'),
(57, 2, 4, 1, '2024-04-08 17:00:28', '2024-04-08 17:00:28'),
(58, 2, 4, 1, '2024-04-08 17:00:31', '2024-04-08 17:00:31'),
(59, 2, 4, 1, '2024-04-08 17:00:34', '2024-04-08 17:00:34'),
(60, 3, 4, 1, '2024-04-08 17:18:12', '2024-04-08 17:18:12'),
(61, 4, 4, 1, '2024-04-08 17:18:17', '2024-04-08 17:18:17'),
(62, 2, 4, 1, '2024-04-08 17:18:19', '2024-04-08 17:18:19'),
(63, 7, 4, 1, '2024-04-08 17:18:27', '2024-04-08 17:18:27'),
(64, 5, 4, 1, '2024-04-08 17:26:04', '2024-04-08 17:26:04'),
(65, 2, 4, 1, '2024-04-08 17:26:11', '2024-04-08 17:26:11'),
(66, 8, 4, 1, '2024-04-08 17:26:24', '2024-04-08 17:26:24'),
(67, 2, 4, 1, '2024-04-08 17:37:20', '2024-04-08 17:37:20'),
(68, 2, 4, 1, '2024-04-08 17:37:23', '2024-04-08 17:37:23'),
(69, 2, 4, 1, '2024-04-08 17:37:26', '2024-04-08 17:37:26'),
(70, 2, 4, 1, '2024-04-08 17:37:29', '2024-04-08 17:37:29'),
(71, 2, 4, 1, '2024-04-08 18:04:03', '2024-04-08 18:04:03'),
(72, 2, 4, 1, '2024-04-08 18:04:07', '2024-04-08 18:04:07'),
(73, 2, 4, 1, '2024-04-08 18:04:10', '2024-04-08 18:04:10'),
(74, 2, 4, 1, '2024-04-08 18:04:12', '2024-04-08 18:04:12'),
(75, 2, 4, 1, '2024-04-08 18:05:09', '2024-04-08 18:05:09'),
(76, 2, 4, 1, '2024-04-08 18:05:11', '2024-04-08 18:05:11'),
(77, 2, 4, 1, '2024-04-08 18:05:14', '2024-04-08 18:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `heart` int(3) NOT NULL DEFAULT 3,
  `heart_refill_timer` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `heart`, `heart_refill_timer`, `createdAt`, `updatedAt`) VALUES
(1, 'Amru', '123', 3, '2024-04-08 17:47:20', '2024-04-04 16:28:51', '2024-04-05 18:09:18'),
(2, 'user', '123', 3, '2024-04-08 17:47:20', '2024-04-04 16:28:51', '2024-04-04 16:28:51'),
(3, 'admin', '123', 3, '2024-04-08 17:47:20', '2024-04-04 16:28:51', '2024-04-04 16:28:51'),
(4, 'Insaf', '209483e114ed7070172449f436103457', 3, '2024-04-08 18:15:14', '2024-04-04 16:28:51', '2024-04-08 18:15:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `leaderboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
