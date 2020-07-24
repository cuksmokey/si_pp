-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 06:01 PM
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
(6, 18, 21, '2020-07-01', '01/KD1', 'NAMA BARANG SATU', 'MEREK SATU', 'SPESIFIKASI SATU', 30, '2020-07-23 14:06:37', 'developer', '2020-07-23 03:22:57', 'developer'),
(7, 20, 26, '2020-07-23', '213/KDKD99', 'NAMA CUY', 'MEREK CUY', 'SPEC CUY', 50, '2020-07-23 15:24:21', 'developer', '2020-07-23 03:27:39', 'developer'),
(8, 23, 26, '2020-07-01', '01/KDPPI1', 'PPI NM SATU', 'PPI MR SATU', 'PPI SS SATU', 150, '2020-07-24 12:05:09', 'developer', '2020-07-24 00:09:13', 'superadmin'),
(9, 24, 22, '2020-07-24', '02/SNAKNDA1', 'ASJKLJNF', 'NSFAJKFN', 'NASJKFNA', 500, '2020-07-24 12:10:02', 'superadmin', '2020-07-24 12:10:02', NULL),
(10, 26, 21, '2020-07-24', '99/ZZZZ', 'RA JELAS', 'ANJAY', 'OKEY', 300, '2020-07-24 14:30:46', 'developer', '2020-07-24 03:53:57', 'developer');

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
(12, '2020-07-01', 6, 10, 'PCS', 10000, 'Cash', '2020-07-23 14:06:37', 'developer', '2020-07-23 14:06:37', NULL),
(13, '2020-07-02', 6, 10, 'PCS', 10000, 'Cash', '2020-07-23 14:18:46', 'developer', '2020-07-23 14:18:46', NULL),
(14, '2020-07-03', 6, 10, 'Batang', 100000, 'Cash', '2020-07-23 14:19:03', 'developer', '2020-07-23 14:19:03', NULL),
(15, '2020-07-04', 6, 10, 'PCS', 100000, 'Cash', '2020-07-23 14:19:20', 'developer', '2020-07-23 14:19:20', NULL),
(16, '2020-07-05', 6, 10, 'PCS', 20000, 'Cash', '2020-07-23 14:26:04', 'developer', '2020-07-23 14:26:04', NULL),
(17, '2020-07-06', 6, 20, 'Box', 50000, 'Kredit', '2020-07-23 14:28:12', 'developer', '2020-07-23 03:22:26', 'developer'),
(18, '2020-07-07', 6, 30, 'Box', 90000, 'Cash', '2020-07-23 15:22:57', 'developer', '2020-07-23 15:22:57', NULL),
(19, '2020-07-22', 7, 100, 'PCS', 1000000, 'Kredit', '2020-07-23 15:24:21', 'developer', '2020-07-23 03:27:12', 'developer'),
(20, '2020-07-23', 7, 50, 'PCS', 50000, 'Cash', '2020-07-23 15:27:39', 'developer', '2020-07-23 15:27:39', NULL),
(21, '2020-07-01', 8, 20, 'PCS', 200000, 'Cash', '2020-07-24 12:05:09', 'developer', '2020-07-24 12:05:09', NULL),
(22, '2020-07-02', 8, 100, 'PCS', 1200000, 'Cash', '2020-07-24 12:07:56', 'superadmin', '2020-07-24 12:07:56', NULL),
(23, '2020-07-03', 8, 50, 'PCS', 500000, 'Cash', '2020-07-24 12:09:13', 'superadmin', '2020-07-24 12:09:13', NULL),
(24, '2020-07-24', 9, 500, 'PCS', 5000000, 'Cash', '2020-07-24 12:10:02', 'superadmin', '2020-07-24 12:10:02', NULL),
(25, '2020-07-24', 10, 200, 'PCS', 600000, 'Cash', '2020-07-24 14:30:46', 'developer', '2020-07-24 14:30:46', NULL),
(26, '2020-07-24', 10, 100, 'PCS', 400000, 'Cash', '2020-07-24 14:33:30', 'developer', '2020-07-24 03:53:58', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `m_invoice`
--

CREATE TABLE `m_invoice` (
  `id` int(11) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `tgl_jt` date DEFAULT NULL,
  `no_nota` varchar(99) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_invoice`
--

INSERT INTO `m_invoice` (`id`, `id_pl`, `tgl_jt`, `no_nota`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 2, '2020-07-23', 'NOTA 001', '2020-07-23 16:05:49', 'superadmin', '0000-00-00 00:00:00', NULL);

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
(21, 15, 'NOTA/001/MSM', '2020-07-11 03:54:33', 'developer', '0000-00-00 00:00:00', NULL),
(22, 15, 'NOTA/002/MSM', '2020-07-11 03:54:41', 'developer', '0000-00-00 00:00:00', NULL),
(23, 15, 'NOTA/003/MSM', '2020-07-11 03:54:49', 'developer', '0000-00-00 00:00:00', NULL),
(24, 14, 'NOTA/001/PPI', '2020-07-11 03:55:14', 'developer', '0000-00-00 00:00:00', NULL),
(25, 14, 'NOTA/002/PPI', '2020-07-11 03:55:22', 'developer', '0000-00-00 00:00:00', NULL),
(26, 14, 'NOTA/003/PPI', '2020-07-11 03:55:32', 'developer', '0000-00-00 00:00:00', NULL);

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
  `created_by` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_perusahaan`
--

INSERT INTO `m_perusahaan` (`id`, `pimpinan`, `nm_perusahaan`, `alamat`, `npwp`, `no_telp`, `created_at`, `created_by`) VALUES
(20, 'SATU', 'PT. TEST PERUSAHAAN', 'JL. TEST ALAMAT PERUSAHAAN', '001', '001', '2020-06-11 08:14:49', 'developer'),
(21, 'DUA', 'PT. TEST PERUSAHAAN DUA', 'JL. TEST ALAMAT PERUSAHAAN DUA', '002', '002', '2020-06-11 08:15:22', 'developer'),
(22, 'TEST PIMPINAN', 'PT. MAJU MUNDUR', 'ALAMAT PT KE TIGA', '001/001-001_001.001', '087123456789', '2020-06-16 08:23:38', 'developer'),
(23, '-', 'PT. ATMI SOLO', 'JL. MOJO NO. 1 KARANGASEM LAWEAN SURAKARTA', '03.196.032.1-526.000', '-', '2020-06-23 02:22:56', 'developer');

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
(3, 2, 6, '2020-07-23', 20, 'Box', 20000, '2020-07-23 16:00:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(4, 2, 7, '2020-07-23', 50, 'PCS', 50000, '2020-07-23 16:00:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(5, 3, 8, '2020-07-01', 20, 'PCS', 0, '2020-07-24 12:07:00', 'superadmin', '0000-00-00 00:00:00', NULL);

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
  `cek_po` int(1) DEFAULT '0',
  `cek_inv` int(1) DEFAULT '0',
  `data_inv` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pl_price_list`
--

INSERT INTO `m_pl_price_list` (`id`, `id_m_perusahaan`, `tgl`, `no_surat`, `no_so`, `no_po`, `cek_po`, `cek_inv`, `data_inv`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 23, '2020-07-23', 'SJSARU', 'SOSATU', 'PO1', 0, 0, 1, '2020-07-23 16:00:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(3, 20, '2020-07-01', 'PPISJ1', 'PPISO1', 'PPIPO1', 0, 0, 0, '2020-07-24 12:07:00', 'superadmin', '0000-00-00 00:00:00', NULL);

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

--
-- Dumping data for table `m_price_list`
--

INSERT INTO `m_price_list` (`id`, `tgl`, `id_m_barang`, `id_m_supplier`, `harga_price_list`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '2020-07-24', 6, 15, 100000, '2020-07-24 12:15:25', 'developer', '0000-00-00 00:00:00', NULL);

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
(14, 'PT. PRIMA PAPER INDOSESIA', '2020-07-11 03:52:08', 'developer', '0000-00-00 00:00:00', NULL),
(15, 'PT. MURFA SURYA MAHARDIKA', '2020-07-11 03:52:21', 'developer', '0000-00-00 00:00:00', NULL),
(16, 'PT. POLITAMA', '2020-07-12 14:47:02', 'developer', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `nama` varchar(99) DEFAULT NULL,
  `daerah` varchar(99) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`nama`, `daerah`, `email`) VALUES
('PT. Prima Paper Indonesia', 'Dsn. Timang Kulon, Wonokerto , Wonogiri', 'salesprimapaper@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `po_master`
--

CREATE TABLE `po_master` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `qty` int(11) NOT NULL,
  `no_po` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_master`
--

INSERT INTO `po_master` (`id`, `id_perusahaan`, `tgl`, `kode_barang`, `qty`, `no_po`) VALUES
(4, 23, '2020-06-01', 'KD/BARANG/001', 1000, 'NO/PO/001'),
(5, 21, '2020-06-25', 'KD/BARANG/002', 1000, 'NO/PO/001'),
(6, 21, '2020-06-25', 'KD/BARANG/003', 1000, 'NO/PO/001'),
(7, 21, '2020-06-25', 'KD/BARANG/004', 1000, 'NO/PO/001'),
(8, 21, '2020-06-25', 'KD/BARANG/005', 1000, 'NO/PO/001'),
(9, 21, '2020-06-25', 'KD/BARANG/006', 1000, 'NO/PO/001'),
(10, 21, '2020-06-25', 'KD/BARANG/001', 1000, 'NO/PO/001'),
(11, 21, '2020-06-25', 'KD/BARANG/001', 1000, 'NO/PO/002'),
(12, 21, '2020-06-25', 'KD/BARANG/006', 1000, 'NO/PO/002'),
(13, 21, '2020-06-25', 'KD/BARANG/001', 1000, 'NO/PO/003'),
(14, 21, '2020-06-24', 'KD/BARANG/004', 1000, 'NO/PO/003');

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
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User Biasa', 'User', 'Penjualan', '2020-07-10 13:51:57', NULL, '2020-07-10 03:05:21', 'developer'),
(3, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Admin Super', 'SuperAdmin', 'Penjualan', '2020-07-10 13:51:57', NULL, '0000-00-00 00:00:00', NULL),
(4, 'developer', '5e8edd851d2fdfbd7415232c67367cc3', 'Dev Ganteng', 'Developer', 'Pembelian', '2020-07-10 13:51:57', NULL, '2020-07-11 04:22:51', 'developer');

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
-- Indexes for table `po_master`
--
ALTER TABLE `po_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_barang_plus`
--
ALTER TABLE `m_barang_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `m_invoice`
--
ALTER TABLE `m_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_nota`
--
ALTER TABLE `m_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `po_master`
--
ALTER TABLE `po_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
