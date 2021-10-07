<?php
if((!isset($_SESSION['namalengkap'])) || ($_SESSION['leveluser']!="admin")) {
header("Location: index.php");
}else{
switch ($_GET['aksi'])
{
//INTERFACE TAMPIL DATA jumlah
case "tampil";
$query=mysql_query("select * from jumlah_buku");
echo"<h4>Jumlah Maksimal Pinjam Buku</h4>";
echo"<center><table id='tabel'  class='table table-bordered table-striped'>
<tralign='center'>
<td>Maksimal Buku</td>
<td>Aksi</td>";
$baris=1;
while($tampil=mysql_fetch_array($query)){ 
if($baris%2==0)
{
echo "<tr bgcolor=\"#D9E2DA\">"; 
}
else 
{
echo "<tr bgcolor=\"#FFFFFF\">"; 
}
echo"<td align='center'><span style='font-size:20pt;'>$tampil[jumlah] Buku</span></td>";
echo"<td align='center'><a href=?module=jumlah_buku&aksi=edit_jumlah&id=$tampil[id_jumlah] class='btn btn-primary'>Ubah</td>";
$baris++;}
echo"</tr>";
echo"</table></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
break;

//INTERFACE EDIT jumlah
case "edit_jumlah":
echo"<h4>Edit Jumlah Maksimal Pinjam Buku</h4>";
$db="select * from jumlah_buku where id_jumlah='1'";
$qri=mysql_query($db);
$row=mysql_fetch_array($qri);
echo"<form action='?module=jumlah_buku&aksi=update&id_jumlah=$row[id_jumlah]' method=POST>";
echo"<center><table id='tabeledit'>";
echo"<tr><td></td><td><input style='background-color:#eeeeff'; readonly='1' type=hidden name='id_jumlah' value='$row[id_jumlah]'></td></tr>";
echo"<tr><td>Jumlah : </td><td><input type=text name='jumlah' maxlength='10' value='$row[jumlah]'></td></tr>";
echo"<tr><td colspan=2 align=center><input type=submit name='save'  value='Update'>
	<input type=button onclick=self.history.back()  value='Batal'></td></tr>";
echo"</table></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
break;

// AKSI UPDATE jumlah
case "update":
mysql_query("UPDATE jumlah_buku SET jumlah='$_POST[jumlah]'		
			where id_jumlah='$_GET[id_jumlah]'");
echo '<script>alert(\'Data Berhasil Diedit\')
	setTimeout(\'location.href="?module=jumlah_buku&aksi=tampil"\' ,0);</script>';
break;
}
}

?>