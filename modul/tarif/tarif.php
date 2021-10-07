<?php
if((!isset($_SESSION['namalengkap'])) || ($_SESSION['leveluser']!="admin")) {
header("Location: index.php");
}else{
switch ($_GET['aksi'])
{
//INTERFACE TAMPIL DATA TARIF
case "tampil";
$query=mysql_query("select * from tarif_denda");
echo"<h4>Tarif Denda Per Hari</h4>";
echo"<center><table id='tabel' class='table table-bordered table-striped'>
<tr align='center'>
<td>Harga Denda</td>
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
echo"<td align='center'><span style='font-size:20pt;'>Rp.$tampil[tarif_denda],-/Hari</span></td>";
echo"<td align='center'><a href=?module=tarif&aksi=edittarif&id=$tampil[id_tarif] class='btn btn-primary'>Ubah</td>";
$baris++;}
echo"</tr>";
echo"</table></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
break;

//INTERFACE EDIT TARIF
case "edittarif":
echo"<h4>Edit Tarif Denda Per Hari</h4>";
$db="select * from tarif_denda where id_tarif='$_GET[id]'";
$qri=mysql_query($db);
$row=mysql_fetch_array($qri);
echo"<form action='?module=tarif&aksi=update&id_tarif=$row[id_tarif]' method=POST>";
echo"<center><table id='tabeledit'>";
echo"<tr><td></td><td><input style='background-color:#eeeeff'; readonly='1' type=hidden name='id_tarif' value='$row[id_tarif]'></td></tr>";
echo"<tr><td>Tarif : </td><td><input type=text name='tarif' maxlength='10' value='$row[tarif_denda]'></td></tr>";
echo"<tr><td colspan=2 align=center><input type=submit name='save'  value='Update'>
	<input type=button onclick=self.history.back()  value='Batal'></td></tr>";
echo"</table></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
break;

// AKSI UPDATE TARIF
case "update":
mysql_query("UPDATE tarif_denda SET id_tarif='$_POST[id_tarif]',
                                tarif_denda='$_POST[tarif]'		
			where id_tarif='$_GET[id_tarif]'");
echo '<script>alert(\'Data Berhasil Diedit\')
	setTimeout(\'location.href="?module=tarif&aksi=tampil"\' ,0);</script>';
break;
}
}

?>