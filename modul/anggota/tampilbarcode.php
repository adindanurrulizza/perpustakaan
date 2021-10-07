<?php
include "../../koneksi/koneksi.php";
$data=mysql_fetch_array(mysql_query("select * from anggota where no_agt = '$_GET[text]'"));
	echo "<html>
	<head>
		<title>Cetak Kartu Anggota</title>
		
<style>
#tabel
{
font-size:12px;
border-collapse:collapse;
font-family:arial;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
#headkartu
{
font-family:times new roman; 
font-size:12pt;
font-weight:reguler;
}
</style>
	</head>
	<body>
	<table id='tabel' style='width:350px; height:150px;'><tr>
	

	<td colspan='3' width='295px' height='45px' style='vertical-align:center'><span id='headkartu'><center>Kartu Anggota </br>Perpustakaaan Amanah </center></span></td>
	
	</tr>
	<tr>
		<td colspan='2'>No Anggota</td>  <td> : $data[no_agt]</td>
		</tr>
		<tr>
	    <td colspan='2'>Nama Lengkap</td> <td>: $data[nama]</td></tr>
		<tr ><td colspan='2'>Jenis Kelamin</td> <td>: $data[jenis_kelamin]</td></tr>
		<tr><td colspan='2'>Alamat</td> <td>: $data[alamat]</td></tr>
	</tr>
	<tr><td height='30px' colspan='2'><img src='../../images/anggota/".$_GET['text'].".jpg' width='70px'/></td><td>
	<center><image src='barcode.php?codetype=Code128&size=60&text=$_GET[text]'/></br>$_GET[text]</center></td></tr>
	</table>
	
	</body>
	</html>";
?>