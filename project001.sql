-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2020 pada 12.06
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
-- Database: `project001`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `nama_barang` varchar(99) DEFAULT NULL,
  `merek` varchar(99) DEFAULT NULL,
  `spesifikasi` varchar(99) DEFAULT NULL,
  `supplier` varchar(99) DEFAULT NULL,
  `qty` int(99) DEFAULT NULL,
  `qty_ket` varchar(99) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `no_nota` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`id`, `tgl`, `kode_barang`, `nama_barang`, `merek`, `spesifikasi`, `supplier`, `qty`, `qty_ket`, `harga`, `no_nota`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(8, '2020-06-07', 'KD/BARANG/001', 'BARANG SATU', 'MEREK SATU', 'SPEC SATU', 'SUPP SATU', 10000, 'PCS', 10000, '001', '2020-06-04 09:44:37', 'developer', '2020-06-03 22:17:12', 'developer'),
(9, '2020-06-06', 'KD/BARANG/002', 'BARANG DUA', 'MEREK  DUA', 'SPEC DUA', 'SUPP DUA', 20000, 'PCS', 2000, '002', '2020-06-04 09:45:09', 'developer', '2020-06-03 22:17:04', 'developer'),
(10, '2020-06-05', 'KD/BARANG/003', 'BARANG TIGA', 'MEREK TIGA', 'SPEC TIGA', 'SUPP TIGA', 120, 'PCS', 1300, '003', '2020-06-04 09:45:49', 'developer', '2020-06-03 22:16:57', 'developer'),
(11, '2020-06-04', 'KD/BARANG/004', 'BARANG EMPAT', 'MEREK EMPAT', 'SPEC EMPAT', 'SUPP EMPAT', 140, 'PCS', 1500, '004', '2020-06-04 09:46:37', 'developer', '0000-00-00 00:00:00', NULL),
(12, '2020-06-03', 'KD/BARANG/005', 'BARANG LIMA', 'MEREK LIMA', 'SPEC LIMA', 'SUPP LIMA', 130, 'PCS', 1600, '005', '2020-06-04 09:47:35', 'developer', '2020-06-03 22:15:48', 'developer'),
(13, '2020-06-09', 'KD/BARANG/006', 'NAMA BARANG ENAM', 'MEREK ENAM', 'SPEC ENAM', 'SUPP ENAM', 60000, 'PCS', 60000, '006', '2020-06-09 06:11:08', 'developer', '0000-00-00 00:00:00', 'developer'),
(14, '2020-06-01', 'KD/BARANG/007', 'NAMA BARANG TUJUH', 'MEREK TUJUH', 'SPEC TUJUH', 'SUPP TUJUH', 70000, 'PCS', 7000, '007', '2020-06-09 06:11:58', 'developer', '0000-00-00 00:00:00', 'developer'),
(15, '2020-05-01', 'KD/BARANG/008', 'BARANG DELAPAN', 'MEREK DELAPAN', 'SPEC DELAPAN', 'SUPP DELAPAN', 500, 'Box', 10000, '008', '2020-06-13 04:19:17', 'developer', '0000-00-00 00:00:00', 'developer'),
(16, '2020-04-30', 'KD/BARANG/009', 'BARANGA SEMBILAN', 'MEREK SEMBILAN', 'SPEC SEMBILAN', 'SUPP SEMBILAN', 900, 'Batang', 90000, '009', '2020-06-13 04:21:38', 'developer', '0000-00-00 00:00:00', 'developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_perusahaan`
--

CREATE TABLE `m_perusahaan` (
  `id` int(11) NOT NULL,
  `pimpinan` varchar(90) DEFAULT NULL,
  `nm_perusahaan` varchar(90) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_perusahaan`
--

INSERT INTO `m_perusahaan` (`id`, `pimpinan`, `nm_perusahaan`, `alamat`, `no_telp`, `created_at`, `created_by`) VALUES
(20, '-', 'PT. TEST PERUSAHAAN', 'JL. TEST ALAMAT PERUSAHAAN', '-', '2020-06-11 08:14:49', 'developer'),
(21, '-', 'PT. TEST PERUSAHAAN DUA', 'JL. TEST ALAMAT PERUSAHAAN DUA', '-', '2020-06-11 08:15:22', 'developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_price_list`
--

CREATE TABLE `m_price_list` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `nama_barang` varchar(99) DEFAULT NULL,
  `merek` varchar(99) DEFAULT NULL,
  `spesifikasi` varchar(99) DEFAULT NULL,
  `supplier` varchar(99) DEFAULT NULL,
  `harga_price_list` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_price_list`
--

INSERT INTO `m_price_list` (`id`, `tgl`, `kode_barang`, `nama_barang`, `merek`, `spesifikasi`, `supplier`, `harga_price_list`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(4, '2020-06-07', 'KD/BARANG/001', 'BARANG SATU', 'MEREK SATU', 'SPEC SATU', 'SUPP SATU', 10329600, '2020-06-07 20:57:44', 'developer', '0000-00-00 00:00:00', 'developer'),
(5, '2020-06-06', 'KD/BARANG/002', 'BARANG DUA', 'MEREK  DUA', 'SPEC DUA', 'SUPP DUA', 2000000, '2020-06-07 21:00:20', 'developer', '0000-00-00 00:00:00', 'developer'),
(6, '2020-06-05', 'KD/BARANG/003', 'BARANG TIGA', 'MEREK TIGA', 'SPEC TIGA', 'SUPP TIGA', 3000000, '2020-06-10 21:54:27', 'developer', '0000-00-00 00:00:00', 'developer'),
(7, '2020-06-14', 'KD/BARANG/004', 'BARANG EMPAT', 'MEREK EMPAT', 'SPEC EMPAT', 'SUPP EMPAT', 15000000, '2020-06-14 09:48:13', NULL, '0000-00-00 00:00:00', NULL),
(8, '2020-06-14', 'KD/BARANG/005', 'BARANG LIMA', 'MEREK LIMA', 'SPEC LIMA', 'SUPP LIMA', 16000000, '2020-06-14 09:49:37', 'developer', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_timbangan`
--

CREATE TABLE `m_timbangan` (
  `id` int(11) NOT NULL,
  `roll` varchar(50) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nm_ker` varchar(50) DEFAULT NULL,
  `g_ac` decimal(8,2) DEFAULT NULL,
  `g_label` varchar(50) DEFAULT NULL,
  `width` decimal(8,2) DEFAULT NULL,
  `diameter` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `joint` int(11) DEFAULT NULL,
  `ket` text,
  `status` int(1) DEFAULT '0',
  `id_pl` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(50) DEFAULT NULL,
  `packing_at` timestamp NULL DEFAULT NULL,
  `packing_by` varchar(50) DEFAULT NULL,
  `rct` decimal(8,2) DEFAULT NULL,
  `ctk` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `pl`
--

CREATE TABLE `pl` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `no_surat` varchar(99) NOT NULL,
  `no_so` varchar(99) NOT NULL,
  `no_pkb` varchar(99) NOT NULL,
  `no_kendaraan` varchar(99) DEFAULT NULL,
  `nm_perusahaan` varchar(99) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `alamat_perusahaan` text,
  `nama` varchar(99) DEFAULT NULL,
  `no_telp` varchar(99) DEFAULT NULL,
  `no_po` varchar(99) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Open',
  `cek_po` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_history`
--

CREATE TABLE `po_history` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `g_label` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `tonase` int(11) DEFAULT NULL,
  `no_po` varchar(99) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `no_pkb` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_master`
--

CREATE TABLE `po_master` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `g_label` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `tonase` int(11) DEFAULT NULL,
  `no_po` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `th_invoice`
--

CREATE TABLE `th_invoice` (
  `id` int(11) NOT NULL,
  `no_invoice` char(50) NOT NULL,
  `jto` date DEFAULT NULL,
  `no_surat` varchar(99) DEFAULT NULL,
  `no_po` varchar(99) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `nm_perusahaan` varchar(99) DEFAULT NULL,
  `alamat` text,
  `kepada` varchar(99) DEFAULT NULL,
  `gsm` int(5) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Closed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `no_pkb` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_invoice`
--

CREATE TABLE `tr_invoice` (
  `no_invoice` char(50) DEFAULT NULL,
  `g_label` varchar(50) DEFAULT NULL,
  `width_lb` varchar(50) DEFAULT NULL,
  `roll` int(5) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nm_user` varchar(50) DEFAULT NULL,
  `level` enum('Admin','User','SuperAdmin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nm_user`, `level`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin Aplikasi', 'Admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Admin user', 'User'),
(3, 'developer', '5e8edd851d2fdfbd7415232c67367cc3', 'Admin Aplikasi', 'SuperAdmin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`,`kode_barang`);

--
-- Indeks untuk tabel `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_price_list`
--
ALTER TABLE `m_price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_timbangan`
--
ALTER TABLE `m_timbangan`
  ADD PRIMARY KEY (`id`,`roll`);

--
-- Indeks untuk tabel `pl`
--
ALTER TABLE `pl`
  ADD PRIMARY KEY (`no_surat`,`no_so`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `po_history`
--
ALTER TABLE `po_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_master`
--
ALTER TABLE `po_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `th_invoice`
--
ALTER TABLE `th_invoice`
  ADD PRIMARY KEY (`no_invoice`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_timbangan`
--
ALTER TABLE `m_timbangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pl`
--
ALTER TABLE `pl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `po_history`
--
ALTER TABLE `po_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `po_master`
--
ALTER TABLE `po_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `th_invoice`
--
ALTER TABLE `th_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
