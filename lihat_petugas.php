<?php include "conn.php" ?>
<style type="text/css">
<!--
.style3 {font-size: 12px}
.style4 {
	font-size: 16px;
	font-family: "Trebuchet MS";
}
-->
</style>
<?php
	
		include "conn.php";
		include "config/tglindo.php";
		$batas =  5;
		$halaman = $_GET['halaman'];
		if(empty($halaman)){
			$posisi = 0;
			$halaman = 1;
		}else{
			$posisi = ($halaman - 1) * $batas;
		}
		
		
?>

<p class="style4">Data Management</p>
<hr>
<p><a href="media.php?module=tambah_petugas" class='btn btn-info'>Tambah Data</a><br>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped'>

<th><span class="style3">Nama</span></th>
<th width="15%"><span class="style3">Jenis Kelamin</span></th>
<th width="18%"><span class="style3">Email</span></th>
<th width="15%"><span class="style3">No Hp</span></th>
<th><span class="style3">Aksi</span></th>
</tr>
<?php
$sql = mysql_query("select * from rb_login where level='members' order by id DESC limit $posisi, $batas");
$no=1;
while($r = mysql_fetch_array($sql)){
if($r[aktif]==1){
$status="Online";
}else{
$status="Offline";
}
?>
<tr>

<td class='td' width='31%' ><span class="style3"><?echo"$r[nama_lengkap]";?></span></td>
<td class='td'><span class="style3"><?echo$r[jenis_kelamin];?></span></td>
<td class='td'><span class="style3"><?echo$r[email];?></span></td>
<td class='td'><span class="style3"><?echo$r[nohp];?></span></td>

<td width='21%' align='center' class='td style3'>
 <a  href='?module=petugas&act=delete&id=<?echo$r[username];?>' onclick="return confirm('Anda yakin untuk menghapus data ini ?')">
 <button class='btn btn-danger'>Delete</button></a>  <a  href='?module=edit_petugas&id=<?echo$r[username];?>'><button class='btn btn-warning'>Edit</button></a></td>
</tr>
<?
$no++;
}
?>
</table>

<?php
echo "Halaman : ";
		
		$sqlhal = mysql_query("select * from rb_login" );
		$sqldat = mysql_query("select * from user_pengunjung");
		$jmldata = mysql_num_rows($sqlhal);
		$jmldat = mysql_num_rows($sqldat);
		$jmlhal = ceil($jmldata/$batas);
		
		// Membuat First dan Previous
		if($halaman > 1){
			$previous = $halaman - 1;
			echo "<a href='$_SERVER[PHP_SELF]?halaman=1&module=petugas' class=\"btn btn-primary edit\">&laquo; First</a>  
			     <a href='$_SERVER[PHP_SELF]?halaman=$previous&module=petugas' class=\"btn btn-primary edit\">&lsaquo; Prev</a>";
		}else{
			echo "&laquo; First | &lsaquo; Prev | ";
		}
			
		//Menampilkan Angka Halaman
		/*for($i=1; $i<=$jmlhal;$i++){
			if($i != $halaman){
				echo " <a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a> | ";
			}else{
				echo " <b>$i</b> | ";
			}
		}*/
		$angka = ($halaman > 3 ? " ... " : " ");
		
		for($i=$halaman-2; $i<$halaman; $i++){
			if($i < 1)
				continue;
			$angka .= "<a href='$_SERVER[PHP_SELF]?halaman=$i&module=petugas' class=\"btn btn-primary edit\">$i</a> ";
		}
		
		$angka .= " <b>$halaman</b> ";
		
		for($i = $halaman+1; $i<($halaman+3); $i++){
			if($i > $jmlhal)
				break;
			$angka .= "<a href='$_SERVER[PHP_SELF]?halaman=$i&module=petugas' class=\"btn btn-primary edit\">$i</a> ";
		}
		
		$angka .= ($halaman+2 < $jmlhal ? " ... <a href='$_SERVER[PHP_SELF]?halaman=$jmlhal&module=petugas' class=\"btn btn-primary edit\">$jmlhal</a> " : " ");
		
		echo "$angka";
		
		// Membuat Next dan Last
		if($halaman< $jmlhal){
			$next = $halaman + 1;
			echo "<a href='$_SERVER[PHP_SELF]?halaman=$next&module=petugas' class=\"btn btn-primary edit\">Next &rsaquo;</a>  
			     <a href='$_SERVER[PHP_SELF]?halaman=$jmlhal&module=petugas' class=\"btn btn-primary edit\">Last &raquo;</a>";
		}else{
			echo "Next &rsaquo; | Last &raquo; | ";
		}
		
	
		
	
?></div>

<?
if($_GET[module]=='petugas' and $_GET[act]=='delete'){
$sql=mysql_query("delete from rb_login where username='$_GET[id]'");
echo"<script>window.location.href='?module=petugas'</script>";
}

?>
</div>