<?php include "conn.php" ?>
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style4 {
	font-size: 16px;
	font-family: "Trebuchet MS";}
</style>
<p class="style4">Data Management</p>
<hr>
<table border="0" >

				<tr>
<td width="482"><p><a href="media.php?module=tambah_anggota" class='btn btn-info'>Tambah Data</a> <a href="kartu_anggota.php" class='btn btn-info' target="_blank">Cetak Kartu Anggota</a></td>				
				<td width="322" align="right"><?php include_once("pencarian1.php");?></td>
				</tr>
			</table>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped'>
<tr><th width="3%" bgcolor="#999999"><span class="style3">No.</span></th>
<th bgcolor="#999999"><span class="style3">Kode</span></th>
<th bgcolor="#999999"><span class="style3">No Induk</span></th>
<th bgcolor="#999999"><span class="style3">Nama</span></th>
<th width="14%" bgcolor="#999999"><span class="style3">Jenis Kelamin</span></th>
<th width="10%" bgcolor="#999999"><span class="style3">Email</span></th>
<th width="14%" bgcolor="#999999"><span class="style3">No Hp</span></th>
<th bgcolor="#999999"><span class="style3">Aksi</span></th>
</tr>
<?php
$sql = mysql_query("select * from anggota order by id_anggota asc");
$no=1;
while($r = mysql_fetch_array($sql)){
if($r[aktif]==1){
$status="Online";
}else{
$status="Offline";
}
?>
<tr>
<td class='td' align='center'><span class="style3"><?echo$no;?></span></td>
<td class='td' width='12%' ><span class="style3"><?echo"$r[kode]";?></span></td>
<td class='td' width='12%' ><span class="style3"><?echo"$r[induk]";?></span></td>
<td class='td' width='23%' ><span class="style3"><?echo"$r[nama_lengkap]";?></span></td>
<td class='td'><span class="style3"><?echo$r[jenis_kelamin];?></span></td>
<td class='td'><span class="style3"><?echo$r[email];?></span></td>
<td class='td'><span class="style3"><?echo$r[nohp];?></span></td>


<td width='24%' align='center' class='td style3'>
 <a  href='?module=anggota&act=delete&id=<?echo$r[id_anggota];?>' onclick="return confirm('Anda yakin untuk menghapus data ini ?')">
 <button class='btn btn-danger'>Delete</button></a>  </td>
</tr>
<?
$no++;
}
?>
</table>

<?
if($_GET[module]=='anggota' and $_GET[act]=='delete'){
$sql=mysql_query("delete from anggota where id_anggota='$_GET[id]'");
echo"<script>window.location.href='?module=anggota'</script>";
}

?>