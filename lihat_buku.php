<html>
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
<td width="151"><a href="media.php?module=tambah_buku" class='btn btn-warning'>Tambah Data</a></td>	
<td width="206"><a href="barcode_buku.php" class='btn btn-success' target="_blank">Cetak Barcode Buku</a></td>			
				<td width="946" align="right"><?php include_once("pencarian.php");?></td>
				</tr>
</table>

<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped'>

<th width="14%"><span class="style3">Kode Buku</span></th>
<th><span class="style3">Judul</span></th>
<th width="13%"><span class="style3">Pengarang</span></th>
<th width="10%"><span class="style3">Penerbit</span></th>
<th width="11%"><span class="style3">Lokasi</span></th>
<th width="10%"><span class="style3">Jumlah</span></th>
<th><span class="style3">Action</span></th>
</tr>
<?php
$sql = mysql_query("select * from data_buku order by id ASC limit $posisi, $batas");
$no=1;
while($r = mysql_fetch_array($sql)){
if($r[aktif]==1){
$status="Online";
}else{
$status="Offline";
}
?>
<tr>

<td class='td' width='14%' ><span class="style3"><?echo"$r[isbn]";?></span></td>
<td class='td' width='28%' ><span class="style3"><?echo"$r[judul]";?></span></td>
<td class='td'><span class="style3"><?echo$r[pengarang];?></span></td>
<td class='td'><span class="style3"><?echo$r[penerbit];?></span></td>
<td class='td'><span class="style3"><?echo$r[lokasi];?></span></td>
<td class='td'><span class="style3"><?echo$r[jumlah_buku];?></span></td>
<td width='11%' align='center' class='td style3'>&nbsp;
 <a  href='?module=buku&act=delete&id=<?echo$r[id];?>' onClick="return confirm('Anda yakin untuk menghapus data ini ?')">
<i class="icon-remove icon-black"></i></a> &nbsp; <a  href='?module=edit_buku&id=<?echo$r[id];?>'><i class="icon-pencil icon-black"></i></a>&nbsp;&nbsp;<a  href='detail.php?id=<?echo$r[id];?>' target="_blank"><i class="icon-print icon-black"></i></a></td>
</tr>

<?
$no++;
}
?>
</table>


<?php
echo "Halaman : ";
		
		$sqlhal = mysql_query("select * from data_buku" );
		$sqldat = mysql_query("select * from user_pengunjung");
		$jmldata = mysql_num_rows($sqlhal);
		$jmldat = mysql_num_rows($sqldat);
		$jmlhal = ceil($jmldata/$batas);
		
		// Membuat First dan Previous
		if($halaman > 1){
			$previous = $halaman - 1;
			echo "<a href='$_SERVER[PHP_SELF]?halaman=1&module=buku' class=\"btn btn-primary edit\">&laquo; First</a>  
			     <a href='$_SERVER[PHP_SELF]?halaman=$previous&module=buku' class=\"btn btn-primary edit\">&lsaquo; Prev</a>";
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
			$angka .= "<a href='$_SERVER[PHP_SELF]?halaman=$i&module=buku' class=\"btn btn-primary edit\">$i</a> ";
		}
		
		$angka .= " <b>$halaman</b> ";
		
		for($i = $halaman+1; $i<($halaman+3); $i++){
			if($i > $jmlhal)
				break;
			$angka .= "<a href='$_SERVER[PHP_SELF]?halaman=$i&module=buku' class=\"btn btn-primary edit\">$i</a> ";
		}
		
		$angka .= ($halaman+2 < $jmlhal ? " ... <a href='$_SERVER[PHP_SELF]?halaman=$jmlhal&module=buku' class=\"btn btn-primary edit\">$jmlhal</a> " : " ");
		
		echo "$angka";
		
		// Membuat Next dan Last
		if($halaman< $jmlhal){
			$next = $halaman + 1;
			echo "<a href='$_SERVER[PHP_SELF]?halaman=$next&module=buku' class=\"btn btn-primary edit\">Next &rsaquo;</a>  
			     <a href='$_SERVER[PHP_SELF]?halaman=$jmlhal&module=buku' class=\"btn btn-primary edit\">Last &raquo;</a>";
		}else{
			echo "Next &rsaquo; | Last &raquo; | ";
		}
		
	
		
	
?></div>

<?
if($_GET[module]=='buku' and $_GET[act]=='delete'){
$sql=mysql_query("delete from data_buku where id='$_GET[id]'");
echo"<script>window.location.href='?module=buku'</script>";
}

?>
</div>
</html>