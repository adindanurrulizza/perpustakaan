<?php
echo '<html>
<head>
<title>Laporan Peminjaman</title>
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
$sql_limit = "select * from pengembalian,peminjaman,anggota where (peminjaman.no_agt = anggota.no_agt) and (pengembalian.no_peminjaman = peminjaman.no_peminjaman) and (pengembalian.tgl_pengembalian between '$_POST[dari]' and '$_POST[sampai]') and (pengembalian.denda >= 0) and peminjaman.status='dikembalikan' order by peminjaman.no_peminjaman DESC";
$query=mysql_query($sql_limit);
echo"<center>
<h2 align='center'>Perpustakaan Amanah Masjid Muhammadiyah</h2> 
<h4 align='center'>Laporan Data Pengembalian Buku</h5> 
Dari Tanggal \"$_POST[dari]\" Sampai \"$_POST[sampai]\"
<table id='tabel' style='width:1100px' border='1'>
<tr align='center'>
<td width='10%'>No</td>
<td width='10%'>Id Kembali</td>
<td width='10%'>Id Peminjaman</td>

<td width='15%'>Nama</td>

<td width='30%'>Judul Buku</td>
<td width='10%'>Tgl Pinjam</td>
<td width='10%'>Tgl Harus Kembali</td>
<td width='10%'>Tgl Dikembalikan</td>
<td width='10%'>Denda</td>";
$no=0;
$baris=1;
$jmlhdenda = 0;
while($tampil=mysql_fetch_array($query)){ 
$no++;
echo "<tr>"; 
echo"<td>$no</td>";
echo"<td>PG0000000$tampil[id]</td>";
echo"<td>$tampil[no_peminjaman]</td>";

echo"<td>$tampil[nama]</td>";

echo"<td>$tampil[buku]</td>";
echo"<td>$tampil[tgl_pinjam]</td>";
echo"<td>$tampil[tgl_kembali]</td>";
echo"<td>$tampil[tgl_pengembalian]</td>";
echo"<td>$tampil[denda]</td>";
$jmlhdenda+=$tampil['denda'];
}
echo"</tr>";
echo"<tr>";
echo"<td>$nbsp</td>";
echo"<td>$nbsp</td>";
echo"<td>$nbsp</td>";
echo"<td>$nbsp</td>";
echo"<td>$nbsp</td>";
echo"<td>$nbsp</td>";
echo"<td>$nbsp</td>";
echo"<td>Total Denda :</td>";
echo"<td>$jmlhdenda</td>";
echo"</tr>";
echo"</table>";
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
<td width="65%" bgcolor="#FFFFFF">
							  
	  <p align="center"><br/>
    </td><td width="65%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
echo "Padang, $tgl";?><br/>
  <br/><br/>
								
								  Kepala Perpustakaan<br/>
								  
								  
								  </div></td>
</tr></table>
</body>
</html>