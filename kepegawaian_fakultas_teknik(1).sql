-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 04:47 AM
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
-- Database: `kepegawaian_fakultas_teknik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`, `keterangan`) VALUES
(1, 'Administrasi', 'Mengelola administrasi fakultas'),
(2, 'Laboratorium', 'Pengelola alat dan bahan lab');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `golongan` varchar(10) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nip`, `jabatan`, `golongan`, `tgl_masuk`, `id_bagian`) VALUES
(1, 'Budi Santoso', '198704102022031001', 'Staf Administrasi', 'IIIa', '2022-03-01', 1),
(2, 'Siti Aminah', '198912052020012002', 'Teknisi Lab', 'IIb', '2020-01-12', 2),
(3, 'Arif Prayoga', '198704102022031003', 'CEO', 'SSS', '2010-07-27', 1),
(4, 'Sirotol', '198704102022031009', 'Tukang Bangunan', 'ZZZZ', '2025-06-10', 2),
(5, 'topik', '198704102022031007', 'Kang Rusuh', 'CCCC', '2025-01-08', 2),
(6, 'ANDRA', '198704102022031006', 'Kang Cebok', 'JJJJ', '2025-06-14', 1),
(7, 'ujang', '198704102022031005', 'Kang pacaran', 'EEEE', '2025-06-22', 1),
(8, 'kanaan', '1989010120220020', 'Anak Buangan', 'cccccc', '2025-06-26', 1),
(9, 'Manusia', '1989010120220019', 'Juru Parkir', 'tttt', '2025-06-17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id_riwayat` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `jabatan_sebelumnya` varchar(50) DEFAULT NULL,
  `jabatan_sekarang` varchar(50) DEFAULT NULL,
  `tanggal_promosi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`id_riwayat`, `id_pegawai`, `jabatan_sebelumnya`, `jabatan_sekarang`, `tanggal_promosi`) VALUES
(1, 1, 'Staf Magang', 'Staf Administrasi', '2022-03-01'),
(2, 2, 'Asisten Lab', 'Teknisi Lab', '2020-01-12'),
(3, 3, 'Tukang Sampah', 'CEO', '2009-12-27'),
(4, 5, 'Manager', 'Staff Laboratorium', '2025-01-18'),
(5, 6, 'Kang Cebok', 'Asisten Kang Cebok', '2025-06-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`);

--
-- Constraints for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `riwayat_jabatan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
