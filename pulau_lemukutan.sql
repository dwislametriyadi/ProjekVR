-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 10:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulau_lemukutan`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk_wisata`
--

CREATE TABLE `produk_wisata` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_wisata`
--

INSERT INTO `produk_wisata` (`id_produk`, `nama_produk`, `deskripsi_produk`, `gambar_produk`) VALUES
(24, 'Manisan Pala', 'Manisa Pala merupakan jajanan Khas Desa Pulau Lemukutan, Bahan Dasarnya ialah Kulit Buah Pala. ada beberapa Jenis Olahan diantaranya, yang kering dan basah.', '176-pw-1.jpg'),
(25, 'Dodol Rumput Laut', 'Olahan Rumput Laut sangatlah berfariasi, ada yang di bikin dodol, Manisan, sampai dengan Stik dan pangsit', '906-pw-2.jpg'),
(26, 'Manisan Rumput laut ', 'Manisan Rumput laut ialah jajanan yang terbuat dari rumput laut', '979-pw-3.jpg'),
(27, 'ikan asin', 'Ikan Asin merupakan Oleh-oleh yang harus dibawa oleh wisatawan, karena dibuat dengan cara yang alami oleh masyarakat', '566-pw-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(18, 'Dwi Slamet Riyadi', 'admin', '123', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk_wisata`
--
ALTER TABLE `produk_wisata`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk_wisata`
--
ALTER TABLE `produk_wisata`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
