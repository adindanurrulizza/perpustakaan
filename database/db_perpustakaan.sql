-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 01:28 PM
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
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `no_agt` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `stts` varchar(10) NOT NULL,
  PRIMARY KEY (`no_agt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`no_agt`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `stts`) VALUES
('AGT0000001', 'Khairul Umam', 'Laki-Laki', 'Pekanbaru', '1992-05-26', 'Jl. Tangkuban Perahu No 2\r\n', 'aktif'),
('AGT0000002', 'Nicky William', 'Laki-Laki', 'Jakarta Selatan', '1995-01-12', 'Jl Perahu', 'aktif'),
('AGT0000003', 'Andi', 'Laki-Laki', 'Bangka', '2013-02-22', 'Jl Soekarno Hatta', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bebas_pustaka`
--

CREATE TABLE IF NOT EXISTS `bebas_pustaka` (
  `no_bebas_pustaka` varchar(10) NOT NULL,
  `no_agt` varchar(10) NOT NULL,
  `tgl_bebas_pustaka` date NOT NULL,
  PRIMARY KEY (`no_bebas_pustaka`),
  KEY `no_agt` (`no_agt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bebas_pustaka`
--

INSERT INTO `bebas_pustaka` (`no_bebas_pustaka`, `no_agt`, `tgl_bebas_pustaka`) VALUES
('BBS0000001', 'AGT0000001', '2016-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `no_induk_buku` varchar(20) NOT NULL,
  `id_ketegori` varchar(20) NOT NULL,
  `id_sub_kategori` varchar(20) NOT NULL,
  `pengarang` varchar(60) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `lokasirak` varchar(30) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `sinopsis` text NOT NULL,
  `jumlah_buku` varchar(10) NOT NULL,
  `selesai_diproses` date NOT NULL,
  PRIMARY KEY (`no_induk_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`no_induk_buku`, `id_ketegori`, `id_sub_kategori`, `pengarang`, `judul`, `lokasirak`, `penerbit`, `tahun_terbit`, `sinopsis`, `jumlah_buku`, `selesai_diproses`) VALUES
('00001', '011', '01', 'kjkjk', 'Karya MARTA', 'R5', 'Infromatika', '2012', 'aaa', '20', '2016-03-30'),
('00002', '011', '01', 'Zainudin', 'Sholat Malam', 'R1', 'Citra', '2015', 'bbb', '20', '2016-03-30'),
('00003', '012', '01', 'Supriyanto', 'Kisah 25 Nabi dan RAsul', 'R4', 'Citra', '2012', '', '20', '2016-12-21'),
('0110101', '011', '01', 'Ferri Achmad Effindri', 'Cara Memperoleh Penghasilan dari Programmer', 'A5', 'Citra', '2015', 'Sedikit', '17', '2016-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_buku`
--

CREATE TABLE IF NOT EXISTS `jumlah_buku` (
  `id_jumlah` smallint(6) NOT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_jumlah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jumlah_buku`
--

INSERT INTO `jumlah_buku` (`id_jumlah`, `jumlah`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_hari`
--

CREATE TABLE IF NOT EXISTS `jumlah_hari` (
  `id_jumlah` smallint(6) NOT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_jumlah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jumlah_hari`
--

INSERT INTO `jumlah_hari` (`id_jumlah`, `jumlah`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_ketegori` varchar(20) NOT NULL,
  `nm_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ketegori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_ketegori`, `nm_kategori`) VALUES
('011', 'KOMPUTER'),
('012', 'KOMPUTER');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`, `nama`, `level`, `alamat`, `kota`, `kode_pos`, `no_telp`, `tempat_lahir`, `tanggal_lahir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Eko Kusumo', 'Ketua', 'Jl Soekarno Hatta', 'Jakarta', '23283', '085777777777', 'Jakarta', '1992-05-25'),
('petugas', '96e79218965eb72c92a549dd5a330112', 'Rina Andini', 'Pustakawan', 'Jl Manggis', 'Jakarta Pusat', '28291', '085400000000', 'Surabaya', '1975-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `no_pemesanan` int(10) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(10) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `nama_pengarang` varchar(100) NOT NULL,
  PRIMARY KEY (`no_pemesanan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pemesanan`
--


-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `no_peminjaman` varchar(10) NOT NULL,
  `no_agt` varchar(10) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `buku` varchar(80) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no_peminjaman`),
  KEY `no_agt` (`no_agt`),
  KEY `kode_buku` (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`no_peminjaman`, `no_agt`, `kode_buku`, `buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('PM00000001', 'AGT0000001', '00003', 'Sistem Pakar', '2016-03-17', '2016-03-24', 'dikembalikan'),
('PM00000003', 'AGT0000003', '00001', 'Khasiat dari Doa', '2016-12-21', '2016-12-28', 'dikembalikan'),
('PM00000004', 'AGT0000003', '0110101', 'Cara Memperoleh Penghasilan dari Programmer', '2016-12-31', '2017-01-03', 'dikembalikan'),
('PM00000005', 'AGT0000003', '0110101', 'Cara Memperoleh Penghasilan dari Programmer', '2016-12-31', '2017-01-03', 'dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `no_peminjaman` varchar(10) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_peminjaman` (`no_peminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `no_peminjaman`, `tgl_pengembalian`, `denda`) VALUES
(1, 'PM00000001', '2016-03-17', 0),
(2, 'PM00000003', '2016-12-21', 0),
(3, 'PM00000004', '2016-12-31', 0),
(4, 'PM00000005', '2016-12-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE IF NOT EXISTS `pengunjung` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `jk` varchar(250) NOT NULL,
  `level` varchar(40) NOT NULL,
  `keperluan` varchar(250) NOT NULL,
  `saran` varchar(25) NOT NULL,
  `tgl_input` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `jk`, `level`, `keperluan`, `saran`, `tgl_input`) VALUES
(10, 'Oki', 'L', '', 'Baca Buku', 'Mantap', '2016-12-29 20:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` varchar(10) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `nm_rak` varchar(30) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `id_kategori`, `nm_rak`) VALUES
('ui', 'KOMPUTER', 'Ferri Achmad Effindr');

-- --------------------------------------------------------

--
-- Table structure for table `rb_login`
--

CREATE TABLE IF NOT EXISTS `rb_login` (
  `id` smallint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'members',
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rb_login`
--

INSERT INTO `rb_login` (`id`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `email`, `nohp`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'Laki-Laki', 'kaka@gmail.com', '089654723773', 'admin'),
(2, 'kaka', 'kaka', 'Kaka Wijayanto', 'Laki-Laki', 'kaka@gmail.com', '082170214495', 'members'),
(3, '20151221', '12345', 'Lala Wijayanti 1', 'Perempuan ', 'vendry@gmail.com', '081993448877', 'members'),
(4, 'niko', 'niko', 'Niko Fernandes', 'Laki-Laki', 'niko@gmail.com', '083170445599', 'members'),
(5, 'toni', '12345', 'Toni Sucipto', 'Laki-Laki', 'toni@gmail.com', '081993448877', 'members'),
(6, 'dilla', 'dilla123', 'Dilla Saputri', 'Perempuan', 'dilla@gmail.com', '082170214495', 'members'),
(7, 'indah', 'indah', 'Indah Wahyuni', 'Perempuan', 'indah@gmail.com', '085263987633', 'members');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
  `id_sub_kategori` varchar(20) NOT NULL,
  `id_ketegori` varchar(20) NOT NULL,
  `nm_sub` varchar(20) NOT NULL,
  PRIMARY KEY (`id_sub_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id_sub_kategori`, `id_ketegori`, `nm_sub`) VALUES
('01', '011', 'BAHASA PEMROGRAMAN'),
('2', '012', 'pemrograman 1'),
('q', '01', 'hjgjh');

-- --------------------------------------------------------

--
-- Table structure for table `tarif_denda`
--

CREATE TABLE IF NOT EXISTS `tarif_denda` (
  `id_tarif` varchar(11) NOT NULL,
  `tarif_denda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif_denda`
--

INSERT INTO `tarif_denda` (`id_tarif`, `tarif_denda`) VALUES
('1', 500);
