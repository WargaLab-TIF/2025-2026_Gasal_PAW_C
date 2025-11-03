-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, '1', 'buku', 5000, 25, 1),
(2, '2', 'pensil', 3000, 20, 2),
(3, '3', 'pulpen', 4000, 55, 3),
(4, '4', 'penggaris', 4000, 40, 4),
(5, '5', 'krayon', 18000, 35, 5),
(6, '6', 'jangka', 7500, 100, 6),
(7, '7', 'stabilo', 3500, 120, 7),
(8, '8', 'spidol', 11000, 60, 8),
(9, '9', 'kapur', 2000, 130, 9),
(10, '10', 'map', 8000, 55, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Cintya', 'P', '085805282300', 'Gresik'),
(2, 'Yoga', 'L', '085655543781', 'Banyuwangi'),
(3, 'Tegar', 'L', '085766630242', 'Yogyakarta'),
(4, 'Raehan', 'L', '081515686224', 'Tulungagung'),
(5, 'Della', 'P', '083837253237', 'Bali'),
(6, 'Shilvy', 'P', '085738692081', 'Surabaya'),
(7, 'Fatul', 'P', '085604183247', 'Lamongan'),
(8, 'Khikmal', 'L', '085706357310', 'Lamongan'),
(9, 'Dudit', 'L', '089648740209', 'Lamongan'),
(10, 'Udin', 'L', '087860057238', 'Madura');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') NOT NULL,
  `transaksi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2024-10-18 07:49:33', 85000, 'TUNAI', 1),
(2, '2024-10-19 09:30:58', 110000, 'TUNAI', 2),
(3, '2024-10-19 19:51:36', 50000, 'TUNAI', 3),
(4, '2024-10-20 14:12:19', 94000, 'TRANSFER', 4),
(5, '2024-10-21 16:43:30', 165000, 'EDC', 5),
(6, '2024-10-22 08:55:31', 45000, 'TRANSFER', 6),
(7, '2024-10-23 20:06:10', 56000, 'TUNAI', 7),
(8, '2024-10-24 07:56:57', 105000, 'TRANSFER', 8),
(9, '2024-10-25 09:51:27', 76000, 'TRANSFER', 9),
(10, '2024-10-25 11:38:05', 145000, 'EDC', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT. Maju Bersama', '0123456', 'Surabaya'),
(2, 'PT. Senang Sekali', '081515563', 'Bangkalan'),
(3, 'PT. Segar Segar', '0845454663', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL,
  `pelanggan_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2024-10-18', 'Kebutuhan Kelas', 85000, 1),
(2, '2024-10-19', 'kebutuhan Pribadi', 110000, 2),
(3, '2024-10-19', 'Kebutuhan Kelas', 50000, 3),
(4, '2024-10-20', 'kebutuhan Pribadi', 94000, 4),
(5, '2024-10-21', 'Kebutuhan kelas', 165000, 5),
(6, '2024-10-22', 'Kebutuhan Kelas', 45000, 6),
(7, '2024-10-23', 'Kebutuhan Kelas', 56000, 7),
(8, '2024-10-24', 'kebutuhan Kelas', 105000, 8),
(9, '2024-10-25', 'Kebutuhan Pribadi', 76000, 9),
(10, '2024-10-25', 'Kebutuhan Kelas', 145000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `id` (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `transaksi` (`pelanggan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pembayaran` (`transaksi_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
