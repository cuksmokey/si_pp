-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2020 pada 11.09
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
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `nama_barang` varchar(99) DEFAULT NULL,
  `merek` varchar(99) DEFAULT NULL,
  `spesifikasi` varchar(99) DEFAULT NULL,
  `supplier` int(11) NOT NULL,
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
(8, '2020-06-07', 'KD/BARANG/001', 'BARANG SATU', 'MEREK SATU', 'SPEC SATU', 2, 400, 'PCS', 10000, '001', '2020-06-04 09:44:37', 'developer', '2020-06-19 03:57:17', 'developer'),
(9, '2020-06-06', 'KD/BARANG/002', 'BARANG DUA', 'MEREK  DUA', 'SPEC DUA', 2, 990, 'Batang', 2000, '002', '2020-06-04 09:45:09', 'developer', '2020-06-19 03:57:23', 'developer'),
(10, '2020-06-05', 'KD/BARANG/003', 'BARANG TIGA', 'MEREK TIGA', 'SPEC TIGA', 2, 2070, 'Lonjor', 1300, '003', '2020-06-04 09:45:49', 'developer', '2020-06-19 03:57:29', 'developer'),
(11, '2020-06-04', 'KD/BARANG/004', 'BARANG EMPAT', 'MEREK EMPAT', 'SPEC EMPAT', 3, 3490, 'Kaleng', 1500, '004', '2020-06-04 09:46:37', 'developer', '2020-06-19 03:57:35', 'developer'),
(12, '2020-06-03', 'KD/BARANG/005', 'BARANG LIMA', 'MEREK LIMA', 'SPEC LIMA', 3, 4300, 'Lembar', 1600, '005', '2020-06-04 09:47:35', 'developer', '2020-06-19 03:57:42', 'developer'),
(13, '2020-06-09', 'KD/BARANG/006', 'NAMA BARANG ENAM', 'MEREK ENAM', 'SPEC ENAM', 4, 5200, 'PCS', 60000, '006', '2020-06-09 06:11:08', 'developer', '2020-06-16 21:05:41', 'developer'),
(14, '2020-06-01', 'KD/BARANG/007', 'NAMA BARANG TUJUH', 'MEREK TUJUH', 'SPEC TUJUH', 5, 7000, 'PCS', 7000, '007', '2020-06-09 06:11:58', 'developer', '2020-06-16 21:05:53', 'developer'),
(15, '2020-05-01', 'KD/BARANG/008', 'BARANG DELAPAN', 'MEREK DELAPAN', 'SPEC DELAPAN', 7, 8000, 'Box', 10000, '008', '2020-06-13 04:19:17', 'developer', '2020-06-16 21:06:04', 'developer'),
(16, '2020-04-30', 'KD/BARANG/009', 'BARANGA SEMBILAN', 'MEREK SEMBILAN', 'SPEC SEMBILAN', 7, 9000, 'Batang', 90000, '009', '2020-06-13 04:21:38', 'developer', '2020-06-16 21:06:10', 'developer'),
(17, '2020-06-23', 'SB/BAN/001', 'Starret Bandsaw 1735x0,9x13x10/14', 'Merek Barang', 'Spec Barang', 8, 0, 'PCS', 215000, '001', '2020-06-23 02:18:48', 'developer', '0000-00-00 00:00:00', NULL);

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
(1, 2, 'TEST/NOTA/001', '2020-07-09 08:36:19', 'developer', '2020-07-08 21:02:03', 'developer'),
(2, 8, 'TEST/POPO/123', '2020-07-09 08:36:47', 'developer', '2020-07-08 21:02:31', 'developer'),
(3, 9, 'GEGEH999', '2020-07-09 08:56:41', 'developer', '2020-07-08 21:02:14', 'developer'),
(4, 7, 'NOTANOTA777', '2020-07-09 09:02:48', 'developer', '0000-00-00 00:00:00', NULL),
(5, 2, '999999999999', '2020-07-09 09:06:26', 'developer', '0000-00-00 00:00:00', NULL),
(6, 7, 'DSGSGS12345135', '2020-07-09 09:06:38', 'developer', '0000-00-00 00:00:00', NULL);

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
  `tgl` date DEFAULT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `harga_price_list` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `id_pl_price_list` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pl_list_barang`
--

INSERT INTO `m_pl_list_barang` (`id`, `tgl`, `kode_barang`, `harga_price_list`, `qty`, `id_pl_price_list`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(32, '2020-06-19', 'KD/BARANG/001', 1000000, 100, 6, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(33, '2020-06-19', 'KD/BARANG/002', 2000000, 200, 6, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(34, '2020-06-19', 'KD/BARANG/003', 3000000, 300, 6, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(35, '2020-06-19', 'KD/BARANG/004', 4000000, 400, 6, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(36, '2020-06-19', 'KD/BARANG/005', 5000000, 500, 6, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(37, '2020-06-19', 'KD/BARANG/006', 6000000, 600, 6, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(38, '2020-06-19', 'KD/BARANG/001', 1000000, 500, 7, '2020-06-19 08:07:01', 'developer', '0000-00-00 00:00:00', NULL),
(39, '2020-06-19', 'KD/BARANG/002', 2000000, 800, 7, '2020-06-19 08:07:01', 'developer', '0000-00-00 00:00:00', NULL),
(40, '2020-06-19', 'KD/BARANG/003', 3000000, 600, 7, '2020-06-19 08:07:01', 'developer', '0000-00-00 00:00:00', NULL),
(41, '2020-06-23', 'SB/BAN/001', 215000, 15, 8, '2020-06-23 02:25:16', 'developer', '0000-00-00 00:00:00', NULL),
(44, '2020-06-20', 'KD/BARANG/002', 2000000, 10, 10, '2020-06-25 06:45:59', 'developer', '0000-00-00 00:00:00', NULL),
(45, '2020-06-20', 'KD/BARANG/003', 3000000, 20, 10, '2020-06-25 06:45:59', 'developer', '0000-00-00 00:00:00', NULL),
(46, '2020-06-20', 'KD/BARANG/004', 4000000, 40, 10, '2020-06-25 06:45:59', 'developer', '0000-00-00 00:00:00', NULL),
(47, '2020-06-20', 'KD/BARANG/005', 5000000, 50, 10, '2020-06-25 06:45:59', 'developer', '0000-00-00 00:00:00', NULL),
(48, '2020-06-20', 'KD/BARANG/006', 6000000, 60, 10, '2020-06-25 06:45:59', 'developer', '0000-00-00 00:00:00', NULL),
(49, '2020-06-21', 'KD/BARANG/003', 3000000, 10, 11, '2020-06-25 06:46:47', 'developer', '0000-00-00 00:00:00', NULL),
(50, '2020-06-21', 'KD/BARANG/004', 4000000, 20, 11, '2020-06-25 06:46:47', 'developer', '0000-00-00 00:00:00', NULL),
(51, '2020-06-21', 'KD/BARANG/005', 5000000, 30, 11, '2020-06-25 06:46:47', 'developer', '0000-00-00 00:00:00', NULL),
(52, '2020-06-21', 'KD/BARANG/006', 6000000, 40, 11, '2020-06-25 06:46:48', 'developer', '0000-00-00 00:00:00', NULL),
(53, '2020-06-22', 'KD/BARANG/004', 4000000, 50, 12, '2020-06-25 06:48:02', 'developer', '0000-00-00 00:00:00', NULL),
(54, '2020-06-22', 'KD/BARANG/005', 5000000, 60, 12, '2020-06-25 06:48:02', 'developer', '0000-00-00 00:00:00', NULL),
(55, '2020-06-22', 'KD/BARANG/006', 6000000, 70, 12, '2020-06-25 06:48:02', 'developer', '0000-00-00 00:00:00', NULL),
(56, '2020-06-23', 'KD/BARANG/005', 5000000, 60, 13, '2020-06-25 06:48:53', 'developer', '0000-00-00 00:00:00', NULL),
(57, '2020-06-23', 'KD/BARANG/006', 6000000, 30, 13, '2020-06-25 06:48:53', 'developer', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pl_price_list`
--

CREATE TABLE `m_pl_price_list` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `no_surat` varchar(99) NOT NULL,
  `no_so` varchar(99) NOT NULL,
  `kepada` int(11) DEFAULT NULL,
  `no_po` varchar(99) NOT NULL,
  `no_nota` varchar(99) DEFAULT NULL,
  `cek_po` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pl_price_list`
--

INSERT INTO `m_pl_price_list` (`id`, `tgl`, `no_surat`, `no_so`, `kepada`, `no_po`, `no_nota`, `cek_po`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(6, '2020-06-19', 'NO/SURAT/001', 'NO/SO/001', 21, 'NO/PO/001', 'NO/NOTA/001', 1, '2020-06-19 08:05:43', 'developer', '0000-00-00 00:00:00', NULL),
(7, '2020-06-19', 'NO/SURAT/002', 'NO/SO/002', 22, 'NO/PO/002', 'NO/NOTA/002', 0, '2020-06-19 08:07:01', 'developer', '0000-00-00 00:00:00', NULL),
(8, '2020-06-23', 'SJ/001', 'SO/001', 23, 'PO/001', 'NO/NOTA/001', 0, '2020-06-23 02:25:16', 'developer', '0000-00-00 00:00:00', NULL),
(10, '2020-06-20', 'Q', 'W', 21, 'E', 'NO/NOTA/001', 0, '2020-06-25 06:45:59', 'developer', '0000-00-00 00:00:00', NULL),
(11, '2020-06-21', 'T', 'Y', 21, 'U', 'NO/NOTA/001', 0, '2020-06-25 06:46:47', 'developer', '0000-00-00 00:00:00', NULL),
(12, '2020-06-22', 'ASD', 'QWEWQE', 21, 'T31G1', 'NO/NOTA/001', 0, '2020-06-25 06:48:02', 'developer', '0000-00-00 00:00:00', NULL),
(13, '2020-06-23', 'DSGF', '325 2', 21, 'ESF 623', 'NO/NOTA/001', 0, '2020-06-25 06:48:53', 'developer', '0000-00-00 00:00:00', NULL);

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
(4, '2020-06-19', 'KD/BARANG/001', 'BARANG SATU', 'MEREK SATU', 'SPEC SATU', 'SUPP SATU', 1000000, '2020-06-07 20:57:44', 'developer', '2020-06-19 04:04:41', 'developer'),
(5, '2020-06-19', 'KD/BARANG/002', 'BARANG DUA', 'MEREK  DUA', 'SPEC DUA', 'SUPP DUA', 2000000, '2020-06-07 21:00:20', 'developer', '0000-00-00 00:00:00', 'developer'),
(6, '2020-06-19', 'KD/BARANG/003', 'BARANG TIGA', 'MEREK TIGA', 'SPEC TIGA', 'SUPP TIGA', 3000000, '2020-06-10 21:54:27', 'developer', '0000-00-00 00:00:00', 'developer'),
(7, '2020-06-19', 'KD/BARANG/004', 'BARANG EMPAT', 'MEREK EMPAT', 'SPEC EMPAT', 'SUPP EMPAT', 4000000, '2020-06-14 09:48:13', NULL, '0000-00-00 00:00:00', 'developer'),
(8, '2020-06-18', 'KD/BARANG/005', 'BARANG LIMA', 'MEREK LIMA', 'SPEC LIMA', 'SUPP LIMA', 5000000, '2020-06-18 07:05:22', 'developer', '0000-00-00 00:00:00', 'developer'),
(9, '2020-06-19', 'KD/BARANG/006', 'NAMA BARANG ENAM', 'MEREK ENAM', 'SPEC ENAM', 'SUPP ENAM', 6000000, '2020-06-19 04:05:04', 'developer', '0000-00-00 00:00:00', NULL),
(10, '2020-06-23', 'SB/BAN/001', 'Starret Bandsaw 1735x0,9x13x10/14', 'Merek Barang', 'Spec Barang', 'Supp Barang', 215000, '2020-06-23 02:19:21', 'developer', '0000-00-00 00:00:00', NULL);

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
(2, 'AAA', '2020-07-08 14:44:44', 'developer', '2020-07-08 03:01:34', 'developer'),
(3, 'ZZZ', '2020-07-08 14:56:12', 'developer', '2020-07-08 21:05:50', 'developer'),
(4, 'CCC', '2020-07-08 14:56:17', 'developer', '0000-00-00 00:00:00', NULL),
(5, 'DDD', '2020-07-08 14:56:20', 'developer', '0000-00-00 00:00:00', NULL),
(7, 'EEE', '2020-07-08 15:05:55', 'developer', '0000-00-00 00:00:00', NULL),
(8, 'FFF', '2020-07-08 15:07:17', 'developer', '0000-00-00 00:00:00', NULL),
(9, 'GGG', '2020-07-09 04:45:17', 'developer', '2020-07-09 04:48:07', 'developer'),
(10, 'BBB', '2020-07-09 09:05:15', 'developer', '2020-07-08 21:06:07', 'developer');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `m_nota`
--
ALTER TABLE `m_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT untuk tabel `po_master`
--
ALTER TABLE `po_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
