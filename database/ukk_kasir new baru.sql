-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 09:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `TanggalPenjualan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `TanggalPenjualan`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES
(59, '2024-02-26 07:45:43', 36, 7, 5, '25000.00'),
(60, '2024-02-26 07:45:49', 36, 8, 100, '500000.00'),
(67, '2024-02-25 12:13:54', 37, 7, 2, '10000.00'),
(68, '2024-02-26 05:40:39', 39, 11, 5, '25000.00'),
(69, '2024-02-26 03:51:48', 39, 7, 3, '15000.00'),
(70, '2024-02-26 04:10:40', 0, 10, 2, '5000000.00'),
(71, '2024-02-26 06:05:17', 38, 8, 2, '10000.00'),
(72, '2024-02-26 06:03:58', 38, 10, 2, '5000000.00'),
(73, '2024-02-26 06:11:01', 38, 7, 2, '10000.00'),
(74, '2024-02-26 06:32:47', 38, 11, 1, '0.00'),
(75, '2024-02-26 06:38:34', 40, 7, 2, '10000.00'),
(76, '2024-02-26 06:44:17', 0, 7, 2, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `IDMasuk` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `TanggalMasuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`IDMasuk`, `ProdukID`, `JumlahProduk`, `TanggalMasuk`) VALUES
(10, 2, 5, '2024-01-26 12:02:13'),
(31, 7, 12, '2024-02-18 12:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
(3, 'hasan', 'kangkung1', 8237787),
(8, 'pak agus', 'kendal', 5245686),
(9, 'pak agus', 'kendal', 5245686),
(10, 'pak agus', 'kendal', 5245686);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(36, '2024-02-26 07:45:54', '525000.00', 3),
(37, '2024-02-25 12:14:06', '10000.00', 6),
(38, '2024-02-26 03:47:43', '0.00', 3),
(39, '2024-02-26 03:51:54', '25000.00', 9),
(40, '2024-02-26 06:38:39', '10000.00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `Deskripsi`) VALUES
(7, 'Bola', '5000.00', 1, 'Kertas2'),
(8, 'hp', '5000.00', 5, 'iphone'),
(10, 'laptop', '2500000.00', 6, 'Lenovo'),
(11, 'Gunting', '5000.00', 14, 'Kertas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `TransaksiID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `TanggalTransaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UangPembayaran` decimal(10,2) NOT NULL,
  `Kembalian` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`TransaksiID`, `ProdukID`, `JumlahProduk`, `TotalHarga`, `TanggalTransaksi`, `UangPembayaran`, `Kembalian`) VALUES
(1, 7, 2, '10000.00', '2024-02-26 06:01:31', '0.00', '0.00'),
(6, 7, 2, '10000.00', '2024-02-26 06:26:24', '0.00', '0.00'),
(7, 7, 2, '10000.00', '2024-02-26 06:28:11', '0.00', '0.00'),
(8, 7, 2, '10000.00', '2024-02-26 06:30:00', '0.00', '0.00'),
(9, 8, 2, '10000.00', '2024-02-26 06:48:55', '20.00', '-9980.00'),
(10, 8, 1, '5000.00', '2024-02-26 08:11:35', '2000000.00', '1995000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `username`, `password`, `nama`, `level`, `gambar`) VALUES
(1, 'admin', '123', 'hasan', 'admin', ''),
(3, 'petugas', '123', 'petugas', 'petugas', ''),
(4, 'admin1', '123', 'admin10', 'admin', ''),
(11, 'irfan', '123', 'irfan', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`),
  ADD KEY `PenjualanID` (`PenjualanID`),
  ADD KEY `ProdukID` (`ProdukID`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`IDMasuk`),
  ADD KEY `ProdukID` (`ProdukID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `PelangganID` (`PelangganID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`TransaksiID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `IDMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `TransaksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
