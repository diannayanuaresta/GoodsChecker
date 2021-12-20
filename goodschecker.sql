-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 08:34 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodschecker`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_in`
--

CREATE TABLE `barang_in` (
  `id` int(11) NOT NULL,
  `kode_barang` enum('bahan mentah','barang jadi') NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_in`
--

INSERT INTO `barang_in` (`id`, `kode_barang`, `nama_barang`, `price`, `quantity`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'bahan mentah', 'kayu jati', 1000000, 75, 'pembelian bahan mentah langsung dari perhutani', '0000-00-00', '0000-00-00'),
(4, 'bahan mentah', 'rotan premium', 1500000, 100, 'pembelian bahan kursi kursi rotan', '0000-00-00', '0000-00-00'),
(5, 'bahan mentah', 'kayu rotan', 2000000, 150, 'bahan mentah kursi ruang tengah', '0000-00-00', '0000-00-00'),
(6, 'bahan mentah', 'kayu mahoni class b', 10000000, 300, 'keperluan bahan pembuatan lemari pesanan hj. udin', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_out`
--

CREATE TABLE `barang_out` (
  `id` int(11) NOT NULL,
  `kode_barang` enum('bahan mentah','produk jadi') NOT NULL,
  `nama_barang` varchar(64) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_out`
--

INSERT INTO `barang_out` (`id`, `kode_barang`, `nama_barang`, `price`, `quantity`, `keterangan`, `created_at`, `updated_at`) VALUES
(13, 'bahan mentah', 'kayu mahoni class b', 10000000, 200, 'keperluan bahan pembuatan lemari pesanan hj. udin', '0000-00-00', '0000-00-00'),
(14, 'bahan mentah', 'kayu rotan', 2000000, 50, 'produksi kursi ruang tengah', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_in`
--
ALTER TABLE `barang_in`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `barang_out`
--
ALTER TABLE `barang_out`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_in`
--
ALTER TABLE `barang_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_out`
--
ALTER TABLE `barang_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
