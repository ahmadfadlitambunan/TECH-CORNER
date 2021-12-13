-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 03:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `vkey` varchar(200) NOT NULL,
  `verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = not verified\r\n1 = verified\r\n',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `name`, `level`, `vkey`, `verified`, `created_at`) VALUES
(5, 'ahmadfadlitambunan', 'ahmadfadlitambunan12@gmail.com', '$2y$10$8YGMHtaGkhR5wUrhH.nHcOEkaQ1glIotnsczb01EXhSODLao3VUU2', 'Ahmad Fadli Tambunan', 'admin', '3554a33ffaae3a45896d52891ecddb87', '1', '2021-12-05 13:05:21.611547'),
(6, 'aftambunan', 'ahmad.fadlitbn1253@gmail.com', '$2y$10$wGsZPtYq1baQoMcNe3IKw.0BJy5VV9wJHWJ8hhyylecfNA2DWzjBu', 'Ahmad Fadli Tambunan', 'member', '3dff46628175481c5faf21997e8184e9', '1', '2021-12-08 12:02:03.023568');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
