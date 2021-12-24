-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2021 pada 04.19
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
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
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`id_thread`, `user_id`, `judul`, `konten`, `kategori`, `thumb`, `tanggal_posting`, `diubah`) VALUES
(33, 4, 'Inikah Tanggal Peluncuran Samsung Galaxy S21 FE? ', 'Sekian lama nasibnya tak kunjung jelas, kini tanda-tanda kehadiran <strong>Galaxy S21 FE</strong> (<em>Fan Edition</em>) kian menguat. Belakangan, berembus kabar yang mengungkap tanggal peluncuran ponsel versi \"murah\" dari lini Galaxy S21 ini. <br /><br />Salah satu kabar tersebut dibagikan oleh, Jon Prosser, seorang pembocor gadget kenamaan yang kerap membeberkan informasi terkait smartphone yang akan dirilis di pasaran. <br /><br />Melalui akun Twitter pribadinya dengan handle @jon_prosser, ia mengungkap detail informasi seputar tanggal peluncuran Galaxy S21 FE. <br /><br />Menurut Prosser, Samsung disinyalir akan mengumumkan kehadiran Galaxy S21 FE pada 3 Januari pukul 18.00 PST atau 4 Januari 09.00 pagi apabila dikonversi ke satuan Waktu Indonesia Bagian Barat (WIB). <br /><br />Meski demikian, waktu tersebut terlihat janggal karena tidak selaras dengan perkiraan mulainya sesi keynote Samsung di Customers Electronics Show (CES) 2022 yang akan dilaksanakan pada 4 Januari 2022 18.30 PST (sekitar 5 Januari 09.30 WIB). <br /><br />Sebelumnya, terdapat indikasi kuat yang menyebut bahwa informasi seputar Galaxy S21 FE akan diumumkan melalui acara pameran teknologi akbar, CES 2022 yang rencananya akan digelar 5-8 Januari 2022 di Las Vegas, Amerika Serikat. <br /><br />Selain membeberkan indikasi tanggal peluncuran perangkat, Prosser turut mengungkap jadwal penjualan perdana Galaxy S21 FE yang konon akan pada digelar pada 11 Januari 2022. Apabila mengacu pada posting awal yang diunggah Prosser, maka Galaxy S21 FE diduga akan dijual secara langsung tanpa harus didului sesi pemesanan awal (pre-order). \"Saya mendengar bahwa pengumuman untuk S21 FE telah dipindahkan ke Senin, 3 Januari @6 sore PST. <br /><br />Ketersediaan umum masih pada 11 Januari,\" tulis akun Twitter @jon_prosser. Senada dengan Prosser, pembocor ulung Evan Blass melalui akun Twitter dengan handle @evleaks juga memberikan petunjuk lain. Dalam sebuah render desain yang diduga parangkat Galaxy S21 FE, Blass mencantumkan twit berbunyi \"January 11th\". &nbsp;Tanggal itu kemungkinan merujuk pada waktu perilisan Galaxy S21 FE.', 'Gadget', 'pict1.png', '2021-12-24 02:12:16', NULL),
(34, 6, 'Kode Komputer Wajib Diketahui', '<img src=\"http://localhost/techcorner/forum/assets/upload/60797_kom1.jpg\" alt=\"\" width=\"540\" height=\"382\" /><br /><br />Pada perkembangan zaman yang telah pesat Komputer menjadi salah satu alat yang banyak digunakan untuk mencari berbagai informasi yang ada di internet.<br /><br />Pada pelajar komputer sendiri memiliki banyak kegunaan diantaranya adalah dapat digunakan untuk mengerjakan tugas-tugas dengan kreatif karena kecanggihan teknologi yang mana komputer dapat menampilkan berbagai macam teks yang menarik, adanya warna, gerak, suara, gambar, dan banyak hal lainnya. Hal tersebut semakin mendukung pelajar untuk mengembangkan pengetahuan serta keterampilan yang ada dalam diri.<br /><br />Beberapa kode dalam komputer yang perlu diketahui:<br /><br />1. Ctrl + B<br />kode tersebut digunakan untuk menebalkan tulisan yang diinginkan, dan sebelum itu kalian perlu blok terlebihdahulu tulisan mana yang ingin kalian tebalkan.<br /><br />2. Ctrl + C<br />Kode ini digunakan untuk menyalin atau copy tulisan.<br /><br />3. Ctrl + U<br />Untuk memberi garis bawah pada tulisan kode tersebut dapat digunakan karena fungsi dari kode tersebut adalah untuk memberi garis bawah pada tulisan yang diperlukan.<br /><br />4. Ctrl + I<br />Kode ini memiliki fungsi untuk memiringkan tulisan.<br /><br />5. Ctrl + N<br />Untuk membuka jendela atau tab kode ini dapat menjadi kunci mudah untuk kalian lakukan.<br /><br />6. Ctrl + A<br />Kode tersebut dapat digunakan untuk memblokir seluruh tulisan atau teks pada file.<br /><br />7. Ctrl + F4<br />Berfungsi untuk menutup jendela dokumen sekaligus untuk menutup aplikasi. Kode Ctrl + F4 menjadi langkah cepat dan sangat mudah untuk dilakukan.<br /><br />8. Ctrl + F<br />Terkadang mencari file dan membuka menu dan pencarian kata sulit untuk dilakukan. Akan tetapi, kode Ctrl + F dapat dijadikan sebagai rahasia mudah untuk melakukan hal tersebut.<br /><br />9. Ctrl + Z<br />Untuk membatalkan perintah sebelumnya kalian dapat menggunakan kode ini.<br /><br /><br />Nah kode-kode tersebut memiliki manfaat dan harus diingat ya.<br /><br />Terima kasih', 'Komputer & PC', '61c532467283b.jpg', '2021-12-24 02:36:54', '2021-12-24 9:42 am'),
(35, 6, 'Apa Itu Magnetic Disk? ', '<img src=\"http://localhost/techcorner/forum/assets/upload/45108_kom3.jpg\" alt=\"\" width=\"540\" height=\"360\" /><br /><br /><br />PENGERTIAN DEFINISI MAGNETIC DISK<br />Dalam sistem komputer, komputer memiliki beberapa komponen yang penting seperti CPU, GPU, dan storage. Dalam pembahasan kali ini saya akan membahas tentang magnetic disk, magnetik disk ini termasuk dalam kategori storage atau dalam bahasa nya yaitu penyimpanan yang terdapat pada sistem komputer, untuk lebih jelasnya kita simak pembahasan berikut ini.<br />Apa itu Magnetic disk ?<br /><br />Magnetic disk atau dalam bahasa Indonesia di sebut dengan penyimpanan magnet dan orang Indonesia menyebut nya dengan harddisk atau HDD, merupakan penyimpanan yang digunakan untuk menyimpan data file pada sistem komputer bisa berubah file dokumen, foto, video, suara dan lain-lainnya.<br /><br />Jenis penyimpanan ini biasa kita temukan pada komputer modern saat ini, dan penyimpanan jenis ini berbeda dengan penyimpanan sistem komputer lainnya karena cara kerja pada penyimpanan magnet ini mirip seperti piringan hitam beserta alat pemutar nya yaitu vinyl player dalam bentuk ukuran yang lebih compact namun tidak bisa mengeluarkan suara secara langsung.<br /><br />Untuk pengenalannya penyimpanan ini dibagi menjadi beberapa bagian yaitu:<br /><br />Spindle merupakan pusat putaran pada magnetic diks ini berupa kepingan-kepingan cakram magnetik yang berputar sangat cepat.<br />Cakram magnetik merupakan piringan berbentuk plat tipis yang berbentuk seperti CD terbuat dari logam ataupun plastik dan di permukaanya dilapisi bahan yang dapat dimagnetisasi.<br />Read-write Head merupakan mekanisme sebagai perantara yang digunakan untuk membaca dan menulis pada cakram/ piringan.<br />Enclosure merupakan lapisan luar yang digunakan untuk melindungi komponen-komponen magnetic disk dari benturan, percikan air dan debu.<br />Interfacing Module merupakan sebuah rangkaian perangkat elektronik yang digunakan dalam menjalankan data dari head untuk membaca dan menulis data. Teknologi interfacing module yang digunakan sekarang ini yaitu teknologi serial SATA, hal ini dikarenakan untuk mengantikan hardisk ATA yang lamban di bandingkan dengan hardisk SATA.<br />Kesimpulan-nya magnetic disk &nbsp;atau hardisk ini merupakan sebuah alat penyimpanan yang digunakan sistem komputer untuk menyimpan data baik itu dalam bentuk file, foto, video dan lainnya. Serta teknologi yang digunakan hardisk saat itu menggunakan teknologi serial SATA yang lebih cepat dalam memproses menulis dan membaca data, dan secara tidak langsung mengantikan teknologi hardisk ATA.<br />Cukup sekian artikel yang bisa saya tulis, bila ada kesalah dalam perkataan, kurang lebih mohon maaf dan terima kasih telah membaca.', 'Laptop / Notebook', '61c53a378f4e5.jpg', '2021-12-24 03:10:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_thread`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE `posting`
  MODIFY `id_thread` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
