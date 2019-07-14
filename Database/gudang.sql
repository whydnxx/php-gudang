-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 08:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `no_inventaris` text NOT NULL,
  `no_inventaris_lama` text,
  `seri_barang` varchar(50) NOT NULL,
  `spesifikasi` text,
  `os` varchar(5) DEFAULT NULL,
  `office` varchar(5) DEFAULT NULL,
  `antivirus` varchar(5) DEFAULT NULL,
  `outdoor_indoor` varchar(7) NOT NULL,
  `status` varchar(5) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `user_entry` varchar(100) NOT NULL,
  `user_edit` varchar(100) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `kode_lokasi` varchar(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `kode_divisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no_inventaris`, `no_inventaris_lama`, `seri_barang`, `spesifikasi`, `os`, `office`, `antivirus`, `outdoor_indoor`, `status`, `keterangan`, `user_entry`, `user_edit`, `id_pengguna`, `kode_lokasi`, `kode_barang`, `kode_divisi`) VALUES
('A1/B2/001', 'A1/B2/001', 'AA11123', 'RAM 8GB, nVidea VGA 2 GB, ', '1', '0', '1', '1', '0', 'Barang Baru', 'admin', NULL, 1, 'A13', 1, 6),
('A1/B2/002', 'A1/B2/002', 'AA11124', 'RAM 4GB', '1', '0', '0', '1', '1', 'Barang baru', 'admin', NULL, 1, 'A14', 2, 6),
('A1/B2/003', 'A1/B2/003', '1234', 'barang baru', '', '', '', '1', '1', 'baru', 'admin', NULL, 0, 'A20', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_divisi`, `nama_divisi`) VALUES
(1, 'Pengendalian Kinerja dan PFSO'),
(2, 'Keuangan dan SDM'),
(3, 'Operasi dan Uster'),
(5, 'Komersial'),
(6, 'Teknik dan SI'),
(7, 'IKPP Merak Mas'),
(8, 'Kepanduan'),
(9, 'Umum dan logistik'),
(10, 'Uster'),
(11, 'Keuangan'),
(12, 'PPSA'),
(13, 'Operasi'),
(14, 'Invoice');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_barang`, `nama_jenis_barang`) VALUES
(1, 'PC'),
(2, 'Notebook'),
(3, 'Printer'),
(4, 'Scanner'),
(6, 'Perangkat Aktif Jaringan '),
(7, 'Telepon'),
(8, 'UPS'),
(9, 'Projector'),
(10, 'Panaboard'),
(11, 'Tablet'),
(12, 'Barcode Reader'),
(13, 'HD Eksternal'),
(14, 'RFID Reader'),
(15, 'Drone'),
(17, 'Lain lain');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `no_kerusakan` int(11) NOT NULL,
  `tgl_kerusakan` date NOT NULL,
  `tgl_perbaikan` date DEFAULT NULL,
  `harga_perbaikan` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `user_entry` varchar(30) NOT NULL,
  `user_edit` varchar(30) DEFAULT NULL,
  `no_inventaris` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`no_kerusakan`, `tgl_kerusakan`, `tgl_perbaikan`, `harga_perbaikan`, `status`, `keterangan`, `user_entry`, `user_edit`, `no_inventaris`) VALUES
(5, '2018-07-13', NULL, NULL, '0', 'Kecebur', 'admin', NULL, 'A1/B2/001'),
(7, '2018-07-14', '2018-07-16', 123, '1', 'baru', 'admin', 'admin', 'A1/B2/003'),
(8, '2018-07-15', '2018-07-24', 321, '1', 'test', 'admin', 'admin', 'A1/B2/003');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `kode_lokasi` varchar(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`kode_lokasi`, `nama_lokasi`) VALUES
('A1', 'lorong teknik lt 2'),
('A10', 'RUANG PPSA 1'),
('A11', 'RUANG PPSA 2'),
('A12', 'RUANG NUSANTARA'),
('A13', 'RUANG SERVER'),
('A14', 'RUANG TEKNIK'),
('A15', 'RUANG MANAGER TEKNIK'),
('A16', 'RUANG INVOVATION 1'),
('A17', 'RUANG INOVATION 2'),
('A18', 'RUANG PFSO'),
('A19', 'RUANG MANAGER PFSO'),
('A2', 'RUANG SDM'),
('A20', 'Pintu Masuk Masjid'),
('A21', 'Ruangan Keuangan'),
('A22', 'Ruang Deputy Operasi _ Gedung Shelter'),
('A23', 'Ruang staf lt 2 _ Gedung Shelter'),
('A24', 'Pintu Masuk lt 2 _ Gedung Shelter'),
('A25', 'Lt 1 _ Gedung Shelter'),
('A26', 'ruang rapat lt 2 _ Gedung Shelter'),
('A3', 'RUANG MANAGER KEUANGAN'),
('A4', 'RUANG INVOICE'),
('A5', 'RUANG KASIR'),
('A6', 'RUANG OPERASIONAL'),
('A7', 'RUANG  MANAGER OPERASIONAL'),
('A8', 'RUANG RENDAL'),
('A9', 'RUANG ICT'),
('B1', 'lt1. depan Masjid'),
('B10', 'front desk BHC'),
('B11', 'control room BHC'),
('B12', 'tangga Lt. 2 BHC'),
('B13', 'rapat BHC'),
('B2', 'lt1. belakang Masjid'),
('B3', 'Lt 1 . pintu masuk belakang Masjid'),
('B4', 'Lt 1 . pintu masuk depan Masjid'),
('B5', 'Lt 2 . Dalam Masjid'),
('B6', 'Lt 2. Pintu belakang Masjid'),
('B7', 'Lt 2. Pintu depan Masjid'),
('B8', 'selasar pintu lt. 1 BHC'),
('B9', 'ruang istirahat operator BHC'),
('E1', 'Lapangan Penumpukan'),
('E3', 'Gate In'),
('E4', 'Dermaga 001'),
('F1', 'Dermaga 005 B'),
('F2', 'Dermaga 005 A'),
('F3', 'Dermaga 005'),
('F4', 'Dermaga Batubara 007'),
('F5', 'Dermaga Batubara 006'),
('F6', 'Gate Utama'),
('F61', 'Gate Utama IN'),
('F62', 'Gate Utama out'),
('F7', 'Uster'),
('F8', 'Lapangan Portindo'),
('F9', 'Sekitar Gedung PMK'),
('IN1', 'PINTU MASUK GEDUNG UTAMA'),
('IN2', 'RUANG TUNGGU GM'),
('IN3', 'LOBBY GEDUNG UTAMA'),
('IN4', 'NUSANTARA ROOM'),
('R1', 'Stasiun Pandu'),
('R2', 'Dermaga 004'),
('R3', 'Jalan Raya Anyer'),
('R4', 'Penumpukan Batubara');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_barang`
--

CREATE TABLE `pengguna_barang` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_barang`
--

INSERT INTO `pengguna_barang` (`id_pengguna`, `nama_pengguna`) VALUES
(1, 'Arief Nur Abdullah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `username`, `password`, `role`, `email`) VALUES
(4, 'wahyu', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'operator', 'wahyu@email.com'),
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`no_kerusakan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kode_lokasi`);

--
-- Indexes for table `pengguna_barang`
--
ALTER TABLE `pengguna_barang`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `no_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna_barang`
--
ALTER TABLE `pengguna_barang`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
