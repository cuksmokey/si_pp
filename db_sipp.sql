-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2020 pada 12.42
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
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`id`, `id_m_barang_plus`, `id_m_nota`, `tgl`, `kode_barang`, `nama_barang`, `merek`, `spesifikasi`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(19, 47, 47, '2020-09-29', '01/01', 'BARAN GSATU', 'MEREK SATU', 'SPEC SATU', 0, '2020-09-29 07:39:29', 'developer', '2020-09-28 21:19:26', 'developer'),
(20, 48, 50, '2020-09-29', '02/02', 'BARANG DUA', 'MEREK DUA', 'SPEC DUA', 0, '2020-09-29 07:40:22', 'developer', '2020-09-28 21:19:35', 'developer'),
(21, 49, 54, '2020-09-29', '03/03', 'BARANG TIGA', 'MEREK TIGA', 'SPEC TIGA', 0, '2020-09-29 09:02:33', 'developer', '2020-09-28 21:19:44', 'developer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang_plus`
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
-- Dumping data untuk tabel `m_barang_plus`
--

INSERT INTO `m_barang_plus` (`id`, `tgl_bayar`, `id_m_barang`, `qty_plus`, `qty_ket`, `harga`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(44, '2020-09-29', 19, 10, 'PCS', 100000, 'Cash', '2020-09-29 07:39:29', 'developer', '2020-09-28 19:40:31', 'developer'),
(45, '2020-09-29', 20, 5, 'Batang', 50000, 'Cash', '2020-09-29 07:40:22', 'developer', '2020-09-29 07:40:22', NULL),
(46, '2020-09-29', 21, 20, 'Unit', 400000, 'Cash', '2020-09-29 09:02:33', 'developer', '2020-09-29 09:02:33', NULL),
(47, '2020-09-29', 19, 10, 'PCS', 100000, 'Cash', '2020-09-29 09:19:26', 'developer', '2020-09-29 09:19:26', NULL),
(48, '2020-09-29', 20, 50, 'Batang', 500000, 'Cash', '2020-09-29 09:19:36', 'developer', '2020-09-29 09:19:36', NULL),
(49, '2020-09-29', 21, 40, 'Unit', 400000, 'Cash', '2020-09-29 09:19:44', 'developer', '2020-09-29 09:19:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_invoice`
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
-- Dumping data untuk tabel `m_invoice`
--

INSERT INTO `m_invoice` (`id`, `id_pl`, `tgl_jt`, `no_nota`, `no_faktur`, `ongkir`, `tgl_byr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(15, 13, '2020-09-29', 'NOTA SATU', 'FAKTUR SATU', 0, '2020-09-29', '2020-09-29 09:05:54', 'developer', '0000-00-00 00:00:00', NULL),
(16, 14, '2020-09-29', 'NOTA DUA', 'FAKTUR DUA', 0, '2020-09-29', '2020-09-29 09:06:16', 'developer', '0000-00-00 00:00:00', NULL),
(17, 15, '2020-09-29', 'NOTA TIGA', 'FAKTUR TIGA', 0, '2020-09-29', '2020-09-29 09:10:00', 'developer', '0000-00-00 00:00:00', NULL),
(18, 16, '2020-09-29', 'NOTA EMPAT', 'FAKTUR EMPAT', 10000, '2020-09-29', '2020-09-29 09:23:04', 'developer', '0000-00-00 00:00:00', NULL),
(19, 17, '2020-09-29', 'NOTA LIMA', 'FAKTUR LIMA', 25000, '2020-09-29', '2020-09-29 09:23:32', 'developer', '0000-00-00 00:00:00', NULL),
(20, 18, '2020-09-29', 'NOTA ENAM', 'FAKTUR ENAM', 40000, '2020-09-29', '2020-09-29 09:23:59', 'developer', '0000-00-00 00:00:00', NULL);

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
(47, 23, '1', '2020-09-29 07:37:25', 'developer', '0000-00-00 00:00:00', NULL),
(48, 24, '1', '2020-09-29 07:37:31', 'developer', '0000-00-00 00:00:00', NULL),
(49, 25, '1', '2020-09-29 07:37:35', 'developer', '0000-00-00 00:00:00', NULL),
(50, 23, '2', '2020-09-29 07:37:38', 'developer', '0000-00-00 00:00:00', NULL),
(51, 24, '3', '2020-09-29 07:37:43', 'developer', '0000-00-00 00:00:00', NULL),
(52, 25, '3', '2020-09-29 07:37:46', 'developer', '0000-00-00 00:00:00', NULL),
(53, 25, '2', '2020-09-29 07:37:54', 'developer', '0000-00-00 00:00:00', NULL),
(54, 23, '3', '2020-09-29 07:37:58', 'developer', '0000-00-00 00:00:00', NULL),
(55, 24, '2', '2020-09-29 07:38:11', 'developer', '0000-00-00 00:00:00', NULL);

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
  `created_by` varchar(90) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_perusahaan`
--

INSERT INTO `m_perusahaan` (`id`, `pimpinan`, `nm_perusahaan`, `alamat`, `npwp`, `no_telp`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(31, 'CPIMPINANA', 'CNAMAA', 'CALAMATA', 'CNPWPA', '01', '2020-09-29 07:35:07', 'developer', '2020-09-28 19:36:50', 'developer'),
(32, 'CPIMPINANB', 'CNAMAB', 'CALAMATB', 'CNPWPB', '02', '2020-09-29 07:35:27', 'developer', '2020-09-28 19:36:07', 'developer'),
(33, 'CPIMPINANC', 'CNAMAC', 'CALAMATC', 'CNPWPC', '03', '2020-09-29 07:37:11', 'developer', '2020-09-29 07:37:11', NULL);

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
  `qty_ket` varchar(99) DEFAULT NULL,
  `harga_invoice` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pl_list_barang`
--

INSERT INTO `m_pl_list_barang` (`id`, `id_pl`, `id_m_barang`, `tgl`, `qty`, `qty_ket`, `harga_invoice`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(18, 13, 19, '2020-09-29', 10, 'PCS', 100000, '2020-09-29 09:03:15', 'developer', '0000-00-00 00:00:00', NULL),
(19, 14, 20, '2020-09-29', 5, 'Batang', 50000, '2020-09-29 09:04:09', 'developer', '0000-00-00 00:00:00', NULL),
(20, 15, 21, '2020-09-29', 20, 'Unit', 200000, '2020-09-29 09:04:44', 'developer', '0000-00-00 00:00:00', NULL),
(21, 16, 19, '2020-09-29', 10, 'PCS', 100000, '2020-09-29 09:20:56', 'developer', '0000-00-00 00:00:00', NULL),
(22, 17, 20, '2020-09-29', 50, 'Batang', 500000, '2020-09-29 09:21:28', 'developer', '0000-00-00 00:00:00', NULL),
(23, 18, 21, '2020-09-29', 40, 'Unit', 400000, '2020-09-29 09:21:55', 'developer', '0000-00-00 00:00:00', NULL);

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
-- Dumping data untuk tabel `m_pl_price_list`
--

INSERT INTO `m_pl_price_list` (`id`, `id_m_perusahaan`, `tgl`, `no_surat`, `no_so`, `no_po`, `up`, `laporan`, `cek_po`, `cek_inv`, `data_inv`, `tgl_ctk`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(13, 31, '2020-09-29', 'SJ SATU', 'SO SATU', 'PO SATU', 'UP SATU', 'sma', 0, 1, 1, '2020-09-29', '2020-09-29 09:03:15', 'developer', '0000-00-00 00:00:00', NULL),
(14, 31, '2020-09-29', 'SURAT DUA', 'SO DUA', 'PO DUA', 'UP DUA', 'sma', 0, 1, 1, '2020-09-29', '2020-09-29 09:04:09', 'developer', '0000-00-00 00:00:00', NULL),
(15, 31, '2020-09-29', 'SURAT TIGA', 'SO TIGA', 'PO DUA', 'UP TIGA', 'sma', 0, 1, 1, '2020-09-29', '2020-09-29 09:04:44', 'developer', '0000-00-00 00:00:00', NULL),
(16, 32, '2020-09-29', 'SURAT EMPAT', 'SO EMPAT', 'PO EMPAT', 'UP EMPAT', 'st', 0, 0, 1, '2020-09-29', '2020-09-29 09:20:56', 'developer', '0000-00-00 00:00:00', NULL),
(17, 32, '2020-09-29', 'SURAT LIMA', 'SO LIMA', 'PO LIMA', 'UP LIMA', 'st', 0, 0, 1, '2020-09-29', '2020-09-29 09:21:28', 'developer', '0000-00-00 00:00:00', NULL),
(18, 32, '2020-09-29', 'SURAT ENAM', 'SO ENAM', 'PO ENAM', 'UP ENAM', 'st', 0, 0, 1, '2020-09-29', '2020-09-29 09:21:55', 'developer', '0000-00-00 00:00:00', NULL);

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
(23, 'A', '2020-09-29 07:17:54', 'developer', '0000-00-00 00:00:00', NULL),
(24, 'B', '2020-09-29 07:17:56', 'developer', '0000-00-00 00:00:00', NULL),
(25, 'C', '2020-09-29 07:17:58', 'developer', '0000-00-00 00:00:00', NULL);

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
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User Biasa', 'User', 'Pembelian', '2020-07-10 13:51:57', NULL, '2020-07-26 19:01:29', 'developer'),
(3, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Admin Super', 'SuperAdmin', 'Pembelian', '2020-07-10 13:51:57', NULL, '2020-09-24 01:25:58', 'superadmin'),
(4, 'developer', '5e8edd851d2fdfbd7415232c67367cc3', 'Dev Ganteng', 'Developer', 'Penjualan', '2020-07-10 13:51:57', NULL, '2020-09-24 01:23:53', 'developer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`,`kode_barang`);

--
-- Indeks untuk tabel `m_barang_plus`
--
ALTER TABLE `m_barang_plus`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `m_barang_plus`
--
ALTER TABLE `m_barang_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `m_invoice`
--
ALTER TABLE `m_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `m_nota`
--
ALTER TABLE `m_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
