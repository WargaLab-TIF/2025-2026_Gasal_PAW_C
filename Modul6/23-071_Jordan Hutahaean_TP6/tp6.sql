-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2024 pada 09.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `nama_supplier`) VALUES
(1, 'BRG001', 'Beras Premium', 100000, 50, 'PT. Sumber Berkah'),
(2, 'BRG002', 'Minyak Goreng', 30000, 200, 'CV. Maju Jaya'),
(3, 'BRG003', 'Gula Pasir', 15000, 150, 'PT. Sumber Berkah'),
(4, 'BRG004', 'Tepung Terigu', 12000, 100, 'CV. Maju Jaya'),
(5, 'BRG005', 'Telur Ayam', 25000, 200, 'PT. Agro Lestari'),
(6, 'BRG006', 'Daging Sapi', 120000, 20, 'UD. Sumber Makmur'),
(7, 'BRG007', 'Susu Cair', 15000, 50, 'CV. Sentosa Abadi'),
(8, 'BRG008', 'Kopi Bubuk', 35000, 80, 'PT. Agro Lestari'),
(9, 'BRG009', 'Gula Merah', 20000, 60, 'CV. Maju Jaya'),
(10, 'BRG010', 'Tepung Maizena', 18000, 70, 'CV. Sentosa Abadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'Budi Santoso', 'Jl. Merdeka No. 10', '081234567890'),
(2, 'Rina Agustina', 'Jl. Kemerdekaan No. 15', '081234567891'),
(3, 'Joko Purwanto', 'Jl. Proklamasi No. 20', '081234567892'),
(4, 'Dewi Kurniasih', 'Jl. Pahlawan No. 25', '081234567893'),
(5, 'Agus Supriyadi', 'Jl. Veteran No. 30', '081234567894'),
(6, 'Siti Fadilah', 'Jl. Diponegoro No. 35', '081234567895'),
(7, 'Ahmad Rafi', 'Jl. Gajah Mada No. 40', '081234567896');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) DEFAULT 0,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2024-10-22', 'Pembelian bahan pokok', 305000, 1),
(2, '2024-10-23', 'Pembelian minyak goreng', 90000, 2),
(3, '2024-10-23', 'Pembelian beras dan gula', 130000, 3),
(4, '2024-10-23', 'Pembelian telur', 36000, 4),
(5, '2024-10-24', 'Pembelian daging sapi', 280000, 5),
(6, '2024-10-24', 'Pembelian susu dan kopi', 140000, 6),
(7, '2024-10-24', 'Pembelian gula merah', 90000, 7),
(8, '2024-11-07', 'beli sesuatu', 500000, 4),
(9, '2024-11-07', '-   ', 150000, 2),
(10, '2024-11-07', '-   ', 300000, 1),
(11, '2024-11-07', '-   ', 30000, 1),
(12, '2024-11-07', 'untuk kubutuhan dirumah', 500000, 3),
(13, '2024-11-07', '-   ', 54000, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `barang_id`, `qty`, `harga`) VALUES
(1, 1, 1, 2, 200000),
(2, 1, 3, 3, 45000),
(3, 2, 2, 3, 90000),
(4, 3, 5, 4, 100000),
(5, 4, 6, 2, 240000),
(6, 5, 7, 2, 30000),
(7, 5, 8, 1, 35000),
(8, 6, 9, 3, 60000),
(9, 7, 10, 5, 90000),
(10, 1, 7, 4, 60000),
(11, 11, 7, 2, 30000),
(12, 9, 2, 5, 150000),
(13, 12, 1, 5, 500000),
(14, 8, 1, 5, 500000),
(15, 10, 1, 3, 300000),
(16, 13, 10, 3, 54000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
