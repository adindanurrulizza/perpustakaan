<?php
if(!isset($_SESSION['namalengkap'])) {
header("Location: index.php");
}else{
switch ($_GET['aksi'])
{
//INTERFACE TAMPIL DATA ANGGOTA
case "tampil";
$query=mysql_query("select * from anggota order by no_agt");
echo"<h3>Data Anggota</h3><center>
<div style='width:1050px; height:50px; vertical-align:midle; text-align:left'>";
if ($_SESSION['leveluser']=="admin") {
echo "<a id='wew' href='?module=anggota&aksi=tambahanggota' title='Tambah Anggota'/><button class='btn btn-primary'>Tambah Data</button></a> ";
}
echo "<a id='wew' href='?module=pencarian&aksi=anggota' title='Cari Data Anggota'/><button class='btn btn-success'>Cari Data</button></a> <a id='wew' href='#' onclick=\"window.open('modul/laporananggota/cetak.php', 'WinC',
'width=800,height=400,toolbar=no,location=no,position=center,directories=no,status=no,menubar=no, minimize=yes scrollbars=no,resizable=yes,copyhistory=no,top=50,left=200')\" title='Cetak Data Anggota'/><button class='btn btn-info'>Cetak Data</button></a>
</div>";
echo"<table id='tabel' class='table table-bordered table-striped'>
<tr bgcolor='#0b2070'  align='center'>
<td width='4%'>No.</td>
<td width='8%'>No Agt</td>
<td width='15%'>Nama</td>
<td width='7%'>JK</td>
<td width='11%'>Tempat Lahir</td>
<td width='8%'>Tgl Lahir</td>
<td width='30%'>Alamat</td>
<td width='12%'>Aksi</td>";

$no=1;
$baris=1;
while($tampil=mysql_fetch_array($query)){ 
if($baris%2==0)
{
echo "<tr bgcolor=\"#d9e2da\">"; 
}
else 
{
echo "<tr bgcolor=\"#FFFFFF\">"; 
}
echo"<td align='center'>$no</td>";
echo"<td>$tampil[no_agt]</td>";
echo"<td>$tampil[nama]</td>";
echo"<td>$tampil[jenis_kelamin]</td>";
echo"<td>$tampil[tempat_lahir]</td>";
echo"<td>$tampil[tanggal_lahir]</td>";
echo"<td>$tampil[alamat]</td>";
echo"<td align='center'><a href='#' onclick=\"window.open('modul/anggota/tampilbarcode.php?text=$tampil[no_agt]', 'kartuagt',
'menubar=yes,scrollbars=yes,resizable=yes,width=800,height=400,top=50,left=200')\"><u>Kartu</u></a> | ";
if ($_SESSION['leveluser']=="admin") {
echo"<a href=?module=anggota&aksi=editanggota&nis=$tampil[no_agt]>Edit</a> | ";
echo"<a onclick=\"return confirm('Anda Yakin Menghapus Data Ini?')\" href='?module=anggota&aksi=hapus&id=$tampil[no_agt]'>Hapus</td>";
}
$no++;
$baris++;}
echo"</tr>";
echo"</table></center>";
break;

//INTERFACE TAMBAH
case "tambahanggota":
$qr	= mysql_query("SELECT MAX(CONCAT(LPAD((RIGHT((no_agt),7)+1),7,'0')))FROM anggota");
$qr2	= mysql_query("SELECT MIN(CONCAT(LPAD((RIGHT((no_agt),7)),7,'0')))FROM anggota");	
$kde= mysql_fetch_array($qr);
$kde2= mysql_fetch_array($qr2);
if ($kde2[0]!="0000001"){
$kodea = "0000001";
}
else{
$kodea = $kde[0];
}   	
echo"<h2>Tambah Anggota</h2>";
echo "<center><table id='tabeledit'>
<form action='?module=anggota&aksi=input' name='postform'
		method='POST'
		enctype='multipart/form-data'>

<form method='POST'>
<tr><td>ID Anggota : </td><td>
<input style='background:transparent'; size='30' type='text' name='no_agt' value='AGT$kodea' maxlength='30' readonly></td></tr>
	<tr><td>Nama : </td><td>
<input size='30' type='text' name='nama' maxlength='30'></td></tr>
	<tr><td>Jenis Kelamin : </td><td>
<select name='jenis_kelamin'><option value='Laki-Laki'>Laki-Laki</option><option value='Perempuan'>Perempuan</option></select></td></tr>
<tr><td>Tempat Lahir : </td><td>
<input size='30' type=text name='tempat_lahir' maxlength='20'></td></tr>
<tr><td>Tanggal Lahir : </td><td>
<input size='25' type='text' name='tanggal_lahir' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_lahir);return false;\"/><a href=\"javascript:void(0)\" onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_lahir);return false;\" ><img name=\"popcal\" align=\"absmiddle\" style=\"border:none\" src=\"./calender/calender.jpeg\" width=\"26\" height=\"21\" border=\"0\" alt=\"\"></a>
</td></tr>
<tr><td style='vertical-align:top'>Alamat : </td><td>
<textarea name='alamat' maxlength='80' rows='3' cols='30'></textarea></td></tr>
<tr><td>Foto : </td><td>
<input type='file' name='berkas'  /></td></tr>
	<tr><td colspan=2 align=center><input type=submit value='Save'>
			<input type=button onclick=self.history.back()  value='Batal'>
	</td></tr></form></form></table></center>";

break;

//INTERFACE EDIT
case "editanggota":
echo"<h2>Edit User</h2>";
$db="select * from anggota where no_agt='$_GET[nis]'";
$qri=mysql_query($db);
$row=mysql_fetch_array($qri);
echo"<tr><td colspan='2'><img width='70px' height='90' src='images/anggota/resize.php?src=$row[no_agt].jpg&scale=200&q=100'/></td></tr>";
echo"
<form action='?module=anggota&aksi=update&no_agt=$row[no_agt]' name='postform2'
		method='POST'
		enctype='multipart/form-data'>
<tr><td>Ubah Foto : </td><td>
<input type='file' name='berkas'  /></td></tr>
<form method='POST'>";
echo"<center><table id='tabeledit'>";
echo"<tr><td>Nomor Anggota : </td><td><input style='background-color:#eeeeff'; readonly='1' type=text name='no_agt' value='$row[no_agt]'></td></tr>";
echo'<tr><td>Nama : </td><td><input maxlength=30 type=text name="nama" value="'.$row['nama'].'"></td></tr>';
echo"<tr><td>Jenis Kelamin : </td><td><select name='jenis_kelamin'>";
if ($row['jenis_kelamin'] == "Laki-Laki") {
echo "<option value='Laki-Laki'>Laki-Laki</option><option value='Perempuan'>Perempuan</option>";
}
else 
{
echo "<option value='Perempuan'>Perempuan</option><option value='Laki-Laki'>Laki-Laki</option>";
}
echo "</select></td></tr>";
echo'<tr><td>Tempat Lahir : </td><td><input maxlength=20 type=text name="tempat_lahir" value="'.$row['tempat_lahir'].'"></td></tr>';
echo"<tr><td>Tanggal Lahir : </td><td><input type=text name='tanggal_lahir' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.postform2.tanggal_lahir);return false;\" value='$row[tanggal_lahir]'><a href=\"javascript:void(0)\" onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_lahir);return false;\" ><img name=\"popcal\" align=\"absmiddle\" style=\"border:none\" src=\"./calender/calender.jpeg\" width=\"26\" height=\"21\" border=\"0\" alt=\"\"></a></td></tr>";
echo "
<tr><td style='vertical-align:top'>Alamat : </td><td>
<textarea name='alamat' maxlength='80' rows='3' cols='30'>$row[alamat]</textarea>
</td></tr>";
echo"<tr><td colspan=2 align=center><input type=submit name='save'  value='UpDate'></form></form>
	<input type=button onclick=self.history.back()  value='Batal'></td></tr>";
echo"</table></center>";
break;

// AKSI HAPUS
case "hapus":
mysql_query("DELETE FROM anggota WHERE no_agt='$_GET[id]'");
	echo '<script>alert(\'Data Berhasil Dihapus\')
	setTimeout(\'location.href="?module=anggota&aksi=tampil"\' ,0);</script>';
	unlink("images/anggota/$_GET[id].jpg");
break;

// AKSI INPUT
case "input":
if (empty($_POST['nama']) or empty($_POST['jenis_kelamin']) or empty($_POST['tempat_lahir']) or empty($_POST['tanggal_lahir']) or empty($_POST['alamat']))
{
echo"<p>Salahsatu Textbox tidak terisi<input type='button' onclick=self.history.back() value='back'/>";

}
Else
{		
// PERINTAH UPLOAD
error_reporting(0);
$maxUp=3000000;
$tes = $_POST['no_agt'];
$extensionList = array("bmp", "jpg", "gif");
$error = $_FILES['berkas']['error'];//error
$nama_file = $_FILES['berkas']['name'];//Name
/* New File Name */
$newname = substr( $nama_file , -3 );
$newname2 = substr( $nama_file , +3 );
$pecah = explode(".", $nama_file);
$ekstensi = $pecah[1];
$ukuran = $_FILES['berkas']['size'];//Size Byte
$temp = $_FILES['berkas']['tmp_name'];//Temporary
$tipe_data= $_FILES['berkas']['type'];//Type data
$extension=end(explode(".", $nama_file));
$newfilename="$tes".".".$extension;


$tujuan = "images/anggota/".$newfilename;//destination



if ($ukuran>$maxUp) {
echo "<script>
	alert('Ukuran File Foto Terlalu Besar, Maximal 3 mb!');
	</script>";
	echo '<script>setTimeout(\'location.href="?module=anggota&aksi=tampil"\' ,0);</script>';
}
elseif ($nama_file == ""){
echo '<script>alert(\'Gambar Belum Dipilih . . !\')
	setTimeout(\'location.href="?module=anggota&aksi=tambahanggota"\' ,0);</script>';
}

elseif ($error >0){
	echo "Error";
}
elseif (file_exists($tujuan)){
	echo $nama_file ." sudah ada , ganti dengan file lainnya";
	}
else{
	move_uploaded_file($temp,$tujuan);
	
		$nama = str_replace("'", "''",$_POST['nama']);
		$tempat_lahir = str_replace("'", "''",$_POST['tempat_lahir']);
		$alamat = str_replace("'", "''",$_POST['alamat']);
		$sql = mysql_query("INSERT INTO anggota VALUES('$_POST[no_agt]','$nama','$_POST[jenis_kelamin]','$tempat_lahir','$_POST[tanggal_lahir]','$alamat','aktif')"); 		
		if (!$sql)
		{
		echo "Gagal Memasukkan Database,</br>
		Pastikan Data Yang Dimasukkan Benar.</br>
		<input type='button' onclick=self.history.back() value='Kembali'/>";
		}else
		{
		echo '<script>alert(\'Data Berhasil Dimasukkan\')
			setTimeout(\'location.href="?module=anggota&aksi=tampil"\' ,0);</script>';
		}	 
	}
//END UPLOAD
	   
 
								}
break;

// AKSI UPDATE 
case "update":
error_reporting(0);
$maxUp=3000000;
$tes = $_POST['no_agt'];
$extensionList = array("bmp", "jpg", "gif");
$error = $_FILES['berkas']['error'];//error
$nama_file = $_FILES['berkas']['name'];//Name
/* New File Name */
$newname = substr( $nama_file , -3 );
$newname2 = substr( $nama_file , +3 );
$pecah = explode(".", $nama_file);
$ekstensi = $pecah[1];
$ukuran = $_FILES['berkas']['size'];//Size Byte
$temp = $_FILES['berkas']['tmp_name'];//Temporary
$tipe_data= $_FILES['berkas']['type'];//Type data
$extension=end(explode(".", $nama_file));
$newfilename="$tes".".".$extension;


$tujuan = "images/anggota/".$newfilename;//destination



if ($ukuran>$maxUp) {
echo "<script>
	alert('Ukuran File Foto Terlalu Besar, Maximal 3 mb!');
	</script>";
	echo '<script>setTimeout(\'location.href="?module=anggota&aksi=tampil"\' ,0);</script>';
}
else{
move_uploaded_file($temp,$tujuan);
	
	$nama = str_replace("'", "''",$_POST['nama']);
		$tempat_lahir = str_replace("'", "''",$_POST['tempat_lahir']);
		$alamat = str_replace("'", "''",$_POST['alamat']);
$sql = mysql_query("UPDATE anggota SET no_agt='$_POST[no_agt]',
                            	 nama='$nama',
                                jenis_kelamin='$_POST[jenis_kelamin]',
                               	tempat_lahir='$tempat_lahir',
tanggal_lahir='$_POST[tanggal_lahir]',
alamat='$alamat' 			
			where no_agt='$_GET[no_agt]'");
			if (!$sql)
		{
		echo "Gagal Memasukkan Database,</br>
		Pastikan Data Yang Dimasukkan Benar.</br>
		<input type='button' onclick=self.history.back() value='Kembali'/>";
		}else
		{
		echo '<script>alert(\'Data Berhasil Diedit\')
	setTimeout(\'location.href="?module=anggota&aksi=tampil"\' ,0);</script>';
		}	 

break;
}
}

}
?>
<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>