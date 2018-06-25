-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 06:43 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `air_minum`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `no_kk` int(25) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telphone_hp` int(15) NOT NULL,
  `nomor_telphone_rumah` int(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `status_anggota` enum('Sudah Menikah','Belum Menikah','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `no_kk`, `alamat`, `nomor_telphone_hp`, `nomor_telphone_rumah`, `nama_lengkap`, `status_anggota`) VALUES
(1, 1112223555, 'Bekasi', 2147483647, 21000000, 'Isaac Muhammad', 'Sudah Menikah'),
(3, 1113332224, 'Bekasi', 2147483647, 21222222, 'Hafiz Abdurrahman Syah', 'Sudah Menikah'),
(4, 123456789, 'Sukoharjo', 2147483647, 271999999, 'Aulia Dyah Ayu Nugrahani', 'Sudah Menikah'),
(5, 1234567890, 'Blora', 2147483647, 296123456, 'Tajudda Adi Negara', 'Sudah Menikah'),
(6, 987654321, 'Pati', 2147483647, 295123321, 'Helena Nooraini', 'Belum Menikah'),
(7, 123123123, 'Kediri', 2147483647, 354123456, 'Agung Prasetyo', 'Belum Menikah'),
(8, 1000000002, 'Klaten', 2147483647, 271728728, 'Muhammad Alif Wisnu Murti', 'Belum Menikah'),
(9, 1000000001, 'Boyolali', 2147483647, 276000000, 'Arif Satria', 'Belum Menikah'),
(10, 2147483647, 'Solo', 897654321, 271999123, 'Alim Wicaksono', 'Belum Menikah'),
(11, 2147483647, 'Karanganyar', 2147483647, 271555555, 'Uzy Bela Puspita', 'Belum Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_tarif`
--

CREATE TABLE `konfigurasi_tarif` (
  `id_kon_tarif` int(11) NOT NULL,
  `batas_bawah_kubik` int(11) NOT NULL,
  `batas_atas_kubik` int(11) NOT NULL,
  `harga_satuan_per_kubik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_transaksi`
--

CREATE TABLE `master_transaksi` (
  `Id_mst_transaksi` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `tanggal_generate` date NOT NULL,
  `Periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_transaksi`
--

INSERT INTO `master_transaksi` (`Id_mst_transaksi`, `id_operator`, `tanggal_generate`, `Periode`) VALUES
(2, 1, '2018-04-10', '2018-05-01'),
(3, 1, '2018-03-20', '2018-04-01'),
(4, 1, '2018-05-16', '2018-06-01'),
(5, 1, '2018-01-10', '2018-02-01'),
(6, 1, '2018-02-14', '2018-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'arief13', '123456', 'Achmad Arief');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_trx_dtl` int(11) NOT NULL,
  `id_trx_mst` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah_bulan_lalu` int(11) NOT NULL,
  `jumlah_bulan_ini` int(11) NOT NULL,
  `harga_satuan_per_kubik` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status_bayar` enum('Sudah Bayar','Belum Bayar') NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_trx_dtl`, `id_trx_mst`, `id_anggota`, `jumlah_bulan_lalu`, `jumlah_bulan_ini`, `harga_satuan_per_kubik`, `tanggal_bayar`, `status_bayar`, `jumlah_bayar`) VALUES
(101, 2, 1, 46900, 52800, 350, '2018-06-02', 'Belum Bayar', 50000),
(102, 3, 3, 37000, 45800, 350, '2018-05-17', 'Sudah Bayar', 45800),
(103, 3, 4, 45600, 57300, 350, '2018-05-08', 'Sudah Bayar', 57300),
(104, 3, 6, 45000, 54600, 350, '2018-05-17', 'Sudah Bayar', 54600),
(105, 4, 5, 56000, 64500, 350, '2018-06-05', 'Belum Bayar', 55000),
(106, 4, 7, 54700, 59600, 350, '2018-06-03', 'Belum Bayar', 56000),
(107, 5, 8, 43000, 44600, 350, '2018-05-23', 'Sudah Bayar', 44600),
(108, 5, 9, 34900, 48000, 350, '2018-06-06', 'Belum Bayar', 40000),
(109, 6, 11, 45000, 52900, 350, '2018-05-20', 'Sudah Bayar', 52900),
(110, 2, 10, 39000, 46700, 350, '2018-05-17', 'Sudah Bayar', 46700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `konfigurasi_tarif`
--
ALTER TABLE `konfigurasi_tarif`
  ADD PRIMARY KEY (`id_kon_tarif`);

--
-- Indexes for table `master_transaksi`
--
ALTER TABLE `master_transaksi`
  ADD PRIMARY KEY (`Id_mst_transaksi`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_trx_dtl`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_trx_mst` (`id_trx_mst`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfigurasi_tarif`
--
ALTER TABLE `konfigurasi_tarif`
  MODIFY `id_kon_tarif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_transaksi`
--
ALTER TABLE `master_transaksi`
  MODIFY `Id_mst_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_trx_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_transaksi`
--
ALTER TABLE `master_transaksi`
  ADD CONSTRAINT `master_transaksi_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `transaksi_detail_ibfk_3` FOREIGN KEY (`id_trx_mst`) REFERENCES `master_transaksi` (`Id_mst_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
