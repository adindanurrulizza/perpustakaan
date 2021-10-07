<?php
if((!isset($_SESSION['namalengkap'])) || ($_SESSION['leveluser']!="admin")) {
header("Location: index.php");
}else{
switch ($_GET['aksi'])
{
//INTERFACE TAMPIL DATA BUKU
case "tampil";
$query=mysql_query("select * from buku");
echo"<h4>Data Buku</h4>";
echo"<input type=button value='Tambah Data Buku' onclick=location.href='?module=buku&aksi=tambahbuku' class='btn btn-primary'></br></br>";
echo"<center><div style='overflow:auto;height:400px;width:950;padding:0px;margin-bottom:0px'>  
<table id='tabel' class='table table-bordered table-striped'>
<tr  align='center'>
<td width='75'>No Induk</td>

<td width='75'>Pengarang</td>
<td width='260'>Judul</td>
<td width='75'>Lokasi Rak</td>
<td width='100'>Penerbit</td>
<td width='30'>Jumlah</td>
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
echo"<td>$tampil[no_induk_buku]</td>";


echo"<td>$tampil[pengarang]</td>";
echo"<td>$tampil[judul]</td>";
echo"<td>$tampil[lokasirak]</td>";
echo"<td>$tampil[penerbit]</td>";
echo"<td>$tampil[jumlah_buku]</td>";
echo"<td><a href=?module=buku&aksi=detail&no=$tampil[no_induk_buku]>Detail</a> | ";
echo"<a href=?module=buku&aksi=editbuku&kode_buku=$tampil[no_induk_buku]> Edit</a> | ";
echo"<a onclick=\"return confirm('Anda Yakin Menghapus Data Ini?')\" href='?module=buku&aksi=hapus&id=$tampil[no_induk_buku]'> Hapus</a> | ";
echo"<a href='modul/buku/tampilbarcode.php?text=$tampil[no_induk_buku]' target='_blank'/>Barcode</a>
</td>";
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
echo"<h2>Tambah Buku</h2>";
?>
<center><table id='tabeledit'><form action='?module=buku&aksi=input' name='postform' method=POST>
<tr><td>Kode Buku : </td><td>
<input size='35' type='text' name='no_induk_buku' maxlength='20'></td></tr>

<tr><td>Kategori : </td><td>

<select  name='no_induk_k' maxlength='20'>
<option value=0 selected>-Pilih ID Kategori-</option>
<?php

$kon=mysqli_connect("localhost","root","","db_perpustakaan");
$sqlKategori	= "select * from kategori order by id_ketegori";
$result	= mysql_query($sqlKategori);
while($dataKategori = mysql_fetch_array($result))
{
echo "<option value=$dataKategori[id_ketegori]>$dataKategori[id_ketegori]-$dataKategori[nm_kategori]</option>";
}
?>

</select></td></tr>

<tr><td>Sub Kategori : </td><td>
<select  name='no_induk_s' maxlength='20'>
<option value=0 selected>-Pilih ID Kategori-</option>
<?php

$kon=mysqli_connect("localhost","root","","db_perpustakaan");
$sqlKategori	= "select * from  subkategori order by id_sub_kategori";
$result	= mysql_query($sqlKategori);
while($dataKategori = mysql_fetch_array($result))
{
echo "<option value=$dataKategori[id_sub_kategori]>$dataKategori[id_sub_kategori]-$dataKategori[nm_sub]</option>";
}
?>
</select>

</select></td></tr>	

<tr><td>Pengarang : </td><td>
<input size='35' type='text' name='pengarang' maxlength='60'></td></tr>
<tr><td>Judul : </td><td>
<textarea name='judul' maxlength='80' rows='3' cols='30'></textarea></td></tr>
<tr><td>Lokasi Rak : </td><td>
<select name="lokasirak" id="lokasirak" onchange="changeValue(this.value)" >
        <option value=0>-Pilih-</option>
        <?php
    $result = mysql_query("select * from rak");   
    $jsArray1 = "var dtMhs = new Array();\n";       
    while ($row = mysql_fetch_array($result)) {   
        echo '<option value="' . $row['nm_rak'] . '">' . $row['nm_rak'] . '</option>';   
        
    }     
    ?>   
        </select>  </td></tr>
<tr><td>Penerbit : </td><td>
<input size='35' type=text name='penerbit' maxlength='20'></td></tr>

<tr><td>Tahun Terbit : </td><td>
<input type=text name='tahun_terbit' maxlength='4'></td></tr>

<tr><td>Sinopsis : </td><td>
<textarea name='ilustrasi' maxlength='80' rows='3' cols='30'></textarea></td></tr>




<tr><td>Jumlah Buku : </td><td>
<input type=text name='jumlah_buku' maxlength='5'></td></tr>
<tr><td>Tanggal Input : </td><td>
<input size='10' type='text' name='selesai_diproses' onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.selesai_diproses);return false;\"/><a href="javascript:void(0)\" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.selesai_diproses);return false;\" ><img name=\"popcal\" align=\"absmiddle\" style=\"border:none\" src=\"./calender/calender.jpeg\" width=\"26\" height="21\" border="0\" alt="\"></a>
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
<input size="35" type="text" name="pengarang" maxlength="60" value="'.$row['pengarang'].'"></td></tr>';
echo "
<tr><td>Judul : </td><td>
<textarea name='judul' maxlength='80' rows='3' cols='30'>$row[judul]</textarea></td></tr>
<tr><td>Lokasi Rak : </td><td>
<textarea name='lokasirak' maxlength='30' rows='3' cols='30'>$row[lokasirak]</textarea></td></tr>
<tr><td>Penerbit : </td><td>
<input type=text name='penerbit'  value='$row[penerbit]'></td></tr>



<tr><td>Tahun Terbit : </td><td>
<input type=text name='tahun' maxlength='4' value='$row[tahun_terbit]'></td></tr>

<tr><td>Sinopsi: </td><td>
<input type=text name='sinopsis' maxlength='10' value='$row[sinopsis]'></td></tr>

<tr><td>Jumlah Buku: </td><td>
<input type=text name='jumlah' maxlength='5' value='$row[jumlah_buku]'></td></tr>
<tr><td>Selesai Diproses : </td><td>
<input size='10' type='text' name='selesai' value='$row[selesai_diproses]' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.postform.selesai_diproses);return false;\"/><a href=\"javascript:void(0)\" onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.postform.selesai_diproses);return false;\" ><img name=\"popcal\" align=\"absmiddle\" style=\"border:none\" src=\"./calender/calender.jpeg\" width=\"26\" height=\"21\" border=\"0\" alt=\"\"></a>
</td></tr>";
echo"<tr><td colspan=2 align=center><input type=submit name='save'  value='UpDate'>
	<input type=button onclick=self.history.back()  value='Batal'></td></tr>";
echo"</table></form></center>";
break;

// AKSI HAPUS
case "hapus":
mysql_query("DELETE FROM buku WHERE no_induk_buku='$_GET[id]'");
	echo '<script>alert(\'Data Berhasil Dihapus\')
	setTimeout(\'location.href="?module=buku&aksi=tampil"\' ,0);</script>';
break;

// AKSI INPUT
case "input":
if ((empty($_POST['judul'])) or (empty($_POST['pengarang'])) or (empty($_POST['jumlah_buku'])))
{
echo"<p>Pengarang, Judul, Jumlah Buku Wajib Diisi<input type='button' onclick=self.history.back() value='back'/>";
}
Else
{		


 $qry	= mysql_query("SELECT MAX(CONCAT(LPAD((RIGHT((no_induk_buku),4)+1),4,'0')))FROM buku");
$qry2	= mysql_query("SELECT MIN(CONCAT(LPAD((RIGHT((no_induk_buku),4)),4,'0')))FROM buku");	
$kode= mysql_fetch_array($qry);
$kode2= mysql_fetch_array($qry2);
if ($kode2[0]!="0001"){
$kodeauto = "0001";
}
else{
$kodeauto = $kode[0];
}  

 $sql = mysql_query("INSERT INTO buku VALUES('$_POST[no_induk_buku]',
 '$_POST[no_induk_k]',
 '$_POST[no_induk_s]',
 '$_POST[pengarang]',
 '$_POST[judul]',
 '$_POST[lokasirak]',
 '$_POST[penerbit]',
 '$_POST[tahun_terbit]',
 '$_POST[ilustrasi]',
 $_POST[jumlah_buku],
 '$_POST[selesai_diproses]')"); 


if (!$sql)
  {
  echo "Gagal Memasukkan Database,</br>
  Pastikan Data Yang Dimasukkan Benar.</br>
  <input type='button' onclick=self.history.back() value='Kembali'/>";
  }else
  {
  echo '<script>alert(\'Data Berhasil Dimasukkan\')
	setTimeout(\'location.href="?module=buku&aksi=tampil"\' ,0);</script>';
  } 
}
								
break;

// AKSI UPDATE
case "update":

mysql_query("UPDATE buku SET pengarang='$_POST[pengarang]',
							judul='$_POST[judul]',
							lokasirak='$_POST[lokasirak]',
							penerbit='$_POST[penerbit]',
						
							 	tahun_terbit='$_POST[tahun]',
							sinopsis='$_POST[sinopsis]',
						
							jumlah_buku='$_POST[jumlah]',
							selesai_diproses='$_POST[selesai]'
						

			       where no_induk_buku='$_GET[kode_buku]'");
echo '<script>alert(\'Data Berhasil Diedit\')
	setTimeout(\'location.href="?module=buku&aksi=tampil"\' ,0);</script>';
break;
}
echo '<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
}

?>