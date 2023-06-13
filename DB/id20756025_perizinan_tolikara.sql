-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 06:04 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20756025_perizinan_tolikara`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemantauan`
--

CREATE TABLE `tbl_pemantauan` (
  `kd_pemantauan` int(10) NOT NULL,
  `kd_persh` varchar(4) DEFAULT NULL,
  `nm_persh` varchar(35) DEFAULT NULL,
  `nm_usaha` varchar(35) DEFAULT NULL,
  `hsl_pantau` text,
  `isi_pantauan` varchar(50) DEFAULT NULL,
  `patuh` varchar(10) DEFAULT NULL,
  `mutu` varchar(10) DEFAULT NULL,
  `waktu_pengawasan` date DEFAULT NULL,
  `semester` varchar(3) DEFAULT NULL,
  `kesimpulan` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembinaan`
--

CREATE TABLE `tbl_pembinaan` (
  `kd_pembinaan` int(10) NOT NULL,
  `kd_persh` varchar(4) DEFAULT NULL,
  `nm_persh` varchar(35) DEFAULT NULL,
  `nm_usaha` varchar(35) DEFAULT NULL,
  `tgl_pembinaan` date DEFAULT NULL,
  `jns_pembinaan` varchar(35) DEFAULT NULL,
  `image_pembinaan` text,
  `pembinaan` varchar(50) DEFAULT NULL,
  `tindakan_pembinaan` varchar(50) DEFAULT NULL,
  `kesimpulan` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengelolaan`
--

CREATE TABLE `tbl_pengelolaan` (
  `kd_pengelolaan` int(10) NOT NULL,
  `kd_persh` varchar(4) DEFAULT NULL,
  `nm_persh` varchar(35) DEFAULT NULL,
  `nm_usaha` varchar(35) DEFAULT NULL,
  `th_pengawasan` varchar(4) DEFAULT NULL,
  `waktu_pengawasan` date DEFAULT NULL,
  `semester` varchar(3) DEFAULT NULL,
  `kesimpulan` varchar(50) DEFAULT NULL,
  `hasil` varchar(50) DEFAULT NULL,
  `patuh` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `kd_persh` varchar(4) NOT NULL,
  `nm_persh` varchar(35) DEFAULT NULL,
  `alamat_persh` varchar(35) DEFAULT NULL,
  `npwp_persh` varchar(35) DEFAULT NULL,
  `nm_pjwb` varchar(35) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rencana`
--

CREATE TABLE `tbl_rencana` (
  `kd_rencana` int(10) NOT NULL,
  `kd_persh` varchar(4) DEFAULT NULL,
  `nm_persh` varchar(35) DEFAULT NULL,
  `nm_usaha` varchar(35) DEFAULT NULL,
  `uraian` varchar(35) DEFAULT NULL,
  `skala` varchar(35) DEFAULT NULL,
  `alamat_usaha` varchar(35) DEFAULT NULL,
  `telp_usaha` varchar(15) DEFAULT NULL,
  `no_tgl_izin_ling` varchar(20) DEFAULT NULL,
  `no_tgl_izin_skkl` varchar(20) DEFAULT NULL,
  `no_tgl_izin_ukl` varchar(20) DEFAULT NULL,
  `upy_kelola_ling` varchar(50) DEFAULT NULL,
  `upy_pantau_ling` varchar(50) DEFAULT NULL,
  `periode_laporan` varchar(35) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_login` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `level` enum('perizinan','hasil_pengawasan','penegakan_hukum') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_login`, `username`, `password`, `level`) VALUES
(1, 'kamar1', '83f4410e6e5a751af1d90e93973775e7', 'perizinan'),
(2, 'kamar2', '8ac1b241dba3d8bb7e91bb769d02e42a', 'hasil_pengawasan'),
(3, 'kamar3', '32f043fe6cfda754163f0a6f7516ffc5', 'penegakan_hukum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pemantauan`
--
ALTER TABLE `tbl_pemantauan`
  ADD PRIMARY KEY (`kd_pemantauan`);

--
-- Indexes for table `tbl_pembinaan`
--
ALTER TABLE `tbl_pembinaan`
  ADD PRIMARY KEY (`kd_pembinaan`);

--
-- Indexes for table `tbl_pengelolaan`
--
ALTER TABLE `tbl_pengelolaan`
  ADD PRIMARY KEY (`kd_pengelolaan`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`kd_persh`);

--
-- Indexes for table `tbl_rencana`
--
ALTER TABLE `tbl_rencana`
  ADD PRIMARY KEY (`kd_rencana`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pemantauan`
--
ALTER TABLE `tbl_pemantauan`
  MODIFY `kd_pemantauan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pembinaan`
--
ALTER TABLE `tbl_pembinaan`
  MODIFY `kd_pembinaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pengelolaan`
--
ALTER TABLE `tbl_pengelolaan`
  MODIFY `kd_pengelolaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_rencana`
--
ALTER TABLE `tbl_rencana`
  MODIFY `kd_rencana` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
