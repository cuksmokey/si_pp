-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2020 pada 11.04
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

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
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `id` int(11) NOT NULL,
  `id_m_nota` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `nama_barang` varchar(99) DEFAULT NULL,
  `merek` varchar(99) DEFAULT NULL,
  `spesifikasi` varchar(99) DEFAULT NULL,
  `qty` int(99) DEFAULT NULL,
  `qty_ket` varchar(99) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`id`, `id_m_nota`, `tgl`, `kode_barang`, `nama_barang`, `merek`, `spesifikasi`, `qty`, `qty_ket`, `harga`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(29, 21, '2020-07-11', '00001/MSMBARANG', 'MSMBARANGNM', 'MSMBARANGMR', 'MSMBARANGSS', 0, 'PCS', 1000000, '2020-07-11 03:58:00', 'developer', '0000-00-00 00:00:00', NULL),
(30, 21, '2020-07-11', '00002/MSMBARANG2', 'MSMBARANGNM2', 'MSMBARANGMR2', 'MSMBARANGSS2', 170, 'PCS', 2000000, '2020-07-11 04:00:31', 'developer', '2020-07-11 04:20:50', 'developer'),
(31, 21, '2020-07-11', '00003/MSMBARANG3', 'MSMBARANGNM3', 'MSMBARANGMR3', 'MSMBARANGSS3', 260, 'PCS', 3000000, '2020-07-11 04:03:15', 'developer', '2020-07-11 04:20:57', 'developer'),
(32, 22, '2020-07-12', '00001/MSMBARANGNT21', 'MSMBARANGNT2NM1', 'MSMBARANGNT2MR1', 'MSMBARANGNT2SS1', 110, 'Batang', 1100000, '2020-07-11 04:05:47', 'developer', '0000-00-00 00:00:00', NULL),
(33, 22, '2020-07-12', '00002/MSMBARANGNT22', 'MSMBARANGNT2NM2', 'MSMBARANGNT2MR2', 'MSMBARANGNT2SS2', 120, 'Batang', 1200000, '2020-07-11 04:09:14', 'developer', '2020-07-11 04:21:06', 'developer'),
(34, 23, '2020-07-13', '00001/MSMBARANGNT3', 'MSMBARANGNT3NM3', 'MSMBARANGNT3MR3', 'MSMBARANGNT3SS3', 230, 'Batang', 2300000, '2020-07-11 04:18:24', 'developer', '0000-00-00 00:00:00', NULL),
(35, 24, '2020-07-01', '00001/PPIBARANG1', 'PPIBARANG1NM', 'PPIBARANG1MR', 'PPIBARANG1SS', 100, 'Kaleng', 1000000, '2020-07-11 04:19:46', 'developer', '0000-00-00 00:00:00', NULL),
(36, 21, '2020-07-11', '00004/MSMBARANG', 'MSMBARANGNM4', 'MSMBARANGMR4', 'MSMBARANGSS4', 260, 'PCS', 5000000, '2020-07-11 12:45:17', 'developer', '2020-07-11 00:46:08', 'developer'),
(37, 21, '2020-07-11', '00004/MSMBARANG4', 'MSMBARANGNM4', 'MSMBARANGMR4', 'MSMBARANGSS4', 350, 'PCS', 4000000, '2020-07-11 04:03:15', 'developer', '2020-07-11 04:20:57', 'developer'),
(38, 21, '2020-07-11', '00005/MSMBARANG5', 'MSMBARANGNM5', 'MSMBARANGMR5', 'MSMBARANGSS5', 440, 'PCS', 6000000, '2020-07-11 04:03:15', 'developer', '2020-07-11 04:20:57', 'developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_invoice`
--

CREATE TABLE `m_invoice` (
  `id` int(11) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `tgl_jt` date DEFAULT NULL,
  `no_invoice` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_nota`
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
-- Dumping data untuk tabel `m_nota`
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
-- Struktur dari tabel `m_perusahaan`
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
-- Dumping data untuk tabel `m_perusahaan`
--

INSERT INTO `m_perusahaan` (`id`, `pimpinan`, `nm_perusahaan`, `alamat`, `npwp`, `no_telp`, `created_at`, `created_by`) VALUES
(20, 'SATU', 'PT. TEST PERUSAHAAN', 'JL. TEST ALAMAT PERUSAHAAN', '001', '001', '2020-06-11 08:14:49', 'developer'),
(21, 'DUA', 'PT. TEST PERUSAHAAN DUA', 'JL. TEST ALAMAT PERUSAHAAN DUA', '002', '002', '2020-06-11 08:15:22', 'developer'),
(22, 'TEST PIMPINAN', 'PT. MAJU MUNDUR', 'ALAMAT PT KE TIGA', '001/001-001_001.001', '087123456789', '2020-06-16 08:23:38', 'developer'),
(23, '-', 'PT. ATMI SOLO', 'JL. MOJO NO. 1 KARANGASEM LAWEAN SURAKARTA', '03.196.032.1-526.000', '-', '2020-06-23 02:22:56', 'developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pl_list_barang`
--

CREATE TABLE `m_pl_list_barang` (
  `id` int(11) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `id_m_barang` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_invoice` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pl_list_barang`
--

INSERT INTO `m_pl_list_barang` (`id`, `id_pl`, `id_m_barang`, `tgl`, `qty`, `harga_invoice`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(14, 4, 29, '2020-07-14', 10, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(15, 4, 30, '2020-07-14', 20, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(16, 4, 31, '2020-07-14', 30, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(17, 4, 36, '2020-07-14', 40, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(18, 4, 37, '2020-07-14', 50, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(19, 4, 38, '2020-07-14', 60, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(20, 5, 29, '2020-07-15', 10, 0, '2020-07-15 08:23:39', 'superadmin', '0000-00-00 00:00:00', NULL),
(21, 5, 30, '2020-07-15', 10, 0, '2020-07-15 08:23:39', 'superadmin', '0000-00-00 00:00:00', NULL),
(22, 5, 31, '2020-07-15', 10, 0, '2020-07-15 08:23:39', 'superadmin', '0000-00-00 00:00:00', NULL),
(23, 6, 29, '2020-07-16', 80, 0, '2020-07-15 08:24:11', 'superadmin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pl_price_list`
--

CREATE TABLE `m_pl_price_list` (
  `id` int(11) NOT NULL,
  `id_m_perusahaan` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `no_surat` varchar(99) NOT NULL,
  `no_so` varchar(99) NOT NULL,
  `no_po` varchar(99) NOT NULL,
  `no_nota` varchar(99) DEFAULT NULL,
  `cek_po` int(1) DEFAULT '0',
  `cek_inv` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pl_price_list`
--

INSERT INTO `m_pl_price_list` (`id`, `id_m_perusahaan`, `tgl`, `no_surat`, `no_so`, `no_po`, `no_nota`, `cek_po`, `cek_inv`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, 23, '2020-07-14', 'SJ1', 'SO1', 'PO1', 'NO1', 0, 0, '2020-07-15 08:21:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(5, 21, '2020-07-15', 'SJ2', 'SO2', 'PO2', 'NO2', 0, 0, '2020-07-15 08:23:39', 'superadmin', '0000-00-00 00:00:00', NULL),
(6, 22, '2020-07-16', 'SJ3', 'SO3', 'PO3', 'NO3', 0, 0, '2020-07-15 08:24:11', 'superadmin', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_price_list`
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
-- Struktur dari tabel `m_supplier`
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
-- Dumping data untuk tabel `m_supplier`
--

INSERT INTO `m_supplier` (`id`, `nama_supplier`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(14, 'PT. PRIMA PAPER INDOSESIA', '2020-07-11 03:52:08', 'developer', '0000-00-00 00:00:00', NULL),
(15, 'PT. MURFA SURYA MAHARDIKA', '2020-07-11 03:52:21', 'developer', '0000-00-00 00:00:00', NULL),
(16, 'PT. POLITAMA', '2020-07-12 14:47:02', 'developer', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `nama` varchar(99) DEFAULT NULL,
  `daerah` varchar(99) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`nama`, `daerah`, `email`) VALUES
('PT. Prima Paper Indonesia', 'Dsn. Timang Kulon, Wonokerto , Wonogiri', 'salesprimapaper@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_master`
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
-- Dumping data untuk tabel `po_master`
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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
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
-- Indeks untuk tabel `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`,`kode_barang`);

--
-- Indeks untuk tabel `m_invoice`
--
ALTER TABLE `m_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_nota`
--
ALTER TABLE `m_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_price_list`
--
ALTER TABLE `m_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_master`
--
ALTER TABLE `po_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `m_invoice`
--
ALTER TABLE `m_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_nota`
--
ALTER TABLE `m_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `po_master`
--
ALTER TABLE `po_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
