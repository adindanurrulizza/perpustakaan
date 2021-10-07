<?php
if((!isset($_SESSION['namalengkap'])) || ($_SESSION['leveluser']!="admin")) {
header("Location: index.php");
}else{
switch ($_GET['aksi'])
{
//INTERFACE TAMPIL DATA BUKU
case "tampil";
$query=mysql_query("select * from kategori");
echo"<h4>Data Kategori</h4>";
echo"<input type=button value='Tambah Data Kategori' onclick=location.href='?module=kategori&aksi=tambahbuku' class='btn btn-primary'></br></br>";
echo"<center><div style='overflow:auto;height:400px;width:950;padding:0px;margin-bottom:0px'>  
<table id='tabel' class='table table-bordered table-striped'>
<tr  align='center'>
<td width='75'>Kode Kategori</td>
<td width='75'>Nama Kategori</td>
<td width='170'>Aksi</td>";

$no=1;
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
echo"<td>$tampil[id_ketegori]</td>";


echo"<td>$tampil[nm_kategori]</td>";



echo"<td align='center'><a onclick=\"return confirm('Anda Yakin Menghapus Data Ini?')\" href='?module=kategori&aksi=hapus&id=$tampil[id_ketegori]'> Hapus</a></td> ";

$no++;
$baris++;}
echo"</tr>";
echo"</table></div></center>";
break;

//DETAIL
case "detail":
$query=mysql_query("select * from buku where no_induk_buku = '$_GET[no]'");
while($tampil=mysql_fetch_array($query)){ 
echo"<center><table border='0' style='width:300px; font-size:11px;' align='center'>
<tr><td width='50%'>No Induk Buku</td><td> : $tampil[no_induk_buku]</td></tr>

<tr><td>Pengarang</td><td> : $tampil[pengarang]</td></tr>
<tr><td>Judul</td><td> : $tampil[judul]</td></tr>
<tr><td>Lokasi Rak</td><td> : $tampil[lokasirak]</td></tr>
<tr><td>Penerbit</td><td> : $tampil[penerbit]</td></tr>

<tr><td>Tahun Terbit</td><td> : $tampil[tahun_terbit]</td></tr>

<tr><td>Sinopsis</td><td> : $tampil[sinopsis]</td></tr>

<tr><td>Jumlah Buku</td><td> : $tampil[jumlah_buku]</td></tr>
<tr><td>Selesai Diproses</td><td> : $tampil[selesai_diproses]</td></tr>
</table></br></br><a href='media.php?module=buku&aksi=tampil'><b>Kembali</b></a></center>";
}
break;
//END DETAIL

//INTERFACE TAMBAH
case "tambahbuku":
echo"<h2>Tambah Kategori</h2>";
?>
<center><table id='tabeledit'><form action='?module=kategori&aksi=input' name='postform' method=POST>
<tr><td>Kode Kategori  </td><td>
<input size='35' type='text' name='no_induk_buku' maxlength='20'></td></tr>



<tr><td>Nama Kategori </td><td>
<input size='35' type='text' name='judul' maxlength='60'></td></tr>

</td></tr>

	<tr><td colspan=2 align=center><input type=submit value='Save'>
			<input type=button onclick=self.history.back()  value='Batal'>
	</td></tr></form></table></center>
	<?php
	
break;

//INTERFACE EDIT BUKU
case "editbuku":
echo"<h2>Edit Data Buku</h2>";
$db="select * from buku where no_induk_buku='$_GET[kode_buku]'";
$qri=mysql_query($db);
$row=mysql_fetch_array($qri);
echo"<form action='?module=buku&aksi=update&kode_buku=$row[no_induk_buku]' method=POST name='postform'>";
echo"<center><table id='tabeledit'>";

	echo '

	<tr><td>Pengarang : </td><td>
<input size="35" type="text" name="pengarang" maxlength="60" value="'.$row['nm_kategori'].'"></td></tr>';




echo"<tr><td colspan=2 align=center><input type=submit name='save'  value='UpDate'>
	<input type=button onclick=self.history.back()  value='Batal'></td></tr>";
echo"</table></form></center>";
break;

// AKSI HAPUS
case "hapus":
mysql_query("DELETE FROM kategori WHERE  	id_ketegori='$_GET[id]'");
	echo '<script>alert(\'Data Berhasil Dihapus\')
	setTimeout(\'location.href="?module=kategori&aksi=tampil"\' ,0);</script>';
break;

// AKSI INPUT
case "input":
if ((empty($_POST['judul'])) )
{
echo"<p>Nama Kategori Wajib Diisi<input type='button' onclick=self.history.back() value='back'/>";
}
Else
{		


 $qry	= mysql_query("SELECT MAX(CONCAT(LPAD((RIGHT((no_induk_buku),4)+1),4,'0')))FROM kategori");
$qry2	= mysql_query("SELECT MIN(CONCAT(LPAD((RIGHT((no_induk_buku),4)),4,'0')))FROM kategori");	
$kode= mysql_fetch_array($qry);
$kode2= mysql_fetch_array($qry2);
if ($kode2[0]!="0001"){
$kodeauto = "0001";
}
else{
$kodeauto = $kode[0];
}  

 $sql = mysql_query("INSERT INTO  kategori VALUES('$_POST[no_induk_buku]',
 '$_POST[judul]')"); 


if (!$sql)
  {
  echo "Gagal Memasukkan Database,</br>
  Pastikan Data Yang Dimasukkan Benar.</br>
  <input type='button' onclick=self.history.back() value='Kembali'/>";
  }else
  {
  echo '<script>alert(\'Data Berhasil Dimasukkan\')
	setTimeout(\'location.href="?module=kategori&aksi=tampil"\' ,0);</script>';
  } 
}
								
break;

// AKSI UPDATE
case "update":

mysql_query("UPDATE kategori SET nm_kategori='$_POST[pengarang]'
							
						
			       where  	id_ketegori='$_GET[kode_buku]'");
echo '<script>alert(\'Data Berhasil Diedit\')
	setTimeout(\'location.href="?module=kategori&aksi=tampil"\' ,0);</script>';
break;
}
echo '<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
}

?>