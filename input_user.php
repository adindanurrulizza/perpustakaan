<?php
include "conn.php";
$page = $_GET[page];
$act = $_GET[act];
//if($page=='registrasi' and $act=='save')
//{
if(empty($_POST[username]) 
or empty($_POST[nama])
or empty($_POST[jk]) 
or empty($_POST[email]) 
or empty($_POST[nohp]) 

 
){
 echo"<script>alert('Silahkan Lengkapi Data Anda Terlebih Dahulu !');window.location.href='media.php?module=tambah_user'</script>";
}else{
$cek=mysql_query("select * from anggota where username='$_POST[username]'");
$jumlah=mysql_num_rows($cek);
if ($jumlah)
{
 echo"<script>alert('Maaf, kode ini sudah terdaftar,silahkan masukan kode yang lain !');window.location.href='media.php?module=tambah_user'</script>";
} else {
			
$kl=mysql_query("insert into rb_login(username,password,nama_lengkap,jenis_kelamin,email,nohp,level)
 value('$_POST[username]','$_POST[password]','$_POST[nama]','$_POST[jk]','$_POST[email]','$_POST[nohp]','members')");
 echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=user'</script>";


}
}
?>