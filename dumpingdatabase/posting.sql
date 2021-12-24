-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 03:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
  `judul` varchar(200) NOT NULL,
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
(33, 4, 'Inikah Tanggal Peluncuran Samsung Galaxy S21 FE? ', 'Sekian lama nasibnya tak kunjung jelas, kini tanda-tanda kehadiran <strong>Galaxy S21 FE</strong> (<em>Fan Edition</em>) kian menguat. Belakangan, berembus kabar yang mengungkap tanggal peluncuran ponsel versi \"murah\" dari lini Galaxy S21 ini. <br /><br />Salah satu kabar tersebut dibagikan oleh, Jon Prosser, seorang pembocor gadget kenamaan yang kerap membeberkan informasi terkait smartphone yang akan dirilis di pasaran. <br /><br />Melalui akun Twitter pribadinya dengan handle @jon_prosser, ia mengungkap detail informasi seputar tanggal peluncuran Galaxy S21 FE. <br /><br />Menurut Prosser, Samsung disinyalir akan mengumumkan kehadiran Galaxy S21 FE pada 3 Januari pukul 18.00 PST atau 4 Januari 09.00 pagi apabila dikonversi ke satuan Waktu Indonesia Bagian Barat (WIB). <br /><br />Meski demikian, waktu tersebut terlihat janggal karena tidak selaras dengan perkiraan mulainya sesi keynote Samsung di Customers Electronics Show (CES) 2022 yang akan dilaksanakan pada 4 Januari 2022 18.30 PST (sekitar 5 Januari 09.30 WIB). <br /><br />Sebelumnya, terdapat indikasi kuat yang menyebut bahwa informasi seputar Galaxy S21 FE akan diumumkan melalui acara pameran teknologi akbar, CES 2022 yang rencananya akan digelar 5-8 Januari 2022 di Las Vegas, Amerika Serikat. <br /><br />Selain membeberkan indikasi tanggal peluncuran perangkat, Prosser turut mengungkap jadwal penjualan perdana Galaxy S21 FE yang konon akan pada digelar pada 11 Januari 2022. Apabila mengacu pada posting awal yang diunggah Prosser, maka Galaxy S21 FE diduga akan dijual secara langsung tanpa harus didului sesi pemesanan awal (pre-order). \"Saya mendengar bahwa pengumuman untuk S21 FE telah dipindahkan ke Senin, 3 Januari @6 sore PST. <br /><br />Ketersediaan umum masih pada 11 Januari,\" tulis akun Twitter @jon_prosser. Senada dengan Prosser, pembocor ulung Evan Blass melalui akun Twitter dengan handle @evleaks juga memberikan petunjuk lain. Dalam sebuah render desain yang diduga parangkat Galaxy S21 FE, Blass mencantumkan twit berbunyi \"January 11th\". &nbsp;Tanggal itu kemungkinan merujuk pada waktu perilisan Galaxy S21 FE.', 'Gadget', 'pict1.png', '2021-12-24 02:12:16', NULL);

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
  MODIFY `id_thread` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
