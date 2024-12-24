-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(225) DEFAULT NULL,
  `buku_tersisa` int(11) DEFAULT NULL,
  `keterangan` varchar(225) DEFAULT NULL,
  `id_buku` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `buku_tersisa`, `keterangan`, `id_buku`) VALUES
(1, 'Buku Codingan', 0, 'kosong', 'BK_H1'),
(2, 'Buku Dongeng', 10, 'Tersedia', 'BK_H2'),
(3, 'Buku Matematika', 10, 'Tersedia', 'BK_H3'),
(4, 'Buku Pelajaran', 9, 'Tersedia', 'BK_H4'),
(5, 'Buku Pelatihan', 10, 'Tersedia', 'BK_H5'),
(6, 'Buku Pemograman', 5, 'Tersedia', 'BK_H6');

-- --------------------------------------------------------

--
-- Table structure for table `buku_pengembalian`
--

CREATE TABLE `buku_pengembalian` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(255) DEFAULT NULL,
  `id_buku` varchar(50) DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku_yang_dipinjam`
--

CREATE TABLE `buku_yang_dipinjam` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `buku_tersisa` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  `tanggal_peminjaman` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kembalikan`
--

CREATE TABLE `riwayat_kembalikan` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(225) DEFAULT NULL,
  `nama_buku` varchar(225) DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_kembalikan`
--

INSERT INTO `riwayat_kembalikan` (`id`, `id_buku`, `nama_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES
(1, 'BK_H5', 'Buku Pelatihan', '2024-08-15', '2024-08-15'),
(2, 'BK_H4', 'Buku Pelajaran', '2024-08-15', '2024-08-15'),
(3, 'BK_H5', 'Buku Pelatihan', '2024-08-15', '2024-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pinjam`
--

CREATE TABLE `riwayat_pinjam` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(50) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `buku_tersisa` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pinjam`
--

INSERT INTO `riwayat_pinjam` (`id`, `id_buku`, `nama_buku`, `buku_tersisa`, `tanggal_peminjaman`) VALUES
(1, 'BK_H5', 'Buku Pelatihan', 1, '2024-08-15'),
(2, 'BK_H4', 'Buku Pelajaran', 1, '2024-08-15'),
(3, 'BK_H5', 'Buku Pelatihan', 1, '2024-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'arya', 'intern1@gmail.com', '$2y$10$zRc/HVoYSU50dQHjuNCTEeT0zj9CstMZzbDr008LXPA9wSpHj7Lge', '2024-08-15 10:48:27'),
(2, 'Fikri arya khairulloh', 'fikri@gmail.com', '$2y$10$x3dmnpZrQR0dEs63KTOGIexQBT/ez8RmKMFREdTUKE03lOaXMpZkC', '2024-08-15 12:57:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_buku` (`id_buku`);

--
-- Indexes for table `buku_pengembalian`
--
ALTER TABLE `buku_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_yang_dipinjam`
--
ALTER TABLE `buku_yang_dipinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_kembalikan`
--
ALTER TABLE `riwayat_kembalikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `buku_pengembalian`
--
ALTER TABLE `buku_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_yang_dipinjam`
--
ALTER TABLE `buku_yang_dipinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `riwayat_kembalikan`
--
ALTER TABLE `riwayat_kembalikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat_kembalikan`
--
ALTER TABLE `riwayat_kembalikan`
  ADD CONSTRAINT `riwayat_kembalikan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
