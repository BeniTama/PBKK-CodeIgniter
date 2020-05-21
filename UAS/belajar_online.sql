-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 10:14 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `address` varchar(256) NOT NULL,
  `telephone` varchar(256) NOT NULL,
  `preference` varchar(56) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `name`, `address`, `telephone`, `preference`, `order_date`, `payment_deadline`) VALUES
(1, 'Nekomata Okayu', 'Tokyo', '080989999', 'BCA', '2020-05-21 17:10:40', '2020-05-22 17:10:40'),
(2, 'Nekomata Okayu', 'Tokyo', '080989999', 'BCA', '2020-05-21 17:11:14', '2020-05-22 17:11:14'),
(3, 'Inugami Korone', 'Kansai', '123456', 'BRI', '2020-05-21 21:07:36', '2020-05-22 21:07:36'),
(4, 'John Smith', 'New York', '080989999', 'Mandiri', '2020-05-22 01:21:41', '2020-05-23 01:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_invoice`, `id_product`, `name_product`, `quantity`, `price`) VALUES
(1, 2, 1, 'Laravel', 0, 500000),
(2, 3, 2, 'Java', 0, 250000),
(3, 3, 13, 'Adobe Illustrator', 0, 100000),
(4, 4, 3, 'CodeIgniter', 0, 195000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(64) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `long_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `category`, `price`, `image`, `long_desc`) VALUES
(1, 'Laravel', 'Kursus pemrograman web berbasis kerangka kerja Laravel', 'Programming', 500000, 'Laravel-best-PHP-Framework.jpg', 'Dalam kelas ini akan dipelajari:<br>\r\n1. Perkenalan Laravel<br>\r\n2. Persiapan dan Instalasi<br>\r\n3. Basic Laravel<br>\r\n4. Proyek Sederhana Laravel\r\n'),
(2, 'Java', 'Kursus pemrograman berbasis Java', 'Programming', 250000, 'java.png', ''),
(3, 'CodeIgniter', 'Kursus singkat CodeIgniter dengan Studi Kasus', 'Programming', 195000, 'codeigniter.jpeg', 'Dalam kursus ini akan diajarkan:<br>\r\n1. Perkenalan CodeIgniter<br>\r\n2. Persiapan dan Instalasi<br>\r\n3. Basic CodeIgniter<br>\r\n4. Proyek CodeIgniter<br>'),
(4, 'MySQL Dasar', 'Kursus dasar MySQL untuk menggunakan database pada website', 'Programming', 195000, 'mysql.png', 'Dalam kursus ini akan diajarkan:<br>\r\n1. Perkenalan apa itu database<br>\r\n2. Perkenalan SQL<br>\r\n3. Praktek penggunaan MySQL<br>\r\n4. Pengenalan perintah-perintah penting MySQL, seperti CRUD<br>\r\n5. Praktek langsung menggunakan database pada suatu website'),
(5, 'Node JS', 'Kursus dasar NodeJS untuk Server Side Programming', 'Programming', 195000, 'node_js.png', 'Dalam kursus ini akan diajarkan:<br>\r\n1. Perkenalan Node JS<br>\r\n2. Persiapan dan instalasi<br>\r\n3. Konsep dasar Node JS<br>\r\n4. Membuat HTTP Server<br>\r\n5. Membuat external library'),
(6, 'Bahasa Korea Dasar', 'Kursus dasar Bahasa Korea untuk persiapan studi ke Korea', 'Bahasa', 120000, 'korean_language.jpg', 'Kursus ini akan mempelajari:<br>\r\n<ul>\r\n<li>Mengenal huruf korea atau hangeul</li>\r\n<li>Belajar mengucapkan hangeul</li>\r\n<li>Belajar menulis hangeul</li>\r\n<li>Belajar cara berkenalan dengan bahasa korea</li>\r\n<li>Belajar angka dalam bahasa korea</li>\r\n<li>Belajar kalimat kepunyaan dalam bahasa korea</li>\r\n</ul>'),
(7, 'Berbicara Bahasa Jepang', 'Kursus Bahasa Jepang untuk persiapan studi dan bekerja di Jepang', 'Bahasa', 120000, 'bahasa_jepang.png', 'Dalam kursus ini akan diajarkan:<br>\r\n1. Perkenalan Diri, Kalimat Positif, Kalimat Negatif<br>\r\n2. KOSOA I, Kalimat Pertanyaan, Kalimat Kepemilikan Benda<br>\r\n3. KOSOA II, Penjelasan Kata Benda, Partikel Objek<br>\r\n4. Ekspresi Waktu, Kata Kerja MASU, Partikel KARA~MADE, NI, dan TO I<br>\r\n5. Ekspresi Arah, Partikel TO II, Partikel YO, dan Pertanyaan Sederhana mengenai Waktu<br>\r\n6. Kata Kerja SHIMASU, Partikel DE, Kalimat Pertanyaan Ajakan'),
(8, 'Bahasa Mandarin Dasar', 'Kursus Bahasa Mandarin dasar untuk pekerjaan dan pendidikan', 'Bahasa', 120000, 'mandarin.png', 'Dalam kursus ini akan diajarkan:<br>\r\n1. Hanyu pinyin<br>\r\n2. Salam<br>\r\n3. Struktur kalimat<br>\r\n4. Belajar angka<br>\r\n5. Perkenalan diri<br>\r\n6. Memberikan pertanyaaan<br>'),
(9, 'Akuntansi Dasar', 'Kursus akuntansi dasar', 'Bisnis', 250000, 'akuntansi.png', 'Dalam kursus ini akan diajarkan:<br>\r\n1. Mengenal akuntansi dan mengenal persamaan akuntansi<br>\r\n2. Memahami konsep akun dan t-account<br>\r\n3. Melihat contoh penggunaan t-account<br>\r\n4. Mengenal jurnal umum, buku besar, dan neraca saldo. <br>\r\n5. Memahami konsep akrual dan contoh akun akrual<br>\r\n6. Memahami jurnal penyesuaian<br>\r\n7. Memahami neraca saldo yang telah disesuaikan<br>\r\n8. Mengenal akun nominal dan akun riil<br>\r\n9. Memahami jurnal penutup<br>\r\n10.Mempelajari neraca saldo setelah penutupan<br>\r\n11.Memahami laporan laba rugi'),
(10, 'Microsoft Excel', 'Kursus analisis data dengan Microsoft Excel', 'Bisnis', 250000, 'excel.png', 'Dalam kursus ini akan diajarkan:<br>\r\n<ul>\r\n<li>Cara import data</li>\r\n<li>Data cleansing atau membersihkan data</li>\r\n<li>Analisis deskriptif</li>\r\n<li>Operasi matematika</li>\r\n<li>Lookup value</li>\r\n<li>Kondisi IF</li>\r\n</ul>'),
(11, 'Photoshop', 'Kursus editing foto dengan bermacam studi kasus dengan Photoshop', 'Desain', 250000, 'photoshop.png', ''),
(12, 'Adobe Premiere', 'Kursus teknik dasar editing video dengan Adobe Premiere Pro', 'Desain', 100000, 'premiere.png', ''),
(13, 'Adobe Illustrator', 'Kursus dasar Adobe Illustrator hingga membuat gambar', 'Desain', 100000, 'illustrator.png', ''),
(14, 'Home Decoration', 'Kursus membuat dekorasi rumah dengan tangan sendiri (DIY)', 'Lainnya', 25000, 'diy.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`) VALUES
(1, 'Nekomata Okayu', 'admin', 'admin', 1),
(2, 'Inugami Korone', 'user', 'user', 2),
(3, 'john', 'user2', 'user2', 2),
(4, 'John', 'user2', 'user2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
