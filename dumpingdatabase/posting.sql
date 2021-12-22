-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 05:59 PM
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
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id_thread` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `thumb` varchar(50) NOT NULL,
  `tanggal_posting` timestamp NOT NULL DEFAULT current_timestamp(),
  `diubah` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id_thread`, `user_id`, `judul`, `konten`, `kategori`, `thumb`, `tanggal_posting`, `diubah`) VALUES
(23, 6, 'Selamat datang di Tech Corner!', '<p style=\"text-align: center;\"><br /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/techcorner/forum/assets/upload/d234a_logo.png\" alt=\"\" width=\"478\" height=\"237\" />Tech Corner adalah ruang untukmu yang ingin menjelajahi dunia teknologi. Di sini akan ada teman untuk saling belajar dan berbagi pengetahuan bersama. Yuk, diskusi terkait perkembangan era 4.0 yang sudah kita duduki. Ada banyak yang harus disampaikan.<br />Ayo lakukan itu di sini!<br /><br /></p>', 'Komputer & PC', '', '2021-12-18 06:10:50', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_thread`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id_thread` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
