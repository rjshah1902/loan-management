-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 05:48 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_request`
--

CREATE TABLE `loan_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_amount` float(15,2) NOT NULL,
  `interest` float(10,2) NOT NULL DEFAULT 10.50,
  `tenure` text NOT NULL,
  `purpose` longtext NOT NULL,
  `remark` longtext DEFAULT NULL,
  `request_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_request`
--

INSERT INTO `loan_request` (`id`, `user_id`, `loan_amount`, `interest`, `tenure`, `purpose`, `remark`, `request_status`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 20000.00, 10.50, '15', 'Testing', 'Request Remark', 'pending', 1, '2025-06-27 00:37:18', '2025-06-27 21:07:41'),
(5, 2, 10000.00, 10.50, '72', 'Testing', 'Testing & Cancel', 'rejected', 1, '2025-06-27 19:47:05', '2025-06-27 20:34:05'),
(6, 2, 10000.00, 10.50, '12', 'Testing', 'Testing & Approved', 'approved', 1, '2025-06-27 19:53:07', '2025-06-27 20:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `loan_tenure`
--

CREATE TABLE `loan_tenure` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_request_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `base_amount` float(15,2) NOT NULL,
  `interest_amount` float(15,2) NOT NULL,
  `total_amount` float(15,2) NOT NULL,
  `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_tenure`
--

INSERT INTO `loan_tenure` (`id`, `user_id`, `loan_request_id`, `payment_date`, `base_amount`, `interest_amount`, `total_amount`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '2025-08-05', 833.33, 87.50, 920.83, 'paid', 1, '2025-06-27 17:08:20', '2025-06-27 20:51:56'),
(2, 2, 6, '2025-09-05', 833.33, 87.50, 920.83, 'failed', 1, '2025-06-27 17:08:20', '2025-06-27 21:18:27'),
(3, 2, 6, '2025-10-05', 833.33, 87.50, 920.83, 'paid', 1, '2025-06-27 17:08:20', '2025-06-27 21:15:44'),
(4, 2, 6, '2025-11-05', 833.33, 87.50, 920.83, 'paid', 1, '2025-06-27 17:08:20', '2025-06-27 21:16:18'),
(5, 2, 6, '2025-12-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(6, 2, 6, '2026-01-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(7, 2, 6, '2026-02-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(8, 2, 6, '2026-03-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(9, 2, 6, '2026-04-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(10, 2, 6, '2026-05-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(11, 2, 6, '2026-06-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20'),
(12, 2, 6, '2026-07-05', 833.33, 87.50, 920.83, 'pending', 1, '2025-06-27 17:08:20', '2025-06-27 17:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `user_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rahul Shah', 'admin@admin.com', '7898335051', '$2y$10$Ce6kOhlZjBlNiYynRdyqo.Mo26qqXixV/fDFhMPY6EZiKtiHjfKE2', 'admin', 1, '2025-06-25 23:37:36', '2025-06-26 00:11:32'),
(2, 'Rahul Shah', 'rjshah1902@gmail.com', '7898335057', '$2y$10$Oeu5lMWu0oKLOteiJO7rD./W.QBqShbWy0wawrl380T7vi6zLo6Sq', 'user', 1, '2025-06-25 23:54:02', '2025-06-26 00:11:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_request`
--
ALTER TABLE `loan_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `loan_tenure`
--
ALTER TABLE `loan_tenure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_request`
--
ALTER TABLE `loan_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_tenure`
--
ALTER TABLE `loan_tenure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
