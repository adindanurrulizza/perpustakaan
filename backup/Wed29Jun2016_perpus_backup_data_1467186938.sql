DROP TABLE IF EXISTS anggota;

CREATE TABLE `anggota` (
  `no_agt` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `stts` varchar(10) NOT NULL,
  PRIMARY KEY (`no_agt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO anggota VALUES("AGT0000001","Khairul Umam","Laki-Laki","Pekanbaru","1992-05-26","Jl. Tangkuban Perahu No 2\n","aktif");
INSERT INTO anggota VALUES("AGT0000002","Nicky William","Laki-Laki","Jakarta Selatan","1995-01-12","Jl Perahu","aktif");
INSERT INTO anggota VALUES("AGT0000003","Andi","Laki-Laki","Bangka","2013-02-22","Jl Soekarno Hatta","aktif");



DROP TABLE IF EXISTS bebas_pustaka;

CREATE TABLE `bebas_pustaka` (
  `no_bebas_pustaka` varchar(10) NOT NULL,
  `no_agt` varchar(10) NOT NULL,
  `tgl_bebas_pustaka` date NOT NULL,
  PRIMARY KEY (`no_bebas_pustaka`),
  KEY `no_agt` (`no_agt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS buku;

CREATE TABLE `buku` (
  `no_induk_buku` varchar(20) NOT NULL,
  `call_number_1` varchar(10) NOT NULL,
  `call_number_2` varchar(10) NOT NULL,
  `call_number_3` varchar(10) NOT NULL,
  `tajuk_subjek` varchar(30) NOT NULL,
  `pengarang` varchar(60) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `lokasirak` varchar(30) NOT NULL,
  `jilid_ke` varchar(10) NOT NULL,
  `seri` varchar(10) NOT NULL,
  `edisi_ke` varchar(10) NOT NULL,
  `cetakan_ke` varchar(10) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `kota_terbit` varchar(20) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `jumlah_halaman` varchar(10) NOT NULL,
  `ilustrasi` varchar(10) NOT NULL,
  `bibliografi` varchar(10) NOT NULL,
  `ISBN` varchar(40) NOT NULL,
  `tinggi_buku` varchar(10) NOT NULL,
  `diterima_dari` varchar(80) NOT NULL,
  `jumlah_eksemplar` varchar(10) NOT NULL,
  `selesai_diproses` date NOT NULL,
  PRIMARY KEY (`no_induk_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO buku VALUES("00001","00001","00001","00001","aaaa","aaa","aaa","aaa","1","1","1","1","aaa","aaa","2012","12","aaa","aaa","aaa","12","Sumbangan","2","2016-03-30");
INSERT INTO buku VALUES("00002","00002","00002","00002","bbbb","bbbb","bbb","bbb","2","2","2","2","bbb","bbb","2015","12","bbb","bbb","bbb","13","Pembelian","3","2016-03-30");



DROP TABLE IF EXISTS jumlah_buku;

CREATE TABLE `jumlah_buku` (
  `id_jumlah` smallint(6) NOT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_jumlah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO jumlah_buku VALUES("1","2");



DROP TABLE IF EXISTS jumlah_hari;

CREATE TABLE `jumlah_hari` (
  `id_jumlah` smallint(6) NOT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_jumlah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO jumlah_hari VALUES("1","3");



DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
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

INSERT INTO login VALUES("admin","21232f297a57a5a743894a0e4a801fc3","Eko Kusumo","Ketua","Jl Soekarno Hatta","Jakarta","23283","085777777777","Jakarta","1992-05-25");
INSERT INTO login VALUES("petugas","96e79218965eb72c92a549dd5a330112","Rina Andini","Pustakawan","Jl Manggis","Jakarta Pusat","28291","085400000000","Surabaya","1975-11-11");



DROP TABLE IF EXISTS pemesanan;

CREATE TABLE `pemesanan` (
  `no_pemesanan` int(10) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(10) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `nama_pengarang` varchar(100) NOT NULL,
  PRIMARY KEY (`no_pemesanan`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS peminjaman;

CREATE TABLE `peminjaman` (
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

INSERT INTO peminjaman VALUES("PM00000001","AGT0000001","12345","Sistem Pakar","2016-03-17","2016-03-24","dikembalikan");
INSERT INTO peminjaman VALUES("PM00000002","AGT0000001","12345","Sistem Pakar","2016-03-17","2016-03-24","dipinjam");



DROP TABLE IF EXISTS pengembalian;

CREATE TABLE `pengembalian` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `no_peminjaman` varchar(10) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_peminjaman` (`no_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pengembalian VALUES("1","PM00000001","2016-03-17","0");



DROP TABLE IF EXISTS pengunjung;

CREATE TABLE `pengunjung` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `jk` varchar(250) NOT NULL,
  `level` varchar(40) NOT NULL,
  `keperluan` varchar(250) NOT NULL,
  `saran` varchar(25) NOT NULL,
  `tgl_input` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO pengunjung VALUES("7","agung","L","siswa","Baca Buku","Keren","2016-03-08 22:47:31");
INSERT INTO pengunjung VALUES("8","Nurdin","L","siswa","Baca Buku","bagus","2016-03-09 21:34:10");
INSERT INTO pengunjung VALUES("9","Nurul Ulfha","P","siswa","Baca Buku","Mantapp","2016-03-10 18:53:41");



DROP TABLE IF EXISTS rb_login;

CREATE TABLE `rb_login` (
  `id` smallint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'members',
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO rb_login VALUES("1","admin","11111","admin","Laki-Laki","kaka@gmail.com","089654723773","admin");
INSERT INTO rb_login VALUES("2","kaka","kaka","Kaka Wijayanto","Laki-Laki","kaka@gmail.com","082170214495","members");
INSERT INTO rb_login VALUES("3","20151221","12345","Lala Wijayanti 1","Perempuan ","vendry@gmail.com","081993448877","members");
INSERT INTO rb_login VALUES("4","niko","niko","Niko Fernandes","Laki-Laki","niko@gmail.com","083170445599","members");
INSERT INTO rb_login VALUES("5","toni","12345","Toni Sucipto","Laki-Laki","toni@gmail.com","081993448877","members");
INSERT INTO rb_login VALUES("6","dilla","dilla123","Dilla Saputri","Perempuan","dilla@gmail.com","082170214495","members");
INSERT INTO rb_login VALUES("7","indah","indah","Indah Wahyuni","Perempuan","indah@gmail.com","085263987633","members");



DROP TABLE IF EXISTS tarif_denda;

CREATE TABLE `tarif_denda` (
  `id_tarif` varchar(11) NOT NULL,
  `tarif_denda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tarif_denda VALUES("1","500");



