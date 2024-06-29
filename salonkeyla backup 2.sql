-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 01:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salonkeyla`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `Id_Detail_Transaksi` int(11) NOT NULL,
  `Id_Transaksi` int(11) DEFAULT NULL,
  `Id_Layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `Id_Karyawan` int(11) NOT NULL,
  `Nama_Karyawan` varchar(50) DEFAULT NULL,
  `Alamat_Karyawan` varchar(50) DEFAULT NULL,
  `Nomor_Telepon_Karyawan` varchar(20) DEFAULT NULL,
  `Id_Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `Id_Layanan` int(11) NOT NULL,
  `Nama_Layanan` varchar(200) DEFAULT NULL,
  `Harga_Layanan` float DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`Id_Layanan`, `Nama_Layanan`, `Harga_Layanan`, `created_at`, `deleted_at`) VALUES
(6, 'sabon', 100000, '2023-11-13', '2023-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_Pelanggan` int(11) NOT NULL,
  `Nama_Pelanggan` varchar(100) DEFAULT NULL,
  `Jenis_Kelamin` varchar(50) DEFAULT NULL,
  `Nomor_Telepon` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `Nama_Pelanggan`, `Jenis_Kelamin`, `Nomor_Telepon`, `created_at`, `deleted_at`) VALUES
(13, 'starboy', 'Pria', '01254548778', '2023-11-14', NULL),
(14, 'devin', 'Wanita', '1234567', '2023-11-14', '2023-11-13 21:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `role` varchar(15) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Id`, `firstname`, `lastname`, `user_name`, `user_email`, `user_password`, `role`, `user_created_at`) VALUES
(6, 'davek', 'nathan', 'karyawan', 'karyawan@gmail.com', '$2y$10$1T7nDpXzT1Wzj21TecIjPOIMOej/X32cm6AVZMQMZgCsOsrirtZie', 'Karyawan', '2023-10-31 11:43:22'),
(12, 'viola', 'gabrie', 'vio', 'viola@gmail.com', '$2y$10$LwdNdRzhQjNF59DSbnG/v.Hq/I8ldz6n8dwwTLTqwnxWfVg.xxTGO', 'admin', '2023-11-07 11:08:37'),
(15, '', '', 'owner', 'owner@gmail.com', '$2y$10$HKgSfmSb/y/qfpO7jUmqkeMUX8Cy.I1YJGBcJ4K1GCje5Nqa6a14q', 'owner', '2023-11-14 13:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `Id_Barang` int(11) NOT NULL,
  `Nama_Barang` varchar(200) DEFAULT NULL,
  `Jumlah_Barang` int(11) DEFAULT NULL,
  `Harga_Barang` float DEFAULT NULL,
  `Gambar` varchar(100) NOT NULL,
  `Id` int(11) NOT NULL,
  `Id_Karyawan` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`Id_Barang`, `Nama_Barang`, `Jumlah_Barang`, `Harga_Barang`, `Gambar`, `Id`, `Id_Karyawan`, `created_at`, `deleted_at`) VALUES
(9, 'shampoo', 3, 20, '1699981828_dd2c02ce9e63f9ef8884.jpg', 0, NULL, '2023-11-14', '0000-00-00'),
(10, 'sabun', 5, 100000, '1699976321_d16c1965b60b3336bda7.jpeg', 0, NULL, '2023-11-14', '0000-00-00'),
(11, 'minyak', 4, 40000, 'default.jpg', 0, NULL, '2023-11-15', '0000-00-00'),
(12, 'dkasdnkas', 23332, 2222, 'default.jpg', 0, NULL, '2023-11-15', '0000-00-00'),
(14, 'lolol', 123, 100000, 'default.jpg', 0, NULL, '2023-11-15', '0000-00-00'),
(17, 'kotak', 3, 105000, 'default.jpg', 0, NULL, '2023-11-18', '0000-00-00'),
(18, 'coba', 1, 1000, 'default.jpg', 0, NULL, '2023-11-18', '2023-11-18'),
(19, 'coba', 1, 1000, 'default.jpg', 0, NULL, '2023-11-18', '2023-11-18'),
(20, 'hot', 6, 20000, 'default.jpg', 0, NULL, '2023-11-18', '2023-11-18'),
(21, 'stop', 232, 200000, 'default.jpg', 0, NULL, '2023-11-18', '2023-11-18'),
(22, 'wht', 23, 211111, 'default.jpg', 0, NULL, '2023-11-18', '0000-00-00'),
(23, 'wht', 23, 211111, 'default.jpg', 0, NULL, '2023-11-18', '0000-00-00'),
(24, 'wht', 23, 211111, 'default.jpg', 0, NULL, '2023-11-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `Id_Transaksi_Keluar` int(11) NOT NULL,
  `Total_Harga` float DEFAULT NULL,
  `Id_Role` int(11) DEFAULT NULL,
  `Id_Barang` int(11) DEFAULT NULL,
  `Tanggal_Transaksi_Keluar` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `Id_Transaksi` int(11) NOT NULL,
  `Nama_Transaksi` varchar(150) DEFAULT NULL,
  `Total_Harga` float DEFAULT NULL,
  `Id_Role` int(11) DEFAULT NULL,
  `Id_Karyawan` int(11) DEFAULT NULL,
  `Id_Pelanggan` int(11) DEFAULT NULL,
  `Id_Barang` int(11) DEFAULT NULL,
  `Tanggal_Transaksi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`Id_Detail_Transaksi`),
  ADD KEY `Id_Transaksi` (`Id_Transaksi`),
  ADD KEY `Id_Layanan` (`Id_Layanan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`Id_Karyawan`),
  ADD KEY `Id_Role` (`Id_Role`),
  ADD KEY `Id_Karyawan` (`Id_Karyawan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`Id_Layanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`Id_Barang`),
  ADD KEY `Id_Karyawan` (`Id_Karyawan`),
  ADD KEY `Id` (`Id`);

--
-- Indexes for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`Id_Transaksi_Keluar`),
  ADD KEY `Id_Role` (`Id_Role`),
  ADD KEY `Id_Barang` (`Id_Barang`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`Id_Transaksi`),
  ADD KEY `Id_Role` (`Id_Role`),
  ADD KEY `Id_Karyawan` (`Id_Karyawan`),
  ADD KEY `Id_Pelanggan` (`Id_Pelanggan`),
  ADD KEY `Id_Barang` (`Id_Barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `Id_Detail_Transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `Id_Karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `Id_Layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_Pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `Id_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  MODIFY `Id_Transaksi_Keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  MODIFY `Id_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`Id_Transaksi`) REFERENCES `transaksi_masuk` (`Id_Transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`Id_Layanan`) REFERENCES `layanan` (`Id_Layanan`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`Id_Role`) REFERENCES `role` (`Id`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`Id_Karyawan`) REFERENCES `karyawan` (`Id_Karyawan`);

--
-- Constraints for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD CONSTRAINT `transaksi_keluar_ibfk_1` FOREIGN KEY (`Id_Role`) REFERENCES `role` (`Id`),
  ADD CONSTRAINT `transaksi_keluar_ibfk_2` FOREIGN KEY (`Id_Barang`) REFERENCES `stok` (`Id_Barang`);

--
-- Constraints for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD CONSTRAINT `transaksi_masuk_ibfk_1` FOREIGN KEY (`Id_Role`) REFERENCES `role` (`Id`),
  ADD CONSTRAINT `transaksi_masuk_ibfk_2` FOREIGN KEY (`Id_Karyawan`) REFERENCES `karyawan` (`Id_Karyawan`),
  ADD CONSTRAINT `transaksi_masuk_ibfk_3` FOREIGN KEY (`Id_Pelanggan`) REFERENCES `pelanggan` (`Id_Pelanggan`),
  ADD CONSTRAINT `transaksi_masuk_ibfk_4` FOREIGN KEY (`Id_Barang`) REFERENCES `stok` (`Id_Barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
