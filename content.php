<?php
if ($_GET[module]=='home'){
  include "formulir.php";    
}

elseif ($_GET[module]=='buku'){
	include "modul/buku/buku.php";
}
elseif ($_GET[module]=='view_lap'){
	include "modul/buku/view_lap.php";
}

elseif ($_GET[module]=='sub'){
	include "modul/buku/sub.php";
}
elseif ($_GET[module]=='rak'){
	include "tambah_rak.php";
}

elseif ($_GET[module]=='kategori'){
	include "modul/buku/kategori.php";
}
elseif ($_GET[module]=='caribuku'){
	include "kelas_add.php";
}
elseif ($_GET[module]=='view_lap1'){
	include "modul/buku/view_lap1.php";
}
elseif ($_GET[module]=='view_cari'){
	include "modul/buku/view_cari.php";
}

elseif ($_GET[module]=='view1'){
	include "modul/buku/view1.php";
}
elseif ($_GET[module]=='peminjaman'){
	include "modul/peminjaman/peminjaman.php";
}

elseif ($_GET[module]=='pinjam'){
	include "modul/peminjaman/pinjam.php";
}

elseif ($_GET[module]=='pengembalian'){
	include "modul/pengembalian/pengembalian.php";
}

elseif ($_GET[module]=='kembali'){
	include "modul/pengembalian/kembali.php";
}



elseif ($_GET[module]=='edit_buku'){
	include "edit_buku.php";
}
elseif ($_GET[module]=='edit_petugas'){
	include "edit_petugas.php";
}
elseif ($_GET[module]=='detail_buku'){
	include "detail_buku2.php";
}
elseif ($_GET[module]=='lihatbebaspustaka'){
	include "modul/lihatbebaspustaka/lihatbebaspustaka.php";
}
elseif ($_GET[module]=='detail_perpanjangan'){
	include "detai_perpanjangan.php";
}

elseif ($_GET[module]=='bebaspustaka'){
	include "modul/bebaspustaka/bebaspustaka.php";
}
elseif ($_GET[module]=='simpanformulir'){
		$username=trim(htmlentities($_POST[username]));
		$nama_lengkap=trim(htmlentities($_POST[nama_lengkap]));
		$alamat=trim(htmlentities($_POST[alamat]));
	
		
		$querylogin = mysql_query("INSERT INTO pengunjung (nama,jk, level, keperluan, saran, tgl_input) 
								   VALUES ('$_POST[nama]','$_POST[jk]','$_POST[level]','$_POST[perlu]','$_POST[saran]',NOW())");
			echo "<script>window.alert('Data Anda Sukses Tersimpan');
						window.location=('./')</script>";
		
}

elseif ($_GET[module]=='formulir'){
	include "formulir.php";
}
elseif ($_GET[module]=='pencarian_buku'){
	include "pencarian_buku.php";
}
elseif ($_GET[module]=='utama'){
	include "utama.php";
}
elseif ($_GET[module]=='salah'){
	include "salah.php";
}
elseif ($_GET[module]=='transaksi'){
	include "form_transaksi.php";
}
elseif ($_GET[module]=='transaksi_buku'){
	include "form_transaksi_buku.php";
}

elseif ($_GET[module]=='tambah_anggota'){
	include "tambah_anggota.php";
}

elseif ($_GET[module]=='tambah_petugas'){
	include "tambah_petugas.php";
}
elseif ($_GET[module]=='tambah_buku'){
	include "tambah_buku.php";
}
elseif ($_GET[module]=='form_peminjaman'){
	include "form_peminjaman.php";
}
elseif ($_GET[module]=='setting'){
	include "setting.php";
}
elseif ($_GET[module]=='pencarian'){
	include "modul/pencarian/pencarian.php";
}
elseif ($_GET[module]=='pencarian_ang'){
	include "modul/pencarian/pencarian_ang.php";
}

elseif ($_GET[module]=='edit_anggota'){
	include "edit_anggota.php";
}
elseif ($_GET[module]=='form_login'){
	echo "<div class='alert alert-info'>Silahkan Login.</div><hr>
		<div class='alert alert-alert'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<b>Hello!</b> Untuk melakukan Login , Masukkan username dan password Anda, Terima Kasih.
		</div>
		<form method=POST name='formku' onSubmit='return valid()' action='cek_login.php' id='registerHere'>
			<div style='position:relative; left:50%; margin-left:-120px; margin-top:10%;' class='container-fluid'>
				<div class='row-fluid'>
					<div class='span12'>
						<form>
							<fieldset>
								<div class='control-group'>
									 <label>Username :</label>
									 <input type=text name='id_user' class='required'>
								</div>
									 <input type=hidden name=level value='members'>
								<div class='control-group'>
									 <label>Password :</label>
									 <input type=password name='password' class='required'>
								</div>
										 <button type='submit' class='btn btn-primary'>Login</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			
		</form><br>";
}


elseif ($_GET[module]=='info'){
  include "info.php";
}

elseif ($_GET[module]=='profil'){
  include "profil.php";
}
elseif ($_GET[module]=='pelajaran'){
  include "pelajaran.php";
}
elseif ($_GET[module]=='penyakit'){
  include "solusi.php";
}

elseif ($_GET[module]=='input_absen'){
	include "input_absensi.php";
}
elseif ($_GET[module]=='peminjaman'){
	include "lihat_peminjaman.php";
}
elseif ($_GET[module]=='anggota'){
	include "modul/anggota/anggota.php";
}
elseif ($_GET[module]=='tarif'){
	include "modul/tarif/tarif.php";
}
elseif ($_GET[module]=='jumlah_hari'){
	include "modul/tarif/jumlah_hari.php";
}
elseif ($_GET[module]=='user'){
	include "lihat_user.php";
}
elseif ($_GET[module]=='tambah_user'){
	include "tambah_user.php";
}
elseif ($_GET[module]=='jumlah_buku'){
	include "modul/tarif/jumlah_buku.php";
}
elseif ($_GET[module]=='laporanpinjam'){
	include "modul/laporanpinjam/laporanpinjam.php";
}
elseif ($_GET[module]=='laporanbuku'){
	include "modul/laporanbuku/laporanbuku.php";
}
elseif ($_GET[module]=='laporanbebas'){
	include "modul/laporanbebas/laporanbebas.php";
}
elseif ($_GET[module]=='laporandenda'){
	include "modul/laporandenda/laporandenda.php";
}
elseif ($_GET[module]=='laporankartu'){
	include "modul/laporankartu/laporankartu.php";
}
elseif ($_GET[module]=='laporananggota'){
	include "modul/laporananggota/cetak.php";
}
elseif ($_GET[module]=='bigdump'){
	include "import/bigdump.php";
}
elseif ($_GET[module]=='backup'){
	include "modul/backup/backup.php";
}
elseif ($_GET[module]=='pemesanan'){
	include "modul/pemesanan/pemesanan.php";
}
elseif ($_GET[module]=='statistikpeminjaman'){
	include "modul/statistikpeminjaman/statistikpeminjaman.php";
}
elseif ($_GET[module]=='restore'){
	include "modul/backup/recovery_data.php";
}
elseif ($_GET[module]=='hadir'){
	include "hadir.php";
}
elseif ($_GET[module]=='guru'){
	include "registrasi_guru.php";
}
elseif ($_GET[module]=='input_guru'){
	include "input_guru.php";
}
elseif ($_GET[module]=='kelas'){
	include "kelas.php";
}
elseif ($_GET[module]=='datapendaftaran'){
  echo "<div class='alert alert-info'>Data Hasil Pengambilan Keputusan Online.</div>";
 
  $prosedur=mysql_query("SELECT * FROM rb_hasil_analisa a left join rb_login b on a.username=b.username ORDER BY a.id_hasil DESC");
  $no=1;
  echo "<table style='border:1px solid #c1c1c1;' class='table table-bordered'>
		<tr>
			<th>No</th><th>Nama Lengkap</th><th>Keputusan Jurusan</th><th>Hasil (Nilai)</th>
		</tr>";
  $no=1;

  while($r=mysql_fetch_array($prosedur)){
  $tanggal = tgl_indo($r[tgl_daftar]);
  if(($no % 2)==0){ $warna="#fff"; } else{ $warna="#f4f4f4"; }
	echo "<tr bgcolor='$warna'><td>$no</td>
				 <td>$r[nama_lengkap]</td>
				 <td>$r[jurusan]</td>
				 <td style='color:red'>$r[nilai]</td>
			 </tr>";
	$no++;
  }
  echo "</table>";
}

elseif ($_GET[module]=='kriteria'){
  echo "<div class='alert alert-info'>Data Kriteria Pengambilan Keputusan Online.</div>";
 
  $prosedur=mysql_query("SELECT * FROM rb_kriteria ORDER BY id_kriteria DESC");
  $no=1;

  echo "<a class='btn btn-primary' href='#myModal1' role='button' data-toggle='modal'>Tambah Kriteria</a>
  		<table style='border:1px solid #c1c1c1;' class='table table-bordered'>";

		echo "<tr>
			<th>No</th><th>Nama Kriteria</th><th>Kepentingan</th><th>Action</th>
		</tr>";
  $no=1;

  while($r=mysql_fetch_array($prosedur)){
  $tanggal = tgl_indo($r[tgl_daftar]);
  if(($no % 2)==0){ $warna="#fff"; } else{ $warna="#f4f4f4"; }
	echo "<tr bgcolor='$warna'><td>$no</td>
				 <td>$r[nama_kriteria]</td>
				 <td>$r[kepentingan]</td>
				 <td width=70><a class='btn btn-danger' href='media.php?module=kriteria&aksi=hapus&id=$r[id_kriteria]'>Delete</a></td>
			 </tr>";
	$no++;
  }
  echo "</table>";

  if ($_GET[aksi]=='hapus'){
  		mysql_query("DELETE FROM rb_kriteria where id_kriteria='$_GET[id]'");
  		echo "<script>window.alert('Sukses Hapus Kriteria Terpilih.');
				window.location='kriteria.html'</script>";
  }

  if (isset($_POST[c])){
  		mysql_query("INSERT INTO rb_kriteria (nama_kriteria,kepentingan) VALUES ('$_POST[a]','$_POST[b]')");
  		echo "<script>window.alert('Sukses Tambah Kriteria Baru.');
				window.location='kriteria.html'</script>";
  }
}

elseif ($_GET[module]=='alternatif'){
  echo "<div class='alert alert-info'>Data alternatif Pengambilan Keputusan Online.</div>";
 
  $prosedur=mysql_query("SELECT * FROM rb_alternatif ORDER BY id_alternatif DESC");
  $no=1;
  echo "<a class='btn btn-primary' href='#myModal2' role='button' data-toggle='modal'>Tambah Alternatif</a>
  		<table style='border:1px solid #c1c1c1;' class='table table-bordered'>
		<tr>
			<th>No</th><th>Nama Alternatif</th><th>Deskripsi</th><th>Action</th>
		</tr>";
  $no=1;

  while($r=mysql_fetch_array($prosedur)){
  $tanggal = tgl_indo($r[tgl_daftar]);
  if(($no % 2)==0){ $warna="#fff"; } else{ $warna="#f4f4f4"; }
	echo "<tr bgcolor='$warna'><td>$no</td>
				 <td>$r[nama_alternatif]</td>
				 <td>$r[deskripsi]</td>
				 <td width=70><a class='btn btn-danger' href='media.php?module=alternatif&aksi=hapus&id=$r[id_alternatif]'>Delete</a></td>
			 </tr>";
	$no++;
  }
  echo "</table>";

    if ($_GET[aksi]=='hapus'){
  		mysql_query("DELETE FROM rb_alternatif where id_alternatif='$_GET[id]'");
  		echo "<script>window.alert('Sukses Hapus Alternatif Terpilih.');
				window.location='alternatif.html'</script>";
  }

  if (isset($_POST[c])){
  		mysql_query("INSERT INTO rb_alternatif (nama_alternatif,deskripsi) VALUES ('$_POST[a]','$_POST[b]')");
  		echo "<script>window.alert('Sukses Tambah Alternatif Baru.');
				window.location='alternatif.html'</script>";
  }
}

elseif ($_GET[module]=='hubungikami'){	
  echo "<div class='alert alert-info'>Hubungi kami secara online (Private)</div><br/>
		<form action=hubungi-aksi.html name='formku' onSubmit='return valid()' method=POST id='registerHere'>
			<fieldset>
				<div class='control-group'>
				<label>Nama Lengkap</label>
					<input id='nama_lengkap' name='nama_lengkap' value='$_SESSION[namalengkap]' type='text' style='width:45%;'/> 
				</div>
				<div class='control-group'>
						<label>Alamat E-mail</label>
					<input name='email' type='text' style='width:45%;' id='email'/> 
				</div>
				<div class='control-group'>
					<input name='subjek' type='hidden' value='From_Guest'/> 
						<label>Message</label>
					<textarea style='width:93%; height:120px;' name='pesan' class='required'></textarea>
				</div>										
					<span class='help-block'></span> 
					<button type='submit' class='btn btn-primary'>Submit</button>
			</fieldset>
		</form>";
}

elseif ($_GET[module]=='hubungiaksi'){
$nama_lengkap = trim(htmlentities($_POST[nama_lengkap]));
$email = trim(htmlentities($_POST[email]));
$subjek = trim(htmlentities($_POST[subjek]));
$pesan = trim(htmlentities($_POST[pesan]));
  mysql_query("INSERT INTO rb_hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$nama_lengkap',
                               '$email',
                               '$subjek',
                               '$pesan',
                               '$tgl_sekarang')");
							   
  echo "<div style='margin-top:5%; text-align:center;' class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Sukses Mengirim Pesan ke Pakar! <br>Terimakasih telah menghubungi kami. Kami akan segera meresponnya
		</div>";
}

elseif ($_GET[module]=='detailberita'){
	  $sql=mysql_query("select * from rb_berita where id_berita=$_GET[id]");
	  while($r=mysql_fetch_array($sql)){
		  $tgl = tgl_indo($r[tanggal]);
		  $isi_berita = nl2br($r[isi_berita]);
	
			echo "<table><tr>
						<span class='sidebar-title'><a href=news-$r[id_berita].html>$r[judul]</a></span>
						 <div class='date'>Diposting pada : $r[hari], $tgl - $r[jam] WIB  </div><hr>";	 
			echo "<p>$isi_berita</p>";
		 }
			echo "</table><br/>";
}
?>