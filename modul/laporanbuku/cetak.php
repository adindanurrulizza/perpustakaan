<body onLoad="javascript:window:print()">
<?php
echo '<html>
<head>
<title>Data Buku</title>
<style>
#tabel
{
font-size:15px;
border-collapse:collapse;
}
#tabel  td
{
padding-left:5px;
border: 1px solid black;
}
</style>
</head>
<body>';
include "../../koneksi/koneksi.php";
$sql_limit = "select * from buku order by no_induk_buku";
$query=mysql_query($sql_limit);
echo"<center><h2>Perpustakaan Amanah Masjid Muhammadiyah</h2>
<h3>Laporan Data Buku</h3>
<table id='tabel' style='width:1200px' border='1'>
<tr align='center'>
<td width='10%'>Kode Buku</td>

<td width='15%'>Judul</td>
<td width='10%'>Pengarang</td>

<td width='10%'>Penerbit</td>
<td width='5%'>Tahun Terbit</td>

";

$no=1;
$baris=1;

while($tampil=mysql_fetch_array($query)){ 
echo "<tr>"; 
echo"<td>$tampil[no_induk_buku]</td>";

echo"<td>$tampil[judul]</td>";
echo"<td>$tampil[pengarang]</td>";

echo"<td>$tampil[penerbit]</td>";
echo"<td>$tampil[tahun_terbit]</td>";


}
echo"</tr>";
echo"</table></center>
</body>
</html>";
?>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="63%" bgcolor="#FFFFFF">
							  
	  <p align="center"><br/>
    </td><td width="37%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
echo "Padang, $tgl";?><br/>
  <br/><br/>
								<br/><br/>
								  Kepala Perpustakaan<br/>
								  
								  
								  </div></td>
</tr></table>

