-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 10:05 AM
-- Server version: 10.3.28-MariaDB-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinf6933_sipp_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `id` int(11) NOT NULL,
  `id_m_barang_plus` int(11) NOT NULL,
  `kode_barang` varchar(99) NOT NULL,
  `nama_barang` varchar(99) DEFAULT NULL,
  `merek` varchar(99) DEFAULT NULL,
  `spesifikasi` varchar(99) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`id`, `id_m_barang_plus`, `kode_barang`, `nama_barang`, `merek`, `spesifikasi`, `qty`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 131, 'ARNTZ/BNDSW2365X5-8', 'Bandsaw', 'Arntz', '2365 x 20 x 0.9 x 5-8', 5, '2021-04-20 01:46:11', 'developer', '2021-04-28 01:51:32', 'developer'),
(2, 127, 'ARNTZ/BNDSW2365X10-14', 'Bandsaw', 'Arntz', '2365 x 20 x 0.9 x 10-14	', 2, '2021-04-20 01:49:04', 'developer', '2021-04-28 01:38:59', 'developer'),
(3, 123, 'YMW/CTDNO3', 'Center Drill', 'Yamawa', 'No. 3', 0, '2021-04-20 03:55:09', 'developer', '2021-04-28 01:16:58', 'developer'),
(4, 125, 'YMW/CTDNO4', 'Center Drill', 'Yamawa', 'No. 4', 0, '2021-04-20 03:55:41', 'developer', '2021-04-28 01:17:27', 'developer'),
(5, 126, 'YMW/CTDNO5', 'Center Drill', 'Yamawa', 'No. 5', 0, '2021-04-20 03:56:03', 'developer', '2021-04-28 01:18:38', 'developer'),
(6, 129, 'ARNTZ/BNDSW3300X5-7', 'Bandsaw', 'Arntz', '3300 x 27 x 0.9 x 5-7', 1, '2021-04-20 12:49:08', 'developer', '2021-04-28 01:44:35', 'developer'),
(7, 8, 'WIPRO/TGMBR4INCH', 'Tanggem Bor', 'Wipro', '4 inch', 0, '2021-04-20 13:00:20', 'developer', '2021-04-20 01:01:16', 'developer'),
(8, 9, 'BAUT/HEXAM1250WTH', 'Baut Hexagon', '-', 'M12 x 50 Putih', 0, '2021-04-20 13:03:36', 'developer', '2021-04-20 01:04:12', 'developer'),
(9, 10, 'KNK/GRDDIAMOND75820', 'Batu Gerinda Diamond Groove', 'KNK', '75 x 8 x 20', 0, '2021-04-20 13:18:44', 'developer', '2021-04-20 01:19:23', 'developer'),
(10, 11, 'YMW/HNDTAP1-8X28', 'Hand Tap ', 'Yamawa', 'PT 1-8 x 28', 1, '2021-04-20 13:31:57', 'developer', '2021-05-03 23:47:11', 'developer'),
(11, 182, 'WIPRO/TGBY7INCH', 'Tang Buaya', 'Wipro', '7 inch', 0, '2021-04-20 13:41:56', 'developer', '2021-05-03 23:34:20', 'developer'),
(12, 13, 'TEKIRO/GRGJ12INCH', 'Gergaji ', 'Tekiro ', '12 inch', 0, '2021-04-20 13:48:27', 'developer', '2021-04-20 01:49:07', 'developer'),
(13, 14, 'TAIYO/FLPDSKA120', 'Flapdisc', 'Taiyo ', 'A120', 0, '2021-04-20 13:58:48', 'developer', '2021-04-22 03:23:55', 'developer'),
(14, 15, 'WD/40333ML', 'WD 40 ', '-', '333 ml', 0, '2021-04-20 14:00:21', 'developer', '2021-04-20 02:01:11', 'developer'),
(15, 16, 'NCH/DRILL3MM', 'Mata Bor', 'Nachi', 'dia 3.0 mm', 0, '2021-04-21 03:27:12', 'developer', '2021-04-21 03:28:31', 'developer'),
(16, 17, 'NCH/DRILL100MM', 'Mata Bor', 'Nachi', 'dia 10.0 mm', 0, '2021-04-21 03:27:51', 'developer', '2021-05-02 04:17:17', 'developer'),
(17, 40, 'NCH/ENDMILLD11S4', 'Endmill', 'Nachi', 'dia 11.0 S4', 0, '2021-04-21 06:04:11', 'developer', '2021-04-21 00:33:33', 'developer'),
(18, 19, 'YMW/HNDTAP1-4X19PT', 'Hand Tap', 'Yamawa', '1-4x19PT', 0, '2021-04-21 06:44:30', 'developer', '2021-05-03 23:46:59', 'developer'),
(19, 20, 'JCK/WIDIAA122', 'Pahat Bubut', 'JCK', 'A122', 0, '2021-04-21 09:36:34', 'developer', '2021-04-20 21:37:37', 'developer'),
(20, 90, 'SKD/EJECT10X200', 'Ejector Pin', 'SKD', 'dia 10 x 200', 0, '2021-04-21 09:52:03', 'developer', '2021-04-26 00:59:58', 'developer'),
(21, 22, 'BELLSTONE/15X13X150X180', 'Batu Poles ', 'Bellstone', '15 x 13 x 150 Grid 180', 1, '2021-04-21 09:58:07', 'developer', '2021-04-22 00:24:13', 'developer'),
(22, 23, 'JCK/WIDIAC109', 'Pahat Bubut ', 'JCK ', 'C109', 0, '2021-04-21 10:00:43', 'developer', '2021-04-20 22:01:54', 'developer'),
(23, 78, 'NCH/DRILL120MM', 'Mata Bor ', 'Nachi ', 'dia 12.0 mm', 0, '2021-04-21 10:28:53', 'developer', '2021-05-02 04:16:36', 'developer'),
(24, 79, 'NCH/DRILL105MM', 'Mata Bor ', 'Nachi ', 'dia 10.5 mm', 0, '2021-04-21 10:30:27', 'developer', '2021-04-24 02:41:48', 'developer'),
(25, 73, 'YMW/CTD3X60', 'Center Drill ', 'Yamawa ', '3 x 60 derajat', 0, '2021-04-21 10:32:20', 'developer', '2021-04-24 02:37:18', 'developer'),
(26, 84, 'RRT/SQLINE70X100', 'Square Line ', 'RRT ', '70 x 100', 0, '2021-04-21 10:39:29', 'developer', '2021-04-24 02:44:29', 'developer'),
(27, 76, 'NICHOLSEN/RNDBSTRD10', 'Kikir Round ', 'Nicholsen ', 'Bastard 10 inch', 0, '2021-04-21 11:36:44', 'developer', '2021-04-24 02:40:08', 'developer'),
(28, 75, 'NICHOLSEN/RNDBSTRD4', 'Kikir Round ', 'Nicholsen ', 'Bastard 4 inch', 0, '2021-04-21 11:38:55', 'developer', '2021-04-24 02:39:58', 'developer'),
(29, 74, 'NICHOLSEN/RNDBSTRD6', 'Kikir Round ', 'Nicholsen ', 'Bastard 6 inch', 0, '2021-04-21 11:40:34', 'developer', '2021-04-24 02:39:40', 'developer'),
(30, 86, 'TEKIRO/TGCOMB8', 'Tang Kombinasi ', 'Tekiro ', '8 inch', 0, '2021-04-21 11:42:03', 'developer', '2021-04-24 02:45:25', 'developer'),
(31, 80, 'WIPRO/DRILLWOODSET5', 'Mata Bor Kayu ', 'Wipro ', 'Set 5 pcs', 0, '2021-04-21 11:44:04', 'developer', '2021-04-24 02:42:24', 'developer'),
(32, 83, 'SKC/SNEYM12X175', 'Sney ', 'SKC', 'M12 x 1.75', 0, '2021-04-21 11:47:32', 'developer', '2021-04-24 02:44:01', 'developer'),
(33, 85, 'SKC/STANGSNY15', 'Stang Sney ', 'SKC ', '1.5 inch', 0, '2021-04-21 11:48:53', 'developer', '2021-04-24 02:44:56', 'developer'),
(34, 82, 'VERTEX/TGMBORVK5', 'Ragum Bor ', 'Vertex ', 'K-Type VK5 - 5 inch', 0, '2021-04-21 11:57:02', 'developer', '2021-04-24 02:43:25', 'developer'),
(35, 36, 'YG1/DRILL30MM', 'Mata Bor HSS', 'YG1 ', 'dia 3.0 mm', 8, '2021-04-21 12:12:40', 'developer', '2021-05-02 18:12:14', 'developer'),
(36, 37, 'YMW/SNEYM12X175', 'Sney', 'Yamawa ', 'M12 x 1.75', 0, '2021-04-21 12:15:34', 'developer', '2021-04-21 00:17:11', 'developer'),
(37, 38, 'YG1/ENDMILLD14S4', 'Endmill', 'YG1 ', 'dia 14.0 S4', 0, '2021-04-21 12:22:56', 'developer', '2021-04-21 00:25:07', 'developer'),
(38, 39, 'NCH/DRILL10X300', 'Mata Bor ', 'Nachi ', 'dia 10 x 300 mm', 0, '2021-04-21 12:28:50', 'developer', '2021-04-21 00:29:34', 'developer'),
(39, 41, 'HOLLOW/IRON40X60X15', 'Besi Hollow ', '-', '40 x 60 x 1.5 mm x 6 meter', 0, '2021-04-21 13:40:53', 'developer', '2021-04-21 01:41:38', 'developer'),
(40, 42, 'SIKU/IRON50X50X5', 'Besi Siku ', '-', '50 x 50 x 5 mm x 6 meter', 0, '2021-04-21 13:42:40', 'developer', '2021-04-21 01:43:38', 'developer'),
(41, 43, 'BOSCH/GRDPTG14INCH', 'Gerinda Potong', 'Bosch ', 'GCO 220 Cut off Machine 14 Inch', 0, '2021-04-21 13:45:47', 'developer', '2021-04-21 01:47:13', 'developer'),
(42, 44, 'STAR/REGLPGPRESS', 'Regulator LPG ', 'Star Cam', 'High Pressure', 0, '2021-04-21 14:30:23', 'developer', '2021-04-21 02:30:55', 'developer'),
(43, 45, 'MR/FRAISS', 'Perbaikan', 'Mesin', 'Bor Frais Kecil', 0, '2021-04-21 14:38:06', 'developer', '2021-04-21 02:38:47', 'developer'),
(44, 46, 'MR/CUTOFF', 'Perbaikan Mesin Gerinda Potong', 'Cut Off', '14 inch', 1, '2021-04-22 02:26:48', 'developer', '2021-04-22 02:28:07', 'developer'),
(45, 47, 'MR/NOZZLE', 'Perbaikan ', 'Nozzle', 'Pressure', 1, '2021-04-22 02:27:27', 'developer', '2021-04-22 02:28:42', 'developer'),
(46, 130, 'ARNTZ/BNDSW3505X4-6', 'Bandsaw', 'Arntz', '3505 x 27 x 0.9 x 4-6', 2, '2021-04-22 03:50:12', 'developer', '2021-04-28 01:46:39', 'developer'),
(47, 55, 'TAIYO/FLPDSK4X120', 'Flapdisc ', 'Taiyo ', '4 inch Grid 120', 0, '2021-04-22 11:48:45', 'developer', '2021-04-22 03:25:13', 'developer'),
(48, 50, 'DEERFOS/NWV4X120', 'Non Woven Abu ', 'Deerfos ', '4 inch grid 120', 0, '2021-04-22 11:50:58', 'developer', '2021-04-21 23:52:13', 'developer'),
(49, 51, 'KDS/MTR3', 'Roll Meteran ', 'KDS ', '3 meter', 0, '2021-04-22 11:57:52', 'developer', '2021-04-21 23:58:45', 'developer'),
(50, 52, 'SKC/SNEYM10X15', 'Sney ', 'SKC ', 'M10 x 1.5', 0, '2021-04-22 12:10:12', 'developer', '2021-04-22 00:11:42', 'developer'),
(51, 53, 'BELLSTONE/3X6X150X180', 'Batu Poles  ', 'Bellstone', '3 x 6 x 150 Grid 180', 0, '2021-04-22 12:16:23', 'developer', '2021-04-22 00:19:38', 'developer'),
(52, 54, 'BELLSTONE/15X13X150X240', 'Batu Poles', 'Bellstone', '15 x 13 x 5 Grid 240', 0, '2021-04-22 12:22:16', 'developer', '2021-04-22 00:25:34', 'developer'),
(53, 161, 'TAIYO/FLPDSK4X60', 'Flapdisc', 'Taiyo', '4 inch grid 60', 230, '2021-04-22 15:23:32', 'developer', '2021-05-02 05:38:53', 'developer'),
(54, 190, 'ULTRAFLEX/FLEXWA60-BF', 'Gerenda Flexible ', 'Ultraflex ', 'WA60-BF', 20, '2021-04-22 15:28:28', 'developer', '2021-05-04 18:08:18', 'developer'),
(55, 58, 'BOSCH/A60TBF100X12X16', 'Ultracut Metal', 'Bosch ', 'A60TBF 100 x 1.2 x 16 mm', 0, '2021-04-22 15:33:36', 'developer', '2021-04-22 03:34:32', 'developer'),
(56, 59, 'MR/LIFTING', 'Perbaikan  ', 'Lifting', 'Motor', 0, '2021-04-22 16:09:01', 'developer', '2021-04-22 04:11:46', 'developer'),
(57, 60, 'MR/DONGKRAK', 'Perbaikan', 'Dongkrak', 'Buaya', 0, '2021-04-22 16:09:46', 'developer', '2021-04-22 04:12:12', 'developer'),
(58, 88, 'NCH/DRILL4MM', 'Mata Bor', 'Nachi', 'dia 4.0 mm', 0, '2021-04-23 02:26:41', 'developer', '2021-04-24 02:58:12', 'developer'),
(59, 102, 'STARRET/BNDSW1753X10-14', 'Bandsaw ', 'Starret ', '1753 x 0.65 x 13 x 10-14', 5, '2021-04-23 02:50:14', 'developer', '2021-04-26 01:48:28', 'developer'),
(60, 63, 'YG1/DRILL110MM', 'Mata Bor HSS', 'YG1', 'dia 11.0 mm', 0, '2021-04-23 03:14:17', 'developer', '2021-05-02 18:11:52', 'developer'),
(61, 64, 'YG1/DRILL130MM', 'Mata Bor HSS', 'YG1', 'dia 13.0 mm', 0, '2021-04-23 03:15:02', 'developer', '2021-05-02 18:11:36', 'developer'),
(62, 77, 'INSIZE/MALULIR4-62TPI', 'Mal Ulir Metris ', 'Insize ', '4-62 tpi', 0, '2021-04-23 14:02:20', 'developer', '2021-04-24 02:39:04', 'developer'),
(63, 81, 'BOSCH/BORMULTY16', 'Mesin Bor Bolak Balik ', 'Bosch ', '16 mm', 0, '2021-04-23 14:04:25', 'developer', '2021-04-24 02:42:57', 'developer'),
(64, 69, 'TOKI/ROTARYBRFX0818', 'Rotary Burr ', 'Toki ', 'FX 0818 M06', 0, '2021-04-23 14:09:45', 'developer', '2021-04-23 02:11:54', 'developer'),
(65, 70, 'TOKI/ROTARYBRCX0820', 'Rotary Burr ', 'Toki ', 'CX 0820 M06', 0, '2021-04-23 14:12:33', 'developer', '2021-04-23 02:13:19', 'developer'),
(66, 71, 'NIKKO/RD7183-2MM', 'Elektrode RD718 ', 'Nikko ', 'dia 3.2 mm', 0, '2021-04-24 02:20:56', 'developer', '2021-04-24 03:02:51', 'superadmin'),
(67, 72, 'KOBE/LB52U3-2MM', 'Elektrode LB52U ', 'Kobe ', 'dia 3.2 mm', 0, '2021-04-24 02:21:56', 'developer', '2021-04-24 03:02:48', 'superadmin'),
(68, 87, 'NCH/DRILL35MM', 'Mata Bor', 'Nachi', 'dia 3.5 mm', 0, '2021-04-24 02:57:15', 'developer', '2021-04-24 02:57:45', 'developer'),
(69, 89, 'INSIZE/MICRO125-150MM', 'Outside Micrometer ', 'Insize ', '125-150 mm', 0, '2021-04-24 07:32:02', 'developer', '2021-04-23 19:32:46', 'developer'),
(70, 91, 'SKD/EJECT16X200', 'Ejector Pin', 'SKD', 'dia 16 x 200', 0, '2021-04-26 01:01:23', 'developer', '2021-04-26 01:02:09', 'developer'),
(71, 92, 'INSIZE/DIALCLP1312-150', 'Dial Caliper', 'Insize', '1312 - 150A 0 - 150 mm', 0, '2021-04-26 01:39:50', 'developer', '2021-04-26 01:40:20', 'developer'),
(72, 113, 'FOX/LEM25KG', 'Lem', 'Fox', '2.5 kg', 0, '2021-04-26 01:50:56', 'developer', '2021-04-26 22:01:08', 'developer'),
(73, 94, 'HOLDER/BLADESPB326', 'Holder Potong ', '-', 'SPB 326', 0, '2021-04-26 01:57:34', 'developer', '2021-04-26 01:58:25', 'developer'),
(74, 95, 'KORLOY/INSSP300PC9030', 'Insert ', 'Korloy', 'SP300 PC9030', 0, '2021-04-26 02:00:30', 'developer', '2021-04-26 02:01:19', 'developer'),
(75, 96, 'YMW/HNDTAPM14X2', 'Hand Tap', 'Yamawa', 'M14 x 2', 0, '2021-04-26 04:16:01', 'developer', '2021-04-26 04:19:13', 'developer'),
(76, 98, 'RESIBON/BTGRDA24S100X16', 'Batu Gerinda Slep ', 'Resibon ', 'A24S 100 x 6 x 16', 25, '2021-04-26 13:07:52', 'developer', '2021-04-26 01:10:13', 'developer'),
(77, 112, 'NIPPON/GRDFLEX100X2X16', 'Gerinda Flexible ', 'Nippon Resibon ', '100 x 2 x 16', 50, '2021-04-26 13:11:25', 'developer', '2021-04-26 21:59:06', 'developer'),
(78, 100, 'FORT/TIES36X300', 'Cable Ties ', 'Fort', '3.6 x 300', 0, '2021-04-26 13:13:43', 'developer', '2021-04-26 01:15:07', 'developer'),
(80, 101, 'ISCAR/INSERTIC908HM90', 'Insert', 'Iscar', 'HM90 APKT 1003PDR IC908', 0, '2021-04-26 13:35:14', 'developer', '2021-04-26 01:38:07', 'developer'),
(81, 103, 'ARGON/CERAMICNO8', 'Ceramic Las Argon ', '-', 'No. 8', 2, '2021-04-26 13:52:01', 'developer', '2021-04-26 01:52:54', 'developer'),
(82, 104, 'JCK/PHTBBT3-8X4', 'Pahat Bubut ', 'JCK ', 'HSS 3-8 x 4 inch', 0, '2021-04-26 13:59:36', 'developer', '2021-04-26 02:00:40', 'developer'),
(83, 105, 'BENZ/BOR13MM550', 'Mesin Bor Tembok Beton', 'Benz', '13 mm 550 watt', 0, '2021-04-27 09:07:30', 'developer', '2021-04-26 21:09:23', 'developer'),
(84, 106, 'BOSCH/GRDTNGNGWS060', 'Mesin Gerinda Tangan', 'Bosch', 'GWS 060', 0, '2021-04-27 09:10:31', 'developer', '2021-04-26 21:11:14', 'developer'),
(85, 107, 'BENZ/LASBARACUDA120A', 'Mesin Las', 'Benz', 'Inverter Baracuda 120A', 0, '2021-04-27 09:12:09', 'developer', '2021-04-26 21:12:42', 'developer'),
(86, 108, 'BENZ/DRILLSET25PCS', 'HSS Mata Bor Besi', 'Benz', 'set 25 pcs', 0, '2021-04-27 09:13:51', 'developer', '2021-04-26 21:14:22', 'developer'),
(87, 109, 'BOSCH/RUBPAD4INCH', 'Rubber Pad ', 'Bosch', '4 inch', 0, '2021-04-27 09:51:13', 'developer', '2021-04-26 21:52:19', 'developer'),
(88, 110, 'WIPRO/SIKUWMH4INCH', 'Siku Magnet ', 'Wipro', 'WMH-04 4 Inch', 0, '2021-04-27 09:53:51', 'developer', '2021-04-26 21:54:43', 'developer'),
(89, 111, 'WIPRO/WATERSK1506INCH', 'Siku Water Pas', 'Wipro ', ' SK 150 6 Inch', 1, '2021-04-27 09:55:51', 'developer', '2021-04-26 21:57:14', 'developer'),
(90, 114, 'GLASS/SEALCLEAR', 'Sealant ', 'Glass', 'Bening', 0, '2021-04-27 10:03:21', 'developer', '2021-04-26 22:04:48', 'developer'),
(91, 115, 'RRT/STANDMAG', 'Stand Dial Magnetic Base', 'RRT ', 'Standart', 0, '2021-04-27 10:08:17', 'developer', '2021-04-26 22:08:56', 'developer'),
(92, 116, 'RRT/VBLOKMAGKV7K', 'Block V Magnet ', 'RRT ', 'KV 7K', 0, '2021-04-27 10:09:40', 'developer', '2021-04-26 22:13:51', 'developer'),
(93, 117, 'TOKI/VERCAL150-002', 'Vernier Caliper ', 'Toki ', '150 mm - 0.02 mm', 0, '2021-04-27 10:14:55', 'developer', '2021-04-26 22:15:27', 'developer'),
(94, 118, 'NIKKO/RD2603-2MM', 'Elektrode RD260', 'Nikko', 'dia 3.2 mm', 0, '2021-04-28 07:43:30', 'developer', '2021-04-27 19:45:58', 'developer'),
(95, 120, 'YG6/SOLID30X165X6', 'Solid Carbide ', 'YG6', '30 x 165 x 6 mm', 0, '2021-04-28 12:02:53', 'developer', '2021-04-28 00:04:44', 'developer'),
(96, 121, 'GORYSON/ROTARYGT4700DXL', 'Rotary Burr ', 'Goryson ', 'GT 4700 DXL', 0, '2021-04-28 12:41:37', 'developer', '2021-04-28 00:42:24', 'developer'),
(97, 122, 'YMW/MCHNTPM12X175', 'Machine Tap ', 'Yamawa ', 'M12 x 1.75', 0, '2021-04-28 13:15:02', 'developer', '2021-04-28 01:15:43', 'developer'),
(98, 132, 'NCH/DRILL170MM', 'Mata Bor', 'Nachi', 'dia 17.0 mm', 0, '2021-04-29 01:36:09', 'developer', '2021-05-02 04:16:50', 'developer'),
(99, 133, 'MR/MOULDING', 'Ganjal', 'Moulding', 'Atas', 0, '2021-04-29 03:24:05', 'developer', '2021-04-29 03:26:34', 'developer'),
(100, 134, 'MR/TAMPERHEAD', 'Tamper', 'Head', '.', 0, '2021-04-29 03:27:25', 'developer', '2021-04-29 03:31:49', 'developer'),
(101, 135, 'MR/VIBRATOR', 'Meja', 'Vibrator', '.', 0, '2021-04-29 03:29:05', 'developer', '2021-04-29 03:31:41', 'developer'),
(102, 136, 'MR/BRACKET', 'Bracket', 'Moulding', '.', 0, '2021-04-29 03:30:55', 'developer', '2021-04-29 03:32:23', 'developer'),
(103, 137, 'MTR/5METER', 'Meteran', '5 meter', '.', 0, '2021-04-29 04:02:53', 'developer', '2021-04-29 04:03:31', 'developer'),
(104, 138, 'SKF/6304-2RSH', 'Bearing', 'SKF', '6304-2 RSH', 0, '2021-04-29 04:05:00', 'developer', '2021-04-29 04:05:30', 'developer'),
(105, 139, 'GWS/BROSTEL6-100', 'Brostel Gerenda', 'GWS', '6 - 100', 0, '2021-04-29 04:06:48', 'developer', '2021-04-29 04:07:19', 'developer'),
(106, 140, 'SKF/608-2RSH', 'Bearing', 'SKF', '608-2 RSH', 0, '2021-04-29 04:08:11', 'developer', '2021-04-29 04:08:43', 'developer'),
(107, 141, 'SKF/607-2RSH', 'Bearing', 'SKF', '607-2 RSH', 0, '2021-04-29 04:09:39', 'developer', '2021-04-29 04:10:07', 'developer'),
(108, 142, 'NCH/DRILL6MM', 'Mata Bor', 'Nachi', 'dia 6.0 mm', 0, '2021-04-29 04:11:10', 'developer', '2021-04-29 04:11:46', 'developer'),
(109, 143, 'ROUTER/BIDS12X1-2', 'Pisau Router Bids', '.', '12 x 1-2', 0, '2021-04-29 04:12:53', 'developer', '2021-04-29 04:13:18', 'developer'),
(110, 144, 'GRD/DIAMONDSAWBLADE', 'Gerenda Diamond Saw Blade', '.', '125 x 45 x 20 x 10 x 3 Y240', 0, '2021-04-29 04:15:17', 'developer', '2021-04-29 04:15:43', 'developer'),
(111, 145, 'RODA/9INCH', 'Roda Trolley', '.', 'Outside 9 inch As 25 mm Karet', 0, '2021-04-29 04:16:43', 'developer', '2021-04-29 04:17:14', 'developer'),
(112, 146, 'VERCHASEM/REDSILICON', 'Red Silicon', 'Verchasem', '650', 0, '2021-04-29 10:59:29', 'developer', '2021-04-28 23:00:27', 'developer'),
(113, 147, 'GOOD/KUAS1INCH', 'Kuas Putih', 'Good', '1 inch', 0, '2021-04-29 11:01:03', 'developer', '2021-04-28 23:01:36', 'developer'),
(114, 148, 'TOP/BLUE', 'Grease', 'TOP 1', 'Warna Biru', 0, '2021-04-29 11:02:49', 'developer', '2021-04-28 23:04:35', 'developer'),
(115, 159, 'YMW/MCHNTPM3X05', 'Machine Tap', 'Yamawa', 'M3 x 0.5', 0, '2021-04-29 11:14:37', 'developer', '2021-05-02 04:20:23', 'developer'),
(116, 150, 'RRT/DIALINDCANALOG', 'Dial Indikator ', 'RRT', 'Analog', 0, '2021-05-01 22:47:59', 'developer', '2021-05-04 00:05:22', 'developer'),
(117, 151, 'RRT/HIGHGAUGE', 'High Gauge ', 'RRT', '300 mm', 0, '2021-05-01 22:49:31', 'developer', '2021-05-01 22:49:58', 'developer'),
(118, 0, 'REDBO/INVERTCOGAS', 'Inventer CO', 'Redbo', '120T C02 Gasless', 1, '2021-05-01 22:50:58', 'developer', '2021-05-01 22:51:25', 'developer'),
(119, 0, 'REDBO/ELEKTRODE08', 'Kawat Las Tanpa Gas', 'Redbo ', ' 0.8 mm - 1 kg', 1, '2021-05-01 22:52:25', 'developer', '2021-05-01 22:52:52', 'developer'),
(120, 154, 'ALTECO/GLUEG', 'Lem', 'Alteco', '-', 0, '2021-05-02 04:01:19', 'developer', '2021-05-02 04:01:58', 'developer'),
(121, 155, 'MAJESTIC/KUAS3INCH', 'Kuas ', 'Majestic ', '3 inch', 0, '2021-05-02 04:02:48', 'developer', '2021-05-02 04:03:28', 'developer'),
(122, 156, 'MAJESTIC/KUAS2INCH', 'Kuas ', 'Majestic ', '2 inch', 0, '2021-05-02 04:04:10', 'developer', '2021-05-02 04:04:40', 'developer'),
(123, 157, 'NACHI/ISOLASI1INCH', 'Isolasi Kertas ', 'Nachi ', '1 inch', 2, '2021-05-02 04:07:25', 'developer', '2021-05-02 04:08:23', 'developer'),
(124, 158, 'NCH/DRILL33MM', 'Mata Bor', 'Nachi', 'dia 3.3 mm', 8, '2021-05-02 04:18:10', 'developer', '2021-05-02 04:19:08', 'developer'),
(125, 160, 'RPMT/INSERT10T3MOE', 'Insert', 'RPMT', '10T 3M0E', 0, '2021-05-02 04:26:07', 'developer', '2021-05-02 04:29:11', 'developer'),
(126, 162, 'PC/CUSTOM', 'Komputer Custom', '-', 'Core i5 9400f 8 Gb RAM DDR4 SSD M.2 NVME', 0, '2021-05-02 12:50:04', 'developer', '2021-05-02 00:50:52', 'developer'),
(127, 163, '3D/PRINTER59', '3D Printer Creality Ender 5 9 ', '-', '235 x 235 x 300', 0, '2021-05-02 12:51:58', 'developer', '2021-05-02 00:54:12', 'developer'),
(128, 164, '3D/PRINTER5PLUS', '3D Printer Creality Ender 5 Plus ', '-', '350 x 350 x 400', 0, '2021-05-02 12:53:59', 'developer', '2021-05-02 00:54:47', 'developer'),
(129, 165, 'MAYKESTAG/TEAMERMCHN12MM', 'Reamer Mesin ', 'Maykestag ', 'dia 12.0 mm', 0, '2021-05-03 01:46:16', 'developer', '2021-05-03 01:46:52', 'developer'),
(130, 166, 'NIPPON/GRDPTG10INCH', 'Gerinda Potong ', 'Nippon Resibon ', '10 inch', 0, '2021-05-03 02:00:24', 'developer', '2021-05-03 02:00:53', 'developer'),
(131, 167, 'NIPPON/GRDPTG14INCH', 'Gerinda Potong ', 'Nippon Resibon ', '14 inch', 0, '2021-05-03 02:01:40', 'developer', '2021-05-03 02:02:10', 'developer'),
(132, 168, 'INSIZE/MICRO100-125MM', 'Outside Micrometer', 'Insize', '100-125 mm', 1, '2021-05-03 02:29:08', 'developer', '2021-05-03 02:29:30', 'developer'),
(133, 169, 'ADVANCE/OILSX2T', 'Oli Samping', 'Advance', 'SX 2T - 0.7 liter', 0, '2021-05-03 03:35:28', 'developer', '2021-05-03 03:43:51', 'developer'),
(134, 170, 'SAE10/OILSAE10', 'Oli Mesin', '-', 'SAE 10', 0, '2021-05-03 03:37:18', 'developer', '2021-05-03 03:43:32', 'developer'),
(135, 171, 'XEBEC/CRMSTN1X4X100', 'Ceramic Stone ', 'Xebec ', '1 x 4 x 100 grid 400 Orange', 0, '2021-05-03 05:09:56', 'developer', '2021-05-03 05:10:31', 'developer'),
(136, 172, 'YG1/DRILL50MM', 'Mata Bor HSS', 'YG1 ', 'dia 5.0 mm', 0, '2021-05-03 06:08:50', 'developer', '2021-05-02 18:10:06', 'developer'),
(137, 173, 'YG1/DRILL80MM', 'Mata Bor HSS ', 'YG1 ', 'dia 8.0 mm', 0, '2021-05-03 06:10:46', 'developer', '2021-05-02 18:11:11', 'developer'),
(138, 174, 'YG1/DRILLGP50MM', 'Mata Bor Gold-P ', 'YG1 ', 'dia 5.0 mm', 0, '2021-05-03 06:13:13', 'developer', '2021-05-02 18:13:41', 'developer'),
(139, 175, 'YG1/DRILLGP80MM', 'Mata Bor Gold-P ', 'YG1 ', 'dia 8.0 mm', 0, '2021-05-03 06:14:26', 'developer', '2021-05-02 18:15:00', 'developer'),
(140, 176, 'YG1/DRILLGP85MM', 'Mata Bor Gold-P', 'YG1 ', 'dia 8.5 mm', 0, '2021-05-03 06:15:42', 'developer', '2021-05-02 18:16:10', 'developer'),
(141, 177, 'STARRET/BNDSW1505X8-12', 'Bendsaw', 'Starret', '1505 x 13 x 0.65 x 8-12', 0, '2021-05-03 07:17:28', 'developer', '2021-05-02 19:19:56', 'developer'),
(142, 178, 'STARRET/BNDSW2234X8-12', 'Bandsaw', 'Starret', '2234 x 13 x 0.65 x 8-12', 0, '2021-05-03 07:21:26', 'developer', '2021-05-02 19:21:51', 'developer'),
(143, 179, 'STARRET/BNDSW2400X8-12', 'Bandsaw ', 'Starret', '2400 x 13 x 0.9 x 8-12', 0, '2021-05-03 07:23:31', 'developer', '2021-05-02 19:24:01', 'developer'),
(144, 180, 'SKD/EJECT3X100', 'Ejector Pin', 'SKD', 'dia 3 x 100', 0, '2021-05-03 07:45:01', 'developer', '2021-05-02 19:47:23', 'developer'),
(145, 181, 'SAE40/OILSAE40', 'Oli Mesin', 'Pertamina', 'SAE 40', 0, '2021-05-04 04:17:59', 'developer', '2021-05-04 04:24:58', 'developer'),
(146, 183, 'SKC/HNDTAPM11X1.5', 'Hand Tap', 'SKC', 'M11 x 1.5', 0, '2021-05-04 11:48:33', 'developer', '2021-05-03 23:49:19', 'developer'),
(147, 184, 'RRT/DIALINDCANDIGIT', 'Dial Indikator', 'RRT', 'Digital', 0, '2021-05-04 12:06:11', 'developer', '2021-05-04 00:08:05', 'developer'),
(148, 185, 'WIPRO/WATERPGK12', 'Siku Water Pas', 'Wipro', 'PGK12 300 ml', 0, '2021-05-04 12:10:15', 'developer', '2021-05-04 00:11:29', 'developer'),
(149, 186, 'REDBO/ELEKTRODE08FLUX', 'Kawat Las Tapa Gas', 'Redbo', '0.8 Kawat Las Flux Core Tanpa Gas - 1 kg', 0, '2021-05-04 12:14:34', 'developer', '2021-05-05 01:00:20', 'developer'),
(150, 0, 'REDBO/ELEKTRODEMIG08', 'Kawat Las', 'Redbo ', 'MIG 0.8 mm', 0, '2021-05-04 12:16:16', 'developer', '2021-05-04 00:16:44', 'developer'),
(151, 188, 'HUATONG/ELEKTRODECO08', 'Kawat Las CO', 'Huatong', 'dia 0.8 mm', 0, '2021-05-05 03:34:06', 'developer', '2021-05-05 03:41:55', 'developer'),
(152, 189, 'WD/GRDPTG4INCH', 'Gerinda Potong ', 'WD ', '4 inch', 0, '2021-05-05 06:05:25', 'developer', '2021-05-04 18:06:17', 'developer'),
(153, 191, 'YMW/HNDTAPM3X05', 'Hand Tap', 'Yamawa', 'M3 x 0.5', 0, '2021-05-05 11:11:46', 'developer', '2021-05-04 23:13:37', 'developer'),
(154, 192, 'NCH/DRILL180MM', 'Mata Bor', 'Nachi', 'dia 18.0 mm', 0, '2021-05-05 11:21:16', 'developer', '2021-05-04 23:28:03', 'developer'),
(155, 193, 'YMW/HNDTAPM16X2', 'Hand Tap ', 'Yamawa ', 'M16 x 2', 0, '2021-05-05 11:29:20', 'developer', '2021-05-04 23:35:16', 'developer'),
(156, 194, 'MAY/MCHNREAMER16MM', 'Machine Reamer ', 'Maykestag ', 'dia 16.0 mm Type 3080', 0, '2021-05-05 11:43:47', 'developer', '2021-05-04 23:46:48', 'developer'),
(157, 195, 'YMW/HNDTAPM8X125', 'Hand Tap ', 'Yamawa ', 'M8 x 1.25', 0, '2021-05-05 11:57:44', 'developer', '2021-05-06 02:10:45', 'developer'),
(158, 196, 'YMW/HNDTAPM10X15', 'Hand Tap', 'Yamawa', 'M10 x 1.5', 0, '2021-05-05 11:59:26', 'developer', '2021-05-06 02:10:25', 'developer');

-- --------------------------------------------------------

--
-- Table structure for table `m_barang_plus`
--

CREATE TABLE `m_barang_plus` (
  `id` int(11) NOT NULL,
  `tgl_jt_tempo` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `id_m_nota` int(11) DEFAULT NULL,
  `id_m_barang` int(11) DEFAULT NULL,
  `qty_plus` int(11) DEFAULT NULL,
  `qty_ket` varchar(99) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `ppn` int(1) DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang_plus`
--

INSERT INTO `m_barang_plus` (`id`, `tgl_jt_tempo`, `tgl_bayar`, `tgl_masuk`, `id_m_nota`, `id_m_barang`, `qty_plus`, `qty_ket`, `harga`, `ppn`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '2021-04-21', '2021-04-21', '2021-04-20', 1, 1, 1, 'Roll', 0, 0, 'Cash', '2021-04-20 01:47:16', 'developer', '2021-04-20 01:47:16', NULL),
(2, '2021-04-21', '2021-04-21', '2021-04-20', 1, 2, 1, 'Roll', 0, 0, 'Cash', '2021-04-20 01:49:41', 'developer', '2021-04-20 01:49:41', NULL),
(3, '2021-04-21', '2021-04-21', '2021-04-20', 1, 3, 1, 'PCS', 0, 0, 'Cash', '2021-04-20 03:56:50', 'developer', '2021-04-20 03:56:50', NULL),
(4, '2021-04-21', '2021-04-21', '2021-04-20', 1, 4, 1, 'PCS', 0, 0, 'Cash', '2021-04-20 03:57:17', 'developer', '2021-04-20 03:57:17', NULL),
(5, '2021-04-21', '2021-04-21', '2021-04-20', 1, 5, 1, 'PCS', 0, 0, 'Cash', '2021-04-20 03:58:11', 'developer', '2021-04-20 03:58:11', NULL),
(6, '2021-04-21', '2021-04-21', '2021-04-20', 2, 4, 5, 'PCS', 97000, 0, 'Cash', '2021-04-20 12:25:04', 'developer', '2021-04-20 12:25:04', NULL),
(7, '2021-05-19', NULL, '2021-04-20', 3, 6, 2, 'Roll', 0, 0, 'Kredit', '2021-04-20 12:49:59', 'developer', '2021-04-20 12:49:59', NULL),
(8, '2021-05-04', NULL, '2021-04-20', 4, 7, 1, 'Unit', 259000, 0, 'Kredit', '2021-04-20 13:01:16', 'developer', '2021-04-20 13:01:16', NULL),
(9, '2021-04-22', '2021-04-22', '2021-04-21', 5, 8, 2, 'Set', 0, 0, 'Cash', '2021-04-20 13:04:12', 'developer', '2021-04-20 13:04:12', NULL),
(10, '2021-04-20', '2021-04-20', '2021-04-19', 6, 9, 4, 'PCS', 275000, 0, 'Cash', '2021-04-20 13:19:23', 'developer', '2021-04-20 13:19:23', NULL),
(11, '2021-04-21', '2021-04-21', '2021-04-20', 2, 10, 2, 'PCS', 208000, 0, 'Cash', '2021-04-20 13:32:49', 'developer', '2021-04-20 13:32:49', NULL),
(12, '2021-05-04', NULL, '2021-04-20', 4, 11, 1, 'PCS', 91000, 0, 'Kredit', '2021-04-20 13:42:51', 'developer', '2021-04-20 13:42:51', NULL),
(13, '2021-04-21', '2021-04-21', '2021-04-20', 7, 12, 10, 'PCS', 15000, 0, 'Cash', '2021-04-20 13:49:07', 'developer', '2021-04-20 13:49:07', NULL),
(14, '2021-04-21', '2021-04-21', '2021-04-20', 1, 13, 10, 'PCS', 0, 0, 'Cash', '2021-04-20 13:59:36', 'developer', '2021-04-20 13:59:36', NULL),
(15, '2021-05-04', NULL, '2021-04-20', 4, 14, 5, 'PCS', 55000, 0, 'Kredit', '2021-04-20 14:01:11', 'developer', '2021-04-20 14:01:11', NULL),
(16, '2021-04-21', '2021-04-21', '2021-04-21', 1, 15, 3, 'PCS', 0, 0, 'Cash', '2021-04-21 03:28:31', 'developer', '2021-04-21 03:28:31', NULL),
(17, '2021-04-21', '2021-04-21', '2021-04-21', 1, 16, 2, 'PCS', 0, 0, 'Cash', '2021-04-21 03:29:03', 'developer', '2021-04-21 03:29:03', NULL),
(18, '2021-04-21', '2021-04-21', '2021-04-21', 1, 17, 1, 'PCS', 0, 0, 'Cash', '2021-04-21 06:04:34', 'developer', '2021-04-21 06:04:34', NULL),
(19, '2021-04-16', '2021-04-21', '2021-04-16', 1, 18, 1, 'PCS', 0, 0, 'Cash', '2021-04-21 06:46:12', 'developer', '2021-04-21 06:46:12', NULL),
(20, '2021-04-21', '2021-04-21', '2021-04-21', 8, 19, 20, 'PCS', 53400, 0, 'Cash', '2021-04-21 09:37:37', 'developer', '2021-04-21 09:37:37', NULL),
(21, '2021-04-21', '2021-04-21', '2021-04-21', 9, 20, 30, 'PCS', 32000, 0, 'Cash', '2021-04-21 09:52:49', 'developer', '2021-04-21 09:52:49', NULL),
(22, '2021-04-21', '2021-04-21', '2021-04-21', 9, 21, 5, 'PCS', 65000, 0, 'Cash', '2021-04-21 09:58:39', 'developer', '2021-04-21 09:58:39', NULL),
(23, '2021-05-05', NULL, '2021-04-21', 10, 22, 10, 'PCS', 37800, 0, 'Kredit', '2021-04-21 10:01:54', 'developer', '2021-04-21 10:01:54', NULL),
(24, '2021-04-21', '2021-04-21', '2021-04-21', 11, 23, 10, 'PCS', 112000, 0, 'Cash', '2021-04-21 10:29:50', 'developer', '2021-04-21 10:29:50', NULL),
(25, '2021-04-21', '2021-04-21', '2021-04-21', 11, 24, 20, 'PCS', 89500, 0, 'Cash', '2021-04-21 10:31:18', 'developer', '2021-04-21 10:31:18', NULL),
(26, '2021-04-21', '2021-04-21', '2021-04-21', 11, 25, 20, 'PCS', 86500, 0, 'Cash', '2021-04-21 10:33:22', 'developer', '2021-04-21 10:33:22', NULL),
(27, '2021-04-21', '2021-04-21', '2021-04-21', 11, 26, 2, 'PCS', 295000, 0, 'Cash', '2021-04-21 10:40:10', 'developer', '2021-04-21 10:40:10', NULL),
(28, '2021-05-05', NULL, '2021-04-21', 10, 27, 10, 'PCS', 128500, 0, 'Kredit', '2021-04-21 11:37:35', 'developer', '2021-04-21 11:37:35', NULL),
(29, '2021-05-05', NULL, '2021-04-21', 10, 28, 10, 'PCS', 81500, 0, 'Kredit', '2021-04-21 11:39:41', 'developer', '2021-04-21 11:39:41', NULL),
(30, '2021-05-05', NULL, '2021-04-21', 10, 29, 10, 'PCS', 87200, 0, 'Kredit', '2021-04-21 11:41:08', 'developer', '2021-04-21 11:41:08', NULL),
(31, '2021-05-05', NULL, '2021-04-21', 10, 30, 5, 'PCS', 55000, 0, 'Kredit', '2021-04-21 11:42:44', 'developer', '2021-04-21 11:42:44', NULL),
(32, '2021-05-05', NULL, '2021-04-21', 10, 31, 1, 'Set', 175000, 0, 'Kredit', '2021-04-21 11:44:45', 'developer', '2021-04-21 11:44:45', NULL),
(33, '2021-05-05', NULL, '2021-04-21', 10, 32, 5, 'PCS', 80300, 0, 'Kredit', '2021-04-21 11:48:13', 'developer', '2021-04-21 11:48:13', NULL),
(34, '2021-05-05', NULL, '2021-04-21', 10, 33, 5, 'PCS', 105600, 0, 'Kredit', '2021-04-21 11:49:28', 'developer', '2021-04-21 11:49:28', NULL),
(35, '2021-05-21', NULL, '2021-04-21', 12, 34, 2, 'Unit', 1810000, 0, 'Kredit', '2021-04-21 11:58:04', 'developer', '2021-04-21 11:58:04', NULL),
(36, '2021-04-21', '2021-04-21', '2021-04-21', 1, 35, 10, 'PCS', 0, 0, 'Cash', '2021-04-21 12:13:21', 'developer', '2021-04-21 12:13:21', NULL),
(37, '2021-04-21', '2021-04-21', '2021-04-21', 11, 36, 2, 'PCS', 778000, 0, 'Cash', '2021-04-21 12:17:11', 'developer', '2021-04-21 12:17:11', NULL),
(38, '2021-04-21', '2021-04-21', '2021-04-21', 13, 37, 3, 'PCS', 251486, 0, 'Cash', '2021-04-21 12:25:07', 'developer', '2021-04-21 12:25:07', NULL),
(39, '2021-04-21', '2021-04-21', '2021-04-21', 11, 38, 1, 'PCS', 541000, 0, 'Cash', '2021-04-21 12:29:34', 'developer', '2021-04-21 12:29:34', NULL),
(40, '2021-04-21', '2021-04-21', '2021-04-21', 11, 17, 1, 'PCS', 242000, 0, 'Cash', '2021-04-21 12:33:33', 'developer', '2021-04-21 12:33:33', NULL),
(41, '2021-04-21', '2021-04-21', '2021-04-21', 14, 39, 12, 'Lonjor', 224000, 0, 'Cash', '2021-04-21 13:41:38', 'developer', '2021-04-21 13:41:38', NULL),
(42, '2021-04-21', '2021-04-21', '2021-04-21', 15, 40, 30, 'Lonjor', 270000, 0, 'Cash', '2021-04-21 13:43:38', 'developer', '2021-04-21 13:43:38', NULL),
(43, '2021-04-21', '2021-04-21', '2021-04-21', 16, 41, 4, 'Unit', 0, 0, 'Cash', '2021-04-21 13:47:13', 'developer', '2021-04-21 13:47:13', NULL),
(44, '2021-04-21', '2021-04-21', '2021-04-21', 16, 42, 4, 'PCS', 0, 0, 'Cash', '2021-04-21 14:30:55', 'developer', '2021-04-21 14:30:55', NULL),
(45, '2021-04-21', '2021-04-21', '2021-04-21', 1, 43, 1, 'Unit', 0, 0, 'Cash', '2021-04-21 14:38:47', 'developer', '2021-04-21 14:38:47', NULL),
(46, '2021-04-22', '2021-04-21', '2021-04-22', 1, 44, 1, 'Unit', 200000, 0, 'Cash', '2021-04-22 02:28:07', 'developer', '2021-04-22 02:28:07', NULL),
(47, '2021-04-22', '2021-04-21', '2021-04-22', 1, 45, 1, 'Unit', 150000, 0, 'Cash', '2021-04-22 02:28:42', 'developer', '2021-04-22 02:28:42', NULL),
(48, '2021-04-22', '2021-04-21', '2021-04-22', 1, 46, 1, 'Roll', 0, 0, 'Cash', '2021-04-22 03:51:12', 'developer', '2021-04-22 03:51:12', NULL),
(49, '2021-04-22', '2021-04-21', '2021-04-22', 1, 47, 50, 'PCS', 0, 0, 'Cash', '2021-04-22 11:49:26', 'developer', '2021-04-22 11:49:26', NULL),
(50, '2021-04-23', '2021-04-23', '2021-04-23', 17, 48, 20, 'PCS', 0, 0, 'Cash', '2021-04-22 11:52:13', 'developer', '2021-04-22 11:52:13', NULL),
(51, '2021-05-06', NULL, '2021-04-22', 18, 49, 16, 'PCS', 75000, 0, 'Kredit', '2021-04-22 11:58:45', 'developer', '2021-04-22 11:58:45', NULL),
(52, '2021-05-06', NULL, '2021-04-22', 18, 50, 1, 'PCS', 80300, 0, 'Kredit', '2021-04-22 12:11:42', 'developer', '2021-04-22 12:11:42', NULL),
(53, '2021-04-22', '2021-04-22', '2021-04-22', 19, 51, 1, 'PCS', 55000, 0, 'Cash', '2021-04-22 12:19:38', 'developer', '2021-04-22 12:19:38', NULL),
(54, '2021-04-22', '2021-04-22', '2021-04-22', 19, 52, 2, 'PCS', 70000, 0, 'Cash', '2021-04-22 12:25:34', 'developer', '2021-04-22 12:25:34', NULL),
(55, '2021-04-23', '2021-04-21', '2021-04-23', 1, 47, 50, 'PCS', 0, 0, 'Cash', '2021-04-22 15:25:13', 'developer', '2021-04-22 15:25:13', NULL),
(56, '2021-04-23', '2021-04-21', '2021-04-23', 1, 53, 50, 'PCS', 0, 0, 'Cash', '2021-04-22 15:25:48', 'developer', '2021-04-22 15:25:48', NULL),
(57, '2021-04-22', '2021-04-22', '2021-04-22', 20, 54, 50, 'PCS', 8250, 0, 'Cash', '2021-04-22 15:31:06', 'developer', '2021-04-22 15:31:06', NULL),
(58, '2021-05-06', NULL, '2021-04-22', 18, 55, 100, 'PCS', 8500, 0, 'Kredit', '2021-04-22 15:34:32', 'developer', '2021-04-22 15:34:32', NULL),
(59, '2021-04-23', '2021-04-21', '2021-04-23', 1, 56, 1, 'Unit', 0, 0, 'Cash', '2021-04-22 16:11:46', 'developer', '2021-04-22 16:11:46', NULL),
(60, '2021-04-23', '2021-04-21', '2021-04-23', 1, 57, 1, 'Unit', 0, 0, 'Cash', '2021-04-22 16:12:12', 'developer', '2021-04-22 16:12:12', NULL),
(61, '2021-04-23', '2021-04-21', '2021-04-23', 1, 59, 5, 'Roll', 0, 0, 'Cash', '2021-04-23 02:51:03', 'developer', '2021-04-23 02:51:03', NULL),
(62, '2021-04-23', '2021-04-21', '2021-04-23', 1, 58, 2, 'PCS', 0, 0, 'Cash', '2021-04-23 02:55:48', 'developer', '2021-04-23 02:55:48', NULL),
(63, '2021-04-23', '2021-04-21', '2021-04-23', 1, 60, 1, 'PCS', 0, 0, 'Cash', '2021-04-23 03:16:41', 'developer', '2021-04-23 03:16:41', NULL),
(64, '2021-04-23', '2021-04-21', '2021-04-23', 1, 61, 1, 'PCS', 0, 0, 'Cash', '2021-04-23 03:17:12', 'developer', '2021-04-23 03:17:12', NULL),
(65, '2021-04-23', '2021-04-21', '2021-04-23', 1, 53, 40, 'PCS', 0, 0, 'Cash', '2021-04-23 03:19:32', 'developer', '2021-04-23 03:19:32', NULL),
(66, '2021-04-23', '2021-04-21', '2021-04-23', 1, 53, 110, 'PCS', 0, 0, 'Cash', '2021-04-23 03:52:50', 'developer', '2021-04-23 03:52:50', NULL),
(67, '2021-04-21', '2021-04-21', '2021-04-21', 16, 62, 1, 'PCS', 0, 0, 'Cash', '2021-04-23 14:03:00', 'developer', '2021-04-23 14:03:00', NULL),
(68, '2021-04-21', '2021-04-21', '2021-04-21', 16, 63, 1, 'Unit', 0, 0, 'Cash', '2021-04-23 14:04:55', 'developer', '2021-04-23 14:04:55', NULL),
(69, '2021-04-23', '2021-04-23', '2021-04-23', 21, 64, 10, 'PCS', 38000, 0, 'Cash', '2021-04-23 14:11:54', 'developer', '2021-04-23 14:11:54', NULL),
(70, '2021-04-23', '2021-04-23', '2021-04-23', 21, 65, 20, 'PCS', 38000, 0, 'Cash', '2021-04-23 14:13:19', 'developer', '2021-04-23 14:13:19', NULL),
(71, '2021-04-22', '2021-04-21', '2021-04-22', 1, 66, 5, 'KG', 0, 0, 'Cash', '2021-04-24 02:22:52', 'developer', '2021-04-24 02:22:52', NULL),
(72, '2021-04-22', '2021-04-21', '2021-04-22', 1, 67, 5, 'KG', 0, 0, 'Cash', '2021-04-24 02:23:19', 'developer', '2021-04-24 02:23:19', NULL),
(73, '2021-04-21', '2021-04-21', '2021-04-21', 1, 25, 20, 'PCS', 86500, 0, 'Cash', '2021-04-24 02:37:18', 'developer', '2021-04-24 02:37:18', NULL),
(74, '2021-05-05', '2021-04-21', '2021-04-21', 1, 29, 10, 'PCS', 87200, 0, 'Cash', '2021-04-24 02:37:59', 'developer', '2021-04-24 02:39:40', 'developer'),
(75, '2021-05-05', '2021-04-21', '2021-04-21', 1, 28, 10, 'PCS', 81500, 0, 'Cash', '2021-04-24 02:38:16', 'developer', '2021-04-24 02:39:58', 'developer'),
(76, '2021-05-05', '2021-04-21', '2021-04-21', 1, 27, 10, 'PCS', 128500, 0, 'Cash', '2021-04-24 02:38:33', 'developer', '2021-04-24 02:40:08', 'developer'),
(77, '2021-04-21', '2021-04-21', '2021-04-21', 1, 62, 1, 'PCS', 0, 0, 'Cash', '2021-04-24 02:39:04', 'developer', '2021-04-24 02:39:04', NULL),
(78, '2021-04-21', '2021-04-21', '2021-04-21', 1, 23, 10, 'PCS', 112000, 0, 'Cash', '2021-04-24 02:40:59', 'developer', '2021-04-24 02:40:59', NULL),
(79, '2021-04-21', '2021-04-21', '2021-04-21', 1, 24, 20, 'PCS', 89500, 0, 'Cash', '2021-04-24 02:41:48', 'developer', '2021-04-24 02:41:48', NULL),
(80, '2021-05-05', '2021-04-21', '2021-04-21', 1, 31, 1, 'Set', 175000, 0, 'Cash', '2021-04-24 02:42:24', 'developer', '2021-04-24 02:42:24', NULL),
(81, '2021-04-21', '2021-04-21', '2021-04-21', 1, 63, 1, 'Unit', 0, 0, 'Cash', '2021-04-24 02:42:57', 'developer', '2021-04-24 02:42:57', NULL),
(82, '2021-05-21', '2021-04-21', '2021-04-21', 1, 34, 2, 'Unit', 1810000, 0, 'Cash', '2021-04-24 02:43:25', 'developer', '2021-04-24 02:43:25', NULL),
(83, '2021-05-05', '2021-04-21', '2021-04-21', 1, 32, 5, 'PCS', 80300, 0, 'Cash', '2021-04-24 02:44:01', 'developer', '2021-04-24 02:44:01', NULL),
(84, '2021-04-21', '2021-04-21', '2021-04-21', 1, 26, 2, 'PCS', 295000, 0, 'Cash', '2021-04-24 02:44:29', 'developer', '2021-04-24 02:44:29', NULL),
(85, '2021-05-05', '2021-04-21', '2021-04-21', 1, 33, 5, 'PCS', 105600, 0, 'Cash', '2021-04-24 02:44:56', 'developer', '2021-04-24 02:44:56', NULL),
(86, '2021-05-05', '2021-04-21', '2021-04-21', 1, 30, 5, 'PCS', 55000, 0, 'Cash', '2021-04-24 02:45:25', 'developer', '2021-04-24 02:45:25', NULL),
(87, '2021-04-22', '2021-04-21', '2021-04-22', 1, 68, 3, 'PCS', 0, 0, 'Cash', '2021-04-24 02:57:45', 'developer', '2021-04-24 02:57:45', NULL),
(88, '2021-04-23', '2021-04-21', '2021-04-23', 1, 58, 3, 'PCS', 0, 0, 'Cash', '2021-04-24 02:58:12', 'developer', '2021-04-24 02:58:12', NULL),
(89, '2021-04-22', '2021-04-21', '2021-04-22', 16, 69, 1, 'PCS', 0, 0, 'Cash', '2021-04-24 07:32:46', 'developer', '2021-04-24 07:32:46', NULL),
(90, '2021-04-24', '2021-04-24', '2021-04-24', 22, 20, 20, 'PCS', 34000, 0, 'Cash', '2021-04-26 00:59:58', 'developer', '2021-04-26 00:59:58', NULL),
(91, '2021-04-24', '2021-04-24', '2021-04-24', 22, 70, 3, 'PCS', 107000, 0, 'Cash', '2021-04-26 01:02:09', 'developer', '2021-04-26 01:02:09', NULL),
(92, '2021-04-26', '2021-04-21', '2021-04-26', 1, 71, 1, 'PCS', 0, 0, 'Cash', '2021-04-26 01:40:20', 'developer', '2021-04-26 01:40:20', NULL),
(93, '2021-04-26', '2021-04-26', '2021-04-26', 23, 72, 2, 'Kaleng', 0, 0, 'Cash', '2021-04-26 01:51:28', 'developer', '2021-04-26 01:51:28', NULL),
(94, '2021-04-25', '2021-04-25', '2021-04-25', 24, 73, 1, 'PCS', 200000, 0, 'Cash', '2021-04-26 01:58:25', 'developer', '2021-04-26 01:58:25', NULL),
(95, '2021-04-25', '2021-04-25', '2021-04-25', 24, 74, 1, 'Box', 650000, 0, 'Cash', '2021-04-26 02:01:19', 'developer', '2021-04-26 02:01:19', NULL),
(96, '2021-04-26', '2021-04-21', '2021-04-26', 1, 75, 1, 'Set', 0, 0, 'Cash', '2021-04-26 04:19:14', 'developer', '2021-04-26 04:19:14', NULL),
(97, '2021-04-26', '2021-04-21', '2021-04-26', 1, 76, 100, 'PCS', 0, 0, 'Cash', '2021-04-26 13:08:30', 'developer', '2021-04-26 13:08:30', NULL),
(98, '2021-05-11', NULL, '2021-04-27', 25, 76, 50, 'PCS', 10500, 0, 'Kredit', '2021-04-26 13:10:13', 'developer', '2021-04-26 13:10:13', NULL),
(99, '2021-04-26', '2021-04-21', '2021-04-26', 1, 77, 50, 'PCS', 0, 0, 'Cash', '2021-04-26 13:11:53', 'developer', '2021-04-26 13:11:53', NULL),
(100, '2021-04-27', '2021-04-27', '2021-04-27', 26, 78, 10, 'Pack', 0, 0, 'Cash', '2021-04-26 13:15:07', 'developer', '2021-04-26 13:15:07', NULL),
(101, '2021-05-25', NULL, '2021-04-26', 27, 80, 10, 'PCS', 575000, 0, 'Kredit', '2021-04-26 13:38:07', 'developer', '2021-04-26 13:38:07', NULL),
(102, '2021-05-25', NULL, '2021-04-26', 28, 59, 15, 'Roll', 0, 0, 'Kredit', '2021-04-26 13:48:28', 'developer', '2021-04-26 13:48:28', NULL),
(103, '2021-05-11', NULL, '2021-04-27', 25, 81, 2, 'PCS', 10000, 0, 'Kredit', '2021-04-26 13:52:54', 'developer', '2021-04-26 13:52:54', NULL),
(104, '2021-05-11', NULL, '2021-04-27', 25, 82, 2, 'PCS', 80500, 0, 'Kredit', '2021-04-26 14:00:40', 'developer', '2021-04-26 14:00:40', NULL),
(105, '2021-04-27', '2021-04-21', '2021-04-27', 1, 83, 1, 'PCS', 245000, 0, 'Cash', '2021-04-27 09:09:23', 'developer', '2021-04-27 09:09:23', NULL),
(106, '2021-04-27', '2021-04-21', '2021-04-27', 1, 84, 1, 'PCS', 345000, 0, 'Cash', '2021-04-27 09:11:14', 'developer', '2021-04-27 09:11:14', NULL),
(107, '2021-04-27', '2021-04-21', '2021-04-27', 1, 85, 1, 'PCS', 460000, 0, 'Cash', '2021-04-27 09:12:42', 'developer', '2021-04-27 09:12:42', NULL),
(108, '2021-04-27', '2021-04-21', '2021-04-27', 1, 86, 1, 'Set', 184000, 0, 'Cash', '2021-04-27 09:14:22', 'developer', '2021-04-27 09:14:22', NULL),
(109, '2021-05-12', NULL, '2021-04-28', 29, 87, 8, 'PCS', 95000, 0, 'Kredit', '2021-04-27 09:52:19', 'developer', '2021-04-27 09:52:19', NULL),
(110, '2021-05-12', NULL, '2021-04-28', 29, 88, 4, 'PCS', 49000, 0, 'Kredit', '2021-04-27 09:54:43', 'developer', '2021-04-27 09:54:43', NULL),
(111, '2021-05-12', NULL, '2021-04-28', 29, 89, 1, 'PCS', 1540000, 0, 'Kredit', '2021-04-27 09:57:14', 'developer', '2021-04-27 09:57:14', NULL),
(112, '2021-05-12', NULL, '2021-04-28', 29, 77, 200, 'PCS', 14200, 0, 'Kredit', '2021-04-27 09:59:06', 'developer', '2021-04-27 09:59:06', NULL),
(113, '2021-04-27', '2021-04-27', '2021-04-27', 30, 72, 5, 'Kaleng', 165000, 0, 'Cash', '2021-04-27 10:01:08', 'developer', '2021-04-27 10:01:08', NULL),
(114, '2021-04-27', '2021-04-27', '2021-04-27', 31, 90, 10, 'PCS', 40000, 0, 'Cash', '2021-04-27 10:04:48', 'developer', '2021-04-27 10:04:48', NULL),
(115, '2021-04-27', '2021-04-27', '2021-04-27', 32, 91, 4, 'PCS', 135000, 0, 'Cash', '2021-04-27 10:08:56', 'developer', '2021-04-27 10:08:56', NULL),
(116, '2021-04-27', '2021-04-27', '2021-04-27', 32, 92, 2, 'Set', 208000, 0, 'Cash', '2021-04-27 10:13:51', 'developer', '2021-04-27 10:13:51', NULL),
(117, '2021-04-27', '2021-04-27', '2021-04-27', 32, 93, 1, 'PCS', 90000, 0, 'Cash', '2021-04-27 10:15:27', 'developer', '2021-04-27 10:15:27', NULL),
(118, '2021-04-29', '2021-04-29', '2021-04-29', 33, 94, 5, 'KG', 24500, 0, 'Cash', '2021-04-28 07:45:58', 'developer', '2021-04-28 07:45:58', NULL),
(119, '2021-04-29', '2021-04-29', '2021-04-29', 33, 54, 10, 'PCS', 9000, 0, 'Cash', '2021-04-28 07:46:42', 'developer', '2021-04-28 07:46:42', NULL),
(120, '2021-04-28', '2021-04-28', '2021-04-28', 34, 95, 1, 'PCS', 1110000, 0, 'Cash', '2021-04-28 12:04:44', 'developer', '2021-04-28 12:04:44', NULL),
(121, '2021-04-28', '2021-04-28', '2021-04-28', 34, 96, 1, 'PCS', 624000, 0, 'Cash', '2021-04-28 12:42:24', 'developer', '2021-04-28 12:42:24', NULL),
(122, '2021-04-28', '2021-04-28', '2021-04-28', 34, 97, 1, 'PCS', 242000, 0, 'Cash', '2021-04-28 13:15:43', 'developer', '2021-04-28 13:15:43', NULL),
(123, '2021-04-28', '2021-04-28', '2021-04-28', 34, 3, 1, 'PCS', 75000, 0, 'Cash', '2021-04-28 13:16:58', 'developer', '2021-04-28 13:16:58', NULL),
(124, '2021-04-28', '2021-04-28', '2021-04-28', 34, 4, 1, 'PCS', 97000, 0, 'Cash', '2021-04-28 13:17:26', 'developer', '2021-04-28 13:17:26', NULL),
(125, '2021-04-28', '2021-04-28', '2021-04-28', 34, 4, 1, 'PCS', 97000, 0, 'Cash', '2021-04-28 13:17:27', 'developer', '2021-04-28 13:17:27', NULL),
(126, '2021-04-28', '2021-04-28', '2021-04-28', 34, 5, 1, 'PCS', 144000, 0, 'Cash', '2021-04-28 13:18:38', 'developer', '2021-04-28 13:18:38', NULL),
(127, '2021-05-26', NULL, '2021-04-26', 35, 2, 5, 'Roll', 264000, 0, 'Kredit', '2021-04-28 13:38:59', 'developer', '2021-04-28 13:38:59', NULL),
(128, '2021-05-26', NULL, '2021-04-26', 35, 1, 5, 'Roll', 264000, 0, 'Kredit', '2021-04-28 13:41:12', 'developer', '2021-04-28 13:41:12', NULL),
(129, '2021-05-26', NULL, '2021-04-26', 35, 6, 1, 'Roll', 390000, 0, 'Kredit', '2021-04-28 13:44:35', 'developer', '2021-04-28 13:44:35', NULL),
(130, '2021-05-26', NULL, '2021-04-26', 35, 46, 2, 'Roll', 410000, 0, 'Kredit', '2021-04-28 13:46:39', 'developer', '2021-04-28 13:46:39', NULL),
(131, '2021-04-28', '2021-04-28', '2021-04-28', 1, 1, 2, 'Roll', 264000, 0, 'Cash', '2021-04-28 13:51:32', 'developer', '2021-04-28 13:51:32', NULL),
(132, '2021-04-29', '2021-04-28', '2021-04-29', 1, 98, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 01:36:50', 'developer', '2021-04-29 01:36:50', NULL),
(133, '2021-04-27', '2021-04-28', '2021-04-27', 1, 99, 1, 'Unit', 0, 0, 'Cash', '2021-04-29 03:26:34', 'developer', '2021-04-29 03:26:34', NULL),
(134, '2021-04-27', '2021-04-28', '2021-04-27', 1, 100, 1, 'Unit', 0, 0, 'Cash', '2021-04-29 03:27:52', 'developer', '2021-04-29 03:27:52', NULL),
(135, '2021-04-27', '2021-04-28', '2021-04-27', 1, 101, 1, 'Unit', 0, 0, 'Cash', '2021-04-29 03:30:14', 'developer', '2021-04-29 03:30:14', NULL),
(136, '2021-04-27', '2021-04-28', '2021-04-27', 1, 102, 1, 'Unit', 0, 0, 'Cash', '2021-04-29 03:32:23', 'developer', '2021-04-29 03:32:23', NULL),
(137, '2021-04-19', '2021-04-28', '2021-04-19', 1, 103, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 04:03:31', 'developer', '2021-04-29 04:03:31', NULL),
(138, '2021-04-19', '2021-04-28', '2021-04-19', 1, 104, 8, 'PCS', 0, 0, 'Cash', '2021-04-29 04:05:30', 'developer', '2021-04-29 04:05:30', NULL),
(139, '2021-04-19', '2021-04-28', '2021-04-19', 1, 105, 2, 'PCS', 0, 0, 'Cash', '2021-04-29 04:07:19', 'developer', '2021-04-29 04:07:19', NULL),
(140, '2021-04-19', '2021-04-28', '2021-04-19', 1, 106, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 04:08:43', 'developer', '2021-04-29 04:08:43', NULL),
(141, '2021-04-19', '2021-04-28', '2021-04-19', 1, 107, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 04:10:07', 'developer', '2021-04-29 04:10:07', NULL),
(142, '2021-04-19', '2021-04-28', '2021-04-19', 1, 108, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 04:11:46', 'developer', '2021-04-29 04:11:46', NULL),
(143, '2021-04-19', '2021-04-28', '2021-04-19', 1, 109, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 04:13:18', 'developer', '2021-04-29 04:13:18', NULL),
(144, '2021-04-19', '2021-04-28', '2021-04-19', 1, 110, 1, 'PCS', 0, 0, 'Cash', '2021-04-29 04:15:43', 'developer', '2021-04-29 04:15:43', NULL),
(145, '2021-04-19', '2021-04-28', '2021-04-19', 1, 111, 2, 'PCS', 0, 0, 'Cash', '2021-04-29 04:17:14', 'developer', '2021-04-29 04:17:14', NULL),
(146, '2021-05-13', NULL, '2021-04-29', 36, 112, 5, 'PCS', 37500, 0, 'Kredit', '2021-04-29 11:00:27', 'developer', '2021-04-29 11:00:27', NULL),
(147, '2021-05-13', NULL, '2021-04-29', 36, 113, 15, 'PCS', 2500, 0, 'Kredit', '2021-04-29 11:01:36', 'developer', '2021-04-29 11:01:36', NULL),
(148, '2021-04-29', '2021-04-29', '2021-04-29', 37, 114, 1, 'PCS', 50000, 0, 'Cash', '2021-04-29 11:04:35', 'developer', '2021-04-29 11:04:35', NULL),
(149, '2021-04-29', '2021-04-28', '2021-04-29', 1, 115, 5, 'PCS', 0, 0, 'Cash', '2021-04-29 11:15:24', 'developer', '2021-04-29 11:15:24', NULL),
(150, '2021-04-21', '2021-04-21', '2021-04-21', 16, 116, 3, 'PCS', 0, 0, 'Cash', '2021-05-01 22:48:50', 'developer', '2021-05-01 22:48:50', NULL),
(151, '2021-04-21', '2021-04-21', '2021-04-21', 16, 117, 1, 'PCS', 0, 0, 'Cash', '2021-05-01 22:49:58', 'developer', '2021-05-01 22:49:58', NULL),
(154, '2021-05-14', NULL, '2021-04-30', 38, 120, 50, 'PCS', 7000, 0, 'Kredit', '2021-05-02 04:01:58', 'developer', '2021-05-02 04:01:58', NULL),
(155, '2021-05-14', NULL, '2021-04-30', 38, 121, 12, 'PCS', 5500, 0, 'Kredit', '2021-05-02 04:03:28', 'developer', '2021-05-02 04:03:28', NULL),
(156, '2021-05-14', NULL, '2021-04-30', 38, 122, 12, 'PCS', 4000, 0, 'Kredit', '2021-05-02 04:04:40', 'developer', '2021-05-02 04:04:40', NULL),
(157, '2021-04-30', NULL, '2021-04-30', 39, 123, 102, 'PCS', 4350, 0, 'Cash', '2021-05-02 04:08:23', 'developer', '2021-05-02 04:08:23', NULL),
(158, '2021-04-30', NULL, '2021-04-30', 40, 124, 10, 'PCS', 0, 0, 'Cash', '2021-05-02 04:19:08', 'developer', '2021-05-02 04:19:08', NULL),
(159, '2021-04-30', NULL, '2021-04-30', 40, 115, 5, 'PCS', 0, 0, 'Cash', '2021-05-02 04:20:23', 'developer', '2021-05-02 04:20:23', NULL),
(160, '2021-05-30', NULL, '2021-04-30', 41, 125, 10, 'PCS', 0, 0, 'Kredit', '2021-05-02 04:29:11', 'developer', '2021-05-02 04:29:11', NULL),
(161, '2021-04-23', NULL, '2021-04-23', 1, 53, 400, 'PCS', 0, 0, 'Cash', '2021-05-02 05:38:53', 'developer', '2021-05-02 05:38:53', NULL),
(162, '2021-04-30', NULL, '2021-04-30', 1, 126, 2, 'Unit', 0, 0, 'Cash', '2021-05-02 12:50:52', 'developer', '2021-05-02 12:50:52', NULL),
(163, '2021-04-30', NULL, '2021-04-30', 1, 127, 1, 'Unit', 0, 0, 'Cash', '2021-05-02 12:52:48', 'developer', '2021-05-02 12:52:48', NULL),
(164, '2021-04-30', NULL, '2021-04-30', 1, 128, 1, 'Unit', 0, 0, 'Cash', '2021-05-02 12:54:47', 'developer', '2021-05-02 12:54:47', NULL),
(165, '2021-05-03', NULL, '2021-05-03', 1, 129, 1, 'PCS', 0, 0, 'Cash', '2021-05-03 01:46:52', 'developer', '2021-05-03 01:46:52', NULL),
(166, '2021-05-03', NULL, '2021-05-03', 1, 130, 10, 'PCS', 0, 0, 'Cash', '2021-05-03 02:00:53', 'developer', '2021-05-03 02:00:53', NULL),
(167, '2021-05-03', NULL, '2021-05-03', 1, 131, 10, 'PCS', 0, 0, 'Cash', '2021-05-03 02:02:10', 'developer', '2021-05-03 02:02:10', NULL),
(168, '2021-05-03', NULL, '2021-05-03', 1, 132, 1, 'PCS', 0, 0, 'Cash', '2021-05-03 02:29:30', 'developer', '2021-05-03 02:29:30', NULL),
(169, '2021-05-03', NULL, '2021-05-03', 1, 133, 1, 'PCS', 30000, 0, 'Cash', '2021-05-03 03:36:16', 'developer', '2021-05-03 03:43:51', 'developer'),
(170, '2021-05-03', NULL, '2021-05-03', 1, 134, 10, 'Liter', 28000, 0, 'Cash', '2021-05-03 03:37:45', 'developer', '2021-05-03 03:43:32', 'developer'),
(171, '2021-05-03', NULL, '2021-05-03', 1, 135, 2, 'PCS', 0, 0, 'Cash', '2021-05-03 05:10:31', 'developer', '2021-05-03 05:10:31', NULL),
(172, '2021-05-03', NULL, '2021-05-03', 1, 136, 2, 'PCS', 0, 0, 'Cash', '2021-05-03 06:10:06', 'developer', '2021-05-03 06:10:06', NULL),
(173, '2021-05-03', NULL, '2021-05-03', 1, 137, 1, 'PCS', 0, 0, 'Cash', '2021-05-03 06:11:11', 'developer', '2021-05-03 06:11:11', NULL),
(174, '2021-05-03', NULL, '2021-05-03', 1, 138, 2, 'PCS', 0, 0, 'Cash', '2021-05-03 06:13:41', 'developer', '2021-05-03 06:13:41', NULL),
(175, '2021-05-03', NULL, '2021-05-03', 1, 139, 1, 'PCS', 0, 0, 'Cash', '2021-05-03 06:15:00', 'developer', '2021-05-03 06:15:00', NULL),
(176, '2021-05-03', NULL, '2021-05-03', 1, 140, 2, 'PCS', 0, 0, 'Cash', '2021-05-03 06:16:10', 'developer', '2021-05-03 06:16:10', NULL),
(177, '2021-05-03', NULL, '2021-05-03', 1, 141, 5, 'Roll', 0, 0, 'Cash', '2021-05-03 07:19:56', 'developer', '2021-05-03 07:19:56', NULL),
(178, '2021-05-03', NULL, '2021-05-03', 1, 142, 5, 'Roll', 0, 0, 'Cash', '2021-05-03 07:21:51', 'developer', '2021-05-03 07:21:51', NULL),
(179, '2021-05-03', NULL, '2021-05-03', 1, 143, 5, 'Roll', 0, 0, 'Cash', '2021-05-03 07:24:01', 'developer', '2021-05-03 07:24:01', NULL),
(180, '2021-05-03', NULL, '2021-05-03', 42, 144, 115, 'PCS', 13000, 0, 'Cash', '2021-05-03 07:47:23', 'developer', '2021-05-03 07:47:23', NULL),
(181, '2021-05-03', NULL, '2021-05-03', 1, 145, 10, 'Liter', 0, 0, 'Cash', '2021-05-04 04:24:58', 'developer', '2021-05-04 04:24:58', NULL),
(182, '2021-05-19', NULL, '2021-05-05', 43, 11, 2, 'PCS', 91000, 0, 'Kredit', '2021-05-04 11:34:20', 'developer', '2021-05-04 11:34:20', NULL),
(183, '2021-05-19', NULL, '2021-05-05', 43, 146, 1, 'Set', 127500, 0, 'Kredit', '2021-05-04 11:49:19', 'developer', '2021-05-04 11:49:19', NULL),
(184, '2021-04-21', NULL, '2021-04-21', 16, 147, 1, 'PCS', 0, 0, 'Cash', '2021-05-04 12:08:05', 'developer', '2021-05-04 12:08:05', NULL),
(185, '2021-04-21', NULL, '2021-04-21', 16, 148, 1, 'PCS', 0, 0, 'Cash', '2021-05-04 12:11:29', 'developer', '2021-05-04 12:11:29', NULL),
(186, '2021-04-21', NULL, '2021-04-21', 16, 149, 1, 'Unit', 0, 0, 'Cash', '2021-05-04 12:15:02', 'developer', '2021-05-04 12:15:02', NULL),
(188, '2021-05-05', NULL, '2021-05-05', 1, 151, 6, 'Roll', 0, 0, 'Cash', '2021-05-05 03:41:55', 'developer', '2021-05-05 03:41:55', NULL),
(189, '2021-05-03', NULL, '2021-05-03', 1, 152, 20, 'PCS', 0, 0, 'Cash', '2021-05-05 06:06:17', 'developer', '2021-05-05 06:06:17', NULL),
(190, '2021-05-05', NULL, '2021-05-05', 44, 54, 40, 'PCS', 8500, 0, 'Cash', '2021-05-05 06:08:18', 'developer', '2021-05-05 06:08:18', NULL),
(191, '2021-05-05', NULL, '2021-05-05', 1, 153, 1, 'Set', 0, 0, 'Cash', '2021-05-05 11:13:37', 'developer', '2021-05-05 11:13:37', NULL),
(192, '2021-05-05', NULL, '2021-05-05', 45, 154, 1, 'PCS', 0, 0, 'Cash', '2021-05-05 11:28:03', 'developer', '2021-05-05 11:28:03', NULL),
(193, '2021-05-05', NULL, '2021-05-05', 45, 155, 1, 'Set', 0, 0, 'Cash', '2021-05-05 11:30:05', 'developer', '2021-05-04 23:35:16', 'developer'),
(194, '2021-05-05', NULL, '2021-05-05', 46, 156, 1, 'PCS', 0, 0, 'Kredit', '2021-05-05 11:46:48', 'developer', '2021-05-05 11:46:48', NULL),
(195, '2021-05-05', NULL, '2021-05-05', 1, 157, 1, 'Set', 0, 0, 'Cash', '2021-05-05 11:58:30', 'developer', '2021-05-05 11:58:30', NULL),
(196, '2021-05-05', NULL, '2021-05-05', 45, 158, 1, 'Set', 0, 0, 'Cash', '2021-05-05 11:59:58', 'developer', '2021-05-05 11:59:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_invoice`
--

CREATE TABLE `m_invoice` (
  `id` int(11) NOT NULL,
  `id_pl` int(11) NOT NULL,
  `tgl_jt` date DEFAULT NULL,
  `no_nota` varchar(99) NOT NULL,
  `no_faktur` varchar(99) NOT NULL,
  `no_inv` int(11) NOT NULL,
  `up` varchar(99) NOT NULL,
  `via` int(1) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `tgl_byr` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_invoice`
--

INSERT INTO `m_invoice` (`id`, `id_pl`, `tgl_jt`, `no_nota`, `no_faktur`, `no_inv`, `up`, `via`, `ongkir`, `tgl_byr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2021-05-20', '0199/NS/ST/IV/21', '-', 0, 'Bp Irwan', 0, 0, NULL, '2021-04-20 02:04:01', 'superadmin', '2021-04-29 03:08:52', 'superadmin'),
(2, 2, '2021-05-20', '0200/NS/ST/IV/21', '-', 0, 'Ibu Susi', 0, 0, NULL, '2021-04-20 04:04:17', 'superadmin', '2021-04-20 04:04:17', NULL),
(6, 3, '2021-05-21', '0201/NS/ST/IV/21', '-', 0, 'Bp Matius', 0, 0, NULL, '2021-04-21 01:27:06', 'superadmin', '2021-04-21 01:27:06', NULL),
(7, 5, '2021-05-21', '0196/NS/ST/IV/21', '-', 0, 'Bp Kusjiarko', 0, 0, NULL, '2021-04-21 01:39:07', 'superadmin', '2021-04-21 01:39:07', NULL),
(8, 6, '2021-05-21', '0197/NS/ST/IV/21', '-', 0, 'Bp Kusjiarko', 0, 0, NULL, '2021-04-21 01:40:25', 'superadmin', '2021-04-21 01:40:25', NULL),
(9, 7, '2021-05-21', '0198/NS/ST/IV/21', '-', 0, 'Bp Kusjiarko', 0, 0, NULL, '2021-04-21 01:41:02', 'superadmin', '2021-04-21 01:41:02', NULL),
(10, 11, '2021-05-21', '0204/NS/ST/IV/21', '-', 0, 'Ibu Astri', 0, 0, NULL, '2021-04-21 03:37:14', 'superadmin', '2021-04-21 03:37:14', NULL),
(11, 4, '2021-05-21', '0191/NS/ST/IV/21', '-', 0, 'Bp Sarwaka', 0, 0, NULL, '2021-04-21 05:57:12', 'superadmin', '2021-04-21 05:57:12', NULL),
(12, 0, '2021-05-21', '89826240/NS/SMA/IV/21', '010.002.21.89826240', 155, 'Ibu Lucia', 0, 0, NULL, '2021-04-21 06:54:36', 'superadmin', '2021-04-21 06:54:36', NULL),
(13, 10, '2021-05-21', '89826241/NS/SMA/IV/21', '010.002.21.89826241', 0, 'Ibu Lucia', 0, 0, NULL, '2021-04-21 06:56:32', 'superadmin', '2021-04-21 06:56:32', NULL),
(14, 22, '2021-05-22', '89826243/NS/SMA/IV/21', '020.002.21.89826243', 0, 'Bp Ruyanto', 2, 0, '2021-04-28', '2021-04-21 14:15:26', 'superadmin', '2021-04-21 14:15:26', NULL),
(15, 23, '2021-05-22', '89826244/NS/SMA/IV/21', '010.002.21.89826244', 0, 'Bp Wahyu', 0, 0, NULL, '2021-04-21 14:46:52', 'superadmin', '2021-04-21 14:46:52', NULL),
(17, 30, '2021-05-25', '89826245/NS/SMA/IV/21', '010.002.21.89826245', 0, 'Bp Didik Darmawan', 0, 0, NULL, '2021-04-23 12:28:21', 'superadmin', '2021-04-23 12:28:21', NULL),
(23, 35, '2021-05-23', '89826249/NS/SMA/IV/21', '010.002.21.89826249', 0, 'Bp Arif', 0, 0, NULL, '2021-04-24 02:40:51', 'superadmin', '2021-04-24 04:19:10', 'superadmin'),
(24, 25, '2021-05-21', '0205/NS/ST/IV/21', '0205/NS/ST/IV/21', 0, 'Ibu Astri', 0, 0, NULL, '2021-04-24 02:46:47', 'superadmin', '2021-04-24 02:46:47', NULL),
(25, 0, '2021-05-22', '89826248/NS/SMA/IV/21', '010.002.21.89826248', 6, 'Bp Hendro Ari', 1, 0, '2021-04-29', '2021-04-24 03:08:26', 'superadmin', '2021-04-24 04:10:24', 'superadmin'),
(26, 38, '2021-05-15', '0189/NS/ST/IV/21', '0189/NS/ST/IV/21', 0, 'Ibu Astri', 0, 0, NULL, '2021-04-24 03:20:08', 'superadmin', '2021-04-24 03:20:08', NULL),
(27, 16, '2021-05-22', '0202/NS/ST/IV/21', '0202/NS/ST/IV/21', 0, 'Bp Bono', 0, 0, NULL, '2021-04-24 04:12:26', 'superadmin', '2021-04-24 04:12:26', NULL),
(28, 31, '2021-05-22', '0208/NS/ST/IV/21', '0208/NS/ST/IV/21', 0, 'Ibu Ina', 0, 0, NULL, '2021-04-24 07:25:56', 'superadmin', '2021-04-24 07:25:56', NULL),
(29, 26, '2021-05-22', '89826250/NS/SMA/IV/21', '010.002.21.89826250', 0, 'Bp Narto', 0, 0, NULL, '2021-04-24 07:44:31', 'superadmin', '2021-04-24 07:44:31', NULL),
(30, 29, '2021-05-22', '89826251/NS/SMA/IV/21', '010.002.21.89826251', 0, 'Ibu Dwi', 0, 0, NULL, '2021-04-24 07:59:56', 'superadmin', '2021-04-24 07:59:56', NULL),
(31, 39, '2021-05-23', '0206/NS/ST/IV/21', '0206/NS/ST/IV/21', 0, 'Bp Joko Mursito', 0, 45000, NULL, '2021-04-24 08:12:43', 'superadmin', '2021-04-24 08:12:43', NULL),
(32, 28, '2021-05-25', '89826252/NS/SMA/IV/21', '010.002.21.89826252', 0, 'Ibu Lucia', 0, 0, NULL, '2021-04-24 08:22:42', 'superadmin', '2021-04-24 08:22:42', NULL),
(33, 40, '2021-05-25', '89826253/NS/SMA/IV/21', '010.002.21.89826253', 0, 'Bp Narto', 0, 0, NULL, '2021-04-26 01:20:14', 'superadmin', '2021-04-26 01:31:30', 'superadmin'),
(34, 41, '2021-05-25', '0214/NS/SMA/IV/21', '0214', 0, 'Bp Mrajak', 0, 0, NULL, '2021-04-26 01:46:42', 'superadmin', '2021-04-26 01:46:42', NULL),
(35, 15, '2021-05-25', '0194/NS/ST/IV/21', '0194', 0, 'Bp Aji Saksono', 0, 0, NULL, '2021-04-26 03:43:21', 'superadmin', '2021-04-26 03:43:21', NULL),
(36, 45, '2021-05-27', '89826254/NS/SMA/IV/21', '010.002.21.89826254', 0, 'Ibu Lucia', 0, 0, NULL, '2021-04-26 13:03:43', 'superadmin', '2021-04-26 13:03:43', NULL),
(37, 50, '2021-05-26', '0211/NS/ST/IV/21', '0211', 0, 'Ibu Wuri', 0, 0, NULL, '2021-04-26 14:05:42', 'superadmin', '2021-04-26 14:05:42', NULL),
(38, 32, '2021-05-26', '0209/NS/ST/IV/21', '0209', 0, 'Bp Deni', 0, 0, NULL, '2021-04-27 02:40:36', 'superadmin', '2021-04-27 02:40:36', NULL),
(39, 18, '2021-05-21', '89826246/NS/SMA/IV/21', '010.002.21.89826246', 0, 'Ibu Irine Isti', 0, 0, NULL, '2021-04-27 06:42:13', 'superadmin', '2021-04-27 06:42:13', NULL),
(40, 19, '2021-05-21', '89826247/NS/SMA/IV/21', '010.002.21.89826247', 0, 'Ibu Irine Isti', 0, 0, NULL, '2021-04-27 06:45:29', 'superadmin', '2021-04-27 06:45:29', NULL),
(41, 51, '2021-05-23', '0203/NS/ST/IV/21', '0203', 0, 'Bp Danang Wijaya', 0, 0, NULL, '2021-04-27 09:19:20', 'superadmin', '2021-04-29 03:07:07', 'superadmin'),
(42, 42, '2021-05-25', '89826255/NS/SMA/IV/21', '010.002.21.89826255', 0, 'Bp Agustinus', 0, 0, NULL, '2021-04-28 02:54:30', 'superadmin', '2021-04-28 02:54:30', NULL),
(43, 47, '2021-05-26', '89826256/NS/SMA/IV/21', '010.002.21.89826256', 0, 'Bp Eko', 0, 0, NULL, '2021-04-28 03:21:03', 'superadmin', '2021-04-28 03:21:03', NULL),
(44, 33, '2021-05-22', '89826257/NS/SMA/IV/21', '010.002.21.89826257', 0, 'Bp Agustinus', 0, 0, NULL, '2021-04-28 03:30:16', 'superadmin', '2021-04-29 03:08:10', 'superadmin'),
(45, 43, '2021-05-25', '89826258/NS/SMA/IV/21', '020.002.21.89826258', 0, 'Bp Basirun', 0, 0, NULL, '2021-04-28 03:41:01', 'superadmin', '2021-04-29 03:07:34', 'superadmin'),
(46, 9, '2021-05-20', '89826193/NS/SMA/IV/21', '010.002.21.89826193', 0, 'Ibu Nindya', 0, 0, NULL, '2021-04-28 11:37:05', 'superadmin', '2021-04-28 11:37:05', NULL),
(47, 20, '2021-05-22', '89826194/NS/SMA/IV/21', '010.002.21.89826194', 0, 'Bp Narto', 0, 0, NULL, '2021-04-28 11:45:34', 'superadmin', '2021-04-28 11:45:34', NULL),
(48, 0, '2021-05-22', '89826229/NS/SMA/IV/21', '010.002.21.89826229', 7, 'Bp Narto', 0, 0, NULL, '2021-04-28 11:53:33', 'superadmin', '2021-04-28 11:53:33', NULL),
(49, 54, '2021-05-28', '89826230/NS/SMA/IV/21', '010.002.21.89826230', 0, 'Bp Feri', 0, 0, NULL, '2021-04-28 12:09:56', 'superadmin', '2021-04-29 03:05:48', 'superadmin'),
(50, 44, '2021-05-25', '89826231/NS/SMA/IV/21', '010.002.21.89826231', 0, 'Ibu Endang', 0, 0, NULL, '2021-04-28 12:21:54', 'superadmin', '2021-04-29 03:06:39', 'superadmin'),
(51, 0, '2021-05-27', '89826259/NS/SMA/IV/21', '010.002.21.89826259', 11, 'Bp Feri', 0, 0, NULL, '2021-04-28 12:29:31', 'superadmin', '2021-04-29 03:06:19', 'superadmin'),
(52, 55, '2021-05-29', '89826260/NS/SMA/IV/21', '010.002.21.89826260', 0, 'Bp Eko', 0, 0, NULL, '2021-04-28 12:50:09', 'superadmin', '2021-04-28 12:50:09', NULL),
(53, 0, '2021-05-26', '89826261/NS/SMA/IV/21', '010.002.21.89826261', 10, 'Bp Feri', 0, 0, NULL, '2021-04-28 13:04:39', 'superadmin', '2021-04-29 03:05:20', 'superadmin'),
(54, 57, '2021-05-28', '89826262/NS/SMA/IV/21', '010.002.21.89826262', 0, 'Ibu Endang', 0, 0, NULL, '2021-04-28 13:28:41', 'superadmin', '2021-04-29 02:31:37', 'superadmin'),
(55, 58, '2021-05-28', '0216/NS/ST/IV/21', '0216', 0, 'Bp Irwan', 0, 0, NULL, '2021-04-28 13:53:18', 'superadmin', '2021-04-28 13:53:18', NULL),
(58, 59, '2021-05-28', '0215/NS/ST/IV/21', '0215', 0, 'Ibu Ina', 0, 0, NULL, '2021-04-29 01:39:23', 'superadmin', '2021-04-29 03:04:38', 'superadmin'),
(59, 60, '2021-04-27', '0130/NS/ST/IV/21', '0130', 0, 'Bp Rudi', 2, 0, '2021-04-27', '2021-04-29 03:50:07', 'superadmin', '2021-04-29 03:50:07', NULL),
(60, 61, '2021-05-18', '89826263/NS/SMA/IV/21', '010.002.21.89826263', 0, 'Bp Agustinus', 0, 0, NULL, '2021-04-29 04:27:33', 'superadmin', '2021-04-29 04:27:33', NULL),
(61, 56, '2021-05-29', '89826215/NS/SMA/IV/21', '010.002.21.89826215', 0, 'Ibu Lucia', 0, 0, NULL, '2021-04-29 10:54:14', 'superadmin', '2021-04-29 10:54:14', NULL),
(62, 62, '2021-05-29', '89826264/NS/SMA/IV/21', '010.002.21.89826264', 0, 'Ibu Lucia', 0, 0, NULL, '2021-04-29 11:08:46', 'superadmin', '2021-04-29 11:08:46', NULL),
(63, 67, '2021-06-02', '0217/NS/ST/V/21', '0217', 0, 'Ibu Susi', 0, 0, NULL, '2021-05-02 05:33:09', 'superadmin', '2021-05-02 05:33:09', NULL),
(64, 0, '2021-06-02', '0210/NS/ST/V/21', '0210', 2, 'Bp Kliwon', 0, 0, NULL, '2021-05-02 05:42:20', 'superadmin', '2021-05-02 05:42:20', NULL),
(65, 72, '2021-06-02', '89826216/NS/SMA/V/21', '010.002.21.89826216', 0, 'Bp Anton', 0, 0, NULL, '2021-05-03 05:13:34', 'superadmin', '2021-05-03 05:13:34', NULL),
(66, 73, '2021-05-25', '0212/NS/ST/IV/21', '0212', 0, 'Bp Darso', 0, 0, NULL, '2021-05-03 06:21:48', 'superadmin', '2021-05-03 06:21:48', NULL),
(67, 0, '2021-06-02', '89826265/NS/SMA/V/21', '010.002.21.89826265', 1, 'Bp Feri', 0, 0, NULL, '2021-05-03 06:35:47', 'superadmin', '2021-05-03 06:35:47', NULL),
(68, 64, '2021-06-02', '89826266/NS/SMA/V/21', '010.002.21.89826266', 0, 'Bp Feri', 0, 0, NULL, '2021-05-03 06:43:03', 'superadmin', '2021-05-04 12:54:15', 'superadmin'),
(69, 66, '2021-06-02', '89826267/NS/SMA/V/21', '010.002.21.89826267', 0, 'Ibu Harti', 0, 0, NULL, '2021-05-03 06:53:45', 'superadmin', '2021-05-03 06:53:45', NULL),
(70, 71, '2021-06-02', '89826268/NS/SMA/V/21', '010.002.21.89826268', 0, 'Bp Agustinus', 0, 0, NULL, '2021-05-03 07:02:00', 'superadmin', '2021-05-03 07:02:00', NULL),
(71, 70, '2021-06-02', '89826269/NS/SMA/V/21', '010.002.21.89826269', 0, 'Ibu Endang', 0, 0, NULL, '2021-05-03 07:09:19', 'superadmin', '2021-05-03 07:11:29', 'superadmin'),
(72, 74, '2021-06-04', '89826270/NS/SMA/V/21', '010.002.21.89826270', 0, 'Bp Narto', 0, 0, NULL, '2021-05-03 07:29:48', 'superadmin', '2021-05-03 07:29:48', NULL),
(73, 75, '2021-06-04', '0219/NS/ST/V/21', '0219', 0, 'Bp Rendra', 0, 0, NULL, '2021-05-03 08:43:57', 'superadmin', '2021-05-03 08:43:57', NULL),
(74, 76, '2021-06-03', '0221/NS/ST/V/21', '0221', 0, 'Bp Ali Akhmadi S.', 0, 0, NULL, '2021-05-04 05:12:37', 'superadmin', '2021-05-04 05:12:37', NULL),
(75, 77, '2021-06-04', '89826271/NS/SMA/V/21', '010.002.21.89826271', 0, 'Ibu Nindya', 0, 0, NULL, '2021-05-04 11:43:03', 'superadmin', '2021-05-04 11:43:03', NULL),
(76, 78, '2021-06-04', '0218/NS/ST/V/21', '0218', 0, 'Bp Bono', 0, 0, NULL, '2021-05-04 11:51:46', 'superadmin', '2021-05-04 11:51:46', NULL),
(77, 79, '2021-04-30', '89826272/NS/SMA/IV/21', '020.002.21.89826272', 0, 'Bp M. Subari Edy P', 0, 0, NULL, '2021-05-04 12:41:02', 'superadmin', '2021-05-04 12:41:02', NULL),
(78, 81, '2021-06-04', '0222/NS/ST/V/21', '0222', 0, 'Ibu Ina', 0, 0, NULL, '2021-05-05 06:12:00', 'superadmin', '2021-05-05 06:12:00', NULL),
(79, 82, '2021-06-05', '89826273/NS/SMA/V/21', '010.002.21.89826273', 0, 'Ibu Endang', 0, 0, NULL, '2021-05-05 11:39:46', 'superadmin', '2021-05-05 11:39:46', NULL),
(80, 83, '2021-06-05', '89826274/SJ/SMA/V/21', '010.002.21.89826274', 0, 'Ibu Endang', 0, 0, NULL, '2021-05-05 11:53:04', 'superadmin', '2021-05-05 11:53:04', NULL),
(81, 84, '2021-06-05', '89826275/NS/SMA/V/21', '010.002.21.89826275', 0, 'Ibu Endang', 0, 0, NULL, '2021-05-05 12:05:34', 'superadmin', '2021-05-05 12:05:34', NULL),
(82, 85, '2021-06-05', '89826276/NS/SMA/V/21', '010.002.21.89826276', 0, 'Bp Agustinus', 0, 0, NULL, '2021-05-05 12:10:13', 'superadmin', '2021-05-05 12:10:13', NULL),
(83, 86, '2021-06-05', '0223/NS/ST/V/21', '0223', 0, 'Bp Irwan', 0, 0, NULL, '2021-05-05 12:15:10', 'superadmin', '2021-05-05 12:15:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_nota`
--

CREATE TABLE `m_nota` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `no_nota` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_nota`
--

INSERT INTO `m_nota` (`id`, `id_supplier`, `no_nota`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Gawanan Punya Selera', '2021-04-20 01:41:09', 'developer', '0000-00-00 00:00:00', NULL),
(2, 2, 'D04047', '2021-04-20 12:23:23', 'developer', '0000-00-00 00:00:00', NULL),
(3, 3, 'SMJ200421', '2021-04-20 12:47:02', 'developer', '0000-00-00 00:00:00', NULL),
(4, 4, 'OK-00114/04/21', '2021-04-20 12:58:53', 'developer', '0000-00-00 00:00:00', NULL),
(5, 5, 'IND200421', '2021-04-20 13:02:04', 'developer', '0000-00-00 00:00:00', NULL),
(6, 6, 'SHD200421', '2021-04-20 13:16:55', 'developer', '0000-00-00 00:00:00', NULL),
(7, 7, 'PJT210420-038', '2021-04-20 13:47:43', 'developer', '0000-00-00 00:00:00', NULL),
(8, 8, '002058', '2021-04-21 09:35:39', 'developer', '0000-00-00 00:00:00', NULL),
(9, 9, 'DM-00024', '2021-04-21 09:50:36', 'developer', '0000-00-00 00:00:00', NULL),
(10, 4, 'OK-00122/04/21', '2021-04-21 10:01:10', 'developer', '0000-00-00 00:00:00', NULL),
(11, 2, 'D04057', '2021-04-21 10:26:09', 'developer', '0000-00-00 00:00:00', NULL),
(12, 10, 'PJ210711', '2021-04-21 11:55:41', 'developer', '0000-00-00 00:00:00', NULL),
(13, 11, 'SSD2513', '2021-04-21 12:20:56', 'developer', '0000-00-00 00:00:00', NULL),
(14, 13, 'NR210421', '2021-04-21 13:38:07', 'developer', '0000-00-00 00:00:00', NULL),
(15, 14, 'SD210421', '2021-04-21 13:38:18', 'developer', '0000-00-00 00:00:00', NULL),
(16, 12, 'TKPD210421', '2021-04-21 13:46:30', 'developer', '0000-00-00 00:00:00', NULL),
(17, 7, 'PDMR230421', '2021-04-22 11:51:42', 'developer', '0000-00-00 00:00:00', NULL),
(18, 4, 'OK-00129/04/21', '2021-04-22 11:57:16', 'developer', '0000-00-00 00:00:00', NULL),
(19, 9, 'DM-00025', '2021-04-22 12:12:26', 'developer', '0000-00-00 00:00:00', NULL),
(20, 15, 'MRD220421', '2021-04-22 15:29:47', 'developer', '0000-00-00 00:00:00', NULL),
(21, 16, 'XR230421', '2021-04-23 14:11:17', 'developer', '0000-00-00 00:00:00', NULL),
(22, 17, '2021116', '2021-04-26 00:58:15', 'developer', '0000-00-00 00:00:00', NULL),
(23, 18, 'WA260421', '2021-04-26 01:49:44', 'developer', '0000-00-00 00:00:00', NULL),
(24, 19, 'HO-JL-2104-12739', '2021-04-26 01:54:52', 'developer', '0000-00-00 00:00:00', NULL),
(25, 4, 'OK-00149/04/21', '2021-04-26 13:09:25', 'developer', '0000-00-00 00:00:00', NULL),
(26, 20, 'ZG270421', '2021-04-26 13:14:37', 'developer', '0000-00-00 00:00:00', NULL),
(27, 21, 'SMT260421', '2021-04-26 13:37:05', 'developer', '0000-00-00 00:00:00', NULL),
(28, 22, 'BMP260421', '2021-04-26 13:47:50', 'developer', '0000-00-00 00:00:00', NULL),
(29, 4, '00182/04/21', '2021-04-27 09:50:26', 'developer', '0000-00-00 00:00:00', NULL),
(30, 18, '07/01-69', '2021-04-27 10:00:24', 'developer', '0000-00-00 00:00:00', NULL),
(31, 15, 'MRD270421', '2021-04-27 10:01:36', 'developer', '0000-00-00 00:00:00', NULL),
(32, 16, 'LTC-K04917', '2021-04-27 10:06:45', 'developer', '0000-00-00 00:00:00', NULL),
(33, 7, 'PDMR290421', '2021-04-28 07:34:02', 'developer', '0000-00-00 00:00:00', NULL),
(34, 2, 'D04152', '2021-04-28 12:00:38', 'developer', '0000-00-00 00:00:00', NULL),
(35, 3, 'SMJ21/79388218', '2021-04-28 13:36:49', 'developer', '0000-00-00 00:00:00', NULL),
(36, 4, 'OK-00177/04/21', '2021-04-29 10:58:13', 'developer', '0000-00-00 00:00:00', NULL),
(37, 23, 'BM290421', '2021-04-29 11:04:02', 'developer', '0000-00-00 00:00:00', NULL),
(38, 4, 'OK-00183/04/21', '2021-05-02 04:00:03', 'developer', '0000-00-00 00:00:00', NULL),
(39, 24, 'PJ012104-004739', '2021-05-02 04:06:03', 'developer', '0000-00-00 00:00:00', NULL),
(40, 2, 'D04164', '2021-05-02 04:15:41', 'developer', '0000-00-00 00:00:00', NULL),
(41, 21, 'SMT300321', '2021-05-02 04:25:11', 'developer', '0000-00-00 00:00:00', NULL),
(42, 9, 'DM-00001', '2021-05-03 07:46:41', 'developer', '0000-00-00 00:00:00', NULL),
(43, 4, 'OK-00023/05/21', '2021-05-04 11:32:44', 'developer', '0000-00-00 00:00:00', NULL),
(44, 7, 'PDMR050521', '2021-05-05 06:06:48', 'developer', '0000-00-00 00:00:00', NULL),
(45, 2, 'SB050521', '2021-05-05 11:27:30', 'developer', '0000-00-00 00:00:00', NULL),
(46, 25, 'YMS050521', '2021-05-05 11:45:55', 'developer', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_perusahaan`
--

CREATE TABLE `m_perusahaan` (
  `id` int(11) NOT NULL,
  `pimpinan` varchar(90) DEFAULT NULL,
  `nm_perusahaan` varchar(90) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `npwp` varchar(99) DEFAULT NULL,
  `no_telp` varchar(99) DEFAULT NULL,
  `laporan` varchar(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(90) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_perusahaan`
--

INSERT INTO `m_perusahaan` (`id`, `pimpinan`, `nm_perusahaan`, `alamat`, `npwp`, `no_telp`, `laporan`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Bp Irwan', 'Bengkel Karis', 'Mojosongo', '-', '-', 'st', '2021-04-20 01:42:57', 'developer', '2021-04-20 02:00:43', 'superadmin'),
(2, 'Ibu Sri Hardati', 'PT KING Manufacture', 'JL Kepatihan No 4 RT 03 RW 02 Kepatihan Wetan Jebres Surakarta Jawa Tengah - 57129', '21.043.678.8-526.000', '-', 'sma', '2021-04-20 03:51:33', 'developer', '2021-05-04 22:27:43', 'developer'),
(3, 'Bp Matius', 'Santosa', 'Jl Solo - Sukoharjo KM 7.2', '-', '(0271) 621606', 'st', '2021-04-20 12:28:24', 'developer', '2021-04-20 12:28:24', NULL),
(4, 'Bp Sarwaka', 'Kurnia Teknik', 'Jl Agung Sel. Kedung Tungkul. RT.01/RW.07. Mojosongo. Kec. Jebres. Kota Surakarta. Jawa Tengah 57127', '-', '(0271) 855487', 'st', '2021-04-20 12:52:32', 'developer', '2021-04-20 18:23:31', 'developer'),
(5, 'Bp Kusjiarko', 'Politeknik ATMI Surakarta', 'Jl Adi Sucipto No KM 9.5 Blukukan Dua. Blukukan. Kec. Colomadu. Kabupaten Karanganyar. Jawa Tengah 57174', '-', '(0271) 7686220', 'st', '2021-04-20 13:13:01', 'developer', '2021-04-20 13:13:01', NULL),
(6, '-', 'PT Yogya Presisi Tehnikatama Industri', 'Jl Dhuri. Tirtomartani. Kalasan. Duri. Tirtomartani. Sleman. Kabupaten Sleman. Daerah Istimewa Yogyakarta 55571', '01.921.028.5-542.000', '(0274) 498282', 'sma', '2021-04-20 13:37:37', 'developer', '2021-04-20 13:37:37', NULL),
(7, 'Ibu Nindya', 'PT.YOGYA PRESISI TEKNIKATAMA SINERGI', 'Jl.Cangkringan,Somodaran RT.003 RW. 002 Purwomartani,Kalasan,Kab.Sleman Daerah Istimewa Yogyakarta', '86.987.129.3-542.000', '-', 'sma', '2021-04-21 04:40:40', 'superadmin', '2021-04-21 04:40:40', NULL),
(8, 'Bp Narto', 'PT Sinar Mulia Teknalum', 'Jl Cangkringan. Duri. Tirtomartani. Kec. Kalasan. Kabupaten Sleman. Daerah Istimewa Yogyakarta 55571', '80.268.356.5-542.000', '-', 'sma', '2021-04-21 06:12:46', 'developer', '2021-04-21 06:12:46', NULL),
(9, 'Bp Bono', 'Bono Teknik Presisi', ' Kecamatan Cawas. Kabupaten Klaten', '-', '-', 'st', '2021-04-21 09:41:27', 'developer', '2021-04-21 09:41:27', NULL),
(10, 'Bp Aji Saksono', 'Kripton Gama Jaya', 'Jl Pringgolayan No. 67. Plumbon. Banguntapan. Kec. Banguntapan. Bantul. Daerah Istimewa Yogyakarta 55198', '-', '(0274) 451288', 'st', '2021-04-21 09:49:14', 'developer', '2021-04-21 09:49:14', NULL),
(11, 'Bp Hendro Ari', 'SMK Muhammadiyah 1 Klaten Utara', 'Jl Ki Ageng Pengging No. 40. Tegal. Gergunung. Kec. Klaten Utara. Kabupaten Klaten. Jawa Tengah 57434', '00.506.408.4-525.000', '(0272) 321935', 'sma', '2021-04-21 10:19:37', 'developer', '2021-04-21 10:19:37', NULL),
(12, 'Ibu Isti', 'PT ATMI Cikarang', 'Jl Kampus Hijau No. 3 Jababeka Education Park. Simpangan. Cikarang Utara. RT/RW 002/005. Simpangan. Cikarang Utara. Bekasi 17520. Jawa Barat', '31.813.107.5-414.000', '(021) 89106413', 'sma', '2021-04-21 12:10:47', 'developer', '2021-04-27 05:59:50', 'developer'),
(13, 'Bp Ruyanto', 'SMK Negeri 1 Kaligondang', 'Jalan Raya. Dusun 1. Selanegara. Kaligondang. Kabupaten Purbalingga. Jawa Tengah 53391', '00.554.933.2-529.000', '(0281) 6591196', 'sma', '2021-04-21 13:36:24', 'developer', '2021-04-21 13:36:24', NULL),
(14, 'Bp Wahyu', 'SMK HKTI 1 Purwareja Klampok', 'Jl Raya Purwarejo No. 8. Dusun Kalikidang Lor. Klampok. Kec. Purworejo Klampok. Banjarnegara. Jawa Tengah 53474', '92.842.123.9-529.000', '(0286) 479060', 'sma', '2021-04-21 14:27:14', 'developer', '2021-04-21 14:27:14', NULL),
(15, 'Bp Joko Riyanto', 'SMK Sukawati Sragen', 'Jl Mawar No. 6. Kebayan 1. Sragen Kulon. Kec. Sragen. Kabupaten Sragen. Jawa Tengah 57212', '01.444.716.3-528.000', '(0271) 891774', 'sma', '2021-04-22 02:25:31', 'developer', '2021-04-22 02:25:31', NULL),
(16, 'Bp Feri', 'PT ATMI Solo', 'Jl Adi Sucipto. Jl Mojo No. 1 Karangasem. Kec. Laweyan. Kota Surakarta. Jawa Tengah 57145', '03.196.032.1-526.000', '(0271) 714466', 'sma', '2021-04-22 12:03:41', 'developer', '2021-04-22 12:03:41', NULL),
(17, 'Ibu Ina', 'Techno Coating', 'Dusun II. Menang. Kec. Grogol. Kabupaten Sukoharjo. Jawa Tangah 57552', '-', '087836166809', 'st', '2021-04-23 03:06:52', 'developer', '2021-04-23 03:06:52', NULL),
(18, 'Bp Deni', 'Bengkel Deni Pajang', 'Pajang. Kec. Lawean. Kabupaten Surakarta ', '-', '-', 'st', '2021-04-23 03:12:22', 'developer', '2021-04-23 03:12:22', NULL),
(19, 'Bp Agustinus', 'CV Yudhistira', 'Jl Bangak. Simo No. Km 1.5 Tompen. Batan. Kec. Banyudono, Kabupaten Boyolali. Jawa Tengah 57373', '01.736.246.8-532.000', '(0276) 3294222', 'sma', '2021-04-23 03:28:32', 'developer', '2021-04-23 03:28:32', NULL),
(20, 'Bp Kliwon', 'Bengkel Bapak Kliwon', 'Gawok. Sukoharjo', '-', '-', 'st', '2021-04-23 03:56:51', 'developer', '2021-04-23 03:56:51', NULL),
(21, 'Bp Arif', 'PT Inox Reka Presisi', 'Jl Mojo. Turisari. Dagen. Kec. Karanganyar. Kabupaten Karanganyar. Jawa Tengah 57731', '02.399.641.6-528.000', '(0271) 826710', 'sma', '2021-04-23 14:17:19', 'developer', '2021-04-23 14:17:19', NULL),
(22, 'Bp Joko', 'Joko Mursito Tangerang', 'Perum Citra Raya Blok k11 No 8. Tangerang', '-', '08161193046', 'st', '2021-04-24 07:37:00', 'developer', '2021-04-24 07:37:00', NULL),
(23, 'Bp Mrajak', 'Bengkel Mrajak Teknik', 'Delanggu', '-', '081548449414', 'st', '2021-04-26 01:43:18', 'developer', '2021-04-26 01:43:18', NULL),
(24, 'Bp Basirun', 'SMK Negeri 1 Mojosongo', 'Jl Raya Jatinom - Boyolali No. Km. 2. Tegalwirih. Mojosongo. Kec. Mojosongo. Kabupaten Boyolali. Jawa Tengah 57301', '00.004.447.9-527.000', '(0276) 321031', 'sma', '2021-04-26 02:05:19', 'developer', '2021-04-26 02:05:19', NULL),
(25, 'Bp Eko', 'PT Solo Murni', 'Jl Ahmad Yani No. 378. Kerten. Kec. Laweyan. Kota Surakarta. Jawa Tengah 57143', '01.132.379.7-526.000', '(0271) 714505', 'sma', '2021-04-26 13:42:44', 'developer', '2021-04-26 13:42:44', NULL),
(26, 'Ibu Wuri', 'CV Gesit Teknindo Djaya', 'Colomadu. Karanganyar', '-', '-', 'st', '2021-04-26 14:04:04', 'developer', '2021-04-26 14:04:04', NULL),
(27, 'Ibu Irine Isti', 'Politeknik Industri ATMI', 'Jl Kampus Hijau No. 3. Education Park Cikarang Baru. RT/RW 002/005. Simpangan. Cikarang Utama. Bekasi 17520. Jawa Barat', '02.356.320.8-414.000', '02189106780', 'sma', '2021-04-27 06:06:18', 'developer', '2021-04-27 06:06:18', NULL),
(28, 'Bp Danang Wijaya', 'Danang Teknik', 'Dusun Temenggungan. Kec. Karas. Kabupaten Magetan. Jawa Tmur 63395', '-', '085702463772', 'st', '2021-04-27 08:57:23', 'developer', '2021-04-27 08:57:23', NULL),
(29, 'Bp Eko', 'PT Itokoh Ceperindo', 'Jl Diponegoro. Gumulan. Klaten Tengah. Klaten.Jawa Tengah 57416', '01.545.692.4-525.000', '(0271) 324038', 'sma', '2021-04-28 12:47:11', 'developer', '2021-04-28 12:47:11', NULL),
(30, 'Bp Rudi', 'PT Genteng Mutiara', 'Jl Magelang. No. Km 83. Mulungan Wetan. Sendangadi. Kec. Mlati. Kabupaten Sleman. Daerah Istimewa Yogyakarta 55285', '-', '0878-7100-7477', 'st', '2021-04-29 03:37:35', 'developer', '2021-04-29 03:37:35', NULL),
(31, 'Bp Edi Subhari', 'SMK Negeri 5 Sukoharjo', 'Tambakrejo. Tiyaran. Bulu. Kabupaten Sukoharjo. Jawa Tengah 57563', '30.138.267.7-532.000', '-', 'sma', '2021-05-01 22:44:46', 'developer', '2021-05-01 22:44:46', NULL),
(32, 'Ibu Harti', 'PT Wirakarya Partindo Abadi', 'Jl Irian No. 23. Tegalharjo. Kec. Jebres. Kota Surakarta. Jawa Timur 57129', '81.653.445.7-526.000', '-', 'sma', '2021-05-02 04:32:27', 'developer', '2021-05-02 04:32:27', NULL),
(33, 'Ibu Susi', 'Bengkel Hasil Karya Indonesia', 'Jl Amarta. Kartasura', '-', '-', 'st', '2021-05-02 05:23:01', 'developer', '2021-05-02 05:23:01', NULL),
(34, 'Bp Anton', 'PT Putra Kemas Makmur', 'Jl Arjuna No. 54 RT. 02. RW. 02 Desa Pamot. Kelurahan Argomulyo. Kec. Noborejo. Kota Salatiga. Jawa Tengah 50736', '84.522.561.4-505.000', '(0298) 3434140', 'sma', '2021-05-03 05:07:39', 'developer', '2021-05-03 05:07:39', NULL),
(35, 'Bp Darso', 'Darso Teknik Presisi', 'Kabupaten Magetan. Kecamatan Karas. Desa Temenggungan', '-', '081225055824', 'st', '2021-05-03 06:18:03', 'developer', '2021-05-03 06:18:03', NULL),
(36, 'Bp Rendra', 'Bengkel Rendra', 'Kota Klaten. Delanggu', '-', '-', 'st', '2021-05-03 07:41:55', 'developer', '2021-05-02 19:42:57', 'developer'),
(37, '-', 'SMK Negeri 2 Surakarta', 'Jl Adi Sucipto No. 33. Manahan. Kec. Banjarsari. Kota Surakarta. Jawa Tengah 57139', '00.004.203.6-526.000', '(0271) 714901', 'sma', '2021-05-04 04:15:32', 'developer', '2021-05-04 22:27:59', 'developer');

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
  `harga_invoice` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pl_list_barang`
--

INSERT INTO `m_pl_list_barang` (`id`, `id_pl`, `id_m_barang`, `tgl`, `qty`, `qty_ket`, `harga_invoice`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, '2021-04-20', 1, 'Roll', 390000, '2021-04-20 01:55:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(2, 1, 2, '2021-04-20', 1, 'Roll', 390000, '2021-04-20 01:55:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(3, 2, 5, '2021-04-20', 1, 'PCS', 196700, '2021-04-20 04:00:59', 'superadmin', '0000-00-00 00:00:00', NULL),
(4, 2, 4, '2021-04-20', 1, 'PCS', 130900, '2021-04-20 04:00:59', 'superadmin', '0000-00-00 00:00:00', NULL),
(5, 2, 3, '2021-04-20', 1, 'PCS', 100400, '2021-04-20 04:00:59', 'superadmin', '0000-00-00 00:00:00', NULL),
(6, 3, 4, '2021-04-21', 5, 'PCS', 125300, '2021-04-20 12:31:06', 'superadmin', '0000-00-00 00:00:00', NULL),
(7, 4, 6, '2021-04-21', 2, 'Roll', 506500, '2021-04-20 12:53:33', 'superadmin', '2021-04-21 05:55:48', 'superadmin'),
(8, 5, 8, '2021-04-21', 2, 'Set', 4000, '2021-04-20 13:14:15', 'superadmin', '0000-00-00 00:00:00', NULL),
(9, 5, 7, '2021-04-21', 1, 'Unit', 338800, '2021-04-20 13:14:15', 'superadmin', '0000-00-00 00:00:00', NULL),
(10, 6, 9, '2021-04-21', 2, 'PCS', 393800, '2021-04-20 13:20:50', 'superadmin', '0000-00-00 00:00:00', NULL),
(11, 7, 9, '2021-04-21', 2, 'PCS', 393800, '2021-04-20 13:23:58', 'superadmin', '0000-00-00 00:00:00', NULL),
(12, 8, 10, '2021-04-21', 1, 'PCS', 281600, '2021-04-20 13:40:00', 'superadmin', '0000-00-00 00:00:00', NULL),
(13, 9, 11, '2021-04-21', 1, 'PCS', 107000, '2021-04-20 13:44:12', 'superadmin', '0000-00-00 00:00:00', NULL),
(14, 10, 14, '2021-04-21', 5, 'PCS', 65000, '2021-04-20 14:02:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(15, 10, 12, '2021-04-21', 10, 'PCS', 13000, '2021-04-20 14:02:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(16, 10, 13, '2021-04-21', 10, 'PCS', 8800, '2021-04-20 14:02:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(17, 11, 15, '2021-04-21', 3, 'PCS', 18200, '2021-04-21 03:30:32', 'superadmin', '0000-00-00 00:00:00', NULL),
(18, 11, 16, '2021-04-21', 2, 'PCS', 104000, '2021-04-21 03:30:32', 'superadmin', '0000-00-00 00:00:00', NULL),
(19, 12, 17, '2021-04-21', 1, 'PCS', 327300, '2021-04-21 06:15:00', 'superadmin', '0000-00-00 00:00:00', NULL),
(20, 13, 18, '2021-04-17', 1, 'PCS', 408500, '2021-04-21 06:48:29', 'superadmin', '0000-00-00 00:00:00', NULL),
(21, 14, 19, '2021-04-23', 20, 'PCS', 0, '2021-04-21 09:43:12', 'superadmin', '0000-00-00 00:00:00', NULL),
(22, 15, 20, '2021-04-23', 30, 'PCS', 52500, '2021-04-21 09:54:04', 'superadmin', '0000-00-00 00:00:00', NULL),
(23, 16, 22, '2021-04-23', 10, 'PCS', 47000, '2021-04-21 10:12:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(24, 17, 23, '2021-04-22', 10, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(25, 17, 24, '2021-04-22', 20, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(26, 17, 25, '2021-04-22', 20, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '2021-04-24 02:13:42', 'superadmin'),
(27, 17, 29, '2021-04-22', 10, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(28, 17, 28, '2021-04-22', 10, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(29, 17, 27, '2021-04-22', 10, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(30, 17, 26, '2021-04-22', 2, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(31, 17, 34, '2021-04-22', 2, 'Unit', 0, '2021-04-21 11:59:24', 'superadmin', '2021-04-24 02:13:59', 'superadmin'),
(32, 17, 30, '2021-04-22', 5, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '2021-04-24 02:14:30', 'superadmin'),
(33, 17, 31, '2021-04-22', 1, 'Set', 0, '2021-04-21 11:59:24', 'superadmin', '2021-04-24 02:14:12', 'superadmin'),
(34, 17, 33, '2021-04-22', 5, 'PCS', 0, '2021-04-21 11:59:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(36, 17, 32, '2021-04-22', 5, 'PCS', 0, '2021-04-21 12:01:10', 'superadmin', '0000-00-00 00:00:00', NULL),
(37, 18, 36, '2021-04-22', 2, 'PCS', 940300, '2021-04-21 12:18:22', 'superadmin', '0000-00-00 00:00:00', NULL),
(38, 18, 35, '2021-04-22', 2, 'PCS', 20400, '2021-04-21 12:18:22', 'superadmin', '0000-00-00 00:00:00', NULL),
(39, 19, 37, '2021-04-22', 3, 'PCS', 328000, '2021-04-21 12:26:32', 'superadmin', '0000-00-00 00:00:00', NULL),
(40, 20, 38, '2021-04-23', 1, 'PCS', 732600, '2021-04-21 12:30:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(41, 21, 17, '2021-04-23', 1, 'PCS', 0, '2021-04-21 12:34:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(42, 22, 40, '2021-04-23', 30, 'Lonjor', 468650, '2021-04-21 14:01:42', 'superadmin', '0000-00-00 00:00:00', NULL),
(43, 22, 39, '2021-04-23', 12, 'Lonjor', 380805, '2021-04-21 14:01:42', 'superadmin', '0000-00-00 00:00:00', NULL),
(44, 22, 41, '2021-04-23', 4, 'Unit', 3050210, '2021-04-21 14:01:42', 'superadmin', '0000-00-00 00:00:00', NULL),
(45, 23, 42, '2021-04-23', 4, 'PCS', 229000, '2021-04-21 14:35:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(46, 23, 43, '2021-04-23', 1, 'Unit', 3520364, '2021-04-21 14:39:16', 'superadmin', '0000-00-00 00:00:00', NULL),
(49, 25, 46, '2021-04-22', 1, 'Roll', 507400, '2021-04-22 03:54:41', 'superadmin', '0000-00-00 00:00:00', NULL),
(50, 26, 48, '2021-04-23', 20, 'PCS', 18500, '2021-04-22 11:54:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(51, 26, 47, '2021-04-23', 50, 'PCS', 7700, '2021-04-22 11:54:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(52, 27, 49, '2021-04-23', 16, 'PCS', 83500, '2021-04-22 12:04:20', 'superadmin', '0000-00-00 00:00:00', NULL),
(53, 28, 51, '2021-04-26', 1, 'PCS', 62000, '2021-04-22 12:59:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(54, 28, 52, '2021-04-26', 2, 'PCS', 86000, '2021-04-22 12:59:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(55, 28, 21, '2021-04-26', 2, 'PCS', 91300, '2021-04-22 12:59:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(56, 28, 50, '2021-04-26', 1, 'PCS', 82500, '2021-04-22 12:59:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(57, 29, 55, '2021-04-23', 100, 'PCS', 9500, '2021-04-22 15:36:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(58, 29, 54, '2021-04-23', 50, 'PCS', 8800, '2021-04-22 15:36:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(59, 29, 53, '2021-04-23', 50, 'PCS', 8900, '2021-04-22 15:36:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(60, 29, 47, '2021-04-23', 50, 'PCS', 8800, '2021-04-22 15:36:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(61, 30, 56, '2021-04-23', 1, 'Unit', 1340909, '2021-04-22 16:12:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(62, 30, 57, '2021-04-23', 1, 'Unit', 790909, '2021-04-22 16:12:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(63, 27, 59, '2021-04-23', 5, 'Roll', 215000, '2021-04-23 02:51:37', 'superadmin', '0000-00-00 00:00:00', NULL),
(64, 31, 58, '2021-04-23', 2, 'PCS', 21800, '2021-04-23 03:07:21', 'superadmin', '0000-00-00 00:00:00', NULL),
(65, 32, 61, '2021-04-23', 1, 'PCS', 94900, '2021-04-23 03:21:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(66, 32, 60, '2021-04-23', 1, 'PCS', 67900, '2021-04-23 03:21:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(67, 32, 53, '2021-04-23', 20, 'PCS', 8000, '2021-04-23 03:21:08', 'superadmin', '0000-00-00 00:00:00', NULL),
(69, 33, 53, '2021-04-23', 50, 'PCS', 8000, '2021-04-23 03:53:35', 'superadmin', '0000-00-00 00:00:00', NULL),
(70, 34, 53, '2021-04-23', 80, 'PCS', 6750, '2021-04-23 03:57:49', 'superadmin', '0000-00-00 00:00:00', NULL),
(71, 17, 63, '2021-04-22', 1, 'Unit', 0, '2021-04-23 14:05:33', 'superadmin', '0000-00-00 00:00:00', NULL),
(72, 17, 62, '2021-04-22', 1, 'PCS', 0, '2021-04-23 14:05:33', 'superadmin', '0000-00-00 00:00:00', NULL),
(73, 35, 64, '2021-04-24', 10, 'PCS', 90000, '2021-04-23 14:17:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(74, 35, 65, '2021-04-24', 20, 'PCS', 90000, '2021-04-23 14:17:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(75, 36, 66, '2021-03-17', 5, 'KG', 41240, '2021-04-24 02:25:13', 'superadmin', '2021-04-24 03:02:51', 'superadmin'),
(76, 36, 67, '2021-03-17', 5, 'KG', 64660, '2021-04-24 02:25:13', 'superadmin', '2021-04-24 03:02:48', 'superadmin'),
(77, 37, 33, '2021-04-24', 5, 'PCS', 159400, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(78, 37, 32, '2021-04-24', 5, 'PCS', 119900, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(79, 37, 29, '2021-04-24', 10, 'PCS', 128500, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(80, 37, 28, '2021-04-24', 10, 'PCS', 120400, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(81, 37, 27, '2021-04-24', 10, 'PCS', 194200, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(82, 37, 26, '2021-04-24', 2, 'PCS', 463200, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(83, 37, 25, '2021-04-24', 20, 'PCS', 146500, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(84, 37, 62, '2021-04-24', 1, 'PCS', 318600, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(85, 37, 23, '2021-04-24', 10, 'PCS', 189400, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(86, 37, 24, '2021-04-24', 20, 'PCS', 151600, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(87, 37, 31, '2021-04-24', 1, 'Set', 260100, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(88, 37, 63, '2021-04-24', 1, 'Unit', 2611700, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(89, 37, 34, '2021-04-24', 2, 'Unit', 2946500, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(90, 37, 30, '2021-04-24', 5, 'PCS', 81600, '2021-04-24 02:48:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(91, 38, 58, '2021-04-16', 3, 'PCS', 21000, '2021-04-24 02:59:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(92, 38, 68, '2021-04-16', 3, 'PCS', 18200, '2021-04-24 02:59:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(93, 39, 69, '2021-04-24', 1, 'PCS', 910000, '2021-04-24 07:38:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(94, 40, 70, '2021-04-26', 3, 'PCS', 119995, '2021-04-26 01:03:36', 'superadmin', '2021-04-26 01:31:25', 'superadmin'),
(95, 40, 20, '2021-04-26', 20, 'PCS', 39078, '2021-04-26 01:03:36', 'superadmin', '2021-04-26 01:31:27', 'superadmin'),
(96, 41, 71, '2021-04-26', 1, 'PCS', 685000, '2021-04-26 01:43:52', 'superadmin', '0000-00-00 00:00:00', NULL),
(97, 42, 72, '2021-04-26', 2, 'Kaleng', 218750, '2021-04-26 01:52:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(98, 43, 74, '2021-04-26', 1, 'Box', 515000, '2021-04-26 02:06:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(99, 43, 73, '2021-04-26', 1, 'PCS', 553900, '2021-04-26 02:06:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(100, 44, 75, '2021-04-26', 1, 'Set', 829900, '2021-04-26 04:26:28', 'superadmin', '0000-00-00 00:00:00', NULL),
(101, 45, 21, '2021-04-28', 2, 'PCS', 91300, '2021-04-26 13:00:13', 'superadmin', '0000-00-00 00:00:00', NULL),
(102, 46, 76, '2021-04-27', 125, 'PCS', 13200, '2021-04-26 13:29:28', 'superadmin', '0000-00-00 00:00:00', NULL),
(103, 46, 77, '2021-04-27', 50, 'PCS', 16000, '2021-04-26 13:29:28', 'superadmin', '0000-00-00 00:00:00', NULL),
(104, 46, 78, '2021-04-27', 10, 'Pack', 42000, '2021-04-26 13:29:28', 'superadmin', '0000-00-00 00:00:00', NULL),
(105, 47, 80, '2021-04-27', 10, 'PCS', 71872, '2021-04-26 13:43:24', 'superadmin', '0000-00-00 00:00:00', NULL),
(106, 48, 59, '2021-04-27', 10, 'Roll', 0, '2021-04-26 13:50:11', 'superadmin', '0000-00-00 00:00:00', NULL),
(108, 50, 82, '2021-04-27', 2, 'PCS', 115900, '2021-04-26 14:04:37', 'superadmin', '0000-00-00 00:00:00', NULL),
(109, 51, 85, '2021-04-24', 1, 'PCS', 480000, '2021-04-27 09:16:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(110, 51, 86, '2021-04-24', 1, 'Set', 204000, '2021-04-27 09:16:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(111, 51, 83, '2021-04-24', 1, 'PCS', 265000, '2021-04-27 09:16:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(112, 51, 84, '2021-04-24', 1, 'PCS', 365000, '2021-04-27 09:16:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(113, 52, 90, '2021-04-28', 10, 'PCS', 0, '2021-04-27 13:53:43', 'superadmin', '0000-00-00 00:00:00', NULL),
(114, 52, 72, '2021-04-28', 5, 'Kaleng', 0, '2021-04-27 13:53:43', 'superadmin', '0000-00-00 00:00:00', NULL),
(115, 52, 87, '2021-04-28', 8, 'PCS', 0, '2021-04-27 13:53:43', 'superadmin', '0000-00-00 00:00:00', NULL),
(116, 53, 77, '2021-04-28', 150, 'PCS', 0, '2021-04-27 13:56:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(117, 54, 95, '2021-04-29', 1, 'PCS', 1340900, '2021-04-28 12:07:13', 'superadmin', '0000-00-00 00:00:00', NULL),
(118, 55, 96, '2021-04-30', 1, 'PCS', 810000, '2021-04-28 12:47:46', 'superadmin', '0000-00-00 00:00:00', NULL),
(119, 56, 54, '2021-04-30', 10, 'PCS', 8800, '2021-04-28 13:10:54', 'superadmin', '0000-00-00 00:00:00', NULL),
(120, 57, 3, '2021-04-29', 1, 'PCS', 100500, '2021-04-28 13:20:45', 'superadmin', '0000-00-00 00:00:00', NULL),
(121, 57, 4, '2021-04-29', 1, 'PCS', 131000, '2021-04-28 13:20:45', 'superadmin', '0000-00-00 00:00:00', NULL),
(122, 57, 5, '2021-04-29', 1, 'PCS', 195600, '2021-04-28 13:20:45', 'superadmin', '0000-00-00 00:00:00', NULL),
(123, 57, 97, '2021-04-29', 1, 'PCS', 327350, '2021-04-28 13:20:45', 'superadmin', '0000-00-00 00:00:00', NULL),
(124, 58, 1, '2021-04-29', 2, 'Roll', 390000, '2021-04-28 13:52:04', 'superadmin', '0000-00-00 00:00:00', NULL),
(125, 59, 2, '2021-04-29', 1, 'Roll', 390000, '2021-04-28 14:01:15', 'superadmin', '0000-00-00 00:00:00', NULL),
(126, 59, 94, '2021-04-29', 5, 'KG', 27700, '2021-04-28 14:01:15', 'superadmin', '0000-00-00 00:00:00', NULL),
(127, 59, 98, '2021-04-29', 1, 'PCS', 484800, '2021-04-29 01:37:41', 'superadmin', '0000-00-00 00:00:00', NULL),
(128, 60, 101, '2021-03-27', 1, 'Unit', 5300000, '2021-04-29 03:46:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(129, 60, 100, '2021-03-27', 1, 'Unit', 2300000, '2021-04-29 03:46:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(130, 60, 99, '2021-03-27', 1, 'Unit', 2200000, '2021-04-29 03:46:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(131, 60, 102, '2021-03-27', 1, 'Unit', 4800000, '2021-04-29 03:46:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(132, 61, 103, '2021-04-19', 1, 'PCS', 39000, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(133, 61, 104, '2021-04-19', 8, 'PCS', 61500, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(134, 61, 106, '2021-04-19', 1, 'PCS', 46500, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(135, 61, 107, '2021-04-19', 1, 'PCS', 45300, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(136, 61, 105, '2021-04-19', 2, 'PCS', 56000, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(137, 61, 108, '2021-04-19', 1, 'PCS', 41600, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(138, 61, 109, '2021-04-19', 1, 'PCS', 194500, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(139, 61, 111, '2021-04-19', 2, 'PCS', 144000, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(140, 61, 110, '2021-04-19', 1, 'PCS', 412000, '2021-04-29 04:21:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(141, 62, 114, '2021-04-30', 1, 'PCS', 68800, '2021-04-29 11:06:54', 'superadmin', '0000-00-00 00:00:00', NULL),
(142, 62, 113, '2021-04-30', 15, 'PCS', 5000, '2021-04-29 11:06:54', 'superadmin', '0000-00-00 00:00:00', NULL),
(143, 62, 112, '2021-04-30', 5, 'PCS', 38300, '2021-04-29 11:06:54', 'superadmin', '0000-00-00 00:00:00', NULL),
(144, 63, 115, '2021-04-30', 5, 'PCS', 117000, '2021-04-29 11:16:37', 'superadmin', '0000-00-00 00:00:00', NULL),
(145, 64, 120, '2021-05-03', 50, 'PCS', 8300, '2021-05-02 04:10:36', 'superadmin', '2021-05-04 12:54:13', 'superadmin'),
(146, 64, 121, '2021-05-03', 12, 'PCS', 6400, '2021-05-02 04:10:36', 'superadmin', '0000-00-00 00:00:00', NULL),
(147, 64, 122, '2021-05-03', 12, 'PCS', 5000, '2021-05-02 04:10:36', 'superadmin', '0000-00-00 00:00:00', NULL),
(148, 64, 123, '2021-05-03', 100, 'PCS', 4300, '2021-05-02 04:10:36', 'superadmin', '0000-00-00 00:00:00', NULL),
(149, 65, 115, '2021-05-03', 5, 'PCS', 0, '2021-05-02 04:22:31', 'superadmin', '0000-00-00 00:00:00', NULL),
(150, 66, 125, '2021-05-03', 10, 'PCS', 73500, '2021-05-02 04:33:48', 'superadmin', '0000-00-00 00:00:00', NULL),
(151, 67, 124, '2021-05-03', 2, 'PCS', 20300, '2021-05-02 05:31:12', 'superadmin', '0000-00-00 00:00:00', NULL),
(152, 68, 53, '2021-05-03', 120, 'PCS', 0, '2021-05-02 05:41:33', 'superadmin', '0000-00-00 00:00:00', NULL),
(153, 69, 126, '2021-05-04', 2, 'Unit', 0, '2021-05-02 12:57:59', 'superadmin', '0000-00-00 00:00:00', NULL),
(154, 69, 128, '2021-05-04', 1, 'Unit', 0, '2021-05-02 12:57:59', 'superadmin', '0000-00-00 00:00:00', NULL),
(155, 69, 127, '2021-05-04', 1, 'Unit', 0, '2021-05-02 12:57:59', 'superadmin', '0000-00-00 00:00:00', NULL),
(156, 70, 129, '2021-05-03', 1, 'PCS', 544700, '2021-05-03 01:47:44', 'superadmin', '0000-00-00 00:00:00', NULL),
(157, 71, 131, '2021-05-03', 10, 'PCS', 68700, '2021-05-03 02:37:25', 'superadmin', '0000-00-00 00:00:00', NULL),
(158, 71, 130, '2021-05-03', 10, 'PCS', 50800, '2021-05-03 02:37:25', 'superadmin', '0000-00-00 00:00:00', NULL),
(159, 71, 134, '2021-05-03', 10, 'Liter', 30600, '2021-05-03 03:38:16', 'superadmin', '0000-00-00 00:00:00', NULL),
(160, 71, 133, '2021-05-03', 1, 'PCS', 35300, '2021-05-03 03:38:16', 'superadmin', '0000-00-00 00:00:00', NULL),
(161, 72, 135, '2021-05-03', 2, 'PCS', 196000, '2021-05-03 05:11:13', 'superadmin', '0000-00-00 00:00:00', NULL),
(162, 73, 136, '2021-04-26', 2, 'PCS', 12600, '2021-05-03 06:20:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(163, 73, 137, '2021-04-26', 1, 'PCS', 28000, '2021-05-03 06:20:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(164, 73, 138, '2021-04-26', 2, 'PCS', 8900, '2021-05-03 06:20:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(165, 73, 139, '2021-04-26', 1, 'PCS', 18300, '2021-05-03 06:20:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(166, 73, 140, '2021-04-26', 2, 'PCS', 22000, '2021-05-03 06:20:03', 'superadmin', '0000-00-00 00:00:00', NULL),
(167, 74, 143, '2021-05-05', 5, 'Roll', 280000, '2021-05-03 07:27:06', 'superadmin', '0000-00-00 00:00:00', NULL),
(168, 74, 142, '2021-05-05', 5, 'Roll', 260400, '2021-05-03 07:27:06', 'superadmin', '0000-00-00 00:00:00', NULL),
(169, 74, 141, '2021-05-05', 5, 'Roll', 183500, '2021-05-03 07:27:06', 'superadmin', '0000-00-00 00:00:00', NULL),
(170, 75, 144, '2021-05-05', 115, 'PCS', 20000, '2021-05-03 07:48:27', 'superadmin', '0000-00-00 00:00:00', NULL),
(171, 76, 145, '2021-05-04', 10, 'Liter', 41800, '2021-05-04 05:11:09', 'superadmin', '0000-00-00 00:00:00', NULL),
(172, 77, 11, '2021-05-05', 2, 'PCS', 107000, '2021-05-04 11:40:40', 'superadmin', '0000-00-00 00:00:00', NULL),
(173, 78, 146, '2021-05-05', 1, 'Set', 158750, '2021-05-04 11:50:45', 'superadmin', '0000-00-00 00:00:00', NULL),
(174, 79, 92, '2021-04-01', 2, 'Set', 383700, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(175, 79, 91, '2021-04-01', 4, 'PCS', 324300, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(176, 79, 117, '2021-04-01', 1, 'PCS', 1182000, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(177, 79, 147, '2021-04-01', 1, 'PCS', 468000, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(178, 79, 116, '2021-04-01', 3, 'PCS', 388000, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(179, 79, 93, '2021-04-01', 1, 'PCS', 208500, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(180, 79, 148, '2021-04-01', 1, 'PCS', 205000, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(181, 79, 88, '2021-04-01', 4, 'PCS', 77100, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(182, 79, 149, '2021-04-01', 1, 'Unit', 2090000, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(183, 79, 150, '2021-04-01', 1, 'KG', 133500, '2021-05-04 12:25:53', 'superadmin', '0000-00-00 00:00:00', NULL),
(184, 80, 151, '2021-05-05', 6, 'Roll', 0, '2021-05-05 03:44:01', 'superadmin', '0000-00-00 00:00:00', NULL),
(185, 81, 54, '2021-05-05', 20, 'PCS', 9200, '2021-05-05 06:10:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(186, 81, 152, '2021-05-05', 20, 'PCS', 3500, '2021-05-05 06:10:57', 'superadmin', '0000-00-00 00:00:00', NULL),
(187, 82, 154, '2021-05-06', 1, 'PCS', 865200, '2021-05-05 11:35:42', 'superadmin', '0000-00-00 00:00:00', NULL),
(188, 82, 153, '2021-05-06', 1, 'Set', 227900, '2021-05-05 11:35:42', 'superadmin', '0000-00-00 00:00:00', NULL),
(189, 82, 155, '2021-05-06', 1, 'Set', 1113700, '2021-05-05 11:35:42', 'superadmin', '0000-00-00 00:00:00', NULL),
(190, 83, 156, '2021-05-06', 1, 'PCS', 735400, '2021-05-05 11:48:38', 'superadmin', '0000-00-00 00:00:00', NULL),
(191, 84, 158, '2021-05-06', 1, 'Set', 461500, '2021-05-05 12:03:23', 'superadmin', '0000-00-00 00:00:00', NULL),
(192, 84, 157, '2021-05-06', 1, 'Set', 347900, '2021-05-05 12:03:23', 'superadmin', '0000-00-00 00:00:00', NULL),
(193, 85, 53, '2021-05-06', 50, 'PCS', 8000, '2021-05-05 12:09:05', 'superadmin', '0000-00-00 00:00:00', NULL),
(194, 86, 2, '2021-05-06', 2, 'Roll', 390000, '2021-05-05 12:14:26', 'superadmin', '0000-00-00 00:00:00', NULL);

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
  `no_inv` int(11) NOT NULL,
  `up` varchar(99) NOT NULL,
  `laporan` varchar(3) NOT NULL,
  `cek_po` int(1) DEFAULT 0,
  `cek_inv` int(1) DEFAULT 0,
  `data_inv` int(1) DEFAULT 0,
  `tgl_ctk` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pl_price_list`
--

INSERT INTO `m_pl_price_list` (`id`, `id_m_perusahaan`, `tgl`, `no_surat`, `no_so`, `no_po`, `no_inv`, `up`, `laporan`, `cek_po`, `cek_inv`, `data_inv`, `tgl_ctk`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2021-04-20', '0199/SJ/ST/IV/21', '0199', '-', 0, 'Bp Irwan', 'st', 0, 0, 1, '2021-04-20', '2021-04-20 01:55:57', 'superadmin', '2021-04-20 01:55:57', NULL),
(2, 2, '2021-04-20', '0200/SJ/ST/IV/21', '0200', '-', 0, 'Ibu Susi', 'st', 0, 0, 1, '2021-04-20', '2021-04-20 04:00:59', 'superadmin', '2021-04-20 04:00:59', NULL),
(3, 3, '2021-04-21', '0201/SJ/ST/IV/21', '0201', '-', 0, 'Bp Matius', 'st', 0, 0, 1, '2021-04-21', '2021-04-20 12:31:06', 'superadmin', '2021-04-20 12:31:06', NULL),
(4, 4, '2021-04-21', '0191/SJ/ST/IV/21', '0191', '-', 0, 'Bp Sarwaka', 'st', 0, 0, 1, '2021-04-21', '2021-04-20 12:53:33', 'superadmin', '2021-04-21 05:55:59', 'superadmin'),
(5, 5, '2021-04-21', '0196/SJ/ST/IV/21', '0196', '2021/PAS/0178', 0, 'Bp Kusjiarko', 'st', 0, 0, 1, '2021-04-21', '2021-04-20 13:14:15', 'superadmin', '2021-04-21 01:36:43', 'superadmin'),
(6, 5, '2021-04-21', '0197/SJ/ST/IV/21', '0197', '2021/PAS/0171', 0, 'Bp Kusjiarko', 'st', 0, 0, 1, '2021-04-21', '2021-04-20 13:20:50', 'superadmin', '2021-04-21 01:37:15', 'superadmin'),
(7, 5, '2021-04-21', '0198/SJ/ST/IV/21', '0198', '2021/PAS/0172', 0, 'Bp Kusjiarko', 'st', 0, 0, 1, '2021-04-21', '2021-04-20 13:23:58', 'superadmin', '2021-04-21 01:37:41', 'superadmin'),
(8, 6, '2021-04-21', '155B/SJ/SMA/IV/21', '155', '-', 155, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-21', '2021-04-20 13:40:00', 'superadmin', '2021-04-21 06:48:57', 'superadmin'),
(9, 7, '2021-04-21', '158/SJ/SMA/IV/21', '158', '-', 0, 'Ibu Nindya', 'sma', 0, 0, 1, '2021-04-21', '2021-04-20 13:44:12', 'superadmin', '2021-04-21 04:41:06', 'superadmin'),
(10, 6, '2021-04-21', '160/SJ/SMA/IV/21', '160', '-', 0, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-21', '2021-04-20 14:02:31', 'superadmin', '2021-04-20 14:02:31', NULL),
(11, 2, '2021-04-21', '0204/SJ/ST/IV/21', '0204', '-', 0, 'Ibu Astri', 'st', 0, 0, 1, '2021-04-21', '2021-04-21 03:30:32', 'superadmin', '2021-04-21 03:30:32', NULL),
(12, 8, '2021-04-21', '165/SJ/SMA/IV/21', '165', '-', 7, 'Bp Narto', 'sma', 0, 0, 1, '2021-04-23', '2021-04-21 06:15:00', 'superadmin', '2021-04-21 06:35:59', 'superadmin'),
(13, 6, '2021-04-17', '155/SJ/SMA/IV/21', '155', '-', 155, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-21', '2021-04-21 06:48:29', 'superadmin', '2021-04-21 06:48:29', NULL),
(14, 9, '2021-04-23', '0193/SJ/ST/IV/21', '0193', '-', 0, 'Bp Bono', 'st', 0, 0, 0, NULL, '2021-04-21 09:43:12', 'superadmin', '2021-04-21 09:43:12', NULL),
(15, 10, '2021-04-23', '0194/SJ/ST/IV/21', '0194', '-', 0, 'Bp Aji Saksono', 'st', 0, 0, 1, '2021-04-26', '2021-04-21 09:54:04', 'superadmin', '2021-04-21 09:54:04', NULL),
(16, 9, '2021-04-23', '0202/SJ/ST/IV/21', '0202', '-', 0, 'Bp Bono', 'st', 0, 0, 1, '2021-04-23', '2021-04-21 10:12:27', 'superadmin', '2021-04-21 10:12:27', NULL),
(17, 11, '2021-04-22', '110B/SJ/SMA/IV/21', '110', '-', 0, 'Bp Hendro Ari', 'sma', 0, 0, 0, '2021-04-23', '2021-04-21 11:59:24', 'superadmin', '2021-04-24 02:07:55', 'superadmin'),
(18, 27, '2021-04-22', '162/SJ/SMA/IV/21', '162', 'P21-ATMI2E-082', 0, 'Ibu Irine Isti', 'sma', 0, 0, 1, '2021-04-24', '2021-04-21 12:18:22', 'superadmin', '2021-04-27 06:37:59', 'superadmin'),
(19, 27, '2021-04-22', '163/SJ/SMA/IV/21', '163', 'P21-ATMI2E-083', 0, 'Ibu Irine Isti', 'sma', 0, 0, 1, '2021-04-24', '2021-04-21 12:26:32', 'superadmin', '2021-04-27 06:39:27', 'superadmin'),
(20, 8, '2021-04-23', '164/SJ/SMA/IV/21', '164', '-', 0, 'Bp Narto', 'sma', 0, 0, 1, '2021-04-23', '2021-04-21 12:30:57', 'superadmin', '2021-04-21 12:30:57', NULL),
(21, 8, '2021-04-23', '165B/SJ/SMA/IV/21', '165', '-', 7, 'Bp Narto', 'sma', 0, 0, 1, '2021-04-23', '2021-04-21 12:34:52', 'superadmin', '2021-04-21 12:34:52', NULL),
(22, 13, '2021-04-23', '161/SJ/SMA/IV/21', '161', '-', 0, 'Bp Ruyanto', 'sma', 0, 1, 1, '2021-04-23', '2021-04-21 14:01:42', 'superadmin', '2021-04-21 14:01:42', NULL),
(23, 14, '2021-04-23', '152/SJ/SMA/IV/21', '152', '-', 0, 'Bp Wahyu', 'sma', 0, 0, 1, '2021-04-23', '2021-04-21 14:35:53', 'superadmin', '2021-04-21 14:39:16', 'superadmin'),
(25, 2, '2021-04-22', '0205/SJ/ST/IV/21', '0205', '-', 0, 'Ibu Astri', 'st', 0, 0, 1, '2021-04-22', '2021-04-22 03:54:41', 'superadmin', '2021-04-22 03:54:41', NULL),
(26, 8, '2021-04-23', '167/SJ/SMA/IV/21', '167', '-', 0, 'Bp Narto', 'sma', 0, 0, 1, '2021-04-23', '2021-04-22 11:54:09', 'superadmin', '2021-04-22 11:54:09', NULL),
(27, 16, '2021-04-23', '169A/SJ/SMA/IV/21', '169', '-', 10, 'Bp Feri', 'sma', 0, 0, 1, '2021-04-27', '2021-04-22 12:04:20', 'superadmin', '2021-04-23 02:51:37', 'superadmin'),
(28, 6, '2021-04-26', '166/SJ/SMA/IV/21', '166', '-', 0, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-26', '2021-04-22 12:59:09', 'superadmin', '2021-04-22 12:59:09', NULL),
(29, 6, '2021-04-23', '168/SJ/SMA/IV/21', '168', '254/PO-YPTI/04/21', 0, 'Ibu Dwi', 'sma', 0, 0, 1, '2021-04-23', '2021-04-22 15:36:27', 'superadmin', '2021-04-24 07:57:53', 'superadmin'),
(30, 15, '2021-04-23', '124/SJ/SMA/IV/21', '124', '-', 0, 'Bp Didik Darmawan', 'sma', 0, 0, 1, '2021-04-26', '2021-04-22 16:12:27', 'superadmin', '2021-04-23 12:14:53', 'superadmin'),
(31, 17, '2021-04-23', '0208/SJ/ST/IV/21', '0208', '-', 0, 'Ibu Ina', 'st', 0, 0, 1, '2021-04-23', '2021-04-23 03:07:21', 'superadmin', '2021-04-23 03:07:21', NULL),
(32, 18, '2021-04-23', '0209/SJ/ST/IV/21', '0209', '-', 0, 'Bp Deni', 'st', 0, 0, 1, '2021-04-27', '2021-04-23 03:21:08', 'superadmin', '2021-04-23 03:21:08', NULL),
(33, 19, '2021-04-23', '172/SJ/SMA/IV/21', '172', '-', 0, 'Bp Agustinus', 'sma', 0, 0, 1, '2021-04-23', '2021-04-23 03:30:21', 'superadmin', '2021-04-23 03:54:29', 'superadmin'),
(34, 20, '2021-04-23', '0210A/SJ/ST/IV/21', '0210', '-', 2, 'Bp Kliwon', 'st', 0, 0, 1, '2021-05-03', '2021-04-23 03:57:49', 'superadmin', '2021-05-02 05:40:43', 'superadmin'),
(35, 21, '2021-04-24', '170/SJ/SMA/IV/21', '170', '-', 0, 'Bp Arif', 'sma', 0, 0, 1, '2021-04-24', '2021-04-23 14:17:53', 'superadmin', '2021-04-23 14:17:53', NULL),
(36, 11, '2021-03-17', '110A/SJ/SMA/III/21', '110', '-', 6, 'Bp Hendro Ari', 'sma', 0, 1, 1, '2021-04-23', '2021-04-24 02:25:13', 'superadmin', '2021-04-24 02:25:13', NULL),
(37, 11, '2021-04-24', '110/SJ/SMA/IV/21', '110', '-', 6, 'Bp Hendro Ari', 'sma', 0, 1, 1, '2021-04-23', '2021-04-24 02:48:52', 'superadmin', '2021-04-24 02:48:52', NULL),
(38, 2, '2021-04-16', '0189/SJ/ST/IV/21', '0189', '-', 0, 'Ibu Astri', 'st', 0, 0, 1, '2021-04-16', '2021-04-24 02:59:31', 'superadmin', '2021-04-24 02:59:31', NULL),
(39, 22, '2021-04-24', '0206/SJ/SMA/IV/21', '0206', '-', 0, 'Bp Joko Mursito', 'st', 0, 0, 1, '2021-04-24', '2021-04-24 07:38:03', 'superadmin', '2021-04-24 07:38:03', NULL),
(40, 8, '2021-04-26', '173/SJ/SMA/IV/21', '173', '-', 0, 'Bp Narto', 'sma', 0, 0, 1, '2021-04-26', '2021-04-26 01:03:36', 'superadmin', '2021-04-26 01:03:36', NULL),
(41, 23, '2021-04-26', '0214/SJ/ST/IV/21', '0214', '-', 0, 'Bp Mrajak', 'st', 0, 0, 1, '2021-04-26', '2021-04-26 01:43:52', 'superadmin', '2021-04-26 01:43:52', NULL),
(42, 19, '2021-04-26', '175/SJ/SMA/IV/21', '175', '-', 0, 'Bp Agustinus', 'sma', 0, 0, 1, '2021-04-26', '2021-04-26 01:52:31', 'superadmin', '2021-04-26 01:52:31', NULL),
(43, 24, '2021-04-26', '171/SJ/SMA/IV/21', '171', '-', 0, 'Bp Basirun', 'sma', 0, 0, 1, '2021-04-26', '2021-04-26 02:06:01', 'superadmin', '2021-04-26 02:06:01', NULL),
(44, 2, '2021-04-26', '177/SJ/SMA/IV/21', '177', '-', 0, 'Ibu Susi', 'sma', 0, 0, 1, '2021-04-26', '2021-04-26 04:26:28', 'superadmin', '2021-04-26 04:26:28', NULL),
(45, 6, '2021-04-28', '179/SJ/SMA/IV/21', '179', '089/POM-YPTI/03/21', 0, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-28', '2021-04-26 13:00:13', 'superadmin', '2021-04-26 13:00:13', NULL),
(46, 16, '2021-04-27', '178A/SJ/SMA/IV/21', '178', '2021/PO/1241-W', 11, 'Bp Feri', 'sma', 0, 0, 1, '2021-04-28', '2021-04-26 13:29:28', 'superadmin', '2021-04-26 13:30:15', 'superadmin'),
(47, 25, '2021-04-27', '174/SJ/SMA/IV/21', '174', '-', 0, 'Bp Eko', 'sma', 0, 0, 1, '2021-04-27', '2021-04-26 13:43:24', 'superadmin', '2021-04-26 13:43:24', NULL),
(48, 16, '2021-04-27', '169B/SJ/SMA/IV/21', '169', '-', 10, 'Bp Feri', 'sma', 0, 0, 1, '2021-04-27', '2021-04-26 13:50:11', 'superadmin', '2021-04-26 13:50:11', NULL),
(50, 26, '2021-04-27', '0211/SJ/ST/IV/21', '0211', '-', 0, 'Ibu Wuri', 'st', 0, 0, 1, '2021-04-27', '2021-04-26 14:04:37', 'superadmin', '2021-04-26 14:04:37', NULL),
(51, 28, '2021-04-24', '0203/SJ/ST/IV/21', '0203', '-', 0, 'Bp Danang Wijaya', 'st', 0, 0, 1, '2021-04-24', '2021-04-27 09:16:57', 'superadmin', '2021-04-27 09:16:57', NULL),
(52, 16, '2021-04-28', '180/SJ/SMA/IV/21', '180', '-', 12, 'Bp Feri', 'sma', 0, 0, 0, NULL, '2021-04-27 13:53:43', 'superadmin', '2021-04-27 13:53:43', NULL),
(53, 16, '2021-04-28', '178B/SJ/SMA/IV/21', '178', '-', 11, 'Bp Feri', 'sma', 0, 0, 1, '2021-04-28', '2021-04-27 13:56:53', 'superadmin', '2021-04-28 12:25:58', 'superadmin'),
(54, 16, '2021-04-29', '176/SJ/SMA/IV/21', '176', '-', 0, 'Bp Feri', 'sma', 0, 0, 1, '2021-04-29', '2021-04-28 12:07:13', 'superadmin', '2021-04-28 12:07:13', NULL),
(55, 29, '2021-04-30', '182/SJ/SMA/IV/21', '182', '-', 0, 'Bp Eko', 'sma', 0, 0, 1, '2021-04-30', '2021-04-28 12:47:46', 'superadmin', '2021-04-28 12:47:46', NULL),
(56, 6, '2021-04-30', '183/SJ/SMA/IV/21', '183', '-', 0, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-30', '2021-04-28 13:10:54', 'superadmin', '2021-04-28 13:10:54', NULL),
(57, 2, '2021-04-29', '184/SJ/SMA/IV/21', '184', '-', 0, 'Ibu Siska', 'sma', 0, 0, 1, '2021-04-29', '2021-04-28 13:20:45', 'superadmin', '2021-04-28 13:20:45', NULL),
(58, 1, '2021-04-29', '0216/SJ/ST/IV/21', '0216', '-', 0, 'Bp Irwan', 'st', 0, 0, 1, '2021-04-29', '2021-04-28 13:52:04', 'superadmin', '2021-04-28 13:52:04', NULL),
(59, 17, '2021-04-29', '0215/SJ/ST/IV/21', '0215', '-', 0, 'Ibu Ina', 'st', 0, 0, 1, '2021-04-29', '2021-04-28 14:01:15', 'superadmin', '2021-04-29 01:37:41', 'superadmin'),
(60, 30, '2021-03-27', '0130/SJ/ST/III/21', '0130', '-', 0, 'Bp Rudi', 'st', 0, 1, 1, '2021-04-27', '2021-04-29 03:46:57', 'superadmin', '2021-04-29 03:46:57', NULL),
(61, 19, '2021-04-19', '141/SJ/SMA/IV/21', '141', '-', 0, 'Bp Agustinus', 'sma', 0, 0, 1, '2021-04-19', '2021-04-29 04:21:01', 'superadmin', '2021-04-29 04:21:01', NULL),
(62, 6, '2021-04-30', '185/SJ/SMA/IV/21', '185', '-', 0, 'Ibu Lucia', 'sma', 0, 0, 1, '2021-04-30', '2021-04-29 11:06:54', 'superadmin', '2021-04-29 11:06:54', NULL),
(63, 16, '2021-04-30', '186A/SJ/SMA/IV/21', '186', '-', 1, 'Bp Feri', 'sma', 0, 0, 1, '2021-05-03', '2021-04-29 11:16:37', 'superadmin', '2021-04-29 11:16:37', NULL),
(64, 16, '2021-05-03', '187/SJ/SMA/V/21', '187', '2021/PO/1323-W', 0, 'Bp Feri', 'sma', 0, 0, 1, '2021-05-03', '2021-05-02 04:10:36', 'superadmin', '2021-05-02 04:10:36', NULL),
(65, 16, '2021-05-03', '186B/SJ/SMA/V/21', '186', '2021/PO/1310-W', 1, 'Bp Feri', 'sma', 0, 0, 1, '2021-05-03', '2021-05-02 04:22:31', 'superadmin', '2021-05-02 04:22:31', NULL),
(66, 32, '2021-05-03', '188/SJ/SMA/V/21', '188', '-', 0, 'Ibu Harti', 'sma', 0, 0, 1, '2021-05-03', '2021-05-02 04:33:48', 'superadmin', '2021-05-02 04:33:48', NULL),
(67, 33, '2021-05-03', '0217/SJ/ST/V/21', '0217', '-', 0, 'Ibu Susi', 'st', 0, 0, 1, '2021-05-03', '2021-05-02 05:31:12', 'superadmin', '2021-05-02 05:31:12', NULL),
(68, 20, '2021-05-03', '0210B/SJ/ST/V/21', '0210', '-', 2, 'Bp Kliwon', 'st', 0, 0, 1, '2021-05-03', '2021-05-02 05:41:33', 'superadmin', '2021-05-02 05:41:33', NULL),
(69, 24, '2021-05-04', '159/SJ/SMA/V/21', '159', '-', 0, 'Bp Basirun', 'sma', 0, 0, 0, NULL, '2021-05-02 12:57:59', 'superadmin', '2021-05-02 12:57:59', NULL),
(70, 2, '2021-05-03', '190/SJ/SMA/V/21', '190', '-', 0, 'Ibu Susi', 'sma', 0, 0, 1, '2021-05-03', '2021-05-03 01:47:44', 'superadmin', '2021-05-03 01:47:44', NULL),
(71, 19, '2021-05-03', '189/SJ/SMA/V/21', '189', '-', 0, 'Bp Agustinus', 'sma', 0, 0, 1, '2021-05-03', '2021-05-03 02:37:25', 'superadmin', '2021-05-03 03:38:16', 'superadmin'),
(72, 34, '2021-05-03', '192/SJ/SMA/V/21', '192', '-', 0, 'Bp Anton', 'sma', 0, 0, 1, '2021-05-03', '2021-05-03 05:11:13', 'superadmin', '2021-05-03 05:11:13', NULL),
(73, 35, '2021-04-26', '0212/SJ/ST/IV/21', '0212', '-', 0, 'Bp Darso', 'st', 0, 0, 1, '2021-04-26', '2021-05-03 06:20:03', 'superadmin', '2021-05-03 06:20:03', NULL),
(74, 8, '2021-05-05', '191/SJ/SMA/V/21', '191', '-', 0, 'Bp Narto', 'sma', 0, 0, 1, '2021-05-05', '2021-05-03 07:27:06', 'superadmin', '2021-05-03 07:27:06', NULL),
(75, 36, '2021-05-05', '0219/SJ/ST/V/21', '0219', '-', 0, 'Bp Rendra', 'st', 0, 0, 1, '2021-05-05', '2021-05-03 07:48:27', 'superadmin', '2021-05-03 07:48:27', NULL),
(76, 37, '2021-05-04', '0221/SJ/ST/V/21', '0221', '-', 0, 'Bp Ali Akhmadi S.', 'st', 0, 0, 1, '2021-05-04', '2021-05-04 05:11:09', 'superadmin', '2021-05-04 05:11:09', NULL),
(77, 6, '2021-05-05', '193/SJ/SMA/V/21', '193', '-', 0, 'Ibu Nindya', 'sma', 0, 0, 1, '2021-05-05', '2021-05-04 11:40:40', 'superadmin', '2021-05-04 11:40:40', NULL),
(78, 9, '2021-05-05', '0218/SJ/ST/V/21', '0218', '-', 0, 'Bp Bono', 'st', 0, 0, 1, '2021-05-05', '2021-05-04 11:50:45', 'superadmin', '2021-05-04 11:50:45', NULL),
(79, 31, '2021-04-01', '181/SJ/SMA/IV/21', '181', '-', 0, 'Bp M. Subari Edy P', 'sma', 0, 0, 1, '2021-04-01', '2021-05-04 12:25:53', 'superadmin', '2021-05-04 12:25:53', NULL),
(80, 16, '2021-05-05', '195A/SJ/SMA/V/21', '195', '2021/PO/1358-W', 3, 'Bp Feri', 'sma', 0, 0, 0, NULL, '2021-05-05 03:44:01', 'superadmin', '2021-05-05 03:44:01', NULL),
(81, 17, '2021-05-05', '0222/SJ/ST/V/21', '0222', '-', 0, 'Ibu Ina', 'st', 0, 0, 1, '2021-05-05', '2021-05-05 06:10:57', 'superadmin', '2021-05-05 06:10:57', NULL),
(82, 2, '2021-05-06', '194/SJ/SMA/V/21', '194', '-', 0, 'Ibu Astri', 'sma', 0, 0, 1, '2021-05-06', '2021-05-05 11:35:42', 'superadmin', '2021-05-05 11:35:42', NULL),
(83, 2, '2021-05-06', '196/SJ/SMA/V/21', '196', '-', 0, 'Bp Mulyamto', 'sma', 0, 0, 1, '2021-05-06', '2021-05-05 11:48:38', 'superadmin', '2021-05-05 11:48:38', NULL),
(84, 2, '2021-05-06', '197/SJ/SMA/V/21', '197', '-', 0, 'Ibu Susi', 'sma', 0, 0, 1, '2021-05-06', '2021-05-05 12:03:23', 'superadmin', '2021-05-05 12:03:23', NULL),
(85, 19, '2021-05-06', '198/SJ/SMA/V/21', '198', '-', 0, 'Bp Agustinus', 'sma', 0, 0, 1, '2021-05-06', '2021-05-05 12:09:05', 'superadmin', '2021-05-05 12:09:05', NULL),
(86, 1, '2021-05-06', '0223/SJ/ST/V/21', '0223', '-', 0, 'Bp Irwan', 'st', 0, 0, 1, '2021-05-06', '2021-05-05 12:14:26', 'superadmin', '2021-05-05 12:14:26', NULL);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
  `ppn` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`id`, `nama_supplier`, `ppn`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Stock', 0, '2021-04-20 01:39:56', 'developer', '0000-00-00 00:00:00', NULL),
(2, 'PT Surya Baru Mandiri', 0, '2021-04-20 12:22:33', 'developer', '2021-04-20 00:22:59', 'developer'),
(3, 'Sinar Mentari Jaya', 0, '2021-04-20 12:46:16', 'developer', '0000-00-00 00:00:00', NULL),
(4, 'Okina', 0, '2021-04-20 12:58:14', 'developer', '0000-00-00 00:00:00', NULL),
(5, 'Indobaut', 0, '2021-04-20 13:01:46', 'developer', '0000-00-00 00:00:00', NULL),
(6, 'Sumber Hidup', 0, '2021-04-20 13:16:21', 'developer', '0000-00-00 00:00:00', NULL),
(7, 'Podomoro', 0, '2021-04-20 13:47:09', 'developer', '0000-00-00 00:00:00', NULL),
(8, 'Jatmiko Cipta Karya', 0, '2021-04-21 09:35:17', 'developer', '0000-00-00 00:00:00', NULL),
(9, 'Jaya Mandiri', 0, '2021-04-21 09:49:56', 'developer', '0000-00-00 00:00:00', NULL),
(10, 'Cipta Bangun Mandiri', 0, '2021-04-21 11:55:12', 'developer', '0000-00-00 00:00:00', NULL),
(11, 'PT Gofir Sarana Sejahtera', 0, '2021-04-21 12:20:27', 'developer', '0000-00-00 00:00:00', NULL),
(12, 'Tokopedia', 0, '2021-04-21 13:36:44', 'developer', '0000-00-00 00:00:00', NULL),
(13, 'Ngudi Rejeki', 0, '2021-04-21 13:37:10', 'developer', '0000-00-00 00:00:00', NULL),
(14, 'Sidodadi', 0, '2021-04-21 13:37:26', 'developer', '0000-00-00 00:00:00', NULL),
(15, 'Morodadi', 0, '2021-04-22 15:29:20', 'developer', '0000-00-00 00:00:00', NULL),
(16, 'Xingrong', 0, '2021-04-23 14:10:55', 'developer', '0000-00-00 00:00:00', NULL),
(17, 'Dian Reka Teknik', 0, '2021-04-26 00:58:01', 'developer', '0000-00-00 00:00:00', NULL),
(18, 'Warna Abadi', 0, '2021-04-26 01:49:13', 'developer', '0000-00-00 00:00:00', NULL),
(19, 'Inpertek', 0, '2021-04-26 01:54:13', 'developer', '0000-00-00 00:00:00', NULL),
(20, 'Zigma', 0, '2021-04-26 13:14:17', 'developer', '0000-00-00 00:00:00', NULL),
(21, 'Sentosa Mandiri', 0, '2021-04-26 13:36:44', 'developer', '0000-00-00 00:00:00', NULL),
(22, 'Buana Mas Prestasi', 0, '2021-04-26 13:47:20', 'developer', '0000-00-00 00:00:00', NULL),
(23, 'Budi Murni', 0, '2021-04-29 11:03:46', 'developer', '0000-00-00 00:00:00', NULL),
(24, 'Bumiputra', 0, '2021-05-02 04:05:33', 'developer', '0000-00-00 00:00:00', NULL),
(25, 'Yakin Maju Sentosa', 0, '2021-05-05 11:45:25', 'developer', '0000-00-00 00:00:00', NULL);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(99) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nm_user`, `level`, `otoritas`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Biasa', 'Admin', 'Penjualan', '2020-07-10 13:51:57', NULL, '0000-00-00 00:00:00', NULL),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User Biasa', 'User', 'Pembelian', '2020-07-10 13:51:57', NULL, '2020-07-26 19:08:37', 'developer'),
(3, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Admin Super', 'SuperAdmin', 'Penjualan', '2020-07-10 13:51:57', NULL, '0000-00-00 00:00:00', NULL),
(4, 'developer', '5e8edd851d2fdfbd7415232c67367cc3', 'DEVELOPER SMA', 'Developer', 'Pembelian', '2020-07-10 13:51:57', NULL, '2021-02-06 21:24:32', 'developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `m_barang_plus`
--
ALTER TABLE `m_barang_plus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `m_invoice`
--
ALTER TABLE `m_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `m_nota`
--
ALTER TABLE `m_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `m_perusahaan`
--
ALTER TABLE `m_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `m_pl_list_barang`
--
ALTER TABLE `m_pl_list_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `m_pl_price_list`
--
ALTER TABLE `m_pl_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `m_price_list`
--
ALTER TABLE `m_price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
