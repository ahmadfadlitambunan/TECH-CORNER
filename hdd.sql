-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 19.18
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
-- Struktur dari tabel `hdd`
--

CREATE TABLE `hdd` (
  `Id` int(10) NOT NULL,
  `Product Name` varchar(200) NOT NULL,
  `Series` varchar(100) NOT NULL,
  `Capacity` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Price` int(20) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hdd`
--

INSERT INTO `hdd` (`Id`, `Product Name`, `Series`, `Capacity`, `Category`, `Brand`, `Price`, `Image`) VALUES
(1, 'Western Digital Red Plus NAS Hard Drive | WD Red Plus - 14TB', 'WD Red Plus', '14 TB', 'HDD', 'NAS', 10499000, '1hdd.jpg'),
(2, 'WDC 1TB SATA3 64MB - Blue - WD10EZEX - Garansi 2 Th', 'WD10EZEX', '1TB', 'HDD', 'WDC', 609000, '2hdd.jpg'),
(3, 'WDC 2TB SATA3 256MB - Blue - WD20EZAZ - Garansi 2 Th', 'WD20EZAZ', '2TB', 'HDD', 'WDC', 799000, '3hdd.jpg'),
(4, 'WDC 2TB SATA3 256MB - 7200RPM - Blue - WD20EZBX - Garansi 2 Th', ' WD20EZBX', '2TB', 'HDD', 'WDC', 850000, '4hdd.jpg'),
(5, 'WDC Purple 2TB For CCTV 24 Hours - WD20PURZ - Garansi 3 Th', 'WD20PURZ ', '2TB', 'HDD', 'WDC', 825000, '5hdd.jpg'),
(6, 'WDC 4TB SATA3 256MB - Blue - WD40EZAZ - Garansi 2 Th', 'WD40EZAZ', '4TB', 'HDD', 'WDC', 1420000, '6dd.jpg'),
(7, 'Seagate 1TB SATA3 - BarraCuda Series', 'BarraCuda (1TB)', '1TB', 'HDD', 'Seagate', 629000, '7hdd.jpg'),
(8, 'Seagate 2TB SATA3 - BarraCuda Series', 'BarraCuda (2TB)', '2TB', 'HDD', 'Seagate', 859000, '8hdd.jpg'),
(9, 'WDC 2TB SATA3 64MB - Black - WD2003FZEX - Garansi 5 Th', 'WD2003FZEX', '2TB', 'HDD', 'WDC', 2030000, '9hdd.jpg'),
(10, 'Seagate 320GB SATA2 - Used & Garansi 1 Tahun', 'Used', '320GB', 'HDD', 'Seagate', 145000, '10hdd.jpg'),
(11, 'WDC 18TB Ultrastar DC HC550 - Ultrastar DC HC500 Series', ' DC HC500', '18TB', 'HDD', 'WDC', 12999000, '11hdd.jpg'),
(12, 'Seagate 250GB SATA2 - Used & Garansi 1 Tahun', 'SATA2 - Used ', '250GB', 'HDD', 'Seagate', 85000, '12hdd.jpg'),
(13, 'WDC 14TB Ultrastar DC HC530 - Ultrastar DC HC500 Series', 'Ultrastar DC HC500', '14TB', 'HDD', 'WDC', 9999000, '13hdd.jpg'),
(14, 'WDC 12TB Ultrastar DC HC520 - Ultrastar DC HC500 Series', 'Ultrastar DC HC500', '12TB', 'HDD', 'WDC', 9299000, '14hdd.jpg'),
(15, 'WDC 10TB SATA3 256MB - Red Plus - WD101EFBX - Garansi 3 Th (For NAS)', 'WD101EFBX ', '2', 'HDD', 'WDC', 5049000, '15hdd.jpg'),
(16, 'WDC 8TB Ultrastar DC HC320 - Ultrastar DC HC300 Series', 'Ultrastar DC HC300', '8TB', 'HDD', 'WDC', 5499000, '16dd.jpg'),
(17, 'Seagate Enterprise SAS 8TB - Exos 7E8 Series', 'Exos 7E8', '8TB', 'HDD', 'Seagate', 5750000, '17hdd.jpg'),
(18, 'Seagate Surveillance 10TB - SkyHawk AI Series', 'SkyHawk ', '10TB', 'HDD', 'Seagate', 4950000, '18hdd.jpg'),
(19, 'WDC 8TB Ultrastar DC HC320 - Ultrastar DC HC300 Series', 'DC HC300', '8TB', 'HDD', 'WDC', 5499000, '19hdd.jpg'),
(20, 'Toshiba 1TB SATA3 7200RPM - P300 Series', 'P300', '1TB', 'HDD', 'Toshiba', 570000, '20hdd.jpg'),
(21, 'Toshiba 2.5\" 1TB SATA 128MB - 7mm - L200 Series', 'L200 ', '1TB', 'HDD', 'Toshiba', 620000, '21hdd.jpg'),
(22, 'Toshiba 10TB SATA3 7200RPM - X300 Series', 'X300', '10TB', 'HDD', 'Toshiba', 3249000, '22hdd.jpg'),
(23, 'Toshiba 4TB SATA3 7200RPM For NAS - N300 Series', 'N300 ', '4TB', 'HDD', 'Toshiba', 1695000, '23hdd.jpg'),
(24, 'Seagate Enterprise 16TB - Exos Series', 'Exos', '16TB', 'HDD', 'Seagate', 10400000, '24hdd.jpg'),
(25, 'Seagate Surveillance 16TB - SkyHawk AI Series', ' SkyHawk AI', '16TB', 'HDD', 'Seagate', 7300000, '25hdd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hdd`
--
ALTER TABLE `hdd`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hdd`
--
ALTER TABLE `hdd`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
