-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 02:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubt`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(155) NOT NULL,
  `post_description` longtext NOT NULL,
  `granted` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_description`, `granted`, `created_at`, `updated_at`) VALUES
(21, 'post 90', 'this is post900 updated', 'approved', '2023-11-23', '2023-11-23'),
(24, 'post 1000', 'this is updated post', 'approved', '2023-11-23', '2023-11-23'),
(26, 'post12345', 'post12345 description', 'pending', '2023-11-23', '2023-11-23'),
(27, 'post 678787 again', 'this is post 67this is updated again', 'approved', '2023-11-23', '2023-11-23'),
(28, 'post 5656', 'this si post 6677777777777', 'pending', '2023-11-23', '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(155) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(155) NOT NULL,
  `role` varchar(155) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin', 'admin', '2023-11-23', '2023-11-23'),
(4, 'superadmin', 'superadmin@gmail.com', 'superadmin', 'superadmin', '2023-11-23', '2023-11-23'),
(5, 'user1', 'user1@gmail.com', 'user1', 'user', '2023-11-23', '2023-11-23'),
(8, 'user4', 'user4@gmail.com', 'user4', 'user', '2023-11-23', '2023-11-23'),
(9, 'user122', 'user122@gmail.com', 'user122', 'user', '2023-11-23', '2023-11-23'),
(10, 'user190', 'user190@gmail.com', 'user190', 'user', '2023-11-23', '2023-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
