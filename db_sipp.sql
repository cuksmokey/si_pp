-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 04:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `id` int(11) NOT NULL,
  `id_m_barang_plus` int(11) NOT NULL,
  `id_m_nota` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `nama_barang` varchar(99) DEFAULT NULL,
  `merek` varchar(99) DEFAULT NULL,
  `spesifikasi` varchar(99) DEFAULT NULL,
  `qty` int(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id`, `id_m_barang_plus`, `id_m_nota`, `tgl`, `kode_barang`, `nama_barang`, `merek`, `spesifikasi`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(13, 34, 29, '2020-08-05', '01/A', 'A', 'A', 'A', 20, '2020-07-27 03:50:32', 'developer', '2020-08-26 19:18:11', 'superadmin'),
(14, 35, 29, '2020-08-01', 'AD122/EDASGF1', 'ASF', 'FAF', 'EASG', 100, '2020-08-01 02:10:48', 'superadmin', '2020-08-01 02:10:48', NULL),
(15, 37, 29, '2020-08-01', '122SA/ASHDFJKA22', 'ASFA', 'SAF', 'ADSGAS', 150, '2020-08-01 02:11:15', 'superadmin', '2020-09-24 03:33:42', 'developer'),
(16, 38, 30, '2020-08-27', '00002/BKB', 'BBNM', 'BBMM', 'BBSS', 20, '2020-08-27 07:20:42', 'superadmin', '2020-08-27 07:20:42', NULL),
(17, 42, 29, '2020-09-17', '11111/TESTKDB', 'TESTNM', 'TESTMM', 'TESTSS', 400, '2020-09-17 01:40:03', 'developer', '2020-09-17 01:41:08', 'developer'),
(18, 43, 30, '2020-09-17', '32532/DSAGDS', 'SDF', 'SDFSD', 'SD', 50, '2020-09-17 06:38:15', 'developer', '2020-09-17 06:38:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang_plus`
--

CREATE TABLE `m_barang_plus` (
  `id` int(11) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `id_m_barang` int(11) NOT NULL,
  `qty_plus` int(11) DEFAULT NULL,
  `qty_ket` varchar(99) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang_plus`
--

INSERT INTO `m_barang_plus` (`id`, `tgl_bayar`, `id_m_barang`, `qty_plus`, `qty_ket`, `harga`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(33, '2020-07-27', 13, 10, 'PCS', 10000, 'Cash', '2020-07-27 03:50:32', 'developer', '2020-07-27 03:50:32', NULL),
(34, '2020-08-03', 13, 100, 'PCS', 100000, 'Kredit', '2020-07-27 03:50:57', 'developer', '2020-08-26 19:18:11', 'superadmin'),
(35, '2020-08-01', 14, 100, 'PCS', 100000, 'Cash', '2020-08-01 02:10:48', 'superadmin', '2020-08-01 02:10:48', NULL),
(36, '2020-08-08', 15, 100, 'PCS', 50000, 'Kredit', '2020-08-01 02:11:15', 'superadmin', '2020-08-01 02:11:15', NULL),
(37, '2020-08-15', 15, 100, 'PCS', 150000, 'Kredit', '2020-08-15 04:06:48', 'developer', '2020-09-24 03:33:42', 'developer'),
(38, '2020-08-27', 16, 50, 'PCS', 500000, 'Cash', '2020-08-27 07:20:42', 'superadmin', '2020-08-27 07:20:42', NULL),
(39, '2020-09-10', 17, 100, 'PCS', 1000000, 'Kredit', '2020-09-17 01:40:03', 'developer', '2020-09-17 01:40:03', NULL),
(40, '2020-09-17', 17, 100, 'PCS', 1000000, 'Kredit', '2020-09-17 01:40:18', 'developer', '2020-09-17 01:40:18', NULL),
(41, '2020-09-17', 17, 100, 'PCS', 1000000, 'Cash', '2020-09-17 01:40:34', 'developer', '2020-09-17 01:40:34', NULL),
(42, '2020-09-24', 17, 100, 'PCS', 1000000, 'Kredit', '2020-09-17 01:41:08', 'developer', '2020-09-17 01:41:08', NULL),
(43, '2020-09-17', 18, 50, 'PCS', 500000, 'Cash', '2020-09-17 06:38:15', 'developer', '2020-09-17 06:38:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_invoice`
--

CREATE TABLE `m_invoice` (
  `id` int(11) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `tgl_jt` date DEFAULT NULL,
  `no_nota` varchar(99) NOT NULL,
  `no_faktur` varchar(99) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `tgl_byr` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_invoice`
--

INSERT INTO `m_invoice` (`id`, `id_pl`, `tgl_jt`, `no_nota`, `no_faktur`, `ongkir`, `tgl_byr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(12, 6, '2020-09-24', 'NN33', 'FF33', 10000, '2020-09-01', '2020-09-24 13:24:24', 'developer', '0000-00-00 00:00:00', NULL),
(13, 12, '2020-09-24', 'NN11', 'FF11', 35000, '2020-09-24', '2020-09-24 13:26:24', 'developer', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_nota`
--

CREATE TABLE `m_nota` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `no_nota` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_nota`
--

INSERT INTO `m_nota` (`id`, `id_supplier`, `no_nota`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(29, 20, '1', '2020-07-27 03:50:04', 'developer', '0000-00-00 00:00:00', NULL),
(30, 21, '2', '2020-08-27 07:19:14', 'superadmin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_perusahaan`
--

CREATE TABLE `m_perusahaan` (
  `id` int(11) NOT NULL,
  `pimpinan` varchar(90) DEFAULT NULL,
  `nm_perusahaan` varchar(90) DEFAULT NULL,
  `alamat` text,
  `npwp` varchar(99) DEFAULT NULL,
  `no_telp` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(90) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_perusahaan`
--

INSERT INTO `m_perusahaan` (`id`, `pimpinan`, `nm_perusahaan`, `alamat`, `npwp`, `no_telp`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(28, ' Pimpinan', 'Nama Perusahaan', 'Ini Alamat Ynag Lengkap Ini Alamat Ynag Lengkap Ini Alamat Ynag Lengkap', '1111111111', '0811111111', '2020-07-27 03:49:51', 'developer', '2020-08-01 03:17:09', 'superadmin'),
(29, '2', '2', '2', '2', '2', '2020-08-13 04:28:29', 'superadmin', '2020-08-13 04:28:29', NULL),
(30, 'Pimpinan Tiga', 'Per Tiga', 'Alamat Tiga Alamat Tiga Alamat Tiga Alamat Tiga', '3', '333333333333', '2020-08-13 04:28:43', 'superadmin', '2020-08-13 04:28:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_pl_list_barang`
--

CREATE TABLE `m_pl_list_barang` (
  `id` int(11) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `id_m_barang` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `qty_ket` varchar(99) DEFAULT NULL,
  `harga_invoice` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pl_list_barang`
--

INSERT INTO `m_pl_list_barang` (`id`, `id_pl`, `id_m_barang`, `tgl`, `qty`, `qty_ket`, `harga_invoice`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, 4, 13, '2020-07-27', 10, 'PCS', 0, '2020-07-27 04:06:22', 'superadmin', '0000-00-00 00:00:00', NULL),
(9, 6, 13, '2020-08-12', 50, 'PCS', 50000, '2020-08-12 06:23:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(10, 6, 15, '2020-08-12', 40, 'PCS', 40000, '2020-08-12 06:23:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(11, 7, 13, '2020-08-13', 10, 'PCS', 0, '2020-08-13 04:33:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(12, 7, 15, '2020-08-13', 10, 'PCS', 0, '2020-08-13 04:33:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(13, 8, 13, '2020-08-15', 20, 'PCS', 0, '2020-08-15 03:42:13', 'developer', '0000-00-00 00:00:00', NULL),
(17, 12, 16, '2020-09-11', 30, 'PCS', 60000, '2020-09-11 02:09:40', 'superadmin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_pl_price_list`
--

CREATE TABLE `m_pl_price_list` (
  `id` int(11) NOT NULL,
  `id_m_perusahaan` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `no_surat` varchar(99) NOT NULL,
  `no_so` varchar(99) NOT NULL,
  `no_po` varchar(99) NOT NULL,
  `up` varchar(99) DEFAULT NULL,
  `laporan` varchar(3) DEFAULT NULL,
  `cek_po` int(1) DEFAULT '0',
  `cek_inv` int(1) DEFAULT '0',
  `data_inv` int(1) DEFAULT '0',
  `tgl_ctk` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pl_price_list`
--

INSERT INTO `m_pl_price_list` (`id`, `id_m_perusahaan`, `tgl`, `no_surat`, `no_so`, `no_po`, `up`, `laporan`, `cek_po`, `cek_inv`, `data_inv`, `tgl_ctk`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, 28, '2020-09-11', '0001/SJ/SMA/IX 20', 'A', 'A', 'AAAA', 'sma', 0, 0, 0, NULL, '2020-07-27 04:06:22', 'superadmin', '0000-00-00 00:00:00', NULL),
(6, 30, '2020-09-11', '0002/SJ/SMA/IX 20', '123', '21312', 'AAAA', 'sma', 0, 1, 1, '2020-09-30', '2020-08-12 06:23:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(7, 28, '2020-09-11', '0001/SJ/ST/IX 20', '4', '4', 'AAAA', 'st', 0, 0, 0, NULL, '2020-08-13 04:33:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(8, 28, '2020-09-11', '0002/SJ/ST/IX 20', 'UP', 'UP', 'AAAA', 'st', 0, 0, 0, NULL, '2020-08-15 03:42:13', 'developer', '0000-00-00 00:00:00', NULL),
(12, 28, '2020-09-11', '0003/SJ/ST/IX 20', 'ASFSA', 'FSAF', 'ASFSA', 'st', 0, 1, 1, '2020-09-24', '2020-09-11 02:09:40', 'superadmin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_price_list`
--

CREATE TABLE `m_price_list` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_m_barang` int(11) NOT NULL,
  `id_m_supplier` int(11) NOT NULL,
  `harga_price_list` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`id`, `nama_supplier`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(20, 'A', '2020-07-27 03:49:57', 'developer', '0000-00-00 00:00:00', NULL),
(21, 'B', '2020-08-27 07:18:37', 'superadmin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nm_user` varchar(99) DEFAULT NULL,
  `level` enum('Developer','SuperAdmin','Admin','User') DEFAULT NULL,
  `otoritas` enum('Pembelian','Penjualan') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nm_user`, `level`, `otoritas`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Biasa', 'Admin', 'Penjualan', '2020-07-10 13:51:57', NULL, '0000-00-00 00:00:00', NULL),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User Biasa', 'User', 'Pembelian', '2020-07-10 13:51:57', NULL, '2020-07-26 19:01:29', 'developer'),
(3, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Admin Super', 'SuperAdmin', 'Pembelian', '2020-07-10 13:51:57', NULL, '2020-09-24 01:25:58', 'superadmin'),
(4, 'developer', '5e8edd851d2fdfbd7415232c67367cc3', 'Dev Ganteng', 'Developer', 'Penjualan', '2020-07-10 13:51:57', NULL, '2020-09-24 01:23:53', 'developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`,`kode_barang`);

--
-- Indexes for table `m_barang_plus`
--
ALTER TABLE `m_barang_plus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_invoice`
--
ALTER TABLE `m_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_nota`
--
ALTER TABLE `m_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_price_list`
--
ALTER TABLE `m_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_barang_plus`
--
ALTER TABLE `m_barang_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `m_invoice`
--
ALTER TABLE `m_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_nota`
--
ALTER TABLE `m_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
