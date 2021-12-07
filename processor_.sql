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
-- Struktur dari tabel `processor.`
--

CREATE TABLE `processor.` (
  `Id` int(10) NOT NULL,
  `Product Name` varchar(200) NOT NULL,
  `Processor` varchar(100) NOT NULL,
  `Graphics Model` varchar(100) NOT NULL,
  `Cores Threads` varchar(50) NOT NULL,
  `Base Clock` varchar(50) NOT NULL,
  `Boost Clock` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Socket` varchar(50) NOT NULL,
  `Price` int(20) NOT NULL,
  `Image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `processor.`
--

INSERT INTO `processor.` (`Id`, `Product Name`, `Processor`, `Graphics Model`, `Cores Threads`, `Base Clock`, `Boost Clock`, `Category`, `Brand`, `Socket`, `Price`, `Image`) VALUES
(1, 'Intel Core i9-12900K 3.2GHz Up To 5.2GHz - Cache 30MB [Box] Socket LGA 1700 - Alder Lake Series', 'i9-12900K', ' Discrete Graphics Card Required', '16 / 24', '3.2 GHz', '5.2 GHz', 'Processor', 'Intel', 'Socket 1700', 11399000, '1pro.jpg'),
(2, 'AMD Bristol Ridge A10-9700 (Radeon R7 Series) 3.5Ghz Up To 3.8Ghz Cache 2MB 65W Socket AM4 [Box] - 4 Core - AD9700AGABBOX', 'A10-9700', ' Discrete Graphics Card Required', '4', '3.5 GHz', '3.8 GHz', 'Processor', 'AMD', 'Socket AM4', 1000000, '2pro.jpg'),
(3, 'Intel Pentium G4400 3.3Ghz - Cache 3MB [Tray] Socket LGA 1151 - Skylake Series', 'Pentium G4400', ' Discrete Graphics Card Required', '2', '3.3 GHz', '3.3 GHz', 'Processor', 'Intel', 'Socket 1151', 895000, '3pro.jpg'),
(4, 'AMD Ryzen 7 5700G 3.8Ghz Up To 4.6Ghz Cache 16MB 65W AM4 [Box] - 8 Core - 100-100000263BOX - With AMD Wraith Stealth Cooler (Garansi Lokal/AMD Indonesia)', 'Ryzen 7 5700G', ' Discrete Graphics Card Required', '8 / 16', '3.8 GHz', '4.6 GHz', 'Processor', 'AMD', 'Socket AM4', 4999000, '4pro.jpg'),
(5, 'AMD Ryzen 7 5800X 3.8Ghz Up To 4.7Ghz Cache 32MB 105W AM4 [Box] - 8 Core - 100-100000063WOF (Garansi Lokal/AMD Indonesia)', 'Ryzen 7 5800X', 'Discrete Graphics Card Required!', '8 / 16', '3.8 GHz', '4.7 GHz', 'Processor', 'AMD', 'Socket AM4', 6335000, '5pro.jpg'),
(6, 'AMD Ryzen 9 5900X 3.7Ghz Up To 4.8Ghz Cache 64MB 105W AM4 [Box] - 12 Core - 100-100000061WOF (Garansi AMD Global/AMD International 3 Years Replacement)', 'Ryzen 9 5900X', ' Discrete Graphics Card Required', '12 / 24', '3.7 GHz', '4.8 GHz', 'Processor', 'AMD', 'Socket AM4', 8999000, '6pro.jpg'),
(7, 'AMD Ryzen 7 3700X 3.6Ghz Up To 4.4Ghz Cache 32MB 65W AM4 [Box] - 8 Core - 100-100000071BOX - With AMD Wraith Prism Cooler (Garansi Lokal/AMD Indonesia)', 'Ryzen 7 3700X', ' Discrete Graphics Card Required', '8 / 16', '3.6 GHz', '4.4 GHz', 'Processor', 'AMD', 'Socket AM4', 5299000, '7pro.jpg'),
(8, 'AMD Ryzen 9 5950X 3.4Ghz Up To 4.9Ghz Cache 64MB 105W AM4 [Box] - 16 Core - 100-100000059WOF (Garansi AMD Global/AMD International 3 Years Replacement)', 'Ryzen 9 5950X ', 'Discrete Graphics Card Required', '16 / 32', '3.4 GHz', '4.9 GHz', 'Processor', 'AMD', 'Socket AM4', 12375000, '8pro.jpg'),
(9, 'Intel Core i5-3470 3.2Ghz Cache 6MB [Tray] Socket LGA 1155\r\n', 'Core i5-3470', 'Discrete Graphics Card Required', '4', '3.2 GHz', '3.6 GHz', 'Processor', 'Intel', 'Socket 1155', 625000, '9pro.jpg'),
(10, 'AMD Carrizo A8-7680 (Radeon R7 Series) 3.5Ghz Cache 2MB 45W Socket FM2+ - D7680ACABBOX - With 65W Quiet Cooler', 'A8-7680', 'Discrete Graphics Card Required', '4', '3.5 GHz', '3.8 GHz', 'Processor', 'AMD', 'Socket FM2+', 653000, '10pro.jpg'),
(11, 'Intel Core 2 Duo E8400 3.0Ghz FSB 1333 Mhz Cache 6MB [Tray] Socket LGA 775', 'Core 2 Duo E8400', 'Discrete Graphics Card Required', '2', '3 GHz', '3 GHz', 'Processor', 'Intel', 'Socket 775', 95000, '11pro.jpg'),
(12, 'AMD Athlon 3000G (Radeon Vega 3) 3.5Ghz Cache 4MB 35W Socket AM4 [BOX] - 2 Core - YD3000C6FHBOX', 'Athlon 3000G', 'Discrete Graphics Card Required', '2 / 4	', '3.5 GHz', '3.5 GHz', 'Processor', 'AMD', 'Socket AM4', 1399000, '12pro.jpg'),
(13, 'Intel Core i7-11700F 2.5Ghz Up To 4.9Ghz - Cache 16MB [Box] Socket LGA 1200 - Rocket Lake Series', 'Core i7-11700F', 'Discrete Graphics Card Required', '8 / 16', '2.5 GHz', '4.9 GHz', 'Processor', 'Intel', 'Socket 1200', 5099000, '13pro.jpg'),
(14, 'AMD Ryzen 5 3500X 3.6Ghz Up To 4.1Ghz Cache 32MB 65W AM4 [Box] - 6 Core - 100-100000158CBX - With AMD Wraith Stealth Cooler ', 'Ryzen 5 3500X', 'Discrete Graphics Card Required', '6', '3.6 GHz', '4.1 GHz', 'Processor', 'AMD', 'Socket AM4', 2799000, '14pro.jpg'),
(15, 'Intel Core i3-10105F 3.7Ghz Up To 4.4Ghz - Cache 6MB [Box] Socket LGA 1200 - Comet Lake Refresh Series', 'Core i3-10105F', 'Discrete Graphics Card Required', '4 / 8', '3.7 GHz', '4.4 GHz', 'Processor', 'Intel', 'Socket 1200', 1399000, '15pro.jpg'),
(16, 'Intel Core i5-12600K 3.7GHz Up To 4.9GHz - Cache 20MB [Box] Socket LGA 1700 - Alder Lake Series', 'Core i5-12600K', 'Discrete Graphics Card Required', '10 / 16', '3.7 GHz', '4.9 GHz', 'Processor', 'Intel', 'Socket 1700', 5349000, '16pro.jpg'),
(17, 'Intel Core i5-10400 2.9Ghz Up To 4.3Ghz - Cache 12MB [Tray] Socket LGA 1200 - Comet Lake Series - NEW UNIT - 3 Years Warranty (Include!!! Cooler Intel)\r\n', 'Core i5-10400', 'Discrete Graphics Card Required', '6 / 12', '2.9 GHz', '4.3 GHz', 'Processor', 'Intel', 'Socket 1200', 2499000, '17pro.jpg'),
(18, 'AMD Ryzen 9 3900X 3.8Ghz Up To 4.6Ghz Cache 64MB 105W AM4 [Tray] - 12 Core - 100-100000023MPK - With AMD Wraith Prism Cooler', 'Ryzen 9 3900X', 'Discrete Graphics Card Required', '12 / 24', '3.8 GHz', '4.6 GHz', 'Processor', 'AMD', 'Socket AM4', 7799000, '18pro.jpg'),
(19, 'AMD Bristol Ridge A8-9600 (Radeon R7 Series) 3.1Ghz Up To 3.4Ghz Cache 2MB 65W Socket AM4 [Box] - 4 Core - AD9600AGABBOX', 'A8-9600', 'Discrete Graphics Card Required', '4', '3.1 GHz', '3.4 GHz', 'Processor', 'AMD', 'Socket AM4', 799000, '19pro.jpg'),
(20, 'AMD Ryzen 5 3400G 3.7Ghz Up To 4.2Ghz Cache 4MB 65W AM4 [Box] - 4 Core - YD340GC5FIBOX - With AMD Wraith Spire Cooler', 'Ryzen 5 3400G', 'Discrete Graphics Card Required', '4 / 8', '3.7 GHz', '4.2 GHz', 'Processor', 'AMD', 'Socket AM4', 3499000, '20pro.jpg'),
(21, 'Intel Core i7-10700K 3.8Ghz Up To 5.1Ghz - Cache 16MB [Box] Socket LGA 1200 - Comet Lake Series', 'Core i7-10700K', 'Discrete Graphics Card Required', '8 / 16', '3.8 GHz', '5.1 GHz', 'Processor', 'Intel', 'Socket 1200', 5299000, '21pro.jpg'),
(22, 'Intel Core i3-10100 3.6Ghz Up To 4.3Ghz - Cache 6MB [Tray] Socket LGA 1200 - Comet Lake Series - NEW UNIT - 3 Years Warranty (Include!!! Cooler Intel)\r\n', 'Core i3-10100', 'Discrete Graphics Card Required', '4 / 8', '3.6 GHz', '4.3 GHz', 'Processor', 'Intel', 'Socket 1200', 1690000, '22pro.jpg'),
(23, 'Intel Core i7-3770 3.4Ghz - Cache 8MB [Tray] Socket LGA 1155 - Ivy Bridge Series', 'Core i7-3770', 'Discrete Graphics Card Required', '4 / 8', '3.4 GHz', '3.9 GHz', 'Processor', 'Intel', 'Socket 1155', 1170000, '23pro.jpg'),
(24, 'AMD Ryzen Threadripper 3990X 2.9Ghz Up To 4.3Ghz Cache 288MB 280W sTRX4 [BOX] - 64 Core - 100-100000163WOF', 'Ryzen Threadripper 3990X', 'Discrete Graphics Card Required', '64 / 128', '2.9 GHz', '4.3 GHz', 'Processor', 'AMD', 'Socket TRX4', 63299000, '24pro.jpg'),
(25, 'Intel Core 2 Duo E8400 3.0Ghz FSB 1333 Mhz Cache 6MB [Tray] Socket LGA 775', 'Core 2 Duo E8400', 'Discrete Graphics Card Required', '2', '3 GHz', '3 GHz', 'Processor', 'Intel', 'Socket 775', 95000, '25pro.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `processor.`
--
ALTER TABLE `processor.`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `processor.`
--
ALTER TABLE `processor.`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
