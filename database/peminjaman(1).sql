-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2017 at 07:26 PM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT,
  `no_peminjaman` varchar(10) NOT NULL,
  `no_agt` varchar(10) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `buku` varchar(80) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `no_peminjaman`, `no_agt`, `kode_buku`, `buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 'P001', 'AGT0000003', '0110101', 'Cara Memperoleh Penghasilan dari Programmer', '2017-01-08', '2017-01-11', 'dikembalikan'),
(2, 'P001', 'AGT0000003', '00002', 'Sholat Malam', '2017-01-08', '2017-01-11', 'dikembalikan'),
(3, 'P002', 'AGT0000003', '0110101', 'Cara Memperoleh Penghasilan dari Programmer', '2017-01-08', '2017-01-11', 'dipinjam'),
(4, 'P002', 'AGT0000003', '00002', 'Sholat Malam', '2017-01-08', '2017-01-11', 'dikembalikan'),
(5, 'P003', 'AGT0000001', '0110101', 'Cara Memperoleh Penghasilan dari Programmer', '2017-01-08', '2017-01-11', 'dipinjam'),
(6, 'P003', 'AGT0000001', '00002', 'Sholat Malam', '2017-01-08', '2017-01-11', 'dikembalikan');
