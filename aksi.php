<?php
session_start();
include "conn.php";
//include "../fungsi/library.php";

$module=$_GET[module];
$act=$_GET[act];


// Menghapus data
if (isset($page) AND $act=='hapus'){
  mysql_query("DELETE FROM ".$page." WHERE id_".$page."='$_GET[id]'");
  header('location:media.php?page='.$page);
}
// Menghapus data
if (isset($page) AND $act=='hapus'){
  mysql_query("DELETE FROM contact WHERE id_contact='$_GET[id]'");
  header('location:media.php?page='.$page);
}


// Input user
elseif ($page=='akun' AND $act=='input'){
  $pass=md5($_POST[password]);
  if(empty($_POST[username])){
  header('location:media.php?page='.$page);
  }else{
  mysql_query("INSERT INTO admin(username,
                                password,
                                nama_lengkap,
                                email,
								no_telp) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]')");
  header('location:media.php?page='.$page);
}
}

// Update user
elseif ($page=='akun' AND $act=='update'){
  // Apabila password tidak diubah
  if (empty($_POST[password])) {
    mysql_query("UPDATE admin set username='$_POST[username]',
                                  nama_lengkap='$_POST[nama_lengkap]',
                                  email='$_POST[email]',
								  no_telp='$_POST[no_telp]' WHERE id = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE admin set username='$_POST[username]',
                                  password='$pass',
                                  nama_lengkap='$_POST[nama_lengkap]',
                                  email='$_POST[email]',
								  no_telp='$_POST[no_telp]' WHERE id = '$_POST[id]'");
  }
  header('location:media.php?page='.$page);
}
if ($page=='akun' AND $_GET[act]=='delete'){
  // Apabila password tidak diubah
  if (empty($_POST[password])) {
    mysql_query("delete from admin WHERE id     = '$_GET[id]'");
  }
 header('location:media.php?page='.$page);
}


// Input modul
elseif ($page=='modul' AND $act=='input'){
  mysql_query("INSERT INTO modul(nama_modul,
                                 link,
                                 publish,
                                 aktif,
                                 status,
                                 urutan) 
	                       VALUES('$_POST[nama_modul]',
                                '$_POST[link]',
                                '$_POST[publish]',
                                '$_POST[aktif]',
                                '$_POST[status]',
                                '$_POST[urutan]')");
  header('location:media.php?page='.$page);
}

// Update modul
elseif ($page=='modul' AND $act=='update'){
  mysql_query("UPDATE modul SET nama_modul = '$_POST[nama_modul]',
                                link       = '$_POST[link]',
                                publish    = '$_POST[publish]',
                                aktif      = '$_POST[aktif]',
                                status     = '$_POST[status]',
                                urutan     = '$_POST[urutan]'  
                          WHERE id_modul   = '$_POST[id]'");
  header('location:media.php?page='.$page);
}


// Input agenda
elseif ($page=='agenda' AND $act=='input'){
  $mulai=sprintf("%02d%02d%02d",$_POST[thn_mulai],$_POST[bln_mulai],$_POST[tgl_mulai]);
  $selesai=sprintf("%02d%02d%02d",$_POST[thn_selesai],$_POST[bln_selesai],$_POST[tgl_selesai]);
  
  mysql_query("INSERT INTO agenda(tema,
                                  isi_agenda,
                                  tempat,
                                  tgl_mulai,
                                  tgl_selesai,
                                  tgl_posting,
                                  id_user) 
					                VALUES('$_POST[tema]',
                                 '$_POST[isi_agenda]',
                                 '$_POST[tempat]',
                                 '$mulai',
                                 '$selesai',
                                 '$tgl_sekarang',
                                 '$_SESSION[namauser]')");
  header('location:media.php?page='.$page);
}

// Update agenda
elseif ($page=='agenda' AND $act=='update'){
  $mulai=sprintf("%02d%02d%02d",$_POST[thn_mulai],$_POST[bln_mulai],$_POST[tgl_mulai]);
  $selesai=sprintf("%02d%02d%02d",$_POST[thn_selesai],$_POST[bln_selesai],$_POST[tgl_selesai]);

  mysql_query("UPDATE agenda SET tema        = '$_POST[tema]',
                                 isi_agenda  = '$_POST[isi_agenda]',
                                 tgl_mulai   = '$mulai',
                                 tgl_selesai = '$selesai',
                                 tempat      = '$_POST[tempat]'  
                           WHERE id_agenda   = '$_POST[id]'");
  header('location:media.php?page='.$page);
}


// Input pengumuman
elseif ($page=='pengumuman' AND $act=='input'){
  $tanggal=sprintf("%02d%02d%02d",$_POST[thn],$_POST[bln],$_POST[tgl]);
  
  mysql_query("INSERT INTO pengumuman(judul,
                                      isi,
                                      tanggal,
                                      tgl_posting,
                                      id_user) 
					                   VALUES('$_POST[judul]',
                                    '$_POST[isi_pengumuman]',
                                    '$tanggal',
                                    '$tgl_sekarang',
                                    '$_SESSION[namauser]')");
  header('location:media.php?page='.$page);
}

// Update pengumuman
elseif ($page=='pengumuman' AND $act=='update'){
  $tanggal=sprintf("%02d%02d%02d",$_POST[thn],$_POST[bln],$_POST[tgl]);

  mysql_query("UPDATE pengumuman SET judul         = '$_POST[judul]',
                                     isi           = '$_POST[isi_pengumuman]',
                                     tanggal       = '$tanggal'
                               WHERE id_pengumuman = '$_POST[id]'");
  header('location:media.php?page='.$page);
}


// Input berita
elseif ($page=='berita' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    // Apabila tipe gambar bukan jpeg akan tampil peringatan
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_file</b> : $tipe_file <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG</b>.<br>";
      	echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";	 		  
    }
    else{
      move_uploaded_file($lokasi_file,"foto_berita/$nama_file_unik");
      mysql_query("INSERT INTO berita(judul,
                                      id_kategori,
                                      isi_berita,
                                      id_user,
                                      jam,
                                      tanggal,
                                      hari,
                                      gambar) 
                              VALUES('$_POST[judul]',
                                     '$_POST[kategori]',
                                     '$_POST[isi_berita]',
                                     '$_SESSION[namauser]',
                                     '$jam_sekarang',
                                     '$tgl_sekarang',
                                     '$hari_ini',
                                     '$nama_file_unik')");
     header('location:media.php?page='.$page);
   }
   }
   else{
     mysql_query("INSERT INTO berita(judul,
                                     id_kategori,
                                     isi_berita,
                                     id_user,
                                     jam,
                                     tanggal,
                                     hari) 
                             VALUES('$_POST[judul]',
                                    '$_POST[kategori]',
                                    '$_POST[isi_berita]',
                                    '$_SESSION[namauser]',
                                    '$jam_sekarang',
                                    '$tgl_sekarang',
                                    '$hari_ini')");
    header('location:media.php?page='.$page);
  }
}

// Update berita
elseif ($page=='berita' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   id_kategori = '$_POST[kategori]',
                                   isi_berita  = '$_POST[isi_berita]'  
                             WHERE id_berita   = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE berita SET judul       = '$_POST[judul]',
                                   id_kategori = '$_POST[kategori]',
                                   isi_berita  = '$_POST[isi_berita]',
                                   gambar      = '$nama_file'   
                             WHERE id_berita   = '$_POST[id]'");
  }
  header('location:media.php?page='.$page);
}


// Input soal
elseif ($page=='lowongan' AND $act=='input'){
    mysql_query("INSERT INTO lowongan(id_perusahaan,lowongan,tgl_lowongan,user_posting) 
                            VALUES('$_POST[perusahaan]',
								   '$_POST[lowongan]',
                                   '$tgl_sekarang',
                                   '$_POST[username]')");
  
  header('location:media.php?page='.$page);
}

// Update lowongan
elseif ($page=='lowongan' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE lowongan SET judul     = '$_POST[judul]',
                                   url       = '$_POST[link]'
                             WHERE id_lowongan = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE lowongan SET judul     = '$_POST[judul]',
                                   url       = '$_POST[link]',
                                   gambar    = '$nama_file'   
                             WHERE id_lowongan = '$_POST[id]'");
  }
  header('location:media.php?page='.$page);
}

// Update profil
elseif ($page=='profil' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE modul SET static_content = '$_POST[isi]'
                            WHERE id_modul       = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"foto_berita/$nama_file");
    mysql_query("UPDATE modul SET static_content = '$_POST[isi]',
                                  gambar         = '$nama_file'    
                            WHERE id_modul       = '$_POST[id]'");
  }
  header('location:media.php?page='.$page);
}



elseif ($page=='work_order' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE pekerjaan set noapproval='$_POST[no]',
                                  setuju='$_POST[setuju]',
                                  tgl_eksekusi='$_POST[tgl_eksekusi]',
								  penanggung='$_POST[penanggung]',
								  eksekusi='$_POST[eksekusi]',
								  kebutuhan='$_POST[kebutuhan]',
								   tgl_eksekusi='$_POST[tgl_eksekusi]',
								  waktu='$_POST[waktu]',
								 
								   solusi='$_POST[solusi]',
								    uraian='$_POST[uraian]',
									 status='$_POST[status]',
									  kendala='$_POST[kendala]',
									   jasa='$_POST[jasa]',
								  keterangan='$_POST[keterangan]' WHERE id_download = '$_POST[id]'");
  
  // Apabila password diubah
 
  header('location:media.php?page='.$page);
}

elseif ($module=='perpanjang' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE trans_pinjam set 
                                 
								  tgl_pinjam='$_POST[tgl_pinjam]',
								  tgl_kembali='$_POST[tgl_kembali]'
								   WHERE id_trans = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=peminjaman'</script>";
}

elseif ($module=='buku' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE data_buku set 
                                 
								  judul='$_POST[judul]',
								  pengarang='$_POST[pengarang]',
								   penerbit='$_POST[penerbit]',
								    lokasi='$_POST[lokasi]',
									 jumlah_buku='$_POST[jumlah]'
								   WHERE id = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=buku'</script>";
}
elseif ($module=='buku' AND $act=='cari'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE trans_pinjam set 
                                  kode='$_POST[kode]',
								  judul_buku='$_POST[judul]',
								  pengarang='$_POST[pengarang]'
								  
								    
								   WHERE id_trans = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses as Tersimpan');window.location.href='media.php?module=buku'</script>";
}
elseif ($module=='petugas' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE rb_login set 
                                 
								  username='$_POST[username]',
								  password='$_POST[password]',
								   nama_lengkap='$_POST[nama]',
								    jenis_kelamin='$_POST[jk]',
									 email='$_POST[email]',
									 nohp='$_POST[nohp]'
								   WHERE username = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=petugas'</script>";
}

elseif ($module=='pengembalian' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE trans_pinjam set 
                                 
								  denda='$_POST[denda]'
								  
								   WHERE id_trans = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=peminjaman'</script>";
}
elseif ($module=='setting' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE config set 
                                 
								  jangka='$_POST[jangka]',
								  denda='$_POST[denda]'
								  
								   WHERE id = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=setting'</script>";
}

elseif ($module=='transaksi_buku' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE trans_pinjam set 
                                 
								  kode='$_POST[q]',
								  judul_buku='$_POST[judul]',
								  pengarang='$_POST[pengarang]',
								  tgl_kembali='$_POST[tgl_kembali]'
								  
								   WHERE id_trans = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=setting'</script>";
}

elseif ($module=='anggota' AND $act=='update'){
  // Apabila password tidak diubah
  
    mysql_query("UPDATE anggota set 
                                 
								  induk='$_POST[judul]',
								  nama_lengkap='$_POST[pengarang]',
								   jenis_kelamin='$_POST[penerbit]',
								    email='$_POST[lokasi]',
									 nohp='$_POST[jumlah]',
									 status='$_POST[jenis]'
								   WHERE id_anggota = '$_POST[id]'");
  
  // Apabila password diubah
 
   echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=anggota'</script>";
}

?>

