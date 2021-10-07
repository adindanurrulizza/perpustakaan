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
$sql_limit = "select * from peminjaman,anggota where (peminjaman.no_agt = anggota.no_agt) and (tgl_pinjam between '$_POST[dari]' and '$_POST[sampai]') order by no_peminjaman DESC";
$query=mysql_query($sql_limit);
$sub = substr($_POST['dari'],1,1);
//echo "$sub";
echo"<center><h2>Perpustakaan Amanah Masjid Muhammadiyah</h2>
<h3>Laporan Data Peminjaman Buku</h3>
Dari Tanggal \"$_POST[dari]\" Sampai \"$_POST[sampai]\"
<table id='tabel' style='width:900px' border='1'>
<tr align='center'>
<td width='10%'>No</td>
<td width='10%'>ID Peminjaman</td>

<td width='15%'>Nama Anggota</td>

<td width='30%'>Judul Buku</td>
<td width='10%'>Tgl Pinjam</td>
<td width='10%'>Tgl Kembali</td>
";
$no=0;
$baris=1;
while($tampil=mysql_fetch_array($query)){ 
$no++;
echo "<tr>"; 
echo"<td>$no</td>";
echo"<td>$tampil[no_peminjaman]</td>";

echo"<td>$tampil[nama]</td>";

echo"<td>$tampil[buku]</td>";
echo"<td>$tampil[tgl_pinjam]</td>";
echo"<td>$tampil[tgl_kembali]</td>";

}
echo"</tr>";
echo"</table></center></br>
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