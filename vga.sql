-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 19.19
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `processor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `vga`
--

CREATE TABLE `vga` (
  `Id` int(10) NOT NULL,
  `Product Name` varchar(200) NOT NULL,
  `GPU` varchar(100) NOT NULL,
  `Memory` varchar(50) NOT NULL,
  `GPU Clock` varchar(50) NOT NULL,
  `Memory Clock` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Price` int(20) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vga`
--

INSERT INTO `vga` (`Id`, `Product Name`, `GPU`, `Memory`, `GPU Clock`, `Memory Clock`, `Category`, `Brand`, `Price`, `Image`) VALUES
(1, 'Asus GeForce RTX 3060 Ti 8GB GDDR6 - ROG Strix-V2 OC', 'GeForce RTX 3060', '12 GB, GDDR6, 192 bit', '1320 MHz', '1875 MHz', 'VGA', 'Asus', 17199000, '1vga.jpg'),
(2, 'Asus GeForce RTX 3090 24GB GDDR6X - EKWB', 'GeForce RTX 3090', '24 GB, GDDR6X, 384 bit', '1395 MHz', '1219 MHz', 'VGA ', 'Asus', 45030000, '2vga.jpg'),
(3, 'Asus GeForce RTX 3060 Ti 8GB GDDR6 - ROG Strix-V2 OC', 'GeForce RTX 3060 Ti', '8 GB, GDDR6, 256 bit', '1410 MHz', '1750 MHz', 'VGA', 'Asus', 17199000, '3vga.jpg'),
(4, 'Asus GeForce GTX 1050 Ti 4GB DDR5 - Cerberus-GTX1050TI-O4G', 'GeForce GTX 1050 Ti', '4 GB, GDDR5, 128 bit', '1291 MHz', '1752 MHz	', 'VGA', 'Asus', 3999000, '4vga.jpg'),
(5, 'Asus GeForce GTX 1650 SUPER 4GB DDR6 - TUF Gaming OC', 'GeForce GTX 1650', '4 GB, GDDR5, 128 bit', '1485 MHz', '2001 MHz', 'VGA', 'Asus', 6599000, '5vga.jpg'),
(6, 'Asus GeForce RTX 3080 Ti 12GB GDDR6X - ROG Strix OC', 'GeForce RTX 3080', '10 GB, GDDR6X, 320 bit', '1440 MHz', '1188 MHz', 'VGA', 'Asus', 34999000, '6vga.jpg'),
(7, 'Asus GeForce RTX 3070 Ti 8GB GDDR6X - ROG Strix OC', 'GeForce RTX 3070', '8 GB, GDDR6, 256 bit', '1500 MHz', '1750 MHz', 'VGA', 'Asus', 20499000, '7vga.jpg'),
(8, 'Colorful Geforce RTX 2060 6GB DDR6', 'GeForce RTX 2060', '6 GB, GDDR6, 192 bit', '1365 MHz', '1750 MHz', 'VGA', 'Colorful', 10699000, '8vga.jpg'),
(9, 'Asus GeForce GT 1030 2GB DDR5', 'GeForce GT 1030', '2 GB, GDDR5, 64 bit', '1228 MHz', '1502 MHz', 'VGA', 'Asus', 1469000, '9vga.jpg'),
(10, 'ASRock Radeon RX 6600 XT 8GB DDR6 - Challenger D 8G OC', 'Radeon RX 6600 XT', '8 GB, GDDR6, 128 bit', '1968 MHz', '2000 MHz', 'VGA', 'Asrock', 11899000, '10vga.jpg'),
(11, 'Asus GeForce RTX 3080 Ti 12GB GDDR6X - ROG Strix OC', 'GeForce RTX 3080 Ti', '12 GB, GDDR6X, 384 bit', '1365 MHz', '1188 MHz', 'VGA', 'Asus', 34999000, '11vga.jpg'),
(12, 'Gigabyte Radeon RX 580 8GB DDR5 Gaming Rev2.0 - GV-RX580GAMING-8GD', 'Radeon RX 580', '8 GB, GDDR5, 256 bit', '1257 MHz', '2000 MHz', 'VGA', 'Radeon', 9699000, '12vga.jpg'),
(13, 'Gigabyte Radeon RX 570 8GB DDR5 Gaming Rev2.0 - GV-RX570GAMING-8GD', 'Radeon RX 570', '4 GB, GDDR5, 256 bit', '1168 MHz', '1750 MHz', 'VGA', 'Gigabyte', 8399000, '13vga.jpg'),
(14, 'Asus GeForce RTX 3070 Ti 8GB GDDR6X - TUF Gaming OC', 'GeForce RTX 3070 Ti', '8 GB, GDDR6X, 256 bit', '1575 MHz', '1188 MHz', 'VGA', 'Asus', 19499000, '14vga.jpg'),
(15, 'Asus Radeon RX 6900 XT 16GB GDDR6 ROG Strix LC TOP OC', 'Radeon RX 6900 XT', '16 GB, GDDR6, 256 bit', '1825 MHz', '2000 MHz', 'VGA', 'Asus', 45390000, '15vga.jpg'),
(16, 'MSI GeForce GT 730 2GB DDR3 - N730K-2GD3H/LPV1', 'GeForce GT 730', '1024 MB, GDDR5, 64 bit', '902 MHz', '1253 MHz', 'VGA', 'MSI', 969000, '16vga.jpg'),
(17, 'Asus GeForce GTX 1660 SUPER 6GB DDR6 - TUF Gaming', 'GeForce GTX 1660 SUPER', '6 GB, GDDR6, 192 bit', '1530 MHz', '1750 MHz	', 'VGA', 'Asus', 9999000, '17vga.jpg'),
(18, 'Biostar GeForce GT 210 1GB DDR3 64 Bit', 'GeForce 210', '512 MB, DDR3, 64 bit', '520 MHz', '400 MHz', 'VGA', 'Biostar', 455000, '18vga.jpg'),
(19, 'Asus GeForce GTX 1650 SUPER 4GB DDR6 - TUF Gaming OC', 'GeForce GTX 1650 SUPER', '4 GB, GDDR6, 128 bit', '1530 MHz', '1500 MHz', 'VGA', 'Asus', 6599000, '19vga.jpg'),
(20, 'MSI GeForce GTX 1050 Ti 4GB DDR5 - 4GT OC', 'GeForce GTX 1050  Ti	', '2 GB, GDDR5, 128 bit', '1354 MHz', '1752 MHz', 'VGA', 'MSI', 3899000, '20vga.jpg'),
(21, 'Gainward GeForce GTX 1660 Ti 6GB DDR6 - Ghost', 'GeForce GTX 1660 Ti', '6 GB, GDDR6, 192 bit', '1500 MHz	', '1500 MHz', 'VGA', 'Gainward', 9999000, '21vga.jpg'),
(22, 'Gigabyte Quadro T600-NV 1.0 4GB GDDR6', 'T600', '4 GB, GDDR6, 128 bit', '735 MHz', '1250 MHz', 'VGA', 'Gigabyte', 3945000, '22vga.jpg'),
(23, 'ASRock Radeon RX 6700 XT 12GB DDR6 - Phantom Gaming D 12G OC', 'Radeon RX 6700 XT', '12 GB, GDDR6, 192 bit', '2321 MHz', '2000 MHz', 'VGA', 'Asrock', 16599000, '23vga.jpg'),
(24, 'Asus Radeon RX 550 4GB DDR5 - Phoenix (PH)', 'Radeon RX 550', '2 GB, GDDR5, 128 bit', '1100 MHz', '1750 MHz', 'VGA', 'Asus', 2499000, '24vga.jpg'),
(25, 'Biostar Radeon RX 560 4GB DDR5', 'Radeon RX 560', '4 GB, GDDR5, 128 bit', '1175 MHz', '1750 MHz', 'VGA', 'Biostar', 2950000, '25vga.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `vga`
--
ALTER TABLE `vga`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `vga`
--
ALTER TABLE `vga`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
