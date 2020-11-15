-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 04:34 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE IF NOT EXISTS `tb_bobot` (
  `id_bobot` int(10) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `id_kriteria` int(2) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_bobot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE IF NOT EXISTS `tb_hasil` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `id_ormawa` int(3) NOT NULL,
  `peringkat` int(1) NOT NULL,
  `hasil perhitungan` float NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `id_ormawa` (`id_ormawa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `kode_kriteria` char(2) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`) VALUES
('K1', 'Jumlah Anggota Aktif'),
('K2', 'Jumlah Pendanaan Mandiri/Sponsor'),
('K3', 'Prestasi Lokal'),
('K4', 'Prestasi Kabupaten');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_ormawa` int(3) NOT NULL,
  `id_kriteria` int(2) NOT NULL,
  `nilai` int(1) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ormawa`
--

CREATE TABLE IF NOT EXISTS `tb_ormawa` (
  `id_ormawa` int(3) NOT NULL AUTO_INCREMENT,
  `nama_ormawa` varchar(100) NOT NULL,
  `singkatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ormawa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_ormawa`
--

INSERT INTO `tb_ormawa` (`id_ormawa`, `nama_ormawa`, `singkatan`) VALUES
(1, 'Badan Eksekutif Mahasiswa Keluarga Mahasiswa', 'BEM KM'),
(2, 'Dewa Perwakilan Mahasiswa Keluarga Mahasiswa', 'DPM KM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna_ormawa`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna_ormawa` (
  `id_pengguna` int(3) NOT NULL AUTO_INCREMENT,
  `id_unit` int(3) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('admin','ormawa','bidang kemahasiswaan') NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_unit` (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_pengguna_ormawa`
--

INSERT INTO `tb_pengguna_ormawa` (`id_pengguna`, `id_unit`, `nama_pengguna`, `nama_lengkap`, `kata_sandi`, `email`, `hak_akses`, `gambar`) VALUES
(1, 1, 'danang', 'Danang Hanjaru', 'danang', 'danang@upy.ac.id', '', 'danang.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna_unit`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna_unit` (
  `id_pengguna_unit` int(3) NOT NULL AUTO_INCREMENT,
  `id_unit` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pengguna_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_pengguna_unit`
--

INSERT INTO `tb_pengguna_unit` (`id_pengguna_unit`, `id_unit`, `nama_lengkap`, `kata_sandi`, `email`, `gambar`, `jabatan`) VALUES
(1, 1, 'M. Fairuzabadi, M.Kom', 'fairuz', 'fairuz@upy,ac.id', 'fairuz.jpg', 'Wakil Rektor Kemahasiswaaan, Alumni dan Kerjasama'),
(2, 2, 'Sigit Handoko', 'sigit', 'sigit@upy.ac.id', 'sigit.png', 'Kepala Lembaga Kemahasiswaan dan Kerjasama'),
(3, 2, 'Danang Hanjaru, S.Sn', 'danang', 'danang@upy.ac.id', 'danang.png', 'Staf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE IF NOT EXISTS `tb_unit` (
  `id_unit` int(10) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id_unit`, `nama_unit`, `singkatan`) VALUES
(1, 'Rektorat', 'WR3'),
(2, 'Lembaga Kemahasiswaan dan Kerjasama', 'LKK');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD CONSTRAINT `tb_hasil_ibfk_1` FOREIGN KEY (`id_ormawa`) REFERENCES `tb_ormawa` (`id_ormawa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
