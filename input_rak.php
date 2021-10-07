<?php
include "conn.php";
$page = $_GET[page];
$act = $_GET[act];
//if($page=='registrasi' and $act=='save')
//{
if(empty($_POST[nama]) 

or empty($_POST[kode]) 


 
){
 echo"<script>alert('Silahkan Lengkapi Data Anda Terlebih Dahulu !');window.location.href='media.php?module=rak'</script>";
}else{
$cek=mysql_query("select * from rak where nm_rak='$_POST[nama]'");
$jumlah=mysql_num_rows($cek);
if ($jumlah)
{
 echo"<script>alert('Maaf, dokter ini sudah terdaftar,silahkan masukan dokter yang lain !');window.location.href='media.php?module=rak'</script>";
} else {
			
$kl=mysql_query("insert into rak(id_rak,nm_rak,id_kategori)
 value('$_POST[kode]','$_POST[nama]','$_POST[kategori]')");
 echo"<script>alert('Data Anda Sukses Tersimpan');window.location.href='media.php?module=rak'</script>";


}
}
?>