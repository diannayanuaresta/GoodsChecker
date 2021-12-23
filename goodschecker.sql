-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2021 pada 07.25
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

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
-- Struktur dari tabel `barang_in`
--

CREATE TABLE `barang_in` (
  `id` int(11) NOT NULL,
  `kode_barang` enum('bahan mentah','barang jadi') NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_in`
--

INSERT INTO `barang_in` (`id`, `kode_barang`, `nama_barang`, `price`, `quantity`, `keterangan`, `created_at`, `updated_at`) VALUES
(14, 'bahan mentah', 'Rotan Class A', 2000000, 11000, 'Pembelian Bahan kursi tamu', '2021-12-23 04:25:17', '2021-12-23 05:28:12'),
(17, 'bahan mentah', 'Mahoni Class C', 2500000, 200, 'Pembelian bahan mentah untuk produksi pintu dibeli dari Toko Pak Syamsudin', '2021-12-23 05:57:55', '2021-12-23 06:01:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_out`
--

CREATE TABLE `barang_out` (
  `id` int(11) NOT NULL,
  `kode_barang` enum('bahan mentah','produk jadi') NOT NULL,
  `nama_barang` varchar(64) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_out`
--

INSERT INTO `barang_out` (`id`, `kode_barang`, `nama_barang`, `price`, `quantity`, `keterangan`, `created_at`) VALUES
(20, 'bahan mentah', 'Mahoni Class C', 2500000, 50, 'Retur Pembelian karena bahan rusak, tidak bisa digunakan untuk produksi', '2021-12-23');

--
-- Trigger `barang_out`
--
DELIMITER $$
CREATE TRIGGER `tr_barang_in` BEFORE DELETE ON `barang_out` FOR EACH ROW begin
UPDATE barang_in
SET quantity = quantity + OLD.quantity WHERE
nama_barang = OLD.nama_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_barang_out` AFTER INSERT ON `barang_out` FOR EACH ROW begin
UPDATE barang_in SET quantity = quantity - NEW.quantity WHERE nama_barang = NEW.nama_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_in`
--
ALTER TABLE `barang_in`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `barang_out`
--
ALTER TABLE `barang_out`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_in`
--
ALTER TABLE `barang_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `barang_out`
--
ALTER TABLE `barang_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
